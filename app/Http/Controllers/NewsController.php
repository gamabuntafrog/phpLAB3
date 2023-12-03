<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class NewsController extends Controller
{
    public function getNews() {
        if (!Gate::allows('news-basic')) {
            return redirect()->route('login');
        }

        $news = new News();

        return view('news', ['news' => $news->all()]);
    }

    public function getNewsByIdPage(Request $request) {
        if (!Gate::allows('news-basic')) {
            return redirect()->route('login');
        }

        $id = request('id');

        $news = News::find($id);

        if (!$news) {
            redirect()->route('newsPage');
        }

        $news->watchCount += 1;

        $news->save();

        $user = Auth::user();

        $is_super_admin = $user->role === 'super_admin';
        $can_update = $is_super_admin || $user->role === 'editor' && $user->id == $news->creator_user_id;

        return view('newsById', ['news'=> $news, 'is_super_admin' => $is_super_admin, 'can_update' => $can_update]);
    }
    public function createNewsPage() {
        if (!Gate::allows('news-basic')) {
            return redirect()->route('login');
        }

        return view('createNews');
    }

    public function createNews(Request $request) {
        if (!Gate::allows('news-basic')) {
            return redirect()->route('login');
        }

        $valid = $request->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:5',
            'text' => 'required|min:10',
        ]);

        $user_id = Auth::id();

        $news = new News();

        $news->title = $request->input('title');
        $news->description = $request->input('description');
        $news->text = $request->input('text');
        $news->watchCount = 0;
        $news->creator_user_id = $user_id;

        $news->save();

        return redirect()->route('newsPage');
    }

    public function updateNewsPage(Request $request) {
        if (!Gate::allows('news-basic')) {
            return redirect()->route('login');
        }

        $id = request('id');

        $news = News::find($id);

        if (!$news) {
            return redirect()->route('newsPage');
        }

        if (!Gate::allows('update-news', [$news])) {
            abort(403, 'Unauthorized');
        }

        return view('updateNews', ['news' => $news]);
    }
    public function updateNews(Request $request) {
        $id = request('id');

        $valid = $request->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:5',
            'text' => 'required|min:10',
        ]);

        $news = News::find($id);

        if (!$news) {
            return redirect()->route('newsPage');
        }

        if (!Gate::allows('update-news', [$news])) {
            abort(403, 'Unauthorized');
        }

        $news->title = $request->input('title');
        $news->description = $request->input('description');
        $news->text = $request->input('text');

        $news->save();

        return redirect()->route('newsPage');
    }

    public function deleteNews(Request $request) {
        $id = request('id');

        if (!Gate::allows('delete-news')) {
            abort(403, 'Unauthorized');
        }

        News::destroy($id);

        return redirect()->route('newsPage');
    }
}

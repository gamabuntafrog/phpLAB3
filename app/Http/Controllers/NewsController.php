<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function getNews() {
        $news = new News();

        return view('news', ['news' => $news->all()]);
    }

    public function getNewsByIdPage(Request $request) {
        $id = request('id');

        $news = News::find($id);

        if (!$news) {
            redirect()->route('newsPage');
        }

        $news->watchCount += 1;

        $news->save();

        return view('newsById', ['news'=> $news]);
    }
    public function createNewsPage() {
        return view('createNews');
    }

    public function createNews(Request $request) {
        $valid = $request->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:5',
            'text' => 'required|min:10',
        ]);

        $news = new News();

        $news->title = $request->input('title');
        $news->description = $request->input('description');
        $news->text = $request->input('text');
        $news->watchCount = 0;

        $news->save();

        return redirect()->route('newsPage');
    }

    public function updateNewsPage(Request $request) {
        $id = request('id');

        $news = News::find($id);

        if (!$news) {
            return redirect()->route('newsPage');
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

        $news->title = $request->input('title');
        $news->description = $request->input('description');
        $news->text = $request->input('text');

        $news->save();

        return redirect()->route('newsPage');
    }
}

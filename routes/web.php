<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded within the "web" middleware group which includes
| sessions, cookie encryption, and more. Go build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::get('/news', [NewsController::class, 'getNews'])->name('newsPage');

Route::get('/news/{id}',  [NewsController::class, 'getNewsByIdPage']);

Route::get('/update-news/{id}', [NewsController::class, 'updateNewsPage']);

Route::post('/update-news/{id}', [NewsController::class, 'updateNews']);

Route::get('/create-news', [NewsController::class, 'createNewsPage']);

Route::post('/create-news', [NewsController::class, 'createNews'])->name('createNewsPage');

Route::get('/delete-news/{id}', [NewsController::class, 'deleteNews']);


require __DIR__.'/auth.php';

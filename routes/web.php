<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Http\Controllers\NewsController;

Route::get('/', [NewsController::class, 'getNews'])->name('newsPage');

Route::get('/update-news/{id}', [NewsController::class, 'updateNewsPage']);

Route::post('/update-news/{id}', [NewsController::class, 'updateNews']);


Route::get('/create-news', [NewsController::class, 'createNewsPage']);

Route::post('/create-news', [NewsController::class, 'createNews']);


Route::get('/news/{id}', function () {
    return 'News by id';
});

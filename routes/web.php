<?php

use App\Models\Article;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;

Route::get('/', function () {
    $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->take(6)->get();
    return view('welcome', compact('articles'));
})->name('homepage');

//Articoli
Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');
Route::get('/article/show/{article}', [ArticleController::class, 'show'])->name('article.show');
//Categorie
Route::get('/category/{category}', [ArticleController::class, 'byCategory'])->name('byCategory');
Route::get('/seach/article', [ArticleController::class, 'searchArticles'])->name('article.search');

//Revisore
Route::get('/revisor/index', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');
Route::patch('/accept/{article}', [RevisorController::class, 'accept'])->name('accept');
Route::patch('/reject/{article}', [RevisorController::class, 'reject'])->name('reject');
Route::patch('/revisor/article/reset', [RevisorController::class, 'reset'])->middleware('isRevisor')->name('revisor.article.reset');

//Mail revisor
Route::get('/revisor/request', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');
Route::get('/revisor/make/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');

//Cambio lingua
Route::post('/lingua/{lang}', [PublicController::class, 'setLanguage'])->name('setLocale');

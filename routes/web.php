<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

//Pagina crea articolo
Route::get('/create/article', [ArticleController::class, 'create'])->name('create.article');

//Pagina lista prodotti
Route::get('article/index', [ArticleController::class, 'index'])->name('article.index');

//Pagina dettaglio prodotto
Route::get('/show/article/{article}', [ArticleController::class, 'show'])->name('article.show');

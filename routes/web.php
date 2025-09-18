<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

//Pagina crea articolo
Route::get('/create/article', [ArticleController::class, 'create'])->name('create.article');

//Pagina lista prodotti
Route::get('article/index', [ArticleController::class, 'index'])->name('article.index');

//Pagina dettaglio prodotto
Route::get('/show/article/{article}', [ArticleController::class, 'show'])->name('article.show');

//Pagine elenco prodotti per categoria
Route::get('/category/{category}', [ArticleController::class, 'byCategory'])->name('byCategory');

//Revisore
Route::get('/revisor/index', [RevisorController::class, 'index'])->name('revisor.index');
Route::patch('/accept/{article}', [RevisorController::class, 'accept'])->name('accept');
Route::patch('/reject/{article}', [RevisorController::class, 'reject'])->name('reject');

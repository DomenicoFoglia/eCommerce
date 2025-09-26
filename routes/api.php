<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Api\ArticleController;

Route::get('/articles', [ArticleController::class, 'index']);
Route::get('/categories/{category}/articles', [ArticleController::class, 'articlesByCategory']);

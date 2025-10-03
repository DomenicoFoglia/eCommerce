<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\API\CategoryController;

Route::get('/articles', [ArticleController::class, 'index']);
Route::get('/categories/{category}/articles', [ArticleController::class, 'articlesByCategory']);
Route::get('/categories', [CategoryController::class, 'index']);

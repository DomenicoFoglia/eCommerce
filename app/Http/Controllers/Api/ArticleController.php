<?php

namespace App\Http\Controllers\Api;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->query('perPage', 10);
        $articles = Article::with('category')
            ->where('is_accepted', true)
            ->latest()
            ->paginate($perPage);

        return response()->json($articles);
    }

    public function articlesByCategory(Category $category, Request $request)
    {
        $perPage = $request->query('perPage', 10);

        $articles = $category->articles()
            ->where('is_accepted', true)
            ->latest()
            ->paginate($perPage);

        return response()->json($articles);
    }
}

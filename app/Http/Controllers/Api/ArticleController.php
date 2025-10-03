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

    //Funzione di creazione articolo
    public function store(Request $request)
    {
        // 1. validazione
        $validated = $request->validate([
            'title' => 'required|string|min:5',
            'description' => 'required|string|min:10',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'images.*' => 'image|max:1024'
        ]);
        // 2. creazione articolo
        $article = Article::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'category_id' => $validated['category_id'],
            'user_id' => $request->user()->id,

        ]);
        // 3. gestione immagini
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('articles', 'public');
                $article->images()->create(['path' => $path]);
            }
        }

        // 4. risposta JSON
        return response()->json([
            'message' => 'Articolo creato con successo',
            'article' => $article
        ]);
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

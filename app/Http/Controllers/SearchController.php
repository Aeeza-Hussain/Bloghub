<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Display dedicated search results page.
     * Route: GET /search
     */
    public function index(Request $request)
    {
        $query = trim($request->query('q', ''));

        $articles = null;
        if (!empty($query)) {
            $articles = Article::with(['category', 'author'])
                ->where(function ($q) use ($query) {
                    $q->where('title', 'like', "%{$query}%")
                      ->orWhere('excerpt', 'like', "%{$query}%")
                      ->orWhere('tags', 'like', "%{$query}%")
                      ->orWhere('author_name', 'like', "%{$query}%")
                      ->orWhereHas('category', function ($catQuery) use ($query) {
                          $catQuery->where('name', 'like', "%{$query}%");
                      });
                })
                ->latest('published_at')
                ->paginate(9)
                ->withQueryString();
        }

        // Suggested categories for exploration
        $suggestedCategories = Category::withCount('articles')
            ->orderBy('articles_count', 'desc')
            ->take(6)
            ->get();

        return view('search', compact('articles', 'query', 'suggestedCategories'));
    }
}

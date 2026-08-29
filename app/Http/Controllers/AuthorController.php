<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display the Authors Directory page with search and sorting.
     * Route: GET /authors
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        $sort   = $request->query('sort', 'articles'); // articles, followers, name

        $query = Author::withCount('articles');

        // Filter by author name or specialty
        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('role', 'like', "%{$search}%")
                  ->orWhere('specialty', 'like', "%{$search}%")
                  ->orWhere('bio', 'like', "%{$search}%");
            });
        }

        // Apply Sorting
        switch ($sort) {
            case 'followers':
                $query->orderBy('followers_count', 'desc');
                break;
            case 'name':
                $query->orderBy('name', 'asc');
                break;
            case 'articles':
            default:
                $query->orderBy('articles_count', 'desc');
                break;
        }

        $authors = $query->paginate(8)->withQueryString();

        return view('authors.index', compact('authors', 'search', 'sort'));
    }

    /**
     * Display a single Author Profile with stats, bio, and authored articles.
     * Route: GET /authors/{slug}
     */
    public function show($slug)
    {
        $author = Author::where('slug', $slug)
            ->withCount('articles')
            ->firstOrFail();

        // Calculate total views for all articles by this author
        $totalViews = $author->articles()->sum('views');

        // Paginate author's articles
        $articles = $author->articles()
            ->with('category')
            ->latest('published_at')
            ->paginate(6);

        return view('authors.show', compact('author', 'articles', 'totalViews'));
    }
}

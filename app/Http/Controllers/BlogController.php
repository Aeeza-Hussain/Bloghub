<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display the blog listing page with search, category filters, sorting, and pagination.
     * Route: GET /blogs
     */
    public function index(Request $request)
    {
        $search   = $request->query('search');
        $category = $request->query('category');
        $sort     = $request->query('sort', 'newest'); // newest, oldest, popular

        $query = Article::with('category');

        // Filter by Search Query
        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%")
                  ->orWhere('tags', 'like', "%{$search}%")
                  ->orWhere('author_name', 'like', "%{$search}%");
            });
        }

        // Filter by Category Slug
        $activeCategory = null;
        if (!empty($category)) {
            $activeCategory = Category::where('slug', $category)->first();
            if ($activeCategory) {
                $query->where('category_id', $activeCategory->id);
            }
        }

        // Apply Sorting
        switch ($sort) {
            case 'oldest':
                $query->orderBy('published_at', 'asc');
                break;
            case 'popular':
                $query->orderBy('views', 'desc')->orderBy('likes', 'desc');
                break;
            case 'newest':
            default:
                $query->orderBy('published_at', 'desc');
                break;
        }

        // Paginate 9 articles per page, preserving query strings
        $articles = $query->paginate(9)->withQueryString();

        // Get all categories with article counts for the filter tabs
        $categories = Category::withCount('articles')->get();

        return view('blogs.index', compact('articles', 'categories', 'activeCategory', 'search', 'sort'));
    }

    /**
     * Display a single blog post with full content, comments, and related articles.
     * Route: GET /blogs/{slug}
     */
    public function show($slug)
    {
        $article = Article::where('slug', $slug)
            ->with(['category', 'comments'])
            ->firstOrFail();

        // Increment view count
        $article->increment('views');

        // Fetch 3 related articles in the same category
        $relatedArticles = Article::where('category_id', $article->category_id)
            ->where('id', '!=', $article->id)
            ->with('category')
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('blogs.show', compact('article', 'relatedArticles'));
    }

    /**
     * Handle comment submission for an article.
     * Route: POST /blogs/{id}/comments
     */
    public function storeComment(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $validated = $request->validate([
            'author_name'  => 'required|string|min:2|max:80',
            'author_email' => 'required|email|max:120',
            'content'      => 'required|string|min:4|max:1500',
        ]);

        // Generate an avatar placeholder from initials or default photo
        $validated['article_id'] = $article->id;
        $validated['author_avatar'] = 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?w=100&auto=format&fit=crop&q=80';

        Comment::create($validated);

        return redirect()->to(route('blogs.show', $article->slug) . '#comments')
            ->with('success', 'Your comment has been published successfully!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display the categories directory grid.
     * Route: GET /categories
     */
    public function index()
    {
        // Fetch all categories along with their article counts
        $categories = Category::withCount('articles')
            ->orderBy('articles_count', 'desc')
            ->get();

        return view('categories.index', compact('categories'));
    }
}

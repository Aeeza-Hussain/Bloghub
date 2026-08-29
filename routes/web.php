<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\SearchController;

// ─── Public Marketing Pages ──────────────────────────────────────────────────
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');

// ─── Contact Page ─────────────────────────────────────────────────────────────
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// ─── Blog & Content Pages ────────────────────────────────────────────────────
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/{slug}', [BlogController::class, 'show'])->name('blogs.show');
Route::post('/blogs/{id}/comments', [BlogController::class, 'storeComment'])->name('blogs.comments.store');

// ─── Categories Directory ────────────────────────────────────────────────────
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

// ─── Authors & People Pages ──────────────────────────────────────────────────
Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index');
Route::get('/authors/{slug}', [AuthorController::class, 'show'])->name('authors.show');

// ─── Global Search Results ───────────────────────────────────────────────────
Route::get('/search', [SearchController::class, 'index'])->name('search.index');

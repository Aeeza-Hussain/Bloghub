@extends('layouts.app')

@section('title', !empty($query) ? 'Search Results for "' . $query . '"' : 'Search Technical Articles')

@section('meta_description', 'Search the BlogHub technical knowledge base for tutorials, architecture blueprints, benchmarks, and guides.')

@section('content')

{{-- ════════════════════════════════════════════════════════════
     1. SEARCH HERO & INPUT BAR
     ════════════════════════════════════════════════════════════ --}}
<section class="page-hero-wrapper">
    <div class="container">
        <span class="badge badge-brand reveal-item" style="margin-bottom: 1rem;">
            <i class="bi bi-search"></i> Knowledge Search
        </span>

        <h1 class="display-title reveal-item" style="max-width: 780px; margin-left: auto; margin-right: auto;">
            @if (!empty($query))
                Results for <span class="editorial-italic">"{{ $query }}"</span>
            @else
                Search the <span class="editorial-italic">publication</span>.
            @endif
        </h1>

        <p class="section-desc reveal-item" style="max-width: 560px; margin-left: auto; margin-right: auto; margin-top: 0.8rem;">
            Query across 20+ articles, topics, verified authors, and architectural tracks.
        </p>

        {{-- Big Search Input Form --}}
        <div class="reveal-item" style="max-width: 640px; margin: 2rem auto 0;">
            <form action="{{ route('search.index') }}" method="GET" class="newsletter-form-row" style="padding: 0.5rem 0.5rem 0.5rem 1.5rem;">
                <i class="bi bi-search" style="color: var(--brand-accent); font-size: 1.25rem; margin-right: 0.5rem;"></i>
                <input type="text" name="q" class="newsletter-input-field" placeholder="Search architecture, Laravel, CSS, SQLite, async JS..." value="{{ $query }}" required aria-label="Search query" autofocus>
                @if (!empty($query))
                    <a href="{{ route('search.index') }}" class="btn btn-ghost btn-sm" title="Clear query" style="margin-right: 0.25rem;">
                        <i class="bi bi-x-lg"></i>
                    </a>
                @endif
                <button type="submit" class="btn btn-primary" style="padding: 0.65rem 1.6rem;">
                    <span>Search</span>
                </button>
            </form>

            {{-- Popular Search Chips --}}
            <div style="display: flex; align-items: center; justify-content: center; gap: 0.5rem; flex-wrap: wrap; margin-top: 1rem; font-size: 0.8rem; color: var(--text-muted);">
                <span>Popular:</span>
                <a href="{{ route('search.index', ['q' => 'Laravel']) }}" class="badge badge-outline" style="font-size: 0.72rem;">#Laravel</a>
                <a href="{{ route('search.index', ['q' => 'Architecture']) }}" class="badge badge-outline" style="font-size: 0.72rem;">#Architecture</a>
                <a href="{{ route('search.index', ['q' => 'SQLite']) }}" class="badge badge-outline" style="font-size: 0.72rem;">#SQLite</a>
                <a href="{{ route('search.index', ['q' => 'Performance']) }}" class="badge badge-outline" style="font-size: 0.72rem;">#Performance</a>
                <a href="{{ route('search.index', ['q' => 'CSS']) }}" class="badge badge-outline" style="font-size: 0.72rem;">#CSS</a>
            </div>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════════════════════
     2. RESULTS GRID OR SUGGESTED FALLBACK
     ════════════════════════════════════════════════════════════ --}}
<section class="section">
    <div class="container">

        @if (!empty($query))
            @if ($articles && $articles->isNotEmpty())
                {{-- Query Header --}}
                <div class="section-header-row reveal-item" style="margin-bottom: 2rem;">
                    <div>
                        <span class="section-eyebrow"><i class="bi bi-check2-circle"></i> Matches Found</span>
                        <h2 class="section-title" style="font-size: 1.8rem;">
                            Found <strong>{{ $articles->total() }}</strong> {{ Str::plural('article', $articles->total()) }}
                        </h2>
                    </div>
                    <div>
                        <a href="{{ route('blogs.index') }}" class="btn btn-outline btn-sm">
                            <span>Browse All Articles</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>

                {{-- Matching Article Cards Grid --}}
                <div class="article-grid">
                    @foreach ($articles as $article)
                    <article class="article-card reveal-item">
                        <div class="article-card-media">
                            <img src="{{ $article->image }}" alt="{{ $article->title }}" loading="lazy">
                            <div class="article-card-badge">
                                <span class="category-pill {{ $article->category->color ?? 'crimson' }}">
                                    {{ $article->category->name }}
                                </span>
                            </div>
                        </div>

                        <div class="article-card-body">
                            <h3 class="article-card-title">
                                <a href="{{ route('blogs.show', $article->slug) }}">
                                    {{ $article->title }}
                                </a>
                            </h3>
                            <p class="article-card-excerpt">
                                {{ $article->excerpt }}
                            </p>

                            <div class="article-card-footer">
                                <div class="article-card-author">
                                    <img src="{{ $article->author_avatar ?? 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=80&auto=format&fit=crop&q=80' }}" alt="{{ $article->author_name }}">
                                    <div>
                                        <div class="author-name-text">{{ $article->author_name }}</div>
                                        <div class="article-date-text">{{ $article->published_at ? $article->published_at->format('M d, Y') : $article->created_at->format('M d, Y') }}</div>
                                    </div>
                                </div>
                                <div class="article-metrics">
                                    <span><i class="bi bi-clock"></i> {{ $article->reading_time }}</span>
                                    <span><i class="bi bi-eye"></i> {{ number_format($article->views) }}</span>
                                </div>
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>

                {{-- Pagination --}}
                <div style="margin-top: 3.5rem; display: flex; justify-content: center;" class="reveal-item">
                    {{ $articles->links('pagination::bootstrap-5') }}
                </div>

            @else
                {{-- No Results Found State --}}
                <div style="text-align: center; padding: 4rem 1.5rem; background: var(--bg-surface); border: 1px solid var(--border-subtle); border-radius: var(--radius-xl); max-width: 640px; margin: 0 auto 4rem;" class="reveal-item">
                    <div style="font-size: 3.5rem; color: var(--brand-accent); margin-bottom: 1rem;">
                        <i class="bi bi-search-heart"></i>
                    </div>
                    <h2 style="font-size: 1.6rem; margin-bottom: 0.5rem; color: var(--text-primary);">
                        No Matches for "{{ $query }}"
                    </h2>
                    <p style="color: var(--text-secondary); font-size: 0.95rem; line-height: 1.6; margin-bottom: 1.5rem;">
                        We couldn't find any articles matching your search query. Try checking your spelling or explore the suggested technical tracks below.
                    </p>
                    <a href="{{ route('blogs.index') }}" class="btn btn-primary">
                        <i class="bi bi-journal-richtext"></i> Browse Full Article Archive
                    </a>
                </div>
            @endif

        @else
            {{-- Initial Search State (No query yet) --}}
            <div class="section-header text-center reveal-item">
                <span class="section-eyebrow"><i class="bi bi-compass"></i> Discover</span>
                <h2 class="section-title">Explore by Knowledge Track</h2>
                <p class="section-desc">Select a specialty domain to browse curated architectural blueprints and tutorials.</p>
            </div>
        @endif

        {{-- ── Suggested Tracks Grid ───────────────────────────────── --}}
        @if (empty($query) || ($articles && $articles->isEmpty()))
            <div class="category-grid reveal-item">
                @foreach ($suggestedCategories as $cat)
                <a href="{{ route('blogs.index', ['category' => $cat->slug]) }}" class="category-card">
                    <div class="category-icon-box">
                        <i class="bi {{ $cat->icon }}"></i>
                    </div>
                    <div>
                        <h3 class="category-card-title">{{ $cat->name }}</h3>
                        <p class="category-card-desc">{{ $cat->description }}</p>
                        <span class="category-count-badge">{{ $cat->articles_count }} Articles &rarr;</span>
                    </div>
                </a>
                @endforeach
            </div>
        @endif

    </div>
</section>

@endsection

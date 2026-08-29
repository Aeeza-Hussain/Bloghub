@extends('layouts.app')

@section('title', $activeCategory ? $activeCategory->name . ' Articles' : 'All Technical Articles')

@section('meta_description', 'Explore in-depth technical tutorials, architecture guides, and engineering blueprints on BlogHub.')

@section('content')

{{-- ════════════════════════════════════════════════════════════
     1. BLOG LISTING HERO & SEARCH BAR
     ════════════════════════════════════════════════════════════ --}}
<section class="page-hero-wrapper">
    <div class="container">
        <span class="badge badge-brand reveal-item" style="margin-bottom: 1rem;">
            <i class="bi bi-journal-code"></i> Engineering Articles & Guides
        </span>

        <h1 class="display-title reveal-item" style="max-width: 800px; margin-left: auto; margin-right: auto;">
            @if ($activeCategory)
                Articles in <span class="editorial-italic">{{ $activeCategory->name }}</span>
            @elseif ($search)
                Search results for <span class="editorial-italic">"{{ $search }}"</span>
            @else
                Explore <span class="editorial-italic">all publications</span> & deep dives.
            @endif
        </h1>

        <p class="section-desc reveal-item" style="max-width: 580px; margin-left: auto; margin-right: auto; margin-top: 0.8rem;">
            @if ($activeCategory)
                {{ $activeCategory->description }}
            @else
                Discover 20+ verified technical tutorials, architecture patterns, and benchmarks.
            @endif
        </p>

        {{-- Search Input Form --}}
        <div class="reveal-item" style="max-width: 560px; margin: 2rem auto 0;">
            <form action="{{ route('blogs.index') }}" method="GET" class="newsletter-form-row">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('sort'))
                    <input type="hidden" name="sort" value="{{ request('sort') }}">
                @endif
                <i class="bi bi-search" style="color: var(--text-muted); font-size: 1.1rem; margin-right: 0.5rem;"></i>
                <input type="text" name="search" class="newsletter-input-field" placeholder="Search by topic, keyword, or author..." value="{{ $search }}" aria-label="Search articles">
                <button type="submit" class="btn btn-primary btn-sm" style="padding: 0.5rem 1.25rem;">
                    <span>Search</span>
                </button>
            </form>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════════════════════
     2. FILTER TOOLBAR & CATEGORY PILLS
     ════════════════════════════════════════════════════════════ --}}
<section class="section-sm" style="background: var(--bg-surface); border-bottom: 1px solid var(--border-subtle); padding: 1.25rem 0;">
    <div class="container">

        {{-- Horizontal Scrollable Category Filter Pills --}}
        <div style="display: flex; align-items: center; gap: 0.6rem; overflow-x: auto; padding-bottom: 0.5rem; margin-bottom: 1.25rem; scrollbar-width: none;">
            <a href="{{ route('blogs.index', array_filter(['search' => $search, 'sort' => $sort])) }}"
               class="badge {{ empty($activeCategory) ? 'badge-brand' : 'badge-outline' }}" style="padding: 0.5rem 1rem; font-size: 0.82rem; white-space: nowrap;">
                All Topics ({{ \App\Models\Article::count() }})
            </a>
            @foreach ($categories as $cat)
                <a href="{{ route('blogs.index', array_filter(['category' => $cat->slug, 'search' => $search, 'sort' => $sort])) }}"
                   class="badge {{ ($activeCategory && $activeCategory->id === $cat->id) ? 'badge-brand' : 'badge-outline' }}"
                   style="padding: 0.5rem 1rem; font-size: 0.82rem; white-space: nowrap;">
                    <i class="bi {{ $cat->icon }}"></i> {{ $cat->name }} ({{ $cat->articles_count }})
                </a>
            @endforeach
        </div>

        {{-- Toolbar Controls: Results Count, Sort Dropdown & Grid/List View Toggle --}}
        <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1rem; padding-top: 0.85rem; border-top: 1px solid var(--border-subtle);">

            {{-- Result Stats & Active Filters Tag --}}
            <div style="display: flex; align-items: center; gap: 0.75rem; font-size: 0.88rem; color: var(--text-secondary);">
                <span>Showing <strong>{{ $articles->firstItem() ?? 0 }}–{{ $articles->lastItem() ?? 0 }}</strong> of <strong>{{ $articles->total() }}</strong> articles</span>

                @if ($search || $activeCategory)
                    <a href="{{ route('blogs.index') }}" class="badge badge-brand" style="font-size: 0.72rem; text-transform: none;">
                        Clear Filters <i class="bi bi-x-circle-fill"></i>
                    </a>
                @endif
            </div>

            {{-- Sort Dropdown & View Mode Switcher --}}
            <div style="display: flex; align-items: center; gap: 1rem;">

                {{-- Sort Dropdown --}}
                <form action="{{ route('blogs.index') }}" method="GET" id="sortForm" style="display: flex; align-items: center; gap: 0.4rem; font-size: 0.85rem;">
                    @if (request('search'))
                        <input type="hidden" name="search" value="{{ request('search') }}">
                    @endif
                    @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    <label for="sortSelect" style="color: var(--text-muted); font-weight: 500;">Sort:</label>
                    <select name="sort" id="sortSelect" onchange="document.getElementById('sortForm').submit();"
                            style="background: var(--bg-surface-alt); border: 1px solid var(--border-strong); border-radius: var(--radius-sm); padding: 0.35rem 0.75rem; color: var(--text-primary); font-size: 0.85rem; outline: none; cursor: pointer;">
                        <option value="newest" {{ $sort === 'newest' ? 'selected' : '' }}>Newest First</option>
                        <option value="popular" {{ $sort === 'popular' ? 'selected' : '' }}>Most Popular</option>
                        <option value="oldest" {{ $sort === 'oldest' ? 'selected' : '' }}>Oldest First</option>
                    </select>
                </form>

                {{-- Grid / List View Toggle Buttons --}}
                <div style="display: flex; border: 1px solid var(--border-subtle); border-radius: var(--radius-sm); overflow: hidden;">
                    <button type="button" id="gridViewBtn" class="btn-icon" style="border-radius: 0; width: 34px; height: 32px; font-size: 0.95rem; border: none; background: var(--bg-surface-alt); color: var(--brand-accent);" title="Grid View">
                        <i class="bi bi-grid-fill"></i>
                    </button>
                    <button type="button" id="listViewBtn" class="btn-icon" style="border-radius: 0; width: 34px; height: 32px; font-size: 0.95rem; border: none; background: transparent; color: var(--text-muted);" title="List View">
                        <i class="bi bi-view-stacked"></i>
                    </button>
                </div>

            </div>

        </div>

    </div>
</section>

{{-- ════════════════════════════════════════════════════════════
     3. ARTICLE GRID / LIST CONTAINER
     ════════════════════════════════════════════════════════════ --}}
<section class="section">
    <div class="container">

        @if ($articles->isEmpty())
            {{-- Empty State --}}
            <div style="text-align: center; padding: 4rem 1.5rem; background: var(--bg-surface); border: 1px solid var(--border-subtle); border-radius: var(--radius-xl); max-width: 600px; margin: 0 auto;" class="reveal-item">
                <div style="font-size: 3rem; color: var(--brand-accent); margin-bottom: 1rem;">
                    <i class="bi bi-search"></i>
                </div>
                <h3 style="font-size: 1.5rem; margin-bottom: 0.5rem;">No Articles Found</h3>
                <p style="color: var(--text-secondary); font-size: 0.95rem; line-height: 1.6; margin-bottom: 1.5rem;">
                    We couldn't find any articles matching your search criteria. Try using different keywords or browse our full index.
                </p>
                <a href="{{ route('blogs.index') }}" class="btn btn-primary">
                    <i class="bi bi-arrow-counterclockwise"></i> Reset Filters & View All
                </a>
            </div>
        @else
            {{-- Article Cards Grid (Supports toggle to List View via CSS class) --}}
            <div class="article-grid" id="articlesContainer">
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
                        <h2 class="article-card-title">
                            <a href="{{ route('blogs.show', $article->slug) }}">
                                {{ $article->title }}
                            </a>
                        </h2>
                        <p class="article-card-excerpt">
                            {{ $article->excerpt }}
                        </p>

                        <div class="article-card-footer">
                            <div class="article-card-author">
                                <img src="{{ $article->author_avatar ?? 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100&auto=format&fit=crop&q=80' }}" alt="{{ $article->author_name }}">
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

            {{-- ── Laravel Pagination ──────────────────────────────── --}}
            <div style="margin-top: 3.5rem; display: flex; justify-content: center;" class="reveal-item">
                {{ $articles->links('pagination::bootstrap-5') }}
            </div>
        @endif

    </div>
</section>

@endsection

@push('scripts')
<script>
    // ── Grid vs. List View Toggle ────────────────────────────────────
    const gridBtn = document.getElementById('gridViewBtn');
    const listBtn = document.getElementById('listViewBtn');
    const container = document.getElementById('articlesContainer');

    if (gridBtn && listBtn && container) {
        gridBtn.addEventListener('click', () => {
            container.classList.remove('list-view');
            gridBtn.style.background = 'var(--bg-surface-alt)';
            gridBtn.style.color = 'var(--brand-accent)';
            listBtn.style.background = 'transparent';
            listBtn.style.color = 'var(--text-muted)';
            localStorage.setItem('bloghub_view_mode', 'grid');
        });

        listBtn.addEventListener('click', () => {
            container.classList.add('list-view');
            listBtn.style.background = 'var(--bg-surface-alt)';
            listBtn.style.color = 'var(--brand-accent)';
            gridBtn.style.background = 'transparent';
            gridBtn.style.color = 'var(--text-muted)';
            localStorage.setItem('bloghub_view_mode', 'list');
        });

        // Restore user's saved view mode preference
        if (localStorage.getItem('bloghub_view_mode') === 'list') {
            listBtn.click();
        }
    }
</script>
@endpush

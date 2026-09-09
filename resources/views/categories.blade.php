@extends('layouts.app')

@section('title', 'Categories Directory')

@section('meta_description', 'Explore all curated engineering knowledge tracks on BlogHub — from Laravel and modern PHP to distributed systems and web performance.')

@section('content')

{{-- ════════════════════════════════════════════════════════════
     1. CATEGORIES PAGE HERO
     ════════════════════════════════════════════════════════════ --}}
<section class="page-hero-wrapper">
    <div class="container">
        <span class="badge badge-brand reveal-item" style="margin-bottom: 1rem;">
            <i class="bi bi-grid-3x3-gap-fill"></i> Knowledge Directory
        </span>

        <h1 class="display-title reveal-item" style="max-width: 820px; margin-left: auto; margin-right: auto;">
            Explore by <span class="editorial-italic">engineering domain</span> & track.
        </h1>

        <p class="section-desc reveal-item" style="max-width: 600px; margin-left: auto; margin-right: auto; margin-top: 1rem;">
            Curated collections of in-depth articles, production blueprints, and technical walkthroughs organized by specialty.
        </p>

        <div class="reveal-item">
            <nav class="breadcrumb" aria-label="Breadcrumb navigation">
                <a href="{{ route('home') }}" class="breadcrumb-link"><i class="bi bi-house-door"></i> Home</a>
                <span>&bull;</span>
                <span style="color: var(--text-primary); font-weight: 600;">Categories</span>
            </nav>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════════════════════
     2. CATEGORIES DIRECTORY GRID (10+ Cards)
     ════════════════════════════════════════════════════════════ --}}
<section class="section">
    <div class="container">

        <div class="section-header-row reveal-item">
            <div>
                <span class="section-eyebrow"><i class="bi bi-collection-fill"></i> All Tracks ({{ $categories->count() }})</span>
                <h2 class="section-title">Specialized Technical Tracks</h2>
            </div>
            <div>
                <a href="{{ route('blogs.index') }}" class="btn btn-primary">
                    <span>View All Articles</span>
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>

        <div class="category-grid" style="grid-template-columns: repeat(auto-fill, minmax(340px, 1fr)); gap: 1.5rem;">
            @foreach ($categories as $cat)
            <a href="{{ route('blogs.index', ['category' => $cat->slug]) }}" class="category-card reveal-item" style="padding: 1.75rem; flex-direction: column; align-items: flex-start; gap: 1rem;">

                <div style="display: flex; align-items: center; justify-content: space-between; width: 100%;">
                    <div class="category-icon-box">
                        <i class="bi {{ $cat->icon }}"></i>
                    </div>
                    <span class="category-pill {{ $cat->color ?? 'crimson' }}">
                        {{ $cat->articles_count }} {{ Str::plural('Article', $cat->articles_count) }}
                    </span>
                </div>

                <div style="width: 100%;">
                    <h3 class="category-card-title" style="font-size: 1.25rem; margin-bottom: 0.4rem;">
                        {{ $cat->name }}
                    </h3>
                    <p class="category-card-desc" style="font-size: 0.88rem; line-height: 1.6; margin-bottom: 1.25rem; color: var(--text-secondary);">
                        {{ $cat->description }}
                    </p>

                    <div style="display: flex; align-items: center; justify-content: space-between; padding-top: 0.85rem; border-top: 1px solid var(--border-subtle); width: 100%; font-size: 0.82rem; font-weight: 600; color: var(--brand-accent);">
                        <span>Browse Publications</span>
                        <i class="bi bi-arrow-right"></i>
                    </div>
                </div>

            </a>
            @endforeach
        </div>

    </div>
</section>

{{-- ════════════════════════════════════════════════════════════
     3. NEWSLETTER BANNER
     ════════════════════════════════════════════════════════════ --}}
<section class="section-sm" style="padding-bottom: clamp(4rem, 8vw, 6rem);">
    <div class="container">
        <div class="newsletter-banner reveal-item">
            <div class="newsletter-layout">
                <div>
                    <span class="badge badge-brand" style="margin-bottom: 0.85rem;">
                        <i class="bi bi-bell-fill"></i> Stay Updated
                    </span>
                    <h2 style="font-size: clamp(1.8rem, 3.5vw, 2.4rem); margin-bottom: 0.6rem;">
                        Never miss a deep dive in your stack.
                    </h2>
                    <p style="color: var(--text-secondary); font-size: 1rem; line-height: 1.6; max-width: 480px;">
                        Subscribe to get notified when new guides and blueprints are published across any of our technical tracks.
                    </p>
                </div>
                <div>
                    <form class="newsletter-form-row" onsubmit="event.preventDefault(); alert('Subscribed to BlogHub track updates!'); this.reset();">
                        <input type="email" class="newsletter-input-field" placeholder="Enter your email" required aria-label="Newsletter email">
                        <button type="submit" class="btn btn-primary" style="padding: 0.7rem 1.4rem;">
                            <span>Subscribe</span>
                            <i class="bi bi-arrow-right"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@extends('layouts.app')

@section('title', $author->name . ' — Author Profile')

@section('meta_description', $author->bio ?? 'Technical articles, guides, and engineering architecture by ' . $author->name . ' on BlogHub.')

@section('content')

{{-- ════════════════════════════════════════════════════════════
     1. AUTHOR PROFILE HERO WITH COVER BANNER & OVERLAPPING AVATAR
     ════════════════════════════════════════════════════════════ --}}
<div class="author-profile-header" style="background: var(--bg-surface-alt); border-bottom: 1px solid var(--border-subtle); padding-bottom: 3rem;">

    {{-- Panoramic Cover Image --}}
    <div style="width: 100%; height: 260px; position: relative; overflow: hidden; background: linear-gradient(135deg, #1E293B, #0F172A);">
        <img src="{{ $author->cover_image ?? 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=1400&auto=format&fit=crop&q=80' }}"
             alt="{{ $author->name }} Cover"
             style="width: 100%; height: 100%; object-fit: cover; opacity: 0.85;">
        <div style="position: absolute; inset: 0; background: linear-gradient(to bottom, transparent 40%, rgba(9, 13, 22, 0.75) 100%);"></div>
    </div>

    <div class="container">

        {{-- Breadcrumb Navigation --}}
        <div style="margin-top: 1rem; margin-bottom: 1.5rem;">
            <nav class="breadcrumb" aria-label="Breadcrumb navigation" style="justify-content: flex-start;">
                <a href="{{ route('home') }}" class="breadcrumb-link"><i class="bi bi-house-door"></i> Home</a>
                <span>&bull;</span>
                <a href="{{ route('authors.index') }}" class="breadcrumb-link">Authors</a>
                <span>&bull;</span>
                <span style="color: var(--text-primary); font-weight: 600;">{{ $author->name }}</span>
            </nav>
        </div>

        {{-- Profile Header Card (Avatar + Bio info) --}}
        <div style="display: flex; align-items: flex-start; justify-content: space-between; flex-wrap: wrap; gap: 2rem; margin-top: -80px; position: relative; z-index: 2;">

            {{-- Left: Overlapping Avatar & Primary Info --}}
            <div style="display: flex; align-items: flex-end; gap: 1.5rem; flex-wrap: wrap;">
                <img src="{{ $author->avatar }}"
                     alt="{{ $author->name }}"
                     style="width: 130px; height: 130px; border-radius: 50%; object-fit: cover; border: 4px solid var(--bg-surface); box-shadow: var(--shadow-lg); background: var(--bg-surface);">

                <div style="padding-bottom: 0.5rem;">
                    <div style="display: flex; align-items: center; gap: 0.6rem; margin-bottom: 0.25rem;">
                        <h1 class="display-title" style="font-size: clamp(1.8rem, 4vw, 2.5rem); margin: 0;">
                            {{ $author->name }}
                        </h1>
                        <i class="bi bi-patch-check-fill" style="color: var(--brand-accent); font-size: 1.3rem;" title="Verified Staff Author"></i>
                    </div>

                    <div style="font-size: 1rem; font-weight: 600; color: var(--brand-accent); margin-bottom: 0.4rem;">
                        {{ $author->role }}
                    </div>

                    <div style="display: flex; align-items: center; gap: 1.25rem; font-size: 0.85rem; color: var(--text-muted); flex-wrap: wrap;">
                        @if ($author->location)
                            <span><i class="bi bi-geo-alt"></i> {{ $author->location }}</span>
                        @endif
                        @if ($author->website)
                            <a href="{{ $author->website }}" target="_blank" rel="noopener" class="breadcrumb-link">
                                <i class="bi bi-globe"></i> {{ parse_url($author->website, PHP_URL_HOST) ?? $author->website }}
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Right: Actions & Follow Toggle --}}
            <div style="display: flex; align-items: center; gap: 0.75rem; padding-top: 1rem;">
                <button type="button" class="btn btn-primary btn-follow" style="padding: 0.65rem 1.6rem; font-size: 0.92rem;">
                    <i class="bi bi-plus"></i> Follow Author
                </button>

                @if ($author->twitter)
                    <a href="{{ $author->twitter }}" target="_blank" rel="noopener" class="btn-icon" aria-label="Twitter / X"><i class="bi bi-twitter-x"></i></a>
                @endif
                @if ($author->github)
                    <a href="{{ $author->github }}" target="_blank" rel="noopener" class="btn-icon" aria-label="GitHub"><i class="bi bi-github"></i></a>
                @endif
                @if ($author->linkedin)
                    <a href="{{ $author->linkedin }}" target="_blank" rel="noopener" class="btn-icon" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
                @endif
            </div>

        </div>

        {{-- ── 4-Item Stats Bar ──────────────────────────────────── --}}
        <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.5rem; margin-top: 2.5rem; padding: 1.25rem 1.75rem; background: var(--bg-surface); border: 1px solid var(--border-subtle); border-radius: var(--radius-lg); box-shadow: var(--shadow-sm);" class="reveal-item">
            <div class="stat-chip" style="text-align: center;">
                <strong style="font-size: 1.5rem; color: var(--brand-accent);">{{ $author->articles_count }}</strong>
                <span style="font-size: 0.75rem;">Articles Published</span>
            </div>
            <div class="stat-chip" style="text-align: center;">
                <strong style="font-size: 1.5rem; color: var(--text-primary);">{{ number_format($author->followers_count) }}</strong>
                <span style="font-size: 0.75rem;">Followers</span>
            </div>
            <div class="stat-chip" style="text-align: center;">
                <strong style="font-size: 1.5rem; color: var(--text-primary);">{{ number_format($author->following_count) }}</strong>
                <span style="font-size: 0.75rem;">Following</span>
            </div>
            <div class="stat-chip" style="text-align: center;">
                <strong style="font-size: 1.5rem; color: var(--brand-accent);">{{ number_format($totalViews) }}+</strong>
                <span style="font-size: 0.75rem;">Total Article Reads</span>
            </div>
        </div>

    </div>
</div>

{{-- ════════════════════════════════════════════════════════════
     2. AUTHOR BIO & SPECIALTIES
     ════════════════════════════════════════════════════════════ --}}
<section class="section-sm" style="background: var(--bg-surface); border-bottom: 1px solid var(--border-subtle);">
    <div class="container">
        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 3rem; align-items: start;">

            <div>
                <h3 style="font-size: 1.3rem; margin-bottom: 0.75rem; color: var(--text-primary);">
                    About {{ $author->name }}
                </h3>
                <p style="font-size: 1rem; color: var(--text-secondary); line-height: 1.75; margin: 0;">
                    {{ $author->bio }}
                </p>
            </div>

            <div style="background: var(--bg-surface-alt); padding: 1.5rem; border-radius: var(--radius-md); border: 1px solid var(--border-subtle);">
                <h4 style="font-size: 0.82rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.06em; color: var(--text-muted); margin-bottom: 0.85rem;">
                    Core Domains & Focus
                </h4>
                <div style="display: flex; flex-wrap: wrap; gap: 0.4rem;">
                    @if ($author->specialty)
                        <span class="badge badge-brand" style="font-size: 0.78rem; text-transform: none;">
                            <i class="bi bi-star-fill"></i> {{ $author->specialty }}
                        </span>
                    @endif
                    <span class="badge badge-outline" style="font-size: 0.75rem;">Architecture</span>
                    <span class="badge badge-outline" style="font-size: 0.75rem;">Best Practices</span>
                    <span class="badge badge-outline" style="font-size: 0.75rem;">Engineering</span>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════════════════════
     3. AUTHORED ARTICLES GRID
     ════════════════════════════════════════════════════════════ --}}
<section class="section">
    <div class="container">

        <div class="section-header-row reveal-item">
            <div>
                <span class="section-eyebrow"><i class="bi bi-journal-text"></i> Body of Work</span>
                <h2 class="section-title">Published Articles ({{ $author->articles_count }})</h2>
            </div>
        </div>

        @if ($articles->isEmpty())
            <div style="text-align: center; padding: 3rem; background: var(--bg-surface); border: 1px solid var(--border-subtle); border-radius: var(--radius-lg); color: var(--text-muted);">
                <i class="bi bi-journal-x" style="font-size: 2.5rem; display: block; margin-bottom: 0.5rem; color: var(--brand-accent);"></i>
                This author hasn't published any articles yet.
            </div>
        @else
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
                            <div class="article-date-text">
                                <i class="bi bi-calendar3"></i> {{ $article->published_at ? $article->published_at->format('M d, Y') : $article->created_at->format('M d, Y') }}
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

            {{-- ── Pagination ──────────────────────────────────────── --}}
            <div style="margin-top: 3.5rem; display: flex; justify-content: center;" class="reveal-item">
                {{ $articles->links('pagination::bootstrap-5') }}
            </div>
        @endif

    </div>
</section>

@endsection

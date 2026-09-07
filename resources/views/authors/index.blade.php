@extends('layouts.app')

@section('title', 'Authors & Contributors Directory')

@section('meta_description', 'Meet the staff engineers, architects, and technical contributors publishing in-depth guides and blueprints on BlogHub.')

@section('content')

{{-- ════════════════════════════════════════════════════════════
     1. AUTHORS DIRECTORY HERO & SEARCH
     ════════════════════════════════════════════════════════════ --}}
<section class="page-hero-wrapper">
    <div class="container">
        <span class="badge badge-brand reveal-item" style="margin-bottom: 1rem;">
            <i class="bi bi-people-fill"></i> Verified Technical Contributors
        </span>

        <h1 class="display-title reveal-item" style="max-width: 820px; margin-left: auto; margin-right: auto;">
            Meet the engineers <span class="editorial-italic">behind the code</span>.
        </h1>

        <p class="section-desc reveal-item" style="max-width: 600px; margin-left: auto; margin-right: auto; margin-top: 0.8rem;">
            Staff engineers, open-source maintainers, and seasoned leaders sharing battle-tested architectural practices.
        </p>

        {{-- Search Authors Input --}}
        <div class="reveal-item" style="max-width: 560px; margin: 2rem auto 0;">
            <form action="{{ route('authors.index') }}" method="GET" class="newsletter-form-row">
                @if (request('sort'))
                    <input type="hidden" name="sort" value="{{ request('sort') }}">
                @endif
                <i class="bi bi-search" style="color: var(--text-muted); font-size: 1.1rem; margin-right: 0.5rem;"></i>
                <input type="text" name="search" class="newsletter-input-field" placeholder="Search by author name, specialty, or role..." value="{{ $search }}" aria-label="Search authors">
                <button type="submit" class="btn btn-primary btn-sm" style="padding: 0.5rem 1.25rem;">
                    <span>Filter</span>
                </button>
            </form>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════════════════════
     2. TOOLBAR & AUTHORS GRID
     ════════════════════════════════════════════════════════════ --}}
<section class="section" style="padding-top: 2rem;">
    <div class="container">

        {{-- Toolbar: Results Count & Sort Dropdown --}}
        <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1rem; padding-bottom: 1.5rem; margin-bottom: 2rem; border-bottom: 1px solid var(--border-subtle);" class="reveal-item">
            <div style="font-size: 0.9rem; color: var(--text-secondary);">
                <span>Showing <strong>{{ $authors->count() }}</strong> verified contributors</span>
                @if ($search)
                    <a href="{{ route('authors.index') }}" class="badge badge-brand" style="margin-left: 0.5rem; font-size: 0.72rem; text-transform: none;">
                        Clear Search <i class="bi bi-x-circle-fill"></i>
                    </a>
                @endif
            </div>

            {{-- Sorting --}}
            <form action="{{ route('authors.index') }}" method="GET" id="authorSortForm" style="display: flex; align-items: center; gap: 0.4rem; font-size: 0.85rem;">
                @if (request('search'))
                    <input type="hidden" name="search" value="{{ request('search') }}">
                @endif
                <label for="authorSort" style="color: var(--text-muted); font-weight: 500;">Sort By:</label>
                <select name="sort" id="authorSort" onchange="document.getElementById('authorSortForm').submit();"
                        style="background: var(--bg-surface-alt); border: 1px solid var(--border-strong); border-radius: var(--radius-sm); padding: 0.35rem 0.75rem; color: var(--text-primary); font-size: 0.85rem; outline: none; cursor: pointer;">
                    <option value="articles" {{ $sort === 'articles' ? 'selected' : '' }}>Most Published Articles</option>
                    <option value="followers" {{ $sort === 'followers' ? 'selected' : '' }}>Top Followed</option>
                    <option value="name" {{ $sort === 'name' ? 'selected' : '' }}>Alphabetical (A–Z)</option>
                </select>
            </form>
        </div>

        @if ($authors->isEmpty())
            {{-- Empty State --}}
            <div style="text-align: center; padding: 4rem 1.5rem; background: var(--bg-surface); border: 1px solid var(--border-subtle); border-radius: var(--radius-xl); max-width: 600px; margin: 0 auto;" class="reveal-item">
                <div style="font-size: 3rem; color: var(--brand-accent); margin-bottom: 1rem;">
                    <i class="bi bi-person-x"></i>
                </div>
                <h3 style="font-size: 1.5rem; margin-bottom: 0.5rem;">No Authors Found</h3>
                <p style="color: var(--text-secondary); font-size: 0.95rem; line-height: 1.6; margin-bottom: 1.5rem;">
                    We couldn't find any contributors matching "{{ $search }}". Try searching for different names or technical domains.
                </p>
                <a href="{{ route('authors.index') }}" class="btn btn-primary">
                    <i class="bi bi-arrow-counterclockwise"></i> View All Authors
                </a>
            </div>
        @else
            {{-- Authors Cards Grid --}}
            <div class="author-grid" style="grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 1.5rem;">
                @foreach ($authors as $author)
                <div class="author-card reveal-item" style="text-align: left; align-items: flex-start;">

                    {{-- Avatar & Badge --}}
                    <div style="display: flex; align-items: center; justify-content: space-between; width: 100%; margin-bottom: 1.1rem;">
                        <a href="{{ route('authors.show', $author->slug) }}">
                            <img src="{{ asset($author->avatar) }}" alt="{{ $author->name }}" class="author-card-avatar" style="width: 76px; height: 76px; margin-bottom: 0;">
                        </a>
                        <button type="button" class="btn-follow">
                            <i class="bi bi-plus"></i> Follow
                        </button>
                    </div>

                    {{-- Name & Role --}}
                    <h3 class="author-card-name" style="font-size: 1.2rem;">
                        <a href="{{ route('authors.show', $author->slug) }}">
                            {{ $author->name }}
                        </a>
                    </h3>
                    <div class="author-card-role">{{ $author->role }}</div>

                    <div style="font-size: 0.76rem; color: var(--text-faint); margin-bottom: 0.75rem; display: flex; align-items: center; gap: 0.3rem;">
                        <i class="bi bi-geo-alt"></i> {{ $author->location }}
                    </div>

                    <p class="author-card-specialty" style="font-size: 0.85rem; line-height: 1.55; margin-bottom: 1rem;">
                        {{ Str::limit($author->bio, 110) }}
                    </p>

                    {{-- Specialty Tag Pill --}}
                    @if ($author->specialty)
                        <div style="margin-bottom: 1.25rem;">
                            <span class="badge badge-brand" style="font-size: 0.72rem; text-transform: none;">
                                <i class="bi bi-tag-fill"></i> {{ $author->specialty }}
                            </span>
                        </div>
                    @endif

                    {{-- Stats Bar --}}
                    <div class="author-card-stats" style="margin-top: auto;">
                        <div class="stat-chip">
                            <strong>{{ $author->articles_count }}</strong>
                            <span>{{ Str::plural('Article', $author->articles_count) }}</span>
                        </div>
                        <div class="stat-chip">
                            <strong>{{ number_format($author->followers_count) }}</strong>
                            <span>Followers</span>
                        </div>
                    </div>

                    {{-- Direct Profile Link --}}
                    <div style="width: 100%; padding-top: 0.85rem; border-top: 1px solid var(--border-subtle); display: flex; justify-content: space-between; align-items: center;">
                        <a href="{{ route('authors.show', $author->slug) }}" style="font-size: 0.84rem; font-weight: 600; color: var(--brand-accent);">
                            View Author Profile &rarr;
                        </a>
                    </div>

                </div>
                @endforeach
            </div>

            {{-- ── Pagination ──────────────────────────────────────── --}}
            <div style="margin-top: 3.5rem; display: flex; justify-content: center;" class="reveal-item">
                {{ $authors->links('pagination::bootstrap-5') }}
            </div>
        @endif

    </div>
</section>

{{-- ════════════════════════════════════════════════════════════
     3. BECOME AN AUTHOR BANNER
     ════════════════════════════════════════════════════════════ --}}
<section class="section-sm" style="padding-bottom: clamp(4rem, 8vw, 6rem);">
    <div class="container">
        <div class="newsletter-banner reveal-item">
            <div class="newsletter-layout">
                <div>
                    <span class="badge badge-brand" style="margin-bottom: 0.85rem;">
                        <i class="bi bi-feather"></i> Join Our Editorial Network
                    </span>
                    <h2 style="font-size: clamp(1.8rem, 3.5vw, 2.4rem); margin-bottom: 0.6rem;">
                        Share your engineering expertise with 120K+ readers.
                    </h2>
                    <p style="color: var(--text-secondary); font-size: 1rem; line-height: 1.6; max-width: 480px;">
                        BlogHub verified authors receive hands-on copyediting, technical peer review, and full author attribution across our global syndication network.
                    </p>
                </div>
                <div>
                    <a href="{{ route('contact') }}" class="btn btn-primary btn-lg">
                        <span>Apply as Author</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

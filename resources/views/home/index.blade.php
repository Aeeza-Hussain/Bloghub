@extends('layouts.app')

@section('title', 'Home')

@section('meta_description', 'Discover in-depth engineering breakdowns, modern architecture patterns, and web development insights on BlogHub.')

@section('content')

{{-- ════════════════════════════════════════════════════════════
     1. HERO SECTION: Editorial Split Layout
     ════════════════════════════════════════════════════════════ --}}
<section class="hero-wrapper">
    <div class="container">
        <div class="hero-grid">

            {{-- Left: Headline & Actions --}}
            <div class="hero-content">
                <div class="hero-eyebrow reveal-item">
                    <i class="bi bi-patch-check-fill"></i>
                    <span>Peer-Reviewed Engineering Journal</span>
                </div>

                <h1 class="display-title hero-headline reveal-item">
                    Insightful writing on <span class="editorial-italic">software engineering</span> & architecture.
                </h1>

                <p class="hero-subtext reveal-item">
                    In-depth articles, production blueprints, and architectural breakdowns curated for engineers, architects, and technical leaders.
                </p>

                <div class="hero-cta-group reveal-item">
                    <a href="#articles" class="btn btn-primary btn-lg">
                        <span>Read Featured Articles</span>
                        <i class="bi bi-arrow-down"></i>
                    </a>
                    <a href="{{ route('about') }}" class="btn btn-secondary btn-lg">
                        <span>Our Editorial Mission</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>

                {{-- Trust Proof Band --}}
                <div class="hero-trust-band reveal-item">
                    <div class="avatar-stack">
                        <img src="{{ asset('images/avatars/avatar-1.svg') }}" alt="Reader" class="avatar-stack-item">
                        <img src="{{ asset('images/avatars/avatar-2.svg') }}" alt="Reader" class="avatar-stack-item">
                        <img src="{{ asset('images/avatars/avatar-3.svg') }}" alt="Reader" class="avatar-stack-item">
                        <img src="{{ asset('images/avatars/avatar-4.svg') }}" alt="Reader" class="avatar-stack-item">
                    </div>
                    <div class="trust-caption">
                        Read by <strong>120,000+ developers</strong> and tech leads worldwide.
                    </div>
                </div>
            </div>

            {{-- Right: Spotlight Flagship Article Card --}}
            <div class="reveal-item">
                <article class="spotlight-card">
                    <div class="spotlight-media">
                        <img src="{{ asset($heroArticle['image']) }}" alt="{{ $heroArticle['title'] }}" loading="eager">
                        <div class="spotlight-badge-overlay">
                            <span class="badge badge-brand">
                                <span class="badge-dot"></span>
                                Editor's Choice
                            </span>
                        </div>
                    </div>
                    <div class="spotlight-body">
                        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.75rem;">
                            <span class="category-pill crimson">{{ $heroArticle['category'] }}</span>
                            <span class="article-read-meta">
                                <i class="bi bi-clock"></i> {{ $heroArticle['read'] }}
                            </span>
                        </div>

                        <h2 class="spotlight-title">
                            <a href="#articles">{{ $heroArticle['title'] }}</a>
                        </h2>

                        <p class="spotlight-excerpt">
                            {{ $heroArticle['excerpt'] }}
                        </p>

                        <div class="article-byline">
                            <div class="author-meta-block">
                                <img src="{{ asset($heroArticle['author_avatar']) }}" alt="{{ $heroArticle['author'] }}" class="author-avatar-img">
                                <div>
                                    <div class="author-name">{{ $heroArticle['author'] }}</div>
                                    <div class="author-sub">{{ $heroArticle['author_role'] }} &bull; {{ $heroArticle['date'] }}</div>
                                </div>
                            </div>
                            <div class="article-metrics">
                                <span title="Views"><i class="bi bi-eye"></i> {{ $heroArticle['views'] }}</span>
                                <span title="Comments"><i class="bi bi-chat-text"></i> {{ $heroArticle['comments'] }}</span>
                            </div>
                        </div>
                    </div>
                </article>
            </div>

        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════════════════════
     2. TRENDING ARTICLES TICKER
     ════════════════════════════════════════════════════════════ --}}
<section class="trending-strip">
    <div class="container">
        <div class="trending-grid">
            @foreach ($trendingPosts as $trend)
            <div class="trending-item reveal-item">
                <span class="trending-rank">{{ $trend['rank'] }}</span>
                <div class="trending-content">
                    <h4><a href="#articles">{{ $trend['title'] }}</a></h4>
                    <div class="trending-meta">
                        <span><i class="bi bi-tag"></i> {{ $trend['category'] }}</span>
                        <span>&bull;</span>
                        <span><i class="bi bi-clock"></i> {{ $trend['read'] }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════════════════════
     3. FEATURED ARTICLES GRID
     ════════════════════════════════════════════════════════════ --}}
<section class="section" id="articles">
    <div class="container">

        <div class="section-header-row reveal-item">
            <div>
                <span class="section-eyebrow"><i class="bi bi-journal-richtext"></i> Curated Reading</span>
                <h2 class="section-title">Deep Dives & Technical Guides</h2>
                <p class="section-desc">Practical, real-world tutorials with source code, benchmarks, and actionable design decisions.</p>
            </div>
            <div>
                <a href="{{ route('about') }}" class="btn btn-outline">
                    <span>Explore All 250+ Articles</span>
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>

        <div class="article-grid">
            @foreach ($featuredPosts as $post)
            <article class="article-card reveal-item">
                <div class="article-card-media">
                    <img src="{{ asset($post['image']) }}" alt="{{ $post['title'] }}" loading="lazy">
                    <div class="article-card-badge">
                        <span class="category-pill {{ $post['tag_color'] }}">{{ $post['category'] }}</span>
                    </div>
                </div>

                <div class="article-card-body">
                    <h3 class="article-card-title">
                        <a href="{{ route('about') }}">{{ $post['title'] }}</a>
                    </h3>
                    <p class="article-card-excerpt">
                        {{ $post['excerpt'] }}
                    </p>

                    <div class="article-card-footer">
                        <div class="article-card-author">
                            <img src="{{ asset($post['author_avatar']) }}" alt="{{ $post['author'] }}">
                            <div>
                                <div class="author-name-text">{{ $post['author'] }}</div>
                                <div class="article-date-text">{{ $post['date'] }}</div>
                            </div>
                        </div>
                        <div class="article-metrics">
                            <span><i class="bi bi-clock"></i> {{ $post['read'] }}</span>
                            <span><i class="bi bi-eye"></i> {{ $post['views'] }}</span>
                        </div>
                    </div>
                </div>
            </article>
            @endforeach
        </div>

    </div>
</section>

{{-- ════════════════════════════════════════════════════════════
     4. CATEGORIES SHOWCASE
     ════════════════════════════════════════════════════════════ --}}
<section class="section-sm" id="categories" style="background: var(--bg-surface-alt); border-top: 1px solid var(--border-subtle); border-bottom: 1px solid var(--border-subtle);">
    <div class="container">

        <div class="section-header text-center reveal-item">
            <span class="section-eyebrow"><i class="bi bi-grid-3x3-gap"></i> Knowledge Hub</span>
            <h2 class="section-title">Explore by Engineering Domain</h2>
            <p class="section-desc">Browse specialized knowledge tracks across backend architecture, reactive interfaces, and cloud operations.</p>
        </div>

        <div class="category-grid">
            @foreach ($categories as $category)
            <a href="#articles" class="category-card reveal-item">
                <div class="category-icon-box">
                    <i class="bi {{ $category['icon'] }}"></i>
                </div>
                <div style="flex-grow: 1;">
                    <h3 class="category-card-title">{{ $category['name'] }}</h3>
                    <p class="category-card-desc">{{ $category['description'] }}</p>
                    <span class="category-count-badge">{{ $category['count'] }} Articles Available &rarr;</span>
                </div>
            </a>
            @endforeach
        </div>

    </div>
</section>

{{-- ════════════════════════════════════════════════════════════
     5. FEATURED AUTHORS
     ════════════════════════════════════════════════════════════ --}}
<section class="section">
    <div class="container">

        <div class="section-header-row reveal-item">
            <div>
                <span class="section-eyebrow"><i class="bi bi-people-fill"></i> Industry Voices</span>
                <h2 class="section-title">Featured Contributors</h2>
                <p class="section-desc">Staff engineers, open-source maintainers, and seasoned leads sharing real battle-tested practices.</p>
            </div>
            <div>
                <a href="{{ route('contact') }}" class="btn btn-secondary">
                    <i class="bi bi-pencil-square"></i>
                    <span>Apply as Contributor</span>
                </a>
            </div>
        </div>

        <div class="author-grid">
            @foreach ($authors as $author)
            <div class="author-card reveal-item">
                <img src="{{ asset($author['avatar']) }}" alt="{{ $author['name'] }}" class="author-card-avatar" loading="lazy">
                <h3 class="author-card-name">{{ $author['name'] }}</h3>
                <div class="author-card-role">{{ $author['role'] }}</div>
                <p class="author-card-specialty">{{ $author['specialty'] }}</p>

                <div class="author-card-stats">
                    <div class="stat-chip">
                        <strong>{{ $author['articles'] }}</strong>
                        <span>Articles</span>
                    </div>
                    <div class="stat-chip">
                        <strong>{{ $author['followers'] }}</strong>
                        <span>Followers</span>
                    </div>
                </div>

                <button type="button" class="btn-follow">
                    <i class="bi bi-plus"></i> Follow
                </button>
            </div>
            @endforeach
        </div>

    </div>
</section>

{{-- ════════════════════════════════════════════════════════════
     6. STATISTICS BAND
     ════════════════════════════════════════════════════════════ --}}
<section class="stats-band">
    <div class="container">
        <div class="stats-grid">
            @foreach ($stats as $stat)
            <div class="stat-card reveal-item">
                <div class="stat-number">{{ $stat['number'] }}</div>
                <div class="stat-title">{{ $stat['label'] }}</div>
                <div class="stat-sub">{{ $stat['sub'] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════════════════════
     7. TESTIMONIALS
     ════════════════════════════════════════════════════════════ --}}
<section class="section">
    <div class="container">

        <div class="section-header text-center reveal-item">
            <span class="section-eyebrow"><i class="bi bi-chat-quote-fill"></i> Community Endorsements</span>
            <h2 class="section-title">Trusted by Engineering Leaders</h2>
            <p class="section-desc">What developers, architects, and engineering managers say about reading BlogHub.</p>
        </div>

        <div class="testimonial-grid">
            @foreach ($testimonials as $t)
            <div class="testimonial-card reveal-item">
                <div>
                    <div class="star-rating">
                        @for ($i = 0; $i < $t['rating']; $i++)
                            <i class="bi bi-star-fill"></i>
                        @endfor
                    </div>
                    <p class="testimonial-quote">"{{ $t['quote'] }}"</p>
                </div>
                <div class="testimonial-author">
                    <img src="{{ asset($t['avatar']) }}" alt="{{ $t['author'] }}" loading="lazy">
                    <div>
                        <div class="author-name" style="font-size: 0.95rem;">{{ $t['author'] }}</div>
                        <div class="author-sub">{{ $t['role'] }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>

{{-- ════════════════════════════════════════════════════════════
     8. NEWSLETTER BANNER
     ════════════════════════════════════════════════════════════ --}}
<section class="section-sm" style="padding-bottom: clamp(4rem, 8vw, 6rem);">
    <div class="container">
        <div class="newsletter-banner reveal-item">
            <div class="newsletter-layout">
                <div>
                    <span class="badge badge-brand" style="margin-bottom: 0.85rem;">
                        <i class="bi bi-envelope-paper-heart-fill"></i> Weekly Edition
                    </span>
                    <h2 style="font-size: clamp(1.8rem, 3.5vw, 2.4rem); margin-bottom: 0.6rem;">
                        Sharpen your engineering craft.
                    </h2>
                    <p style="color: var(--text-secondary); font-size: 1rem; line-height: 1.6; max-width: 480px;">
                        Get our hand-picked architectural blueprints, benchmarks, and deep-dive code walkthroughs delivered once every week.
                    </p>
                </div>
                <div>
                    <form class="newsletter-form-row" onsubmit="event.preventDefault(); alert('Welcome to the BlogHub weekly digest!'); this.reset();">
                        <input type="email" class="newsletter-input-field" placeholder="Enter your work email address" required aria-label="Newsletter email">
                        <button type="submit" class="btn btn-primary" style="padding: 0.7rem 1.4rem;">
                            <span>Subscribe Free</span>
                            <i class="bi bi-arrow-right"></i>
                        </button>
                    </form>
                    <p style="font-size: 0.78rem; color: var(--text-faint); margin-top: 0.75rem; margin-left: 0.5rem;">
                        <i class="bi bi-lock-fill"></i> No spam. Unsubscribe with a single click at any time.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

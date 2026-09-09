@extends('layouts.app')

@section('title', 'About Our Publication')

@section('meta_description', 'Learn about BlogHub — our editorial philosophy, peer-review standards, and the engineering practitioners who write for us.')

@section('content')

{{-- ════════════════════════════════════════════════════════════
     1. ABOUT HERO: Editorial Headline & Breadcrumb
     ════════════════════════════════════════════════════════════ --}}
<section class="page-hero-wrapper">
    <div class="container">
        <span class="badge badge-brand reveal-item" style="margin-bottom: 1rem;">
            <i class="bi bi-shield-lock-fill"></i> Editorial Philosophy
        </span>

        <h1 class="display-title reveal-item" style="max-width: 820px; margin-left: auto; margin-right: auto;">
            Setting a higher bar for <span class="editorial-italic">developer education</span>.
        </h1>

        <p class="section-desc reveal-item" style="max-width: 620px; margin-left: auto; margin-right: auto; margin-top: 1rem;">
            BlogHub is an independent, engineer-driven publication committed to rigorous technical writing, reproducible benchmarks, and zero fluff.
        </p>

        <div class="reveal-item">
            <nav class="breadcrumb" aria-label="Breadcrumb navigation">
                <a href="{{ route('home') }}" class="breadcrumb-link"><i class="bi bi-house-door"></i> Home</a>
                <span>&bull;</span>
                <span style="color: var(--text-primary); font-weight: 600;">About Publication</span>
            </nav>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════════════════════
     2. STORYTELLING: Split Composition
     ════════════════════════════════════════════════════════════ --}}
<section class="section">
    <div class="container">
        <div class="storytelling-grid">

            {{-- Media Stack with Floating Glass Metric Card --}}
            <div class="story-media-stack reveal-item">
                <img src="{{ asset('images/about/team.svg') }}" alt="BlogHub Editorial Team Working" class="story-primary-img">
                <div class="story-floating-card">
                    <div class="story-icon-badge">
                        <i class="bi bi-graph-up-arrow"></i>
                    </div>
                    <div>
                        <div style="font-size: 1.15rem; font-weight: 700; color: var(--text-primary); font-family: var(--font-heading);">120,000+</div>
                        <div style="font-size: 0.78rem; color: var(--text-secondary);">Monthly active developers across 140 countries</div>
                    </div>
                </div>
            </div>

            {{-- Storytelling Prose --}}
            <div class="story-prose reveal-item">
                <span class="section-eyebrow"><i class="bi bi-bookmark-heart"></i> Why We Exist</span>
                <h2 class="section-title" style="margin-bottom: 1.25rem;">
                    From Frustrating Noise to <span class="text-gradient">Actionable Depth</span>
                </h2>

                <p>
                    Modern web development moves at breakneck speed. Yet too much technical content on the internet has become shallow: rewritten docs, AI-hallucinated snippets, and sponsored promotions posing as architectural advice.
                </p>

                <p>
                    We founded <strong>BlogHub</strong> in 2023 with a simple manifesto: create the publication we wished we had throughout our careers. Every article here is written by active practitioners and verified against actual production codebases.
                </p>

                <div style="background: var(--bg-surface-alt); border-left: 3px solid var(--brand-accent); padding: 1.25rem 1.5rem; border-radius: 0 var(--radius-md) var(--radius-md) 0; margin: 1.5rem 0;">
                    <p style="font-family: var(--font-heading); font-size: 1.05rem; font-style: italic; color: var(--text-primary); margin-bottom: 0.35rem;">
                        "If a junior or staff engineer reads an article on BlogHub, they should be able to apply the pattern directly into their codebase without guesswork."
                    </p>
                    <span style="font-size: 0.8rem; font-weight: 600; color: var(--brand-accent);">&mdash; Alex Johnson, Editor-in-Chief</span>
                </div>

                <div style="display: flex; gap: 1rem; flex-wrap: wrap; margin-top: 1.75rem;">
                    <a href="{{ route('contact') }}" class="btn btn-primary">
                        <i class="bi bi-pencil-square"></i> Pitch an Article
                    </a>
                    <a href="{{ route('blogs.index') }}" class="btn btn-secondary">
                        Browse Publications
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════════════════════
     3. CORE PILLARS / VALUES
     ════════════════════════════════════════════════════════════ --}}
<section class="section" style="background: var(--bg-surface-alt); border-top: 1px solid var(--border-subtle); border-bottom: 1px solid var(--border-subtle);">
    <div class="container">

        <div class="section-header text-center reveal-item">
            <span class="section-eyebrow"><i class="bi bi-compass"></i> Guiding Principles</span>
            <h2 class="section-title">Our Editorial Standards</h2>
            <p class="section-desc">The four foundational pillars that govern every word and code block published on BlogHub.</p>
        </div>

        <div class="values-grid">
            @foreach ($values as $val)
            <div class="value-box reveal-item">
                <span class="value-num">{{ $val['number'] }}</span>
                <div class="value-icon-circle">
                    <i class="bi {{ $val['icon'] }}"></i>
                </div>
                <h3 class="value-title">{{ $val['title'] }}</h3>
                <p class="value-desc">{{ $val['text'] }}</p>
            </div>
            @endforeach
        </div>

    </div>
</section>

{{-- ════════════════════════════════════════════════════════════
     4. EDITORIAL TEAM & LEADERSHIP
     ════════════════════════════════════════════════════════════ --}}
<section class="section">
    <div class="container">

        <div class="section-header-row reveal-item">
            <div>
                <span class="section-eyebrow"><i class="bi bi-people"></i> Editorial Board</span>
                <h2 class="section-title">The People Behind the Publication</h2>
                <p class="section-desc">A focused editorial committee of architects, developers, and technical authors.</p>
            </div>
            <div>
                <a href="{{ route('contact') }}" class="btn btn-outline">
                    <span>Contact Editorial Desk</span>
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>

        <div class="author-grid">
            @foreach ($team as $member)
            <div class="author-card reveal-item" style="text-align: left; align-items: flex-start;">
                <img src="{{ asset($member['avatar']) }}" alt="{{ $member['name'] }}" class="author-card-avatar" style="width: 80px; height: 80px; margin-bottom: 1.1rem;" loading="lazy">
                <h3 class="author-card-name">{{ $member['name'] }}</h3>
                <div class="author-card-role" style="margin-bottom: 0.35rem;">{{ $member['role'] }}</div>
                <div style="font-size: 0.76rem; color: var(--text-faint); margin-bottom: 0.75rem; display: flex; align-items: center; gap: 0.3rem;">
                    <i class="bi bi-geo-alt"></i> {{ $member['location'] }}
                </div>
                <p class="author-card-specialty" style="margin-bottom: 1.25rem;">{{ $member['bio'] }}</p>

                <div class="social-links-row" style="margin-top: auto; border-top: 1px solid var(--border-subtle); padding-top: 0.85rem; width: 100%;">
                    <a href="{{ $member['twitter'] }}" target="_blank" rel="noopener" class="btn-icon" style="width: 32px; height: 32px; font-size: 0.8rem;" aria-label="Twitter">
                        <i class="bi bi-twitter-x"></i>
                    </a>
                    <a href="{{ $member['github'] }}" target="_blank" rel="noopener" class="btn-icon" style="width: 32px; height: 32px; font-size: 0.8rem;" aria-label="GitHub">
                        <i class="bi bi-github"></i>
                    </a>
                    <a href="{{ $member['linkedin'] }}" target="_blank" rel="noopener" class="btn-icon" style="width: 32px; height: 32px; font-size: 0.8rem;" aria-label="LinkedIn">
                        <i class="bi bi-linkedin"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>

{{-- ════════════════════════════════════════════════════════════
     5. PLATFORM MILESTONES & TIMELINE
     ════════════════════════════════════════════════════════════ --}}
<section class="section-sm" style="background: var(--bg-surface-alt); border-top: 1px solid var(--border-subtle);">
    <div class="container">

        <div class="section-header text-center reveal-item">
            <span class="section-eyebrow"><i class="bi bi-clock-history"></i> Evolution</span>
            <h2 class="section-title">Key Milestones</h2>
            <p class="section-desc">How our humble tech newsletter grew into a global engineering publishing hub.</p>
        </div>

        <div class="timeline-grid">
            @foreach ($milestones as $m)
            <div class="timeline-item reveal-item">
                <div class="timeline-year">{{ $m['year'] }}</div>
                <h3 class="timeline-title">{{ $m['title'] }}</h3>
                <p class="timeline-desc">{{ $m['desc'] }}</p>
            </div>
            @endforeach
        </div>

    </div>
</section>

{{-- ════════════════════════════════════════════════════════════
     6. JOIN AS AN AUTHOR CTA BANNER
     ════════════════════════════════════════════════════════════ --}}
<section class="section">
    <div class="container">
        <div class="newsletter-banner reveal-item" style="background: linear-gradient(135deg, var(--bg-surface) 0%, var(--bg-surface-alt) 100%);">
            <div class="newsletter-layout">
                <div>
                    <span class="badge badge-brand" style="margin-bottom: 0.85rem;">
                        <i class="bi bi-pen-fill"></i> Join the Cohort
                    </span>
                    <h2 style="font-size: clamp(1.8rem, 3.5vw, 2.3rem); margin-bottom: 0.6rem;">
                        Have an architectural pattern to share?
                    </h2>
                    <p style="color: var(--text-secondary); font-size: 1rem; line-height: 1.6; max-width: 500px;">
                        We partner with engineers and architects to publish peer-reviewed articles. Benefit from full editorial review, copyediting, and exposure to 120K+ technical leaders.
                    </p>
                </div>
                <div style="display: flex; flex-direction: column; align-items: flex-start; gap: 1rem;">
                    <a href="{{ route('contact') }}" class="btn btn-primary btn-lg">
                        <i class="bi bi-send-fill"></i> Submit an Article Pitch
                    </a>
                    <span style="font-size: 0.82rem; color: var(--text-muted);">
                        <i class="bi bi-check-circle-fill" style="color: var(--brand-accent);"></i> Editorial decisions communicated within 48 hours.
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

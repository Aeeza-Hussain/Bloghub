@extends('layouts.app')

@section('title', $article->title)

@section('meta_description', $article->excerpt)

@section('content')

{{-- ════════════════════════════════════════════════════════════
     1. ARTICLE HERO & METADATA BAR
     ════════════════════════════════════════════════════════════ --}}
<article class="article-detail-wrapper">
    <header class="page-hero-wrapper" style="text-align: left; padding: clamp(2.5rem, 5vw, 4rem) 0 2rem;">
        <div class="container container-narrow">

            {{-- Breadcrumb Navigation --}}
            <nav class="breadcrumb reveal-item" aria-label="Breadcrumb navigation" style="justify-content: flex-start; margin-top: 0; margin-bottom: 1.25rem;">
                <a href="{{ route('home') }}" class="breadcrumb-link"><i class="bi bi-house-door"></i> Home</a>
                <span>&bull;</span>
                <a href="{{ route('blogs.index') }}" class="breadcrumb-link">Articles</a>
                <span>&bull;</span>
                <a href="{{ route('blogs.index', ['category' => $article->category->slug]) }}" class="breadcrumb-link">{{ $article->category->name }}</a>
            </nav>

            {{-- Category Pill --}}
            <div class="reveal-item" style="margin-bottom: 1rem;">
                <span class="category-pill {{ $article->category->color ?? 'crimson' }}">
                    {{ $article->category->name }}
                </span>
            </div>

            {{-- Article Title --}}
            <h1 class="display-title reveal-item" style="font-size: clamp(2.2rem, 4.5vw, 3.4rem); margin-bottom: 1.2rem; line-height: 1.15;">
                {{ $article->title }}
            </h1>

            {{-- Article Excerpt / Subtitle --}}
            <p class="section-desc reveal-item" style="font-size: 1.15rem; color: var(--text-secondary); max-width: 100%; margin-bottom: 2rem;">
                {{ $article->excerpt }}
            </p>

            {{-- Author Byline & Sharing Actions Row --}}
            <div class="article-byline-bar reveal-item" style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1.25rem; padding: 1.25rem 0; border-top: 1px solid var(--border-subtle); border-bottom: 1px solid var(--border-subtle);">

                {{-- Author Info --}}
                <div style="display: flex; align-items: center; gap: 0.85rem;">
                    <img src="{{ $article->author_avatar ?? 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=120&auto=format&fit=crop&q=80' }}" alt="{{ $article->author_name }}" style="width: 46px; height: 46px; border-radius: 50%; object-fit: cover; border: 2px solid var(--bg-surface-alt);">
                    <div>
                        <div style="font-size: 0.95rem; font-weight: 700; color: var(--text-primary);">{{ $article->author_name }}</div>
                        <div style="font-size: 0.8rem; color: var(--text-muted);">
                            {{ $article->author_role }} &bull; Published {{ $article->published_at ? $article->published_at->format('M d, Y') : $article->created_at->format('M d, Y') }}
                        </div>
                    </div>
                </div>

                {{-- Metrics & Share Controls --}}
                <div style="display: flex; align-items: center; gap: 0.75rem;">

                    {{-- Reading Time & Views --}}
                    <div style="font-family: var(--font-mono); font-size: 0.82rem; color: var(--text-muted); display: flex; gap: 0.75rem; margin-right: 0.5rem;">
                        <span><i class="bi bi-clock"></i> {{ $article->reading_time }}</span>
                        <span><i class="bi bi-eye"></i> {{ number_format($article->views) }} views</span>
                    </div>

                    {{-- Interactive Like Button --}}
                    <button type="button" class="btn-icon" id="likeArticleBtn" aria-label="Like article" title="Applaud article" style="gap: 0.35rem; width: auto; padding: 0 0.85rem; border-radius: var(--radius-full);">
                        <i class="bi bi-heart" id="likeIcon" style="color: var(--brand-accent);"></i>
                        <span id="likeCount" style="font-size: 0.85rem; font-weight: 600; font-family: var(--font-mono);">{{ $article->likes }}</span>
                    </button>

                    {{-- Copy Link Button --}}
                    <button type="button" class="btn-icon" id="copyLinkBtn" aria-label="Copy link to clipboard" title="Copy article URL">
                        <i class="bi bi-link-45deg" style="font-size: 1.2rem;"></i>
                    </button>

                </div>

            </div>

        </div>
    </header>

    {{-- ════════════════════════════════════════════════════════════
         2. FEATURED HERO IMAGE
         ════════════════════════════════════════════════════════════ --}}
    <div class="container container-narrow" style="margin-top: 2rem;">
        <div style="position: relative; border-radius: var(--radius-xl); overflow: hidden; box-shadow: var(--shadow-lg); border: 1px solid var(--border-subtle);" class="reveal-item">
            <img src="{{ $article->image }}" alt="{{ $article->title }}" style="width: 100%; aspect-ratio: 16 / 9; object-fit: cover;">
        </div>
    </div>

    {{-- ════════════════════════════════════════════════════════════
         3. RICH ARTICLE BODY PROSE
         ════════════════════════════════════════════════════════════ --}}
    <div class="section" style="padding-top: 3rem;">
        <div class="container container-narrow">
            <div class="article-prose-content reveal-item">
                {!! $article->content !!}
            </div>

            {{-- Article Tags --}}
            @if ($article->tags)
                <div style="margin-top: 3rem; padding-top: 1.5rem; border-top: 1px solid var(--border-subtle); display: flex; align-items: center; flex-wrap: wrap; gap: 0.5rem;" class="reveal-item">
                    <span style="font-size: 0.82rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase; margin-right: 0.4rem;">
                        <i class="bi bi-tags-fill"></i> Tags:
                    </span>
                    @foreach (explode(',', $article->tags) as $tag)
                        <span class="badge badge-outline" style="font-size: 0.78rem;">
                            #{{ trim($tag) }}
                        </span>
                    @endforeach
                </div>
            @endif

            {{-- ════════════════════════════════════════════════════════════
                 4. AUTHOR EXPANDED PROFILE CARD
                 ════════════════════════════════════════════════════════════ --}}
            <div class="author-bio-card reveal-item" style="margin-top: 3rem; background: var(--bg-surface); border: 1px solid var(--border-subtle); border-radius: var(--radius-xl); padding: 2rem; display: flex; align-items: flex-start; gap: 1.5rem; box-shadow: var(--shadow-sm);">
                <img src="{{ $article->author_avatar ?? 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=160&auto=format&fit=crop&q=80' }}" alt="{{ $article->author_name }}" style="width: 72px; height: 72px; border-radius: 50%; object-fit: cover; flex-shrink: 0; border: 3px solid var(--bg-surface-alt);">
                <div>
                    <div style="font-size: 0.75rem; font-weight: 700; color: var(--brand-accent); text-transform: uppercase; letter-spacing: 0.06em; margin-bottom: 0.2rem;">Written By</div>
                    <h3 style="font-size: 1.3rem; margin-bottom: 0.3rem; color: var(--text-primary);">{{ $article->author_name }}</h3>
                    <div style="font-size: 0.85rem; color: var(--text-muted); margin-bottom: 0.75rem;">{{ $article->author_role }}</div>
                    <p style="font-size: 0.92rem; color: var(--text-secondary); line-height: 1.6; margin-bottom: 1rem;">
                        Active engineer and technical contributor on BlogHub. Specializing in high-availability web patterns, performance benchmarking, and developer ergonomics.
                    </p>
                    <div class="social-links-row">
                        <a href="https://x.com" target="_blank" rel="noopener" class="btn-icon" style="width: 32px; height: 32px; font-size: 0.8rem;" aria-label="Twitter"><i class="bi bi-twitter-x"></i></a>
                        <a href="https://github.com" target="_blank" rel="noopener" class="btn-icon" style="width: 32px; height: 32px; font-size: 0.8rem;" aria-label="GitHub"><i class="bi bi-github"></i></a>
                        <a href="https://linkedin.com" target="_blank" rel="noopener" class="btn-icon" style="width: 32px; height: 32px; font-size: 0.8rem;" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
            </div>

            {{-- ════════════════════════════════════════════════════════════
                 5. COMMENTS & DISCUSSION SECTION
                 ════════════════════════════════════════════════════════════ --}}
            <section id="comments" style="margin-top: 4rem; padding-top: 3rem; border-top: 1px solid var(--border-subtle);">
                <div class="reveal-item">
                    <span class="section-eyebrow"><i class="bi bi-chat-square-quote-fill"></i> Community Feedback</span>
                    <h2 class="section-title" style="margin-bottom: 2rem;">
                        Discussion & Remarks ({{ $article->comments->count() }})
                    </h2>
                </div>

                {{-- Flash Message Display --}}
                @if (session('success'))
                    <div class="alert-banner alert-banner-success reveal-item">
                        <i class="bi bi-check-circle-fill" style="font-size: 1.2rem; flex-shrink: 0;"></i>
                        <div>
                            <strong>Comment Published!</strong>
                            <p style="margin: 0; font-size: 0.9rem;">{{ session('success') }}</p>
                        </div>
                    </div>
                @endif

                {{-- List of Existing Comments --}}
                <div class="comments-thread" style="display: flex; flex-direction: column; gap: 1.25rem; margin-bottom: 3.5rem;">
                    @forelse ($article->comments as $comment)
                        <div class="comment-item-card reveal-item" style="background: var(--bg-surface); border: 1px solid var(--border-subtle); border-radius: var(--radius-lg); padding: 1.5rem; box-shadow: var(--shadow-sm);">
                            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.75rem;">
                                <div style="display: flex; align-items: center; gap: 0.75rem;">
                                    <img src="{{ $comment->author_avatar ?? 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?w=80&auto=format&fit=crop&q=80' }}" alt="{{ $comment->author_name }}" style="width: 36px; height: 36px; border-radius: 50%; object-fit: cover;">
                                    <div>
                                        <div style="font-size: 0.92rem; font-weight: 700; color: var(--text-primary);">{{ $comment->author_name }}</div>
                                        <div style="font-size: 0.76rem; color: var(--text-muted);">{{ $comment->created_at->diffForHumans() }}</div>
                                    </div>
                                </div>
                                <span class="badge badge-outline" style="font-size: 0.7rem;">Verified Reader</span>
                            </div>
                            <p style="font-size: 0.93rem; color: var(--text-secondary); line-height: 1.65; margin: 0;">
                                {{ $comment->content }}
                            </p>
                        </div>
                    @empty
                        <div style="padding: 2rem; text-align: center; background: var(--bg-surface-alt); border-radius: var(--radius-md); color: var(--text-muted); font-size: 0.95rem;">
                            <i class="bi bi-chat-left-dots" style="font-size: 1.8rem; display: block; margin-bottom: 0.5rem; color: var(--brand-accent);"></i>
                            No comments yet. Be the first to share your perspective!
                        </div>
                    @endforelse
                </div>

                {{-- Leave a Comment Form Card --}}
                <div class="contact-form-card reveal-item">
                    <h3 style="font-size: 1.5rem; margin-bottom: 0.35rem; color: var(--text-primary);">
                        Leave a Comment
                    </h3>
                    <p style="color: var(--text-secondary); font-size: 0.9rem; margin-bottom: 1.5rem;">
                        Share your thoughts, questions, or architectural feedback on this guide.
                    </p>

                    <form action="{{ route('blogs.comments.store', $article->id) }}" method="POST">
                        @csrf

                        <div class="form-row-2">
                            {{-- Author Name --}}
                            <div class="form-group">
                                <label for="author_name" class="form-label">
                                    <span>Your Name</span>
                                    <span class="required">*</span>
                                </label>
                                <div class="input-with-icon">
                                    <i class="bi bi-person input-icon"></i>
                                    <input type="text" id="author_name" name="author_name" class="form-control @error('author_name') is-invalid @enderror" placeholder="Alex Rivera" value="{{ old('author_name') }}" required>
                                </div>
                                @error('author_name')
                                    <div class="error-message"><i class="bi bi-exclamation-triangle-fill"></i> <span>{{ $message }}</span></div>
                                @enderror
                            </div>

                            {{-- Author Email --}}
                            <div class="form-group">
                                <label for="author_email" class="form-label">
                                    <span>Your Email</span>
                                    <span class="required">*</span>
                                </label>
                                <div class="input-with-icon">
                                    <i class="bi bi-envelope input-icon"></i>
                                    <input type="email" id="author_email" name="author_email" class="form-control @error('author_email') is-invalid @enderror" placeholder="alex@domain.com" value="{{ old('author_email') }}" required>
                                </div>
                                @error('author_email')
                                    <div class="error-message"><i class="bi bi-exclamation-triangle-fill"></i> <span>{{ $message }}</span></div>
                                @enderror
                            </div>
                        </div>

                        {{-- Comment Message --}}
                        <div class="form-group">
                            <label for="content" class="form-label">
                                <span>Your Comment</span>
                                <span class="required">*</span>
                            </label>
                            <textarea id="content" name="content" class="form-control no-icon @error('content') is-invalid @enderror" rows="4" placeholder="Write your remarks or constructive thoughts here..." required style="min-height: 110px;">{{ old('content') }}</textarea>
                            @error('content')
                                <div class="error-message"><i class="bi bi-exclamation-triangle-fill"></i> <span>{{ $message }}</span></div>
                            @enderror
                        </div>

                        <div style="margin-top: 1.5rem;">
                            <button type="submit" class="btn btn-primary">
                                <span>Post Comment</span>
                                <i class="bi bi-send-fill"></i>
                            </button>
                        </div>
                    </form>
                </div>

            </section>

        </div>
    </div>

    {{-- ════════════════════════════════════════════════════════════
         6. RELATED ARTICLES
         ════════════════════════════════════════════════════════════ --}}
    @if ($relatedArticles->isNotEmpty())
        <section class="section" style="background: var(--bg-surface-alt); border-top: 1px solid var(--border-subtle);">
            <div class="container">
                <div class="section-header-row reveal-item">
                    <div>
                        <span class="section-eyebrow"><i class="bi bi-collection-fill"></i> Further Reading</span>
                        <h2 class="section-title">Related Technical Guides</h2>
                    </div>
                    <div>
                        <a href="{{ route('blogs.index', ['category' => $article->category->slug]) }}" class="btn btn-outline">
                            <span>More in {{ $article->category->name }}</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="article-grid">
                    @foreach ($relatedArticles as $rel)
                        <article class="article-card reveal-item">
                            <div class="article-card-media">
                                <img src="{{ $rel->image }}" alt="{{ $rel->title }}" loading="lazy">
                                <div class="article-card-badge">
                                    <span class="category-pill {{ $rel->category->color ?? 'crimson' }}">
                                        {{ $rel->category->name }}
                                    </span>
                                </div>
                            </div>
                            <div class="article-card-body">
                                <h3 class="article-card-title">
                                    <a href="{{ route('blogs.show', $rel->slug) }}">
                                        {{ $rel->title }}
                                    </a>
                                </h3>
                                <p class="article-card-excerpt">{{ $rel->excerpt }}</p>
                                <div class="article-card-footer">
                                    <div class="article-card-author">
                                        <img src="{{ $rel->author_avatar ?? 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=80&auto=format&fit=crop&q=80' }}" alt="{{ $rel->author_name }}">
                                        <div>
                                            <div class="author-name-text">{{ $rel->author_name }}</div>
                                            <div class="article-date-text">{{ $rel->published_at ? $rel->published_at->format('M d, Y') : $rel->created_at->format('M d, Y') }}</div>
                                        </div>
                                    </div>
                                    <div class="article-metrics">
                                        <span><i class="bi bi-clock"></i> {{ $rel->reading_time }}</span>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

</article>

{{-- Floating Toast Notification for Copy Link --}}
<div id="toastNotification" style="position: fixed; bottom: 2rem; left: 50%; transform: translateX(-50%) translateY(100px); background: var(--bg-surface); border: 1px solid var(--border-strong); color: var(--text-primary); padding: 0.75rem 1.5rem; border-radius: var(--radius-full); box-shadow: var(--shadow-lg); font-size: 0.9rem; font-weight: 600; display: flex; align-items: center; gap: 0.6rem; z-index: 9999; opacity: 0; transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);">
    <i class="bi bi-check-circle-fill" style="color: var(--brand-accent); font-size: 1.1rem;"></i>
    <span>Article link copied to clipboard!</span>
</div>

@endsection

@push('scripts')
<script>
    // ── Copy Article Link to Clipboard with Toast ────────────────────
    const copyBtn = document.getElementById('copyLinkBtn');
    const toast = document.getElementById('toastNotification');

    if (copyBtn && toast) {
        copyBtn.addEventListener('click', () => {
            navigator.clipboard.writeText(window.location.href).then(() => {
                toast.style.opacity = '1';
                toast.style.transform = 'translateX(-50%) translateY(0)';
                setTimeout(() => {
                    toast.style.opacity = '0';
                    toast.style.transform = 'translateX(-50%) translateY(100px)';
                }, 3000);
            });
        });
    }

    // ── Interactive Like Button Micro-Animation ──────────────────────
    const likeBtn = document.getElementById('likeArticleBtn');
    const likeIcon = document.getElementById('likeIcon');
    const likeCount = document.getElementById('likeCount');
    let hasLiked = false;

    if (likeBtn && likeIcon && likeCount) {
        likeBtn.addEventListener('click', () => {
            let current = parseInt(likeCount.innerText) || 0;
            if (!hasLiked) {
                likeIcon.classList.remove('bi-heart');
                likeIcon.classList.add('bi-heart-fill');
                likeCount.innerText = current + 1;
                likeBtn.style.transform = 'scale(1.1)';
                setTimeout(() => likeBtn.style.transform = 'scale(1)', 200);
                hasLiked = true;
            } else {
                likeIcon.classList.remove('bi-heart-fill');
                likeIcon.classList.add('bi-heart');
                likeCount.innerText = current - 1;
                hasLiked = false;
            }
        });
    }
</script>
@endpush

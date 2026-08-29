<footer class="site-footer">
    <div class="container">

        {{-- ── Main Footer Grid ────────────────────────────────────── --}}
        <div class="footer-top-grid">

            {{-- Column 1: Brand & Bio --}}
            <div class="footer-brand-col">
                <a href="{{ route('home') }}" class="brand-logo" aria-label="BlogHub Homepage">
                    <div class="brand-emblem" style="width:30px;height:30px;font-size:0.95rem;">
                        <i class="bi bi-feather"></i>
                    </div>
                    <span>Blog<span class="text-gradient">Hub</span></span>
                </a>
                <p>
                    An independent, peer-reviewed engineering publication for software architects, backend specialists, and frontend practitioners.
                </p>
                <div class="social-links-row">
                    <a href="https://x.com" target="_blank" rel="noopener" class="btn-icon" aria-label="Twitter / X">
                        <i class="bi bi-twitter-x"></i>
                    </a>
                    <a href="https://github.com" target="_blank" rel="noopener" class="btn-icon" aria-label="GitHub">
                        <i class="bi bi-github"></i>
                    </a>
                    <a href="https://linkedin.com" target="_blank" rel="noopener" class="btn-icon" aria-label="LinkedIn">
                        <i class="bi bi-linkedin"></i>
                    </a>
                    <a href="#" class="btn-icon" aria-label="RSS Feed">
                        <i class="bi bi-rss"></i>
                    </a>
                </div>
            </div>

            {{-- Column 2: Navigation --}}
            <div>
                <h4 class="footer-col-title">Navigation</h4>
                <ul class="footer-nav-list">
                    <li><a href="{{ route('home') }}" class="footer-nav-link">Home</a></li>
                    <li><a href="{{ route('blogs.index') }}" class="footer-nav-link">All Articles</a></li>
                    <li><a href="{{ route('categories.index') }}" class="footer-nav-link">Categories Directory</a></li>
                    <li><a href="{{ route('authors.index') }}" class="footer-nav-link">Authors & Contributors</a></li>
                    <li><a href="{{ route('about') }}" class="footer-nav-link">About Publication</a></li>
                    <li><a href="{{ route('contact') }}" class="footer-nav-link">Editorial Desk / Contact</a></li>
                </ul>
            </div>

            {{-- Column 3: Topics --}}
            <div>
                <h4 class="footer-col-title">Curated Topics</h4>
                <ul class="footer-nav-list">
                    <li><a href="{{ route('blogs.index', ['category' => 'laravel-php']) }}" class="footer-nav-link">Laravel & PHP</a></li>
                    <li><a href="{{ route('blogs.index', ['category' => 'javascript-web']) }}" class="footer-nav-link">JavaScript & Web</a></li>
                    <li><a href="{{ route('blogs.index', ['category' => 'css-ui-systems']) }}" class="footer-nav-link">CSS & UI Systems</a></li>
                    <li><a href="{{ route('blogs.index', ['category' => 'database-sql']) }}" class="footer-nav-link">Database & SQL</a></li>
                    <li><a href="{{ route('blogs.index', ['category' => 'devops-cloud']) }}" class="footer-nav-link">DevOps & Cloud</a></li>
                </ul>
            </div>

            {{-- Column 4: Newsletter --}}
            <div>
                <h4 class="footer-col-title">Weekly Dispatch</h4>
                <p style="color: var(--text-secondary); font-size: 0.88rem; line-height: 1.55; margin-bottom: 1rem;">
                    Join 12,000+ developers receiving our ad-free, peer-reviewed engineering breakdown every Thursday.
                </p>
                <form class="newsletter-form-row" onsubmit="event.preventDefault(); alert('Thank you for subscribing to the BlogHub weekly dispatch!'); this.reset();">
                    <input type="email" class="newsletter-input-field" placeholder="engineer@domain.com" required aria-label="Newsletter email">
                    <button type="submit" class="btn btn-primary btn-sm" style="padding: 0.45rem 1rem;">
                        <span>Join</span>
                        <i class="bi bi-arrow-right-short"></i>
                    </button>
                </form>
                <div style="font-size: 0.75rem; color: var(--text-faint); margin-top: 0.6rem; display: flex; align-items: center; gap: 0.35rem;">
                    <i class="bi bi-shield-check"></i> Zero spam. One-click unsubscribe anytime.
                </div>
            </div>

        </div>

        {{-- ── Bottom Legal Bar ──────────────────────────────────── --}}
        <div class="footer-bottom-bar">
            <div>
                &copy; {{ date('Y') }} <strong>BlogHub Media Group</strong>. Built with precision and care in Laravel.
            </div>
            <div class="footer-legal-links">
                <a href="#" class="footer-nav-link" style="font-size: 0.82rem;">Editorial Guidelines</a>
                <a href="#" class="footer-nav-link" style="font-size: 0.82rem;">Privacy Policy</a>
                <a href="#" class="footer-nav-link" style="font-size: 0.82rem;">Terms of Service</a>
            </div>
        </div>

    </div>
</footer>

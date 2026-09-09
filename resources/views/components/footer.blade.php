<footer class="site-footer">
    <div class="container">
        
        {{-- ── Top Dispatch / CTA Card ─────────────────────────────── --}}
        <div class="footer-cta-card">
            <div class="footer-cta-content">
                <div class="footer-cta-badge">
                    <span class="badge-dot-pulsing"></span>
                    <span>Weekly Technical Dispatch</span>
                </div>
                <h3 class="footer-cta-title">Stay Ahead in Modern Software Architecture</h3>
                <p class="footer-cta-desc">
                    Get hand-crafted architectural breakdowns, system design deep-dives, and performance benchmarks delivered to your inbox every Thursday.
                </p>
            </div>
            <div>
                <form class="footer-newsletter-form" onsubmit="event.preventDefault(); alert('Thank you for subscribing to the BlogHub weekly dispatch!'); this.reset();">
                    <div class="newsletter-input-group">
                        <i class="bi bi-envelope newsletter-icon"></i>
                        <input type="email" class="newsletter-input" placeholder="engineer@domain.com" required aria-label="Work Email">
                        <button type="submit" class="newsletter-submit-btn">
                            <span>Join</span>
                            <i class="bi bi-send-fill"></i>
                        </button>
                    </div>
                </form>
                <div class="newsletter-trust-note">
                    <i class="bi bi-shield-check"></i> 12,000+ subscribers &bull; Zero spam &bull; Unsubscribe anytime
                </div>
            </div>
        </div>

        {{-- ── Main Footer Navigation Grid ─────────────────────────── --}}
        <div class="footer-main-grid">
            
            {{-- Column 1: Brand & Identity --}}
            <div class="footer-col-brand">
                <a href="{{ route('home') }}" class="brand-logo" aria-label="BlogHub Homepage">
                    <div class="brand-emblem" style="width:34px;height:34px;font-size:1.05rem;">
                        <i class="bi bi-feather"></i>
                    </div>
                    <span>Blog<span class="text-gradient">Hub</span></span>
                </a>
                <p class="footer-brand-bio">
                    An independent, peer-reviewed technical publication and community for engineering practitioners, software architects, and tech leaders worldwide.
                </p>
                <div class="social-links-grid">
                    <a href="https://x.com" target="_blank" rel="noopener" class="social-badge" aria-label="Twitter / X">
                        <i class="bi bi-twitter-x"></i>
                    </a>
                    <a href="https://github.com" target="_blank" rel="noopener" class="social-badge" aria-label="GitHub">
                        <i class="bi bi-github"></i>
                    </a>
                    <a href="https://linkedin.com" target="_blank" rel="noopener" class="social-badge" aria-label="LinkedIn">
                        <i class="bi bi-linkedin"></i>
                    </a>
                    <a href="#" class="social-badge" aria-label="RSS Feed">
                        <i class="bi bi-rss"></i>
                    </a>
                </div>
            </div>

            {{-- Column 2: Platform Navigation --}}
            <div class="footer-col">
                <h4 class="footer-heading">
                    <span class="heading-line"></span>
                    Platform
                </h4>
                <ul class="footer-links">
                    <li><a href="{{ route('home') }}" class="footer-link"><i class="bi bi-arrow-right-short"></i> Home</a></li>
                    <li><a href="{{ route('blogs.index') }}" class="footer-link"><i class="bi bi-arrow-right-short"></i> Engineering Articles</a></li>
                    <li><a href="{{ route('categories.index') }}" class="footer-link"><i class="bi bi-arrow-right-short"></i> Topic Directory</a></li>
                    <li><a href="{{ route('authors.index') }}" class="footer-link"><i class="bi bi-arrow-right-short"></i> Authors & Board</a></li>
                    <li><a href="{{ route('about') }}" class="footer-link"><i class="bi bi-arrow-right-short"></i> Our Philosophy</a></li>
                </ul>
            </div>

            {{-- Column 3: Curated Tracks --}}
            <div class="footer-col">
                <h4 class="footer-heading">
                    <span class="heading-line"></span>
                    Curated Tracks
                </h4>
                <ul class="footer-links">
                    <li><a href="{{ route('blogs.index', ['category' => 'system-architecture']) }}" class="footer-link"><i class="bi bi-arrow-right-short"></i> System Architecture</a></li>
                    <li><a href="{{ route('blogs.index', ['category' => 'laravel-php']) }}" class="footer-link"><i class="bi bi-arrow-right-short"></i> Laravel & PHP</a></li>
                    <li><a href="{{ route('blogs.index', ['category' => 'javascript-web']) }}" class="footer-link"><i class="bi bi-arrow-right-short"></i> JavaScript & Web</a></li>
                    <li><a href="{{ route('blogs.index', ['category' => 'css-ui-systems']) }}" class="footer-link"><i class="bi bi-arrow-right-short"></i> UI & Design Systems</a></li>
                    <li><a href="{{ route('blogs.index', ['category' => 'devops-cloud']) }}" class="footer-link"><i class="bi bi-arrow-right-short"></i> Cloud & DevOps</a></li>
                </ul>
            </div>

            {{-- Column 4: Editorial Desk --}}
            <div class="footer-col">
                <h4 class="footer-heading">
                    <span class="heading-line"></span>
                    Editorial Desk
                </h4>
                <div class="footer-contact-block">
                    <div class="contact-item">
                        <i class="bi bi-geo-alt"></i>
                        <span>Islamabad &bull; Global Desk</span>
                    </div>
                    <div class="contact-item">
                        <i class="bi bi-envelope"></i>
                        <span>editorial@bloghub.dev</span>
                    </div>
                </div>
                <a href="{{ route('contact') }}" class="btn-pitch-desk">
                    <i class="bi bi-pen-fill"></i>
                    <span>Contact Editorial Desk</span>
                </a>
            </div>

        </div>

        {{-- ── Bottom Sub-Footer Bar ───────────────────────────────── --}}
        <div class="footer-bottom">
            <div class="footer-copyright">
                &copy; {{ date('Y') }} <strong>BlogHub Media Group</strong>. Built with precision &amp; care in Laravel.
            </div>
            
            <div class="footer-status-pill">
                <span class="status-dot"></span>
                <span>Publication Active &bull; Updated Daily</span>
            </div>

            <div class="footer-legal">
                <a href="#">Editorial Guidelines</a>
                <span class="legal-dot">&bull;</span>
                <a href="#">Privacy Policy</a>
                <span class="legal-dot">&bull;</span>
                <a href="#">Terms of Use</a>
            </div>
        </div>

    </div>
</footer>

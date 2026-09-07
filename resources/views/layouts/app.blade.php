<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'BlogHub') — Modern Tech & Architecture Publishing</title>

    {{-- SEO Meta Tags --}}
    <meta name="description" content="@yield('meta_description', 'BlogHub is a premier multi-category technical publication and community for engineering practitioners, software architects, and frontend developers.')">

    {{-- Theme initialization script to prevent theme flash --}}
    <script>
        (function() {
            const savedTheme = localStorage.getItem('bloghub_theme');
            if (savedTheme) {
                document.documentElement.setAttribute('data-theme', savedTheme);
            } else if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                document.documentElement.setAttribute('data-theme', 'dark');
            }
        })();
    </script>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,400;0,9..144,600;0,9..144,700;1,9..144,400&family=Inter:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">

    {{-- Local Bootstrap Icons --}}
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.min.css') }}">

    {{-- BlogHub Design System CSS --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @stack('styles')
</head>
<body>

    {{-- Scroll Progress Bar --}}
    <div class="scroll-progress" id="scrollProgressBar"></div>

    {{-- ── Site Header / Navigation ──────────────────────────────── --}}
    @include('partials.navbar')

    {{-- ── Main Content Container ────────────────────────────────── --}}
    <main>
        @yield('content')
    </main>

    {{-- ── Site Footer ───────────────────────────────────────────── --}}
    @include('partials.footer')

    {{-- Back to Top Floating Button --}}
    <button class="back-to-top-btn" id="backToTopBtn" aria-label="Back to top" title="Back to top">
        <i class="bi bi-arrow-up"></i>
    </button>

    {{-- ── Core Interactive JavaScript ────────────────────────────── --}}
    <script>
        // ── 1. Theme Toggle with LocalStorage Persistence ─────────────
        const themeToggleBtn = document.getElementById('themeToggleBtn');
        if (themeToggleBtn) {
            themeToggleBtn.addEventListener('click', () => {
                const currentTheme = document.documentElement.getAttribute('data-theme') || 'light';
                const nextTheme = currentTheme === 'dark' ? 'light' : 'dark';
                document.documentElement.setAttribute('data-theme', nextTheme);
                localStorage.setItem('bloghub_theme', nextTheme);
            });
        }

        // ── 2. Sticky Navbar Blur & Shadow on Scroll ──────────────────
        const siteHeader = document.querySelector('.site-header');
        const backToTopBtn = document.getElementById('backToTopBtn');
        const progressBar = document.getElementById('scrollProgressBar');

        window.addEventListener('scroll', () => {
            const scrollTop = window.scrollY;
            const docHeight = document.documentElement.scrollHeight - window.innerHeight;
            
            // Header scroll state
            if (siteHeader) {
                if (scrollTop > 20) {
                    siteHeader.classList.add('scrolled');
                } else {
                    siteHeader.classList.remove('scrolled');
                }
            }

            // Back to top visibility
            if (backToTopBtn) {
                if (scrollTop > 350) {
                    backToTopBtn.classList.add('visible');
                } else {
                    backToTopBtn.classList.remove('visible');
                }
            }

            // Progress bar calculation
            if (progressBar && docHeight > 0) {
                const progress = (scrollTop / docHeight) * 100;
                progressBar.style.width = `${progress}%`;
            }
        }, { passive: true });

        if (backToTopBtn) {
            backToTopBtn.addEventListener('click', () => {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        }

        // ── 3. Mobile Navigation Menu Toggle ─────────────────────────
        const mobileNavToggle = document.getElementById('mobileNavToggle');
        const navMenu = document.getElementById('navMenu');
        if (mobileNavToggle && navMenu) {
            mobileNavToggle.addEventListener('click', () => {
                navMenu.classList.toggle('open');
                const isExpanded = navMenu.classList.contains('open');
                mobileNavToggle.setAttribute('aria-expanded', isExpanded);
            });
        }

        // ── 4. FAQ Accordion ─────────────────────────────────────────
        document.querySelectorAll('.faq-toggle-trigger').forEach(trigger => {
            trigger.addEventListener('click', () => {
                const currentItem = trigger.closest('.faq-accordion-item');
                const isActive = currentItem.classList.contains('active');

                // Close other items
                document.querySelectorAll('.faq-accordion-item.active').forEach(item => {
                    if (item !== currentItem) item.classList.remove('active');
                });

                // Toggle selected item
                currentItem.classList.toggle('active', !isActive);
            });
        });

        // ── 5. Intersection Observer for Scroll Reveals ──────────────
        const observerOptions = { threshold: 0.1, rootMargin: '0px 0px -40px 0px' };
        const revealObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        document.querySelectorAll('.reveal-item').forEach(el => revealObserver.observe(el));

        // ── 6. Follow Button Interactive State ───────────────────────
        document.querySelectorAll('.btn-follow').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const isFollowing = this.classList.contains('following');
                if (isFollowing) {
                    this.classList.remove('following');
                    this.innerHTML = '<i class="bi bi-plus"></i> Follow';
                } else {
                    this.classList.add('following');
                    this.innerHTML = '<i class="bi bi-check2"></i> Following';
                }
            });
        });
    </script>

    @stack('scripts')
</body>
</html>

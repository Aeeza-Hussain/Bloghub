<header class="site-header">
    <div class="container">
        <div class="navbar-container">

            {{-- ── Brand / Logo ─────────────────────────────────────── --}}
            <a href="{{ route('home') }}" class="brand-logo" aria-label="BlogHub Homepage">
                <div class="brand-emblem">
                    <i class="bi bi-feather"></i>
                </div>
                <span>Blog<span class="text-gradient">Hub</span></span>
            </a>

            {{-- ── Desktop & Mobile Nav Menu ─────────────────────────── --}}
            <nav>
                <ul class="nav-menu" id="navMenu">
                    <li>
                        <a href="{{ route('home') }}"
                           class="nav-link-item {{ request()->routeIs('home') ? 'active' : '' }}">
                            <i class="bi bi-house-door"></i> Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('blogs.index') }}"
                           class="nav-link-item {{ request()->routeIs('blogs*') ? 'active' : '' }}">
                            <i class="bi bi-journal-text"></i> Articles
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('categories.index') }}"
                           class="nav-link-item {{ request()->routeIs('categories*') ? 'active' : '' }}">
                            <i class="bi bi-grid-3x3-gap"></i> Categories
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('authors.index') }}"
                           class="nav-link-item {{ request()->routeIs('authors*') ? 'active' : '' }}">
                            <i class="bi bi-people"></i> Authors
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}"
                           class="nav-link-item {{ request()->routeIs('about') ? 'active' : '' }}">
                            <i class="bi bi-compass"></i> About
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}"
                           class="nav-link-item {{ request()->routeIs('contact*') ? 'active' : '' }}">
                            <i class="bi bi-chat-square-dots"></i> Contact
                        </a>
                    </li>
                </ul>
            </nav>

            {{-- ── Action Buttons & Search Trigger ──────────────────── --}}
            <div class="nav-actions">

                {{-- Search Icon Link to /search --}}
                <a href="{{ route('search.index') }}" class="btn-icon" aria-label="Search articles" title="Search publication" style="width: 38px; height: 38px;">
                    <i class="bi bi-search" style="font-size: 0.95rem;"></i>
                </a>

                {{-- Dark Mode Toggle Switch --}}
                <button type="button" class="theme-toggle-btn" id="themeToggleBtn" aria-label="Toggle color theme" title="Toggle theme">
                    <i class="bi bi-moon-stars"></i>
                    <i class="bi bi-sun"></i>
                </button>

                {{-- Write / Primary CTA --}}
                <a href="{{ route('contact') }}" class="btn btn-primary btn-sm">
                    <span>Write for Us</span>
                    <i class="bi bi-arrow-right-short" style="font-size: 1.1rem; margin-left: -4px;"></i>
                </a>

                {{-- Mobile Navigation Toggle --}}
                <button type="button" class="mobile-nav-toggle" id="mobileNavToggle" aria-label="Toggle mobile menu" aria-expanded="false">
                    <i class="bi bi-list"></i>
                </button>

            </div>

        </div>
    </div>
</header>

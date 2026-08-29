<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Author;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database with updated author names and rich realistic data.
     */
    public function run(): void
    {
        // ── 1. Seed Categories (10 items) ────────────────────────────────────
        $categoriesData = [
            [
                'name'        => 'Laravel & PHP',
                'slug'        => 'laravel-php',
                'icon'        => 'bi-layers-fill',
                'color'       => 'crimson',
                'description' => 'Modern backend architecture, Eloquent ORM, service layers, and high-performance PHP 8.4 techniques.',
            ],
            [
                'name'        => 'JavaScript & Web',
                'slug'        => 'javascript-web',
                'icon'        => 'bi-code-slash',
                'color'       => 'amber',
                'description' => 'Event loop internals, microtasks, async patterns, Web Workers, and modern browser APIs.',
            ],
            [
                'name'        => 'CSS & UI Systems',
                'slug'        => 'css-ui-systems',
                'icon'        => 'bi-palette2',
                'color'       => 'indigo',
                'description' => 'Design token architecture, subgrid, container queries, fluid typography, and accessibility ergonomics.',
            ],
            [
                'name'        => 'DevOps & Cloud Infra',
                'slug'        => 'devops-cloud',
                'icon'        => 'bi-hdd-network',
                'color'       => 'emerald',
                'description' => 'Zero-downtime deployment pipelines, container orchestration, Docker, Linux tuning, and cloud automation.',
            ],
            [
                'name'        => 'Database & SQL',
                'slug'        => 'database-sql',
                'icon'        => 'bi-database-fill-gear',
                'color'       => 'indigo',
                'description' => 'Query optimization, composite indexing, SQLite in production, distributed transactions, and data modeling.',
            ],
            [
                'name'        => 'System Architecture',
                'slug'        => 'system-architecture',
                'icon'        => 'bi-diagram-3-fill',
                'color'       => 'crimson',
                'description' => 'Event-driven architectures, distributed caching, idempotency, CQRS, and high-throughput systems.',
            ],
            [
                'name'        => 'Security & Auth',
                'slug'        => 'security-auth',
                'icon'        => 'bi-shield-lock-fill',
                'color'       => 'amber',
                'description' => 'OAuth 2.1, Passkeys, session security, CSRF defense-in-depth, and rate limiting algorithms.',
            ],
            [
                'name'        => 'Web Performance',
                'slug'        => 'web-performance',
                'icon'        => 'bi-lightning-charge-fill',
                'color'       => 'emerald',
                'description' => 'Core Web Vitals, critical rendering path, asset compression, lazy loading, and edge computing caching.',
            ],
            [
                'name'        => 'Testing & QA',
                'slug'        => 'testing-qa',
                'icon'        => 'bi-check2-circle',
                'color'       => 'indigo',
                'description' => 'Pest PHP, PHPUnit, integration test patterns, mocking strategies, and regression test suites.',
            ],
            [
                'name'        => 'Engineering Career',
                'slug'        => 'engineering-career',
                'icon'        => 'bi-briefcase-fill',
                'color'       => 'amber',
                'description' => 'Staff engineer paths, code review culture, writing RFCs, technical mentoring, and leadership.',
            ],
        ];

        $categories = [];
        foreach ($categoriesData as $data) {
            $categories[$data['slug']] = Category::create($data);
        }

        // ── 2. Seed Custom Team / Authors (8 items) ───────────────────────────
        $authorsData = [
            [
                'name'            => 'Aleeza Fatima',
                'slug'            => 'aleeza-fatima',
                'email'           => 'aleeza.fatima@bloghub.dev',
                'role'            => 'Founder & Staff Infrastructure Architect',
                'bio'             => 'Specializing in distributed systems resilience, cloud orchestration, and high-throughput backend services. Founder and Editor-in-Chief at BlogHub.',
                'avatar'          => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=300&auto=format&fit=crop&q=80',
                'cover_image'     => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=1200&auto=format&fit=crop&q=80',
                'specialty'       => 'Cloud & Distributed Systems',
                'location'        => 'Islamabad, Pakistan',
                'website'         => 'https://aleozafatima.dev',
                'twitter'         => 'https://x.com',
                'github'          => 'https://github.com',
                'linkedin'        => 'https://linkedin.com',
                'followers_count' => 18400,
                'following_count' => 195,
                'is_featured'     => true,
            ],
            [
                'name'            => 'Sania Fida',
                'slug'            => 'sania-fida',
                'email'           => 'sania.fida@bloghub.dev',
                'role'            => 'Principal Backend Architect & PHP Specialist',
                'bio'             => 'PHP core enthusiast, author of modern Laravel architectural patterns, speaker on high-throughput database scaling and asynchronous PHP systems.',
                'avatar'          => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=300&auto=format&fit=crop&q=80',
                'cover_image'     => 'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?w=1200&auto=format&fit=crop&q=80',
                'specialty'       => 'PHP / Laravel / Microservices',
                'location'        => 'Lahore, Pakistan',
                'website'         => 'https://saniafida.io',
                'twitter'         => 'https://x.com',
                'github'          => 'https://github.com',
                'linkedin'        => 'https://linkedin.com',
                'followers_count' => 16200,
                'following_count' => 210,
                'is_featured'     => true,
            ],
            [
                'name'            => 'Sana Akbar',
                'slug'            => 'sana-akbar',
                'email'           => 'sana.akbar@bloghub.dev',
                'role'            => 'Design Systems Lead & UI Architect',
                'bio'             => 'Pioneer in semantic CSS architecture, accessibility compliance (WCAG AAA), container queries, and engineering developer ergonomics across enterprise UI suites.',
                'avatar'          => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?w=300&auto=format&fit=crop&q=80',
                'cover_image'     => 'https://images.unsplash.com/photo-1507238691740-187a5b1d37b8?w=1200&auto=format&fit=crop&q=80',
                'specialty'       => 'Vanilla CSS / A11y / UI Systems',
                'location'        => 'Karachi, Pakistan',
                'website'         => 'https://sanaakbar.design',
                'twitter'         => 'https://x.com',
                'github'          => 'https://github.com',
                'linkedin'        => 'https://linkedin.com',
                'followers_count' => 14300,
                'following_count' => 145,
                'is_featured'     => true,
            ],
            [
                'name'            => 'Amna Kiran',
                'slug'            => 'amna-kiran',
                'email'           => 'amna.kiran@bloghub.dev',
                'role'            => 'Senior Frontend & Web Performance Lead',
                'bio'             => 'Obsessed with the JavaScript event loop, browser rendering performance, streaming Web APIs, and eliminating render-blocking dependencies.',
                'avatar'          => 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=300&auto=format&fit=crop&q=80',
                'cover_image'     => 'https://images.unsplash.com/photo-1550439022-6018c2a21a4d?w=1200&auto=format&fit=crop&q=80',
                'specialty'       => 'JavaScript / Performance / Web APIs',
                'location'        => 'Rawalpindi, Pakistan',
                'website'         => 'https://amnakiran.tech',
                'twitter'         => 'https://x.com',
                'github'          => 'https://github.com',
                'linkedin'        => 'https://linkedin.com',
                'followers_count' => 12800,
                'following_count' => 110,
                'is_featured'     => true,
            ],
            [
                'name'            => 'Tariq Hussain',
                'slug'            => 'tariq-hussain',
                'email'           => 'tariq.hussain@bloghub.dev',
                'role'            => 'Principal Security & Cryptography Researcher',
                'bio'             => 'Application security architect, cryptographer, and advocate for Passkeys, OAuth 2.1, and defense-in-depth API protection.',
                'avatar'          => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=300&auto=format&fit=crop&q=80',
                'cover_image'     => 'https://images.unsplash.com/photo-1563986768609-322da13575f3?w=1200&auto=format&fit=crop&q=80',
                'specialty'       => 'Application Security & WebAuthn',
                'location'        => 'Peshawar, Pakistan',
                'website'         => 'https://tariqhussain.security',
                'twitter'         => 'https://x.com',
                'github'          => 'https://github.com',
                'linkedin'        => 'https://linkedin.com',
                'followers_count' => 11900,
                'following_count' => 130,
                'is_featured'     => false,
            ],
            [
                'name'            => 'Kubra Batool',
                'slug'            => 'kubra-batool',
                'email'           => 'kubra.batool@bloghub.dev',
                'role'            => 'Engineering Director & Tech Strategist',
                'bio'             => 'Writer on engineering leadership, high-empathy code reviews, staff engineer promotion ladders, and building psychological safety in distributed teams.',
                'avatar'          => 'https://images.unsplash.com/photo-1567532939604-b6b5b0db2604?w=300&auto=format&fit=crop&q=80',
                'cover_image'     => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=1200&auto=format&fit=crop&q=80',
                'specialty'       => 'Engineering Leadership & Culture',
                'location'        => 'Faisalabad, Pakistan',
                'website'         => 'https://kubrabatool.io',
                'twitter'         => 'https://x.com',
                'github'          => 'https://github.com',
                'linkedin'        => 'https://linkedin.com',
                'followers_count' => 17500,
                'following_count' => 280,
                'is_featured'     => true,
            ],
            [
                'name'            => 'Munazza Batool',
                'slug'            => 'munazza-batool',
                'email'           => 'munazza.batool@bloghub.dev',
                'role'            => 'Lead QA & Test Automation Architect',
                'bio'             => 'Dedicated to expressive testing suites, Pest PHP plugins, consumer-driven contract testing, and CI/CD quality gates.',
                'avatar'          => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=300&auto=format&fit=crop&q=80',
                'cover_image'     => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=1200&auto=format&fit=crop&q=80',
                'specialty'       => 'Testing Strategies & Pest PHP',
                'location'        => 'Multan, Pakistan',
                'website'         => 'https://munazzabatool.qa',
                'twitter'         => 'https://x.com',
                'github'          => 'https://github.com',
                'linkedin'        => 'https://linkedin.com',
                'followers_count' => 9600,
                'following_count' => 90,
                'is_featured'     => false,
            ],
            [
                'name'            => 'Ikhlas Hussain',
                'slug'            => 'ikhlas-hussain',
                'email'           => 'ikhlas.hussain@bloghub.dev',
                'role'            => 'Principal Database & Cloud Architect',
                'bio'             => 'Specializing in relational query optimization, B-Tree internals, SQLite architectures, and zero-downtime financial database migrations.',
                'avatar'          => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=300&auto=format&fit=crop&q=80',
                'cover_image'     => 'https://images.unsplash.com/photo-1544383835-bda2bc66a55d?w=1200&auto=format&fit=crop&q=80',
                'specialty'       => 'Database Scalability & SQL',
                'location'        => 'Quetta, Pakistan',
                'website'         => 'https://ikhlashussain.com',
                'twitter'         => 'https://x.com',
                'github'          => 'https://github.com',
                'linkedin'        => 'https://linkedin.com',
                'followers_count' => 10400,
                'following_count' => 105,
                'is_featured'     => false,
            ],
        ];

        $authors = [];
        foreach ($authorsData as $data) {
            $authors[] = Author::create($data);
        }

        // ── 3. Seed 21 Articles with Author Foreign Key ──────────────────────
        $articlesData = [
            [
                'category_slug' => 'system-architecture',
                'title'         => 'Architecting Resilient Web Applications: Patterns for 2026',
                'slug'          => 'architecting-resilient-web-applications-patterns-2026',
                'excerpt'       => 'A deep dive into distributed caching, graceful degradation, and event-driven architecture that modern engineering teams rely on for scale.',
                'image'         => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=1200&auto=format&fit=crop&q=80',
                'author_index'  => 0, // Aleeza Fatima
                'reading_time'  => '8 min read',
                'views'         => 4230,
                'likes'         => 342,
                'is_featured'   => true,
                'is_trending'   => true,
                'tags'          => 'Architecture, System Design, Caching, Resilience',
                'published_at'  => now()->subDays(2),
                'content'       => "<h2>The Core Pillars of High-Availability Systems</h2>
<p>Modern software systems are inherently complex. Between ephemeral container runtimes, distributed cloud datacenters, and third-party API dependencies, failures are not exceptional events—they are routine occurrences that must be planned for at every layer.</p>

<p>When designing applications intended to serve millions of daily active users, software architects must shift from asking <em>'How do we prevent failures?'</em> to <em>'How do we design for graceful recovery when failures inevitably happen?'</em></p>

<blockquote>'Resilience is not the absence of failure; it is the capacity to absorb disruptions and maintain uninterrupted core user workflows.'</blockquote>

<h3>1. Circuit Breaker Pattern</h3>
<p>When an external payment gateway or analytics service slows down, naive applications queue threads until worker pools exhaust memory, causing a total cascade failure. A circuit breaker monitors outbound call health and fails fast once error thresholds exceed acceptable limits.</p>

<pre><code class=\"language-php\">// Example of a resilient fallback call in PHP / Laravel
\$response = Cache::remember('external_service_status', 60, function () {
    return Http::timeout(2)
        ->retry(3, 100)
        ->get('https://api.upstream-service.com/health')
        ->json();
});</code></pre>

<h3>2. Idempotency Keys in Distributed State</h3>
<p>Network timeouts often leave clients uncertain if an action took place. By enforcing unique idempotency tokens across all mutating operations, duplicate retries become completely safe and deterministic.</p>

<h3>3. Cache Stampede Mitigation</h3>
<p>When popular cached keys expire simultaneously under heavy traffic spikes, hundreds of database queries hit your primary cluster simultaneously. Using mutex locking or probabilistic early expiration protects database health.</p>",
            ],
            [
                'category_slug' => 'laravel-php',
                'title'         => 'Mastering Modern PHP 8.4: Property Hooks & Beyond',
                'slug'          => 'mastering-modern-php-8-4-property-hooks',
                'excerpt'       => 'Explore the latest PHP capabilities that streamline boilerplate, improve type safety, and elevate your backend codebases.',
                'image'         => 'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?w=1000&auto=format&fit=crop&q=80',
                'author_index'  => 1, // Sania Fida
                'reading_time'  => '6 min read',
                'views'         => 2890,
                'likes'         => 215,
                'is_featured'   => true,
                'is_trending'   => false,
                'tags'          => 'PHP 8.4, Laravel, Backend, Clean Code',
                'published_at'  => now()->subDays(4),
                'content'       => "<h2>The Evolution of Modern PHP</h2>
<p>PHP has experienced a remarkable renaissance over the past decade. With the introduction of PHP 8.4, the language continues to deliver elegant developer ergonomics that eliminate tedious boilerplate without sacrificing runtime speed.</p>

<h3>Property Hooks: Cleaner Getters and Setters</h3>
<p>Rather than writing verbose getter and setter methods or relying on magic methods, PHP 8.4 introduces first-class property hooks:</p>

<pre><code class=\"language-php\">class UserProfile
{
    public string \$firstName;
    public string \$lastName;

    // Computed property hook
    public string \$fullName {
        get => \"{\$this->firstName} {\$this->lastName}\";
    }
}</code></pre>

<blockquote>'Property hooks bring clarity to domain models by eliminating boilerplate methods while maintaining encapsulation.'</blockquote>

<h3>Asymmetric Visibility</h3>
<p>You can now specify public read access while restricting write mutations to private or protected scopes, providing full immutability guarantees right at the type level.</p>",
            ],
            [
                'category_slug' => 'css-ui-systems',
                'title'         => 'Designing High-Conversion Design Systems with Vanilla CSS',
                'slug'          => 'designing-high-conversion-design-systems-vanilla-css',
                'excerpt'       => 'How to leverage CSS custom properties, container queries, and subgrid for blazing-fast, lightweight design systems.',
                'image'         => 'https://images.unsplash.com/photo-1507238691740-187a5b1d37b8?w=1000&auto=format&fit=crop&q=80',
                'author_index'  => 2, // Sana Akbar
                'reading_time'  => '7 min read',
                'views'         => 3520,
                'likes'         => 280,
                'is_featured'   => true,
                'is_trending'   => true,
                'tags'          => 'CSS, Design Systems, UI/UX, Web Standards',
                'published_at'  => now()->subDays(6),
                'content'       => "<h2>Why Modern Vanilla CSS is All You Need</h2>
<p>For years, frontend teams felt compelled to install gigabytes of node dependencies and CSS-in-JS abstractions simply to achieve component scoping and variable themes. Today, web standards have caught up.</p>

<h3>1. CSS Custom Properties for Dynamic Theming</h3>
<p>Native CSS variables allow instant, zero-bundle-size theme transitions that cascade naturally through the DOM tree without triggering full layout recomputations.</p>

<pre><code class=\"language-css\">:root {
    --brand-accent: #C8461F;
    --bg-surface: #FFFFFF;
}

[data-theme=\"dark\"] {
    --brand-accent: #F43F5E;
    --bg-surface: #111827;
}</code></pre>

<h3>2. Container Queries: Component-Driven Responsive Design</h3>
<p>Media queries only inspect the viewport width. Container queries empower individual cards to reflow themselves based on the exact width of their parent column.</p>",
            ],
            [
                'category_slug' => 'javascript-web',
                'title'         => 'Demystifying Event Loops, Microtasks & Async JavaScript',
                'slug'          => 'demystifying-event-loops-microtasks-async-javascript',
                'excerpt'       => 'A visual walkthrough of JavaScript runtime execution, promise scheduling, and performance tuning for high-throughput apps.',
                'image'         => 'https://images.unsplash.com/photo-1550439022-6018c2a21a4d?w=1000&auto=format&fit=crop&q=80',
                'author_index'  => 3, // Amna Kiran
                'reading_time'  => '5 min read',
                'views'         => 5120,
                'likes'         => 430,
                'is_featured'   => false,
                'is_trending'   => true,
                'tags'          => 'JavaScript, Async, Performance, Event Loop',
                'published_at'  => now()->subDays(8),
                'content'       => "<h2>How JavaScript Actually Executes Code</h2>
<p>JavaScript is single-threaded, yet it handles thousands of concurrent I/O operations with ease. Understanding the division between the call stack, Web APIs, task queue, and microtask queue is essential for writing bug-free asynchronous code.</p>

<h3>Tasks vs. Microtasks</h3>
<p>Promises and <code>queueMicrotask</code> run on the microtask queue, which drains completely before the browser executes the next task from <code>setTimeout</code> or handles DOM repaints.</p>",
            ],
            [
                'category_slug' => 'database-sql',
                'title'         => 'Building Scalable Full-Stack Apps with SQLite and Laravel',
                'slug'          => 'building-scalable-apps-with-sqlite-and-laravel',
                'excerpt'       => 'Why SQLite in WAL mode is fast becoming the secret weapon of modern web developers and high-efficiency SaaS startups.',
                'image'         => 'https://images.unsplash.com/photo-1544383835-bda2bc66a55d?w=1000&auto=format&fit=crop&q=80',
                'author_index'  => 7, // Ikhlas Hussain
                'reading_time'  => '6 min read',
                'views'         => 2410,
                'likes'         => 188,
                'is_featured'   => false,
                'is_trending'   => true,
                'tags'          => 'SQLite, Database, Laravel, Performance',
                'published_at'  => now()->subDays(9),
                'content'       => "<h2>The Underrated Power of SQLite</h2>
<p>SQLite is the most widely deployed database engine on planet Earth. With modern NVMe storage and Write-Ahead Logging (WAL) enabled, SQLite can process tens of thousands of read queries per second with virtually zero latency.</p>",
            ],
            [
                'category_slug' => 'devops-cloud',
                'title'         => 'The Pragmatic Guide to Zero-Downtime Database Migrations',
                'slug'          => 'pragmatic-guide-zero-downtime-database-migrations',
                'excerpt'       => 'Step-by-step strategies to alter large production tables without locking reads or breaking live user sessions.',
                'image'         => 'https://images.unsplash.com/photo-1618401471353-b98aedd04e11?w=1000&auto=format&fit=crop&q=80',
                'author_index'  => 0, // Aleeza Fatima
                'reading_time'  => '9 min read',
                'views'         => 1940,
                'likes'         => 160,
                'is_featured'   => false,
                'is_trending'   => false,
                'tags'          => 'DevOps, Migrations, SQL, Zero Downtime',
                'published_at'  => now()->subDays(11),
                'content'       => "<h2>The Danger of Table Locks at Scale</h2>
<p>Adding a column or index to a table with 50 million records can lock writes for minutes. This guide explores the expand-and-contract pattern to ensure 100% uptime during schema changes.</p>",
            ],
            [
                'category_slug' => 'security-auth',
                'title'         => 'Implementing Passkeys and WebAuthn in Modern Applications',
                'slug'          => 'implementing-passkeys-webauthn-modern-apps',
                'excerpt'       => 'Say goodbye to credential stuffing and forgotten passwords with secure cryptographic hardware-backed authentication.',
                'image'         => 'https://images.unsplash.com/photo-1563986768609-322da13575f3?w=1000&auto=format&fit=crop&q=80',
                'author_index'  => 4, // Tariq Hussain
                'reading_time'  => '7 min read',
                'views'         => 3100,
                'likes'         => 240,
                'is_featured'   => false,
                'is_trending'   => false,
                'tags'          => 'Security, Passkeys, WebAuthn, Authentication',
                'published_at'  => now()->subDays(13),
                'content'       => "<h2>The Death of the Traditional Password</h2>
<p>Passwords are the root cause of over 80% of data breaches. Passkeys replace shared secrets with public-key cryptography built directly into user operating systems.</p>",
            ],
            [
                'category_slug' => 'web-performance',
                'title'         => 'Optimizing Core Web Vitals: Real-World Lessons from 100M Hits',
                'slug'          => 'optimizing-core-web-vitals-real-world-lessons',
                'excerpt'       => 'How we reduced Largest Contentful Paint (LCP) by 62% and eliminated Cumulative Layout Shift across all devices.',
                'image'         => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=1000&auto=format&fit=crop&q=80',
                'author_index'  => 3, // Amna Kiran
                'reading_time'  => '8 min read',
                'views'         => 4800,
                'likes'         => 390,
                'is_featured'   => false,
                'is_trending'   => false,
                'tags'          => 'Performance, Core Web Vitals, LCP, CLS',
                'published_at'  => now()->subDays(15),
                'content'       => "<h2>Speed is a Core User Feature</h2>
<p>Every 100ms delay in page load time directly correlates with decreased user engagement. Here is our checklist for achieving 95+ Google Lighthouse scores across the board.</p>",
            ],
            [
                'category_slug' => 'testing-qa',
                'title'         => 'Writing Delightful Integration Tests with Pest PHP',
                'slug'          => 'writing-delightful-integration-tests-pest-php',
                'excerpt'       => 'Why readable and expressive test suites give engineering teams the confidence to ship features 3x faster.',
                'image'         => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=1000&auto=format&fit=crop&q=80',
                'author_index'  => 6, // Munazza Batool
                'reading_time'  => '5 min read',
                'views'         => 2180,
                'likes'         => 175,
                'is_featured'   => false,
                'is_trending'   => false,
                'tags'          => 'Testing, Pest PHP, QA, TDD',
                'published_at'  => now()->subDays(17),
                'content'       => "<h2>The Joy of Expressive Testing</h2>
<p>Tests shouldn't be a chore to write or maintain. Pest PHP transforms tests into clean, self-documenting specifications that your entire team will love reading.</p>",
            ],
            [
                'category_slug' => 'engineering-career',
                'title'         => 'The Staff Engineer Blueprint: How to Multiply Team Impact',
                'slug'          => 'staff-engineer-blueprint-multiply-team-impact',
                'excerpt'       => 'Moving beyond individual output to driving technical strategy, writing RFCs, and mentoring future technical leads.',
                'image'         => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=1000&auto=format&fit=crop&q=80',
                'author_index'  => 5, // Kubra Batool
                'reading_time'  => '9 min read',
                'views'         => 6200,
                'likes'         => 580,
                'is_featured'   => false,
                'is_trending'   => true,
                'tags'          => 'Career, Leadership, Staff Engineer, Mentorship',
                'published_at'  => now()->subDays(19),
                'content'       => "<h2>The Shift from Code Author to Multiplier</h2>
<p>Staff engineers are technical leaders who operate across multiple teams. Their primary currency is not pull requests merged, but architectural clarity and unblocking colleagues.</p>",
            ],
            [
                'category_slug' => 'laravel-php',
                'title'         => 'Mastering Laravel Eloquent Relationships & Query Optimization',
                'slug'          => 'mastering-laravel-eloquent-relationships-optimization',
                'excerpt'       => 'Eliminate the N+1 query problem forever with eager loading, subquery selects, and polymorphic relations.',
                'image'         => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?w=1000&auto=format&fit=crop&q=80',
                'author_index'  => 1, // Sania Fida
                'reading_time'  => '7 min read',
                'views'         => 3400,
                'likes'         => 290,
                'is_featured'   => false,
                'is_trending'   => false,
                'tags'          => 'Laravel, Eloquent, SQL, Performance',
                'published_at'  => now()->subDays(21),
                'content'       => "<h2>Understanding What Eloquent Generates</h2>
<p>Eloquent makes database interactions effortless, but understanding the underlying SQL statements is critical when scaling your application to high concurrency.</p>",
            ],
            [
                'category_slug' => 'css-ui-systems',
                'title'         => 'Fluid Typography and Spacing Using CSS Clamp and Calc',
                'slug'          => 'fluid-typography-spacing-css-clamp-calc',
                'excerpt'       => 'Create seamless responsive layouts that look balanced across every conceivable screen size without hundreds of media queries.',
                'image'         => 'https://images.unsplash.com/photo-1509228468518-180dd4864904?w=1000&auto=format&fit=crop&q=80',
                'author_index'  => 2, // Sana Akbar
                'reading_time'  => '5 min read',
                'views'         => 2700,
                'likes'         => 210,
                'is_featured'   => false,
                'is_trending'   => false,
                'tags'          => 'CSS, Responsive, Typography, Web Design',
                'published_at'  => now()->subDays(23),
                'content'       => "<h2>The End of Breakpoint Chaos</h2>
<p>Instead of jumping between hardcoded pixel font sizes at 768px and 1024px, CSS clamp scales typography smoothly according to viewport dimensions.</p>",
            ],
            [
                'category_slug' => 'javascript-web',
                'title'         => 'Deep Dive into the Web Streams API and Server-Sent Events',
                'slug'          => 'deep-dive-web-streams-api-server-sent-events',
                'excerpt'       => 'Stream real-time LLM tokens and live server data directly into frontend UI components with minimal overhead.',
                'image'         => 'https://images.unsplash.com/photo-1518770660439-4636190af475?w=1000&auto=format&fit=crop&q=80',
                'author_index'  => 3, // Amna Kiran
                'reading_time'  => '6 min read',
                'views'         => 3900,
                'likes'         => 310,
                'is_featured'   => false,
                'is_trending'   => false,
                'tags'          => 'JavaScript, Web Streams, SSE, Real-time',
                'published_at'  => now()->subDays(25),
                'content'       => "<h2>Streaming Over HTTP</h2>
<p>Modern applications demand immediate feedback. The Web Streams API enables processing data chunk-by-chunk without waiting for full payloads to transfer.</p>",
            ],
            [
                'category_slug' => 'system-architecture',
                'title'         => 'Designing Event-Driven Microservices with Redis Streams',
                'slug'          => 'designing-event-driven-microservices-redis-streams',
                'excerpt'       => 'A lightweight, high-performance messaging backbone for inter-service communication without Kafka complexity.',
                'image'         => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?w=1000&auto=format&fit=crop&q=80',
                'author_index'  => 0, // Aleeza Fatima
                'reading_time'  => '8 min read',
                'views'         => 2850,
                'likes'         => 225,
                'is_featured'   => false,
                'is_trending'   => false,
                'tags'          => 'Redis, Architecture, Microservices, Events',
                'published_at'  => now()->subDays(27),
                'content'       => "<h2>Simplicity in Message Queuing</h2>
<p>Redis Streams offer persistent message storage, consumer groups, and sub-millisecond acknowledgments with minimal operational overhead.</p>",
            ],
            [
                'category_slug' => 'database-sql',
                'title'         => 'Indexing Deep Dive: B-Trees, Hash Indexes, and Partial Indexes',
                'slug'          => 'indexing-deep-dive-btrees-hash-partial-indexes',
                'excerpt'       => 'Learn exactly how relational storage engines locate data rows and how to craft high-efficiency composite indexes.',
                'image'         => 'https://images.unsplash.com/photo-1544383835-bda2bc66a55d?w=1000&auto=format&fit=crop&q=80',
                'author_index'  => 7, // Ikhlas Hussain
                'reading_time'  => '7 min read',
                'views'         => 3150,
                'likes'         => 270,
                'is_featured'   => false,
                'is_trending'   => false,
                'tags'          => 'SQL, Indexing, B-Trees, Database Optimization',
                'published_at'  => now()->subDays(29),
                'content'       => "<h2>How the Storage Engine Thinks</h2>
<p>An index is a sorted data structure that maps column values to physical disk locations. Understanding B-Tree traversal is the key to sub-millisecond database queries.</p>",
            ],
            [
                'category_slug' => 'devops-cloud',
                'title'         => 'Docker Container Optimization: Multi-Stage Builds and Alpine Linux',
                'slug'          => 'docker-container-optimization-multistage-builds',
                'excerpt'       => 'Shrink your production container images from 1.2GB down to 45MB for lightning-fast deployments and cold starts.',
                'image'         => 'https://images.unsplash.com/photo-1607799279861-4dd421887fb3?w=1000&auto=format&fit=crop&q=80',
                'author_index'  => 0, // Aleeza Fatima
                'reading_time'  => '6 min read',
                'views'         => 2300,
                'likes'         => 195,
                'is_featured'   => false,
                'is_trending'   => false,
                'tags'          => 'Docker, DevOps, Containers, Optimization',
                'published_at'  => now()->subDays(31),
                'content'       => "<h2>Small Containers Ship Faster</h2>
<p>Multi-stage builds allow you to keep build tools, compilers, and dev dependencies out of final deployment artifacts, reducing attack surface and transfer times.</p>",
            ],
            [
                'category_slug' => 'security-auth',
                'title'         => 'Building Robust Role-Based Access Control (RBAC) in Laravel',
                'slug'          => 'building-robust-rbac-in-laravel',
                'excerpt'       => 'Architecting modular gates, policies, and hierarchical permissions without external package bloat.',
                'image'         => 'https://images.unsplash.com/photo-1550751827-4bd374c3f58b?w=1000&auto=format&fit=crop&q=80',
                'author_index'  => 4, // Tariq Hussain
                'reading_time'  => '6 min read',
                'views'         => 2900,
                'likes'         => 240,
                'is_featured'   => false,
                'is_trending'   => false,
                'tags'          => 'Laravel, Security, RBAC, Auth',
                'published_at'  => now()->subDays(33),
                'content'       => "<h2>Clean Permission Architecture</h2>
<p>Authorizing user abilities should be intuitive and maintainable. Laravel Policies give you clean object-oriented control over resource mutations.</p>",
            ],
            [
                'category_slug' => 'web-performance',
                'title'         => 'The Ultimate Guide to Modern Image Optimization on the Web',
                'slug'          => 'ultimate-guide-modern-image-optimization-web',
                'excerpt'       => 'AVIF vs WebP vs JXL: Choosing the optimal image formats, responsive picture elements, and blur placeholders.',
                'image'         => 'https://images.unsplash.com/photo-1507238691740-187a5b1d37b8?w=1000&auto=format&fit=crop&q=80',
                'author_index'  => 2, // Sana Akbar
                'reading_time'  => '5 min read',
                'views'         => 2600,
                'likes'         => 205,
                'is_featured'   => false,
                'is_trending'   => false,
                'tags'          => 'Performance, Images, AVIF, WebP',
                'published_at'  => now()->subDays(35),
                'content'       => "<h2>Images Make Up 60% of Average Page Weight</h2>
<p>By migrating from legacy JPEG and PNG to AVIF, bandwidth usage drops by over 50% while preserving crisp visual fidelity across high-DPI displays.</p>",
            ],
            [
                'category_slug' => 'testing-qa',
                'title'         => 'Contract Testing for Microservices: Preventing Breaking API Changes',
                'slug'          => 'contract-testing-microservices-preventing-breaking-api-changes',
                'excerpt'       => 'How consumer-driven contracts ensure frontend and backend services remain completely compatible without end-to-end test flakiness.',
                'image'         => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=1000&auto=format&fit=crop&q=80',
                'author_index'  => 6, // Munazza Batool
                'reading_time'  => '7 min read',
                'views'         => 1850,
                'likes'         => 150,
                'is_featured'   => false,
                'is_trending'   => false,
                'tags'          => 'Testing, Microservices, API, Contract Testing',
                'published_at'  => now()->subDays(37),
                'content'       => "<h2>Moving Beyond Brittle E2E Test Suites</h2>
<p>Contract testing verifies that API providers honor the payload shapes expected by API consumers before code merges into staging environments.</p>",
            ],
            [
                'category_slug' => 'engineering-career',
                'title'         => 'Conducting High-Empathy Code Reviews That Elevate Engineering Teams',
                'slug'          => 'conducting-high-empathy-code-reviews',
                'excerpt'       => 'Turn pull requests into positive learning opportunities while keeping code quality and velocity exceptionally high.',
                'image'         => 'https://images.unsplash.com/photo-1531482615713-2afd69097998?w=1000&auto=format&fit=crop&q=80',
                'author_index'  => 5, // Kubra Batool
                'reading_time'  => '6 min read',
                'views'         => 4100,
                'likes'         => 365,
                'is_featured'   => false,
                'is_trending'   => false,
                'tags'          => 'Culture, Code Reviews, Leadership, Team Dynamics',
                'published_at'  => now()->subDays(39),
                'content'       => "<h2>Code Reviews Are Human Interactions First</h2>
<p>The best code review culture fosters psychological safety. Praise great solutions as enthusiastically as you point out missing edge cases.</p>",
            ],
            [
                'category_slug' => 'laravel-php',
                'title'         => 'Building Real-time Dashboards with Laravel Echo and WebSockets',
                'slug'          => 'building-realtime-dashboards-laravel-echo-websockets',
                'excerpt'       => 'Broadcast server events directly to client interfaces with zero polling and maximum responsiveness.',
                'image'         => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=1000&auto=format&fit=crop&q=80',
                'author_index'  => 1, // Sania Fida
                'reading_time'  => '8 min read',
                'views'         => 3750,
                'likes'         => 315,
                'is_featured'   => false,
                'is_trending'   => true,
                'tags'          => 'Laravel, WebSockets, Realtime, Frontend',
                'published_at'  => now()->subDays(41),
                'content'       => "<h2>Real-Time Without Third-Party Subscriptions</h2>
<p>Learn how to configure self-hosted WebSocket servers alongside Laravel Echo to deliver instant metrics updates, chat feeds, and notifications.</p>",
            ],
        ];

        $createdArticles = [];
        foreach ($articlesData as $data) {
            $cat = $categories[$data['category_slug']];
            $author = $authors[$data['author_index']];

            $createdArticles[] = Article::create([
                'category_id'   => $cat->id,
                'author_id'     => $author->id,
                'title'         => $data['title'],
                'slug'          => $data['slug'],
                'excerpt'       => $data['excerpt'],
                'content'       => $data['content'],
                'image'         => $data['image'],
                'author_name'   => $author->name,
                'author_role'   => $author->role,
                'author_avatar' => $author->avatar,
                'reading_time'  => $data['reading_time'],
                'views'         => $data['views'],
                'likes'         => $data['likes'],
                'is_featured'   => $data['is_featured'],
                'is_trending'   => $data['is_trending'],
                'tags'          => $data['tags'],
                'published_at'  => $data['published_at'],
            ]);
        }

        // ── 4. Seed Comments ──────────────────────────────────────────────────
        $sampleComments = [
            'Fantastic breakdown! The circuit breaker pattern was exactly what we needed.',
            'This is one of the clearest explanations of event loop internals. Shared with my whole cohort.',
            'Great insight on SQLite WAL mode. We saw huge latency drops.',
            'Property hooks in PHP 8.4 are such a breath of fresh air.',
            'Very thorough tutorial. Highly recommended reading for all engineers.',
            'The emphasis on psychological safety during code reviews resonated deeply.',
            'Zero downtime migrations always felt terrifying before reading this walkthrough.',
            'Bookmarked! Love the clean typography and actionable code snippets on BlogHub.',
            'Incredible work. The author byline and reading time estimations are super helpful.',
        ];

        $commenters = [
            ['name' => 'Farhan Qureshi', 'email' => 'farhan.q@example.com', 'avatar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&auto=format&fit=crop&q=80'],
            ['name' => 'Zoya Ali', 'email' => 'zoya.ali@example.com', 'avatar' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100&auto=format&fit=crop&q=80'],
            ['name' => 'Hamza Sheikh', 'email' => 'hamza.s@example.com', 'avatar' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=100&auto=format&fit=crop&q=80'],
            ['name' => 'Hira Naveed', 'email' => 'hira.n@example.com', 'avatar' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100&auto=format&fit=crop&q=80'],
        ];

        foreach ($createdArticles as $index => $article) {
            $numComments = rand(2, 4);
            for ($i = 0; $i < $numComments; $i++) {
                $user = $commenters[array_rand($commenters)];
                $commentText = $sampleComments[array_rand($sampleComments)];
                Comment::create([
                    'article_id'    => $article->id,
                    'author_name'   => $user['name'],
                    'author_email'  => $user['email'],
                    'author_avatar' => $user['avatar'],
                    'content'       => $commentText,
                    'created_at'    => now()->subDays(rand(1, 14))->subHours(rand(1, 23)),
                ]);
            }
        }
    }
}

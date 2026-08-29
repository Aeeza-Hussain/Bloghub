<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;

// HomeController handles the main landing page of BlogHub.

class HomeController extends Controller
{
    /**
     * Show the Home page.
     * Route: GET /
     */
    public function index()
    {
        // ── Flagship / Hero Article ──────────────────────────────────────────
        $heroArticle = [
            'title'        => 'Architecting Resilient Web Applications: Patterns for 2026',
            'excerpt'      => 'A deep dive into distributed caching, graceful degradation, and event-driven architecture that modern engineering teams rely on for scale.',
            'category'     => 'Architecture',
            'author'       => 'Aleeza Fatima',
            'author_role'  => 'Founder & Staff Architect',
            'author_avatar'=> 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=150&auto=format&fit=crop&q=80',
            'image'        => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=1000&auto=format&fit=crop&q=80',
            'date'         => 'Aug 26, 2026',
            'read'         => '8 min read',
            'views'        => '4.2k',
            'comments'     => 34,
        ];

        // ── Featured Articles (Editorial Grid) ───────────────────────────────
        $featuredPosts = [
            [
                'title'        => 'Mastering Modern PHP 8.4: Property Hooks & Beyond',
                'excerpt'      => 'Explore the latest PHP capabilities that streamline boilerplate, improve type safety, and elevate your backend codebases.',
                'category'     => 'PHP & Laravel',
                'author'       => 'Sania Fida',
                'author_avatar'=> 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=150&auto=format&fit=crop&q=80',
                'image'        => 'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?w=800&auto=format&fit=crop&q=80',
                'date'         => 'Aug 24, 2026',
                'read'         => '6 min read',
                'views'        => '2.8k',
                'comments'     => 19,
                'tag_color'    => 'crimson',
            ],
            [
                'title'        => 'Designing High-Conversion Design Systems with Vanilla CSS',
                'excerpt'      => 'How to leverage CSS custom properties, container queries, and subgrid for blazing-fast, lightweight design systems.',
                'category'     => 'UI/UX & CSS',
                'author'       => 'Sana Akbar',
                'author_avatar'=> 'https://images.unsplash.com/photo-1580489944761-15a19d654956?w=150&auto=format&fit=crop&q=80',
                'image'        => 'https://images.unsplash.com/photo-1507238691740-187a5b1d37b8?w=800&auto=format&fit=crop&q=80',
                'date'         => 'Aug 21, 2026',
                'read'         => '7 min read',
                'views'        => '3.5k',
                'comments'     => 27,
                'tag_color'    => 'indigo',
            ],
            [
                'title'        => 'Demystifying Event Loops, Microtasks & Async JavaScript',
                'excerpt'      => 'A visual walkthrough of JavaScript runtime execution, promise scheduling, and performance tuning for high-throughput apps.',
                'category'     => 'JavaScript',
                'author'       => 'Amna Kiran',
                'author_avatar'=> 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=150&auto=format&fit=crop&q=80',
                'image'        => 'https://images.unsplash.com/photo-1550439022-6018c2a21a4d?w=800&auto=format&fit=crop&q=80',
                'date'         => 'Aug 19, 2026',
                'read'         => '5 min read',
                'views'        => '5.1k',
                'comments'     => 42,
                'tag_color'    => 'emerald',
            ],
        ];

        // ── Trending Quick Picks ──────────────────────────────────────────────
        $trendingPosts = [
            [
                'rank'     => '01',
                'title'    => 'Building Scalable Full-Stack Apps with SQLite and Laravel',
                'category' => 'Database',
                'read'     => '4 min read',
                'date'     => 'Aug 27, 2026',
            ],
            [
                'rank'     => '02',
                'title'    => 'The Pragmatic Guide to Zero-Downtime Database Migrations',
                'category' => 'DevOps',
                'read'     => '9 min read',
                'date'     => 'Aug 25, 2026',
            ],
            [
                'rank'     => '03',
                'title'    => 'Micro-Animations That Actually Improve UX Without Hurting Performance',
                'category' => 'Frontend',
                'read'     => '5 min read',
                'date'     => 'Aug 23, 2026',
            ],
            [
                'rank'     => '04',
                'title'    => 'How Leading Engineering Teams Write Automated Integration Tests',
                'category' => 'Testing',
                'read'     => '7 min read',
                'date'     => 'Aug 20, 2026',
            ],
        ];

        // ── Categories with icons, counts, and descriptions ───────────────────
        $categories = [
            [
                'name'        => 'Laravel & PHP',
                'slug'        => 'laravel',
                'icon'        => 'bi-layers-fill',
                'count'       => 42,
                'description' => 'Modern backend architecture, Eloquent, APIs and best practices.',
                'color'       => '#E11D48',
            ],
            [
                'name'        => 'JavaScript & Web',
                'slug'        => 'javascript',
                'icon'        => 'bi-code-slash',
                'count'       => 38,
                'description' => 'Async patterns, DOM optimization, modern ES next techniques.',
                'color'       => '#F59E0B',
            ],
            [
                'name'        => 'CSS & UI Design',
                'slug'        => 'css',
                'icon'        => 'bi-palette2',
                'count'       => 29,
                'description' => 'Design systems, responsive layout grids, responsive typography.',
                'color'       => '#3B82F6',
            ],
            [
                'name'        => 'DevOps & Cloud',
                'slug'        => 'devops',
                'icon'        => 'bi-hdd-network',
                'count'       => 24,
                'description' => 'CI/CD pipelines, Docker containers, deployment strategies.',
                'color'       => '#10B981',
            ],
            [
                'name'        => 'Database & SQL',
                'slug'        => 'database',
                'icon'        => 'bi-database-fill-gear',
                'count'       => 21,
                'description' => 'Query optimization, indexing strategies, data modeling.',
                'color'       => '#8B5CF6',
            ],
            [
                'name'        => 'Engineering Career',
                'slug'        => 'career',
                'icon'        => 'bi-briefcase-fill',
                'count'       => 18,
                'description' => 'Tech interviews, code reviews, writing engineering design docs.',
                'color'       => '#EC4899',
            ],
        ];

        // ── Featured Authors ──────────────────────────────────────────────────
        $authors = [
            [
                'name'     => 'Aleeza Fatima',
                'role'     => 'Staff Infrastructure Architect',
                'avatar'   => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=200&auto=format&fit=crop&q=80',
                'articles' => 28,
                'followers'=> '18.4k',
                'specialty'=> 'Cloud & Distributed Systems',
            ],
            [
                'name'     => 'Sania Fida',
                'role'     => 'Principal Backend Architect',
                'avatar'   => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=200&auto=format&fit=crop&q=80',
                'articles' => 35,
                'followers'=> '16.2k',
                'specialty'=> 'PHP / Laravel / Microservices',
            ],
            [
                'name'     => 'Sana Akbar',
                'role'     => 'Design Systems Lead',
                'avatar'   => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?w=200&auto=format&fit=crop&q=80',
                'articles' => 22,
                'followers'=> '14.3k',
                'specialty'=> 'Vanilla CSS / A11y / UI Systems',
            ],
            [
                'name'     => 'Amna Kiran',
                'role'     => 'Senior Frontend Engineer',
                'avatar'   => 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=200&auto=format&fit=crop&q=80',
                'articles' => 19,
                'followers'=> '12.8k',
                'specialty'=> 'JavaScript / Performance / Web APIs',
            ],
        ];

        // ── Statistics Band ───────────────────────────────────────────────────
        $stats = [
            ['number' => '250+',   'label' => 'Curated Articles',   'sub' => 'Peer-reviewed by staff engineers'],
            ['number' => '48',     'label' => 'Verified Authors',   'sub' => 'Industry practitioners & leads'],
            ['number' => '120K+',  'label' => 'Monthly Readers',    'sub' => 'Across 140+ countries'],
            ['number' => '99.4%',  'label' => 'Reader Satisfaction','sub' => 'Based on 5,000+ ratings'],
        ];

        // ── Testimonials ──────────────────────────────────────────────────────
        $testimonials = [
            [
                'quote'   => 'BlogHub is the only publication where articles are consistently thorough, respectful of developer time, and actually production-grade.',
                'author'  => 'Kubra Batool',
                'role'    => 'Engineering Director',
                'avatar'  => 'https://images.unsplash.com/photo-1567532939604-b6b5b0db2604?w=150&auto=format&fit=crop&q=80',
                'rating'  => 5,
            ],
            [
                'quote'   => 'The code snippets work without hidden dependencies. I share BlogHub tutorials with our entire junior and mid-level engineering cohorts.',
                'author'  => 'Ikhlas Hussain',
                'role'    => 'Principal Cloud Architect',
                'avatar'  => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=150&auto=format&fit=crop&q=80',
                'rating'  => 5,
            ],
            [
                'quote'   => 'Writing for BlogHub transformed how I communicate complex systems. The editorial review standards are second to none in the tech sphere.',
                'author'  => 'Tariq Hussain',
                'role'    => 'Principal Security Researcher',
                'avatar'  => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&auto=format&fit=crop&q=80',
                'rating'  => 5,
            ],
        ];

        return view('home.index', compact('heroArticle', 'featuredPosts', 'trendingPosts', 'categories', 'authors', 'stats', 'testimonials'));
    }
}

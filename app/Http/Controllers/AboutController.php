<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// AboutController handles the About page with an editorial storytelling perspective.

class AboutController extends Controller
{
    /**
     * Show the About page.
     * Route: GET /about
     */
    public function index()
    {
        // ── Editorial Core Values ─────────────────────────────────────────────
        $values = [
            [
                'number' => '01',
                'icon'   => 'bi-shield-check',
                'title'  => 'Verified Technical Accuracy',
                'text'   => 'Every code sample, benchmark, and pattern is tested and peer-reviewed against active production frameworks before publication.',
            ],
            [
                'number' => '02',
                'icon'   => 'bi-journal-code',
                'title'  => 'Clarity Over Complexity',
                'text'   => 'We reject unnecessary jargon. High-impact engineering education demystifies complex abstractions with visual models and real code.',
            ],
            [
                'number' => '03',
                'icon'   => 'bi-people',
                'title'  => 'Author-First Ecosystem',
                'text'   => 'We empower writers with dedicated editorial mentorship, transparent metrics, and an audience of serious practitioners.',
            ],
            [
                'number' => '04',
                'icon'   => 'bi-eye-slash',
                'title'  => 'Zero Clickbait & Noise',
                'text'   => 'No sponsored product placements, no paywalled bait, and no AI-generated fluff. Real knowledge curated for real builders.',
            ],
        ];

        // ── Team / Leadership Showcase ────────────────────────────────────────
        $team = [
            [
                'name'     => 'Aleeza Fatima',
                'role'     => 'Editor-in-Chief & Founder',
                'bio'      => 'Staff Infrastructure Architect with 10+ years building distributed web products. Passionate about technical writing and open-source tooling.',
                'avatar'   => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=300&auto=format&fit=crop&q=80',
                'location' => 'Islamabad, Pakistan',
                'twitter'  => 'https://x.com',
                'github'   => 'https://github.com',
                'linkedin' => 'https://linkedin.com',
            ],
            [
                'name'     => 'Sania Fida',
                'role'     => 'Head of Backend Content',
                'bio'      => 'Core contributor to modern PHP ecosystems, database performance speaker, and architect of enterprise Laravel services.',
                'avatar'   => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=300&auto=format&fit=crop&q=80',
                'location' => 'Lahore, Pakistan',
                'twitter'  => 'https://x.com',
                'github'   => 'https://github.com',
                'linkedin' => 'https://linkedin.com',
            ],
            [
                'name'     => 'Sana Akbar',
                'role'     => 'Lead Frontend & Design Systems',
                'bio'      => 'Pioneer in semantic CSS architecture, accessibility compliance, and developer ergonomics across enterprise design systems.',
                'avatar'   => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?w=300&auto=format&fit=crop&q=80',
                'location' => 'Karachi, Pakistan',
                'twitter'  => 'https://x.com',
                'github'   => 'https://github.com',
                'linkedin' => 'https://linkedin.com',
            ],
            [
                'name'     => 'Amna Kiran',
                'role'     => 'Senior Technical Editor',
                'bio'      => 'Specialist in asynchronous JavaScript engines and frontend web performance metrics. Author of 3 tech publications.',
                'avatar'   => 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=300&auto=format&fit=crop&q=80',
                'location' => 'Rawalpindi, Pakistan',
                'twitter'  => 'https://x.com',
                'github'   => 'https://github.com',
                'linkedin' => 'https://linkedin.com',
            ],
        ];

        // ── Platform Milestones / Story Timeline ─────────────────────────────
        $milestones = [
            [
                'year'  => '2023',
                'title' => 'The Genesis',
                'desc'  => 'Founded as a curated technical newsletter for engineers seeking in-depth, code-heavy architectural breakdowns.',
            ],
            [
                'year'  => '2024',
                'title' => 'Open Platform & Peer Reviews',
                'desc'  => 'Expanded to vetted authors with a formal editorial verification pipeline and automated code validation.',
            ],
            [
                'year'  => '2025',
                'title' => '100K Monthly Milestone',
                'desc'  => 'Surpassed 100,000 active monthly engineers relying on BlogHub tutorials and blueprints.',
            ],
            [
                'year'  => '2026',
                'title' => 'Next-Gen Publishing',
                'desc'  => 'Launched the modern responsive redesign with zero-latency browsing, dark mode, and author workspaces.',
            ],
        ];

        return view('about.index', compact('values', 'team', 'milestones'));
    }
}

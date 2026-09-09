@extends('layouts.app')

@section('title', 'Editorial Desk & Contact')

@section('meta_description', 'Get in touch with the BlogHub editorial desk, pitch a technical article, report corrections, or inquire about contributor opportunities.')

@section('content')

{{-- ════════════════════════════════════════════════════════════
     1. CONTACT HERO
     ════════════════════════════════════════════════════════════ --}}
<section class="page-hero-wrapper">
    <div class="container">
        <span class="badge badge-brand reveal-item" style="margin-bottom: 1rem;">
            <i class="bi bi-chat-left-dots-fill"></i> Direct Editorial Channel
        </span>

        <h1 class="display-title reveal-item" style="max-width: 780px; margin-left: auto; margin-right: auto;">
            Get in touch with our <span class="editorial-italic">editorial desk</span>.
        </h1>

        <p class="section-desc reveal-item" style="max-width: 580px; margin-left: auto; margin-right: auto; margin-top: 1rem;">
            Whether you are pitching a technical article, reporting a correction, or exploring author opportunities — our editorial team is here.
        </p>

        <div class="reveal-item">
            <nav class="breadcrumb" aria-label="Breadcrumb navigation">
                <a href="{{ route('home') }}" class="breadcrumb-link"><i class="bi bi-house-door"></i> Home</a>
                <span>&bull;</span>
                <span style="color: var(--text-primary); font-weight: 600;">Contact & Inquiries</span>
            </nav>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════════════════════
     2. TWO-COLUMN CONTACT LAYOUT: Info & Form
     ════════════════════════════════════════════════════════════ --}}
<section class="section">
    <div class="container">
        <div class="contact-layout-grid">

            {{-- ── LEFT COLUMN: Editorial Contact Information ─────── --}}
            <div class="contact-info-panel reveal-item">
                <span class="section-eyebrow"><i class="bi bi-geo-alt"></i> Communications</span>
                <h2 style="font-size: 1.75rem; margin-bottom: 0.75rem; color: var(--text-primary);">
                    Direct Access to <span class="text-gradient">Our Editors</span>
                </h2>
                <p style="color: var(--text-secondary); font-size: 0.95rem; line-height: 1.65;">
                    We treat correspondence with the same rigor as our technical articles. All inquiries are assigned directly to an editor on duty.
                </p>

                {{-- Channels --}}
                <div class="contact-channels">

                    {{-- Channel 1: Email --}}
                    <div class="channel-card">
                        <div class="channel-icon-box">
                            <i class="bi bi-envelope-at-fill"></i>
                        </div>
                        <div class="channel-meta">
                            <label>Editorial & Submissions</label>
                            <a href="mailto:editors@bloghub.dev">editors@bloghub.dev</a>
                            <p>For article drafts, corrections, and inquiries</p>
                        </div>
                    </div>

                    {{-- Channel 2: Phone --}}
                    <div class="channel-card">
                        <div class="channel-icon-box">
                            <i class="bi bi-telephone-fill"></i>
                        </div>
                        <div class="channel-meta">
                            <label>Media & Press Desk</label>
                            <a href="tel:+15552345678">+1 (555) 234-5678</a>
                            <p>Mon – Fri, 9:00 AM – 6:00 PM EST</p>
                        </div>
                    </div>

                    {{-- Channel 3: Location --}}
                    <div class="channel-card">
                        <div class="channel-icon-box">
                            <i class="bi bi-building"></i>
                        </div>
                        <div class="channel-meta">
                            <label>Headquarters</label>
                            <span>500 Howard Street, Suite 400</span>
                            <p>San Francisco, CA 94105, United States</p>
                        </div>
                    </div>

                </div>

                {{-- Response SLA Guarantee Badge --}}
                <div style="background: var(--bg-surface-alt); border: 1px solid var(--border-subtle); border-radius: var(--radius-md); padding: 1.25rem; display: flex; align-items: flex-start; gap: 0.85rem; margin-bottom: 1.5rem;">
                    <div style="font-size: 1.35rem; color: var(--brand-accent);"><i class="bi bi-clock-history"></i></div>
                    <div>
                        <strong style="font-size: 0.88rem; color: var(--text-primary); display: block; margin-bottom: 0.2rem;">48-Hour Response SLA</strong>
                        <p style="font-size: 0.8rem; color: var(--text-secondary); line-height: 1.45; margin: 0;">Every message received through this form receives a personalized response from our editorial team.</p>
                    </div>
                </div>

                {{-- Social Channels --}}
                <div>
                    <span style="font-size: 0.78rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.06em; color: var(--text-muted); display: block; margin-bottom: 0.75rem;">
                        Connect on Social
                    </span>
                    <div class="social-links-row">
                        <a href="https://x.com" target="_blank" rel="noopener" class="btn-icon" aria-label="Twitter">
                            <i class="bi bi-twitter-x"></i>
                        </a>
                        <a href="https://github.com" target="_blank" rel="noopener" class="btn-icon" aria-label="GitHub">
                            <i class="bi bi-github"></i>
                        </a>
                        <a href="https://linkedin.com" target="_blank" rel="noopener" class="btn-icon" aria-label="LinkedIn">
                            <i class="bi bi-linkedin"></i>
                        </a>
                        <a href="#" class="btn-icon" aria-label="Discord">
                            <i class="bi bi-discord"></i>
                        </a>
                    </div>
                </div>
            </div>

            {{-- ── RIGHT COLUMN: High-End Contact Form ────────────── --}}
            <div class="contact-form-card reveal-item">
                <h3 style="font-size: 1.6rem; margin-bottom: 0.4rem; color: var(--text-primary);">
                    Send a Message
                </h3>
                <p style="color: var(--text-secondary); font-size: 0.92rem; margin-bottom: 1.75rem;">
                    Complete the fields below. Required fields are marked with <span style="color: var(--brand-accent);">*</span>
                </p>

                {{-- Flash Message Display --}}
                @if (session('success'))
                    <div class="alert-banner alert-banner-success">
                        <i class="bi bi-check-circle-fill" style="font-size: 1.2rem; flex-shrink: 0;"></i>
                        <div>
                            <strong style="display: block; margin-bottom: 0.15rem;">Message Received!</strong>
                            <span>{{ session('success') }}</span>
                        </div>
                    </div>
                @endif

                {{-- Form Element --}}
                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf

                    {{-- Row 1: Name & Email --}}
                    <div class="form-row-2">

                        {{-- Name Field --}}
                        <div class="form-group">
                            <label for="name" class="form-label">
                                <span>Full Name</span>
                                <span class="required">*</span>
                            </label>
                            <div class="input-with-icon">
                                <i class="bi bi-person input-icon"></i>
                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Elena Vance"
                                    value="{{ old('name') }}"
                                    required
                                    autocomplete="name"
                                >
                            </div>
                            @error('name')
                                <div class="error-message">
                                    <i class="bi bi-exclamation-triangle-fill"></i>
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        {{-- Email Field --}}
                        <div class="form-group">
                            <label for="email" class="form-label">
                                <span>Email Address</span>
                                <span class="required">*</span>
                            </label>
                            <div class="input-with-icon">
                                <i class="bi bi-envelope input-icon"></i>
                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="elena@company.com"
                                    value="{{ old('email') }}"
                                    required
                                    autocomplete="email"
                                >
                            </div>
                            @error('email')
                                <div class="error-message">
                                    <i class="bi bi-exclamation-triangle-fill"></i>
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                    </div>

                    {{-- Row 2: Subject Field --}}
                    <div class="form-group">
                        <label for="subject" class="form-label">
                            <span>Subject & Topic</span>
                            <span class="required">*</span>
                        </label>
                        <div class="input-with-icon">
                            <i class="bi bi-tag input-icon"></i>
                            <input
                                type="text"
                                id="subject"
                                name="subject"
                                class="form-control @error('subject') is-invalid @enderror"
                                placeholder="e.g. Technical Article Submission / Editorial Correction"
                                value="{{ old('subject') }}"
                                required
                            >
                        </div>
                        @error('subject')
                            <div class="error-message">
                                <i class="bi bi-exclamation-triangle-fill"></i>
                                <span>{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    {{-- Row 3: Message Textarea --}}
                    <div class="form-group">
                        <label for="message" class="form-label">
                            <span>Your Message</span>
                            <span class="required">*</span>
                        </label>
                        <textarea
                            id="message"
                            name="message"
                            class="form-control no-icon @error('message') is-invalid @enderror"
                            rows="6"
                            placeholder="Please provide clear context, article links, or a summary of your proposal..."
                            required
                            style="min-height: 140px; resize: vertical;"
                        >{{ old('message') }}</textarea>
                        @error('message')
                            <div class="error-message">
                                <i class="bi bi-exclamation-triangle-fill"></i>
                                <span>{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    {{-- Submit Button --}}
                    <div style="margin-top: 1.75rem;">
                        <button type="submit" class="btn btn-primary btn-lg" style="width: 100%;">
                            <span>Transmit Message to Editorial Desk</span>
                            <i class="bi bi-send-fill"></i>
                        </button>
                    </div>

                    <div style="font-size: 0.78rem; color: var(--text-faint); text-align: center; margin-top: 1rem; display: flex; align-items: center; justify-content: center; gap: 0.35rem;">
                        <i class="bi bi-shield-check"></i> Encrypted transmission. Zero data sharing with third parties.
                    </div>

                </form>
            </div>

        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════════════════════
     3. FREQUENTLY ASKED QUESTIONS ACCORDION
     ════════════════════════════════════════════════════════════ --}}
<section class="section-sm" style="background: var(--bg-surface-alt); border-top: 1px solid var(--border-subtle);">
    <div class="container container-narrow">

        <div class="section-header text-center reveal-item">
            <span class="section-eyebrow"><i class="bi bi-question-circle"></i> Quick Answers</span>
            <h2 class="section-title">Frequently Asked Questions</h2>
            <p class="section-desc">Common questions regarding article submissions, copyright guidelines, and technical reviews.</p>
        </div>

        <div class="faq-accordion-group">
            @foreach ($faqs as $index => $faq)
            <div class="faq-accordion-item {{ $index === 0 ? 'active' : '' }} reveal-item">
                <button type="button" class="faq-toggle-trigger" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}">
                    <span>{{ $faq['question'] }}</span>
                    <i class="bi bi-chevron-down faq-chevron-icon"></i>
                </button>
                <div class="faq-collapse-body">
                    <p>{{ $faq['answer'] }}</p>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>

@endsection

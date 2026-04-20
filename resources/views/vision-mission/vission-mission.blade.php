@extends('layouts.app')

@section('title', 'Vision & Mission - GPGC Mansehra')

@push('styles')
<style>
    :root {
        --primary:    #1a5276;
        --primary-dk: #154360;
        --accent:     #c8972a;
        --bg:         #f4f6f9;
        --card-bg:    #ffffff;
        --text:       #1e2d3d;
        --text-muted: #5a6a7a;
        --border:     #dce3ec;
    }

    .content-wrap { background: var(--bg); padding: 30px 0 60px; }

    .two-col {
        max-width: 1200px; margin: 0 auto; padding: 0 24px;
        display: grid; grid-template-columns: 1fr 300px; gap: 30px; align-items: start;
    }
    @media(max-width:900px){ .two-col { grid-template-columns: 1fr; } }

    /* ── MAIN CONTENT ── */
    .main-content { background: #fff; padding: 28px 32px; }

    .section-heading {
        font-size: 1.4rem; color: var(--primary);
        font-weight: 700; margin: 0 0 18px;
    }

    .sub-heading {
        font-size: .95rem; font-weight: 700; color: var(--text);
        text-decoration: underline; margin: 20px 0 6px; display: block;
    }

    .main-content p {
        color: var(--text); font-size: .93rem; line-height: 1.85;
        text-align: justify; margin-bottom: 12px;
    }

    /* Numbered objectives — plain text like screenshot */
    .obj-list { list-style: none; padding: 0; margin: 8px 0 20px; }
    .obj-list li {
        font-size: .93rem; color: var(--text);
        line-height: 1.75; text-align: justify;
        padding: 4px 0;
    }

    /* Core values — bold label inline */
    .cv-block { margin: 8px 0 6px; }
    .cv-block strong { font-weight: 700; color: var(--text); }
    .cv-block p {
        display: inline;
        font-size: .93rem; color: var(--text);
        line-height: 1.85; text-align: justify;
    }

    /* ── SIDEBAR ── */
    .sidebar { display: flex; flex-direction: column; gap: 0; }

    .side-card { background: #fff; border: 1px solid #ccc; margin-bottom: 20px; }
    .side-card-header {
        background: var(--primary); color: #fff;
        padding: 11px 16px; font-size: .82rem; font-weight: 700;
        letter-spacing: 1.5px; text-transform: uppercase; text-align: center;
    }

    /* Scrolling news */
    .news-scroll-wrap {
        height: 260px; overflow: hidden; position: relative;
    }
    .news-scroll-wrap::after {
        content: ''; position: absolute; bottom: 0; left: 0; right: 0;
        height: 28px; background: linear-gradient(transparent, #fff);
        pointer-events: none;
    }
    .news-scroll-inner {
        animation: newsUp 22s linear infinite;
    }
    .news-scroll-inner:hover { animation-play-state: paused; }
    @keyframes newsUp {
        0%   { transform: translateY(0); }
        100% { transform: translateY(-50%); }
    }

    .news-item {
        padding: 10px 14px;
        border-bottom: 1px dashed #ccc;
    }
    .news-item:last-child { border-bottom: none; }
    .news-item a {
        color: var(--primary); font-size: .82rem; font-weight: 600;
        text-decoration: none; line-height: 1.45;
        display: flex; gap: 6px;
    }
    .news-item a::before { content: '▶'; font-size: .6rem; margin-top: 3px; flex-shrink: 0; color: var(--accent); }
    .news-item a:hover { color: var(--accent); }
    .badge-new {
        display: inline-block; background: #c0392b; color: #fff;
        font-size: .63rem; font-weight: 700; padding: 1px 5px;
        border-radius: 3px; vertical-align: middle; margin-left: 4px;
    }
    .news-date { font-size: .73rem; color: var(--text-muted); padding-left: 16px; margin-top: 3px; display: block; }

    /* Important Links */
    .link-list { padding: 0; list-style: none; margin: 0; }
    .link-item { border-bottom: 1px dashed #ccc; }
    .link-item:last-child { border-bottom: none; }
    .link-item a {
        display: flex; align-items: center; gap: 6px;
        padding: 10px 14px; color: var(--primary);
        font-size: .84rem; font-weight: 600; text-decoration: none;
    }
    .link-item a::before { content: '▶'; font-size: .6rem; color: var(--accent); }
    .link-item a:hover { background: #f0f6fc; color: var(--accent); }
</style>
@endpush

@section('content')

<div class="content-wrap">
    <div class="two-col">

        {{-- ===== MAIN CONTENT ===== --}}
        <div class="main-content">
            <h2 class="section-heading">Mission &amp; Core Values</h2>

            <span class="sub-heading">Mission:</span>
            <p>The mission of GPGC Mansehra is to achieve and maintain high standards in every sphere of its teaching and promote an open, collaborative and novel culture of scientific inquiry to improve the lives and livelihoods of the people through sustainable development.</p>

            <span class="sub-heading">Goal:</span>
            <p>GPGC Mansehra aims to create an enabling environment for conducive learning to find solutions of current day's problems and prevention of new ones through sustained supply of trained human resources to the national and international arena.</p>

            <span class="sub-heading">Objectives:</span>
            <p>In view of the educational challenges facing Khyber Pakhtunkhwa and Pakistan at large, the determined vision of GPGC Mansehra is strengthened by the implicit acknowledgment that education is the principal solution not only to widespread poverty but to a peaceful future as well; to human resource development; to capacity building and the development of the vital knowledge for an improved economy. Keeping this in mind the following key objectives are being framed:</p>

            <ol class="obj-list">
                <li>1: To provide quality education to deserving students that inculcates positive changes in their attitudes towards national development.</li>
                <li>2: To establish a community of outstanding scholars, teachers and administrative staff to promote and maintain academic distinction.</li>
                <li>3: To promote scientific research to acquire excellence in various fields of study.</li>
                <li>4: To establish network and coordination with leading national, regional and international institutes to share experiences for academic and research excellence.</li>
                <li>5: To contribute national development through incorporation of academic research findings in national policies and strategies.</li>
            </ol>

            <span class="sub-heading">Core Values:</span>
            <p>GPGC Mansehra has been established as providing opportunities for strengthening and extending the important relationship between modern sciences and the community, providing a platform for a more just and prosperous society. The college will follow the following core values in its day-to-day routine official business and management.</p>

            <div class="cv-block">
                <strong>Openness: </strong>
                <p>The college will observe openness as core value in its official business. Openness to foreign values, religious beliefs, ethnic profiles, changes in government policies, plans and programs. Each and every aspect of the official business shall have a built-in resilience mechanism to accommodate itself in the changing circumstances.</p>
            </div>

            <div class="cv-block">
                <strong>Transparency: </strong>
                <p>The college shall observe and ensure transparency in every sphere of its academic/administrative operations. Every aspect of the official business shall have clear, fair and transparent procedures to achieve excellence in diverse fields.</p>
            </div>

            <div class="cv-block">
                <strong>Equality: </strong>
                <p>GPGC Mansehra is committed to equal opportunity for all — every student and faculty member is treated fairly irrespective of religion, gender, or background.</p>
            </div>

            <div class="cv-block">
                <strong>Accountability: </strong>
                <p>All members of the college community are accountable for their actions and decisions, maintaining the highest standards of professional responsibility.</p>
            </div>
        </div>

        {{-- ===== SIDEBAR ===== --}}
        <aside class="sidebar">

            <div class="side-card">
                <div class="side-card-header">NEWS &amp; EVENTS</div>
                <div class="news-scroll-wrap">
                    <div class="news-scroll-inner">
                        <div class="news-item">
                            <a href="#">GPGC Mansehra Annual Prize Distribution Ceremony <span class="badge-new">New</span></a>
                            <span class="news-date">15 Apr 2026</span>
                        </div>
                        <div class="news-item">
                            <a href="#">Admissions Open for Intermediate Session 2026 <span class="badge-new">New</span></a>
                            <span class="news-date">10 Apr 2026</span>
                        </div>
                        <div class="news-item">
                            <a href="#">Students Excel in BISE Abbottabad Board Exams 2025</a>
                            <span class="news-date">20 Mar 2026</span>
                        </div>
                        <div class="news-item">
                            <a href="#">Inter-College Debate Competition at GPGC Mansehra</a>
                            <span class="news-date">05 Mar 2026</span>
                        </div>
                        <div class="news-item">
                            <a href="#">Transport Registration Open for Fall 2026 Semester</a>
                            <span class="news-date">01 Mar 2026</span>
                        </div>
                        {{-- Duplicate for seamless loop --}}
                        <div class="news-item">
                            <a href="#">GPGC Mansehra Annual Prize Distribution Ceremony <span class="badge-new">New</span></a>
                            <span class="news-date">15 Apr 2026</span>
                        </div>
                        <div class="news-item">
                            <a href="#">Admissions Open for Intermediate Session 2026 <span class="badge-new">New</span></a>
                            <span class="news-date">10 Apr 2026</span>
                        </div>
                        <div class="news-item">
                            <a href="#">Students Excel in BISE Abbottabad Board Exams 2025</a>
                            <span class="news-date">20 Mar 2026</span>
                        </div>
                        <div class="news-item">
                            <a href="#">Inter-College Debate Competition at GPGC Mansehra</a>
                            <span class="news-date">05 Mar 2026</span>
                        </div>
                        <div class="news-item">
                            <a href="#">Transport Registration Open for Fall 2026 Semester</a>
                            <span class="news-date">01 Mar 2026</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="side-card">
                <div class="side-card-header">IMPORTANT LINKS</div>
                <ul class="link-list">
                    <li class="link-item"><a href="#">BISE Abbottabad</a></li>
                    <li class="link-item"><a href="#">University of Hazara</a></li>
                    <li class="link-item"><a href="#">HED Khyber Pakhtunkhwa</a></li>
                    <li class="link-item"><a href="#">HEC Pakistan</a></li>
                    <li class="link-item"><a href="#">Student Portal</a></li>
                    <li class="link-item"><a href="#">Result Gazette</a></li>
                    <li class="link-item"><a href="#">Scholarship Programs</a></li>
                </ul>
            </div>

        </aside>

    </div>
</div>

@endsection
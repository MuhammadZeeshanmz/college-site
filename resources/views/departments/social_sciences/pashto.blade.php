@extends('layouts.app')

@section('title', 'د پښتو څانګه — ګورنمنټ پوسټ ګریجوټ کالج مانسهره | Department of Pashto — Government Postgraduate College Mansehra')

@push('styles')
<style>
/* ══ Dept page base ══ */
.dept-breadcrumb {
    background: linear-gradient(90deg, #002855 0%, #004a8f 50%, #002855 100%);
    padding: 12px 0; border-bottom: 3px solid #ffd700;
}
.dept-breadcrumb .wrap {
    max-width: 1280px; margin: auto; padding: 0 20px;
    display: flex; align-items: center; gap: 8px;
    font-size: 13px; color: rgba(255,255,255,.7);
}
.dept-breadcrumb a { color: #ffd700; text-decoration: none; }
.dept-breadcrumb a:hover { text-decoration: underline; }
.dept-breadcrumb span { color: rgba(255,255,255,.4); }

.dept-page { background: #f4f5f7; min-height: 70vh; padding: 28px 0 60px; }
.dept-wrap { max-width: 1280px; margin: auto; padding: 0 20px; }

.dept-title-bar {
    background: #fff; border: 1px solid #dde3ec;
    border-left: 5px solid #0066cc; border-radius: 4px;
    padding: 14px 20px; margin-bottom: 22px;
    display: flex; align-items: center; gap: 14px;
}
.dept-title-bar h1 {
    font-family: 'Playfair Display', serif;
    font-size: 22px; font-weight: 700; color: #002855; margin: 0;
}
.dept-title-bar .dept-icon {
    width: 48px; height: 48px; background: #002855;
    border-radius: 8px; display: flex; align-items: center;
    justify-content: center; font-size: 24px; flex-shrink: 0;
}

/* 3-col layout */
.dept-grid {
    display: grid;
    grid-template-columns: 1fr 1.1fr 0.85fr;
    gap: 18px; align-items: start;
}

/* Card */
.dept-card {
    background: #fff; border: 1px solid #dde3ec;
    border-radius: 6px; overflow: hidden; margin-bottom: 18px;
}
.dept-card-hdr {
    background: #1a6e85; color: #fff;
    padding: 10px 16px; font-size: 13.5px; font-weight: 700;
    letter-spacing: .04em;
    display: flex; align-items: center; justify-content: space-between;
}
.dept-card-hdr a { color: #ffd700; font-size: 12px; font-weight: 600; text-decoration: none; }
.dept-card-hdr a:hover { text-decoration: underline; }
.dept-card-body { padding: 14px 16px; }

/* Intro */
.intro-img-row { display: flex; gap: 14px; align-items: flex-start; margin-bottom: 14px; }
.intro-img { width: 180px; height: 130px; object-fit: cover; flex-shrink: 0; border: 1px solid #dde; border-radius: 4px; }
.intro-img-placeholder {
    width: 180px; height: 130px; flex-shrink: 0;
    background: linear-gradient(135deg, #002855 0%, #0066cc 100%);
    display: flex; align-items: center; justify-content: center;
    font-size: 48px; border-radius: 4px; color: #fff;
}
.intro-text { font-size: 13px; color: #333; line-height: 1.75; text-align: justify; }
.intro-text p { margin-bottom: 8px; }
.btn-read-more {
    display: inline-block; background: #1a6e85; color: #fff;
    padding: 8px 22px; border-radius: 4px; font-size: 13px; font-weight: 700;
    text-decoration: none; letter-spacing: .05em; margin-top: 6px; transition: background .2s;
}
.btn-read-more:hover { background: #0b5268; }

.intro-gallery-placeholder {
    width: 100%; height: 220px;
    background: linear-gradient(135deg, #1a3a6c 0%, #0066cc 50%, #1a3a6c 100%);
    border-radius: 4px;
    display: flex; align-items: center; justify-content: center;
    flex-direction: column; gap: 12px; color: #fff;
}
.intro-gallery-placeholder .gal-icon { font-size: 60px; }
.intro-gallery-placeholder .gal-text { font-size: 14px; font-weight: 600; opacity: .8; }

/* ══ MOVING NEWS & EVENTS ══ */
.news-scroll-wrap {
    height: 240px; overflow: hidden; position: relative;
}
.news-scroll-wrap::after {
    content: '';
    position: absolute; bottom: 0; left: 0; right: 0; height: 40px;
    background: linear-gradient(to bottom, transparent, #fff);
    pointer-events: none;
}
.news-scroll-inner {
    animation: scroll-news 20s linear infinite;
}
.news-scroll-inner:hover {
    animation-play-state: paused;
}
@keyframes scroll-news {
    0%   { transform: translateY(0); }
    100% { transform: translateY(-50%); }
}

/* News list */
.news-list { list-style: none; padding: 0; margin: 0; }
.news-list li {
    padding: 10px 4px; border-bottom: 1px dashed #ccc;
    font-size: 13px; color: #222; line-height: 1.45;
}
.news-list li:last-child { border-bottom: none; }
.news-list li a { color: #0b4d8a; text-decoration: none; font-weight: 600; transition: color .2s; }
.news-list li a:hover { color: #0066cc; text-decoration: underline; }
.news-date { font-size: 11px; color: #888; display: block; margin-top: 3px; }
.new-tag { color: red; font-weight: 800; font-size: 11px; margin-left: 4px; }

/* Important Links grid */
.imp-links-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 2px 20px; }
.imp-links-grid a {
    display: flex; align-items: flex-start; gap: 6px;
    padding: 6px 2px; font-size: 13px; color: #0b4d8a;
    text-decoration: none; border-bottom: 1px dotted #ddd;
    transition: color .2s; line-height: 1.35;
}
.imp-links-grid a:hover { color: #0066cc; }
.imp-links-grid a::before { content: '•'; color: #0066cc; flex-shrink: 0; font-size: 16px; line-height: 1; }

/* Announcements */
.ann-empty { font-size: 13px; color: #888; padding: 8px 0; font-style: italic; }

/* HOD */
.hod-card { display: flex; gap: 14px; align-items: flex-start; padding: 16px; }
.hod-photo-placeholder {
    width: 90px; height: 110px; flex-shrink: 0;
    background: #1a3a6c; border-radius: 4px;
    display: flex; align-items: center; justify-content: center;
    font-size: 36px; color: #fff;
}
.hod-text { font-size: 12.5px; color: #444; line-height: 1.7; text-align: justify; }
.hod-name { font-weight: 700; color: #002855; font-size: 13px; margin-top: 8px; }
.hod-designation { font-size: 11.5px; color: #666; }

/* Programs table */
.prog-table { width: 100%; border-collapse: collapse; font-size: 13px; }
.prog-table th { background: #002855; color: #fff; padding: 8px 12px; text-align: left; font-weight: 600; font-size: 12.5px; }
.prog-table td { padding: 8px 12px; border-bottom: 1px solid #eef; color: #333; vertical-align: middle; }
.prog-table tr:hover td { background: #f0f5ff; }
.prog-table td a { color: #0066cc; text-decoration: none; font-weight: 500; }
.prog-table td a:hover { text-decoration: underline; }
.prog-badge { display: inline-block; font-size: 11px; font-weight: 700; padding: 2px 8px; border-radius: 3px; color: #fff; }
.prog-badge.bs { background: #28a745; }
.prog-badge.ms { background: #0066cc; }
.prog-badge.phd { background: #6f42c1; }

/* Sidebar */
.sidebar-quick { background: #002855; border-radius: 6px; overflow: hidden; margin-bottom: 18px; }
.sidebar-quick .sq-hdr { background: #ffd700; color: #002855; padding: 10px 14px; font-weight: 800; font-size: 13px; letter-spacing: .05em; text-transform: uppercase; }
.sidebar-quick ul { list-style: none; padding: 0; margin: 0; }
.sidebar-quick ul li a { display: flex; align-items: center; gap: 8px; padding: 10px 14px; color: #cce; font-size: 12.5px; text-decoration: none; border-bottom: 1px solid rgba(255,255,255,.07); transition: all .2s; }
.sidebar-quick ul li a:hover { background: rgba(255,255,255,.1); color: #ffd700; }
.sidebar-quick ul li a::before { content: '›'; color: #ffd700; font-size: 18px; line-height: 1; }

.sidebar-contact { background: #fff; border: 1px solid #dde3ec; border-radius: 6px; overflow: hidden; margin-bottom: 18px; }
.sidebar-contact .sc-hdr { background: #1a6e85; color: #fff; padding: 10px 14px; font-weight: 700; font-size: 13px; }
.sidebar-contact ul { list-style: none; padding: 12px 14px; margin: 0; display: flex; flex-direction: column; gap: 8px; }
.sidebar-contact ul li { font-size: 12.5px; color: #444; display: flex; gap: 8px; align-items: flex-start; }
.sidebar-contact ul li strong { color: #002855; }

/* Pashto-specific styling */
.pashto-text {
    font-family: 'Noto Nastaliq Urdu', 'Jameel Noori Nastaleeq', 'Alvi Nastaleeq', 'Pak Nastaleeq', serif;
    font-size: 14px;
    line-height: 1.8;
    direction: rtl;
    text-align: right;
}
.pashto-poetry {
    font-family: 'Noto Nastaliq Urdu', 'Jameel Noori Nastaleeq', 'Alvi Nastaleeq', serif;
    font-style: italic;
    background: #f9f3e8;
    padding: 12px;
    border-radius: 4px;
    text-align: center;
    margin: 10px 0;
}
.pashto-highlight {
    background: #e8f0fe;
    padding: 8px;
    border-right: 3px solid #1a6e85;
    margin: 10px 0;
    font-size: 12px;
}
.pashto-badge {
    display: inline-block;
    background: #1a6e85;
    color: white;
    font-size: 10px;
    padding: 2px 6px;
    border-radius: 3px;
    margin-left: 5px;
}

/* Responsive */
@media (max-width: 1024px) { .dept-grid { grid-template-columns: 1fr 1fr; } }
@media (max-width: 768px) {
    .dept-grid { grid-template-columns: 1fr; }
    .imp-links-grid { grid-template-columns: 1fr; }
    .intro-img-row { flex-direction: column; }
    .intro-img-placeholder { width: 100%; height: 160px; }
}
</style>
@endpush

@section('content')

<div class="dept-breadcrumb">
    <div class="wrap">
        <a href="{{ url('/') }}">Home</a>
        <span>›</span>
        <a href="#">Faculties</a>
        <span>›</span>
        <a href="#">Social Sciences</a>
        <span>›</span>
        <span style="color:#fff;">Department of Pashto | د پښتو څانګه</span>
    </div>
</div>

<div class="dept-page">
    <div class="dept-wrap">

        <div class="dept-title-bar">
            <div class="dept-icon">📜</div>
            <h1>Department of Pashto <span style="font-size:16px; color:#666;">د پښتو څانګه</span></h1>
        </div>

        <div class="dept-grid">

            {{-- ══ COL 1: Introduction + Gallery + HOD ══ --}}
            <div>

                <div class="dept-card">
                    <div class="dept-card-hdr">Introduction | پېژندنه</div>
                    <div class="dept-card-body">
                        <div class="intro-img-row">
                            <div class="intro-img-placeholder">📖🖋️</div>
                            <div class="intro-text">
                                <p>Welcome to the Department of Pashto at Government Postgraduate College Mansehra!</p>
                                <p class="pashto-text">د ګورنمنټ پوسټ ګریجوټ کالج مانسهره د پښتو څانګې ته ښه راغلاست!</p>
                                <p>Pashto, one of the ancient languages of the world, is the language of the Pashtun people and holds significant cultural and historical importance. Our department is dedicated to the promotion, preservation, and development of Pashto language, literature, and culture through quality education and research.</p>
                                <p class="pashto-text">پښتو د نړۍ له پخوانیو ژبو څخه یوه ده چې د پښتنو ژبه ده او کلتوري او تاریخي ارزښت لري. زموږ څانګه د پښتو ژبې، ادب او کلتور د ودې، ساتنې او پرمختګ لپاره وقف ده.</p>
                            </div>
                        </div>
                        <div class="intro-text" style="margin-bottom:12px;">
                            <p>The department offers comprehensive programs in Pashto literature, linguistics, and language studies. Our faculty includes renowned scholars, poets, and critics specializing in classical and modern Pashto literature, including poetry (Landay, Charbaita, Ghazal), prose, folklore, and drama. The department regularly organizes literary gatherings (Mushaira), seminars, and workshops to promote Pashto language and culture.</p>
                            <p class="pashto-text">څانګه د پښتو ادب، ژبپوهنې او ژبنيو مطالعاتو جامع پروګرامونه وړاندې کوي. زموږ فاکلټي کې نامتو عالم، شاعران او نقادان شامل دي.</p>
                        </div>
                        <a href="#" class="btn-read-more">READ MORE | نور ولولئ</a>
                    </div>
                </div>

                <div class="dept-card">
                    <div class="dept-card-hdr">Department Gallery | انځورونه</div>
                    <div class="dept-card-body" style="padding:10px;">
                        <div class="intro-gallery-placeholder">
                            <div class="gal-icon">🎭</div>
                            <div class="gal-text">Pashto Literary Conference — GPGCM Mansehra</div>
                            <div class="gal-text pashto-text" style="font-size:12px;">د پښتو ادبي کنفرانس</div>
                        </div>
                    </div>
                </div>

                <div class="dept-card">
                    <div class="dept-card-hdr">HOD's Message | د څانګې د مشر پیغام</div>
                    <div class="hod-card">
                        <div class="hod-photo-placeholder">👨‍🏫</div>
                        <div>
                            <div class="hod-text">
                                Pashto is not just a language; it is the identity of the Pashtun nation, carrying centuries of culture, tradition, bravery, and emotional expression. At the Department of Pashto, GPGC Mansehra, we strive to keep this beautiful language alive and vibrant among the younger generation through quality education and literary engagement...
                                <a href="#" style="color:#0066cc;font-weight:600;text-decoration:none;">Read More</a>
                            </div>
                            <div class="pashto-text hod-text" style="margin-top:5px;">
                                پښتو یوازې ژبه نه ده، بلکې د پښتنو د ملت هویت دی، چې پیړۍ کلتور، دود، زړورتیا او احساسات لري. د پښتو څانګه کې موږ د دې ښکلې ژبې د ساتنې هڅه کوو.
                            </div>
                            <div class="hod-name">Prof. Dr. Muhammad Arif Khan</div>
                            <div class="hod-designation">Head of Department, Pashto | د پښتو څانګې مشر</div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- ══ COL 2: News (scrolling) + Programs + Important Links ══ --}}
            <div>

                {{-- News & Events — AUTO-SCROLLING --}}
                <div class="dept-card">
                    <div class="dept-card-hdr">News &amp; Events | خبرونه او پیښې</div>
                    <div class="dept-card-body" style="padding:10px 16px;">
                        <div class="news-scroll-wrap">
                            <div class="news-scroll-inner">
                                <ul class="news-list">
                                    <li>
                                        <a href="#">International Pashto Conference 2025 at GPGCM</a>
                                        <span class="new-tag">New</span>
                                        <span class="news-date">30 Apr 2025</span>
                                    </li>
                                    <li>
                                        <a href="#">Pashto Mushaira — Renowned Poets to Participate</a>
                                        <span class="new-tag">New</span>
                                        <span class="news-date">25 Apr 2025</span>
                                    </li>
                                    <li>
                                        <a href="#">Department of Pashto Launches Research Journal "Pukhto"</a>
                                        <span class="new-tag">New</span>
                                        <span class="news-date">20 Apr 2025</span>
                                    </li>
                                    <li>
                                        <a href="#">Workshop on Pashto Creative Writing &amp; Journalism</a>
                                        <span class="news-date">10 Apr 2025</span>
                                    </li>
                                    <li>
                                        <a href="#">All Pakistan Inter-Collegiate Pashto Debate Competition</a>
                                        <span class="news-date">28 Mar 2025</span>
                                    </li>
                                    <li>
                                        <a href="#">Seminar on "Pashto Language &amp; Modern Challenges"</a>
                                        <span class="news-date">15 Mar 2025</span>
                                    </li>
                                    <li>
                                        <a href="#">Guest Lecture by Famous Pashto Novelist</a>
                                        <span class="news-date">20 Feb 2025</span>
                                    </li>
                                    <li>
                                        <a href="#">Pashto Adabi Jirga (Literary Assembly) Monthly Meeting</a>
                                        <span class="news-date">10 Jan 2025</span>
                                    </li>
                                    {{-- Duplicate for seamless loop --}}
                                    <li>
                                        <a href="#">International Pashto Conference 2025 at GPGCM</a>
                                        <span class="new-tag">New</span>
                                        <span class="news-date">30 Apr 2025</span>
                                    </li>
                                    <li>
                                        <a href="#">Pashto Mushaira — Renowned Poets to Participate</a>
                                        <span class="new-tag">New</span>
                                        <span class="news-date">25 Apr 2025</span>
                                    </li>
                                    <li>
                                        <a href="#">Department of Pashto Launches Research Journal "Pukhto"</a>
                                        <span class="new-tag">New</span>
                                        <span class="news-date">20 Apr 2025</span>
                                    </li>
                                    <li>
                                        <a href="#">Workshop on Pashto Creative Writing &amp; Journalism</a>
                                        <span class="news-date">10 Apr 2025</span>
                                    </li>
                                    <li>
                                        <a href="#">All Pakistan Inter-Collegiate Pashto Debate Competition</a>
                                        <span class="news-date">28 Mar 2025</span>
                                    </li>
                                    <li>
                                        <a href="#">Seminar on "Pashto Language &amp; Modern Challenges"</a>
                                        <span class="news-date">15 Mar 2025</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Programs Offered --}}
                <div class="dept-card">
                    <div class="dept-card-hdr">Programs Offered | وړاندیز شوي پروګرامونه</div>
                    <div class="dept-card-body" style="padding:10px 16px;">
                        <table class="prog-table">
                            <thead>
                                <tr><th>#</th><th>Program | پروګرام</th><th>Level</th><th>Duration</th></tr>
                            </thead>
                            <tbody>
                                <tr><td>1</td><td><a href="#">BS Pashto</a><br><span class="pashto-text" style="font-size:11px;">بی ایس پښتو</span></td>
                                    <td><span class="prog-badge bs">BS</span></td>
                                    <td>4 Years</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td><a href="#">BS Pashto (Literature)</a><br><span class="pashto-text" style="font-size:11px;">بی ایس پښتو (ادب)</span></td>
                                    <td><span class="prog-badge bs">BS</span></td>
                                    <td>4 Years</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td><a href="#">BS Pashto (Linguistics)</a><br><span class="pashto-text" style="font-size:11px;">بی ایس پښتو (ژبپوهنه)</span></td>
                                    <td><span class="prog-badge bs">BS</span></td>
                                    <td>4 Years</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td><a href="#">BS Pashto (Folklore &amp; Culture)</a><br><span class="pashto-text" style="font-size:11px;">بی ایس پښتو (فولکلور او کلتور)</span></td>
                                    <td><span class="prog-badge bs">BS</span></td>
                                    <td>4 Years</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td><a href="#">M.A Pashto</a><br><span class="pashto-text" style="font-size:11px;">ایم اے پښتو</span></td>
                                    <td><span class="prog-badge ms">Master</span></td>
                                    <td>2 Years</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td><a href="#">M.Phil Pashto</a><br><span class="pashto-text" style="font-size:11px;">ایم فل پښتو</span></td>
                                    <td><span class="prog-badge ms">M.Phil</span></td>
                                    <td>2 Years</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td><a href="#">MS Pashto</a><br><span class="pashto-text" style="font-size:11px;">ایم ایس پښتو</span></td>
                                    <td><span class="prog-badge ms">MS</span></td>
                                    <td>2 Years</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td><a href="#">Ph.D Pashto</a><br><span class="pashto-text" style="font-size:11px;">پی ایچ ڈی پښتو</span></td>
                                    <td><span class="prog-badge phd">PhD</span></td>
                                    <td>3–5 Years</td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td><a href="#">Certificate in Pashto Language</a><br><span class="pashto-text" style="font-size:11px;">د پښتو ژبې سند</span></td>
                                    <td><span class="prog-badge bs">Certificate</span></td>
                                    <td>6 Months</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Important Links --}}
                <div class="dept-card">
                    <div class="dept-card-hdr">Important Links | مهمې لینکونه</div>
                    <div class="dept-card-body">
                        <div class="imp-links-grid">
                            <a href="#">HOD's Message | د څانګې د مشر پیغام</a>
                            <a href="#">BS Pashto | بی ایس پښتو</a>
                            <a href="#">BS Pashto Literature | بی ایس پښتو ادب</a>
                            <a href="#">BS Pashto Linguistics | بی ایس پښتو ژبپوهنه</a>
                            <a href="#">BS Pashto Folklore | بی ایس پښتو فولکلور</a>
                            <a href="#">M.A Pashto | ایم اے پښتو</a>
                            <a href="#">M.Phil Pashto | ایم فل پښتو</a>
                            <a href="#">Ph.D Pashto | پی ایچ ڈی پښتو</a>
                            <a href="#">Faculty Members | د فاکلټي غړي</a>
                            <a href="#">Research Publications | څیړنیزې مطبوعات</a>
                            <a href="#">Pashto Adabi Jirga | پښتو ادبي جرګه</a>
                            <a href="#">Research Journal "Pukhto" | څیړنیز ژورنال "پښتو"</a>
                            <a href="#">Downloads (Syllabus) | ډاونلوډ (نصاب)</a>
                            <a href="#">Research Areas | د څیړنې ساحې</a>
                            <a href="#">Seminar Schedule | د سیمینار مهالویش</a>
                            <a href="#">Alumni Network | د پخوانیو زده کونکو شبکه</a>
                            <a href="#">Pashto Poetry Archives | د پښتو شعر آرشیف</a>
                            <a href="#">Classical Literature | کلاسیک ادب</a>
                        </div>
                    </div>
                </div>

            </div>

            {{-- ══ COL 3: Announcements + Quick Access + Contact ══ --}}
            <div>

                <div class="dept-card">
                    <div class="dept-card-hdr">Announcements | اعلانونه</div>
                    <div class="dept-card-body">
                        <ul class="news-list">
                            <li>
                                <a href="#">Pashto Mushaira Registration Open for Students</a>
                                <span class="new-tag">New</span>
                                <span class="news-date">28 Apr 2025</span>
                            </li>
                            <li>
                                <a href="#">Research Journal "Pukhto" Call for Papers</a>
                                <span class="new-tag">New</span>
                                <span class="news-date">22 Apr 2025</span>
                            </li>
                            <li>
                                <a href="#">Pashto Language Course for Beginners</a>
                                <span class="news-date">15 Apr 2025</span>
                            </li>
                            <li>
                                <a href="#">Scholarship for Pashto Students Announced</a>
                                <span class="news-date">05 Apr 2025</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="sidebar-quick">
                    <div class="sq-hdr">📌 Quick Access | چټک لاسرسی</div>
                    <ul>
                        <li><a href="#">Faculty Members | د فاکلټي غړي</a></li>
                        <li><a href="#">Class Schedule | د ټولګیو مهالویش</a></li>
                        <li><a href="#">Date Sheet | د نیټې پاڼه</a></li>
                        <li><a href="#">Admissions | داخلې</a></li>
                        <li><a href="#">Fee Structure | د فیس جوړښت</a></li>
                        <li><a href="#">Pashto Adabi Society | پښتو ادبي ټولنه</a></li>
                        <li><a href="#">Downloads | ډاونلوډونه</a></li>
                        <li><a href="#">Timetable | مهالویش</a></li>
                        <li><a href="#">Poetry Submission | شعری سپارښتنه</a></li>
                    </ul>
                </div>

                <div class="sidebar-contact">
                    <div class="sc-hdr">📞 Contact Department | د څانګې اړیکه</div>
                    <ul>
                        <li><strong>HOD Office | د څانګې د مشر دفتر:</strong></li>
                        <li style="padding-left:8px;">📞 0997-XXXXXXX</li>
                        <li style="padding-left:8px;">📧 pashto@gpgcmansehra.edu.pk</li>
                        <li><strong>Location | ځای:</strong></li>
                        <li style="padding-left:8px;">Pashto Block (Social Sciences Wing),<br>GPGC Mansehra, KPK, Pakistan</li>
                        <li><strong>Office Hours | د دفتر ساعتونه:</strong></li>
                        <li style="padding-left:8px;">Mon–Sat: 8:00 AM – 4:00 PM</li>
                        <li><strong>Pashto Adabi Jirga Office:</strong></li>
                        <li style="padding-left:8px;">📞 0997-XXXXXX Ext: 315</li>
                    </ul>
                </div>

                <div class="dept-card">
                    <div class="dept-card-hdr">Accreditation | تصدیق</div>
                    <div class="dept-card-body" style="font-size:13px;color:#444;line-height:1.65;">
                        <p>All programs are recognized and approved by the <strong>Higher Education Commission (HEC) of Pakistan</strong> and <strong>Pashto Academy Peshawar</strong>.</p>
                        <p class="pashto-text" style="margin-top:5px;">ټول پروګرامونه د <strong>پاکستان د لوړو زده کړو کمیسیون (HEC)</strong> او <strong>د پښتو اکاډمۍ پېښور</strong> لخوا تصدیق شوي دي.</p>
                    </div>
                </div>

                <div class="dept-card">
                    <div class="dept-card-hdr">📚 Pashto Research Areas | د څیړنې ساحې</div>
                    <div class="dept-card-body">
                        <div class="imp-links-grid" style="grid-template-columns: 1fr;">
                            <a href="#">📖 Classical Pashto Poetry | کلاسیک پښتو شاعري</a>
                            <a href="#">📝 Modern Pashto Literature | عصري پښتو ادب</a>
                            <a href="#">🗣️ Pashto Linguistics | پښتو ژبپوهنه</a>
                            <a href="#">🎭 Pashto Folklore &amp; Culture | پښتو فولکلور او کلتور</a>
                            <a href="#">✍️ Pashto Prose (Dastan, Novel) | پښتو نثر (داستان، ناول)</a>
                            <a href="#">🎭 Pashto Drama | پښتو ډرامه</a>
                            <a href="#">📜 Pashto Poetry Forms (Landay, Charbaita) | د پښتو شعري بڼې (لنډۍ، څلارۍ)</a>
                            <a href="#">📰 Pashto Journalism | پښتو ژورنالیزم</a>
                            <a href="#">🖋️ Creative Writing in Pashto | په پښتو کې تخلیقي لیکنه</a>
                            <a href="#">📚 Pashto Literary Criticism | پښتو ادبي تنقید</a>
                            <a href="#">🏛️ Pashtunwali &amp; Literature | پښتونولي او ادب</a>
                            <a href="#">🌍 Comparative Pashto Literature | پرتله ییز پښتو ادب</a>
                        </div>
                    </div>
                </div>

                <div class="dept-card">
                    <div class="dept-card-hdr">🎭 Pashto Literary Activities | ادبي فعالیتونه</div>
                    <div class="dept-card-body" style="font-size:12.5px;color:#555;line-height:1.6;">
                        <p>🟢 <strong>Monthly Pashto Mushaira:</strong> Poetry recitation sessions</p>
                        <p>🟡 <strong>Pashto Adabi Jirga:</strong> Weekly literary gatherings</p>
                        <p>🔵 <strong>Creative Writing Workshop:</strong> Monthly workshops</p>
                        <p>🟣 <strong>Research Journal "Pukhto":</strong> Biannual publication</p>
                        <p>🟠 <strong>Debate &amp; Speech Competitions:</strong> Inter-collegiate events</p>
                        <div class="pashto-poetry" style="margin-top:12px;">
                            <p class="pashto-text">پښتو ژبه زما د ساه ساه ده</p>
                            <p class="pashto-text">پښتو ادب زما د ژوند ژوند دی</p>
                            <p style="font-size:11px; margin-top:8px;">— Pashto Proverb</p>
                        </div>
                    </div>
                </div>

                <div class="dept-card">
                    <div class="dept-card-hdr">🎓 Career Opportunities | د دندې فرصتونه</div>
                    <div class="dept-card-body" style="font-size:12px;color:#555;line-height:1.6;">
                        <p>✓ <strong>Teaching &amp; Academia | تدریس او اکاډیمیا</strong></p>
                        <p>✓ <strong>Pashto Media &amp; Journalism | پښتو رسنۍ او ژورنالیزم</strong></p>
                        <p>✓ <strong>Translation &amp; Interpretation | ژباړه او تفسیر</strong></p>
                        <p>✓ <strong>Research &amp; Writing | څیړنه او لیکنه</strong></p>
                        <p>✓ <strong>Publishing &amp; Editing | خپرونه او ایډیټینګ</strong></p>
                        <p>✓ <strong>Cultural Organizations | کلتوري موسسې</strong></p>
                        <p>✓ <strong>Civil Services (CSS/PMS) | ملکي خدمتونه</strong></p>
                    </div>
                </div>

            </div>

        </div>{{-- end dept-grid --}}
    </div>
</div>

@endsection
@extends('layouts.app')

@section('title', 'Department of Islamic Studies — Government Postgraduate College Mansehra')

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

/* Islamic Studies-specific styling */
.islamic-highlight {
    background: #e8f5e9;
    padding: 8px;
    border-right: 3px solid #2e7d32;
    margin: 10px 0;
    font-size: 12px;
}
.arabic-text {
    font-family: 'Traditional Arabic', 'Amiri', 'Scheherazade', serif;
    font-size: 16px;
    line-height: 1.8;
    direction: rtl;
    text-align: right;
}
.urdu-text-islamic {
    font-family: 'Noto Nastaliq Urdu', 'Jameel Noori Nastaleeq', serif;
    font-size: 14px;
    line-height: 1.8;
}
.quran-verse {
    font-family: 'Traditional Arabic', 'Amiri', serif;
    font-size: 18px;
    text-align: center;
    background: #f5f0e1;
    padding: 15px;
    border-radius: 8px;
    margin: 10px 0;
    direction: rtl;
}
.hadith-text {
    font-family: 'Noto Nastaliq Urdu', 'Jameel Noori Nastaleeq', serif;
    font-style: italic;
    background: #f9f3e8;
    padding: 12px;
    border-radius: 4px;
    text-align: center;
    margin: 10px 0;
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
        <span style="color:#fff;">Department of Islamic Studies | شعبہ اسلامیات</span>
    </div>
</div>

<div class="dept-page">
    <div class="dept-wrap">

        <div class="dept-title-bar">
            <div class="dept-icon">🕌</div>
            <h1>Department of Islamic Studies <span style="font-size:16px; color:#666;">شعبہ اسلامیات</span></h1>
        </div>

        <div class="dept-grid">

            {{-- ══ COL 1: Introduction + Gallery + HOD ══ --}}
            <div>

                <div class="dept-card">
                    <div class="dept-card-hdr">Introduction | تعارف</div>
                    <div class="dept-card-body">
                        <div class="intro-img-row">
                            <div class="intro-img-placeholder">📖🕋</div>
                            <div class="intro-text">
                                <p>Welcome to the Department of Islamic Studies at Government Postgraduate College Mansehra!</p>
                                <p class="urdu-text-islamic">گورنمنٹ پوسٹ گریجویٹ کالج مانسہرہ کے شعبہ اسلامیات میں خوش آمدید!</p>
                                <p>The Department of Islamic Studies is dedicated to the scholarly study of Islamic knowledge, including the Quran, Hadith, Islamic jurisprudence (Fiqh), Islamic history, theology, and contemporary Islamic thought. Our department aims to provide students with a deep understanding of Islamic teachings and their application in modern society.</p>
                                <p class="urdu-text-islamic">شعبہ اسلامیات قرآنی علوم، حدیث، فقہ، اسلامی تاریخ، عقائد اور عصری اسلامی فکر کے علمی مطالعہ کے لیے وقف ہے۔</p>
                            </div>
                        </div>
                        <div class="intro-text" style="margin-bottom:12px;">
                            <p>The department offers comprehensive programs in Islamic Studies with emphasis on traditional Islamic sciences as well as contemporary perspectives. Our qualified faculty specializes in various fields including Tafsir (Quranic Exegesis), Hadith Sciences, Islamic Law, Islamic Philosophy, and Comparative Religion. The department maintains a rich library of classical and modern Islamic literature.</p>
                            <p class="urdu-text-islamic">شعبہ میں اسلامی علوم کے جامع پروگرام پیش کیے جاتے ہیں۔ ہماری فیکلٹی تفسیر، علوم حدیث، اسلامی قانون، اسلامی فلسفہ اور تقابلی مذاہب میں مہارت رکھتی ہے۔</p>
                        </div>
                        <a href="#" class="btn-read-more">READ MORE | مزید پڑھیں</a>
                    </div>
                </div>

                <div class="dept-card">
                    <div class="dept-card-hdr">Department Gallery | گیلری</div>
                    <div class="dept-card-body" style="padding:10px;">
                        <div class="intro-gallery-placeholder">
                            <div class="gal-icon">📿</div>
                            <div class="gal-text">Islamic Studies Seminar — GPGCM Mansehra</div>
                            <div class="gal-text urdu-text-islamic" style="font-size:12px;">اسلامیات سیمینار</div>
                        </div>
                    </div>
                </div>

                <div class="dept-card">
                    <div class="dept-card-hdr">HOD's Message | صدر شعبہ کا پیغام</div>
                    <div class="hod-card">
                        <div class="hod-photo-placeholder">👨‍🏫</div>
                        <div>
                            <div class="hod-text">
                                Islamic knowledge enlightens the mind and purifies the soul. At the Department of Islamic Studies, GPGC Mansehra, we strive to provide authentic Islamic education that prepares students to understand their faith deeply and contribute positively to society as responsible Muslims...
                                <a href="#" style="color:#0066cc;font-weight:600;text-decoration:none;">Read More</a>
                            </div>
                            <div class="urdu-text-islamic hod-text" style="margin-top:5px;">
                                اسلامی علم ذہن کو روشن کرتا ہے اور روح کو پاکیزگی عطا کرتا ہے۔ شعبہ اسلامیات میں ہم مستند اسلامی تعلیم فراہم کرنے کی کوشش کرتے ہیں۔
                            </div>
                            <div class="hod-name">Prof. Dr. Muhammad Razaq</div>
                            <div class="hod-designation">Head of Department, Islamic Studies | صدر شعبہ اسلامیات</div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- ══ COL 2: News (scrolling) + Programs + Important Links ══ --}}
            <div>

                {{-- News & Events — AUTO-SCROLLING --}}
                <div class="dept-card">
                    <div class="dept-card-hdr">News &amp; Events | خبریں اور تقریبات</div>
                    <div class="dept-card-body" style="padding:10px 16px;">
                        <div class="news-scroll-wrap">
                            <div class="news-scroll-inner">
                                <ul class="news-list">
                                    <li>
                                        <a href="#">International Conference on Contemporary Islamic Thought 2025</a>
                                        <span class="new-tag">New</span>
                                        <span class="news-date">30 Apr 2025</span>
                                    </li>
                                    <li>
                                        <a href="#">Quranic Studies Workshop — Tafsir &amp; Tajweed</a>
                                        <span class="new-tag">New</span>
                                        <span class="news-date">25 Apr 2025</span>
                                    </li>
                                    <li>
                                        <a href="#">Department of Islamic Studies Launches Research Journal "Al-Tafheem"</a>
                                        <span class="new-tag">New</span>
                                        <span class="news-date">20 Apr 2025</span>
                                    </li>
                                    <li>
                                        <a href="#">Seminar on "Seerat-un-Nabi (SAW) in Modern Context"</a>
                                        <span class="news-date">10 Apr 2025</span>
                                    </li>
                                    <li>
                                        <a href="#">Inter-Collegiate Quran &amp; Hadith Competition</a>
                                        <span class="news-date">28 Mar 2025</span>
                                    </li>
                                    <li>
                                        <a href="#">Guest Lecture on Islamic Economics &amp; Finance</a>
                                        <span class="news-date">15 Mar 2025</span>
                                    </li>
                                    <li>
                                        <a href="#">Workshop on Comparative Religion &amp; Interfaith Harmony</a>
                                        <span class="news-date">20 Feb 2025</span>
                                    </li>
                                    {{-- Duplicate for seamless loop --}}
                                    <li>
                                        <a href="#">International Conference on Contemporary Islamic Thought 2025</a>
                                        <span class="new-tag">New</span>
                                        <span class="news-date">30 Apr 2025</span>
                                    </li>
                                    <li>
                                        <a href="#">Quranic Studies Workshop — Tafsir &amp; Tajweed</a>
                                        <span class="new-tag">New</span>
                                        <span class="news-date">25 Apr 2025</span>
                                    </li>
                                    <li>
                                        <a href="#">Department of Islamic Studies Launches Research Journal "Al-Tafheem"</a>
                                        <span class="new-tag">New</span>
                                        <span class="news-date">20 Apr 2025</span>
                                    </li>
                                    <li>
                                        <a href="#">Seminar on "Seerat-un-Nabi (SAW) in Modern Context"</a>
                                        <span class="news-date">10 Apr 2025</span>
                                    </li>
                                    <li>
                                        <a href="#">Inter-Collegiate Quran &amp; Hadith Competition</a>
                                        <span class="news-date">28 Mar 2025</span>
                                    </li>
                                    <li>
                                        <a href="#">Guest Lecture on Islamic Economics &amp; Finance</a>
                                        <span class="news-date">15 Mar 2025</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Programs Offered --}}
                <div class="dept-card">
                    <div class="dept-card-hdr">Programs Offered | پیش کردہ پروگرام</div>
                    <div class="dept-card-body" style="padding:10px 16px;">
                        <table class="prog-table">
                            <thead>
                                <tr><th>#</th><th>Program | پروگرام</th><th>Level</th><th>Duration</th></tr>
                            </thead>
                            <tbody>
                                <tr><td>1</td><td><a href="#">BS Islamic Studies</a><br><span class="urdu-text-islamic" style="font-size:11px;">بی ایس اسلامیات</span></td><td><span class="prog-badge bs">BS</span></td><td>4 Years</td></tr>
                                <tr><td>2</td><td><a href="#">BS Islamic Studies (Quran &amp; Tafsir)</a><br><span class="urdu-text-islamic" style="font-size:11px;">بی ایس اسلامیات (قرآن و تفسیر)</span></td><td><span class="prog-badge bs">BS</span></td><td>4 Years</td></tr>
                                <tr><td>3</td><td><a href="#">BS Islamic Studies (Hadith Sciences)</a><br><span class="urdu-text-islamic" style="font-size:11px;">بی ایس اسلامیات (علوم حدیث)</span></td><td><span class="prog-badge bs">BS</span></td><td>4 Years</td></tr>
                                <tr><td>4</td><td><a href="#">BS Islamic Studies (Fiqh &amp; Law)</a><br><span class="urdu-text-islamic" style="font-size:11px;">بی ایس اسلامیات (فقہ و قانون)</span></td><td><span class="prog-badge bs">BS</span></td><td>4 Years</td></tr>
                                <tr><td>5</td><td><a href="#">M.A Islamic Studies</a><br><span class="urdu-text-islamic" style="font-size:11px;">ایم اے اسلامیات</span></td><td><span class="prog-badge ms">Master</span></td><td>2 Years</td></tr>
                                <tr><td>6</td><td><a href="#">M.Phil Islamic Studies</a><br><span class="urdu-text-islamic" style="font-size:11px;">ایم فل اسلامیات</span></td><td><span class="prog-badge ms">M.Phil</span></td><td>2 Years</td></tr>
                                <tr><td>7</td><td><a href="#">MS Islamic Studies</a><br><span class="urdu-text-islamic" style="font-size:11px;">ایم ایس اسلامیات</span></td><td><span class="prog-badge ms">MS</span></td><td>2 Years</td></tr>
                                <tr><td>8</td><td><a href="#">Ph.D Islamic Studies</a><br><span class="urdu-text-islamic" style="font-size:11px;">پی ایچ ڈی اسلامیات</span></td><td><span class="prog-badge phd">PhD</span></td><td>3–5 Years</td></tr>
                                <tr><td>9</td><td><a href="#">Certificate in Arabic Language</a><br><span class="urdu-text-islamic" style="font-size:11px;">سرٹیفکیٹ عربی زبان</span></td><td><span class="prog-badge bs">Certificate</span></td><td>6 Months</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Important Links --}}
                <div class="dept-card">
                    <div class="dept-card-hdr">Important Links | اہم روابط</div>
                    <div class="dept-card-body">
                        <div class="imp-links-grid">
                            <a href="#">HOD's Message | صدر شعبہ کا پیغام</a>
                            <a href="#">BS Islamic Studies | بی ایس اسلامیات</a>
                            <a href="#">BS Quran &amp; Tafsir | بی ایس قرآن و تفسیر</a>
                            <a href="#">BS Hadith Sciences | بی ایس علوم حدیث</a>
                            <a href="#">BS Fiqh &amp; Law | بی ایس فقہ و قانون</a>
                            <a href="#">M.A Islamic Studies | ایم اے اسلامیات</a>
                            <a href="#">M.Phil Islamic Studies | ایم فل اسلامیات</a>
                            <a href="#">Ph.D Islamic Studies | پی ایچ ڈی اسلامیات</a>
                            <a href="#">Faculty Members | فیکلٹی اراکین</a>
                            <a href="#">Research Publications | تحقیقی مطبوعات</a>
                            <a href="#">Islamic Research Journal | تحقیقی مجلہ "التفہیم"</a>
                            <a href="#">Quranic Studies Center | مرکز علوم قرآنی</a>
                            <a href="#">Hadith Research Cell | مرکز تحقیقات حدیث</a>
                            <a href="#">Downloads (Syllabus) | ڈاؤن لوڈ (نصاب)</a>
                            <a href="#">Research Areas | تحقیقی شعبہ جات</a>
                            <a href="#">Seminar Schedule | سیمینار شیڈول</a>
                            <a href="#">Alumni Network | سابق طلبہ نیٹ ورک</a>
                            <a href="#">Islamic Library | اسلامی لائبریری</a>
                        </div>
                    </div>
                </div>

            </div>

            {{-- ══ COL 3: Announcements + Quick Access + Contact ══ --}}
            <div>

                <div class="dept-card">
                    <div class="dept-card-hdr">Announcements | اعلانات</div>
                    <div class="dept-card-body">
                        <ul class="news-list">
                            <li>
                                <a href="#">Tafsir Competition Registration Open</a>
                                <span class="new-tag">New</span>
                                <span class="news-date">28 Apr 2025</span>
                            </li>
                            <li>
                                <a href="#">Arabic Language Course Starting Soon</a>
                                <span class="new-tag">New</span>
                                <span class="news-date">22 Apr 2025</span>
                            </li>
                            <li>
                                <a href="#">Research Proposals Invited for Islamic Journal</a>
                                <span class="news-date">15 Apr 2025</span>
                            </li>
                            <li>
                                <a href="#">Scholarship for Islamic Studies Students</a>
                                <span class="news-date">05 Apr 2025</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="sidebar-quick">
                    <div class="sq-hdr">📌 Quick Access | فوری رسائی</div>
                    <ul>
                        <li><a href="#">Faculty Members | فیکلٹی اراکین</a></li>
                        <li><a href="#">Class Schedule | کلاسز کا نظام</a></li>
                        <li><a href="#">Date Sheet | تاریخ وار شیڈول</a></li>
                        <li><a href="#">Admissions | داخلہ</a></li>
                        <li><a href="#">Fee Structure | فیس کا ڈھانچہ</a></li>
                        <li><a href="#">Islamic Society | اسلامی سوسائٹی</a></li>
                        <li><a href="#">Downloads | ڈاؤن لوڈ</a></li>
                        <li><a href="#">Timetable | ٹائم ٹیبل</a></li>
                        <li><a href="#">Quran Learning Portal | قرآن سیکھیں</a></li>
                    </ul>
                </div>

                <div class="sidebar-contact">
                    <div class="sc-hdr">📞 Contact Department | رابطہ شعبہ</div>
                    <ul>
                        <li><strong>HOD Office | صدر شعبہ کا دفتر:</strong></li>
                        <li style="padding-left:8px;">📞 0997-XXXXXXX</li>
                        <li style="padding-left:8px;">📧 islamiat@gpgcmansehra.edu.pk</li>
                        <li><strong>Location | مقام:</strong></li>
                        <li style="padding-left:8px;">Islamic Studies Block (Social Sciences Wing),<br>GPGC Mansehra, KPK, Pakistan</li>
                        <li><strong>Office Hours | دفتری اوقات:</strong></li>
                        <li style="padding-left:8px;">Mon–Sat: 8:00 AM – 4:00 PM</li>
                        <li><strong>Islamic Library:</strong></li>
                        <li style="padding-left:8px;">📞 0997-XXXXXX Ext: 314</li>
                    </ul>
                </div>

                <div class="dept-card">
                    <div class="dept-card-hdr">Accreditation | تسلیم شدگی</div>
                    <div class="dept-card-body" style="font-size:13px;color:#444;line-height:1.65;">
                        <p>All programs are recognized and approved by the <strong>Higher Education Commission (HEC) of Pakistan</strong> and <strong>Ittehad-e-Tanzeemat-e-Madaris Pakistan</strong>.</p>
                        <p class="urdu-text-islamic" style="margin-top:5px;">تمام پروگرام <strong>ہائر ایجوکیشن کمیشن (ایچ ای سی) پاکستان</strong> سے تسلیم شدہ ہیں۔</p>
                    </div>
                </div>

                <div class="dept-card">
                    <div class="dept-card-hdr">📚 Islamic Research Areas | تحقیقی شعبہ جات</div>
                    <div class="dept-card-body">
                        <div class="imp-links-grid" style="grid-template-columns: 1fr;">
                            <a href="#">📖 Quranic Studies (Tafsir) | علوم القرآن (تفسیر)</a>
                            <a href="#">📜 Hadith Sciences | علوم حدیث</a>
                            <a href="#">⚖️ Islamic Jurisprudence (Fiqh) | فقہ اسلامی</a>
                            <a href="#">🧠 Islamic Theology (Aqidah) | علم الکلام</a>
                            <a href="#">🕌 Islamic History &amp; Civilization | تاریخ و تہذیب اسلامی</a>
                            <a href="#">💚 Sufism &amp; Islamic Spirituality | تصوف و روحانیت</a>
                            <a href="#">💰 Islamic Economics &amp; Finance | اسلامی معاشیات و مالیات</a>
                            <a href="#">⚖️ Islamic Law &amp; Constitution | اسلامی قانون و دستور</a>
                            <a href="#">🌍 Comparative Religion | تقابلی مذاہب</a>
                            <a href="#">📚 Arabic Language &amp; Literature | عربی زبان و ادب</a>
                            <a href="#">👩‍🎓 Women in Islam | اسلام میں خواتین</a>
                            <a href="#">🌐 Contemporary Islamic Thought | عصری اسلامی فکر</a>
                            <a href="#">🤝 Interfaith Harmony | بین المذاہب ہم آہنگی</a>
                            <a href="#">📡 Islamic Media &amp; Communication | اسلامی میڈیا و مواصلات</a>
                        </div>
                    </div>
                </div>

                <div class="dept-card">
                    <div class="dept-card-hdr">🕋 Quran &amp; Hadith | قرآن و حدیث</div>
                    <div class="dept-card-body">
                        <div class="quran-verse">
                            <p>بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ</p>
                            <p>اقْرَأْ بِاسْمِ رَبِّكَ الَّذِي خَلَقَ</p>
                            <p style="font-size:12px; margin-top:8px;">Surah Al-Alaq (96:1)</p>
                        </div>
                        <div class="hadith-text">
                            <p class="arabic-text">طَلَبُ الْعِلْمِ فَرِيضَةٌ عَلَى كُلِّ مُسْلِمٍ</p>
                            <p style="margin-top:5px;">"Seeking knowledge is an obligation upon every Muslim"</p>
                            <p style="font-size:11px; margin-top:5px;">— Sunan Ibn Majah</p>
                        </div>
                    </div>
                </div>

                <div class="dept-card">
                    <div class="dept-card-hdr">🎓 Career Opportunities | ملازمت کے مواقع</div>
                    <div class="dept-card-body" style="font-size:12px;color:#555;line-height:1.6;">
                        <p>✓ <strong>Teaching &amp; Academia | تدریس و تعلیم</strong></p>
                        <p>✓ <strong>Islamic Banking &amp; Finance | اسلامی بینکاری و مالیات</strong></p>
                        <p>✓ <strong>Research &amp; Writing | تحقیق و تحریر</strong></p>
                        <p>✓ <strong>Religious Advisory | شرعی مشاورت</strong></p>
                        <p>✓ <strong>Media &amp; Publishing | میڈیا و اشاعت</strong></p>
                        <p>✓ <strong>NGOs &amp; Social Welfare | غیر سرکاری تنظیمیں و فلاحی کام</strong></p>
                        <p>✓ <strong>Civil Services (CSS/PMS) | سول سروسز</strong></p>
                    </div>
                </div>

            </div>

        </div>{{-- end dept-grid --}}
    </div>
</div>

@endsection
@extends('layouts.app')

@section('title', 'Department of English — Government Postgraduate College Mansehra')

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

/* English-specific styling */
.english-highlight {
    background: #e8f0fe;
    padding: 8px;
    border-left: 3px solid #8e44ad;
    margin: 10px 0;
    font-size: 12px;
}
.english-poetry {
    font-family: 'Georgia', serif;
    font-style: italic;
    background: #f9f3e8;
    padding: 12px;
    border-radius: 4px;
    text-align: center;
    margin: 10px 0;
}
.lit-period {
    display: inline-block;
    background: #8e44ad;
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
        <span style="color:#fff;">Department of English</span>
    </div>
</div>

<div class="dept-page">
    <div class="dept-wrap">

        <div class="dept-title-bar">
            <div class="dept-icon">📖</div>
            <h1>Department of English</h1>
        </div>

        <div class="dept-grid">

            {{-- ══ COL 1: Introduction + Gallery + HOD ══ --}}
            <div>

                <div class="dept-card">
                    <div class="dept-card-hdr">Introduction</div>
                    <div class="dept-card-body">
                        <div class="intro-img-row">
                            <div class="intro-img-placeholder">📚✍️</div>
                            <div class="intro-text">
                                <p>Welcome to the Department of English at Government Postgraduate College Mansehra!</p>
                                <p>English is a global language of communication, literature, and scholarship. Our department is dedicated to fostering excellence in English language learning, literary studies, and critical thinking. We prepare students to become effective communicators, analytical readers, and creative writers.</p>
                            </div>
                        </div>
                        <div class="intro-text" style="margin-bottom:12px;">
                            <p>The department offers comprehensive programs in English Literature, Linguistics, and Language Teaching. Our faculty includes distinguished scholars specializing in British Literature, American Literature, Postcolonial Studies, Literary Theory, Applied Linguistics, and ELT (English Language Teaching). The department maintains a well-stocked library with classic and contemporary literary works, critical editions, and research journals.</p>
                        </div>
                        <a href="#" class="btn-read-more">READ MORE</a>
                    </div>
                </div>

                <div class="dept-card">
                    <div class="dept-card-hdr">Department Gallery</div>
                    <div class="dept-card-body" style="padding:10px;">
                        <div class="intro-gallery-placeholder">
                            <div class="gal-icon">🎭</div>
                            <div class="gal-text">English Literary Society — GPGCM Mansehra</div>
                        </div>
                    </div>
                </div>

                <div class="dept-card">
                    <div class="dept-card-hdr">HOD's Message</div>
                    <div class="hod-card">
                        <div class="hod-photo-placeholder">👩‍🏫</div>
                        <div>
                            <div class="hod-text">
                                Language is the road map of a culture, and English opens doors to global opportunities in education, business, and diplomacy. At the Department of English, GPGC Mansehra, we strive to develop in our students a deep appreciation for literature, mastery over language skills, and the confidence to express themselves eloquently...
                                <a href="#" style="color:#0066cc;font-weight:600;text-decoration:none;">Read More</a>
                            </div>
                            <div class="hod-name">Prof. Dr. Samina Akhtar</div>
                            <div class="hod-designation">Head of Department, English</div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- ══ COL 2: News (scrolling) + Programs + Important Links ══ --}}
            <div>

                {{-- News & Events — AUTO-SCROLLING --}}
                <div class="dept-card">
                    <div class="dept-card-hdr">News &amp; Events</div>
                    <div class="dept-card-body" style="padding:10px 16px;">
                        <div class="news-scroll-wrap">
                            <div class="news-scroll-inner">
                                <ul class="news-list">
                                    <li>
                                        <a href="#">International Conference on English Literature &amp; Linguistics 2025</a>
                                        <span class="new-tag">New</span>
                                        <span class="news-date">30 Apr 2025</span>
                                    </li>
                                    <li>
                                        <a href="#">Shakespeare Week Celebrations — Drama Performances</a>
                                        <span class="new-tag">New</span>
                                        <span class="news-date">25 Apr 2025</span>
                                    </li>
                                    <li>
                                        <a href="#">English Department Launches Creative Writing Club</a>
                                        <span class="new-tag">New</span>
                                        <span class="news-date">18 Apr 2025</span>
                                    </li>
                                    <li>
                                        <a href="#">Workshop on Academic Writing &amp; Research Skills</a>
                                        <span class="news-date">05 Apr 2025</span>
                                    </li>
                                    <li>
                                        <a href="#">All Pakistan Bilingual Declamation Contest</a>
                                        <span class="news-date">28 Mar 2025</span>
                                    </li>
                                    <li>
                                        <a href="#">Guest Lecture on Postcolonial Literature</a>
                                        <span class="news-date">15 Mar 2025</span>
                                    </li>
                                    <li>
                                        <a href="#">Literary Magazine "The Quill" Annual Edition Released</a>
                                        <span class="news-date">20 Feb 2025</span>
                                    </li>
                                    <li>
                                        <a href="#">Poetry Recitation &amp; Creative Writing Competition</a>
                                        <span class="news-date">10 Jan 2025</span>
                                    </li>
                                    {{-- Duplicate for seamless loop --}}
                                    <li>
                                        <a href="#">International Conference on English Literature &amp; Linguistics 2025</a>
                                        <span class="new-tag">New</span>
                                        <span class="news-date">30 Apr 2025</span>
                                    </li>
                                    <li>
                                        <a href="#">Shakespeare Week Celebrations — Drama Performances</a>
                                        <span class="new-tag">New</span>
                                        <span class="news-date">25 Apr 2025</span>
                                    </li>
                                    <li>
                                        <a href="#">English Department Launches Creative Writing Club</a>
                                        <span class="new-tag">New</span>
                                        <span class="news-date">18 Apr 2025</span>
                                    </li>
                                    <li>
                                        <a href="#">Workshop on Academic Writing &amp; Research Skills</a>
                                        <span class="news-date">05 Apr 2025</span>
                                    </li>
                                    <li>
                                        <a href="#">All Pakistan Bilingual Declamation Contest</a>
                                        <span class="news-date">28 Mar 2025</span>
                                    </li>
                                    <li>
                                        <a href="#">Guest Lecture on Postcolonial Literature</a>
                                        <span class="news-date">15 Mar 2025</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Programs Offered --}}
                <div class="dept-card">
                    <div class="dept-card-hdr">Programs Offered</div>
                    <div class="dept-card-body" style="padding:10px 16px;">
                        <table class="prog-table">
                            <thead>
                                <tr><th>#</th><th>Program</th><th>Level</th><th>Duration</th></tr>
                            </thead>
                            <tbody>
                                <tr><td>1</td><td><a href="#">BS English (Literature)</a></td><td><span class="prog-badge bs">BS</span></td><td>4 Years</td></tr>
                                <tr><td>2</td><td><a href="#">BS English (Linguistics)</a></td><td><span class="prog-badge bs">BS</span></td><td>4 Years</td></tr>
                                <tr><td>3</td><td><a href="#">BS English (ELT)</a><br><span style="font-size:10px;color:#666;">English Language Teaching</span></td><td><span class="prog-badge bs">BS</span></td><td>4 Years</td></tr>
                                <tr><td>4</td><td><a href="#">BS English (Applied Linguistics)</a></td><td><span class="prog-badge bs">BS</span></td><td>4 Years</td></tr>
                                <tr><td>5</td><td><a href="#">M.A English</a></td><td><span class="prog-badge ms">Master</span></td><td>2 Years</td></tr>
                                <tr><td>6</td><td><a href="#">M.Phil English</a></td><td><span class="prog-badge ms">M.Phil</span></td><td>2 Years</td></tr>
                                <tr><td>7</td><td><a href="#">MS English</a></td><td><span class="prog-badge ms">MS</span></td><td>2 Years</td></tr>
                                <tr><td>8</td><td><a href="#">Ph.D English</a></td><td><span class="prog-badge phd">PhD</span></td><td>3–5 Years</td></tr>
                                <tr><td>9</td><td><a href="#">Certificate in Creative Writing</a></td><td><span class="prog-badge bs">Certificate</span></td><td>6 Months</td></tr>
                                <tr><td>10</td><td><a href="#">Certificate in English Language Teaching (CELT)</a></td><td><span class="prog-badge bs">Certificate</span></td><td>6 Months</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Important Links --}}
                <div class="dept-card">
                    <div class="dept-card-hdr">Important Links</div>
                    <div class="dept-card-body">
                        <div class="imp-links-grid">
                            <a href="#">HOD's Message</a>
                            <a href="#">BS English Literature</a>
                            <a href="#">BS English Linguistics</a>
                            <a href="#">BS English (ELT)</a>
                            <a href="#">M.A English</a>
                            <a href="#">M.Phil English</a>
                            <a href="#">Ph.D English</a>
                            <a href="#">Faculty Members</a>
                            <a href="#">Research Publications</a>
                            <a href="#">English Literary Society</a>
                            <a href="#">Creative Writing Club</a>
                            <a href="#">Drama &amp; Theatre Club</a>
                            <a href="#">Literary Magazine "The Quill"</a>
                            <a href="#">Downloads (Course Materials)</a>
                            <a href="#">Research Areas</a>
                            <a href="#">Seminar Schedule</a>
                            <a href="#">Alumni Network</a>
                            <a href="#">Language Lab</a>
                        </div>
                    </div>
                </div>

            </div>

            {{-- ══ COL 3: Announcements + Quick Access + Contact ══ --}}
            <div>

                <div class="dept-card">
                    <div class="dept-card-hdr">Announcements</div>
                    <div class="dept-card-body">
                        <ul class="news-list">
                            <li>
                                <a href="#">Creative Writing Competition — Submit Your Entries</a>
                                <span class="new-tag">New</span>
                                <span class="news-date">28 Apr 2025</span>
                            </li>
                            <li>
                                <a href="#">Shakespeare Drama Festival Registrations Open</a>
                                <span class="new-tag">New</span>
                                <span class="news-date">22 Apr 2025</span>
                            </li>
                            <li>
                                <a href="#">Research Journal "English Horizons" Call for Papers</a>
                                <span class="news-date">15 Apr 2025</span>
                            </li>
                            <li>
                                <a href="#">Scholarship for English Literature Students</a>
                                <span class="news-date">05 Apr 2025</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="sidebar-quick">
                    <div class="sq-hdr">📌 Quick Access</div>
                    <ul>
                        <li><a href="#">Faculty Members</a></li>
                        <li><a href="#">Class Schedule</a></li>
                        <li><a href="#">Date Sheet</a></li>
                        <li><a href="#">Admissions</a></li>
                        <li><a href="#">Fee Structure</a></li>
                        <li><a href="#">Research Projects</a></li>
                        <li><a href="#">Language Lab Booking</a></li>
                        <li><a href="#">Downloads</a></li>
                        <li><a href="#">Literary Society Events</a></li>
                        <li><a href="#">Timetable</a></li>
                    </ul>
                </div>

                <div class="sidebar-contact">
                    <div class="sc-hdr">📞 Contact Department</div>
                    <ul>
                        <li><strong>HOD Office:</strong></li>
                        <li style="padding-left:8px;">📞 0997-XXXXXXX</li>
                        <li style="padding-left:8px;">📧 english@gpgcmansehra.edu.pk</li>
                        <li><strong>Location:</strong></li>
                        <li style="padding-left:8px;">English Block (Social Sciences Wing),<br>GPGC Mansehra, KPK, Pakistan</li>
                        <li><strong>Office Hours:</strong></li>
                        <li style="padding-left:8px;">Mon–Sat: 8:00 AM – 4:00 PM</li>
                        <li><strong>Language Lab:</strong></li>
                        <li style="padding-left:8px;">📞 0997-XXXXXX Ext: 313</li>
                    </ul>
                </div>

                <div class="dept-card">
                    <div class="dept-card-hdr">Accreditation &amp; Recognition</div>
                    <div class="dept-card-body" style="font-size:13px;color:#444;line-height:1.65;">
                        <p>All programs are recognized and approved by the <strong>Higher Education Commission (HEC) of Pakistan</strong>.</p>
                        <p style="margin-top:8px;">The department maintains strong collaboration with:</p>
                        <ul style="margin-top:5px;margin-left:20px;color:#555;">
                            <li>British Council Pakistan</li>
                            <li>National University of Modern Languages (NUML)</li>
                            <li>Pakistan English Language Teachers Association (PELTA)</li>
                            <li>SPELT (Society of Pakistan English Language Teachers)</li>
                        </ul>
                    </div>
                </div>

                <div class="dept-card">
                    <div class="dept-card-hdr">📚 English Research Areas</div>
                    <div class="dept-card-body">
                        <div class="imp-links-grid" style="grid-template-columns: 1fr;">
                            <a href="#">🏰 British Literature</a>
                            <a href="#">🗽 American Literature</a>
                            <a href="#">🌍 Postcolonial Literature</a>
                            <a href="#">📖 Literary Theory &amp; Criticism</a>
                            <a href="#">🗣️ Applied Linguistics</a>
                            <a href="#">📝 ELT (English Language Teaching)</a>
                            <a href="#">🎭 Shakespeare Studies</a>
                            <a href="#">📜 Romantic Poetry</a>
                            <a href="#">🔍 Discourse Analysis</a>
                            <a href="#">🧠 Psycholinguistics</a>
                            <a href="#">📚 World Literature in English</a>
                            <a href="#">✍️ Creative Writing</a>
                            <a href="#">📖 Translation Studies</a>
                            <a href="#">💬 Sociolinguistics</a>
                        </div>
                    </div>
                </div>

                <div class="dept-card">
                    <div class="dept-card-hdr">🎭 Literary Society Activities</div>
                    <div class="dept-card-body" style="font-size:12.5px;color:#555;line-height:1.6;">
                        <p>🟢 <strong>Weekly Literary Circle:</strong> Discussions on literary works</p>
                        <p>🟡 <strong>Drama &amp; Theatre Club:</strong> Annual play productions</p>
                        <p>🔵 <strong>Creative Writing Workshops:</strong> Monthly sessions</p>
                        <p>🟣 <strong>Poetry Recitation Evenings:</strong> Open mic events</p>
                        <p>🟠 <strong>Debate &amp; Declamation:</strong> Inter-collegiate competitions</p>
                        <div class="english-poetry" style="margin-top:12px;">
                            <p>"Shall I compare thee to a summer's day?</p>
                            <p>Thou art more lovely and more temperate..."</p>
                            <p style="font-size:11px; margin-top:8px;">— William Shakespeare (Sonnet 18)</p>
                        </div>
                    </div>
                </div>

                <div class="dept-card">
                    <div class="dept-card-hdr">🎓 Career Opportunities</div>
                    <div class="dept-card-body" style="font-size:12px;color:#555;line-height:1.6;">
                        <p>✓ <strong>Teaching &amp; Academia</strong></p>
                        <p>✓ <strong>Content Writing &amp; Journalism</strong></p>
                        <p>✓ <strong>Publishing &amp; Editing</strong></p>
                        <p>✓ <strong>Media &amp; Communication</strong></p>
                        <p>✓ <strong>Corporate Communications</strong></p>
                        <p>✓ <strong>Freelance Writing</strong></p>
                        <p>✓ <strong>Translators &amp; Interpreters</strong></p>
                        <p>✓ <strong>Civil Services (CSS/PMS)</strong></p>
                    </div>
                </div>

            </div>

        </div>{{-- end dept-grid --}}
    </div>
</div>

@endsection
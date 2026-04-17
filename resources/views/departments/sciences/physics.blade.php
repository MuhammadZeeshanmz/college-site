@extends('layouts.app')

@section('title', 'Department of Physics — Government Postgraduate College Mansehra')

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

/* Physics-specific styling */
.physics-formula {
    font-family: 'Times New Roman', serif;
    font-style: italic;
    background: #f0f5ff;
    padding: 2px 6px;
    border-radius: 3px;
}
.physics-lab-icon {
    font-size: 14px;
    margin-right: 5px;
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
        <a href="#">Sciences</a>
        <span>›</span>
        <span style="color:#fff;">Department of Physics</span>
    </div>
</div>

<div class="dept-page">
    <div class="dept-wrap">

        <div class="dept-title-bar">
            <div class="dept-icon">⚛️</div>
            <h1>Department of Physics</h1>
        </div>

        <div class="dept-grid">

            {{-- ══ COL 1: Introduction + Gallery + HOD ══ --}}
            <div>

                <div class="dept-card">
                    <div class="dept-card-hdr">Introduction</div>
                    <div class="dept-card-body">
                        <div class="intro-img-row">
                            <div class="intro-img-placeholder">⚛️🔬</div>
                            <div class="intro-text">
                                <p>Welcome to the Department of Physics at Government Postgraduate College Mansehra!</p>
                                <p>Physics is the fundamental science that explores the laws of nature, from the smallest subatomic particles to the vast expanses of the universe. Our department is committed to providing quality education in physics, fostering scientific inquiry, experimental skills, and analytical thinking.</p>
                            </div>
                        </div>
                        <div class="intro-text" style="margin-bottom:12px;">
                            <p>The department features state-of-the-art physics laboratories equipped with modern instruments for experiments in Mechanics, Optics, Electricity & Magnetism, Modern Physics, and Electronics. Our dedicated faculty members specialize in various fields including Quantum Mechanics, Solid State Physics, Nuclear Physics, and Astrophysics.</p>
                        </div>
                        <a href="#" class="btn-read-more">READ MORE</a>
                    </div>
                </div>

                <div class="dept-card">
                    <div class="dept-card-hdr">Department Gallery</div>
                    <div class="dept-card-body" style="padding:10px;">
                        <div class="intro-gallery-placeholder">
                            <div class="gal-icon">🔬</div>
                            <div class="gal-text">Physics Lab — GPGCM Mansehra</div>
                        </div>
                    </div>
                </div>

                <div class="dept-card">
                    <div class="dept-card-hdr">HOD's Message</div>
                    <div class="hod-card">
                        <div class="hod-photo-placeholder">👨‍🔬</div>
                        <div>
                            <div class="hod-text">
                                Physics is the most fundamental of all sciences, and studying it develops a unique perspective on how the universe works. At the Department of Physics, GPGC Mansehra, we focus on creating a stimulating learning environment where students can explore the wonders of physics through hands-on experiments and theoretical understanding...
                                <a href="#" style="color:#0066cc;font-weight:600;text-decoration:none;">Read More</a>
                            </div>
                            <div class="hod-name">Prof. Dr. Khalid Mahmood</div>
                            <div class="hod-designation">Head of Department, Physics</div>
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
                                        <a href="#">National Physics Symposium 2025 at GPGCM</a>
                                        <span class="new-tag">New</span>
                                        <span class="news-date">18 Apr 2025</span>
                                    </li>
                                    <li>
                                        <a href="#">Workshop on Quantum Computing Fundamentals</a>
                                        <span class="new-tag">New</span>
                                        <span class="news-date">10 Apr 2025</span>
                                    </li>
                                    <li>
                                        <a href="#">Physics Department Receives Research Equipment Grant from HEC</a>
                                        <span class="new-tag">New</span>
                                        <span class="news-date">25 Mar 2025</span>
                                    </li>
                                    <li>
                                        <a href="#">International Astronomy Observation Night</a>
                                        <span class="news-date">15 Feb 2025</span>
                                    </li>
                                    <li>
                                        <a href="#">Inter-Collegiate Physics Olympiad 2025</a>
                                        <span class="news-date">30 Jan 2025</span>
                                    </li>
                                    <li>
                                        <a href="#">Guest Lecture on Semiconductor Physics and Applications</a>
                                        <span class="news-date">10 Dec 2024</span>
                                    </li>
                                    <li>
                                        <a href="#">Physics Department Industrial Visit to Hydropower Project</a>
                                        <span class="news-date">20 Nov 2024</span>
                                    </li>
                                    {{-- Duplicate for seamless loop --}}
                                    <li>
                                        <a href="#">National Physics Symposium 2025 at GPGCM</a>
                                        <span class="new-tag">New</span>
                                        <span class="news-date">18 Apr 2025</span>
                                    </li>
                                    <li>
                                        <a href="#">Workshop on Quantum Computing Fundamentals</a>
                                        <span class="new-tag">New</span>
                                        <span class="news-date">10 Apr 2025</span>
                                    </li>
                                    <li>
                                        <a href="#">Physics Department Receives Research Equipment Grant from HEC</a>
                                        <span class="new-tag">New</span>
                                        <span class="news-date">25 Mar 2025</span>
                                    </li>
                                    <li>
                                        <a href="#">International Astronomy Observation Night</a>
                                        <span class="news-date">15 Feb 2025</span>
                                    </li>
                                    <li>
                                        <a href="#">Inter-Collegiate Physics Olympiad 2025</a>
                                        <span class="news-date">30 Jan 2025</span>
                                    </li>
                                    <li>
                                        <a href="#">Guest Lecture on Semiconductor Physics and Applications</a>
                                        <span class="news-date">10 Dec 2024</span>
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
                                <tr><td>1</td><td><a href="#">BS Physics</a></td><td><span class="prog-badge bs">BS</span></td><td>4 Years</td></tr>
                                <tr><td>2</td><td><a href="#">BS Physics (Electronics)</a></td><td><span class="prog-badge bs">BS</span></td><td>4 Years</td></tr>
                                <tr><td>3</td><td><a href="#">BS Physics (Computational)</a></td><td><span class="prog-badge bs">BS</span></td><td>4 Years</td></tr>
                                <tr><td>4</td><td><a href="#">BS Medical Physics</a></td><td><span class="prog-badge bs">BS</span></td><td>4 Years</td></tr>
                                <tr><td>5</td><td><a href="#">M.Sc Physics</a></td><td><span class="prog-badge ms">Master</span></td><td>2 Years</td></tr>
                                <tr><td>6</td><td><a href="#">M.Phil Physics</a></td><td><span class="prog-badge ms">M.Phil</span></td><td>2 Years</td></tr>
                                <tr><td>7</td><td><a href="#">MS Physics</a></td><td><span class="prog-badge ms">MS</span></td><td>2 Years</td></tr>
                                <tr><td>8</td><td><a href="#">Ph.D Physics</a></td><td><span class="prog-badge phd">PhD</span></td><td>3–5 Years</td></tr>
                                <tr><td>9</td><td><a href="#">Diploma in Electronics</a></td><td><span class="prog-badge bs">Diploma</span></td><td>1 Year</td></tr>
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
                            <a href="#">BS Physics (General)</a>
                            <a href="#">BS Physics (Electronics)</a>
                            <a href="#">BS Computational Physics</a>
                            <a href="#">BS Medical Physics</a>
                            <a href="#">M.Sc Physics</a>
                            <a href="#">M.Phil Physics</a>
                            <a href="#">Ph.D Physics</a>
                            <a href="#">Physics Laboratories</a>
                            <a href="#">Research Publications</a>
                            <a href="#">Faculty Members</a>
                            <a href="#">Research Areas</a>
                            <a href="#">Seminar Schedule</a>
                            <a href="#">Physics Society</a>
                            <a href="#">Astronomy Club</a>
                            <a href="#">Equipment Inventory</a>
                            <a href="#">Downloads (Lab Manuals)</a>
                            <a href="#">Research Collaborations</a>
                            <a href="#">Alumni Network</a>
                            <a href="#">Journal Subscriptions</a>
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
                                <a href="#">Physics Lab Practical Exams Schedule — Spring 2025</a>
                                <span class="new-tag">New</span>
                                <span class="news-date">14 Apr 2025</span>
                            </li>
                            <li>
                                <a href="#">Research Proposal Submission Deadline Extended</a>
                                <span class="new-tag">New</span>
                                <span class="news-date">05 Apr 2025</span>
                            </li>
                            <li>
                                <a href="#">Summer Internship Program at PAEC</a>
                                <span class="news-date">28 Mar 2025</span>
                            </li>
                            <li>
                                <a href="#">Scholarship for Physics Students Announced</a>
                                <span class="news-date">15 Mar 2025</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="sidebar-quick">
                    <div class="sq-hdr">📌 Quick Access</div>
                    <ul>
                        <li><a href="#">Faculty Members</a></li>
                        <li><a href="#">Lab Schedule</a></li>
                        <li><a href="#">Date Sheet</a></li>
                        <li><a href="#">Admissions</a></li>
                        <li><a href="#">Fee Structure</a></li>
                        <li><a href="#">Research Projects</a></li>
                        <li><a href="#">Physics Lab Manuals</a></li>
                        <li><a href="#">Downloads</a></li>
                        <li><a href="#">Equipment Booking</a></li>
                        <li><a href="#">Timetable</a></li>
                    </ul>
                </div>

                <div class="sidebar-contact">
                    <div class="sc-hdr">📞 Contact Department</div>
                    <ul>
                        <li><strong>HOD Office:</strong></li>
                        <li style="padding-left:8px;">📞 0997-XXXXXXX</li>
                        <li style="padding-left:8px;">📧 physics@gpgcmansehra.edu.pk</li>
                        <li><strong>Location:</strong></li>
                        <li style="padding-left:8px;">Physics Block (Science Wing),<br>GPGC Mansehra, KPK, Pakistan</li>
                        <li><strong>Office Hours:</strong></li>
                        <li style="padding-left:8px;">Mon–Sat: 8:00 AM – 4:00 PM</li>
                        <li><strong>Physics Labs:</strong></li>
                        <li style="padding-left:8px;">📞 0997-XXXXXX Ext: 305</li>
                        <li style="padding-left:8px;">🔬 Mechanics, Electronics, Modern Physics Labs</li>
                    </ul>
                </div>

                <div class="dept-card">
                    <div class="dept-card-hdr">Accreditation &amp; Recognition</div>
                    <div class="dept-card-body" style="font-size:13px;color:#444;line-height:1.65;">
                        <p>All programs are recognized and approved by the <strong>Higher Education Commission (HEC) of Pakistan</strong>.</p>
                        <p style="margin-top:8px;">The department maintains strong collaboration with:</p>
                        <ul style="margin-top:5px;margin-left:20px;color:#555;">
                            <li>Pakistan Atomic Energy Commission (PAEC)</li>
                            <li>National Center for Physics (NCP)</li>
                            <li>Pakistan Space &amp; Upper Atmosphere Research Commission (SUPARCO)</li>
                        </ul>
                    </div>
                </div>

                <div class="dept-card">
                    <div class="dept-card-hdr">⚛️ Physics Research Areas</div>
                    <div class="dept-card-body">
                        <div class="imp-links-grid" style="grid-template-columns: 1fr;">
                            <a href="#">🔬 Condensed Matter Physics</a>
                            <a href="#">⚛️ Quantum Mechanics</a>
                            <a href="#">🌌 Astrophysics &amp; Cosmology</a>
                            <a href="#">💻 Computational Physics</a>
                            <a href="#">🔋 Renewable Energy Physics</a>
                            <a href="#">📡 Semiconductor Physics</a>
                            <a href="#">🧬 Medical Physics</a>
                            <a href="#">🌊 Plasma Physics</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>{{-- end dept-grid --}}
    </div>
</div>

@endsection
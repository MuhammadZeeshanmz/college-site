@extends('layouts.app')

@section('title', 'Department of Computer Science — Government Postgraduate College Mansehra')

@push('styles')
<style>
/* ══════════════════════════════════════════
   DEPT PAGE — Computer Science
   Matches UOH department layout exactly
══════════════════════════════════════════ */

/* Page header breadcrumb bar */
.dept-breadcrumb {
    background: linear-gradient(90deg, #002855 0%, #004a8f 50%, #002855 100%);
    padding: 12px 0;
    border-bottom: 3px solid #ffd700;
}
.dept-breadcrumb .wrap {
    max-width: 1280px; margin: auto; padding: 0 20px;
    display: flex; align-items: center; gap: 8px;
    font-size: 13px; color: rgba(255,255,255,.7);
}
.dept-breadcrumb a { color: #ffd700; text-decoration: none; }
.dept-breadcrumb a:hover { text-decoration: underline; }
.dept-breadcrumb span { color: rgba(255,255,255,.4); }

/* Page wrapper */
.dept-page { background: #f4f5f7; min-height: 70vh; padding: 28px 0 60px; }
.dept-wrap { max-width: 1280px; margin: auto; padding: 0 20px; }

/* Page title */
.dept-title-bar {
    background: #fff;
    border: 1px solid #dde3ec;
    border-left: 5px solid #0066cc;
    border-radius: 4px;
    padding: 14px 20px;
    margin-bottom: 22px;
    display: flex; align-items: center; gap: 14px;
}
.dept-title-bar h1 {
    font-family: 'Playfair Display', serif;
    font-size: 22px; font-weight: 700; color: #002855;
    margin: 0;
}
.dept-title-bar .dept-icon {
    width: 48px; height: 48px; background: #002855;
    border-radius: 8px; display: flex; align-items: center;
    justify-content: center; font-size: 24px; flex-shrink: 0;
}

/* Main 3-col grid — matches screenshot exactly */
.dept-grid {
    display: grid;
    grid-template-columns: 1fr 1.1fr 0.85fr;
    gap: 18px;
    align-items: start;
}

/* Card base */
.dept-card {
    background: #fff;
    border: 1px solid #dde3ec;
    border-radius: 6px;
    overflow: hidden;
    margin-bottom: 18px;
}
.dept-card-hdr {
    background: #1a6e85;
    color: #fff;
    padding: 10px 16px;
    font-size: 13.5px;
    font-weight: 700;
    letter-spacing: .04em;
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.dept-card-hdr a { color: #ffd700; font-size: 12px; font-weight: 600; text-decoration: none; }
.dept-card-hdr a:hover { text-decoration: underline; }
.dept-card-body { padding: 14px 16px; }

/* Introduction card */
.intro-img-row {
    display: flex; gap: 14px; align-items: flex-start; margin-bottom: 14px;
}
.intro-img {
    width: 180px; height: 130px; object-fit: cover;
    flex-shrink: 0; border: 1px solid #dde; border-radius: 4px;
}
.intro-img-placeholder {
    width: 180px; height: 130px; flex-shrink: 0;
    background: linear-gradient(135deg, #002855 0%, #0066cc 100%);
    display: flex; align-items: center; justify-content: center;
    font-size: 48px; border-radius: 4px; color: #fff;
}
.intro-text {
    font-size: 13px; color: #333; line-height: 1.75; text-align: justify;
}
.intro-text p { margin-bottom: 8px; }
.btn-read-more {
    display: inline-block; background: #1a6e85; color: #fff;
    padding: 8px 22px; border-radius: 4px; font-size: 13px; font-weight: 700;
    text-decoration: none; letter-spacing: .05em; margin-top: 6px;
    transition: background .2s;
}
.btn-read-more:hover { background: #0b5268; }

.intro-gallery-img {
    width: 100%; height: 220px; object-fit: cover;
    border-radius: 4px; display: block;
    border: 1px solid #dde;
}
.intro-gallery-placeholder {
    width: 100%; height: 220px;
    background: linear-gradient(135deg, #1a3a6c 0%, #0066cc 50%, #1a3a6c 100%);
    border-radius: 4px;
    display: flex; align-items: center; justify-content: center;
    flex-direction: column; gap: 12px; color: #fff;
}
.intro-gallery-placeholder .gal-icon { font-size: 60px; }
.intro-gallery-placeholder .gal-text { font-size: 14px; font-weight: 600; opacity: .8; }

/* News & Events list */
.news-list { list-style: none; padding: 0; margin: 0; }
.news-list li {
    padding: 10px 4px; border-bottom: 1px dashed #ccc;
    font-size: 13px; color: #222; line-height: 1.45;
}
.news-list li:last-child { border-bottom: none; }
.news-list li a {
    color: #0b4d8a; text-decoration: none; font-weight: 600; transition: color .2s;
}
.news-list li a:hover { color: #0066cc; text-decoration: underline; }
.news-date { font-size: 11px; color: #888; display: block; margin-top: 3px; }
.new-tag { color: red; font-weight: 800; font-size: 11px; margin-left: 4px; }

/* Announcements */
.ann-empty { font-size: 13px; color: #888; padding: 8px 0; font-style: italic; }

/* Important Links */
.imp-links-grid {
    display: grid; grid-template-columns: 1fr 1fr; gap: 2px 20px;
}
.imp-links-grid a {
    display: flex; align-items: flex-start; gap: 6px;
    padding: 6px 2px; font-size: 13px; color: #0b4d8a;
    text-decoration: none; border-bottom: 1px dotted #ddd;
    transition: color .2s; line-height: 1.35;
}
.imp-links-grid a:hover { color: #0066cc; }
.imp-links-grid a::before { content: '•'; color: #0066cc; flex-shrink: 0; font-size: 16px; line-height: 1; }

/* HOD Message card */
.hod-card {
    display: flex; gap: 14px; align-items: flex-start;
    padding: 16px;
}
.hod-photo {
    width: 90px; height: 110px; object-fit: cover;
    border: 2px solid #dde; border-radius: 4px; flex-shrink: 0;
}
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
.prog-table th {
    background: #002855; color: #fff; padding: 8px 12px;
    text-align: left; font-weight: 600; font-size: 12.5px;
}
.prog-table td {
    padding: 8px 12px; border-bottom: 1px solid #eef;
    color: #333; vertical-align: middle;
}
.prog-table tr:hover td { background: #f0f5ff; }
.prog-table td a { color: #0066cc; text-decoration: none; font-weight: 500; }
.prog-table td a:hover { text-decoration: underline; }
.prog-badge {
    display: inline-block; font-size: 11px; font-weight: 700;
    padding: 2px 8px; border-radius: 3px; color: #fff;
}
.prog-badge.bs { background: #28a745; }
.prog-badge.ms { background: #0066cc; }
.prog-badge.phd { background: #6f42c1; }

/* Sidebar */
.dept-sidebar {}
.sidebar-quick { background: #002855; border-radius: 6px; overflow: hidden; margin-bottom: 18px; }
.sidebar-quick .sq-hdr {
    background: #ffd700; color: #002855;
    padding: 10px 14px; font-weight: 800; font-size: 13px;
    letter-spacing: .05em; text-transform: uppercase;
}
.sidebar-quick ul { list-style: none; padding: 0; margin: 0; }
.sidebar-quick ul li a {
    display: flex; align-items: center; gap: 8px;
    padding: 10px 14px; color: #cce; font-size: 12.5px;
    text-decoration: none; border-bottom: 1px solid rgba(255,255,255,.07);
    transition: all .2s;
}
.sidebar-quick ul li a:hover { background: rgba(255,255,255,.1); color: #ffd700; }
.sidebar-quick ul li a::before { content: '›'; color: #ffd700; font-size: 18px; line-height: 1; }

.sidebar-contact { background: #fff; border: 1px solid #dde3ec; border-radius: 6px; overflow: hidden; margin-bottom: 18px; }
.sidebar-contact .sc-hdr { background: #1a6e85; color: #fff; padding: 10px 14px; font-weight: 700; font-size: 13px; }
.sidebar-contact ul { list-style: none; padding: 12px 14px; margin: 0; display: flex; flex-direction: column; gap: 8px; }
.sidebar-contact ul li { font-size: 12.5px; color: #444; display: flex; gap: 8px; align-items: flex-start; }
.sidebar-contact ul li strong { color: #002855; }

/* Responsive */
@media (max-width: 1024px) {
    .dept-grid { grid-template-columns: 1fr 1fr; }
}
@media (max-width: 768px) {
    .dept-grid { grid-template-columns: 1fr; }
    .imp-links-grid { grid-template-columns: 1fr; }
    .intro-img-row { flex-direction: column; }
    .intro-img-placeholder, .intro-img { width: 100%; height: 160px; }
}
</style>
@endpush

@section('content')

{{-- ═══════════════════════════
     BREADCRUMB
═══════════════════════════ --}}
<div class="dept-breadcrumb">
    <div class="wrap">
        <a href="{{ url('/') }}">Home</a>
        <span>›</span>
        <a href="#">Faculties</a>
        <span>›</span>
        <a href="#">Sciences</a>
        <span>›</span>
        <span style="color:#fff;">Department of Computer Science</span>
    </div>
</div>

{{-- ═══════════════════════════
     MAIN PAGE
═══════════════════════════ --}}
<div class="dept-page">
    <div class="dept-wrap">

        {{-- Title Bar --}}
        <div class="dept-title-bar">
            <div class="dept-icon">💻</div>
            <h1>Department of Computer Science</h1>
        </div>

        {{-- 3-Column Grid --}}
        <div class="dept-grid">

            {{-- ══ COL 1: Introduction + Gallery --}}
            <div>

                {{-- Introduction Card --}}
                <div class="dept-card">
                    <div class="dept-card-hdr">Introduction</div>
                    <div class="dept-card-body">
                        <div class="intro-img-row">
                            {{-- Replace with: <img class="intro-img" src="{{ asset('images/cs-dept.jpg') }}" alt="CS Department"> --}}
                            <div class="intro-img-placeholder">💻</div>
                            <div class="intro-text">
                                <p>Welcome to the Department of Computer Science at Government Postgraduate College Mansehra!</p>
                                <p>Our department takes great pride in offering a diverse range of esteemed undergraduate and graduate degree programs in the field of Computer Science. Our curriculum is carefully designed to equip students with both theoretical knowledge and practical skills essential for the modern digital economy.</p>
                            </div>
                        </div>
                        <div class="intro-text" style="margin-bottom:12px;">
                            <p>The department boasts a highly qualified faculty of experienced professionals and researchers committed to academic excellence. State-of-the-art computer labs, high-speed internet, and a dedicated research environment provide students with cutting-edge tools to innovate and excel.</p>
                            <p>We are affiliated with Higher Education Commission (HEC) Pakistan and our programs are fully recognized nationwide. Our alumni are making significant contributions in software engineering, cybersecurity, artificial intelligence, and data science across Pakistan and abroad.</p>
                        </div>
                        <a href="#" class="btn-read-more">READ MORE</a>
                    </div>
                </div>

                {{-- Gallery Image --}}
                <div class="dept-card">
                    <div class="dept-card-hdr">Department Gallery</div>
                    <div class="dept-card-body" style="padding:10px;">
                        {{-- Replace with actual event/lab image --}}
                        {{-- <img class="intro-gallery-img" src="{{ asset('images/cs-event.jpg') }}" alt="CS Event"> --}}
                        <div class="intro-gallery-placeholder">
                            <div class="gal-icon">🏛️</div>
                            <div class="gal-text">Computing Society — GPGCM</div>
                        </div>
                    </div>
                </div>

                {{-- HOD's Message --}}
                <div class="dept-card">
                    <div class="dept-card-hdr">HOD's Message</div>
                    <div class="hod-card">
                        {{-- Replace with: <img class="hod-photo" src="{{ asset('images/hod-cs.jpg') }}" alt="HOD"> --}}
                        <div class="hod-photo-placeholder">👤</div>
                        <div>
                            <div class="hod-text">
                                It is my pleasure to welcome you to the Department of Computer Science at Government Postgraduate College Mansehra. Our department is committed to fostering a culture of innovation, critical thinking, and academic excellence. We strive to prepare our graduates to meet the challenges of the rapidly evolving technology landscape with confidence and competence...
                                <a href="#" style="color:#0066cc;font-weight:600;text-decoration:none;">Read More</a>
                            </div>
                            <div class="hod-name">Prof. Dr. [HOD Name]</div>
                            <div class="hod-designation">Head of Department, Computer Science</div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- ══ COL 2: News, Programs, Important Links --}}
            <div>

                {{-- News & Events --}}
                <div class="dept-card">
                    <div class="dept-card-hdr">
                        News &amp; Events
                        {{-- <a href="{{ route('news') }}">View All</a> --}}
                    </div>
                    <div class="dept-card-body">
                        <ul class="news-list">
                            <li>
                                <a href="#">Science Students Seminar on Artificial Intelligence and Machine Learning</a>
                                <span class="new-tag">New</span>
                                <span class="news-date">16 Apr 2025</span>
                            </li>
                            <li>
                                <a href="#">FES Pakistan visits Department of Computer Science, GPGCM</a>
                                <span class="new-tag">New</span>
                                <span class="news-date">03 Mar 2025</span>
                            </li>
                            <li>
                                <a href="#">Department of Computer Science Welcomes its Fresh Batch of BS Students</a>
                                <span class="new-tag">New</span>
                                <span class="news-date">15 Feb 2025</span>
                            </li>
                            <li>
                                <a href="#">Programming Competition 2025 — Inter-Departmental Coding Challenge</a>
                                <span class="news-date">10 Jan 2025</span>
                            </li>
                            <li>
                                <a href="#">Workshop on Cybersecurity Awareness for Students and Faculty</a>
                                <span class="news-date">05 Dec 2024</span>
                            </li>
                            <li>
                                <a href="#">CS Department Signs MOU with Leading IT Company for Internship Opportunities</a>
                                <span class="news-date">20 Nov 2024</span>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Programs Offered --}}
                <div class="dept-card">
                    <div class="dept-card-hdr">Programs Offered</div>
                    <div class="dept-card-body" style="padding:10px 16px;">
                        <table class="prog-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Program</th>
                                    <th>Level</th>
                                    <th>Duration</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><a href="#">BS Computer Science</a></td>
                                    <td><span class="prog-badge bs">BS</span></td>
                                    <td>4 Years</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td><a href="#">BS Software Engineering</a></td>
                                    <td><span class="prog-badge bs">BS</span></td>
                                    <td>4 Years</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td><a href="#">BS Artificial Intelligence</a></td>
                                    <td><span class="prog-badge bs">BS</span></td>
                                    <td>4 Years</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td><a href="#">BS Data Science</a></td>
                                    <td><span class="prog-badge bs">BS</span></td>
                                    <td>4 Years</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td><a href="#">BS Cyber Security</a></td>
                                    <td><span class="prog-badge bs">BS</span></td>
                                    <td>4 Years</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td><a href="#">Masters (Computer Science)</a></td>
                                    <td><span class="prog-badge ms">MS</span></td>
                                    <td>2 Years</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td><a href="#">MS Computer Science</a></td>
                                    <td><span class="prog-badge ms">MS</span></td>
                                    <td>2 Years</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td><a href="#">Ph.D Computer Science</a></td>
                                    <td><span class="prog-badge phd">PhD</span></td>
                                    <td>3–5 Years</td>
                                </tr>
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
                            <a href="#">BS (Artificial Intelligence)</a>
                            <a href="#">BS (Computer Science)</a>
                            <a href="#">BS (Data Science)</a>
                            <a href="#">BS (Software Engineering)</a>
                            <a href="#">BS (Telecom &amp; Networks)</a>
                            <a href="#">Masters (Computer Science)</a>
                            <a href="#">Ph.D Computer Science</a>
                            <a href="#">MS (Computer Science)</a>
                            <a href="#">MOUs</a>
                            <a href="#">Program Offered &amp; Goals</a>
                            <a href="#">Industry Advisory Board</a>
                            <a href="#">Industry Linkages</a>
                            <a href="#">MS-PhD Program Proforma</a>
                            <a href="#">Laboratories</a>
                            <a href="#">BS (Cyber Security)</a>
                            <a href="#">Other Downloads</a>
                            <a href="#">BS (Robotics &amp; Intelligent Systems)</a>
                            <a href="#">Faculty Members</a>
                            <a href="#">Joint PhD Faculty Pool</a>
                        </div>
                    </div>
                </div>

            </div>

            {{-- ══ COL 3: Announcements + Sidebar --}}
            <div>

                {{-- Announcements --}}
                <div class="dept-card">
                    <div class="dept-card-hdr">Announcements</div>
                    <div class="dept-card-body">
                        <ul class="news-list">
                            <li>
                                <a href="#">Mid-Term Examination Schedule — Spring 2026</a>
                                <span class="new-tag">New</span>
                                <span class="news-date">10 Apr 2026</span>
                            </li>
                            <li>
                                <a href="#">Project Submission Deadline Extended for Final Year Students</a>
                                <span class="new-tag">New</span>
                                <span class="news-date">05 Apr 2026</span>
                            </li>
                            <li>
                                <a href="#">Fee Submission Schedule for Spring Semester 2026</a>
                                <span class="news-date">01 Mar 2026</span>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Quick Sidebar Links --}}
                <div class="sidebar-quick">
                    <div class="sq-hdr">📌 Quick Access</div>
                    <ul>
                        <li><a href="#">Faculty Members</a></li>
                        <li><a href="#">Lab Schedule</a></li>
                        {{-- <li><a href="{{ route('results') }}">Online Results</a></li> --}}
                        <li><a href="#">Date Sheet</a></li>
                        <li><a href="#">Admissions</a></li>
                        <li><a href="#">Fee Structure</a></li>
                        <li><a href="#">Research Projects</a></li>
                        <li><a href="#">Industry Linkages</a></li>
                        <li><a href="#">Downloads</a></li>
                    </ul>
                </div>

                {{-- Contact Card --}}
                <div class="sidebar-contact">
                    <div class="sc-hdr">📞 Contact Department</div>
                    <ul>
                        <li>
                            <strong>HOD Office:</strong>
                        </li>
                        <li style="padding-left:8px;">📞 0997-XXXXXXX</li>
                        <li style="padding-left:8px;">📧 cs@gpgcmansehra.edu.pk</li>
                        <li>
                            <strong>Location:</strong>
                        </li>
                        <li style="padding-left:8px;">
                            CS Block, GPGC Mansehra,<br>
                            Mansehra, KPK, Pakistan
                        </li>
                        <li>
                            <strong>Office Hours:</strong>
                        </li>
                        <li style="padding-left:8px;">Mon–Sat: 8:00 AM – 4:00 PM</li>
                    </ul>
                </div>

                {{-- Accreditation / HEC --}}
                <div class="dept-card">
                    <div class="dept-card-hdr">Accreditation</div>
                    <div class="dept-card-body" style="font-size:13px;color:#444;line-height:1.65;">
                        <p>All programs offered by the Department of Computer Science are recognized and approved by the <strong>Higher Education Commission (HEC) of Pakistan</strong>.</p>
                        <p style="margin-top:8px;">The department follows HEC-prescribed curriculum standards and is continuously working towards achieving <strong>NCEAC accreditation</strong>.</p>
                    </div>
                </div>

            </div>

        </div>{{-- end dept-grid --}}

    </div>{{-- end dept-wrap --}}
</div>{{-- end dept-page --}}

@endsection
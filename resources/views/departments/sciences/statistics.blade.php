@extends('layouts.app')
@section('title', 'Department of Statistics — Government Postgraduate College Mansehra')
@section('content')
<style>
.dept-breadcrumb{background:linear-gradient(90deg,#002855 0%,#004a8f 50%,#002855 100%);padding:10px 0;border-bottom:3px solid #ffd700;}.dept-breadcrumb .wrap{max-width:1280px;margin:auto;padding:0 20px;display:flex;align-items:center;gap:8px;font-size:13px;color:rgba(255,255,255,.7);}.dept-breadcrumb a{color:#ffd700;text-decoration:none;}.dept-breadcrumb .sep{color:rgba(255,255,255,.35);}.dept-page{background:#f4f5f7;padding:24px 0 60px;}.dept-wrap{max-width:1280px;margin:auto;padding:0 20px;}.dept-page-title{font-size:22px;font-weight:700;color:#1a6fa8;margin-bottom:18px;}.dept-grid{display:grid;grid-template-columns:1fr 1fr 1fr;gap:20px;align-items:start;}.dc{background:#fff;border:1px solid #d0dce8;border-radius:6px;overflow:hidden;margin-bottom:18px;}.dc-hdr{background:#1a6fa8;color:#fff;padding:10px 14px;font-size:13.5px;font-weight:700;letter-spacing:.03em;}.dc-body{padding:14px;}.intro-row{display:flex;gap:12px;align-items:flex-start;margin-bottom:10px;}.intro-photo-ph{width:175px;height:130px;flex-shrink:0;background:linear-gradient(135deg,#002855,#1a6fa8);border-radius:3px;display:flex;align-items:center;justify-content:center;font-size:48px;color:#fff;}.intro-photo{width:175px;height:130px;flex-shrink:0;object-fit:cover;border-radius:3px;border:1px solid #dde;display:block;}.intro-txt{font-size:13px;color:#333;line-height:1.75;text-align:justify;}.intro-txt p{margin:0 0 8px;}.intro-more{font-size:13px;color:#333;line-height:1.75;text-align:justify;margin-bottom:12px;}.btn-read-more{display:inline-block;background:#1a6fa8;color:#fff;padding:7px 22px;border-radius:3px;font-size:13px;font-weight:700;text-decoration:none;transition:background .2s;}.btn-read-more:hover{background:#0b5a8a;}.gallery-ph{width:100%;height:210px;background:linear-gradient(135deg,#1a3a6c,#1a6fa8);display:flex;align-items:center;justify-content:center;font-size:60px;color:#fff;}.gallery-caption{background:#002855;color:#fff;padding:6px 12px;font-size:12.5px;text-align:center;}.scroll-wrap{height:210px;overflow:hidden;position:relative;}.scroll-wrap::after{content:'';position:absolute;bottom:0;left:0;right:0;height:36px;background:linear-gradient(transparent,#fff);pointer-events:none;}.scroll-inner{animation:scrollUp 20s linear infinite;}.scroll-inner:hover{animation-play-state:paused;}@keyframes scrollUp{0%{transform:translateY(0);}100%{transform:translateY(-50%);}}.nl{list-style:none;padding:0;margin:0;}.nl li{padding:9px 0;border-bottom:1px dashed #ccc;font-size:13px;line-height:1.4;}.nl li:last-child{border-bottom:none;}.nl li a{color:#1a6fa8;text-decoration:none;font-weight:600;display:block;margin-bottom:2px;}.nl li a:hover{text-decoration:underline;}.n-date{font-size:11px;color:#888;display:block;margin-top:2px;}.ntag{display:inline-block;color:#d32f2f;font-weight:800;font-size:11.5px;margin-left:4px;vertical-align:middle;}.imp-wrap{display:grid;grid-template-columns:1fr 1fr;gap:0 12px;}.imp-wrap ul{list-style:disc;padding-left:18px;margin:0;}.imp-wrap ul li{padding:4px 0;font-size:13px;color:#1a6fa8;}.imp-wrap ul li a{color:#1a6fa8;text-decoration:none;}.imp-wrap ul li a:hover{text-decoration:underline;}.pt{width:100%;border-collapse:collapse;font-size:13px;}.pt th{background:#002855;color:#fff;padding:8px 11px;text-align:left;font-size:12.5px;font-weight:600;}.pt td{padding:7px 11px;border-bottom:1px solid #eef;color:#333;}.pt tr:hover td{background:#f0f7ff;}.pt td a{color:#1a6fa8;text-decoration:none;}.pb{display:inline-block;font-size:11px;font-weight:700;padding:1px 7px;border-radius:3px;color:#fff;}.pb.bs{background:#28a745;}.contact-body{padding:12px 14px;font-size:12.5px;color:#444;}.contact-body ul{list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:6px;}.contact-body ul li{display:flex;gap:8px;align-items:flex-start;}.contact-body ul li strong{color:#002855;min-width:62px;}@media(max-width:1024px){.dept-grid{grid-template-columns:1fr 1fr;}}@media(max-width:680px){.dept-grid{grid-template-columns:1fr;}.intro-row{flex-direction:column;}.intro-photo-ph{width:100%;height:160px;}.imp-wrap{grid-template-columns:1fr;}}
</style>
<div class="dept-breadcrumb"><div class="wrap"><a href="{{ url('/') }}">Home</a><span class="sep">›</span><a href="#">Departments</a><span class="sep">›</span><span style="color:#fff;">Department of Statistics</span></div></div>
<div class="dept-page"><div class="dept-wrap">
<div class="dept-page-title">Department of Statistics</div>
<div class="dept-grid">
<div>
    <div class="dc"><div class="dc-hdr">Introduction</div><div class="dc-body">
        <div class="intro-row">
            {{-- Real image: <img class="intro-photo" src="{{ asset('images/statistics-dept.jpg') }}" alt="Statistics"> --}}
            <div class="intro-photo-ph">📊</div>
            <div class="intro-txt"><p>Welcome to the Department of Statistics at Government Postgraduate College Mansehra!</p><p>Our department takes great pride in offering undergraduate degree programs in the field of Statistics.</p></div>
        </div>
        <div class="intro-more"><p>Our .....</p></div>
        <a href="#" class="btn-read-more">READ MORE</a>
    </div></div>
    <div class="dc"><div class="dc-hdr">Department Gallery</div><div style="padding:8px;">
        {{-- Real image: <img style="width:100%;height:210px;object-fit:cover;" src="{{ asset('images/statistics-gallery.jpg') }}" alt="Gallery"> --}}
        <div class="gallery-ph">📊</div>
        <div class="gallery-caption">Statistics Lab — GPGC Mansehra</div>
    </div></div>
</div>
<div>
    <div class="dc"><div class="dc-hdr">News &amp; Events</div><div class="dc-body" style="padding:10px 14px;">
        <div class="scroll-wrap"><div class="scroll-inner"><ul class="nl">
            <li><a href="#">National Conference on Data Science and Statistics 2025 <span class="ntag">New</span></a><span class="n-date">16 Apr 2025</span></li>
            <li><a href="#">Workshop on Machine Learning Using Python and R <span class="ntag">New</span></a><span class="n-date">03 Mar 2025</span></li>
            <li><a href="#">Statistics Department Launches Data Analytics Program <span class="ntag">New</span></a><span class="n-date">15 Feb 2025</span></li>
            <li><a href="#">Collaboration with Pakistan Bureau of Statistics</a><span class="n-date">10 Jan 2025</span></li>
            <li><a href="#">Inter-University Statistical Olympiad 2025</a><span class="n-date">05 Dec 2024</span></li>
            <li><a href="#">Guest Lecture on Time Series Analysis and Forecasting</a><span class="n-date">20 Nov 2024</span></li>
            <li><a href="#">Survey Methodology Training Workshop</a><span class="n-date">15 Oct 2024</span></li>
            {{-- Duplicate --}}
            <li><a href="#">National Conference on Data Science and Statistics 2025 <span class="ntag">New</span></a><span class="n-date">16 Apr 2025</span></li>
            <li><a href="#">Workshop on Machine Learning Using Python and R <span class="ntag">New</span></a><span class="n-date">03 Mar 2025</span></li>
            <li><a href="#">Statistics Department Launches Data Analytics Program <span class="ntag">New</span></a><span class="n-date">15 Feb 2025</span></li>
            <li><a href="#">Collaboration with Pakistan Bureau of Statistics</a><span class="n-date">10 Jan 2025</span></li>
            <li><a href="#">Inter-University Statistical Olympiad 2025</a><span class="n-date">05 Dec 2024</span></li>
            <li><a href="#">Guest Lecture on Time Series Analysis and Forecasting</a><span class="n-date">20 Nov 2024</span></li>
            <li><a href="#">Survey Methodology Training Workshop</a><span class="n-date">15 Oct 2024</span></li>
        </ul></div></div>
    </div></div>
    <div class="dc"><div class="dc-hdr">Important Links</div><div class="dc-body">
        <div class="imp-wrap">
            <ul><li><a href="#">HOD's Message</a></li><li><a href="#">BS Statistics</a></li><li><a href="#">Program Goals</a></li><li><a href="#">Course Outline</a></li><li><a href="#">Laboratories</a></li><li><a href="#">Faculty Members</a></li></ul>
            <ul><li><a href="#">Semester Rules</a></li><li><a href="#">Fee Structure</a></li><li><a href="#">Admissions</a></li><li><a href="#">Date Sheets</a></li><li><a href="#">Results</a></li><li><a href="#">Downloads</a></li></ul>
        </div>
    </div></div>
</div>
<div>
    <div class="dc"><div class="dc-hdr">Programs Offered</div><div class="dc-body" style="padding:10px 14px;">
        <table class="pt"><thead><tr><th>#</th><th>Program</th><th>Level</th><th>Duration</th></tr></thead>
        <tbody><tr><td>1</td><td><a href="#">BS Statistics</a></td><td><span class="pb bs">BS</span></td><td>4 Years</td></tr></tbody></table>
        <p style="font-size:12px;color:#888;margin-top:8px;">* HEC recognized. Affiliated with University of Hazara.</p>
    </div></div>
    <div class="dc"><div class="dc-hdr">Announcements</div><div class="dc-body" style="padding:10px 14px;">
        <div class="scroll-wrap"><div class="scroll-inner"><ul class="nl">
            <li><a href="#">Data Analytics Certification Exam Registration Open <span class="ntag">New</span></a><span class="n-date">10 Apr 2025</span></li>
            <li><a href="#">BS Statistics Admissions Open for Fall 2025 <span class="ntag">New</span></a><span class="n-date">05 Apr 2025</span></li>
            <li><a href="#">Summer Training Program in SPSS and R <span class="ntag">New</span></a><span class="n-date">01 Apr 2025</span></li>
            <li><a href="#">Scholarship for Statistics Students Announced</a><span class="n-date">20 Mar 2025</span></li>
            <li><a href="#">Internship Opportunities at Federal Bureau of Statistics</a><span class="n-date">10 Mar 2025</span></li>
            <li><a href="#">Research Proposal Submission for Statistical Consultancy</a><span class="n-date">01 Mar 2025</span></li>
            <li><a href="#">Class Timetable Spring 2025 Available</a><span class="n-date">15 Feb 2025</span></li>
            {{-- Duplicate --}}
            <li><a href="#">Data Analytics Certification Exam Registration Open <span class="ntag">New</span></a><span class="n-date">10 Apr 2025</span></li>
            <li><a href="#">BS Statistics Admissions Open for Fall 2025 <span class="ntag">New</span></a><span class="n-date">05 Apr 2025</span></li>
            <li><a href="#">Summer Training Program in SPSS and R <span class="ntag">New</span></a><span class="n-date">01 Apr 2025</span></li>
            <li><a href="#">Scholarship for Statistics Students Announced</a><span class="n-date">20 Mar 2025</span></li>
            <li><a href="#">Internship Opportunities at Federal Bureau of Statistics</a><span class="n-date">10 Mar 2025</span></li>
            <li><a href="#">Research Proposal Submission for Statistical Consultancy</a><span class="n-date">01 Mar 2025</span></li>
            <li><a href="#">Class Timetable Spring 2025 Available</a><span class="n-date">15 Feb 2025</span></li>
        </ul></div></div>
    </div></div>
    <div class="dc"><div class="dc-hdr">📞 Contact Department</div><div class="contact-body"><ul>
        <li><strong>HOD:</strong> Prof. [Name]</li>
        <li><strong>Phone:</strong> 0997-XXXXXXX</li>
        <li><strong>Email:</strong> statistics@gpgcm.edu.pk</li>
        <li><strong>Block:</strong> Statistics Block, GPGCM Mansehra</li>
        <li><strong>Hours:</strong> Mon–Fri 8:00 AM–4:00 PM</li>
    </ul></div></div>
    <div class="dc"><div class="dc-hdr">Accreditation</div><div class="dc-body" style="font-size:13px;color:#444;line-height:1.7;">
        <p>All programs are recognized and approved by the <strong>Higher Education Commission (HEC) of Pakistan</strong>.</p>
    </div></div>
</div>
</div></div></div>
@endsection
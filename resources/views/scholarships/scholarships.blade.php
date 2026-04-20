@extends('layouts.app')

@section('title', 'Financial Aid and Scholarships - Government Postgraduate College Mansehra')

@section('content')
<style>
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 14px; color: #333; }

    .page-wrapper {
        max-width: 1200px;
        margin: 30px auto;
        padding: 0 15px;
        display: flex;
        gap: 30px;
        align-items: flex-start;
    }

    /* ===== MAIN CONTENT ===== */
    .main-content { flex: 1; min-width: 0; }

    .main-content h2 {
        font-size: 22px;
        color: #1a6fa8;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .tab-section { display: none; }
    .tab-section.active { display: block; }

    .section-heading {
        font-size: 16px;
        font-weight: 700;
        color: #222;
        margin-bottom: 14px;
    }

    .content-text {
        font-size: 14px;
        line-height: 1.75;
        color: #333;
        text-align: justify;
        margin-bottom: 14px;
    }

    .content-list { padding-left: 20px; margin-bottom: 14px; }
    .content-list li { font-size: 14px; line-height: 1.8; color: #333; margin-bottom: 4px; }

    /* Staff table */
    .staff-table { width: 100%; border-collapse: collapse; margin-top: 10px; font-size: 13px; }
    .staff-table thead tr { background: #1a6fa8; color: #fff; }
    .staff-table th { padding: 9px 12px; text-align: left; font-weight: 600; }
    .staff-table tbody tr:nth-child(even) { background: #f5f9ff; }
    .staff-table tbody tr:hover { background: #e8f4f7; }
    .staff-table td { padding: 8px 12px; border-bottom: 1px solid #e8e8e8; }

    /* Annual reports list */
    .report-list { list-style: none; padding: 0; margin-top: 10px; }
    .report-list li { border-bottom: 1px dashed #ccc; }
    .report-list li:last-child { border-bottom: none; }
    .report-list li a {
        display: flex; align-items: center; gap: 10px;
        padding: 10px 4px; font-size: 13px; color: #1a6fa8;
        text-decoration: none; font-weight: 600;
    }
    .report-list li a::before { content: '📊 '; }
    .report-list li a:hover { text-decoration: underline; }
    .report-list li .yr { font-size: 12px; color: #888; font-weight: 400; margin-left: auto; }

    /* ===== SIDEBAR ===== */
    .sidebar { width: 270px; flex-shrink: 0; }

    .sidebar-box { border: 1px solid #ddd; margin-bottom: 20px; }

    .sidebar-box-header {
        background-color: #1a6fa8;
        color: #fff;
        text-align: center;
        padding: 10px 15px;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 0.5px;
        text-transform: uppercase;
    }

    .sidebar-links { list-style: none; padding: 0; margin: 0; }
    .sidebar-links li { border-bottom: 1px dashed #ccc; }
    .sidebar-links li:last-child { border-bottom: none; }
    .sidebar-links li a {
        display: block; padding: 9px 12px;
        color: #1a6fa8; text-decoration: none;
        font-size: 13px; cursor: pointer;
    }
    .sidebar-links li a::before { content: '▶ '; font-size: 10px; }
    .sidebar-links li a:hover,
    .sidebar-links li a.active { background-color: #f0f7ff; font-weight: 600; }

    /* ── Scrolling News ── */
    .news-scroll-wrap {
        height: 300px;
        overflow: hidden;
        position: relative;
        background: #fff;
    }
    .news-scroll-wrap::after {
        content: '';
        position: absolute;
        bottom: 0; left: 0; right: 0;
        height: 45px;
        background: linear-gradient(transparent, #fff);
        pointer-events: none;
        z-index: 2;
    }
    .news-scroll-inner {
        animation: scholarshipNewsScroll 22s linear infinite;
    }
    .news-scroll-inner:hover {
        animation-play-state: paused;
    }
    @keyframes scholarshipNewsScroll {
        0%   { transform: translateY(0); }
        100% { transform: translateY(-50%); }
    }

    .news-item { padding: 9px 12px; border-bottom: 1px dashed #ccc; }
    .news-item:last-child { border-bottom: none; }
    .news-item a { display: block; color: #1a6fa8; text-decoration: none; font-size: 12.5px; line-height: 1.5; }
    .news-item a::before { content: '▶ '; font-size: 10px; }
    .news-item a:hover { text-decoration: underline; }
    .news-item .badge-new {
        display: inline-block; background: orange; color: #fff;
        font-size: 10px; font-weight: bold; padding: 1px 5px;
        border-radius: 2px; margin-left: 4px; vertical-align: middle;
    }
    .news-item .news-date { font-size: 11px; color: #888; margin-top: 3px; display: block; }

    @media(max-width:768px) {
        .page-wrapper { flex-direction: column; }
        .sidebar { width: 100%; }
    }
</style>

<div class="page-wrapper">

    <!-- ===== MAIN CONTENT ===== -->
    <div class="main-content">
        <h2>Financial Aid and Scholarships (Government Postgraduate College Mansehra)</h2>

        {{-- INTRODUCTION --}}
        <div id="tab-introduction" class="tab-section active">
            <p class="section-heading">Introduction</p>
            <p class="content-text">Driven by the College motto "Restoring Hope; Building Community", the office of Student Financial Aid aims to strengthen our society by promoting education, learning, and research. This is possible to achieve only, if we take along meritorious students irrespective of their social and financial constraints.</p>
            <p class="content-text">The level of support through scholarships and financial assistance programs is unparalleled compared to institutions of the province. Our office is committed to providing equal opportunities to deserving students through various need-based and merit-based scholarship programs.</p>
            <p class="content-text">We believe that no deserving student should be denied quality education due to financial constraints. Our financial aid programs are designed to support students throughout their academic journey, ensuring they can focus on their studies without financial worries.</p>
        </div>

        {{-- OUR DONORS --}}
        <div id="tab-donors" class="tab-section">
            <p class="section-heading">Our Donors</p>
            <p class="content-text">We are grateful to our generous donors whose contributions make our scholarship programs possible. Their support helps transform the lives of deserving students and contributes to building a better future for our community.</p>
            <ul class="content-list">
                <li>Higher Education Commission (HEC) — Need-Based Scholarship</li>
                <li>Government of Khyber Pakhtunkhwa — Chief Minister's Scholarship</li>
                <li>National Bank of Pakistan — NBP Student Loan Program</li>
                <li>Alumni Association — Alumni Merit Scholarship</li>
                <li>Corporate Partners — Industry Sponsored Scholarships</li>
                <li>International Donors — Global Education Fund</li>
            </ul>
        </div>

        {{-- OUR STAFF --}}
        <div id="tab-staff" class="tab-section">
            <p class="section-heading">Our Staff</p>
            <p class="content-text">The Office of Student Financial Aid is managed by a dedicated team of professionals committed to helping students navigate the financial aid process and access available resources.</p>
            <table class="staff-table">
                <thead>
                    <tr><th>Name</th><th>Designation</th><th>Phone</th><th>Email</th></tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Dr. Muhammad Aslam</td>
                        <td>Director Financial Aid</td>
                        <td>+92-997-123456</td>
                        <td>financialaid@gpgcm.edu.pk</td>
                    </tr>
                    <tr>
                        <td>Mr. Shahid Riaz</td>
                        <td>Assistant Director</td>
                        <td>+92-997-123457</td>
                        <td>shahid.riaz@gpgcm.edu.pk</td>
                    </tr>
                    <tr>
                        <td>Ms. Ayesha Khan</td>
                        <td>Scholarship Officer</td>
                        <td>+92-997-123458</td>
                        <td>ayesha.khan@gpgcm.edu.pk</td>
                    </tr>
                    <tr>
                        <td>Mr. Imran Ali</td>
                        <td>Data Coordinator</td>
                        <td>+92-997-123459</td>
                        <td>imran.ali@gpgcm.edu.pk</td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- ANNUAL REPORTS --}}
        <div id="tab-reports" class="tab-section">
            <p class="section-heading">Annual Reports</p>
            <p class="content-text">Our annual reports provide detailed information about scholarship disbursements, student beneficiaries, and the impact of our financial aid programs.</p>
            <ul class="report-list">
                <li><a href="#">Annual Report 2024 <span class="yr">Jan – Dec 2024</span></a></li>
                <li><a href="#">Annual Report 2023 <span class="yr">Jan – Dec 2023</span></a></li>
                <li><a href="#">Annual Report 2022 <span class="yr">Jan – Dec 2022</span></a></li>
                <li><a href="#">Annual Report 2021 <span class="yr">Jan – Dec 2021</span></a></li>
            </ul>
        </div>

    </div>{{-- end main-content --}}

    <!-- ===== SIDEBAR ===== -->
    <div class="sidebar">

        {{-- Important Links --}}
        <div class="sidebar-box">
            <div class="sidebar-box-header">IMPORTANT LINKS (SCHOLARSHIPS)</div>
            <ul class="sidebar-links">
                <li><a href="#" data-tab="introduction" class="active">Introduction</a></li>
                <li><a href="#" data-tab="donors">Our Donors</a></li>
                <li><a href="#" data-tab="staff">Our Staff</a></li>
                <li><a href="#" data-tab="reports">Annual Reports</a></li>
            </ul>
        </div>

        {{-- News & Events — SCROLLING --}}
        <div class="sidebar-box">
            <div class="sidebar-box-header">NEWS &amp; EVENTS (SCHOLARSHIPS)</div>
            <div class="news-scroll-wrap">
                <div class="news-scroll-inner">

                    {{-- ── Original set ── --}}
                    <div class="news-item">
                        <a href="#">HEC Need-Based Scholarship 2026 applications are now open. <span class="badge-new">New</span></a>
                        <span class="news-date">05 Feb 2026</span>
                    </div>
                    <div class="news-item">
                        <a href="#">GPM Achieves Major Digital Milestone with NBP Digital Payment Portal <span class="badge-new">New</span></a>
                        <span class="news-date">02 Feb 2026</span>
                    </div>
                    <div class="news-item">
                        <a href="#">One-Day Training on Program Review for Effectiveness and Enhancement (PREE) <span class="badge-new">New</span></a>
                        <span class="news-date">02 Feb 2026</span>
                    </div>
                    <div class="news-item">
                        <a href="#">Chief Minister's Merit Scholarship deadline extended to February 28.</a>
                        <span class="news-date">30 Jan 2026</span>
                    </div>
                    <div class="news-item">
                        <a href="#">Alumni Scholarship for deserving students announced for Spring 2026.</a>
                        <span class="news-date">28 Jan 2026</span>
                    </div>
                    <div class="news-item">
                        <a href="#">Financial aid forms for Spring 2026 semester now available.</a>
                        <span class="news-date">20 Jan 2026</span>
                    </div>
                    <div class="news-item">
                        <a href="#">NBP Student Loan Scheme information session scheduled.</a>
                        <span class="news-date">10 Jan 2026</span>
                    </div>
                    <div class="news-item">
                        <a href="#">Merit-based scholarship list for Fall 2025 announced.</a>
                        <span class="news-date">28 Dec 2025</span>
                    </div>

                    {{-- ── Duplicate set for seamless loop ── --}}
                    <div class="news-item">
                        <a href="#">HEC Need-Based Scholarship 2026 applications are now open. <span class="badge-new">New</span></a>
                        <span class="news-date">05 Feb 2026</span>
                    </div>
                    <div class="news-item">
                        <a href="#">GPM Achieves Major Digital Milestone with NBP Digital Payment Portal <span class="badge-new">New</span></a>
                        <span class="news-date">02 Feb 2026</span>
                    </div>
                    <div class="news-item">
                        <a href="#">One-Day Training on Program Review for Effectiveness and Enhancement (PREE) <span class="badge-new">New</span></a>
                        <span class="news-date">02 Feb 2026</span>
                    </div>
                    <div class="news-item">
                        <a href="#">Chief Minister's Merit Scholarship deadline extended to February 28.</a>
                        <span class="news-date">30 Jan 2026</span>
                    </div>
                    <div class="news-item">
                        <a href="#">Alumni Scholarship for deserving students announced for Spring 2026.</a>
                        <span class="news-date">28 Jan 2026</span>
                    </div>
                    <div class="news-item">
                        <a href="#">Financial aid forms for Spring 2026 semester now available.</a>
                        <span class="news-date">20 Jan 2026</span>
                    </div>
                    <div class="news-item">
                        <a href="#">NBP Student Loan Scheme information session scheduled.</a>
                        <span class="news-date">10 Jan 2026</span>
                    </div>
                    <div class="news-item">
                        <a href="#">Merit-based scholarship list for Fall 2025 announced.</a>
                        <span class="news-date">28 Dec 2025</span>
                    </div>

                </div>{{-- end scroll-inner --}}
            </div>{{-- end scroll-wrap --}}
        </div>{{-- end sidebar-box --}}

    </div>{{-- end sidebar --}}

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const tabLinks = document.querySelectorAll('.sidebar-links a[data-tab]');
    tabLinks.forEach(function (link) {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            const tabId = this.getAttribute('data-tab');
            document.querySelectorAll('.tab-section').forEach(function (s) { s.classList.remove('active'); });
            const target = document.getElementById('tab-' + tabId);
            if (target) target.classList.add('active');
            tabLinks.forEach(function (l) { l.classList.remove('active'); });
            this.classList.add('active');
        });
    });
});
</script>

@endsection
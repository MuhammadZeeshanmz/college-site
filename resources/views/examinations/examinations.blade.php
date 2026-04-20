@extends('layouts.app')

@section('title', 'Examinations - Government Postgraduate College Mansehra')

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

    /* Fee table */
    .fee-table { width: 100%; border-collapse: collapse; margin-top: 10px; font-size: 13px; }
    .fee-table thead tr { background: #1a6fa8; color: #fff; }
    .fee-table th { padding: 9px 12px; text-align: left; font-weight: 600; }
    .fee-table tbody tr:nth-child(even) { background: #f5f9ff; }
    .fee-table tbody tr:hover { background: #e8f4f7; }
    .fee-table td { padding: 8px 12px; border-bottom: 1px solid #e8e8e8; }
    .fee-table tfoot td { font-size: 11.5px; color: #888; padding: 8px 12px; }

    /* Downloads list */
    .dl-list { list-style: none; padding: 0; margin-top: 10px; }
    .dl-list li { border-bottom: 1px dashed #ccc; }
    .dl-list li:last-child { border-bottom: none; }
    .dl-list li a { display: block; padding: 9px 4px; font-size: 13px; color: #1a6fa8; text-decoration: none; }
    .dl-list li a::before { content: '📄 '; }
    .dl-list li a:hover { text-decoration: underline; }

    /* Contact table */
    .contact-tbl { width: 100%; border-collapse: collapse; font-size: 13.5px; margin-top: 10px; }
    .contact-tbl td { padding: 9px 12px; border-bottom: 1px dashed #ccc; vertical-align: top; }
    .contact-tbl td:first-child { width: 180px; font-weight: 700; color: #1a6fa8; }
    .contact-tbl tr:last-child td { border-bottom: none; }

    /* Numbered rules */
    .rules-ol { list-style: none; padding: 0; margin-top: 10px; counter-reset: rc; }
    .rules-ol li {
        counter-increment: rc;
        display: flex; gap: 12px; align-items: flex-start;
        padding: 9px 0; border-bottom: 1px dashed #ccc;
        font-size: 13.5px; color: #333; line-height: 1.65;
    }
    .rules-ol li:last-child { border-bottom: none; }
    .rules-ol li::before {
        content: counter(rc);
        min-width: 26px; height: 26px;
        background: #1a6fa8; color: #fff; border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-size: 11px; font-weight: 700; flex-shrink: 0; margin-top: 1px;
    }

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
        animation: examsNewsScroll 22s linear infinite;
    }
    .news-scroll-inner:hover {
        animation-play-state: paused;
    }
    @keyframes examsNewsScroll {
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
        <h2>Examinations (Government Postgraduate College Mansehra)</h2>

        {{-- INTRODUCTION --}}
        <div id="tab-introduction" class="tab-section active">
            <p class="section-heading">Introduction</p>
            <p class="content-text">Government Postgraduate College Mansehra is providing an arena of education to local, national and international students. The Examination Section is responsible to monitor and supervise semester as well as annual system examinations of various disciplines on campus, in affiliated colleges as well as private candidates every year.</p>
            <p class="content-text">As educational systems are becoming more complex so the examinations have become very important to play the role of evaluation in one's academic life. Equality and transparency has become the most demanding components of every examination system universally. Therefore, the Examination Section believes in the principles of fairness, impartiality, transparency and a belief in flexibility without compromising the quality.</p>
            <p class="content-text">The office of the Controller of Examinations is an integral component of the College administration. The Controller of Examinations is responsible for all matters related to conduct of Examinations, Secrecy, Transcripts, and Degrees issuance as well as the verification process.</p>
            <p class="content-text">Examination Section has the following subsections:</p>
            <ul class="content-list">
                <li>General Dealing</li>
                <li>Conduct Section</li>
                <li>Secrecy Section</li>
                <li>Result Section</li>
                <li>Transcript &amp; Degree Section</li>
                <li>Verification Section</li>
            </ul>
        </div>

        {{-- VISION & MISSION --}}
        <div id="tab-vision-mission" class="tab-section">
            <p class="section-heading">Vision &amp; Mission</p>
            <p class="content-text"><strong>Vision:</strong> To establish a transparent, fair and technology-driven examination system that upholds academic integrity and fosters student success at Government Postgraduate College Mansehra and its affiliated institutions.</p>
            <p class="content-text"><strong>Mission:</strong> To conduct examinations with impartiality and efficiency, ensuring timely result declaration, maintaining secrecy, and providing students with fair evaluation while continuously improving examination standards.</p>
        </div>

        {{-- FEE SCHEDULE --}}
        <div id="tab-fee-schedule" class="tab-section">
            <p class="section-heading">Fee Schedule</p>
            <table class="fee-table">
                <thead>
                    <tr><th>#</th><th>Fee Description</th><th>Amount (PKR)</th><th>Remarks</th></tr>
                </thead>
                <tbody>
                    <tr><td>1</td><td>Examination Form Fee (Regular)</td><td>500</td><td>Per Semester</td></tr>
                    <tr><td>2</td><td>Examination Form Fee (Private)</td><td>1,000</td><td>Per Semester</td></tr>
                    <tr><td>3</td><td>Rechecking / Re-evaluation Fee</td><td>500</td><td>Per Paper</td></tr>
                    <tr><td>4</td><td>Transcript Fee (Regular)</td><td>500</td><td>Per Copy</td></tr>
                    <tr><td>5</td><td>Transcript Fee (Urgent)</td><td>1,000</td><td>Per Copy</td></tr>
                    <tr><td>6</td><td>Degree Issuance Fee</td><td>2,000</td><td>One Time</td></tr>
                    <tr><td>7</td><td>Duplicate Degree Fee</td><td>3,000</td><td>Per Issuance</td></tr>
                    <tr><td>8</td><td>Verification Fee (Local)</td><td>500</td><td>Per Request</td></tr>
                    <tr><td>9</td><td>Verification Fee (International)</td><td>3,000</td><td>Per Request</td></tr>
                    <tr><td>10</td><td>DMC (Detailed Marks Certificate)</td><td>300</td><td>Per Copy</td></tr>
                    <tr><td>11</td><td>Migration Certificate</td><td>1,000</td><td>Per Certificate</td></tr>
                    <tr><td>12</td><td>Late Form Submission Fine</td><td>1,000</td><td>Per Day</td></tr>
                </tbody>
                <tfoot>
                    <tr><td colspan="4">* Fee payable via Bank Challan at HBL/NBP. Subject to revision.</td></tr>
                </tfoot>
            </table>
        </div>

        {{-- DOWNLOADS --}}
        <div id="tab-downloads" class="tab-section">
            <p class="section-heading">Downloads</p>
            <ul class="dl-list">
                <li><a href="#">Examination Form (Regular)</a></li>
                <li><a href="#">Examination Form (Private)</a></li>
                <li><a href="#">Rechecking Application Form</a></li>
                <li><a href="#">Transcript Request Form</a></li>
                <li><a href="#">Degree Verification Form</a></li>
                <li><a href="#">Semester Rules &amp; Regulations</a></li>
                <li><a href="#">Examination Date Sheet</a></li>
                <li><a href="#">Roll Number Slip (Online Portal)</a></li>
            </ul>
        </div>

        {{-- CONTACT US --}}
        <div id="tab-contact-us" class="tab-section">
            <p class="section-heading">Contact Us</p>
            <table class="contact-tbl">
                <tr><td>Controller of Examinations</td><td>Government Postgraduate College Mansehra</td></tr>
                <tr><td>Phone</td><td>+92-997-123456</td></tr>
                <tr><td>Fax</td><td>+92-997-123457</td></tr>
                <tr><td>Email</td><td>exams@gpgcm.edu.pk</td></tr>
                <tr><td>Office Hours</td><td>Monday – Friday: 8:00 AM – 4:00 PM</td></tr>
                <tr><td>Address</td><td>University Road, Mansehra, Khyber Pakhtunkhwa, Pakistan</td></tr>
            </table>
        </div>

        {{-- SEMESTER RULES --}}
        <div id="tab-semester-rules" class="tab-section">
            <p class="section-heading">Semester Rules</p>
            <ol class="rules-ol">
                <li>A student must have minimum 75% attendance in each subject to be eligible to appear in the examination.</li>
                <li>Students with less than 75% attendance may be allowed on medical grounds with proper documentation verified by the Medical Officer.</li>
                <li>A student failing in more than two subjects in a semester will be placed on academic probation.</li>
                <li>Examination forms must be submitted within the prescribed time. Late forms will be accepted with a fine as per the fee schedule.</li>
                <li>Students must carry their original college ID card to the examination hall. No ID card means no entry.</li>
                <li>Use of mobile phones and electronic devices is strictly prohibited in examination halls.</li>
                <li>A student found using unfair means will be expelled from the examination and may face disciplinary action.</li>
                <li>Results once declared can be rechecked within 30 days of result announcement on prescribed form with requisite fee.</li>
                <li>A student may repeat a course for grade improvement but only once per course and within the prescribed time limit.</li>
                <li>Degrees will be issued only after clearance of all dues and no-objection from all relevant departments.</li>
                <li>Transcript requests submitted before the declaration of final result will not be entertained.</li>
                <li>The Controller of Examinations reserves the right to cancel or postpone any examination in special circumstances.</li>
            </ol>
        </div>

    </div>{{-- end main-content --}}

    <!-- ===== SIDEBAR ===== -->
    <div class="sidebar">

        {{-- Important Links --}}
        <div class="sidebar-box">
            <div class="sidebar-box-header">IMPORTANT LINKS (EXAMINATIONS)</div>
            <ul class="sidebar-links">
                <li><a href="#" data-tab="introduction" class="active">Introduction</a></li>
                <li><a href="" data-tab="vision-mission">Vision &amp; Mission</a></li>
                <li><a href="#" data-tab="fee-schedule">Fee Schedule</a></li>
                <li><a href="#" data-tab="downloads">Downloads</a></li>
                <li><a href="#" data-tab="contact-us">Contact Us</a></li>
                <li><a href="#" data-tab="semester-rules">Semester Rules</a></li>
            </ul>
        </div>

        {{-- News & Events — SCROLLING --}}
        <div class="sidebar-box">
            <div class="sidebar-box-header">NEWS &amp; EVENTS (EXAMINATIONS)</div>
            <div class="news-scroll-wrap">
                <div class="news-scroll-inner">

                    {{-- ── Original set ── --}}
                    <div class="news-item">
                        <a href="#">Registrar Office: College Resumes On-Campus Classes from April 6 <span class="badge-new">New</span></a>
                        <span class="news-date">01 Apr 2026</span>
                    </div>
                    <div class="news-item">
                        <a href="#">Date Sheet for Mid-Term Examinations Spring 2025 uploaded. <span class="badge-new">New</span></a>
                        <span class="news-date">15 Apr 2025</span>
                    </div>
                    <div class="news-item">
                        <a href="#">Rechecking result of Fall 2024 Annual Examination declared. <span class="badge-new">New</span></a>
                        <span class="news-date">10 Apr 2025</span>
                    </div>
                    <div class="news-item">
                        <a href="#">Degree distribution ceremony scheduled for April 20, 2025.</a>
                        <span class="news-date">01 Apr 2025</span>
                    </div>
                    <div class="news-item">
                        <a href="#">Examination forms for Spring 2025 are now available.</a>
                        <span class="news-date">25 Mar 2025</span>
                    </div>
                    <div class="news-item">
                        <a href="#">Result of BSc (Hons) Fall 2024 declared. Check portal.</a>
                        <span class="news-date">15 Mar 2025</span>
                    </div>
                    <div class="news-item">
                        <a href="#">Notice: Mandatory attendance clearance before exam form submission.</a>
                        <span class="news-date">01 Mar 2025</span>
                    </div>
                    <div class="news-item">
                        <a href="#">Schedule For Submission Of Semester Examination Fee Spring 2026.</a>
                        <span class="news-date">30 Jan 2025</span>
                    </div>

                    {{-- ── Duplicate set for seamless loop ── --}}
                    <div class="news-item">
                        <a href="#">Registrar Office: College Resumes On-Campus Classes from April 6 <span class="badge-new">New</span></a>
                        <span class="news-date">01 Apr 2026</span>
                    </div>
                    <div class="news-item">
                        <a href="#">Date Sheet for Mid-Term Examinations Spring 2025 uploaded. <span class="badge-new">New</span></a>
                        <span class="news-date">15 Apr 2025</span>
                    </div>
                    <div class="news-item">
                        <a href="#">Rechecking result of Fall 2024 Annual Examination declared. <span class="badge-new">New</span></a>
                        <span class="news-date">10 Apr 2025</span>
                    </div>
                    <div class="news-item">
                        <a href="#">Degree distribution ceremony scheduled for April 20, 2025.</a>
                        <span class="news-date">01 Apr 2025</span>
                    </div>
                    <div class="news-item">
                        <a href="#">Examination forms for Spring 2025 are now available.</a>
                        <span class="news-date">25 Mar 2025</span>
                    </div>
                    <div class="news-item">
                        <a href="#">Result of BSc (Hons) Fall 2024 declared. Check portal.</a>
                        <span class="news-date">15 Mar 2025</span>
                    </div>
                    <div class="news-item">
                        <a href="#">Notice: Mandatory attendance clearance before exam form submission.</a>
                        <span class="news-date">01 Mar 2025</span>
                    </div>
                    <div class="news-item">
                        <a href="#">Schedule For Submission Of Semester Examination Fee Spring 2026.</a>
                        <span class="news-date">30 Jan 2025</span>
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
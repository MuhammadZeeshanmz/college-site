@extends('layouts.app')

@section('title', 'Quality Enhancement Cell - University of Haripur')

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
    .main-content {
        flex: 1;
        min-width: 0;
    }

    .main-content h2 {
        font-size: 22px;
        color: #1a6fa8;
        font-weight: 700;
        margin-bottom: 5px;
    }

    /* All tab sections hidden by default */
    .tab-section { display: none; }
    .tab-section.active { display: block; }

    /* Section heading inside content */
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

    /* Director info block */
    .director-info {
        margin-top: 20px;
        font-size: 14px;
        line-height: 1.8;
        color: #333;
    }
    .director-info strong { display: block; }

    /* ===== SIDEBAR ===== */
    .sidebar {
        width: 270px;
        flex-shrink: 0;
    }

    .sidebar-box {
        border: 1px solid #ddd;
        margin-bottom: 20px;
    }

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

    .sidebar-links {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .sidebar-links li {
        border-bottom: 1px dashed #ccc;
    }

    .sidebar-links li:last-child {
        border-bottom: none;
    }

    .sidebar-links li a {
        display: block;
        padding: 9px 12px;
        color: #1a6fa8;
        text-decoration: none;
        font-size: 13px;
        cursor: pointer;
    }

    .sidebar-links li a::before {
        content: '▶ ';
        font-size: 10px;
        color: #1a6fa8;
    }

    .sidebar-links li a:hover,
    .sidebar-links li a.active {
        background-color: #f0f7ff;
        font-weight: 600;
    }

    /* ===== NEWS & EVENTS BOX ===== */
    .news-box-body {
        padding: 0;
    }

    .news-item {
        padding: 9px 12px;
        border-bottom: 1px dashed #ccc;
    }

    .news-item:last-child {
        border-bottom: none;
    }

    .news-item a {
        display: block;
        color: #1a6fa8;
        text-decoration: none;
        font-size: 12.5px;
        line-height: 1.5;
    }

    .news-item a::before {
        content: '▶ ';
        font-size: 10px;
    }

    .news-item a:hover { text-decoration: underline; }

    .news-item .news-date {
        font-size: 11px;
        color: #888;
        margin-top: 3px;
        display: block;
    }

    /* Downloads table */
    .downloads-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }
    .downloads-table tr td {
        padding: 8px 10px;
        border: 1px solid #ddd;
        font-size: 13px;
        vertical-align: middle;
    }
    .downloads-table tr:nth-child(even) { background: #fafafa; }
    .downloads-table tr:hover { background: #f0f7ff; }
    .downloads-table .dl-link a {
        color: #1a6fa8;
        text-decoration: none;
        font-size: 13px;
    }
    .downloads-table .dl-link a:hover { text-decoration: underline; }
    .downloads-table .pdf-icon { width: 28px; text-align: center; color: #c0392b; }

    /* Staff table */
    .staff-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }
    .staff-table th {
        background: #1a6fa8;
        color: #fff;
        padding: 9px 12px;
        font-size: 13px;
        text-align: left;
    }
    .staff-table td {
        padding: 8px 12px;
        border: 1px solid #ddd;
        font-size: 13px;
    }
    .staff-table tr:nth-child(even) { background: #fafafa; }
    .staff-table tr:hover { background: #f0f7ff; }

    /* Plan list */
    .plan-list {
        list-style: none;
        padding: 0;
        margin-top: 10px;
    }
    .plan-list li {
        padding: 8px 0;
        border-bottom: 1px dashed #ccc;
        font-size: 13px;
    }
    .plan-list li:last-child { border-bottom: none; }
    .plan-list li a {
        color: #1a6fa8;
        text-decoration: none;
    }
    .plan-list li a::before { content: '▶ '; font-size: 10px; }
    .plan-list li a:hover { text-decoration: underline; }

    /* Archives list */
    .archives-list {
        list-style: none;
        padding: 0;
        margin-top: 10px;
    }
    .archives-list li {
        padding: 8px 0;
        border-bottom: 1px dashed #ccc;
        font-size: 13px;
    }
    .archives-list li:last-child { border-bottom: none; }
    .archives-list li a {
        color: #1a6fa8;
        text-decoration: none;
    }
    .archives-list li a::before { content: '▶ '; font-size: 10px; }
    .archives-list li a:hover { text-decoration: underline; }
</style>

<div class="page-wrapper">

    <!-- ===== MAIN CONTENT ===== -->
    <div class="main-content">

        <h2>Quality Enhancement Cell (QEC)</h2>

        {{-- === INTRODUCTION === --}}
        <div id="tab-introduction" class="tab-section active">
            <p class="section-heading">Introduction</p>
            <p class="content-text">Quality Enhancement Cell at University of Haripur has been established on December 04, 2012 under the direction of HEC. The prime objective of the cell is to practice evaluative measures to achieve excellence in performance in all areas of quality education.</p>
            <p class="content-text">Quality Enhancement Cell has developed and implemented Internal Quality Assurance (IQA) process specified by Higher education Commission. It is comprised of Self Assessment reports prepared by various departments of university. Other exercises like teachers evaluation along with the Student course evaluation has been carried out to meet Quality practices within the institution.</p>
            <p class="content-text">External Quality Assurance (EQA) has also been successfully carried out like initiation of Accreditation process of various programs along with the implementation of QA practices in affiliated colleges. These practices help institution to realize its mission and to achieve its goal.</p>
        </div>

        {{-- === SECTION HEAD MESSAGE === --}}
        <div id="tab-message" class="tab-section">
            <p class="section-heading">Section Head Message</p>
            <p class="content-text">University is considered to be a living entity and Quality Assurance as its soul. The University of Haripur while pursuing its vision and mission is committed to continuous quality improvement at all levels of teaching and research. Quality Enhancement Cell (QEC) which is called Institutional Quality Assurance and Enhancement (IQAE), is currently focused on revising the Quality Assurance Policy, Plagiarism Policy and refining quality parameters to enhance program performance and institutional outcomes. As part of this process, the HEC new quality framework, Pakistan Precepts, Standards and Guidelines for Quality Assurance in Higher Education (PSG-2023) are being effectively implemented to align academic programs with measurable learning outcomes and global standards.</p>
            <p class="content-text">In addition to internal improvements, the QEC team is actively involved in providing training to faculty and staff to enhance teaching and administrative capabilities. Serving as an external reviewer for other universities, I also have the privilege of sharing expertise and learning from best practices across institutions. Commitment to quality is further reflected in the pursuit of national accreditation, ensuring programs meet established benchmarks.</p>
            <p class="content-text">Efforts are underway to achieve Times Higher Education, UI Green Metric and QS Ranking, as the University of Haripur already applied for these prestigious ranking to position itself on the global stage and reinforce its reputation for excellence. There is QEC Focal Person in each academic Department at the main campus and one at each affiliated college. Together with my dedicated team, we are persistently implementing the HEC Quality Assurance Policy and governance framework. Through these initiatives, the goal is to continuously elevate standards and foster a culture of growth and innovation. All stakeholders including faculty, staff, students, community, employer and alumni are encouraged to contribute to this journey of excellence.</p>

            <div class="director-info">
                <strong>Dr. Shah Masud Khan</strong>
                <strong>Director QEC</strong>
                Phone No: +92-995-920637<br>
                Email: director.qec@uoh.edu.pk<br>
                The University of Haripur
            </div>
        </div>

        {{-- === DOWNLOADS === --}}
        <div id="tab-downloads" class="tab-section">
            <p class="section-heading">Downloads</p>
            <table class="downloads-table">
                <tbody>
                    <tr>
                        <td class="pdf-icon">&#128196;</td>
                        <td>QEC Policy Document</td>
                        <td class="dl-link"><a href="#">Download Here</a></td>
                    </tr>
                    <tr>
                        <td class="pdf-icon">&#128196;</td>
                        <td>Self-Assessment Manual</td>
                        <td class="dl-link"><a href="#">Download Here</a></td>
                    </tr>
                    <tr>
                        <td class="pdf-icon">&#128196;</td>
                        <td>Course Evaluation Form</td>
                        <td class="dl-link"><a href="#">Download Here</a></td>
                    </tr>
                    <tr>
                        <td class="pdf-icon">&#128196;</td>
                        <td>Teacher Evaluation Proforma</td>
                        <td class="dl-link"><a href="#">Download Here</a></td>
                    </tr>
                    <tr>
                        <td class="pdf-icon">&#128196;</td>
                        <td>QEC Annual Report 2024</td>
                        <td class="dl-link"><a href="#">Download Here</a></td>
                    </tr>
                    <tr>
                        <td class="pdf-icon">&#128196;</td>
                        <td>Quality Assurance Manual</td>
                        <td class="dl-link"><a href="#">Download Here</a></td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- === STAFF DIRECTORY === --}}
        <div id="tab-staff" class="tab-section">
            <p class="section-heading">Staff Directory</p>
            <table class="staff-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Phone</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Dr. Shah Masud Khan</td>
                        <td>Director QEC</td>
                        <td>+92-995-920637</td>
                        <td>director.qec@uoh.edu.pk</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Dr. Saima Batool</td>
                        <td>Deputy Director</td>
                        <td>+92-995-617875</td>
                        <td>saima.batool@uoh.edu.pk</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Mr. Usman Khalid</td>
                        <td>Assistant Director</td>
                        <td>+92-995-617876</td>
                        <td>usman.khalid@uoh.edu.pk</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Ms. Fatima Zafar</td>
                        <td>Quality Assurance Officer</td>
                        <td>+92-995-617877</td>
                        <td>fatima.zafar@uoh.edu.pk</td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- === IMPLEMENTATION PLAN 2024-25 === --}}
        <div id="tab-implementation-2024" class="tab-section">
            <p class="section-heading">QEC - Implementation Plan 2024-25</p>
            <p class="content-text">The QEC Implementation Plan for 2024-25 outlines the strategic initiatives and quality enhancement activities planned for the academic year.</p>
            <ul class="plan-list">
                <li><a href="#">QEC Implementation Plan 2024-25 - Full Document</a></li>
                <li><a href="#">Quarterly Progress Report - Q1 2024-25</a></li>
                <li><a href="#">Action Plan - Self Assessment Program</a></li>
                <li><a href="#">Affiliated Colleges QA Plan</a></li>
            </ul>
        </div>

        {{-- === ACTIVITY PLAN 2024-25 === --}}
        <div id="tab-activity-plan" class="tab-section">
            <p class="section-heading">UOH QEC Activity Plan (2024-25)</p>
            <p class="content-text">The Activity Plan details the schedule of workshops, seminars, training sessions, and evaluation activities for the academic year.</p>
            <ul class="plan-list">
                <li><a href="#">QEC Activity Calendar 2024-25</a></li>
                <li><a href="#">Faculty Development Workshop Schedule</a></li>
                <li><a href="#">Program Self-Assessment Timeline</a></li>
                <li><a href="#">Annual Quality Awards Plan</a></li>
            </ul>
        </div>

        {{-- === QA POLICY === --}}
        <div id="tab-qa-policy" class="tab-section">
            <p class="section-heading">UOH Draft QA Policy Jan-2025</p>
            <p class="content-text">The draft Quality Assurance Policy for the University of Haripur, updated January 2025, provides comprehensive guidelines for maintaining and enhancing quality across all university functions.</p>
            <ul class="plan-list">
                <li><a href="#">Draft QA Policy - January 2025</a></li>
                <li><a href="#">Feedback Form for QA Policy</a></li>
                <li><a href="#">Previous Version - QA Policy 2023</a></li>
            </ul>
        </div>

        {{-- === IMPLEMENTATION PLAN 2023-24 === --}}
        <div id="tab-implementation-2023" class="tab-section">
            <p class="section-heading">QEC - Implementation Plan 2023-24</p>
            <p class="content-text">The Implementation Plan for 2023-24 documents the completed activities and achievements from the previous academic year.</p>
            <ul class="plan-list">
                <li><a href="#">QEC Implementation Plan 2023-24 - Full Document</a></li>
                <li><a href="#">Year-end Progress Report 2023-24</a></li>
                <li><a href="#">Achievements &amp; Milestones</a></li>
            </ul>
        </div>

        {{-- === COMPLIANCE REPORT === --}}
        <div id="tab-compliance-report" class="tab-section">
            <p class="section-heading">Compliance Report of Implementation Plans 2023-24</p>
            <p class="content-text">The Compliance Report provides a detailed analysis of the implementation status of the 2023-24 QEC plans and identifies areas for improvement.</p>
            <ul class="plan-list">
                <li><a href="#">Compliance Report 2023-24</a></li>
                <li><a href="#">Key Performance Indicators - Compliance Status</a></li>
                <li><a href="#">Recommendations &amp; Way Forward</a></li>
            </ul>
        </div>

    </div>{{-- end main-content --}}

    <!-- ===== SIDEBAR ===== -->
    <div class="sidebar">

        <!-- Important Links (QEC) -->
        <div class="sidebar-box">
            <div class="sidebar-box-header">IMPORTANT LINKS (QEC)</div>
            <ul class="sidebar-links">
                <li><a href="#" data-tab="introduction" class="active">Introduction</a></li>
                <li><a href="#" data-tab="message">Section Head Message</a></li>
                <li><a href="#" data-tab="downloads">Downloads</a></li>
                <li><a href="#" data-tab="staff">Staff Directory</a></li>
                <li><a href="#" data-tab="implementation-2024">QEC - Implementation Plan 2024-25</a></li>
                <li><a href="#" data-tab="activity-plan">UOH QEC Activity Plan (2024-25)</a></li>
                <li><a href="#" data-tab="qa-policy">UOH Draft QA Policy Jan-2025</a></li>
                <li><a href="#" data-tab="implementation-2023">QEC - Implementation Plan 2023-24</a></li>
                <li><a href="#" data-tab="compliance-report">Compliance Report of Implementation Plans 2023-24</a></li>
            </ul>
        </div>

        <!-- Archives (QEC) -->
        <div class="sidebar-box">
            <div class="sidebar-box-header">ARCHIVES (QEC)</div>
            <ul class="sidebar-links">
                <li><a href="#">Fourth Phase of HED Training</a></li>
                <li><a href="#">QEC Participation in Seminar</a></li>
                <li><a href="#">QEC Participation in International Conference</a></li>
                <li><a href="#">HEC 15 Years Celebrations</a></li>
                <li><a href="#">Workshop on QAA Practices</a></li>
                <li><a href="#">Progress Review meeting at HEC</a></li>
                <li><a href="#">QEC official visit to HED Peshawar</a></li>
                <li><a href="#">Accreditation Council Members Visit FWM</a></li>
                <li><a href="#">Accreditation Council Members Visit</a></li>
                <li><a href="#">Assessment Team Visit Psychology</a></li>
                <li><a href="#">IRS SAR Status Meeting</a></li>
                <li><a href="#">Assessment Team Visit Microbiology</a></li>
                <li><a href="#">Self Assessment Workshop</a></li>
                <li><a href="#">Accreditation of Agriculture</a></li>
                <li><a href="#">Workshop for Affiliated Colleges</a></li>
                <li><a href="#">Accreditation of IT Department</a></li>
                <li><a href="#">Video Conference Sessions</a></li>
                <li><a href="#">Workshop on Turnitin Software</a></li>
            </ul>
        </div>

        <!-- News & Events (QEC) -->
        <div class="sidebar-box">
            <div class="sidebar-box-header">NEWS &amp; EVENTS (QEC)</div>
            <div class="news-box-body">
                <div class="news-item">
                    <a href="#">QEC, The University of Haripur Conducted Program Review for Effectiveness and Enhancement (PREE) at Government Postgraduate College for Women, Haripur</a>
                    <span class="news-date">16 Oct 2025</span>
                </div>
                <div class="news-item">
                    <a href="#">The University of Haripur has achieved a remarkable milestone by securing a prestigious position in the Times Higher Education (THE) World University Rankings 2026 declared on October 9, 2025</a>
                    <span class="news-date">15 Oct 2025</span>
                </div>
                <div class="news-item">
                    <a href="#">The Director QEC, Dr. Shah Masaud Khan, Participated in HEC's Regional Progress Review Meeting 2025 at IMSciences Peshawar.</a>
                    <span class="news-date">03 Jul 2025</span>
                </div>
                <div class="news-item">
                    <a href="#">The University of Haripur Successfully Conducted Self-GPR 2024-25</a>
                    <span class="news-date">05 Jun 2025</span>
                </div>
                <div class="news-item">
                    <a href="#">The University of Haripur's QEC Team Visited NUST to Enhance Quality Standards</a>
                    <span class="news-date">26 May 2025</span>
                </div>
            </div>
        </div>

    </div>{{-- end sidebar --}}

</div>{{-- end page-wrapper --}}

<script>
document.addEventListener('DOMContentLoaded', function () {
    const tabLinks = document.querySelectorAll('.sidebar-links a[data-tab]');

    tabLinks.forEach(function (link) {
        link.addEventListener('click', function (e) {
            e.preventDefault();

            const tabId = this.getAttribute('data-tab');

            // Hide all tab sections
            document.querySelectorAll('.tab-section').forEach(function (section) {
                section.classList.remove('active');
            });

            // Show selected tab section
            const target = document.getElementById('tab-' + tabId);
            if (target) {
                target.classList.add('active');
            }

            // Remove active from all sidebar links (only those with data-tab)
            tabLinks.forEach(function (l) {
                l.classList.remove('active');
            });

            // Set clicked link as active
            this.classList.add('active');
        });
    });
});
</script>

@endsection
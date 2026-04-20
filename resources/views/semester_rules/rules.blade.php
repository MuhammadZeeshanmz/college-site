@extends('layouts.app')

@section('title', 'Semester Rules - University of Haripur')

@section('content')

<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 14px;
        color: #333;
        background: #fff;
    }

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
        margin-bottom: 15px;
    }

    /* Important Documents Table */
    .docs-table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #ccc;
        margin-bottom: 25px;
    }

    .docs-table thead tr th {
        background-color: #f0f0f0;
        border: 1px solid #ccc;
        padding: 9px 12px;
        font-size: 14px;
        font-weight: 600;
        color: #222;
        text-align: left;
    }

    .docs-table tbody tr td {
        border: 1px solid #ddd;
        padding: 8px 12px;
        vertical-align: middle;
    }

    .docs-table tbody tr:nth-child(even) {
        background-color: #fafafa;
    }

    .docs-table tbody tr:hover {
        background-color: #f5f9ff;
    }

    .docs-table .pdf-icon {
        width: 30px;
        text-align: center;
    }

    .docs-table .pdf-icon img {
        width: 22px;
        height: auto;
    }

    .docs-table .doc-title {
        color: #333;
        font-size: 13.5px;
    }

    .docs-table .download-link {
        text-align: right;
        white-space: nowrap;
    }

    .docs-table .download-link a {
        color: #1a6fa8;
        text-decoration: none;
        font-size: 13px;
    }

    .docs-table .download-link a:hover {
        text-decoration: underline;
    }

    /* ===== SECTIONS ===== */
    .section-title {
        font-size: 15px;
        font-weight: 700;
        color: #222;
        margin-bottom: 10px;
        margin-top: 20px;
    }

    .content-text {
        font-size: 14px;
        line-height: 1.7;
        color: #333;
        text-align: justify;
        margin-bottom: 12px;
    }

    .content-list {
        padding-left: 20px;
        margin-bottom: 12px;
    }

    .content-list li {
        font-size: 14px;
        line-height: 1.7;
        color: #333;
        margin-bottom: 6px;
        text-align: justify;
    }

    /* ===== SIDEBAR ===== */
    .sidebar {
        width: 280px;
        flex-shrink: 0;
    }

    /* News & Events */
    .sidebar-box {
        border: 1px solid #ddd;
        margin-bottom: 20px;
    }

    .sidebar-box-header {
        background-color: #1a6fa8;
        color: #fff;
        text-align: center;
        padding: 10px 15px;
        font-size: 14px;
        font-weight: 700;
        letter-spacing: 0.5px;
    }

    .sidebar-box-body {
        padding: 10px 12px;
    }

    .news-item {
        padding: 8px 0;
        border-bottom: 1px dashed #ccc;
    }

    .news-item:last-child {
        border-bottom: none;
    }

    .news-item a {
        color: #1a6fa8;
        text-decoration: none;
        font-size: 13px;
        line-height: 1.5;
        display: block;
    }

    .news-item a:hover {
        text-decoration: underline;
    }

    .news-item .badge-new {
        display: inline-block;
        background: orange;
        color: #fff;
        font-size: 10px;
        font-weight: bold;
        padding: 1px 5px;
        border-radius: 2px;
        margin-left: 4px;
        vertical-align: middle;
        text-transform: uppercase;
    }

    .news-item .news-date {
        font-size: 11.5px;
        color: #888;
        margin-top: 3px;
        display: block;
    }

    .news-item .arrow {
        color: #1a6fa8;
        margin-right: 4px;
    }

    /* Important Links */
    .links-box {
        border: 1px solid #ddd;
    }

    .links-box-header {
        background-color: #1a6fa8;
        color: #fff;
        text-align: center;
        padding: 10px 15px;
        font-size: 14px;
        font-weight: 700;
        letter-spacing: 0.5px;
    }

    .links-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .links-list li {
        border-bottom: 1px dashed #ccc;
    }

    .links-list li:last-child {
        border-bottom: none;
    }

    .links-list li a {
        display: block;
        padding: 9px 12px;
        color: #1a6fa8;
        text-decoration: none;
        font-size: 13px;
    }

    .links-list li a:hover {
        background-color: #f0f7ff;
        text-decoration: underline;
    }

    .links-list li a::before {
        content: '▶ ';
        font-size: 10px;
        color: #1a6fa8;
    }
</style>

<div class="page-wrapper">

    <!-- ===== MAIN CONTENT ===== -->
    <div class="main-content">

        <h2>Semester Rules</h2>

        <!-- Important Documents Table -->
        <table class="docs-table">
            <thead>
                <tr>
                    <th colspan="3">Important Documents (Semester Rules)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="pdf-icon">
                        <img src="{{ asset('images/pdf-icon.png') }}" alt="PDF">
                    </td>
                    <td class="doc-title">UOH Semester Rules and Regulations for Undergraduate Academic Programs (Revised 2023)</td>
                    <td class="download-link"><a href="#">Download Here</a></td>
                </tr>
                <tr>
                    <td class="pdf-icon">
                        <img src="{{ asset('images/pdf-icon.png') }}" alt="PDF">
                    </td>
                    <td class="doc-title">UoH Semester Rules &amp; Regulations for Undergraduate Academic Programs (Revised 2022)</td>
                    <td class="download-link"><a href="#">Download Here</a></td>
                </tr>
                <tr>
                    <td class="pdf-icon">
                        <img src="{{ asset('images/pdf-icon.png') }}" alt="PDF">
                    </td>
                    <td class="doc-title">Annexures Graduate Semester Rules and Regulations</td>
                    <td class="download-link"><a href="#">Download Here</a></td>
                </tr>
                <tr>
                    <td class="pdf-icon">
                        <img src="{{ asset('images/pdf-icon.png') }}" alt="PDF">
                    </td>
                    <td class="doc-title">Semester Rules and Regulations for Graduate Academic Programs (Revised 2022)</td>
                    <td class="download-link"><a href="#">Download Here</a></td>
                </tr>
                <tr>
                    <td class="pdf-icon">
                        <img src="{{ asset('images/pdf-icon.png') }}" alt="PDF">
                    </td>
                    <td class="doc-title">UOH Admission Policy for Undergraduate</td>
                    <td class="download-link"><a href="#">Download Here</a></td>
                </tr>
            </tbody>
        </table>

        <!-- Short Title Section -->
        <p class="section-title">Short Title, Commencement and Application</p>
        <ul class="content-list">
            <li>These regulations shall be known as University of Haripur, Semester Rules &amp; Regulations framed under section 29 of the Khyber, Pakhtunkhwa Universities Act, 2012.</li>
            <li>These Regulations shall come into force with immediate effect.</li>
            <li>These rules shall apply to all registered students of all programmes of University of Haripur</li>
        </ul>

        <!-- Introduction Section -->
        <p class="section-title">Introduction</p>
        <ul class="content-list">
            <li>The University of Haripur shall offer undergraduate and graduate study Programmes in the subjects provided in the schedule and introduced from time to time.</li>
            <li>Admission to the University is open to all eligible candidates without distinction of caste, creed, gender, or place of origin or domicile. Application for admission to various courses of study shall be invited from all over the Pakistan. However, foreign students seeking admission to the University shall be required to submit their applications through the Ministry of Education, Government of Pakistan.</li>
            <li>Academic year of the university shall comprise of two semesters, each of a minimum duration of 16 -18 weeks of teaching.</li>
        </ul>

        <!-- Courses of Study Section -->
        <p class="section-title">Courses of Study</p>
        <p class="content-text">
            The courses of study and syllabi for the various degrees of the University shall be, submitted by the respective Boards of Studies, Boards of Faculties and then to the Academic Council and the Syndicate for approval. Such courses and syllabi shall become effective from the date of approval by the syndicate or such other date as the Syndicate may determine.
        </p>

        <!-- Organization of Teaching Section -->
        <p class="section-title">Organization of Teaching</p>
        <p class="content-text">
            Teaching in the various courses shall be conducted in the University department or constituent or affiliated
            colleges. The Syndicate shall on the recommendation of the Academic Council prescribe the minimum number
            of lectures and other instructional activities required to be attended for sitting in the semester examinations.
        </p>

    </div>

    <!-- ===== SIDEBAR ===== -->
    <div class="sidebar">

        <!-- News & Events Box -->
        <div class="sidebar-box">
            <div class="sidebar-box-header">NEWS &amp; EVENTS</div>
            <div class="sidebar-box-body">

                <div class="news-item">
                    <a href="#">Milestone: MoU Signing, Startup Launch, and CSR Initiative <span class="badge-new">New</span></a>
                    <span class="news-date">11 Mar 2026</span>
                </div>

                <div class="news-item">
                    <a href="#"><span class="arrow">▶</span> The University of Haripur and North West Regional College Sign Historic MoU to Foster Innovation and Global Collaboration <span class="badge-new">New</span></a>
                    <span class="news-date">11 Mar 2026</span>
                </div>

                <div class="news-item">
                    <a href="#"><span class="arrow">▶</span> Registrar Office of The University of Haripur (Establishment Section) Issues Advisory on Student Cards. <span class="badge-new">New</span></a>
                    <span class="news-date">10 Mar 2026</span>
                </div>

                <div class="news-item">
                    <a href="#"><span class="arrow">▶</span> The University of Haripur Achieves Record QEC Score of 86.69 in 2024-25 Evaluation</a>
                </div>

            </div>
        </div>

        <!-- Important Links Box -->
        <div class="links-box">
            <div class="links-box-header">IMPORTANT LINKS</div>
            <ul class="links-list">
                <li><a href="{{ route('qec') }}">QEC</a></li>
                <li><a href="#">ORIC</a></li>
                <li><a href="#">Career Development Center</a></li>
                <li><a href="#">University Advancement Cell</a></li>
                <li><a href="#">Central Research Laboratory</a></li>
                <li><a href="#">Journal of Management</a></li>
                <li><a href="#">Journal of Islamic &amp; Religious Studies</a></li>
                <li><a href="#">Haripur Journal of Educational Research</a></li>
            </ul>
        </div>

    </div>

</div>

@endsection
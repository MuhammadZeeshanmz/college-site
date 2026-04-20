@extends('layouts.app')
@section('title', 'Hostel Facility - GPGC Mansehra')
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

    .main-content { flex: 1; min-width: 0; }

    .main-title {
        font-size: 22px;
        font-weight: 700;
        color: #1a6fa8;
        margin-bottom: 12px;
    }

    .content-text {
        font-size: 14px;
        line-height: 1.8;
        color: #333;
        text-align: justify;
        margin-bottom: 12px;
    }

    .docs-list {
        list-style: none;
        padding: 0;
        margin: 8px 0 14px;
        counter-reset: doc;
    }
    .docs-list li {
        counter-increment: doc;
        font-size: 14px;
        line-height: 1.8;
        color: #333;
        padding: 3px 0;
    }
    .docs-list li::before {
        content: counter(doc) ". ";
        font-weight: 600;
        color: #333;
    }

    /* Hostel Banner - bilkul UOH screenshot jaisa purple/blue box */
    .hostel-banner {
        border: 2px solid #7a5fc0;
        border-radius: 4px;
        background: linear-gradient(135deg, #4a1fbe 0%, #6b3fd4 50%, #4a1fbe 100%);
        color: #fff;
        padding: 24px 22px;
        margin: 16px 0;
        position: relative;
        overflow: hidden;
    }
    .hostel-banner-title {
        font-size: 20px;
        font-weight: 800;
        text-align: center;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 8px;
    }
    .hostel-banner-subtitle {
        font-size: 15px;
        font-weight: 700;
        text-align: center;
        border: 2px solid #fff;
        padding: 4px 16px;
        display: inline-block;
        margin: 0 auto 16px;
        display: block;
        width: fit-content;
        margin-left: auto;
        margin-right: auto;
    }
    .hostel-banner p {
        font-size: 14px;
        line-height: 1.8;
        text-align: justify;
        margin-bottom: 10px;
        opacity: .95;
    }
    .hostel-banner .warning-text {
        color: #FFD700;
        font-weight: 700;
        font-size: 14px;
        text-align: justify;
        margin-top: 10px;
        display: block;
    }
    .hostel-banner-urdu {
        font-family: 'Noto Nastaliq Urdu', serif;
        direction: rtl;
        text-align: center;
        font-size: 14px;
        line-height: 1.9;
        margin-top: 12px;
        border-top: 1px solid rgba(255,255,255,.3);
        padding-top: 12px;
    }

    .sub-heading-text {
        font-size: 14px;
        font-weight: 700;
        color: #222;
        margin-top: 18px;
        margin-bottom: 8px;
        display: block;
    }

    /* Features list - bullet style like UOH */
    .features-list { list-style: disc; padding-left: 22px; margin-bottom: 14px; }
    .features-list li { font-size: 14px; line-height: 1.8; color: #333; }

    /* Download table */
    .download-table { width: 100%; border-collapse: collapse; border: 1px solid #ddd; margin: 12px 0 18px; }
    .download-table tr { border-bottom: 1px solid #eee; }
    .download-table tr:last-child { border-bottom: none; }
    .download-table tr:nth-child(even) { background: #fafafa; }
    .download-table tr:hover { background: #f0f7ff; }
    .download-table td { padding: 9px 12px; font-size: 13.5px; color: #333; vertical-align: middle; }
    .download-table .doc-icon { width: 30px; text-align: center; color: #c0392b; font-size: 16px; }
    .download-table .dl-link a { color: #1a6fa8; text-decoration: none; font-size: 13px; }
    .download-table .dl-link a:hover { text-decoration: underline; }
    .download-table .dl-link { text-align: right; white-space: nowrap; }

    .divider { height: 1px; background: #ddd; margin: 20px 0; }

    .contact-box {
        background: #f5f9ff;
        border-left: 3px solid #1a6fa8;
        padding: 14px 16px;
        margin-top: 14px;
        font-size: 14px;
        line-height: 1.8;
    }
    .contact-box strong { color: #1a6fa8; display: block; margin-bottom: 4px; }
    .contact-box a { color: #1a6fa8; }

    /* ===== SIDEBAR ===== */
    .sidebar { width: 270px; flex-shrink: 0; }
    .sidebar-box { border: 1px solid #ddd; margin-bottom: 20px; }
    .sidebar-box-header {
        background-color: #1a6fa8; color: #fff; text-align: center;
        padding: 10px 15px; font-size: 13px; font-weight: 700;
        letter-spacing: 0.5px; text-transform: uppercase;
    }

    /* Scrolling news */
    .news-scroll-wrap { height: 260px; overflow: hidden; position: relative; }
    .news-scroll-wrap::after { content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 30px; background: linear-gradient(transparent, #fff); pointer-events: none; }
    .news-scroll-inner { animation: newsUp 25s linear infinite; }
    .news-scroll-inner:hover { animation-play-state: paused; }
    @keyframes newsUp { 0%{transform:translateY(0);}100%{transform:translateY(-50%);} }

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

    .sidebar-links { list-style: none; padding: 0; margin: 0; }
    .sidebar-links li { border-bottom: 1px dashed #ccc; }
    .sidebar-links li:last-child { border-bottom: none; }
    .sidebar-links li a {
        display: block; padding: 9px 12px;
        color: #1a6fa8; text-decoration: none; font-size: 13px;
    }
    .sidebar-links li a::before { content: '▶ '; font-size: 10px; }
    .sidebar-links li a:hover { background-color: #f0f7ff; }
</style>

<div class="page-wrapper">

    <!-- ===== MAIN CONTENT ===== -->
    <div class="main-content">

        <h2 class="main-title">Hostel Facility</h2>

        <p class="content-text">Government Post Graduate College Mansehra provides hostel facility for <strong>male (boys) students</strong> within the college premises. The seat will be allotted on first come first serve basis.</p>

        <p class="content-text">Detail of the documents are:</p>
        <ol class="docs-list">
            <li>Hostel admission form</li>
            <li>Medical fitness certificate</li>
            <li>Undertaking from students</li>
            <li>Undertaking from parents/wards</li>
            <li>Copy of CNIC / B-Form</li>
            <li>Two recent passport-size photographs</li>
        </ol>

        {{-- Hostel Banner - bilkul UOH jaisa purple/blue box --}}
        <div class="hostel-banner">
            <div class="hostel-banner-title">GPGC MANSEHRA</div>
            <div class="hostel-banner-subtitle">BOYS HOSTEL</div>

            <p>Government Post Graduate College Mansehra is offering state of the art hostel facility for male students within the college premises having Masjid, furnished rooms, dining, common room, study room, play area, Affordable fee, 24/7 Ambulance, free internet and security.</p>

            <span class="warning-text">College does not take any responsibility of hostels outside the college premises.</span>

            <div class="hostel-banner-urdu">
                گورنمنٹ پوسٹ گریجویٹ کالج مانسہرہ کے لیے طلباء کے اندر جدید ترین ہاسٹل کی سہولت فراہم کر رہی ہے۔<br>
                جس میں مسجد، فرنشڈ کمرے، کھانے پینے کا انتظام، کامن روم، اسٹڈی روم، پلے ایریا مناسب فیس، 7/24 ایمبولینس<br>
                مفت انٹرنیٹ اور سیکیورٹی شامل ہے۔<br><br>
                یونیورسٹی اپنی حدود سے باہر باسٹلز کی کسی قسم کی ذمہ داری قبول نہیں کرتی۔
            </div>
        </div>

        {{-- Salient Features --}}
        <span class="sub-heading-text">Salient Features of Boys Hostel at GPGC Mansehra:</span>
        <ul class="features-list">
            <li>State of the art building/furniture</li>
            <li>Three layer security measures</li>
            <li>Biometric attendance (in+out)</li>
            <li>High speed internet facility</li>
            <li>Hot and cold water</li>
            <li>Energy backup (UPS/Generator)</li>
            <li>Indoor + outdoor sports facilities</li>
            <li>Indoor canteen / tuck shop</li>
            <li>Study room + common room</li>
            <li>Indoor mosque (Masjid)</li>
            <li>Laundry and cleaning facility</li>
            <li>Conducive academic environment</li>
            <li>24/7 Ambulance facility</li>
            <li>Reasonable living &amp; mess charges</li>
        </ul>

        <div class="divider"></div>

        {{-- Procedure --}}
        <span class="sub-heading-text">Procedure:</span>
        <p class="content-text">Download the forms from the college website, fill up the hostel admission form, attach the relevant documents, and submit them at the <strong>Office of the Provost</strong>, GPGC Mansehra.</p>

        {{-- Download Table --}}
        <table class="download-table">
            <tbody>
                <tr>
                    <td class="doc-icon">📄</td>
                    <td>Hostel Admission Form</td>
                    <td class="dl-link"><a href="#">Download Here</a></td>
                </tr>
                <tr>
                    <td class="doc-icon">📄</td>
                    <td>Undertaking from Parents</td>
                    <td class="dl-link"><a href="#">Download Here</a></td>
                </tr>
                <tr>
                    <td class="doc-icon">📄</td>
                    <td>Undertaking from Students</td>
                    <td class="dl-link"><a href="#">Download Here</a></td>
                </tr>
                <tr>
                    <td class="doc-icon">📄</td>
                    <td>Medical Fitness Certificate</td>
                    <td class="dl-link"><a href="#">Download Here</a></td>
                </tr>
                <tr>
                    <td class="doc-icon">📄</td>
                    <td>Hostel Code and Conduct</td>
                    <td class="dl-link"><a href="#">Download Here</a></td>
                </tr>
            </tbody>
        </table>

        <div class="divider"></div>

        <p class="content-text"><strong>For any information and query about Boys Hostel please contact:</strong></p>
        <div class="contact-box">
            <strong>Hostel Provost / Warden — Boys Hostel, GPGC Mansehra</strong>
            Ph: <a href="tel:+920997310030">0997-310030</a><br>
            Email: <a href="mailto:hostel@gpgcmansehra.edu.pk">hostel@gpgcmansehra.edu.pk</a><br>
            Office: Admin Block, GPGC Mansehra
        </div>

    </div>{{-- end main-content --}}

    <!-- ===== SIDEBAR ===== -->
    <div class="sidebar">

        <div class="sidebar-box">
            <div class="sidebar-box-header">NEWS &amp; EVENTS</div>
            <div class="news-scroll-wrap">
                <div class="news-scroll-inner">
                    <div class="news-item">
                        <a href="#">Hostel Admissions Open for Fall 2026 Semester <span class="badge-new">New</span></a>
                        <span class="news-date">12 Apr 2026</span>
                    </div>
                    <div class="news-item">
                        <a href="#">New Study Room Inaugurated in Boys Hostel <span class="badge-new">New</span></a>
                        <span class="news-date">05 Apr 2026</span>
                    </div>
                    <div class="news-item">
                        <a href="#">GPGC Mansehra Hostel Biometric System Upgraded</a>
                        <span class="news-date">18 Mar 2026</span>
                    </div>
                    <div class="news-item">
                        <a href="#">Hostel Mess Fee Schedule for Spring 2026 Released</a>
                        <span class="news-date">01 Mar 2026</span>
                    </div>
                    <div class="news-item">
                        <a href="#">Sports Night Organized for Hostel Residents</a>
                        <span class="news-date">15 Feb 2026</span>
                    </div>
                    {{-- Duplicate --}}
                    <div class="news-item">
                        <a href="#">Hostel Admissions Open for Fall 2026 Semester <span class="badge-new">New</span></a>
                        <span class="news-date">12 Apr 2026</span>
                    </div>
                    <div class="news-item">
                        <a href="#">New Study Room Inaugurated in Boys Hostel <span class="badge-new">New</span></a>
                        <span class="news-date">05 Apr 2026</span>
                    </div>
                    <div class="news-item">
                        <a href="#">GPGC Mansehra Hostel Biometric System Upgraded</a>
                        <span class="news-date">18 Mar 2026</span>
                    </div>
                    <div class="news-item">
                        <a href="#">Hostel Mess Fee Schedule for Spring 2026 Released</a>
                        <span class="news-date">01 Mar 2026</span>
                    </div>
                    <div class="news-item">
                        <a href="#">Sports Night Organized for Hostel Residents</a>
                        <span class="news-date">15 Feb 2026</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="sidebar-box">
            <div class="sidebar-box-header">IMPORTANT LINKS</div>
            <ul class="sidebar-links">
                <li><a href="#">Hostel Admission Form</a></li>
                <li><a href="#">Hostel Rules &amp; Regulations</a></li>
                <li><a href="#">Fee Structure</a></li>
                <li><a href="#">Student Portal</a></li>
                <li><a href="#">BISE Abbottabad</a></li>
                <li><a href="#">University of Hazara</a></li>
                <li><a href="#">HED Khyber Pakhtunkhwa</a></li>
            </ul>
        </div>

    </div>{{-- end sidebar --}}

</div>
@endsection
@extends('layouts.app')
@section('title', 'Social Work - GPGC Mansehra')
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
        margin-bottom: 5px;
    }

    /* Tab sections */
    .tab-section { display: none; }
    .tab-section.active { display: block; }

    .section-heading {
        font-size: 15px;
        font-weight: 700;
        color: #1a6fa8;
        margin-bottom: 12px;
        margin-top: 4px;
    }

    .bold-label {
        font-weight: 700;
        text-decoration: underline;
        display: block;
        margin-bottom: 6px;
        margin-top: 16px;
        color: #222;
        font-size: 14px;
    }

    .content-text {
        font-size: 14px;
        line-height: 1.8;
        color: #333;
        text-align: justify;
        margin-bottom: 14px;
    }

    /* Department photo */
    .dept-photo {
        width: 100%;
        max-width: 100%;
        height: auto;
        border: 1px solid #ddd;
        margin: 14px 0;
        display: block;
    }

    .photo-caption {
        font-size: 13px;
        font-weight: 700;
        color: #222;
        margin-bottom: 10px;
        margin-top: 4px;
    }

    .objectives-list { list-style: none; padding: 0; margin-bottom: 14px; }
    .objectives-list li { font-size: 14px; line-height: 1.8; color: #333; text-align: justify; margin-bottom: 6px; }

    /* ===== SIDEBAR ===== */
    .sidebar { width: 270px; flex-shrink: 0; }
    .sidebar-box { border: 1px solid #ddd; margin-bottom: 20px; }
    .sidebar-box-header {
        background-color: #1a6fa8; color: #fff; text-align: center;
        padding: 10px 15px; font-size: 13px; font-weight: 700;
        letter-spacing: 0.5px; text-transform: uppercase;
    }

    /* Tab links */
    .sidebar-links { list-style: none; padding: 0; margin: 0; }
    .sidebar-links li { border-bottom: 1px dashed #ccc; }
    .sidebar-links li:last-child { border-bottom: none; }
    .sidebar-links li a {
        display: block; padding: 9px 12px;
        color: #1a6fa8; text-decoration: none; font-size: 13px; cursor: pointer;
    }
    .sidebar-links li a::before { content: '▶ '; font-size: 10px; }
    .sidebar-links li a:hover,
    .sidebar-links li a.active { background-color: #f0f7ff; font-weight: 600; }

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
    .news-empty { padding: 14px 12px; color: #888; font-size: 13px; font-style: italic; }
</style>

<div class="page-wrapper">

    <!-- ===== MAIN CONTENT ===== -->
    <div class="main-content">
        <h2 class="main-title">Directorate of Social Work (GPGC Mansehra)</h2>

        {{-- INTRODUCTION --}}
        <div id="tab-introduction" class="tab-section active">
            <p class="section-heading">Introduction</p>
            <p class="content-text">Social work in academic institutions is a process of developing student population that is aware of and concerned about overall society and allied problems. At GPGC Mansehra the basic goal of social work office is to equip your generation with necessary knowledge and skills pertaining to solution of existing community's problems and prevention of new ones. It focuses mainly on inculcating positive changes in attitudes and building the capacity of student's population to work individually and collectively for bringing improvement in the overall wellbeing of society to contribute their due part in serving the ailing humanity.</p>
            <p class="content-text">The College operates its academic flight with the moto of <strong><u>"Restoring hope; Building Community".</u></strong> To significantly contribute towards achieving our strategic goals, social work has been made obligatory, mandatory and integral part for the award of degree.</p>

            {{-- Photo --}}
            <img class="dept-photo" src="{{ asset('images/social-work/activity-1.jpg') }}" alt="Social Work Activity - GPGC Mansehra" onerror="this.style.display='none'">

            <p class="photo-caption">Focus of Social Work at GPGC Mansehra:</p>
            <p class="content-text">Looking into the qualities required for social work we cannot separate the social work from educational system as education provide base for social activities. The educational system at GPGC Mansehra has been integrated with social work to serve local communities and develop civic responsibility among students.</p>
        </div>

        {{-- VISION & MISSION --}}
        <div id="tab-vision-mission" class="tab-section">
            <p class="section-heading">Vision &amp; Mission</p>
            <span class="bold-label">Vision:</span>
            <p class="content-text">To develop socially conscious, responsible, and proactive graduates who actively contribute to the betterment of their communities and the broader society.</p>
            <span class="bold-label">Mission:</span>
            <p class="content-text">To integrate community service into the academic journey of every student at GPGC Mansehra by providing structured social work programmes that develop empathy, leadership, and civic responsibility among the student population.</p>
        </div>

        {{-- AIMS & OBJECTIVES --}}
        <div id="tab-aims-objectives" class="tab-section">
            <p class="section-heading">Aims &amp; Objectives</p>
            <p class="content-text">The Social Work programme at GPGC Mansehra aims to:</p>
            <ul class="objectives-list">
                <li>1. Develop awareness among students about social problems affecting the local and national community.</li>
                <li>2. Build the capacity of students to take practical steps towards community improvement.</li>
                <li>3. Promote volunteerism and civic responsibility as core values of student life.</li>
                <li>4. Foster teamwork, leadership, and communication skills through field-based social activities.</li>
                <li>5. Create a bridge between the college and local communities for mutual development.</li>
                <li>6. Ensure that every graduating student has contributed meaningfully to society as part of their academic requirement.</li>
            </ul>
        </div>

        {{-- SOCIAL WORK RULES --}}
        <div id="tab-rules" class="tab-section">
            <p class="section-heading">Social Work Rules &amp; Regulations</p>
            <p class="content-text">All students enrolled at GPGC Mansehra are required to complete a mandatory social work component as per the policy of the Higher Education Department, Khyber Pakhtunkhwa. Key regulations include:</p>
            <ul class="objectives-list">
                <li>1. Every student must complete the minimum required social work hours per academic year.</li>
                <li>2. Social work activities must be pre-approved by the Social Work Department.</li>
                <li>3. Students must maintain a proper logbook/record of their activities, duly signed by the supervising teacher.</li>
                <li>4. Fabrication or misrepresentation of social work records will result in disciplinary action.</li>
                <li>5. Social work certificates are mandatory for the award of degrees and certificates.</li>
                <li>6. Students may perform social work in approved partner organisations, NGOs, schools, hospitals, or community groups.</li>
            </ul>
        </div>

        {{-- SEMESTER PROGRAMS --}}
        <div id="tab-semester-programs" class="tab-section">
            <p class="section-heading">Semester Programs (BS Hons)</p>
            <p class="content-text">Social Work is a mandatory and integral component of all BS (Hons) programs offered at GPGC Mansehra. Students enrolled in BS programs must complete the required social work hours as part of their degree requirements each semester.</p>
            <p class="content-text">The social work component is evaluated by the Social Work Coordinator and relevant faculty. Students must submit their completed logbook and reports at the end of each semester for assessment and credit.</p>
        </div>

        {{-- ANNUAL PROGRAMS --}}
        <div id="tab-annual-programs" class="tab-section">
            <p class="section-heading">Annual Programs (BA, BSc, B.Com)</p>
            <p class="content-text">Social Work is also a mandatory component for students enrolled in Annual System programs (BA, BSc, B.Com) at GPGC Mansehra. Students must complete the required number of social work hours per academic year.</p>
            <p class="content-text">Annual program students are required to submit their social work records before the commencement of annual examinations. Failure to complete social work requirements may result in withholding of examination results.</p>
        </div>

        {{-- DOWNLOADS --}}
        <div id="tab-downloads" class="tab-section">
            <p class="section-heading">Downloads</p>
            <table style="width:100%;border-collapse:collapse;border:1px solid #ddd;">
                <thead>
                    <tr style="background:#1a6fa8;color:#fff;">
                        <th style="padding:9px 12px;text-align:left;font-size:13px;" colspan="3">Social Work Documents</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="border-bottom:1px solid #eee;">
                        <td style="padding:8px 12px;width:28px;color:#c0392b;font-size:16px;">📄</td>
                        <td style="padding:8px 12px;font-size:13.5px;">Social Work Registration Form</td>
                        <td style="padding:8px 12px;text-align:right;"><a href="#" style="color:#1a6fa8;text-decoration:none;font-size:13px;">Download Here</a></td>
                    </tr>
                    <tr style="background:#fafafa;border-bottom:1px solid #eee;">
                        <td style="padding:8px 12px;color:#c0392b;font-size:16px;">📄</td>
                        <td style="padding:8px 12px;font-size:13.5px;">Social Work Logbook Template</td>
                        <td style="padding:8px 12px;text-align:right;"><a href="#" style="color:#1a6fa8;text-decoration:none;font-size:13px;">Download Here</a></td>
                    </tr>
                    <tr style="border-bottom:1px solid #eee;">
                        <td style="padding:8px 12px;color:#c0392b;font-size:16px;">📄</td>
                        <td style="padding:8px 12px;font-size:13.5px;">Social Work Completion Certificate Form</td>
                        <td style="padding:8px 12px;text-align:right;"><a href="#" style="color:#1a6fa8;text-decoration:none;font-size:13px;">Download Here</a></td>
                    </tr>
                    <tr style="background:#fafafa;">
                        <td style="padding:8px 12px;color:#c0392b;font-size:16px;">📄</td>
                        <td style="padding:8px 12px;font-size:13.5px;">Social Work Rules &amp; Regulations (PDF)</td>
                        <td style="padding:8px 12px;text-align:right;"><a href="#" style="color:#1a6fa8;text-decoration:none;font-size:13px;">Download Here</a></td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- CONTACT INFORMATION --}}
        <div id="tab-contact-info" class="tab-section">
            <p class="section-heading">Contact Information</p>
            <p class="content-text"><strong>Social Work Department</strong><br>Government Post Graduate College Mansehra<br>University Road, Mansehra, Khyber Pakhtunkhwa, Pakistan</p>
            <p class="content-text">
                📞 Phone: 0997-310030<br>
                ✉️ Email: socialwork@gpgcmansehra.edu.pk<br>
                📍 Location: Arts Block, GPGC Mansehra<br>
                🕐 Office Hours: Monday – Friday: 8:00 AM – 4:00 PM
            </p>
        </div>

    </div>{{-- end main-content --}}

    <!-- ===== SIDEBAR ===== -->
    <div class="sidebar">

        <div class="sidebar-box">
            <div class="sidebar-box-header">IMPORTANT LINKS (SW)</div>
            <ul class="sidebar-links">
                <li><a href="#" data-tab="introduction" class="active">Introduction</a></li>
                <li><a href="#" data-tab="vision-mission">Vision &amp; Mission</a></li>
                <li><a href="#" data-tab="aims-objectives">Aims &amp; Objectives</a></li>
                <li><a href="#" data-tab="rules">Social Work Rules &amp; Regulations</a></li>
                <li><a href="#" data-tab="semester-programs">Semester Programs (BS Hons)</a></li>
                <li><a href="#" data-tab="annual-programs">Annual Programs (BA, BSc, B.Com)</a></li>
                <li><a href="#" data-tab="downloads">Downloads</a></li>
                <li><a href="#" data-tab="contact-info">Contact Information</a></li>
            </ul>
        </div>

        <div class="sidebar-box">
            <div class="sidebar-box-header">NEWS &amp; EVENTS (SW)</div>
            <div class="news-scroll-wrap">
                <div class="news-scroll-inner">
                    @if(isset($socialWorkNews) && count($socialWorkNews))
                        @foreach($socialWorkNews as $news)
                        <div class="news-item"><a href="#">{{ $news->title }}</a></div>
                        @endforeach
                        @foreach($socialWorkNews as $news)
                        <div class="news-item"><a href="#">{{ $news->title }}</a></div>
                        @endforeach
                    @else
                        <div class="news-empty">No Active News</div>
                    @endif
                </div>
            </div>
        </div>

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
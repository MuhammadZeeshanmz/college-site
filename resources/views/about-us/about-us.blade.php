@extends('layouts.app')
@section('title', 'About Us - GPGC Mansehra')
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

    .main-title {
        font-size: 22px;
        font-weight: 700;
        color: #1a6fa8;
        margin-bottom: 15px;
    }

    .sub-heading {
        font-size: 15px;
        font-weight: 700;
        color: #1a6fa8;
        margin-bottom: 10px;
        margin-top: 20px;
    }

    .content-text {
        font-size: 14px;
        line-height: 1.8;
        color: #333;
        text-align: justify;
        margin-bottom: 14px;
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

    .objectives-list {
        list-style: none;
        padding: 0;
        margin-bottom: 14px;
    }
    .objectives-list li {
        font-size: 14px;
        line-height: 1.8;
        color: #333;
        text-align: justify;
        margin-bottom: 8px;
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

    /* Scrolling news */
    .news-scroll-wrap { height: 280px; overflow: hidden; position: relative; }
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

    /* Important links sidebar */
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

        <h2 class="main-title">About Government Post Graduate College Mansehra</h2>

        <p class="content-text">Government Post Graduate College (GPGC) Mansehra is one of the most prestigious and oldest educational institutions in the Hazara Division of Khyber Pakhtunkhwa, Pakistan. Established to meet the growing demand for higher education in the region, the college has been instrumental in shaping generations of scholars, professionals, and leaders who have contributed to the development of Pakistan.</p>

        <p class="content-text">The college is situated in the scenic and historically rich city of Mansehra, which lies along the Karakoram Highway — one of the world's highest paved international roads. Mansehra district is known for its natural beauty, strategic location, and a strong tradition of valuing education.</p>

        <p class="content-text">The existing premises of Government Post Graduate College Mansehra were once part of the historic educational legacy of the Hazara region. The college offers undergraduate programs across the faculties of Arts, Science, and Commerce. With a dedicated faculty of experienced educators and a campus equipped with modern laboratories, a well-stocked library, sports facilities, and a safe learning environment, GPGC Mansehra remains committed to providing quality education to the youth of the region.</p>

        <p class="content-text">Hazara region of Khyber Pakhtunkhwa, a region which entails the international Karakoram Highway. There was a strong motivation to establish GPGC Mansehra and a significant coherence among the potential stakeholders regarding the direction that such a project should take.</p>

        <p class="content-text">The motivation can be supported by estimates which suggest that thousands of students will be enrolled in the college with the completion of proposed physical and academic infrastructure. Having education at all levels with strong Islamic foundations is important for the nation as a whole and we firmly believe that education should be focused on providing principled, morally motivated leaders to serve the country — a new generation of leaders who understand the need for justice and peace in Pakistan.</p>

        <h2 class="main-title" style="margin-top:24px;">Mission &amp; Core Values</h2>

        <span class="bold-label">Mission:</span>
        <p class="content-text">The mission of GPGC Mansehra is to achieve and maintain high standards in every sphere of its teaching and promote an open, collaborative and novel culture of scientific inquiry to improve the lives and livelihoods of the people through sustainable development.</p>

        <span class="bold-label">Goal:</span>
        <p class="content-text">GPGC Mansehra aims to create an enabling environment for conducive learning to find solutions of current day's problems and prevention of new one's through sustained supply of trained human resources to the national and international arena.</p>

        <span class="bold-label">Objectives:</span>
        <p class="content-text">In view of post 9/11 scenario of Pakistan in general and Khyber Pakhtunkhwa in particular the determined vision as regards the establishment of GPGC Mansehra is strengthened by the implicit acknowledgment that education is the principal solution not only to widespread poverty but to a peaceful future as well; to a moral and just government; to human resource development; to capacity building and the development of the vital knowledge for an improved economy of the country. Keeping this in mind the following key objectives are being framed for which the college shall be striving.</p>

        <ul class="objectives-list">
            <li>1: To provide quality education to deserving students that inculcates positive changes in their attitudes towards national development.</li>
            <li>2: To establish a community of outstanding scholars, teachers and administrative staff to promote and maintain academic distinction.</li>
            <li>3: To promote scientific research to acquire excellence in various fields of study.</li>
            <li>4: To establish network and coordination with leading national, regional and international institutes to share experiences for academic and research excellence.</li>
            <li>5: To contribute national development through incorporation of academic research findings in national policies and strategies.</li>
        </ul>

        <span class="bold-label">Core Values:</span>
        <p class="content-text">GPGC Mansehra has been established as providing opportunities for strengthening and extending the important relationship between modern sciences and Islamic, social action and thus providing a platform for a more just and prosperous world. Accordingly, it is envisioned potentially to provide a tangible symbol of resurrectional hope. By determining that it shall be a college for the whole of Pakistan and be accessible to all who are qualified, irrespective of their religious stance, it will also stand for peace and unity. With this recognition in mind, GPGC Mansehra will follow the following core values in its day-to-day routine official business and management.</p>

        <p class="content-text"><strong>Openness:</strong> The College will observe openness as core value in its official business. Openness to foreign values, religious beliefs, ethnic profiles, changes in government policies, plans and programs. Each and every aspect of the official business shall have a built-in resilience mechanism to accommodate itself in the changing circumstances.</p>

        <p class="content-text"><strong>Transparency:</strong> The College shall observe and ensure transparency in every sphere of its academic/administrative set-up. Each and every aspect of the official business shall have a clear, fair and transparent procedure/system to achieve and sustain excellence in diverse fields.</p>

        <p class="content-text"><strong>Equality:</strong> By determining that GPGC Mansehra shall be for the whole of Pakistan, everyone belonging to different regions, backgrounds, or beliefs shall be treated equally with respect and dignity.</p>

    </div>{{-- end main-content --}}

    <!-- ===== SIDEBAR ===== -->
    <div class="sidebar">

        <div class="sidebar-box">
            <div class="sidebar-box-header">NEWS &amp; EVENTS</div>
            <div class="news-scroll-wrap">
                <div class="news-scroll-inner">
                    <div class="news-item">
                        <a href="#">GPGC Mansehra Announces Annual Prize Distribution Ceremony <span class="badge-new">New</span></a>
                        <span class="news-date">15 Apr 2026</span>
                    </div>
                    <div class="news-item">
                        <a href="#">Admissions Open for BS Programs Session 2026 — Apply Now <span class="badge-new">New</span></a>
                        <span class="news-date">10 Apr 2026</span>
                    </div>
                    <div class="news-item">
                        <a href="#">GPGC Mansehra Students Excel in Board Exams — Results 2025</a>
                        <span class="news-date">20 Mar 2026</span>
                    </div>
                    <div class="news-item">
                        <a href="#">Inter-College Debate Competition Hosted at GPGC Mansehra</a>
                        <span class="news-date">05 Mar 2026</span>
                    </div>
                    <div class="news-item">
                        <a href="#">Tree Plantation Drive Conducted on College Campus</a>
                        <span class="news-date">22 Feb 2026</span>
                    </div>
                    <div class="news-item">
                        <a href="#">HEC Need-Based Scholarship 2026 Applications Open</a>
                        <span class="news-date">01 Feb 2026</span>
                    </div>
                    {{-- Duplicate for loop --}}
                    <div class="news-item">
                        <a href="#">GPGC Mansehra Announces Annual Prize Distribution Ceremony <span class="badge-new">New</span></a>
                        <span class="news-date">15 Apr 2026</span>
                    </div>
                    <div class="news-item">
                        <a href="#">Admissions Open for BS Programs Session 2026 — Apply Now <span class="badge-new">New</span></a>
                        <span class="news-date">10 Apr 2026</span>
                    </div>
                    <div class="news-item">
                        <a href="#">GPGC Mansehra Students Excel in Board Exams — Results 2025</a>
                        <span class="news-date">20 Mar 2026</span>
                    </div>
                    <div class="news-item">
                        <a href="#">Inter-College Debate Competition Hosted at GPGC Mansehra</a>
                        <span class="news-date">05 Mar 2026</span>
                    </div>
                    <div class="news-item">
                        <a href="#">Tree Plantation Drive Conducted on College Campus</a>
                        <span class="news-date">22 Feb 2026</span>
                    </div>
                    <div class="news-item">
                        <a href="#">HEC Need-Based Scholarship 2026 Applications Open</a>
                        <span class="news-date">01 Feb 2026</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="sidebar-box">
            <div class="sidebar-box-header">IMPORTANT LINKS</div>
            <ul class="sidebar-links">
                <li><a href="#">QEC</a></li>
                <li><a href="#">ORIC</a></li>
                <li><a href="#">Career Development Center</a></li>
                <li><a href="#">University Advancement Cell</a></li>
                <li><a href="#">Central Research Laboratory</a></li>
                <li><a href="#">Journal of Management</a></li>
                <li><a href="#">Journal of Islamic &amp; Religious Studies</a></li>
                <li><a href="#">Haripur Journal of Educational Research</a></li>
            </ul>
        </div>

    </div>{{-- end sidebar --}}

</div>
@endsection
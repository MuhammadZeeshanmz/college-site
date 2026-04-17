@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

@section('title', 'Government Postgraduate College Mansehra - Excellence in Education')

@push('styles')
<style>
/* ══════════════════════════════════════════
   1. BANNER SLIDER  (full-width, UOH exact)
══════════════════════════════════════════ */
.banner-section { width:100%; overflow:hidden; background:#0a1e10; }
.banner-swiper  { width:100%; height:clamp(200px,30vw,500px); }
.banner-swiper .swiper-slide a { display:block; width:100%; height:100%; }
.banner-swiper .swiper-slide img { width:100%; height:100%; object-fit:cover; object-position:center top; display:block; transition:transform 7s ease; }
.banner-swiper .swiper-slide-active img { transform:scale(1.04); }
.banner-swiper .swiper-button-next,
.banner-swiper .swiper-button-prev { width:38px; height:38px; background:rgba(0,0,0,.5); border-radius:3px; color:#fff; }
.banner-swiper .swiper-button-next:hover,
.banner-swiper .swiper-button-prev:hover { background:rgba(0,66,40,.85); }
.banner-swiper .swiper-button-next::after,
.banner-swiper .swiper-button-prev::after { font-size:15px; font-weight:700; }
.banner-swiper .swiper-pagination-bullet { width:10px; height:10px; background:rgba(255,255,255,.6); opacity:1; }
.banner-swiper .swiper-pagination-bullet-active { background:#c8930a; width:28px; border-radius:5px; }
.slide-cap { position:absolute; bottom:0; left:0; right:0; padding:24px 32px 16px; background:linear-gradient(to top,rgba(10,30,16,.85) 0%,transparent 100%); color:#fff; pointer-events:none; }
.slide-cap .ctag { display:inline-block; background:#c8930a; color:#fff; font-size:10px; font-weight:700; padding:2px 10px; border-radius:3px; text-transform:uppercase; letter-spacing:.08em; margin-bottom:5px; }
.slide-cap h4 { font-family:'Playfair Display',serif; font-size:clamp(13px,1.6vw,20px); font-weight:700; color:#fff; margin:0; line-height:1.3; }

/* ══════════════════════════════════════════
   2. NEWS TICKER  (below slider — exactly like UOH)
══════════════════════════════════════════ */
.news-ticker-bar {
    background:#fff;
    border-top:1px solid #ddd;
    border-bottom:2px solid #0b6a7c;
    padding:8px 0;
    overflow:hidden;
}
.ticker-wrap { max-width:1280px; margin:auto; padding:0 20px; display:flex; align-items:center; gap:0; }
.ticker-lbl {
    background:#c8930a; color:#fff; font-size:11px; font-weight:700;
    padding:4px 12px; border-radius:3px; text-transform:uppercase;
    letter-spacing:.07em; flex-shrink:0; margin-right:16px; white-space:nowrap;
}
.ticker-scroll { overflow:hidden; flex:1; }
.ticker-inner { display:flex; gap:50px; animation:scroll-ticker 35s linear infinite; white-space:nowrap; font-size:13px; color:#1a3a5c; font-weight:500; }
.ticker-inner span { display:flex; align-items:center; gap:6px; }
.ticker-inner span .tnew { color:red; font-weight:800; font-size:11px; }
@keyframes scroll-ticker { 0%{transform:translateX(0);}100%{transform:translateX(-50%);} }

/* ══════════════════════════════════════════
   3. ICON GRID  (UOH exact — 6 icons in white boxes)
══════════════════════════════════════════ */
.icon-section { background:#f5f5f5; padding:28px 0; border-bottom:1px solid #ddd; }
.icon-grid { display:grid; grid-template-columns:repeat(6,1fr); gap:16px; }
.icon-box {
    background:#fff; border:1px solid #ddd; text-align:center;
    padding:18px 12px; border-radius:6px; text-decoration:none;
    transition:all .25s; display:flex; flex-direction:column; align-items:center; gap:10px;
    color:#1a3a5c;
}
.icon-box:hover { transform:translateY(-5px); box-shadow:0 8px 24px rgba(0,0,0,.1); border-color:#0b6a7c; }
.icon-box .ibox-img {
    width:80px; height:80px; border-radius:50%;
    display:flex; align-items:center; justify-content:center; font-size:32px;
    background:#e8f5ee; border:2px solid #c8d8e8; transition:background .25s;
}
.icon-box:hover .ibox-img { background:#0b6a7c; color:#fff; }
.icon-box p { font-size:13px; font-weight:700; color:#0b6a7c; margin:0; }
.icon-box:hover p { color:#0b6a7c; }

/* ══════════════════════════════════════════
   4. BANNER GRID  (3 promo banners like UOH)
══════════════════════════════════════════ */
.promo-section { padding:20px 0; background:#fff; }
.promo-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:16px; }
.promo-grid a { display:block; border-radius:6px; overflow:hidden; border:1px solid #ddd; transition:all .25s; }
.promo-grid a:hover { box-shadow:0 6px 20px rgba(0,0,0,.15); transform:translateY(-2px); }
.promo-grid img { width:100%; height:160px; object-fit:cover; display:block; transition:transform .4s; }
.promo-grid a:hover img { transform:scale(1.04); }

/* ══════════════════════════════════════════
   5. INFO SECTION  (VC + Highlights + News — exactly like screenshot 2)
══════════════════════════════════════════ */
.info-section { background:#f4f4f4; padding:28px 0; }
.info-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:18px; }
.info-card { background:#fff; border:1px solid #ddd; border-radius:4px; overflow:hidden; }
.info-hdr {
    background:#0b6a7c; color:#fff; padding:11px 16px;
    font-weight:700; font-size:13.5px; text-align:center;
    letter-spacing:.05em; text-transform:uppercase;
    display:flex; align-items:center; justify-content:center; gap:10px;
}
.info-hdr a { color:#ffd700; font-size:12px; font-weight:600; text-decoration:none; margin-left:auto; }
.info-hdr a:hover { text-decoration:underline; }
.info-body { padding:14px 16px; }

/* VC card */
.vc-row { display:flex; gap:14px; align-items:flex-start; }
.vc-photo { width:100px; height:120px; object-fit:cover; flex-shrink:0; border:2px solid #dde; }
.vc-text { font-size:13px; line-height:1.7; color:#444; text-align:justify; }
.vc-text a { color:#0b6a7c; font-weight:600; text-decoration:none; }
.vc-text a:hover { text-decoration:underline; }

/* Highlights & News list */
.info-list { list-style:none; padding:0; margin:0; }
.info-list li {
    padding:9px 4px; border-bottom:1px dashed #ccc;
    font-size:13px; color:#222; line-height:1.45;
    display:flex; gap:6px; align-items:flex-start;
}
.info-list li:last-child { border-bottom:none; }
.info-list li .new-tag { color:red; font-weight:800; font-size:11px; flex-shrink:0; margin-top:2px; }
.info-list li .arr { color:#0b6a7c; flex-shrink:0; margin-top:2px; }
.info-list li a { color:#1a3a5c; text-decoration:none; font-weight:600; transition:color .2s; }
.info-list li a:hover { color:#0b6a7c; text-decoration:underline; }
.news-date { font-size:11px; color:#888; display:block; margin-top:2px; }

/* ══════════════════════════════════════════
   6. STATS STRIP  (dark blue glow — screenshot 3 exact)
══════════════════════════════════════════ */
.stats-section {
    background:linear-gradient(135deg,#071e3d 0%,#0b3c5d 40%,#1c5d85 70%,#0b3c5d 100%);
    padding:40px 0; margin:0;
}
.stats-grid-4 { display:grid; grid-template-columns:repeat(4,1fr); gap:20px; }
.stat-box {
    background:rgba(255,255,255,.06); border:1.5px solid rgba(255,255,255,.18);
    border-radius:12px; padding:30px 16px; text-align:center; color:#fff;
    backdrop-filter:blur(6px); transition:all .3s;
    box-shadow:0 0 20px rgba(0,200,255,.08);
}
.stat-box:hover { transform:translateY(-6px) scale(1.02); box-shadow:0 0 30px rgba(0,200,255,.25); border-color:rgba(255,255,255,.35); }
.stat-box i { font-size:38px; color:#4af0a0; margin-bottom:12px; display:block; }
.stat-box .s-num { font-family:'Playfair Display',serif; font-size:36px; font-weight:800; color:#fff; line-height:1; margin-bottom:8px; }
.stat-box .s-lbl { font-size:12px; letter-spacing:2px; font-weight:700; color:rgba(255,255,255,.6); text-transform:uppercase; }

/* ══════════════════════════════════════════
   7. QUOTE + ABOUT LINKS  (screenshot 4 exact)
══════════════════════════════════════════ */
.quote-section {
    background:#f8f8f8; padding:36px 0;
    border-top:1px solid #e0e0e0; border-bottom:1px solid #e0e0e0;
}
.quote-card {
    display:flex; gap:24px; align-items:flex-start;
    background:#fff; border:1px solid #ddd; border-radius:8px;
    padding:24px 28px; max-width:1100px; margin:0 auto;
}
.quote-icon-circle {
    width:90px; height:90px; border-radius:50%;
    background:#1a3a6c; display:flex; align-items:center; justify-content:center;
    flex-shrink:0; color:#fff; font-size:36px;
}
.quote-body { font-size:13.5px; color:#333; line-height:1.8; text-align:justify; }
.quote-body strong { font-style:italic; }
.quote-body .q-source { display:block; margin-top:10px; font-style:italic; font-weight:700; color:#333; font-size:13px; }

/* About links row (5 circles) */
.about-links-section { background:#fff; padding:40px 0 44px; }
.about-circles { display:flex; justify-content:center; align-items:flex-end; gap:0; position:relative; }
.about-circles::before {
    content:''; position:absolute; top:50%; left:10%; right:10%;
    height:2px; background:#cdd; z-index:0; transform:translateY(-200%);
}
.about-circle-item { display:flex; flex-direction:column; align-items:center; gap:14px; text-decoration:none; flex:1; position:relative; z-index:1; }
.about-circle-item .circle-icon {
    width:100px; height:100px; border-radius:50%;
    background:#1a3a6c; display:flex; align-items:center; justify-content:center;
    font-size:36px; color:#fff; transition:all .3s;
    border:4px solid #fff; box-shadow:0 4px 16px rgba(26,58,108,.25);
}
.about-circle-item:hover .circle-icon { background:#0b6a7c; transform:translateY(-6px) scale(1.05); box-shadow:0 8px 28px rgba(11,106,124,.35); }
.about-circle-item span { font-size:12px; font-weight:800; color:#1a3a6c; text-transform:uppercase; letter-spacing:.06em; text-align:center; line-height:1.3; }

/* ══════════════════════════════════════════
   RESPONSIVE
══════════════════════════════════════════ */
@media(max-width:1024px) {
    .icon-grid { grid-template-columns:repeat(3,1fr); }
    .promo-grid { grid-template-columns:repeat(2,1fr); }
    .stats-grid-4 { grid-template-columns:repeat(2,1fr); }
}
@media(max-width:768px) {
    .info-grid { grid-template-columns:1fr; }
    .icon-grid { grid-template-columns:repeat(3,1fr); }
    .about-circles { flex-wrap:wrap; gap:20px; }
    .about-circle-item { flex:none; width:30%; }
    .stats-grid-4 { grid-template-columns:repeat(2,1fr); }
}
@media(max-width:480px) {
    .icon-grid { grid-template-columns:repeat(2,1fr); }
    .promo-grid { grid-template-columns:1fr; }
    .about-circle-item { width:45%; }
}
</style>
@endpush

@section('content')

{{-- ══════════════════════════════════════════
     1. FULL-WIDTH BANNER SLIDER
══════════════════════════════════════════ --}}
<div class="banner-section">
    <div class="swiper banner-swiper">
        <div class="swiper-wrapper">

            <div class="swiper-slide">
                <a href="#">
                    <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=1600&h=500&fit=crop&crop=top" alt="Admissions">
                    <div class="slide-cap">
                        <div class="ctag">Admissions Open</div>
                        <h4>Fall 2025 Admissions — Apply Now Before Seats Fill Up!</h4>
                    </div>
                </a>
            </div>

            <div class="swiper-slide">
                <a href="#">
                    <img src="https://images.unsplash.com/photo-1627556704302-624286467c65?w=1600&h=500&fit=crop&crop=top" alt="Convocation">
                    <div class="slide-cap">
                        <div class="ctag">Event</div>
                        <h4>5th Annual Convocation — Over 2,000 Graduates Celebrated</h4>
                    </div>
                </a>
            </div>

            <div class="swiper-slide">
                <a href="#">
                    <img src="https://images.unsplash.com/photo-1588196749597-9ff075ee6b5b?w=1600&h=500&fit=crop&crop=center" alt="KP Govt">
                    <div class="slide-cap">
                        <div class="ctag">Achievement</div>
                        <h4>College Achieves Record QEC Score of 86.69 in 2024–25 Evaluation</h4>
                    </div>
                </a>
            </div>

            <div class="swiper-slide">
                <a href="#">
                    <img src="https://images.unsplash.com/photo-1581091226033-d5c48150dbaa?w=1600&h=500&fit=crop&crop=center" alt="Research">
                    <div class="slide-cap">
                        <div class="ctag">Research</div>
                        <h4>HEC Research Grant of Rs. 10 Million — Advancing Science at GPGCM</h4>
                    </div>
                </a>
            </div>

            <div class="swiper-slide">
                <a href="#">
                    <img src="https://images.unsplash.com/photo-1562774053-701939374585?w=1600&h=500&fit=crop&crop=top" alt="Campus">
                    <div class="slide-cap">
                        <div class="ctag">Campus</div>
                        <h4>On-Campus Physical Classes Resume — Full Academic Activities Restored</h4>
                    </div>
                </a>
            </div>

        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-pagination"></div>
    </div>
</div>

{{-- ══════════════════════════════════════════
     2. NEWS TICKER  (below slider — like UOH red-tagged scroll)
══════════════════════════════════════════ --}}
<div class="news-ticker-bar">
    <div class="ticker-wrap">
        <div class="ticker-lbl">📢 Latest News</div>
        <div class="ticker-scroll">
            <div class="ticker-inner">
                <span><span class="tnew">New</span> Registrar Office Notification regarding On-Campus Physical Classes from 6th April 2026</span>
                <span><span class="tnew">New</span> Admissions Open for Fall 2025 — Apply Before 30th August</span>
                <span><span class="tnew">New</span> College Achieves Record QEC Score of 86.69 in 2024–25 Evaluation</span>
                <span><span class="tnew">New</span> HEC Research Grant of Rs. 10 Million Received</span>
                <span><span class="tnew">New</span> 5th Convocation Ceremony — Degrees Distributed to 2000+ Graduates</span>
                <span><span class="tnew">New</span> New BS Artificial Intelligence Program Launched for Fall 2025</span>
                {{-- Duplicate for seamless loop --}}
                <span><span class="tnew">New</span> Registrar Office Notification regarding On-Campus Physical Classes from 6th April 2026</span>
                <span><span class="tnew">New</span> Admissions Open for Fall 2025 — Apply Before 30th August</span>
                <span><span class="tnew">New</span> College Achieves Record QEC Score of 86.69 in 2024–25 Evaluation</span>
                <span><span class="tnew">New</span> HEC Research Grant of Rs. 10 Million Received</span>
                <span><span class="tnew">New</span> 5th Convocation Ceremony — Degrees Distributed to 2000+ Graduates</span>
                <span><span class="tnew">New</span> New BS Artificial Intelligence Program Launched for Fall 2025</span>
            </div>
        </div>
    </div>
</div>

{{-- ══════════════════════════════════════════
     3. ICON GRID  (6 boxes — exactly Screenshot 1 top row)
══════════════════════════════════════════ --}}
<section class="icon-section">
    <div class="container">
        <div class="icon-grid">
            <a href="#" class="icon-box">
                <div class="ibox-img">🖼️</div>
                <p>GPM Gallery</p>
            </a>
            <a href="#" class="icon-box">
                <div class="ibox-img">🔗</div>
                <p>Important Links</p>
            </a>
            <a href="{{ route('student-portal') }}" class="icon-box">
                <div class="ibox-img">🖥️</div>
                <p>GPM Portals</p>
            </a>
            <a href="#" class="icon-box">
                <div class="ibox-img">📋</div>
                <p>GPM Tenders</p>
            </a>
            <a href="#" class="icon-box">
                <div class="ibox-img">👶</div>
                <p>Day Care Center</p>
            </a>
            <a href="#" class="icon-box">
                <div class="ibox-img">♿</div>
                <p>DRC-GPM</p>
            </a>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     4. PROMO BANNERS  (3 banners — Screenshot 1 bottom row)
══════════════════════════════════════════ --}}
<section class="promo-section">
    <div class="container">
        <div class="promo-grid">
            <a href="#">
                <img src="https://images.unsplash.com/photo-1497633762265-9d179a990aa6?w=600&h=160&fit=crop" alt="Affiliated Institutions">
            </a>
            <a href="#">
                <img src="https://images.unsplash.com/photo-1532094349884-543559052dee?w=600&h=160&fit=crop" alt="Research Projects">
            </a>
            <a href="#">
                <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b6f60?w=600&h=160&fit=crop" alt="Scholarships">
            </a>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     5. VC + HIGHLIGHTS + NEWS  (Screenshot 2 exact)
══════════════════════════════════════════ --}}
<section class="info-section">
    <div class="container">
        <div class="info-grid">

            {{-- LEFT: PRINCIPAL --}}
            <div class="info-card">
                <div class="info-hdr">PRINCIPAL / VICE CHANCELLOR</div>
                <div class="info-body">
                    <div class="vc-row">
                        {{-- Replace with: <img class="vc-photo" src="{{ asset('images/principle.jpg') }}" alt="Principal"> --}}
                        <div style="width:100px;height:120px;background:#1a3a6c;flex-shrink:0;display:flex;align-items:center;justify-content:center;color:#fff;font-size:36px;border-radius:4px;">👤</div>
                        <div class="vc-text">
                            The long term growth and sustainable development of nations depends largely on the professional performances of its human resources.
                            Human resources can perform professionally, only if their capacities are built, constantly updated and continuously upgraded with the passage of time, and they are motivated enough to work individually and collectively towards solutions of current problems &amp; prevention of new ones. This all can happen only in presence of an all-inclusive, vibrant, dynamic and competitive higher education system matching national &amp; interna ......
                            <a href="#">View More</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- MIDDLE: HIGHLIGHTS --}}
            <div class="info-card">
                <div class="info-hdr">IMPORTANT HIGHLIGHTS</div>
                <div class="info-body">
                    <ul class="info-list">
                        <li>
                            <span class="new-tag">New</span>
                            <a href="#">Revised Fee Schedule for Semester Fee of Spring 2026</a>
                        </li>
                        <li>
                            <span class="new-tag">New</span>
                            <a href="#">GPM achieved another milestone in digitalization with NBP Payment Portal</a>
                        </li>
                        <li>
                            <span class="new-tag">New</span>
                            <a href="#">Circular regarding Professional Conduct &amp; Conflict Resolution</a>
                        </li>
                        <li>
                            <span class="new-tag">New</span>
                            <a href="#">HEC Policy on Protection against Sexual Harassment in HEIs 2021</a>
                        </li>
                        <li>
                            <span class="new-tag">New</span>
                            <a href="#">Higher Education Commission Policy on Drug &amp; Tobacco Abuse</a>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- RIGHT: NEWS & EVENTS --}}
            <div class="info-card">
                <div class="info-hdr">
                    NEWS &amp; EVENTS
                    <a href="{{ route('news') }}">View All</a>
                </div>
                <div class="info-body">
                    <ul class="info-list">
                        <li>
                            <span class="arr">▶</span>
                            <div>
                                <a href="#">Registrar Office: University Resumes On-Campus Classes from April 6</a>
                                <span class="new-tag">New</span>
                                <span class="news-date">01 Apr 2026</span>
                            </div>
                        </li>
                        <li>
                            <span class="arr">▶</span>
                            <div>
                                <a href="#">GPM Achieves Major Digital Milestone with NBP Payment Portal</a>
                                <span class="new-tag">New</span>
                                <span class="news-date">02 Feb 2026</span>
                            </div>
                        </li>
                        <li>
                            <span class="arr">▶</span>
                            <div>
                                <a href="#">One-Day Training on Program Review for Effectiveness (PREE)</a>
                                <span class="new-tag">New</span>
                                <span class="news-date">02 Feb 2026</span>
                            </div>
                        </li>
                        <li>
                            <span class="arr">▶</span>
                            <div>
                                <a href="#">Schedule For Submission Of Sport Fee — Undergraduate Programs Spring 2026</a>
                                <span class="news-date">30 Jan 2026</span>
                            </div>
                        </li>
                        <li>
                            <span class="arr">▶</span>
                            <div>
                                <a href="#">5th Convocation Ceremony Held at Government Postgraduate College Mansehra</a>
                                <span class="news-date">30 Jan 2026</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     6. STATS  (dark blue glow — Screenshot 3 exact)
══════════════════════════════════════════ --}}
<section class="stats-section">
    <div class="container">
        <div class="stats-grid-4">
            <div class="stat-box">
                <i class="fas fa-building"></i>
                <div class="s-num">27</div>
                <div class="s-lbl">Departments</div>
            </div>
            <div class="stat-box">
                <i class="fas fa-book-open"></i>
                <div class="s-num">144</div>
                <div class="s-lbl">Programs</div>
            </div>
            <div class="stat-box">
                <i class="fas fa-user-tie"></i>
                <div class="s-num">335</div>
                <div class="s-lbl">Faculty</div>
            </div>
            <div class="stat-box">
                <i class="fas fa-user-graduate"></i>
                <div class="s-num">10,200</div>
                <div class="s-lbl">Students</div>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     7. QUOTE + ABOUT LINKS  (Screenshot 4 exact)
══════════════════════════════════════════ --}}
<section class="quote-section">
    <div class="container">
        <div class="quote-card" data-aos="fade-up">
            <div class="quote-icon-circle">
                <i class="fas fa-info" style="font-size:36px;"></i>
            </div>
            <div class="quote-body">
                <strong>
                    "Destroying any nation does not require the use of atomic bombs or the use of long range missiles.
                    <em>It only requires lowering the quality of education and allowing cheating in the examinations by the students.</em>"
                </strong>
                Patients die at the hands of such doctors. Buildings collapse at the hands of such engineers.
                Money is lost at the hands of such economists &amp; accountants. Humanity dies at the hands of such religious scholars.
                Justice is lost at the hands of such judges...
                <strong>"The collapse of education is the collapse of the nation."</strong>
                <span class="q-source">Source:- Written at the entrance gate of UNISA, South Africa.</span>
            </div>
        </div>
    </div>
</section>

{{-- About UOH circles row — Screenshot 4 bottom --}}
<section class="about-links-section">
    <div class="container">
        <div class="about-circles" data-aos="fade-up">
            <a href="#" class="about-circle-item">
                <div class="circle-icon"><i class="fas fa-history"></i></div>
                <span>About<br>GPM</span>
            </a>
            <a href="#" class="about-circle-item">
                <div class="circle-icon"><i class="fas fa-eye"></i></div>
                <span>Vision &amp;<br>Mission</span>
            </a>
            <a href="#" class="about-circle-item">
                <div class="circle-icon"><i class="fas fa-award"></i></div>
                <span>Social<br>Work</span>
            </a>
            <a href="#" class="about-circle-item">
                <div class="circle-icon"><i class="fas fa-bus"></i></div>
                <span>GPM<br>Transport</span>
            </a>
            <a href="#" class="about-circle-item">
                <div class="circle-icon"><i class="fas fa-building"></i></div>
                <span>GPM<br>Hostels</span>
            </a>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
new Swiper('.banner-swiper', {
    loop: true,
    speed: 900,
    effect: 'fade',
    fadeEffect: { crossFade: true },
    autoplay: { delay: 4500, disableOnInteraction: false, pauseOnMouseEnter: true },
    pagination: { el: '.banner-swiper .swiper-pagination', clickable: true },
    navigation: {
        nextEl: '.banner-swiper .swiper-button-next',
        prevEl: '.banner-swiper .swiper-button-prev',
    },
});
</script>
@endpush
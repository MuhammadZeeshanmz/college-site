@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

@section('title', 'Government Postgraduate College Mansehra - Excellence in Education')

@push('styles')
<style>
/* ══════════════════════════════════════════
   1. BANNER SLIDER
══════════════════════════════════════════ */
.banner-section {
    width:100%; overflow:hidden;
    background:#0a1e3d; position:relative;
}
.banner-swiper {
    width:100%;
    height:clamp(220px, 32vw, 480px);
}
.slide-layout {
    display:flex;
    width:100%; height:100%;
}
.slide-text-panel {
    width:280px; flex-shrink:0;
    background:linear-gradient(135deg,#071e3d 0%,#0b3c5d 100%);
    display:flex; flex-direction:column;
    justify-content:center; align-items:flex-start;
    padding:30px 28px; gap:10px;
    position:relative; z-index:2;
}
.slide-text-panel::after {
    content:'';
    position:absolute; top:0; right:-18px; bottom:0;
    width:36px;
    background:inherit;
    clip-path:polygon(0 0, 0% 100%, 100% 100%);
    z-index:3;
}
.slide-category {
    display:inline-block;
    background:rgba(200,147,10,0.9);
    color:#fff; font-size:10px; font-weight:700;
    padding:3px 12px; border-radius:20px;
    text-transform:uppercase; letter-spacing:.08em;
    margin-bottom:4px;
}
.slide-title {
    font-family:'Playfair Display', Georgia, serif;
    font-size:clamp(16px, 2vw, 26px);
    font-weight:800; color:#fff;
    line-height:1.25; margin:0;
    text-shadow:0 2px 8px rgba(0,0,0,.4);
}
.slide-subtitle {
    font-size:clamp(11px, 1.1vw, 13px);
    color:rgba(255,255,255,.8);
    line-height:1.5; margin:0;
}
.slide-btn {
    display:inline-block; margin-top:6px;
    background:#c8930a; color:#fff;
    font-size:12px; font-weight:700;
    padding:7px 18px; border-radius:4px;
    text-decoration:none; letter-spacing:.04em;
    transition:background .2s, transform .2s;
}
.slide-btn:hover { background:#e0a812; transform:translateX(3px); }

.slide-photo-grid {
    flex:1; display:grid; gap:3px;
    overflow:hidden; height:100%;
    background:#0a1e3d;
}
.slide-photo-grid img {
    width:100%; height:100%;
    object-fit:cover; display:block;
    transition:transform 6s ease;
    background:linear-gradient(135deg,#0b3c5d,#1a6fa8);
}
.swiper-slide-active .slide-photo-grid img { transform:scale(1.04); }
.grid-2x2 {
    grid-template-columns:1fr 1fr;
    grid-template-rows:1fr 1fr;
}
.grid-3col {
    grid-template-columns:1fr 1fr 1fr;
    grid-template-rows:1fr;
}
.swiper-progress-bar {
    position:absolute; bottom:0; left:0; height:3px;
    background:#c8930a; z-index:10; width:0%;
    animation:swiper-progress 4.5s linear infinite;
}
@keyframes swiper-progress { 0%{width:0%;}100%{width:100%;} }
.banner-swiper .swiper-pagination { bottom:10px !important; right:20px !important; left:auto !important; width:auto !important; }
.banner-swiper .swiper-pagination-bullet { width:8px; height:8px; background:rgba(255,255,255,.5); opacity:1; transition:all .3s; }
.banner-swiper .swiper-pagination-bullet-active { background:#c8930a; width:26px; border-radius:4px; }
.banner-swiper .swiper-button-next,
.banner-swiper .swiper-button-prev {
    width:38px; height:38px;
    background:rgba(0,0,0,.5);
    border:1px solid rgba(255,255,255,.25);
    border-radius:4px; color:#fff;
    backdrop-filter:blur(4px); transition:all .25s;
}
.banner-swiper .swiper-button-next:hover,
.banner-swiper .swiper-button-prev:hover { background:#c8930a; border-color:#c8930a; }
.banner-swiper .swiper-button-next::after,
.banner-swiper .swiper-button-prev::after { font-size:13px; font-weight:800; }

/* ══════════════════════════════════════════
   2. NEWS TICKER
══════════════════════════════════════════ */
.news-ticker-bar {
    background:#fff; border-top:1px solid #ddd;
    border-bottom:2px solid #0b6a7c; padding:8px 0; overflow:hidden;
}
.ticker-wrap { max-width:1280px; margin:auto; padding:0 20px; display:flex; align-items:center; gap:0; }
.ticker-lbl {
    background:#c8930a; color:#fff; font-size:11px; font-weight:700;
    padding:4px 12px; border-radius:3px; text-transform:uppercase;
    letter-spacing:.07em; flex-shrink:0; margin-right:16px; white-space:nowrap;
}
.ticker-scroll { overflow:hidden; flex:1; }
.ticker-inner {
    display:flex; gap:50px;
    animation:scroll-ticker 35s linear infinite;
    white-space:nowrap; font-size:13px; color:#1a3a5c; font-weight:500;
}
.ticker-inner span { display:flex; align-items:center; gap:6px; }
.ticker-inner span .tnew { color:red; font-weight:800; font-size:11px; }
@keyframes scroll-ticker { 0%{transform:translateX(0);}100%{transform:translateX(-50%);} }

/* ══════════════════════════════════════════
   3. ICON GRID
══════════════════════════════════════════ */
.icon-section { background:#f5f5f5; padding:28px 0; border-bottom:1px solid #ddd; }
.icon-grid { display:grid; grid-template-columns:repeat(6,1fr); gap:16px; }
.icon-box {
    background:#fff; border:1px solid #ddd; text-align:center;
    padding:18px 12px; border-radius:6px; text-decoration:none;
    transition:all .25s; display:flex; flex-direction:column; align-items:center; gap:10px; color:#1a3a5c;
}
.icon-box:hover { transform:translateY(-5px); box-shadow:0 8px 24px rgba(0,0,0,.1); border-color:#0b6a7c; }
.icon-box .ibox-img {
    width:80px; height:80px; border-radius:50%;
    display:flex; align-items:center; justify-content:center; font-size:32px;
    background:#e8f5ee; border:2px solid #c8d8e8; transition:background .25s;
}
.icon-box:hover .ibox-img { background:#0b6a7c; color:#fff; }
.icon-box p { font-size:13px; font-weight:700; color:#0b6a7c; margin:0; }

/* ══════════════════════════════════════════
   4. PROMO BANNERS
══════════════════════════════════════════ */
.promo-section { padding:20px 0; background:#fff; }
.promo-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:16px; }
.promo-grid a { display:block; border-radius:6px; overflow:hidden; border:1px solid #ddd; transition:all .25s; }
.promo-grid a:hover { box-shadow:0 6px 20px rgba(0,0,0,.15); transform:translateY(-2px); }
.promo-grid img { width:100%; height:160px; object-fit:cover; display:block; transition:transform .4s; }
.promo-grid a:hover img { transform:scale(1.04); }

/* ══════════════════════════════════════════
   5. INFO SECTION
══════════════════════════════════════════ */
.info-section { background:#f4f4f4; padding:28px 0; }
.info-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:18px; }
.info-card { background:#fff; border-radius:4px; overflow:hidden; width:100%; }
.info-hdr {
    background:#0b6a7c; color:#fff; padding:11px 16px;
    font-weight:700; font-size:13.5px; text-align:center;
    letter-spacing:.05em; text-transform:uppercase;
    display:flex; align-items:center; justify-content:center; gap:10px;
}
.info-hdr a { color:#ffd700; font-size:12px; font-weight:600; text-decoration:none; margin-left:auto; }
.info-hdr a:hover { text-decoration:underline; }
.info-body { padding:14px 16px; }
.vc-text { font-size:13px; line-height:1.7; color:#444; text-align:justify; }
.vc-text a { color:#0b6a7c; font-weight:600; text-decoration:none; }
.vc-text a:hover { text-decoration:underline; }
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
.news-scroll-wrap { height:220px; overflow:hidden; position:relative; }
.news-scroll-wrap::after {
    content:''; position:absolute; bottom:0; left:0; right:0;
    height:32px; background:linear-gradient(transparent,#fff);
    pointer-events:none; z-index:1;
}
.news-scroll-inner { animation:newsUp 20s linear infinite; }
.news-scroll-inner:hover { animation-play-state:paused; }
@keyframes newsUp { 0%{transform:translateY(0);}100%{transform:translateY(-50%);} }

/* ══════════════════════════════════════════
   6. STATS STRIP
══════════════════════════════════════════ */
.stats-section {
    background:linear-gradient(135deg,#071e3d 0%,#0b3c5d 40%,#1c5d85 70%,#0b3c5d 100%);
    padding:40px 0;
}
.stats-grid-4 { display:grid; grid-template-columns:repeat(4,1fr); gap:20px; }
.stat-box {
    background:rgba(255,255,255,.06); border:1.5px solid rgba(255,255,255,.18);
    border-radius:12px; padding:30px 16px; text-align:center; color:#fff;
    backdrop-filter:blur(6px);
    box-shadow:0 0 20px rgba(0,200,255,.08);
    opacity:0;
    transform:translateY(30px);
    transition:opacity .6s ease, transform .6s ease, box-shadow .3s, border-color .3s;
}
.stat-box.visible { opacity:1; transform:translateY(0); }
.stat-box:nth-child(1) { transition-delay:.1s; }
.stat-box:nth-child(2) { transition-delay:.2s; }
.stat-box:nth-child(3) { transition-delay:.3s; }
.stat-box:nth-child(4) { transition-delay:.4s; }
.stat-box:hover { transform:translateY(-6px) scale(1.02); box-shadow:0 0 30px rgba(0,200,255,.25); border-color:rgba(255,255,255,.35); }
.stat-box i {
    font-size:38px; color:#4af0a0; margin-bottom:12px; display:block;
    transition:transform .3s;
}
.stat-box:hover i { transform:scale(1.2) rotate(-5deg); }
.stat-box .s-num {
    font-family:'Playfair Display',serif; font-size:36px; font-weight:800;
    color:#fff; line-height:1; margin-bottom:8px;
    transition:color .3s;
}
.stat-box:hover .s-num { color:#4af0a0; }
.stat-box .s-lbl { font-size:12px; letter-spacing:2px; font-weight:700; color:rgba(255,255,255,.6); text-transform:uppercase; }

/* ══════════════════════════════════════════
   7. QUOTE
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

/* ══════════════════════════════════════════
   8. ABOUT CIRCLES
══════════════════════════════════════════ */
.about-links-section { background:#fff; padding:40px 0 44px; }
.about-circles { display:flex; justify-content:center; align-items:flex-end; gap:0; position:relative; }
.about-circles::before {
    content:''; position:absolute; top:50px; left:10%; right:10%;
    height:2px; background:#cdd; z-index:0;
}
.about-circle-item {
    display:flex; flex-direction:column; align-items:center; gap:14px;
    text-decoration:none; flex:1; position:relative; z-index:1;
    opacity:0; transform:translateY(20px);
    transition:opacity .5s ease, transform .5s ease;
}
.about-circle-item.visible { opacity:1; transform:translateY(0); }
.about-circle-item:nth-child(1) { transition-delay:.1s; }
.about-circle-item:nth-child(2) { transition-delay:.2s; }
.about-circle-item:nth-child(3) { transition-delay:.3s; }
.about-circle-item:nth-child(4) { transition-delay:.4s; }
.about-circle-item:nth-child(5) { transition-delay:.5s; }
.about-circle-item .circle-icon {
    width:100px; height:100px; border-radius:50%;
    background:#1a3a6c; display:flex; align-items:center; justify-content:center;
    font-size:36px; color:#fff;
    transition:all .35s cubic-bezier(.34,1.56,.64,1);
    border:4px solid #fff; box-shadow:0 4px 16px rgba(26,58,108,.25);
}
.about-circle-item:hover .circle-icon {
    background:#0b6a7c;
    transform:translateY(-10px) scale(1.08);
    box-shadow:0 14px 32px rgba(11,106,124,.4);
}
.about-circle-item span {
    font-size:12px; font-weight:800; color:#1a3a6c;
    text-transform:uppercase; letter-spacing:.06em;
    text-align:center; line-height:1.3;
    transition:color .3s;
}
.about-circle-item:hover span { color:#0b6a7c; }

/* ══════════════════════════════════════════
   RESPONSIVE
══════════════════════════════════════════ */
@media(max-width:1024px) {
    .icon-grid { grid-template-columns:repeat(3,1fr); }
    .promo-grid { grid-template-columns:repeat(2,1fr); }
    .stats-grid-4 { grid-template-columns:repeat(2,1fr); }
}
@media(max-width:768px) {
    .slide-layout { flex-direction:column; }
    .slide-text-panel { width:100%; height:auto; padding:18px 20px; }
    .slide-text-panel::after { display:none; }
    .slide-photo-grid { height:180px; }
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
    .slide-photo-grid { height:140px; }
    .grid-3col { grid-template-columns:1fr 1fr; }
    .grid-3col img:last-child { display:none; }
}
</style>
@endpush

@section('content')

{{-- 1. BANNER SLIDER --}}
<div class="banner-section">
    <div class="swiper banner-swiper">
        <div class="swiper-wrapper">

            {{-- SLIDE 1 --}}
            <div class="swiper-slide">
                <div class="slide-layout">
                    <div class="slide-text-panel">
                        <div class="slide-category">📢 Announcement</div>
                        <h2 class="slide-title">Fall 2025 Admissions</h2>
                        <p class="slide-subtitle">Apply Now Before Seats Fill Up!</p>
                        <a href="#" class="slide-btn">Apply Now →</a>
                    </div>
                    <div class="slide-photo-grid grid-2x2">
                        <img src="{{ asset('images/slide4.jpg') }}" alt=""
                             onerror="this.style.background='linear-gradient(135deg,#071e3d,#1a6fa8)';this.style.opacity='.7';">
                        <img src="{{ asset('images/slide5.jpg') }}" alt=""
                             onerror="this.style.background='linear-gradient(135deg,#0b3c5d,#c8930a)';this.style.opacity='.7';">
                        <img src="{{ asset('images/slide6.jpg') }}" alt=""
                             onerror="this.style.background='linear-gradient(135deg,#1a6fa8,#071e3d)';this.style.opacity='.7';">
                        <img src="{{ asset('images/slide4.jpg') }}" alt=""
                             onerror="this.style.background='linear-gradient(135deg,#c8930a,#0b3c5d)';this.style.opacity='.7';">
                    </div>
                </div>
            </div>

            {{-- SLIDE 2 --}}
            <div class="swiper-slide">
                <div class="slide-layout">
                    <div class="slide-text-panel" style="background:linear-gradient(135deg,#1a3a6c,#0b6a7c);">
                        <div class="slide-category">🎓 Event</div>
                        <h2 class="slide-title">5th Annual Convocation</h2>
                        <p class="slide-subtitle">Over 2,000 Graduates Celebrated</p>
                        <a href="#" class="slide-btn">View Details →</a>
                    </div>
                    <div class="slide-photo-grid grid-2x2">
                        <img src="{{ asset('images/slide4.jpg') }}" alt=""
                             onerror="this.style.background='linear-gradient(135deg,#1a3a6c,#0b6a7c)';this.style.opacity='.8';">
                        <img src="{{ asset('images/slide5.jpg') }}" alt=""
                             onerror="this.style.background='linear-gradient(135deg,#0b6a7c,#1a3a6c)';this.style.opacity='.8';">
                        {{-- <img src="{{ asset('images/slide6.jpg') }}" alt=""
                             onerror="this.style.background='linear-gradient(135deg,#071e3d,#1a6fa8)';this.style.opacity='.8';">
                        <img src="{{ asset('images/slide4.jpg') }}" alt=""
                             onerror="this.style.background='linear-gradient(135deg,#1a6fa8,#071e3d)';this.style.opacity='.8';"> --}}
                    </div>
                </div>
            </div>

            {{-- SLIDE 3 --}}
            <div class="swiper-slide">
                <div class="slide-layout">
                    <div class="slide-text-panel" style="background:linear-gradient(135deg,#0b3c5d,#1a6fa8);">
                        <div class="slide-category">🏆 Achievement</div>
                        <h2 class="slide-title">Record QEC Score</h2>
                        <p class="slide-subtitle">86.69 in 2024–25 Evaluation</p>
                        <a href="#" class="slide-btn">Read More →</a>
                    </div>
                    <div class="slide-photo-grid grid-3col">
                        <img src="{{ asset('images/slide4.jpg') }}" alt=""
                             onerror="this.style.background='linear-gradient(135deg,#0b3c5d,#c8930a)';this.style.opacity='.8';">
                        <img src="{{ asset('images/slide5.jpg') }}" alt=""
                             onerror="this.style.background='linear-gradient(135deg,#1a6fa8,#0b3c5d)';this.style.opacity='.8';">
                        <img src="{{ asset('images/slide6.jpg') }}" alt=""
                             onerror="this.style.background='linear-gradient(135deg,#c8930a,#1a6fa8)';this.style.opacity='.8';">
                    </div>
                </div>
            </div>

            {{-- SLIDE 4 --}}
            <div class="swiper-slide">
                <div class="slide-layout">
                    <div class="slide-text-panel" style="background:linear-gradient(135deg,#4a1a6c,#8b1a8a);">
                        <div class="slide-category">🔬 Research</div>
                        <h2 class="slide-title">HEC Research Grant</h2>
                        <p class="slide-subtitle">Rs. 10 Million — Advancing Science at GPGCM</p>
                        <a href="#" class="slide-btn">Learn More →</a>
                    </div>
                    <div class="slide-photo-grid grid-2x2">
                        <img src="{{ asset('images/slide4.jpg') }}" alt=""
                             onerror="this.style.background='linear-gradient(135deg,#4a1a6c,#8b1a8a)';this.style.opacity='.8';">
                        <img src="{{ asset('images/slide5.jpg') }}" alt=""
                             onerror="this.style.background='linear-gradient(135deg,#8b1a8a,#4a1a6c)';this.style.opacity='.8';">
                        <img src="{{ asset('images/slide6.jpg') }}" alt=""
                             onerror="this.style.background='linear-gradient(135deg,#4a1a6c,#1a6fa8)';this.style.opacity='.8';">
                        <img src="{{ asset('images/slide4.jpg') }}" alt=""
                             onerror="this.style.background='linear-gradient(135deg,#1a6fa8,#4a1a6c)';this.style.opacity='.8';">
                    </div>
                </div>
            </div>

        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-pagination"></div>
    </div>
    <div class="swiper-progress-bar"></div>
</div>

{{-- 2. NEWS TICKER --}}
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

{{-- 3. ICON GRID --}}
<section class="icon-section">
    <div class="container">
        <div class="icon-grid">
            <a href="{{ route('gcm-gallery') }}" class="icon-box">
                <div class="ibox-img">🖼️</div>
                <p>GCM Gallery</p>
            </a>
            <a href="{{ route('important') }}" class="icon-box">
                <div class="ibox-img">🔗</div>
                <p>Important Links</p>
            </a>
            <a href="{{ route('student-portal') }}" class="icon-box">
                <div class="ibox-img">🖥️</div>
                <p>GCM Portals</p>
            </a>
            <a href="{{ route('tenders') }}" class="icon-box">
                <div class="ibox-img">📋</div>
                <p>GCM Tenders</p>
            </a>
            <a href="#" class="icon-box">
                <div class="ibox-img">👶</div>
                <p>Day Care Center</p>
            </a>
            <a href="#" class="icon-box">
                <div class="ibox-img">♿</div>
                <p>DRC-GCM</p>
            </a>
        </div>
    </div>
</section>

{{-- 4. PROMO BANNERS --}}
<section class="promo-section">
    <div class="container">
        <div class="promo-grid">
            <a href="#">
                <img src="{{ asset('images/banner1.jpg') }}" alt="Admissions Open"
                     onerror="this.style.background='linear-gradient(135deg,#071e3d,#1a6fa8)';this.style.minHeight='160px';this.style.display='block';">
            </a>
            <a href="#">
                <img src="{{ asset('images/banner2.jpg') }}" alt="Research Projects"
                     onerror="this.style.background='linear-gradient(135deg,#0b6a7c,#c8930a)';this.style.minHeight='160px';this.style.display='block';">
            </a>
            <a href="#">
                <img src="{{ asset('images/banner3.jpg') }}" alt="Scholarships"
                     onerror="this.style.background='linear-gradient(135deg,#1a3a6c,#0b3c5d)';this.style.minHeight='160px';this.style.display='block';">
            </a>
        </div>
    </div>
</section>

{{-- 5. PRINCIPAL + HIGHLIGHTS + NEWS --}}
<section class="info-section">
    <div class="container">
        <div class="info-grid">

            {{-- LEFT: PRINCIPAL --}}
            <div class="info-card">
                <div class="info-hdr">PRINCIPAL</div>
                <div class="info-body" style="padding:14px 16px;">
                    <div style="display:flex; gap:12px; align-items:flex-start; margin-bottom:10px;">
                        <div style="flex-shrink:0; text-align:center;">
                            <img src="{{ asset('images/principle.jpg') }}" alt="Principal"
                                 style="width:120px; height:145px; object-fit:cover; border-radius:6px; display:block;">
                            <div style="margin-top:6px; font-weight:700; font-size:12px; color:#1a3a5c; width:120px; line-height:1.3;">
                                Prof. [Raiz Hussain]
                            </div>
                            <div style="font-size:11px; color:#666; margin-top:2px; width:120px;">
                                Principal, GPGC Mansehra
                            </div>
                        </div>
                        <div class="vc-text">
                            <span id="vc-short">
                                The long term growth and sustainable development of nations depends largely on the professional performances of its human resources.
                                Human resources can perform professionally, only if their capacities are built, constantly updated and continuously upgraded with the passage of time...
                            </span>
                            <span id="vc-full" style="display:none;">
                                The long term growth and sustainable development of nations depends largely on the professional performances of its human resources.
                                Human resources can perform professionally, only if their capacities are built, constantly updated and continuously upgraded with the passage of time,
                                and they are motivated enough to work individually and collectively towards solutions of current problems &amp; prevention of new ones.
                                This all can happen only in presence of an all-inclusive, vibrant, dynamic and competitive higher education system matching national &amp; international standards.
                                <br><br>
                                Government Postgraduate College Mansehra has always been at the forefront of providing quality education in Khyber Pakhtunkhwa.
                                We are committed to nurturing the intellectual, moral and professional development of our students through a comprehensive academic environment.
                                <br><br>
                                I invite all prospective students to join our vibrant academic community and take advantage of the excellent educational opportunities that GPGC Mansehra has to offer.
                            </span>
                            <br>
                            <a href="#" id="vc-toggle-btn"
                               style="color:#0b6a7c; font-weight:600; text-decoration:none; font-size:13px; display:inline-block; margin-top:6px;">
                                View More ▼
                            </a>
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
                <div class="info-body" style="padding:0;">
                    <div class="news-scroll-wrap">
                        <div class="news-scroll-inner">
                            <ul class="info-list" style="margin:0; padding:0 16px;">
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
                                        <a href="#">Schedule For Submission Of Sport Fee — Spring 2026</a>
                                        <span class="news-date">30 Jan 2026</span>
                                    </div>
                                </li>
                                <li>
                                    <span class="arr">▶</span>
                                    <div>
                                        <a href="#">5th Convocation Ceremony Held at GPGC Mansehra</a>
                                        <span class="news-date">30 Jan 2026</span>
                                    </div>
                                </li>
                                <li>
                                    <span class="arr">▶</span>
                                    <div>
                                        <a href="#">Transport Registration Open for Fall 2026 Semester</a>
                                        <span class="news-date">15 Jan 2026</span>
                                    </div>
                                </li>
                                {{-- Duplicate for seamless loop --}}
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
                                        <a href="#">Schedule For Submission Of Sport Fee — Spring 2026</a>
                                        <span class="news-date">30 Jan 2026</span>
                                    </div>
                                </li>
                                <li>
                                    <span class="arr">▶</span>
                                    <div>
                                        <a href="#">5th Convocation Ceremony Held at GPGC Mansehra</a>
                                        <span class="news-date">30 Jan 2026</span>
                                    </div>
                                </li>
                                <li>
                                    <span class="arr">▶</span>
                                    <div>
                                        <a href="#">Transport Registration Open for Fall 2026 Semester</a>
                                        <span class="news-date">15 Jan 2026</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- 6. STATS --}}
<section class="stats-section" id="statsSection">
    <div class="container">
        <div class="stats-grid-4">
            <div class="stat-box">
                <i class="fas fa-building"></i>
                <div class="s-num" data-target="27">0</div>
                <div class="s-lbl">Departments</div>
            </div>
            <div class="stat-box">
                <i class="fas fa-book-open"></i>
                <div class="s-num" data-target="144">0</div>
                <div class="s-lbl">Programs</div>
            </div>
            <div class="stat-box">
                <i class="fas fa-user-tie"></i>
                <div class="s-num" data-target="335">0</div>
                <div class="s-lbl">Faculty</div>
            </div>
            <div class="stat-box">
                <i class="fas fa-user-graduate"></i>
                <div class="s-num" data-target="10200" data-display="10,200">0</div>
                <div class="s-lbl">Students</div>
            </div>
        </div>
    </div>
</section>

{{-- 7. QUOTE --}}
<section class="quote-section">
    <div class="container">
        <div class="quote-card">
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

{{-- 8. ABOUT CIRCLES --}}
<section class="about-links-section" id="circlesSection">
    <div class="container">
        <div class="about-circles">
            <a href="{{ route('about-us') }}" class="about-circle-item">
                <div class="circle-icon"><i class="fas fa-history"></i></div>
                <span>About<br>GPM</span>
            </a>
            <a href="{{ route('vission-mission') }}" class="about-circle-item">
                <div class="circle-icon"><i class="fas fa-eye"></i></div>
                <span>Vision &amp;<br>Mission</span>
            </a>
            <a href="{{ route('social-work') }}" class="about-circle-item">
                <div class="circle-icon"><i class="fas fa-award"></i></div>
                <span>Social<br>Work</span>
            </a>
            <a href="{{ route('transport') }}" class="about-circle-item">
                <div class="circle-icon"><i class="fas fa-bus"></i></div>
                <span>GCM<br>Transport</span>
            </a>
            <a href="{{ route('hostel') }}" class="about-circle-item">
                <div class="circle-icon"><i class="fas fa-building"></i></div>
                <span>GCM<br>Hostels</span>
            </a>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
{{-- ── Swiper Banner ── --}}
new Swiper('.banner-swiper', {
    loop: true,
    speed: 900,
    effect: 'slide',
    autoplay: { delay: 4500, disableOnInteraction: false, pauseOnMouseEnter: true },
    pagination: { el: '.banner-swiper .swiper-pagination', clickable: true },
    navigation: {
        nextEl: '.banner-swiper .swiper-button-next',
        prevEl: '.banner-swiper .swiper-button-prev',
    },
    on: {
        slideChange: function () {
            const bar = document.querySelector('.swiper-progress-bar');
            if (bar) {
                bar.style.animation = 'none';
                bar.offsetHeight;
                bar.style.animation = 'swiper-progress 4.5s linear infinite';
            }
        }
    }
});

{{-- ── Principal View More / Less toggle ── --}}
document.addEventListener('DOMContentLoaded', function () {
    const btn   = document.getElementById('vc-toggle-btn');
    const short = document.getElementById('vc-short');
    const full  = document.getElementById('vc-full');
    if (btn) {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            if (full.style.display === 'none') {
                full.style.display  = 'inline';
                short.style.display = 'none';
                btn.textContent     = 'View Less ▲';
            } else {
                full.style.display  = 'none';
                short.style.display = 'inline';
                btn.textContent     = 'View More ▼';
            }
        });
    }
});

{{-- ── Counter animation helper ── --}}
function animateCounters(section) {
    section.querySelectorAll('.s-num[data-target]').forEach(function (el) {
        var target  = parseInt(el.dataset.target);
        var display = el.dataset.display;
        var dur     = 1800;
        var start   = performance.now();
        function tick(now) {
            var p    = Math.min((now - start) / dur, 1);
            var ease = 1 - Math.pow(1 - p, 3);
            var val  = Math.round(ease * target);
            el.textContent = (display && p >= 1) ? display : val.toLocaleString();
            if (p < 1) requestAnimationFrame(tick);
        }
        requestAnimationFrame(tick);
    });
}

{{-- ── IntersectionObserver for Stats + Circles ── --}}
var io = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
        if (entry.isIntersecting) {
            entry.target.querySelectorAll('.stat-box').forEach(function (b) {
                b.classList.add('visible');
            });
            entry.target.querySelectorAll('.about-circle-item').forEach(function (b) {
                b.classList.add('visible');
            });
            animateCounters(entry.target);
            io.unobserve(entry.target);
        }
    });
}, { threshold: 0.2 });

var statsEl   = document.getElementById('statsSection');
var circlesEl = document.getElementById('circlesSection');
if (statsEl)   io.observe(statsEl);
if (circlesEl) io.observe(circlesEl);
</script>
@endpush
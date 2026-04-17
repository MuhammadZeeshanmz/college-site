<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Government Postgraduate College Mansehra')</title>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700;800&family=DM+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
    /* ══════════════════════════════════════════
       PAGE-WIDE RESET & BODY
    ══════════════════════════════════════════ */
    :root {
        --green:        #1a5c38;
        --green-dark:   #0f3d24;
        --green-light:  #2e8b57;
        --green-pale:   #e8f5ee;
        --gold:         #c8930a;
        --gold-light:   #e8b84b;
        --white:        #ffffff;
        --bg:           #f7f9f8;
        --text:         #0d1f14;
        --text-muted:   #5a7565;
        --border:       #d4e5db;
        --shadow-sm:    0 1px 3px rgba(26,92,56,0.08);
        --shadow:       0 4px 16px rgba(26,92,56,0.1);
        --shadow-md:    0 8px 24px rgba(26,92,56,0.12);
        --shadow-lg:    0 16px 40px rgba(26,92,56,0.15);
        /* UOH nav blues */
        --uoh-dark:     #002855;
        --uoh-mid:      #004a8f;
        --uoh-bright:   #0066cc;
        --uoh-logo-bg:  linear-gradient(135deg,#002f6c 0%,#0055a4 50%,#0077cc 100%);
    }
    * { margin:0; padding:0; box-sizing:border-box; }
    html { scroll-behavior: smooth; }
    body { font-family:'DM Sans',sans-serif; background:var(--bg); color:var(--text); overflow-x:hidden; }
    ::-webkit-scrollbar { width:7px; }
    ::-webkit-scrollbar-track { background:#f0f4f8; }
    ::-webkit-scrollbar-thumb { background:var(--uoh-bright); border-radius:4px; }

    /* ══════════════════════════════════════════
       1. TOPBAR  (black strip — Email | Portals …)
    ══════════════════════════════════════════ */
    .uoh-topbar {
        background: #111;
        padding: 6px 0;
        font-size: 12px;
    }
    .uoh-topbar .wrap {
        max-width:1280px; margin:auto; padding:0 20px;
        display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:6px;
    }
    .topbar-links { display:flex; align-items:center; }
    .topbar-links a {
        color:#c5c5c5; text-decoration:none;
        padding:0 11px; border-right:1px solid #444; line-height:1;
        transition:color .2s; white-space:nowrap;
    }
    .topbar-links a:first-child { padding-left:0; }
    .topbar-links a:last-child  { border-right:none; }
    .topbar-links a:hover { color:#fff; }
    .topbar-icons { display:flex; gap:14px; }
    .topbar-icons a {
        color:#bbb; text-decoration:none; font-size:15px;
        transition:color .2s; line-height:1;
    }
    .topbar-icons a:hover { color:#fff; }

    /* ══════════════════════════════════════════
       2. LOGOBAR  (blue gradient — logo + quick-links grid)
    ══════════════════════════════════════════ */
    .uoh-logobar {
        background: var(--uoh-logo-bg);
        padding: 12px 0;
        border-bottom: 1px solid rgba(255,255,255,.1);
    }
    .uoh-logobar .wrap {
        max-width:1280px; margin:auto; padding:0 20px;
        display:flex; align-items:center; gap:24px;
    }
    .logo-block { display:flex; align-items:center; gap:16px; text-decoration:none; flex:1; min-width:0; }
    .logo-emblem {
        width:82px; height:82px; flex-shrink:0; border-radius:50%;
        background:#fff; border:3px solid rgba(255,255,255,.45);
        display:flex; align-items:center; justify-content:center; overflow:hidden;
    }
    .logo-emblem img { width:100%; height:100%; object-fit:contain; }
    .logo-emblem-text {
        font-family:'Playfair Display',serif; font-size:20px; font-weight:800;
        color:var(--uoh-dark); text-align:center; line-height:1.1;
    }
    .logo-text-block { color:#fff; min-width:0; }
    .college-name {
        font-family:'Playfair Display',serif;
        font-size:clamp(16px,2.2vw,26px); font-weight:700; line-height:1.25;
        letter-spacing:.01em;
    }
    .college-tagline {
        font-size:12.5px; font-style:italic; color:rgba(255,255,255,.75);
        margin-top:4px; letter-spacing:.03em;
    }
    /* quick-links 2-col grid */
    .quick-grid {
        flex-shrink:0; display:grid; grid-template-columns:1fr 1fr; gap:1px 32px;
    }
    .quick-grid a {
        display:flex; align-items:center; gap:8px;
        color:#e0eeff; text-decoration:none; font-size:12.5px; font-weight:500;
        padding:4px 0; white-space:nowrap; transition:color .2s;
    }
    .quick-grid a:hover { color:#ffd700; }
    .quick-grid a .qi {
        width:22px; height:22px; border-radius:50%;
        background:rgba(255,255,255,.18);
        display:flex; align-items:center; justify-content:center;
        font-size:11px; flex-shrink:0;
    }

    /* ══════════════════════════════════════════
       3. MAIN NAVBAR  (medium blue with menus)
    ══════════════════════════════════════════ */
    .uoh-nav {
        background: linear-gradient(90deg, var(--uoh-dark) 0%, var(--uoh-mid) 40%, var(--uoh-bright) 70%, var(--uoh-mid) 100%);
        position: sticky; top:0; z-index:1000;
        box-shadow: 0 3px 14px rgba(0,0,60,.4);
    }
    .uoh-nav .wrap {
        max-width:1280px; margin:auto; padding:0 20px;
        display:flex; align-items:stretch; justify-content:space-between;
    }
    .nav-list { display:flex; align-items:stretch; list-style:none; gap:0; }
    .nav-list > li { position:relative; }
    .nav-list > li > a {
        display:flex; align-items:center; gap:4px;
        color:#fff; text-decoration:none; font-size:13px; font-weight:500;
        padding:15px 13px; white-space:nowrap;
        border-bottom:3px solid transparent; transition:all .2s;
        letter-spacing:.01em;
    }
    .nav-list > li > a:hover,
    .nav-list > li.open > a {
        background:rgba(255,255,255,.13);
        border-bottom-color:#ffd700;
        color:#fff;
    }
    .nav-list > li > a .caret { font-size:8px; opacity:.7; }

    /* ── Regular dropdown ── */
    .nav-list > li:hover > .nav-dropdown { display:block; }
    .nav-dropdown {
        display:none; position:absolute; top:100%; left:0; z-index:2000;
        background:#fff; min-width:230px;
        border-top:3px solid var(--uoh-bright);
        box-shadow:0 8px 30px rgba(0,0,0,.18);
        border-radius:0 0 8px 8px; overflow:hidden;
    }
    .nav-dropdown a {
        display:flex; align-items:center; gap:8px;
        padding:9px 16px; font-size:12.5px; color:#1a3060;
        text-decoration:none; border-bottom:1px solid #eef2f8;
        transition:all .15s;
    }
    .nav-dropdown a:last-child { border-bottom:none; }
    .nav-dropdown a::before { content:'›'; color:var(--uoh-bright); font-weight:700; font-size:16px; }
    .nav-dropdown a:hover { background:#e8f0fc; color:var(--uoh-bright); padding-left:22px; }

    /* ── Mega dropdown ── */
    .nav-list > li:hover > .nav-mega { display:flex; }
    .nav-mega {
        display:none; position:absolute; top:100%; left:0; z-index:2000;
        background:#fff; border-top:3px solid var(--uoh-bright);
        box-shadow:0 8px 30px rgba(0,0,0,.18);
        border-radius:0 0 10px 10px; padding:22px 24px; gap:24px;
    }
    .mega-col { min-width:200px; }
    .mega-col h5 {
        font-size:11px; font-weight:700; color:var(--uoh-bright);
        text-transform:uppercase; letter-spacing:.08em;
        margin-bottom:10px; padding-bottom:7px;
        border-bottom:2px solid #e8f0f8;
    }
    .mega-col a {
        display:flex; align-items:flex-start; gap:6px;
        padding:5px 0; font-size:12.5px; color:#1a3060;
        text-decoration:none; border-bottom:1px solid #f4f7fc;
        transition:all .15s; line-height:1.35;
    }
    .mega-col a:last-child { border-bottom:none; }
    .mega-col a::before { content:'›'; color:var(--uoh-bright); font-weight:700; flex-shrink:0; margin-top:1px; }
    .mega-col a:hover { color:var(--uoh-bright); padding-left:6px; }

    /* ── Hamburger ── */
    .nav-hamburger { display:none; flex-direction:column; gap:5px; cursor:pointer; background:none; border:none; padding:10px 4px; }
    .nav-hamburger span { display:block; width:24px; height:2px; background:#fff; border-radius:2px; }

    /* ══════════════════════════════════════════
       4. CONTENT — shared section styles
          (used across home.blade.php etc.)
    ══════════════════════════════════════════ */
    section { padding:88px 0; }
    .container { max-width:1200px; margin:auto; padding:0 24px; }
    .section-tag {
        display:inline-block; background:var(--green-pale); color:var(--green);
        font-size:11.5px; font-weight:700; letter-spacing:.1em; text-transform:uppercase;
        padding:5px 14px; border-radius:100px; margin-bottom:12px;
        border:1px solid rgba(26,92,56,.18);
    }
    .section-title { font-family:'Playfair Display',serif; font-size:clamp(26px,3.2vw,38px); font-weight:700; color:var(--text); line-height:1.2; margin-bottom:12px; }
    .section-sub { font-size:15.5px; color:var(--text-muted); line-height:1.75; max-width:540px; }
    .section-header { margin-bottom:48px; }
    .section-header.center { text-align:center; }
    .section-header.center .section-sub { margin:0 auto; }

    /* ── Quick links ── */
    .ql-section { background:var(--white); padding:48px 0; border-bottom:1px solid var(--border); }
    .qlinks-grid { display:grid; grid-template-columns:repeat(auto-fill,minmax(130px,1fr)); gap:14px; }
    .qlink {
        background:var(--bg); border:1px solid var(--border); border-radius:14px;
        padding:22px 12px; text-align:center; text-decoration:none; color:var(--text);
        transition:all .25s; display:flex; flex-direction:column; align-items:center; gap:10px;
    }
    .qlink:hover { background:var(--green); color:#fff; border-color:var(--green); transform:translateY(-4px); box-shadow:var(--shadow-md); }
    .qlink-icon { width:44px; height:44px; background:var(--green-pale); border-radius:10px; display:flex; align-items:center; justify-content:center; font-size:20px; transition:background .25s; }
    .qlink:hover .qlink-icon { background:rgba(255,255,255,.18); }
    .qlink span { font-size:12.5px; font-weight:600; }

    /* ── Hero ── */
    .hero { position:relative; min-height:94vh; background:var(--green-dark); display:flex; align-items:center; overflow:hidden; }
    .hero-bg-pattern { position:absolute; inset:0; opacity:.05; background-image:radial-gradient(circle,#fff 1px,transparent 1px); background-size:40px 40px; }
    .hero-glow-left { position:absolute; bottom:-150px; left:-150px; width:500px; height:500px; border-radius:50%; background:radial-gradient(circle,rgba(46,139,87,.25) 0%,transparent 70%); }
    .hero-glow-right { position:absolute; top:-100px; right:-100px; width:600px; height:600px; border-radius:50%; background:radial-gradient(circle,rgba(200,147,10,.12) 0%,transparent 70%); }
    .hero-stripe { position:absolute; top:0; right:0; bottom:0; width:38%; background:linear-gradient(135deg,rgba(46,139,87,.08) 0%,rgba(26,92,56,.15) 100%); clip-path:polygon(12% 0,100% 0,100% 100%,0% 100%); }
    .hero-content { position:relative; z-index:2; max-width:1200px; margin:auto; padding:80px 24px; display:grid; grid-template-columns:1.1fr .9fr; gap:64px; align-items:center; }
    .hero-badge { display:inline-flex; align-items:center; gap:8px; background:rgba(200,147,10,.15); border:1px solid rgba(232,184,75,.4); color:var(--gold-light); font-size:12px; font-weight:600; letter-spacing:.1em; padding:6px 16px; border-radius:100px; text-transform:uppercase; margin-bottom:22px; }
    .hero-title { font-family:'Playfair Display',serif; font-size:clamp(36px,4.5vw,60px); font-weight:800; color:#fff; line-height:1.1; margin-bottom:20px; }
    .hero-title span { color:var(--gold-light); display:block; }
    .hero-desc { font-size:16.5px; color:rgba(255,255,255,.65); line-height:1.8; margin-bottom:34px; max-width:460px; }
    .hero-actions { display:flex; gap:14px; flex-wrap:wrap; }
    .btn-primary { background:var(--green-light); color:#fff; text-decoration:none; padding:13px 28px; border-radius:8px; font-weight:600; font-size:15px; transition:all .25s; display:inline-block; border:none; cursor:pointer; }
    .btn-primary:hover { background:var(--green); transform:translateY(-2px); box-shadow:0 6px 20px rgba(0,0,0,.2); }
    .btn-outline-w { border:1.5px solid rgba(255,255,255,.35); color:#fff; text-decoration:none; padding:12px 28px; border-radius:8px; font-weight:500; font-size:15px; transition:all .25s; display:inline-block; }
    .btn-outline-w:hover { background:rgba(255,255,255,.1); border-color:rgba(255,255,255,.6); }
    .hero-stats { display:flex; gap:28px; margin-top:44px; }
    .hero-stat { border-left:2px solid var(--gold); padding-left:14px; }
    .hero-stat .num { font-family:'Playfair Display',serif; font-size:28px; font-weight:700; color:#fff; }
    .hero-stat .lbl { font-size:11px; color:rgba(255,255,255,.45); text-transform:uppercase; letter-spacing:.07em; margin-top:2px; }
    .hero-card { background:rgba(255,255,255,.07); backdrop-filter:blur(12px); border:1px solid rgba(255,255,255,.14); border-radius:20px; padding:36px; }
    .hero-card h3 { font-family:'Playfair Display',serif; color:#fff; font-size:21px; margin-bottom:6px; }
    .hero-card .sub { font-size:13px; color:rgba(255,255,255,.45); margin-bottom:22px; }
    .form-field { margin-bottom:14px; }
    .form-field label { display:block; font-size:11px; color:rgba(255,255,255,.45); letter-spacing:.07em; text-transform:uppercase; margin-bottom:5px; }
    .form-field input,.form-field select { width:100%; background:rgba(255,255,255,.09); border:1px solid rgba(255,255,255,.18); color:#fff; padding:11px 14px; border-radius:8px; font-size:14px; font-family:'DM Sans',sans-serif; outline:none; transition:all .25s; }
    .form-field input::placeholder { color:rgba(255,255,255,.3); }
    .form-field input:focus,.form-field select:focus { border-color:var(--gold-light); background:rgba(255,255,255,.13); }
    .form-field select option { background:#0f3d24; }
    .btn-submit { width:100%; background:var(--gold); color:#fff; border:none; cursor:pointer; padding:13px; border-radius:8px; font-size:15px; font-weight:600; font-family:'DM Sans',sans-serif; margin-top:6px; transition:all .25s; }
    .btn-submit:hover { background:#a67608; transform:translateY(-1px); }

    /* ── Ticker ── */
    .ticker { background:var(--green); color:#fff; padding:11px 0; overflow:hidden; }
    .ticker-inner { max-width:1200px; margin:auto; padding:0 24px; display:flex; align-items:center; overflow:hidden; }
    .ticker-label { background:var(--gold); color:var(--green-dark); font-size:11px; font-weight:700; padding:4px 14px; text-transform:uppercase; letter-spacing:.08em; border-radius:4px; flex-shrink:0; margin-right:20px; white-space:nowrap; }
    .ticker-track { overflow:hidden; flex:1; }
    .ticker-text { display:flex; gap:60px; animation:ticker 32s linear infinite; white-space:nowrap; font-size:13px; font-weight:500; }
    @keyframes ticker { 0%{transform:translateX(0);}100%{transform:translateX(-50%);} }

    /* ── Programs ── */
    .programs-section { background:var(--bg); }
    .programs-grid { display:grid; grid-template-columns:repeat(auto-fill,minmax(270px,1fr)); gap:24px; }
    .program-card { background:var(--white); border-radius:16px; overflow:hidden; border:1px solid var(--border); box-shadow:var(--shadow-sm); transition:all .3s; text-decoration:none; color:inherit; display:block; }
    .program-card:hover { transform:translateY(-8px); box-shadow:var(--shadow-lg); border-color:var(--green); }
    .program-card-top { padding:26px 26px 18px; }
    .program-icon { width:54px; height:54px; border-radius:12px; display:flex; align-items:center; justify-content:center; font-size:24px; margin-bottom:16px; transition:transform .3s; }
    .program-card:hover .program-icon { transform:scale(1.1); }
    .program-card h3 { font-family:'Playfair Display',serif; font-size:18px; font-weight:700; margin-bottom:8px; color:var(--green-dark); }
    .program-card p { font-size:13.5px; color:var(--text-muted); line-height:1.65; }
    .program-card-bottom { border-top:1px solid var(--border); padding:14px 26px; display:flex; justify-content:space-between; align-items:center; background:var(--bg); }
    .program-meta { font-size:12px; color:var(--text-muted); }
    .program-meta strong { color:var(--green); }
    .program-arrow { color:var(--green); font-size:18px; transition:transform .25s; }
    .program-card:hover .program-arrow { transform:translateX(4px); }

    /* ── Stats ── */
    .stats-strip { background:var(--green-dark); padding:56px 0; }
    .stats-grid { display:grid; grid-template-columns:repeat(4,1fr); }
    .stat-block { text-align:center; padding:28px 16px; border-right:1px solid rgba(255,255,255,.1); transition:transform .3s; }
    .stat-block:hover { transform:translateY(-4px); }
    .stat-block:last-child { border-right:none; }
    .stat-block .num { font-family:'Playfair Display',serif; font-size:44px; font-weight:800; color:var(--gold-light); line-height:1; }
    .stat-block .lbl { font-size:12px; color:rgba(255,255,255,.45); text-transform:uppercase; letter-spacing:.08em; margin-top:8px; }

    /* ── Departments Slider ── */
    .depts-section { background:linear-gradient(160deg,var(--green-pale) 0%,#fff 60%); }
    .swiper { padding:16px 4px 50px; }
    .dept-card { background:var(--white); border-radius:18px; overflow:hidden; border:1px solid var(--border); box-shadow:var(--shadow-sm); transition:all .3s; text-decoration:none; display:block; }
    .dept-card:hover { transform:translateY(-8px); box-shadow:var(--shadow-lg); }
    .dept-card img { width:100%; height:180px; object-fit:cover; transition:transform .5s; display:block; }
    .dept-card:hover img { transform:scale(1.06); }
    .dept-card-body { padding:18px 20px 20px; }
    .dept-card-body h3 { font-size:15px; font-weight:700; color:var(--green-dark); margin-bottom:5px; }
    .dept-card-body p { font-size:12.5px; color:var(--text-muted); margin-bottom:14px; line-height:1.5; }
    .dept-card-body span { display:inline-block; background:var(--green); color:#fff; padding:7px 16px; border-radius:6px; font-size:13px; font-weight:600; }
    .dept-card:hover .dept-card-body span { background:var(--green-dark); }
    .swiper-pagination-bullet { background:var(--green); opacity:.35; }
    .swiper-pagination-bullet-active { opacity:1; }

    /* ── News ── */
    .news-section { background:var(--white); }
    .news-grid { display:grid; grid-template-columns:1.35fr 1fr; gap:28px; }
    .news-featured { border-radius:20px; overflow:hidden; position:relative; min-height:380px; display:flex; flex-direction:column; justify-content:flex-end; text-decoration:none; background:var(--green-dark); transition:all .3s; }
    .news-featured:hover { transform:translateY(-4px); box-shadow:var(--shadow-lg); }
    .news-featured::before { content:''; position:absolute; inset:0; background:linear-gradient(to top,rgba(10,40,20,.95) 0%,rgba(10,40,20,.35) 60%,transparent 100%); }
    .news-featured .thumb { position:absolute; inset:0; display:flex; align-items:center; justify-content:center; font-size:90px; opacity:.1; }
    .news-featured .content { position:relative; padding:30px; }
    .news-badge { display:inline-block; background:var(--gold); color:#fff; font-size:11px; font-weight:700; padding:3px 11px; border-radius:100px; text-transform:uppercase; margin-bottom:10px; }
    .news-featured h3 { font-family:'Playfair Display',serif; font-size:20px; color:#fff; line-height:1.4; margin-bottom:8px; }
    .news-featured .date { font-size:12px; color:rgba(255,255,255,.45); }
    .news-list { display:flex; flex-direction:column; gap:12px; }
    .news-item { background:var(--bg); border:1px solid var(--border); border-radius:12px; padding:16px; text-decoration:none; color:inherit; transition:all .25s; display:flex; gap:14px; align-items:flex-start; }
    .news-item:hover { border-color:var(--green); background:var(--green-pale); transform:translateX(4px); }
    .news-item-icon { width:42px; height:42px; border-radius:10px; background:var(--green-pale); display:flex; align-items:center; justify-content:center; font-size:18px; flex-shrink:0; border:1px solid var(--border); }
    .news-item h4 { font-size:13.5px; font-weight:600; color:var(--text); line-height:1.4; margin-bottom:4px; }
    .news-item span { font-size:11.5px; color:var(--text-muted); }

    /* ── Why section ── */
    .why-section { background:var(--bg); }
    .why-grid { display:grid; grid-template-columns:1fr 1fr; gap:64px; align-items:center; }
    .why-visual { background:var(--green-dark); border-radius:24px; padding:48px; position:relative; overflow:hidden; }
    .why-visual::before { content:''; position:absolute; top:-60px; right:-60px; width:220px; height:220px; border-radius:50%; background:rgba(200,147,10,.1); }
    .why-visual::after { content:''; position:absolute; bottom:-40px; left:-40px; width:150px; height:150px; border-radius:50%; background:rgba(46,139,87,.2); }
    .why-features { display:grid; gap:22px; }
    .why-feature { display:flex; gap:16px; align-items:flex-start; }
    .why-feature-icon { width:48px; height:48px; background:var(--green-pale); border-radius:12px; display:flex; align-items:center; justify-content:center; font-size:20px; flex-shrink:0; border:1px solid var(--border); transition:all .25s; }
    .why-feature:hover .why-feature-icon { background:var(--green); border-color:var(--green); transform:scale(1.05); }
    .why-feature h4 { font-size:15.5px; font-weight:600; color:var(--text); margin-bottom:4px; }
    .why-feature p { font-size:13.5px; color:var(--text-muted); line-height:1.65; }
    .vc-wrap { position:relative; z-index:2; text-align:center; }
    .vc-avatar { width:100px; height:100px; border-radius:50%; background:rgba(200,147,10,.2); border:3px solid var(--gold); margin:0 auto 18px; display:flex; align-items:center; justify-content:center; font-family:'Playfair Display',serif; font-size:32px; color:var(--gold-light); overflow:hidden; }
    .vc-avatar img { width:100%; height:100%; object-fit:cover; }
    .vc-name { font-family:'Playfair Display',serif; color:#fff; font-size:19px; margin-bottom:3px; }
    .vc-title-label { font-size:12px; color:rgba(255,255,255,.45); margin-bottom:22px; letter-spacing:.05em; }
    .vc-quote blockquote { font-style:italic; color:rgba(255,255,255,.7); font-size:14.5px; line-height:1.75; border-left:3px solid var(--gold); padding-left:16px; text-align:left; }
    .vc-link { display:inline-block; margin-top:20px; color:var(--gold-light); font-size:13.5px; text-decoration:none; font-weight:600; }
    .vc-link:hover { color:var(--gold); }

    /* ── Footer ── */
    footer { background:var(--green-dark); color:rgba(255,255,255,.6); }
    .footer-top-bar { background:var(--gold); padding:14px 0; }
    .footer-top-inner { max-width:1280px; margin:auto; padding:0 20px; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:12px; }
    .footer-top-inner span { font-size:13px; font-weight:600; color:var(--green-dark); }
    .footer-top-inner a { color:var(--green-dark); font-size:13px; font-weight:700; text-decoration:none; padding:6px 16px; background:rgba(15,61,36,.15); border-radius:6px; }
    .footer-main-body { padding:64px 0 44px; }
    .footer-grid { display:grid; grid-template-columns:1.4fr 1fr 1fr 1fr; gap:36px; }
    .footer-brand p { font-size:13.5px; line-height:1.75; max-width:230px; margin-top:16px; }
    .footer-socials { display:flex; gap:10px; margin-top:20px; }
    .social-btn { width:38px; height:38px; border-radius:8px; background:rgba(255,255,255,.07); border:1px solid rgba(255,255,255,.12); display:flex; align-items:center; justify-content:center; text-decoration:none; font-size:14px; color:rgba(255,255,255,.6); transition:all .25s; }
    .social-btn:hover { background:var(--gold); border-color:var(--gold); color:#fff; }
    .footer-col h4 { color:var(--gold-light); font-size:13px; font-weight:700; margin-bottom:16px; text-transform:uppercase; letter-spacing:.08em; }
    .footer-col ul { list-style:none; display:flex; flex-direction:column; gap:9px; }
    .footer-col ul li a { color:rgba(255,255,255,.55); text-decoration:none; font-size:13.5px; transition:color .2s; }
    .footer-col ul li a:hover { color:var(--gold-light); padding-left:4px; }
    .footer-contact li { display:flex; gap:10px; font-size:13px; color:rgba(255,255,255,.55); align-items:flex-start; margin-bottom:9px; }
    .footer-divider { border:none; border-top:1px solid rgba(255,255,255,.08); }
    .footer-bottom { padding:18px 0; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:10px; font-size:12.5px; }

    /* ══════════════════════════════════════════
       RESPONSIVE
    ══════════════════════════════════════════ */
    @media(max-width:1100px) { .footer-grid{grid-template-columns:1fr 1fr;gap:28px;} }
    @media(max-width:900px) {
        .nav-list { display:none; flex-direction:column; position:fixed; inset:0; background:var(--uoh-dark); z-index:999; justify-content:center; align-items:center; gap:6px; overflow-y:auto; }
        .nav-list.open { display:flex; }
        .nav-list > li > a { font-size:16px; padding:12px 24px; border-bottom:none; }
        .nav-dropdown,.nav-mega { position:static; display:none; box-shadow:none; border-top:none; }
        .nav-hamburger { display:flex; z-index:1000; }
        .quick-grid { display:none; }
        .hero-content { grid-template-columns:1fr; gap:40px; }
        .hero-card { display:none; }
        .news-grid { grid-template-columns:1fr; }
        .why-grid { grid-template-columns:1fr; }
        .stats-grid { grid-template-columns:1fr 1fr; }
    }
    @media(max-width:768px) { .footer-grid{grid-template-columns:1fr;} }
    @media(max-width:640px) {
        .hero-stats { flex-wrap:wrap; gap:16px; }
        .stats-grid { grid-template-columns:1fr 1fr; }
        .qlinks-grid { grid-template-columns:repeat(4,1fr); }
        .topbar-right { display:none; }
        .college-name { font-size:15px; }
        .logo-emblem { width:60px; height:60px; }
    }
    .uoh-footer {
    background: linear-gradient(to bottom, #0a2a44, #1e4c72);
    color: #fff;
    padding-top: 40px;
}

.footer-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 30px;
}

.footer-col h3 {
    font-size: 20px;
    margin-bottom: 15px;
    font-weight: 600;
}

.footer-col ul {
    list-style: none;
    padding: 0;
}

.footer-col ul li {
    margin-bottom: 8px;
}

.footer-col ul li a {
    color: #ddd;
    text-decoration: none;
    font-size: 14px;
}

.footer-col ul li a:hover {
    color: #fff;
}

.footer-col p {
    font-size: 14px;
    line-height: 1.6;
    color: #ddd;
}

/* MAP */
.footer-map iframe {
    width: 100%;
    height: 150px;
    border-radius: 5px;
}

/* SOCIAL ICONS */
.footer-social {
    margin-top: 15px;
}

.footer-social a {
    display: inline-block;
    width: 36px;
    height: 36px;
    background: #3b6fa1;
    color: #fff;
    text-align: center;
    line-height: 36px;
    margin-right: 8px;
    border-radius: 4px;
    font-size: 14px;
}

.footer-social a:hover {
    background: #1da1f2;
}

/* BOTTOM */
.footer-bottom {
    background: #000;
    text-align: center;
    padding: 12px;
    font-size: 13px;
    margin-top: 30px;
}
    </style>

    @stack('styles')
</head>
<body>

<!-- ══════════════════════
     1. TOPBAR
══════════════════════ -->
<div class="uoh-topbar">
    <div class="wrap">
        <div class="topbar-links">
            <a href="#">Email</a>
            {{-- <a href="{{ route('student-portal') }}">UOH Portals</a> --}}
            {{-- <a href="{{ route('faculty') }}">Faculty Profile</a> --}}
            <a href="#">Alumni Portal</a>
            <a href="{{ url('/') }}#contact">Contact Us</a>
        </div>
        <div class="topbar-icons">
            <a href="#" title="Search">🔍</a>
            <a href="#" title="Facebook">𝗳</a>
            <a href="#" title="YouTube">▶</a>
            <a href="#" title="LinkedIn">in</a>
        </div>
    </div>
</div>

<!-- ══════════════════════
     2. LOGO BAR
══════════════════════ -->
<div class="uoh-logobar">
    <div class="wrap">
        <a class="logo-block" href="{{ url('/') }}">
            <div class="logo-emblem">
                {{-- Replace with: <img src="{{ asset('images/logo.png') }}" alt="Logo"> --}}
                <span class="logo-emblem-text">GPM</span>
            </div>
            <div class="logo-text-block">
                <div class="college-name">Government Postgraduate College Mansehra</div>
                <div class="college-tagline">Restoring Hope; Building Community</div>
            </div>
        </a>

        <div class="quick-grid">
            <a href="#"><span class="qi">⬇</span>Downloads</a>
            <a href="#"><span class="qi">📋</span>Tenders</a>
            {{-- <a href="{{ route('results') }}"><span class="qi">📊</span>Online Results</a> --}}
            <a href="#"><span class="qi">📚</span>Central Library</a>
            <a href="#"><span class="qi">💼</span>Jobs &amp; Careers</a>
            <a href="#"><span class="qi">📜</span>Semester Rules</a>
            {{-- <a href="{{ route('student-portal') }}"><span class="qi">🖥</span>Student Portals</a> --}}
            <a href="#"><span class="qi">📖</span>College Statutes</a>
        </div>
    </div>
</div>

<!-- ══════════════════════
     3. MAIN NAVBAR
══════════════════════ -->
<nav class="uoh-nav">
    <div class="wrap">
        <ul class="nav-list" id="main-nav">

            <li><a href="{{ url('/') }}">Home</a></li>

            <!-- FACULTIES — mega -->
            <li>
                <a href="#">Faculties <span class="caret">▾</span></a>
                <div class="nav-mega">
                    <div class="mega-col">
                        <h5>Sciences</h5>
                        <a href="{{ route('department.show','cs') }}">Computer Science</a>
                        <a href="{{ route('department.show','it') }}">Information Technology</a>
                        <a href="{{ route('department.show','math') }}">Mathematics</a>
                        <a href="{{ route('department.show','physics') }}">Physics</a>
                        <a href="{{ route('department.show','chem') }}">Chemistry</a>
                        <a href="{{ route('department.show','stat') }}">Statistics</a>
                       <a href="{{ route('department.show','zoology') }}">Zoology</a>
<a href="{{ route('department.show','botany') }}">Botany</a>
                    </div>
                    <div class="mega-col">
                        <h5>Social &amp; Sciences</h5>
                        <a href="{{ route('department.show','eco') }}">Economics</a>
                        <a href="{{ route('department.show','ps') }}">Political Science</a>
                        <a href="{{ route('department.show','islamic') }}">Islamiat / Islamic Studies</a>
                          <a href="{{ route('department.show','english') }}">English</a>
                        <a href="{{ route('department.show','urdu') }}">Urdu</a>
                        <a href="{{ route('department.show','pashto') }}">Pashto</a>
                    </div>
                   
                      
                    
                </div>
            </li>

            <!-- ADMINISTRATION -->
            <li>
                <a href="#">Administration <span class="caret">▾</span></a>
                <div class="nav-dropdown">
                    <a href="#">Principal's Office</a>
                    <a href="#">Vice Principal's Office</a>
                    <a href="#">Registrar Office</a>
                    <a href="#">Quality Enhancement Cell (QEC)</a>
                    <a href="#">Examinations Section</a>
                    <a href="#">Directorate of Finance</a>
                    <a href="#">Directorate of Sports</a>
                    <a href="#">Directorate of IT Services</a>
                    <a href="#">Procurement Office</a>
                    <a href="#">Student Financial Aid Office</a>
                    <a href="#">Provost Office</a>
                    <a href="#">Directorate of Works</a>
                </div>
            </li>

            <!-- ACADEMICS -->
            <li>
                <a href="#">Academics <span class="caret">▾</span></a>
                <div class="nav-dropdown">
                    <a href="{{ url('/') }}#programs">Academic Programs</a>
                    <a href="#">Semester Rules</a>
                    <a href="#">Admissions</a>
                    <a href="#">Fee Structure</a>
                    <a href="#">Scholarships</a>
                    <a href="#">Library</a>
                    <a href="#">Research Cell</a>
                    <a href="#">Academic Calendar</a>
                </div>
            </li>

            <!-- EXAMINATIONS -->
            <li>
                <a href="#">Examinations <span class="caret">▾</span></a>
                <div class="nav-dropdown">
                    {{-- <a href="{{ route('results') }}">Online Results</a> --}}
                    <a href="#">Date Sheet</a>
                    <a href="#">Roll Number Slips</a>
                    <a href="#">Degree / Transcript</a>
                    <a href="#">Exam Fee Schedule</a>
                    <a href="#">Unfair Means Cases</a>
                </div>
            </li>

            <!-- SCHOLARSHIPS -->
            <li>
                <a href="#">Scholarships <span class="caret">▾</span></a>
                <div class="nav-dropdown">
                    <a href="#">HEC Scholarships</a>
                    <a href="#">Government Scholarships</a>
                    <a href="#">Merit Scholarships</a>
                    <a href="#">Need-Based Aid</a>
                    <a href="#">Apply for Scholarship</a>
                </div>
            </li>

            <!-- NEWS -->
            {{-- <li><a href="{{ route('news') }}">News &amp; Events</a></li> --}}

            <!-- FACULTY -->
            {{-- <li><a href="{{ route('faculty') }}">Faculty</a></li> --}}

            <!-- ORIC -->
            <li>
                <a href="#">ORIC <span class="caret">▾</span></a>
                <div class="nav-dropdown">
                    <a href="#">About ORIC</a>
                    <a href="#">Research Projects</a>
                    <a href="#">Publications</a>
                    <a href="#">Patents</a>
                    <a href="#">Innovation Hub</a>
                </div>
            </li>

            <!-- QEC -->
            <li><a href="#">QEC</a></li>

            <!-- BIC -->
            <li>
                <a href="#">BIC <span class="caret">▾</span></a>
                <div class="nav-dropdown">
                    <a href="#">About BIC</a>
                    <a href="#">Apply for Incubation</a>
                    <a href="#">Startups</a>
                    <a href="#">Events</a>
                </div>
            </li>

        </ul>

        <button class="nav-hamburger" onclick="document.getElementById('main-nav').classList.toggle('open')">
            <span></span><span></span><span></span>
        </button>
    </div>
</nav>

<!-- ══════════════════════════════════════
     MAIN CONTENT
══════════════════════════════════════ -->
<main>@yield('content')</main>

<footer class="uoh-footer">
    <div class="container">
        <div class="footer-grid">

            {{-- QUICK LINKS --}}
            <div class="footer-col">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="#">Fact Sheet</a></li>
                    <li><a href="#">IT Services</a></li>
                    <li><a href="#">About UOH</a></li>
                    <li><a href="#">Annual Report</a></li>
                    <li><a href="#">Business Plan</a></li>
                    <li><a href="#">Anti-Harassment</a></li>
                    <li><a href="#">Affiliated Institutions</a></li>
                    <li><a href="#">Disability Resource Centre</a></li>
                    <li><a href="#">Online and Distance Learning</a></li>
                </ul>
            </div>

            {{-- IMPORTANT LINKS --}}
            <div class="footer-col">
                <h3>Important Links</h3>
                <ul>
                    <li><a href="#">UOH Spotlight</a></li>
                    <li><a href="#">Core Objectives</a></li>
                    <li><a href="#">Selection Board</a></li>
                    <li><a href="#">Clubs & Societies</a></li>
                    <li><a href="#">Missions & Core Values</a></li>
                    <li><a href="#">Planning & Development</a></li>
                    <li><a href="#">Career Development Center</a></li>
                    <li><a href="#">University Advancement Cell</a></li>
                    <li><a href="#">Central Research Laboratory</a></li>
                </ul>
            </div>

            {{-- ADDRESS --}}
            <div class="footer-col">
                <h3>Address</h3>
                <p>
                    The University of Haripur <br>
                    Hattar Road Near Swat Chowk Haripur <br>
                    Khyber Pakhtunkhwa Pakistan
                </p>

                <p><strong>Registrar Office</strong><br>
                Phone: +92-995-920602<br>
                Fax: 0995920601<br>
                Email: registrar@uoh.edu.pk</p>

                <p><strong>Examination Section</strong><br>
                Phone: +92-995-920638</p>

                <p><strong>ASRB Office</strong><br>
                Phone: +92-995-920631</p>
            </div>

            {{-- MAP + SOCIAL --}}
            <div class="footer-col">
                <h3>Location</h3>

                <div class="footer-map">
                    <iframe 
                        src="https://maps.google.com/maps?q=University%20of%20Haripur&t=&z=13&ie=UTF8&iwloc=&output=embed"
                        frameborder="0"
                        allowfullscreen>
                    </iframe>
                </div>

                <div class="footer-social">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>

        </div>
    </div>

    {{-- BOTTOM BAR --}}
    <div class="footer-bottom">
        Copyright © 2024-25. All Rights Reserved :: The University of Haripur
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({ duration:750, once:true, offset:80 });

    if (document.querySelector('.mySwiper')) {
        new Swiper('.mySwiper', {
            slidesPerView:1, spaceBetween:20, loop:true,
            autoplay:{ delay:3200, disableOnInteraction:false },
            pagination:{ el:'.swiper-pagination', clickable:true },
            breakpoints:{ 600:{slidesPerView:2}, 900:{slidesPerView:3}, 1100:{slidesPerView:4} },
        });
    }

    /* Highlight active nav item */
    document.addEventListener('DOMContentLoaded', () => {
        const path = window.location.pathname;
        document.querySelectorAll('.nav-list > li > a').forEach(a => {
            const lPath = new URL(a.href, location.origin).pathname;
            if (lPath === path && path !== '/') a.parentElement.classList.add('active');
        });
    });
</script>
@stack('scripts')
</body>
</html>
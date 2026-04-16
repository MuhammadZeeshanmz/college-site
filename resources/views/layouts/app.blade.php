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

    <style>
        :root {
            --green:        #1a5c38;
            --green-dark:   #0f3d24;
            --green-mid:    #226b43;
            --green-light:  #2e8b57;
            --green-pale:   #e8f5ee;
            --gold:         #c8930a;
            --gold-light:   #e8b84b;
            --gold-pale:    #fef9ec;
            --white:        #ffffff;
            --bg:           #f7f9f8;
            --text:         #0d1f14;
            --text-muted:   #5a7565;
            --border:       #d4e5db;
            --shadow-sm:    0 1px 3px rgba(26,92,56,0.08);
            --shadow:       0 4px 16px rgba(26,92,56,0.1);
            --shadow-md:    0 8px 24px rgba(26,92,56,0.12);
            --shadow-lg:    0 16px 40px rgba(26,92,56,0.15);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body { font-family: 'DM Sans', sans-serif; background: var(--bg); color: var(--text); overflow-x: hidden; }

        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: var(--bg); }
        ::-webkit-scrollbar-thumb { background: var(--green); border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: var(--green-dark); }

        /* ── TOPBAR ── */
        .topbar {
            background: var(--green-dark);
            color: rgba(255,255,255,0.75);
            font-size: 12.5px;
            padding: 8px 0;
            border-bottom: 2px solid var(--gold);
        }
        .topbar .inner {
            max-width: 1200px; margin: auto; padding: 0 24px;
            display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 8px;
        }
        .topbar a { color: var(--gold-light); text-decoration: none; transition: color .2s; }
        .topbar a:hover { color: #fff; }
        .topbar-right { display: flex; gap: 20px; align-items: center; }
        .topbar-right a {
            padding: 3px 10px; border-radius: 4px; border: 1px solid rgba(232,184,75,.3);
            transition: all .2s;
        }
        .topbar-right a:hover { background: rgba(232,184,75,.15); }

        /* ── NAVBAR ── */
        nav {
            background: var(--white);
            border-bottom: 3px solid var(--green);
            position: sticky; top: 0; z-index: 1000;
            box-shadow: 0 2px 20px rgba(26,92,56,0.1);
            transition: all .3s;
        }
        .nav-inner {
            max-width: 1200px; margin: auto; padding: 0 24px;
            display: flex; align-items: center; justify-content: space-between; height: 72px;
        }
        .logo-wrap { display: flex; align-items: center; gap: 14px; text-decoration: none; }
        .logo-emblem {
            width: 52px; height: 52px; background: var(--green);
            border-radius: 50%; display: flex; align-items: center; justify-content: center;
            border: 2px solid var(--gold); flex-shrink: 0;
            font-family: 'Playfair Display', serif; color: var(--gold-light); font-size: 16px; font-weight: 700;
            transition: transform .3s;
        }
        .logo-wrap:hover .logo-emblem { transform: rotate(-5deg) scale(1.05); }
        .logo-text .name {
            font-family: 'Playfair Display', serif; font-size: 15px; font-weight: 700; color: var(--green-dark); line-height: 1.2;
        }
        .logo-text .sub { font-size: 11px; color: var(--text-muted); letter-spacing: .05em; }

        .nav-links { display: flex; align-items: center; gap: 2px; list-style: none; }
        .nav-links a {
            text-decoration: none; color: var(--text); font-size: 13.5px; font-weight: 500;
            padding: 7px 13px; border-radius: 6px; transition: all .2s; position: relative;
        }
        .nav-links a::after {
            content: ''; position: absolute; bottom: 2px; left: 13px; right: 13px;
            height: 2px; background: var(--green); border-radius: 1px;
            transform: scaleX(0); transition: transform .25s;
        }
        .nav-links a:hover { color: var(--green); background: var(--green-pale); }
        .nav-links a:hover::after { transform: scaleX(1); }
        .nav-links .btn-apply {
            background: var(--green); color: #fff; padding: 8px 20px; border-radius: 8px; font-weight: 600;
        }
        .nav-links .btn-apply::after { display: none; }
        .nav-links .btn-apply:hover { background: var(--green-dark); color: #fff; }

        /* Active nav link */
        .nav-links a.active {
            color: var(--green); background: var(--green-pale);
        }
        .nav-links a.active::after { transform: scaleX(1); }

        .hamburger { display: none; flex-direction: column; gap: 5px; cursor: pointer; background: none; border: none; padding: 6px; }
        .hamburger span { display: block; width: 24px; height: 2px; background: var(--green-dark); border-radius: 2px; transition: .3s; }

        /* ── HERO ── */
        .hero {
            position: relative; min-height: 94vh;
            background: var(--green-dark);
            display: flex; align-items: center; overflow: hidden;
        }
        .hero-bg-pattern {
            position: absolute; inset: 0; opacity: .05;
            background-image:
                radial-gradient(circle, #fff 1px, transparent 1px);
            background-size: 40px 40px;
        }
        .hero-glow-left {
            position: absolute; bottom: -150px; left: -150px;
            width: 500px; height: 500px; border-radius: 50%;
            background: radial-gradient(circle, rgba(46,139,87,.25) 0%, transparent 70%);
        }
        .hero-glow-right {
            position: absolute; top: -100px; right: -100px;
            width: 600px; height: 600px; border-radius: 50%;
            background: radial-gradient(circle, rgba(200,147,10,.12) 0%, transparent 70%);
        }
        .hero-stripe {
            position: absolute; top: 0; right: 0; bottom: 0; width: 38%;
            background: linear-gradient(135deg, rgba(46,139,87,.08) 0%, rgba(26,92,56,.15) 100%);
            clip-path: polygon(12% 0, 100% 0, 100% 100%, 0% 100%);
        }
        .hero-content {
            position: relative; z-index: 2;
            max-width: 1200px; margin: auto; padding: 80px 24px;
            display: grid; grid-template-columns: 1.1fr .9fr; gap: 64px; align-items: center;
        }
        .hero-badge {
            display: inline-flex; align-items: center; gap: 8px;
            background: rgba(200,147,10,.15); border: 1px solid rgba(232,184,75,.4);
            color: var(--gold-light); font-size: 12px; font-weight: 600; letter-spacing: .1em;
            padding: 6px 16px; border-radius: 100px; text-transform: uppercase; margin-bottom: 22px;
        }
        .hero-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(36px, 4.5vw, 60px); font-weight: 800; color: #fff; line-height: 1.1;
            margin-bottom: 20px;
        }
        .hero-title span { color: var(--gold-light); display: block; }
        .hero-desc { font-size: 16.5px; color: rgba(255,255,255,.65); line-height: 1.8; margin-bottom: 34px; max-width: 460px; }
        .hero-actions { display: flex; gap: 14px; flex-wrap: wrap; }

        .btn-primary {
            background: var(--green-light); color: #fff; text-decoration: none;
            padding: 13px 28px; border-radius: 8px; font-weight: 600; font-size: 15px;
            transition: all .25s; display: inline-block; border: none; cursor: pointer;
        }
        .btn-primary:hover { background: var(--green); transform: translateY(-2px); box-shadow: 0 6px 20px rgba(0,0,0,.2); }

        .btn-gold {
            background: var(--gold); color: #fff; text-decoration: none;
            padding: 13px 28px; border-radius: 8px; font-weight: 600; font-size: 15px;
            transition: all .25s; display: inline-block;
        }
        .btn-gold:hover { background: #a67608; transform: translateY(-2px); }

        .btn-outline-w {
            border: 1.5px solid rgba(255,255,255,.35); color: #fff; text-decoration: none;
            padding: 12px 28px; border-radius: 8px; font-weight: 500; font-size: 15px;
            transition: all .25s; display: inline-block;
        }
        .btn-outline-w:hover { background: rgba(255,255,255,.1); border-color: rgba(255,255,255,.6); }

        .hero-stats { display: flex; gap: 28px; margin-top: 44px; }
        .hero-stat { border-left: 2px solid var(--gold); padding-left: 14px; }
        .hero-stat .num { font-family: 'Playfair Display', serif; font-size: 28px; font-weight: 700; color: #fff; }
        .hero-stat .lbl { font-size: 11px; color: rgba(255,255,255,.45); text-transform: uppercase; letter-spacing: .07em; margin-top: 2px; }

        /* Hero Card (Admission Form) */
        .hero-card {
            background: rgba(255,255,255,.07); backdrop-filter: blur(12px);
            border: 1px solid rgba(255,255,255,.14); border-radius: 20px; padding: 36px;
        }
        .hero-card h3 { font-family: 'Playfair Display', serif; color: #fff; font-size: 21px; margin-bottom: 6px; }
        .hero-card .sub { font-size: 13px; color: rgba(255,255,255,.45); margin-bottom: 22px; }
        .form-field { margin-bottom: 14px; }
        .form-field label { display: block; font-size: 11px; color: rgba(255,255,255,.45); letter-spacing: .07em; text-transform: uppercase; margin-bottom: 5px; }
        .form-field input, .form-field select {
            width: 100%; background: rgba(255,255,255,.09); border: 1px solid rgba(255,255,255,.18);
            color: #fff; padding: 11px 14px; border-radius: 8px; font-size: 14px;
            font-family: 'DM Sans', sans-serif; outline: none; transition: all .25s;
        }
        .form-field input::placeholder { color: rgba(255,255,255,.3); }
        .form-field input:focus, .form-field select:focus { border-color: var(--gold-light); background: rgba(255,255,255,.13); }
        .form-field select option { background: #0f3d24; }
        .btn-submit {
            width: 100%; background: var(--gold); color: #fff; border: none; cursor: pointer;
            padding: 13px; border-radius: 8px; font-size: 15px; font-weight: 600;
            font-family: 'DM Sans', sans-serif; margin-top: 6px; transition: all .25s; letter-spacing: .02em;
        }
        .btn-submit:hover { background: #a67608; transform: translateY(-1px); }

        /* ── TICKER ── */
        .ticker { background: var(--green); color: #fff; padding: 11px 0; overflow: hidden; }
        .ticker-inner { max-width: 1200px; margin: auto; padding: 0 24px; display: flex; align-items: center; gap: 0; overflow: hidden; }
        .ticker-label {
            background: var(--gold); color: var(--green-dark); font-size: 11px; font-weight: 700;
            padding: 4px 14px; text-transform: uppercase; letter-spacing: .08em; border-radius: 4px;
            flex-shrink: 0; margin-right: 20px; white-space: nowrap;
        }
        .ticker-track { overflow: hidden; flex: 1; }
        .ticker-text { display: flex; gap: 60px; animation: ticker 32s linear infinite; white-space: nowrap; font-size: 13px; font-weight: 500; }
        @keyframes ticker { 0% { transform: translateX(0); } 100% { transform: translateX(-50%); } }

        /* ── SECTION COMMONS ── */
        section { padding: 88px 0; }
        .container { max-width: 1200px; margin: auto; padding: 0 24px; }
        .section-tag {
            display: inline-block; background: var(--green-pale); color: var(--green);
            font-size: 11.5px; font-weight: 700; letter-spacing: .1em; text-transform: uppercase;
            padding: 5px 14px; border-radius: 100px; margin-bottom: 12px;
            border: 1px solid rgba(26,92,56,.18);
        }
        .section-title { font-family: 'Playfair Display', serif; font-size: clamp(26px, 3.2vw, 38px); font-weight: 700; color: var(--text); line-height: 1.2; margin-bottom: 12px; }
        .section-sub { font-size: 15.5px; color: var(--text-muted); line-height: 1.75; max-width: 540px; }
        .section-header { margin-bottom: 48px; }
        .section-header.center { text-align: center; }
        .section-header.center .section-sub { margin: 0 auto; }

        /* ── QUICK LINKS ── */
        .ql-section { background: var(--white); padding: 48px 0; border-bottom: 1px solid var(--border); }
        .qlinks-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(130px, 1fr)); gap: 14px; }
        .qlink {
            background: var(--bg); border: 1px solid var(--border); border-radius: 14px;
            padding: 22px 12px; text-align: center; text-decoration: none; color: var(--text);
            transition: all .25s; display: flex; flex-direction: column; align-items: center; gap: 10px;
        }
        .qlink:hover { background: var(--green); color: #fff; border-color: var(--green); transform: translateY(-4px); box-shadow: var(--shadow-md); }
        .qlink-icon { width: 44px; height: 44px; background: var(--green-pale); border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 20px; transition: background .25s; }
        .qlink:hover .qlink-icon { background: rgba(255,255,255,.18); }
        .qlink span { font-size: 12.5px; font-weight: 600; }

        /* ── PROGRAMS ── */
        .programs-section { background: var(--bg); }
        .programs-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(270px, 1fr)); gap: 24px; }
        .program-card {
            background: var(--white); border-radius: 16px; overflow: hidden;
            border: 1px solid var(--border); box-shadow: var(--shadow-sm);
            transition: all .3s; text-decoration: none; color: inherit; display: block;
        }
        .program-card:hover { transform: translateY(-8px); box-shadow: var(--shadow-lg); border-color: var(--green); }
        .program-card-top { padding: 26px 26px 18px; }
        .program-icon { width: 54px; height: 54px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 24px; margin-bottom: 16px; transition: transform .3s; }
        .program-card:hover .program-icon { transform: scale(1.1); }
        .program-card h3 { font-family: 'Playfair Display', serif; font-size: 18px; font-weight: 700; margin-bottom: 8px; color: var(--green-dark); }
        .program-card p { font-size: 13.5px; color: var(--text-muted); line-height: 1.65; }
        .program-card-bottom {
            border-top: 1px solid var(--border); padding: 14px 26px;
            display: flex; justify-content: space-between; align-items: center;
            background: var(--bg);
        }
        .program-meta { font-size: 12px; color: var(--text-muted); }
        .program-meta strong { color: var(--green); }
        .program-arrow { color: var(--green); font-size: 18px; transition: transform .25s; }
        .program-card:hover .program-arrow { transform: translateX(4px); }

        /* ── STATS STRIP ── */
        .stats-strip { background: var(--green-dark); padding: 56px 0; }
        .stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); }
        .stat-block {
            text-align: center; padding: 28px 16px;
            border-right: 1px solid rgba(255,255,255,.1); transition: transform .3s;
        }
        .stat-block:hover { transform: translateY(-4px); }
        .stat-block:last-child { border-right: none; }
        .stat-block .num { font-family: 'Playfair Display', serif; font-size: 44px; font-weight: 800; color: var(--gold-light); line-height: 1; }
        .stat-block .lbl { font-size: 12px; color: rgba(255,255,255,.45); text-transform: uppercase; letter-spacing: .08em; margin-top: 8px; }

        /* ── DEPARTMENTS SLIDER ── */
        .depts-section { background: linear-gradient(160deg, var(--green-pale) 0%, #fff 60%); }
        .swiper { padding: 16px 4px 50px; }
        .dept-card {
            background: var(--white); border-radius: 18px; overflow: hidden;
            border: 1px solid var(--border); box-shadow: var(--shadow-sm);
            transition: all .3s; text-decoration: none; display: block;
        }
        .dept-card:hover { transform: translateY(-8px); box-shadow: var(--shadow-lg); }
        .dept-card img { width: 100%; height: 180px; object-fit: cover; transition: transform .5s; display: block; }
        .dept-card:hover img { transform: scale(1.06); }
        .dept-card-body { padding: 18px 20px 20px; }
        .dept-card-body h3 { font-size: 15px; font-weight: 700; color: var(--green-dark); margin-bottom: 5px; }
        .dept-card-body p { font-size: 12.5px; color: var(--text-muted); margin-bottom: 14px; line-height: 1.5; }
        .dept-card-body a {
            display: inline-block; background: var(--green); color: #fff;
            padding: 7px 16px; border-radius: 6px; font-size: 13px; font-weight: 600;
            text-decoration: none; transition: background .2s;
        }
        .dept-card-body a:hover { background: var(--green-dark); }
        .swiper-pagination-bullet { background: var(--green); opacity: .35; }
        .swiper-pagination-bullet-active { opacity: 1; }

        /* ── NEWS ── */
        .news-section { background: var(--white); }
        .news-grid { display: grid; grid-template-columns: 1.35fr 1fr; gap: 28px; }
        .news-featured {
            border-radius: 20px; overflow: hidden; position: relative;
            min-height: 380px; display: flex; flex-direction: column; justify-content: flex-end;
            text-decoration: none; background: var(--green-dark); transition: all .3s;
        }
        .news-featured:hover { transform: translateY(-4px); box-shadow: var(--shadow-lg); }
        .news-featured::before {
            content: ''; position: absolute; inset: 0;
            background: linear-gradient(to top, rgba(10,40,20,.95) 0%, rgba(10,40,20,.35) 60%, transparent 100%);
        }
        .news-featured .thumb { position: absolute; inset: 0; display: flex; align-items: center; justify-content: center; font-size: 90px; opacity: .1; }
        .news-featured .content { position: relative; padding: 30px; }
        .news-badge { display: inline-block; background: var(--gold); color: #fff; font-size: 11px; font-weight: 700; padding: 3px 11px; border-radius: 100px; text-transform: uppercase; letter-spacing: .05em; margin-bottom: 10px; }
        .news-featured h3 { font-family: 'Playfair Display', serif; font-size: 20px; color: #fff; line-height: 1.4; margin-bottom: 8px; }
        .news-featured .date { font-size: 12px; color: rgba(255,255,255,.45); }

        .news-list { display: flex; flex-direction: column; gap: 12px; }
        .news-item {
            background: var(--bg); border: 1px solid var(--border); border-radius: 12px;
            padding: 16px; text-decoration: none; color: inherit; transition: all .25s;
            display: flex; gap: 14px; align-items: flex-start;
        }
        .news-item:hover { border-color: var(--green); background: var(--green-pale); transform: translateX(4px); }
        .news-item-icon { width: 42px; height: 42px; border-radius: 10px; background: var(--green-pale); display: flex; align-items: center; justify-content: center; font-size: 18px; flex-shrink: 0; border: 1px solid var(--border); }
        .news-item h4 { font-size: 13.5px; font-weight: 600; color: var(--text); line-height: 1.4; margin-bottom: 4px; }
        .news-item span { font-size: 11.5px; color: var(--text-muted); }

        /* ── WHY CHOOSE US ── */
        .why-section { background: var(--bg); }
        .why-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 64px; align-items: center; }
        .why-visual {
            background: var(--green-dark); border-radius: 24px; padding: 48px;
            position: relative; overflow: hidden;
        }
        .why-visual::before { content: ''; position: absolute; top: -60px; right: -60px; width: 220px; height: 220px; border-radius: 50%; background: rgba(200,147,10,.1); }
        .why-visual::after { content: ''; position: absolute; bottom: -40px; left: -40px; width: 150px; height: 150px; border-radius: 50%; background: rgba(46,139,87,.2); }
        .why-features { display: grid; gap: 22px; }
        .why-feature { display: flex; gap: 16px; align-items: flex-start; }
        .why-feature-icon {
            width: 48px; height: 48px; background: var(--green-pale); border-radius: 12px;
            display: flex; align-items: center; justify-content: center; font-size: 20px; flex-shrink: 0;
            border: 1px solid var(--border); transition: all .25s;
        }
        .why-feature:hover .why-feature-icon { background: var(--green); border-color: var(--green); transform: scale(1.05); }
        .why-feature h4 { font-size: 15.5px; font-weight: 600; color: var(--text); margin-bottom: 4px; }
        .why-feature p { font-size: 13.5px; color: var(--text-muted); line-height: 1.65; }

        .vc-wrap { position: relative; z-index: 2; text-align: center; }
        .vc-avatar {
            width: 96px; height: 96px; border-radius: 50%; background: rgba(200,147,10,.2);
            border: 3px solid var(--gold); margin: 0 auto 18px;
            display: flex; align-items: center; justify-content: center;
            font-family: 'Playfair Display', serif; font-size: 32px; color: var(--gold-light);
        }
        .vc-name { font-family: 'Playfair Display', serif; color: #fff; font-size: 19px; margin-bottom: 3px; }
        .vc-title-label { font-size: 12px; color: rgba(255,255,255,.45); margin-bottom: 22px; letter-spacing: .05em; }
        .vc-quote blockquote {
            font-style: italic; color: rgba(255,255,255,.7); font-size: 14.5px; line-height: 1.75;
            border-left: 3px solid var(--gold); padding-left: 16px; text-align: left;
        }
        .vc-link { display: inline-block; margin-top: 20px; color: var(--gold-light); font-size: 13.5px; text-decoration: none; font-weight: 600; }
        .vc-link:hover { color: var(--gold); }

        /* ── FOOTER ── */
        footer { background: var(--green-dark); color: rgba(255,255,255,.6); }
        .footer-top-bar { background: var(--gold); padding: 14px 0; }
        .footer-top-inner { max-width: 1200px; margin: auto; padding: 0 24px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 12px; }
        .footer-top-inner span { font-size: 13px; font-weight: 600; color: var(--green-dark); }
        .footer-top-inner a { color: var(--green-dark); font-size: 13px; font-weight: 700; text-decoration: none; padding: 6px 16px; background: rgba(15,61,36,.15); border-radius: 6px; }
        .footer-main-body { padding: 64px 0 44px; }
        .footer-grid { display: grid; grid-template-columns: 1.4fr 1fr 1fr 1fr; gap: 36px; }
        .footer-brand p { font-size: 13.5px; line-height: 1.75; max-width: 230px; margin-top: 16px; }
        .footer-socials { display: flex; gap: 10px; margin-top: 20px; }
        .social-btn {
            width: 38px; height: 38px; border-radius: 8px; background: rgba(255,255,255,.07);
            border: 1px solid rgba(255,255,255,.12); display: flex; align-items: center; justify-content: center;
            text-decoration: none; font-size: 14px; color: rgba(255,255,255,.6); transition: all .25s;
        }
        .social-btn:hover { background: var(--gold); border-color: var(--gold); color: #fff; }
        .footer-col h4 { color: var(--gold-light); font-size: 13px; font-weight: 700; margin-bottom: 16px; text-transform: uppercase; letter-spacing: .08em; }
        .footer-col ul { list-style: none; display: flex; flex-direction: column; gap: 9px; }
        .footer-col ul li a { color: rgba(255,255,255,.55); text-decoration: none; font-size: 13.5px; transition: color .2s; }
        .footer-col ul li a:hover { color: var(--gold-light); padding-left: 4px; }
        .footer-contact li { display: flex; gap: 10px; font-size: 13px; color: rgba(255,255,255,.55); align-items: flex-start; margin-bottom: 9px; }
        .footer-divider { border: none; border-top: 1px solid rgba(255,255,255,.08); margin: 0; }
        .footer-bottom { padding: 18px 0; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px; font-size: 12.5px; }

        /* ── RESPONSIVE ── */
        @media (max-width: 1024px) { .footer-grid { grid-template-columns: 1fr 1fr; gap: 28px; } }
        @media (max-width: 900px) {
            .hero-content { grid-template-columns: 1fr; gap: 40px; }
            .hero-card { display: none; }
            .news-grid { grid-template-columns: 1fr; }
            .why-grid { grid-template-columns: 1fr; }
            .stats-grid { grid-template-columns: 1fr 1fr; }
        }
        @media (max-width: 768px) { .footer-grid { grid-template-columns: 1fr; } }
        @media (max-width: 640px) {
            .nav-links {
                display: none; flex-direction: column; position: fixed; inset: 0;
                background: var(--white); z-index: 999; justify-content: center;
                align-items: center; gap: 18px;
            }
            .nav-links.open { display: flex; }
            .nav-links a { font-size: 17px; }
            .hamburger { display: flex; z-index: 1000; }
            .hero-stats { flex-wrap: wrap; gap: 16px; }
            .stats-grid { grid-template-columns: 1fr 1fr; }
            .qlinks-grid { grid-template-columns: repeat(4, 1fr); }
            .topbar-right { display: none; }
        }
    </style>

    @stack('styles')
</head>
<body>

<!-- TOPBAR -->
<div class="topbar">
    <div class="inner">
        <span>📞 +92-997-123456 &nbsp;|&nbsp; ✉️ info@gpgcm.edu.pk &nbsp;|&nbsp; 📍 Mansehra, KP, Pakistan</span>
        <div class="topbar-right">
            <a href="{{ route('student-portal') }}">Student Portal</a>
            <a href="{{ route('faculty') }}">Faculty</a>
            <a href="{{ route('results') }}">Results</a>
            <a href="#">Downloads</a>
        </div>
    </div>
</div>

<!-- NAVBAR -->
<nav>
    <div class="nav-inner">
        <a class="logo-wrap" href="{{ url('/') }}">
            <div class="logo-emblem">GPM</div>
            <div class="logo-text">
                <div class="name">Government Postgraduate<br>College Mansehra</div>
                <div class="sub">Excellence in Education Since 1957</div>
            </div>
        </a>
        <ul class="nav-links" id="nav-links">
            <li><a href="{{ url('/') }}#about">About</a></li>
            <li><a href="{{ url('/') }}#programs">Programs</a></li>
            <li><a href="{{ url('/') }}#departments">Departments</a></li>
            <li><a href="{{ route('news') }}">News</a></li>
            <li><a href="{{ route('faculty') }}">Faculty</a></li>
            <li><a href="{{ url('/') }}#contact">Contact</a></li>
            <li><a href="#" class="btn-apply">Apply Now</a></li>
        </ul>
        <button class="hamburger" onclick="document.getElementById('nav-links').classList.toggle('open')">
            <span></span><span></span><span></span>
        </button>
    </div>
</nav>

<main>@yield('content')</main>

<!-- FOOTER -->
<footer id="contact">
    <div class="footer-top-bar">
        <div class="footer-top-inner">
            <span>📋 Admissions Open — Fall 2025 | Apply Now Before Seats Fill Up!</span>
            <a href="#">Apply Online →</a>
        </div>
    </div>
    <div class="footer-main-body">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <a class="logo-wrap" href="{{ url('/') }}" style="text-decoration:none;display:flex;align-items:center;gap:12px;">
                        <div class="logo-emblem" style="width:44px;height:44px;font-size:14px;">GPM</div>
                        <div class="logo-text">
                            <div class="name" style="color:#fff;font-size:14px;font-family:'Playfair Display',serif;font-weight:700;">Government Postgraduate<br>College Mansehra</div>
                        </div>
                    </a>
                    <p>Committed to academic excellence and shaping the future leaders of Pakistan since 1957.</p>
                    <div class="footer-socials">
                        <a href="#" class="social-btn">f</a>
                        <a href="#" class="social-btn">in</a>
                        <a href="#" class="social-btn">▶</a>
                        <a href="#" class="social-btn">𝕏</a>
                    </div>
                </div>
                <div class="footer-col">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="{{ url('/') }}#about">About Us</a></li>
                        <li><a href="#">Admissions</a></li>
                        <li><a href="{{ url('/') }}#programs">Academic Programs</a></li>
                        <li><a href="{{ route('results') }}">Results</a></li>
                        <li><a href="#">Scholarships</a></li>
                        <li><a href="#">Jobs & Careers</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Student Services</h4>
                    <ul>
                        <li><a href="{{ route('student-portal') }}">Student Portal</a></li>
                        <li><a href="#">Fee Structure</a></li>
                        <li><a href="#">Hostel Facility</a></li>
                        <li><a href="#">Transport</a></li>
                        <li><a href="#">Library</a></li>
                        <li><a href="#">Sports</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Contact Us</h4>
                    <ul class="footer-contact">
                        <li><span>📍</span><span>University Road, Mansehra, KP, Pakistan</span></li>
                        <li><span>📞</span><span>+92-997-123456</span></li>
                        <li><span>✉️</span><span>info@gpgcm.edu.pk</span></li>
                        <li><span>🌐</span><span>www.gpgcm.edu.pk</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <hr class="footer-divider">
    <div class="container">
        <div class="footer-bottom">
            <span>© {{ date('Y') }} Government Postgraduate College Mansehra. All Rights Reserved.</span>
            <span>Developed with ❤️ in Pakistan</span>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({ duration: 750, once: true, offset: 80 });

    if (document.querySelector('.mySwiper')) {
        new Swiper('.mySwiper', {
            slidesPerView: 1, spaceBetween: 20, loop: true,
            autoplay: { delay: 3200, disableOnInteraction: false },
            pagination: { el: '.swiper-pagination', clickable: true },
            breakpoints: {
                600: { slidesPerView: 2 },
                900: { slidesPerView: 3 },
                1100: { slidesPerView: 4 },
            },
        });
    }

    window.addEventListener('scroll', () => {
        const nav = document.querySelector('nav');
        nav.style.boxShadow = window.scrollY > 80 ? '0 4px 24px rgba(26,92,56,0.15)' : '0 2px 20px rgba(26,92,56,0.1)';
    });

    // Highlight active nav link based on current URL
    document.addEventListener('DOMContentLoaded', function () {
        const currentPath = window.location.pathname;
        document.querySelectorAll('.nav-links a').forEach(link => {
            const linkPath = new URL(link.href, window.location.origin).pathname;
            if (linkPath === currentPath && currentPath !== '/') {
                link.classList.add('active');
            }
        });
    });
</script>
@stack('scripts')
</body>
</html>
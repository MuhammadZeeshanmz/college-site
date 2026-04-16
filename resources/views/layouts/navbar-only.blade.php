{{-- ================================================
   UOH-STYLE NAVBAR  — paste this into layouts/app.blade.php
   Replace everything from <body> up to <main>
================================================ --}}

<style>
/* ═══════════════════════════════════════════
   TOPBAR  (black strip with links)
═══════════════════════════════════════════ */
.uoh-topbar {
    background: #000;
    padding: 6px 0;
    font-size: 12.5px;
    color: #ccc;
}
.uoh-topbar .inner {
    max-width: 1280px; margin: auto; padding: 0 20px;
    display: flex; justify-content: space-between; align-items: center; gap: 10px;
}
.uoh-topbar-left { display: flex; gap: 0; align-items: center; }
.uoh-topbar-left a {
    color: #ccc; text-decoration: none; font-size: 12px;
    padding: 0 12px; border-right: 1px solid #444; line-height: 1;
    transition: color .2s;
}
.uoh-topbar-left a:first-child { padding-left: 0; }
.uoh-topbar-left a:last-child { border-right: none; }
.uoh-topbar-left a:hover { color: #fff; }
.uoh-topbar-right { display: flex; gap: 14px; align-items: center; }
.uoh-topbar-right a { color: #ccc; font-size: 16px; text-decoration: none; transition: color .2s; }
.uoh-topbar-right a:hover { color: #fff; }

/* ═══════════════════════════════════════════
   LOGO BAR  (blue gradient strip with logo + quick icons)
═══════════════════════════════════════════ */
.uoh-logobar {
    background: linear-gradient(135deg, #003366 0%, #005a9e 40%, #0077cc 70%, #005a9e 100%);
    padding: 10px 0;
}
.uoh-logobar .inner {
    max-width: 1280px; margin: auto; padding: 0 20px;
    display: flex; align-items: center; gap: 20px;
}
.uoh-logo-block { display: flex; align-items: center; gap: 16px; flex: 1; text-decoration: none; }
.uoh-logo-img {
    width: 80px; height: 80px; border-radius: 50%;
    background: #fff; display: flex; align-items: center; justify-content: center;
    border: 3px solid rgba(255,255,255,.4); flex-shrink: 0; overflow: hidden;
}
.uoh-logo-img img { width: 100%; height: 100%; object-fit: contain; }
.uoh-logo-img .logo-placeholder {
    font-family: 'Playfair Display', serif; font-size: 22px; font-weight: 800;
    color: #003366; text-align: center; line-height: 1.1;
}
.uoh-logo-text { color: #fff; }
.uoh-logo-text .college-name {
    font-family: 'Playfair Display', serif;
    font-size: clamp(18px, 2.5vw, 28px); font-weight: 700; line-height: 1.2;
    letter-spacing: .02em;
}
.uoh-logo-text .college-tagline {
    font-size: 13px; font-style: italic; color: rgba(255,255,255,.8);
    margin-top: 3px; letter-spacing: .03em;
}

/* Right side quick-links grid */
.uoh-quickgrid {
    display: grid; grid-template-columns: 1fr 1fr; gap: 2px 28px;
    flex-shrink: 0;
}
.uoh-quickgrid a {
    display: flex; align-items: center; gap: 8px;
    color: #fff; text-decoration: none; font-size: 12.5px; font-weight: 500;
    padding: 3px 0; transition: color .2s; white-space: nowrap;
}
.uoh-quickgrid a:hover { color: #ffd700; }
.uoh-quickgrid a .qi {
    width: 20px; height: 20px; border-radius: 50%;
    background: rgba(255,255,255,.2); display: flex; align-items: center;
    justify-content: center; font-size: 11px; flex-shrink: 0;
}

/* ═══════════════════════════════════════════
   MAIN NAVBAR  (lighter blue with nav items)
═══════════════════════════════════════════ */
.uoh-nav {
    background: linear-gradient(90deg, #004a8f 0%, #0066cc 50%, #004a8f 100%);
    position: sticky; top: 0; z-index: 1000;
    box-shadow: 0 2px 12px rgba(0,0,80,.35);
}
.uoh-nav .inner {
    max-width: 1280px; margin: auto; padding: 0 20px;
    display: flex; align-items: center; justify-content: space-between;
}
.uoh-nav-list { display: flex; align-items: stretch; list-style: none; gap: 0; margin: 0; padding: 0; }
.uoh-nav-list > li { position: relative; }
.uoh-nav-list > li > a {
    display: flex; align-items: center; gap: 5px;
    color: #fff; text-decoration: none; font-size: 13.5px; font-weight: 500;
    padding: 16px 15px; white-space: nowrap;
    border-bottom: 3px solid transparent; transition: all .2s;
}
.uoh-nav-list > li > a:hover,
.uoh-nav-list > li.active > a {
    background: rgba(255,255,255,.12);
    border-bottom-color: #ffd700;
}
.uoh-nav-list > li > a .caret {
    font-size: 9px; opacity: .7; margin-left: 2px;
}

/* ── DROPDOWN ── */
.uoh-nav-list > li:hover > .uoh-dropdown { display: block; }
.uoh-dropdown {
    display: none; position: absolute; top: 100%; left: 0; z-index: 2000;
    background: #fff; min-width: 240px;
    border-top: 3px solid #0066cc;
    box-shadow: 0 8px 32px rgba(0,0,0,.18);
    border-radius: 0 0 8px 8px; overflow: hidden;
}
.uoh-dropdown a {
    display: flex; align-items: center; gap: 8px;
    padding: 10px 18px; font-size: 13px; color: #1a3a5c;
    text-decoration: none; border-bottom: 1px solid #f0f4f8;
    transition: all .15s;
}
.uoh-dropdown a:last-child { border-bottom: none; }
.uoh-dropdown a:hover { background: #e8f0f8; color: #0066cc; padding-left: 24px; }
.uoh-dropdown a::before { content: '›'; color: #0066cc; font-size: 16px; font-weight: 700; }

/* ── MEGA DROPDOWN (for Faculties) ── */
.uoh-mega { display: none; position: absolute; top: 100%; left: 0; z-index: 2000; }
.uoh-nav-list > li:hover > .uoh-mega { display: block; }
.uoh-mega-inner {
    background: #fff; border-top: 3px solid #0066cc;
    box-shadow: 0 8px 32px rgba(0,0,0,.18);
    border-radius: 0 0 8px 8px; padding: 20px 24px;
    display: grid; grid-template-columns: repeat(3, 220px); gap: 0 20px;
    min-width: 700px;
}
.uoh-mega-col h5 {
    font-size: 11px; font-weight: 700; color: #0066cc; text-transform: uppercase;
    letter-spacing: .08em; margin-bottom: 10px; padding-bottom: 6px;
    border-bottom: 2px solid #e8f0f8;
}
.uoh-mega-col a {
    display: flex; align-items: flex-start; gap: 6px;
    padding: 6px 0; font-size: 12.5px; color: #1a3a5c;
    text-decoration: none; border-bottom: 1px solid #f5f7fa; transition: all .15s;
    line-height: 1.3;
}
.uoh-mega-col a:last-child { border-bottom: none; }
.uoh-mega-col a:hover { color: #0066cc; padding-left: 6px; }
.uoh-mega-col a::before { content: '›'; color: #0066cc; font-weight: 700; flex-shrink: 0; margin-top: 1px; }

/* Hamburger */
.uoh-hamburger { display: none; flex-direction: column; gap: 5px; cursor: pointer; background: none; border: none; padding: 8px; }
.uoh-hamburger span { display: block; width: 24px; height: 2px; background: #fff; border-radius: 2px; }

/* Mobile menu */
@media (max-width: 900px) {
    .uoh-nav-list { display: none; flex-direction: column; position: fixed; inset: 0; background: #003a7a; z-index: 999; justify-content: center; align-items: center; gap: 8px; }
    .uoh-nav-list.open { display: flex; }
    .uoh-nav-list > li > a { font-size: 16px; padding: 12px 20px; }
    .uoh-dropdown, .uoh-mega { position: static; display: none; box-shadow: none; }
    .uoh-hamburger { display: flex; z-index: 1000; }
    .uoh-quickgrid { display: none; }
    .uoh-topbar .inner { justify-content: center; }
    .uoh-topbar-right { display: none; }
    .uoh-logobar .inner { justify-content: center; }
    .uoh-logo-text .college-name { font-size: 18px; }
}
@media (max-width: 640px) {
    .uoh-topbar-left a { padding: 0 8px; font-size: 11px; }
}
</style>

<!-- ══════════════════════════════════════════════════
     TOP BAR
══════════════════════════════════════════════════ -->
<div class="uoh-topbar">
    <div class="inner">
        <div class="uoh-topbar-left">
            <a href="#">Email</a>
            <a href="#">UOH Portals</a>
            <a href="{{ route('faculty') }}">Faculty Profile</a>
            <a href="#">Alumni Portal</a>
            <a href="{{ url('/') }}#contact">Contact Us</a>
        </div>
        <div class="uoh-topbar-right">
            <a href="#" title="Search">🔍</a>
            <a href="#" title="Facebook">𝗳</a>
            <a href="#" title="YouTube">▶</a>
            <a href="#" title="LinkedIn">in</a>
        </div>
    </div>
</div>

<!-- ══════════════════════════════════════════════════
     LOGO BAR
══════════════════════════════════════════════════ -->
<div class="uoh-logobar">
    <div class="inner">
        <a class="uoh-logo-block" href="{{ url('/') }}">
            <div class="uoh-logo-img">
                {{-- Replace src with your actual logo: asset('images/logo.png') --}}
                <div class="logo-placeholder">GPM</div>
            </div>
            <div class="uoh-logo-text">
                <div class="college-name">Government Postgraduate College Mansehra</div>
                <div class="college-tagline">Restoring Hope; Building Community</div>
            </div>
        </a>

        <!-- Quick icon links (right side — 2-column grid like UOH) -->
        <div class="uoh-quickgrid">
            <a href="#"><span class="qi">⬇</span> Downloads</a>
            <a href="#"><span class="qi">📋</span> Tenders</a>
            <a href="{{ route('results') }}"><span class="qi">📊</span> Online Results</a>
            <a href="#"><span class="qi">📚</span> Central Library</a>
            <a href="#"><span class="qi">💼</span> Jobs &amp; Careers</a>
            <a href="#"><span class="qi">📜</span> Semester Rules</a>
         <a href="{{ route('department.show', ['department' => 'cs']) }}">
    <span class="qi">🖥</span> computer science
</a>
            <a href="#"><span class="qi">📖</span> College Statutes</a>
        </div>
    </div>
</div>

<!-- ══════════════════════════════════════════════════
     MAIN NAV
══════════════════════════════════════════════════ -->
<nav class="uoh-nav">
    <div class="inner">
        <ul class="uoh-nav-list" id="uoh-nav-list">

            <!-- Home -->
            <li><a href="{{ url('/') }}">Home</a></li>

            <!-- Faculties — MEGA menu -->
            <li>
                <a href="#">Faculties <span class="caret">▾</span></a>
                <div class="uoh-mega">
                    <div class="uoh-mega-inner">

                        <div class="uoh-mega-col">
                            <h5>Sciences</h5>
                            <a href="{{ route('department.show','cs') }}">Computer Science</a>
                            <a href="{{ route('department.show','math') }}">Mathematics</a>
                            <a href="{{ route('department.show','physics') }}">Physics</a>
                            <a href="{{ route('department.show','chem') }}">Chemistry</a>
                            <a href="{{ route('department.show','stat') }}">Statistics</a>
                            <a href="{{ route('department.show','bio') }}">Biology (Zoology / Botany)</a>
                        </div>

                        <div class="uoh-mega-col">
                            <h5>Social &amp; Administrative</h5>
                            <a href="{{ route('department.show','eco') }}">Economics</a>
                            <a href="{{ route('department.show','ps') }}">Political Science</a>
                            <a href="#">Sociology</a>
                            <a href="#">Psychology</a>
                            <a href="#">History</a>
                            <a href="#">Islamic Studies / Islamiat</a>
                        </div>

                        <div class="uoh-mega-col">
                            <h5>Languages &amp; Humanities</h5>
                            <a href="{{ route('department.show','english') }}">English</a>
                            <a href="{{ route('department.show','urdu') }}">Urdu</a>
                            <a href="#">Pashto</a>
                            <a href="#">Philosophy</a>
                            <a href="#">Education</a>
                            <a href="#">Physical Education</a>
                        </div>

                    </div>
                </div>
            </li>

            <!-- Administration -->
            <li>
                <a href="#">Administration <span class="caret">▾</span></a>
                <div class="uoh-dropdown">
                    <a href="#">Principal's Office</a>
                    <a href="#">Vice Principal</a>
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

            <!-- Academics -->
            <li>
                <a href="#">Academics <span class="caret">▾</span></a>
                <div class="uoh-dropdown">
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

            <!-- Examinations -->
            <li>
                <a href="#">Examinations <span class="caret">▾</span></a>
                <div class="uoh-dropdown">
                    <a href="{{ route('results') }}">Online Results</a>
                    <a href="#">Date Sheet</a>
                    <a href="#">Roll Number Slips</a>
                    <a href="#">Degree / Transcript</a>
                    <a href="#">Exam Fee Schedule</a>
                    <a href="#">Unfair Means Cases</a>
                </div>
            </li>

            <!-- Scholarships -->
            <li>
                <a href="#">Scholarships <span class="caret">▾</span></a>
                <div class="uoh-dropdown">
                    <a href="#">HEC Scholarships</a>
                    <a href="#">Government Scholarships</a>
                    <a href="#">Merit Scholarships</a>
                    <a href="#">Need-Based Aid</a>
                    <a href="#">Apply for Scholarship</a>
                </div>
            </li>

            <!-- News -->
            {{-- <li><a href="{{ route('news') }}">News &amp; Events</a></li> --}}

            <!-- Faculty -->
            <li><a href="{{ route('faculty') }}">Faculty</a></li>

            <!-- ORIC -->
            <li>
                <a href="#">ORIC <span class="caret">▾</span></a>
                <div class="uoh-dropdown">
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
                <div class="uoh-dropdown">
                    <a href="#">About BIC</a>
                    <a href="#">Apply for Incubation</a>
                    <a href="#">Startups</a>
                    <a href="#">Events</a>
                </div>
            </li>

        </ul>

        <button class="uoh-hamburger" onclick="document.getElementById('uoh-nav-list').classList.toggle('open')">
            <span></span><span></span><span></span>
        </button>
    </div>
</nav>
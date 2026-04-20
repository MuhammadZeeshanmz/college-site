<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni Portal - Government Postgraduate College Mansehra</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 14px; color: #333; background: #dde8dc; min-height: 100vh; }

    /* ── TOPBAR ── */
    .alumni-topbar {
        background: #fff;
        padding: 12px 30px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-bottom: 1px solid #ccc;
        flex-wrap: wrap;
        gap: 10px;
        min-height: 90px;
    }
    .alumni-logo { display: flex; align-items: center; gap: 14px; }
    .alumni-logo img { width: 72px; height: 72px; border-radius: 50%; object-fit: contain; border: 2px solid #ccc; }
    .alumni-logo-circle {
        width: 72px; height: 72px; border-radius: 50%;
        background: #1a3a6c; border: 3px solid #c8930a;
        display: flex; align-items: center; justify-content: center;
        font-family: Georgia, serif; color: #ffd700; font-size: 13px;
        font-weight: 800; text-align: center; line-height: 1.2; flex-shrink: 0;
    }
    .alumni-logo-text .cname { font-family: Georgia, serif; font-size: 22px; font-weight: 800; color: #1a5c38; line-height: 1.2; }
    .alumni-logo-text .ctag { font-size: 13px; color: #1a6b8a; font-style: italic; }
    .alumni-topbar-right { display: flex; flex-direction: column; align-items: flex-end; gap: 8px; }
    .topbar-links { display: flex; gap: 20px; align-items: center; }
    .topbar-links a {
        display: flex; align-items: center; gap: 5px;
        color: #444; text-decoration: none; font-size: 13px; font-weight: 600;
        transition: color .2s;
    }
    .topbar-links a:hover { color: #1a5c38; }
    .alumni-portal-title { font-family: Georgia, serif; font-size: 26px; font-weight: 700; color: #1a6b8a; }

    /* ── TAB NAV ── */
    .alumni-tabnav { background: #fff; border-bottom: 2px solid #bbb; }
    .alumni-tabnav ul { list-style: none; display: flex; margin: 0; padding: 0; flex-wrap: wrap; }
    .alumni-tabnav ul li button {
        display: block; padding: 13px 22px;
        font-size: 13px; font-weight: 700; letter-spacing: .05em;
        border: none; cursor: pointer;
        background: transparent; font-family: inherit;
        color: #333; text-transform: uppercase;
        border-right: 1px solid #ddd;
        transition: all .2s;
    }
    .alumni-tabnav ul li button:hover { background: #e8f4ee; color: #1a5c38; }
    .alumni-tabnav ul li button.active { background: #1a5c38; color: #fff; }

    /* ── BODY ── */
    .alumni-body {
        max-width: 1160px; margin: 24px auto; padding: 0 20px;
        display: flex; gap: 22px; align-items: flex-start;
    }

    /* ── MAIN ── */
    .alumni-main {
        flex: 1; background: #fff; border: 1px solid #ccc;
        border-radius: 3px; padding: 26px 28px; min-width: 0;
    }
    .al-sec { display: none; }
    .al-sec.active { display: block; }

    .al-sec h2 {
        font-size: 18px; font-weight: 800; color: #1a5c38;
        text-transform: uppercase; letter-spacing: .04em;
        margin: 0 0 16px; padding-bottom: 10px;
        border-bottom: 2px solid #c8ddd0;
    }
    .al-sec h3 { font-size: 14.5px; font-weight: 700; color: #1a6b8a; margin: 18px 0 8px; }
    .al-sec p { font-size: 13.5px; line-height: 1.85; color: #333; text-align: justify; margin-bottom: 10px; }
    .al-sec ul { margin: 6px 0 14px 20px; font-size: 13.5px; color: #333; line-height: 1.9; text-align: justify; list-style: disc; }
    .al-sec ul li { margin-bottom: 4px; }

    .intro-row { display: flex; gap: 18px; align-items: flex-start; margin-bottom: 16px; }
    .intro-img { width: 190px; height: 145px; flex-shrink: 0; object-fit: cover; border-radius: 3px; border: 1px solid #ccc; }

    .goals-label { font-size: 14px; font-weight: 700; color: #333; margin: 14px 0 8px; display: block; }

    .achieve-banner {
        background: linear-gradient(135deg,#1a5c38 0%,#1a6b8a 100%);
        color: #fff; border-radius: 5px; padding: 20px 22px; margin: 18px 0;
        display: flex; gap: 16px; align-items: center;
    }
    .achieve-icon { font-size: 38px; flex-shrink: 0; }
    .achieve-text h3 { color: #ffd700 !important; font-size: 15px; font-weight: 800; margin: 0 0 6px; }
    .achieve-text p { font-size: 13px; color: rgba(255,255,255,.9); line-height: 1.75; margin: 0; text-align: left; }
    .achieve-text strong { color: #ffd700; }

    .benefits-grid { display: grid; grid-template-columns: repeat(auto-fill,minmax(210px,1fr)); gap: 14px; margin: 14px 0; }
    .benefit-card { background: #f0f7f4; border: 1px solid #c8ddd0; border-left: 4px solid #1a5c38; border-radius: 3px; padding: 15px; transition: all .2s; }
    .benefit-card:hover { background: #e0f0e8; transform: translateY(-2px); }
    .benefit-card .bi { font-size: 24px; margin-bottom: 7px; }
    .benefit-card h4 { font-size: 13px; font-weight: 700; color: #1a5c38; margin: 0 0 4px; }
    .benefit-card p { font-size: 12.5px; color: #555; margin: 0; line-height: 1.55; }

    .al-table { width: 100%; border-collapse: collapse; font-size: 13px; margin-top: 10px; }
    .al-table th { background: #1a5c38; color: #fff; padding: 9px 12px; text-align: left; }
    .al-table td { padding: 8px 12px; border-bottom: 1px solid #e5e5e5; vertical-align: top; }
    .al-table tr:nth-child(even) td { background: #f4faf6; }
    .al-table tr:hover td { background: #e8f5ee; }

    .s-form { display: flex; flex-direction: column; gap: 13px; margin-top: 10px; }
    .s-form label { font-size: 13px; font-weight: 600; color: #333; display: block; margin-bottom: 4px; }
    .s-form input, .s-form select, .s-form textarea {
        width: 100%; padding: 8px 11px; border: 1px solid #ccc;
        border-radius: 3px; font-size: 13px; font-family: inherit; outline: none; transition: border .2s;
    }
    .s-form input:focus, .s-form select:focus, .s-form textarea:focus { border-color: #1a5c38; }
    .s-form textarea { height: 88px; resize: vertical; }
    .s-form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }
    .btn-submit {
        background: #1a5c38; color: #fff; border: none; cursor: pointer;
        padding: 10px 26px; border-radius: 3px; font-size: 13.5px; font-weight: 700;
        font-family: inherit; transition: background .2s; align-self: flex-start;
    }
    .btn-submit:hover { background: #0b3d22; }

    .contact-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; margin-top: 14px; }
    .contact-item { display: flex; gap: 12px; align-items: flex-start; background: #f4faf6; border: 1px solid #c8ddd0; border-radius: 3px; padding: 13px; }
    .contact-icon { width: 36px; height: 36px; background: #1a5c38; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 15px; color: #fff; flex-shrink: 0; }
    .contact-item h4 { font-size: 11.5px; color: #888; margin: 0 0 3px; font-weight: 600; text-transform: uppercase; }
    .contact-item p { font-size: 13px; font-weight: 600; color: #333; margin: 0; }

    /* ── LOGIN SIDEBAR ── */
    .alumni-sidebar { width: 255px; flex-shrink: 0; }
    .login-box { background: #fff; border: 1px solid #ccc; border-radius: 3px; overflow: hidden; }
    .login-hdr { background: #1a6b8a; color: #fff; padding: 11px 16px; font-size: 15px; font-weight: 700; text-align: center; }
    .login-body { padding: 16px 15px 18px; }
    .login-field { margin-bottom: 12px; display: flex; align-items: center; gap: 0; }
    .login-field label { display: block; font-size: 12.5px; font-weight: 600; color: #333; width: 80px; flex-shrink: 0; }
    .login-field-wrap { flex: 1; display: flex; }
    .login-field input { flex: 1; padding: 7px 10px; border: 1px solid #ccc; font-size: 13px; font-family: inherit; outline: none; border-right: none; }
    .login-field input:focus { border-color: #1a6b8a; }
    .login-field .field-icon { width: 32px; background: #e8e8e8; border: 1px solid #ccc; border-left: none; display: flex; align-items: center; justify-content: center; font-size: 14px; color: #666; }
    .login-actions { display: flex; align-items: center; justify-content: space-between; gap: 6px; margin-top: 10px; padding-left: 80px; }
    .login-actions a { font-size: 12.5px; color: #1a6b8a; text-decoration: none; }
    .login-actions a:hover { text-decoration: underline; }
    .btn-login { background: #1a6b8a; color: #fff; border: none; cursor: pointer; padding: 7px 18px; border-radius: 2px; font-size: 13px; font-weight: 700; font-family: inherit; transition: background .2s; }
    .btn-login:hover { background: #0d4f6b; }

    /* ── FOOTER ── */
    .alumni-footer {
        background: #fff; border-top: 1px solid #ccc;
        padding: 14px 30px;
        display: flex; align-items: center; justify-content: space-between;
        flex-wrap: wrap; gap: 14px;
        margin-top: 10px;
    }
    .alumni-footer nav { display: flex; gap: 24px; flex-wrap: wrap; }
    .alumni-footer nav button {
        font-size: 13.5px; color: #1a6b8a; text-decoration: none;
        background: none; border: none; cursor: pointer; font-family: inherit;
        font-weight: 500;
    }
    .alumni-footer nav button:hover { text-decoration: underline; }
    .alumni-footer .copy { font-size: 12.5px; color: #666; text-align: right; line-height: 1.55; }

    @media(max-width:900px){
        .alumni-body{flex-direction:column;}
        .alumni-sidebar{width:100%;}
        .benefits-grid{grid-template-columns:1fr 1fr;}
        .contact-grid{grid-template-columns:1fr;}
        .s-form-row{grid-template-columns:1fr;}
    }
    @media(max-width:640px){
        .alumni-tabnav ul{flex-wrap:wrap;}
        .alumni-topbar{flex-direction:column;align-items:flex-start;padding:14px 16px;}
        .intro-row{flex-direction:column;}
        .intro-img{width:100%;height:180px;}
        .benefits-grid{grid-template-columns:1fr;}
        .achieve-banner{flex-direction:column;}
        .login-actions{padding-left:0;flex-wrap:wrap;}
    }
    </style>
</head>
<body>

    {{-- TOPBAR --}}
    <div class="alumni-topbar">
        <div class="alumni-logo">
            {{-- Replace with real logo: <img src="{{ asset('images/logo.png') }}" alt="Logo"> --}}
            <div class="alumni-logo-circle">GCM</div>
            <div class="alumni-logo-text">
                <div class="cname">Govt. Postgraduate College Mansehra</div>
                <div class="ctag">Restoring Hope; Building Community</div>
            </div>
        </div>
        <div class="alumni-topbar-right">
            <div class="topbar-links">
                <a href="#" onclick="switchTab('home');return false;">&#128101; Alumni Home</a>
                <a href="mailto:info@gpgcmansehra.edu.pk">&#128231; Email</a>
                <a href="#" onclick="switchTab('contact');return false;">&#128222; Contact Us</a>
            </div>
            <div class="alumni-portal-title">Alumni Portal</div>
        </div>
    </div>

    {{-- TAB NAV --}}
    <div class="alumni-tabnav">
        <ul>
            <li><button onclick="switchTab('home')"     id="tab-home"     class="active">Alumni Home</button></li>
            <li><button onclick="switchTab('about')"    id="tab-about">About Alumni</button></li>
            <li><button onclick="switchTab('benefits')" id="tab-benefits">Alumni Benefits</button></li>
            <li><button onclick="switchTab('corner')"   id="tab-corner">Alumni Corner</button></li>
            <li><button onclick="switchTab('survey')"   id="tab-survey">Alumni Survey</button></li>
            <li><button onclick="switchTab('contact')"  id="tab-contact">Contact Us</button></li>
        </ul>
    </div>

    {{-- BODY --}}
    <div class="alumni-body">
        <div class="alumni-main">

            {{-- HOME --}}
            <div id="sec-home" class="al-sec active">
                <h2>Welcome to the GPGCM Alumni Home</h2>
                <div class="intro-row">
                    <img class="intro-img"
                        src="https://images.unsplash.com/photo-1562774053-701939374585?w=400&h=300&fit=crop&crop=top"
                        alt="GPGC Mansehra Campus">
                    <div>
                        <p>University Advancement Cell – GPGCM thriving on its healthy, ongoing relationship with industry and college graduates, keeping abreast of and surpassing the needs and expectations of the ever-changing professional environment. University Advancement Cell-GPGCM is committed to change Government Postgraduate College Mansehra students' lives by delivering a guided and relevant path of career choice through close association with industry; and this can be more helpful in providing meaningful employment, making GPGCM graduates more employable and effective, preparing them for reasonable positions in national &amp; international organizations.</p>
                    </div>
                </div>
                <span class="goals-label">GPGCM Alumni's Goals:</span>
                <ul>
                    <li>To maintain a firm connection with the corporate sector by organizing different career-oriented activities such as job fairs, open house, get-together on regular basis.</li>
                    <li>Through liaisoning with Industry, assist academic departments in improvement of their curriculum as per market.</li>
                    <li>Maintain complete database of GPGCM graduates and remain intact with GPGCM-Alumni through organization of different events around the year.</li>
                    <li>Offer career counseling services to help students identify career goals, find employment opportunities that match their needs, and critically analyze and improve their CVs and cover letters.</li>
                    <li>Keep students informed on latest job openings / employment opportunities through email, social media, notice boards, and SMS.</li>
                </ul>
            </div>

            {{-- ABOUT --}}
            <div id="sec-about" class="al-sec">
                <h2>About Alumni</h2>
                <p>The Alumni of Government Postgraduate College Mansehra (GPGCM) represents thousands of graduates who have gone on to serve in diverse fields across Pakistan and internationally. Our alumni are our pride — they are the living testament of the quality education and values imparted at GPGCM.</p>
                <p>The GPGCM Alumni network was established with the vision of maintaining a lifelong connection between the college and its graduates, and to create a community that supports each other professionally and personally.</p>
                <h3>Our Vision</h3>
                <p>To build a strong, connected, and engaged GPGCM alumni community that contributes to the growth of the college, supports current students, and creates opportunities for all graduates.</p>
                <h3>Our Mission</h3>
                <p>To maintain regular engagement with GPGCM graduates, facilitate networking opportunities, support career development, and encourage alumni to give back to their alma mater through mentoring, scholarship, and participation in college activities.</p>
                <h3>Notable Alumni Achievements</h3>
                <table class="al-table">
                    <thead>
                        <tr>
                            <th style="width:40px;">#</th>
                            <th>Name</th>
                            <th>Field</th>
                            <th>Achievement</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><strong>Zeeshan</strong></td>
                            <td>Software Engineering</td>
                            <td>Developed the official GPGCM website &amp; alumni portal — Working as Software Engineer at Obsidian RCM</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>[Alumni Name]</td>
                            <td>Civil Services</td>
                            <td>Cleared CSS — District Officer</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>[Alumni Name]</td>
                            <td>Medicine</td>
                            <td>Senior Consultant at District Hospital Mansehra</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>[Alumni Name]</td>
                            <td>Engineering</td>
                            <td>Project Engineer — NESPAK</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>[Alumni Name]</td>
                            <td>Education</td>
                            <td>PhD Scholar — University of Peshawar</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- BENEFITS --}}
            <div id="sec-benefits" class="al-sec">
                <h2>Alumni Benefits</h2>
                <p>As a registered alumnus of Government Postgraduate College Mansehra, you enjoy a wide range of exclusive benefits designed to support your personal and professional growth.</p>
                <div class="benefits-grid">
                    <div class="benefit-card"><div class="bi">&#128279;</div><h4>Alumni Network Access</h4><p>Connect with thousands of GPGCM graduates across Pakistan and internationally.</p></div>
                    <div class="benefit-card"><div class="bi">&#128188;</div><h4>Career Support</h4><p>Access job boards, career counseling, and placement assistance through the CDC.</p></div>
                    <div class="benefit-card"><div class="bi">&#128218;</div><h4>Library Access</h4><p>Registered alumni can access the GPGCM Central Library and digital resources.</p></div>
                    <div class="benefit-card"><div class="bi">&#127891;</div><h4>Mentoring Program</h4><p>Mentor current students and help them navigate their academic and career journeys.</p></div>
                    <div class="benefit-card"><div class="bi">&#129309;</div><h4>Industry Events</h4><p>Invitations to job fairs, seminars, workshops, and alumni gatherings throughout the year.</p></div>
                    <div class="benefit-card"><div class="bi">&#127885;</div><h4>Alumni Recognition</h4><p>Outstanding alumni are recognized at the Annual Alumni Awards ceremony each year.</p></div>
                    <div class="benefit-card"><div class="bi">&#128240;</div><h4>Alumni Newsletter</h4><p>Stay updated with GPGCM news, events, and alumni achievements through our newsletter.</p></div>
                    <div class="benefit-card"><div class="bi">&#127963;</div><h4>Campus Facilities</h4><p>Use of college sports complex, auditorium, and seminar halls for professional events.</p></div>
                </div>
            </div>

            {{-- CORNER --}}
            <div id="sec-corner" class="al-sec">
                <h2>Alumni Corner</h2>
                <p>The Alumni Corner is your dedicated space to share your story, reconnect with classmates, and celebrate the achievements of the GPGCM family.</p>

                {{-- Zeeshan Achievement Banner --}}
                <h3>&#127775; Alumni Spotlight — Zeeshan (Software Engineer)</h3>
                <div class="achieve-banner">
                    <div class="achieve-icon">&#128187;</div>
                    <div class="achieve-text">
                        <h3>Website Developer — GPGCM Official Portal</h3>
                        <p><strong>Zeeshan</strong>, a proud alumnus of GPGCM and a skilled <strong>Software Engineer at Obsidian RCM</strong>, developed the complete official website and alumni portal for GPGCM. Currently in his <strong>8th Semester</strong>, he has already made a landmark achievement — making GPGCM the first college in Mansehra to have a fully functional, modern, and professional digital presence. We salute his dedication and contribution to his alma mater!</p>
                    </div>
                </div>

                <h3>Recent Alumni Events</h3>
                <ul>
                    <li>Annual Alumni Meet 2025 — Successfully held at GPGCM Auditorium, 500+ alumni attended.</li>
                    <li>Career Fair 2025 — 20+ companies participated, 100+ students placed for internships.</li>
                    <li>Alumni Mentorship Program — 30 alumni registered as mentors for current students.</li>
                    <li>Scholarship Drive 2024 — Alumni contributed Rs. 500,000 for deserving students.</li>
                </ul>
                <h3>Share Your Story</h3>
                <p>Are you a GPGCM alumnus with an inspiring story? Contact us at <a href="mailto:alumni@gpgcmansehra.edu.pk" style="color:#1a6b8a;font-weight:600;">alumni@gpgcmansehra.edu.pk</a></p>
            </div>

            {{-- SURVEY --}}
            <div id="sec-survey" class="al-sec">
                <h2>Alumni Survey</h2>
                <p>Help us improve by sharing your experience and current professional status. Your feedback is invaluable for the growth of GPGCM.</p>
                <div class="s-form">
                    <div class="s-form-row">
                        <div>
                            <label>Full Name *</label>
                            <input type="text" name="full_name" placeholder="Your full name" required>
                        </div>
                        <div>
                            <label>Year of Graduation *</label>
                            <select name="graduation_year" required>
                                <option value="">Select Year</option>
                                @for($y = date('Y'); $y >= 1985; $y--)
                                    <option value="{{ $y }}">{{ $y }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="s-form-row">
                        <div>
                            <label>Department / Program *</label>
                            <select name="department" required>
                                <option value="">Select Department</option>
                                <option>BS Computer Science</option>
                                <option>Mathematics</option>
                                <option>Physics</option>
                                <option>Chemistry</option>
                                <option>Statistics</option>
                                <option>Zoology</option>
                                <option>Botany</option>
                                <option>English</option>
                                <option>Urdu</option>
                                <option>Economics</option>
                                <option>Political Science</option>
                                <option>Islamiat</option>
                                <option>Other</option>
                            </select>
                        </div>
                        <div>
                            <label>Current Employment Status *</label>
                            <select name="employment_status" required>
                                <option value="">Select Status</option>
                                <option>Employed (Government)</option>
                                <option>Employed (Private)</option>
                                <option>Self-Employed / Business</option>
                                <option>Further Studies (MS/PhD)</option>
                                <option>Seeking Employment</option>
                                <option>Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="s-form-row">
                        <div>
                            <label>Email Address</label>
                            <input type="email" name="email" placeholder="your@email.com">
                        </div>
                        <div>
                            <label>Phone Number</label>
                            <input type="text" name="phone" placeholder="+92 3XX XXXXXXX">
                        </div>
                    </div>
                    <div>
                        <label>Current Organization / Institute</label>
                        <input type="text" name="organization" placeholder="Where are you currently working or studying?">
                    </div>
                    <div>
                        <label>How has GPGCM education helped in your career?</label>
                        <textarea name="career_help" placeholder="Share your experience..."></textarea>
                    </div>
                    <div>
                        <label>Suggestions for improvement of GPGCM</label>
                        <textarea name="suggestions" placeholder="Your suggestions..."></textarea>
                    </div>
                    <div>
                        <label>Would you like to mentor current students?</label>
                        <select name="mentor">
                            <option value="">Select</option>
                            <option value="yes">Yes, I am interested in mentoring</option>
                            <option value="no">No, not at this time</option>
                            <option value="maybe">Maybe in the future</option>
                        </select>
                    </div>
                    <button class="btn-submit" type="button">Submit Survey &rarr;</button>
                </div>
            </div>

            {{-- CONTACT --}}
            <div id="sec-contact" class="al-sec">
                <h2>Contact Us</h2>
                <p>Get in touch with the GPGCM Alumni Office. We are here to assist you.</p>
                <div class="contact-grid">
                    <div class="contact-item"><div class="contact-icon">&#127963;</div><div><h4>Alumni Office</h4><p>Govt. Postgraduate College Mansehra</p></div></div>
                    <div class="contact-item"><div class="contact-icon">&#128205;</div><div><h4>Address</h4><p>University Road, Mansehra, KPK, Pakistan</p></div></div>
                    <div class="contact-item"><div class="contact-icon">&#128222;</div><div><h4>Phone</h4><p>+92-997-530026</p></div></div>
                    <div class="contact-item"><div class="contact-icon">&#128231;</div><div><h4>Email</h4><p>alumni@gpgcmansehra.edu.pk</p></div></div>
                    <div class="contact-item"><div class="contact-icon">&#128336;</div><div><h4>Office Hours</h4><p>Mon &ndash; Sat: 8:00 AM &ndash; 4:00 PM</p></div></div>
                    <div class="contact-item"><div class="contact-icon">&#127760;</div><div><h4>Website</h4><p>www.gpgcmansehra.edu.pk</p></div></div>
                </div>

                <h3 style="margin-top:22px;">Send a Message</h3>
                <div class="s-form" style="margin-top:10px;">
                    <div class="s-form-row">
                        <div>
                            <label>Your Name</label>
                            <input type="text" name="name" placeholder="Full Name">
                        </div>
                        <div>
                            <label>Email</label>
                            <input type="email" name="email" placeholder="your@email.com">
                        </div>
                    </div>
                    <div>
                        <label>Subject</label>
                        <input type="text" name="subject" placeholder="Subject">
                    </div>
                    <div>
                        <label>Message</label>
                        <textarea name="message" placeholder="Write your message here..."></textarea>
                    </div>
                    <button class="btn-submit" type="button">Send Message &rarr;</button>
                </div>
            </div>

        </div>{{-- end alumni-main --}}

        {{-- LOGIN SIDEBAR --}}
        <div class="alumni-sidebar">
            <div class="login-box">
                <div class="login-hdr">Login / Register</div>
                <div class="login-body">
                    <div>
                        <div class="login-field">
                            <label>Email:</label>
                            <div class="login-field-wrap">
                                <input type="email" name="email" placeholder="">
                                <div class="field-icon">&#9993;</div>
                            </div>
                        </div>
                        <div class="login-field">
                            <label>Password:</label>
                            <div class="login-field-wrap">
                                <input type="password" name="password" placeholder="">
                                <div class="field-icon">&#128274;</div>
                            </div>
                        </div>
                        <div class="login-actions">
                            <a href="#">Sign Up</a>
                            <a href="#">Forgot Password</a>
                            <button class="btn-login" type="button">Login</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>{{-- end alumni-body --}}

    {{-- FOOTER --}}
    <div class="alumni-footer">
        <nav>
            <button onclick="switchTab('home')">Alumni Home</button>
            <button onclick="switchTab('about')">About Alumni</button>
            <button onclick="switchTab('benefits')">Alumni Benefits</button>
            <button onclick="switchTab('corner')">Alumni Corner</button>
            <button onclick="switchTab('contact')">Contact Us</button>
        </nav>
        <div class="copy">
            Copyright &copy; {{ date('Y') }}-{{ date('Y')+1 }}. Government Postgraduate College Mansehra.<br>
            All Rights Reserved.
        </div>
    </div>

    <script>
    function switchTab(tab) {
        document.querySelectorAll('.al-sec').forEach(function(s){ s.classList.remove('active'); });
        document.querySelectorAll('.alumni-tabnav button').forEach(function(b){ b.classList.remove('active'); });
        var sec = document.getElementById('sec-' + tab);
        if (sec) sec.classList.add('active');
        var btn = document.getElementById('tab-' + tab);
        if (btn) btn.classList.add('active');
        document.querySelector('.alumni-main').scrollIntoView({ behavior:'smooth', block:'start' });
    }

    /* Auto open tab if URL hash present e.g. /alumni#survey */
    document.addEventListener('DOMContentLoaded', function(){
        var hash = window.location.hash.replace('#','');
        var validTabs = ['home','about','benefits','corner','survey','contact'];
        if(hash && validTabs.includes(hash)){
            switchTab(hash);
        }
    });
    </script>

</body>
</html>
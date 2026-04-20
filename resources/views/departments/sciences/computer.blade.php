@extends('layouts.app')
@section('title', 'Department of Computer Science — Government Postgraduate College Mansehra')
@section('content')
    <style>
        .dept-breadcrumb {
            background: linear-gradient(90deg, #002855 0%, #004a8f 50%, #002855 100%);
            padding: 10px 0;
            border-bottom: 3px solid #ffd700;
        }

        .dept-breadcrumb .wrap {
            max-width: 1280px;
            margin: auto;
            padding: 0 20px;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: rgba(255, 255, 255, .7);
        }

        .dept-breadcrumb a {
            color: #ffd700;
            text-decoration: none;
        }

        .dept-breadcrumb a:hover {
            text-decoration: underline;
        }

        .dept-breadcrumb .sep {
            color: rgba(255, 255, 255, .35);
        }

        .dept-page {
            background: #f4f5f7;
            padding: 24px 0 60px;
        }

        .dept-wrap {
            max-width: 1280px;
            margin: auto;
            padding: 0 20px;
        }

        .dept-page-title {
            font-size: 22px;
            font-weight: 700;
            color: #1a6fa8;
            margin-bottom: 18px;
        }

        .dept-grid {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 20px;
            align-items: start;
        }

        .dc {
            background: #fff;
            border: 1px solid #d0dce8;
            border-radius: 6px;
            overflow: hidden;
            margin-bottom: 18px;
        }

        .dc-hdr {
            background: #1a6fa8;
            color: #fff;
            padding: 10px 14px;
            font-size: 13.5px;
            font-weight: 700;
            letter-spacing: .03em;
        }

        .dc-body {
            padding: 14px;
        }

        .intro-row {
            display: flex;
            gap: 12px;
            align-items: flex-start;
            margin-bottom: 10px;
        }

        .intro-photo-ph {
            width: 175px;
            height: 130px;
            flex-shrink: 0;
            background: linear-gradient(135deg, #002855, #1a6fa8);
            border-radius: 3px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 48px;
            color: #fff;
        }

        .intro-photo {
            width: 175px;
            height: 130px;
            flex-shrink: 0;
            object-fit: cover;
            border-radius: 3px;
            border: 1px solid #dde;
            display: block;
        }

        .intro-txt {
            font-size: 13px;
            color: #333;
            line-height: 1.75;
            text-align: justify;
        }

        .intro-txt p {
            margin: 0 0 8px;
        }

        .intro-more {
            font-size: 13px;
            color: #333;
            line-height: 1.75;
            text-align: justify;
            margin-bottom: 12px;
        }

        .btn-read-more {
            display: inline-block;
            background: #1a6fa8;
            color: #fff;
            padding: 7px 22px;
            border-radius: 3px;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
            transition: background .2s;
        }

        .btn-read-more:hover {
            background: #0b5a8a;
        }

        .gallery-caption {
            background: #002855;
            color: #fff;
            padding: 6px 12px;
            font-size: 12.5px;
            text-align: center;
        }

        /* ── Gallery Slider ── */
        .gallery-slider {
            position: relative;
            width: 100%;
            height: 210px;
            overflow: hidden;
            border-radius: 3px;
        }

        .gallery-slides {
            width: 100%;
            height: 100%;
        }

        .gallery-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 210px;
            object-fit: cover;
            opacity: 0;
            transition: opacity 0.8s ease-in-out;
        }

        .gallery-slide.active {
            opacity: 1;
        }

        .gallery-prev,
        .gallery-next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(0, 40, 85, 0.6);
            color: #fff;
            border: none;
            padding: 6px 10px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 3px;
            z-index: 10;
            transition: background .2s;
        }

        .gallery-prev {
            left: 6px;
        }

        .gallery-next {
            right: 6px;
        }

        .gallery-prev:hover,
        .gallery-next:hover {
            background: rgba(0, 40, 85, 0.9);
        }

        .gallery-dots {
            position: absolute;
            bottom: 8px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 6px;
            z-index: 10;
        }

        .dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
            cursor: pointer;
            transition: background .3s;
        }

        .dot.active {
            background: #ffd700;
        }

        /* ── Scrolling News & Announcements ── */
        .scroll-wrap {
            height: 210px;
            overflow: hidden;
            position: relative;
        }

        .scroll-wrap::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 36px;
            background: linear-gradient(transparent, #fff);
            pointer-events: none;
        }

        .scroll-inner {
            animation: scrollUp 20s linear infinite;
        }

        .scroll-inner:hover {
            animation-play-state: paused;
        }

        @keyframes scrollUp {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-50%);
            }
        }

        .nl {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .nl li {
            padding: 9px 0;
            border-bottom: 1px dashed #ccc;
            font-size: 13px;
            line-height: 1.4;
        }

        .nl li:last-child {
            border-bottom: none;
        }

        .nl li a {
            color: #1a6fa8;
            text-decoration: none;
            font-weight: 600;
            display: block;
            margin-bottom: 2px;
        }

        .nl li a:hover {
            text-decoration: underline;
        }

        .n-date {
            font-size: 11px;
            color: #888;
            display: block;
            margin-top: 2px;
        }

        .ntag {
            display: inline-block;
            color: #d32f2f;
            font-weight: 800;
            font-size: 11.5px;
            margin-left: 4px;
            vertical-align: middle;
        }

        .imp-wrap {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0 12px;
        }

        .imp-wrap ul {
            list-style: disc;
            padding-left: 18px;
            margin: 0;
        }

        .imp-wrap ul li {
            padding: 4px 0;
            font-size: 13px;
            color: #1a6fa8;
        }

        .imp-wrap ul li a {
            color: #1a6fa8;
            text-decoration: none;
        }

        .imp-wrap ul li a:hover {
            text-decoration: underline;
        }

        .pt {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }

        .pt th {
            background: #002855;
            color: #fff;
            padding: 8px 11px;
            text-align: left;
            font-size: 12.5px;
            font-weight: 600;
        }

        .pt td {
            padding: 7px 11px;
            border-bottom: 1px solid #eef;
            color: #333;
        }

        .pt tr:hover td {
            background: #f0f7ff;
        }

        .pt td a {
            color: #1a6fa8;
            text-decoration: none;
        }

        .pt td a:hover {
            text-decoration: underline;
        }

        .pb {
            display: inline-block;
            font-size: 11px;
            font-weight: 700;
            padding: 1px 7px;
            border-radius: 3px;
            color: #fff;
        }

        .pb.bs {
            background: #28a745;
        }

        .contact-body {
            padding: 12px 14px;
            font-size: 12.5px;
            color: #444;
        }

        .contact-body ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .contact-body ul li {
            display: flex;
            gap: 8px;
            align-items: flex-start;
        }

        .contact-body ul li strong {
            color: #002855;
            min-width: 62px;
        }

        @media(max-width:1024px) {
            .dept-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media(max-width:680px) {
            .dept-grid {
                grid-template-columns: 1fr;
            }

            .intro-row {
                flex-direction: column;
            }

            .intro-photo-ph {
                width: 100%;
                height: 160px;
            }

            .imp-wrap {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="dept-breadcrumb">
        <div class="wrap">
            <a href="{{ url('/') }}">Home</a><span class="sep">›</span>
            <a href="#">Departments</a><span class="sep">›</span>
            <span style="color:#fff;">Department of Computer Science</span>
        </div>
    </div>

    <div class="dept-page">
        <div class="dept-wrap">
            <div class="dept-page-title">Department of Computer Science</div>
            <div class="dept-grid">

                {{-- ══ COL 1: Introduction + Gallery ══ --}}
                <div>
                    <div class="dc">
                        <div class="dc-hdr">Introduction</div>
                        <div class="dc-body">
                            <div class="intro-row">
                                <img class="intro-photo" src="{{ asset('images/cs.png') }}" alt="CS">
                                {{-- <div class="intro-photo-ph">💻</div> --}}
                                <div class="intro-txt">
                                    <p>Welcome to the Department of Computer Science at Government Postgraduate College
                                        Mansehra!</p>
                                    <p>Our department takes great pride in offering a diverse range of esteemed
                                        undergraduate degree programs in the field of Computer Science.</p>
                                </div>
                            </div>
                            <div class="intro-more">
                                <p>our department takes great pride in offering a diverse range of esteemed undergraduate
                                    degree programs in the field of Computer Science.</p>
                            </div>
                            <a href="#" class="btn-read-more">READ MORE</a>
                        </div>
                    </div>

                    {{-- ══ Gallery with Auto Slider ══ --}}
                    <div class="dc">
                        <div class="dc-hdr">Department Gallery</div>
                        <div style="padding:8px;">
                            <div class="gallery-slider">
                                <div class="gallery-slides">
                                    <img class="gallery-slide active" src="{{ asset('images/gallery.jpeg') }}"
                                        alt="Gallery 1">
                                    <img class="gallery-slide" src="{{ asset('images/gallery2.jpeg') }}" alt="Gallery 2">
                                    <img class="gallery-slide" src="{{ asset('images/gallery3.jpeg') }}" alt="Gallery 3">
                                    {{-- <img class="gallery-slide" src="{{ asset('images/gallery4.jpeg') }}"
                                        alt="Gallery 4"> --}}
                                </div>
                                <button class="gallery-prev" onclick="changeSlide(-1)">&#10094;</button>
                                <button class="gallery-next" onclick="changeSlide(1)">&#10095;</button>
                                <div class="gallery-dots">
                                    <span class="dot active" onclick="goToSlide(0)"></span>
                                    <span class="dot" onclick="goToSlide(1)"></span>
                                    <span class="dot" onclick="goToSlide(2)"></span>
                                    {{-- <span class="dot" onclick="goToSlide(3)"></span> --}}
                                </div>
                            </div>
                            <div class="gallery-caption">CS Department — GPGC Mansehra</div>
                        </div>
                    </div>
                </div>

                {{-- ══ COL 2: News & Events (scrolling) + Important Links ══ --}}
                <div>
                    <div class="dc">
                        <div class="dc-hdr">News &amp; Events</div>
                        <div class="dc-body" style="padding:10px 14px;">
                            <div class="scroll-wrap">
                                <div class="scroll-inner">
                                    <ul class="nl">
                                        <li><a href="#">Science Students Seminar on Artificial Intelligence and Machine
                                                Learning <span class="ntag">New</span></a><span class="n-date">16 Apr
                                                2025</span></li>
                                        <li><a href="#">FES Pakistan visits Department of Computer Science, GPGCM <span
                                                    class="ntag">New</span></a><span class="n-date">03 Mar 2025</span></li>
                                        <li><a href="#">Department of CS Welcomes Fresh Batch of BS Students <span
                                                    class="ntag">New</span></a><span class="n-date">15 Feb 2025</span></li>
                                        <li><a href="#">Programming Competition 2025 — Inter-Departmental Coding
                                                Challenge</a><span class="n-date">10 Jan 2025</span></li>
                                        <li><a href="#">Workshop on Cybersecurity Awareness for Students and
                                                Faculty</a><span class="n-date">05 Dec 2024</span></li>
                                        <li><a href="#">CS Department Signs MOU with Leading IT Company for
                                                Internships</a><span class="n-date">20 Nov 2024</span></li>
                                        <li><a href="#">Final Year Project Exhibition — BS Computer Science 2024</a><span
                                                class="n-date">15 Oct 2024</span></li>
                                        {{-- Duplicate for seamless loop --}}
                                        <li><a href="#">Science Students Seminar on Artificial Intelligence and Machine
                                                Learning <span class="ntag">New</span></a><span class="n-date">16 Apr
                                                2025</span></li>
                                        <li><a href="#">FES Pakistan visits Department of Computer Science, GPGCM <span
                                                    class="ntag">New</span></a><span class="n-date">03 Mar 2025</span></li>
                                        <li><a href="#">Department of CS Welcomes Fresh Batch of BS Students <span
                                                    class="ntag">New</span></a><span class="n-date">15 Feb 2025</span></li>
                                        <li><a href="#">Programming Competition 2025 — Inter-Departmental Coding
                                                Challenge</a><span class="n-date">10 Jan 2025</span></li>
                                        <li><a href="#">Workshop on Cybersecurity Awareness for Students and
                                                Faculty</a><span class="n-date">05 Dec 2024</span></li>
                                        <li><a href="#">CS Department Signs MOU with Leading IT Company for
                                                Internships</a><span class="n-date">20 Nov 2024</span></li>
                                        <li><a href="#">Final Year Project Exhibition — BS Computer Science 2024</a><span
                                                class="n-date">15 Oct 2024</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="dc">
                        <div class="dc-hdr">Important Links</div>
                        <div class="dc-body">
                            <div class="imp-wrap">
                                <ul>
                                    <li><a href="{{ route('department.hod', 'cs') }}">HOD's Message</a></li>
                                    <li><a href="{{ route('department.show', 'cs') }}">BS Computer Science</a></li>
                                    <li><a href="{{ route('department.goals', 'cs') }}">Program Goals</a></li>
                                    <li><a href="{{ route('department.course', 'cs') }}">Course Outline</a></li>
                                    <li><a href="{{ route('department.labs', 'cs') }}">Labs</a></li>
                                    <li><a href="{{ route('department.faculty', 'cs') }}">Faculty Members</a></li>
                                </ul>
                                <ul>
                                    <li><a href="{{ route('department.semester', 'cs') }}">Semester Rules</a></li>
                                    <li><a href="{{ route('department.fee', 'cs') }}">Fee Structure</a></li>
                                    <li><a href="{{ route('department.admissions', 'cs') }}">Admissions</a></li>
                                    <li><a href="{{ route('department.datesheets', 'cs') }}">Date Sheets</a></li>
                                    <li><a href="{{ route('department.results', 'cs') }}">Results</a></li>
                                    <li><a href="{{ route('department.downloads', 'cs') }}">Downloads</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ══ COL 3: Programs + Announcements (scrolling) + Contact ══ --}}
                <div>
                    <div class="dc">
                        <div class="dc-hdr">Programs Offered</div>
                        <div class="dc-body" style="padding:10px 14px;">
                            <table class="pt">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Program</th>
                                        <th>Level</th>
                                        <th>Duration</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><a href="#">BS Computer Science</a></td>
                                        <td><span class="pb bs">BS</span></td>
                                        <td>4 Years</td>
                                    </tr>
                                </tbody>
                            </table>
                            <p style="font-size:12px;color:#888;margin-top:8px;">* HEC recognized. Affiliated with
                                University of Hazara.</p>
                        </div>
                    </div>

                    <div class="dc">
                        <div class="dc-hdr">Announcements</div>
                        <div class="dc-body" style="padding:10px 14px;">
                            <div class="scroll-wrap">
                                <div class="scroll-inner">
                                    <ul class="nl">
                                        <li><a href="#">Mid-Term Examination Schedule — Spring 2025 <span
                                                    class="ntag">New</span></a><span class="n-date">10 Apr 2025</span></li>
                                        <li><a href="#">BS CS Admissions Open for Fall 2025 <span
                                                    class="ntag">New</span></a><span class="n-date">05 Apr 2025</span></li>
                                        <li><a href="#">Fee Submission Deadline — Spring 2025 <span
                                                    class="ntag">New</span></a><span class="n-date">01 Apr 2025</span></li>
                                        <li><a href="#">Final Year Project Submission Guidelines</a><span class="n-date">20
                                                Mar 2025</span></li>
                                        <li><a href="#">Scholarship Applications Open for CS Students</a><span
                                                class="n-date">10 Mar 2025</span></li>
                                        <li><a href="#">Lab Safety Workshop Mandatory for All BS Students</a><span
                                                class="n-date">01 Mar 2025</span></li>
                                        <li><a href="#">Class Timetable Spring 2025 Available on Notice Board</a><span
                                                class="n-date">15 Feb 2025</span></li>
                                        {{-- Duplicate for seamless loop --}}
                                        <li><a href="#">Mid-Term Examination Schedule — Spring 2025 <span
                                                    class="ntag">New</span></a><span class="n-date">10 Apr 2025</span></li>
                                        <li><a href="#">BS CS Admissions Open for Fall 2025 <span
                                                    class="ntag">New</span></a><span class="n-date">05 Apr 2025</span></li>
                                        <li><a href="#">Fee Submission Deadline — Spring 2025 <span
                                                    class="ntag">New</span></a><span class="n-date">01 Apr 2025</span></li>
                                        <li><a href="#">Final Year Project Submission Guidelines</a><span class="n-date">20
                                                Mar 2025</span></li>
                                        <li><a href="#">Scholarship Applications Open for CS Students</a><span
                                                class="n-date">10 Mar 2025</span></li>
                                        <li><a href="#">Lab Safety Workshop Mandatory for All BS Students</a><span
                                                class="n-date">01 Mar 2025</span></li>
                                        <li><a href="#">Class Timetable Spring 2025 Available on Notice Board</a><span
                                                class="n-date">15 Feb 2025</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="dc">
                        <div class="dc-hdr">📞 Contact Department</div>
                        <div class="contact-body">
                            <ul>
                                <li><strong>HOD:</strong> Prof. [Name]</li>
                                <li><strong>Phone:</strong> 0997-XXXXXXX</li>
                                <li><strong>Email:</strong> cs@gpgcm.edu.pk</li>
                                <li><strong>Block:</strong> CS Block, GPGCM Mansehra</li>
                                <li><strong>Hours:</strong> Mon–Fri 8:00 AM–4:00 PM</li>
                            </ul>
                        </div>
                    </div>

                    <div class="dc">
                        <div class="dc-hdr">Accreditation</div>
                        <div class="dc-body" style="font-size:13px;color:#444;line-height:1.7;">
                            <p>All programs are recognized and approved by the <strong>Higher Education Commission (HEC) of
                                    Pakistan</strong>.</p>
                            <p style="margin-top:8px;">Working towards <strong>NCEAC accreditation</strong>.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        let currentSlide = 0;
        const slides = document.querySelectorAll('.gallery-slide');
        const dots = document.querySelectorAll('.dot');
        let autoPlay = setInterval(() => changeSlide(1), 3000);

        function showSlide(n) {
            slides[currentSlide].classList.remove('active');
            dots[currentSlide].classList.remove('active');
            currentSlide = (n + slides.length) % slides.length;
            slides[currentSlide].classList.add('active');
            dots[currentSlide].classList.add('active');
        }

        function changeSlide(dir) {
            clearInterval(autoPlay);
            showSlide(currentSlide + dir);
            autoPlay = setInterval(() => changeSlide(1), 3000);
        }

        function goToSlide(n) {
            clearInterval(autoPlay);
            showSlide(n);
            autoPlay = setInterval(() => changeSlide(1), 3000);
        }
    </script>

@endsection
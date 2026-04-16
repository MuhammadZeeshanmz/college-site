@extends('layouts.app')

@section('title', 'Government Postgraduate College Mansehra - Excellence in Education')

@section('content')

<!-- ── HERO ── -->
<section class="hero">
    <div class="hero-bg-pattern"></div>
    <div class="hero-glow-left"></div>
    <div class="hero-glow-right"></div>
    <div class="hero-stripe"></div>
    <div class="hero-content">
        <div data-aos="fade-right">
            <div class="hero-badge">🎓 HEC Recognized Institution</div>
            <h1 class="hero-title">
                Shaping
                <span>Future Leaders</span>
                of Pakistan
            </h1>
            <p class="hero-desc">
                Government Postgraduate College Mansehra — a premier institution
                dedicated to academic excellence, research, and developing well-rounded
                professionals since 1957.
            </p>
            <div class="hero-actions">
                <a href="#programs" class="btn-primary">Explore Programs</a>
                <a href="#about" class="btn-outline-w">Learn More</a>
            </div>
            <div class="hero-stats">
                <div class="hero-stat">
                    <div class="num">65+</div>
                    <div class="lbl">Years of Excellence</div>
                </div>
                <div class="hero-stat">
                    <div class="num">15K+</div>
                    <div class="lbl">Alumni Worldwide</div>
                </div>
                <div class="hero-stat">
                    <div class="num">27+</div>
                    <div class="lbl">Departments</div>
                </div>
            </div>
        </div>
        <div class="hero-card" data-aos="fade-left">
            <h3>Start Your Application</h3>
            <p class="sub">Admissions open — Apply today</p>
            <div class="form-field">
                <label>Full Name</label>
                <input type="text" placeholder="Muhammad Ali">
            </div>
            <div class="form-field">
                <label>CNIC / B-Form No.</label>
                <input type="text" placeholder="XXXXX-XXXXXXX-X">
            </div>
            <div class="form-field">
                <label>Program of Interest</label>
                <select>
                    <option>Select Program</option>
                    <option>BS Computer Science</option>
                    <option>BS Mathematics</option>
                    <option>BS Physics</option>
                    <option>BS Chemistry</option>
                    <option>BS English</option>
                    <option>BS Economics</option>
                    <option>BS Political Science</option>
                    <option>BS Zoology</option>
                    <option>BS Botany</option>
                </select>
            </div>
            <div class="form-field">
                <label>Phone Number</label>
                <input type="text" placeholder="+92 3XX XXXXXXX">
            </div>
            <button class="btn-submit">Submit Application →</button>
        </div>
    </div>
</section>

<!-- ── TICKER ── -->
<div class="ticker">
    <div class="ticker-inner">
        <div class="ticker-label">📢 Latest</div>
        <div class="ticker-track">
            <div class="ticker-text">
                <span>🎓 Admissions Open for Fall 2025 — Apply Before 30th August</span>
                <span>🏆 College Wins Best Institution Award 2024 from Government of KP</span>
                <span>📚 New BS Artificial Intelligence Program Launched</span>
                <span>🎓 Convocation Ceremony Scheduled for November 2025</span>
                <span>🔬 Research Grant of Rs. 10 Million Received from HEC</span>
                <span>🌍 International Conference on Climate Change Announced</span>
                <span>🎓 Admissions Open for Fall 2025 — Apply Before 30th August</span>
                <span>🏆 College Wins Best Institution Award 2024 from Government of KP</span>
                <span>📚 New BS Artificial Intelligence Program Launched</span>
            </div>
        </div>
    </div>
</div>

<!-- ── QUICK LINKS ── -->
<section class="ql-section">
    <div class="container">
        <div class="qlinks-grid">
            <a href="#" class="qlink" data-aos="fade-up" data-aos-delay="0">
                <div class="qlink-icon">📋</div><span>Admissions</span>
            </a>
            <a href="#" class="qlink" data-aos="fade-up" data-aos-delay="40">
                <div class="qlink-icon">📊</div><span>Results</span>
            </a>
            <a href="#" class="qlink" data-aos="fade-up" data-aos-delay="80">
                <div class="qlink-icon">📅</div><span>Date Sheet</span>
            </a>
            <a href="#" class="qlink" data-aos="fade-up" data-aos-delay="120">
                <div class="qlink-icon">💰</div><span>Fee Structure</span>
            </a>
            <a href="#" class="qlink" data-aos="fade-up" data-aos-delay="160">
                <div class="qlink-icon">🎓</div><span>Scholarship</span>
            </a>
            <a href="#" class="qlink" data-aos="fade-up" data-aos-delay="200">
                <div class="qlink-icon">📚</div><span>Library</span>
            </a>
            <a href="#" class="qlink" data-aos="fade-up" data-aos-delay="240">
                <div class="qlink-icon">🏠</div><span>Hostel</span>
            </a>
            <a href="#" class="qlink" data-aos="fade-up" data-aos-delay="280">
                <div class="qlink-icon">📞</div><span>Contact Us</span>
            </a>
        </div>
    </div>
</section>

<!-- ── PROGRAMS ── -->
<section class="programs-section" id="programs">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <div class="section-tag">Academic Programs</div>
            <h2 class="section-title">Choose Your Path to Success</h2>
            <p class="section-sub">From undergraduate to postgraduate, world-class programs designed to meet the demands of the modern economy.</p>
        </div>
        <div class="programs-grid">
            <a href="#" class="program-card" data-aos="fade-up" data-aos-delay="0">
                <div class="program-card-top">
                    <div class="program-icon" style="background:#e8f5ee;">💻</div>
                    <h3>Computer Science & IT</h3>
                    <p>AI, cybersecurity, software engineering, and data science with state-of-the-art labs and industry partnerships.</p>
                </div>
                <div class="program-card-bottom">
                    <div class="program-meta"><strong>8</strong> Specializations &nbsp;|&nbsp; <strong>4</strong> Years</div>
                    <div class="program-arrow">→</div>
                </div>
            </a>
            <a href="#" class="program-card" data-aos="fade-up" data-aos-delay="60">
                <div class="program-card-top">
                    <div class="program-icon" style="background:#fef9ec;">📈</div>
                    <h3>Business & Management</h3>
                    <p>BBA and specialized programs in finance, marketing, HRM, and entrepreneurship with industry exposure.</p>
                </div>
                <div class="program-card-bottom">
                    <div class="program-meta"><strong>6</strong> Specializations &nbsp;|&nbsp; <strong>4</strong> Years</div>
                    <div class="program-arrow">→</div>
                </div>
            </a>
            <a href="#" class="program-card" data-aos="fade-up" data-aos-delay="120">
                <div class="program-card-top">
                    <div class="program-icon" style="background:#edf7f0;">⚗️</div>
                    <h3>Physical Sciences</h3>
                    <p>Physics, chemistry, and mathematics with advanced research facilities and modern laboratories.</p>
                </div>
                <div class="program-card-bottom">
                    <div class="program-meta"><strong>5</strong> Disciplines &nbsp;|&nbsp; <strong>4</strong> Years</div>
                    <div class="program-arrow">→</div>
                </div>
            </a>
            <a href="#" class="program-card" data-aos="fade-up" data-aos-delay="180">
                <div class="program-card-top">
                    <div class="program-icon" style="background:#ecf9f2;">🌿</div>
                    <h3>Life Sciences</h3>
                    <p>Zoology, botany, and biotechnology programs with extensive fieldwork and research opportunities.</p>
                </div>
                <div class="program-card-bottom">
                    <div class="program-meta"><strong>4</strong> Programs &nbsp;|&nbsp; <strong>4</strong> Years</div>
                    <div class="program-arrow">→</div>
                </div>
            </a>
            <a href="#" class="program-card" data-aos="fade-up" data-aos-delay="240">
                <div class="program-card-top">
                    <div class="program-icon" style="background:#f0f8f3;">⚖️</div>
                    <h3>Social Sciences</h3>
                    <p>Economics, political science, psychology, and sociology developing critical thinkers and future leaders.</p>
                </div>
                <div class="program-card-bottom">
                    <div class="program-meta"><strong>7</strong> Programs &nbsp;|&nbsp; <strong>4</strong> Years</div>
                    <div class="program-arrow">→</div>
                </div>
            </a>
            <a href="#" class="program-card" data-aos="fade-up" data-aos-delay="300">
                <div class="program-card-top">
                    <div class="program-icon" style="background:#eaf6ef;">📖</div>
                    <h3>Languages & Literature</h3>
                    <p>English, Urdu, and other language programs focusing on literature, linguistics, and communication.</p>
                </div>
                <div class="program-card-bottom">
                    <div class="program-meta"><strong>4</strong> Languages &nbsp;|&nbsp; <strong>4</strong> Years</div>
                    <div class="program-arrow">→</div>
                </div>
            </a>
        </div>
    </div>
</section>

<!-- ── STATS ── -->
<div class="stats-strip">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-block" data-aos="zoom-in" data-aos-delay="0">
                <div class="num">10,200+</div>
                <div class="lbl">Enrolled Students</div>
            </div>
            <div class="stat-block" data-aos="zoom-in" data-aos-delay="60">
                <div class="num">335+</div>
                <div class="lbl">Faculty Members</div>
            </div>
            <div class="stat-block" data-aos="zoom-in" data-aos-delay="120">
                <div class="num">27</div>
                <div class="lbl">Departments</div>
            </div>
            <div class="stat-block" data-aos="zoom-in" data-aos-delay="180">
                <div class="num">144</div>
                <div class="lbl">Active Programs</div>
            </div>
        </div>
    </div>
</div>

<!-- ── DEPARTMENTS SLIDER ── -->
<section class="depts-section" id="departments">
    <div class="container">
        <div class="section-header center" data-aos="fade-up">
            <div class="section-tag">Academic Excellence</div>
            <h2 class="section-title">Explore Our Departments</h2>
            <p class="section-sub">Discover world-class education across multiple disciplines with state-of-the-art facilities.</p>
        </div>
        <div class="swiper mySwiper" data-aos="fade-up">
            <div class="swiper-wrapper">
                @php
                    $departments = [
                        ['id'=>'cs',      'name'=>'Computer Science',  'short'=>'Innovation Through Technology', 'img'=>'https://images.unsplash.com/photo-1587620962725-abab7fe551e5?w=400&h=220&fit=crop'],
                        ['id'=>'math',    'name'=>'Mathematics',       'short'=>'The Language of Science',       'img'=>'https://images.unsplash.com/photo-1635070041078-e363dbe005cb?w=400&h=220&fit=crop'],
                        ['id'=>'physics', 'name'=>'Physics',           'short'=>'Understanding the Universe',    'img'=>'https://images.unsplash.com/photo-1581091226033-d5c48150dbaa?w=400&h=220&fit=crop'],
                        ['id'=>'chem',    'name'=>'Chemistry',         'short'=>'Transforming Matter',           'img'=>'https://images.unsplash.com/photo-1532187863486-abf9dbad1b69?w=400&h=220&fit=crop'],
                        ['id'=>'zoology', 'name'=>'Zoology',           'short'=>'Exploring Animal Life',         'img'=>'https://images.unsplash.com/photo-1544717305-38b3144e0a08?w=400&h=220&fit=crop'],
                        ['id'=>'botany',  'name'=>'Botany',            'short'=>'Plant Sciences',                'img'=>'https://images.unsplash.com/photo-1536312618463-f4bda1307947?w=400&h=220&fit=crop'],
                        ['id'=>'eng',     'name'=>'English',           'short'=>'Mastering Language',            'img'=>'https://images.unsplash.com/photo-1529101091764-c3526daf3c7a?w=400&h=220&fit=crop'],
                        ['id'=>'eco',     'name'=>'Economics',         'short'=>'Shaping Policy & Markets',      'img'=>'https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?w=400&h=220&fit=crop'],
                        ['id'=>'ps',      'name'=>'Political Science', 'short'=>'Power & Governance',            'img'=>'https://images.unsplash.com/photo-1521791136064-7986c2920216?w=400&h=220&fit=crop'],
                        ['id'=>'urdu',    'name'=>'Urdu',              'short'=>'Literary Heritage',              'img'=>'https://images.unsplash.com/photo-1456513080510-7bf3a84b82f8?w=400&h=220&fit=crop'],
                        ['id'=>'stat',    'name'=>'Statistics',        'short'=>'Data & Analysis',               'img'=>'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=400&h=220&fit=crop'],
                        ['id'=>'isl',     'name'=>'Islamiat',          'short'=>'Islamic Studies & Heritage',    'img'=>'https://images.unsplash.com/photo-1584551246679-258d5b5ef0f1?w=400&h=220&fit=crop'],
                    ];
                @endphp
                @foreach($departments as $dept)
                <div class="swiper-slide">
                    <a href="{{ route('department.show', $dept['id']) }}" class="dept-card">
                        <img src="{{ $dept['img'] }}" alt="{{ $dept['name'] }}">
                        <div class="dept-card-body">
                            <h3>{{ $dept['name'] }}</h3>
                            <p>{{ $dept['short'] }}</p>
                            <span>Explore →</span>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

<!-- ── NEWS ── -->
<section class="news-section" id="news">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <div class="section-tag">News & Events</div>
            <h2 class="section-title">Stay Up to Date</h2>
            <p class="section-sub">Latest happenings and upcoming events at Government Postgraduate College Mansehra.</p>
        </div>
        <div class="news-grid">
            <a href="#" class="news-featured" data-aos="fade-right">
                <div class="thumb">🎓</div>
                <div class="content">
                    <div class="news-badge">Featured</div>
                    <h3>5th Annual Convocation Ceremony — Over 2,000 Graduates Celebrated</h3>
                    <p style="color:rgba(255,255,255,.6);font-size:13.5px;margin-top:8px;line-height:1.6;">The ceremony was graced by the Governor of KP as chief guest, who distributed medals and degrees among outstanding students.</p>
                    <div class="date" style="margin-top:12px;">January 28, 2026</div>
                </div>
            </a>
            <div class="news-list" data-aos="fade-left">
                <a href="#" class="news-item">
                    <div class="news-item-icon">📢</div>
                    <div><h4>On-Campus Physical Classes Resume from April 6, 2026</h4><span>01 Apr 2026</span></div>
                </a>
                <a href="#" class="news-item">
                    <div class="news-item-icon">🏆</div>
                    <div><h4>College Achieves Record QEC Score of 86.69 in 2024–25 Evaluation</h4><span>10 Mar 2026</span></div>
                </a>
                <a href="#" class="news-item">
                    <div class="news-item-icon">🤝</div>
                    <div><h4>MoU Signed with University of Punjab for Research Collaboration</h4><span>11 Mar 2026</span></div>
                </a>
                <a href="#" class="news-item">
                    <div class="news-item-icon">💻</div>
                    <div><h4>Physics Department Participates in Pakistan's 1st Quantum Hackathon</h4><span>15 Feb 2026</span></div>
                </a>
                <a href="#" class="news-item">
                    <div class="news-item-icon">🎓</div>
                    <div><h4>PM Laptop Distribution Ceremony Successfully Held at Campus</h4><span>05 Feb 2026</span></div>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ── WHY CHOOSE US ── -->
<section class="why-section" id="about">
    <div class="container">
        <div class="why-grid">
            <div data-aos="fade-right">
                <div class="section-tag">Why Choose Us</div>
                <h2 class="section-title">A Campus Built for<br>Your Success</h2>
                <p class="section-sub" style="margin-bottom:32px;">We provide everything you need to grow academically, professionally, and personally in a nurturing environment.</p>
                <div class="why-features">
                    <div class="why-feature">
                        <div class="why-feature-icon">🏛️</div>
                        <div>
                            <h4>HEC Recognized & Accredited</h4>
                            <p>All programs recognized by the Higher Education Commission of Pakistan with W-category ranking.</p>
                        </div>
                    </div>
                    <div class="why-feature">
                        <div class="why-feature-icon">🔬</div>
                        <div>
                            <h4>World-Class Research Facilities</h4>
                            <p>Central research labs, digital library, and dedicated innovation centers for every discipline.</p>
                        </div>
                    </div>
                    <div class="why-feature">
                        <div class="why-feature-icon">💼</div>
                        <div>
                            <h4>Career Development Center</h4>
                            <p>Dedicated CDC with job placement support, internship programs, and industry partnerships.</p>
                        </div>
                    </div>
                    <div class="why-feature">
                        <div class="why-feature-icon">🏠</div>
                        <div>
                            <h4>Full Campus Facilities</h4>
                            <p>Hostels, transport service, sports complex, day care center, and a central mosque on campus.</p>
                        </div>
                    </div>
                </div>
            </div>
           <div class="why-visual" data-aos="fade-left">
    <div class="vc-wrap">

        <img 
    class="vc-avatar" 
    src="{{ asset('images/principle.jpg') }}"
    style="width:220px;height:220px;object-fit:cover;border-radius:50%;"
    alt="Principal"
/>

        <div class="vc-name">Prof. Riaz Hussain</div>
        <div class="vc-title-label">Principal</div>

        <div class="vc-quote">
            <blockquote>
                "The long-term growth of nations depends on the professional performance of its human resources. We are committed to building those capacities — constantly and continuously through quality education, research, and character building."
            </blockquote>
        </div>

        <a href="#" class="vc-link">Read Full Message →</a>

    </div>
</div>
        </div>
    </div>
</section>

@endsection
@extends('layouts.app')

@php
    $departmentsData = [
        'cs' => [
            'title'         => 'Computer Science',
            'tagline'       => 'Innovation Through Technology',
            'hero_image'    => 'https://images.unsplash.com/photo-1587620962725-abab7fe551e5?w=1200&h=400&fit=crop',
            'description'   => 'The Department of Computer Science offers cutting-edge programs in software development, artificial intelligence, data science, and cybersecurity. Students gain hands-on experience through state-of-the-art labs and industry collaborations. Our curriculum is designed to meet the demands of the rapidly evolving tech industry, preparing students for successful careers in Pakistan and abroad.',
            'vision'        => 'To become a leading center of excellence in computer science education and research, producing graduates who can compete globally and contribute to technological advancement.',
            'mission'       => 'To provide quality education, foster research and innovation, develop problem-solving skills, and prepare students for leadership roles in the digital age.',
            'faculty'       => '15+ Distinguished Faculty Members including PhDs from top universities worldwide',
            'programs'      => ['BS Computer Science (4 Years)', 'BS Artificial Intelligence (4 Years)', 'MS Computer Science (2 Years)', 'PhD Computer Science (3–5 Years)'],
            'facilities'    => [
                ['icon'=>'🤖','name'=>'AI & Machine Learning Lab',    'desc'=>'State-of-the-art lab with GPU clusters for AI research'],
                ['icon'=>'🔒','name'=>'Cybersecurity Lab',            'desc'=>'Advanced security testing and simulation environment'],
                ['icon'=>'💻','name'=>'Software Development Studio',  'desc'=>'Industry-standard development environment'],
                ['icon'=>'📊','name'=>'Data Science Center',          'desc'=>'Big data analytics and visualization facilities'],
            ],
            'achievements'  => [
                ['year'=>'2024','title'=>'Ranked Top CS Department', 'desc'=>'Ranked among top 5 CS departments in Pakistan by HEC'],
                ['year'=>'2024','title'=>'Research Excellence',      'desc'=>'50+ research publications in international journals'],
                ['year'=>'2023','title'=>'Industry Partnership',     'desc'=>'Signed MoU with Microsoft for AI certification program'],
                ['year'=>'2023','title'=>'National Competition',     'desc'=>'Winners of National Software Competition 2023'],
            ],
            'careers'       => ['Software Engineer','Data Scientist','AI Specialist','Cybersecurity Analyst','Cloud Architect','IT Consultant'],
            'contact_email' => 'cs@gpgcm.edu.pk',
            'contact_phone' => '+92-997-123456',
        ],
        'math' => [
            'title'         => 'Mathematics',
            'tagline'       => 'The Language of Science',
            'hero_image'    => 'https://images.unsplash.com/photo-1635070041078-e363dbe005cb?w=1200&h=400&fit=crop',
            'description'   => 'The Department of Mathematics offers comprehensive programs in pure and applied mathematics, statistics, and computational mathematics. Our curriculum develops analytical thinking, problem-solving abilities, and mathematical modeling skills essential for careers in academia, research, finance, and data science.',
            'vision'        => 'To be a center of excellence in mathematical sciences, producing graduates who can solve complex real-world problems through mathematical reasoning.',
            'mission'       => 'To provide rigorous mathematical training, foster research culture, and prepare students for diverse career paths in academia, industry, and government sectors.',
            'faculty'       => '12+ Highly Qualified Faculty with international research experience',
            'programs'      => ['BS Mathematics (4 Years)','BS Statistics (4 Years)','MS Mathematics (2 Years)','MPhil Mathematics (2 Years)'],
            'facilities'    => [
                ['icon'=>'📐','name'=>'Mathematics Research Center', 'desc'=>'Advanced research facilities for mathematical modeling'],
                ['icon'=>'📊','name'=>'Statistical Computing Lab',   'desc'=>'Modern computing facilities with statistical software'],
                ['icon'=>'🎯','name'=>'Mathematical Modeling Lab',   'desc'=>'Specialized lab for mathematical simulations'],
                ['icon'=>'📚','name'=>'Digital Library',             'desc'=>'Access to international mathematics journals'],
            ],
            'achievements'  => [
                ['year'=>'2024','title'=>'Research Excellence',          'desc'=>'Faculty published 30+ research papers in top journals'],
                ['year'=>'2024','title'=>'Olympiad Success',             'desc'=>'Students won gold medal in National Mathematics Olympiad'],
                ['year'=>'2023','title'=>'International Collaboration',  'desc'=>'Research collaboration with University of Cambridge'],
                ['year'=>'2023','title'=>'Research Grants',             'desc'=>'Received HEC research grant of Rs. 5 Million'],
            ],
            'careers'       => ['Data Scientist','Actuary','Research Mathematician','Statistician','Financial Analyst','Mathematics Teacher'],
            'contact_email' => 'maths@gpgcm.edu.pk',
            'contact_phone' => '+92-997-123457',
        ],
        'physics' => [
            'title'         => 'Physics',
            'tagline'       => 'Understanding the Universe',
            'hero_image'    => 'https://images.unsplash.com/photo-1581091226033-d5c48150dbaa?w=1200&h=400&fit=crop',
            'description'   => 'The Department of Physics offers comprehensive programs in theoretical and experimental physics, including quantum mechanics, electronics, astrophysics, and materials science. Our research-based learning approach prepares future scientists and innovators for cutting-edge research and development.',
            'vision'        => 'To be a premier institution for physics education and research, contributing to scientific advancement and technological innovation.',
            'mission'       => 'To provide quality education, promote research culture, develop analytical skills, and prepare students for careers in science, technology, and academia.',
            'faculty'       => '11+ Renowned Physicists with PhDs from leading universities',
            'programs'      => ['BS Physics (4 Years)','BS Electronics (4 Years)','MS Physics (2 Years)','PhD Physics (3–5 Years)'],
            'facilities'    => [
                ['icon'=>'⚛️','name'=>'Quantum Mechanics Lab',  'desc'=>'Advanced quantum physics experiments facility'],
                ['icon'=>'🔌','name'=>'Electronics Workshop',   'desc'=>'Modern electronics design and testing lab'],
                ['icon'=>'🔭','name'=>'Observatory',            'desc'=>'Astronomical observatory with advanced telescopes'],
                ['icon'=>'🔬','name'=>'Nanotechnology Lab',     'desc'=>'Nano-materials synthesis and characterization'],
            ],
            'achievements'  => [
                ['year'=>'2024','title'=>'Research Excellence',         'desc'=>'Research published in Nature Physics journal'],
                ['year'=>'2024','title'=>'National Award',              'desc'=>'Faculty received Presidential Award for Science'],
                ['year'=>'2023','title'=>'International Collaboration', 'desc'=>'Collaboration with CERN for particle physics research'],
                ['year'=>'2023','title'=>'Patent Filed',                'desc'=>'Patent filed for innovative sensor technology'],
            ],
            'careers'       => ['Research Scientist','Physics Teacher','Electronics Engineer','Astrophysicist','Materials Scientist','Medical Physicist'],
            'contact_email' => 'physics@gpgcm.edu.pk',
            'contact_phone' => '+92-997-123458',
        ],
        'chem' => [
            'title'         => 'Chemistry',
            'tagline'       => 'Exploring Matter and Its Transformations',
            'hero_image'    => 'https://images.unsplash.com/photo-1554475900-0a0350e3fc7b?w=1200&h=400&fit=crop',
            'description'   => 'The Department of Chemistry offers comprehensive programs in organic, inorganic, physical, and analytical chemistry. Students develop strong laboratory skills and theoretical knowledge through hands-on experiments and research projects. Our graduates are well-prepared for careers in pharmaceuticals, food science, environmental protection, and academic research.',
            'vision'        => 'To be a leading center for chemical sciences education and research, producing graduates who contribute to scientific advancement and industrial development in Pakistan and beyond.',
            'mission'       => 'To provide rigorous chemistry education, promote innovative research, develop laboratory excellence, and prepare students for impactful careers in science and industry.',
            'faculty'       => '10+ Experienced Faculty Members with PhDs from reputable national and international universities',
            'programs'      => ['BS Chemistry (4 Years)','BS Industrial Chemistry (4 Years)','MS Chemistry (2 Years)','MPhil Chemistry (2 Years)'],
            'facilities'    => [
                ['icon'=>'🧪','name'=>'Organic Chemistry Lab',      'desc'=>'Fully equipped lab for synthesis and reaction studies'],
                ['icon'=>'🔬','name'=>'Analytical Chemistry Lab',   'desc'=>'Advanced instruments for qualitative and quantitative analysis'],
                ['icon'=>'⚗️','name'=>'Physical Chemistry Lab',     'desc'=>'Thermodynamics and electrochemistry research facility'],
                ['icon'=>'🧫','name'=>'Biochemistry Lab',           'desc'=>'Modern lab for biological and chemical interaction studies'],
            ],
            'achievements'  => [
                ['year'=>'2024','title'=>'Research Publication',        'desc'=>'Faculty published 20+ papers in peer-reviewed journals'],
                ['year'=>'2024','title'=>'HEC Recognition',             'desc'=>'Department recognized by HEC for research output'],
                ['year'=>'2023','title'=>'National Chemistry Olympiad', 'desc'=>'Students secured positions in National Chemistry Olympiad'],
                ['year'=>'2023','title'=>'Industry Linkage',            'desc'=>'Partnership signed with local pharmaceutical industry'],
            ],
            'careers'       => ['Pharmacist','Chemical Engineer','Lab Analyst','Environmental Scientist','Research Chemist','Quality Control Officer','Food Scientist'],
            'contact_email' => 'chemistry@gpgcm.edu.pk',
            'contact_phone' => '+92-997-123459',
        ],
        'bio' => [
            'title'         => 'Biology',
            'tagline'       => 'Discovering the Science of Life',
            'hero_image'    => 'https://images.unsplash.com/photo-1530026186672-2cd00ffc50fe?w=1200&h=400&fit=crop',
            'description'   => 'The Department of Biology offers comprehensive programs in botany, zoology, microbiology, and environmental sciences. Through modern laboratories and field studies, students explore the living world from molecular to ecosystem levels, preparing them for careers in healthcare, research, agriculture, and environmental management.',
            'vision'        => 'To be a premier department for biological sciences, fostering innovation in research and producing graduates who address global challenges in health, food, and the environment.',
            'mission'       => 'To provide excellent biological sciences education, promote research culture, develop field and laboratory competencies, and prepare graduates for academic and professional excellence.',
            'faculty'       => '10+ Dedicated Faculty Members specializing in diverse fields of biological sciences',
            'programs'      => ['BS Botany (4 Years)','BS Zoology (4 Years)','BS Microbiology (4 Years)','MS Biology (2 Years)'],
            'facilities'    => [
                ['icon'=>'🔬','name'=>'Microbiology Lab',     'desc'=>'Modern facility for microbial culture and analysis'],
                ['icon'=>'🌿','name'=>'Botany Garden',         'desc'=>'Extensive botanical garden with diverse plant specimens'],
                ['icon'=>'🧬','name'=>'Genetics & Molecular Lab','desc'=>'DNA extraction, PCR, and gene analysis equipment'],
                ['icon'=>'🦋','name'=>'Zoology Museum',        'desc'=>'Curated collection of specimens for taxonomic study'],
            ],
            'achievements'  => [
                ['year'=>'2024','title'=>'Research Excellence',      'desc'=>'Published research on medicinal plants of Hazara region'],
                ['year'=>'2024','title'=>'Environmental Award',      'desc'=>'Recognized for tree plantation and conservation drives'],
                ['year'=>'2023','title'=>'HEC Grant',                'desc'=>'Received research grant for biodiversity documentation'],
                ['year'=>'2023','title'=>'Science Exhibition',       'desc'=>'Won first prize at National Biology Science Fair'],
            ],
            'careers'       => ['Medical Professional','Research Biologist','Microbiologist','Environmental Consultant','Botanist','Wildlife Officer','Lab Technologist'],
            'contact_email' => 'biology@gpgcm.edu.pk',
            'contact_phone' => '+92-997-123460',
        ],
        'english' => [
            'title'         => 'English',
            'tagline'       => 'Empowering Through Language and Literature',
            'hero_image'    => 'https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?w=1200&h=400&fit=crop',
            'description'   => 'The Department of English offers programs in English language, linguistics, and literature. Students develop advanced communication skills, critical thinking, and literary analysis abilities. Our graduates excel in education, journalism, civil services, corporate communication, and international organizations.',
            'vision'        => 'To be a center of excellence for English language and literature education, producing graduates who can communicate effectively and contribute to national and global development.',
            'mission'       => 'To develop linguistic competence, foster appreciation of literature, promote critical thinking, and prepare students for diverse professional roles in a globalized world.',
            'faculty'       => '9+ Qualified Faculty Members with expertise in linguistics, literature, and language teaching',
            'programs'      => ['BS English (4 Years)','BS English Literature (4 Years)','MA English (2 Years)','MPhil English Linguistics (2 Years)'],
            'facilities'    => [
                ['icon'=>'🎙️','name'=>'Language Lab',          'desc'=>'Modern audio-visual lab for language skill development'],
                ['icon'=>'📚','name'=>'Literature Library',    'desc'=>'Extensive collection of classic and contemporary literature'],
                ['icon'=>'✍️','name'=>'Creative Writing Center','desc'=>'Dedicated space for writing workshops and seminars'],
                ['icon'=>'🌐','name'=>'Linguistics Research Lab','desc'=>'Facilities for phonetics, discourse, and corpus research'],
            ],
            'achievements'  => [
                ['year'=>'2024','title'=>'Debate Championship',      'desc'=>'Students won Inter-University English Debate Competition'],
                ['year'=>'2024','title'=>'Publication',              'desc'=>'Department journal ranked in HEC recognized list'],
                ['year'=>'2023','title'=>'Literary Festival',        'desc'=>'Hosted regional literary festival with 500+ participants'],
                ['year'=>'2023','title'=>'CSS Success',              'desc'=>'10+ graduates cleared CSS examination in English'],
            ],
            'careers'       => ['English Teacher','Content Writer','Journalist','Civil Servant (CSS)','Corporate Communicator','Translator','Editor','Diplomat'],
            'contact_email' => 'english@gpgcm.edu.pk',
            'contact_phone' => '+92-997-123461',
        ],
    ];

    $deptId = $department;
    $dept   = $departmentsData[$deptId] ?? null;
@endphp

@section('title', ($dept ? $dept['title'] : 'Department Not Found') . ' — Government Postgraduate College Mansehra')

@push('styles')
<style>
    /* ── DEPT HERO ── */
    .dept-hero {
        position: relative; height: 52vh; min-height: 380px;
        background-size: cover; background-position: center;
        display: flex; align-items: flex-end;
    }
    .dept-hero::before {
        content: ''; position: absolute; inset: 0;
        background: linear-gradient(to top, rgba(10,40,20,.92) 0%, rgba(10,40,20,.45) 55%, rgba(10,40,20,.2) 100%);
    }
    .dept-hero-content {
        position: relative; z-index: 2;
        max-width: 1200px; margin: 0 auto; padding: 0 24px 44px;
        animation: fadeUp .7s ease both;
    }
    @keyframes fadeUp { from { opacity:0; transform:translateY(24px); } to { opacity:1; transform:translateY(0); } }
    .dept-hero-tag { display: inline-block; background: var(--gold); color: var(--green-dark); font-size: 11px; font-weight: 700; padding: 4px 12px; border-radius: 4px; letter-spacing: .06em; text-transform: uppercase; margin-bottom: 12px; }
    .dept-hero h1 { font-family: 'Playfair Display', serif; font-size: clamp(32px,5vw,56px); color: #fff; margin-bottom: 8px; }
    .dept-hero p { font-size: 17px; color: rgba(255,255,255,.7); }

    /* ── BREADCRUMB ── */
    .breadcrumb { background: var(--white); border-bottom: 1px solid var(--border); padding: 14px 0; }
    .breadcrumb-inner { max-width: 1200px; margin: auto; padding: 0 24px; display: flex; align-items: center; gap: 8px; font-size: 13px; color: var(--text-muted); }
    .breadcrumb-inner a { color: var(--green); text-decoration: none; font-weight: 500; }
    .breadcrumb-inner a:hover { text-decoration: underline; }
    .breadcrumb-inner span { color: var(--border); }

    /* ── CONTENT CARD ── */
    .dept-container { max-width: 1200px; margin: 0 auto; padding: 0 24px 80px; }
    .content-card {
        background: var(--white); border-radius: 18px; padding: 40px;
        margin-bottom: 28px; border: 1px solid var(--border); box-shadow: var(--shadow-sm);
        transition: box-shadow .25s;
    }
    .content-card:hover { box-shadow: var(--shadow-md); }
    .card-title {
        font-family: 'Playfair Display', serif; font-size: 26px; color: var(--green-dark);
        margin-bottom: 18px; padding-bottom: 14px;
        border-bottom: 2px solid var(--green-pale); position: relative;
    }
    .card-title::after { content: ''; position: absolute; bottom: -2px; left: 0; width: 48px; height: 2px; background: var(--green); }
    .card-text { font-size: 15.5px; line-height: 1.85; color: var(--text-muted); }

    /* ── VISION MISSION ── */
    .vm-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 22px; margin-top: 8px; }
    .vm-card { background: var(--green-pale); border: 1px solid rgba(26,92,56,.15); border-radius: 14px; padding: 28px; transition: transform .25s; }
    .vm-card:hover { transform: translateY(-4px); }
    .vm-card h3 { font-size: 18px; color: var(--green-dark); margin-bottom: 12px; display: flex; align-items: center; gap: 8px; font-weight: 700; }
    .vm-card p { font-size: 14.5px; line-height: 1.7; color: var(--text-muted); }

    /* ── PROGRAMS ── */
    .programs-list { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px,1fr)); gap: 16px; margin-top: 8px; }
    .prog-item {
        background: var(--bg); border: 1px solid var(--border); border-radius: 12px;
        padding: 20px; text-align: center; transition: all .25s;
    }
    .prog-item:hover { background: var(--green); border-color: var(--green); transform: translateY(-4px); }
    .prog-item:hover h4, .prog-item:hover p { color: #fff; }
    .prog-item .ico { font-size: 28px; margin-bottom: 10px; }
    .prog-item h4 { font-size: 14.5px; font-weight: 700; color: var(--green-dark); margin-bottom: 4px; }
    .prog-item p { font-size: 12.5px; color: var(--text-muted); }

    /* ── FACILITIES ── */
    .facilities-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(230px,1fr)); gap: 20px; margin-top: 8px; }
    .facility-item {
        background: var(--bg); border: 1px solid var(--border); border-radius: 14px;
        padding: 24px; text-align: center; transition: all .25s;
    }
    .facility-item:hover { border-color: var(--green); box-shadow: var(--shadow-md); transform: translateY(-4px); }
    .facility-ico { font-size: 44px; margin-bottom: 14px; }
    .facility-item h4 { font-size: 16px; font-weight: 700; color: var(--green-dark); margin-bottom: 8px; }
    .facility-item p { font-size: 13.5px; color: var(--text-muted); line-height: 1.65; }

    /* ── TIMELINE ── */
    .timeline { position: relative; padding: 16px 0; margin-top: 8px; }
    .timeline::before { content: ''; position: absolute; left: 50%; transform: translateX(-50%); top: 0; bottom: 0; width: 2px; background: var(--green-pale); }
    .tl-item { display: grid; grid-template-columns: 1fr auto 1fr; gap: 20px; margin-bottom: 28px; align-items: center; }
    .tl-left { text-align: right; }
    .tl-right { text-align: left; }
    .tl-dot { width: 14px; height: 14px; border-radius: 50%; background: var(--green); border: 3px solid var(--white); box-shadow: 0 0 0 2px var(--green); flex-shrink: 0; }
    .tl-year { font-family: 'Playfair Display', serif; font-size: 26px; color: var(--green); font-weight: 800; line-height: 1; }
    .tl-card { background: var(--bg); border: 1px solid var(--border); border-radius: 12px; padding: 14px 18px; }
    .tl-card:hover { border-color: var(--green); background: var(--green-pale); }
    .tl-card h4 { font-size: 14px; font-weight: 700; color: var(--green-dark); margin-bottom: 4px; }
    .tl-card p { font-size: 13px; color: var(--text-muted); line-height: 1.55; }

    /* ── CAREERS ── */
    .careers-wrap { display: flex; flex-wrap: wrap; gap: 10px; margin-top: 8px; }
    .career-tag {
        background: var(--green-pale); border: 1px solid rgba(26,92,56,.2);
        color: var(--green-dark); padding: 8px 16px; border-radius: 100px;
        font-size: 14px; font-weight: 500; transition: all .25s; cursor: default;
    }
    .career-tag:hover { background: var(--green); color: #fff; border-color: var(--green); transform: translateY(-2px); }

    /* ── CONTACT BOX ── */
    .contact-box {
        background: var(--green-dark); border-radius: 18px; padding: 40px;
        text-align: center; margin-top: 8px;
        background-image: radial-gradient(circle at 80% 20%, rgba(200,147,10,.12) 0%, transparent 60%);
    }
    .contact-box h3 { font-family: 'Playfair Display', serif; font-size: 24px; color: #fff; margin-bottom: 20px; }
    .contact-info { display: flex; justify-content: center; gap: 32px; flex-wrap: wrap; margin-bottom: 24px; }
    .contact-info div { display: flex; align-items: center; gap: 8px; color: rgba(255,255,255,.75); font-size: 14px; }
    .contact-info span:first-child { font-size: 18px; }
    .contact-btn {
        display: inline-block; background: var(--gold); color: var(--green-dark);
        padding: 12px 32px; border-radius: 8px; text-decoration: none; font-weight: 700;
        font-size: 15px; transition: all .25s;
    }
    .contact-btn:hover { background: var(--gold-light); transform: translateY(-2px); }

    @media (max-width: 768px) {
        .vm-grid { grid-template-columns: 1fr; }
        .timeline::before { left: 16px; }
        .tl-item { grid-template-columns: auto 1fr; }
        .tl-left { display: none; }
        .content-card { padding: 24px; }
        .dept-hero h1 { font-size: 30px; }
    }
</style>
@endpush

@section('content')
@if($dept)

<!-- ── HERO ── -->
<div class="dept-hero" style="background-image:url('{{ $dept['hero_image'] }}');">
    <div class="dept-hero-content">
        <div class="dept-hero-tag">Department</div>
        <h1>{{ $dept['title'] }}</h1>
        <p>{{ $dept['tagline'] }}</p>
    </div>
</div>

<!-- ── BREADCRUMB ── -->
<div class="breadcrumb">
    <div class="breadcrumb-inner">
        <a href="{{ url('/') }}">Home</a>
        <span>›</span>
        <a href="{{ url('/') }}#departments">Departments</a>
        <span>›</span>
        <span style="color:var(--green);font-weight:600;">{{ $dept['title'] }}</span>
    </div>
</div>

<!-- ── MAIN CONTENT ── -->
<div class="dept-container">

    <!-- About -->
    <div class="content-card" data-aos="fade-up" style="margin-top:36px;">
        <h2 class="card-title">About the Department</h2>
        <p class="card-text">{{ $dept['description'] }}</p>
        <div style="margin-top:20px;padding:16px 20px;background:var(--green-pale);border-radius:10px;border-left:3px solid var(--green);">
            <strong style="color:var(--green-dark);">👥 Faculty Strength:</strong>
            <span style="color:var(--text-muted);font-size:14.5px;margin-left:8px;">{{ $dept['faculty'] }}</span>
        </div>
    </div>

    <!-- Vision & Mission -->
    <div class="content-card" data-aos="fade-up">
        <h2 class="card-title">Vision & Mission</h2>
        <div class="vm-grid">
            <div class="vm-card">
                <h3>🎯 Our Vision</h3>
                <p>{{ $dept['vision'] }}</p>
            </div>
            <div class="vm-card">
                <h3>⭐ Our Mission</h3>
                <p>{{ $dept['mission'] }}</p>
            </div>
        </div>
    </div>

    <!-- Programs -->
    <div class="content-card" data-aos="fade-up">
        <h2 class="card-title">📚 Programs Offered</h2>
        <div class="programs-list">
            @foreach($dept['programs'] as $program)
            <div class="prog-item">
                <div class="ico">🎓</div>
                <h4>{{ $program }}</h4>
                <p>Full-time | Regular</p>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Facilities -->
    <div class="content-card" data-aos="fade-up">
        <h2 class="card-title">🏛️ State-of-the-Art Facilities</h2>
        <div class="facilities-grid">
            @foreach($dept['facilities'] as $facility)
            <div class="facility-item">
                <div class="facility-ico">{{ $facility['icon'] }}</div>
                <h4>{{ $facility['name'] }}</h4>
                <p>{{ $facility['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Achievements Timeline -->
    <div class="content-card" data-aos="fade-up">
        <h2 class="card-title">🏆 Achievements & Milestones</h2>
        <div class="timeline">
            @foreach($dept['achievements'] as $index => $achievement)
            <div class="tl-item">
                @if($index % 2 == 0)
                    <div class="tl-left"><div class="tl-year">{{ $achievement['year'] }}</div></div>
                    <div class="tl-dot"></div>
                    <div class="tl-right"><div class="tl-card"><h4>{{ $achievement['title'] }}</h4><p>{{ $achievement['desc'] }}</p></div></div>
                @else
                    <div class="tl-left"><div class="tl-card" style="text-align:right;"><h4>{{ $achievement['title'] }}</h4><p>{{ $achievement['desc'] }}</p></div></div>
                    <div class="tl-dot"></div>
                    <div class="tl-right"><div class="tl-year">{{ $achievement['year'] }}</div></div>
                @endif
            </div>
            @endforeach
        </div>
    </div>

    <!-- Careers -->
    <div class="content-card" data-aos="fade-up">
        <h2 class="card-title">💼 Career Opportunities</h2>
        <p class="card-text" style="margin-bottom:16px;">Graduates from this department have excellent career prospects in:</p>
        <div class="careers-wrap">
            @foreach($dept['careers'] as $career)
            <span class="career-tag">{{ $career }}</span>
            @endforeach
        </div>
    </div>

    <!-- Contact -->
    <div class="contact-box" data-aos="fade-up">
        <h3>📞 Contact {{ $dept['title'] }} Department</h3>
        <div class="contact-info">
            <div><span>📧</span><span>{{ $dept['contact_email'] }}</span></div>
            <div><span>📞</span><span>{{ $dept['contact_phone'] }}</span></div>
        </div>
        <a href="#" class="contact-btn">Send an Inquiry →</a>
    </div>

</div>

@else
<div style="text-align:center;padding:120px 24px;">
    <div style="font-size:64px;margin-bottom:20px;">🔍</div>
    <h2 style="font-family:'Playfair Display',serif;font-size:32px;color:var(--green-dark);margin-bottom:12px;">Department Not Found</h2>
    <p style="color:var(--text-muted);font-size:16px;margin-bottom:28px;">The department you're looking for doesn't exist or hasn't been added yet.</p>
    <a href="{{ url('/') }}#departments" class="btn-primary">← Back to Departments</a>
</div>
@endif
@endsection
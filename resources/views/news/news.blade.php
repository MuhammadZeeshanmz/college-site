@extends('layouts.app')

@section('title', 'News & Events — Government Postgraduate College Mansehra')

@push('styles')
<style>
    .news-hero {
        background: linear-gradient(135deg, var(--green-dark) 0%, var(--green-mid) 100%);
        padding: 72px 0 56px; position: relative; overflow: hidden;
    }
    .news-hero::before { content:''; position:absolute; inset:0; background-image:radial-gradient(circle,rgba(255,255,255,.04) 1px,transparent 1px); background-size:28px 28px; }
    .news-hero-content { position:relative; z-index:2; max-width:1200px; margin:auto; padding:0 24px; }
    .news-hero-tag { display:inline-block; background:var(--gold); color:var(--green-dark); font-size:11px; font-weight:700; padding:4px 12px; border-radius:4px; letter-spacing:.06em; text-transform:uppercase; margin-bottom:12px; }
    .news-hero h1 { font-family:'Playfair Display',serif; font-size:clamp(30px,4.5vw,52px); color:#fff; margin-bottom:8px; }
    .news-hero p { font-size:16px; color:rgba(255,255,255,.65); }

    .news-container { max-width:1200px; margin:0 auto; padding:48px 24px 80px; }

    /* Filter Tabs */
    .filter-bar { display:flex; gap:10px; flex-wrap:wrap; margin-bottom:40px; }
    .filter-btn { padding:8px 20px; border-radius:100px; border:2px solid var(--border); background:var(--white); color:var(--text-muted); font-size:13.5px; font-weight:600; cursor:pointer; transition:all .2s; }
    .filter-btn.active, .filter-btn:hover { background:var(--green); border-color:var(--green); color:#fff; }

    /* Featured News */
    .featured-news {
        display:grid; grid-template-columns:1.4fr 1fr; gap:24px; margin-bottom:48px;
    }
    .news-feat-card {
        background:var(--green-dark); border-radius:20px; overflow:hidden; position:relative;
        min-height:340px; display:flex; flex-direction:column; justify-content:flex-end;
        text-decoration:none; transition:all .3s;
        background-image: radial-gradient(circle at 30% 40%, rgba(46,139,87,.3) 0%, transparent 60%);
    }
    .news-feat-card::before { content:''; position:absolute; inset:0; background:linear-gradient(to top, rgba(10,40,20,.95) 0%, rgba(10,40,20,.3) 70%, transparent 100%); }
    .news-feat-card:hover { transform:translateY(-4px); box-shadow:0 16px 40px rgba(26,92,56,.25); }
    .news-feat-thumb { position:absolute; inset:0; display:flex; align-items:center; justify-content:center; font-size:80px; opacity:.08; }
    .news-feat-content { position:relative; padding:28px; }
    .news-badge { display:inline-block; padding:3px 11px; border-radius:100px; font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:.05em; margin-bottom:10px; }
    .badge-featured { background:var(--gold); color:#fff; }
    .badge-announcement { background:#3498db; color:#fff; }
    .badge-achievement { background:#27ae60; color:#fff; }
    .badge-event { background:#9b59b6; color:#fff; }
    .badge-research { background:#e67e22; color:#fff; }
    .news-feat-card h3 { font-family:'Playfair Display',serif; font-size:20px; color:#fff; line-height:1.45; margin-bottom:10px; }
    .news-feat-card p { font-size:13.5px; color:rgba(255,255,255,.6); line-height:1.65; margin-bottom:12px; }
    .news-feat-date { font-size:12px; color:rgba(255,255,255,.4); }

    .news-feat-side { display:flex; flex-direction:column; gap:16px; }
    .news-side-item {
        background:var(--white); border:1px solid var(--border); border-radius:14px; padding:18px;
        text-decoration:none; color:inherit; transition:all .25s; display:flex; gap:14px;
    }
    .news-side-item:hover { border-color:var(--green); background:var(--green-pale); transform:translateX(4px); }
    .news-side-icon { width:44px; height:44px; border-radius:10px; background:var(--green-pale); display:flex; align-items:center; justify-content:center; font-size:18px; flex-shrink:0; border:1px solid var(--border); }
    .news-side-item h4 { font-size:13.5px; font-weight:600; color:var(--text); line-height:1.4; margin-bottom:5px; }
    .news-side-item span { font-size:11.5px; color:var(--text-muted); }

    /* All News Grid */
    .section-divider { font-family:'Playfair Display',serif; font-size:22px; color:var(--green-dark); margin-bottom:24px; padding-bottom:12px; border-bottom:2px solid var(--green-pale); position:relative; }
    .section-divider::after { content:''; position:absolute; bottom:-2px; left:0; width:40px; height:2px; background:var(--green); }

    .all-news-grid { display:grid; grid-template-columns:repeat(auto-fill,minmax(300px,1fr)); gap:22px; }
    .news-card {
        background:var(--white); border:1px solid var(--border); border-radius:16px; overflow:hidden;
        text-decoration:none; color:inherit; transition:all .3s; display:block;
    }
    .news-card:hover { transform:translateY(-6px); box-shadow:var(--shadow-lg); border-color:var(--green); }
    .news-card-img { height:160px; background:var(--green-dark); display:flex; align-items:center; justify-content:center; font-size:56px; position:relative; overflow:hidden; }
    .news-card-img::after { content:''; position:absolute; inset:0; background:linear-gradient(135deg, rgba(26,92,56,.4) 0%, transparent 60%); }
    .news-card-body { padding:20px; }
    .news-card-body h3 { font-size:15px; font-weight:700; color:var(--green-dark); line-height:1.45; margin-bottom:8px; margin-top:10px; }
    .news-card-body p { font-size:13px; color:var(--text-muted); line-height:1.65; margin-bottom:12px; }
    .news-card-meta { display:flex; justify-content:space-between; align-items:center; font-size:12px; color:var(--text-muted); }
    .news-card-link { color:var(--green); font-weight:600; font-size:13px; }

    /* Pagination */
    .pagination { display:flex; justify-content:center; gap:8px; margin-top:48px; }
    .page-btn { width:40px; height:40px; border-radius:10px; border:1.5px solid var(--border); background:var(--white); display:flex; align-items:center; justify-content:center; font-size:14px; font-weight:600; color:var(--text-muted); cursor:pointer; transition:all .2s; text-decoration:none; }
    .page-btn:hover, .page-btn.active { background:var(--green); border-color:var(--green); color:#fff; }

    @media(max-width:768px){
        .featured-news { grid-template-columns:1fr; }
        .news-feat-card { min-height:260px; }
    }
</style>
@endpush

@section('content')

<div class="news-hero">
    <div class="news-hero-content" data-aos="fade-up">
        <div class="news-hero-tag">Stay Informed</div>
        <h1>News & Events</h1>
        <p>Latest announcements, achievements, and events from Government Postgraduate College Mansehra</p>
    </div>
</div>

<div class="news-container">

    <!-- Filter -->
    <div class="filter-bar" data-aos="fade-up">
        <button class="filter-btn active">All News</button>
        <button class="filter-btn">Announcements</button>
        <button class="filter-btn">Achievements</button>
        <button class="filter-btn">Events</button>
        <button class="filter-btn">Research</button>
        <button class="filter-btn">Admissions</button>
    </div>

    <!-- Featured -->
    <div class="featured-news" data-aos="fade-up">
        <a href="#" class="news-feat-card">
            <div class="news-feat-thumb">🎓</div>
            <div class="news-feat-content">
                <span class="news-badge badge-featured">Featured</span>
                <h3>5th Annual Convocation Ceremony — Over 2,000 Graduates Honoured</h3>
                <p>The ceremony was graced by the Governor of Khyber Pakhtunkhwa as chief guest. Medals and degrees were distributed among outstanding graduates across all departments.</p>
                <div class="news-feat-date">📅 January 28, 2026</div>
            </div>
        </a>
        <div class="news-feat-side">
            <a href="#" class="news-side-item">
                <div class="news-side-icon">📢</div>
                <div>
                    <h4>On-Campus Physical Classes Resume from April 6, 2026</h4>
                    <span>01 Apr 2026 &nbsp;·&nbsp; <span class="news-badge badge-announcement" style="font-size:10px;padding:2px 8px;">Announcement</span></span>
                </div>
            </a>
            <a href="#" class="news-side-item">
                <div class="news-side-icon">🏆</div>
                <div>
                    <h4>College Achieves Record QEC Score of 86.69 in 2024–25 Evaluation</h4>
                    <span>10 Mar 2026 &nbsp;·&nbsp; <span class="news-badge badge-achievement" style="font-size:10px;padding:2px 8px;">Achievement</span></span>
                </div>
            </a>
            <a href="#" class="news-side-item">
                <div class="news-side-icon">🤝</div>
                <div>
                    <h4>MoU Signed with University of Punjab for Research Collaboration</h4>
                    <span>11 Mar 2026 &nbsp;·&nbsp; <span class="news-badge badge-research" style="font-size:10px;padding:2px 8px;">Research</span></span>
                </div>
            </a>
        </div>
    </div>

    <!-- All News -->
    <h2 class="section-divider" data-aos="fade-up">📰 All News & Announcements</h2>

    <div class="all-news-grid">
        @php
        $allNews = [
            ['icon'=>'💻','badge'=>'achievement','label'=>'Achievement','title'=>'Physics Department Participates in Pakistan\'s 1st Quantum Hackathon','excerpt'=>'A team of 4 students from the Physics Department represented GPGCM at the National Quantum Computing Hackathon held in Islamabad.','date'=>'15 Feb 2026','author'=>'Admin'],
            ['icon'=>'🎓','badge'=>'announcement','label'=>'Announcement','title'=>'PM Laptop Distribution Ceremony Successfully Held at Campus','excerpt'=>'500+ deserving students received laptops under the Prime Minister\'s Laptop Scheme. The ceremony was attended by senior government officials.','date'=>'05 Feb 2026','author'=>'Admin'],
            ['icon'=>'📋','badge'=>'admissions','label'=>'Admissions','title'=>'Admissions Open for Spring 2026 Semester — Apply Now','excerpt'=>'Applications are now being accepted for Spring 2026 intake. Eligible candidates are encouraged to apply before the deadline.','date'=>'01 Feb 2026','author'=>'Admissions Office'],
            ['icon'=>'🔬','badge'=>'research','label'=>'Research','title'=>'Chemistry Department Receives HEC Research Grant of Rs. 5 Million','excerpt'=>'The Chemistry Department has secured a prestigious HEC research grant for a two-year project on biodegradable polymers.','date'=>'25 Jan 2026','author'=>'Research Office'],
            ['icon'=>'🏅','badge'=>'achievement','label'=>'Achievement','title'=>'GPGCM Students Win Gold at National Mathematics Olympiad 2025','excerpt'=>'Two students from the Department of Mathematics won gold medals at the National Mathematics Olympiad held in Lahore.','date'=>'18 Jan 2026','author'=>'Admin'],
            ['icon'=>'🌳','badge'=>'event','label'=>'Event','title'=>'Annual Tree Plantation Drive — 5,000 Trees Planted Across Campus','excerpt'=>'In collaboration with the KP Forest Department, GPGCM faculty and students planted over 5,000 trees on campus and surrounding areas.','date'=>'10 Jan 2026','author'=>'Environment Club'],
            ['icon'=>'📚','badge'=>'announcement','label'=>'Announcement','title'=>'New BS Artificial Intelligence Program Launched for 2025-26','excerpt'=>'The CS Department has officially launched the BS Artificial Intelligence program, approved by HEC. Admissions are open for the first cohort.','date'=>'02 Jan 2026','author'=>'CS Department'],
            ['icon'=>'🤝','badge'=>'achievement','label'=>'Achievement','title'=>'GPGCM Signs MoU with Microsoft Pakistan for AI Certifications','excerpt'=>'A Memorandum of Understanding has been signed between GPGCM and Microsoft Pakistan to provide Azure AI certifications to CS students.','date'=>'20 Dec 2025','author'=>'Admin'],
            ['icon'=>'🎭','badge'=>'event','label'=>'Event','title'=>'Annual Literary & Cultural Festival 2025 — A Grand Success','excerpt'=>'The three-day Annual Literary Festival featured over 500 participants from 20+ institutions across KP. The English Department organized the event.','date'=>'15 Dec 2025','author'=>'English Department'],
            ['icon'=>'💰','badge'=>'announcement','label'=>'Announcement','title'=>'Need-Based Scholarship Applications Open for 2026','excerpt'=>'Deserving students can now apply for need-based scholarships. Merit-cum-need criteria will be used for selection. Apply by January 31, 2026.','date'=>'10 Dec 2025','author'=>'Student Affairs'],
            ['icon'=>'🔭','badge'=>'research','label'=>'Research','title'=>'Physics Research Paper Published in Nature Physics Journal','excerpt'=>'A research paper co-authored by GPGCM Physics faculty and PhD students has been published in the internationally renowned Nature Physics journal.','date'=>'05 Dec 2025','author'=>'Physics Department'],
            ['icon'=>'🏆','badge'=>'achievement','label'=>'Achievement','title'=>'College Ranked Among Top 5 CS Departments in Pakistan by HEC','excerpt'=>'HEC\'s annual ranking places GPGCM Computer Science Department among the top 5 in Pakistan, recognizing research output and teaching quality.','date'=>'28 Nov 2025','author'=>'Admin'],
        ];
        @endphp

        @foreach($allNews as $i => $news)
        <a href="#" class="news-card" data-aos="fade-up" data-aos-delay="{{ ($i % 3) * 60 }}">
            <div class="news-card-img">{{ $news['icon'] }}</div>
            <div class="news-card-body">
                <span class="news-badge badge-{{ $news['badge'] }}">{{ $news['label'] }}</span>
                <h3>{{ $news['title'] }}</h3>
                <p>{{ $news['excerpt'] }}</p>
                <div class="news-card-meta">
                    <span>📅 {{ $news['date'] }}</span>
                    <span class="news-card-link">Read More →</span>
                </div>
            </div>
        </a>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="pagination" data-aos="fade-up">
        <a href="#" class="page-btn">‹</a>
        <a href="#" class="page-btn active">1</a>
        <a href="#" class="page-btn">2</a>
        <a href="#" class="page-btn">3</a>
        <a href="#" class="page-btn">4</a>
        <a href="#" class="page-btn">›</a>
    </div>

</div>

@push('scripts')
<script>
document.querySelectorAll('.filter-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
        this.classList.add('active');
    });
});
</script>
@endpush

@endsection
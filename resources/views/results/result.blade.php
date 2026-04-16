@extends('layouts.app')

@section('title', 'Results — Government Postgraduate College Mansehra')

@push('styles')
<style>
    .results-hero {
        background: linear-gradient(135deg, var(--green-dark) 0%, var(--green-mid) 100%);
        padding: 72px 0 56px; position: relative; overflow: hidden;
    }
    .results-hero::before { content:''; position:absolute; inset:0; background-image:radial-gradient(circle,rgba(255,255,255,.04) 1px,transparent 1px); background-size:28px 28px; }
    .results-hero::after { content:''; position:absolute; bottom:-80px; left:-80px; width:300px; height:300px; border-radius:50%; background:radial-gradient(circle,rgba(46,139,87,.2) 0%,transparent 70%); }
    .results-hero-content { position:relative; z-index:2; max-width:1200px; margin:auto; padding:0 24px; display:grid; grid-template-columns:1fr 400px; gap:48px; align-items:center; }
    .results-hero-tag { display:inline-block; background:var(--gold); color:var(--green-dark); font-size:11px; font-weight:700; padding:4px 12px; border-radius:4px; letter-spacing:.06em; text-transform:uppercase; margin-bottom:12px; }
    .results-hero h1 { font-family:'Playfair Display',serif; font-size:clamp(28px,4vw,48px); color:#fff; margin-bottom:10px; }
    .results-hero p { font-size:15px; color:rgba(255,255,255,.65); line-height:1.7; }

    /* Search Card */
    .search-card {
        background:rgba(255,255,255,.1); backdrop-filter:blur(16px);
        border:1px solid rgba(255,255,255,.15); border-radius:20px; padding:32px;
    }
    .search-card h3 { font-family:'Playfair Display',serif; color:#fff; font-size:20px; margin-bottom:6px; }
    .search-card .sub { font-size:13px; color:rgba(255,255,255,.45); margin-bottom:20px; }
    .form-field { margin-bottom:14px; }
    .form-field label { display:block; font-size:11px; color:rgba(255,255,255,.45); letter-spacing:.07em; text-transform:uppercase; margin-bottom:5px; }
    .form-field input, .form-field select {
        width:100%; background:rgba(255,255,255,.09); border:1px solid rgba(255,255,255,.18);
        color:#fff; padding:11px 14px; border-radius:8px; font-size:14px;
        font-family:'DM Sans',sans-serif; outline:none; transition:all .25s;
    }
    .form-field input::placeholder { color:rgba(255,255,255,.3); }
    .form-field input:focus, .form-field select:focus { border-color:var(--gold-light); background:rgba(255,255,255,.13); }
    .form-field select option { background:#0f3d24; }
    .btn-search { width:100%; background:var(--gold); color:var(--green-dark); border:none; cursor:pointer; padding:13px; border-radius:8px; font-size:15px; font-weight:700; font-family:'DM Sans',sans-serif; margin-top:4px; transition:all .25s; }
    .btn-search:hover { background:var(--gold-light); transform:translateY(-1px); }

    .results-container { max-width:1200px; margin:0 auto; padding:48px 24px 80px; }

    /* Result Cards */
    .results-list-grid { display:grid; grid-template-columns:repeat(auto-fill,minmax(300px,1fr)); gap:20px; margin-bottom:48px; }
    .result-item {
        background:var(--white); border:1px solid var(--border); border-radius:14px; padding:20px;
        display:flex; gap:16px; align-items:flex-start; transition:all .25s;
        text-decoration:none; color:inherit;
    }
    .result-item:hover { border-color:var(--green); background:var(--green-pale); transform:translateY(-2px); box-shadow:var(--shadow-md); }
    .result-icon { width:48px; height:48px; border-radius:12px; background:var(--green-pale); display:flex; align-items:center; justify-content:center; font-size:22px; flex-shrink:0; border:1px solid var(--border); }
    .result-info h4 { font-size:14px; font-weight:700; color:var(--green-dark); margin-bottom:4px; line-height:1.4; }
    .result-info p { font-size:12.5px; color:var(--text-muted); margin-bottom:8px; }
    .result-tags { display:flex; gap:6px; flex-wrap:wrap; }
    .r-tag { font-size:11px; font-weight:600; padding:2px 8px; border-radius:4px; }
    .r-new { background:#fef9ec; color:var(--gold); border:1px solid rgba(200,147,10,.25); }
    .r-bs { background:var(--green-pale); color:var(--green); border:1px solid rgba(26,92,56,.2); }
    .r-date { background:var(--bg); color:var(--text-muted); border:1px solid var(--border); }
    .result-download { margin-left:auto; flex-shrink:0; }
    .dl-btn { display:flex; align-items:center; justify-content:center; width:36px; height:36px; border-radius:8px; background:var(--green); color:#fff; font-size:14px; transition:background .2s; text-decoration:none; }
    .dl-btn:hover { background:var(--green-dark); }

    /* Table */
    .result-table-wrap { background:var(--white); border-radius:16px; border:1px solid var(--border); overflow:hidden; margin-bottom:32px; }
    .table-header { background:var(--green-dark); padding:16px 24px; display:flex; align-items:center; justify-content:space-between; }
    .table-header h3 { color:#fff; font-size:17px; font-weight:700; }
    .table-header span { color:rgba(255,255,255,.55); font-size:13px; }
    table { width:100%; border-collapse:collapse; }
    thead tr { background:var(--green-pale); }
    thead th { padding:12px 16px; text-align:left; font-size:12.5px; font-weight:700; color:var(--green-dark); text-transform:uppercase; letter-spacing:.05em; border-bottom:1px solid var(--border); }
    tbody tr { border-bottom:1px solid var(--border); transition:background .2s; }
    tbody tr:hover { background:var(--green-pale); }
    tbody tr:last-child { border-bottom:none; }
    td { padding:14px 16px; font-size:13.5px; color:var(--text-muted); }
    td:first-child { color:var(--text); font-weight:600; }
    .status-pub { color:var(--green); font-weight:600; font-size:12.5px; }
    .status-pend { color:var(--gold); font-weight:600; font-size:12.5px; }
    .view-link { color:var(--green); font-weight:600; font-size:13px; text-decoration:none; }
    .view-link:hover { text-decoration:underline; }

    /* Info Box */
    .info-boxes { display:grid; grid-template-columns:1fr 1fr 1fr; gap:20px; margin-top:8px; }
    .info-box { background:var(--white); border:1px solid var(--border); border-radius:14px; padding:22px; }
    .info-box h4 { font-size:15px; font-weight:700; color:var(--green-dark); margin-bottom:12px; display:flex; align-items:center; gap:8px; }
    .info-box ul { list-style:none; display:grid; gap:8px; }
    .info-box ul li { font-size:13.5px; color:var(--text-muted); display:flex; align-items:flex-start; gap:8px; }
    .info-box ul li::before { content:'•'; color:var(--green); font-weight:700; flex-shrink:0; }

    @media(max-width:900px){
        .results-hero-content { grid-template-columns:1fr; }
        .search-card { display:none; }
        .info-boxes { grid-template-columns:1fr; }
    }
    @media(max-width:640px){ .results-list-grid{grid-template-columns:1fr;} }
</style>
@endpush

@section('content')

<div class="results-hero">
    <div class="results-hero-content">
        <div data-aos="fade-right">
            <div class="results-hero-tag">Academic Records</div>
            <h1>Examination Results</h1>
            <p>Access semester results, annual results, and result notifications for all programs offered at GPGCM.</p>
            <div style="display:flex;gap:14px;flex-wrap:wrap;margin-top:24px;">
                <a href="#latest-results" class="btn-gold">View Latest Results ↓</a>
                <a href="#" class="btn-outline-w">Result Rechecking</a>
            </div>
        </div>
        <div class="search-card" data-aos="fade-left">
            <h3>🔍 Check Your Result</h3>
            <p class="sub">Enter your details to find your result</p>
            <div class="form-field">
                <label>Roll Number</label>
                <input type="text" placeholder="e.g. 2024-CS-0123">
            </div>
            <div class="form-field">
                <label>Program</label>
                <select>
                    <option>Select Program</option>
                    <option>BS Computer Science</option>
                    <option>BS AI</option>
                    <option>BS Mathematics</option>
                    <option>BS Physics</option>
                    <option>BS Chemistry</option>
                    <option>BS Biology / Botany / Zoology</option>
                    <option>BS English</option>
                    <option>BS Economics</option>
                    <option>BS Political Science</option>
                </select>
            </div>
            <div class="form-field">
                <label>Semester</label>
                <select>
                    <option>Select Semester</option>
                    <option>Fall 2025 (Latest)</option>
                    <option>Spring 2025</option>
                    <option>Fall 2024</option>
                    <option>Spring 2024</option>
                </select>
            </div>
            <button class="btn-search">Search Result →</button>
        </div>
    </div>
</div>

<div class="results-container">

    <!-- Latest Results -->
    <div style="margin-bottom:28px;" data-aos="fade-up" id="latest-results">
        <div class="section-tag">Newly Published</div>
        <h2 style="font-family:'Playfair Display',serif;font-size:28px;color:var(--text);margin-top:8px;">Latest Results</h2>
    </div>

    <div class="results-list-grid" data-aos="fade-up">
        @php
        $latestResults = [
            ['icon'=>'💻','title'=>'BS Computer Science — Fall 2025 Result','dept'=>'CS Department','date'=>'15 Apr 2026','badge'=>'New','type'=>'BS'],
            ['icon'=>'🤖','title'=>'BS Artificial Intelligence — Fall 2025 Result','dept'=>'CS Department','date'=>'15 Apr 2026','badge'=>'New','type'=>'BS'],
            ['icon'=>'📐','title'=>'BS Mathematics — Fall 2025 Semester Result','dept'=>'Math Department','date'=>'12 Apr 2026','badge'=>'New','type'=>'BS'],
            ['icon'=>'⚛️','title'=>'BS Physics — Fall 2025 Semester Result','dept'=>'Physics Department','date'=>'12 Apr 2026','badge'=>'New','type'=>'BS'],
            ['icon'=>'🧪','title'=>'BS Chemistry — Fall 2025 Semester Result','dept'=>'Chemistry Department','date'=>'10 Apr 2026','badge'=>'New','type'=>'BS'],
            ['icon'=>'📖','title'=>'BS English — Fall 2025 Semester Result','dept'=>'English Department','date'=>'10 Apr 2026','badge'=>'New','type'=>'BS'],
            ['icon'=>'🌿','title'=>'BS Botany — Fall 2025 Semester Result','dept'=>'Biology Department','date'=>'08 Apr 2026','badge'=>'','type'=>'BS'],
            ['icon'=>'🦋','title'=>'BS Zoology — Fall 2025 Semester Result','dept'=>'Biology Department','date'=>'08 Apr 2026','badge'=>'','type'=>'BS'],
            ['icon'=>'🔬','title'=>'BS Microbiology — Fall 2025 Semester Result','dept'=>'Biology Department','date'=>'08 Apr 2026','badge'=>'','type'=>'BS'],
        ];
        @endphp
        @foreach($latestResults as $r)
        <a href="#" class="result-item">
            <div class="result-icon">{{ $r['icon'] }}</div>
            <div class="result-info" style="flex:1;">
                <h4>{{ $r['title'] }}</h4>
                <p>{{ $r['dept'] }}</p>
                <div class="result-tags">
                    @if($r['badge'])<span class="r-tag r-new">🆕 {{ $r['badge'] }}</span>@endif
                    <span class="r-tag r-bs">{{ $r['type'] }}</span>
                    <span class="r-tag r-date">📅 {{ $r['date'] }}</span>
                </div>
            </div>
            <div class="result-download">
                <span class="dl-btn" title="Download PDF">⬇</span>
            </div>
        </a>
        @endforeach
    </div>

    <!-- All Results Table -->
    <div data-aos="fade-up">
        <h2 style="font-family:'Playfair Display',serif;font-size:24px;color:var(--green-dark);margin-bottom:20px;">📋 All Result Notifications</h2>
        <div class="result-table-wrap">
            <div class="table-header">
                <h3>Semester-wise Result Archive</h3>
                <span>Showing results for all BS programs</span>
            </div>
            <div style="overflow-x:auto;">
                <table>
                    <thead>
                        <tr>
                            <th>Program</th>
                            <th>Semester</th>
                            <th>Session</th>
                            <th>Published</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $archive = [
                            ['prog'=>'BS CS / BS AI / BS SE / BS IT','sem'=>'Fall 2025','session'=>'2025-26','pub'=>'Apr 15, 2026','status'=>'Published'],
                            ['prog'=>'BS Mathematics / BS Statistics','sem'=>'Fall 2025','session'=>'2025-26','pub'=>'Apr 12, 2026','status'=>'Published'],
                            ['prog'=>'BS Physics / BS Electronics','sem'=>'Fall 2025','session'=>'2025-26','pub'=>'Apr 12, 2026','status'=>'Published'],
                            ['prog'=>'BS Chemistry / BS Industrial Chem','sem'=>'Fall 2025','session'=>'2025-26','pub'=>'Apr 10, 2026','status'=>'Published'],
                            ['prog'=>'BS Botany / Zoology / Microbiology','sem'=>'Fall 2025','session'=>'2025-26','pub'=>'Apr 08, 2026','status'=>'Published'],
                            ['prog'=>'BS English / BS English Lit','sem'=>'Fall 2025','session'=>'2025-26','pub'=>'Apr 10, 2026','status'=>'Published'],
                            ['prog'=>'BS Economics / BS Political Science','sem'=>'Fall 2025','session'=>'2025-26','pub'=>'Apr 10, 2026','status'=>'Published'],
                            ['prog'=>'All BS Programs','sem'=>'Spring 2025','session'=>'2024-25','pub'=>'Nov 20, 2025','status'=>'Published'],
                            ['prog'=>'All BS Programs','sem'=>'Fall 2024','session'=>'2024-25','pub'=>'Apr 22, 2025','status'=>'Published'],
                            ['prog'=>'All BS Programs','sem'=>'Spring 2024','session'=>'2023-24','pub'=>'Nov 15, 2024','status'=>'Published'],
                            ['prog'=>'All BS Programs','sem'=>'Fall 2023','session'=>'2023-24','pub'=>'Apr 18, 2024','status'=>'Published'],
                            ['prog'=>'All BS Programs','sem'=>'Spring 2026 (Mid-Term)','session'=>'2025-26','pub'=>'Expected: May 2026','status'=>'Pending'],
                        ];
                        @endphp
                        @foreach($archive as $row)
                        <tr>
                            <td>{{ $row['prog'] }}</td>
                            <td>{{ $row['sem'] }}</td>
                            <td>{{ $row['session'] }}</td>
                            <td>{{ $row['pub'] }}</td>
                            <td>
                                @if($row['status'] === 'Published')
                                    <span class="status-pub">✓ Published</span>
                                @else
                                    <span class="status-pend">⏳ Pending</span>
                                @endif
                            </td>
                            <td>
                                @if($row['status'] === 'Published')
                                    <a href="#" class="view-link">View / Download →</a>
                                @else
                                    <span style="font-size:12.5px;color:var(--text-muted);">Awaiting</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Info Boxes -->
    <div style="margin-top:40px;" data-aos="fade-up">
        <h2 style="font-family:'Playfair Display',serif;font-size:22px;color:var(--green-dark);margin-bottom:20px;">ℹ️ Important Information</h2>
        <div class="info-boxes">
            <div class="info-box">
                <h4>📝 Result Rechecking</h4>
                <ul>
                    <li>Apply within 15 days of result declaration</li>
                    <li>Submit application to Examination Branch</li>
                    <li>Fee: Rs. 500 per subject</li>
                    <li>Result announced within 30 working days</li>
                    <li>Decision of rechecking committee is final</li>
                </ul>
            </div>
            <div class="info-box">
                <h4>🎓 Degree / Transcript</h4>
                <ul>
                    <li>Apply after final semester result</li>
                    <li>Fee clearance certificate required</li>
                    <li>Official transcript: Rs. 500</li>
                    <li>Degree copy: Rs. 1,000</li>
                    <li>Processing time: 2–3 weeks</li>
                </ul>
            </div>
            <div class="info-box">
                <h4>📞 Examination Branch</h4>
                <ul>
                    <li>Location: Admin Block, Room No. 12</li>
                    <li>Phone: +92-997-123456 Ext. 205</li>
                    <li>Email: exams@gpgcm.edu.pk</li>
                    <li>Hours: Mon–Fri, 8am – 4pm</li>
                    <li>Saturday: 8am – 12pm</li>
                </ul>
            </div>
        </div>
    </div>

</div>

@endsection
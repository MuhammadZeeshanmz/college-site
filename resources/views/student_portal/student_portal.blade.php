@extends('layouts.app')

@section('title', 'Student Portal — Government Postgraduate College Mansehra')

@push('styles')
<style>
    .portal-hero {
        background: linear-gradient(135deg, var(--green-dark) 0%, var(--green-mid) 60%, var(--green) 100%);
        padding: 72px 0 56px; position: relative; overflow: hidden;
    }
    .portal-hero::before { content:''; position:absolute; inset:0; background-image:radial-gradient(circle,rgba(255,255,255,.05) 1px,transparent 1px); background-size:24px 24px; }
    .portal-hero::after { content:''; position:absolute; bottom:-80px; right:-80px; width:320px; height:320px; border-radius:50%; background:radial-gradient(circle,rgba(200,147,10,.12) 0%,transparent 70%); }
    .portal-hero-content { position:relative; z-index:2; max-width:1200px; margin:auto; padding:0 24px; display:grid; grid-template-columns:1fr 380px; gap:48px; align-items:center; }
    .portal-hero-tag { display:inline-block; background:var(--gold); color:var(--green-dark); font-size:11px; font-weight:700; padding:4px 12px; border-radius:4px; letter-spacing:.06em; text-transform:uppercase; margin-bottom:12px; }
    .portal-hero h1 { font-family:'Playfair Display',serif; font-size:clamp(28px,4vw,48px); color:#fff; margin-bottom:10px; }
    .portal-hero p { font-size:15px; color:rgba(255,255,255,.65); line-height:1.7; }

    /* Login Card */
    .login-card {
        background:rgba(255,255,255,.1); backdrop-filter:blur(16px);
        border:1px solid rgba(255,255,255,.15); border-radius:20px; padding:32px;
    }
    .login-card h3 { font-family:'Playfair Display',serif; color:#fff; font-size:20px; margin-bottom:6px; }
    .login-card .sub { font-size:13px; color:rgba(255,255,255,.45); margin-bottom:22px; }
    .login-tabs { display:flex; gap:0; margin-bottom:22px; border-radius:8px; overflow:hidden; border:1px solid rgba(255,255,255,.2); }
    .login-tab { flex:1; padding:9px; text-align:center; font-size:13px; font-weight:600; color:rgba(255,255,255,.55); cursor:pointer; transition:all .2s; }
    .login-tab.active { background:var(--gold); color:var(--green-dark); }
    .form-field { margin-bottom:14px; }
    .form-field label { display:block; font-size:11px; color:rgba(255,255,255,.45); letter-spacing:.07em; text-transform:uppercase; margin-bottom:5px; }
    .form-field input { width:100%; background:rgba(255,255,255,.09); border:1px solid rgba(255,255,255,.18); color:#fff; padding:11px 14px; border-radius:8px; font-size:14px; font-family:'DM Sans',sans-serif; outline:none; transition:all .25s; }
    .form-field input::placeholder { color:rgba(255,255,255,.3); }
    .form-field input:focus { border-color:var(--gold-light); background:rgba(255,255,255,.13); }
    .btn-login { width:100%; background:var(--gold); color:var(--green-dark); border:none; cursor:pointer; padding:13px; border-radius:8px; font-size:15px; font-weight:700; font-family:'DM Sans',sans-serif; margin-top:4px; transition:all .25s; }
    .btn-login:hover { background:var(--gold-light); transform:translateY(-1px); }
    .forgot-link { display:block; text-align:center; margin-top:14px; color:rgba(255,255,255,.45); font-size:12.5px; text-decoration:none; }
    .forgot-link:hover { color:var(--gold-light); }

    .portal-container { max-width:1200px; margin:0 auto; padding:48px 24px 80px; }

    /* Quick Access */
    .quick-access-grid { display:grid; grid-template-columns:repeat(auto-fill,minmax(170px,1fr)); gap:16px; margin-bottom:48px; }
    .qa-card {
        background:var(--white); border:1px solid var(--border); border-radius:16px;
        padding:24px 16px; text-align:center; text-decoration:none; color:inherit;
        transition:all .25s; display:block;
    }
    .qa-card:hover { background:var(--green); border-color:var(--green); transform:translateY(-6px); box-shadow:var(--shadow-md); }
    .qa-card:hover .qa-title, .qa-card:hover .qa-desc { color:#fff !important; }
    .qa-icon { font-size:40px; margin-bottom:12px; }
    .qa-title { font-size:14px; font-weight:700; color:var(--green-dark); margin-bottom:4px; }
    .qa-desc { font-size:12px; color:var(--text-muted); }

    /* Services Grid */
    .services-grid { display:grid; grid-template-columns:1fr 1fr; gap:24px; }
    .service-card { background:var(--white); border:1px solid var(--border); border-radius:16px; padding:28px; transition:all .25s; }
    .service-card:hover { border-color:var(--green); box-shadow:var(--shadow-md); }
    .service-card h3 { font-size:18px; font-weight:700; color:var(--green-dark); margin-bottom:14px; display:flex; align-items:center; gap:10px; }
    .service-list { list-style:none; display:grid; gap:8px; }
    .service-list li a { display:flex; align-items:center; gap:8px; color:var(--text-muted); text-decoration:none; font-size:14px; padding:9px 12px; border-radius:8px; transition:all .2s; border:1px solid transparent; }
    .service-list li a:hover { background:var(--green-pale); border-color:rgba(26,92,56,.15); color:var(--green); padding-left:16px; }

    /* Notice Board */
    .notice-board { background:var(--white); border:1px solid var(--border); border-radius:16px; overflow:hidden; }
    .notice-header { background:var(--green-dark); padding:18px 24px; display:flex; align-items:center; justify-content:space-between; }
    .notice-header h3 { color:#fff; font-size:17px; font-weight:700; }
    .notice-header a { color:var(--gold-light); font-size:13px; text-decoration:none; }
    .notice-item { display:flex; gap:14px; align-items:flex-start; padding:16px 24px; border-bottom:1px solid var(--border); transition:background .2s; }
    .notice-item:hover { background:var(--green-pale); }
    .notice-item:last-child { border-bottom:none; }
    .notice-dot { width:8px; height:8px; border-radius:50%; background:var(--green); flex-shrink:0; margin-top:7px; }
    .notice-dot.new { background:var(--gold); }
    .notice-item p { font-size:13.5px; color:var(--text); line-height:1.5; margin-bottom:4px; }
    .notice-item span { font-size:11.5px; color:var(--text-muted); }

    @media(max-width:900px) {
        .portal-hero-content { grid-template-columns:1fr; }
        .login-card { display:none; }
        .services-grid { grid-template-columns:1fr; }
    }
    @media(max-width:640px) { .quick-access-grid { grid-template-columns:repeat(3,1fr); } }
</style>
@endpush

@section('content')

<div class="portal-hero">
    <div class="portal-hero-content">
        <div data-aos="fade-right">
            <div class="portal-hero-tag">Online Services</div>
            <h1>Student Portal</h1>
            <p>Your one-stop digital hub for managing enrollment, results, fee payments, library access, and all student services at GPGCM.</p>
            <div style="display:flex;gap:14px;flex-wrap:wrap;margin-top:24px;">
                <a href="#quick-access" class="btn-gold">Explore Services ↓</a>
                <a href="#" class="btn-outline-w">Need Help?</a>
            </div>
        </div>
        <div class="login-card" data-aos="fade-left">
            <h3>Student Login</h3>
            <p class="sub">Access your personal dashboard</p>
            <div class="login-tabs">
                <div class="login-tab active">Student</div>
                <div class="login-tab">Guardian</div>
            </div>
            <div class="form-field">
                <label>Student ID / Roll Number</label>
                <input type="text" placeholder="e.g. GPGCM-2024-CS-001">
            </div>
            <div class="form-field">
                <label>Password / CNIC Last 6 Digits</label>
                <input type="password" placeholder="••••••••">
            </div>
            <button class="btn-login">Login to Portal →</button>
            <a href="#" class="forgot-link">Forgot password? Contact Registrar Office</a>
        </div>
    </div>
</div>

<div class="portal-container" id="quick-access">

    <!-- Quick Access -->
    <div style="margin-bottom:32px;" data-aos="fade-up">
        <div class="section-tag">Student Services</div>
        <h2 style="font-family:'Playfair Display',serif;font-size:28px;color:var(--text);margin-top:8px;">Quick Access</h2>
    </div>
    <div class="quick-access-grid" data-aos="fade-up">
        <a href="{{ route('results') }}" class="qa-card">
            <div class="qa-icon">📊</div>
            <div class="qa-title">Results</div>
            <div class="qa-desc">View semester results</div>
        </a>
        <a href="#" class="qa-card">
            <div class="qa-icon">💳</div>
            <div class="qa-title">Fee Payment</div>
            <div class="qa-desc">Pay & view fee challan</div>
        </a>
        <a href="#" class="qa-card">
            <div class="qa-icon">📅</div>
            <div class="qa-title">Date Sheet</div>
            <div class="qa-desc">Exam schedule</div>
        </a>
        <a href="#" class="qa-card">
            <div class="qa-icon">📋</div>
            <div class="qa-title">Enrollment</div>
            <div class="qa-desc">Course enrollment</div>
        </a>
        <a href="#" class="qa-card">
            <div class="qa-icon">📚</div>
            <div class="qa-title">Library</div>
            <div class="qa-desc">Digital & physical</div>
        </a>
        <a href="#" class="qa-card">
            <div class="qa-icon">🎓</div>
            <div class="qa-title">Scholarship</div>
            <div class="qa-desc">Apply & track status</div>
        </a>
        <a href="#" class="qa-card">
            <div class="qa-icon">📄</div>
            <div class="qa-title">Transcript</div>
            <div class="qa-desc">Official transcript</div>
        </a>
        <a href="#" class="qa-card">
            <div class="qa-icon">🆔</div>
            <div class="qa-title">Student ID</div>
            <div class="qa-desc">Print ID card</div>
        </a>
        <a href="#" class="qa-card">
            <div class="qa-icon">🏠</div>
            <div class="qa-title">Hostel</div>
            <div class="qa-desc">Apply for hostel</div>
        </a>
        <a href="#" class="qa-card">
            <div class="qa-icon">🚌</div>
            <div class="qa-title">Transport</div>
            <div class="qa-desc">Bus routes & pass</div>
        </a>
        <a href="#" class="qa-card">
            <div class="qa-icon">📞</div>
            <div class="qa-title">Complaints</div>
            <div class="qa-desc">Submit grievance</div>
        </a>
        <a href="#" class="qa-card">
            <div class="qa-icon">📥</div>
            <div class="qa-title">Downloads</div>
            <div class="qa-desc">Forms & documents</div>
        </a>
    </div>

    <!-- Services + Notice Board -->
    <div style="display:grid;grid-template-columns:1fr 380px;gap:28px;margin-top:8px;" data-aos="fade-up">
        <div>
            <h2 class="section-divider" style="font-family:'Playfair Display',serif;font-size:22px;color:var(--green-dark);margin-bottom:24px;padding-bottom:12px;border-bottom:2px solid var(--green-pale);position:relative;">
                🛠️ All Student Services
                <span style="position:absolute;bottom:-2px;left:0;width:40px;height:2px;background:var(--green);display:block;"></span>
            </h2>
            <div class="services-grid">
                <div class="service-card">
                    <h3>📊 Academic Services</h3>
                    <ul class="service-list">
                        <li><a href="{{ route('results') }}">📈 View Semester Results</a></li>
                        <li><a href="#">📅 Download Date Sheet</a></li>
                        <li><a href="#">📋 Online Course Enrollment</a></li>
                        <li><a href="#">📝 Course Withdrawal Form</a></li>
                        <li><a href="#">📄 Official Transcript Request</a></li>
                        <li><a href="#">🔁 Re-Checking / Re-Evaluation</a></li>
                    </ul>
                </div>
                <div class="service-card">
                    <h3>💰 Financial Services</h3>
                    <ul class="service-list">
                        <li><a href="#">💳 Fee Challan Download</a></li>
                        <li><a href="#">🏦 Online Fee Payment</a></li>
                        <li><a href="#">📜 Fee Structure 2025-26</a></li>
                        <li><a href="#">🎓 Scholarship Application</a></li>
                        <li><a href="#">📊 Fee Clearance Certificate</a></li>
                        <li><a href="#">🔖 Dues & Arrears Status</a></li>
                    </ul>
                </div>
                <div class="service-card">
                    <h3>📚 Library & Resources</h3>
                    <ul class="service-list">
                        <li><a href="#">🔍 Search Library Catalog</a></li>
                        <li><a href="#">📖 E-Books & Journals</a></li>
                        <li><a href="#">🔁 Book Issue / Return Status</a></li>
                        <li><a href="#">🌐 HEC Digital Library Access</a></li>
                        <li><a href="#">📥 Research Papers Repository</a></li>
                        <li><a href="#">📅 Library Reading Schedule</a></li>
                    </ul>
                </div>
                <div class="service-card">
                    <h3>🏛️ Administrative Services</h3>
                    <ul class="service-list">
                        <li><a href="#">🆔 Student ID Card Request</a></li>
                        <li><a href="#">🔖 Character Certificate</a></li>
                        <li><a href="#">📋 Bonafide Certificate</a></li>
                        <li><a href="#">🏠 Hostel Application Form</a></li>
                        <li><a href="#">🚌 Transport Pass Application</a></li>
                        <li><a href="#">📞 Submit Complaint / Grievance</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Notice Board -->
        <div>
            <h2 style="font-family:'Playfair Display',serif;font-size:22px;color:var(--green-dark);margin-bottom:18px;">📌 Notice Board</h2>
            <div class="notice-board">
                <div class="notice-header">
                    <h3>📢 Latest Notices</h3>
                    <a href="{{ route('news') }}">View All →</a>
                </div>
                <div class="notice-item">
                    <div class="notice-dot new"></div>
                    <div><p>Spring 2026 Semester Enrollment Deadline: April 30, 2026</p><span>🆕 Posted: 15 Apr 2026</span></div>
                </div>
                <div class="notice-item">
                    <div class="notice-dot new"></div>
                    <div><p>Mid-Term Exams Schedule Published — Check Date Sheet</p><span>🆕 Posted: 12 Apr 2026</span></div>
                </div>
                <div class="notice-item">
                    <div class="notice-dot"></div>
                    <div><p>Scholarship Application Last Date: April 25, 2026</p><span>Posted: 10 Apr 2026</span></div>
                </div>
                <div class="notice-item">
                    <div class="notice-dot"></div>
                    <div><p>Physical Classes Resume Officially from April 6, 2026</p><span>Posted: 01 Apr 2026</span></div>
                </div>
                <div class="notice-item">
                    <div class="notice-dot"></div>
                    <div><p>Fee Submission for Spring 2026: Last Date April 20</p><span>Posted: 28 Mar 2026</span></div>
                </div>
                <div class="notice-item">
                    <div class="notice-dot"></div>
                    <div><p>Annual Sports Gala Registration Open — Last Date: Apr 18</p><span>Posted: 25 Mar 2026</span></div>
                </div>
                <div class="notice-item">
                    <div class="notice-dot"></div>
                    <div><p>Result cards for Fall 2025 Semester Now Available Online</p><span>Posted: 20 Mar 2026</span></div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
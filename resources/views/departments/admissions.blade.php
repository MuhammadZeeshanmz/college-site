@extends('layouts.app')
@section('title', 'Admissions — ' . $dept['name'] . ' — GPGC Mansehra')
@section('content')
<style>
.dept-breadcrumb{background:linear-gradient(90deg,#002855 0%,#004a8f 50%,#002855 100%);padding:10px 0;border-bottom:3px solid #ffd700;}
.dept-breadcrumb .wrap{max-width:1280px;margin:auto;padding:0 20px;display:flex;align-items:center;gap:8px;font-size:13px;color:rgba(255,255,255,.7);}
.dept-breadcrumb a{color:#ffd700;text-decoration:none;}
.dept-breadcrumb .sep{color:rgba(255,255,255,.35);}
.dept-page{background:#f4f5f7;padding:24px 0 60px;}
.dept-wrap{max-width:1280px;margin:auto;padding:0 20px;}
.dept-page-title{font-size:22px;font-weight:700;color:#1a6fa8;margin-bottom:18px;}
.two-col{display:grid;grid-template-columns:1fr 300px;gap:20px;align-items:start;}
.dc{background:#fff;border:1px solid #d0dce8;border-radius:6px;overflow:hidden;margin-bottom:18px;}
.dc-hdr{background:#1a6fa8;color:#fff;padding:10px 14px;font-size:13.5px;font-weight:700;}
.dc-body{padding:18px 20px;font-size:13.5px;color:#333;line-height:1.85;}
.adm-banner{background:linear-gradient(135deg,#002855,#1a6fa8);color:#fff;border-radius:6px;padding:20px 22px;margin-bottom:18px;text-align:center;}
.adm-banner h3{font-size:18px;font-weight:700;margin-bottom:6px;}
.adm-banner p{font-size:13.5px;color:rgba(255,255,255,.85);}
.adm-banner .badge{display:inline-block;background:#ffd700;color:#002855;font-weight:800;font-size:12px;padding:4px 14px;border-radius:12px;margin-top:10px;}
.req-list{list-style:none;padding:0;margin:14px 0;}
.req-list li{padding:9px 0;border-bottom:1px dashed #dde;display:flex;gap:10px;align-items:flex-start;font-size:13.5px;}
.req-list li:last-child{border-bottom:none;}
.req-list li::before{content:'✓';color:#28a745;font-weight:700;flex-shrink:0;margin-top:1px;}
.steps-grid{display:grid;grid-template-columns:1fr 1fr;gap:14px;margin-top:14px;}
.step-box{background:#f0f7ff;border:1px solid #d0dce8;border-radius:5px;padding:14px;text-align:center;}
.step-num{width:32px;height:32px;border-radius:50%;background:#1a6fa8;color:#fff;font-weight:700;font-size:14px;display:flex;align-items:center;justify-content:center;margin:0 auto 8px;}
.step-box p{font-size:12.5px;color:#333;line-height:1.55;}
.imp-wrap{display:grid;grid-template-columns:1fr 1fr;gap:0 12px;}
.imp-wrap ul{list-style:disc;padding-left:18px;margin:0;}
.imp-wrap ul li{padding:5px 0;font-size:13px;}
.imp-wrap ul li a{color:#1a6fa8;text-decoration:none;}
.imp-wrap ul li a:hover{text-decoration:underline;}
@media(max-width:900px){.two-col{grid-template-columns:1fr;}.steps-grid{grid-template-columns:1fr;}}
</style>

@include('departments.partials.breadcrumb', ['dept' => $dept, 'pageTitle' => 'Admissions'])

<div class="dept-page"><div class="dept-wrap">
<div class="dept-page-title">{{ $dept['fullName'] }}</div>
<div class="two-col">
    <div>
        <div class="dc">
            <div class="dc-hdr">Admissions — {{ date('Y') }}-{{ date('Y')+1 }}</div>
            <div class="dc-body">
                <div class="adm-banner">
                    <h3>🎓 Admissions Open!</h3>
                    <p>Applications are now being accepted for {{ $dept['programs'][0]['name'] ?? $dept['name'] }}</p>
                    <span class="badge">Fall {{ date('Y') }} Semester</span>
                </div>

                <strong>Eligibility / Requirements:</strong>
                <ul class="req-list">
                    @foreach($dept['admission_requirements'] as $req)
                    <li>{{ $req }}</li>
                    @endforeach
                </ul>

                <strong>How to Apply:</strong>
                <div class="steps-grid">
                    <div class="step-box"><div class="step-num">1</div><p>Collect admission form from college office or download from website</p></div>
                    <div class="step-box"><div class="step-num">2</div><p>Fill the form completely and attach all required documents</p></div>
                    <div class="step-box"><div class="step-num">3</div><p>Submit the form with admission fee to the accounts office</p></div>
                    <div class="step-box"><div class="step-num">4</div><p>Await confirmation and collect your enrollment number</p></div>
                </div>

                <p style="margin-top:16px;">For more information, contact the department at <a href="mailto:{{ $dept['email'] }}" style="color:#1a6fa8;font-weight:600;">{{ $dept['email'] }}</a> or call <strong>{{ $dept['phone'] }}</strong>.</p>
            </div>
        </div>
    </div>
    <div>
        @include('departments.partials.sidebar-links', ['dept' => $dept])
    </div>
</div>
</div></div>
@endsection
@extends('layouts.app')
@section('title', 'Semester Rules — ' . $dept['name'] . ' — GPGC Mansehra')
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
.dc-body{padding:18px 20px;font-size:13.5px;color:#333;line-height:1.9;}
.rule-item{display:flex;gap:10px;padding:9px 0;border-bottom:1px dashed #dde;align-items:flex-start;}
.rule-item:last-child{border-bottom:none;}
.rule-num{background:#1a6fa8;color:#fff;font-weight:700;font-size:12px;min-width:24px;height:24px;border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;margin-top:1px;}
.imp-wrap{display:grid;grid-template-columns:1fr 1fr;gap:0 12px;}
.imp-wrap ul{list-style:disc;padding-left:18px;margin:0;}
.imp-wrap ul li{padding:5px 0;font-size:13px;}
.imp-wrap ul li a{color:#1a6fa8;text-decoration:none;}
.imp-wrap ul li a:hover{text-decoration:underline;}
@media(max-width:900px){.two-col{grid-template-columns:1fr;}}
</style>

@include('departments.partials.breadcrumb', ['dept' => $dept, 'pageTitle' => 'Semester Rules'])

<div class="dept-page"><div class="dept-wrap">
<div class="dept-page-title">{{ $dept['fullName'] }}</div>
<div class="two-col">
    <div>
        <div class="dc">
            <div class="dc-hdr">Semester Rules &amp; Regulations</div>
            <div class="dc-body">
                @php
                $rules = [
                    'A student must have minimum 75% attendance to appear in the final examination.',
                    'Students must complete all assignments, quizzes, and mid-term examinations to qualify for the final exam.',
                    'The grading system follows a 4.0 GPA scale as prescribed by HEC Pakistan.',
                    'A student must obtain a minimum CGPA of 2.0 to continue in the program.',
                    'Repetition of courses is allowed only twice for failed or low-grade subjects.',
                    'Fee must be submitted within the announced schedule. Late fee will result in de-registration.',
                    'Academic dishonesty including plagiarism, cheating in exams, or impersonation will result in disciplinary action.',
                    'Students are expected to follow the code of conduct and dress code of the college at all times.',
                    'Use of mobile phones during lectures is strictly prohibited.',
                    'Any complaints or grievances may be submitted to the department office or the QEC cell.',
                    'For medical leave, a medical certificate from a registered doctor must be submitted within 3 days.',
                    'Students must clear all dues before the announcement of results or issuance of any official document.',
                ];
                @endphp
                @foreach($rules as $i => $rule)
                <div class="rule-item">
                    <div class="rule-num">{{ $i+1 }}</div>
                    <div>{{ $rule }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div>
        @include('departments.partials.sidebar-links', ['dept' => $dept])
    </div>
</div>
</div></div>
@endsection
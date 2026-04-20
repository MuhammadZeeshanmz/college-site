@extends('layouts.app')
@section('title', 'Course Outline — ' . $dept['name'] . ' — GPGC Mansehra')
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
.dc-body{padding:14px;}
.sem-block{margin-bottom:18px;border:1px solid #e0eaf4;border-radius:5px;overflow:hidden;}
.sem-title{background:#002855;color:#ffd700;padding:8px 14px;font-size:13px;font-weight:700;letter-spacing:.03em;}
.sem-courses{list-style:none;padding:0;margin:0;}
.sem-courses li{padding:8px 14px;border-bottom:1px solid #eef;font-size:13px;color:#333;display:flex;align-items:center;gap:8px;}
.sem-courses li:last-child{border-bottom:none;}
.sem-courses li::before{content:'›';color:#1a6fa8;font-weight:700;font-size:16px;}
.sem-courses li:hover{background:#f0f7ff;}
.imp-wrap{display:grid;grid-template-columns:1fr 1fr;gap:0 12px;}
.imp-wrap ul{list-style:disc;padding-left:18px;margin:0;}
.imp-wrap ul li{padding:5px 0;font-size:13px;}
.imp-wrap ul li a{color:#1a6fa8;text-decoration:none;}
.imp-wrap ul li a:hover{text-decoration:underline;}
@media(max-width:900px){.two-col{grid-template-columns:1fr;}}
</style>

@include('departments.partials.breadcrumb', ['dept' => $dept, 'pageTitle' => 'Course Outline'])

<div class="dept-page"><div class="dept-wrap">
<div class="dept-page-title">{{ $dept['fullName'] }}</div>
<div class="two-col">
    <div>
        <div class="dc">
            <div class="dc-hdr">Course Outline — {{ $dept['programs'][0]['name'] ?? $dept['name'] }}</div>
            <div class="dc-body">
                @forelse($dept['courses'] as $semester => $courses)
                <div class="sem-block">
                    <div class="sem-title">{{ $semester }}</div>
                    <ul class="sem-courses">
                        @foreach($courses as $course)
                        <li>{{ $course }}</li>
                        @endforeach
                    </ul>
                </div>
                @empty
                <p style="color:#666;font-size:13.5px;">Course outline will be available soon. Please contact the department office.</p>
                @endforelse
            </div>
        </div>
    </div>
    <div>
        @include('departments.partials.sidebar-links', ['dept' => $dept])
    </div>
</div>
</div></div>
@endsection
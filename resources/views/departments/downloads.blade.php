@extends('layouts.app')
@section('title', 'Downloads — ' . $dept['name'] . ' — GPGC Mansehra')
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
.dl-item{display:flex;justify-content:space-between;align-items:center;padding:11px 0;border-bottom:1px dashed #dde;font-size:13.5px;}
.dl-item:last-child{border-bottom:none;}
.dl-item .dl-name{color:#333;display:flex;gap:8px;align-items:center;}
.dl-item .dl-name span{font-size:18px;}
.dl-btn{background:#1a6fa8;color:#fff;padding:5px 14px;border-radius:3px;text-decoration:none;font-size:12.5px;font-weight:600;white-space:nowrap;}
.dl-btn:hover{background:#0b5a8a;}
.imp-wrap{display:grid;grid-template-columns:1fr 1fr;gap:0 12px;}
.imp-wrap ul{list-style:disc;padding-left:18px;margin:0;}
.imp-wrap ul li{padding:5px 0;font-size:13px;}
.imp-wrap ul li a{color:#1a6fa8;text-decoration:none;}
.imp-wrap ul li a:hover{text-decoration:underline;}
@media(max-width:900px){.two-col{grid-template-columns:1fr;}}
</style>

@include('departments.partials.breadcrumb', ['dept' => $dept, 'pageTitle' => 'Downloads'])

<div class="dept-page"><div class="dept-wrap">
<div class="dept-page-title">{{ $dept['fullName'] }}</div>
<div class="two-col">
    <div>
        <div class="dc">
            <div class="dc-hdr">Downloads — Department of {{ $dept['name'] }}</div>
            <div class="dc-body">
                @php
                $downloads = [
                    ['name' => 'Course Outline ' . date('Y') . '-' . (date('Y')+1), 'icon' => '📄'],
                    ['name' => 'Admission Form Fall ' . date('Y'),                   'icon' => '📝'],
                    ['name' => 'Fee Structure ' . date('Y') . '-' . (date('Y')+1),   'icon' => '💰'],
                    ['name' => 'Class Timetable Spring ' . date('Y'),                'icon' => '📅'],
                    ['name' => 'Examination Schedule Spring ' . date('Y'),           'icon' => '📋'],
                    ['name' => 'Lab Manual',                                         'icon' => '🔬'],
                    ['name' => 'Semester Rules & Regulations',                       'icon' => '📜'],
                    ['name' => 'Scholarship Application Form',                       'icon' => '🎓'],
                ];
                @endphp
                @foreach($downloads as $dl)
                <div class="dl-item">
                    <div class="dl-name"><span>{{ $dl['icon'] }}</span> {{ $dl['name'] }}</div>
                    <a href="#" class="dl-btn">⬇ Download</a>
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
@extends('layouts.app')
@section('title', "HOD's Message — " . $dept['name'] . ' — GPGC Mansehra')
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
.dc-body{padding:18px 20px;}
.hod-row{display:flex;gap:20px;align-items:flex-start;margin-bottom:16px;}
.hod-photo{width:130px;height:150px;object-fit:cover;border-radius:4px;border:2px solid #1a6fa8;flex-shrink:0;}
.hod-photo-ph{width:130px;height:150px;background:linear-gradient(135deg,#002855,#1a6fa8);border-radius:4px;display:flex;align-items:center;justify-content:center;font-size:52px;flex-shrink:0;}
.hod-info h3{font-size:17px;font-weight:700;color:#002855;margin-bottom:4px;}
.hod-info .desg{font-size:13.5px;color:#1a6fa8;margin-bottom:2px;}
.hod-info .qual{font-size:13px;color:#666;}
.hod-message-text{font-size:14px;line-height:1.9;color:#333;text-align:justify;}
.hod-message-text p{margin-bottom:12px;}
.sign-block{margin-top:20px;padding-top:16px;border-top:2px solid #eef;}
.sign-block strong{display:block;font-size:14.5px;color:#002855;}
.sign-block span{font-size:13px;color:#666;}
.imp-wrap{display:grid;grid-template-columns:1fr 1fr;gap:0 12px;}
.imp-wrap ul{list-style:disc;padding-left:18px;margin:0;}
.imp-wrap ul li{padding:5px 0;font-size:13px;}
.imp-wrap ul li a{color:#1a6fa8;text-decoration:none;font-weight:500;}
.imp-wrap ul li a:hover{text-decoration:underline;}
@media(max-width:900px){.two-col{grid-template-columns:1fr;}.hod-row{flex-direction:column;}}
</style>

@include('departments.partials.breadcrumb', ['dept' => $dept, 'pageTitle' => "HOD's Message"])

<div class="dept-page"><div class="dept-wrap">
<div class="dept-page-title">{{ $dept['fullName'] }}</div>
<div class="two-col">
    <div>
        <div class="dc">
            <div class="dc-hdr">Message from the Head of Department</div>
            <div class="dc-body">
                <div class="hod-row">
                    <div class="hod-photo-ph">👨‍💼</div>
                    <div class="hod-info">
                        <h3>{{ $dept['hod'] }}</h3>
                        <div class="desg">Head of Department</div>
                        <div class="qual">{{ $dept['hod_qual'] }}</div>
                        <div class="qual" style="margin-top:4px;">Department of {{ $dept['name'] }}</div>
                        <div class="qual">GPGC Mansehra</div>
                    </div>
                </div>
                <div class="hod-message-text">
                    <p>{{ $dept['hod_message'] }}</p>
                    <p>I warmly welcome all prospective and current students to explore the academic offerings of our department. Together, we will work towards building a future of knowledge, excellence, and service to our community and nation.</p>
                </div>
                <div class="sign-block">
                    <strong>{{ $dept['hod'] }}</strong>
                    <span>Head of Department — {{ $dept['name'] }}</span><br>
                    <span>Government Postgraduate College Mansehra</span>
                </div>
            </div>
        </div>
    </div>
    <div>
        @include('departments.partials.sidebar-links', ['dept' => $dept])
    </div>
</div>
</div></div>
@endsection
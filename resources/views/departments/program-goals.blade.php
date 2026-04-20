@extends('layouts.app')
@section('title', 'Program Goals — ' . $dept['name'] . ' — GPGC Mansehra')
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
.goal-item{display:flex;gap:14px;padding:12px 0;border-bottom:1px dashed #dde;align-items:flex-start;}
.goal-item:last-child{border-bottom:none;}
.goal-num{width:32px;height:32px;border-radius:50%;background:#1a6fa8;color:#fff;font-weight:700;font-size:13px;display:flex;align-items:center;justify-content:center;flex-shrink:0;}
.goal-text h4{font-size:14px;font-weight:700;color:#002855;margin-bottom:3px;}
.goal-text p{font-size:13px;color:#555;line-height:1.65;margin:0;}
.imp-wrap{display:grid;grid-template-columns:1fr 1fr;gap:0 12px;}
.imp-wrap ul{list-style:disc;padding-left:18px;margin:0;}
.imp-wrap ul li{padding:5px 0;font-size:13px;}
.imp-wrap ul li a{color:#1a6fa8;text-decoration:none;}
.imp-wrap ul li a:hover{text-decoration:underline;}
@media(max-width:900px){.two-col{grid-template-columns:1fr;}}
</style>

@include('departments.partials.breadcrumb', ['dept' => $dept, 'pageTitle' => 'Program Goals'])

<div class="dept-page"><div class="dept-wrap">
<div class="dept-page-title">{{ $dept['fullName'] }}</div>
<div class="two-col">
    <div>
        <div class="dc">
            <div class="dc-hdr">Program Goals &amp; Objectives</div>
            <div class="dc-body">
                <p style="margin-bottom:16px;">The {{ $dept['programs'][0]['name'] ?? $dept['name'] }} program at GPGC Mansehra is designed with the following educational objectives and goals:</p>
                @php
                $goals = [
                    ['title' => 'Academic Excellence', 'desc' => 'Provide students with a strong foundation in ' . $dept['name'] . ' principles and advanced knowledge to excel in their professional careers.'],
                    ['title' => 'Practical Skills', 'desc' => 'Equip students with hands-on practical skills through laboratory work, projects, and industry collaboration.'],
                    ['title' => 'Research Orientation', 'desc' => 'Foster a culture of scientific inquiry and critical thinking, encouraging students to contribute to research and innovation.'],
                    ['title' => 'Professional Ethics', 'desc' => 'Develop ethical, responsible, and socially conscious professionals who contribute positively to society.'],
                    ['title' => 'Lifelong Learning', 'desc' => 'Instill the habit of continuous learning to keep pace with the rapidly evolving demands of the field.'],
                    ['title' => 'National Development', 'desc' => 'Prepare graduates who contribute to the economic and technological development of Pakistan.'],
                ];
                @endphp
                @foreach($goals as $i => $goal)
                <div class="goal-item">
                    <div class="goal-num">{{ $i+1 }}</div>
                    <div class="goal-text">
                        <h4>{{ $goal['title'] }}</h4>
                        <p>{{ $goal['desc'] }}</p>
                    </div>
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
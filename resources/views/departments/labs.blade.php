@extends('layouts.app')
@section('title', 'Labs — ' . $dept['name'] . ' — GPGC Mansehra')
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
.labs-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(240px,1fr));gap:16px;}
.lab-card{background:#f8faff;border:1px solid #d0dce8;border-radius:6px;padding:16px;transition:all .2s;}
.lab-card:hover{box-shadow:0 4px 14px rgba(26,111,168,.15);transform:translateY(-2px);}
.lab-icon{font-size:32px;margin-bottom:10px;}
.lab-name{font-size:14px;font-weight:700;color:#002855;margin-bottom:6px;}
.lab-detail{font-size:12.5px;color:#555;line-height:1.6;}
.lab-detail strong{color:#1a6fa8;}
.imp-wrap{display:grid;grid-template-columns:1fr 1fr;gap:0 12px;}
.imp-wrap ul{list-style:disc;padding-left:18px;margin:0;}
.imp-wrap ul li{padding:5px 0;font-size:13px;}
.imp-wrap ul li a{color:#1a6fa8;text-decoration:none;}
.imp-wrap ul li a:hover{text-decoration:underline;}
@media(max-width:900px){.two-col{grid-template-columns:1fr;}}
</style>

@include('departments.partials.breadcrumb', ['dept' => $dept, 'pageTitle' => 'Labs'])

<div class="dept-page"><div class="dept-wrap">
<div class="dept-page-title">{{ $dept['fullName'] }}</div>
<div class="two-col">
    <div>
        <div class="dc">
            <div class="dc-hdr">Laboratories — Department of {{ $dept['name'] }}</div>
            <div class="dc-body">
                @if(count($dept['labs']) > 0)
                <div class="labs-grid">
                    @foreach($dept['labs'] as $lab)
                    <div class="lab-card">
                        <div class="lab-icon">🔬</div>
                        <div class="lab-name">{{ $lab['name'] }}</div>
                        <div class="lab-detail">
                            <strong>Capacity:</strong> {{ $lab['capacity'] }}<br>
                            <strong>Equipment/Software:</strong> {{ $lab['software'] }}
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <p style="color:#666;font-size:13.5px;">Lab information will be updated soon.</p>
                @endif
            </div>
        </div>
    </div>
    <div>
        @include('departments.partials.sidebar-links', ['dept' => $dept])
    </div>
</div>
</div></div>
@endsection
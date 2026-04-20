@extends('layouts.app')
@section('title', 'Results — ' . $dept['name'] . ' — GPGC Mansehra')
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
.res-table{width:100%;border-collapse:collapse;font-size:13.5px;}
.res-table th{background:#002855;color:#fff;padding:9px 12px;text-align:left;}
.res-table td{padding:9px 12px;border-bottom:1px solid #eef;color:#333;}
.res-table tr:hover td{background:#f0f7ff;}
.res-table td a{color:#1a6fa8;text-decoration:none;font-weight:600;}
.res-table td a:hover{text-decoration:underline;}
.status-badge{display:inline-block;font-size:11px;font-weight:700;padding:2px 8px;border-radius:3px;}
.status-available{background:#d4edda;color:#155724;}
.status-pending{background:#fff3cd;color:#856404;}
.imp-wrap{display:grid;grid-template-columns:1fr 1fr;gap:0 12px;}
.imp-wrap ul{list-style:disc;padding-left:18px;margin:0;}
.imp-wrap ul li{padding:5px 0;font-size:13px;}
.imp-wrap ul li a{color:#1a6fa8;text-decoration:none;}
.imp-wrap ul li a:hover{text-decoration:underline;}
@media(max-width:900px){.two-col{grid-template-columns:1fr;}}
</style>

@include('departments.partials.breadcrumb', ['dept' => $dept, 'pageTitle' => 'Results'])

<div class="dept-page"><div class="dept-wrap">
<div class="dept-page-title">{{ $dept['fullName'] }}</div>
<div class="two-col">
    <div>
        <div class="dc">
            <div class="dc-hdr">Examination Results</div>
            <div class="dc-body">
                <table class="res-table">
                    <thead><tr><th>#</th><th>Examination</th><th>Semester</th><th>Year</th><th>Status</th><th>View</th></tr></thead>
                    <tbody>
                        <tr><td>1</td><td>Mid-Term Exam</td><td>Spring 2025</td><td>{{ date('Y') }}</td><td><span class="status-badge status-available">Available</span></td><td><a href="#">View</a></td></tr>
                        <tr><td>2</td><td>Final Exam</td><td>Fall 2024</td><td>2024</td><td><span class="status-badge status-available">Available</span></td><td><a href="#">View</a></td></tr>
                        <tr><td>3</td><td>Mid-Term Exam</td><td>Fall 2024</td><td>2024</td><td><span class="status-badge status-available">Available</span></td><td><a href="#">View</a></td></tr>
                        <tr><td>4</td><td>Final Exam</td><td>Spring 2024</td><td>2024</td><td><span class="status-badge status-available">Available</span></td><td><a href="#">View</a></td></tr>
                        <tr><td>5</td><td>Final Exam</td><td>Spring 2025</td><td>{{ date('Y') }}</td><td><span class="status-badge status-pending">Pending</span></td><td>—</td></tr>
                    </tbody>
                </table>
                <p style="font-size:12.5px;color:#888;margin-top:10px;">* For result queries contact department office at {{ $dept['email'] }}</p>
            </div>
        </div>
    </div>
    <div>
        @include('departments.partials.sidebar-links', ['dept' => $dept])
    </div>
</div>
</div></div>
@endsection
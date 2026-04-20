@extends('layouts.app')
@section('title', 'Fee Structure — ' . $dept['name'] . ' — GPGC Mansehra')
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
.fee-table{width:100%;border-collapse:collapse;font-size:13.5px;}
.fee-table th{background:#002855;color:#fff;padding:10px 14px;text-align:left;}
.fee-table th:last-child{text-align:right;}
.fee-table td{padding:10px 14px;border-bottom:1px solid #eef;color:#333;}
.fee-table td:last-child{text-align:right;font-weight:700;color:#1a6fa8;}
.fee-table tr:hover td{background:#f0f7ff;}
.fee-table tfoot td{background:#f0f7ff;font-weight:700;color:#002855;border-top:2px solid #1a6fa8;}
.fee-table tfoot td:last-child{color:#002855;}
.fee-note{font-size:12.5px;color:#888;margin-top:10px;line-height:1.7;}
.imp-wrap{display:grid;grid-template-columns:1fr 1fr;gap:0 12px;}
.imp-wrap ul{list-style:disc;padding-left:18px;margin:0;}
.imp-wrap ul li{padding:5px 0;font-size:13px;}
.imp-wrap ul li a{color:#1a6fa8;text-decoration:none;}
.imp-wrap ul li a:hover{text-decoration:underline;}
@media(max-width:900px){.two-col{grid-template-columns:1fr;}}
</style>

@include('departments.partials.breadcrumb', ['dept' => $dept, 'pageTitle' => 'Fee Structure'])

<div class="dept-page"><div class="dept-wrap">
<div class="dept-page-title">{{ $dept['fullName'] }}</div>
<div class="two-col">
    <div>
        <div class="dc">
            <div class="dc-hdr">Fee Structure — Academic Year 2025-26</div>
            <div class="dc-body">
                @php
                    $total = array_reduce($dept['fee'], function($carry, $item) {
                        return $carry + (int) str_replace(',', '', $item['amount']);
                    }, 0);
                @endphp
                <table class="fee-table">
                    <thead><tr><th>#</th><th>Fee Head</th><th>Amount (PKR)</th></tr></thead>
                    <tbody>
                        @foreach($dept['fee'] as $i => $f)
                        <tr>
                            <td>{{ $i+1 }}</td>
                            <td>{{ $f['title'] }}</td>
                            <td>{{ $f['amount'] }}/-</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2">Total (Approximate)</td>
                            <td>{{ number_format($total) }}/-</td>
                        </tr>
                    </tfoot>
                </table>
                <p class="fee-note">
                    * Fee is subject to change as per college/university policy.<br>
                    * Fee concession is available for deserving students.<br>
                    * For fee payment, visit the college accounts office or use the NBP payment portal.
                </p>
            </div>
        </div>
    </div>
    <div>
        @include('departments.partials.sidebar-links', ['dept' => $dept])
    </div>
</div>
</div></div>
@endsection
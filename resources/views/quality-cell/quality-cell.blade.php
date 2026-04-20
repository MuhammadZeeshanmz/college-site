@extends('layouts.app')

@section('title', "Quality Enhancement Cell — Government Postgraduate College Mansehra")

@push('styles')
<style>
.admin-page { background:#f4f6f9; padding:40px 0 70px; min-height:80vh; }
.admin-container { max-width:1180px; margin:0 auto; padding:0 20px; display:grid; grid-template-columns:1fr 300px; gap:28px; align-items:start; }
.breadcrumb-bar { background:#fff; border-bottom:1px solid #e0e6ed; padding:11px 0; font-size:13px; color:#666; }
.breadcrumb-bar .inner { max-width:1180px; margin:0 auto; padding:0 20px; display:flex; align-items:center; gap:6px; }
.breadcrumb-bar a { color:#1a5276; text-decoration:none; }
.breadcrumb-bar a:hover { text-decoration:underline; }
.breadcrumb-bar .sep { color:#aaa; }
.breadcrumb-bar .current { color:#444; font-weight:500; }
.admin-main { background:#fff; border:1px solid #dde4ed; border-radius:4px; }
.admin-main-header { padding:22px 28px 18px; border-bottom:2px solid #e8edf3; }
.admin-main-header h1 { font-size:22px; font-weight:700; color:#1a5276; font-family:'DM Sans',sans-serif; }
.staff-row { display:flex; align-items:flex-start; justify-content:space-between; padding:28px 28px 24px; border-bottom:1px solid #e8edf3; gap:20px; transition:background .2s; }
.staff-row:last-child { border-bottom:none; }
.staff-row:hover { background:#f8fafc; }
.staff-info { flex:1; min-width:0; }
.staff-info .name { font-size:16.5px; font-weight:600; color:#1a5276; margin-bottom:4px; }
.staff-info .designation { font-size:14px; font-weight:700; color:#333; margin-bottom:10px; }
.staff-info .contact-line { font-size:13.5px; color:#555; margin-bottom:4px; display:flex; align-items:center; gap:6px; }
.staff-info .contact-line i { color:#1a7fa8; width:14px; font-size:12px; }
.staff-info .contact-line a { color:#1a7fa8; text-decoration:none; }
.staff-info .contact-line a:hover { text-decoration:underline; }
.staff-photo { width:110px; height:130px; flex-shrink:0; border:2px solid #1a7fa8; border-radius:6px; overflow:hidden; background:#edf2f7; display:flex; align-items:center; justify-content:center; }
.staff-photo img { width:100%; height:100%; object-fit:cover; object-position:top; display:block; }
.staff-photo .no-photo { width:100%; height:100%; display:flex; align-items:center; justify-content:center; background:#dce6ef; }
.staff-photo .no-photo svg { width:72px; height:72px; opacity:.4; }
.admin-sidebar { border:1px solid #dde4ed; border-radius:4px; overflow:hidden; position:sticky; top:72px; }
.sidebar-heading { background:#1a7fa8; color:#fff; text-align:center; padding:13px 16px; font-size:15px; font-weight:700; letter-spacing:.08em; text-transform:uppercase; }
.sidebar-nav { background:#fff; }
.sidebar-nav a { display:flex; align-items:center; gap:8px; padding:10px 16px; font-size:13.5px; color:#1a5276; text-decoration:none; border-bottom:1px dashed #d0dbe8; transition:all .18s; font-weight:500; }
.sidebar-nav a:last-child { border-bottom:none; }
.sidebar-nav a::before { content:'▶'; font-size:8px; color:#1a7fa8; flex-shrink:0; }
.sidebar-nav a:hover { background:#eaf4f9; color:#1a7fa8; padding-left:22px; }
.sidebar-nav a.active { background:#eaf4f9; color:#1a7fa8; font-weight:700; border-left:3px solid #1a7fa8; padding-left:19px; }
@media(max-width:860px){ .admin-container{grid-template-columns:1fr;} .admin-sidebar{position:static;} }
@media(max-width:560px){ .staff-row{flex-direction:column-reverse;gap:14px;} .staff-photo{width:90px;height:108px;} }
</style>
@endpush

@section('content')

<div class="breadcrumb-bar">
    <div class="inner">
        <a href="{{ url('/') }}">Home</a>
        <span class="sep">›</span>
        <a href="#">Administration</a>
        <span class="sep">›</span>
        <span class="current">Quality Enhancement Cell</span>
    </div>
</div>

<div class="admin-page">
    <div class="admin-container">

        <div class="admin-main">
            <div class="admin-main-header">
                <h1>Quality Enhancement Cell</h1>
            </div>

            <!-- ── 1. Director QEC ── -->
            <div class="staff-row">
                <div class="staff-info">
                    <div class="name">Dr. [Director QEC Name]</div>
                    <div class="designation">Director QEC</div>
                    <div class="contact-line">
                        <i class="fas fa-envelope"></i>
                        Email: <a href="mailto:director.qec@gpgcmansehra.edu.pk">director.qec@gpgcmansehra.edu.pk</a>
                    </div>
                    <div class="contact-line">
                        <i class="fas fa-phone"></i>
                        Phone No: +92-997-000010
                    </div>
                </div>
                <div class="staff-photo">
                    {{-- <img src="{{ asset('images/staff/qec-director.jpg') }}" alt="Director QEC"> --}}
                    <div class="no-photo">
                        <svg viewBox="0 0 100 120" fill="#90a4b7" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="50" cy="32" r="22"/>
                            <path d="M10 110 Q10 72 50 72 Q90 72 90 110Z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- ── 2. Assistant Director QEC ── -->
            <div class="staff-row">
                <div class="staff-info">
                    <div class="name">Ms. [Assistant Director Name]</div>
                    <div class="designation">Assistant Director QEC</div>
                    <div class="contact-line">
                        <i class="fas fa-envelope"></i>
                        Email: <a href="mailto:qec@gpgcmansehra.edu.pk">qec@gpgcmansehra.edu.pk</a>
                    </div>
                    <div class="contact-line">
                        <i class="fas fa-phone"></i>
                        Phone No: +92-997-000011
                    </div>
                </div>
                <div class="staff-photo">
                    {{-- <img src="{{ asset('images/staff/qec-ad.jpg') }}" alt="Assistant Director QEC"> --}}
                    <div class="no-photo">
                        <!-- Female silhouette -->
                        <svg viewBox="0 0 100 120" fill="#90a4b7" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="50" cy="30" r="20"/>
                            <path d="M20 115 Q18 72 50 68 Q82 72 80 115Z"/>
                            <path d="M30 68 Q28 55 50 68 Q72 55 70 68" fill="#90a4b7"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- ── 3. QEC Coordinator ── -->
            <div class="staff-row">
                <div class="staff-info">
                    <div class="name">Mr. [QEC Coordinator Name]</div>
                    <div class="designation">QEC Coordinator</div>
                    <div class="contact-line">
                        <i class="fas fa-envelope"></i>
                        Email: <a href="mailto:qec@gpgcmansehra.edu.pk">qec@gpgcmansehra.edu.pk</a>
                    </div>
                    <div class="contact-line">
                        <i class="fas fa-phone"></i>
                        Phone No: +92-997-000012
                    </div>
                </div>
                <div class="staff-photo">
                    <div class="no-photo">
                        <svg viewBox="0 0 100 120" fill="#90a4b7" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="50" cy="32" r="22"/>
                            <path d="M10 110 Q10 72 50 72 Q90 72 90 110Z"/>
                        </svg>
                    </div>
                </div>
            </div>

        </div><!-- /admin-main -->

        <aside class="admin-sidebar">
            <div class="sidebar-heading">Administration</div>
            <nav class="sidebar-nav">
                <a href="{{ url('/principal') }}">Principal's Office</a>
                <a href="#">Vice Principal's Office</a>
                <a href="#">Registrar Office</a>
                <a href="#">Provost Office</a>
                <a href="#">Directorate of Administration</a>
                <a href="#">Examinations Section</a>
                <a href="#">Directorate of Finance</a>
                <a href="#">Procurement Office</a>
                <a href="#">Directorate of P&amp;D</a>
                <a href="#">ORIC</a>
                <a href="{{ route('qec') }}" class="active">Quality Enhancement Cell</a>
                <a href="#">Directorate of Sports</a>
                <a href="#">Directorate of Works</a>
                <a href="{{ route('library') }}">Central Library</a>
                <a href="#">Student Financial Aid Office</a>
                <a href="#">Directorate of IT Services</a>
                <a href="#">BIC</a>
            </nav>
        </aside>

    </div>
</div>

@endsection
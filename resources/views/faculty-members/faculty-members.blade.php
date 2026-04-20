@extends('layouts.app')

@section('title', 'Faculty Members - Department of Computer Science - GPGC Mansehra')

@push('styles')
<style>
    * { margin:0; padding:0; box-sizing:border-box; }

    body { font-family: Arial, sans-serif; font-size:14px; background:#f5f5f5; color:#333; }

    .page-wrapper { max-width:1200px; margin:0 auto; padding:20px 15px; }

    .content-layout { display:flex; gap:20px; align-items:flex-start; }

    /* ── Main Content ── */
    .main-content { flex:1; min-width:0; }

    .dept-title { color:#1a6fa3; font-size:22px; font-weight:bold; margin-bottom:4px; }
    .section-subtitle { color:#1a6fa3; font-size:15px; font-weight:normal; margin-bottom:20px; }

    /* ── Faculty Card ── */
    .faculty-card {
        display:flex; justify-content:space-between; align-items:flex-start;
        padding:18px 0; border-bottom:1px dashed #ccc;
    }
    .faculty-card:last-child { border-bottom:none; }

    .faculty-info { flex:1; }

    .faculty-name {
        color:#1a6fa3; font-size:16px; font-weight:bold; margin-bottom:3px;
        text-decoration:none; display:inline-block;
    }
    .faculty-name:hover { text-decoration:underline; }

    .phd-tag { color:#1a6fa3; font-size:13px; font-weight:normal; }

    .faculty-designation { font-weight:bold; font-size:14px; color:#333; margin-bottom:3px; }
    .faculty-qual        { font-size:14px; color:#333; margin-bottom:3px; }
    .faculty-email       { font-size:14px; color:#333; margin-bottom:3px; }
    .faculty-phone       { font-size:14px; color:#333; margin-bottom:3px; }
    .faculty-email a     { color:#333; text-decoration:none; }
    .faculty-email a:hover { text-decoration:underline; color:#1a6fa3; }

    .btn-profile {
        display:inline-block; margin-top:8px; padding:7px 16px;
        background:#1a6fa3; color:#fff; font-size:13px;
        border:none; border-radius:3px; cursor:pointer; text-decoration:none;
        transition:background .2s;
    }
    .btn-profile:hover { background:#155a87; }

    /* ── Photo ── */
    .faculty-photo-wrap {
        width:120px; flex-shrink:0;
        display:flex; justify-content:center; align-items:flex-start; margin-left:20px;
    }
    .faculty-photo {
        width:105px; height:115px; object-fit:cover;
        border:3px solid #1a6fa3; border-radius:8px; display:block;
    }
    .faculty-photo-placeholder {
        width:105px; height:115px; border:3px solid #1a6fa3; border-radius:8px;
        background:#e8e8e8; display:flex; align-items:center; justify-content:center;
        color:#999; font-size:12px; text-align:center;
    }

    /* ── Sidebar ── */
    .sidebar { width:250px; flex-shrink:0; }
    .sidebar-box { background:#fff; border:1px solid #ddd; margin-bottom:20px; }
    .sidebar-box-title {
        background:#1a7fa8; color:#fff; font-size:15px; font-weight:bold;
        text-align:center; padding:10px 15px; letter-spacing:0.5px;
    }
    .sidebar-links { list-style:none; padding:10px 15px; }
    .sidebar-links li { padding:3px 0; position:relative; padding-left:14px; }
    .sidebar-links li::before { content:"•"; position:absolute; left:0; color:#333; }
    .sidebar-links li a { color:#1a6fa3; text-decoration:none; font-size:13px; }
    .sidebar-links li a:hover { text-decoration:underline; }

    /* ── Scrolling News ── */
    .news-scroll-wrap {
        height:260px;
        overflow:hidden;
        position:relative;
    }
    .news-scroll-wrap::after {
        content:'';
        position:absolute;
        bottom:0; left:0; right:0;
        height:40px;
        background:linear-gradient(transparent, #fff);
        pointer-events:none;
        z-index:2;
    }
    .news-scroll-inner {
        animation: newsScrollUp 18s linear infinite;
    }
    .news-scroll-inner:hover {
        animation-play-state: paused;
    }
    @keyframes newsScrollUp {
        0%   { transform: translateY(0); }
        100% { transform: translateY(-50%); }
    }

    .news-item { padding:8px 15px; border-bottom:1px dashed #ddd; }
    .news-item:last-child { border-bottom:none; }
    .news-new-badge {
        display:inline-block; background:#cc0000; color:#fff;
        font-size:11px; font-weight:bold; padding:1px 5px; border-radius:2px; margin-right:4px;
    }
    .news-title a { color:#1a6fa3; text-decoration:none; font-size:13px; line-height:1.4; }
    .news-title a:hover { text-decoration:underline; }
    .news-date2 { font-size:12px; color:#888; margin-top:4px; }

    @media(max-width:768px) {
        .content-layout { flex-direction:column; }
        .sidebar { width:100%; }
        .faculty-card { flex-direction:column; gap:12px; }
        .faculty-photo-wrap { margin-left:0; }
    }
</style>
@endpush

@section('content')

<div class="page-wrapper">
    <div class="content-layout">

        {{-- ════ MAIN CONTENT ════ --}}
        <div class="main-content">

            <h1 class="dept-title">Department of Computer Science</h1>
            <h2 class="section-subtitle">Faculty Members</h2>

            @php
            $faculty = [
                [
                    'name'          => 'Prof. [Muhammad Abid]',
                    'designation'   => 'Professor / Head of Department',
                    'qual'          => 'Msc (Computer Science)',
                    'email'         => 'hod.cs@gcmansehra.edu.pk',
                    'phone'         => '+92-997-530026',
                    'on_leave'      => false,
                    'accepting_phd' => false,
                ],
                [
                    'name'          => 'Prof. [Zulqurnain Shah]',
                    'designation'   => 'Lecturer',
                    'qual'          => 'Bsc, Msc (Computer Science)',
                    'email'         => 'faculty1.cs@gcmansehra.edu.pk',
                    'phone'         => '+92-997-530026',
                    'photo'         => '',
                    'on_leave'      => false,
                    'accepting_phd' => true,
                ],
                [
                    'name'          => 'Prof. [Junaid Hussain]',
                    'designation'   => 'Lecturer',
                    'qual'          => 'MS (Computer Science)',
                    'email'         => 'faculty2.cs@gcmansehra.edu.pk',
                    'phone'         => '+92-997-530026',
                    'photo'         => '',
                    'on_leave'      => false,
                    'accepting_phd' => false,
                ],
                [
                    'name'          => 'Mr. [Name]',
                    'designation'   => 'Lecturer',
                    'qual'          => 'MS (Information Technology)',
                    'email'         => 'faculty3.cs@gcmansehra.edu.pk',
                    'phone'         => '+92-997-530026',
                    'photo'         => '',
                    'on_leave'      => true,
                    'accepting_phd' => false,
                ],
                [
                    'name'          => 'Ms. [Name]',
                    'designation'   => 'Lecturer',
                    'qual'          => 'MS (Computer Networks)',
                    'email'         => 'faculty4.cs@gcmansehra.edu.pk',
                    'phone'         => '+92-997-530026',
                    'photo'         => '',
                    'on_leave'      => false,
                    'accepting_phd' => false,
                ],
            ];
            @endphp

            @foreach($faculty as $member)
            <div class="faculty-card">
                <div class="faculty-info">

                    <a href="#" class="faculty-name">
                        {{ $member['name'] }}
                        @if($member['accepting_phd'])
                            <span class="phd-tag"></span>
                        @endif
                    </a>

                    <div class="faculty-designation">
                        {{ $member['designation'] }}
                        @if($member['on_leave'])
                            <span style="color:#c0392b;"> (On Leave)</span>
                        @endif
                    </div>

                    <div class="faculty-qual">{{ $member['qual'] }}</div>

                    <div class="faculty-email">
                        Email: <a href="mailto:{{ $member['email'] }}">{{ $member['email'] }}</a>
                    </div>

                    <div class="faculty-phone">Phone No: {{ $member['phone'] }}</div>

                    <a href="#" class="btn-profile">View Complete Profile</a>

                </div>

                <div class="faculty-photo-wrap">
                    @if(!empty($member['photo']))
                        <img src="{{ asset($member['photo']) }}"
                             alt="{{ $member['name'] }}"
                             class="faculty-photo"
                             onerror="this.style.display='none'">
                    @else
                        <div class="faculty-photo-placeholder">Photo</div>
                    @endif
                </div>
            </div>
            @endforeach

        </div>{{-- end main-content --}}

        {{-- ════ SIDEBAR ════ --}}
        <div class="sidebar">

            {{-- Important Links --}}
            <div class="sidebar-box">
                <div class="sidebar-box-title">IMPORTANT LINKS</div>
                <ul class="sidebar-links">
                    <li><a href="#">Department Home</a></li>
                    <li><a href="#">HOD's Message</a></li>
                    <li><a href="{{ route('department.show', 'cs') }}">BS Computer Science</a></li>
                    <li><a href="{{ route('department.show', 'it') }}">BS Information Technology</a></li>
                    <li><a href="#">Programs Offered &amp; Goals</a></li>
                    <li><a href="#">Labs</a></li>
                    <li><a href="#">Industry Linkages</a></li>
                    <li><a href="#">BS Artificial Intelligence</a></li>
                    <li><a href="#">Faculty Members</a></li>
                    <li><a href="#">MOUs &amp; Industry Advisory Board</a></li>
                    <li><a href="{{ route('downloads') }}">Other Downloads</a></li>
                </ul>
            </div>

            {{-- News & Events — SCROLLING --}}
            <div class="sidebar-box">
                <div class="sidebar-box-title">NEWS &amp; EVENTS</div>
                <div class="news-scroll-wrap">
                    <div class="news-scroll-inner">

                        {{-- ── Original set ── --}}
                        <div class="news-item">
                            <div class="news-title">
                                <span class="news-new-badge">New</span>
                                <a href="#">GPGC Mansehra CS Department Achieves NCEAC Accreditation for BS Programs</a>
                            </div>
                            <div class="news-date2">15 Apr 2026</div>
                        </div>

                        <div class="news-item">
                            <div class="news-title">
                                <span class="news-new-badge">New</span>
                                <a href="#">MoU Signed Between GPGC Mansehra and Industry Partners for Internship Programs</a>
                            </div>
                            <div class="news-date2">10 Apr 2026</div>
                        </div>

                        <div class="news-item">
                            <div class="news-title">
                                <a href="#">Annual Programming Competition 2026 — Registration Open for Students</a>
                            </div>
                            <div class="news-date2">01 Apr 2026</div>
                        </div>

                        <div class="news-item">
                            <div class="news-title">
                                <a href="#">BS Final Year Project Exhibition — Department of Computer Science</a>
                            </div>
                            <div class="news-date2">20 Mar 2026</div>
                        </div>

                        <div class="news-item">
                            <div class="news-title">
                                <a href="#">Workshop on Web Development Technologies for BS Students</a>
                            </div>
                            <div class="news-date2">10 Mar 2026</div>
                        </div>

                        <div class="news-item">
                            <div class="news-title">
                                <a href="#">Seminar on Artificial Intelligence and Future Career Opportunities</a>
                            </div>
                            <div class="news-date2">01 Mar 2026</div>
                        </div>

                        {{-- ── Duplicate set for seamless loop ── --}}
                        <div class="news-item">
                            <div class="news-title">
                                <span class="news-new-badge">New</span>
                                <a href="#">GPGC Mansehra CS Department Achieves NCEAC Accreditation for BS Programs</a>
                            </div>
                            <div class="news-date2">15 Apr 2026</div>
                        </div>

                        <div class="news-item">
                            <div class="news-title">
                                <span class="news-new-badge">New</span>
                                <a href="#">MoU Signed Between GPGC Mansehra and Industry Partners for Internship Programs</a>
                            </div>
                            <div class="news-date2">10 Apr 2026</div>
                        </div>

                        <div class="news-item">
                            <div class="news-title">
                                <a href="#">Annual Programming Competition 2026 — Registration Open for Students</a>
                            </div>
                            <div class="news-date2">01 Apr 2026</div>
                        </div>

                        <div class="news-item">
                            <div class="news-title">
                                <a href="#">BS Final Year Project Exhibition — Department of Computer Science</a>
                            </div>
                            <div class="news-date2">20 Mar 2026</div>
                        </div>

                        <div class="news-item">
                            <div class="news-title">
                                <a href="#">Workshop on Web Development Technologies for BS Students</a>
                            </div>
                            <div class="news-date2">10 Mar 2026</div>
                        </div>

                        <div class="news-item">
                            <div class="news-title">
                                <a href="#">Seminar on Artificial Intelligence and Future Career Opportunities</a>
                            </div>
                            <div class="news-date2">01 Mar 2026</div>
                        </div>

                    </div>{{-- end scroll-inner --}}
                </div>{{-- end scroll-wrap --}}
            </div>{{-- end sidebar-box --}}

        </div>{{-- end sidebar --}}

    </div>
</div>

@endsection
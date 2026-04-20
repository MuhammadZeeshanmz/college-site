@extends('layouts.app')

@section('title', 'Journals - GPGC Mansehra')

@push('styles')
<style>
.jl-wrap {
    max-width:1200px; margin:28px auto; padding:0 15px;
    display:flex; gap:20px; align-items:flex-start;
}

/* ── Main ── */
.jl-main {
    flex:1; background:#fff; border:1px solid #ddd; padding:24px 28px;
}
.jl-title {
    color:#1a6b8a; font-size:20px; font-weight:700; margin-bottom:22px;
    border-bottom:2px solid #1a6b8a; padding-bottom:10px;
}

/* Journal card */
.jcard {
    display:flex; gap:20px; align-items:flex-start;
    padding:20px 0; border-bottom:1px solid #e0e0e0;
}
.jcard:last-child { border-bottom:none; }

.jcard-logo {
    flex-shrink:0; width:120px; height:80px;
    background:#1a3a8a; border:2px solid #1a6b8a;
    display:flex; align-items:center; justify-content:center;
    border-radius:4px;
}
.jcard-logo span {
    color:#fff; font-weight:800; font-size:16px;
    text-align:center; line-height:1.3; padding:4px;
}

.jcard-info h3 {
    color:#1a6b8a; font-size:15px; font-weight:700; margin-bottom:6px;
}
.jcard-info p {
    font-size:13.5px; color:#555; line-height:1.75; margin-bottom:6px;
}
.jcard-info .issn { font-size:12px; color:#888; font-style:italic; }

.btn-view {
    display:inline-block; margin-top:10px;
    background:#1a6b8a; color:#fff;
    padding:7px 18px; font-size:12.5px; border-radius:2px;
    text-decoration:none; transition:background .2s;
}
.btn-view:hover { background:#0d4f6b; }

/* ── Sidebar ── */
.jl-side { width:255px; flex-shrink:0; }
.sb { background:#fff; border:1px solid #ddd; margin-bottom:14px; }
.sb-hdr {
    background:#1a6b8a; color:#fff; font-size:13px; font-weight:700;
    padding:11px 15px; text-align:center; letter-spacing:.5px; text-transform:uppercase;
}
.sb-nav { list-style:none; }
.sb-nav li { border-bottom:1px dashed #ccc; }
.sb-nav li:last-child { border-bottom:none; }
.sb-nav li a {
    display:flex; align-items:center; gap:6px;
    padding:10px 14px; font-size:13px; color:#1a6b8a;
    text-decoration:none; transition:background .15s;
}
.sb-nav li a::before { content:'▸'; font-size:11px; color:#1a6b8a; flex-shrink:0; }
.sb-nav li a:hover { background:#e8f4f8; color:#0d4f6b; font-weight:700; padding-left:18px; }
.sb-news { padding:14px; font-size:13px; color:#888; }

@media(max-width:768px){
    .jl-wrap{flex-direction:column;}
    .jl-side{width:100%;}
    .jcard{flex-direction:column;}
}
</style>
@endpush

@section('content')
<div class="jl-wrap">

    {{-- ════ MAIN ════ --}}
    <div class="jl-main">
        <div class="jl-title">Journals — Govt. Post Graduate College Mansehra</div>

        {{-- Journal 1 --}}
        <div class="jcard">
            <div class="jcard-logo"><span>GPGC<br>JSS</span></div>
            <div class="jcard-info">
                <h3>Journal of Social Sciences (GPGC-JSS)</h3>
                <p>A peer-reviewed academic journal publishing research in Sociology, Political Science, Economics, Pakistan Studies, Islamic Studies, and related disciplines.</p>
                <span class="issn">ISSN: XXXX-XXXX &nbsp;|&nbsp; Published by: GPGC Mansehra &nbsp;|&nbsp; Bi-Annual</span><br>
                {{-- target="_blank" = new tab --}}
                <a href="{{ route('journal.detail', 'social-sciences') }}" target="_blank" class="btn-view">View Journal →</a>
            </div>
        </div>

        {{-- Journal 2 --}}
        <div class="jcard">
            <div class="jcard-logo"><span>GPGC<br>JCS</span></div>
            <div class="jcard-info">
                <h3>Journal of Computer Science (GPGC-JCS)</h3>
                <p>A peer-reviewed journal covering research in Computer Science, Information Technology, Software Engineering, Artificial Intelligence, and related fields.</p>
                <span class="issn">ISSN: XXXX-XXXX &nbsp;|&nbsp; Published by: GPGC Mansehra &nbsp;|&nbsp; Bi-Annual</span><br>
                <a href="{{ route('journal.detail', 'computer-science') }}" target="_blank" class="btn-view">View Journal →</a>
            </div>
        </div>

        {{-- Journal 3 --}}
        <div class="jcard">
            <div class="jcard-logo"><span>GPGC<br>JES</span></div>
            <div class="jcard-info">
                <h3>Journal of Environmental Studies (GPGC-JES)</h3>
                <p>A peer-reviewed journal dedicated to research in Environmental Science, Botany, Zoology, Ecology, and Natural Resource Management in the Hazara region and beyond.</p>
                <span class="issn">ISSN: XXXX-XXXX &nbsp;|&nbsp; Published by: GPGC Mansehra &nbsp;|&nbsp; Bi-Annual</span><br>
                <a href="{{ route('journal.detail', 'environmental-studies') }}" target="_blank" class="btn-view">View Journal →</a>
            </div>
        </div>

    </div>

    {{-- ════ SIDEBAR ════ --}}
    <div class="jl-side">
        <div class="sb">
            <div class="sb-hdr">Our Journals</div>
            <ul class="sb-nav">
                <li><a href="{{ route('journal.detail', 'social-sciences') }}"      target="_blank">Journal of Social Sciences</a></li>
                <li><a href="{{ route('journal.detail', 'computer-science') }}"     target="_blank">Journal of Computer Science</a></li>
                <li><a href="{{ route('journal.detail', 'environmental-studies') }}" target="_blank">Journal of Environmental Studies</a></li>
            </ul>
        </div>
        <div class="sb">
            <div class="sb-hdr">News &amp; Events</div>
            <div class="sb-news">No Active News</div>
        </div>
    </div>

</div>
@endsection
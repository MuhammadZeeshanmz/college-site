@extends('layouts.app')

@section('title', $journal['title'] . ' - GPGC Mansehra')

@push('styles')
<style>
.j-wrap {
    max-width:1200px; margin:28px auto; padding:0 15px;
    display:flex; gap:20px; align-items:flex-start;
}

/* ── Main ── */
.j-main {
    flex:1; background:#fff; border:1px solid #ddd; padding:24px 28px;
}

.j-page-title {
    color:#1a6b8a; font-size:20px; font-weight:700; margin-bottom:4px;
}
.j-section-title {
    color:#1a6b8a; font-size:15px; font-weight:700; margin-bottom:14px;
}

/* Content sections — only active shown */
.cs { display:none; }
.cs.active { display:block; }

.cs p {
    font-size:13.5px; line-height:1.85; text-align:justify;
    color:#333; margin-bottom:10px;
}
.cs p:last-child { margin-bottom:0; }
.cs ul { margin-left:22px; font-size:13.5px; line-height:2.1; color:#333; }

/* ── Journal Banner (ISSN bar) — exactly screenshot 1 ── */
.j-banner {
    background:#1a3a8a; color:#fff;
    padding:14px 22px; margin:14px 0 0;
    display:flex; align-items:center; justify-content:space-between;
    flex-wrap:wrap; gap:10px; border-radius:2px;
}
.j-banner-left { display:flex; align-items:center; gap:18px; }
.j-logo {
    width:66px; height:66px; background:#fff; border-radius:50%;
    display:flex; align-items:center; justify-content:center; flex-shrink:0;
    border:2px solid rgba(255,255,255,.4);
}
.j-logo span { color:#1a3a8a; font-weight:800; font-size:11px; text-align:center; line-height:1.3; }
.j-banner-text h1 {
    font-size:26px; font-weight:900; letter-spacing:2px; text-transform:uppercase; line-height:1;
}
.j-banner-text p { font-size:13px; color:#b8d8f0; margin-top:3px; }
.j-issn {
    background:rgba(255,255,255,.15); padding:6px 14px;
    font-size:14px; font-weight:700; border-radius:3px; white-space:nowrap;
}

/* ── College image block — exactly screenshot 2 ── */
.j-college-img {
    width:100%; max-height:280px; object-fit:cover; display:block; margin-top:0;
}
.j-college-img-ph {
    width:100%; height:260px;
    background:linear-gradient(160deg,#1a3a8a 0%,#1a6b8a 100%);
    display:flex; align-items:flex-end; overflow:hidden;
}
.j-college-caption {
    width:100%; background:#1a3a8a; color:#fff;
    font-size:14px; font-weight:700; padding:14px 20px;
    text-align:center; line-height:1.9; letter-spacing:.02em;
}

/* ── Info table ── */
.it { width:100%; border-collapse:collapse; font-size:13px; margin-top:10px; }
.it th { background:#1a6b8a; color:#fff; padding:9px 12px; text-align:left; }
.it td { padding:8px 12px; border-bottom:1px solid #e5e5e5; }
.it tr:nth-child(even) td { background:#f7f7f7; }

/* ── Editorial board ── */
.bm { padding:11px 0; border-bottom:1px solid #eee; font-size:13.5px; }
.bm:last-child { border-bottom:none; }
.bm strong { color:#1a6b8a; display:block; margin-bottom:2px; }
.bm span { color:#666; font-size:13px; }

/* ── Download list ── */
.dl { list-style:none; margin-top:8px; }
.dl li { padding:8px 0; border-bottom:1px dashed #ddd; font-size:13px; }
.dl li::before { content:'📄 '; }
.dl li a { color:#1a6b8a; text-decoration:none; }
.dl li a:hover { text-decoration:underline; }

/* ── Sidebar ── */
.j-side { width:255px; flex-shrink:0; }
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
    text-decoration:none; transition:background .15s; cursor:pointer;
}
.sb-nav li a::before { content:'▸'; font-size:11px; color:#1a6b8a; flex-shrink:0; }
.sb-nav li a:hover,
.sb-nav li a.active { background:#e8f4f8; color:#0d4f6b; font-weight:700; padding-left:18px; }
.sb-news { padding:14px; font-size:13px; color:#888; }

@media(max-width:768px){
    .j-wrap{flex-direction:column;}
    .j-side{width:100%;}
    .j-banner{flex-direction:column;}
}
</style>
@endpush

@section('content')
<div class="j-wrap">

    {{-- ════ MAIN CONTENT ════ --}}
    <div class="j-main">

        {{-- INTRODUCTION --}}
        <div id="sec-introduction" class="cs active">
            <div class="j-page-title">{{ $journal['title'] }}</div>
            <div class="j-section-title">Introduction</div>

            <p>{{ $journal['intro_1'] }}</p>

            {{-- ISSN Banner — screenshot 1 style --}}
            <div class="j-banner">
                <div class="j-banner-left">
                    <div class="j-logo"><span>GPGC<br>MNS</span></div>
                    <div class="j-banner-text">
                        <h1>{{ $journal['short_name'] }}</h1>
                        <p>{{ $journal['full_name'] }}</p>
                    </div>
                </div>
                <div class="j-issn">ISSN: {{ $journal['issn'] }}</div>
            </div>

            {{-- College image + caption — screenshot 2 style --}}
            <img
                class="j-college-img"
                src="https://images.unsplash.com/photo-1562774053-701939374585?w=760&h=280&fit=crop&crop=top"
                alt="GPGC Mansehra Campus"
            >
            <div class="j-college-caption">
                Published by Govt. Post Graduate College Mansehra (GPGC)<br>
                www.gcmansehra.edu.pk &nbsp;|&nbsp; Email: {{ $journal['email'] }} &nbsp;|&nbsp; Tel: +92-997-530026
            </div>

            <p style="margin-top:14px;">{{ $journal['intro_2'] }}</p>
            <p>{{ $journal['intro_3'] }}</p>
        </div>

        {{-- ABOUT JOURNAL --}}
        <div id="sec-about" class="cs">
            <div class="j-page-title">{{ $journal['title'] }}</div>
            <div class="j-section-title">About Journal</div>
            <p>{{ $journal['about_1'] }}</p>
            <p>{{ $journal['about_2'] }}</p>
            <table class="it" style="margin-top:14px;">
                <tbody>
                    <tr><td><strong>Journal Title</strong></td><td>{{ $journal['title'] }}</td></tr>
                    <tr><td><strong>ISSN</strong></td><td>{{ $journal['issn'] }}</td></tr>
                    <tr><td><strong>Publisher</strong></td><td>Govt. Post Graduate College Mansehra, KPK, Pakistan</td></tr>
                    <tr><td><strong>Frequency</strong></td><td>{{ $journal['frequency'] }}</td></tr>
                    <tr><td><strong>Language</strong></td><td>English</td></tr>
                    <tr><td><strong>Review Process</strong></td><td>Double-Blind Peer Review</td></tr>
                    <tr><td><strong>Start Year</strong></td><td>{{ $journal['start_year'] }}</td></tr>
                    <tr><td><strong>Contact Email</strong></td><td>{{ $journal['email'] }}</td></tr>
                </tbody>
            </table>
        </div>

        {{-- EDITORIAL BOARD --}}
        <div id="sec-editorial" class="cs">
            <div class="j-page-title">{{ $journal['title'] }}</div>
            <div class="j-section-title">Editorial Board</div>
            <p>The editorial board of {{ $journal['title'] }} consists of distinguished academics and researchers from GPGC Mansehra and affiliated institutions.</p>
            @foreach($journal['editorial_board'] as $m)
            <div class="bm">
                <strong>{{ $m['name'] }}</strong>
                <span>{{ $m['role'] }} — {{ $m['affiliation'] }}</span>
            </div>
            @endforeach
        </div>

        {{-- INDEXING --}}
        <div id="sec-indexing" class="cs">
            <div class="j-page-title">{{ $journal['title'] }}</div>
            <div class="j-section-title">Indexing</div>
            <p>{{ $journal['title'] }} is indexed in the following databases and repositories:</p>
            <ul>
                <li>HEC Recognized Journals — Higher Education Commission Pakistan</li>
                <li>Google Scholar</li>
                <li>Pakistan Research Repository (HEC)</li>
                <li>Open Access Journals Directory</li>
                <li>Research4Life</li>
                <li>CrossRef (DOI Registration)</li>
            </ul>
        </div>

        {{-- AUTHORS GUIDELINES --}}
        <div id="sec-guidelines" class="cs">
            <div class="j-page-title">{{ $journal['title'] }}</div>
            <div class="j-section-title">Authors Guidelines</div>
            <p>Authors are invited to submit original research articles, review articles, and case studies. Manuscripts must not have been published or be under consideration for publication elsewhere.</p>
            <p><strong>Manuscript Preparation:</strong></p>
            <ul>
                <li>Manuscripts must be submitted in MS Word format (.doc or .docx).</li>
                <li>Font: Times New Roman, 12pt, double-spaced.</li>
                <li>Paper length: 4,000 – 8,000 words including references.</li>
                <li>Abstract: 150–250 words with 4–6 keywords.</li>
                <li>References must follow APA 7th Edition format.</li>
                <li>Tables and figures must be numbered and titled clearly.</li>
                <li>Authors must declare conflicts of interest and funding sources.</li>
                <li>Plagiarism must not exceed 19% (HEC Policy).</li>
            </ul>
            <p style="margin-top:10px;"><strong>Submission Email:</strong> <a href="mailto:{{ $journal['email'] }}" style="color:#1a6b8a;">{{ $journal['email'] }}</a></p>
        </div>

        {{-- CALL FOR PAPERS --}}
        <div id="sec-cfp" class="cs">
            <div class="j-page-title">{{ $journal['title'] }}</div>
            <div class="j-section-title">Call for Papers</div>
            <p>{{ $journal['title'] }} invites original research papers, review articles, and case studies from academics, researchers, and practitioners in the relevant field.</p>
            <p><strong>Topics of Interest include but are not limited to:</strong></p>
            <ul>
                @foreach($journal['topics'] as $t)
                <li>{{ $t }}</li>
                @endforeach
            </ul>
            <p style="margin-top:12px;"><strong>Submission Deadline:</strong> Rolling submissions accepted year-round.</p>
            <p><strong>Submit to:</strong> <a href="mailto:{{ $journal['email'] }}" style="color:#1a6b8a;">{{ $journal['email'] }}</a></p>
        </div>

        {{-- ARCHIVES --}}
        <div id="sec-archives" class="cs">
            <div class="j-page-title">{{ $journal['title'] }}</div>
            <div class="j-section-title">Archives</div>
            <p>Browse past issues of {{ $journal['title'] }}:</p>
            <table class="it">
                <thead><tr><th>Volume</th><th>Issue</th><th>Year</th><th>Articles</th></tr></thead>
                <tbody>
                    <tr><td>Vol. 1</td><td>Issue 1</td><td>{{ $journal['start_year'] }}</td><td><a href="#" style="color:#1a6b8a;">View</a></td></tr>
                    <tr><td>Vol. 1</td><td>Issue 2</td><td>{{ $journal['start_year'] }}</td><td><a href="#" style="color:#1a6b8a;">View</a></td></tr>
                    <tr><td>Vol. 2</td><td>Issue 1</td><td>{{ (int)$journal['start_year']+1 }}</td><td><a href="#" style="color:#1a6b8a;">View</a></td></tr>
                    <tr><td>Vol. 2</td><td>Issue 2</td><td>{{ (int)$journal['start_year']+1 }}</td><td><a href="#" style="color:#1a6b8a;">View</a></td></tr>
                </tbody>
            </table>
        </div>

        {{-- CONTACT US --}}
        <div id="sec-contact" class="cs">
            <div class="j-page-title">{{ $journal['title'] }}</div>
            <div class="j-section-title">Contact Us</div>
            <table class="it">
                <tbody>
                    <tr><td><strong>Journal</strong></td><td>{{ $journal['title'] }}</td></tr>
                    <tr><td><strong>Publisher</strong></td><td>Govt. Post Graduate College Mansehra</td></tr>
                    <tr><td><strong>Address</strong></td><td>Mansehra, Khyber Pakhtunkhwa, Pakistan</td></tr>
                    <tr><td><strong>Phone</strong></td><td>+92-997-530026</td></tr>
                    <tr><td><strong>Email</strong></td><td><a href="mailto:{{ $journal['email'] }}" style="color:#1a6b8a;">{{ $journal['email'] }}</a></td></tr>
                    <tr><td><strong>Website</strong></td><td><a href="http://www.gcmansehra.edu.pk" target="_blank" style="color:#1a6b8a;">www.gcmansehra.edu.pk</a></td></tr>
                </tbody>
            </table>
        </div>

        {{-- DOWNLOADS --}}
        <div id="sec-downloads" class="cs">
            <div class="j-page-title">{{ $journal['title'] }}</div>
            <div class="j-section-title">Downloads</div>
            <p>The following documents are available for download:</p>
            <ul class="dl">
                <li><a href="#">Author Guidelines (PDF)</a></li>
                <li><a href="#">Manuscript Template (MS Word)</a></li>
                <li><a href="#">Copyright Transfer Form</a></li>
                <li><a href="#">Reviewer Evaluation Form</a></li>
                <li><a href="#">Publication Ethics Policy</a></li>
                <li><a href="#">Sample Published Article</a></li>
            </ul>
        </div>

        {{-- AIMS AND SCOPE --}}
        <div id="sec-aims" class="cs">
            <div class="j-page-title">{{ $journal['title'] }}</div>
            <div class="j-section-title">Aims and Scope</div>
            <p>{{ $journal['title'] }} aims to provide a high-quality peer-reviewed platform for original research contributing to the advancement of knowledge in {{ $journal['discipline'] }}.</p>
            <p>The journal welcomes submissions from academics, practitioners, and researchers from Pakistan and internationally. It is committed to open access, academic integrity, and the promotion of research culture at GPGC Mansehra.</p>
            <p><strong>Scope includes:</strong></p>
            <ul>
                @foreach($journal['topics'] as $t)
                <li>{{ $t }}</li>
                @endforeach
            </ul>
        </div>

    </div>{{-- end j-main --}}

    {{-- ════ SIDEBAR ════ --}}
    <div class="j-side">

        <div class="sb">
            <div class="sb-hdr">Important Links ({{ $journal['short_name'] }})</div>
            <ul class="sb-nav">
                <li><a href="#" onclick="show('introduction')" id="lnk-introduction" class="active">Introduction</a></li>
                <li><a href="#" onclick="show('about')"        id="lnk-about">About Journal</a></li>
                <li><a href="#" onclick="show('editorial')"    id="lnk-editorial">Editorial Board</a></li>
                <li><a href="#" onclick="show('indexing')"     id="lnk-indexing">Indexing</a></li>
                <li><a href="#" onclick="show('guidelines')"   id="lnk-guidelines">Authors Guidelines</a></li>
                <li><a href="#" onclick="show('cfp')"          id="lnk-cfp">Call for Papers</a></li>
                <li><a href="#" onclick="show('archives')"     id="lnk-archives">Archives</a></li>
                <li><a href="#" onclick="show('contact')"      id="lnk-contact">Contact Us</a></li>
                <li><a href="#" onclick="show('downloads')"    id="lnk-downloads">Downloads</a></li>
                <li><a href="#" onclick="show('aims')"         id="lnk-aims">Aims and Scope</a></li>
            </ul>
        </div>

        <div class="sb">
            <div class="sb-hdr">News &amp; Events ({{ $journal['short_name'] }})</div>
            <div class="sb-news">No Active News</div>
        </div>

    </div>

</div>
@endsection

@push('scripts')
<script>
function show(name) {
    event.preventDefault();
    document.querySelectorAll('.cs').forEach(el => el.classList.remove('active'));
    document.querySelectorAll('.sb-nav li a').forEach(el => el.classList.remove('active'));
    var s = document.getElementById('sec-' + name);
    if (s) s.classList.add('active');
    var l = document.getElementById('lnk-' + name);
    if (l) l.classList.add('active');
    document.querySelector('.j-main').scrollIntoView({ behavior:'smooth', block:'start' });
}
</script>
@endpush
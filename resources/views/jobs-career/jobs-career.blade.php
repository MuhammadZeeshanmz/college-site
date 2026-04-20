@extends('layouts.app')

@section('title', 'Jobs & Career - GPGC Mansehra')

@push('styles')
<style>
/* ── Hide layout header/nav/footer ── */
.uoh-topbar,
.uoh-logobar,
.uoh-nav,
.uoh-footer {
    display: none !important;
}
main {
    padding: 0 !important;
    margin: 0 !important;
}
body {
    background: #fff !important;
    font-family: Arial, sans-serif !important;
}

/* ── Portal Header ── */
.portal-header {
    background: #1a7a7a;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 30px;
    min-height: 64px;
}
.portal-brand {
    display: flex;
    align-items: center;
    gap: 14px;
}
.portal-logo {
    width: 52px; height: 52px;
    border-radius: 50%;
    background: #fff;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0; overflow: hidden; padding: 3px;
}
.portal-logo img {
    width: 46px; height: 46px;
    object-fit: contain; border-radius: 50%;
}
.portal-logo-ph {
    width: 46px; height: 46px;
    background: #1a3a6c; border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    color: #fff; font-size: 12px; font-weight: 700;
    text-align: center; line-height: 1.2;
}
.portal-header h1 {
    color: #fff;
    font-size: 21px;
    font-weight: bold;
    letter-spacing: 0.2px;
    font-family: Arial, sans-serif;
}
.advert-link {
    color: #fff;
    font-size: 14px;
    text-decoration: none;
    cursor: pointer;
    white-space: nowrap;
    font-family: Arial, sans-serif;
}
.advert-link:hover { text-decoration: underline; }

/* ── Portal Body ── */
.portal-body {
    max-width: 1250px;
    margin: 34px auto;
    padding: 0 24px 50px;
    font-family: Arial, sans-serif;
    font-size: 14px;
    color: #333;
}
.welcome-title {
    font-size: 22px;
    font-weight: normal;
    color: #333;
    margin-bottom: 26px;
    font-family: Arial, sans-serif;
}

/* ── Job Card ── */
.job-card {
    border: 1px solid #bbb;
    border-radius: 3px;
    margin-bottom: 30px;
    padding: 16px 20px 20px;
}
.job-card-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 14px;
    flex-wrap: wrap;
    gap: 4px;
}
.job-title-main {
    font-size: 15px;
    font-weight: normal;
    color: #333;
    font-family: Arial, sans-serif;
}
.posted-date {
    font-size: 14px;
    color: #333;
    white-space: nowrap;
    font-family: Arial, sans-serif;
}

/* ── Jobs Table ── */
.jobs-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 13.5px;
    margin-bottom: 0;
    font-family: Arial, sans-serif;
}
.jobs-table thead tr { background: #e0e0e0; }
.jobs-table th {
    padding: 9px 14px;
    text-align: left;
    font-weight: bold;
    border: 1px solid #bbb;
    color: #333;
}
.jobs-table th:first-child { width: 55px; }
.jobs-table th:last-child,
.jobs-table td:last-child {
    text-align: center;
    width: 120px;
}
.jobs-table td {
    padding: 9px 14px;
    border: 1px solid #ccc;
    color: #333;
}
.jobs-table tbody tr:hover td { background: #f9f9f9; }
.detail-link {
    color: #1a6b8a;
    text-decoration: none;
    font-size: 13.5px;
}
.detail-link:hover { text-decoration: underline; }

/* ── Job Detail ── */
.job-detail-section {
    display: none;
    padding-top: 18px;
}
.job-detail-section.active { display: block; }

.download-advert-line {
    font-size: 13.5px;
    color: #333;
    margin-bottom: 10px;
    line-height: 1.9;
    font-family: Arial, sans-serif;
}
.download-advert-line a {
    color: #1a6b8a;
    text-decoration: none;
    display: block;
}
.download-advert-line a:hover { text-decoration: underline; }

.job-detail-heading {
    font-size: 13.5px;
    font-weight: bold;
    color: #111;
    margin: 10px 0 10px;
    line-height: 1.6;
    font-family: Arial, sans-serif;
}

.job-detail-intro {
    font-size: 13.5px;
    line-height: 1.85;
    color: #333;
    margin-bottom: 14px;
    font-family: Arial, sans-serif;
}

/* Section headings — large light weight exactly like screenshot */
.job-section-title {
    font-size: 20px;
    font-weight: normal;
    color: #222;
    margin: 20px 0 10px;
    font-family: Arial, sans-serif;
}

/* Bullet list */
.job-detail-list {
    margin-left: 28px;
    font-size: 13.5px;
    line-height: 2;
    color: #333;
    font-family: Arial, sans-serif;
}
.job-detail-list li { margin-bottom: 2px; }
.job-detail-list.numbered { list-style: decimal; }

/* PI section */
.pi-name {
    font-size: 13.5px;
    font-weight: bold;
    color: #333;
    margin: 6px 0 4px;
    font-family: Arial, sans-serif;
}
.pi-info {
    font-size: 13.5px;
    color: #333;
    line-height: 2;
    font-family: Arial, sans-serif;
}
.pi-info a { color: #1a6b8a; text-decoration: none; }
.pi-info a:hover { text-decoration: underline; }

/* ── Portal Footer ── */
.portal-footer {
    background: #1a7a7a;
    color: #fff;
    text-align: center;
    padding: 16px;
    font-size: 13.5px;
    font-family: Arial, sans-serif;
}

@media(max-width:768px){
    .job-card-header { flex-direction: column; }
    .portal-header h1 { font-size: 15px; }
    .portal-header { padding: 10px 14px; }
    .portal-body { padding: 0 14px 40px; }
}
</style>
@endpush

@section('content')

{{-- ══ PORTAL HEADER ══ --}}
<div class="portal-header">
    <div class="portal-brand">
        <div class="portal-logo">
            <img src="{{ asset('images/logo.png') }}"
                 alt="GPGC"
                 onerror="this.parentNode.innerHTML='<div class=\'portal-logo-ph\'>GCM</div>'">
        </div>
        <h1>GPGC Mansehra &mdash; Job Portal System</h1>
    </div>
    <a class="advert-link"
       href="#ads-section"
       onclick="document.getElementById('ads-section').scrollIntoView({behavior:'smooth'});return false;">
        Advertisement
    </a>
</div>

{{-- ══ PORTAL BODY ══ --}}
<div class="portal-body" id="ads-section">

    <h2 class="welcome-title">Welcome to GPGC Mansehra Job Portal</h2>

    {{-- ─── JOB CARD 1 ─── --}}
    <div class="job-card">
        <div class="job-card-header">
            <span class="job-title-main">Positions Vacant &mdash; GPGC Mansehra (Research Project # 2025-ENV-01)</span>
            <span class="posted-date">(Posted On: 15 Apr 2026)</span>
        </div>

        <table class="jobs-table">
            <thead>
                <tr>
                    <th>Sr#</th>
                    <th>Job Title</th>
                    <th>View</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Research Assistant (Contract Basis)</td>
                    <td>
                        <a href="#" class="detail-link"
                           onclick="toggleDetail('detail-job-1', this); return false;">Detail</a>
                    </td>
                </tr>
            </tbody>
        </table>

        <div id="detail-job-1" class="job-detail-section">
            <p class="download-advert-line">
                Complete Advertisement can also be downloaded from following link:<br>
                <a href="#">Download Advertisement</a>
            </p>
            <p class="job-detail-heading">
                Research Assistant required for HEC Funded Project (2025-ENV-01) in the Department of Environmental Sciences
            </p>
            <p class="job-detail-intro">
                Applications are invited from Pakistani nationals on purely contract basis for the following posts in the
                HEC funded project (2025-ENV-01) entitled
                <strong>&ldquo;Environmental Impact Assessment and Biodiversity Conservation in Hazara Region&rdquo;</strong>
                with following eligibility criteria and preferred experience.
            </p>

            <h3 class="job-section-title">Key Responsibilities:</h3>
            <ul class="job-detail-list">
                <li>Conduct field surveys and collect environmental data in Hazara region</li>
                <li>Perform laboratory analysis and data processing</li>
                <li>Assist in preparation of research reports and publications</li>
                <li>Coordinate with project team and maintain research records</li>
                <li>Support Principal Investigator in project activities</li>
            </ul>

            <h3 class="job-section-title">Eligibility Criteria:</h3>
            <ul class="job-detail-list">
                <li>M.Sc. / BS (4-year) in Environmental Sciences, Botany, Zoology or related field</li>
                <li>Minimum 2nd Division or CGPA 2.5/4.0</li>
                <li>Experience in field research will be preferred</li>
                <li>Strong written and verbal communication skills in English and Urdu</li>
            </ul>

            <h3 class="job-section-title">Terms and Conditions:</h3>
            <ol class="job-detail-list numbered">
                <li>He/She will be required to sign an agreement for one year extendable to end of the project.</li>
                <li>Submit application on plain paper along with attached CV and attested photocopy of degree, domicile, CNIC, experience certificate and one photograph must be attached.</li>
                <li>Incomplete applications will not be entertained.</li>
                <li>Applications complete in all aspects should reach the following address up to <strong>30th April, 2026</strong>.</li>
                <li>Only short-listed candidates will be called for interview.</li>
                <li>No TA/DA for the interview will be admissible.</li>
            </ol>

            <h3 class="job-section-title">PI of the Project</h3>
            <p class="pi-name">Dr. [PI Name]</p>
            <p class="pi-info">
                Assistant Professor,<br>
                Department of Environmental Sciences,<br>
                Govt. Post Graduate College Mansehra<br>
                Email: <a href="mailto:envsciences@gcmansehra.edu.pk">envsciences@gcmansehra.edu.pk</a>
            </p>
        </div>
    </div>{{-- end job-card 1 --}}

    {{-- ─── JOB CARD 2 ─── --}}
    <div class="job-card">
        <div class="job-card-header">
            <span class="job-title-main">Positions Vacant &mdash; GPGC Mansehra (Teaching Faculty &mdash; Temporary)</span>
            <span class="posted-date">(Posted On: 10 Apr 2026)</span>
        </div>

        <table class="jobs-table">
            <thead>
                <tr>
                    <th>Sr#</th>
                    <th>Job Title</th>
                    <th>View</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Visiting Lecturer &mdash; Computer Science</td>
                    <td>
                        <a href="#" class="detail-link"
                           onclick="toggleDetail('detail-job-2a', this); return false;">Detail</a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Visiting Lecturer &mdash; Mathematics</td>
                    <td>
                        <a href="#" class="detail-link"
                           onclick="toggleDetail('detail-job-2b', this); return false;">Detail</a>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Visiting Lecturer &mdash; English</td>
                    <td>
                        <a href="#" class="detail-link"
                           onclick="toggleDetail('detail-job-2c', this); return false;">Detail</a>
                    </td>
                </tr>
            </tbody>
        </table>

        {{-- 2a --}}
        <div id="detail-job-2a" class="job-detail-section">
            <p class="download-advert-line">
                Complete Advertisement can also be downloaded from following link:<br>
                <a href="#">Download Advertisement</a>
            </p>
            <p class="job-detail-heading">Visiting Lecturer required in the Department of Computer Science</p>
            <p class="job-detail-intro">
                Applications are invited from qualified Pakistani nationals for the post of
                <strong>Visiting Lecturer in Computer Science</strong> at Govt. Post Graduate College Mansehra on
                purely temporary/contract basis for the academic session 2025-26.
            </p>
            <h3 class="job-section-title">Eligibility Criteria:</h3>
            <ul class="job-detail-list">
                <li>M.Sc. / MS / MCS / BS (4-year) in Computer Science or Software Engineering</li>
                <li>Minimum 2nd Division or CGPA 2.5/4.0</li>
                <li>NET / GAT qualified will be preferred</li>
                <li>Experience of teaching at college or university level will be preferred</li>
            </ul>
            <h3 class="job-section-title">Terms and Conditions:</h3>
            <ol class="job-detail-list numbered">
                <li>Appointment will be on purely temporary/visiting basis.</li>
                <li>Submit CV with attested copies of degrees, CNIC, domicile, and one photograph.</li>
                <li>Incomplete applications will not be considered.</li>
                <li>Applications must reach by <strong>30th April, 2026</strong>.</li>
                <li>Only short-listed candidates will be called for interview.</li>
                <li>No TA/DA will be admissible for the interview.</li>
            </ol>
            <h3 class="job-section-title">Contact</h3>
            <p class="pi-name">The Principal</p>
            <p class="pi-info">
                Govt. Post Graduate College Mansehra,<br>
                Mansehra, Khyber Pakhtunkhwa<br>
                Phone: +92-997-530026<br>
                Email: <a href="mailto:principal@gcmansehra.edu.pk">principal@gcmansehra.edu.pk</a>
            </p>
        </div>

        {{-- 2b --}}
        <div id="detail-job-2b" class="job-detail-section">
            <p class="download-advert-line">
                Complete Advertisement can also be downloaded from following link:<br>
                <a href="#">Download Advertisement</a>
            </p>
            <p class="job-detail-heading">Visiting Lecturer required in the Department of Mathematics</p>
            <p class="job-detail-intro">
                Applications are invited from qualified Pakistani nationals for the post of
                <strong>Visiting Lecturer in Mathematics</strong> at Govt. Post Graduate College Mansehra on
                purely temporary/contract basis for the academic session 2025-26.
            </p>
            <h3 class="job-section-title">Eligibility Criteria:</h3>
            <ul class="job-detail-list">
                <li>M.Sc. / MS / BS (4-year) in Mathematics or Applied Mathematics</li>
                <li>Minimum 2nd Division or CGPA 2.5/4.0</li>
                <li>NET / GAT qualified will be preferred</li>
                <li>Experience of teaching at college or university level will be preferred</li>
            </ul>
            <h3 class="job-section-title">Terms and Conditions:</h3>
            <ol class="job-detail-list numbered">
                <li>Appointment will be on purely temporary/visiting basis.</li>
                <li>Submit CV with attested copies of degrees, CNIC, domicile, and one photograph.</li>
                <li>Incomplete applications will not be considered.</li>
                <li>Applications must reach by <strong>30th April, 2026</strong>.</li>
                <li>Only short-listed candidates will be called for interview.</li>
                <li>No TA/DA will be admissible for the interview.</li>
            </ol>
            <h3 class="job-section-title">Contact</h3>
            <p class="pi-name">The Principal</p>
            <p class="pi-info">
                Govt. Post Graduate College Mansehra,<br>
                Mansehra, Khyber Pakhtunkhwa<br>
                Phone: +92-997-530026<br>
                Email: <a href="mailto:principal@gcmansehra.edu.pk">principal@gcmansehra.edu.pk</a>
            </p>
        </div>

        {{-- 2c --}}
        <div id="detail-job-2c" class="job-detail-section">
            <p class="download-advert-line">
                Complete Advertisement can also be downloaded from following link:<br>
                <a href="#">Download Advertisement</a>
            </p>
            <p class="job-detail-heading">Visiting Lecturer required in the Department of English</p>
            <p class="job-detail-intro">
                Applications are invited from qualified Pakistani nationals for the post of
                <strong>Visiting Lecturer in English</strong> at Govt. Post Graduate College Mansehra on
                purely temporary/contract basis for the academic session 2025-26.
            </p>
            <h3 class="job-section-title">Eligibility Criteria:</h3>
            <ul class="job-detail-list">
                <li>M.A. / MS / BS (4-year) in English Literature or Applied Linguistics</li>
                <li>Minimum 2nd Division or CGPA 2.5/4.0</li>
                <li>NET / GAT qualified will be preferred</li>
                <li>Experience of teaching at college or university level will be preferred</li>
            </ul>
            <h3 class="job-section-title">Terms and Conditions:</h3>
            <ol class="job-detail-list numbered">
                <li>Appointment will be on purely temporary/visiting basis.</li>
                <li>Submit CV with attested copies of degrees, CNIC, domicile, and one photograph.</li>
                <li>Incomplete applications will not be considered.</li>
                <li>Applications must reach by <strong>30th April, 2026</strong>.</li>
                <li>Only short-listed candidates will be called for interview.</li>
                <li>No TA/DA will be admissible for the interview.</li>
            </ol>
            <h3 class="job-section-title">Contact</h3>
            <p class="pi-name">The Principal</p>
            <p class="pi-info">
                Govt. Post Graduate College Mansehra,<br>
                Mansehra, Khyber Pakhtunkhwa<br>
                Phone: +92-997-530026<br>
                Email: <a href="mailto:principal@gcmansehra.edu.pk">principal@gcmansehra.edu.pk</a>
            </p>
        </div>

    </div>{{-- end job-card 2 --}}

</div>{{-- end portal-body --}}

{{-- ══ PORTAL FOOTER ══ --}}
<div class="portal-footer">
    Copyright &copy; 2024-25 Govt. Post Graduate College Mansehra, All Rights Reserved.
</div>

@endsection

@push('scripts')
<script>
function toggleDetail(id, linkEl) {
    var el = document.getElementById(id);
    if (!el) return;

    var isOpen = el.classList.contains('active');

    // Close all details in same card
    var card = linkEl.closest('.job-card');
    card.querySelectorAll('.job-detail-section').forEach(function(d) {
        d.classList.remove('active');
    });
    card.querySelectorAll('.detail-link').forEach(function(l) {
        l.textContent = 'Detail';
    });

    // Toggle clicked one
    if (!isOpen) {
        el.classList.add('active');
        linkEl.textContent = 'Close';
        setTimeout(function(){
            el.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }, 50);
    }
}
</script>
@endpush
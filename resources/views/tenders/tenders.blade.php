@extends('layouts.app')

@section('title', 'Tenders - GPGC Mansehra')

@section('content')
<style>
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 14px; color: #333; }

    .page-wrapper {
        max-width: 1200px;
        margin: 30px auto;
        padding: 0 15px;
        display: flex;
        gap: 30px;
        align-items: flex-start;
    }

    /* ===== MAIN CONTENT ===== */
    .main-content { flex: 1; min-width: 0; }

    .main-title {
        font-size: 22px;
        font-weight: 700;
        color: #1a6fa8;
        margin-bottom: 15px;
    }

    /* Section Header (New Tenders / Archived Tenders) */
    .section-hdr {
        background: #1a6fa8;
        color: #fff;
        padding: 10px 15px;
        font-size: 14px;
        font-weight: 700;
        margin-bottom: 0;
    }

    /* Tender row */
    .tender-table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #ddd;
        margin-bottom: 20px;
    }
    .tender-table tr {
        border-bottom: 1px solid #eee;
        transition: background .15s;
    }
    .tender-table tr:last-child { border-bottom: none; }
    .tender-table tr:hover { background: #f0f7ff; }
    .tender-table td {
        padding: 9px 14px;
        vertical-align: middle;
        font-size: 13.5px;
        color: #333;
    }
    .tender-table td:first-child { width: 32px; text-align: center; }
    .tender-table td:last-child { width: 100px; text-align: right; white-space: nowrap; }

    .tender-icon { font-size: 20px; color: #1a6fa8; }
    .view-link { color: #1a6fa8; text-decoration: none; font-size: 13px; font-weight: 600; }
    .view-link:hover { text-decoration: underline; }

    /* Archived section toggle */
    .archived-toggle {
        width: 100%;
        border: none;
        background: #1a6fa8;
        color: #fff;
        padding: 10px 15px;
        font-size: 14px;
        font-weight: 700;
        text-align: left;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-family: inherit;
        margin-bottom: 0;
    }
    .archived-toggle .arr { font-size: 11px; transition: transform .2s; }
    .archived-toggle.open .arr { transform: rotate(180deg); }

    .archived-body { display: none; }
    .archived-body.show { display: block; }

    /* ===== SIDEBAR ===== */
    .sidebar { width: 270px; flex-shrink: 0; }

    .sidebar-box { border: 1px solid #ddd; margin-bottom: 20px; }

    .sidebar-box-header {
        background-color: #1a6fa8;
        color: #fff;
        text-align: center;
        padding: 10px 15px;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 0.5px;
        text-transform: uppercase;
    }

    .sidebar-links { list-style: none; padding: 0; margin: 0; }
    .sidebar-links li { border-bottom: 1px dashed #ccc; }
    .sidebar-links li:last-child { border-bottom: none; }
    .sidebar-links li a {
        display: block; padding: 9px 12px;
        color: #1a6fa8; text-decoration: none; font-size: 13px;
    }
    .sidebar-links li a::before { content: '▶ '; font-size: 10px; }
    .sidebar-links li a:hover { background-color: #f0f7ff; }

    /* News */
    .news-item { padding: 9px 12px; border-bottom: 1px dashed #ccc; }
    .news-item:last-child { border-bottom: none; }
    .news-item a { display: block; color: #1a6fa8; text-decoration: none; font-size: 12.5px; line-height: 1.5; }
    .news-item a::before { content: '▶ '; font-size: 10px; }
    .news-item a:hover { text-decoration: underline; }
    .news-item .badge-new {
        display: inline-block; background: orange; color: #fff;
        font-size: 10px; font-weight: bold; padding: 1px 5px;
        border-radius: 2px; margin-left: 4px; vertical-align: middle;
    }
    .news-item .news-date { font-size: 11px; color: #888; margin-top: 3px; display: block; }
</style>

<div class="page-wrapper">

    <!-- ===== MAIN CONTENT ===== -->
    <div class="main-content">
        <div class="main-title">All Tenders (GPGC Mansehra)</div>

        {{-- ── NEW TENDERS ── --}}
        <div class="section-hdr">New Tenders</div>
        <table class="tender-table">
            <tbody>
                {{--
                    Add new tenders here.
                    Format:
                    <tr>
                        <td><span class="tender-icon">🔵</span></td>
                        <td>Tender Notice: GPGCM/ADV/XX-2026</td>
                        <td><a href="{{ asset('storage/tenders/filename.pdf') }}" class="view-link" target="_blank">View Here</a></td>
                    </tr>
                --}}
                <tr>
                    <td><span class="tender-icon">🔵</span></td>
                    <td>Tender Notice: GPGCM/ADV/01-2026</td>
                    <td><a href="#" class="view-link">View Here</a></td>
                </tr>
            </tbody>
        </table>

        {{-- ── ARCHIVED TENDERS ── --}}
        <button class="archived-toggle" id="archivedBtn">
            <span>Archived Tenders</span>
            <span class="arr">▼</span>
        </button>
        <div class="archived-body" id="archivedBody">
            <table class="tender-table">
                <tbody>
                    {{--
                        Add archived tenders here.
                        Purane tenders yahan move kar dein.
                    --}}
                    <tr>
                        <td><span class="tender-icon">🔵</span></td>
                        <td>Tender Notice: GPGCM/ADV/15-2025</td>
                        <td><a href="#" class="view-link">View Here</a></td>
                    </tr>
                    <tr>
                        <td><span class="tender-icon">🔵</span></td>
                        <td>Tender Notice: GPGCM/ADV/14-2025</td>
                        <td><a href="#" class="view-link">View Here</a></td>
                    </tr>
                    <tr>
                        <td><span class="tender-icon">🔵</span></td>
                        <td>Tender Notice: GPGCM/ADV/13-2025</td>
                        <td><a href="#" class="view-link">View Here</a></td>
                    </tr>
                    <tr>
                        <td><span class="tender-icon">🔵</span></td>
                        <td>Tender Notice: GPGCM/ADV/12-2025 (Corrigendum)</td>
                        <td><a href="#" class="view-link">View Here</a></td>
                    </tr>
                    <tr>
                        <td><span class="tender-icon">🔵</span></td>
                        <td>Tender Notice: GPGCM/ADV/11-2025</td>
                        <td><a href="#" class="view-link">View Here</a></td>
                    </tr>
                    <tr>
                        <td><span class="tender-icon">🔵</span></td>
                        <td>Tender Notice: GPGCM/ADV/10-2025</td>
                        <td><a href="#" class="view-link">View Here</a></td>
                    </tr>
                    <tr>
                        <td><span class="tender-icon">🔵</span></td>
                        <td>Auction Notice — Different Unusable Items</td>
                        <td><a href="#" class="view-link">View Here</a></td>
                    </tr>
                    <tr>
                        <td><span class="tender-icon">🔵</span></td>
                        <td>Tender Notice: GPGCM/ADV/09-2025</td>
                        <td><a href="#" class="view-link">View Here</a></td>
                    </tr>
                    <tr>
                        <td><span class="tender-icon">🔵</span></td>
                        <td>Tender Notice: GPGCM/ADV/08-2025</td>
                        <td><a href="#" class="view-link">View Here</a></td>
                    </tr>
                    <tr>
                        <td><span class="tender-icon">🔵</span></td>
                        <td>Auction Notice (January 29, 2025)</td>
                        <td><a href="#" class="view-link">View Here</a></td>
                    </tr>
                    <tr>
                        <td><span class="tender-icon">🔵</span></td>
                        <td>Tender Notice: GPGCM/ADV/07-2025</td>
                        <td><a href="#" class="view-link">View Here</a></td>
                    </tr>
                    <tr>
                        <td><span class="tender-icon">🔵</span></td>
                        <td>Tender Notice: GPGCM/ADV/06-2025</td>
                        <td><a href="#" class="view-link">View Here</a></td>
                    </tr>
                    <tr>
                        <td><span class="tender-icon">🔵</span></td>
                        <td>Tender Advertisement No. GPGCM/ADV/05-2024</td>
                        <td><a href="#" class="view-link">View Here</a></td>
                    </tr>
                    <tr>
                        <td><span class="tender-icon">🔵</span></td>
                        <td>Tender Advertisement No. GPGCM/ADV/04-2024</td>
                        <td><a href="#" class="view-link">View Here</a></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>{{-- end main-content --}}

    <!-- ===== SIDEBAR ===== -->
    <div class="sidebar">

        <div class="sidebar-box">
            <div class="sidebar-box-header">NEWS &amp; EVENTS</div>
            <div class="news-item">
                <a href="#">Admissions Open for BS Programs Session 2026 <span class="badge-new">New</span></a>
                <span class="news-date">12 Apr 2026</span>
            </div>
            <div class="news-item">
                <a href="#">GPGC Mansehra Annual Prize Distribution Ceremony <span class="badge-new">New</span></a>
                <span class="news-date">08 Apr 2026</span>
            </div>
            <div class="news-item">
                <a href="#">Hostel Admissions Open for Fall 2026 <span class="badge-new">New</span></a>
                <span class="news-date">01 Apr 2026</span>
            </div>
            <div class="news-item">
                <a href="#">Transport Registration Open — Fall 2026</a>
                <span class="news-date">28 Mar 2026</span>
            </div>
            <div class="news-item">
                <a href="#">Result Gazette 2025 — Now Available for Download</a>
                <span class="news-date">15 Mar 2026</span>
            </div>
            <div class="news-item">
                <a href="#">Tender Notice GPGCM/ADV/01-2026 Published</a>
                <span class="news-date">01 Mar 2026</span>
            </div>
        </div>

        <div class="sidebar-box">
            <div class="sidebar-box-header">IMPORTANT LINKS</div>
            <ul class="sidebar-links">
                <li><a href="#">QEC</a></li>
                <li><a href="#">ORIC</a></li>
                <li><a href="#">Career Development Center</a></li>
                <li><a href="#">University Advancement Cell</a></li>
                <li><a href="https://www.biseatd.edu.pk" target="_blank">BISE Abbottabad</a></li>
                <li><a href="https://www.uoh.edu.pk" target="_blank">University of Hazara</a></li>
                <li><a href="https://hed.gkp.pk" target="_blank">HED Khyber Pakhtunkhwa</a></li>
                <li><a href="https://www.hec.gov.pk" target="_blank">HEC Pakistan</a></li>
            </ul>
        </div>

    </div>{{-- end sidebar --}}

</div>

<script>
// Archived Tenders toggle
document.getElementById('archivedBtn').addEventListener('click', function() {
    var body = document.getElementById('archivedBody');
    var isOpen = body.classList.contains('show');
    if (isOpen) {
        body.classList.remove('show');
        this.classList.remove('open');
    } else {
        body.classList.add('show');
        this.classList.add('open');
    }
});
</script>

@endsection
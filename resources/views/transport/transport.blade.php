@extends('layouts.app')
@section('title', 'Transport Facility - GPGC Mansehra')
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

    .main-content { flex: 1; min-width: 0; }

    .main-title {
        font-size: 22px;
        font-weight: 700;
        color: #1a6fa8;
        margin-bottom: 8px;
    }

    .intro-link {
        display: block;
        color: #1a6fa8;
        text-decoration: underline;
        font-size: 13.5px;
        margin-bottom: 12px;
    }

    .content-text {
        font-size: 14px;
        line-height: 1.8;
        color: #333;
        margin-bottom: 14px;
    }

    /* Transport table - bilkul UOH screenshot jaisa */
    .transport-table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #ccc;
        margin-top: 12px;
    }
    .transport-table th {
        background: #fff;
        border: 1px solid #ccc;
        padding: 9px 12px;
        text-align: center;
        font-size: 13.5px;
        font-weight: 700;
        color: #222;
    }
    .transport-table th:nth-child(2) { text-align: left; }
    .transport-table td {
        border: 1px solid #ccc;
        padding: 8px 12px;
        font-size: 13.5px;
        color: #333;
        text-align: center;
        vertical-align: middle;
    }
    .transport-table td:nth-child(2) { text-align: left; }
    .transport-table tr:nth-child(even) { background: #fafafa; }
    .transport-table tr:hover { background: #f0f7ff; }

    /* Route sub-header row */
    .route-header td {
        background: #f0f0f0;
        font-weight: 700;
        text-align: center !important;
        font-size: 13.5px;
        color: #222;
    }

    /* ===== SIDEBAR ===== */
    .sidebar { width: 270px; flex-shrink: 0; }
    .sidebar-box { border: 1px solid #ddd; margin-bottom: 20px; }
    .sidebar-box-header {
        background-color: #1a6fa8; color: #fff; text-align: center;
        padding: 10px 15px; font-size: 13px; font-weight: 700;
        letter-spacing: 0.5px; text-transform: uppercase;
    }

    /* Scrolling news */
    .news-scroll-wrap { height: 260px; overflow: hidden; position: relative; }
    .news-scroll-wrap::after { content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 30px; background: linear-gradient(transparent, #fff); pointer-events: none; }
    .news-scroll-inner { animation: newsUp 25s linear infinite; }
    .news-scroll-inner:hover { animation-play-state: paused; }
    @keyframes newsUp { 0%{transform:translateY(0);}100%{transform:translateY(-50%);} }

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

    .sidebar-links { list-style: none; padding: 0; margin: 0; }
    .sidebar-links li { border-bottom: 1px dashed #ccc; }
    .sidebar-links li:last-child { border-bottom: none; }
    .sidebar-links li a {
        display: block; padding: 9px 12px;
        color: #1a6fa8; text-decoration: none; font-size: 13px;
    }
    .sidebar-links li a::before { content: '▶ '; font-size: 10px; }
    .sidebar-links li a:hover { background-color: #f0f7ff; }
</style>

<div class="page-wrapper">

    <!-- ===== MAIN CONTENT ===== -->
    <div class="main-content">

        <h2 class="main-title">Transport Facility</h2>
        <a href="#" class="intro-link">GPGC Mansehra Bus Routes/Stops (Public/Private)</a>
        <p class="content-text">Transport facility is available for the below mentioned cities:</p>

        <table class="transport-table">
            <thead>
                <tr>
                    <th style="width:60px;">S.No</th>
                    <th>Name of Route/Stop</th>
                    <th>Tentative Fee/Charges per Semester</th>
                    <th>Remarks</th>
                </tr>
            </thead>
            <tbody>

                {{-- Row 1: Abbottabad --}}
                <tr>
                    <td>1.</td>
                    <td>Abbottabad</td>
                    <td>25,770/-</td>
                    <td>Functional</td>
                </tr>

                {{-- Route: Havelian --}}
                <tr class="route-header"><td colspan="4">Havelian Route</td></tr>
                <tr>
                    <td rowspan="5">2.</td>
                    <td>Lora Chowk</td>
                    <td>12,080/-</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Kholian Bala</td>
                    <td>12,080/-</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Bhaldher</td>
                    <td>12,080/-</td>
                    <td>Functional</td>
                </tr>
                <tr>
                    <td>Havelian</td>
                    <td>16,110/-</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Sultanpur</td>
                    <td>16,110/-</td>
                    <td></td>
                </tr>

                {{-- Route: Hassanabdal --}}
                <tr class="route-header"><td colspan="4">Hassanabdal Route</td></tr>
                <tr>
                    <td rowspan="11">3.</td>
                    <td>Panian</td>
                    <td>9,670/-</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Sarai Gadai</td>
                    <td>12,080/-</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Jhari Kass</td>
                    <td>12,080/-</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Tube Well</td>
                    <td>12,080/-</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Lab Meel</td>
                    <td>22,550/-</td>
                    <td>Functional</td>
                </tr>
                <tr>
                    <td>Mohra Chowk</td>
                    <td>22,550/-</td>
                    <td></td>
                </tr>
                <tr>
                    <td>AWC Colony</td>
                    <td>22,550/-</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Hassan Abdal</td>
                    <td>28,990/-</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Wah Cantt</td>
                    <td>28,990/-</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Taxila</td>
                    <td>28,990/-</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Attock</td>
                    <td>32,200/-</td>
                    <td></td>
                </tr>

                {{-- Route: Khanpur --}}
                <tr class="route-header"><td colspan="4">Khanpur Route</td></tr>
                <tr>
                    <td rowspan="4">4.</td>
                    <td>Khanpur</td>
                    <td>9,670/-</td>
                    <td>Functional</td>
                </tr>
                <tr>
                    <td>Sherwan</td>
                    <td>12,080/-</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Phulra</td>
                    <td>12,080/-</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Nathiagali</td>
                    <td>16,110/-</td>
                    <td></td>
                </tr>

                {{-- Route: Mansehra City --}}
                <tr class="route-header"><td colspan="4">Mansehra City Route</td></tr>
                <tr>
                    <td rowspan="3">5.</td>
                    <td>Mansehra City</td>
                    <td>8,000/-</td>
                    <td>Functional</td>
                </tr>
                <tr>
                    <td>Shinkiari Road</td>
                    <td>8,000/-</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Mansehra Bypass</td>
                    <td>8,000/-</td>
                    <td></td>
                </tr>

                {{-- Route: Battal / Kawai --}}
                <tr class="route-header"><td colspan="4">Battal / Kawai Route</td></tr>
                <tr>
                    <td rowspan="3">6.</td>
                    <td>Battal</td>
                    <td>9,000/-</td>
                    <td>Functional</td>
                </tr>
                <tr>
                    <td>Kawai</td>
                    <td>11,000/-</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Garhi Habibullah</td>
                    <td>12,000/-</td>
                    <td></td>
                </tr>

                {{-- Route: Balakot --}}
                <tr class="route-header"><td colspan="4">Balakot Route</td></tr>
                <tr>
                    <td rowspan="2">7.</td>
                    <td>Balakot</td>
                    <td>14,000/-</td>
                    <td>Functional</td>
                </tr>
                <tr>
                    <td>Kaghan Road Stops</td>
                    <td>14,000/-</td>
                    <td></td>
                </tr>

                {{-- Route: Oghi / Pukkal --}}
                <tr class="route-header"><td colspan="4">Oghi / Pukkal Route</td></tr>
                <tr>
                    <td rowspan="2">8.</td>
                    <td>Pukkal</td>
                    <td>10,000/-</td>
                    <td>Functional</td>
                </tr>
                <tr>
                    <td>Oghi</td>
                    <td>12,000/-</td>
                    <td></td>
                </tr>

            </tbody>
        </table>

    </div>{{-- end main-content --}}

    <!-- ===== SIDEBAR ===== -->
    <div class="sidebar">

        <div class="sidebar-box">
            <div class="sidebar-box-header">NEWS &amp; EVENTS</div>
            <div class="news-scroll-wrap">
                <div class="news-scroll-inner">
                    <div class="news-item">
                        <a href="#">Transport Registration Open for Fall 2026 Semester <span class="badge-new">New</span></a>
                        <span class="news-date">12 Apr 2026</span>
                    </div>
                    <div class="news-item">
                        <a href="#">New Bus Route Added — Oghi &amp; Pukkal <span class="badge-new">New</span></a>
                        <span class="news-date">01 Apr 2026</span>
                    </div>
                    <div class="news-item">
                        <a href="#">College Bus Schedule Revised for Ramadan</a>
                        <span class="news-date">10 Mar 2026</span>
                    </div>
                    <div class="news-item">
                        <a href="#">Transport Fee Waiver Available for Deserving Students</a>
                        <span class="news-date">20 Feb 2026</span>
                    </div>
                    <div class="news-item">
                        <a href="#">Admissions Open for BS Programs 2026</a>
                        <span class="news-date">01 Feb 2026</span>
                    </div>
                    {{-- Duplicate --}}
                    <div class="news-item">
                        <a href="#">Transport Registration Open for Fall 2026 Semester <span class="badge-new">New</span></a>
                        <span class="news-date">12 Apr 2026</span>
                    </div>
                    <div class="news-item">
                        <a href="#">New Bus Route Added — Oghi &amp; Pukkal <span class="badge-new">New</span></a>
                        <span class="news-date">01 Apr 2026</span>
                    </div>
                    <div class="news-item">
                        <a href="#">College Bus Schedule Revised for Ramadan</a>
                        <span class="news-date">10 Mar 2026</span>
                    </div>
                    <div class="news-item">
                        <a href="#">Transport Fee Waiver Available for Deserving Students</a>
                        <span class="news-date">20 Feb 2026</span>
                    </div>
                    <div class="news-item">
                        <a href="#">Admissions Open for BS Programs 2026</a>
                        <span class="news-date">01 Feb 2026</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="sidebar-box">
            <div class="sidebar-box-header">IMPORTANT LINKS</div>
            <ul class="sidebar-links">
                <li><a href="#">Transport Registration Form</a></li>
                <li><a href="#">Fee Concession Policy</a></li>
                <li><a href="#">Student Portal</a></li>
                <li><a href="#">BISE Abbottabad</a></li>
                <li><a href="#">University of Hazara</a></li>
                <li><a href="#">HED Khyber Pakhtunkhwa</a></li>
                <li><a href="#">HEC Pakistan</a></li>
            </ul>
        </div>

    </div>{{-- end sidebar --}}

</div>
@endsection
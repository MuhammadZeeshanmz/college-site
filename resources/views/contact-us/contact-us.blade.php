@extends('layouts.app')

@section('title', 'Contact Us - GPGC Mansehra')

@push('styles')
<style>
    /* ─── Design Tokens ─────────────────────────────────────────── */
    :root {
        --primary:       #1a3a5c;
        --primary-light: #24537f;
        --accent:        #c8972a;
        --accent-light:  #e8b84b;
        --bg:            #f4f6f9;
        --card-bg:       #ffffff;
        --text:          #1e2d3d;
        --text-muted:    #5a6a7a;
        --border:        #dce3ec;
        --shadow:        0 4px 24px rgba(26,58,92,0.10);
        --radius:        10px;
    }

    /* ─── Page Header ───────────────────────────────────────────── */
    .contact-hero {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 60%, #1e5080 100%);
        color: #fff;
        padding: 60px 0 48px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .contact-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.04'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }
    .contact-hero h1 {
        font-family: 'Georgia', 'Times New Roman', serif;
        font-size: 2.6rem;
        font-weight: 700;
        letter-spacing: 1px;
        margin-bottom: 10px;
        position: relative;
    }
    .contact-hero p {
        font-size: 1.05rem;
        opacity: .85;
        position: relative;
        max-width: 500px;
        margin: 0 auto;
    }
    .contact-hero .hero-badge {
        display: inline-block;
        background: var(--accent);
        color: #fff;
        font-size: .78rem;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
        padding: 4px 16px;
        border-radius: 20px;
        margin-bottom: 16px;
        position: relative;
    }

    /* ─── Layout ────────────────────────────────────────────────── */
    .contact-page {
        background: var(--bg);
        padding: 48px 0 64px;
    }
    .contact-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 32px;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 24px;
    }
    @media (max-width: 900px) {
        .contact-grid { grid-template-columns: 1fr; }
        .contact-hero h1 { font-size: 1.9rem; }
    }

    /* ─── Cards ─────────────────────────────────────────────────── */
    .contact-card {
        background: var(--card-bg);
        border-radius: var(--radius);
        box-shadow: var(--shadow);
        overflow: hidden;
        border: 1px solid var(--border);
    }
    .card-header {
        background: var(--primary);
        color: #fff;
        padding: 18px 24px;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .card-header .icon {
        width: 36px;
        height: 36px;
        background: rgba(255,255,255,0.15);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
        flex-shrink: 0;
    }
    .card-header h2 {
        font-family: 'Georgia', serif;
        font-size: 1.2rem;
        font-weight: 700;
        margin: 0;
    }
    .card-header p {
        font-size: .8rem;
        opacity: .75;
        margin: 2px 0 0;
    }

    /* ─── Quick Info ────────────────────────────────────────────── */
    .quick-info {
        padding: 24px;
        display: flex;
        flex-direction: column;
        gap: 16px;
    }
    .info-item {
        display: flex;
        gap: 14px;
        align-items: flex-start;
    }
    .info-icon {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 1rem;
        flex-shrink: 0;
    }
    .info-text strong {
        display: block;
        color: var(--text);
        font-size: .92rem;
        font-weight: 700;
        margin-bottom: 2px;
    }
    .info-text span, .info-text a {
        color: var(--text-muted);
        font-size: .88rem;
        line-height: 1.5;
        text-decoration: none;
    }
    .info-text a:hover { color: var(--accent); }
    .divider { height: 1px; background: var(--border); margin: 4px 0; }

    /* ─── Map ───────────────────────────────────────────────────── */
    .map-wrapper {
        height: 340px;
        position: relative;
    }
    .map-wrapper iframe {
        width: 100%;
        height: 100%;
        border: none;
        display: block;
    }
    .map-overlay-badge {
        position: absolute;
        top: 14px;
        left: 14px;
        background: var(--primary);
        color: #fff;
        font-size: .75rem;
        font-weight: 700;
        padding: 5px 12px;
        border-radius: 20px;
        pointer-events: none;
        letter-spacing: .5px;
        box-shadow: 0 2px 8px rgba(0,0,0,.25);
    }

    /* ─── Directory Table ───────────────────────────────────────── */
    .directory-section {
        max-width: 1200px;
        margin: 32px auto 0;
        padding: 0 24px;
    }
    .section-title {
        font-family: 'Georgia', serif;
        font-size: 1.5rem;
        color: var(--primary);
        font-weight: 700;
        margin: 0 0 6px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .section-title::after {
        content: '';
        flex: 1;
        height: 2px;
        background: linear-gradient(90deg, var(--accent) 0%, transparent 100%);
        border-radius: 2px;
    }
    .section-subtitle {
        color: var(--text-muted);
        font-size: .9rem;
        margin-bottom: 20px;
    }

    .table-card {
        background: var(--card-bg);
        border-radius: var(--radius);
        box-shadow: var(--shadow);
        overflow: hidden;
        border: 1px solid var(--border);
        margin-bottom: 28px;
    }
    .table-group-header {
        background: linear-gradient(90deg, var(--primary) 0%, var(--primary-light) 100%);
        color: #fff;
        padding: 12px 20px;
        font-size: .88rem;
        font-weight: 700;
        letter-spacing: .5px;
        text-transform: uppercase;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .contact-table {
        width: 100%;
        border-collapse: collapse;
    }
    .contact-table thead th {
        background: #f0f4f8;
        color: var(--primary);
        font-size: .8rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .5px;
        padding: 10px 18px;
        border-bottom: 2px solid var(--border);
        text-align: left;
    }
    .contact-table tbody tr {
        border-bottom: 1px solid var(--border);
        transition: background .15s;
    }
    .contact-table tbody tr:last-child { border-bottom: none; }
    .contact-table tbody tr:hover { background: #f7f9fc; }
    .contact-table td {
        padding: 11px 18px;
        font-size: .88rem;
        color: var(--text);
        vertical-align: middle;
    }
    .contact-table td:first-child { font-weight: 600; color: var(--primary); }
    .contact-table .phone-link {
        color: var(--primary-light);
        text-decoration: none;
        font-family: 'Courier New', monospace;
        font-size: .85rem;
        font-weight: 600;
    }
    .contact-table .phone-link:hover { color: var(--accent); }
    .address-badge {
        display: inline-block;
        background: #eef2f7;
        color: var(--text-muted);
        font-size: .75rem;
        padding: 2px 9px;
        border-radius: 12px;
        border: 1px solid var(--border);
    }

    /* ─── Tab Filter ────────────────────────────────────────────── */
    .filter-tabs {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        margin-bottom: 20px;
    }
    .filter-tab {
        padding: 7px 18px;
        border-radius: 20px;
        border: 1.5px solid var(--border);
        background: #fff;
        color: var(--text-muted);
        font-size: .82rem;
        font-weight: 600;
        cursor: pointer;
        transition: all .2s;
    }
    .filter-tab:hover, .filter-tab.active {
        background: var(--primary);
        border-color: var(--primary);
        color: #fff;
    }
</style>
@endpush

@section('content')

{{-- ── Hero ── --}}
<section class="contact-hero">
    <div class="hero-badge">📍 Mansehra, KP, Pakistan</div>
    <h1>Contact Us</h1>
    <p>Reach out to Government Post Graduate College Mansehra — we're here to help.</p>
</section>

{{-- ── Top Grid: Info + Map ── --}}
<div class="contact-page">
    <div class="contact-grid">

        {{-- Quick Info Card --}}
        <div class="contact-card">
            <div class="card-header">
                <div class="icon">📋</div>
                <div>
                    <h2>College Information</h2>
                    <p>General contacts & address</p>
                </div>
            </div>
            <div class="quick-info">
                <div class="info-item">
                    <div class="info-icon">🏛️</div>
                    <div class="info-text">
                        <strong>Institution</strong>
                        <span>Government Post Graduate College Mansehra<br>Mansehra, Khyber Pakhtunkhwa, Pakistan</span>
                    </div>
                </div>
                <div class="divider"></div>
                <div class="info-item">
                    <div class="info-icon">📞</div>
                    <div class="info-text">
                        <strong>Principal's Office</strong>
                        <a href="tel:+920997310030">0997-310030</a>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-icon">📠</div>
                    <div class="info-text">
                        <strong>Official Fax</strong>
                        <span>0997-310031</span>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-icon">✉️</div>
                    <div class="info-text">
                        <strong>Email</strong>
                        <a href="mailto:info@gpgcmansehra.edu.pk">info@gpgcmansehra.edu.pk</a>
                    </div>
                </div>
                <div class="divider"></div>
                <div class="info-item">
                    <div class="info-icon">⏰</div>
                    <div class="info-text">
                        <strong>Office Hours</strong>
                        <span>Monday – Friday: 8:00 AM – 4:00 PM<br>Saturday: 8:00 AM – 1:00 PM</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Map Card --}}
        <div class="contact-card">
            <div class="card-header">
                <div class="icon">🗺️</div>
                <div>
                    <h2>Find Us on the Map</h2>
                    <p>GPGC Mansehra, KP</p>
                </div>
            </div>
            <div class="map-wrapper">
                <div class="map-overlay-badge">📍 GPGC Mansehra</div>
                <iframe
                    src="https://maps.google.com/maps?q=Government+Postgraduate+College+Mansehra&t=&z=14&ie=UTF8&iwloc=&output=embed"
                    frameborder="0"
                    allowfullscreen
                    loading="lazy"
                    title="GPGC Mansehra Location">
                </iframe>
            </div>
        </div>

    </div>{{-- /contact-grid --}}

    {{-- ── Directory Table Section ── --}}
    <div class="directory-section">

        <h2 class="section-title">📂 College Directory</h2>
        <p class="section-subtitle">Phone directory for all offices and departments at GPGC Mansehra</p>

        {{-- Filter Tabs --}}
        <div class="filter-tabs" id="filterTabs">
            <button class="filter-tab active" onclick="filterSection('all', this)">All</button>
            <button class="filter-tab" onclick="filterSection('admin', this)">Administration</button>
            <button class="filter-tab" onclick="filterSection('academic', this)">Academic Departments</button>
            <button class="filter-tab" onclick="filterSection('finance', this)">Finance & Accounts</button>
        </div>

        {{-- Administration --}}
        <div class="table-card" data-section="admin">
            <div class="table-group-header">🏢 Principal & Administration</div>
            <table class="contact-table">
                <thead>
                    <tr>
                        <th>Office / Department</th>
                        <th>Designation</th>
                        <th>Phone No</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Principal's Office</td>
                        <td>PS to Principal</td>
                        <td><a class="phone-link" href="tel:+920997310030">0997-310030</a></td>
                        <td><span class="address-badge">Admin Block</span></td>
                    </tr>
                    <tr>
                        <td>Official Fax Number</td>
                        <td>—</td>
                        <td><a class="phone-link" href="tel:+920997310031">0997-310031</a></td>
                        <td><span class="address-badge">Admin Block</span></td>
                    </tr>
                    <tr>
                        <td>Vice Principal's Office</td>
                        <td>Vice Principal</td>
                        <td><a class="phone-link" href="tel:+920997310032">0997-310032</a></td>
                        <td><span class="address-badge">1st Floor, Admin Block</span></td>
                    </tr>
                    <tr>
                        <td>Registrar Office</td>
                        <td>PA to Registrar</td>
                        <td><a class="phone-link" href="tel:+920997310033">0997-310033</a></td>
                        <td><span class="address-badge">Admin Block</span></td>
                    </tr>
                    <tr>
                        <td>Registrar Office</td>
                        <td>Deputy Registrar</td>
                        <td><a class="phone-link" href="tel:+920997310034">0997-310034</a></td>
                        <td><span class="address-badge">1st Floor, Room-211</span></td>
                    </tr>
                    <tr>
                        <td>Registrar Office</td>
                        <td>Registrar Establishment</td>
                        <td><a class="phone-link" href="tel:+920997310035">0997-310035</a></td>
                        <td><span class="address-badge">Admin Block</span></td>
                    </tr>
                    <tr>
                        <td>Registrar Office</td>
                        <td>HR Section</td>
                        <td><a class="phone-link" href="tel:+920997310036">0997-310036</a></td>
                        <td><span class="address-badge">2nd Floor, Room-301</span></td>
                    </tr>
                    <tr>
                        <td>Registrar Office</td>
                        <td>Assistant Registrar</td>
                        <td><a class="phone-link" href="tel:+920997310037">0997-310037</a></td>
                        <td><span class="address-badge">Admin Block</span></td>
                    </tr>
                    <tr>
                        <td>Examination Cell</td>
                        <td>Controller of Examinations</td>
                        <td><a class="phone-link" href="tel:+920997310038">0997-310038</a></td>
                        <td><span class="address-badge">2nd Floor, Admin Block</span></td>
                    </tr>
                    <tr>
                        <td>Examination Cell</td>
                        <td>Assistant Controller</td>
                        <td><a class="phone-link" href="tel:+920997310039">0997-310039</a></td>
                        <td><span class="address-badge">2nd Floor, Admin Block</span></td>
                    </tr>
                    <tr>
                        <td>Directorate of Affiliations</td>
                        <td>Director</td>
                        <td><a class="phone-link" href="tel:+920997310050">0997-310050</a></td>
                        <td><span class="address-badge">Ground Floor, R-108</span></td>
                    </tr>
                    <tr>
                        <td>Advisor Financial Affairs</td>
                        <td>Advisor</td>
                        <td><a class="phone-link" href="tel:+920997310051">0997-310051</a></td>
                        <td><span class="address-badge">1st Floor, R-210</span></td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Finance --}}
        <div class="table-card" data-section="finance">
            <div class="table-group-header">💰 Treasurer & Finance</div>
            <table class="contact-table">
                <thead>
                    <tr>
                        <th>Office / Department</th>
                        <th>Designation</th>
                        <th>Phone No</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Treasurer Office</td>
                        <td>Treasurer</td>
                        <td><a class="phone-link" href="tel:+920997310040">0997-310040</a></td>
                        <td><span class="address-badge">Ground Floor, Admin Block</span></td>
                    </tr>
                    <tr>
                        <td>Treasurer Office</td>
                        <td>Accountant</td>
                        <td><a class="phone-link" href="tel:+920997310041">0997-310041</a></td>
                        <td><span class="address-badge">Ground Floor, Admin Block</span></td>
                    </tr>
                    <tr>
                        <td>Treasurer Office</td>
                        <td>Finance Section</td>
                        <td><a class="phone-link" href="tel:+920997310042">0997-310042</a></td>
                        <td><span class="address-badge">Ground Floor, Admin Block</span></td>
                    </tr>
                    <tr>
                        <td>Treasurer Office</td>
                        <td>Audit Section</td>
                        <td><a class="phone-link" href="tel:+920997310043">0997-310043</a></td>
                        <td><span class="address-badge">Ground Floor, Admin Block</span></td>
                    </tr>
                    <tr>
                        <td>Treasurer Office</td>
                        <td>Salary Section</td>
                        <td><a class="phone-link" href="tel:+920997310044">0997-310044</a></td>
                        <td><span class="address-badge">Admin Block</span></td>
                    </tr>
                    <tr>
                        <td>Treasurer Office</td>
                        <td>Deputy Treasurer Fax</td>
                        <td><a class="phone-link" href="tel:+920997310045">0997-310045</a></td>
                        <td><span class="address-badge">Ground Floor, Admin Block</span></td>
                    </tr>
                    <tr>
                        <td>National Bank of Pakistan</td>
                        <td>Manager NBP</td>
                        <td><a class="phone-link" href="tel:+920997310052">0997-310052</a></td>
                        <td><span class="address-badge">NBP GPGC Branch</span></td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Academic Departments --}}
        <div class="table-card" data-section="academic">
            <div class="table-group-header">🎓 Academic Departments</div>
            <table class="contact-table">
                <thead>
                    <tr>
                        <th>Department</th>
                        <th>Designation</th>
                        <th>Phone No</th>
                        <th>Building</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Department of Islamiyat & Pakistan Studies</td>
                        <td>HOD</td>
                        <td><a class="phone-link" href="tel:+920997310060">0997-310060</a></td>
                        <td><span class="address-badge">Main Block</span></td>
                    </tr>
                    <tr>
                        <td>Department of Urdu</td>
                        <td>HOD</td>
                        <td><a class="phone-link" href="tel:+920997310061">0997-310061</a></td>
                        <td><span class="address-badge">Main Block</span></td>
                    </tr>
                    <tr>
                        <td>Department of English</td>
                        <td>HOD</td>
                        <td><a class="phone-link" href="tel:+920997310062">0997-310062</a></td>
                        <td><span class="address-badge">Main Block</span></td>
                    </tr>
                    <tr>
                        <td>Department of Mathematics</td>
                        <td>HOD</td>
                        <td><a class="phone-link" href="tel:+920997310063">0997-310063</a></td>
                        <td><span class="address-badge">Science Block</span></td>
                    </tr>
                    <tr>
                        <td>Department of Physics</td>
                        <td>HOD</td>
                        <td><a class="phone-link" href="tel:+920997310064">0997-310064</a></td>
                        <td><span class="address-badge">Science Block</span></td>
                    </tr>
                    <tr>
                        <td>Department of Chemistry</td>
                        <td>HOD</td>
                        <td><a class="phone-link" href="tel:+920997310065">0997-310065</a></td>
                        <td><span class="address-badge">Science Block</span></td>
                    </tr>
                    <tr>
                        <td>Department of Biology / Botany & Zoology</td>
                        <td>HOD</td>
                        <td><a class="phone-link" href="tel:+920997310066">0997-310066</a></td>
                        <td><span class="address-badge">Science Block</span></td>
                    </tr>
                    <tr>
                        <td>Department of Computer Science</td>
                        <td>HOD</td>
                        <td><a class="phone-link" href="tel:+920997310067">0997-310067</a></td>
                        <td><span class="address-badge">IT Block</span></td>
                    </tr>
                    <tr>
                        <td>Department of Economics</td>
                        <td>HOD</td>
                        <td><a class="phone-link" href="tel:+920997310068">0997-310068</a></td>
                        <td><span class="address-badge">Commerce Block</span></td>
                    </tr>
                    <tr>
                        <td>Department of Commerce</td>
                        <td>HOD</td>
                        <td><a class="phone-link" href="tel:+920997310069">0997-310069</a></td>
                        <td><span class="address-badge">Commerce Block</span></td>
                    </tr>
                    <tr>
                        <td>Department of Political Science</td>
                        <td>HOD</td>
                        <td><a class="phone-link" href="tel:+920997310070">0997-310070</a></td>
                        <td><span class="address-badge">Arts Block</span></td>
                    </tr>
                    <tr>
                        <td>Department of History</td>
                        <td>HOD</td>
                        <td><a class="phone-link" href="tel:+920997310071">0997-310071</a></td>
                        <td><span class="address-badge">Arts Block</span></td>
                    </tr>
                    <tr>
                        <td>Department of Sociology</td>
                        <td>HOD</td>
                        <td><a class="phone-link" href="tel:+920997310072">0997-310072</a></td>
                        <td><span class="address-badge">Arts Block</span></td>
                    </tr>
                    <tr>
                        <td>Department of Psychology</td>
                        <td>HOD</td>
                        <td><a class="phone-link" href="tel:+920997310073">0997-310073</a></td>
                        <td><span class="address-badge">Arts Block</span></td>
                    </tr>
                    <tr>
                        <td>Department of Physical Education</td>
                        <td>HOD</td>
                        <td><a class="phone-link" href="tel:+920997310074">0997-310074</a></td>
                        <td><span class="address-badge">Sports Complex</span></td>
                    </tr>
                    <tr>
                        <td>Library</td>
                        <td>Chief Librarian</td>
                        <td><a class="phone-link" href="tel:+920997310075">0997-310075</a></td>
                        <td><span class="address-badge">Library Block</span></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>{{-- /directory-section --}}
</div>{{-- /contact-page --}}

@endsection

@push('scripts')
<script>
function filterSection(section, btn) {
    // Update active tab
    document.querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
    btn.classList.add('active');

    // Show/hide table cards
    document.querySelectorAll('.table-card').forEach(card => {
        if (section === 'all' || card.dataset.section === section) {
            card.style.display = '';
        } else {
            card.style.display = 'none';
        }
    });
}
</script>
@endpush
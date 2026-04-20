@extends('layouts.app')

@section('title', 'Downloads - GPGC Mansehra')

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

    /* Accordion category rows */
    .acc-item {
        border: 1px solid #ddd;
        margin-bottom: 4px;
    }

    .acc-toggle {
        width: 100%;
        background: #fff;
        border: none;
        padding: 11px 15px;
        text-align: left;
        font-size: 14px;
        font-weight: 600;
        color: #1a6fa8;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-family: inherit;
        transition: background .15s;
    }
    .acc-toggle:hover { background: #f0f7ff; }
    .acc-toggle.open { background: #1a6fa8; color: #fff; }
    .acc-toggle .arr { font-size: 11px; transition: transform .2s; }
    .acc-toggle.open .arr { transform: rotate(180deg); }

    .acc-body { display: none; border-top: 1px solid #ddd; background: #fafafa; }
    .acc-body.show { display: block; }

    /* File rows inside accordion */
    .file-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 9px 15px 9px 28px;
        border-bottom: 1px solid #eee;
        gap: 12px;
        transition: background .15s;
    }
    .file-row:last-child { border-bottom: none; }
    .file-row:hover { background: #f0f7ff; }

    .file-info { display: flex; align-items: center; gap: 8px; }
    .file-icon { font-size: 16px; flex-shrink: 0; color: #c0392b; }
    .file-name { font-size: 13.5px; color: #333; }

    .dl-link { color: #1a6fa8; text-decoration: none; font-size: 13px; white-space: nowrap; }
    .dl-link:hover { text-decoration: underline; }

    .no-files { padding: 10px 15px 10px 28px; color: #888; font-size: 13px; font-style: italic; }

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
        <div class="main-title">All Downloads</div>

        @php
        $allFiles = [
            'Admission Forms' => [
                ['title' => 'Admission Form — BS Programs 2026',                'path' => 'downloads/admission-form-bs.pdf',      'type' => 'pdf'],
                ['title' => 'Migration / Transfer Form',                        'path' => 'downloads/migration-form.pdf',         'type' => 'pdf'],
                ['title' => 'Character Certificate Application',                'path' => 'downloads/character-cert.pdf',         'type' => 'pdf'],
            ],
            'Examination Forms' => [
                ['title' => 'Examination Form — Regular Students',              'path' => 'downloads/exam-form-regular.pdf',      'type' => 'pdf'],
                ['title' => 'Rechecking / Re-evaluation Application Form',      'path' => 'downloads/rechecking-form.pdf',        'type' => 'pdf'],
                ['title' => 'Roll Number Slip Request Form',                    'path' => 'downloads/rollno-slip-form.pdf',       'type' => 'pdf'],
                ['title' => 'Transcript Request Form',                          'path' => 'downloads/transcript-form.pdf',        'type' => 'pdf'],
                ['title' => 'Degree Verification Form',                         'path' => 'downloads/degree-verify-form.pdf',     'type' => 'pdf'],
            ],
            'Scholarship Forms' => [
                ['title' => 'HEC Need-Based Scholarship Form 2026',             'path' => 'downloads/hec-scholarship.pdf',        'type' => 'pdf'],
                ['title' => 'PEEF Scholarship Application Form',                'path' => 'downloads/peef-scholarship.pdf',       'type' => 'pdf'],
                ['title' => 'College Merit Scholarship Form',                   'path' => 'downloads/college-scholarship.pdf',    'type' => 'pdf'],
                ['title' => 'Fee Concession Application Form',                  'path' => 'downloads/fee-concession.pdf',         'type' => 'pdf'],
            ],
            'Hostel Forms' => [
                ['title' => 'Hostel Admission Form — Boys 2026',                'path' => 'downloads/hostel-boys.pdf',            'type' => 'pdf'],
                ['title' => 'Hostel Admission Form — Girls 2026',               'path' => 'downloads/hostel-girls.pdf',           'type' => 'pdf'],
                ['title' => 'Hostel Clearance Form',                            'path' => 'downloads/hostel-clearance.pdf',       'type' => 'pdf'],
            ],
            'Transport Section' => [
                ['title' => 'Transport Registration Form 2026',                 'path' => 'downloads/transport-reg.pdf',          'type' => 'pdf'],
                ['title' => 'Transport Route Request Form',                     'path' => 'downloads/transport-route.pdf',        'type' => 'pdf'],
            ],
            'Registrar Office' => [
                ['title' => 'Degree / Certificate Issuance Form',               'path' => 'downloads/degree-form.pdf',            'type' => 'pdf'],
                ['title' => 'Verification Letter Request Form',                 'path' => 'downloads/verification-form.pdf',      'type' => 'pdf'],
                ['title' => 'Duplicate Marksheet Form',                         'path' => 'downloads/duplicate-marksheet.pdf',    'type' => 'pdf'],
                ['title' => 'No Objection Certificate (NOC) Form',              'path' => 'downloads/noc-form.pdf',               'type' => 'pdf'],
                ['title' => 'Bonafide Certificate Form',                        'path' => 'downloads/bonafide-form.pdf',          'type' => 'pdf'],
            ],
            'Provost Office Forms' => [
                ['title' => 'Gate Pass Application Form',                       'path' => 'downloads/gate-pass.pdf',              'type' => 'pdf'],
                ['title' => 'Leave Application Form — Students',                'path' => 'downloads/leave-student.pdf',          'type' => 'pdf'],
            ],
            'Treasurer Office Forms' => [
                ['title' => 'Fee Challan Form',                                 'path' => 'downloads/fee-challan.pdf',            'type' => 'pdf'],
                ['title' => 'Refund Application Form',                          'path' => 'downloads/refund-form.pdf',            'type' => 'pdf'],
            ],
            'Quality Enhancement Cell' => [
                ['title' => 'Student Feedback Form',                            'path' => 'downloads/qec-student-feedback.pdf',   'type' => 'pdf'],
                ['title' => 'Faculty Feedback Form',                            'path' => 'downloads/qec-faculty-feedback.pdf',   'type' => 'pdf'],
                ['title' => 'Course Evaluation Form',                           'path' => 'downloads/qec-course-eval.pdf',        'type' => 'pdf'],
                ['title' => 'Self-Assessment Report Template',                  'path' => 'downloads/qec-sar-template.docx',      'type' => 'word'],
            ],
            'QEC - Implementation Plan 2023-24' => [
                ['title' => 'QEC Implementation Plan 2023-24 — Full Document',  'path' => 'downloads/qec-plan-2023-24.pdf',       'type' => 'pdf'],
                ['title' => 'Compliance Report 2023-24',                        'path' => 'downloads/qec-compliance-2023.pdf',    'type' => 'pdf'],
            ],
            'Official User Manuals' => [
                ['title' => 'Student Portal User Manual',                       'path' => 'downloads/manual-student-portal.pdf',  'type' => 'pdf'],
                ['title' => 'Library OPAC User Manual',                         'path' => 'downloads/manual-library.pdf',         'type' => 'pdf'],
                ['title' => 'LMS (Learning Management System) Guide',           'path' => 'downloads/manual-lms.pdf',             'type' => 'pdf'],
            ],
            'Standard Operating Procedures' => [
                ['title' => 'SOP — Examination Conduct',                        'path' => 'downloads/sop-exam.pdf',               'type' => 'pdf'],
                ['title' => 'SOP — Admission Process',                          'path' => 'downloads/sop-admission.pdf',          'type' => 'pdf'],
                ['title' => 'SOP — Laboratory Safety',                          'path' => 'downloads/sop-lab-safety.pdf',         'type' => 'pdf'],
                ['title' => 'SOP — Library Services',                           'path' => 'downloads/sop-library.pdf',            'type' => 'pdf'],
            ],
            'Tender Forms' => [
                ['title' => 'Tender Notice — Lab Equipment 2026',               'path' => 'downloads/tender-lab.pdf',             'type' => 'pdf'],
                ['title' => 'Tender Notice — Stationery and Supplies',          'path' => 'downloads/tender-stationery.pdf',      'type' => 'pdf'],
            ],
            'Other Forms' => [
                ['title' => 'Experience Certificate Request Form',              'path' => 'downloads/exp-cert-form.pdf',          'type' => 'pdf'],
                ['title' => 'Internship Application Form',                      'path' => 'downloads/internship-form.pdf',        'type' => 'pdf'],
            ],
        ];

        $icon = fn(string $type) => match($type) {
            'word'  => '📄',
            default => '📕',
        };
        @endphp

        @foreach($allFiles as $category => $files)
        @php $catId = 'cat-' . Str::slug($category); @endphp
        <div class="acc-item">
            <button class="acc-toggle" data-target="{{ $catId }}">
                <span>{{ $category }}</span>
                <span class="arr">▼</span>
            </button>
            <div class="acc-body" id="{{ $catId }}">
                @forelse($files as $file)
                <div class="file-row">
                    <div class="file-info">
                        <span class="file-icon">{{ $icon($file['type']) }}</span>
                        <span class="file-name">{{ $file['title'] }}</span>
                    </div>
                    <a href="{{ asset('storage/' . $file['path']) }}"
                       class="dl-link"
                       target="_blank"
                       download>Download Here</a>
                </div>
                @empty
                <div class="no-files">No files available yet.</div>
                @endforelse
            </div>
        </div>
        @endforeach

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
                <a href="#">HEC Need-Based Scholarship 2026 Applications Open</a>
                <span class="news-date">01 Mar 2026</span>
            </div>
        </div>

        <div class="sidebar-box">
            <div class="sidebar-box-header">IMPORTANT LINKS</div>
            <ul class="sidebar-links">
                <li><a href="https://www.biseatd.edu.pk" target="_blank">BISE Abbottabad</a></li>
                <li><a href="https://www.uoh.edu.pk" target="_blank">University of Hazara</a></li>
                <li><a href="https://hed.gkp.pk" target="_blank">HED Khyber Pakhtunkhwa</a></li>
                <li><a href="https://www.hec.gov.pk" target="_blank">HEC Pakistan</a></li>
                <li><a href="#">Student Portal</a></li>
                <li><a href="#">Result Gazette</a></li>
                <li><a href="#">Scholarship Programs</a></li>
                <li><a href="#">Library Resources</a></li>
            </ul>
        </div>

    </div>{{-- end sidebar --}}

</div>

<script>
document.querySelectorAll('.acc-toggle').forEach(function(btn) {
    btn.addEventListener('click', function() {
        var targetId = this.getAttribute('data-target');
        var body = document.getElementById(targetId);
        var isOpen = body.classList.contains('show');

        // Close all
        document.querySelectorAll('.acc-body').forEach(function(b) { b.classList.remove('show'); });
        document.querySelectorAll('.acc-toggle').forEach(function(t) { t.classList.remove('open'); });

        // Open clicked (if was closed)
        if (!isOpen) {
            body.classList.add('show');
            this.classList.add('open');
        }
    });
});
</script>

@endsection
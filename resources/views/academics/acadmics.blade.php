@extends('layouts.app')

@section('title', 'Academics - Government Postgraduate College Mansehra')

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

    .main-content h2 {
        font-size: 22px;
        color: #1a6fa8;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .tab-section { display: none; }
    .tab-section.active { display: block; }

    .section-heading {
        font-size: 15px;
        font-weight: 700;
        color: #1a6fa8;
        margin-bottom: 12px;
    }

    .bold-heading {
        font-size: 14px;
        font-weight: 700;
        color: #222;
        margin-bottom: 10px;
        margin-top: 18px;
    }

    .content-text {
        font-size: 14px;
        line-height: 1.75;
        color: #333;
        text-align: justify;
        margin-bottom: 14px;
    }

    .content-list { padding-left: 20px; margin-bottom: 14px; }
    .content-list li { font-size: 14px; line-height: 1.8; color: #333; margin-bottom: 5px; }

    /* Documents / PDF table */
    .docs-table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #ccc;
        margin-bottom: 20px;
    }
    .docs-table thead tr th {
        background-color: #f0f0f0;
        border: 1px solid #ccc;
        padding: 9px 12px;
        font-size: 14px;
        font-weight: 600;
        color: #222;
        text-align: left;
    }
    .docs-table tbody tr td {
        border: 1px solid #ddd;
        padding: 8px 12px;
        vertical-align: middle;
    }
    .docs-table tbody tr:nth-child(even) { background-color: #fafafa; }
    .docs-table tbody tr:hover { background-color: #f5f9ff; }
    .docs-table .pdf-icon { width: 30px; text-align: center; color: #c0392b; font-size: 18px; }
    .docs-table .dl-link { text-align: right; white-space: nowrap; }
    .docs-table .dl-link a { color: #1a6fa8; text-decoration: none; font-size: 13px; }
    .docs-table .dl-link a:hover { text-decoration: underline; }

    /* General table */
    .gen-table { width: 100%; border-collapse: collapse; margin-top: 10px; font-size: 13px; }
    .gen-table thead tr { background: #1a6fa8; color: #fff; }
    .gen-table th { padding: 9px 12px; text-align: left; font-weight: 600; }
    .gen-table tbody tr:nth-child(even) { background: #f5f9ff; }
    .gen-table tbody tr:hover { background: #e8f4f7; }
    .gen-table td { padding: 8px 12px; border-bottom: 1px solid #ddd; vertical-align: top; }
    .gen-table a { color: #1a6fa8; text-decoration: none; }
    .gen-table a:hover { text-decoration: underline; }

    /* Download list */
    .dl-list { list-style: none; padding: 0; margin-top: 10px; }
    .dl-list li { border-bottom: 1px dashed #ccc; }
    .dl-list li:last-child { border-bottom: none; }
    .dl-list li a {
        display: flex; align-items: center; gap: 8px;
        padding: 9px 4px; font-size: 13px; color: #1a6fa8; text-decoration: none;
    }
    .dl-list li a::before { content: '📄'; font-size: 13px; }
    .dl-list li a:hover { text-decoration: underline; }

    /* Numbered rules */
    .rules-ol { list-style: none; padding: 0; margin-top: 10px; counter-reset: rc; }
    .rules-ol li {
        counter-increment: rc;
        display: flex; gap: 12px; align-items: flex-start;
        padding: 9px 0; border-bottom: 1px dashed #ccc;
        font-size: 13.5px; color: #333; line-height: 1.65;
    }
    .rules-ol li:last-child { border-bottom: none; }
    .rules-ol li::before {
        content: counter(rc);
        min-width: 26px; height: 26px;
        background: #1a6fa8; color: #fff; border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-size: 11px; font-weight: 700; flex-shrink: 0; margin-top: 1px;
    }

    /* Info note box */
    .note-box {
        background: #fff8e1;
        border-left: 4px solid #f0b429;
        padding: 12px 16px;
        border-radius: 4px;
        font-size: 13px;
        color: #555;
        margin-top: 14px;
    }

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
        color: #1a6fa8; text-decoration: none;
        font-size: 13px; cursor: pointer;
    }
    .sidebar-links li a::before { content: '▶ '; font-size: 10px; }
    .sidebar-links li a:hover,
    .sidebar-links li a.active { background-color: #f0f7ff; font-weight: 600; }

    /* ── Scrolling News ── */
    .news-scroll-wrap {
        height: 300px;
        overflow: hidden;
        position: relative;
        background: #fff;
    }
    .news-scroll-wrap::after {
        content: '';
        position: absolute;
        bottom: 0; left: 0; right: 0;
        height: 45px;
        background: linear-gradient(transparent, #fff);
        pointer-events: none;
        z-index: 2;
    }
    .news-scroll-inner {
        animation: academicsNewsScroll 22s linear infinite;
    }
    .news-scroll-inner:hover {
        animation-play-state: paused;
    }
    @keyframes academicsNewsScroll {
        0%   { transform: translateY(0); }
        100% { transform: translateY(-50%); }
    }

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

    @media(max-width:768px) {
        .page-wrapper { flex-direction: column; }
        .sidebar { width: 100%; }
    }
</style>

<div class="page-wrapper">

    <!-- ===== MAIN CONTENT ===== -->
    <div class="main-content">
        <h2>Academics (Government Postgraduate College Mansehra)</h2>

        {{-- ══════════════════════════════════
             TAB: INTRODUCTION
        ══════════════════════════════════ --}}
        <div id="tab-introduction" class="tab-section active">
            <p class="section-heading">Introduction</p>
            <p class="content-text">Government Postgraduate College Mansehra is one of the premier higher education institutions in Khyber Pakhtunkhwa, affiliated with the University of Hazara, Mansehra. The college offers a wide range of BS (4-year) undergraduate programs across Sciences, Social Sciences and Humanities.</p>
            <p class="content-text">The academic environment at GPGC Mansehra is founded on the principles of fairness, transparency and excellence. The college is committed to delivering the highest quality of teaching, research and co-curricular activity, ensuring that every student receives a comprehensive and meaningful education.</p>
            <p class="content-text">All BS programs at GPGC Mansehra follow the semester system as prescribed by the University of Hazara and the Higher Education Commission (HEC) of Pakistan. The Academic Section oversees the smooth conduct of all academic activities including admissions, examinations, results and degree issuance.</p>

            <p class="bold-heading">Vision</p>
            <p class="content-text">To become a centre of academic excellence that empowers students with knowledge, skills and values to contribute meaningfully to society and the nation.</p>

            <p class="bold-heading">Mission</p>
            <p class="content-text">To provide accessible, quality higher education through dedicated faculty, modern facilities and an inclusive academic culture — restoring hope and building community in Mansehra and beyond.</p>

            <p class="bold-heading">Academic Sections</p>
            <ul class="content-list">
                <li>General Dealing — student registration, forms and correspondence</li>
                <li>Conduct Section — smooth conduction of semester examinations</li>
                <li>Secrecy Section — safeguarding question papers and maintaining confidentiality</li>
                <li>Result Section — preparation and announcement of results</li>
                <li>Transcript &amp; Degree Section — issuance of transcripts and degrees</li>
                <li>Verification Section — verification of academic documents</li>
            </ul>
        </div>

        {{-- ══════════════════════════════════
             TAB: BS PROGRAMS OFFERED
        ══════════════════════════════════ --}}
        <div id="tab-bs-programs" class="tab-section">
            <p class="section-heading">BS Programs Offered</p>
            <p class="content-text">GPGC Mansehra offers the following 4-year BS programs under the affiliation of University of Hazara, Mansehra. All programs follow the semester system as per HEC guidelines.</p>

            <table class="gen-table">
                <thead>
                    <tr><th>#</th><th>Program</th><th>Department</th><th>Duration</th><th>Seats</th></tr>
                </thead>
                <tbody>
                    <tr><td>1</td><td>BS Computer Science</td><td>Computer Science</td><td>4 Years (8 Semesters)</td><td>40</td></tr>
                    <tr><td>2</td><td>BS Information Technology</td><td>Information Technology</td><td>4 Years (8 Semesters)</td><td>40</td></tr>
                    <tr><td>3</td><td>BS Mathematics</td><td>Mathematics</td><td>4 Years (8 Semesters)</td><td>40</td></tr>
                    <tr><td>4</td><td>BS Physics</td><td>Physics</td><td>4 Years (8 Semesters)</td><td>40</td></tr>
                    <tr><td>5</td><td>BS Chemistry</td><td>Chemistry</td><td>4 Years (8 Semesters)</td><td>40</td></tr>
                    <tr><td>6</td><td>BS Statistics</td><td>Statistics</td><td>4 Years (8 Semesters)</td><td>40</td></tr>
                    <tr><td>7</td><td>BS Zoology</td><td>Zoology</td><td>4 Years (8 Semesters)</td><td>40</td></tr>
                    <tr><td>8</td><td>BS Botany</td><td>Botany</td><td>4 Years (8 Semesters)</td><td>40</td></tr>
                    <tr><td>9</td><td>BS Economics</td><td>Economics</td><td>4 Years (8 Semesters)</td><td>40</td></tr>
                    <tr><td>10</td><td>BS Political Science</td><td>Political Science</td><td>4 Years (8 Semesters)</td><td>40</td></tr>
                    <tr><td>11</td><td>BS Islamic Studies</td><td>Islamic Studies</td><td>4 Years (8 Semesters)</td><td>40</td></tr>
                    <tr><td>12</td><td>BS English</td><td>English</td><td>4 Years (8 Semesters)</td><td>40</td></tr>
                    <tr><td>13</td><td>BS Urdu</td><td>Urdu</td><td>4 Years (8 Semesters)</td><td>40</td></tr>
                    <tr><td>14</td><td>BS Pashto</td><td>Pashto</td><td>4 Years (8 Semesters)</td><td>40</td></tr>
                    <tr><td>15</td><td>BS Pakistan Studies</td><td>Pakistan Studies</td><td>4 Years (8 Semesters)</td><td>40</td></tr>
                    <tr><td>16</td><td>BS Psychology</td><td>Psychology</td><td>4 Years (8 Semesters)</td><td>40</td></tr>
                    <tr><td>17</td><td>BS Sociology</td><td>Sociology</td><td>4 Years (8 Semesters)</td><td>40</td></tr>
                    <tr><td>18</td><td>BS Commerce</td><td>Commerce</td><td>4 Years (8 Semesters)</td><td>40</td></tr>
                </tbody>
            </table>

            <div class="note-box">
                <strong>Note:</strong> Programs and seat numbers are subject to approval by University of Hazara and HEC. Students are advised to confirm availability at the time of admission.
            </div>
        </div>

        {{-- ══════════════════════════════════
             TAB: CURRICULUM
        ══════════════════════════════════ --}}
        <div id="tab-curriculum" class="tab-section">
            <p class="section-heading">Curriculum (BS Programs)</p>
            <p class="content-text">The curriculum for all BS programs at GPGC Mansehra is designed and approved by the University of Hazara in accordance with HEC guidelines. Each program follows an 8-semester structure with a combination of compulsory, major and elective courses.</p>

            <p class="bold-heading">Curriculum Documents</p>
            <table class="docs-table">
                <thead>
                    <tr><th colspan="3">BS Program Curriculum Downloads</th></tr>
                </thead>
                <tbody>
                    <tr><td class="pdf-icon">&#128196;</td><td>BS Computer Science Curriculum (HEC 2023)</td><td class="dl-link"><a href="#">Download Here</a></td></tr>
                    <tr><td class="pdf-icon">&#128196;</td><td>BS Mathematics Curriculum</td><td class="dl-link"><a href="#">Download Here</a></td></tr>
                    <tr><td class="pdf-icon">&#128196;</td><td>BS Physics Curriculum</td><td class="dl-link"><a href="#">Download Here</a></td></tr>
                    <tr><td class="pdf-icon">&#128196;</td><td>BS Chemistry Curriculum</td><td class="dl-link"><a href="#">Download Here</a></td></tr>
                    <tr><td class="pdf-icon">&#128196;</td><td>BS English Curriculum</td><td class="dl-link"><a href="#">Download Here</a></td></tr>
                    <tr><td class="pdf-icon">&#128196;</td><td>BS Islamic Studies Curriculum</td><td class="dl-link"><a href="#">Download Here</a></td></tr>
                    <tr><td class="pdf-icon">&#128196;</td><td>BS Economics Curriculum</td><td class="dl-link"><a href="#">Download Here</a></td></tr>
                    <tr><td class="pdf-icon">&#128196;</td><td>BS Urdu Curriculum</td><td class="dl-link"><a href="#">Download Here</a></td></tr>
                    <tr><td class="pdf-icon">&#128196;</td><td>BS Pashto Curriculum</td><td class="dl-link"><a href="#">Download Here</a></td></tr>
                    <tr><td class="pdf-icon">&#128196;</td><td>BS Psychology Curriculum</td><td class="dl-link"><a href="#">Download Here</a></td></tr>
                    <tr><td class="pdf-icon">&#128196;</td><td>BS Sociology Curriculum</td><td class="dl-link"><a href="#">Download Here</a></td></tr>
                    <tr><td class="pdf-icon">&#128196;</td><td>BS Commerce Curriculum</td><td class="dl-link"><a href="#">Download Here</a></td></tr>
                </tbody>
            </table>

            <p class="bold-heading">Curriculum Structure (General)</p>
            <ul class="content-list">
                <li>Each BS program spans 8 semesters (4 years)</li>
                <li>Minimum 130-136 credit hours required for degree completion</li>
                <li>Compulsory courses include Pakistan Studies, Islamic Studies, English and Mathematics</li>
                <li>Major courses are discipline-specific and form the core of the program</li>
                <li>Elective courses allow students to specialize within their field</li>
                <li>Final year includes a Research Project / Thesis component</li>
            </ul>
        </div>

        {{-- ══════════════════════════════════
             TAB: SEMESTER RULES
        ══════════════════════════════════ --}}
        <div id="tab-semester-rules" class="tab-section">
            <p class="section-heading">Semester Rules</p>

            <table class="docs-table">
                <thead>
                    <tr><th colspan="3">Important Documents (Semester Rules)</th></tr>
                </thead>
                <tbody>
                    <tr><td class="pdf-icon">&#128196;</td><td>BS Semester Rules and Regulations (University of Hazara)</td><td class="dl-link"><a href="#">Download Here</a></td></tr>
                    <tr><td class="pdf-icon">&#128196;</td><td>HEC Semester Rules for Undergraduate Programs</td><td class="dl-link"><a href="#">Download Here</a></td></tr>
                    <tr><td class="pdf-icon">&#128196;</td><td>Student Handbook — BS Programs</td><td class="dl-link"><a href="#">Download Here</a></td></tr>
                </tbody>
            </table>

            <p class="bold-heading">Short Title, Commencement and Application</p>
            <ul class="content-list">
                <li>These regulations shall be known as GPGC Mansehra, Semester Rules &amp; Regulations for BS Programs framed under the University of Hazara statutes.</li>
                <li>These Regulations shall come into force with immediate effect.</li>
                <li>These rules shall apply to all registered students of all BS programmes of GPGC Mansehra.</li>
            </ul>

            <p class="bold-heading">Key Semester Rules</p>
            <ol class="rules-ol">
                <li>A student must maintain a minimum attendance of <strong>75%</strong> in each course per semester to be eligible to appear in the final examination.</li>
                <li>Each course carries a maximum of <strong>100 marks</strong>: 30 marks for internal assessment and 70 marks for the final examination.</li>
                <li>Internal assessment includes mid-term exams, quizzes, assignments and presentations as decided by the concerned teacher.</li>
                <li>A student must secure a minimum of <strong>45% marks</strong> in aggregate (internal + final) to pass a course.</li>
                <li>A student who fails a course may repeat it in the next semester when offered.</li>
                <li>The maximum duration to complete a BS (4-year) programme shall be <strong>8 years</strong> from the date of first enrollment.</li>
                <li>Use of any unfair means during examination shall result in immediate disqualification and disciplinary action.</li>
                <li>Examination forms must be submitted within the prescribed deadline. Late submission incurs a fine as per the fee schedule.</li>
                <li>Academic grievances related to results may be addressed to the Examination Section within <strong>30 days</strong> of result declaration.</li>
                <li>Degrees will be issued only after clearance of all dues and no-objection from all relevant departments.</li>
            </ol>
        </div>

        {{-- ══════════════════════════════════
             TAB: FEE STRUCTURE
        ══════════════════════════════════ --}}
        <div id="tab-fee-structure" class="tab-section">
            <p class="section-heading">Fee Structure — BS Programs</p>
            <p class="content-text">The following fee structure is applicable for all BS programs offered at GPGC Mansehra. Fees are payable via Bank Challan at the designated bank. All fees are subject to revision by the college and University of Hazara.</p>

            <table class="gen-table">
                <thead>
                    <tr><th>#</th><th>Fee Head</th><th>Amount (PKR)</th><th>Remarks</th></tr>
                </thead>
                <tbody>
                    <tr><td>1</td><td>Tuition Fee</td><td>8,000</td><td>Per Semester</td></tr>
                    <tr><td>2</td><td>Admission Fee</td><td>2,000</td><td>One Time Only</td></tr>
                    <tr><td>3</td><td>Examination Fee</td><td>1,500</td><td>Per Semester</td></tr>
                    <tr><td>4</td><td>Library Fee</td><td>500</td><td>Per Semester</td></tr>
                    <tr><td>5</td><td>Lab Fee (Science subjects)</td><td>1,000</td><td>Per Semester (where applicable)</td></tr>
                    <tr><td>6</td><td>Sports &amp; Cultural Fee</td><td>300</td><td>Per Semester</td></tr>
                    <tr><td>7</td><td>Student Union Fund</td><td>200</td><td>Per Semester</td></tr>
                    <tr><td>8</td><td>Red Crescent Fund</td><td>100</td><td>Per Semester</td></tr>
                    <tr><td>9</td><td>Magazine Fee</td><td>100</td><td>Per Semester</td></tr>
                    <tr><td>10</td><td>Medical Fee</td><td>200</td><td>Per Semester</td></tr>
                </tbody>
            </table>

            <div class="note-box">
                <strong>Note:</strong> Fee amounts may vary slightly by department. Students are advised to confirm the exact fee from the college Accounts Office at the time of admission. Need-based scholarships and fee concessions are available for eligible students.
            </div>
        </div>

        {{-- ══════════════════════════════════
             TAB: ADMISSIONS
        ══════════════════════════════════ --}}
        <div id="tab-admissions" class="tab-section">
            <p class="section-heading">Admissions — BS Programs</p>
            <p class="content-text">Admissions to all BS programs at GPGC Mansehra are conducted on merit basis in accordance with the policies of HEC and University of Hazara, Mansehra. Admissions are offered twice a year for Fall and Spring semesters.</p>

            <p class="bold-heading">Eligibility Criteria</p>
            <ul class="content-list">
                <li><strong>BS Programs (4-year):</strong> Minimum FA/FSc or equivalent with at least 45% marks from a recognised board.</li>
                <li>Candidates must provide original documents for verification at the time of admission.</li>
                <li>Seats are limited per department; merit lists are published on the college notice board and official website.</li>
                <li>Foreign students must apply through the Ministry of Education, Government of Pakistan.</li>
            </ul>

            <p class="bold-heading">Required Documents</p>
            <ul class="content-list">
                <li>Copy of CNIC / B-Form of student and parent/guardian</li>
                <li>Original and attested copies of all academic certificates and mark sheets</li>
                <li>Domicile Certificate (KPK preferred for certain quota seats)</li>
                <li>Two recent passport-size photographs</li>
                <li>Migration Certificate (if applying from another institution)</li>
                <li>Character Certificate from previous institution</li>
            </ul>

            <p class="bold-heading">Admission Process</p>
            <ul class="content-list">
                <li>Collect or download the admission form from the college or this website</li>
                <li>Submit the completed form along with required documents and application fee at the Accounts Office</li>
                <li>Merit list will be displayed on the notice board and the official college website</li>
                <li>Selected candidates must complete fee payment within the stipulated time to secure their seat</li>
                <li>For queries, contact the Admission Cell at the college office during working hours (Mon–Fri, 9am–3pm)</li>
            </ul>

            <p class="bold-heading">Admission Forms</p>
            <ul class="dl-list">
                <li><a href="#">BS Admission Form 2025 (Fall Semester)</a></li>
                <li><a href="#">BS Admission Form 2025 (Spring Semester)</a></li>
                <li><a href="#">Admission Schedule 2025-26</a></li>
            </ul>
        </div>

        {{-- ══════════════════════════════════
             TAB: ACADEMIC CALENDAR
        ══════════════════════════════════ --}}
        <div id="tab-academic-calendar" class="tab-section">
            <p class="section-heading">Academic Calendar 2024–25</p>
            <p class="content-text">The following schedule outlines key academic events for BS programs in the current academic year. Dates are approximate and may be adjusted by the college administration.</p>

            <table class="gen-table">
                <thead>
                    <tr><th>Event</th><th>Period</th><th>Remarks</th></tr>
                </thead>
                <tbody>
                    <tr><td>Admission Commencement (Fall)</td><td>August 2024</td><td>BS Programs Fall 2024</td></tr>
                    <tr><td>Fall Semester Begins</td><td>September 2024</td><td>All BS Departments</td></tr>
                    <tr><td>Mid-Term Examinations</td><td>October – November 2024</td><td>Internal Assessment</td></tr>
                    <tr><td>Final Term Examinations</td><td>December 2024</td><td>Fall Semester 2024</td></tr>
                    <tr><td>Winter Break</td><td>January 2025</td><td>Spring Semester Preparation</td></tr>
                    <tr><td>Spring Semester Begins</td><td>February 2025</td><td>All BS Departments</td></tr>
                    <tr><td>Mid-Term (Spring)</td><td>March – April 2025</td><td>Internal Assessment</td></tr>
                    <tr><td>Final Examinations (Spring)</td><td>May – June 2025</td><td>All BS Programs</td></tr>
                    <tr><td>Result Announcement</td><td>July 2025</td><td>Transcripts / Degrees</td></tr>
                    <tr><td>New Admissions 2025-26</td><td>August 2025</td><td>Next Academic Year</td></tr>
                </tbody>
            </table>
        </div>

        {{-- ══════════════════════════════════
             TAB: DATE SHEETS
        ══════════════════════════════════ --}}
        <div id="tab-date-sheets" class="tab-section">
            <p class="section-heading">Date Sheets — BS Programs</p>
            <p class="content-text">The following date sheets are available for download. Students are advised to check the college notice board for the most up-to-date information.</p>

            <table class="docs-table">
                <thead>
                    <tr><th colspan="3">Date Sheet Downloads</th></tr>
                </thead>
                <tbody>
                    <tr><td class="pdf-icon">&#128196;</td><td>Mid-Term Examination Date Sheet — Spring 2025</td><td class="dl-link"><a href="#">Download Here</a></td></tr>
                    <tr><td class="pdf-icon">&#128196;</td><td>Final Examination Date Sheet — Fall 2024</td><td class="dl-link"><a href="#">Download Here</a></td></tr>
                    <tr><td class="pdf-icon">&#128196;</td><td>Mid-Term Examination Date Sheet — Fall 2024</td><td class="dl-link"><a href="#">Download Here</a></td></tr>
                    <tr><td class="pdf-icon">&#128196;</td><td>Final Examination Date Sheet — Spring 2024</td><td class="dl-link"><a href="#">Download Here</a></td></tr>
                </tbody>
            </table>
        </div>

        {{-- ══════════════════════════════════
             TAB: RESULTS
        ══════════════════════════════════ --}}
        <div id="tab-results" class="tab-section">
            <p class="section-heading">Results — BS Programs</p>
            <p class="content-text">Results for all BS programs are announced by the University of Hazara, Mansehra. Students can check their results online through the University portal or download the result gazette from below.</p>

            <table class="docs-table">
                <thead>
                    <tr><th colspan="3">Result Documents</th></tr>
                </thead>
                <tbody>
                    <tr><td class="pdf-icon">&#128196;</td><td>BS Result Gazette — Fall 2024</td><td class="dl-link"><a href="#">Download Here</a></td></tr>
                    <tr><td class="pdf-icon">&#128196;</td><td>BS Result Gazette — Spring 2024</td><td class="dl-link"><a href="#">Download Here</a></td></tr>
                    <tr><td class="pdf-icon">&#128196;</td><td>BS Result Gazette — Fall 2023</td><td class="dl-link"><a href="#">Download Here</a></td></tr>
                </tbody>
            </table>

            <div class="note-box">
                <strong>Note:</strong> For result verification or transcript requests, contact the Examination Section with your Roll Number and Admission Number.
            </div>
        </div>

        {{-- ══════════════════════════════════
             TAB: FACULTY / STAFF DIRECTORY
        ══════════════════════════════════ --}}
        <div id="tab-staff-directory" class="tab-section">
            <p class="section-heading">Faculty &amp; Staff Directory</p>
            <p class="content-text">The following is the directory of teaching faculty and administrative staff at GPGC Mansehra.</p>

            <table class="gen-table">
                <thead>
                    <tr><th>#</th><th>Name</th><th>Designation</th><th>Department</th><th>Email</th></tr>
                </thead>
                <tbody>
                    <tr><td>1</td><td>Prof. Dr. ____________</td><td>Principal</td><td>Administration</td><td>principal@gpgcm.edu.pk</td></tr>
                    <tr><td>2</td><td>Mr. ____________</td><td>Vice Principal</td><td>Administration</td><td>vp@gpgcm.edu.pk</td></tr>
                    <tr><td>3</td><td>Dr. ____________</td><td>Professor / HOD</td><td>Computer Science</td><td>cs@gpgcm.edu.pk</td></tr>
                    <tr><td>4</td><td>Dr. ____________</td><td>Professor / HOD</td><td>Mathematics</td><td>math@gpgcm.edu.pk</td></tr>
                    <tr><td>5</td><td>Dr. ____________</td><td>Professor / HOD</td><td>Physics</td><td>physics@gpgcm.edu.pk</td></tr>
                    <tr><td>6</td><td>Dr. ____________</td><td>Professor / HOD</td><td>Chemistry</td><td>chem@gpgcm.edu.pk</td></tr>
                    <tr><td>7</td><td>Dr. ____________</td><td>Professor / HOD</td><td>English</td><td>english@gpgcm.edu.pk</td></tr>
                    <tr><td>8</td><td>Mr. ____________</td><td>Controller of Examinations</td><td>Examination</td><td>exams@gpgcm.edu.pk</td></tr>
                </tbody>
            </table>

            <div class="note-box">
                <strong>Note:</strong> Please update staff names and contact details as per the actual records of GPGC Mansehra.
            </div>
        </div>

        {{-- ══════════════════════════════════
             TAB: STUDENT DISCIPLINARY RULES
        ══════════════════════════════════ --}}
        <div id="tab-disciplinary" class="tab-section">
            <p class="section-heading">Students Disciplinary Rules &amp; Regulations</p>
            <p class="content-text">All students enrolled in BS programs at GPGC Mansehra are required to abide by the following disciplinary rules to maintain a conducive academic environment:</p>

            <ol class="rules-ol">
                <li>Students must maintain discipline and show respect for faculty, staff and fellow students at all times within the college premises.</li>
                <li>Ragging, bullying or any form of harassment is strictly prohibited and will result in immediate expulsion.</li>
                <li>Students are not allowed to engage in political activities on campus without prior permission from the college administration.</li>
                <li>Use of mobile phones during lectures is strictly prohibited unless specifically permitted by the faculty member.</li>
                <li>Any damage to college property will result in disciplinary action and full recovery of costs from the responsible student.</li>
                <li>Students found involved in cheating or use of unfair means in examinations will be expelled and their result cancelled as per university policy.</li>
                <li>Students must carry their college ID card at all times on campus.</li>
                <li>Dress code must be modest and in accordance with Pakistani cultural and Islamic norms.</li>
                <li>Students must attend classes regularly and maintain the minimum 75% attendance requirement per course.</li>
                <li>Smoking is strictly prohibited on college premises.</li>
            </ol>
        </div>

        {{-- ══════════════════════════════════
             TAB: DOWNLOADS
        ══════════════════════════════════ --}}
        <div id="tab-downloads" class="tab-section">
            <p class="section-heading">Downloads — BS Programs</p>
            <p class="content-text">The following documents are available for download. Click the link to download the PDF file.</p>

            <table class="docs-table">
                <thead>
                    <tr><th colspan="3">General Downloads</th></tr>
                </thead>
                <tbody>
                    <tr><td class="pdf-icon">&#128196;</td><td>BS Admission Form 2025</td><td class="dl-link"><a href="#">Download Here</a></td></tr>
                    <tr><td class="pdf-icon">&#128196;</td><td>BS Semester Rules &amp; Regulations</td><td class="dl-link"><a href="#">Download Here</a></td></tr>
                    <tr><td class="pdf-icon">&#128196;</td><td>Student Handbook 2024-25</td><td class="dl-link"><a href="#">Download Here</a></td></tr>
                    <tr><td class="pdf-icon">&#128196;</td><td>Fee Challan Form</td><td class="dl-link"><a href="#">Download Here</a></td></tr>
                    <tr><td class="pdf-icon">&#128196;</td><td>Examination Form (Regular Students)</td><td class="dl-link"><a href="#">Download Here</a></td></tr>
                    <tr><td class="pdf-icon">&#128196;</td><td>Rechecking / Re-evaluation Application Form</td><td class="dl-link"><a href="#">Download Here</a></td></tr>
                    <tr><td class="pdf-icon">&#128196;</td><td>Transcript Request Form</td><td class="dl-link"><a href="#">Download Here</a></td></tr>
                    <tr><td class="pdf-icon">&#128196;</td><td>Degree Verification Form</td><td class="dl-link"><a href="#">Download Here</a></td></tr>
                    <tr><td class="pdf-icon">&#128196;</td><td>Migration Certificate Application</td><td class="dl-link"><a href="#">Download Here</a></td></tr>
                    <tr><td class="pdf-icon">&#128196;</td><td>Character Certificate Application</td><td class="dl-link"><a href="#">Download Here</a></td></tr>
                </tbody>
            </table>
        </div>

        {{-- ══════════════════════════════════
             TAB: CONTACT US
        ══════════════════════════════════ --}}
        <div id="tab-contact" class="tab-section">
            <p class="section-heading">Contact Us — Academics</p>
            <p class="content-text">For any queries related to BS programs, admissions, examinations or academic matters, please contact the relevant section during office hours (Monday to Friday, 9:00 AM – 3:00 PM).</p>

            <table class="gen-table">
                <thead>
                    <tr><th>Section</th><th>Contact Person</th><th>Phone</th><th>Email</th></tr>
                </thead>
                <tbody>
                    <tr><td>Principal Office</td><td>Principal GPGC Mansehra</td><td>+92-997-XXXXXX</td><td>principal@gpgcm.edu.pk</td></tr>
                    <tr><td>Academic Section</td><td>Vice Principal</td><td>+92-997-XXXXXX</td><td>academics@gpgcm.edu.pk</td></tr>
                    <tr><td>Admission Cell</td><td>Admission Officer</td><td>+92-997-XXXXXX</td><td>admissions@gpgcm.edu.pk</td></tr>
                    <tr><td>Examination Section</td><td>Controller of Examinations</td><td>+92-997-XXXXXX</td><td>exams@gpgcm.edu.pk</td></tr>
                    <tr><td>Accounts Office</td><td>Accounts Officer</td><td>+92-997-XXXXXX</td><td>accounts@gpgcm.edu.pk</td></tr>
                </tbody>
            </table>

            <p class="bold-heading" style="margin-top:18px;">College Address</p>
            <p class="content-text">Government Postgraduate College Mansehra<br>
            College Road, Mansehra<br>
            Khyber Pakhtunkhwa — Pakistan</p>
        </div>

    </div>{{-- end main-content --}}

    <!-- ===== SIDEBAR ===== -->
    <div class="sidebar">

        {{-- Important Links --}}
        <div class="sidebar-box">
            <div class="sidebar-box-header">IMPORTANT LINKS (ACADEMICS)</div>
            <ul class="sidebar-links">
                <li><a href="#" data-tab="introduction" class="active">Introduction</a></li>
                <li><a href="#" data-tab="bs-programs">BS Programs Offered</a></li>
                <li><a href="#" data-tab="curriculum">Curriculum (BS Programs)</a></li>
                <li><a href="#" data-tab="semester-rules">Semester Rules</a></li>
                <li><a href="#" data-tab="fee-structure">Fee Structure</a></li>
                <li><a href="#" data-tab="admissions">Admissions</a></li>
                <li><a href="#" data-tab="academic-calendar">Academic Calendar</a></li>
                <li><a href="#" data-tab="date-sheets">Date Sheets</a></li>
                <li><a href="#" data-tab="results">Results</a></li>
                <li><a href="#" data-tab="staff-directory">Faculty &amp; Staff Directory</a></li>
                <li><a href="#" data-tab="disciplinary">Students Disciplinary Rules</a></li>
                <li><a href="#" data-tab="downloads">Downloads</a></li>
                <li><a href="#" data-tab="contact">Contact Us</a></li>
            </ul>
        </div>

        {{-- News & Events — SCROLLING --}}
        <div class="sidebar-box">
            <div class="sidebar-box-header">NEWS &amp; EVENTS</div>
            <div class="news-scroll-wrap">
                <div class="news-scroll-inner">

                    {{-- ── Original set ── --}}
                    <div class="news-item">
                        <a href="#">BS Admission Schedule 2025-26 Announced <span class="badge-new">New</span></a>
                        <span class="news-date">15 Apr 2025</span>
                    </div>
                    <div class="news-item">
                        <a href="#">Spring Semester 2025 Final Examination Date Sheet Released <span class="badge-new">New</span></a>
                        <span class="news-date">10 Apr 2025</span>
                    </div>
                    <div class="news-item">
                        <a href="#">Merit List for BS Programs (Spring 2025) Published</a>
                        <span class="news-date">05 Apr 2025</span>
                    </div>
                    <div class="news-item">
                        <a href="#">HEC Need-Based Scholarship Applications Open — Last Date 30 Apr</a>
                        <span class="news-date">20 Mar 2025</span>
                    </div>
                    <div class="news-item">
                        <a href="#">Mid-Term Examination Schedule Spring 2025 Available</a>
                        <span class="news-date">07 Mar 2025</span>
                    </div>
                    <div class="news-item">
                        <a href="#">Spring Semester 2025 Classes Officially Commenced</a>
                        <span class="news-date">20 Feb 2025</span>
                    </div>
                    <div class="news-item">
                        <a href="#">BS Fall 2024 Result Announced — Check University Portal</a>
                        <span class="news-date">10 Feb 2025</span>
                    </div>
                    <div class="news-item">
                        <a href="#">Fifth Convocation Ceremony of GPGC Mansehra Successfully Held</a>
                        <span class="news-date">30 Jan 2025</span>
                    </div>

                    {{-- ── Duplicate set for seamless loop ── --}}
                    <div class="news-item">
                        <a href="#">BS Admission Schedule 2025-26 Announced <span class="badge-new">New</span></a>
                        <span class="news-date">15 Apr 2025</span>
                    </div>
                    <div class="news-item">
                        <a href="#">Spring Semester 2025 Final Examination Date Sheet Released <span class="badge-new">New</span></a>
                        <span class="news-date">10 Apr 2025</span>
                    </div>
                    <div class="news-item">
                        <a href="#">Merit List for BS Programs (Spring 2025) Published</a>
                        <span class="news-date">05 Apr 2025</span>
                    </div>
                    <div class="news-item">
                        <a href="#">HEC Need-Based Scholarship Applications Open — Last Date 30 Apr</a>
                        <span class="news-date">20 Mar 2025</span>
                    </div>
                    <div class="news-item">
                        <a href="#">Mid-Term Examination Schedule Spring 2025 Available</a>
                        <span class="news-date">07 Mar 2025</span>
                    </div>
                    <div class="news-item">
                        <a href="#">Spring Semester 2025 Classes Officially Commenced</a>
                        <span class="news-date">20 Feb 2025</span>
                    </div>
                    <div class="news-item">
                        <a href="#">BS Fall 2024 Result Announced — Check University Portal</a>
                        <span class="news-date">10 Feb 2025</span>
                    </div>
                    <div class="news-item">
                        <a href="#">Fifth Convocation Ceremony of GPGC Mansehra Successfully Held</a>
                        <span class="news-date">30 Jan 2025</span>
                    </div>

                </div>{{-- end scroll-inner --}}
            </div>{{-- end scroll-wrap --}}
        </div>{{-- end sidebar-box --}}

    </div>{{-- end sidebar --}}

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const tabLinks = document.querySelectorAll('.sidebar-links a[data-tab]');
    tabLinks.forEach(function (link) {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            const tabId = this.getAttribute('data-tab');
            document.querySelectorAll('.tab-section').forEach(function (s) { s.classList.remove('active'); });
            const target = document.getElementById('tab-' + tabId);
            if (target) target.classList.add('active');
            tabLinks.forEach(function (l) { l.classList.remove('active'); });
            this.classList.add('active');
        });
    });
});
</script>

@endsection
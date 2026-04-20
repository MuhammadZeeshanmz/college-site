@extends('layouts.app')

@section('title', 'Central Library - GPGC Mansehra')

@push('styles')
<style>
    * { box-sizing: border-box; margin: 0; padding: 0; }

    body { font-family: Arial, sans-serif; background: #f5f5f5; color: #333; }

    .library-wrapper {
        max-width: 1200px;
        margin: 30px auto;
        padding: 0 15px;
        display: flex;
        gap: 20px;
        align-items: flex-start;
    }

    /* ── Main Content ── */
    .library-main {
        flex: 1;
        background: #fff;
        border: 1px solid #ddd;
        padding: 25px 30px;
    }

    .library-main h2.page-title {
        color: #1a6b8a;
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 6px;
    }

    .library-main h3.section-title {
        color: #1a6b8a;
        font-size: 15px;
        font-weight: bold;
        margin-bottom: 14px;
    }

    .content-section { display: none; }
    .content-section.active { display: block; }

    .content-section p {
        font-size: 13.5px;
        line-height: 1.8;
        text-align: justify;
        margin-bottom: 10px;
        color: #333;
    }

    ul.rules-list {
        margin-left: 20px;
        font-size: 13.5px;
        line-height: 2.1;
    }

    /* ── Table ── */
    .info-table { width: 100%; border-collapse: collapse; font-size: 13px; margin-top: 10px; }
    .info-table th { background: #1a6b8a; color: #fff; padding: 9px 12px; text-align: left; }
    .info-table td { padding: 8px 12px; border-bottom: 1px solid #e5e5e5; }
    .info-table tr:nth-child(even) td { background: #f7f7f7; }

    /* ── Feedback Form ── */
    .feedback-form label { display: block; font-size: 13px; font-weight: bold; margin: 10px 0 4px; color: #444; }
    .feedback-form input,
    .feedback-form textarea,
    .feedback-form select {
        width: 100%; padding: 7px 10px; font-size: 13px;
        border: 1px solid #ccc; border-radius: 2px; outline: none;
    }
    .feedback-form textarea { height: 100px; resize: vertical; }
    .btn-submit {
        margin-top: 12px; background: #1a6b8a; color: #fff;
        border: none; padding: 9px 22px; font-size: 13px; cursor: pointer; border-radius: 2px;
    }
    .btn-submit:hover { background: #0d4f6b; }

    /* ── Downloads ── */
    .download-list { list-style: none; margin-top: 8px; }
    .download-list li { padding: 8px 0; border-bottom: 1px dashed #ddd; font-size: 13px; }
    .download-list li::before { content: '📄 '; }
    .download-list li a { color: #1a6b8a; text-decoration: none; }
    .download-list li a:hover { text-decoration: underline; }

    /* ── Administration Cards ── */
    .admin-card {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        padding: 22px 0;
        border-bottom: 1px solid #e0e0e0;
    }
    .admin-info { flex: 1; }
    .admin-name { color: #1a6b8a; font-size: 15px; font-weight: bold; margin-bottom: 4px; }
    .admin-designation { font-size: 13px; font-weight: bold; color: #333; margin-bottom: 5px; }
    .admin-detail { font-size: 13px; color: #444; line-height: 1.9; }
    .admin-photo { flex-shrink: 0; margin-left: 30px; }
    .admin-photo img {
        width: 105px; height: 115px; object-fit: cover;
        border: 3px solid #1a6b8a; border-radius: 6px; display: block;
    }

    /* ── Sidebar ── */
    .library-sidebar { width: 260px; flex-shrink: 0; }
    .sidebar-box { background: #fff; border: 1px solid #ddd; }
    .sidebar-header {
        background: #1a6b8a; color: #fff; font-size: 14px;
        font-weight: bold; padding: 12px 15px; text-align: center; letter-spacing: 0.5px;
    }
    .sidebar-nav { list-style: none; }
    .sidebar-nav li { border-bottom: 1px dashed #ccc; }
    .sidebar-nav li:last-child { border-bottom: none; }
    .sidebar-nav li a {
        display: flex; align-items: center; gap: 6px;
        padding: 10px 14px; font-size: 13px; color: #1a6b8a;
        text-decoration: none; cursor: pointer; transition: background 0.15s;
    }
    .sidebar-nav li a::before { content: '▸'; font-size: 11px; color: #1a6b8a; flex-shrink: 0; }
    .sidebar-nav li a:hover,
    .sidebar-nav li a.active { background: #e8f4f8; color: #0d4f6b; font-weight: bold; }

    @media (max-width: 768px) {
        .library-wrapper { flex-direction: column; }
        .library-sidebar { width: 100%; }
        .admin-card { flex-direction: column; gap: 15px; }
        .admin-photo { margin-left: 0; }
    }
</style>
@endpush

@section('content')

<div class="library-wrapper">

    <!-- ════════════ MAIN CONTENT ════════════ -->
    <div class="library-main">

        {{-- 1. Librarian Message (Default) --}}
        <div id="section-librarian" class="content-section active">
            <h2 class="page-title">Central Library (Govt. Post Graduate College Mansehra)</h2>
            <h3 class="section-title">Librarian Message</h3>
            <p>Welcome to the Central Library of Government Post Graduate College Mansehra. Our library stands as one of the oldest and most distinguished libraries in the Hazara region, serving as an intellectual cornerstone of this institution since its establishment in 1958.</p>
            <p>The library is conveniently located on the main road of the campus, equally accessible from all departments as well as the college hostels. The building comprises two large reading halls and an adjacent room, providing ample space for individual study, group research, and reference work.</p>
            <p>We proudly support the academic, teaching, and research activities of our entire college community. Our collection includes thousands of titles spanning all disciplines — covering Intermediate, BS Degree, and Postgraduate level programs affiliated with BISE Abbottabad and Hazara University.</p>
            <p>Our aim is to provide the most effective lending, reference, and current awareness services in accordance with the needs of our users. HEC Digital Library facilities are also available to provide on-campus access to thousands of international digital resources.</p>
            <p>Our dedicated library staff is always ready to assist students, faculty, and researchers in locating both physical and digital resources. We hope you will make full use of the opportunities offered by this library to enhance your academic and research pursuits.</p>
        </div>

        {{-- 2. HEC Digital Library Resources --}}
        <div id="section-hec-resources" class="content-section">
            <h2 class="page-title">Central Library (Govt. Post Graduate College Mansehra)</h2>
            <h3 class="section-title">HEC Digital Library Resources</h3>
            <p>The Higher Education Commission (HEC) Digital Library provides students, faculty, and researchers of GPGC Mansehra on-campus access to thousands of full-text international journals, e-books, and research databases.</p>
            <table class="info-table">
                <thead>
                    <tr><th>#</th><th>Resource Name</th><th>Type</th><th>Access</th></tr>
                </thead>
                <tbody>
                    <tr><td>1</td><td>JSTOR</td><td>Journals &amp; Books</td><td><a href="https://www.jstor.org" target="_blank" style="color:#1a6b8a">Visit</a></td></tr>
                    <tr><td>2</td><td>Springer Link</td><td>E-Books &amp; Journals</td><td><a href="https://link.springer.com" target="_blank" style="color:#1a6b8a">Visit</a></td></tr>
                    <tr><td>3</td><td>Elsevier ScienceDirect</td><td>Research Articles</td><td><a href="https://www.sciencedirect.com" target="_blank" style="color:#1a6b8a">Visit</a></td></tr>
                    <tr><td>4</td><td>IEEE Xplore</td><td>Engineering &amp; Technology</td><td><a href="https://ieeexplore.ieee.org" target="_blank" style="color:#1a6b8a">Visit</a></td></tr>
                    <tr><td>5</td><td>Taylor &amp; Francis</td><td>Multidisciplinary</td><td><a href="https://www.tandfonline.com" target="_blank" style="color:#1a6b8a">Visit</a></td></tr>
                    <tr><td>6</td><td>Cambridge Core</td><td>Academic Journals</td><td><a href="https://www.cambridge.org/core" target="_blank" style="color:#1a6b8a">Visit</a></td></tr>
                </tbody>
            </table>
        </div>

        {{-- 3. Library Feedback Form --}}
        <div id="section-feedback" class="content-section">
            <h2 class="page-title">Central Library (Govt. Post Graduate College Mansehra)</h2>
            <h3 class="section-title">Library Feedback Form</h3>
            <form class="feedback-form" onsubmit="return false;">
                <label>Full Name</label>
                <input type="text" placeholder="Enter your full name">

                <label>Roll No / Employee ID</label>
                <input type="text" placeholder="Enter your Roll No or Employee ID">

                <label>Email Address</label>
                <input type="email" placeholder="Enter your email address">

                <label>Department</label>
                <select>
                    <option value="">-- Select Department --</option>
                    <option>Physics</option>
                    <option>Chemistry</option>
                    <option>Botany</option>
                    <option>Zoology</option>
                    <option>Mathematics</option>
                    <option>Statistics</option>
                    <option>English</option>
                    <option>Urdu</option>
                    <option>Islamic Studies</option>
                    <option>Pakistan Studies</option>
                    <option>Political Science</option>
                    <option>Economics</option>
                    <option>Computer Science</option>
                    <option>Other</option>
                </select>

                <label>User Type</label>
                <select>
                    <option>Intermediate Student</option>
                    <option>BS Student</option>
                    <option>Postgraduate Student</option>
                    <option>Faculty Member</option>
                    <option>Researcher</option>
                    <option>Staff</option>
                </select>

                <label>Feedback / Suggestions</label>
                <textarea placeholder="Write your feedback or suggestions here..."></textarea>

                <button class="btn-submit" type="submit">Submit Feedback</button>
            </form>
        </div>

        {{-- 4. Online Public Access Catalogue --}}
        <div id="section-opac" class="content-section">
            <h2 class="page-title">Central Library (Govt. Post Graduate College Mansehra)</h2>
            <h3 class="section-title">Online Public Access Catalogue (OPAC)</h3>
            <p>The OPAC of GPGC Mansehra Central Library allows all registered users to search the library's complete collection of books, journals, theses, and reference materials. Search by Title, Author, Subject, or ISBN.</p>
            <table class="info-table">
                <thead>
                    <tr><th>Category</th><th>Total Titles</th><th>Available Copies</th></tr>
                </thead>
                <tbody>
                    <tr><td>Science (Physics, Chemistry, Biology, Math)</td><td>5,200</td><td>3,800</td></tr>
                    <tr><td>Social Sciences &amp; Humanities</td><td>4,100</td><td>3,200</td></tr>
                    <tr><td>Urdu &amp; Islamic Studies</td><td>2,800</td><td>2,100</td></tr>
                    <tr><td>English Literature &amp; Language</td><td>1,900</td><td>1,500</td></tr>
                    <tr><td>Pakistan Studies &amp; Political Science</td><td>1,600</td><td>1,200</td></tr>
                    <tr><td>General Reference &amp; Encyclopaedia</td><td>3,400</td><td>2,900</td></tr>
                </tbody>
            </table>
        </div>

        {{-- 5. Mission & Vision --}}
        <div id="section-mission" class="content-section">
            <h2 class="page-title">Central Library (Govt. Post Graduate College Mansehra)</h2>
            <h3 class="section-title">Mission &amp; Vision</h3>
            <p><strong>Mission:</strong> The mission of the Central Library of GPGC Mansehra is to support the teaching, learning, and research needs of the college community by providing comprehensive, accessible, and up-to-date information resources and services in a welcoming academic environment.</p>
            <p><strong>Vision:</strong> To be the leading academic library in the Hazara region — recognized for excellence in information services, digital access, and fostering a culture of lifelong learning among students and faculty of GPGC Mansehra.</p>
            <p><strong>Core Values:</strong></p>
            <ul class="rules-list">
                <li>Free and equal access to information for all college members</li>
                <li>Commitment to academic and intellectual excellence</li>
                <li>Continuous improvement of library services and resources</li>
                <li>Respect for intellectual property and academic integrity</li>
                <li>Support for research, innovation, and lifelong learning</li>
                <li>Preservation of knowledge for future generations</li>
            </ul>
        </div>

        {{-- 6. Administration --}}
        <div id="section-administration" class="content-section">
            <h2 class="page-title">Central Library (Govt. Post Graduate College Mansehra)</h2>
            <h3 class="section-title">Administration</h3>

            <div class="admin-card">
                <div class="admin-info">
                    <p class="admin-name">Mr. [Librarian Name]</p>
                    <p class="admin-designation">Head Librarian / In-Charge Central Library</p>
                    <p class="admin-detail">Email: library@gcmansehra.edu.pk</p>
                    <p class="admin-detail">Phone No: +92-997-530026</p>
                </div>
                <div class="admin-photo">
                    <img src="{{ asset('images/library/librarian.jpg') }}" alt="Head Librarian"
                         onerror="this.src='https://via.placeholder.com/105x115/cccccc/888888?text=Photo'">
                </div>
            </div>

            <div class="admin-card">
                <div class="admin-info">
                    <p class="admin-name">Mr. [Deputy Librarian Name]</p>
                    <p class="admin-designation">Deputy Librarian</p>
                    <p class="admin-detail">Email: --</p>
                    <p class="admin-detail">Phone No: +92-997-530026</p>
                </div>
                <div class="admin-photo">
                    <img src="{{ asset('images/library/deputy_librarian.jpg') }}" alt="Deputy Librarian"
                         onerror="this.src='https://via.placeholder.com/105x115/cccccc/888888?text=Photo'">
                </div>
            </div>

            <div class="admin-card">
                <div class="admin-info">
                    <p class="admin-name">Mr. [Cataloguer Name]</p>
                    <p class="admin-designation">Cataloguer</p>
                    <p class="admin-detail">Phone No: +92-997-530026</p>
                </div>
                <div class="admin-photo">
                    <img src="{{ asset('images/library/cataloguer.jpg') }}" alt="Cataloguer"
                         onerror="this.src='https://via.placeholder.com/105x115/cccccc/888888?text=Photo'">
                </div>
            </div>

            <div class="admin-card" style="border-bottom:none;">
                <div class="admin-info">
                    <p class="admin-name">Mr. [Library Assistant Name]</p>
                    <p class="admin-designation">Library Assistant</p>
                    <p class="admin-detail">Phone No: +92-997-530026</p>
                </div>
                <div class="admin-photo">
                    <img src="{{ asset('images/library/lib_assistant.jpg') }}" alt="Library Assistant"
                         onerror="this.src='https://via.placeholder.com/105x115/cccccc/888888?text=Photo'">
                </div>
            </div>
        </div>

        {{-- 7. Library Rules & Regulations --}}
        <div id="section-rules" class="content-section">
            <h2 class="page-title">Central Library (Govt. Post Graduate College Mansehra)</h2>
            <h3 class="section-title">Library Rules &amp; Regulations</h3>
            <p>All students, faculty, and staff of GPGC Mansehra are required to strictly observe the following rules and regulations of the Central Library:</p>

            <p style="margin-top:10px;"><strong>Membership Rules:</strong></p>
            <ul class="rules-list">
                <li>Regular staff and students of the college are eligible for library membership.</li>
                <li>Postgraduate students and researchers can avail reading facilities during office hours within the library premises.</li>
            </ul>

            <p style="margin-top:10px;"><strong>Book Borrowing:</strong></p>
            <ul class="rules-list">
                <li>Faculty members may borrow up to <strong>10 books</strong>, retainable for <strong>3 months</strong>.</li>
                <li>Every faculty member must clear their library account before summer vacation each year.</li>
                <li>BS class students can borrow up to <strong>5 books</strong> at a time.</li>
                <li>Intermediate students can borrow a maximum of <strong>3 books</strong> at a time.</li>
                <li>Students may retain books for <strong>2 weeks</strong>, renewable for a further 2 weeks if presented on the due date.</li>
                <li>General and textbooks are issued on a first-come, first-served basis.</li>
            </ul>

            <p style="margin-top:10px;"><strong>General Conduct:</strong></p>
            <ul class="rules-list">
                <li>Silence must be observed in the library at all times.</li>
                <li>Mobile phones must be kept off or on silent mode.</li>
                <li>Eating, drinking, and smoking are strictly prohibited within library premises.</li>
                <li>Personal belongings such as bags and purses must be deposited at the reception counter.</li>
                <li>Seats in the library cannot be reserved.</li>
                <li>Do not write, underline, or mark any library book.</li>
                <li>Reference materials, CD-ROMs, periodicals, and newspapers will not be issued; they can only be consulted within the premises.</li>
                <li>Library clearance is mandatory for all students and staff leaving the college.</li>
            </ul>
        </div>

        {{-- 8. Downloads --}}
        <div id="section-downloads" class="content-section">
            <h2 class="page-title">Central Library (Govt. Post Graduate College Mansehra)</h2>
            <h3 class="section-title">Downloads (Central Library - GPGC Mansehra)</h3>
            <p>The following documents and forms are available for download:</p>
            <ul class="download-list">
                <li><a href="#">Library Membership Form</a></li>
                <li><a href="#">Book Borrowing Request Form</a></li>
                <li><a href="#">Library Rules &amp; Regulations (PDF)</a></li>
                <li><a href="#">HEC Digital Library Access Guide</a></li>
                <li><a href="#">Library Clearance Form</a></li>
                <li><a href="#">Library Annual Report</a></li>
                <li><a href="#">Inter-Library Loan Request Form</a></li>
                <li><a href="#">Library User Manual</a></li>
            </ul>
        </div>

    </div>{{-- end .library-main --}}

    <!-- ════════════ SIDEBAR ════════════ -->
    <div class="library-sidebar">
        <div class="sidebar-box">
            <div class="sidebar-header">IMPORTANT LINKS (Library)</div>
            <ul class="sidebar-nav">
                <li>
                    <a href="https://hec.gov.pk/english/services/universities/HECDigitalLibrary/Pages/default.aspx"
                       target="_blank">HEC Digital Library Single Link</a>
                </li>
                <li><a href="#" onclick="showSection('hec-resources'); return false;" id="link-hec-resources">HEC Digital Library Resources</a></li>
                <li><a href="#" onclick="showSection('feedback'); return false;" id="link-feedback">Library Feedback Form</a></li>
                <li><a href="#" onclick="showSection('opac'); return false;" id="link-opac">Online Public Access Catalogue</a></li>
                <li><a href="#" onclick="showSection('librarian'); return false;" id="link-librarian" class="active">Librarian Message</a></li>
                <li><a href="#" onclick="showSection('mission'); return false;" id="link-mission">Mission &amp; Vision</a></li>
                <li><a href="#" onclick="showSection('administration'); return false;" id="link-administration">Administration</a></li>
                <li><a href="#" onclick="showSection('rules'); return false;" id="link-rules">Library Rules &amp; Regulations</a></li>
                <li><a href="#" onclick="showSection('downloads'); return false;" id="link-downloads">Downloads (GPGC Library)</a></li>
            </ul>
        </div>
    </div>

</div>{{-- end .library-wrapper --}}

@endsection

@push('scripts')
<script>
    function showSection(name) {
        document.querySelectorAll('.content-section').forEach(el => el.classList.remove('active'));
        document.querySelectorAll('.sidebar-nav li a').forEach(el => el.classList.remove('active'));

        var target = document.getElementById('section-' + name);
        if (target) target.classList.add('active');

        var activeLink = document.getElementById('link-' + name);
        if (activeLink) activeLink.classList.add('active');

        document.querySelector('.library-main').scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
</script>
@endpush
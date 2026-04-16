@extends('layouts.app')

@php
$facultyData = [
    'cs' => [
        'dept' => 'Computer Science',
        'hod'  => ['name' => 'Muhammad Abid', 'title' => 'Associate Professor & HoD', 'qual' => 'PhD Computer Science, NUST Islamabad', 'spec' => 'Artificial Intelligence, Machine Learning', 'email' => 'faisal.khan@gpgcm.edu.pk', 'exp' => '14 Years'],
        'members' => [
            ['name'=>'Dr. Sana Ullah','title'=>'Associate Professor','qual'=>'PhD CS, University of Manchester UK','spec'=>'Cybersecurity, Network Systems','exp'=>'12 Years'],
            ['name'=>'Mr. Tariq Mehmood','title'=>'Assistant Professor','qual'=>'MS Computer Science, COMSATS','spec'=>'Software Engineering, Web Dev','exp'=>'8 Years'],
            ['name'=>'Ms. Ayesha Noor','title'=>'Assistant Professor','qual'=>'MS AI, FAST-NUCES','spec'=>'Deep Learning, Computer Vision','exp'=>'5 Years'],
            ['name'=>'Mr. Bilal Hussain','title'=>'Lecturer','qual'=>'MS Software Engineering, UET Peshawar','spec'=>'Mobile App Development, Flutter','exp'=>'4 Years'],
            ['name'=>'Ms. Zainab Fatima','title'=>'Lecturer','qual'=>'MS Data Science, Quaid-i-Azam University','spec'=>'Data Science, Python, Statistics','exp'=>'3 Years'],
            ['name'=>'Mr. Usman Ali','title'=>'Lecturer','qual'=>'MS Information Technology, IIU Islamabad','spec'=>'Database Systems, Cloud Computing','exp'=>'3 Years'],
            ['name'=>'Mr. Adnan Shahid','title'=>'Lecturer','qual'=>'BS CS (Ongoing PhD), UoM','spec'=>'Computer Networks, Linux','exp'=>'2 Years'],
        ],
    ],
    'math' => [
        'dept' => 'Mathematics',
        'hod'  => ['name' => 'Prof. Dr. Khalid Rehman', 'title' => 'Professor & HoD', 'qual' => 'PhD Pure Mathematics, University of Cambridge UK', 'spec' => 'Functional Analysis, Topology', 'email' => 'khalid.rehman@gpgcm.edu.pk', 'exp' => '20 Years'],
        'members' => [
            ['name'=>'Dr. Amna Bibi','title'=>'Associate Professor','qual'=>'PhD Mathematics, QAU Islamabad','spec'=>'Number Theory, Abstract Algebra','exp'=>'13 Years'],
            ['name'=>'Mr. Shahzad Akhtar','title'=>'Assistant Professor','qual'=>'MPhil Mathematics, University of Peshawar','spec'=>'Mathematical Analysis, Calculus','exp'=>'9 Years'],
            ['name'=>'Ms. Razia Sultana','title'=>'Assistant Professor','qual'=>'MPhil Mathematics, AWKUM Mardan','spec'=>'Differential Equations, Mechanics','exp'=>'7 Years'],
            ['name'=>'Mr. Imtiaz Ahmad','title'=>'Lecturer','qual'=>'MS Mathematics, COMSATS','spec'=>'Operations Research, Statistics','exp'=>'5 Years'],
            ['name'=>'Ms. Nasreen Khatun','title'=>'Lecturer','qual'=>'MPhil Mathematics, Hazara University','spec'=>'Numerical Analysis, Computational Math','exp'=>'4 Years'],
        ],
    ],
    'physics' => [
        'dept' => 'Physics',
        'hod'  => ['name' => 'Dr. Javed Iqbal', 'title' => 'Associate Professor & HoD', 'qual' => 'PhD Physics, PIEAS Islamabad', 'spec' => 'Nuclear Physics, Particle Physics', 'email' => 'javed.iqbal@gpgcm.edu.pk', 'exp' => '16 Years'],
        'members' => [
            ['name'=>'Dr. Nadia Rahman','title'=>'Associate Professor','qual'=>'PhD Astrophysics, University of Bonn Germany','spec'=>'Astrophysics, Cosmology','exp'=>'12 Years'],
            ['name'=>'Mr. Asif Khan','title'=>'Assistant Professor','qual'=>'MPhil Physics, University of Peshawar','spec'=>'Quantum Mechanics, Solid State','exp'=>'8 Years'],
            ['name'=>'Ms. Shazia Parveen','title'=>'Assistant Professor','qual'=>'MPhil Physics, Hazara University','spec'=>'Electrodynamics, Optics','exp'=>'6 Years'],
            ['name'=>'Mr. Sajid Ali','title'=>'Lecturer','qual'=>'MS Electronics, NUST','spec'=>'Electronics, Semiconductor Devices','exp'=>'4 Years'],
            ['name'=>'Ms. Hina Batool','title'=>'Lecturer','qual'=>'MPhil Physics, QAU','spec'=>'Thermodynamics, Statistical Mechanics','exp'=>'3 Years'],
        ],
    ],
    'chem' => [
        'dept' => 'Chemistry',
        'hod'  => ['name' => 'Dr. Sadia Kouser', 'title' => 'Associate Professor & HoD', 'qual' => 'PhD Organic Chemistry, University of Karachi', 'spec' => 'Organic Synthesis, Medicinal Chemistry', 'email' => 'sadia.kouser@gpgcm.edu.pk', 'exp' => '15 Years'],
        'members' => [
            ['name'=>'Dr. Naveed Ahmed','title'=>'Associate Professor','qual'=>'PhD Analytical Chemistry, GCU Lahore','spec'=>'Spectroscopy, Analytical Methods','exp'=>'11 Years'],
            ['name'=>'Mr. Waqar Ahmed','title'=>'Assistant Professor','qual'=>'MPhil Physical Chemistry, UoP','spec'=>'Electrochemistry, Thermodynamics','exp'=>'7 Years'],
            ['name'=>'Ms. Samina Bibi','title'=>'Assistant Professor','qual'=>'MPhil Biochemistry, IIUI','spec'=>'Biochemistry, Inorganic Chemistry','exp'=>'6 Years'],
            ['name'=>'Mr. Zia ul Haq','title'=>'Lecturer','qual'=>'MS Industrial Chemistry, UET','spec'=>'Industrial Chemistry, Polymers','exp'=>'4 Years'],
            ['name'=>'Ms. Maryam Gul','title'=>'Lecturer','qual'=>'MPhil Chemistry, Hazara University','spec'=>'Environmental Chemistry, Food Analysis','exp'=>'3 Years'],
        ],
    ],
    'bio' => [
        'dept' => 'Biology',
        'hod'  => ['name' => 'Dr. Riffat Ullah', 'title' => 'Associate Professor & HoD', 'qual' => 'PhD Botany, University of Agriculture Peshawar', 'spec' => 'Plant Ecology, Ethnobotany', 'email' => 'riffat.ullah@gpgcm.edu.pk', 'exp' => '17 Years'],
        'members' => [
            ['name'=>'Dr. Saeeda Bibi','title'=>'Associate Professor','qual'=>'PhD Zoology, University of Peshawar','spec'=>'Wildlife Biology, Conservation','exp'=>'13 Years'],
            ['name'=>'Mr. Fahad Nawaz','title'=>'Assistant Professor','qual'=>'MPhil Microbiology, QAU','spec'=>'Medical Microbiology, Bacteriology','exp'=>'8 Years'],
            ['name'=>'Ms. Nargis Akhtar','title'=>'Assistant Professor','qual'=>'MPhil Botany, Hazara University','spec'=>'Plant Physiology, Genetics','exp'=>'6 Years'],
            ['name'=>'Mr. Arshad Mehmood','title'=>'Lecturer','qual'=>'MPhil Zoology, UoP','spec'=>'Parasitology, Animal Behavior','exp'=>'5 Years'],
            ['name'=>'Ms. Faiza Kanwal','title'=>'Lecturer','qual'=>'MS Molecular Biology, ICCBS Karachi','spec'=>'Molecular Biology, Genetics','exp'=>'3 Years'],
        ],
    ],
    'english' => [
        'dept' => 'English',
        'hod'  => ['name' => 'Dr. Razia Sultana', 'title' => 'Associate Professor & HoD', 'qual' => 'PhD English Literature, University of Leeds UK', 'spec' => 'Postcolonial Literature, Critical Theory', 'email' => 'razia.sultana@gpgcm.edu.pk', 'exp' => '18 Years'],
        'members' => [
            ['name'=>'Mr. Ahsan Iqbal','title'=>'Assistant Professor','qual'=>'MPhil English Linguistics, QAU','spec'=>'Sociolinguistics, Discourse Analysis','exp'=>'9 Years'],
            ['name'=>'Ms. Sidra Malik','title'=>'Assistant Professor','qual'=>'MPhil English Literature, Hazara University','spec'=>'Victorian Literature, Women Writers','exp'=>'7 Years'],
            ['name'=>'Mr. Zafar Iqbal','title'=>'Lecturer','qual'=>'MA English, University of Peshawar','spec'=>'TESOL, Language Teaching','exp'=>'6 Years'],
            ['name'=>'Ms. Amna Anwar','title'=>'Lecturer','qual'=>'MPhil English, COMSATS','spec'=>'Creative Writing, American Literature','exp'=>'4 Years'],
            ['name'=>'Mr. Rehan Yousaf','title'=>'Lecturer','qual'=>'MA English, IIU Islamabad','spec'=>'Translation Studies, Communication','exp'=>'3 Years'],
        ],
    ],
];

$deptId = request()->segment(3) ?? 'cs';
$selectedDept = $deptId;
@endphp

@section('title', 'Faculty — Government Postgraduate College Mansehra')

@push('styles')
<style>
    .faculty-hero {
        background: linear-gradient(135deg, var(--green-dark) 0%, var(--green-mid) 100%);
        padding: 72px 0 56px; position: relative; overflow: hidden;
    }
    .faculty-hero::before { content:''; position:absolute; inset:0; background-image:radial-gradient(circle,rgba(255,255,255,.04) 1px,transparent 1px); background-size:28px 28px; }
    .faculty-hero-content { position:relative; z-index:2; max-width:1200px; margin:auto; padding:0 24px; }
    .faculty-hero-tag { display:inline-block; background:var(--gold); color:var(--green-dark); font-size:11px; font-weight:700; padding:4px 12px; border-radius:4px; letter-spacing:.06em; text-transform:uppercase; margin-bottom:12px; }
    .faculty-hero h1 { font-family:'Playfair Display',serif; font-size:clamp(28px,4vw,48px); color:#fff; margin-bottom:8px; }
    .faculty-hero p { font-size:15px; color:rgba(255,255,255,.65); }

    .faculty-container { max-width:1200px; margin:0 auto; padding:0 24px 80px; }

    /* Dept Tabs */
    .dept-tabs { display:flex; gap:10px; flex-wrap:wrap; padding:24px 0 32px; border-bottom:1px solid var(--border); margin-bottom:36px; }
    .dept-tab {
        padding:9px 18px; border-radius:100px; border:2px solid var(--border); background:var(--white);
        color:var(--text-muted); font-size:13px; font-weight:600; cursor:pointer; transition:all .2s;
        text-decoration:none; display:inline-block;
    }
    .dept-tab.active, .dept-tab:hover { background:var(--green); border-color:var(--green); color:#fff; }

    /* HoD Card */
    .hod-card {
        background: linear-gradient(135deg, var(--green-dark) 0%, var(--green) 100%);
        border-radius:20px; padding:32px; display:grid; grid-template-columns:auto 1fr auto; gap:24px; align-items:center;
        margin-bottom:36px; position:relative; overflow:hidden;
    }
    .hod-card::before { content:''; position:absolute; top:-60px; right:-60px; width:200px; height:200px; border-radius:50%; background:rgba(200,147,10,.12); }
    .hod-avatar { width:80px; height:80px; border-radius:50%; background:rgba(200,147,10,.25); border:3px solid var(--gold); display:flex; align-items:center; justify-content:center; font-family:'Playfair Display',serif; font-size:24px; color:var(--gold-light); flex-shrink:0; }
    .hod-info h3 { font-family:'Playfair Display',serif; color:#fff; font-size:20px; margin-bottom:3px; }
    .hod-info .hod-title { font-size:12px; color:var(--gold-light); font-weight:600; text-transform:uppercase; letter-spacing:.06em; margin-bottom:8px; }
    .hod-info .hod-meta { display:flex; flex-wrap:wrap; gap:14px; font-size:13px; color:rgba(255,255,255,.65); }
    .hod-badge { background:rgba(255,255,255,.12); border:1px solid rgba(255,255,255,.2); color:#fff; font-size:11px; font-weight:600; padding:4px 10px; border-radius:4px; }
    .hod-contact { text-align:right; }
    .hod-contact a { color:var(--gold-light); font-size:13px; text-decoration:none; display:block; margin-bottom:6px; }

    /* Faculty Grid */
    .faculty-grid { display:grid; grid-template-columns:repeat(auto-fill,minmax(280px,1fr)); gap:22px; }
    .faculty-card {
        background:var(--white); border:1px solid var(--border); border-radius:16px; padding:24px;
        transition:all .3s; text-align:center;
    }
    .faculty-card:hover { border-color:var(--green); box-shadow:var(--shadow-md); transform:translateY(-4px); }
    .faculty-avatar { width:72px; height:72px; border-radius:50%; background:var(--green-pale); border:2px solid var(--border); display:flex; align-items:center; justify-content:center; font-family:'Playfair Display',serif; font-size:22px; color:var(--green); margin:0 auto 14px; transition:all .3s; }
    .faculty-card:hover .faculty-avatar { background:var(--green); color:#fff; border-color:var(--green); }
    .faculty-card h3 { font-size:15px; font-weight:700; color:var(--green-dark); margin-bottom:3px; }
    .faculty-rank { font-size:12px; color:var(--green); font-weight:600; margin-bottom:10px; }
    .faculty-info { font-size:12.5px; color:var(--text-muted); line-height:1.6; }
    .faculty-info strong { color:var(--text); }
    .faculty-divider { border:none; border-top:1px solid var(--border); margin:12px 0; }
    .exp-badge { display:inline-block; background:var(--green-pale); color:var(--green-dark); font-size:11.5px; font-weight:600; padding:4px 10px; border-radius:100px; border:1px solid rgba(26,92,56,.15); }

    @media(max-width:640px){ .hod-card{grid-template-columns:1fr;text-align:center;} .hod-contact{text-align:center;} }
</style>
@endpush

@section('content')

<div class="faculty-hero">
    <div class="faculty-hero-content" data-aos="fade-up">
        <div class="faculty-hero-tag">Our Team</div>
        <h1>Faculty Members</h1>
        <p>Meet our dedicated team of highly qualified faculty across all departments</p>
    </div>
</div>

<div class="faculty-container">

    <!-- Dept Tabs -->
    <div class="dept-tabs" data-aos="fade-up">
        @foreach($facultyData as $id => $dept)
        <a href="{{ route('faculty') }}?dept={{ $id }}" class="dept-tab {{ $selectedDept === $id ? 'active' : '' }}" onclick="showDept(event, '{{ $id }}')">
            {{ $dept['dept'] }}
        </a>
        @endforeach
    </div>

    @foreach($facultyData as $dId => $dept)
    <div class="dept-section {{ $selectedDept !== $dId ? 'dept-hidden' : '' }}" id="dept-{{ $dId }}" data-aos="fade-up">

        <!-- HoD -->
        <div class="hod-card">
            <div class="hod-avatar">{{ substr($dept['hod']['name'], 0, 1) }}</div>
            <div class="hod-info">
                <span class="hod-badge">Head of Department</span>
                <h3 style="margin-top:8px;">{{ $dept['hod']['name'] }}</h3>
                <div class="hod-title">{{ $dept['hod']['title'] }}</div>
                <div class="hod-meta">
                    <span>🎓 {{ $dept['hod']['qual'] }}</span>
                    <span>🔬 {{ $dept['hod']['spec'] }}</span>
                    <span>⏱ {{ $dept['hod']['exp'] }} Experience</span>
                </div>
            </div>
            <div class="hod-contact">
                <a href="mailto:{{ $dept['hod']['email'] }}">📧 {{ $dept['hod']['email'] }}</a>
                <a href="#">📞 +92-997-12345</a>
            </div>
        </div>

        <!-- Faculty Members -->
        <h3 style="font-family:'Playfair Display',serif;font-size:20px;color:var(--green-dark);margin-bottom:20px;">
            Department Faculty — {{ $dept['dept'] }}
        </h3>
        <div class="faculty-grid">
            @foreach($dept['members'] as $member)
            <div class="faculty-card">
                <div class="faculty-avatar">{{ substr($member['name'], strrpos($member['name'], ' ') + 1, 1) }}</div>
                <h3>{{ $member['name'] }}</h3>
                <div class="faculty-rank">{{ $member['title'] }}</div>
                <div class="faculty-info">
                    <strong>Qualification:</strong><br>{{ $member['qual'] }}<br>
                    <hr class="faculty-divider">
                    <strong>Specialization:</strong><br>{{ $member['spec'] }}
                </div>
                <div style="margin-top:12px;">
                    <span class="exp-badge">⏱ {{ $member['exp'] }}</span>
                </div>
            </div>
            @endforeach
        </div>

    </div>
    @endforeach

</div>

@push('scripts')
<script>
// On load, show only selected dept
document.addEventListener('DOMContentLoaded', function() {
    const params = new URLSearchParams(window.location.search);
    const dept = params.get('dept') || 'cs';
    showDeptById(dept);
});

function showDept(e, deptId) {
    e.preventDefault();
    showDeptById(deptId);
    // Update active tab
    document.querySelectorAll('.dept-tab').forEach(t => t.classList.remove('active'));
    e.target.classList.add('active');
    history.pushState({}, '', '?dept=' + deptId);
}

function showDeptById(deptId) {
    document.querySelectorAll('.dept-section').forEach(s => s.classList.add('dept-hidden'));
    const target = document.getElementById('dept-' + deptId);
    if (target) target.classList.remove('dept-hidden');
    document.querySelectorAll('.dept-tab').forEach(t => {
        if (t.href.includes('dept=' + deptId)) t.classList.add('active');
        else t.classList.remove('active');
    });
}
</script>
<style>.dept-hidden { display:none; }</style>
@endpush

@endsection
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    // ── All 16 departments data ──
    private function getDeptData(string $slug): array
    {
        $depts = [
            'cs' => [
                'slug'     => 'cs',
                'name'     => 'Computer Science',
                'fullName' => 'Department of Computer Science',
                'icon'     => '💻',
                'image'    => 'images/cs.png',
                'color'    => '#1a6fa8',
                'intro'    => 'Welcome to the Department of Computer Science at Government Postgraduate College Mansehra! Our department takes great pride in offering a diverse range of esteemed undergraduate degree programs in the field of Computer Science.',
                'intro2'   => 'The department is equipped with modern computer labs, experienced faculty, and a curriculum designed to meet the demands of the rapidly evolving IT industry. We aim to produce graduates who are competent, ethical, and ready to contribute to national and international technological development.',
                'hod'      => 'Prof. [HOD Name]',
                'hod_qual' => 'MS Computer Science',
                'phone'    => '0997-XXXXXXX',
                'email'    => 'cs@gpgcm.edu.pk',
                'block'    => 'CS Block, GPGCM Mansehra',
                'programs' => [
                    ['name' => 'BS Computer Science', 'level' => 'BS', 'duration' => '4 Years', 'seats' => 60],
                ],
                'courses'  => [
                    '1st Semester' => ['Introduction to Computing', 'Calculus & Analytic Geometry', 'English Composition', 'Islamic Studies / Ethics', 'Discrete Structures'],
                    '2nd Semester' => ['Object Oriented Programming', 'Linear Algebra', 'Digital Logic Design', 'Communication Skills', 'Pakistan Studies'],
                    '3rd Semester' => ['Data Structures & Algorithms', 'Computer Organization & Assembly', 'Probability & Statistics', 'Database Systems', 'Software Engineering'],
                    '4th Semester' => ['Operating Systems', 'Computer Networks', 'Web Technologies', 'Theory of Automata', 'Technical Writing'],
                    '5th Semester' => ['Artificial Intelligence', 'Information Security', 'Software Design & Architecture', 'Human Computer Interaction', 'Elective I'],
                    '6th Semester' => ['Compiler Construction', 'Parallel & Distributed Computing', 'Mobile Application Development', 'Elective II', 'Elective III'],
                    '7th Semester' => ['Final Year Project I', 'Cloud Computing', 'Machine Learning', 'Professional Ethics', 'Elective IV'],
                    '8th Semester' => ['Final Year Project II', 'Entrepreneurship', 'Elective V', 'Elective VI'],
                ],
                'faculty'  => [
                    ['name' => 'Prof. [Name]', 'designation' => 'Head of Department', 'qualification' => 'MS CS', 'specialization' => 'Artificial Intelligence'],
                    ['name' => 'Mr. [Name]',   'designation' => 'Lecturer',            'qualification' => 'BS CS',  'specialization' => 'Web Development'],
                    ['name' => 'Ms. [Name]',   'designation' => 'Lecturer',            'qualification' => 'MS SE',  'specialization' => 'Software Engineering'],
                    ['name' => 'Mr. [Name]',   'designation' => 'Lab Instructor',      'qualification' => 'BS IT',  'specialization' => 'Networking'],
                ],
                'fee' => [
                    ['title' => 'Admission Fee (One Time)',      'amount' => '5,000'],
                    ['title' => 'Tuition Fee (Per Semester)',    'amount' => '15,000'],
                    ['title' => 'Lab Fee (Per Semester)',        'amount' => '3,000'],
                    ['title' => 'Library Fee (Per Semester)',    'amount' => '500'],
                    ['title' => 'Sports Fee (Per Semester)',     'amount' => '500'],
                    ['title' => 'Examination Fee (Per Semester)','amount' => '1,500'],
                ],
                'labs' => [
                    ['name' => 'Programming Lab',        'capacity' => '30 PCs', 'software' => 'Visual Studio, Dev C++, Python IDLE'],
                    ['name' => 'Networking Lab',         'capacity' => '20 PCs', 'software' => 'Cisco Packet Tracer, Wireshark'],
                    ['name' => 'Database Lab',           'capacity' => '25 PCs', 'software' => 'MySQL, Oracle, MS SQL Server'],
                    ['name' => 'Web Development Lab',    'capacity' => '25 PCs', 'software' => 'VS Code, XAMPP, Sublime Text'],
                ],
                'news' => [
                    ['title' => 'Science Students Seminar on Artificial Intelligence and Machine Learning', 'date' => '16 Apr 2025', 'new' => true],
                    ['title' => 'FES Pakistan visits Department of Computer Science, GPGCM',               'date' => '03 Mar 2025', 'new' => true],
                    ['title' => 'Department of CS Welcomes Fresh Batch of BS Students',                    'date' => '15 Feb 2025', 'new' => true],
                    ['title' => 'Programming Competition 2025 — Inter-Departmental Coding Challenge',      'date' => '10 Jan 2025', 'new' => false],
                    ['title' => 'Workshop on Cybersecurity Awareness for Students and Faculty',            'date' => '05 Dec 2024', 'new' => false],
                    ['title' => 'CS Department Signs MOU with Leading IT Company for Internships',         'date' => '20 Nov 2024', 'new' => false],
                ],
                'announcements' => [
                    ['title' => 'Mid-Term Examination Schedule — Spring 2025',  'date' => '10 Apr 2025', 'new' => true],
                    ['title' => 'BS CS Admissions Open for Fall 2025',          'date' => '05 Apr 2025', 'new' => true],
                    ['title' => 'Fee Submission Deadline — Spring 2025',        'date' => '01 Apr 2025', 'new' => true],
                    ['title' => 'Final Year Project Submission Guidelines',     'date' => '20 Mar 2025', 'new' => false],
                    ['title' => 'Scholarship Applications Open for CS Students','date' => '10 Mar 2025', 'new' => false],
                    ['title' => 'Class Timetable Spring 2025 Available',        'date' => '15 Feb 2025', 'new' => false],
                ],
                'gallery' => ['images/gallery.jpeg', 'images/gallery2.jpeg', 'images/gallery3.jpeg'],
                'admission_requirements' => [
                    'Intermediate (FSc Pre-Engineering / ICS) with minimum 45% marks',
                    'OR A-Level with equivalent qualifications',
                    'CNIC / Form-B copy',
                    'Domicile certificate',
                    'Two passport size photographs',
                    'Character certificate from last institution',
                ],
                'hod_message' => 'It is my great pleasure to welcome you to the Department of Computer Science at Government Postgraduate College Mansehra. Our department is committed to providing quality education in computing disciplines and preparing students for the challenges of the digital age. We have a dedicated team of qualified faculty members who are passionate about teaching and research. Our modern laboratories and updated curriculum ensure that our graduates are well-equipped to contribute meaningfully to the IT industry and academia. I encourage all students to make the most of the resources and opportunities available here. Hard work, dedication, and continuous learning are the keys to success in this dynamic field.',
            ],

            'it' => [
                'slug' => 'it', 'name' => 'Information Technology', 'fullName' => 'Department of Information Technology',
                'icon' => '🖥️', 'image' => 'images/it.png', 'color' => '#1a6fa8',
                'intro' => 'The Department of Information Technology at GPGC Mansehra provides students with a comprehensive education in IT systems, networks, and modern technologies.',
                'intro2' => 'Our curriculum bridges theory and practice, preparing graduates for careers in software development, network administration, and IT management.',
                'hod' => 'Prof. [HOD Name]', 'hod_qual' => 'MS IT', 'phone' => '0997-XXXXXXX', 'email' => 'it@gpgcm.edu.pk', 'block' => 'IT Block, GPGCM Mansehra',
                'programs' => [['name' => 'BS Information Technology', 'level' => 'BS', 'duration' => '4 Years', 'seats' => 60]],
                'courses' => ['1st Semester' => ['Introduction to IT', 'Calculus', 'English', 'Islamic Studies', 'Programming Fundamentals'], '2nd Semester' => ['OOP', 'Database Systems', 'Web Design', 'Pakistan Studies', 'Statistics']],
                'faculty' => [['name' => 'Prof. [Name]', 'designation' => 'Head of Department', 'qualification' => 'MS IT', 'specialization' => 'Network Security']],
                'fee' => [['title' => 'Tuition Fee (Per Semester)', 'amount' => '14,000'], ['title' => 'Lab Fee (Per Semester)', 'amount' => '2,500']],
                'labs' => [['name' => 'IT Lab', 'capacity' => '30 PCs', 'software' => 'Windows Server, VMware']],
                'news' => [['title' => 'IT Department Seminar on Cloud Computing', 'date' => '10 Apr 2025', 'new' => true]],
                'announcements' => [['title' => 'BS IT Admissions Open for Fall 2025', 'date' => '05 Apr 2025', 'new' => true]],
                'gallery' => ['images/gallery.jpeg', 'images/gallery2.jpeg'],
                'admission_requirements' => ['Intermediate (FSc/ICS) with 45% marks', 'CNIC copy', 'Domicile certificate', 'Two photographs'],
                'hod_message' => 'Welcome to the Department of Information Technology. We are dedicated to nurturing skilled IT professionals who will drive digital transformation in Pakistan.',
            ],

            'math' => [
                'slug' => 'math', 'name' => 'Mathematics', 'fullName' => 'Department of Mathematics',
                'icon' => '📐', 'image' => 'images/math.png', 'color' => '#1a6fa8',
                'intro' => 'The Department of Mathematics offers rigorous academic programs designed to develop analytical and problem-solving skills essential in science, technology, and beyond.',
                'intro2' => 'Our faculty members are dedicated researchers and educators committed to academic excellence.',
                'hod' => 'Prof. [HOD Name]', 'hod_qual' => 'PhD Mathematics', 'phone' => '0997-XXXXXXX', 'email' => 'math@gpgcm.edu.pk', 'block' => 'Science Block, GPGCM Mansehra',
                'programs' => [['name' => 'BS Mathematics', 'level' => 'BS', 'duration' => '4 Years', 'seats' => 60], ['name' => 'MSc Mathematics', 'level' => 'MSc', 'duration' => '2 Years', 'seats' => 30]],
                'courses' => ['1st Semester' => ['Calculus I', 'Algebra', 'English', 'Islamic Studies', 'Statistics I'], '2nd Semester' => ['Calculus II', 'Linear Algebra', 'Pakistan Studies', 'Real Analysis I', 'Statistics II']],
                'faculty' => [['name' => 'Prof. [Name]', 'designation' => 'Head of Department', 'qualification' => 'PhD Maths', 'specialization' => 'Pure Mathematics']],
                'fee' => [['title' => 'Tuition Fee (Per Semester)', 'amount' => '12,000']],
                'labs' => [['name' => 'Mathematics Lab', 'capacity' => '20 PCs', 'software' => 'MATLAB, Mathematica']],
                'news' => [['title' => 'Mathematics Week 2025 Celebration', 'date' => '14 Apr 2025', 'new' => true]],
                'announcements' => [['title' => 'BS Mathematics Admissions Open', 'date' => '05 Apr 2025', 'new' => true]],
                'gallery' => ['images/gallery.jpeg', 'images/gallery2.jpeg'],
                'admission_requirements' => ['FSc Pre-Engineering / Pre-Medical with 45% marks', 'CNIC copy', 'Domicile', 'Photos'],
                'hod_message' => 'Mathematics is the language of the universe. Our department strives to make every student fluent in this language through quality education and research.',
            ],

            'physics' => [
                'slug' => 'physics', 'name' => 'Physics', 'fullName' => 'Department of Physics',
                'icon' => '⚛️', 'image' => 'images/physics.png', 'color' => '#1a6fa8',
                'intro' => 'The Department of Physics provides a strong foundation in classical and modern physics, preparing students for careers in research, education, and industry.',
                'intro2' => 'State-of-the-art laboratories and experienced faculty ensure that students receive hands-on training alongside theoretical knowledge.',
                'hod' => 'Prof. [HOD Name]', 'hod_qual' => 'PhD Physics', 'phone' => '0997-XXXXXXX', 'email' => 'physics@gpgcm.edu.pk', 'block' => 'Science Block, GPGCM Mansehra',
                'programs' => [['name' => 'BS Physics', 'level' => 'BS', 'duration' => '4 Years', 'seats' => 60]],
                'courses' => ['1st Semester' => ['Mechanics', 'Calculus', 'English', 'Islamic Studies', 'Lab I'], '2nd Semester' => ['Electricity & Magnetism', 'Linear Algebra', 'Pakistan Studies', 'Lab II', 'Waves']],
                'faculty' => [['name' => 'Prof. [Name]', 'designation' => 'Head of Department', 'qualification' => 'PhD Physics', 'specialization' => 'Quantum Physics']],
                'fee' => [['title' => 'Tuition Fee (Per Semester)', 'amount' => '13,000'], ['title' => 'Lab Fee', 'amount' => '2,000']],
                'labs' => [['name' => 'Physics Lab I', 'capacity' => '25 students', 'software' => 'Oscilloscopes, Spectrometers'], ['name' => 'Physics Lab II', 'capacity' => '25 students', 'software' => 'Advanced equipment']],
                'news' => [['title' => 'Physics Seminar on Quantum Computing', 'date' => '12 Apr 2025', 'new' => true]],
                'announcements' => [['title' => 'BS Physics Admissions Open', 'date' => '05 Apr 2025', 'new' => true]],
                'gallery' => ['images/gallery.jpeg', 'images/gallery2.jpeg'],
                'admission_requirements' => ['FSc Pre-Engineering / Pre-Medical', 'Min 45% marks', 'CNIC', 'Domicile'],
                'hod_message' => 'Physics is the foundation of all natural sciences. We are committed to providing an inspiring environment for learning and discovery.',
            ],

            'chem' => [
                'slug' => 'chem', 'name' => 'Chemistry', 'fullName' => 'Department of Chemistry',
                'icon' => '🧪', 'image' => 'images/chem.png', 'color' => '#1a6fa8',
                'intro' => 'The Department of Chemistry offers comprehensive programs covering organic, inorganic, physical, and analytical chemistry.',
                'intro2' => 'Well-equipped laboratories and a strong research culture prepare our graduates for careers in pharmaceuticals, research, and education.',
                'hod' => 'Prof. [HOD Name]', 'hod_qual' => 'PhD Chemistry', 'phone' => '0997-XXXXXXX', 'email' => 'chem@gpgcm.edu.pk', 'block' => 'Science Block',
                'programs' => [['name' => 'BS Chemistry', 'level' => 'BS', 'duration' => '4 Years', 'seats' => 60]],
                'courses' => ['1st Semester' => ['Organic Chemistry I', 'Calculus', 'English', 'Islamic Studies', 'Lab I']],
                'faculty' => [['name' => 'Prof. [Name]', 'designation' => 'HOD', 'qualification' => 'PhD Chem', 'specialization' => 'Organic Chemistry']],
                'fee' => [['title' => 'Tuition Fee (Per Semester)', 'amount' => '13,000'], ['title' => 'Lab Fee', 'amount' => '2,500']],
                'labs' => [['name' => 'Chemistry Lab', 'capacity' => '25 students', 'software' => 'Fume hoods, Spectrophotometers']],
                'news' => [['title' => 'Chemistry Exhibition 2025', 'date' => '10 Apr 2025', 'new' => true]],
                'announcements' => [['title' => 'BS Chemistry Admissions Open', 'date' => '05 Apr 2025', 'new' => true]],
                'gallery' => ['images/gallery.jpeg'],
                'admission_requirements' => ['FSc Pre-Medical / Pre-Engineering', 'Min 45%', 'CNIC', 'Domicile'],
                'hod_message' => 'Chemistry is at the heart of life sciences. Our department nurtures scientific curiosity and research skills.',
            ],

            'stat' => [
                'slug' => 'stat', 'name' => 'Statistics', 'fullName' => 'Department of Statistics',
                'icon' => '📊', 'image' => 'images/stat.png', 'color' => '#1a6fa8',
                'intro' => 'The Department of Statistics offers programs that equip students with quantitative and analytical skills applicable in virtually every field.',
                'intro2' => 'From data analysis to research methodology, our graduates are prepared for careers in data science, research, and government sectors.',
                'hod' => 'Prof. [HOD Name]', 'hod_qual' => 'MS Statistics', 'phone' => '0997-XXXXXXX', 'email' => 'stat@gpgcm.edu.pk', 'block' => 'Science Block',
                'programs' => [['name' => 'BS Statistics', 'level' => 'BS', 'duration' => '4 Years', 'seats' => 60]],
                'courses' => ['1st Semester' => ['Descriptive Statistics', 'Calculus', 'English', 'Islamic Studies', 'Probability']],
                'faculty' => [['name' => 'Prof. [Name]', 'designation' => 'HOD', 'qualification' => 'MS Stats', 'specialization' => 'Biostatistics']],
                'fee' => [['title' => 'Tuition Fee (Per Semester)', 'amount' => '12,000']],
                'labs' => [['name' => 'Statistics Lab', 'capacity' => '25 PCs', 'software' => 'SPSS, R, Excel']],
                'news' => [['title' => 'Statistics Day Celebration 2025', 'date' => '20 Apr 2025', 'new' => true]],
                'announcements' => [['title' => 'BS Statistics Admissions Open', 'date' => '05 Apr 2025', 'new' => true]],
                'gallery' => ['images/gallery.jpeg'],
                'admission_requirements' => ['FSc / ICS with Maths', 'Min 45%', 'CNIC', 'Domicile'],
                'hod_message' => 'In the age of data, statistics is indispensable. We train students to be competent analysts and researchers.',
            ],

            'zoology' => [
                'slug' => 'zoology', 'name' => 'Zoology', 'fullName' => 'Department of Zoology',
                'icon' => '🦋', 'image' => 'images/zoo.png', 'color' => '#1a6fa8',
                'intro' => 'The Department of Zoology provides comprehensive study of animal life, biodiversity, and ecology in the rich natural setting of Hazara.',
                'intro2' => 'Field trips, laboratory work, and research projects make our programs both academically rigorous and practically engaging.',
                'hod' => 'Prof. [HOD Name]', 'hod_qual' => 'PhD Zoology', 'phone' => '0997-XXXXXXX', 'email' => 'zoo@gpgcm.edu.pk', 'block' => 'Biology Block',
                'programs' => [['name' => 'BS Zoology', 'level' => 'BS', 'duration' => '4 Years', 'seats' => 60]],
                'courses' => ['1st Semester' => ['Invertebrate Zoology', 'Calculus', 'English', 'Islamic Studies', 'Lab I']],
                'faculty' => [['name' => 'Prof. [Name]', 'designation' => 'HOD', 'qualification' => 'PhD Zoology', 'specialization' => 'Wildlife Biology']],
                'fee' => [['title' => 'Tuition Fee (Per Semester)', 'amount' => '12,000'], ['title' => 'Lab Fee', 'amount' => '2,000']],
                'labs' => [['name' => 'Zoology Lab', 'capacity' => '25 students', 'software' => 'Microscopes, Specimens']],
                'news' => [['title' => 'Biodiversity Field Trip to Kaghan Valley', 'date' => '08 Apr 2025', 'new' => true]],
                'announcements' => [['title' => 'BS Zoology Admissions Open', 'date' => '05 Apr 2025', 'new' => true]],
                'gallery' => ['images/gallery.jpeg'],
                'admission_requirements' => ['FSc Pre-Medical', 'Min 45%', 'CNIC', 'Domicile'],
                'hod_message' => 'Zoology connects us to the living world. Our department fosters love for nature and scientific inquiry.',
            ],

            'botany' => [
                'slug' => 'botany', 'name' => 'Botany', 'fullName' => 'Department of Botany',
                'icon' => '🌿', 'image' => 'images/botany.png', 'color' => '#1a6fa8',
                'intro' => 'The Department of Botany studies plant life in all its diversity, from molecular biology to ecosystem ecology.',
                'intro2' => 'The lush natural environment of Hazara provides an ideal setting for botanical field studies and research.',
                'hod' => 'Prof. [HOD Name]', 'hod_qual' => 'PhD Botany', 'phone' => '0997-XXXXXXX', 'email' => 'botany@gpgcm.edu.pk', 'block' => 'Biology Block',
                'programs' => [['name' => 'BS Botany', 'level' => 'BS', 'duration' => '4 Years', 'seats' => 60]],
                'courses' => ['1st Semester' => ['Plant Morphology', 'Calculus', 'English', 'Islamic Studies', 'Lab I']],
                'faculty' => [['name' => 'Prof. [Name]', 'designation' => 'HOD', 'qualification' => 'PhD Botany', 'specialization' => 'Plant Ecology']],
                'fee' => [['title' => 'Tuition Fee (Per Semester)', 'amount' => '12,000'], ['title' => 'Lab Fee', 'amount' => '2,000']],
                'labs' => [['name' => 'Botany Lab', 'capacity' => '25 students', 'software' => 'Microscopes, Plant specimens']],
                'news' => [['title' => 'Herbarium Collection Drive 2025', 'date' => '15 Apr 2025', 'new' => true]],
                'announcements' => [['title' => 'BS Botany Admissions Open', 'date' => '05 Apr 2025', 'new' => true]],
                'gallery' => ['images/gallery.jpeg'],
                'admission_requirements' => ['FSc Pre-Medical', 'Min 45%', 'CNIC', 'Domicile'],
                'hod_message' => 'Plants sustain life on earth. Our department is committed to advancing knowledge in plant sciences for a sustainable future.',
            ],

            'eco' => [
                'slug' => 'eco', 'name' => 'Economics', 'fullName' => 'Department of Economics',
                'icon' => '📈', 'image' => 'images/eco.png', 'color' => '#1a6fa8',
                'intro' => 'The Department of Economics provides rigorous training in economic theory, policy analysis, and quantitative methods.',
                'intro2' => 'Our graduates pursue careers in banking, government, research institutes, and international organizations.',
                'hod' => 'Prof. [HOD Name]', 'hod_qual' => 'PhD Economics', 'phone' => '0997-XXXXXXX', 'email' => 'eco@gpgcm.edu.pk', 'block' => 'Arts Block',
                'programs' => [['name' => 'BS Economics', 'level' => 'BS', 'duration' => '4 Years', 'seats' => 60]],
                'courses' => ['1st Semester' => ['Microeconomics I', 'Mathematics for Economists', 'English', 'Islamic Studies', 'Pakistan Studies']],
                'faculty' => [['name' => 'Prof. [Name]', 'designation' => 'HOD', 'qualification' => 'PhD Economics', 'specialization' => 'Development Economics']],
                'fee' => [['title' => 'Tuition Fee (Per Semester)', 'amount' => '11,000']],
                'labs' => [['name' => 'Economics Lab', 'capacity' => '20 PCs', 'software' => 'STATA, EViews']],
                'news' => [['title' => 'Economics Seminar on CPEC Impact', 'date' => '12 Apr 2025', 'new' => true]],
                'announcements' => [['title' => 'BS Economics Admissions Open', 'date' => '05 Apr 2025', 'new' => true]],
                'gallery' => ['images/gallery.jpeg'],
                'admission_requirements' => ['FA / FSc with any group', 'Min 45%', 'CNIC', 'Domicile'],
                'hod_message' => 'Economics shapes policy and society. We prepare students to be informed analysts and leaders in economic affairs.',
            ],

            'ps' => [
                'slug' => 'ps', 'name' => 'Political Science', 'fullName' => 'Department of Political Science',
                'icon' => '🏛️', 'image' => 'images/ps.png', 'color' => '#1a6fa8',
                'intro' => 'The Department of Political Science offers programs that develop critical understanding of governance, international relations, and political theory.',
                'intro2' => 'Our graduates serve in civil services, diplomacy, journalism, and academia.',
                'hod' => 'Prof. [HOD Name]', 'hod_qual' => 'PhD Political Science', 'phone' => '0997-XXXXXXX', 'email' => 'ps@gpgcm.edu.pk', 'block' => 'Arts Block',
                'programs' => [['name' => 'BS Political Science', 'level' => 'BS', 'duration' => '4 Years', 'seats' => 60]],
                'courses' => ['1st Semester' => ['Introduction to Political Science', 'Pakistan Studies', 'English', 'Islamic Studies', 'History of Subcontinent']],
                'faculty' => [['name' => 'Prof. [Name]', 'designation' => 'HOD', 'qualification' => 'PhD Pol Sci', 'specialization' => 'International Relations']],
                'fee' => [['title' => 'Tuition Fee (Per Semester)', 'amount' => '10,000']],
                'labs' => [],
                'news' => [['title' => 'Model UN Simulation 2025', 'date' => '18 Apr 2025', 'new' => true]],
                'announcements' => [['title' => 'BS Political Science Admissions Open', 'date' => '05 Apr 2025', 'new' => true]],
                'gallery' => ['images/gallery.jpeg'],
                'admission_requirements' => ['FA / FSc any group', 'Min 45%', 'CNIC', 'Domicile'],
                'hod_message' => 'Political Science is the study of power, governance, and society. We cultivate informed and engaged citizens.',
            ],

            'islamic' => [
                'slug' => 'islamic', 'name' => 'Islamic Studies', 'fullName' => 'Department of Islamic Studies',
                'icon' => '☪️', 'image' => 'images/islamic.png', 'color' => '#1a6fa8',
                'intro' => 'The Department of Islamic Studies offers comprehensive programs covering Quran, Hadith, Islamic Law, and Islamic History.',
                'intro2' => 'Our programs aim to develop scholars and educators who can contribute to the moral and spiritual development of society.',
                'hod' => 'Prof. [HOD Name]', 'hod_qual' => 'PhD Islamic Studies', 'phone' => '0997-XXXXXXX', 'email' => 'islamic@gpgcm.edu.pk', 'block' => 'Arts Block',
                'programs' => [['name' => 'BS Islamic Studies', 'level' => 'BS', 'duration' => '4 Years', 'seats' => 60]],
                'courses' => ['1st Semester' => ['Quran & Translation', 'Islamic History I', 'English', 'Pakistan Studies', 'Arabic I']],
                'faculty' => [['name' => 'Prof. [Name]', 'designation' => 'HOD', 'qualification' => 'PhD Islamic Studies', 'specialization' => 'Fiqh & Usool']],
                'fee' => [['title' => 'Tuition Fee (Per Semester)', 'amount' => '10,000']],
                'labs' => [],
                'news' => [['title' => 'Seerah Conference 2025', 'date' => '15 Apr 2025', 'new' => true]],
                'announcements' => [['title' => 'BS Islamic Studies Admissions Open', 'date' => '05 Apr 2025', 'new' => true]],
                'gallery' => ['images/gallery.jpeg'],
                'admission_requirements' => ['FA / FSc any group', 'Min 45%', 'CNIC', 'Domicile'],
                'hod_message' => 'Islamic Studies nurtures spiritual growth alongside academic excellence. We are committed to producing scholars of impeccable character.',
            ],

            'english' => [
                'slug' => 'english', 'name' => 'English', 'fullName' => 'Department of English',
                'icon' => '📝', 'image' => 'images/english.png', 'color' => '#1a6fa8',
                'intro' => 'The Department of English offers programs in English Literature and Applied Linguistics, developing communication, analytical, and literary skills.',
                'intro2' => 'Our graduates work in education, media, corporate communication, and civil services.',
                'hod' => 'Prof. [HOD Name]', 'hod_qual' => 'PhD English Literature', 'phone' => '0997-XXXXXXX', 'email' => 'english@gpgcm.edu.pk', 'block' => 'Arts Block',
                'programs' => [['name' => 'BS English', 'level' => 'BS', 'duration' => '4 Years', 'seats' => 60]],
                'courses' => ['1st Semester' => ['Introduction to Literature', 'Grammar & Composition', 'Islamic Studies', 'Pakistan Studies', 'Linguistics I']],
                'faculty' => [['name' => 'Prof. [Name]', 'designation' => 'HOD', 'qualification' => 'PhD English', 'specialization' => 'Applied Linguistics']],
                'fee' => [['title' => 'Tuition Fee (Per Semester)', 'amount' => '10,000']],
                'labs' => [['name' => 'Language Lab', 'capacity' => '20 PCs', 'software' => 'Language learning software']],
                'news' => [['title' => 'Annual Literary Festival 2025', 'date' => '20 Apr 2025', 'new' => true]],
                'announcements' => [['title' => 'BS English Admissions Open', 'date' => '05 Apr 2025', 'new' => true]],
                'gallery' => ['images/gallery.jpeg'],
                'admission_requirements' => ['FA / FSc any group', 'Min 45%', 'CNIC', 'Domicile'],
                'hod_message' => 'English opens doors to the world. Our department fosters linguistic excellence and critical literary thinking.',
            ],

            'urdu' => [
                'slug' => 'urdu', 'name' => 'Urdu', 'fullName' => 'Department of Urdu',
                'icon' => '🖊️', 'image' => 'images/urdu.png', 'color' => '#1a6fa8',
                'intro' => 'The Department of Urdu preserves and promotes Pakistan\'s national language through academic programs in Urdu Literature and Linguistics.',
                'intro2' => 'Our graduates serve in education, journalism, literature, and government translation services.',
                'hod' => 'Prof. [HOD Name]', 'hod_qual' => 'PhD Urdu', 'phone' => '0997-XXXXXXX', 'email' => 'urdu@gpgcm.edu.pk', 'block' => 'Arts Block',
                'programs' => [['name' => 'BS Urdu', 'level' => 'BS', 'duration' => '4 Years', 'seats' => 60]],
                'courses' => ['1st Semester' => ['Classical Urdu Literature', 'Pakistani Literature', 'English', 'Islamic Studies', 'Pakistan Studies']],
                'faculty' => [['name' => 'Prof. [Name]', 'designation' => 'HOD', 'qualification' => 'PhD Urdu', 'specialization' => 'Urdu Poetry']],
                'fee' => [['title' => 'Tuition Fee (Per Semester)', 'amount' => '10,000']],
                'labs' => [],
                'news' => [['title' => 'Urdu Adabi Mehfil 2025', 'date' => '21 Apr 2025', 'new' => true]],
                'announcements' => [['title' => 'BS Urdu Admissions Open', 'date' => '05 Apr 2025', 'new' => true]],
                'gallery' => ['images/gallery.jpeg'],
                'admission_requirements' => ['FA / FSc any group', 'Min 45%', 'CNIC', 'Domicile'],
                'hod_message' => 'Urdu is our national identity and cultural heritage. We are proud to carry forward this legacy through quality education.',
            ],

            'pashto' => [
                'slug' => 'pashto', 'name' => 'Pashto', 'fullName' => 'Department of Pashto',
                'icon' => '📜', 'image' => 'images/pashto.png', 'color' => '#1a6fa8',
                'intro' => 'The Department of Pashto promotes the rich literary and cultural heritage of the Pashto language through comprehensive academic programs.',
                'intro2' => 'Our programs develop scholars who contribute to Pashto literature, journalism, and cultural preservation.',
                'hod' => 'Prof. [HOD Name]', 'hod_qual' => 'PhD Pashto', 'phone' => '0997-XXXXXXX', 'email' => 'pashto@gpgcm.edu.pk', 'block' => 'Arts Block',
                'programs' => [['name' => 'BS Pashto', 'level' => 'BS', 'duration' => '4 Years', 'seats' => 60]],
                'courses' => ['1st Semester' => ['Classical Pashto Literature', 'Modern Pashto', 'English', 'Islamic Studies', 'Pakistan Studies']],
                'faculty' => [['name' => 'Prof. [Name]', 'designation' => 'HOD', 'qualification' => 'PhD Pashto', 'specialization' => 'Pashto Literature']],
                'fee' => [['title' => 'Tuition Fee (Per Semester)', 'amount' => '10,000']],
                'labs' => [],
                'news' => [['title' => 'Pashto Cultural Week 2025', 'date' => '19 Apr 2025', 'new' => true]],
                'announcements' => [['title' => 'BS Pashto Admissions Open', 'date' => '05 Apr 2025', 'new' => true]],
                'gallery' => ['images/gallery.jpeg'],
                'admission_requirements' => ['FA / FSc any group', 'Min 45%', 'CNIC', 'Domicile'],
                'hod_message' => 'Pashto is our cultural pride. We are committed to preserving and advancing this beautiful language.',
            ],
        ];

        return $depts[$slug] ?? $depts['cs'];
    }

    public function show(string $slug)
    {
        $dept = $this->getDeptData($slug);
        return view('departments.show', compact('dept'));
    }

    public function hodMessage(string $slug)
    {
        $dept = $this->getDeptData($slug);
        return view('departments.hod-message', compact('dept'));
    }

    public function courseOutline(string $slug)
    {
        $dept = $this->getDeptData($slug);
        return view('departments.course-outline', compact('dept'));
    }

    public function faculty(string $slug)
    {
        $dept = $this->getDeptData($slug);
        return view('departments.faculty', compact('dept'));
    }

    public function feeStructure(string $slug)
    {
        $dept = $this->getDeptData($slug);
        return view('departments.fee-structure', compact('dept'));
    }

    public function admissions(string $slug)
    {
        $dept = $this->getDeptData($slug);
        return view('departments.admissions', compact('dept'));
    }

    public function labs(string $slug)
    {
        $dept = $this->getDeptData($slug);
        return view('departments.labs', compact('dept'));
    }

    public function programGoals(string $slug)
    {
        $dept = $this->getDeptData($slug);
        return view('departments.program-goals', compact('dept'));
    }

    public function downloads(string $slug)
    {
        $dept = $this->getDeptData($slug);
        return view('departments.downloads', compact('dept'));
    }

    public function results(string $slug)
    {
        $dept = $this->getDeptData($slug);
        return view('departments.results', compact('dept'));
    }

    public function dateSheets(string $slug)
    {
        $dept = $this->getDeptData($slug);
        return view('departments.date-sheets', compact('dept'));
    }

    public function semesterRules(string $slug)
    {
        $dept = $this->getDeptData($slug);
        return view('departments.semester-rules', compact('dept'));
    }
}
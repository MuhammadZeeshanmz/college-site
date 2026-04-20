<?php

use App\Http\Controllers\DepartmentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('/department/{department}', function ($department) {

    if ($department == 'cs') {
        return view('departments.sciences.computer');
    }

    if ($department == 'it') {
        return view('departments.sciences.it');
    }

    if ($department == 'math') {
        return view('departments.sciences.math');
    }

    if ($department == 'physics') {
        return view('departments.sciences.physics');
    }

    if ($department == 'chem') {
        return view('departments.sciences.chemistry');
    }
    if ($department == 'stat') {
        return view('departments.sciences.statistics');
    }
    if ($department == 'zoology') {
        return view('departments.sciences.zoology');
    }
    if ($department == 'botany') {
        return view('departments.sciences.botany');
    }
    if ($department == 'urdu') {
        return view('departments.social_sciences.urdu');
    }
    if ($department == 'eco') {
        return view('departments.social_sciences.economics');
    }
    if ($department == 'english') {
        return view('departments.social_sciences.english');
    }

    if ($department == 'islamic') {
        return view('departments.social_sciences.islamiat');
    }

    if ($department == 'ps') {
        return view('departments.social_sciences.political_science');
    }

    if ($department == 'pashto') {
        return view('departments.social_sciences.pashto');
    }

    return view('departments.show', compact('department'));
})->name('department.show');

Route::get('/faculty-members', function () {
    return view('faculty-members.faculty-members');
})->name('faculty-members');

Route::get('/academics', function () {
    return view('academics.acadmics');
})->name('academics');

Route::get('/examinations', function () {
    return view('examinations.examinations');
})->name('examinations');

Route::get('/scholarships', function () {
    return view('scholarships.scholarships');
})->name('scholarships');

Route::get('/qec', function () {
    return view('qec.qec');
})->name('qec');

Route::get('/semester-rules', function () {
    return view('semester_rules.rules');
})->name('semester-rules');

Route::get('/library', function () {
    return view('library.library');
})->name('library');
Route::get('/gcm-gallery', function () {
    return view('gcm-gallery.gcm-gallery');
})->name('gcm-gallery');

Route::get('/important', function () {
    return view('important.important');
})->name('important');


Route::get('/tenders', function () {
    return view('tenders.tenders');
})->name('tenders');

// Journals listing page (already exists - bas name change karo)
Route::get('/journals', function () {
    return view('journals.journals');
})->name('journals.index');   // <-- 'journals' ki jagah 'journals.index'

// Journal detail page (naya add karo)
Route::get('/journals/{slug}', function ($slug) {
    return view('journals.journal-detail', ['slug' => $slug, 'journal' => journalData($slug)]);
})->name('journal.detail');

// PRincipal's office page

Route::get('/principal', function () {
    return view('principal.principal');
})->name('principal');


// Student Financial Aids Office page

Route::get('/student-office', function () {
    return view('student-office.student-office');
})->name('student-office');


// Registrar Office page

Route::get('/registration-office', function () {
    return view('registration-office.registration-office');
})->name('registration-office');


// Quality Enhancement Cell (QEC) page
Route::get('/quality-cell', function () {
    return view('quality-cell.quality-cell');
})->name('quality-cell');

// Contact Us page

Route::get('/contact-us', function () {
    return view('contact-us.contact-us');
})->name('contact-us');

// Alumni Portal page

Route::get('/alumni', function () {
    return view('alumni.alumni');
})->name('alumni');

// Jobs & Career page
Route::get('/jobs-career', function () {
    return view('jobs-career.jobs-career');
})->name('jobs-career');


//  Downloads page

Route::get('/downloads', function () {
    return view('downloads.downloads');
})->name('downloads');
// ─────────────────────────────────────────────
// 2) Is helper function ko bhi web.php ke
//    UPAR (routes se pehle) add karo
// ─────────────────────────────────────────────

function journalData(string $slug): array
{
    $journals = [
        'social-sciences' => [
            'title'      => 'Journal of Social Sciences (GPGC-JSS)',
            'short_name' => 'GPGC-JSS',
            'full_name'  => 'Journal of Social Sciences',
            'issn'       => 'XXXX-XXXX',
            'email'      => 'jss@gcmansehra.edu.pk',
            'frequency'  => 'Bi-Annual (2 Issues per Year)',
            'start_year' => '2020',
            'discipline' => 'Social Sciences and Humanities',
            'intro_1'    => 'Welcome to the home of the Govt. Post Graduate College Mansehra Journal of Social Sciences (GPGC-JSS), published by GPGC Mansehra. We bring the highest quality research to the widest possible audience and provide authors with excellent level of services.',
            'intro_2'    => 'Our products and services are designed to address the needs of individual researchers and research institutions alike. With a team of experienced editorial board members, we are strongly positioned to deliver exceptional services to the academic community.',
            'intro_3'    => 'GPGC-JSS maintains a culture of excellence and goes to great lengths to ensure that researchers are satisfied at all times. Our values are hinged upon professionalism, integrity, and superior service delivery.',
            'about_1'    => 'The Journal of Social Sciences (GPGC-JSS) is a double-blind peer-reviewed academic journal published by Govt. Post Graduate College Mansehra, KPK, Pakistan. It serves as a platform for scholars, academicians, and researchers to share original research findings.',
            'about_2'    => 'GPGC-JSS publishes original research articles, review articles, and case studies from all areas of Social Sciences, Humanities, and related interdisciplinary fields.',
            'editorial_board' => [
                ['name' => 'Prof. Dr. [Principal Name]', 'role' => 'Patron-in-Chief',       'affiliation' => 'GPGC Mansehra'],
                ['name' => 'Prof. [HOD Name]',           'role' => 'Editor-in-Chief',        'affiliation' => 'Dept. of Social Sciences, GPGC Mansehra'],
                ['name' => 'Dr. [Faculty Name]',         'role' => 'Associate Editor',       'affiliation' => 'Dept. of Pakistan Studies, GPGC Mansehra'],
                ['name' => 'Dr. [Faculty Name]',         'role' => 'Member Editorial Board', 'affiliation' => 'Hazara University, Mansehra'],
                ['name' => 'Dr. [External Expert]',      'role' => 'Member Editorial Board', 'affiliation' => 'University of Peshawar'],
            ],
            'topics' => [
                'Sociology and Social Issues in Pakistan',
                'Political Science and Governance',
                'Economics and Development Studies',
                'Pakistan Studies and History',
                'Islamic Studies and Ethics',
                'Gender Studies and Women Empowerment',
                'Education Policy and Management',
                'Regional Studies — Hazara Division',
                'Public Administration and Policy',
                'International Relations',
            ],
        ],

        'computer-science' => [
            'title'      => 'Journal of Computer Science (GPGC-JCS)',
            'short_name' => 'GPGC-JCS',
            'full_name'  => 'Journal of Computer Science',
            'issn'       => 'XXXX-XXXX',
            'email'      => 'jcs@gcmansehra.edu.pk',
            'frequency'  => 'Bi-Annual (2 Issues per Year)',
            'start_year' => '2021',
            'discipline' => 'Computer Science and Information Technology',
            'intro_1'    => 'Welcome to the Journal of Computer Science (GPGC-JCS), published by Govt. Post Graduate College Mansehra. The journal is dedicated to publishing high-quality peer-reviewed research in Computer Science, Information Technology, and related disciplines.',
            'intro_2'    => 'GPGC-JCS bridges the gap between academic research and practical applications. We are committed to making research accessible to practitioners, academics, and students across Pakistan and internationally.',
            'intro_3'    => 'Our editorial board includes experienced academics from leading universities, ensuring rigorous review standards and publication of only the finest research.',
            'about_1'    => 'The Journal of Computer Science (GPGC-JCS) is a peer-reviewed academic journal published by Govt. Post Graduate College Mansehra. It provides a platform for researchers and practitioners to publish original research in all areas of computing and information technology.',
            'about_2'    => 'GPGC-JCS publishes original research articles, technical papers, and review articles covering theoretical and applied aspects of Computer Science.',
            'editorial_board' => [
                ['name' => 'Prof. Dr. [Principal Name]', 'role' => 'Patron-in-Chief',       'affiliation' => 'GPGC Mansehra'],
                ['name' => 'Prof. [HOD CS Name]',        'role' => 'Editor-in-Chief',        'affiliation' => 'Dept. of Computer Science, GPGC Mansehra'],
                ['name' => 'Dr. [Faculty Name]',         'role' => 'Associate Editor',       'affiliation' => 'Dept. of Computer Science, GPGC Mansehra'],
                ['name' => 'Dr. [External Expert]',      'role' => 'Member Editorial Board', 'affiliation' => 'Hazara University, Mansehra'],
                ['name' => 'Dr. [External Expert]',      'role' => 'Member Editorial Board', 'affiliation' => 'COMSATS University Abbottabad'],
            ],
            'topics' => [
                'Artificial Intelligence and Machine Learning',
                'Data Science and Big Data Analytics',
                'Software Engineering and Development',
                'Computer Networks and Cybersecurity',
                'Database Management Systems',
                'Web Technologies and Cloud Computing',
                'Internet of Things (IoT)',
                'Image Processing and Computer Vision',
                'Human-Computer Interaction',
                'Mobile Computing and Applications',
            ],
        ],

        'environmental-studies' => [
            'title'      => 'Journal of Environmental Studies (GPGC-JES)',
            'short_name' => 'GPGC-JES',
            'full_name'  => 'Journal of Environmental Studies',
            'issn'       => 'XXXX-XXXX',
            'email'      => 'jes@gcmansehra.edu.pk',
            'frequency'  => 'Bi-Annual (2 Issues per Year)',
            'start_year' => '2021',
            'discipline' => 'Environmental Sciences and Ecology',
            'intro_1'    => 'Welcome to the Journal of Environmental Studies (GPGC-JES), published by Govt. Post Graduate College Mansehra. Situated in the heart of the Hazara region — one of Pakistan\'s richest ecological zones — GPGC Mansehra is uniquely positioned to contribute to environmental research.',
            'intro_2'    => 'GPGC-JES publishes original research addressing environmental challenges, biodiversity, ecology, and natural resource management with a focus on Hazara division, Kaghan Valley, and broader KPK region.',
            'intro_3'    => 'Our journal is committed to promoting evidence-based environmental research that informs policy, conservation efforts, and sustainable development across Pakistan.',
            'about_1'    => 'The Journal of Environmental Studies (GPGC-JES) is a peer-reviewed academic journal covering research in Environmental Sciences, Botany, Zoology, Ecology, and Natural Resource Management.',
            'about_2'    => 'With its location in the Hazara region — home to rich biodiversity, glaciers, and diverse ecosystems — GPGC Mansehra offers a unique perspective and research base for environmental sciences.',
            'editorial_board' => [
                ['name' => 'Prof. Dr. [Principal Name]',      'role' => 'Patron-in-Chief',       'affiliation' => 'GPGC Mansehra'],
                ['name' => 'Prof. [HOD Botany/Zoology]',      'role' => 'Editor-in-Chief',        'affiliation' => 'Dept. of Botany, GPGC Mansehra'],
                ['name' => 'Dr. [Faculty Name]',              'role' => 'Associate Editor',       'affiliation' => 'Dept. of Zoology, GPGC Mansehra'],
                ['name' => 'Dr. [External Expert]',           'role' => 'Member Editorial Board', 'affiliation' => 'Hazara University, Mansehra'],
                ['name' => 'Dr. [External Expert]',           'role' => 'Member Editorial Board', 'affiliation' => 'University of Peshawar'],
            ],
            'topics' => [
                'Botany and Plant Sciences in KPK',
                'Zoology and Wildlife Conservation',
                'Ecology and Biodiversity — Hazara Region',
                'Environmental Pollution and Remediation',
                'Forestry and Natural Resource Management',
                'Climate Change and its Impact on Pakistan',
                'Water Resources and Watershed Management',
                'Soil Science and Land Degradation',
                'Ethnobotany and Medicinal Plants of Hazara',
                'Conservation Biology and Protected Areas',
            ],
        ],
    ];

    if (!array_key_exists($slug, $journals)) {
        abort(404, 'Journal not found.');
    }

    return $journals[$slug];
}




// About us page

Route::get('/about-us', function () {
    return view('about-us.about-us');
})->name('about-us');

Route::get('/vission-mission', function () {
    return view('vision-mission.vission-mission');
})->name('vission-mission');

// Social Work page

Route::get('/social-work', function () {
    return view('social-work.social-work');
})->name('social-work');

// Transport page

Route::get('/transport', function () {
    return view('transport.transport');
})->name('transport');

// Hostel page
Route::get('/hostel', function () {
    return view('hostel.hostel');
})->name('hostel');

Route::get('/news',           fn() => view('home'))->name('news');
Route::get('/faculty',        fn() => view('home'))->name('faculty');
Route::get('/results',        fn() => view('home'))->name('results');
Route::get('/student-portal', fn() => view('home'))->name('student-portal');






// Admin routes

Route::prefix('admin')->group(function () {

    Route::get('/login', function () {
        return view('admin.auth.login');
    })->name('admin.login');

    Route::post('/login', function () {
        // handle later
    })->name('admin.login.post');

    Route::post('/logout', function () {
        // handle later
    })->name('admin.logout');

    Route::get('/dashboard', function () {
        return view('admin.dashboard.index');
    })->name('admin.dashboard');

    // News
   Route::get('/news', function () {
    $news = new \Illuminate\Pagination\LengthAwarePaginator([], 0, 15);
    return view('admin.news.index', compact('news'));
})->name('admin.news.index');
    Route::get('/news/create', fn() => view('admin.news.create'))->name('admin.news.create');
    Route::get('/news/edit', fn() => view('admin.news.edit'))->name('admin.news.edit');

    // Announcements
    Route::get('/announcements', function () {
        $announcements = new \Illuminate\Pagination\LengthAwarePaginator([], 0, 15);
        return view('admin.announcements.index', compact('announcements'));
    })->name('admin.announcements.index');
    Route::get('/announcements/create', fn() => view('admin.announcements.create'))->name('admin.announcements.create');
    Route::get('/announcements/edit', fn() => view('admin.announcements.edit'))->name('admin.announcements.edit');

    // Gallery
    Route::get('/gallery', function () {
       $gallery = new \Illuminate\Pagination\LengthAwarePaginator([], 0, 15);
        return view('admin.gallery.index', compact('gallery'));
    })->name('admin.gallery.index');
    Route::get('/gallery/create', fn() => view('admin.gallery.create'))->name('admin.gallery.create');
    Route::get('/gallery/edit', fn() => view('admin.gallery.edit'))->name('admin.gallery.edit');

    // Tenders
    Route::get('/tenders', function () {
    $tenders = new \Illuminate\Pagination\LengthAwarePaginator([], 0, 15);
        return view('admin.tenders.index', compact('tenders'));
    })->name('admin.tenders.index');
    Route::get('/tenders/create', fn() => view('admin.tenders.create'))->name('admin.tenders.create');
    Route::get('/tenders/edit', fn() => view('admin.tenders.edit'))->name('admin.tenders.edit');

    // Downloads
    Route::get('/downloads', function () {
      $downloads = new \Illuminate\Pagination\LengthAwarePaginator([], 0, 15);
        return view('admin.downloads.index', compact('downloads'));
    })->name('admin.downloads.index');
    Route::get('/downloads/create', fn() => view('admin.downloads.create'))->name('admin.downloads.create');
    Route::get('/downloads/edit', fn() => view('admin.downloads.edit'))->name('admin.downloads.edit');

    // Faculty
    Route::get('/faculty', function () {
        $faculty = new \Illuminate\Pagination\LengthAwarePaginator([], 0, 15);
        return view('admin.faculty.index', compact('faculty'));
    })->name('admin.faculty.index');
    Route::get('/faculty/create', fn() => view('admin.faculty.create'))->name('admin.faculty.create');
    Route::get('/faculty/edit', fn() => view('admin.faculty.edit'))->name('admin.faculty.edit');

    // Sliders
    Route::get('/sliders', function () {
     $sliders = new \Illuminate\Pagination\LengthAwarePaginator([], 0, 15);
        return view('admin.sliders.index', compact('sliders'));
    })->name('admin.sliders.index');
    Route::get('/sliders/create', fn() => view('admin.sliders.create'))->name('admin.sliders.create');
    Route::get('/sliders/edit', fn() => view('admin.sliders.edit'))->name('admin.sliders.edit');

});







// Department routes — dynamic
Route::get('/department/{slug}', [DepartmentController::class, 'show'])->name('department.show');
Route::get('/department/{slug}/hod-message', [DepartmentController::class, 'hodMessage'])->name('department.hod');
Route::get('/department/{slug}/course-outline', [DepartmentController::class, 'courseOutline'])->name('department.course');
Route::get('/department/{slug}/faculty', [DepartmentController::class, 'faculty'])->name('department.faculty');
Route::get('/department/{slug}/fee-structure', [DepartmentController::class, 'feeStructure'])->name('department.fee');
Route::get('/department/{slug}/admissions', [DepartmentController::class, 'admissions'])->name('department.admissions');
Route::get('/department/{slug}/labs', [DepartmentController::class, 'labs'])->name('department.labs');
Route::get('/department/{slug}/program-goals', [DepartmentController::class, 'programGoals'])->name('department.goals');
Route::get('/department/{slug}/downloads', [DepartmentController::class, 'downloads'])->name('department.downloads');
Route::get('/department/{slug}/results', [DepartmentController::class, 'results'])->name('department.results');
Route::get('/department/{slug}/date-sheets', [DepartmentController::class, 'dateSheets'])->name('department.datesheets');
Route::get('/department/{slug}/semester-rules', [DepartmentController::class, 'semesterRules'])->name('department.semester');
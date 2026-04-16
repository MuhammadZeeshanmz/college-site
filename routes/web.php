<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('home');
})->name('home');


/*
|--------------------------------------------------------------------------
| Departments
|--------------------------------------------------------------------------
*/
Route::get('/department/{department}', function ($department) {
    return view('departments.show', compact('department'));
})->name('department.show');


/*
|--------------------------------------------------------------------------
| Programs (linked from department pages)
|--------------------------------------------------------------------------
*/
Route::get('/department/{dept}/program/{program}', function ($dept, $program) {
    return view('programs.programs', compact('dept', 'program'));
})->name('programs.show');


/*
|--------------------------------------------------------------------------
| Faculty
|--------------------------------------------------------------------------
*/
Route::get('/faculty', function () {
    return view('Faculty.faculty');
})->name('faculty');


/*
|--------------------------------------------------------------------------
| News
|--------------------------------------------------------------------------
*/
Route::get('/news', function () {
    return view('News.news');
})->name('news');


/*
|--------------------------------------------------------------------------
| Results
|--------------------------------------------------------------------------
*/
Route::get('/results', function () {
    return view('Results.result');
})->name('results');


/*
|--------------------------------------------------------------------------
| Student Portal
|--------------------------------------------------------------------------
*/
Route::get('/student-portal', function () {
    return view('student_portal.student_portal');
})->name('student-portal');
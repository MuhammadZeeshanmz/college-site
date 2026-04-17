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
Route::get('/news',           fn() => view('home'))->name('news');
Route::get('/faculty',        fn() => view('home'))->name('faculty');
Route::get('/results',        fn() => view('home'))->name('results');
Route::get('/student-portal', fn() => view('home'))->name('student-portal');

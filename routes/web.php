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

    return view('departments.show', compact('department'));

})->name('department.show');



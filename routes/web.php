<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('interviewer/do_interview');
    // return view('interviewee/registration_form');
    return view('general/login');
    
});

Route::get('/add_event', function () {
    return view('interviewer/add_event');
})->name('add_event');

Route::get('/manage_interview', function () {
    return view('interviewer/manage_interview');
})->name('manage_interview');

Route::get('/register_to_event', function () {
    return view('interviewee/register_to_event');
})->name('register_to_event');

Route::get('/registration_form', function () {
    return view('interviewee/registration_form');
})->name('registration_form');

Route::get('/manage_applications', function () {
    return view('interviewee/manage_applications');
})->name('manage_applications');
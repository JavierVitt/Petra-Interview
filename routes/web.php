<?php

use Illuminate\Support\Facades\Route;

// login
Route::get('/', function () {
    // return view('interviewer/do_interview');
    // return view('interviewee/registration_form');
    return view('general/login');
});

// interviewer
Route::get('/add_event', function () {
    return view('interviewer/add_event');
})->name('add_event');

Route::get('/manage_interview', function () {
    return view('interviewer/manage_interview');
})->name('manage_interview');

Route::get('/manage_interview_details', function () {
    return view('interviewer/manage_interview_details');
})->name('manage_interview_details');

Route::get('/set_interview_questions', function () {
    return view('interviewer/set_interview_questions');
})->name('set_interview_questions');

Route::get('/edit_available_schedule', function () {
    return view('interviewer/edit_available_schedule');
})->name('edit_available_schedule');

Route::get('/set_available_schedule', function () {
    return view('interviewer/set_available_schedule');
})->name('set_available_schedule');

Route::get('/do_interview', function () {
    return view('interviewer/do_interview');
})->name('do_interview');


// interviewee
Route::get('/register_to_event', function () {
    return view('interviewee/register_to_event');
})->name('register_to_event');

Route::get('/registration_form', function () {
    return view('interviewee/registration_form');
})->name('registration_form');

Route::get('/manage_applications', function () {
    return view('interviewee/manage_applications');
})->name('manage_applications');

// admin
Route::get('/manage_events', function () {
    return view('admin/manage_events');
})->name('manage_events');

Route::get('/detail_event', function () {
    return view('admin/detail_event');
})->name('detail_event');
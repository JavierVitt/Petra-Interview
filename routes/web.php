<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\InterviewController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// login
Route::get('/', function () {
    // return view('interviewer/do_interview');
    // return view('interviewee/registration_form');
    return view('general/login');
});

Route::post('/', [UserController::class, 'login'])->name('login');

Route::get('/sign_up', function () {
    return view('general/signup');
})->name('sign_up_page');

Route::post('/sign_up', [UserController::class, 'create'])->name('sign_up');

// interviewer
Route::get('/add_event', [UserController::class, 'showCreatePage'])->name('add_event');

Route::post('/add_event', [EventController::class, 'store'])->name('event.store');

Route::get('/manage_interview', [InterviewController::class, 'show'])->name('manage_interview');

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

Route::get('/set_available_schedule', function () {
    return view('interviewer.set_available_schedule');
})->name('set_available_schedule');

// Route::post('/set_available_schedule',[])

Route::get('/edit_available_schedule', function () {
    return view('interviewer.edit_available_schedule');
})->name('edit_available_schedule');

// interviewee

Route::get('/register_to_event', [EventController::class, 'index'])->name('register_to_event');

Route::get('/registration_form/{event}', [EventController::class, 'show'])->name('registration_form');

Route::post('/registration_form/{event}', [RegistrationController::class, 'store'])->name('add_registraion_form');


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

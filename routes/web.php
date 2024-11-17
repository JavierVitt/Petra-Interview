<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('general/login');
    // return view('interviewer/questions');
});

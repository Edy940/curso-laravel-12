<?php

use App\Http\Controllers\CoursesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/index-course', [CoursesController::class,'index'])->name('courses.index');
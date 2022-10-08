<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\admin\EnrollmentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EventController;

Route::middleware([
'auth:sanctum',
config('jetstream.auth_session'),
'verified'
])->group(function () {


Route::get('/dashboard', [DashboardController::class,'dashboard'])->name('dashboard');


Route::resource('teachers',TeacherController::class)->middleware('is_admin');

Route::middleware('admin_teacher')->group(function (){
    Route::resource('courses',CourseController::class);
    Route::get('/change-course-status/{id}',[CourseController::class,'changeStatus'])->name('change-course-status');
    Route::get('/change-event-status/{id}',[EventController::class,'changeStatus'])->name('change-event-status');
});


Route::resource('enroll', EnrollmentController::class);
Route::resource('student', StudentController::class);
Route::resource('event', EventController::class);




});


<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserCourseController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('login', function () {
    return view('auth.login');
})->name('login');


Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('users', UserController::class);
Route::resource('courses', CourseController::class);
Route::resource('userCourses', UserCourseController::class);




require __DIR__.'/auth.php';

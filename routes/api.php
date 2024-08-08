
<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ApiCourseController;

Route::middleware('admin')->group(function () {
    Route::get('/courses/title-in', [CourseController::class, 'titleIn']);
    Route::get('/courses/title-not-in', [CourseController::class, 'titleNotIn']);
    Route::get('/courses/count', [CourseController::class, 'countCourses']);
    Route::get('/courses/fees', [CourseController::class, 'calculateFees']);
});

Route::middleware('user')->group(function () {
    Route::get('userCourses/{id}', [ApiUserCourseController::class, 'show']);
});

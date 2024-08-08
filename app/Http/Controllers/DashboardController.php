<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users = \App\Models\User::all();
        $courses = \App\Models\Course::all();
        $userCourses = \App\Models\UserCourse::all();
        return view('dashboard.index', compact('users', 'courses', 'userCourses'));
    }
}

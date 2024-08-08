<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\UserCourse;
use Illuminate\Http\Request;

class UserCourseController extends Controller
{
    public function index()
    {
        $userCourses = UserCourse::with('user', 'course')->get();
        return view('userCourses.index', compact('userCourses'));
    }

    public function create()
    {
        $users = User::all();
        $courses = Course::all();
        return view('userCourses.create', compact('users', 'courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'course_id' => 'required|exists:courses,id',
        ]);

        UserCourse::create([
            'user_id' => $request->user_id,
            'course_id' => $request->course_id,
        ]);

        return redirect()->route('userCourses.index');
    }

    public function show(UserCourse $userCourse)
    {
        return view('userCourses.show', compact('userCourse'));
    }

    public function edit(UserCourse $userCourse)
    {
        $users = User::all();
        $courses = Course::all();
        return view('userCourses.edit', compact('userCourse', 'users', 'courses'));
    }

    public function update(Request $request, UserCourse $userCourse)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'course_id' => 'required|exists:courses,id',
        ]);

        $userCourse->update([
            'user_id' => $request->user_id,
            'course_id' => $request->course_id,
        ]);

        return redirect()->route('userCourses.index');
    }

    public function destroy(UserCourse $userCourse)
    {
        $userCourse->delete();
        return redirect()->route('userCourses.index');
    }
}

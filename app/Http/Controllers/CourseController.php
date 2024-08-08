<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'course' => 'required|string|max:255',
            'mentor' => 'required|string|max:255',
            'title' => 'required|string|max:255',
        ]);

        Course::create([
            'course' => $request->course,
            'mentor' => $request->mentor,
            'title' => $request->title,
        ]);

        return redirect()->route('courses.index');
    }

    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'course' => 'required|string|max:255',
            'mentor' => 'required|string|max:255',
            'title' => 'required|string|max:255',
        ]);

        $course->update([
            'course' => $request->course,
            'mentor' => $request->mentor,
            'title' => $request->title,
        ]);

        return redirect()->route('courses.index');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index');
    }
}

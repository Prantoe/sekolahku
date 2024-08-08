<?php

namespace App\Http\Controllers;

use App\Models\UserCourse;
use Illuminate\Http\Request;

class UserCourseController extends Controller
{
    public function index()
    {
        return UserCourse::with('user', 'course')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'course_id' => 'required|exists:courses,id',
        ]);

        $userCourse = UserCourse::create($request->all());
        return response()->json($userCourse, 201);
    }

    public function show(UserCourse $userCourse)
    {
        return $userCourse;
    }

    public function update(Request $request, UserCourse $userCourse)
    {
        $userCourse->update($request->all());
        return response()->json($userCourse, 200);
    }

    public function destroy(UserCourse $userCourse)
    {
        $userCourse->delete();
        return response()->json(null, 204);
    }
}

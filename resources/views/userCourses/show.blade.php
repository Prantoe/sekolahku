@extends('layouts.app')

@section('title', 'User Course Details')

@section('userCourses-content')
    <h3 class="text-center my-4">User Course Details</h3>
    <hr>
    <div class="mb-3">
        <strong>User:</strong> {{ $userCourse->user->username }}
    </div>
    <div class="mb-3">
        <strong>Course:</strong> {{ $userCourse->course->title }}
    </div>
    <a href="{{ route('userCourses.index') }}" class="btn btn-primary">Back to List</a>
@endsection

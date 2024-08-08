@extends('layouts.app')

@section('title', 'Edit User Course')

@section('userCourses-content')
    <h3 class="text-center my-4">Edit User Course</h3>
    <hr>
    <form action="{{ route('userCourses.update', $userCourse->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="user_id" class="form-label">User</label>
            <select id="user_id" name="user_id" class="form-select" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $userCourse->user_id ? 'selected' : '' }}>
                        {{ $user->username }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="course_id" class="form-label">Course</label>
            <select id="course_id" name="course_id" class="form-select" required>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ $course->id == $userCourse->course_id ? 'selected' : '' }}>
                        {{ $course->title }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection

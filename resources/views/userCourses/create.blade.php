@extends('layouts.app')

@section('title', 'Add User Course')

@section('userCourses-content')
    <h3 class="text-center my-4">Add User Course</h3>
    <hr>
    <form action="{{ route('userCourses.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="user_id" class="form-label">User</label>
            <select id="user_id" name="user_id" class="form-select" required>
                <option value="">Select User</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->username }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="course_id" class="form-label">Course</label>
            <select id="course_id" name="course_id" class="form-select" required>
                <option value="">Select Course</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
@endsection

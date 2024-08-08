@extends('layouts.app')

@section('title', 'User Courses')

@section('userCourses-content')
    <h3 class="text-center my-4">Data User Courses</h3>
    <hr>
    <a href="{{ route('userCourses.create') }}" class="btn btn-md btn-success mb-3">Add User Course</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">User</th>
                <th scope="col">Course</th>
                <th scope="col" style="width: 20%">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($userCourses as $userCourse)
                <tr>
                    <td>{{ $userCourse->user->username }}</td>
                    <td>{{ $userCourse->course->title }}</td>
                    <td class="text-center">
                        <form onsubmit="return confirm('Are you sure?');" action="{{ route('userCourses.destroy', $userCourse->id) }}" method="POST">
                            <a href="{{ route('userCourses.show', $userCourse->id) }}" class="btn btn-sm btn-dark">Show</a>
                            <a href="{{ route('userCourses.edit', $userCourse->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">No user courses available.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection

{{-- resources/views/dashboard/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Dashboard')

@section('users-content')
    <h3 class="text-center my-4">Data Users</h3>
    <hr>
    <a href="{{ route('users.create') }}" class="btn btn-md btn-success mb-3">Add User</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col" style="width: 20%">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td class="text-center">
                        <form onsubmit="return confirm('Are you sure?');" action="{{ route('users.destroy', $user->id) }}" method="POST">
                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-dark">Show</a>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">No users available.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection

@section('courses-content')
    <h3 class="text-center my-4">Data Courses</h3>
    <hr>
    <a href="{{ route('courses.create') }}" class="btn btn-md btn-success mb-3">Add Course</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Course</th>
                <th scope="col">Mentor</th>
                <th scope="col">Title</th>
                <th scope="col" style="width: 20%">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($courses as $course)
                <tr>
                    <td>{{ $course->course }}</td>
                    <td>{{ $course->mentor }}</td>
                    <td>{{ $course->title }}</td>
                    <td class="text-center">
                        <form onsubmit="return confirm('Are you sure?');" action="{{ route('courses.destroy', $course->id) }}" method="POST">
                            <a href="{{ route('courses.show', $course->id) }}" class="btn btn-sm btn-dark">Show</a>
                            <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No courses available.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection

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
                    <td>{{ $userCourse->course->course }}</td>
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

@extends('layouts.app')

@section('title', 'Courses')

@section('courses-content')
    <h3 class="text-center my-4">Data Courses</h3>
    <hr>
    <a href="{{ route('courses.create') }}" class="btn btn-md btn-success mb-3">Add Course</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Course Name</th>
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

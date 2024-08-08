@extends('layouts.app')

@section('title', 'Edit Course')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('courses.update', $course->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Course</label>
                                <input type="text" class="form-control @error('course') is-invalid @enderror" name="course" value="{{ old('course', $course->course) }}" placeholder="Enter Course">

                                @error('course')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Mentor</label>
                                <input type="text" class="form-control @error('mentor') is-invalid @enderror" name="mentor" value="{{ old('mentor', $course->mentor) }}" placeholder="Enter Mentor">

                                @error('mentor')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $course->title) }}" placeholder="Enter Title">

                                @error('title')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary me-3">Update</button>
                            <a href="{{ route('courses.index') }}" class="btn btn-md btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('title', 'Course Details')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h3>{{ $course->title }}</h3>
                        <p><strong>Course:</strong> {{ $course->course }}</p>
                        <p><strong>Mentor:</strong> {{ $course->mentor }}</p>

                        <a href="{{ route('courses.index') }}" class="btn btn-md btn-secondary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

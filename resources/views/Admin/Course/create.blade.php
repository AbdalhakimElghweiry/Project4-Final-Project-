@extends('layouts.dashboard')

@section('title', 'Add Course')

@section('content')
<div class="container">
    <h1>Add Course</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('course.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Course Name</label>
                    <input type="text" name="course_name" class="form-control" value="{{ old('course_name') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Course code</label>
                    <input type="text" name="course_code" class="form-control" value="{{ old('course_code') }}" required>
                </div>

                <button class="btn btn-primary">Create</button>
                <a href="{{ route('course.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
@extends('layouts.dashboard')

@section('title', 'Course Details')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Course Details</h3>
            <a href="{{ route('course.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-3 font-weight-bold">ID:</div>
                <div class="col-md-9">{{ $course->id }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 font-weight-bold">Name:</div>
                <div class="col-md-9">{{ $course->name }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 font-weight-bold">Symbol:</div>
                <div class="col-md-9">{{ $course->symbol }}</div>
            </div>
             <div class="row mb-3">
                <div class="col-md-3 font-weight-bold">Unit:</div>
                <div class="col-md-9">{{ $course->unit }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 font-weight-bold">Created At:</div>
                <div class="col-md-9">{{ $course->created_at }}</div>
            </div>
             <div class="row mb-3">
                <div class="col-md-3 font-weight-bold">Updated At:</div>
                <div class="col-md-9">{{ $course->updated_at }}</div>
            </div>
            <div class="d-flex mt-4">
                 <a href="{{ route('course.edit', $course->id) }}" class="btn btn-primary mr-2">Edit</a>
                 <form action="{{ route('course.destroy', $course->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this course?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

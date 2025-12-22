@extends('layouts.dashboard')

@section('title', 'Student Details')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Student Details</h3>
            <a href="{{ route('student.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-3 font-weight-bold">ID:</div>
                <div class="col-md-9">{{ $student->id }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 font-weight-bold">Student No:</div>
                <div class="col-md-9">{{ $student->stNo }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 font-weight-bold">Name:</div>
                <div class="col-md-9">{{ $student->name }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 font-weight-bold">Email:</div>
                <div class="col-md-9">{{ $student->email }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 font-weight-bold">Average:</div>
                <div class="col-md-9">{{ $student->avg }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 font-weight-bold">Status:</div>
                <div class="col-md-9">
                    <span class="badge badge-{{ $student->status == 'active' ? 'success' : ($student->status == 'dismissed' ? 'danger' : 'warning') }}">
                        {{ $student->status }}
                    </span>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 font-weight-bold">Created At:</div>
                <div class="col-md-9">{{ $student->created_at }}</div>
            </div>
             <div class="row mb-3">
                <div class="col-md-3 font-weight-bold">Updated At:</div>
                <div class="col-md-9">{{ $student->updated_at }}</div>
            </div>
            <div class="d-flex mt-4">
                 <a href="{{ route('student.edit', $student->id) }}" class="btn btn-primary mr-2">Edit</a>
                 <form action="{{ route('student.destroy', $student->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this student?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

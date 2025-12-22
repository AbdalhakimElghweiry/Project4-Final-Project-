@extends('layouts.dashboard')

@section('title', 'Enrollment Details')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Enrollment Details</h3>
            <a href="{{ route('enrollment.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-3 font-weight-bold">ID:</div>
                <div class="col-md-9">{{ $enrollment->id }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 font-weight-bold">Student:</div>
                <div class="col-md-9">{{ $enrollment->student->name ?? 'N/A' }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 font-weight-bold">Course:</div>
                <div class="col-md-9">{{ $enrollment->course->name ?? 'N/A' }}</div>
            </div>
             <div class="row mb-3">
                <div class="col-md-3 font-weight-bold">Professor:</div>
                <div class="col-md-9">{{ $enrollment->professor->name ?? 'N/A' }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 font-weight-bold">Mark:</div>
                <div class="col-md-9">{{ $enrollment->mark }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 font-weight-bold">Created At:</div>
                <div class="col-md-9">{{ $enrollment->created_at }}</div>
            </div>
             <div class="row mb-3">
                <div class="col-md-3 font-weight-bold">Updated At:</div>
                <div class="col-md-9">{{ $enrollment->updated_at }}</div>
            </div>
            <div class="d-flex mt-4">
                 <a href="{{ route('enrollment.edit', $enrollment->id) }}" class="btn btn-primary mr-2">Edit</a>
                 <form action="{{ route('enrollment.destroy', $enrollment->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this enrollment?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.dashboard')

@section('title', 'Department Details')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Department Details</h3>
            <a href="{{ route('department.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-3 font-weight-bold">ID:</div>
                <div class="col-md-9">{{ $department->id }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 font-weight-bold">Name:</div>
                <div class="col-md-9">{{ $department->name }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 font-weight-bold">Symbol:</div>
                <div class="col-md-9">{{ $department->symbol }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 font-weight-bold">Created At:</div>
                <div class="col-md-9">{{ $department->created_at }}</div>
            </div>
             <div class="row mb-3">
                <div class="col-md-3 font-weight-bold">Updated At:</div>
                <div class="col-md-9">{{ $department->updated_at }}</div>
            </div>
            <div class="d-flex mt-4">
                 <a href="{{ route('department.edit', $department->id) }}" class="btn btn-primary mr-2">Edit</a>
                 <form action="{{ route('department.destroy', $department->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this department?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

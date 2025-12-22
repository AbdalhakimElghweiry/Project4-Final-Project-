@extends('layouts.dashboard')

@section('title', 'Professor Details')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Professor Details</h3>
            <a href="{{ route('professor.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-3 font-weight-bold">ID:</div>
                <div class="col-md-9">{{ $professor->id }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 font-weight-bold">Name:</div>
                <div class="col-md-9">{{ $professor->name }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 font-weight-bold">Email:</div>
                <div class="col-md-9">{{ $professor->email }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 font-weight-bold">Department:</div>
                <div class="col-md-9">{{ $professor->department->name ?? 'N/A' }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 font-weight-bold">Created At:</div>
                <div class="col-md-9">{{ $professor->created_at }}</div>
            </div>
             <div class="row mb-3">
                <div class="col-md-3 font-weight-bold">Updated At:</div>
                <div class="col-md-9">{{ $professor->updated_at }}</div>
            </div>
            <div class="d-flex mt-4">
                 <a href="{{ route('professor.edit', $professor->id) }}" class="btn btn-primary mr-2">Edit</a>
                 <form action="{{ route('professor.destroy', $professor->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this professor?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

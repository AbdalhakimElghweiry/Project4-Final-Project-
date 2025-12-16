@extends('layouts.dashboard')

@section('title', 'Edit Course')

@section('content')
<div class="container">
    <h1>Edit Course</h1>

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
            <form action="{{ route('course.update', $course->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Course Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $course->name) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Course Code</label>
                    <input type="text" name="symbol" class="form-control" value="{{ old('symbol', $course->symbol) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Unit</label>
                    <input type="number" step="0.5" name="unit" class="form-control" value="{{ old('unit', $course->unit) }}" required>
                </div>

                <button class="btn btn-primary">Save Changes</button>
                <a href="{{ route('course.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
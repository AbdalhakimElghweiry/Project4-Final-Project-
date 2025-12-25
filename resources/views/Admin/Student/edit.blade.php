@extends('layouts.dashboard')

@section('title', 'Edit Student')

@section('content')
<div class="container">
    <h1>Edit Student</h1>

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
            <form action="{{ route('student.update', $student->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $student->name) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Student No (stNo)</label>
                    <input type="text" name="stNo" class="form-control" value="{{ old('stNo', $student->stNo) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $student->email) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password (leave blank to keep current)</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Average (avg)</label>
                    <input type="number" step="0.01" name="avg" class="form-control" value="{{ old('avg', $student->avg ?? 0) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-control" required>
                        <option value="active" {{ (old('status', $student->status) == 'active') ? 'selected' : '' }}>Active</option>
                        <option value="notActive" {{ (old('status', $student->status) == 'notActive') ? 'selected' : '' }}>Not Active</option>
                        <option value="dismissed" {{ (old('status', $student->status) == 'dismissed') ? 'selected' : '' }}>Dismissed</option>
                    </select>
                </div>

                <button class="btn btn-primary">Save Changes</button>
                <a href="{{ route('student.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection

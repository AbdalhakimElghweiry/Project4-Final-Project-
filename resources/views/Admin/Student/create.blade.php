@extends('layouts.dashboard')

@section('title', 'Add Student')

@section('content')
<div class="container">
    <h1>Add Student</h1>

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
            <form action="{{ route('student.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Student No (stNo)</label>
                    <input type="text" name="stNo" class="form-control" value="{{ old('stNo') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Average (avg)</label>
                    <input type="number" step="0.01" name="avg" class="form-control" value="{{ old('avg', 0) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-control" required>
                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="notActive" {{ old('status') == 'notActive' ? 'selected' : '' }}>Not Active</option>
                        <option value="dismissed" {{ old('status') == 'dismissed' ? 'selected' : '' }}>Dismissed</option>
                    </select>
                </div>

                <button class="btn btn-primary">Create</button>
                <a href="{{ route('student.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection

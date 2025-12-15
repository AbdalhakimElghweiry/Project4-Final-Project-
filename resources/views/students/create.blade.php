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
            <form action="{{ route('students.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Department</label>
                    <select name="department" class="form-control" required>
                        <option value="">-- Select Department --</option>
                        @foreach($departments as $dep)
                            <option value="{{ $dep->name }}" {{ old('department') == $dep->name ? 'selected' : '' }}>{{ $dep->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button class="btn btn-primary">Create</button>
                <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection

@extends('layouts.dashboard')

@section('title','Edit Professor')

@section('content')
<div class="container">
    <h1>Edit Professor</h1>

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
            <form action="{{ route('professors.update', $professor->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $professor->name) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Department</label>
                    <select name="depId" class="form-control" required>
                        <option value="">-- Select Department --</option>
                        @foreach($departments as $dep)
                            <option value="{{ $dep->id }}" {{ (old('depId', $professor->depId) == $dep->id) ? 'selected' : '' }}>{{ $dep->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button class="btn btn-primary">Save Changes</button>
                <a href="{{ route('professors.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection

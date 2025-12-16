@extends('layouts.dashboard')

@section('title','Edit Enrollment')

@section('content')
<div class="container">
    <h1>Edit Enrollment</h1>

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
            <form action="{{ route('enrollment.update', $enrollment->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Student</label>
                    <select name="studentId" class="form-control" required>
                        <option value="">-- Select Student --</option>
                        @foreach($students as $s)
                            <option value="{{ $s->id }}" {{ (old('studentId', $enrollment->studentId) == $s->id) ? 'selected' : '' }}>{{ $s->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Course</label>
                    <select name="courseId" class="form-control" required>
                        <option value="">-- Select Course --</option>
                        @foreach($courses as $c)
                            <option value="{{ $c->id }}" {{ (old('courseId', $enrollment->courseId) == $c->id) ? 'selected' : '' }}>{{ $c->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Professor</label>
                    <select name="professorId" class="form-control" required>
                        <option value="">-- Select Professor --</option>
                        @foreach($professors as $p)
                            <option value="{{ $p->id }}" {{ (old('professorId', $enrollment->professorId) == $p->id) ? 'selected' : '' }}>{{ $p->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Grade (optional)</label>
                    <input type="number" step="0.01" name="mark" class="form-control" value="{{ old('mark', $enrollment->mark) }}">
                </div>

                <button class="btn btn-primary">Save Changes</button>
                <a href="{{ route('enrollment.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection

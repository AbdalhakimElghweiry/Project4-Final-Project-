@extends('layouts.dashboard')

@section('title', 'Students')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Students</h1>
        <a href="{{ route('student.create') }}" class="btn btn-primary">Add Student</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>
                                <span class="status-{{ $student->status ?? 'unknown' }}">
                                    {{ $student->status_display }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('student.show', $student->id) }}" class="btn btn-sm btn-info text-white">Show Details</a>
                                <a href="{{ route('student.edit', $student->id) }}" class="btn btn-sm btn-secondary">Edit</a>

                                <form action="{{ route('student.destroy', $student->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this student?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No students found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

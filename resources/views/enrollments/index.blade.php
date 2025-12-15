@extends('layouts.app')

@section('title','Enrollments')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Enrollments</h1>
        <a href="{{ route('enrollments.create') }}" class="btn btn-primary">Add Enrollment</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body p-0">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Student</th>
                        <th>Course</th>
                        <th>Grade</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($enrollments as $en)
                        <tr>
                            <td>{{ $en->id }}</td>
                            <td>{{ $en->student->name ?? '-' }}</td>
                            <td>{{ $en->course->title ?? '-' }}</td>
                            <td>{{ $en->mark ?? '-' }}</td>
                            <td>
                                <a href="{{ route('enrollments.edit', $en->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                                <form action="{{ route('enrollments.destroy', $en->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center">No enrollments found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

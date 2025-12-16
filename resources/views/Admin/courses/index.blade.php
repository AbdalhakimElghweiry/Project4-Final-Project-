@extends('layouts.dashboard')

@section('title', 'Courses')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Courses</h1>
        <a href="{{ route('courses.create') }}" class="btn btn-primary">Add Course</a>
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
                        <th>Course Name</th>
                        <th>Course Code</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($courses as $course)
                        <tr>
                            <td>{{ $course->id }}</td>
                            <td>{{ $course->name }}</td>
                            <td>{{ $course->symbol }}</td>
                            <td>
                                <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-sm btn-secondary">Edit</a>

                                <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this course?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No courses found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
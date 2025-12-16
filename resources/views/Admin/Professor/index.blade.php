@extends('layouts.dashboard')

@section('title','Professors')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Professors</h1>
        <a href="{{ route('professor.create') }}" class="btn btn-primary">Add Professor</a>
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
                        <th>Name</th>
                        <th>Department</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($professors as $prof)
                        <tr>
                            <td>{{ $prof->id }}</td>
                            <td>{{ $prof->name }}</td>
                            <td>{{ $prof->department->name ?? '-' }}</td>
                            <td>
                                <a href="{{ route('professor.edit', $prof->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                                <form action="{{ route('professor.destroy', $prof->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="text-center">No professors found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

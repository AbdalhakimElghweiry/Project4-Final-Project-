@extends('layouts.dashboard')

@section('title', 'Departments')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Departments</h1>
        <a href="{{ route('department.create') }}" class="btn btn-primary">Add Department</a>
    </div>

    @if(session('success'))
        <x-alert type="success">{{ session('success') }}</x-alert>
    @endif

    <x-card>
        <table class="table table-striped mb-0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Symbol</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($departments as $department)
                    <tr>
                        <td>{{ $department->id }}</td>
                        <td>{{ $department->name }}</td>
                        <td>{{ $department->symbol }}</td>
                        <td>
                            <a href="{{ route('department.edit', $department->id) }}" class="btn btn-sm btn-secondary">Edit</a>

                            <form action="{{ route('department.destroy', $department->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this department?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No departments found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </x-card>
</div>
@endsection
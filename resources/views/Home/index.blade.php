@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container mt-5">
    <div class="text-center">
        <h1 class="display-4 mb-4">Welcome to the University Portal</h1>
        <p class="lead mb-4">
            This platform helps manage departments, students, courses, professors, and enrollments.
        </p>

        <a href="{{ route('home.about') }}" class="btn btn-primary btn-lg">
            Learn More
        </a>
    </div>

    <div class="row mt-5">
        <div class="col-md-6 mb-4">
            <x-card class="text-center">
                <h3>Departments</h3>
                <p>Manage university departments with full CRUD operations.</p>
                <x-button variant="primary" href="{{ route('department.index') }}">View Departments</x-button>
            </x-card>
        </div>
        <div class="col-md-6 mb-4">
            <x-card class="text-center">
                <h3>Students</h3>
                <p>Manage student records and information.</p>
                <x-button variant="primary" href="{{ route('students.index') }}">View Students</x-button>
            </x-card>
        </div>
    </div>
</div>
@endsection

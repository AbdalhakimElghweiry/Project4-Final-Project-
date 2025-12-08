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
</div>
@endsection

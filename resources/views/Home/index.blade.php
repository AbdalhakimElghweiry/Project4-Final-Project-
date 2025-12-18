@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container mt-5">
    <div class="text-center">
        <h1 class="display-4 mb-4">Welcome to the University Portal</h1>
        <p class="lead mb-4">
            This platform helps manage departments, students, courses, professors, and enrollments.
        </p>

        <div class="d-flex flex-column flex-sm-row justify-content-center gap-4 mt-4">
            <a href="{{ route('home.about') }}" class="btn btn-primary btn-lg px-4">
                Learn More
            </a>

            <a href="{{ route('home.contact') }}" class="btn btn-primary btn-lg px-4">
                Contact Us
            </a>
        </div>
    </div>
</div>
@endsection

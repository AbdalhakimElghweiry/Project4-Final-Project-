@extends('layouts.dashboard')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Admin Dashboard</h1>

    <div class="row">
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Students</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $students }}</h5>
                    <p class="card-text">Total registered students</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Courses</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $courses }}</h5>
                    <p class="card-text">Total courses available</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Professors</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $professors }}</h5>
                    <p class="card-text">Total professors</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-info mb-3">
                <div class="card-header">Enrollments</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $enrollment }}</h5>
                    <p class="card-text">Total enrollments</p>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card text-white bg-secondary mb-3">
                <div class="card-header">Departments</div>
                <div class="card-body">
                    @php
                        $deptCount = 0;
                        if (isset($departments)) {
                            if (is_array($departments) || $departments instanceof \Countable) {
                                $deptCount = count($departments);
                            } elseif (is_numeric($departments)) {
                                $deptCount = $departments;
                            }
                        } elseif (isset($departmentsCount)) {
                            $deptCount = $departmentsCount;
                        }
                    @endphp
                    <h5 class="card-title">{{ $deptCount }}</h5>
                    <p class="card-text">Total departments</p>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="card mb-3">
                <div class="card-header">Overview</div>
                <div class="card-body">
                    <canvas id="overviewChart" height="120"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


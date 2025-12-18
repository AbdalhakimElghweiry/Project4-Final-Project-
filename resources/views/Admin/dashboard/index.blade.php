@extends('layouts.dashboard')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Admin Dashboard</h1>

        <!-- Stats Row: 5 columns -->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 g-3 mb-4">
            <div class="col">
                <div class="card text-white bg-primary h-100">
                    <div class="card-header">Students</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $students }}</h5>
                        <p class="card-text small">Registered students</p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card text-white bg-success h-100">
                    <div class="card-header">Courses</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $courses }}</h5>
                        <p class="card-text small">Courses available</p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card text-white bg-warning h-100">
                    <div class="card-header">Professors</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $professors }}</h5>
                        <p class="card-text small">Total professors</p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card text-white bg-info h-100">
                    <div class="card-header">Enrollments</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $enrollment }}</h5>
                        <p class="card-text small">Total enrollments</p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card text-white bg-secondary h-100">
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
                        <p class="card-text small">Total departments</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Row -->
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-3 h-100">
                    <div class="card-header">Overview</div>
                    <div class="card-body">
                        @php
                            $chartData = [
                                "students" => $students ?? 0,
                                "courses" => $courses ?? 0,
                                "professors" => $professors ?? 0,
                                "departments" => $deptCount ?? 0,
                                "enrollments" => $enrollment ?? 0
                            ];
                        @endphp
                        <div style="position: relative; height: 300px; width: 100%;">
                            <canvas id="overviewChart" data-counts='@json($chartData)'></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-3 h-100">
                    <div class="card-header">Distribution</div>
                    <div class="card-body">
                        <div style="position: relative; height: 300px; width: 100%;">
                            <canvas id="pieChart" data-counts='@json($chartData)'></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
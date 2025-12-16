@extends('layouts.dashboard')

@section('title', 'Create Department')

@section('content')
<div class="container">
    <h1>Create Department</h1>

    @if($errors->any())
        <x-alert type="danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </x-alert>
    @endif

    <x-card>
        <form action="{{ route('department.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <x-form-input type="text" name="name" label="Department Name" value="{{ old('name') }}" />
            </div>

            <div class="mb-3">
                <x-form-input type="text" name="symbol" label="Symbol" value="{{ old('symbol') }}" />
            </div>

            <x-button type="submit">Create Department</x-button>
        </form>
    </x-card>
</div>
@endsection
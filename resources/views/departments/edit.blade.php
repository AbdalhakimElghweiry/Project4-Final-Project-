@extends('layouts.app')

@section('title', 'Edit Department')

@section('content')
<div class="container">
    <h1>Edit Department</h1>

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
        <form action="{{ route('department.update', $department->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <x-form-input type="text" name="name" label="Department Name" value="{{ old('name', $department->name) }}" />
            </div>

            <div class="mb-3">
                <x-form-input type="text" name="symbol" label="Symbol" value="{{ old('symbol', $department->symbol) }}" />
            </div>

            <x-button type="submit">Update Department</x-button>
        </form>
    </x-card>
</div>
@endsection
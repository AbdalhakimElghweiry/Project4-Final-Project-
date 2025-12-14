@props(['type' => 'text', 'name', 'value' => '', 'label' => '', 'class' => ''])

@php
    $baseClass = 'form-control';
    $fullClass = $class ? $baseClass . ' ' . $class : $baseClass;
@endphp

@if($label)
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
@endif

<input type="{{ $type }}" name="{{ $name }}" value="{{ old($name, $value) }}" class="{{ $fullClass }}" id="{{ $name }}" {{ $attributes }}>
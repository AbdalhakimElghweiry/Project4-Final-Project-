@props(['type' => 'info', 'class' => ''])

@php
    $baseClass = 'alert alert-' . $type;
    $fullClass = $class ? $baseClass . ' ' . $class : $baseClass;
@endphp

<div class="{{ $fullClass }}" {{ $attributes }}>
    {{ $slot }}
</div>
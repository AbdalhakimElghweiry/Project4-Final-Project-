@props(['class' => ''])

@php
    $baseClass = 'card';
    $fullClass = $class ? $baseClass . ' ' . $class : $baseClass;
@endphp

<div class="{{ $fullClass }}" {{ $attributes }}>
    <div class="card-body">
        {{ $slot }}
    </div>
</div>
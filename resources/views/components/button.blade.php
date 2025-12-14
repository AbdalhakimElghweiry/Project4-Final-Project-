@props(['type' => 'button', 'variant' => 'primary', 'class' => ''])

@php
    $baseClass = 'btn btn-' . $variant;
    $fullClass = $class ? $baseClass . ' ' . $class : $baseClass;
@endphp

<button type="{{ $type }}" {{ $attributes->merge(['class' => $fullClass]) }}>
    {{ $slot }}
</button>
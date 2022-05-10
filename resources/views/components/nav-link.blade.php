@props(['active'])

@php
$classes = ($active ?? false)
            ? 'header__nav--element active'
            : 'header__nav--element';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

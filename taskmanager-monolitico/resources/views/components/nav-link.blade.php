@props(['active'])

@php
$classes = $active
            ? 'text-indigo-600 border-b-2 border-indigo-600 font-medium px-3 py-2'
            : 'text-gray-600 hover:text-indigo-500 px-3 py-2';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

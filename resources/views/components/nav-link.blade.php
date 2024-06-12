@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'inline-flex items-center px-2 pt-1 border-b-2 border-white text-sm font-medium leading-5 text-white focus:outline-none transition duration-150 ease-in-out'
            : 'inline-flex items-center px-2 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-300 focus:outline-none transition duration-150 ease-in-out hover:text-white hover:border-white hover:border-b-2 hover:border-white';

@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

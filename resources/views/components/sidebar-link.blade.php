@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'flex justify-start items-center gap-x-4 inline-flex items-center text-base font-medium text-white focus:outline-none transition
                duration-150 ease-in-out'
                : 'flex justify-start items-center gap-x-4 inline-flex items-center text-sm font-medium leading-5 text-gray-500 hover:text-gray-700
                focus:outline-none focus:text-gray-700 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
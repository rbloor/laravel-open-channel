@props(['active'])

@php
$classes = ($active ?? false)
? 'text-gray-900 bg-gray-100 group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-gray-600 rounded-md underline underline-offset-4'
: 'group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
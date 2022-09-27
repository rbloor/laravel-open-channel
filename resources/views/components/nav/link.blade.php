@props(['active'])

@php
$classes = ($active ?? false)
? 'text-gray-900 bg-gray-100 group flex items-center px-2 py-2 text-sm font-medium rounded-md underline underline-offset-4'
: 'text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md';
@endphp

<div class="space-y-1">
    <a {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
</div>
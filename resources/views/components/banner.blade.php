@props(['type' => 'success'])

@php
$classes = '';
switch ($type) {
case 'success':
$classes .= 'bg-green-600 text-white';
break;
case 'danger':
$classes .= 'bg-red-600 text-white';
break;
}
@endphp

<div {{ $attributes->merge(['class' => $classes . ' relative']) }} x-data="{ open: true }" x-show="open">
    <div class="max-w-7xl mx-auto py-3 px-4">
        <div class="pr-16">
            <p class="font-medium text-white">
                {{ $slot }}
            </p>
        </div>
        <div class="absolute inset-y-0 right-0 pt-1 pr-1 flex items-start sm:pt-1 sm:pr-2 sm:items-start">
            <button @click="open = false" type="button" class="flex p-2">
                <span class="sr-only">{{ __('Dismiss') }}</span>
                <svg class="h-6 w-6 text-white hover:text-indigo-100" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
</div>
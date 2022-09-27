@props(['href'])

<div class="pb-6 sm:flex sm:items-center sm:justify-between">
    <h1 class="text-2xl font-semibold text-gray-900">{{ $slot }}</h1>
    @if (isset($href))
    <a href="{{ $href }}" class="inline-flex items-center justify-items-end p-2 border border-transparent rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
        </svg>
    </a>
    @endif
</div>
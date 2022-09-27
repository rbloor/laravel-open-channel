@props(['url'])

<a href="{{ $url }}" class="relative block w-full border-2 border-gray-300 border-dashed rounded-lg p-12 text-center hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
    </svg>
    <h3 class="mt-2 text-sm font-medium text-gray-900">{{ __('Empty') }}</h3>
    <p class="mt-1 text-sm text-gray-500">{{ __('Create new') }}</p>
</a>
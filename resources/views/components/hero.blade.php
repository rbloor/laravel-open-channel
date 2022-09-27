@props(['page', 'actions' => ''])

<!-- Hero card -->
<div class="relative">
    <div class="h-1/2 absolute inset-x-0 bottom-0 bg-gray-100"></div>
    <div class="relative shadow-xl sm:overflow-hidden">
        <div class="absolute inset-0">
            <img class="h-full w-full object-cover" src="{{ asset('storage/pages/'.$page->filename) }}" alt="{{ $page->name }}">
        </div>
        <div class="relative px-4 py-16 sm:px-6 sm:py-24 lg:py-32 lg:px-8">
            <h1 class="text-center text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl">
                <span class="block text-white">{{ $page->banner_title }}</span>
                <span class="block text-white">{{ $page->banner_subtitle }}</span>
            </h1>
            <p class="mt-6 max-w-lg mx-auto text-center text-xl text-white sm:max-w-3xl">{{ $page->banner_paragraph }}</p>
            {{ $actions }}
        </div>
    </div>
</div>
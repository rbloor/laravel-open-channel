@props(['title', 'content', 'link', 'linkText', 'image', 'imageAlt'])

<div class="flex flex-col shadow-lg overflow-hidden">
    <div class="flex-shrink-0">
        <img
            class="h-48 w-full object-cover"
            src="{{ $image }}"
            alt="{{ $imageAlt }}">
    </div>
    <div class="flex-1 p-6 flex flex-col justify-between">
        <div class="flex-1 relative pb-16">
            <a
                href="{{ $link }}"
                class="block">
                <h3 class="text-xl text-gray-900">{{ $title }}</h3>
                <p class="mt-3 text-base text-gray-500">{{ $content }}</p>
                <div class="absolute bottom-0 left-0 mt-4 inline-flex rounded-md shadow">
                    <button class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-custom-blue-100 hover:bg-custom-blue-200">
                        {{ $linkText }}
                        <svg
                            class="-mr-1 ml-3 h-5 w-5 text-white"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
                </div>
            </a>
        </div>
    </div>
</div>
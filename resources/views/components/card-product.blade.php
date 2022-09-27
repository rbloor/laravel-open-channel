@props(['title', 'subtitle', 'points', 'content', 'image', 'imageAlt', 'offer' => ''])

<div class="flex flex-col overflow-hidden">
    <div class="flex-shrink-0 relative">
        <img
            class="h-48 w-full object-cover"
            src="{{ $image }}"
            alt="{{ $imageAlt }}">
        @if (!empty($offer))
        <p class="absolute top-0 left-0 px-5 py-2 text-sm font-heading uppercase bg-red-600 text-white">Bonus</p>
        @endif
    </div>
    <div class="flex-1 bg-white pt-6 flex flex-col justify-between">
        <div class="flex-1">
            <div class="block">
                <h3 class="text-sm text-custom-blue-100">{{ $title }}</h3>
                <h4 class="text-lg text-black">{{ $subtitle }}</h4>
                <p class="text-base text-black">
                    Points:
                    <span class="text-red-600 font-heading">{{ $points }}</span>
                </p>
                <p class="mt-3 flex flex-col items-start text-base text-gray-500">
                    <span class="js-truncate-text line-clamp-2">{{ $content }}</span>
                    <button class="hidden underline hover:text-custom-blue-100 js-truncate-toggle">read more</button>
                </p>
            </div>
        </div>
        @if (!empty($offer))
        <div x-data="{ open: false }">
            <h3>
                <button
                    type="button"
                    x-description="Expand/collapse question button"
                    class="group relative w-full mt-4 px-3 py-2 flex justify-between items-center text-left bg-red-600"
                    aria-controls="offer-1"
                    @click="open = !open"
                    aria-expanded="false"
                    x-bind:aria-expanded="open.toString()">
                    <span
                        class="text-sm font-heading text-white"
                        x-state:on="Open"
                        x-state:off="Closed">
                        Extra points
                    </span>
                    <span class="ml-6 flex items-center">
                        <svg
                            :class="{ '-rotate-180': open, '-rotate-0': !(open) }"
                            class="h-6 w-6 transform text-white"
                            x-state:on="Open"
                            x-state:off="Closed"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            aria-hidden="true">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </span>
                </button>
            </h3>
            <div
                class="mt-4 prose prose-sm"
                id="offer-1"
                x-show="open"
                style="display: none;">
                {{ $offer }}
            </div>
        </div>
        @endif
    </div>
</div>
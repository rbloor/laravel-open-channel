@props(['type' => ''])

<div class="">
    <div class=" relative bg-gray-100">
        <div class="lg:absolute lg:inset-0">
            <div class="{{ $type == 'alt' ? 'lg:right-0' : 'lg:left-0' }} lg:absolute lg:inset-y-0 lg:w-1/2">
                <img class="h-56 w-full object-cover lg:absolute lg:h-full" src="{{ $image }}" alt="">
            </div>
        </div>
        <div class="relative py-6 px-6 sm:py-12 lg:py-16 lg:px-8 lg:max-w-7xl lg:mx-auto lg:grid lg:grid-cols-2">
            <div class="{{ $type == 'alt' ? 'lg:col-start-1 lg:pr-8' : 'lg:col-start-2 lg:pl-8' }}">
                <div class="max-w-prose mx-auto lg:max-w-lg lg:ml-auto lg:mr-4">
                    {{ $icon }}
                    <h3 class="mt-2 text-black text-xl tracking-tight sm:text-2xl">{{ $title }}</h3>
                    <p class="mt-3 text-md text-black">{{ $content }}</p>
                    <div class="mt-8">
                        <div class="inline-flex rounded-md shadow">
                            <a href="{{ $linkUrl }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-custom-blue-100 hover:bg-custom-blue-200">
                                {{ $linkText }}
                                <svg class="-mr-1 ml-3 h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
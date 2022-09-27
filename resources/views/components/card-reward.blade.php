@props(['reward'])

<div class="flex flex-col overflow-hidden">
    <div class="flex-shrink-0">
        <img
            class="h-48 w-full object-cover"
            src="{{ asset('storage/rewards/'.$reward->filename) }}"
            alt="{{ $reward->name }}"
            data-img="{{ asset('storage/rewards/'.$reward->filename) }}">
    </div>
    <div class="flex-1 pt-6 flex flex-col justify-between">
        <div class="flex-1 relative pb-14">
            <div class="block -mt-2">
                <h3 class="text-lg text-black">{{ $reward->name }}</h3>
                <p class="text-base text-black">
                    Points:
                    <span class="text-red-600 font-heading">{{ $reward->points }}</span>
                </p>
                <p class="mt-3 flex flex-col items-start text-base text-black">
                    <span class="js-truncate-text line-clamp-2">{!! $reward->description !!}</span>
                    <button class="hidden underline hover:text-custom-blue-100 js-truncate-toggle">read more</button>
                </p>
                @livewire('user.add-to-basket', ['reward' => $reward])
            </div>
        </div>
    </div>
</div>
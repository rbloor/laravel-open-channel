@if ($hasOffer === true)
<div
    x-data="{ open: @entangle('is_open') }"
    x-init="setTimeout(() => open = true, 5000)">
    <div x-show="open" class="relative" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-opacity-75 transition-opacity"
            x-show="open"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="transform opacity-0"
            x-transition:enter-end="transform opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="transform opacity-100"
            x-transition:leave-end="transform opacity-0"></div>

        <div class="fixed z-50 inset-0 overflow-y-auto">
            <div class="flex items-end sm:items-center justify-center min-h-full p-4 text-center sm:p-0">
                <div class="relative bg-white shadow-xl transform transition-all sm:my-8 sm:max-w-lg sm:w-full border-4 border-custom-red-100"
                    x-show="open"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="transform opacity-0 translate-y-4 sm:translate-y-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="transform opacity-100 ranslate-y-0 sm:scale-100"
                    x-transition:leave-end="transform opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                    @if ($offer !== null && $is_open === true)
                    <button class="absolute top-[-25px] right-[-25px] no-outline focus:shadow-outline" wire:click="closeModal">
                        <img src="{{ asset('img/icon-close.svg') }}" alt="Close Offer" />
                    </button>
                    <a href="{{ $offer->url }}">
                        <img src="{{ asset('storage/offers/'.$offer->filename) }}" alt="{{ $offer->name }}" />
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endif
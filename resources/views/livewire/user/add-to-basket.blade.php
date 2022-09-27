<div class="flex">
    <button wire:click="addToBasket" class="absolute bottom-0 left-0 mt-4 w-full rounded-md shadow inline-flex items-center justify-center px-3 py-2 border border-transparent text-sm uppercase font-medium rounded-md text-white bg-custom-blue-100 hover:bg-custom-blue-200">
        {{ __('Add to basket') }}
        <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-5 w-5 text-white ml-3 -mr-1"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor">
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="1.5"
                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
        </svg>
    </button>
</div>
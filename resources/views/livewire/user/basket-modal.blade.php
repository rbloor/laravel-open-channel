<x-jet-dialog-modal wire:model="showModal">
    <x-slot name="title">
        {{ __('Added to Basket') }}
    </x-slot>

    <x-slot name="content">
        @livewire('user.basket', ['layout' => 'basic'])
    </x-slot>

    <x-slot name="footer">
        <x-atom.button color="theme-blue" type="button" wire:click="$set('showModal', false)" wire:loading.attr="disabled">
            {{ __('Continue Shopping') }}
        </x-atom.button>
        <x-atom.button color="theme-blue" href="{{ route('basket') }}" class="ml-3" wire:click="$set('showModal', false)" wire:loading.attr="disabled">
            {{ __('Go to Basket') }}
        </x-atom.button>
    </x-slot>
</x-jet-dialog-modal>
<x-jet-action-section>
    <x-slot name="title">
        {{ __('Tax Certificate') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Request an end of year incentive award tax certificate.') }}
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
            {{ __('At the end of each tax year those on 40% and 45% tax bands will automatically be sent a tax certificate. If you are a basic rate tax payer, you can still request one by clicking the button below.') }}
        </div>
        <div class="mt-5 inline-flex items-center">
            <x-jet-button wire:click="requestCertificate" wire:loading.attr="disabled">
                {{ __('Request Tax Certificate') }}
            </x-jet-button>
            <x-jet-action-message class="ml-3" on="saved">
                {{ __('Request sent.') }}
            </x-jet-action-message>
        </div>
    </x-slot>

</x-jet-action-section>
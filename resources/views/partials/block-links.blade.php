<!-- Block Links -->

<div class="relative bg-white pt-16 pb-20">
    <div class="mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:px-8 lg:max-w-7xl">
        <div class="grid grid-cols-1 gap-16 sm:grid-cols-2">
            <x-card-simple
                title="{{ __('Claim your points') }}"
                content="{{ __('You can earn points by selling qualifying Canon products.') }}"
                image="{{ asset('img/block-link-claim.jpg') }}"
                imageAlt="{{ __('Upload your sales') }}"
                link="{{ route('sale.create') }}"
                linkText="{{ __('Upload your sales') }}" />
            <x-card-simple
                title="{{ __('Redeem your points') }}"
                content="{{ __('You can exchange your points for rewards anytime you like.') }}"
                image="{{ asset('img/block-link-redeem.jpg') }}"
                imageAlt="{{ __('View rewards') }}"
                link="{{ route('reward.index') }}"
                linkText="{{ __('View rewards') }}" />
        </div>
    </div>
</div>
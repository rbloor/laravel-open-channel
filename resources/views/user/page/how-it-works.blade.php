<x-app-layout>

    @php $page = App\Models\Page::where('slug', 'how-it-works')->firstOrFail(); @endphp

    <!-- Hero -->
    <x-hero :page="$page" />

    <div class="relative bg-white py-16">
        <div class="mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:px-8 lg:max-w-7xl space-y-8">

            <x-molecule.image-text type="alt">
                <x-slot name="icon">
                    <img class="mb-4" src="{{ asset('img/icon-sell.svg') }}" alt="Sell qualifying products" />
                </x-slot>
                <x-slot name="image">{{ asset('img/how-it-works-sell-products.jpg') }}</x-slot>
                <x-slot name="title">Sell qualifying products</x-slot>
                <x-slot name="content">Every quarter we will feature canon products and services that will earn you points to redeem free of tax credit on a pre-paid credit card.</x-slot>
                <x-slot name="linkText">View qualifying products</x-slot>
                <x-slot name="linkUrl">{{ route('product.index') }}</x-slot>
            </x-molecule.image-text>

            <x-molecule.image-text>
                <x-slot name="icon">
                    <img class="mb-4" src="{{ asset('img/icon-earn.svg') }}" alt="Earn points" />
                </x-slot>
                <x-slot name="image">{{ asset('img/how-it-works-earn-points.jpg') }}</x-slot>
                <x-slot name="title">Earn points</x-slot>
                <x-slot name="content">Every quarter the points you've earned by selling the qualifying products will be automatically updated in the 'My Points' box at the top of the page.</x-slot>
                <x-slot name="linkText">Upload your sales</x-slot>
                <x-slot name="linkUrl">{{ route('sale.create') }}</x-slot>
            </x-molecule.image-text>

            <x-molecule.image-text type="alt">
                <x-slot name="icon">
                    <img class="mb-4" src="{{ asset('img/icon-claim.svg') }}" alt="Claim rewards" />
                </x-slot>
                <x-slot name="image">{{ asset('img/how-it-works-claim-rewards.jpg') }}</x-slot>
                <x-slot name="title">Claim rewards</x-slot>
                <x-slot name="content">You can exchange your points for rewards anytime you like.</x-slot>
                <x-slot name="linkText">View rewards</x-slot>
                <x-slot name="linkUrl">{{ route('reward.index') }}</x-slot>
            </x-molecule.image-text>

            <div class="bg-white">
                <div class="max-w-2xl mx-auto text-center py-8 px-4 sm:px-6 lg:px-8">
                    <p class="mt-4 text-lg leading-7 text-black">On your behalf Canon will pay, directly to HMRC, any tax liability and National Insurance contribution for all incentive rewards claimed*. So all you need to do is sell, claim and enjoy.</p>
                    <a
                        href="#"
                        class="mt-8 inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-custom-blue-100 hover:bg-custom-blue-200">
                        Click here to read the incentive terms
                        <svg
                            class="-mr-1 ml-3 h-5 w-5 text-white"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                            aria-hidden="true">
                            <path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z" />
                            <path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z" />
                        </svg>
                    </a>
                </div>
            </div>

        </div>
    </div>

</x-app-layout>
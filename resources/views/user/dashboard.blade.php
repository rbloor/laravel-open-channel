<x-app-layout>

    @php $page = App\Models\Page::where('slug', 'home')->firstOrFail(); @endphp

    <!-- Hero -->
    <x-hero :page="$page">
        <x-slot name="actions">
            <div class="mt-10 max-w-sm mx-auto sm:max-w-none sm:flex sm:justify-center">
                <div class="space-y-4 sm:space-y-0 sm:mx-auto sm:inline-grid sm:grid-cols-2 sm:gap-5">
                    <a
                        href="{{ route('how-it-works') }}"
                        class="flex items-center justify-center px-4 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-custom-blue-100 bg-white sm:px-8">Get started</a>
                    <a
                        href="{{ route('reward.index') }}"
                        class="flex items-center justify-center px-4 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-custom-blue-100 hover:bg-custom-blue-200 sm:px-8">Browse rewards</a>
                </div>
            </div>
        </x-slot>
    </x-hero>

    <!-- Qualifying Products -->
    <div class="relative bg-white pt-16 pb-20">
        <div class="mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:px-8 lg:max-w-7xl">
            <div class="text-center">
                <p class="mt-2 text-3xl font-extrabold text-gray-900 tracking-tight sm:text-4xl">
                    {{ __('Everything you need to sell Canon products') }}
                </p>
                <p class="mt-5 max-w-prose mx-auto text-xl text-gray-500">
                    {{ __('Every month Canon will reward you for selling qualifying products and services. Simply sell the featured products, get awarded points and redeem for free of tax credit on a pre-paid credit card. That\'s it.') }}
                </p>
            </div>
            <div class="mt-12">
                <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2">
                    @foreach ($productCategories as $category)
                    <x-card
                        title="{{ $category->name }}"
                        content="{{ $category->description ?? '' }}"
                        image="{{ asset('storage/categories/'.$category->filename) }}"
                        imageAlt="{{ $category->name }}"
                        link="{{ route('product.index', ['product_category_id' => $category->id]) }}"
                        linkText="{{ __('View qualifying products') }}" />
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Useful Resources -->
    <div class="relative bg-gray-100 pt-16 pb-20">
        <div class="mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:px-8 lg:max-w-7xl">
            <div class="text-center">
                <h2 class="text-3xl tracking-tight font-extrabold text-gray-900 sm:text-4xl">
                    {{ __('Useful reference links') }}
                </h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
                    {{ __('Want to know more about the Canon Incentive programme, our services or our latest offers? Then you\'ve come to the right place.') }}
                </p>
            </div>
            <div class="mt-12 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($resources as $resource)
                <x-card
                    title="{{ $resource->name }}"
                    content="{{ $resource->description }}"
                    image="{{ asset('storage/resources/'.$resource->filename) }}"
                    imageAlt="{{ $resource->name }}"
                    link="{{ $resource->is_external ? $resource->url : asset('storage/resources/'.$resource->download) }}"
                    linkExternal="{{ $resource->is_external }}"
                    linkText="{{ __('Learn more') }}" />
                @endforeach
            </div>
        </div>
    </div>

    @include('partials.block-links')

</x-app-layout>
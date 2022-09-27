<x-app-layout>

    @php $page = App\Models\Page::where('slug', 'products')->firstOrFail(); @endphp

    <!-- Hero -->
    <x-hero :page="$page" />

    <x-filters
        action="{{ route('product.index') }}"
        method="GET">
        <x-slot name="filters">
            <x-filters-select
                :list="$productCategories"
                filter="product_category_id"
                column="name"
                emptyValue="Filter by category"></x-filters-select>
            <x-filters-input-search />
        </x-slot>
    </x-filters>

    <div class="relative bg-white pt-16">
        <div class="mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:px-8 lg:max-w-7xl">
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($products as $product)
                @php
                $offerName = !empty($product->product_offer) ? '(' . $product->product_offer->name . ')' : '';
                @endphp
                <x-card-product
                    title="{{ $product->name }}"
                    subtitle="{{ $product->code }}"
                    points="{{ $product->total_points }} {{ $offerName }}"
                    content="{{ $product->description }}"
                    image="{{ asset('storage/products/'.$product->filename) }}"
                    imageAlt="{{ $product->name }}"
                    offer="{{ $product->product_offer->description ?? '' }}">
                </x-card-product>
                @endforeach
            </div>
            <div class="mt-8">
                {{ $products->appends(request()->except('page'))->links() }}
            </div>
        </div>
    </div>

    @include('partials.block-links')

</x-app-layout>
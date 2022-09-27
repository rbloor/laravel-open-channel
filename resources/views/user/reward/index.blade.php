<x-app-layout>

    @php $page = App\Models\Page::where('slug', 'rewards')->firstOrFail(); @endphp

    <!-- Hero -->
    <x-hero :page="$page" />

    <x-filters
        action="{{ route('reward.index') }}"
        method="GET">
        <x-slot name="filters">
            <x-filters-select
                :list="$rewardCategories"
                filter="reward_category_id"
                column="name"
                emptyValue="Filter by category"></x-filters-select>
            <x-filters-input-search />
        </x-slot>
    </x-filters>

    <div class="relative bg-white pt-16">
        <div class="mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:px-8 lg:max-w-7xl">
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($rewards as $reward)
                <x-card-reward :reward="$reward" />
                @endforeach
            </div>
            <div class="mt-8">
                {{ $rewards->appends(request()->except('page'))->links() }}
            </div>
        </div>
    </div>

    @livewire('user.basket-modal')

    @include('partials.block-links')

</x-app-layout>
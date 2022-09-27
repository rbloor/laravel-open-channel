<x-admin-layout>

    <x-molecule.container>

        <x-molecule.heading href="{{ route('admin.product_offer.create') }}">
            {{ __('Manage Product Offers') }}
        </x-molecule.heading>

        @if (!$productOffers->isEmpty())

        <x-molecule.table>
            <x-slot name="header">
                <x-atom.th>{{ __('Name') }}</x-atom.th>
                <x-atom.th>{{ __('Product') }}</x-atom.th>
                <x-atom.th>{{ __('Multiplier') }}</x-atom.th>
                <x-atom.th>{{ __('Date Created') }}</x-atom.th>
                <x-atom.th class="relative px-6 py-3 text-right">
                    <span class="sr-only">{{ __('Actions') }}</span>
                </x-atom.th>
            </x-slot>
            <x-slot name="body">
                @foreach ($productOffers as $productOffer)
                <tr>
                    <x-atom.td class="text-gray-900">{{ $productOffer->name }}</x-atom.td>
                    <x-atom.td>{{ $productOffer->product->name }}</x-atom.td>
                    <x-atom.td>{{ $productOffer->multiplier }}</x-atom.td>
                    <x-atom.td>{{ $productOffer->created_at->diffForHumans() }}</x-atom.td>
                    <x-atom.td class="text-right">
                        @can('edit_product_offer')
                        <x-atom.button href="{{ route('admin.product_offer.edit', $productOffer) }}">{{ __('Edit') }}</x-atom.button>
                        @endcan
                        @can('delete_product_offer')
                        <x-molecule.button-delete action="{{ route('admin.product_offer.destroy', $productOffer) }}">{{ __('Delete') }}</x-molecule.button-delete>
                        @endcan
                    </x-atom.td>
                </tr>
                @endforeach
            </x-slot>
        </x-molecule.table>

        {{ $productOffers->links() }}

        @else

        <x-molecule.empty url="{{ route('admin.product_offer.create') }}" />

        @endif

    </x-molecule.container>

</x-admin-layout>
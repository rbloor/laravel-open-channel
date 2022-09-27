<x-admin-layout>

    <x-molecule.container>

        <x-molecule.heading href="{{ route('admin.product.create') }}">
            {{ __('Manage Products') }}
        </x-molecule.heading>

        @if (!$products->isEmpty())

        <x-molecule.table>
            <x-slot name="header">
                <x-atom.th>{{ __('Name') }}</x-atom.th>
                <x-atom.th>{{ __('Points') }}</x-atom.th>
                <x-atom.th>{{ __('Code') }}</x-atom.th>
                <x-atom.th>{{ __('Category') }}</x-atom.th>
                <x-atom.th>{{ __('Published') }}</x-atom.th>
                <x-atom.th>{{ __('Date Created') }}</x-atom.th>
                <x-atom.th class="relative px-6 py-3 text-right">
                    <span class="sr-only">{{ __('Actions') }}</span>
                </x-atom.th>
            </x-slot>
            <x-slot name="body">
                @foreach ($products as $product)
                <tr>
                    <x-atom.td class="text-gray-900">{{ $product->name }}</x-atom.td>
                    <x-atom.td>{{ $product->points }}</x-atom.td>
                    <x-atom.td>{{ $product->code }}</x-atom.td>
                    <x-atom.td>{{ $product->product_category->name }}</x-atom.td>
                    <x-atom.td>
                        @if ($product->is_published)
                        <x-atom.badge type="success">published</x-atom.badge>
                        @else
                        <x-atom.badge type="danger">not published</x-atom.badge>
                        @endif
                    </x-atom.td>
                    <x-atom.td>{{ $product->created_at->diffForHumans() }}</x-atom.td>
                    <x-atom.td class="text-right">
                        @can('edit_product')
                        <x-atom.button href="{{ route('admin.product.edit', $product) }}">{{ __('Edit') }}</x-atom.button>
                        @endcan
                        @can('delete_product')
                        <x-molecule.button-delete action="{{ route('admin.product.destroy', $product) }}">{{ __('Delete') }}</x-molecule.button-delete>
                        @endcan
                    </x-atom.td>
                </tr>
                @endforeach
            </x-slot>
        </x-molecule.table>

        {{ $products->links() }}

        @else

        <x-molecule.empty url="{{ route('admin.product.create') }}" />

        @endif

    </x-molecule.container>

</x-admin-layout>
<x-admin-layout>

    <x-molecule.container>

        <x-molecule.heading href="{{ route('admin.tool.offer.create') }}">
            {{ __('Manage Offers') }}
        </x-molecule.heading>

        @if (!$offers->isEmpty())

        <x-molecule.table>
            <x-slot name="header">
                <x-atom.th>{{ __('Name') }}</x-atom.th>
                <x-atom.th>{{ __('Public') }}</x-atom.th>
                <x-atom.th>{{ __('Published') }}</x-atom.th>
                <x-atom.th>{{ __('Date Created') }}</x-atom.th>
                <x-atom.th class="relative px-6 py-3 text-right">
                    <span class="sr-only">{{ __('Actions') }}</span>
                </x-atom.th>
            </x-slot>
            <x-slot name="body">
                @foreach ($offers as $offer)
                <tr>
                    <x-atom.td class="text-gray-900">{{ $offer->name }}</x-atom.td>
                    <x-atom.td>
                        @if ($offer->is_public)
                        <x-atom.badge type="success">Yes</x-atom.badge>
                        @else
                        <x-atom.badge type="info">No</x-atom.badge>
                        @endif
                    </x-atom.td>
                    <x-atom.td>
                        @if ($offer->is_published)
                        <x-atom.badge type="success">published</x-atom.badge>
                        @else
                        <x-atom.badge type="danger">not published</x-atom.badge>
                        @endif
                    </x-atom.td>
                    <x-atom.td>{{ $offer->created_at->diffForHumans() }}</x-atom.td>
                    <x-atom.td class="text-right">
                        @can('edit_offer')
                        <x-atom.button href="{{ route('admin.tool.offer.edit', $offer) }}">{{ __('Edit') }}</x-atom.button>
                        @endcan
                        @can('delete_offer')
                        <x-molecule.button-delete action="{{ route('admin.tool.offer.destroy', $offer) }}">{{ __('Delete') }}</x-molecule.button-delete>
                        @endcan
                    </x-atom.td>
                </tr>
                @endforeach
            </x-slot>
        </x-molecule.table>

        {{ $offers->links() }}

        @else

        <x-molecule.empty url="{{ route('admin.tool.offer.create') }}" />

        @endif

    </x-molecule.container>

</x-admin-layout>
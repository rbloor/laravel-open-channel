<x-admin-layout>

    <x-molecule.container>

        <x-molecule.heading href="{{ route('admin.resource.create') }}">
            {{ __('Manage Resources') }}
        </x-molecule.heading>

        @if (!$resources->isEmpty())

        <x-molecule.table>
            <x-slot name="header">
                <x-atom.th>{{ __('Name') }}</x-atom.th>
                <x-atom.th>{{ __('Type') }}</x-atom.th>
                <x-atom.th>{{ __('Published') }}</x-atom.th>
                <x-atom.th>{{ __('Date Created') }}</x-atom.th>
                <x-atom.th class="relative px-6 py-3 text-right">
                    <span class="sr-only">{{ __('Actions') }}</span>
                </x-atom.th>
            </x-slot>
            <x-slot name="body">
                @foreach ($resources as $resource)
                <tr>
                    <x-atom.td class="text-gray-900">{{ $resource->name }}</x-atom.td>
                    <x-atom.td>
                        @if ($resource->is_external)
                        <x-atom.badge type="warning">external</x-atom.badge>
                        @else
                        <x-atom.badge type="info">internal</x-atom.badge>
                        @endif
                    </x-atom.td>
                    <x-atom.td>
                        @if ($resource->is_published)
                        <x-atom.badge type="success">published</x-atom.badge>
                        @else
                        <x-atom.badge type="danger">not published</x-atom.badge>
                        @endif
                    </x-atom.td>
                    <x-atom.td>{{ $resource->created_at->diffForHumans() }}</x-atom.td>
                    <x-atom.td class="text-right">
                        @can('edit_resource')
                        <x-atom.button href="{{ route('admin.resource.edit', $resource) }}">{{ __('Edit') }}</x-atom.button>
                        @endcan
                        @can('delete_resource')
                        <x-molecule.button-delete action="{{ route('admin.resource.destroy', $resource) }}">{{ __('Delete') }}</x-molecule.button-delete>
                        @endcan
                    </x-atom.td>
                </tr>
                @endforeach
            </x-slot>
        </x-molecule.table>

        {{ $resources->links() }}

        @else

        <x-molecule.empty url="{{ route('admin.resource.create') }}" />

        @endif

    </x-molecule.container>

</x-admin-layout>
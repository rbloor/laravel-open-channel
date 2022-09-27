<x-admin-layout>

    <x-molecule.container>

        <x-molecule.heading>
            {{ __('Manage Pages') }}
        </x-molecule.heading>

        @if (!$pages->isEmpty())

        <x-molecule.table>
            <x-slot name="header">
                <x-atom.th>{{ __('Name') }}</x-atom.th>
                <x-atom.th>{{ __('Slug') }}</x-atom.th>
                <x-atom.th>{{ __('Date Created') }}</x-atom.th>
                <x-atom.th class="relative px-6 py-3 text-right">
                    <span class="sr-only">{{ __('Actions') }}</span>
                </x-atom.th>
            </x-slot>
            <x-slot name="body">
                @foreach ($pages as $page)
                <tr>
                    <x-atom.td class="text-gray-900">{{ $page->name }}</x-atom.td>
                    <x-atom.td>{{ $page->slug }}</x-atom.td>
                    <x-atom.td>{{ $page->created_at->diffForHumans() }}</x-atom.td>
                    <x-atom.td class="text-right">
                        @can('edit_page')
                        <x-atom.button href="{{ route('admin.page.edit', $page) }}">{{ __('Edit') }}</x-atom.button>
                        @endcan
                    </x-atom.td>
                </tr>
                @endforeach
            </x-slot>
        </x-molecule.table>

        {{ $pages->links() }}

        @else

        <x-molecule.empty url="{{ route('admin.page.create') }}" />

        @endif

    </x-molecule.container>

</x-admin-layout>
<x-admin-layout>

    <x-molecule.container>

        <x-molecule.heading href="{{ route('admin.company.create') }}">
            {{ __('Companies') }}
        </x-molecule.heading>

        @if (!$companies->isEmpty())

        <x-molecule.table>
            <x-slot name="header">
                <x-atom.th>{{ __('Name') }}</x-atom.th>
                <x-atom.th>{{ __('Published') }}</x-atom.th>
                <x-atom.th>{{ __('Date Created') }}</x-atom.th>
                <x-atom.th class="relative px-6 py-3 text-right">
                    <span class="sr-only">{{ __('Actions') }}</span>
                </x-atom.th>
            </x-slot>
            <x-slot name="body">
                @foreach ($companies as $company)
                <tr>
                    <x-atom.td>
                        <div class="text-sm text-gray-900">{{ $company->name }}</div>
                        <div class="text-sm text-gray-500">{{ $company->company_category->name }}</div>
                    </x-atom.td>
                    <x-atom.td>
                        @if ($company->is_published)
                        <x-atom.badge type="success">{{ __('published') }}</x-atom.badge>
                        @else
                        <x-atom.badge type="danger">{{ __('not published') }}</x-atom.badge>
                        @endif
                    </x-atom.td>
                    <x-atom.td>{{ $company->created_at->diffForHumans() }}</x-atom.td>
                    <x-atom.td class="text-right">
                        @can('edit_company')
                        <x-atom.button href="{{ route('admin.company.edit', $company) }}">{{ __('Edit') }}</x-atom.button>
                        @endcan
                        @can('delete_company')
                        <x-molecule.button-delete action="{{ route('admin.company.destroy', $company) }}">{{ __('Delete') }}</x-molecule.button-delete>
                        @endcan
                    </x-atom.td>
                </tr>
                @endforeach
            </x-slot>
        </x-molecule.table>

        {{ $companies->links() }}

        @else

        <x-molecule.empty url="{{ route('admin.company.create') }}" />

        @endif

    </x-molecule.container>

</x-admin-layout>
<x-admin-layout>

    <x-molecule.container>

        <x-molecule.heading href="{{ route('admin.company_category.create') }}">
            {{ __('Manage Company Categories') }}
        </x-molecule.heading>

        @if (!$companyCategories->isEmpty())

        <x-molecule.table>
            <x-slot name="header">
                <x-atom.th>{{ __('Name') }}</x-atom.th>
                <x-atom.th>{{ __('Date Created') }}</x-atom.th>
                <x-atom.th class="relative px-6 py-3 text-right">
                    <span class="sr-only">{{ __('Actions') }}</span>
                </x-atom.th>
            </x-slot>
            <x-slot name="body">
                @foreach ($companyCategories as $companyCategory)
                <tr>
                    <x-atom.td class="text-gray-900">{{ $companyCategory->name }}</x-atom.td>
                    <x-atom.td>{{ $companyCategory->created_at->diffForHumans() }}</x-atom.td>
                    <x-atom.td class="text-right">
                        @can('edit_company_category')
                        <x-atom.button href="{{ route('admin.company_category.edit', $companyCategory) }}">{{ __('Edit') }}</x-atom.button>
                        @endcan
                        @can('delete_company_category')
                        <x-molecule.button-delete action="{{ route('admin.company_category.destroy', $companyCategory) }}">{{ __('Delete') }}</x-molecule.button-delete>
                        @endcan
                    </x-atom.td>
                </tr>
                @endforeach
            </x-slot>
        </x-molecule.table>

        {{ $companyCategories->links() }}

        @else

        <x-molecule.empty url="{{ route('admin.company_category.create') }}" />

        @endif

    </x-molecule.container>

</x-admin-layout>
<x-admin-layout>

    <x-molecule.container>

        <x-molecule.heading href="{{ route('admin.reward_category.create') }}">
            {{ __('Manage Reward Categories') }}
        </x-molecule.heading>

        @if (!$rewardCategories->isEmpty())

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
                @foreach ($rewardCategories as $rewardCategory)
                <tr>
                    <x-atom.td class="text-gray-900">{{ $rewardCategory->name }}</x-atom.td>
                    <x-atom.td>
                        @if ($rewardCategory->is_published)
                        <x-atom.badge type="success">{{ __('published') }}</x-atom.badge>
                        @else
                        <x-atom.badge type="danger">{{ __('not published') }}</x-atom.badge>
                        @endif
                    </x-atom.td>
                    <x-atom.td>{{ $rewardCategory->created_at->diffForHumans() }}</x-atom.td>
                    <x-atom.td class="text-right">
                        @can('edit_reward_category')
                        <x-atom.button href="{{ route('admin.reward_category.edit', $rewardCategory) }}">{{ __('Edit') }}</x-atom.button>
                        @endcan
                        @can('delete_reward_category')
                        <x-molecule.button-delete action="{{ route('admin.reward_category.destroy', $rewardCategory) }}">{{ __('Delete') }}</x-molecule.button-delete>
                        @endcan
                    </x-atom.td>
                </tr>
                @endforeach
            </x-slot>
        </x-molecule.table>

        {{ $rewardCategories->links() }}

        @else

        <x-molecule.empty url="{{ route('admin.reward_category.create') }}" />

        @endif

    </x-molecule.container>

</x-admin-layout>
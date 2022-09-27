<x-admin-layout>

    <x-molecule.container>

        <x-molecule.heading href="{{ route('admin.reward.create') }}">
            {{ __('Manage Rewards') }}
        </x-molecule.heading>

        @if (!$rewards->isEmpty())

        <x-molecule.table>
            <x-slot name="header">
                <x-atom.th>{{ __('Name') }}</x-atom.th>
                <x-atom.th>{{ __('Points') }}</x-atom.th>
                <x-atom.th>{{ __('Category') }}</x-atom.th>
                <x-atom.th>{{ __('Physical') }}</x-atom.th>
                <x-atom.th>{{ __('Published') }}</x-atom.th>
                <x-atom.th>{{ __('Date Created') }}</x-atom.th>
                <x-atom.th class="relative px-6 py-3 text-right">
                    <span class="sr-only">{{ __('Actions') }}</span>
                </x-atom.th>
            </x-slot>
            <x-slot name="body">
                @foreach ($rewards as $reward)
                <tr>
                    <x-atom.td class="text-gray-900">{{ $reward->name }}</x-atom.td>
                    <x-atom.td>{{ $reward->points }}</x-atom.td>
                    <x-atom.td>{{ $reward->reward_category->name ?? '' }}</x-atom.td>
                    <x-atom.td>
                        @if ($reward->is_physical)
                        <x-atom.badge type="warning">{{ __('yes') }}</x-atom.badge>
                        @else
                        <x-atom.badge type="info">{{ __('no') }}</x-atom.badge>
                        @endif
                    </x-atom.td>
                    <x-atom.td>
                        @if ($reward->is_published)
                        <x-atom.badge type="success">{{ __('published') }}</x-atom.badge>
                        @else
                        <x-atom.badge type="danger">{{ __('not published') }}</x-atom.badge>
                        @endif
                    </x-atom.td>
                    <x-atom.td>{{ $reward->created_at->diffForHumans() }}</x-atom.td>
                    <x-atom.td class="text-right">
                        @can('edit_reward')
                        <x-atom.button href="{{ route('admin.reward.edit', $reward) }}">{{ __('Edit') }}</x-atom.button>
                        @endcan
                        @can('delete_reward')
                        <x-molecule.button-delete action="{{ route('admin.reward.destroy', $reward) }}">{{ __('Delete') }}</x-molecule.button-delete>
                        @endcan
                    </x-atom.td>
                </tr>
                @endforeach
            </x-slot>
        </x-molecule.table>

        {{ $rewards->links() }}

        @else

        <x-molecule.empty url="{{ route('admin.reward.create') }}" />

        @endif

    </x-molecule.container>

</x-admin-layout>
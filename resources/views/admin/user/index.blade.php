<x-admin-layout>

    <x-molecule.container>

        <x-molecule.heading href="{{ route('admin.user.create') }}">
            {{ __('Manage Users') }}
        </x-molecule.heading>

        <x-molecule.table>
            <x-slot name="header">
                <x-atom.th>{{ __('Name') }}</x-atom.th>
                <x-atom.th>{{ __('Role') }}</x-atom.th>
                <x-atom.th>{{ __('Status') }}</x-atom.th>
                <x-atom.th>{{ __('Last Login') }}</x-atom.th>
                <x-atom.th>{{ __('Date Created ') }}</x-atom.th>
                <x-atom.th class="relative px-6 py-3 text-right">
                    <span class="sr-only">{{ __('Actions') }}</span>
                </x-atom.th>
            </x-slot>
            <x-slot name="body">
                @foreach ($users as $user)
                <tr>
                    <x-atom.td>
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                <img class="h-10 w-10 rounded-full" src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}">
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">{{ $user->name }}</div>
                                <div class="text-sm text-gray-500">{{ $user->email }}</div>
                            </div>
                        </div>
                    </x-atom.td>
                    <x-atom.td>{{ $user->roles->pluck('name')->implode(', ') }}</x-atom.td>
                    <x-atom.td>
                        @if ($user->status == 'approved')
                        <x-atom.badge type="success">{{ __('approved') }}</x-atom.badge>
                        @elseif ($user->status == 'rejected')
                        <x-atom.badge type="danger">{{ __('rejected') }}</x-atom.badge>
                        @else
                        <x-atom.badge type="info">{{ __('pending') }}</x-atom.badge>
                        @endif
                    </x-atom.td>
                    <x-atom.td>{{ $user->last_login_at ? $user->last_login_at->diffForHumans() : 'never' }}</x-atom.td>
                    <x-atom.td>{{ $user->created_at->diffForHumans() }}</x-atom.td>
                    <x-atom.td class="text-right">
                        @can('edit_user')
                        <x-atom.button href="{{ route('admin.user.edit', $user) }}">{{ __('Edit') }}</x-atom.button>
                        @endcan
                        @can('delete_user')
                        <x-molecule.button-delete action="{{ route('admin.user.destroy', [$user]) }}">{{ __('Delete') }}</x-molecule.button-delete>
                        @endcan
                    </x-atom.td>
                </tr>
                @endforeach
            </x-slot>
        </x-molecule.table>

        {{ $users->links() }}

    </x-molecule.container>

</x-admin-layout>
<x-admin-layout>

    <x-molecule.container>

        <x-molecule.heading href="{{ route('admin.tool.setting.create') }}">
            {{ __('Manage Settings') }}
        </x-molecule.heading>

        @if (!$settings->isEmpty())

        <x-molecule.table>
            <x-slot name="header">
                <x-atom.th>{{ __('Key') }}</x-atom.th>
                <x-atom.th>{{ __('Value') }}</x-atom.th>
                <x-atom.th class="hidden sm:table-cell">{{ __('Last Updated') }}</x-atom.th>
                <x-atom.th class="relative px-6 py-3 text-right">
                    <span class="sr-only">{{ __('Actions') }}</span>
                </x-atom.th>
            </x-slot>
            <x-slot name="body">
                @foreach ($settings as $setting)
                <tr class="{{ $loop->index % 2 ? 'bg-gray-50' : 'bg-white' }}">
                    <x-atom.td class="text-gray-900">{{ $setting->setting_key }}</x-atom.td>
                    <x-atom.td class="text-gray-500">{{ $setting->setting_value }}</x-atom.td>
                    <x-atom.td class="text-gray-500 hidden sm:table-cell">{{ $setting->updated_at->diffForHumans() }}</x-atom.td>
                    <x-atom.td class="text-right">
                        @if ($setting->is_editable)
                        @can('edit_setting')
                        <x-atom.button href="{{ route('admin.tool.setting.edit', $setting) }}">{{ __('Edit') }}</x-atom.button>
                        @endcan
                        @endif
                        @if ($setting->is_deletable)
                        @can('delete_setting')
                        <x-molecule.button-delete action="{{ route('admin.tool.setting.destroy', $setting) }}">{{ __('Delete') }}</x-molecule.button-delete>
                        @endcan
                        @endif
                    </x-atom.td>
                </tr>
                @endforeach
            </x-slot>
        </x-molecule.table>

        {{ $settings->links() }}

        @else

        <x-molecule.empty url="{{ route('admin.tool.setting.create') }}" />

        @endif

    </x-molecule.container>

</x-admin-layout>
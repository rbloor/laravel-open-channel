<div>

    <x-molecule.table>
        <x-slot name="header">
            <x-atom.th>{{ __('Name') }}</x-atom.th>
            <x-atom.th>{{ __('Email') }}</x-atom.th>
            <x-atom.th>{{ __('Subject') }}</x-atom.th>
            <x-atom.th>{{ __('Date Sent') }}</x-atom.th>
            <x-atom.th class="relative px-6 py-3 text-right">
                <span class="sr-only">{{ __('Actions') }}</span>
            </x-atom.th>
        </x-slot>
        <x-slot name="body">
            @foreach ($feedbacks as $message)
            <tr>
                <x-atom.td class="text-gray-900">{{ $message->user->name }}</x-atom.td>
                <x-atom.td class="text-gray-900">{{ $message->user->email }}</x-atom.td>
                <x-atom.td>{{ $message->subject }}</x-atom.td>
                <x-atom.td>{{ $message->created_at->diffForHumans() }}</x-atom.td>
                <x-atom.td class="text-right">
                    @can('view_feedback')
                    <x-atom.button type="button" wire:click="show({{ $message->id }})">
                        {{ __('Show') }}
                    </x-atom.button>
                    @endcan
                    @can('delete_feedback')
                    <x-atom.button type="button" color="danger" wire:click="confirmDelete({{ $message->id }})">
                        {{ __('Delete') }}
                    </x-atom.button>
                    @endcan
                </x-atom.td>
            </tr>
            @endforeach
        </x-slot>
    </x-molecule.table>

    {{ $feedbacks->links() }}

    <x-jet-dialog-modal wire:model="showModal">
        <x-slot name="title">
            {{ $this->subject }}
        </x-slot>

        <x-slot name="content">
            {{ $this->message }}
        </x-slot>

        <x-slot name="footer">
            <x-atom.button type="button" wire:click="$set('showModal', false)" wire:loading.attr="disabled">
                {{ __('Close') }}
            </x-atom.button>
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model="deleteModal">
        <x-slot name="title">
            {{ __('Delete Feedback') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete this item?') }}
        </x-slot>

        <x-slot name="footer">
            <x-atom.button type="button" wire:click="$set('deleteModal', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-atom.button>
            <x-atom.button type="button" color="danger" class="ml-3" wire:click="delete" wire:loading.attr="disabled">
                {{ __('Delete') }}
            </x-atom.button>
        </x-slot>
    </x-jet-dialog-modal>

</div>
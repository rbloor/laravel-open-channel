<div>

    <div>
        <dl class="grid grid-cols-1 gap-5 sm:grid-cols-4">
            <x-molecule.stat name="Total" value="{{ $totalCount }}"></x-molecule.stat>
            <x-molecule.stat name="Pending" value="{{ $pendingCount }}"></x-molecule.stat>
            <x-molecule.stat name="Approved" value="{{ $approvedCount }}"></x-molecule.stat>
            <x-molecule.stat name="Rejected" value="{{ $rejectedCount }}"></x-molecule.stat>
        </dl>
    </div>

    <span class="relative z-0 my-4 inline-flex shadow-sm rounded-md">
        <button wire:click="$set('filter.status', '')" type="button" class="relative inline-flex items-center px-4 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">All</button>
        <button wire:click="$set('filter.status', 'pending')" type="button" class="-ml-px relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">Pending</button>
        <button wire:click="$set('filter.status', 'approved')" type="button" class="-ml-px relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">Approved</button>
        <button wire:click="$set('filter.status', 'rejected')" type="button" class="-ml-px relative inline-flex items-center px-4 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">Rejected</button>
    </span>

    <x-molecule.table>
        <x-slot name="header">
            <x-atom.th>{{ __('Name') }}</x-atom.th>
            <x-atom.th>{{ __('Job Title') }}</x-atom.th>
            <x-atom.th>{{ __('Tax Rate') }}</x-atom.th>
            <x-atom.th>{{ __('Status') }}</x-atom.th>
            <x-atom.th>{{ __('Date Registered') }}</x-atom.th>
            <x-atom.th class="relative px-6 py-3 text-right">
                <span class="sr-only">{{ __('Actions') }}</span>
            </x-atom.th>
        </x-slot>
        <x-slot name="body">
            @foreach ($memberships as $membership)
            <tr>
                <x-atom.td>
                    <div class="flex items-center">
                        <div>
                            <div class="text-sm font-medium text-gray-900">{{ $membership->user->name }}</div>
                            <div class="text-sm text-gray-500">{{ $membership->user->email }}</div>
                        </div>
                    </div>
                </x-atom.td>
                <x-atom.td>
                    <div class="text-sm text-gray-900">{{ $membership->job_title }}</div>
                    <div class="text-sm text-gray-500">{{ $membership->company->name }}</div>
                </x-atom.td>
                <x-atom.td>
                    <div class="text-sm text-gray-900">{{ $membership->tax_region }}</div>
                    <div class="text-sm text-gray-500">{{ $membership->tax_bracket ?? 0 }}%</div>
                </x-atom.td>
                <x-atom.td>
                    @if ($membership->user->trashed())
                    <x-atom.badge type="danger">{{ __('deleted') }}</x-atom.badge>
                    @elseif ($membership->user->status == 'approved')
                    <x-atom.badge type="success">{{ __('approved') }}</x-atom.badge>
                    @elseif ($membership->user->status == 'rejected')
                    <x-atom.badge type="danger">{{ __('rejected') }}</x-atom.badge>
                    @else
                    <x-atom.badge type="info">{{ __('pending') }}</x-atom.badge>
                    @endif
                </x-atom.td>
                <x-atom.td>{{ $membership->created_at->diffForHumans() }}</x-atom.td>
                <x-atom.td class="text-right">
                    @can('view_membership')
                    <x-atom.button type="button" wire:click="show({{ $membership->id }})">
                        {{ __('View') }}
                    </x-atom.button>
                    @endcan
                    @if ($membership->user->status === 'pending')
                    @can('approve_membership')
                    <x-atom.button type="button" color="success" wire:click="approve({{ $membership->id }})">{{ __('Approve') }}</x-atom.button>
                    @endcan
                    @can('reject_membership')
                    <x-atom.button type="button" color="danger" wire:click="reject({{ $membership->id }})">{{ __('Reject') }}</x-atom.button>
                    @endcan
                    @endif
                </x-atom.td>
            </tr>
            @endforeach
        </x-slot>
    </x-molecule.table>

    {{ $memberships->links() }}

    @if ($showMembership)
    <x-jet-dialog-modal wire:model="showModal" maxWidth="3xl">
        <x-slot name="title">
            Membership Information
        </x-slot>
        <x-slot name="content">
            <x-atom.dl>
                <x-atom.dt title="Full name">{{ $showMembership->user->name }}</x-atom.dt>
                <x-atom.dt title="Email address">{{ $showMembership->user->email }}</x-atom.dt>
                <x-atom.dt title="Company name">{{ $showMembership->company->name }}</x-atom.dt>
                <x-atom.dt title="Job title">{{ $showMembership->job_title }}</x-atom.dt>
                <x-atom.dt title="Telephone">{{ $showMembership->telephone }}</x-atom.dt>
                <x-atom.dt title="Tax Region">{{ strtoupper($showMembership->tax_region) }}</x-atom.dt>
                <x-atom.dt title="Tax Bracket">{{ $showMembership->tax_bracket }}%</x-atom.dt>
                <x-atom.dt title="Status">
                    @if ($showMembership->user->trashed())
                    <x-atom.badge type="danger">{{ __('deleted') }}</x-atom.badge>
                    @elseif ($showMembership->user->status == 'approved')
                    <x-atom.badge type="success">{{ __('approved') }}</x-atom.badge>
                    @elseif ($showMembership->user->status == 'rejected')
                    <x-atom.badge type="danger">{{ __('rejected') }}</x-atom.badge>
                    @else
                    <x-atom.badge type="info">{{ __('pending') }}</x-atom.badge>
                    @endif
                </x-atom.dt>
            </x-atom.dl>
        </x-slot>
        <x-slot name="footer">
            <x-atom.button type="button" wire:click="$set('showModal', false)" wire:loading.attr="disabled">
                {{ __('Close') }}
            </x-atom.button>
        </x-slot>
    </x-jet-dialog-modal>
    @endif

</div>
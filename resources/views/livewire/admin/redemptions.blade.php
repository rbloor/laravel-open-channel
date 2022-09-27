<div>

    <div>
        <dl class="grid grid-cols-1 gap-5 sm:grid-cols-4">
            <x-molecule.stat name="Total" value="{{ $allRedemptions->count() }}"></x-molecule.stat>
            <x-molecule.stat name="Pending" value="{{ App\Models\Redemption::pending()->count() }}"></x-molecule.stat>
            <x-molecule.stat name="Approved" value="{{ App\Models\Redemption::approved()->count() }}"></x-molecule.stat>
            <x-molecule.stat name="Rejected" value="{{ App\Models\Redemption::rejected()->count() }}"></x-molecule.stat>
        </dl>
    </div>

    <span class="relative z-0 my-4 inline-flex shadow-sm rounded-md">
        <button wire:click="$set('filter.status', '')" type="button" class="relative inline-flex items-center px-4 py-2 rounded-l-md border border-gray-300 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 @if ($this->filter['status'] == '') bg-gray-50 @endif">All</button>
        <button wire:click="$set('filter.status', 'pending')" type="button" class="-ml-px relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 @if ($this->filter['status'] == 'pending')  bg-gray-50 @endif">Pending</button>
        <button wire:click="$set('filter.status', 'approved')" type="button" class="-ml-px relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 @if ($this->filter['status'] == 'approved') bg-gray-50 @endif">Approved</button>
        <button wire:click="$set('filter.status', 'rejected')" type="button" class="-ml-px relative inline-flex items-center px-4 py-2 rounded-r-md border border-gray-300 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 @if ($this->filter['status'] == 'rejected') bg-gray-50 @endif">Rejected</button>
    </span>

    <x-molecule.table>
        <x-slot name="header">
            <x-atom.th>{{ __('User') }}</x-atom.th>
            <x-atom.th>{{ __('Items') }}</x-atom.th>
            <x-atom.th>{{ __('Points') }}</x-atom.th>
            <x-atom.th>{{ __('Status') }}</x-atom.th>
            <x-atom.th>{{ __('Date Created') }}</x-atom.th>
            <x-atom.th class="text-right">
                <span class="sr-only">{{ __('Actions') }}</span>
            </x-atom.th>
        </x-slot>
        <x-slot name="body">
            @foreach ($redemptions as $redemption)
            <tr>
                <x-atom.td>
                    <div class="flex items-center">
                        <div>
                            <div class="text-sm font-medium text-gray-900">{{ $redemption->user->name }}</div>
                            <div class="text-sm text-gray-500">{{ $redemption->user->email }}</div>
                        </div>
                    </div>
                </x-atom.td>
                <x-atom.td>{{ $redemption->rewards()->count() }}</x-atom.td>
                <x-atom.td>{{ $redemption->total_points }}</x-atom.td>
                <x-atom.td>
                    @if ($redemption->status == 'approved')
                    <x-atom.badge type="success">{{ __('approved') }}</x-atom.badge>
                    @elseif ($redemption->status == 'rejected')
                    <x-atom.badge type="danger">{{ __('rejected') }}</x-atom.badge>
                    @else
                    <x-atom.badge type="info">{{ __('pending') }}</x-atom.badge>
                    @endif
                </x-atom.td>
                <x-atom.td>{{ $redemption->created_at->diffForHumans() }}</x-atom.td>
                <x-atom.td class="text-right">
                    @can('view_redemption')
                    <x-atom.button type="button" wire:click="show({{ $redemption->id }})">
                        {{ __('View') }}
                    </x-atom.button>
                    @endcan
                    @if ($redemption->status === 'pending')
                    @can('approve_redemption')
                    <x-atom.button type="submit" color="success" wire:click="approve({{ $redemption->id }})">{{ __('Approve') }}</x-atom.button>
                    @endcan
                    @can('reject_redemption')
                    <x-atom.button type="submit" color="danger" wire:click="reject({{ $redemption->id }})">{{ __('Reject') }}</x-atom.button>
                    @endcan
                    @endif
                </x-atom.td>
            </tr>
            @endforeach
        </x-slot>
    </x-molecule.table>

    {{ $redemptions->links() }}

    @if ($showRedemption)
    <x-jet-dialog-modal wire:model="showModal" maxWidth="3xl">
        <x-slot name="title">
            Redemption Information
        </x-slot>

        <x-slot name="content">
            <x-atom.dl>
                <x-atom.dt title="Full name">{{ $showRedemption->name }}</x-atom.dt>
                <x-atom.dt title="Email address">{{ $showRedemption->email }}</x-atom.dt>
                <x-atom.dt title="Telephone">{{ $showRedemption->telephone }}</x-atom.dt>
                @if ($showRedemption->requires_shipping)
                <x-atom.dt title="Address">
                    <div class="flex flex-col">
                        <div>{{ $showRedemption->address_one }}</div>
                        <div>{{ $showRedemption->address_two }}</div>
                        <div>{{ $showRedemption->city }}</div>
                        <div>{{ $showRedemption->county }}</div>
                        <div>{{ strtoupper($showRedemption->postcode) }}</div>
                        <div>{{ strtoupper($showRedemption->country) }}</div>
                    </div>
                </x-atom.dt>
                @else
                <x-atom.dt title="Country">
                    {{ strtoupper($showRedemption->country) }}
                </x-atom.dt>
                @endif
                <!--
                <x-atom.dt title="Gross">{{ $showRedemption->gross }}</x-atom.dt>
                <x-atom.dt title="Vat">{{ $showRedemption->vat }}</x-atom.dt>
                <x-atom.dt title="Tax">{{ $showRedemption->tax }}</x-atom.dt>
                <x-atom.dt title="NI">{{ $showRedemption->ni }}</x-atom.dt>
                <x-atom.dt title="Net">{{ $showRedemption->net }}</x-atom.dt>
                -->
                <x-atom.dt title="Order number">{{ $showRedemption->order_number }}</x-atom.dt>
                <x-atom.dt title="Rewards">
                    <x-molecule.table>
                        <x-slot name="header">
                            <x-atom.th>{{ __('Name') }}</x-atom.th>
                            <x-atom.th>{{ __('Quantity') }}</x-atom.th>
                            <x-atom.th>{{ __('Points') }}</x-atom.th>
                        </x-slot>
                        <x-slot name="body">
                            @foreach ($showRedemption->rewards as $reward)
                            <tr>
                                <x-atom.td>{{ $reward->name }}</x-atom.td>
                                <x-atom.td>{{ $reward->pivot->quantity }}</x-atom.td>
                                <x-atom.td>{{ $reward->pivot->points }}</x-atom.td>
                            </tr>
                            @endforeach
                        </x-slot>
                    </x-molecule.table>
                </x-atom.dt>
                <x-atom.dt title="Total">
                    {{ $showRedemption->total_points }}
                </x-atom.dt>
                <x-atom.dt title="Status">
                    @if ($showRedemption->status == 'approved')
                    <x-atom.badge type="success">{{ __('approved') }}</x-atom.badge>
                    @elseif ($showRedemption->status == 'rejected')
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
<div>

    <div>
        <dl class="grid grid-cols-1 gap-5 sm:grid-cols-4">
            <x-molecule.stat name="Total" value="{{ $allSales->count() }}"></x-molecule.stat>
            <x-molecule.stat name="Pending" value="{{ App\Models\Sale::pending()->count() }}"></x-molecule.stat>
            <x-molecule.stat name="Approved" value="{{ App\Models\Sale::approved()->count() }}"></x-molecule.stat>
            <x-molecule.stat name="Rejected" value="{{ App\Models\Sale::rejected()->count() }}"></x-molecule.stat>
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
            <x-atom.th>{{ __('Product') }}</x-atom.th>
            <x-atom.th>{{ __('Quantity') }}</x-atom.th>
            <x-atom.th>{{ __('Points') }}</x-atom.th>
            <x-atom.th>{{ __('Status') }}</x-atom.th>
            <x-atom.th>{{ __('Date Created') }}</x-atom.th>
            <x-atom.th class="text-right">
                <span class="sr-only">{{ __('Actions') }}</span>
            </x-atom.th>
        </x-slot>
        <x-slot name="body">
            @foreach ($sales as $sale)
            <tr>
                <x-atom.td>
                    <div class="flex items-center">
                        <div>
                            <div class="font-medium text-gray-900">{{ $sale->user->name }}</div>
                            <div>{{ $sale->user->email }}</div>
                        </div>
                    </div>
                </x-atom.td>
                <x-atom.td>
                    <div class="text-gray-900">{{ $sale->product->name }}</div>
                    <div>{{ $sale->product->product_category->name }}</div>
                </x-atom.td>
                <x-atom.td>{{ $sale->quantity }}</x-atom.td>
                <x-atom.td>{{ $sale->total_points }}</x-atom.td>
                <x-atom.td>
                    @if ($sale->status == 'approved')
                    <x-atom.badge type="success">{{ __('approved') }}</x-atom.badge>
                    @elseif ($sale->status == 'rejected')
                    <x-atom.badge type="danger">{{ __('rejected') }}</x-atom.badge>
                    @else
                    <x-atom.badge type="info">{{ __('pending') }}</x-atom.badge>
                    @endif
                </x-atom.td>
                <x-atom.td>{{ $sale->created_at->diffForHumans() }}</x-atom.td>
                <x-atom.td class="text-right">
                    @can('view_sale')
                    <x-atom.button type="button" wire:click="show({{ $sale->id }})">
                        {{ __('View') }}
                    </x-atom.button>
                    @endcan
                    @if ($sale->status === 'pending')
                    @can('approve_sale')
                    <x-atom.button color="success" type="submit" wire:click="approve({{ $sale->id }})">{{ __('Approve') }}</x-atom.button>
                    @endcan
                    @can('reject_sale')
                    <x-atom.button color="danger" type="submit" wire:click="reject({{ $sale->id }})">{{ __('Reject') }}</x-atom.button>
                    @endcan
                    @endif
                </x-atom.td>
            </tr>
            @endforeach
        </x-slot>
    </x-molecule.table>

    {{ $sales->links() }}

    @if ($showSale)
    <x-jet-dialog-modal wire:model="showModal" maxWidth="3xl">
        <x-slot name="title">
            Sale Information
        </x-slot>

        <x-slot name="content">
            <x-atom.dl>
                <x-atom.dt title="Full name">{{ $showSale->user->name }}</x-atom.dt>
                <x-atom.dt title="Email address">{{ $showSale->user->email }}</x-atom.dt>
                <x-atom.dt title="Product name">{{ $showSale->product->name }}</x-atom.dt>
                <x-atom.dt title="Quantity">{{ $showSale->quantity }}</x-atom.dt>
                <x-atom.dt title="Points">{{ $showSale->points }}</x-atom.dt>
                <x-atom.dt title="Bonus poinits">{{ $showSale->bonus_points }}</x-atom.dt>
                <x-atom.dt title="Total poinits">{{ $showSale->total_points }}</x-atom.dt>
                <x-atom.dt title="Price">&pound;{{ $showSale->price }}</x-atom.dt>
                <x-atom.dt title="Date sold">{{ $showSale->sold_at->format('d/m/Y') }}</x-atom.dt>
                <x-atom.dt title="Date invoiced">{{ $showSale->invoiced_at->format('d/m/Y') }}</x-atom.dt>
                <x-atom.dt title="Status">
                    @if ($showSale->status == 'approved')
                    <x-atom.badge type="success">{{ __('approved') }}</x-atom.badge>
                    @elseif ($showSale->status == 'rejected')
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
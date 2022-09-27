<div>

    <h3 class="text-lg leading-6 font-medium text-gray-900">{{ __('Filters') }}</h3>
    <div class="my-4 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6 mb-6">
        <div class="sm:col-span-1">
            <x-atom.label for="date_from" value="{{ __('Date from') }}" />
            <x-atom.input type="date" wire:model="filter.date_from" id="date_from" class="mt-1 text-xs leading-none" />
        </div>
        <div class="sm:col-span-1">
            <x-atom.label for="date_to" value="{{ __('Date to') }}" />
            <x-atom.input type="date" wire:model="filter.date_to" id="date_to" class="mt-1 text-xs leading-none" />
        </div>
    </div>

    <div class="grid grid-cols-1 gap-10 sm:grid-cols-4">
        <div>
            <h3 class="text-lg leading-6 font-medium text-gray-900">{{ __('Registrations') }}</h3>
            <div class="bg-white my-4 shadow rounded-lg divide-y divide-gray-200">
                <x-molecule.inline-stat name="Active" type="info" :value="$approvedMemberships" :active="true" />
                <x-molecule.inline-stat name="Pending" type="info" :value="$pendingMemberships" />
                <x-molecule.inline-stat name="Disabled" type="info" :value="$rejectedMemberships" />
            </div>
            <x-atom.button href="{{ route('admin.membership.index') }}">{{ __('View memberships') }}</x-atom.button>
        </div>
        <div>
            <h3 class="text-lg leading-6 font-medium text-gray-900">{{ __('Sales') }}</h3>
            <div class="bg-white my-4 shadow rounded-lg divide-y divide-gray-200">
                <x-molecule.inline-stat name="Approved" type="info" :value="$approvedSales" :active="true" />
                <x-molecule.inline-stat name="Pending" type="info" :value="$pendingSales" />
                <x-molecule.inline-stat name="Rejected" type="info" :value="$rejectedSales" />
            </div>
            <x-atom.button href="{{ route('admin.sale.index') }}">{{ __('View sales') }}</x-atom.button>
        </div>
        <div>
            <h3 class="text-lg leading-6 font-medium text-gray-900">{{ __('Rewards') }}</h3>
            <div class="bg-white my-4 shadow rounded-lg divide-y divide-gray-200">
                <x-molecule.inline-stat name="Points awarded" type="info" :value="$pointsAwarded" />
                <x-molecule.inline-stat name="Points redeemed" type="info" :value="$pointsRedeemed" />
                <x-molecule.inline-stat name="Points unredeemed" type="info" :value="$pointsUnredeemed" />
            </div>
        </div>
        <div>
            <h3 class="text-lg leading-6 font-medium text-gray-900">{{ __('Budget') }}</h3>
            <div class="bg-white my-4 shadow rounded-lg divide-y divide-gray-200">
                <x-molecule.inline-stat name="Total budget" type="info" :value="$budgetTotal" />
                <x-molecule.inline-stat name="Sales claimed" type="info" :value="$budgetUsed" />
                <x-molecule.inline-stat name="Budget left" type="info" :value="$budgetRemaining" />
                <x-molecule.inline-stat name="Net Budget left" type="info" :value="$netBudgetRemaining" />
            </div>
        </div>
    </div>

</div>
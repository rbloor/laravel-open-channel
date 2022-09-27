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

    <x-molecule.subheading title="{{ __('Transactions') }}" :livewire="'exportTransactions'">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
        </svg>
    </x-molecule.subheading>

    <dl class="my-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
        <x-molecule.stat name="Credit" :value="$creditFormatted" />
        <x-molecule.stat name="Debit" :value="$debitFormatted" />
        <x-molecule.stat name="Balance" :value="$balanceFormatted" />
    </dl>

    <x-molecule.subheading title="{{ __('Money') }}"></x-molecule.subheading>

    <dl class="my-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
        <x-molecule.stat name="Gross" :value="$redeemedGrossFormatted" />
        <x-molecule.stat name="VAT" :value="$redeemedVatFormatted" />
        <x-molecule.stat name="Tax" :value="$redeemedTaxFormatted" />
        <x-molecule.stat name="National Insurance" :value="$redeemedNiFormatted" />
        <x-molecule.stat name="Net" :value="$redeemedNetFormatted" />
    </dl>

    <x-molecule.subheading title="{{ __('Liabilities') }}"></x-molecule.subheading>

    <dl class="my-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
        <x-molecule.stat name="Gross" :value="$unredeemedGrossFormatted" />
        <x-molecule.stat name="VAT" :value="$unredeemedVatFormatted" />
        <x-molecule.stat name="Tax" :value="$unredeemedTaxFormatted" />
        <x-molecule.stat name="National Insurance" :value="$unredeemedNiFormatted" />
        <x-molecule.stat name="Net" :value="$unredeemedNetFormatted" />
    </dl>

    <x-molecule.subheading title="{{ __('Memberships') }}" :livewire="'exportMemberships'">
        <svg xmlns=" http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
        </svg>
    </x-molecule.subheading>

    <dl class="my-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
        <x-molecule.stat name="Registrations" :value="$total_registrations" />
        <x-molecule.stat name="Logins" :value="$total_user_logins" />
        <x-molecule.stat name="Opt Outs" :value="$total_optouts" />
    </dl>

    <x-molecule.subheading title="{{ __('Sales') }}" :livewire="'exportSales'">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
        </svg>
    </x-molecule.subheading>

    <dl class="my-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
        <x-molecule.stat name="Approved Sales" :value="$approvedSales" />
        <x-molecule.stat name="Points Awarded" :value="$pointsAwarded" />
        <x-molecule.stat name="Bonus Points Awarded" :value="$bonusPointsAwarded" />
        <x-molecule.stat name="Total Points Awarded" :value="$totalPointsAwarded" />
    </dl>

    <x-molecule.subheading title="{{ __('Redemptions') }}" :livewire="'exportRedemptions'">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
        </svg>
    </x-molecule.subheading>

    <dl class="my-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
        <x-molecule.stat name="Approved Redemptions" :value="$totalRedemptions" />
        <x-molecule.stat name="Total Points Redeemed" :value="$totalPointsRedeemed" />
        <x-molecule.stat name="Total Points Unredeemed" :value="$totalPointsUnredeemed" />
    </dl>

</div>
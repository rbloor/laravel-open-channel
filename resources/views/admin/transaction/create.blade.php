<x-admin-layout>

    <x-molecule.container>

        <x-molecule.heading>
            {{ __('Create Transaction') }}
        </x-molecule.heading>

        <x-molecule.form action="{{ route('admin.transaction.store') }}">

            <x-slot name="title">
                {{ __('Transaction Information') }}
            </x-slot>

            <x-slot name="description">
                {{ __('') }}
            </x-slot>

            <x-slot name="form">

                @csrf

                <!-- Payment Type -->
                <div class="col-span-6 sm:col-span-4">
                    <x-atom.label for="name" value="{{ __('Payment Type') }}" />
                    <x-atom.input id="name" type="text" name="name" value="{{ __('Deposit') }}" />
                    <x-atom.error for="name" class="mt-2" />
                </div>

                <!-- Credit -->
                <div class="col-span-6 sm:col-span-4">
                    <x-atom.label for="credit" value="{{ __('Credit') }}" />
                    <x-atom.input id="credit" type="text" name="credit" prefix="£" affix="GBP" class="pl-7 pr-12" placeholder="0.00" value="{{ old('credit') }}" />
                    <x-atom.error for="credit" class="mt-2" />
                </div>

            </x-slot>

            <x-slot name="actions">
                <x-atom.button type="submit">
                    Save
                </x-atom.button>
            </x-slot>

        </x-molecule.form>

    </x-molecule.container>

</x-admin-layout>
<x-jet-form-section submit="updateMembershipInformation" x-data="{ showTaxBracket:  {{ $state['tax_region'] == 'uk' ? 'true' : 'false' }} }">
    <x-slot name="title">
        {{ __('Membership Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s membership information.') }}
    </x-slot>

    <x-slot name="form">

        <!-- Telephone -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="telephone" value="{{ __('Telephone') }}" />
            <x-jet-input id="telephone" type="text" class="mt-1 block w-full" wire:model.defer="state.telephone" autocomplete="telephone" />
            <x-jet-input-error for="telephone" class="mt-2" />
        </div>

        <!-- Job Title -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="job_title" value="{{ __('Job title') }}" />
            <x-jet-input id="job_title" type="text" class="mt-1 block w-full" wire:model.defer="state.job_title" autocomplete="job_title" />
            <x-jet-input-error for="job_title" class="mt-2" />
        </div>

        <!-- Tax Region -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="tax_region" value="{{ __('Tax Region') }}" />
            <select
                x-on:change="showTaxBracket = ($event.target.value == 'uk');"
                id="tax_region"
                wire:model.defer="state.tax_region"
                class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                <option></option>
                <option value="uk">UK</option>
                <option value="roi">Republic of Ireland</option>
            </select>
            <x-jet-input-error for="tax_region" class="mt-2" />
        </div>

        <!-- Tax Bracket -->
        <div x-show="showTaxBracket" class="col-span-6 sm:col-span-4">
            <x-jet-label for="tax_bracket" value="{{ __('Tax Bracket') }}" />
            <select
                id="tax_bracket"
                wire:model.defer="state.tax_bracket"
                class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                <option></option>
                <option value="20">20%</option>
                <option value="40">40%</option>
                <option value="45">45%</option>
            </select>
            <x-jet-input-error for="tax_bracket" class="mt-2" />
            <div class="max-w-xl mt-4 text-sm text-gray-600">If you need to update your tax bracket for the year up to 5th April then please update from the drop down list above.</div>
        </div>

        <!-- Company name -->
        <div class="col-span-6 sm:col-span-4">
            <x-atom.label for="company_id" value="{{ __('Company name') }}" />
            <x-atom.select :disabled="true" id="company_id" name="company_id" wire:model.defer="state.company_id" :allowEmpty="true" :options="$companies->pluck('name', 'id')" />
            <x-atom.error for="company_id" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
<x-admin-layout>

    <x-molecule.container>

        <x-molecule.heading>
            {{ __('Edit Company Category') }}
        </x-molecule.heading>

        <x-molecule.form action="{{ route('admin.company_category.update', $companyCategory) }}">

            <x-slot name="title">
                {{ __('Company Category Information') }}
            </x-slot>

            <x-slot name="description">
                {{ __('') }}
            </x-slot>

            <x-slot name="form">

                @csrf
                @method('PUT')

                <!-- Name -->
                <div class="col-span-6 sm:col-span-4">
                    <x-atom.label for="name" value="{{ __('Name') }}" />
                    <x-atom.input id="name" type="text" name="name" class="mt-1 block w-full" value="{{ $companyCategory->name }}" />
                    <x-atom.error for="name" class="mt-2" />
                </div>

            </x-slot>

            <x-slot name="actions">
                <x-atom.button type="submit">
                    {{ __('Save') }}
                </x-atom.button>
            </x-slot>

        </x-molecule.form>

    </x-molecule.container>

</x-admin-layout>
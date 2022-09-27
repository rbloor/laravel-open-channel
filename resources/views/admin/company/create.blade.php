<x-admin-layout>

    <x-molecule.container>

        <x-molecule.heading>
            {{ __('Create Companies') }}
        </x-molecule.heading>

        <x-molecule.form action="{{ route('admin.company.store') }}">

            <x-slot name="title">
                {{ __('Company Information') }}
            </x-slot>

            <x-slot name="description">
                {{ __('') }}
            </x-slot>

            <x-slot name="form">

                @csrf

                <!-- Company Name -->
                <div class="col-span-6 sm:col-span-4">
                    <x-atom.label for="name" value="{{ __('Name') }}" />
                    <x-atom.input id="name" type="text" name="name" class="mt-1 block w-full" value="{{ old('name') }}" />
                    <x-atom.error for="name" class="mt-2" />
                </div>

                <!-- Company Category -->
                <div class="col-span-6 sm:col-span-4">
                    <x-atom.label for="company_category_id" value="{{ __('Category') }}" />
                    <x-atom.select id="company_category_id" value="{{ old('company_category_id') }}" name="company_category_id" :allowEmpty="true" :options="$companyCategories->pluck('name', 'id')" />
                    <x-atom.error for="company_category_id" class="mt-2" />
                </div>

                <!-- Published -->
                <div class="col-span-6 sm:col-span-4">
                    <x-atom.label for="is_published" value="{{ __('Published?') }}" />
                    <x-atom.select id="is_published" name="is_published" value="{{ old('is_published') }}" :options="['0'=> 'Not Published', '1' => 'Published']" />
                    <x-atom.error for="is_published" class="mt-2" />
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
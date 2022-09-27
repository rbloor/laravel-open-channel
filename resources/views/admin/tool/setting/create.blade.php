<x-admin-layout>

    <x-molecule.container>

        <x-molecule.heading>
            {{ __('Create Settings') }}
        </x-molecule.heading>

        <x-molecule.form action="{{ route('admin.tool.setting.store') }}">

            <x-slot name="title">
                {{ __('Setting Information') }}
            </x-slot>

            <x-slot name="description">
                {{ __('') }}
            </x-slot>

            <x-slot name="form">

                @csrf

                <!-- Key -->
                <div class="col-span-6 sm:col-span-4">
                    <x-atom.label for="setting_key" value="{{ __('Setting key') }}" />
                    <x-atom.input id="setting_key" type="text" name="setting_key" class="mt-1 block w-full" value="{{ old('setting_key') }}" />
                    <x-atom.error for="setting_key" class="mt-2" />
                </div>

                <!-- Description -->
                <div class="col-span-6 sm:col-span-4">
                    <x-atom.label for="setting_value" value="{{ __('Setting value') }}" />
                    <x-atom.textarea id="setting_value" rows="5" name="setting_value" class="mt-1 block w-full" value="{!! old('setting_value') !!}" />
                    <x-atom.error for="setting_value" class="mt-2" />
                </div>

            </x-slot>

            <x-slot name="actions">
                <x-atom.button type="submit">{{ __('Save') }}</x-atom.button>
            </x-slot>

        </x-molecule.form>

    </x-molecule.container>

</x-admin-layout>
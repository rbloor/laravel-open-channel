<x-admin-layout>

    <x-molecule.container>

        <x-molecule.heading>
            {{ __('Edit User') }}
        </x-molecule.heading>

        <x-molecule.form action="{{ route('admin.user.update', $user) }}">

            <x-slot name="title">
                {{ __('User Information') }}
            </x-slot>

            <x-slot name="description">
                {{ __('') }}
            </x-slot>

            <x-slot name="form">

                @csrf
                @method('PUT')

                <!-- First name -->
                <div class="col-span-6 sm:col-span-4">
                    <x-atom.label for="first_name" value="{{ __('First name') }}" />
                    <x-atom.input id="first_name" type="text" name="first_name" class="mt-1 block w-full" value="{{ $user->first_name }}" />
                    <x-atom.error for="first_name" class="mt-2" />
                </div>

                <!-- Last name -->
                <div class="col-span-6 sm:col-span-4">
                    <x-atom.label for="last_name" value="{{ __('Last name') }}" />
                    <x-atom.input id="last_name" type="text" name="last_name" class="mt-1 block w-full" value="{{ $user->last_name }}" />
                    <x-atom.error for="last_name" class="mt-2" />
                </div>

                <!-- Email -->
                <div class="col-span-6 sm:col-span-4">
                    <x-atom.label for="email" value="{{ __('Email') }}" />
                    <x-atom.input id="email" type="email" name="email" class="mt-1 block w-full" value="{{ $user->email }}" />
                    <x-atom.error for="email" class="mt-2" />
                </div>

                <!-- Role -->
                <div class="col-span-6 sm:col-span-4">
                    <x-atom.label for="role_id" value="{{ __('Role') }}" />
                    <x-atom.select id="role_id" name="role_id" value="{{ $user->roles->pluck('id')->first() }}" :allowEmpty="true" :options="$roles->pluck('name', 'id')" />
                    <x-atom.error for="role_id" class="mt-2" />
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
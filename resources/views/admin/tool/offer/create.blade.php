<x-admin-layout>

    <x-molecule.container>

        <x-molecule.heading>
            {{ __('Create Offer') }}
        </x-molecule.heading>

        <x-molecule.form action="{{ route('admin.tool.offer.store') }}" enctype="multipart/form-data">

            <x-slot name="title">
                {{ __('Offer Information') }}
            </x-slot>

            <x-slot name="description">
                {{ __('') }}
            </x-slot>

            <x-slot name="form">

                @csrf

                <!-- Name -->
                <div class="col-span-6 sm:col-span-4">
                    <x-atom.label for="name" value="{{ __('Name') }}" />
                    <x-atom.input id="name" type="text" name="name" class="mt-1 block w-full" value="{{ old('name') }}" />
                    <x-atom.error for="name" class="mt-2" />
                </div>

                <!-- Url -->
                <div class="col-span-6 sm:col-span-4">
                    <x-atom.label for="url" value="{{ __('URL') }}" />
                    <x-atom.input id="url" type="text" name="url" class="mt-1 block w-full" value="{{ old('url') }}" />
                    <x-atom.error for="url" class="mt-2" />
                </div>

                <!-- Filename -->
                <div class="col-span-6 sm:col-span-4">
                    <x-atom.label for="filename" value="{{ __('Filename') }}" />
                    <x-atom.input id="filename" type="file" name="filename" class="mt-1 block w-full" />
                    <x-atom.error for="filename" class="mt-2" />
                </div>

                <!-- Public -->
                <div class="col-span-6 sm:col-span-4">
                    <x-atom.label for="is_public" value="{{ __('Public?') }}" />
                    <x-atom.select id="is_public" name="is_public" value="{{ old('is_public') }}" :options="['0'=> 'No', '1' => 'Yes']" />
                    <x-atom.error for="is_public" class="mt-2" />
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
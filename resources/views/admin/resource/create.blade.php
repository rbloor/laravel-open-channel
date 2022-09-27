<x-admin-layout>

    <x-molecule.container>

        <x-molecule.heading>
            {{ __('Create Resource') }}
        </x-molecule.heading>

        <div x-data="{ isExternal: {{ old('is_external', 0) }} }">

            <x-molecule.form action="{{ route('admin.resource.store') }}" enctype="multipart/form-data">

                <x-slot name="title">
                    {{ __('Resource Information') }}
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

                    <!-- Description -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-atom.label for="description" value="{{ __('Description') }}" />
                        <x-atom.textarea id="description" rows="5" name="description" class="mt-1 block w-full" value="{{ old('description') }}" />
                        <x-atom.error for="description" class="mt-2" />
                    </div>

                    <!-- Filename -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-atom.label for="filename" value="{{ __('Image') }}" />
                        <x-atom.input id="filename" type="file" name="filename" class="mt-1 block w-full" />
                        <x-atom.error for="filename" class="mt-2" />
                    </div>

                    <!-- External -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-atom.label for="is_external" value="{{ __('External?') }}" />
                        <x-atom.select id="is_external" name="is_external" x-on:change="isExternal = $event.target.value" value="{{ old('is_external') }}" :options="['0'=> 'No', '1' => 'Yes']" />
                        <x-atom.error for="is_external" class="mt-2" />
                    </div>

                    <!-- Download -->
                    <div x-show="isExternal == 0" class="col-span-6 sm:col-span-4">
                        <x-atom.label for="donwload" value="{{ __('Download') }}" />
                        <x-atom.input id="download" type="file" name="download" class="mt-1 block w-full" />
                        <x-atom.error for="download" class="mt-2" />
                    </div>

                    <!-- Url -->
                    <div x-show="isExternal == 1" class="col-span-6 sm:col-span-4">
                        <x-atom.label for="url" value="{{ __('Url') }}" />
                        <x-atom.input id="url" type="text" name="url" class="mt-1 block w-full" value="{{ old('url') }}" />
                        <x-atom.error for="url" class="mt-2" />
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

        </div>

    </x-molecule.container>

</x-admin-layout>
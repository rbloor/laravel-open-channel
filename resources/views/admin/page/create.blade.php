<x-admin-layout>

    <x-molecule.container>

        <x-molecule.heading>
            {{ __('Create Page') }}
        </x-molecule.heading>

        <x-molecule.form action="{{ route('admin.page.store') }}" enctype="multipart/form-data">

            <x-slot name="title">
                {{ __('Page Information') }}
            </x-slot>

            <x-slot name="description">
                {{ __('The slug is auto-generated.') }}
            </x-slot>

            <x-slot name="form">

                @csrf

                <!-- Slug -->
                <div class="col-span-6 sm:col-span-4">
                    <x-atom.label for="slug" value="{{ __('Slug') }}" />
                    <x-atom.input disabled="disabled" id="slug" type="text" class="mt-1 block w-full" />
                    <x-atom.error for="slug" class="mt-2" />
                </div>

                <!-- Name -->
                <div class="col-span-6 sm:col-span-4">
                    <x-atom.label for="name" value="{{ __('Name') }}" />
                    <x-atom.input id="name" type="text" name="name" class="mt-1 block w-full" value="{{ old('name') }}" />
                    <x-atom.error for="name" class="mt-2" />
                </div>

                <!-- Filename -->
                <div class="col-span-6 sm:col-span-4">
                    <x-atom.label for="filename" value="{{ __('Filename') }}" />
                    <x-atom.input id="filename" type="file" name="filename" class="mt-1 block w-full" />
                    <x-atom.error for="filename" class="mt-2" />
                </div>

                <!-- Banner Title -->
                <div class="col-span-6 sm:col-span-4">
                    <x-atom.label for="banner_title" value="{{ __('Banner Title') }}" />
                    <x-atom.input id="banner_title" type="text" name="banner_title" class="mt-1 block w-full" value="{{ old('banner_title') }}" />
                    <x-atom.error for="banner_title" class="mt-2" />
                </div>

                <!-- Banner Subtitle -->
                <div class="col-span-6 sm:col-span-4">
                    <x-atom.label for="banner_subtitle" value="{{ __('Banner Subtitle') }}" />
                    <x-atom.input id="banner_subtitle" type="text" name="banner_subtitle" class="mt-1 block w-full" value="{{ old('banner_subtitle') }}" />
                    <x-atom.error for="banner_subtitle" class="mt-2" />
                </div>

                <!-- Banner Paragraph -->
                <div class="col-span-6 sm:col-span-4">
                    <x-atom.label for="banner_paragraph" value="{{ __('Banner Paragraph') }}" />
                    <x-atom.input id="banner_paragraph" type="text" name="banner_paragraph" class="mt-1 block w-full" value="{{ old('banner_paragraph') }}" />
                    <x-atom.error for="banner_paragraph" class="mt-2" />
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
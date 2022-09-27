<x-admin-layout>

    <x-molecule.container>

        <x-molecule.heading>
            {{ __('Edit Reward Category') }}
        </x-molecule.heading>

        <x-molecule.form action="{{ route('admin.reward_category.update', $rewardCategory) }}" enctype="multipart/form-data">

            <x-slot name="title">
                {{ __('Reward Category Information') }}
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
                    <x-atom.input id="name" type="text" name="name" class="mt-1 block w-full" value="{{ $rewardCategory->name }}" />
                    <x-atom.error for="name" class="mt-2" />
                </div>

                <!-- Filename -->
                <!--
                <div class="col-span-6 sm:col-span-4">
                    <x-atom.label for="filename" value="{{ __('Filename') }}" />
                    <x-atom.input id="filename" type="file" name="filename" class="mt-1 block w-full" />
                    <x-atom.error for="filename" class="mt-2" />
                    @if ($rewardCategory->filename)
                    <img class="mt-4" src="{{ asset('storage/categories/'.$rewardCategory->filename) }}" alt="{{ $rewardCategory->filename }}" />
                    @endif
                </div>
                -->

                <!-- Published -->
                <div class="col-span-6 sm:col-span-4">
                    <x-atom.label for="is_published" value="{{ __('Published?') }}" />
                    <x-atom.select id="is_published" name="is_published" value="{{ $rewardCategory->is_published }}" :options="['0'=> 'Not Published', '1' => 'Published']" />
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
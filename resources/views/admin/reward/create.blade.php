<x-admin-layout>

    <x-molecule.container>

        <x-molecule.heading>
            {{ __('Create Reward') }}
        </x-molecule.heading>

        <x-molecule.form action="{{ route('admin.reward.store') }}" enctype="multipart/form-data">

            <x-slot name="title">
                {{ __('Reward Information') }}
            </x-slot>

            <x-slot name="description">
                {{ __('The slug is auto-generated.') }}
            </x-slot>

            <x-slot name="form">

                @csrf

                <!-- Slug -->
                <div class="col-span-6 sm:col-span-4">
                    <x-atom.label for="slug" value="{{ __('Slug') }}" />
                    <x-atom.input disabled="disabled" id="slug" type="text" class="mt-1 block w-full" value="{{ old('slug') }}" />
                    <x-atom.error for="slug" class="mt-2" />
                </div>

                <!-- Name -->
                <div class="col-span-6 sm:col-span-4">
                    <x-atom.label for="name" value="{{ __('Name') }}" />
                    <x-atom.input id="name" type="text" name="name" class="mt-1 block w-full" value="{{ old('name') }}" />
                    <x-atom.error for="name" class="mt-2" />
                </div>

                <!-- Category -->
                <div class="col-span-6 sm:col-span-4">
                    <x-atom.label for="reward_category_id" value="{{ __('Category') }}" />
                    <x-atom.select id="reward_category_id" name="reward_category_id" value="{{ old('reward_category_id') }}" :allowEmpty="true" :options="$rewardCategories->pluck('name', 'id')" />
                    <x-atom.error for="reward_category_id" class="mt-2" />
                </div>

                <!-- Points -->
                <div class="col-span-6 sm:col-span-4">
                    <x-atom.label for="points" value="{{ __('Points') }}" />
                    <x-atom.input id="points" type="number" name="points" class="mt-1 block w-full" value="{{ old('points') }}" />
                    <x-atom.error for="points" class="mt-2" />
                </div>

                <!-- Description -->
                <div class="col-span-6 sm:col-span-4">
                    <x-atom.label for="description" value="{{ __('Description') }}" />
                    <x-atom.textarea id="description" rows="5" name="description" class="mt-1 block w-full ckeditor" value="{!! old('description') !!}" />
                    <x-atom.error for="description" class="mt-2" />
                </div>

                <!-- Filename -->
                <div class="col-span-6 sm:col-span-4">
                    <x-atom.label for="filename" value="{{ __('Filename') }}" />
                    <x-atom.input id="filename" type="file" name="filename" class="mt-1 block w-full" />
                    <x-atom.error for="filename" class="mt-2" />
                </div>

                <!-- Physical -->
                <div class="col-span-6 sm:col-span-4">
                    <x-atom.label for="is_physical" value="{{ __('Physical?') }}" />
                    <x-atom.select id="is_physical" name="is_physical" value="{{ old('is_physical') }}" :options="['0'=> 'No', '1' => 'Yes']" />
                    <x-atom.error for="is_physical" class="mt-2" />
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
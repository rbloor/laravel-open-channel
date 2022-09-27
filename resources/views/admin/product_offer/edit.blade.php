<x-admin-layout>

    <x-molecule.container>

        <x-molecule.heading>
            {{ __('Edit Product Offer') }}
        </x-molecule.heading>

        <x-molecule.form action="{{ route('admin.product_offer.update', $productOffer) }}">

            <x-slot name="title">
                {{ __('Product Offer Information') }}
            </x-slot>

            <x-slot name="description">
                {{ __('The multiplier applies to product points.') }}
            </x-slot>

            <x-slot name="form">

                @csrf
                @method('PUT')

                <!-- Name -->
                <div class="col-span-6 sm:col-span-4">
                    <x-atom.label for="name" value="{{ __('Name') }}" />
                    <x-atom.input id="name" type="text" name="name" class="mt-1 block w-full" value="{{ $productOffer->name }}" />
                    <x-atom.error for="name" class="mt-2" />
                </div>

                <!-- Product -->
                <div class="col-span-6 sm:col-span-4">
                    <x-atom.label for="product_id" value="{{ __('Product') }}" />
                    <x-atom.select id="product_id" name="product_id" value="{{ $productOffer->product_id }}" :allowEmpty="true" :options="$products->pluck('name', 'id')" />
                    <x-atom.error for="product_id" class="mt-2" />
                </div>

                <!-- Multiplier -->
                <div class="col-span-6 sm:col-span-4">
                    <x-atom.label for="multiplier" value="{{ __('Multiplier') }}" />
                    <x-atom.input id="multiplier" type="number" name="multiplier" class="mt-1 block w-full" value="{{ $productOffer->multiplier }}" />
                    <x-atom.error for="multiplier" class="mt-2" />
                </div>

                <!-- Description -->
                <div class="col-span-6 sm:col-span-4">
                    <x-atom.label for="description" value="{{ __('Description') }}" />
                    <x-atom.textarea id="description" rows="5" name="description" class="mt-1 block w-full" value="{{ $productOffer->description }}" />
                    <x-atom.error for="description" class="mt-2" />
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
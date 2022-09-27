<x-app-layout>

    @php $page = App\Models\Page::where('slug', 'upload-sales')->firstOrFail(); @endphp

    <!-- Hero -->
    <x-hero :page="$page" />

    <div class="bg-white py-16 px-4 overflow-hidden sm:px-6 lg:px-8">
        <div class="relative max-w-xl mx-auto">

            @if ( Session::has('success') )
            <x-banner class="mb-8" type="success">{{ Session::get('success') }}</x-banner>
            @endif

            <x-molecule.patterns />

            <form action="{{ route('sale.store') }}" x-data="{ agree: false }" method="POST" class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
                @csrf

                <div>
                    <x-atom.label for="first_name" value="{{ __('First name') }}" />
                    <x-atom.input id="first_name" type="text" name="first_name" value="{{ auth()->user()->first_name }}" disabled />
                </div>
                <div>
                    <x-atom.label for="last_name" value="{{ __('Last name') }}" />
                    <x-atom.input id="last_name" type="text" name="last_name" value="{{ auth()->user()->last_name }}" disabled />
                </div>
                <div class="sm:col-span-2">
                    <x-atom.label for="company" value="{{ __('Company') }}" />
                    <x-atom.input id="company" type="text" name="company" value="{{ auth()->user()->membership->company->name }}" disabled />
                </div>

                <div class="sm:col-span-2">
                    <x-atom.label for="product_id" value="{{ __('Product') }}*" />
                    <select id="product_id" name="product_id" value="{{ old('product_id') }}*" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        <option></option>
                        @foreach ($products as $product)
                        <option @if (old('product_id')==$product->id) selected @endif value="{{ $product->id }}">
                            {{ $product->name }} ({{ $product->code }})
                        </option>
                        @endforeach
                    </select>
                    <x-atom.error for="product_id" class="mt-2" />
                </div>

                <div class="sm:col-span-2">
                    <x-atom.label for="quantity" value="{{ __('Total units sold') }}*" />
                    <x-atom.input id="quantity" type="text" name="quantity" value="{{ old('quantity') }}" />
                    <x-atom.error for="quantity" class="mt-2" />
                </div>
                <div class="sm:col-span-2">
                    <x-atom.label for="price" value="{{ __('Price') }}*" />
                    <x-atom.input id="price" type="text" name="price" prefix="£" affix="GBP" class="pl-7 pr-12" placeholder="0.00" value="{{ old('price') }}" />
                    <x-atom.error for="price" class="mt-2" />
                </div>

                <div class="sm:col-span-2">
                    <x-atom.label for="sold_at" value="{{ __('Sold date') }}*" />
                    <x-atom.input id="sold_at" type="date" name="sold_at" value="{{ old('sold_at') }}" />
                    <x-atom.error for="sold_at" class="mt-2" />
                </div>
                <div class="sm:col-span-2">
                    <x-atom.label for="invoiced_at" value="{{ __('Invoice date') }}*" />
                    <x-atom.input id="invoiced_at" type="date" name="invoiced_at" value="{{ old('invoiced_at') }}" />
                    <x-atom.error for="invoiced_at" class="mt-2" />
                </div>

                <x-molecule.form-accept-terms />

                <div class="sm:col-span-2">
                    <button type="submit" :disabled="!agree" class="w-full inline-flex items-center justify-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-custom-blue-100 hover:bg-custom-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 disabled:opacity-50">{{ __('Submit') }}</button>
                </div>

                <p class="text-xs leading-6 text-gray-500">*Compulsory field</p>
            </form>

        </div>
    </div>

</x-app-layout>
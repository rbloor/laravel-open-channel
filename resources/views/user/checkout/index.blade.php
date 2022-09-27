<x-app-layout>

    <div class="bg-gray-50">
        <div class="max-w-2xl mx-auto py-16 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
            <h1 class="text-3xl font-extrabold tracking-tight text-gray-900">{{ __('Checkout') }}</h1>

            @if ( $total > 0 && $total > auth()->user()->membership->pointsBalance )
            <x-banner class="mt-8" type="danger">{{ __('You do not have enough points') }}</x-banner>
            @endif

            @if ( Session::has('error') )
            <x-banner class="mt-8" type="danger">{{ Session::get('error') }}</x-banner>
            @endif

            <form action="{{ route('checkout.store') }}" method="POST" class="mt-8 lg:grid lg:grid-cols-2 lg:gap-x-12 xl:gap-x-16">

                @csrf

                <input type="hidden" name="requires_shipping" value="{{ $requires_shipping ? 1 : 0 }}" />

                <!-- Order Details -->
                <div>

                    <!-- Contact Information -->
                    <h2 class="text-lg font-medium text-gray-900">{{ __('Contact information') }}</h2>
                    <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                        <div>
                            <label for="first-name" class="block text-sm font-medium text-gray-700">{{ __('First name') }}</label>
                            <div class="mt-1">
                                <input disabled type="text" id="first-name" value="{{ auth()->user()->first_name }}" class="block w-full bg-gray-100 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>
                        <div>
                            <label for="last-name" class="block text-sm font-medium text-gray-700">{{ __('Last name') }}</label>
                            <div class="mt-1">
                                <input disabled type="text" id="last-name" value="{{ auth()->user()->last_name }}" class="block w-full bg-gray-100 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="email-address" class="block text-sm font-medium text-gray-700">{{ __('Email address') }}</label>
                            <div class="mt-1">
                                <input disabled type="email" id="email-address" value="{{ auth()->user()->email }}" class="block w-full bg-gray-100 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="phone" class="block text-sm font-medium text-gray-700">{{ __('Phone') }}</label>
                            <div class="mt-1">
                                <input disabled type="text" id="phone" value="{{ auth()->user()->membership->telephone }}" class="block w-full bg-gray-100 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>
                    </div>

                    <!-- Shipping Address -->
                    @if ($requires_shipping)
                    <h2 class="mt-8 text-lg font-medium text-gray-900">{{ __('Shipping address') }}</h2>
                    <p class="mt-2 text-sm text-gray-700">This is the last shipping address we hold for you. Change as required. Once changed this will then become the new shipping address we hold for you.</p>
                    <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                        <div class="sm:col-span-2">
                            <label for="address_one" class="block text-sm font-medium text-gray-700">{{ __('Address Line 1') }}*</label>
                            <div class="mt-1">
                                <input type="text" name="address_one" value="{{ old('address_one', auth()->user()->membership->address_one) }}" id="address_one" autocomplete="address" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <x-atom.error for="address_one" class="mt-2" />
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="address_two" class="block text-sm font-medium text-gray-700">{{ __('Address Line 2') }}</label>
                            <div class="mt-1">
                                <input type="text" name="address_two" value="{{ old('address_two', auth()->user()->membership->address_two) }}" id="address_two" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <x-atom.error for="address_two" class="mt-2" />
                            </div>
                        </div>
                        <div>
                            <label for="city" class="block text-sm font-medium text-gray-700">{{ __('City') }}*</label>
                            <div class="mt-1">
                                <input type="text" name="city" id="city" value="{{ old('city', auth()->user()->membership->city) }}" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <x-atom.error for="city" class="mt-2" />
                            </div>
                        </div>
                        <div>
                            <label for="county" class="block text-sm font-medium text-gray-700">{{ __('County') }}*</label>
                            <div class="mt-1">
                                <input type="text" name="county" id="county" value="{{ old('county', auth()->user()->membership->county) }}" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <x-atom.error for="county" class="mt-2" />
                            </div>
                        </div>
                        <div>
                            <label for="postcode" class="block text-sm font-medium text-gray-700">{{ __('Postcode') }}*</label>
                            <div class="mt-1">
                                <input type="text" name="postcode" id="postcode" value="{{ old('postcode', auth()->user()->membership->postcode) }}" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <x-atom.error for="postcode" class="mt-2" />
                            </div>
                        </div>
                    </div>
                    <p class="mt-4 text-xs leading-6 text-gray-500">*Compulsory field</p>
                    @endif

                </div>

                <!-- Order summary -->
                <div class="mt-10 lg:mt-0">
                    <h2 class="text-lg font-medium text-gray-900">{{ __('Order summary') }}</h2>
                    <div class="mt-4 bg-white border border-gray-200 rounded-lg shadow-sm">
                        <h3 class="sr-only">{{ __('Items in your basket') }}</h3>
                        <ul role="list" class="border-gray-200 divide-y divide-gray-200">
                            @foreach ($basket as $index => $item)
                            <li class="flex py-6 px-4 sm:px-6 space-x-6 sm:py-6">
                                <div class="flex-shrink-0">
                                    <img src="{{ asset('storage/rewards/'.$item['filename']) }}" alt="{{ $item['name'] }}" class="w-24 h-24 rounded-lg object-center object-cover sm:w-32 sm:h-32">
                                </div>
                                <div class="relative ml-4 flex-1 flex flex-col justify-between sm:ml-6">
                                    <div>
                                        <div class="flex justify-between sm:grid sm:grid-cols-2">
                                            <div class="pr-6">
                                                <h3 class="text-sm font-medium text-gray-700 hover:text-gray-800">{{ $item['name'] }}</h3>
                                                <p class="mt-1 text-sm text-gray-500">{{ $item['category'] }}</p>
                                            </div>
                                            <p class="text-sm font-medium text-gray-900 text-right">{{ $item['points'] * $item['quantity'] }} {{ __('points') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        <dl class="border-t border-gray-200 py-6 px-4 space-y-6 sm:px-6">
                            <div class="flex items-center justify-between">
                                <dt class="text-base font-medium">{{ __('Total') }}</dt>
                                <dd class="text-base font-medium text-gray-900">{{ $total }} {{ __('points') }}</dd>
                            </div>
                        </dl>
                        <div class="border-t border-gray-200 py-6 px-4 sm:px-6 text-center">
                            @if ( $total > auth()->user()->membership->pointsBalance || empty($basket) )
                            <div disabled class="opacity-50 w-full bg-custom-blue-600 border border-transparent rounded-md shadow-sm py-3 px-4 text-base font-medium text-white hover:bg-custom-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500">{{ __('Confirm order') }}</div>
                            @else
                            <button type="submit" class="w-full bg-custom-blue-100 border border-transparent rounded-md shadow-sm py-3 px-4 text-base font-medium text-white hover:bg-custom-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500">{{ __('Confirm order') }}</button>
                            @endif
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>

</x-app-layout>
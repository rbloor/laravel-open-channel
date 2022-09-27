<div class="bg-gray-100">
    <div class="max-w-4xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-extrabold tracking-tight text-gray-900">{{ __('Shopping Basket') }}</h1>

        @if ( $total > 0 && $total > auth()->user()->membership->pointsBalance )
        <x-banner class="mt-8" type="danger">{{ __('You do not have enough points') }}</x-banner>
        @endif

        <form class="mt-12">

            <!-- Basket Items -->
            <div>
                <h2 class="sr-only">{{ __('Items in your shopping cart') }}</h2>
                <ul role="list" class="border-t border-b border-gray-200 divide-y divide-gray-200">
                    @foreach ($basket as $index => $item)
                    <li class="flex py-6 sm:py-10">
                        <div class="flex-shrink-0">
                            <img src="{{ asset('storage/rewards/'.$item['filename']) }}" alt="{{ $item['name'] }}" class="w-24 h-24 rounded-lg object-center object-cover sm:w-32 sm:h-32">
                        </div>
                        <div class="relative ml-4 flex-1 flex flex-col justify-between sm:ml-6">
                            <div>
                                <div class="flex justify-between sm:grid sm:grid-cols-2">
                                    <div class="pr-6">
                                        <h3 class="text-sm">
                                            <a href="#" class="font-medium text-gray-700 hover:text-gray-800">{{ $item['name'] }}</a>
                                        </h3>
                                        <p class="mt-1 text-sm text-gray-500">{{ $item['category'] }}</p>
                                    </div>

                                    <p class="text-sm font-medium text-gray-900 text-right">{{ $item['points'] * $item['quantity'] }} {{ __('points') }}</p>
                                </div>
                                <div class="mt-4 flex items-center sm:block sm:absolute sm:top-0 sm:left-1/2 sm:mt-0">
                                    <label for="quantity-{{ $index }}" class="sr-only">{{ __('Quantity') }}</label>
                                    <select wire:model="basket.{{ $index }}.quantity" wire:change="update({{ $index }})" id="quantity-{{ $index }}" class="block max-w-full rounded-md border border-gray-300 py-1.5 text-base leading-5 font-medium text-gray-700 text-left shadow-sm focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        @for ($i=1; $i<=10; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                    </select>

                                    <button wire:click="removeFromBasket({{ $item['id'] }})" type="button" class="ml-4 text-sm font-medium text-custom-blue-100 hover:text-custom-blue-200 sm:ml-0 sm:mt-3">
                                        <span>{{ __('Remove') }}</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>

            <!-- Basket Summary -->
            @if ($layout !== 'basic')
            <div class="mt-10 sm:ml-32 sm:pl-6">
                <div class="bg-gray-50 rounded-lg px-4 py-6 sm:p-6 lg:p-8">
                    <h2 class="sr-only">{{ __('Order summary') }}</h2>
                    <div class="flow-root">
                        <dl class="-my-4 text-sm divide-y divide-gray-200">
                            <div class="py-4 flex items-center justify-between">
                                <dt class="text-base font-medium text-gray-900">{{ __('Order total') }}</dt>
                                <dd class="text-base font-medium text-gray-900">{{ $total }} {{ __('points') }}</dd>
                            </div>
                        </dl>
                    </div>
                </div>
                <div class="mt-10">
                    @if ( $total > auth()->user()->membership->pointsBalance || empty($basket) )
                    <button type="submit" disabled class="opacity-50 w-full bg-custom-blue-100 border border-transparent rounded-md shadow-sm py-3 px-4 text-base font-medium text-white hover:bg-custom-blue-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500">{{ __('Checkout') }}</button>
                    @else
                    <a href="{{ route('checkout.index') }}" class="block text-center w-full bg-custom-blue-100 border border-transparent rounded-md shadow-sm py-3 px-4 text-base font-medium text-white hover:bg-custom-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500">{{ __('Checkout') }}</a>
                    @endif
                </div>
                <div class="mt-6 text-sm text-center text-gray-500">
                    <p>
                        {{ __('or') }} <a href="{{ route('reward.index') }}" class="text-custom-blue-100 font-medium hover:text-custom-blue-200">{{ __('Continue Shopping') }}<span aria-hidden="true"> &rarr;</span></a>
                    </p>
                </div>
            </div>
            @endif

        </form>
    </div>
</div>
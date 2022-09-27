<x-app-layout>

    <div class="bg-white">
        <div class="max-w-3xl mx-auto px-4 py-16 sm:px-6 lg:px-8">

            <div class="text-center">
                <h1 class="text-sm uppercase tracking-wide text-custom-blue-100">{{ $redemption->status }}</h1>
                <p class="mt-2 text-4xl font-extrabold tracking-tight sm:text-5xl">{{ __('Thank you for your order') }}</p>
                <p class="mt-4 text-base text-gray-500">{{ __('We appreciate your order, we\'re currently processing it. So hang tight and we\'ll send you confirmation very soon!') }}</p>
            </div>

            <div class="mt-6 text-sm sm:flex sm:justify-between">
                <dl class="flex">
                    <dt class="text-gray-500">{{ __('Order reference') }}:&nbsp;</dt>
                    <dd class="font-medium text-custom-blue-100">{{ $redemption->order_number }}</dd>
                </dl>
                <div class="mt-4 sm:mt-0">
                    <p class="font-medium text-gray-900"><time datetime="{{ $redemption->created_at->format('Y-m-d') }}">{{ $redemption->created_at->format('F d, Y') }}</time></p>
                </div>
            </div>

            <div class="mt-5 border-t border-gray-200">
                <h2 class="sr-only">{{ __('Your order') }}</h2>
                <h3 class="sr-only">{{ __('Items') }}</h3>

                @foreach ($redemption->rewards as $reward)
                <div class="py-6 border-b border-gray-200 flex space-x-6">
                    <img src="{{ asset('storage/rewards/'.$reward->filename) }}" alt="{{ $reward->name }}" class="flex-none w-20 h-20 object-center object-cover bg-gray-100 rounded-lg sm:w-40 sm:h-40">
                    <div class="flex-auto flex flex-col">
                        <div>
                            <h4 class="font-medium text-gray-900">
                                <a href="#">{{ $reward->name }}</a>
                            </h4>
                            <p class="mt-1 text-sm text-gray-500">{{ $reward->reward_category->name }}</p>
                            <p class="mt-2 text-sm text-gray-600">{!! $reward->description !!}</p>
                        </div>
                        <div class="mt-6 flex-1 flex items-end">
                            <dl class="flex text-sm divide-x divide-gray-200 space-x-4 sm:space-x-6">
                                <div class="flex">
                                    <dt class="font-medium text-gray-900">{{ __('Quantity') }}</dt>
                                    <dd class="ml-2 text-gray-700">{{ $reward->pivot->quantity }}</dd>
                                </div>
                                <div class="pl-4 flex sm:pl-6">
                                    <dt class="font-medium text-gray-900">{{ __('Points') }}</dt>
                                    <dd class="ml-2 text-gray-700">{{ $reward->pivot->quantity * $reward->pivot->points}}</dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="sm:ml-40 sm:pl-6">
                    <h3 class="sr-only">{{ __('Your information') }}</h3>
                    <dl class="grid grid-cols-2 gap-x-6 text-sm py-6">
                        <div>
                            <dt class="font-medium text-gray-900">{{ __('Contact details') }}</dt>
                            <dd class="mt-2 text-gray-700">
                                <address class="not-italic">
                                    <span class="block">{{ $redemption->name }}</span>
                                    <span class="block">{{ $redemption->email }}</span>
                                    <span class="block">{{ $redemption->telephone ?? '' }}</span>
                                </address>
                            </dd>
                        </div>
                        @if ($redemption->requires_shipping)
                        <div>
                            <dt class="font-medium text-gray-900">{{ __('Shipping address') }}</dt>
                            <dd class="mt-2 text-gray-700">
                                <address class="not-italic">
                                    <span class="block">{{ $redemption->address_one }}</span>
                                    <span class="block">{{ $redemption->address_two }}</span>
                                    <span class="block">{{ $redemption->city }}</span>
                                    <span class="block">{{ $redemption->county }}</span>
                                    <span class="block">{{ $redemption->postcode }}</span>
                                    <span class="block uppercase">{{ $redemption->country }}</span>
                                </address>
                            </dd>
                        </div>
                        @endif
                    </dl>

                    <h3 class="sr-only">{{ __('Summary') }}</h3>

                    <dl class="space-y-6 border-t border-gray-200 text-lg pt-6">
                        <div class="flex justify-between">
                            <dt class="font-medium text-gray-900">{{ __('Total') }}</dt>
                            <dd class="text-gray-900">{{ $redemption->total_points }} {{ __('points') }}</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
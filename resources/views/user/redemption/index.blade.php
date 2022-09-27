<x-app-layout>

    @php $page = App\Models\Page::where('slug', 'my-redemptions')->firstOrFail(); @endphp

    <!-- Hero -->
    <x-hero :page="$page" />

    <div class="bg-white pt-16 pb-4">
        <div class="mx-auto space-y-8 max-w-md px-4 sm:max-w-3xl sm:px-6 lg:px-8 lg:max-w-7xl">

            <div class="text-center">
                <p class="mt-2 text-3xl font-extrabold text-gray-900 tracking-tight sm:text-4xl">{{ __('Rewards Claimed') }}</p>
                <p class="mt-5 max-w-prose mx-auto text-xl text-gray-500">{{ __('This is where you can see all the rewards you have claimed to date.') }}</p>
            </div>

            <div class="max-w-2xl mx-auto space-y-8 sm:px-4 lg:max-w-4xl lg:px-0">

                @if ( Session::has('success') )
                <x-banner type="success">{{ Session::get('success') }}</x-banner>
                @endif

                @foreach ($redemptions as $redemption)

                <div class="bg-white border-t border-b border-gray-200 shadow-sm sm:rounded-lg sm:border">
                    <h3 class="sr-only">{{ __('Order placed') }} on <time datetime="{{ $redemption->created_at->format('Y-m-d') }}">{{ $redemption->created_at->format('M j, Y') }}</time></h3>
                    <div class="flex items-center p-4 border-b border-gray-200 sm:p-6 sm:grid sm:grid-cols-4 sm:gap-x-3 bg-gray-50 sm:rounded-t-lg">

                        <!-- Order Details -->
                        <dl class="flex-1 grid grid-cols-3 gap-x-3 text-sm sm:col-span-3 sm:grid-cols-4">
                            <div>
                                <dt class="font-medium text-gray-900">{{ __('Order no.') }}</dt>
                                <dd class="mt-1 text-gray-500">{{ $redemption->order_number }}</dd>
                            </div>
                            <div class="hidden sm:block">
                                <dt class="font-medium text-gray-900">{{ __('Date placed') }}</dt>
                                <dd class="mt-1 text-gray-500">
                                    <time datetime="2021-07-06">{{ $redemption->created_at->format('M j, Y') }}</time>
                                </dd>
                            </div>
                            <div>
                                <dt class="font-medium text-gray-900">{{ __('Order total') }}</dt>
                                <dd class="mt-1 font-medium text-gray-900">{{ $redemption->total_points }} points</dd>
                            </div>
                            <div>
                                <dt class="font-medium text-gray-900">{{ __('Status') }}</dt>
                                <dd class="mt-1 font-medium text-gray-500 capitalize">{{ $redemption->status }}</dd>
                            </div>
                        </dl>

                        <!-- Mobile Action -->
                        <div x-data="{ open: false }" @keydown.escape.stop="open = false" @click.away="open = false" class="relative flex justify-end lg:hidden">
                            <div class="flex items-center">
                                <button @click="open = !open" type="button" class="-m-2 p-2 flex items-center text-gray-400 hover:text-gray-500" id="menu-0-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="sr-only">{{ __('Options for order') }} {{ $redemption->order_number }}</span>
                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                    </svg>
                                </button>
                            </div>
                            <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="origin-bottom-right absolute right-0 mt-2 w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-0-button" tabindex="-1">
                                <div class="py-1" role="none">
                                    <a href="{{ route('checkout.confirmation', $redemption->order_number) }}" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-0-item-0">{{ __('View order') }}</a>
                                    @if ($redemption->status == 'pending')
                                    @can('delete_redemption')
                                    <form action="{{ route('redemption.destroy', $redemption->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')" class="text-gray-700 block px-4 py-2 text-sm">
                                            <span>{{ __('Cancel order') }}</span>
                                        </button>
                                    </form>
                                    @endcan
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Desktop Action -->
                        <div class="hidden lg:flex lg:items-center lg:justify-end lg:space-x-1">
                            <a href="{{ route('checkout.confirmation', $redemption->order_number) }}" class="inline-flex items-center justify-center px-2.5 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-custom-blue-100 hover:bg-custom-blue-200">
                                <span>{{ __('View order') }}</span>
                                <span class="sr-only">{{ $redemption->order_number }}</span>
                            </a>
                            @if ($redemption->status == 'pending')
                            @can('delete_redemption')
                            <form action="{{ route('redemption.destroy', $redemption->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')" class="inline-flex items-center justify-center px-2.5 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700">
                                    <span>{{ __('Cancel order') }}</span>
                                    <span class="sr-only">{{ $redemption->order_number }}</span>
                                </button>
                            </form>
                            @endcan
                            @endif
                        </div>

                    </div>

                    <!-- Rewards -->
                    <div class="p-4 sm:p-6">
                        <table class="w-full text-gray-500">
                            <caption class="sr-only">
                                {{ __('Rewards') }}
                            </caption>
                            <thead class="text-sm text-gray-500 text-left">
                                <tr>
                                    <th scope="col" class="sm:w-4/5 lg:w-1/3 pr-8 py-3 font-normal">{{ __('Reward') }}</th>
                                    <th scope="col" class="hidden w-1/5 pr-8 py-3 font-normal lg:table-cell">{{ __('Quantity') }}</th>
                                    <th scope="col" class="hidden w-1/5 pr-8 py-3 font-normal lg:table-cell">{{ __('Points') }}</th>
                                    <th scope="col" class="w-1/5 pr-8 py-3 font-normal">{{ __('Total') }}</th>
                                </tr>
                            </thead>
                            <tbody class="border-b border-gray-200 divide-y divide-gray-200 text-sm border-t">
                                @foreach ($redemption->rewards as $reward)
                                <tr>
                                    <td class="py-3 pr-8">
                                        <div class="flex items-center">
                                            <img src="{{ asset('storage/rewards/'.$reward->filename) }}" alt="{{ $reward->name }}" class="w-16 h-16 object-center object-cover rounded mr-6">
                                            <div>
                                                <div class="font-medium text-gray-900">{{ $reward->name }}</div>
                                                <div class="mt-1 sm:hidden">{{ $reward->pivot->quantity * $reward->pivot->points}}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="hidden py-6 pr-8 lg:table-cell">{{ $reward->pivot->quantity }}</td>
                                    <td class="hidden py-6 pr-8 lg:table-cell">{{ $reward->pivot->points }}</td>
                                    <td class="py-6 pr-8">{{ $reward->pivot->quantity * $reward->pivot->points}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>

                @endforeach

                {{ $redemptions->links() }}

            </div>

        </div>
    </div>

    @include('partials.block-links')

</x-app-layout>
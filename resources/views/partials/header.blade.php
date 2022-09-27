<header
    class="bg-white shadow"
    x-data="{ isOpen: false }">

    <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:divide-y lg:divide-gray-200 lg:px-8">
        <div class="relative h-16 flex justify-between">

            <!-- Logo -->
            <div class="relative z-10 px-2 flex lg:px-0">
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img
                            class="h-5 block w-auto"
                            src="{{ asset('img/canon-logo.png') }}"
                            alt="Canon Open Channel" />
                    </a>
                </div>
            </div>

            <!-- Mobile menu button -->
            <div class="relative z-10 flex items-center lg:hidden">
                <button
                    x-on:click="isOpen = !isOpen"
                    type="button"
                    class="rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                    aria-controls="mobile-menu"
                    aria-expanded="false">
                    <span class="sr-only">Open menu</span>
                    <svg
                        x-show="!isOpen"
                        class="h-6 w-6"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        aria-hidden="true">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg
                        x-show="isOpen"
                        class="h-6 w-6"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        aria-hidden="true">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden lg:relative lg:z-10 lg:ml-4 lg:flex lg:items-center">
                <nav class="hidden md:flex space-x-10 items-center">
                    <div
                        x-data="{ isDropdownOpen: false, timeout: null }"
                        x-on:mouseenter="isDropdownOpen = true; clearTimeout(timeout)"
                        x-on:mouseleave="timeout = setTimeout(() => { isDropdownOpen = false }, 300)"
                        class="relative inline-flex">
                        <!-- Dropdown toggle button -->
                        <button
                            :class="{'text-red-600' : isDropdownOpen }"
                            class="text-sm font-thin text-gray-600 hover:text-red-600 group bg-white rounded-md inline-flex items-center focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            aria-expanded="false">
                            <span class="h-6 w-6 mr-2 rounded-full overflow-hidden bg-gray-100">
                                <svg
                                    class="h-full w-full text-gray-300"
                                    fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </span>
                            Welcome {{ Auth::user()->name }}
                            <svg
                                class="text-gray-400 ml-2 h-5 w-5 group-hover:text-gray-500"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                                aria-hidden="true">
                                <path
                                    fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div
                            x-show="isDropdownOpen"
                            class="origin-top-right absolute right-0 mt-8 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu"
                            aria-orientation="vertical"
                            aria-labelledby="user-menu-button"
                            tabindex="-1">
                            <a
                                href="{{ route('profile') }}"
                                class="block px-4 py-2 text-sm text-black hover:text-red-600"
                                role="menuitem"
                                tabindex="-1">My Profile</a>
                            @can('view_sale')
                            <a
                                href="{{ route('sale.index') }}"
                                class="block px-4 py-2 text-sm text-black hover:text-red-600"
                                role="menuitem"
                                tabindex="-1">My Sales</a>
                            @endcan
                            @can('view_redemption')
                            <a
                                href="{{ route('redemption.index') }}"
                                class="block px-4 py-2 text-sm text-black hover:text-red-600"
                                role="menuitem"
                                tabindex="-1">My Redemptions</a>
                            @endcan
                            <form
                                method="POST"
                                action="{{ route('logout') }}">
                                @csrf
                                <button
                                    type="submit"
                                    class="block px-4 py-2 text-sm text-black hover:text-red-600"
                                    role="menuitem"
                                    tabindex="-1"
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); this.closest('form').submit();">Sign out</button>
                            </form>
                        </div>
                    </div>
                    <a
                        href="#"
                        class="text-sm font-thin text-gray-600 hover:text-red-600">
                        My Points
                        @livewire('user.points-balance')
                    </a>
                    <a
                        href="{{ route('basket') }}"
                        class="text-sm font-thin text-gray-600 hover:text-red-600">
                        {{ __('My Basket') }}
                        @livewire('user.basket-count')
                    </a>
                </nav>
            </div>
        </div>
    </div>

    <!-- Desktop Menu -->
    <nav class="hidden bg-gray-100 lg:flex lg:space-x-12 h-12 justify-center">
        <a
            href="{{ route('dashboard') }}"
            class="@if (request()->routeIs('dashboard')) border-red-600 text-red-600 @else border-transparent text-gray-900 @endif inline-flex items-center uppercase px-3 pt-1 border-b-4 text-sm font-heading">Home</a>
        @can('view_product')
        <a
            href="{{ route('product.index') }}"
            class="@if (request()->routeIs('product.*')) border-red-600 text-red-600 @else border-transparent text-gray-900 @endif hover:border-red-300 inline-flex items-center uppercase px-3 pt-1 border-b-4 text-sm font-heading">Qualifying Products</a>
        @endcan
        @can('view_reward')
        <a
            href="{{ route('reward.index') }}"
            class="@if (request()->routeIs('reward.*')) border-red-600 text-red-600 @else border-transparent text-gray-900 @endif hover:border-red-300 inline-flex items-center uppercase px-3 pt-1 border-b-4 text-sm font-heading">Rewards</a>
        @endcan
        <a
            href="{{ route('how-it-works') }}"
            class="@if (request()->routeIs('how-it-works')) border-red-600 text-red-600 @else border-transparent text-gray-900 @endif hover:border-red-300 inline-flex items-center uppercase px-3 pt-1 border-b-4 text-sm font-heading">How it Works</a>

        @if (is_null(auth()->user()->approved_at) === false)
        @can('create_sale')
        <a
            href="{{ route('sale.create') }}"
            class="@if (request()->routeIs('sale.create')) border-red-600 text-red-600 @else border-transparent text-gray-900 @endif hover:border-red-300 inline-flex items-center uppercase px-3 pt-1 border-b-4 text-sm font-heading">Upload Sales</a>
        @endcan
        @endif
    </nav>

    <!-- Mobile menu -->
    <nav
        x-show="isOpen"
        class="lg:hidden"
        aria-label="Global">
        <div class="pt-2 pb-3 px-2 space-y-1">
            <a
                href="{{ route('dashboard') }}"
                class="@if (request()->routeIs('dashboard')) bg-gray-100 text-gray-900 @else text-gray-900 hover:bg-gray-50 hover:text-gray-900 @endif block rounded-md py-2 px-3 text-base font-medium"
                aria-current="page">Home</a>
            @can('view_product')
            <a
                href="{{ route('product.index') }}"
                class="@if (request()->routeIs('product.*')) bg-gray-100 text-gray-900 @else text-gray-900 hover:bg-gray-50 hover:text-gray-900 @endif block rounded-md py-2 px-3 text-base font-medium">Qualifying Products</a>
            @endcan
            @can('view_reward')
            <a
                href="{{ route('reward.index') }}"
                class="@if (request()->routeIs('reward.*')) bg-gray-100 text-gray-900 @else text-gray-900 hover:bg-gray-50 hover:text-gray-900 @endif block rounded-md py-2 px-3 text-base font-medium">Rewards</a>
            @endcan
            <a
                href="{{ route('how-it-works') }}"
                class="@if (request()->routeIs('how-it-works')) bg-gray-100 text-gray-900 @else text-gray-900 hover:bg-gray-50 hover:text-gray-900 @endif block rounded-md py-2 px-3 text-base font-medium">How it Works</a>
            @if (is_null(auth()->user()->approved_at) === false)
            @can('create_sale')
            <a
                href="{{ route('sale.create') }}"
                class="@if (request()->routeIs('sale.create')) bg-gray-100 text-gray-900 @else text-gray-900 hover:bg-gray-50 hover:text-gray-900 @endif block rounded-md py-2 px-3 text-base font-medium">Upload Sales</a>
            @endcan
            @endif
        </div>
        <div class="border-t border-gray-200 pt-2 pb-3 px-2 space-y-1">
            <a
                href="{{ route('profile') }}"
                class="@if (request()->routeIs('profile')) bg-gray-100 text-gray-900 @else text-gray-900 hover:bg-gray-50 hover:text-gray-900 @endif block rounded-md py-2 px-3 text-base font-medium">My Profile</a>
            @can('view_sale')
            <a
                href="{{ route('sale.index') }}"
                class="@if (request()->routeIs('sale.*')) bg-gray-100 text-gray-900 @else text-gray-900 hover:bg-gray-50 hover:text-gray-900 @endif block rounded-md py-2 px-3 text-base font-medium">My Sales</a>
            @endcan
            @can('view_redemption')
            <a
                href="{{ route('redemption.index') }}"
                class="@if (request()->routeIs('redemption.*')) bg-gray-100 text-gray-900 @else text-gray-900 hover:bg-gray-50 hover:text-gray-900 @endif block rounded-md py-2 px-3 text-base font-medium">My Redemptions</a>
            @endcan
            <a
                href="#"
                class="text-gray-900 hover:bg-gray-50 hover:text-gray-900 block rounded-md py-2 px-3 text-base font-medium">My Points <span class="text-red-600 font-bold">@livewire('user.points-balance')</span></a>
            <a
                href="{{ route('basket') }}"
                class="@if (request()->routeIs('basket')) bg-gray-100 text-gray-900 @else text-gray-900 hover:bg-gray-50 hover:text-gray-900 @endif block rounded-md py-2 px-3 text-base font-medium">My Basket @livewire('user.basket-count')</a>
            <form
                method="POST"
                action="{{ route('logout') }}">
                @csrf
                <button
                    type="submit"
                    class="text-gray-900 hover:bg-gray-50 hover:text-gray-900 block rounded-md py-2 px-3 text-base font-medium"
                    role="menuitem"
                    tabindex="-1"
                    href="{{ route('logout') }}"
                    onclick="event.preventDefault(); this.closest('form').submit();">Sign out</button>
            </form>
        </div>
    </nav>

</header>
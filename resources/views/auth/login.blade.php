<x-guest-layout>

    @php $page = App\Models\Page::where('slug', 'login')->firstOrFail(); @endphp

    <!-- Hero -->
    <x-hero :page="$page" />

    <!-- Login Form -->
    <div class="relative bg-white">

        <div class="absolute inset-0">
            <div class="absolute inset-y-0 left-0 w-1/2 bg-gray-50"></div>
        </div>
        <div class="relative max-w-7xl mx-auto lg:grid lg:grid-cols-4">
            <div class="bg-gray-50 py-16 px-4 sm:px-6 lg:col-span-2 lg:px-8 xl:pr-12">
                <div class="max-w-lg mx-auto">
                    <p class="mt-3 text-lg leading-6 text-gray-500">
                        Here's where you will find everything you need to be able to sell Canon products
                        to earn points to redeem for free of tax credit on a pre-paid credit card. Every
                        month Canon will reward you for selling qualifying Canon products and services.
                    </p>
                    <p class="mt-3 text-lg leading-6 text-gray-500">
                        How?
                    </p>
                    <p class="mt-3 text-lg leading-6 text-gray-500">
                        Simply Register / Login for the rewards incentive, sell the featured products, get
                        awarded points and claim your reward. That's it.
                    </p>
                    <p class="mt-3 text-lg leading-6 text-gray-500">
                        On your behalf Canon will pay, directly to HMRC, any tax liability and National Insurance
                        contribution for all incentive rewards claimed. So all you need to do is sell, claim and enjoy.
                    </p>
                </div>
            </div>
            <div class="bg-white py-16 px-4 sm:px-6 lg:col-span-2 lg:px-8 xl:pl-12">
                <div class="max-w-lg mx-auto lg:max-w-none">
                    <h2 class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">Login</h2>
                    @if (session('status'))
                    <x-banner type="success">
                        {{ session('status') }}
                    </x-banner>
                    @endif
                    <form
                        method="POST"
                        action="{{ route('login') }}"
                        class="space-y-6">
                        @csrf
                        <div>
                            <label
                                for="email"
                                class="block text-sm font-medium text-gray-700"> {{ __('Email address') }} </label>
                            <div class="mt-1">
                                <input
                                    id="email"
                                    name="email"
                                    type="email"
                                    autofocus
                                    autocomplete="email"
                                    required
                                    value="{{ old('email') }}"
                                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <x-atom.error
                                    for="email"
                                    class="mt-2" />
                            </div>
                        </div>

                        <div>
                            <label
                                for="password"
                                class="block text-sm font-medium text-gray-700"> {{ __('Password') }} </label>
                            <div class="mt-1">
                                <input
                                    id="password"
                                    name="password"
                                    type="password"
                                    autocomplete="current-password"
                                    required
                                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <x-atom.error
                                    for="password"
                                    class="mt-2" />
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input
                                    id="remember-me"
                                    name="remember"
                                    type="checkbox"
                                    class="h-4 w-4 text-custom-blue-100 focus:ring-indigo-500 border-gray-300 rounded">
                                <label
                                    for="remember-me"
                                    class="ml-2 block text-sm text-gray-900"> {{ __('Remember me') }} </label>
                            </div>
                        </div>

                        <div class="flex gap-5">
                            <button type="submit" class="w-1/2 flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white uppercase bg-custom-blue-100 hover:bg-custom-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">{{ __('Sign in') }}</button>
                            <a
                                href="{{ route('register') }}"
                                class="w-1/2 flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white uppercase bg-custom-red-100 hover:bg-custom-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Register</a>
                        </div>
                    </form>
                    <div class="mt-6 space-y-2">
                        <p class="text-sm">
                            Forgotten your password?
                            <a href="{{ route('password.request') }}" class="font-medium text-custom-blue-100 hover:text-custom-blue-200"> {{ __('Click here') }} </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-guest-layout>
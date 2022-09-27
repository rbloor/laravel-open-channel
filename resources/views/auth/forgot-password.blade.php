<x-guest-layout>

    @php $page = App\Models\Page::where('slug', 'login')->firstOrFail(); @endphp

    <!-- Hero -->
    <x-hero :page="$page" />

    <!-- Forgotten password Form -->
    <div class="bg-white py-16 px-4 overflow-hidden sm:px-6 lg:px-8 lg:py-24">
        <div class="relative max-w-xl mx-auto">

            <div class="text-center">
                <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">{{ __('Forgotten password') }}</h2>
                <p class="mt-4 text-lg leading-6 text-gray-500">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
            </div>

            @if (session('status'))
            <x-banner type="success">
                {{ session('status') }}
            </x-banner>
            @endif

            <div class="mt-8">
                <form
                    action="{{ route('password.email') }}"
                    method="POST"
                    class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
                    @csrf

                    <div class="sm:col-span-2">
                        <label
                            for="email"
                            class="block text-sm font-medium text-gray-700">{{ __('Work email') }}*</label>
                        <div class="mt-1">
                            <input
                                id="email"
                                name="email"
                                type="email"
                                autocomplete="email"
                                autofocus
                                value="{{ old('email') }}"
                                class="py-3 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                            <x-atom.error
                                for="email"
                                class="mt-2" />
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <button
                            type="submit"
                            class="w-full inline-flex items-center justify-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white uppercase bg-custom-blue-100 hover:bg-custom-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 disabled:opacity-50">
                            {{ __('Email Password Reset Link') }}
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>

</x-guest-layout>
<x-app-layout>

    @php $page = App\Models\Page::where('slug', 'feedback')->firstOrFail(); @endphp

    <!-- Hero -->
    <x-hero :page="$page" />

    <div class="bg-white py-16 px-4 overflow-hidden sm:px-6 lg:px-8">
        <div class="relative max-w-xl mx-auto">

            @if ( Session::has('success') )
            <x-banner class="mb-8" type="success">{{ Session::get('success') }}</x-banner>
            @endif

            <x-molecule.patterns />

            <form action="{{ route('feedback.store') }}" x-data="{ agree: false }" method="POST" class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
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
                    <x-atom.label for="email" value="{{ __('Email') }}" />
                    <x-atom.input id="email" type="email" name="email" value="{{ auth()->user()->email }}" disabled />
                </div>
                <div class="sm:col-span-2">
                    <x-atom.label for="subject" value="{{ __('Subject') }}*" />
                    <x-atom.input id="subject" type="text" name="subject" value="{{ old('subject') }}" />
                    <x-atom.error for="subject" class="mt-2" />
                </div>
                <div class="sm:col-span-2">
                    <x-atom.label for="message" value="{{ __('Message') }}*" />
                    <x-atom.textarea id="message" name="message" value="{!! old('message') !!}" rows="4" class="mt-1 block w-full" />
                    <x-atom.error for="message" class="mt-2" />
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
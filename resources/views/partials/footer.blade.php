<!-- Back to top -->
<div class="max-w-7xl mx-auto py-8 px-4 overflow-hidden sm:px-6 lg:px-8 lg:w-full">
    <button type="button" class="flex items-center lg:float-right gap-4 js-back-to-top">
        <span class="text-base text-custom-blue-200 pointer-events-none">Back to top</span>
        <img class="" src="{{ asset('img/icon-back-to-top.svg') }}" alt="Back to top" />
    </button>
</div>

<!-- Footer -->
<footer class="bg-gray-100">
    <div class="max-w-7xl mx-auto py-8 px-4 overflow-hidden md:px-6 lg:px-8">
        <nav class="-mx-5 -my-2 flex flex-wrap justify-start" aria-label="Footer">
            <div class="px-5 py-2">
                <a href="/terms-and-conditions" class="text-sm underline text-gray-600 hover:text-custom-blue-200">Terms and Conditions</a>
            </div>
            <div class="px-5 py-2">
                <a href="/privacy-policy" class="text-sm underline text-gray-600 hover:text-custom-blue-200">Privacy Policy</a>
            </div>
            <div class="px-5 py-2">
                <a href="/cookie-policy" class="text-sm underline text-gray-600 hover:text-custom-blue-200">Cookie Policy</a>
            </div>
            @can('create_feedback')
            <div class="px-5 py-2">
                <a href="{{ route('feedback.create') }}" class="text-sm underline text-gray-600 hover:text-custom-blue-200">Give us your Feedback</a>
            </div>
            @endcan
            <div class="px-5 py-2 lg:text-right flex-grow flex-end">
                <p class="text-sm text-gray-600 ">
                    Do you need to update your income tax bracket for the year?
                    <a href="{{ route('profile') }}" class="text-sm underline text-gray-600 hover:text-custom-blue-200">Click here</a>
                </p>
            </div>
        </nav>
        <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 gap-4">
            <p class="order-2 sm:order-1 text-sm text-gray-600">&copy; 2022 Canon. All rights reserved. Canon is not responsible for photographic or typographic errors. Canon and the Canon logo are trademarks or registered trademarks of Canon. All other trademarks are the property of their respective owners.</p>
            <a class="order-1 sm:order-2 place-self-center sm:place-self-end" href="{{ route('dashboard') }}">
                <img
                    class="h-12 block w-full"
                    src="{{ asset('img/open-channel-logo.svg') }}"
                    alt="Canon Open Channel" />
            </a>
        </div>
</footer>

<!-- Offer Popup -->
@livewire('user.popup')
<div class="sm:col-span-2">
    <div class="flex items-start">
        <div class="flex-shrink-0">
            <button @click="agree = !agree" :class="{ 'bg-indigo-600' : agree, 'bg-gray-200' : !agree }" type="button" class="relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" role="switch" aria-checked="false">
                <span class="sr-only">{{ __('Agree to policies') }}</span>
                <span :class="{ 'translate-x-5' : agree, 'translate-x-0' : !agree }" aria-hidden="true" class="translate-x-0 inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200"></span>
            </button>
        </div>
        <div class="ml-3">
            <p class="text-base text-gray-500">
                {{ __('By selecting this, you agree to the') }}
                <a href="#" target="_blank" class="font-medium text-gray-700 underline">{{ __('Privacy Policy') }}</a>
                {{ __('and') }}
                <a href="#" target="_blank" class="font-medium text-gray-700 underline">{{ __('Cookie Policy') }}</a>.
            </p>
        </div>
    </div>
</div>
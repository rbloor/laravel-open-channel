<x-guest-layout>

    @php $page = App\Models\Page::where('slug', 'login')->firstOrFail(); @endphp

    <!-- Hero -->
    <x-hero :page="$page" />

    <!-- Register Form -->
    <div class="bg-white py-16 px-4 overflow-hidden sm:px-6 lg:px-8 lg:py-24">
        <div class="relative max-w-xl mx-auto">
            <!-- Patterns -->
            <div class="text-center">
                <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">Register</h2>
            </div>
            <div class="mt-12">
                <x-jet-validation-errors class="mb-4" />
                <form
                    x-data="{ agree: false, showTaxBracket: true, region: '' }"
                    action="{{ route('register') }}"
                    method="POST"
                    class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
                    @csrf

                    <div>
                        <label
                            for="first_name"
                            class="block text-sm font-medium text-gray-700">{{ __('First name') }}*</label>
                        <div class="mt-1">
                            <input
                                type="text"
                                name="first_name"
                                id="first_name"
                                autocomplete="first_name"
                                value="{{ old('first_name') }}"
                                class="py-3 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                            <x-atom.error
                                for="first_name"
                                class="mt-2" />
                        </div>
                    </div>
                    <div>
                        <label
                            for="last_name"
                            class="block text-sm font-medium text-gray-700">{{ __('Last name') }}*</label>
                        <div class="mt-1">
                            <input
                                type="text"
                                name="last_name"
                                id="last_name"
                                autocomplete="last_name"
                                value="{{ old('last_name') }}"
                                class="py-3 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                            <x-atom.error
                                for="last_name"
                                class="mt-2" />
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label
                            for="job_title"
                            class="block text-sm font-medium text-gray-700">{{ __('Job title') }}</label>
                        <div class="mt-1">
                            <input
                                type="text"
                                name="job_title"
                                id="job_title"
                                autocomplete="job_title"
                                value="{{ old('job_title') }}"
                                class="py-3 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                            <x-atom.error
                                for="job_title"
                                class="mt-2" />
                        </div>
                    </div>
                    @if (request()->get('company_id') !== null)
                    <input type="hidden" name="company_id" value="{{ request()->get('company_id') }}" />
                    @else
                    <div class="sm:col-span-2">
                        <label
                            for="company_id"
                            class="block text-sm font-medium text-gray-700">{{ __('Company name') }}*</label>
                        <div class="mt-1">
                            @livewire('user.company-autocomplete')
                        </div>
                        <x-atom.error
                            for="company_id"
                            class="mt-2" />
                    </div>
                    @endif
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
                                value="{{ old('email') }}"
                                class="py-3 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                            <x-atom.error
                                for="email"
                                class="mt-2" />
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label
                            for="telephone"
                            class="block text-sm font-medium text-gray-700">{{ __('Contact number') }}*</label>
                        <div class="mt-1">
                            <input
                                id="telephone"
                                name="telephone"
                                type="tel"
                                autocomplete="telephone"
                                value="{{ old('telephone') }}"
                                class="py-3 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                            <x-atom.error
                                for="telephone"
                                class="mt-2" />
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <p class="text-base leading-6 text-gray-500">
                            For Canon to pay the benefit in kind tax and associated NIC on your behalf please tell us the tax region in which you pay income tax and the income tax bracket you expect to be in for the financial year to April 5th.
                        </p>
                        <p class="mt-3 text-base leading-6 text-gray-500">
                            If your income tax bracket changes during the year then it is your responsibility to inform us by updating this in the ‘My Profile’ section of the portal.
                        </p>
                    </div>

                    <div>
                        <label
                            for="tax_region"
                            class="block text-sm font-medium text-gray-700">{{ __('Tax region') }}*</label>
                        <select
                            x-on:change="showTaxBracket = ($event.target.value == 'uk'); region = $event.target.value;"
                            id="tax_region"
                            name="tax_region"
                            value="{{ old('tax_region') }}"
                            class="py-3 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                            <option></option>
                            <option
                                @if (old('tax_region')=='uk' ) selected @endif
                                value="uk">UK</option>
                            <option
                                @if (old('tax_region')=='roi' ) selected @endif
                                value="roi">Republic of Ireland</option>
                        </select>
                        <x-atom.error
                            for="tax_region"
                            class="mt-2" />
                    </div>
                    <div x-show="showTaxBracket">
                        <label
                            for="tax_bracket"
                            class="block text-sm font-medium text-gray-700">{{ __('Tax rate') }}*</label>
                        <select
                            :disabled="!showTaxBracket"
                            id="tax_bracket"
                            name="tax_bracket"
                            value="{{ old('tax_bracket') }}"
                            class="py-3 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                            <option></option>
                            <option
                                @if (old('tax_bracket')=='20' ) selected @endif
                                value="20">20%</option>
                            <option
                                @if (old('tax_bracket')=='40' ) selected @endif
                                value="40">40%</option>
                            <option
                                @if (old('tax_bracket')=='45' ) selected @endif
                                value="45">45%</option>
                        </select>
                        <x-atom.error
                            for="tax_bracket"
                            class="mt-2" />
                    </div>

                    <div x-show="region == 'roi'" class="sm:col-span-2">
                        <p class="text-base leading-6 text-gray-500">
                            ROI income tax payers are eligible for the incentive scheme but are responsible for the payment of all associated taxes in the Republic of Ireland (ROI). See <a class="underline text-gray-600 hover:text-custom-blue-200" href="">terms and conditions</a>.
                        </p>
                    </div>

                    <div class="sm:col-span-2">
                        <label
                            for="password"
                            class="block text-sm font-medium text-gray-700">{{ __('Password') }}*</label>
                        <div class="mt-1">
                            <input
                                id="password"
                                name="password"
                                type="password"
                                autocomplete="password"
                                value="{{ old('password') }}"
                                class="py-3 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                            <x-atom.error
                                for="password"
                                class="mt-2" />
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label
                            for="password_confirmation"
                            class="block text-sm font-medium text-gray-700">{{ __('Confirm Password') }}*</label>
                        <div class="mt-1">
                            <input
                                id="password_confirmation"
                                name="password_confirmation"
                                type="password"
                                autocomplete="password_confirmation"
                                value="{{ old('password_confirmation') }}"
                                class="py-3 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                            <x-atom.error
                                for="password_confirmation"
                                class="mt-2" />
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <button
                                    type="button"
                                    :class="{ 'bg-indigo-600' : agree, 'bg-gray-200' : !agree }"
                                    class="relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    role="switch"
                                    aria-checked="false"
                                    @click="agree = !agree">
                                    <span class="sr-only">Agree to policies</span>
                                    <span
                                        aria-hidden="true"
                                        :class="{ 'translate-x-5' : agree, 'translate-x-0' : !agree }"
                                        class="inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200"></span>
                                </button>
                            </div>
                            <div class="ml-3">
                                <p class="text-base text-gray-500">
                                    By selecting this, you agree to the
                                    <a
                                        href="#"
                                        target="_blank"
                                        class="font-medium text-gray-700 underline">Privacy Policy</a>
                                    and
                                    <a
                                        href="#"
                                        target="_blank"
                                        class="font-medium text-gray-700 underline">Cookie Policy</a>.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <input
                            type="checkbox"
                            name="terms"
                            class="hidden"
                            :checked="agree" />
                        <button
                            type="submit"
                            :disabled="!agree"
                            class="w-full inline-flex items-center justify-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white uppercase bg-custom-blue-100 hover:bg-custom-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 disabled:opacity-50">Register</button>
                    </div>

                    <div class="sm:col-span-2">
                        <p class="text-xs leading-6 text-gray-500">*Compulsory field</p>
                        <p class="mt-4 text-xs leading-6 text-gray-500">
                            Information provided in this form will only be used to contact you in relation to this programme
                            and will only be shared with third parties for tax and delivery purposes. By submitting this form,
                            you also indicate your consent to receiving phone and email marketing messages from us. Submitting
                            details indicates your consent for us to process your personal data as explained
                            <a
                                href=""
                                target="_blank"
                                class="font-medium text-gray-700 underline">here</a>.
                            Please read this important notice as it contains details on how to exercise your privacy rights.
                        </p>
                        <p class="mt-4 text-xs leading-6 text-gray-500">
                            We promise to keep your details safe and secure. If you have any questions or concerns about the use
                            of your data, please contact us on 020 8780 9700 or email the
                            <a
                                href=""
                                target="_blank"
                                class="font-medium text-gray-700 underline">Data Protection Officer</a> at WorksMC.
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>


</x-guest-layout>
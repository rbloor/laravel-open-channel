@props(['action', 'method' => 'GET'])

<!-- Filters -->
<section aria-labelledby="filter-heading">
    <h2
        id="filter-heading"
        class="sr-only">{{ __('Filters') }}</h2>

    <form
        action="{{ $action }}"
        method="{{ $method }}">

        <div class="bg-white border-b border-gray-200 py-4">
            <div class="max-w-7xl mx-auto px-4 flex flex-col sm:flex-row items-center justify-start gap-4 sm:px-6 lg:px-8">
                {{ $filters }}
                @if (request()->has('search'))
                <a
                    href="{{ $action }}"
                    class="rounded-md shadow inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-custom-blue-100 hover:bg-custom-blue-200">
                    {{ __('Clear filters') }}
                </a>
                @endif
            </div>
        </div>

    </form>

</section>
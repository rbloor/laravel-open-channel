@props(['disabled' => false, 'prefix' => '', 'affix' => ''])

<div class="mt-1 relative rounded-md shadow-sm">

    @if (!empty($prefix))
    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
        <span class="text-gray-500 sm:text-sm">{{ $prefix }}</span>
    </div>
    @endif

    <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'mt-1 block w-full border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 rounded-md shadow-sm disabled:bg-gray-100']) !!}>

    @if (!empty($affix))
    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
        <span class="text-gray-500 sm:text-sm" id="price-currency">{{ $affix }}</span>
    </div>
    @endif

</div>
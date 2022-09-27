@props(['title', 'href', 'livewire'])

<div class="sm:flex sm:items-center sm:justify-between">
    <h3 {!! $attributes->merge(['class' => 'text-lg leading-6 font-medium text-gray-900']) !!}>{{ $title }}</h3>
    @if (isset($livewire))
    <button wire:click="{{ $livewire }}" type="button" class="inline-flex items-center justify-items-end p-2 border border-transparent rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        {{ $slot }}
    </button>
    @endif
    @if (isset($href))
    <a href="{{ $href }}" class="inline-flex items-center justify-items-end p-2 border border-transparent rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        {{ $slot }}
    </a>
    @endif
</div>
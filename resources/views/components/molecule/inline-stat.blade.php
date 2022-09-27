@props(['name', 'value', 'type', 'active' => false])

<div class="flex py-4 px-4 justify-between {{ $active === true ? 'bg-green-50' : ''}}">
    <p class="text-sm font-medium text-gray-500">{{ $name }}</p>
    <x-atom.badge type="{{ $type }}">
        {{ $value }}
    </x-atom.badge>
</div>
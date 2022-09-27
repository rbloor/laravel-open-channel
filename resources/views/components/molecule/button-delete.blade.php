@props(['action'])
<form action="{{ $action }}" method="POST" {{ $attributes->merge(['class' => 'inline-block']) }}>
    @csrf
    @method('DELETE')
    <x-atom.button type="submit" color="danger" onclick="return confirm('Are you sure?')">{{ $slot }}</x-atom.button>
</form>
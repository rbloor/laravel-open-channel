@props(['disabled' => false, 'value' => '', 'allowEmpty' => false, 'livewire' => false, 'options' => ['0'=> 'No', '1' => 'Yes']])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md disabled:bg-gray-100']) !!}>
    @if ($allowEmpty)
    <option></option>
    @endif
    @foreach ($options as $k => $v)
    <option @if ($k==$value && !$livewire) selected @endif value="{{ $k }}">{{ $v }}</option>
    @endforeach
</select>
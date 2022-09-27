@props(['list' => [], 'filter', 'emptyValue'])

<select
    name="{{ $filter }}"
    class="text-sm border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"
    onchange="event.preventDefault(); this.closest('form').submit();"
>
    <option value="">{{ $emptyValue }}</option>
    @foreach ($list as $item)
    <option
        @if(request($filter)==$item['key'])
        selected
        @endif
        value="{{ $item['key'] }}"
    >
        {{ $item['value'] }}
    </option>
    @endforeach
</select>
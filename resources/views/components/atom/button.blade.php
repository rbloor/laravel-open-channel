@props(['type' => 'link', 'color' => 'primary', 'size' => 'regular'])

@php

$classes = '';

switch ($color) {
case 'primary':
$classes .= 'text-white bg-indigo-600 hover:bg-indigo-700 border-transparent ';
break;
case 'secondary':
$classes .= 'text-indigo-700 bg-indigo-100 hover:bg-indigo-200 border-transparent ';
break;
case 'success':
$classes .= 'text-white bg-green-600 hover:bg-green-700 border-transparent ';
break;
case 'danger':
$classes .= 'text-white bg-red-600 hover:bg-red-700 border-transparent ';
break;
case 'theme-blue':
$classes .= 'text-white bg-custom-blue-100 hover:bg-custom-blue-200 border-transparent ';
break;
default:
$classes .= 'text-gray-700 bg-white hover:bg-gray-50 border-gray-300 ';
break;
}

switch ($size) {
case 'small':
$classes .= 'px-2 py-1 text-xs ';
break;
case 'regular':
$classes .= 'px-4 py-2 text-sm ';
break;
case 'large':
$classes .= 'px-6 py-2.5 text-md ';
break;
}
@endphp

@if ($type == 'link')
<a {{ $attributes->merge(['class' => $classes . ' inline-flex items-center border shadow-sm font-medium rounded focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</a>
@else
<button type="{{ $type }}" {{ $attributes->merge(['class' => $classes . 'inline-flex items-center border shadow-sm font-medium rounded focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>
@endif
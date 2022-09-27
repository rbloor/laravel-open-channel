@props(['type' => ''])

@php
switch ($type) {
case 'success':
$class = 'bg-green-100 text-green-800';
break;
case 'danger':
$class = 'bg-red-100 text-red-800';
break;
case 'warning':
$class = 'bg-yellow-100 text-yellow-800';
break;
case 'info':
$class = 'bg-blue-100 text-blue-800';
break;
default:
$class = 'bg-indigo-700 text-white';
}
@endphp

<span class="{{ $class }} inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium">
    {{ $slot }}
</span>
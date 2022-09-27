@props(['steps' => [], 'currentStep'])

<nav aria-label="Progress">
    <ol role="list" class="border border-gray-300 rounded-md divide-y divide-x divide-gray-300  md:flex md:divide-y-0">

        @foreach ($steps as $number => $name)

        @php

        if ($number < $currentStep) {
            $itemClass='bg-indigo-600 group-hover:border-indigo-800' ;
            $labelNumberClass='' ;
            $labelNameClass='text-gray-900' ;
            }
            else if ($number==$currentStep) {
            $itemClass='border-indigo-600' ;
            $labelNumberClass='text-indigo-600' ;
            $labelNameClass='text-indigo-600' ;
            }
            else {
            $itemClass='border-gray-300 group-hover:border-gray-400' ;
            $labelNumberClass='text-gray-500 group-hover:text-gray-900' ;
            $labelNameClass='text-gray-500 group-hover:text-gray-900' ;
            }
            @endphp

            <li class="relative md:flex-1 md:flex">
            <a wire:click="goToStep({{ $number }})" href="#" class="group flex items-center">
                <span class="px-6 py-4 flex items-center text-sm font-medium">
                    <span class="flex-shrink-0 w-10 h-10 flex items-center justify-center border-2  rounded-full {{ $itemClass }}">
                        @if ($number < $currentStep)
                            <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            @else
                            <span class="{{ $labelNumberClass }}">{{ $number + 1}}</span>
                            @endif
                    </span>
                    <span class="ml-4 text-sm font-medium {{ $labelNameClass }}">{{ $name }}</span>
                </span>
            </a>
            </li>

            @endforeach

    </ol>
</nav>
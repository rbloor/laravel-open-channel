<div>

    <x-molecule.progress :steps="$steps" :currentStep="$currentStep" />

    <div class="bg-white shadow sm:rounded-lg mt-4">
        <div class="px-4 py-5 sm:p-6">
            @if ($currentStep === 0)
            <div>
                <x-molecule.subheading class="mb-5" title="{{ $steps[$currentStep] }}" href="{{ asset('files/sales-example.csv') }}">
                    Example <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                </x-molecule.subheading>
                <form wire:submit.prevent="completeStepOne">
                    <div class="col-span-6 sm:col-span-4">
                        <x-atom.label for="hasHeaderRow" value="{{ __('Is the first row a header?') }}" />
                        <x-atom.select id="hasHeaderRow" wire:model="hasHeaderRow" value="1" :options="['0'=> 'No', '1' => 'Yes']" />
                        <x-atom.error for="hasHeaderRow" class="mt-2" />
                    </div>
                    <div>
                        <x-atom.input-file id="file" type="file" wire:model="file" class="mt-1 block w-full" help="CSV up to 8MB" />
                        <x-atom.error for="file" class="mt-2" />
                    </div>
                    <div class="flex justify-end mt-4">
                        <x-atom.button wire:click="completeStepOne" type="button">Submit</x-atom.button>
                    </div>
                </form>
            </div>
            @endif

            @if ($currentStep === 1)
            <div>
                <x-molecule.subheading class="mb-5" title="{{ $steps[$currentStep] }}"></x-molecule.subheading>
                <form wire:submit.prevent="completeStepTwo">
                    <x-molecule.table>
                        <x-slot name="header">
                            @foreach ($mappedFields as $key => $field)
                            <x-atom.th>{{ $field['name'] }}</x-atom.th>
                            @endforeach
                        </x-slot>
                        <x-slot name="body">
                            <tr>
                                @foreach ($mappedFields as $key => $field)
                                <td class="py-3 pl-3 align-top {{ $loop->last ? 'pr-3' : '' }}">
                                    <x-atom.select class="mt-0" wire:model="mappedFields.{{ $key }}.value" :livewire="true" :allowEmpty="true" :options="$headings" />
                                    <x-atom.error for="mappedFields.{{ $key }}.value" class="mt-2" />
                                </td>
                                @endforeach
                            </tr>
                        </x-slot>
                    </x-molecule.table>
                    <div class="flex justify-end mt-4">
                        <x-atom.button wire:click="completeStepTwo" type="button">Submit</x-atom.button>
                    </div>
                </form>
            </div>
            @endif

            @if ($currentStep === 2)
            <div>
                <x-molecule.subheading class="mb-5" title="{{ $steps[$currentStep] }}"></x-molecule.subheading>
                <x-molecule.table>
                    <x-slot name="header">
                        @foreach ($mappedFields as $key => $field)
                        <x-atom.th>{{ $field['name'] }}</x-atom.th>
                        @endforeach
                    </x-slot>
                    <x-slot name="body">
                        @foreach (array_slice($rows, 0, 5) as $row)
                        <tr>
                            @foreach ($mappedFields as $key => $field)
                            <x-atom.td class="align-top">{{ $row[$field['value']] }}</x-atom.td>
                            @endforeach
                        </tr>
                        @endforeach
                    </x-slot>
                </x-molecule.table>
                <div class="flex justify-end mt-4">
                    <x-atom.button wire:click="completeStepThree" type="button">Submit</x-atom.button>
                </div>
            </div>
            @endif

            @if ($currentStep === 3)
            <div>
                @if (count($this->errors))
                <x-molecule.subheading class="mb-5" title="Error"></x-molecule.subheading>
                <p class="mt-1 text-sm text-gray-500">No rows have been imported.</p>
                <dl class="my-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
                    <x-molecule.stat name="Rows" :value="count($this->rows)" />
                    <x-molecule.stat name="Imported" :value="count($this->rows) - count($this->errors)" />
                    <x-molecule.stat name="Errors" :value="count($this->errors)" />
                </dl>
                <x-molecule.table>
                    <x-slot name="header">
                        <x-atom.th>Row Number</x-atom.th>
                        <x-atom.th>Error</x-atom.th>
                    </x-slot>
                    <x-slot name="body">
                        @foreach ($this->errors as $error)
                        <tr>
                            <x-atom.td>{{ $error['row'] }}</x-atom.td>
                            <x-atom.td>
                                <ul class="list-disc">
                                    {!! implode('', $error['field_errors']->all('<li>:message</li>')) !!}
                                </ul>
                            </x-atom.td>
                        </tr>
                        @endforeach
                    </x-slot>
                </x-molecule.table>
                <div class="flex justify-end mt-4">
                    <x-atom.button href="{{ route('admin.tool.bulk-sales-importer') }}">Start again</x-atom.button>
                </div>
                @else
                <x-molecule.subheading class="mb-5" title="{{ $steps[$currentStep] }}"></x-molecule.subheading>
                <p class="mt-1 text-sm text-gray-500">All rows have been processed, ready for importing.</p>
                <dl class="my-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
                    <x-molecule.stat name="Total Rows" :value="count($this->rows)" />
                    <x-molecule.stat name="Correct Rows" :value="count($this->rows)" />
                    <x-molecule.stat name="Incorrect Rows" :value="count($this->errors)" />
                </dl>
                <div class="flex justify-end mt-4">
                    <x-atom.button wire:click="completeStepFour" type="button">Import</x-atom.button>
                </div>
                @endif
            </div>
            @endif

            @if ($currentStep === 4)
            <div>
                <x-molecule.subheading class="mb-5" title="{{ $steps[$currentStep] }}"></x-molecule.subheading>
                <p class="mt-1 text-sm text-gray-500">All rows have been imported.</p>
                <div class="flex justify-end mt-4">
                    <x-atom.button href="{{ route('admin.tool.bulk-sales-importer') }}">Start again</x-atom.button>
                </div>
            </div>
            @endif

        </div>
    </div>

</div>
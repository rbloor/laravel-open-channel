<div>
    <div
        x-data="{
        open: @entangle('showDropdown'),
        search: @entangle('search'),
        selected: @entangle('selected'),
        highlightedIndex: 0,
        highlightPrevious() {
          if (this.highlightedIndex > 0) {
            this.highlightedIndex = this.highlightedIndex - 1;
            this.scrollIntoView();
          }
        },
        highlightNext() {
          if (this.highlightedIndex < this.$refs.results.children.length - 1) {
            this.highlightedIndex = this.highlightedIndex + 1;
            this.scrollIntoView();
          }
        },
        scrollIntoView() {
          this.$refs.results.children[this.highlightedIndex].scrollIntoView({
            block: 'nearest',
            behavior: 'smooth'
          });
        },
        updateSelected(id, name) {
          this.selected = id;
          this.search = name;
          this.open = false;
          this.highlightedIndex = 0;
        },
    }">

        <div class="rounded-md bg-white border border-gray-300">
            <div class="relative" x-on:value-selected="updateSelected($event.detail.id, $event.detail.name)">
                <svg class="pointer-events-none absolute top-3.5 left-4 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                </svg>
                <input type="hidden" name="company_id" x-model="selected" />
                <input
                    type="text"
                    class="h-12 w-full border-0 bg-transparent pl-11 pr-4 text-gray-800 rounded-md focus:border focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    role="combobox"
                    aria-expanded="false"
                    aria-controls="options"
                    wire:model.debounce.300ms="search"
                    x-on:keydown.arrow-down.stop.prevent="highlightNext()"
                    x-on:keydown.arrow-up.stop.prevent="highlightPrevious()"
                    x-on:keydown.enter.stop.prevent="$dispatch('value-selected', {
                        id: $refs.results.children[highlightedIndex].getAttribute('data-result-id'),
                        name: $refs.results.children[highlightedIndex].getAttribute('data-result-name')
                    })">

                <div x-show="open" x-on:click.away="open = false">
                    <ul x-ref="results" class="max-h-72 scroll-py-2 overflow-y-auto pt-2 text-sm text-gray-800" id="options" role="listbox">
                        @forelse($results as $index => $result)
                        <li
                            wire:key="{{ $index }}"
                            x-on:click.stop="$dispatch('value-selected', {
                            id: {{ $result->id }},
                            name: '{{ $result->name }}'
                            })"
                            :class="{
                                'bg-indigo-600': {{ $index }} === highlightedIndex,
                                'text-white': {{ $index }} === highlightedIndex
                            }"
                            data-result-id="{{ $result->id }}"
                            data-result-name="{{ $result->name }}"
                            class="cursor-default select-none px-4 py-2"
                            id="option-1"
                            role="option"
                            tabindex="-1">
                            {{ $result->name }}
                        </li>
                        @empty
                        <li
                            class="cursor-default select-none px-4 py-2">
                            {{ __('No results found') }}
                        </li>
                        @endforelse
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
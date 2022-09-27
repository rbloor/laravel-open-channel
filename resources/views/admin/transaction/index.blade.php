<x-admin-layout>

    <x-molecule.container>

        <x-molecule.heading href="{{ route('admin.transaction.create') }}">
            {{ __('Transactions') }}
        </x-molecule.heading>

        @if (!$transactions->isEmpty())

        <x-molecule.table>
            <x-slot name="header">
                <x-atom.th>{{ __('Date') }}</x-atom.th>
                <x-atom.th>{{ __('Payment Type') }}</x-atom.th>
                <x-atom.th>{{ __('Paid out') }}</x-atom.th>
                <x-atom.th>{{ __('Paid in') }}</x-atom.th>
                <x-atom.th>{{ __('Balance') }}</x-atom.th>
            </x-slot>
            <x-slot name="body">
                @foreach ($transactions as $transaction)
                <tr>
                    <x-atom.td>
                        <time datetime="{{ $transaction->created_at->format('Y-m-d') }}">
                            {{ $transaction->created_at->format('M d, Y') }}
                        </time>
                    </x-atom.td>
                    <x-atom.td>{{ $transaction->name }}</x-atom.td>
                    <x-atom.td>
                        <div class="flex items-center space-x-2">
                            @if ($transaction->debit)
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                            </svg>
                            <span class="text-gray-900 font-medium">{{ $transaction->debit }}</span>
                            @endif
                        </div>
                    </x-atom.td>
                    <x-atom.td>
                        <div class="flex items-center space-x-2">
                            @if ($transaction->credit)
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                            <span class="text-gray-900 font-medium">{{ $transaction->credit }}</span>
                            @endif
                        </div>
                    </x-atom.td>
                    <x-atom.td class="text-gray-900">{{ $transaction->balance }}</x-atom.td>
                </tr>
                @endforeach
            </x-slot>
        </x-molecule.table>

        {{ $transactions->links() }}

        @else

        <x-molecule.empty url="{{ route('admin.transaction.create') }}" />

        @endif

    </x-molecule.container>

</x-admin-layout>
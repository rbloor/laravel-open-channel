<table>
    <thead>
        <tr>
            <th>Credit</th>
            <th>Debit</th>
            <th>Balance</th>
            <th>Date Created</th>
        </tr>
    </thead>
    <tbody>
        @foreach($transactions as $transaction)
        <tr>
            <td>{{ $transaction->credit }}</td>
            <td>{{ $transaction->debit }}</td>
            <td>{{ $transaction->balance }}</td>
            <td>{{ $transaction->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
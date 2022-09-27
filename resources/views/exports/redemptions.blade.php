<table>
    <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Telephone</th>
            <th>Company</th>
            <th>Company Category</th>
            <th>Tax Region</th>
            <th>Tax Bracket</th>
            <th>Order Number</th>
            <th>Order Status</th>
            <th>Total Points</th>
            <th>Gross</th>
            <th>Vat</th>
            <th>Tax</th>
            <th>National Insurance</th>
            <th>Net</th>
            <th>Requires Shipping?</th>
            <th>Address Line One</th>
            <th>Address Line Two</th>
            <th>City</th>
            <th>County</th>
            <th>Postcode</th>
            <th>Date Approved</th>
            <th>Date Rejected</th>
            <th>Date Created</th>
        </tr>
    </thead>
    <tbody>
        @foreach($redemptions as $redemption)
        <tr>
            <td>{{ $redemption->user->first_name }}</td>
            <td>{{ $redemption->user->last_name }}</td>
            <td>{{ $redemption->user->email }}</td>
            <td>{{ $redemption->user->membership->telephone }}</td>
            <td>{{ $redemption->user->membership->company->name }}</td>
            <td>{{ $redemption->user->membership->company->company_category->name }}</td>
            <td>{{ $redemption->user->membership->tax_region }}</td>
            <td>{{ $redemption->user->membership->tax_bracket }}</td>
            <td>{{ $redemption->order_number }}</td>
            <td>{{ $redemption->status }}</td>
            <td>{{ $redemption->total_points }}</td>
            <td>{{ $redemption->gross }}</td>
            <td>{{ $redemption->vat }}</td>
            <td>{{ $redemption->tax }}</td>
            <td>{{ $redemption->ni }}</td>
            <td>{{ $redemption->net }}</td>
            <td>{{ $redemption->requires_shipping }}</td>
            <td>{{ $redemption->address_one }}</td>
            <td>{{ $redemption->address_two }}</td>
            <td>{{ $redemption->city }}</td>
            <td>{{ $redemption->county }}</td>
            <td>{{ $redemption->postcode }}</td>
            <td>{{ $redemption->approved_at }}</td>
            <td>{{ $redemption->rejected_at }}</td>
            <td>{{ $redemption->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
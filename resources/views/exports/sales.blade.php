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
            <th>Product Name</th>
            <th>Product Category</th>
            <th>Product Offer Multiplier</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Points</th>
            <th>Bonus Points</th>
            <th>Total Points</th>
            <th>Date Sold</th>
            <th>Date Invoiced</th>
            <th>Date Approved</th>
            <th>Date Rejected</th>
            <th>Date Created</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sales as $sale)
        <tr>
            <td>{{ $sale->user->first_name }}</td>
            <td>{{ $sale->user->last_name }}</td>
            <td>{{ $sale->user->email }}</td>
            <td>{{ $sale->user->membership->telephone }}</td>
            <td>{{ $sale->user->membership->company->name }}</td>
            <td>{{ $sale->user->membership->company->company_category->name }}</td>
            <td>{{ $sale->user->membership->tax_region }}</td>
            <td>{{ $sale->user->membership->tax_bracket }}</td>
            <td>{{ $sale->product->name }}</td>
            <td>{{ $sale->product->product_category->name }}</td>
            <td>{{ $sale->product->product_offer->multiplier ?? '' }}</td>
            <td>{{ $sale->quantity }}</td>
            <td>{{ $sale->price }}</td>
            <td>{{ $sale->points }}</td>
            <td>{{ $sale->bonus_points }}</td>
            <td>{{ $sale->total_points }}</td>
            <td>{{ $sale->sold_at }}</td>
            <td>{{ $sale->invoiced_at }}</td>
            <td>{{ $sale->approved_at }}</td>
            <td>{{ $sale->rejected_at }}</td>
            <td>{{ $sale->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
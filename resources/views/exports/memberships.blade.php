<table>
    <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Telephone</th>
            <th>Company</th>
            <th>Company Category</th>
            <th>Job Title</th>
            <th>Tax Region</th>
            <th>Tax Bracket</th>
            <th>Login Count</th>
            <th>Last Login At</th>
            <th>Date Approved</th>
            <th>Date Rejected</th>
            <th>Date Created</th>
        </tr>
    </thead>
    <tbody>
        @foreach($memberships as $membership)
        <tr>
            <td>{{ $membership->user->first_name }}</td>
            <td>{{ $membership->user->last_name }}</td>
            <td>{{ $membership->user->email }}</td>
            <td>{{ $membership->telephone }}</td>
            <td>{{ $membership->company->name }}</td>
            <td>{{ $membership->company->company_category->name }}</td>
            <td>{{ $membership->job_title }}</td>
            <td>{{ $membership->tax_region }}</td>
            <td>{{ $membership->tax_bracket }}</td>
            <td>{{ $membership->user->login_count }}</td>
            <td>{{ $membership->user->last_login_at }}</td>
            <td>{{ $membership->user->approved_at }}</td>
            <td>{{ $membership->user->rejected_at }}</td>
            <td>{{ $membership->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
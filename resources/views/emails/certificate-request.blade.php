@component('mail::message')

# Dear Admin

A user has requested a certficate.

@component('mail::table')
| | |
|:--------------------- |:---------------------|
| **User ID:** | {{ $user->id }} |
| **Name:** | {{ $user->name }} |
| **Email:** | {{ $user->email }} |
| **Phone:** | {{ $user->membership->telephone }} |
| **Company:** | {{ $user->membership->company->name }} |
| **Job Title:** | {{ $user->membership->job_title }} |
| **Tax Region:** | {{ strtoupper($user->membership->tax_region) }} |
| **Tax Rate:** | {{ $user->membership->tax_bracket }}% |
@endcomponent

@endcomponent
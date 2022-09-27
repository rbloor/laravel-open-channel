@component('mail::message')

# Dear {{ $user->name }}

## YOUR CANON SALES CLAIM(S) HAVE BEEN APPROVED

The points for your sale(s) have been added to your account. Check out your points total [here]({{ route('login') }}).

@endcomponent
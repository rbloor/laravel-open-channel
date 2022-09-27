@component('mail::message')

# Dear {{ $user->name }}

## YOUR CANON POINTS REDEMPTION REQUEST HAS BEEN APPROVED

You have successfully redeemed your points.

@if ($redemption->requires_shipping === false)
You will receive an additional email for any virtual pre-payment card redemptions. Enjoy!
@endif

You can always view the detail of this redemption claim by clicking [here]({{ route('redemption.index') }}).

@endcomponent
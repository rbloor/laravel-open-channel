@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => config('app.url')])
{{ config('app.name') }}
@endcomponent
@endslot

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
@slot('subcopy')
@component('mail::subcopy')
{{ $subcopy }}
@endcomponent
@endslot
@endisset

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
[Terms and Conditions]({{ config('app.url') }}/terms-and-conditions)
|
[Privacy Policy]({{ config('app.url') }}/privacy-policy)
|
[Cookie Policy]({{ config('app.url') }}/cookie-policy)
|
[Give us your Feedback]({{ route('feedback.create') }})

© {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved. Canon is not responsible for photographic or typographic errors. Canon and the Canon logo are trademarks or registered trademarks of Canon. All other trademarks are the property of their respective owners.')
@endcomponent
@endslot
@endcomponent
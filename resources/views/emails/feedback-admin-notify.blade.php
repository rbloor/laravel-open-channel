@component('mail::message')

# Dear Admin

## CANON INCENTIVE SCHEME

A user has submitted feedback via the website. Click [here]({{ route('admin.feedback.index') }}) to view.

### Subject:

{{ $feedback->subject }}

### Message:

{{ $feedback->message }}

@endcomponent
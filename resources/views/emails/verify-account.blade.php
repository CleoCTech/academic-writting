@component('mail::message')
# Confirm your email

Click the button below to verify your email:
@component('mail::button', ['url' => config('app.url').'verify-email/'.$mail])
Verify Email
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

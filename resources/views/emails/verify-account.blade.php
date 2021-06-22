@component('mail::message')
# Confirm your email

Click the button below to verify your email:
{{-- <a href="{{ url('start-treatment/'.$treatment->id) }}" wire:click="update({{ $treatment->id }})">{{$treatment->name}}</a> --}}
@component('mail::button', ['url' => 'http://127.0.0.1:8000/verify-email/'.$mail])
Verify Email
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

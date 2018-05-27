@component('mail::message')
# Hello {{$user->username}}

Thank you for creating an account. Please verify your account using this link.

@component('mail::button', ['url' => 'www.skillpayer.info/verify/'. $user->verification_token])
Verify Account
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

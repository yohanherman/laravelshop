@component('mail::message')

<p>Hello {{ $user->name }}</p>

@component('mail::button',['url'=>url('reset/'.$user->remember_token)])
Reset your Password
@endcomponent

<p>In case you have  any issues recovering your password please contact us</p>

Thanks <br />
{{ config('app.name')}}

@endcomponent
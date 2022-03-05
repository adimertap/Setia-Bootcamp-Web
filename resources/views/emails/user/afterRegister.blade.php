@component('mail::message')
# Welcome!

Hi {{ $user->name }}
<br>
Welcome to Setia Bootcamp, your account has been created successfully. Now you can choose your best class camp!

@component('mail::button', ['url' => route('login')])
Login Here
@endcomponent

Thanks,<br>
Admin Setia Bootcamp
@endcomponent

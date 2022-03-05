@component('mail::message')
# Register Class Camp: {{ $checkout->Kelas->nama_kelas }}

Hi, {{ $checkout->User->name }}
<br>
Thank you for register on <b>{{ $checkout->Kelas->nama_kelas }}</b>, please see payment instruction by click the button below.


@component('mail::button', ['url' => route('user.dashboard')])
My Dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

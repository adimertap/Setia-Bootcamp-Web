@component('mail::message')
# FAQ Pembelajaran Bootcamp

Hi, {{ $data['name'] }}
<br>
Kelas {{ $data['nama_kelas'] }} <br>
Pertanyaan {{ $data['pertanyaan'] }}<br>

Jawaban: {{ $data['jawaban_faq'] }}, <br>

Please rate our class by click the button below.

@component('mail::button', ['url' => route('user.dashboard')])
Lanjut Belajar
@endcomponent

Thanks,<br>
{{ config('app.name') }}, Mentor {{ $data['nama_mentor'] }}
@endcomponent

@component('mail::message')
# @lang('Halo'), {{ explode(" ", $user->name)[0] }} !

Terimakasih telah mendaftar kursus di Android Makassar.

Kursus yang kamu ikuti adalah:
@component('mail::panel')
{{ $user->participant->registration->event->name }} <br>
Biaya  : Rp. {{ number_format($user->participant->registration->paybill) }},-
@endcomponent

Untuk dapat mengikuti kursus, lakukan pembayaran sebesar biaya kursus yang tertera diatas.

- DP <b>50%</b> harus dibayarkan maksimal <b>48 jam</b> setelah melakukan registrasi.
- Pembayaran bisa melalui transfer ke rekening <b>BCA</b> 7990580914 a.n. <b>Suryadi Syamsu</b>.
- Sisa biaya kursus dapat dibayarkan pada saat kursus berlangsung.

Upload bukti pembayaran dapat dilakukan melalui : {{ config('app.url') }}

Tapi sebelum itu, silahkan verifikasi email kamu terlebih dahulu melalui link dibawah ini.
@component('mail::button', ['url' => $url])
Verifikasi Email
@endcomponent

<b>Informasi Akun :</b>
@component('mail::panel')
Username : {{ $user->username }}<br>
Password : {{ $password }}
@endcomponent

<br><br><br>

Thanks,<br>
{{ config('app.name') }}

@component('mail::subcopy')
{{ config('app.name') }} : {{ config('app.url') }}
@endcomponent
@endcomponent

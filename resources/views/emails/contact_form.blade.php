@component('mail::message')

<strong>Mesajı Gönderen :</strong> {{$name}}

<strong>Gönderim Zamanı :</strong> {{Carbon\Carbon::parse(now())->format('d.m.Y H:i:s')}}

<strong>Gelen Mesaj :</strong>
<p>{{$message}}</p>

@component('mail::button', ['url' => 'https://harundogdu.com'])
Siteyi Görüntüle
@endcomponent

Saygılarımla,<br>
{{ config('app.name') }}
@endcomponent

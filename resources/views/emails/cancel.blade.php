@component('mail::message')

Olá {{$patientName}}, sua consulta com Doutor(a) {{$name}}, foi cancelada pelo motivo de {{$reason}}.

<br>
{{ config('app.name') }}
@endcomponent

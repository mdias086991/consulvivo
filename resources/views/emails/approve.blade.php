@component('mail::message')

Olá {{$patientName}}, sua consulta com Doutor(a) {{$name}}, foi confirmada para o dia {{$day}}.

<br>
{{ config('app.name') }}
@endcomponent

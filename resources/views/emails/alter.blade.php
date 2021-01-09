@component('mail::message')

Olá Doutor(a) {{$name}}, a sua consulta com {{$patientName}}, foi alterada do dia {{$oldday}} para o dia {{$newDay}}, acesse o seu painel administrativo para confirmar ou recusar a consulta

@component('mail::button', ['url' => 'http://127.0.0.1:8000/login'])
Clique aqui e faça o login
@endcomponent

<br>
{{ config('app.name') }}
@endcomponent

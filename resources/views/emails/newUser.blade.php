@component('mail::message')

Olá, {{$name}}.
Parabéns, você acaba de criar uma conta no Consulvivo no seguinte e-mail {{$emailUser}}.

@component('mail::button', ['url' => 'http://127.0.0.1:8000/login'])
Clique aqui e faça o login
@endcomponent

<br>
{{ config('app.name') }}
@endcomponent

@component('mail::message')

Olá Doutor(a){{$name}}, foi marcado uma consulta para o senhor(a) no dia {{$day}} com o paciente {{$patientName}} por favor acesse a sua conta para confirmar a consulta.

@component('mail::button', ['url' => 'http://127.0.0.1:8000/login'])
Clique aqui e faça o login
@endcomponent

<br>
{{ config('app.name') }}
@endcomponent

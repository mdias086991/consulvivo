@component('mail::message')

Olá {{$name}}, sua consulta com Doutor(a) {{$doctorName}}, foi marcada com sucesso, por favor aguarde a confirmação do médico responsavel

@component('mail::button', ['url' => 'http://127.0.0.1:8000/login'])
Clique aqui e faça o login
@endcomponent

<br>
{{ config('app.name') }}
@endcomponent

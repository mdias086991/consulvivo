@extends('layouts.base-dashboard')
@section('scoped_styles')
    <link rel="stylesheet" href="{{asset('assets/css/dashboard.css')}}"> 
@endsection

@section('content-dash')
    @if (Auth::user()->type == 'patient')
        <div class="container  mt-5">
           <h2>Bem vindo {{Auth::user()->name}}, aqui você poderá marcar, editar, e até cancelar suas consultas</h2>
           <h5>Comece agora marcando uma consulta clicando <a href="{{route('new-consultation')}}">aqui</a></h5>
        </div>
    @else 
        <div class="container mt-5">
            <h2>Bem vindo {{Auth::user()->name}}, aqui você poderá confirmar ou recusar as suas consultas.</h2>
            <h5>Comece agora marcando uma consulta clicando <a href="{{route('doctor-consultation')}}">aqui</a></h5>
        </div>
    @endif
@endsection

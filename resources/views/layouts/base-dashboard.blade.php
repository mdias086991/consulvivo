@extends('layouts.base')

@section('content')

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Consulvivo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @if (Auth::user()->type == 'patient')
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('new-consultation')}}">Marcar Consultas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('view-consultation')}}">Minhas Consultas</a>
                    </li>
                @else 
                    <li class="nav-item">
                        <a class="nav-link" href="#">Minhas Consultas</a>
                    </li>
                @endif
                
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Meu Perfil</a></li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                         {{ __('Sair') }}
                     </a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    </li>
                </ul>
                </li>
            </ul>
            </div>
        </div>
    </nav>
</header>
<div class="main container">
    @yield('content-dash')
</div>

@endsection

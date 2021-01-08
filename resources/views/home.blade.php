@extends('layouts.base-dashboard')
@section('scoped_styles')
    <link rel="stylesheet" href="{{asset('assets/css/dashboard.css')}}"> 
@endsection

@section('content-dash')
    @if (Auth::user()->type == 'patient')
        <div class="container">
            @include('patient.myconsultations')
        </div>
    @else 
        @include('doctor.myconsultations')
    @endif
@endsection

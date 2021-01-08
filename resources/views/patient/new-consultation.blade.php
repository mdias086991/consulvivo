@extends('layouts.base-dashboard')
@section('scoped_styles')
    <link rel="stylesheet" href="{{asset('assets/css/dashboard.css')}}"> 
@endsection

@section('content-dash')
<div class="container mt-5" style="background: rgba(86, 97, 248, 0.69); padding: 5%;border-radius: 3px;">

    <form class="row g-3">
        <div class="col-md-12">
          <label for="inputEmail4" class="form-label">Cidade</label>
          <select name="city" id="city" class="form-control">
              <option value="Salvador">Salvador</option>
              <option value="Lauro de Freitas">Lauro de Freitas</option>
              <option value="Camaçari">Camaçari</option>
          </select>
        </div>
        <div class="col-12">
          <label for="inputAddress" class="form-label">Médico</label>
          <select name="doctor" id="doctor" class="form-control">
              <option value="Matheus">Matheus</option>
          </select>
        </div>
        <div class="col-md-6">
          <label for="inputCity" class="form-label">Data da consulta</label>
          <input type="date" class="form-control" id="date_init" name="date_init">
        </div>
        <div class="col-md-4">
          <label for="inputState" class="form-label">Horario</label>
          <input type="time" class="form-control" id="inputCity">
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Marcar consulta</button>
        </div>
      </form>
</div>
@endsection

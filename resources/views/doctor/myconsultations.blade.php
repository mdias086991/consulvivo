@extends('layouts.base-dashboard')
@section('scoped_styles')
    <link rel="stylesheet" href="{{asset('assets/css/dashboard.css')}}"> 
@endsection

@section('content-dash')

<table class="table mt-5">
    <thead>
      <tr>
        <th scope="col">Numero</th>
        <th scope="col">Paciente</th>
        <th scope="col">Data</th>
        <th scope="col">Status</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($consultationDoctor as $consul)
      <tr>
        <th>{{$consul->id}}</th>
        <td>{{$consul->patient->name}}</td>
        <td>{{$consul->date_end}}</td>
        <td>{{$consul->status}}</td>
        <td>
            <form action="{{route('approve-consultation', [$consul->id])}}" method="POST">
              @csrf
              <button class="btn btn-success">Aprovar</button>
            </form>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
              Cancelar
            </button>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Cancelamento da consulta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form action="{{route('cancel-consultation', [$consul->id])}}" method="POST">
                      @csrf
                      <textarea name="obs" id="obs" cols="55" rows="10" placeholder="Informe porque não poderá atender o paciente nesta data e dê alguma solução"></textarea>
                      <button class="btn btn-danger">Confirmar cancelamento</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </td>
      </tr>
      @endforeach
      
    </tbody>
  </table>

  @endsection
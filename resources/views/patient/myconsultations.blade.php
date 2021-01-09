@extends('layouts.base-dashboard')
@section('scoped_styles')
    <link rel="stylesheet" href="{{asset('assets/css/dashboard.css')}}"> 
@endsection

@section('content-dash')

<table class="table mt-5">
    <thead>
      <tr>
        <th scope="col">Numero</th>
        <th scope="col">Médico</th>
        <th scope="col">Data</th>
        <th scope="col">Status</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($consultation as $consul)
      <tr>
        <th>{{$consul->id}}</th>
        <td>{{$consul->doctor->name}}</td>
        <td>{{$consul->date_end}}</td>
        <td>{{$consul->status}}</td>
        <td>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Editar
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
                  <form class="row g-3" action="{{route('edit-consultation', [$consul->id])}}" method="POST">
                    @csrf
                      <div class="col-md-6">
                        <p for="inputCity" class="form-label">Data da consulta - antiga {{$consul->date_end}}</p>
                        <input type="date" class="form-control" id="new_date" name="new_date">
                      </div>
                      <div class="col-12">
                        <button type="submit" class="btn btn-primary">Editar consulta</button>
                      </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
            <form action="{{ route('delete-consultation', [$consul->id])}}" method="POST">
              @csrf
              <button class="btn btn-danger">cancelar</button>
            </form>
        </td>
      </tr>
      @endforeach
      
    </tbody>
  </table>

  @endsection
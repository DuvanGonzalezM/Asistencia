@extends('layouts.app')

@section('htmlheader_title','Personal')

@section('contentheader_title', 'Personal')
@section('newScript')
    <!-- DataTables -->
    <script src="{{ url (mix('/js/datatable-depen.js')) }}"></script>
    @include('layouts.partials.scriptDT')
@endsection
@section('main-content')
	<div class="container-fluid spark-screen">
    <div class="row">
      <div class="col-md-16 col-md-offset-0">
        <!-- /.box -->
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Lista de personal</h3>
            {{-- <a href="personal/create" class="btn btn-primary" style="float: right;">Crear</a> --}}
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="PersonalsTable" class="table table-compact table-bordered table-striped">
              <thead>
                <tr>
                  <th>Doctype</th>
                  <th>Documento</th>
                  <th>Nombre</th>
                  <th>Correo</th>
                  <th>Telefono</th>
                </tr>
              </thead>
              <tbody  hidden onload="renderTable()" id="readyTable">
                {{-- <h1 id="loadingTable">LOADING...</h1> --}}
                <div class="fingerprint-spinner" id="loadingTable">
                  <div class="spinner-ring"><b style="font-size: 1.8rem;">L</b></div>
                  <div class="spinner-ring"><b style="font-size: 1.8rem;">o</b></div>
                  <div class="spinner-ring"><b style="font-size: 1.8rem;">a</b></div>
                  <div class="spinner-ring"><b style="font-size: 1.8rem;">d</b></div>
                  <div class="spinner-ring"><b style="font-size: 1.8rem;">i</b></div>
                  <div class="spinner-ring"><b style="font-size: 1.8rem;">n</b></div>
                  <div class="spinner-ring"><b style="font-size: 1.8rem;">g</b></div>
                  <div class="spinner-ring"><b style="font-size: 1.8rem;">.</b></div>
                  <div class="spinner-ring"><b style="font-size: 1.8rem;">.</b></div>
                </div>
                @foreach($Personals as $Personal)
                <tr>
                  <td>{{$Personal->PersDocType}}</td>
                  <td>{{$Personal->PersDocNumber}}</td>
                  <td>{{$Personal->PersFirstName." ".$Personal->PersSecondName." ".$Personal->PersLastName}}</td>
                  <td>{{$Personal->PersEmail}}</td>
                  <td>{{$Personal->PersCellphone}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    </div>
  </div>
@endsection
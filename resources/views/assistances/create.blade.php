@extends('layouts.app')

@section('htmlheader_title','Asistencia')

@section('contentheader_title', 'Asistencia')

@section('main-content')
  <div class="container-fluid spark-screen">
    <div class="row">
      <div class="col-md-16 col-md-offset-0">
        <!-- /.box -->
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Asistencia del personal</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="Vigilante" class="table table-compact table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Documento</th>
                  <th>Entrada</th>
                  <th>Salida</th>
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
                   @foreach($personal as $persona)
                      <?php $Llegada = 0; $Salida = 1;?>
                      @foreach($Asistencias as $Asistencia)
                         @if($persona->ID_Pers == $Asistencia->FK_AsisPers)
                            <?php $Llegada = 1; $id=$Asistencia->ID_Asis;?>
                            @if($Asistencia->AsisSalida === null)
                              <?php $Salida = 0; $Llegada = 1;?>
                            @else
                              <?php $Salida = 1; $Llegada = 1;?>
                            @endif
                         @endif
                      @endforeach
                      @if($Llegada == 1 AND $Salida == 1)
                      @else
                        @if($Llegada == 0 AND $Salida == 1)
                            <tr>
                              <td>{{$persona->PersFirstName." ".$persona->PersLastName}}</td>
                              <td>{{$persona->PersDocNumber}}</td>
                              <td>
                                <form id="readyform" action="/asistencia" method="POST">
                                  @csrf
                                  <input type="hidden"  value="{{$persona->ID_Pers}}" name='AsisPers'>
                                  <input type='submit' id='readyform' class='btn btn-block btn-success' value='Llego'>
                                </form>
                              </td>
                              <td>
                                <input type='submit' id='readyform' class='btn btn-block btn-success disabled' value='Salio'>
                              </td>
                            </tr>
                        @elseif($Llegada == 1 AND $Salida == 0)
                            <tr>
                              <td>{{$persona->PersFirstName." ".$persona->PersLastName}}</td>
                              <td>{{$persona->PersDocNumber}}</td>
                              <td>
                                <input type='submit' id='readyform' class='btn btn-block btn-success disabled' value='Llego'>
                              </td>
                              <td>
                                <form id="readyform" action="/asistencia/{{$id}}" method="POST">
                                  @method('PUT')
                                  @csrf
                                  <input type="hidden"  value="{{$id}}" name='AsisPers'>
                                  <input type='submit' id='readyform' class='btn btn-block btn-success' value='Salio'>
                                </form>
                              </td>
                            </tr>
                        @endif
                      @endif
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
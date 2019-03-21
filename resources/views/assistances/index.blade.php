@extends('layouts.app')

@section('htmlheader_title','Asistencia')

@section('contentheader_title', 'Asistencia')
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
            <h3 class="box-title">Asistencia del personal</h3>
            @if (Auth::user()->UsRol == "Vigilante")
              <a href="asistencia/create" class="btn btn-primary" style="float: right;">Supervisar</a>
            @endif
          </div>
          <!-- /.box-header -->
          @if (Auth::user()->UsRol !== "Programador")
          <div class="box-body">
              <table id="AssistancesTable2" class="table table-compact table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Fecha</th>
                    <th>Hora Llegada</th>
                    <th>Trabajando</th>
                    <th>Hora Salida</th>
                    <th>Horas Trabajdas</th>
                  </tr>
                </thead>
                <tbody  hidden onload="renderTable()" id="readyTable">
                  {{-- <h1 id="loadingTable">LOADING...</h1> --}}
                  <div class="fingerprint-spinner" id="loadingTable">
                    <div class="spinner-ring"><b style="font-size: 1.8rem;"></b></div>
                    <div class="spinner-ring"><b style="font-size: 1.8rem;"></b></div>
                    <div class="spinner-ring"><b style="font-size: 1.8rem;"></b></div>
                    <div class="spinner-ring"><b style="font-size: 1.8rem;"></b></div>
                    <div class="spinner-ring"><b style="font-size: 1.8rem;"></b></div>
                    <div class="spinner-ring"><b style="font-size: 1.8rem;"></b></div>
                    <div class="spinner-ring"><b style="font-size: 1.8rem;"></b></div>
                    <div class="spinner-ring"><b style="font-size: 1.8rem;"></b></div>
                    <div class="spinner-ring"><b style="font-size: 1.8rem;"></b></div>
                  </div>
                    @foreach($Asistencias as $Asistencia)
                    <tr>
                      <td>{{$Asistencia->PersFirstName." ".$Asistencia->PersLastName}}</td>
                      <td>{{$Asistencia->AsisFecha}}</td>
                      <td>{{date('h:i a',strtotime($Asistencia->AsisLlegada))}}</td>
                      @if($Asistencia->AsisStatus == 0)
                        <td>No</td>
                      @else
                        <td>Si</td>
                      @endif
                      @if($Asistencia->AsisSalida)
                        <td>{{date('h:i a',strtotime($Asistencia->AsisSalida))}}</td>
                      @else
                        <td></td>
                      @endif()
                      <td><?php
                            $horas = 0;
                            $minutos = $Asistencia->AsisTrabajadas;
                            while($minutos >= 60){
                                $horas += 1; 
                                $minutos -= 60;
                            }
                            echo $horas." Horas : ".$minutos." Min";
                          ?>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
          </div>
          @endif
          @if (Auth::user()->UsRol == "Programador")
          <div class="box-body">
              <table id="AssistancesTable1" class="table table-compact table-bordered table-striped">
                <thead>
                  <tr>
                      <th>Nombre</th>
                      <th>Fecha</th>
                      <th>Hora Llegada</th>
                      <th>Trabajando</th>
                      <th>Hora Salida</th>
                      <th>Horas Trabajdas</th>
                      <th>Editar</th>
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
                    @foreach($Asistencias as $Asistencia)
                    <tr>
                      <td>{{$Asistencia->PersFirstName." ".$Asistencia->PersLastName}}</td>
                      <td>{{$Asistencia->AsisFecha}}</td>
                      <td>{{date('h:i a',strtotime($Asistencia->AsisLlegada))}}</td>
                      @if($Asistencia->AsisStatus == 0)
                        <td>No</td>
                      @else
                        <td>Si</td>
                      @endif
                      @if($Asistencia->AsisSalida)
                        <td>{{date('h:i a',strtotime($Asistencia->AsisSalida))}}</td>
                      @else
                        <td></td>
                      @endif()
                      <td><?php
                            $horas = 0;
                            $minutos = $Asistencia->AsisTrabajadas;
                            while($minutos >= 60){
                                $horas += 1; 
                                $minutos -= 60;
                            }
                            echo $horas." Horas : ".$minutos." Min";
                          ?>
                      </td>
                      <td>{{$Asistencia->ID_Asis}}</td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
          </div>
          @endif
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    </div>
  </div>
@endsection

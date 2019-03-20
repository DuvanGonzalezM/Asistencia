@extends('layouts.app')

@section('htmlheader_title','Asistencia')
@section('newScript')
  <script src="{{ url (mix('/js/webcodecam.js')) }}"></script>
  <script type="text/javascript">
      var arg = {
          resultFunction: function(result) {
            document.getElementById("miEnlace").click();
            var micapa = document.getElementById('spanModal');
            var label = document.getElementById('divModal');
            var form = document.getElementById('divModal');
            var id_pers = 0;
            @foreach($personal as $persona)
                if({{$persona->PersDocNumber}} == result.code){
                  id_pers = {{$persona->ID_Pers}};
                  var nom_pers = "{{$persona->PersFirstName}}";
                  var llego = 0;
                  var salio = 1;
                }
            @endforeach
            if (id_pers === 0) {
                id_pers = "La persona no se encuentra en la base de datos";
                micapa.innerHTML= '<p>'+id_pers+'</p>';
                setTimeout ('document.getElementById("close").click();',3000);
            }
            else{
              @foreach($Asistencias as $Asistencia)
                if ({{$Asistencia->FK_AsisPers}} === id_pers) {
                    @if($Asistencia->AsisFecha === date('Y-m-d'))
                        @if($Asistencia->AsisSalida == null)
                            <?php 
                              $intervaloL = now()->diffInMinutes($Asistencia->AsisLlegada);
                            ?>
                            @if($intervaloL >= 60)
                              llego = 1;
                              salio = 0;
                              var salida = {{$Asistencia->ID_Asis}};
                            @else
                              llego = 0;
                              salio = 0;
                            @endif
                        @else
                            llego = 1;
                            salio = 1;
                        @endif
                    @else
                        @if($Asistencia->AsisSalida == null)
                          llego = 1;
                          salio = 0;
                          var salida = {{$Asistencia->ID_Asis}};
                        @else
                            <?php
                              $intervaloS = now()->diffInMinutes($Asistencia->AsisSalida);
                            ?>
                            @if($intervaloS <= 60)
                              llego = 1;
                              salio = 1;
                            @else
                              llego = 0;
                              salio = 1;
                            @endif
                        @endif
                    @endif
                }
              @endforeach
              if(llego == 0 && salio == 1){
                  micapa.innerHTML= '<p>Ingresa <b>'+nom_pers+'</b> con el documento: <b>'+result.code+'</b></p>';
                  document.getElementById("Llegada").value = id_pers;
                  label.innerHTML= '<label for="Llegada" class="btn btn-success" id="label1">Confirmar</label>';
                  setTimeout ('document.getElementById("label1").click();',3000);
              }
              else if(llego == 1 && salio== 0){
                  micapa.innerHTML= '<p>Se retira <b>'+nom_pers+'</b> con el documento: <b>'+result.code+'</b></p>';
                  label.innerHTML= '<label for="Salida" class="btn btn-success" id="label1">Confirmar</label>';
                  document.getElementById('formulario2').action = '/asistencia/'+salida;
                  setTimeout ('document.getElementById("label1").click();',3000);
              }
              else if(llego == 0 && salio== 0){
                  id_pers = "Usted ya ha marcado su ingreso";
                  micapa.innerHTML= '<p>'+id_pers+'</p>';
                  setTimeout ('document.getElementById("close").click();',3000);
              }
              else if(llego == 1 && salio== 1){
                  id_pers = "Usted ya ha marcado su salida";
                  micapa.innerHTML= '<p>'+id_pers+'</p>';
                  setTimeout ('document.getElementById("close").click();',3000);
              }
              else{
                 micapa.innerHTML= '<p>Usted ya ha marcado su salida</p>';
                 setTimeout ('document.getElementById("close").click();',3000);
              }
            }
          }
      };
      new WebCodeCamJS("canvas").init(arg).play();
  </script>
@endsection
@section('contentheader_title', 'Asistencia')
@section('main-content')
{{--  Modal --}}
    <div class="modal modal-default fade in" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close"><span aria-hidden="true">&times;</span></button>
            <div style="font-size: 5em; color: #3c8dbc; text-align: center; margin: auto;">
              <i class="fa fa-users"></i>
              <span style="font-size: 0.3em; color: black;" id="spanModal"></span>
            </div> 
          </div>
          <div class="modal-footer" id="divModal">
          </div>
        </div>
      </div>
    </div>
{{-- END Modal --}}
  <center>
    <h3>Ingreso/Salida del personal</h3>
    <canvas id="QrScann"></canvas>
    <a href="#" data-toggle='modal' data-target='#myModal' id="miEnlace" style="display: none;">enlace</a>
  </center>
  <form action="/asistencia" method="POST" id="formulario1">
    @csrf
    <input type="submit" name="Llegada" id="Llegada" style="display: none;">
  </form>
  <form action="" method="POST" id="formulario2">
    @method("PUT")
    @csrf
    <input type="submit" name="Salida" id="Salida" style="display: none;" value ="">
  </form>
@endsection
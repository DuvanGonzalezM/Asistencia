<div class=" requirements-component form-group" required>
	<label class="control-label col-md-3 col-sm-3 col-xs-12"><h3>Externos</h3></label>
	<div class="col-md-9 col-sm-9 col-xs-12">
    @if ($user->UsRol=="")
    <div class="">
      <label>
        <input checked class="" type="radio" name="UsRol" value=""/>Sin Rol Asignado
      </label>
    </div>
    @else
      <div class="">
        <label>
        </label>
      </div>
    @endif
    {{-- Swicht Usuario --}}
    @if ($user->UsRol=="Usuario")
      <div class="">
        <label>
          <input checked class="testswitch" type="radio" name="UsRol" value="Usuario"/> Usuario general
        </label>
      </div>
    @else
      <div class="">
        <label>
          <input class="testswitch" type="radio" name="UsRol" value="Usuario"/> Usuario general
        </label>
      </div>
    @endif
    {{-- Swicht Cliente --}}
    @if ($user->UsRol=="Cliente")
      <div class="">
        <label>
          <input checked class="testswitch" type="radio" name="UsRol" value="Cliente"/> Cliente registrado
        </label>
      </div>
    @else
      <div class="">
        <label>
          <input class="testswitch" type="radio" name="UsRol" value="Cliente"/> Cliente registrado
        </label>
      </div>
    @endif
		{{-- Swicht Generador --}}
    @if ($user->UsRol=="Generador")
      <div class="">
        <label>
          <input checked class="testswitch" type="radio" name="UsRol" value="Generador"/> Generador de residuos
        </label>
      </div>
    @else
      <div class="">
        <label>
          <input class="testswitch" type="radio" name="UsRol" value="Generador"/> Generador de residuos
        </label>
      </div>
    @endif

    {{-- Swicht Auditor --}}
    @if ($user->UsRol=="Auditor")
      <div class="">
        <label>
          <input checked class="testswitch" type="radio" name="UsRol" value="Auditor"/> Auditor Externo
        </label>
      </div>
    @else
      <div class="">
        <label>
          <input class="testswitch" type="radio" name="UsRol" value="Auditor"/> Auditor Externo
        </label>
      </div>
    @endif

	</div>
  <label class="control-label col-md-3 col-sm-3 col-xs-12"><h3>Internos</h3></label>
  <div class="col-md-9 col-sm-9 col-xs-12">


    {{-- Swicht JefeLogistica --}}
    @if ($user->UsRol=="JefeLogistica")
      <div class="">
        <label>
          <input checked class="testswitch" type="radio" name="UsRol" value="JefeLogistica"/> Jefe de Logistica
        </label>
      </div>
    @else
      <div class="">
        <label>
          <input class="testswitch" type="radio" name="UsRol" value="JefeLogistica"/> Jefe de Logistica
        </label>
      </div>
    @endif

    {{-- Swicht AuxiliarLogistica --}}
    @if ($user->UsRol=="AuxiliarLogistica")
      <div class="">
        <label>
          <input checked class="testswitch" type="radio" name="UsRol" value="AuxiliarLogistica"/> Auxiliar de Logistica
        </label>
      </div>
    @else
      <div class="">
        <label>
          <input class="testswitch" type="radio" name="UsRol" value="AuxiliarLogistica"/> Auxiliar de Logistica
        </label>
      </div>
    @endif

    {{-- Swicht AsistenteLogistica --}}
    @if ($user->UsRol=="AsistenteLogistica")
      <div class="">
        <label>
          <input checked class="testswitch" type="radio" name="UsRol" value="AsistenteLogistica"/> Asistente de Logistica
        </label>
      </div>
    @else
      <div class="">
        <label>
          <input class="testswitch" type="radio" name="UsRol" value="AsistenteLogistica"/> Asistente de Logistica
        </label>
      </div>
    @endif

    {{-- Swicht JefeOperacion --}}
    @if ($user->UsRol=="JefeOperacion")
      <div class="">
        <label>
          <input checked class="testswitch" type="radio" name="UsRol" value="JefeOperacion"/> Jefe de Operaciones
        </label>
      </div>
    @else
      <div class="">
        <label>
          <input class="testswitch" type="radio" name="UsRol" value="JefeOperacion"/> Jefe de Operaciones
        </label>
      </div>
    @endif

    {{-- Swicht SupervisorTurno --}}
    @if ($user->UsRol=="SupervisorTurno")
      <div class="">
        <label>
          <input checked class="testswitch" type="radio" name="UsRol" value="SupervisorTurno"/> Supervisor de Turno
        </label>
      </div>
    @else
      <div class="">
        <label>
          <input class="testswitch" type="radio" name="UsRol" value="SupervisorTurno"/> Supervisor de Turno
        </label>
      </div>
    @endif

    {{-- Swicht EncargadoAlmacen --}}
    @if ($user->UsRol=="EncargadoAlmacen")
      <div class="">
        <label>
          <input checked class="testswitch" type="radio" name="UsRol" value="EncargadoAlmacen"/> Encargado de Almacen
        </label>
      </div>
    @else
      <div class="">
        <label>
          <input class="testswitch" type="radio" name="UsRol" value="EncargadoAlmacen"/> Encargado de Almacen
        </label>
      </div>
    @endif

    {{-- Swicht EncargadoHorno --}}
    @if ($user->UsRol=="EncargadoHorno")
      <div class="">
        <label>
          <input checked class="testswitch" type="radio" name="UsRol" value="EncargadoHorno"/> Encargado de Horno
        </label>
      </div>
    @else
      <div class="">
        <label>
          <input class="testswitch" type="radio" name="UsRol" value="EncargadoHorno"/> Encargado de Horno
        </label>
      </div>
    @endif


    {{-- Swicht Tesoreria --}}
    @if ($user->UsRol=="Tesoreria")
      <div class="">
        <label>
          <input checked class="testswitch" type="radio" name="UsRol" value="Tesoreria"/> Tesoreria
        </label>
      </div>
    @else
      <div class="">
        <label>
          <input class="testswitch" type="radio" name="UsRol" value="Tesoreria"/> Tesoreria
        </label>
      </div>
    @endif

    {{-- Swicht AdminCuenta --}}
    @if ($user->UsRol=="AdminCuenta")
      <div class="">
        <label>
          <input checked class="testswitch" type="radio" name="UsRol" value="AdminCuenta"/> Administrador de cuenta
        </label>
      </div>
    @else
      <div class="">
        <label>
          <input class="testswitch" type="radio" name="UsRol" value="AdminCuenta"/> Administrador de cuenta
        </label>
      </div>
    @endif
    {{-- validacion de permisos para ver swicht de los siguientes roles--}}
    @if (Auth::user()->UsRol == "Programador"||Auth::user()->UsRol == "admin")
      {{-- Swicht AdminComercial --}}
      @if ($user->UsRol=="AdminComercial")
        <div class="">
          <label>
            <input checked class="testswitch" type="radio" name="UsRol" value="AdminComercial"/> Director Comercial
          </label>
        </div>
      @else
        <div class="">
          <label>
            <input class="testswitch" type="radio" name="UsRol" value="AdminComercial"/> Director Comercial
          </label>
        </div>
      @endif

      {{-- Swicht AdminPlanta --}}
      @if ($user->UsRol=="admin")
        <div class="">
          <label>
            <input checked class="testswitch" type="radio" name="UsRol" value="admin"/> Director de Planta
          </label>
        </div>
      @else
        <div class="">
          <label>
            <input class="testswitch" type="radio" name="UsRol" value="admin"/> Director de Planta
          </label>
        </div>
      @endif

      {{-- Swicht Programador --}}
      @if ($user->UsRol=="Programador")
        <div class="">
          <label>
            <input checked class="testswitch" type="radio" name="UsRol" value="Programador"/> Programador de Software
          </label>
        </div>
      @else
        <div class="">
          <label>
            <input class="testswitch" type="radio" name="UsRol" value="Programador"/> Programador de Software
          </label>
        </div>
      @endif
    @endif
  </div>
</div>
{{-- <script>
document.addEventListener("DOMContentLoaded", function(){
  var value = '{{$user->UsRol}}';
  var allInputs = document.getElementsByName('UsRol');
  var results = [];
  for(var x=1;x<allInputs.length;x++){
    if(allInputs[x].value == value){
      allInputs[x].contents().unwrap().wrap('<input checked class="testswitch" type="radio" name="UsRol" value="'+value+'"/>');
      results.push(allInputs[x]);
      console.log(results);
    }
        
// return results;
    
  };
});  
// window.onload=getInputsByValue;
</script> --}}
                    
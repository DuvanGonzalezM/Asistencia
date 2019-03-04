<div class=" requirements-component form-group">


	<label class="control-label col-md-3 col-sm-3 col-xs-12">
		<h3>
			Status de la cuenta
		</h3>
	</label>

	

	<div class="col-md-9 col-sm-9 col-xs-12">
		
		{{-- Swicht Activo --}}
	    @if ($user->UsStatus=="Activo")
	      <div class="">
	        <label>
	          <input checked class="testswitch" type="radio" name="UsStatus" value="Activo"/> Activo
	        </label>
	      </div>
	    @else
	      <div class="">
				<label>
					<input class="testswitch" type="radio" name="UsStatus" value="Activo"/> Activo
				</label>
			</div>
	    @endif

	    {{-- Swicht Suspendido --}}
	    @if ($user->UsStatus=="Suspendido")
	      <div class="">
	        <label>
	          <input checked class="testswitch" type="radio" name="UsStatus" value="Suspendido"/> Suspendido
	        </label>
	      </div>
	    @else
	      <div class="">
				<label>
					<input class="testswitch" type="radio" name="UsStatus" value="Suspendido"/> Suspendido
				</label>
			</div>
	    @endif

	    {{-- Swicht EnProceso --}}
	    @if ($user->UsStatus=="EnProceso"||$user->UsStatus=="")
	      <div class="">
	        <label>
	          <input checked class="testswitch" type="radio" name="UsStatus" value="EnProceso"/> EnProceso
	        </label>
	      </div>
	    @else
	      <div class="">
				<label>
					<input class="testswitch" type="radio" name="UsStatus" value="EnProceso"/> EnProceso
				</label>
			</div>
	    @endif

	    {{-- Swicht Bloqueado --}}
	    @if ($user->UsStatus=="Bloqueado")
	      <div class="">
	        <label>
	          <input checked class="testswitch" type="radio" name="UsStatus" value="Bloqueado"/> Bloqueado
	        </label>
	      </div>
	    @else
	      <div class="">
				<label>
					<input class="testswitch" type="radio" name="UsStatus" value="Bloqueado"/> Bloqueado
				</label>
			</div>
	    @endif

	    {{-- Swicht Eliminado --}}
	    @if ($user->UsStatus=="Eliminado")
	      <div class="">
	        <label>
	          <input checked class="testswitch" type="radio" name="UsStatus" value="Eliminado"/> Eliminado
	        </label>
	      </div>
	    @else
	      <div class="">
				<label>
					<input class="testswitch" type="radio" name="UsStatus" value="Eliminado"/> Eliminado
				</label>
			</div>
	    @endif

	    {{-- Swicht Suspendido --}}
	    @if ($user->UsStatus=="Temporal")
	      <div class="">
	        <label>
	          <input checked class="testswitch" type="radio" name="UsStatus" value="Temporal"/> Temporal
	        </label>
	      </div>
	    @else
	      <div class="">
				<label>
					<input class="testswitch" type="radio" name="UsStatus" value="Temporal"/> Temporal
				</label>
			</div>
	    @endif
</div>
                    
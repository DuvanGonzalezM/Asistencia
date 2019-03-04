<template>
	<div class=" requirements-component form-group">
	  <label class="control-label col-md-3 col-sm-3 col-xs-12">Fotos</label>
	  <div class="col-md-9 col-sm-9 col-xs-12">
	    <div class="">
	      <label>
	        <input type="checkbox" class="testswitch"/> Cargue
	      </label>
	    </div>
	    <div class="">
	      <label>
	        <input type="checkbox" class="testswitch"/> Descargue
	      </label>
	    </div>
	    <div class="">
	      <label>
	        <input type="checkbox" class="testswitch"/> Pesaje
	      </label>
	    </div>
	    <div class="">
	      <label>
	        <input type="checkbox" class="testswitch"/> Reempacado
	      </label>
	    </div>
	    <div class="">
	      <label>
	        <input type="checkbox" class="testswitch"/> Mezclado
	      </label>
	    </div>
	    <div class="">
	      <label>
	        <input type="checkbox" class="testswitch"/> Destruccion
	      </label>
	    </div>
	  </div>
	  <label class="control-label col-md-3 col-sm-3 col-xs-12">Videos</label>
	  <div class="col-md-9 col-sm-9 col-xs-12">
	    <div class="">
	      <label>
	        <input type="checkbox" class="testswitch"/> Cargue
	      </label>
	    </div>
	    <div class="">
	      <label>
	        <input type="checkbox" class="testswitch"/> Descargue
	      </label>
	    </div>
	    <div class="">
	      <label>
	        <input type="checkbox" class="testswitch"/> Pesaje
	      </label>
	    </div>
	    <div class="">
	      <label>
	        <input type="checkbox" class="testswitch"/> Reempacado
	      </label>
	    </div>
	    <div class="">
	      <label>
	        <input type="checkbox" class="testswitch"/> Mezclado
	      </label>
	    </div>
	    <div class="">
	      <label>
	        <input type="checkbox" class="testswitch"/> Destruccion
	      </label>
	    </div>
	  </div>
	  <label class="control-label col-md-3 col-sm-3 col-xs-12">Adicionales</label>
	  <div class="col-md-9 col-sm-9 col-xs-12">
	    <div class="">
	      <label>
	        <input type="checkbox" class="testswitch"/> Auditoria
	      </label>
	    </div>
	    <div>
	    	<label>
	    		<select>
	    			tipo de auditoria
	    			<option>Auditoria Presencial</option>
					<option>Auditoria virtual</option>
	    		</select>
	    	</label>
	    </div>
	    <div class="">
	      <label>
	        <input type="checkbox" class="testswitch"/> Devolucion de elementos
	      </label>
	    </div>
	    <div class="">
	      <label>
	        <input type="text" maxlength="64" class=""/> tipo de elementos
	      </label>
	    </div>
	    <div class="">
	      <label>
	        <input type="number" class="" min="1" pattern="^[0-9]+" /> cantidad de elementos
	      </label>
	    </div>
	    <div class="">
	      <label>
	        <input type="checkbox" class="testswitch"/> Datos del Personal 
	      </label>
	    </div>
	    <div class="">
	      <label>
	        <input type="checkbox" class="testswitch"/> Planillas
	      </label>
	    </div>
	    <div class="">
	      <label>
	        <input type="checkbox" class="testswitch"/> Alistamiento de residuos
	      </label>
	    </div>
	    <div class="">
	      <label>
	        <input type="checkbox" class="testswitch"/> personal con Capacitacion
	      </label>
	    </div>
	    <div class="">
	      <label>
	        <input type="checkbox" class="testswitch"/> Bascula
	      </label>
	    </div>
	    <div class="">
	      <label>
	        <input type="checkbox" class="testswitch"/> Mas Personal de cargue/descargue
	      </label>
	    </div>
	    <div class="">
	      <label>
	        <input type="checkbox" class="testswitch"/> vehiculo con Plataforma
	      </label>
	    </div>
	    <div class="">
	      <label>
	        <input type="checkbox" class="testswitch"/> Certificacion Especial
	      </label>
	    </div>
	  </div>
	</div>
</template>

<script type="text/javascript">
	export default {
		mounted() {
		    console.log('RequerimientosXresiduo Component mounted.')
		}
	}
</script>
<div class="form-group">
	<label>Nombre</label>
	<input name="name" value="{{$user->name}}" type="text" class="form-control" placeholder="Nombre de usuario" required>
</div>
<div class="form-group">
	<label>Email</label>
	<input name="email" value="{{$user->email}}" type="text" class="form-control" placeholder="Correo electornico de usuario" required>
</div>
{{-- <div class="form-group">
	<label >Rol</label>
	<select name="UsRol" value="{{$user->UsRolDesc}}" class="form-control" placeholder="rol que desempeña en el proceso">
		<optgroup label="Externo">
			<option>Usuario general</option>
			<option>Cliente registrado</option>
			<option>Generador de residuos</option>
			<option>Auditor Externo</option>
		</optgroup>
		<optgroup label="Interno">
			<option>Jefe de Logistica</option>
			<option>Auxiliar de Logistica</option>
			<option>Asistente de Logistica</option>
			<option>Jefe de Operaciones</option>
			<option>Supervisor de Turno</option>
			<option>Encargado de Almacen</option>
			<option>Encargado de Horno</option>
			<option>Programador de Software</option>
			<option>Tesoreria</option>
			<option>Administrador de cuenta</option>
			<option>Director Comercial</option>
			<option>Director de Planta</option>
		</optgroup>
	</select>
</div> --}}
<div class="form-group">
	<label>Fecha de registro</label>
	<input name="created_at" value="{{$user->created_at}}" type="text" class="form-control" disabled>
</div>
<div class="form-group">
	<label>Ultima Actualizacion</label>
	<input name="updated_at" value="{{$user->updated_at}}" type="text" class="form-control" disabled>
</div>
{{-- <div class="form-group">
	<label>Tipo de usuario</label>
	<select name="UsType" value="{{$user->UsUsType}}" class="form-control" placeholder="usuario interno/externo de Prosarc S.A.">
		<option>Interno</option>
		<option>Externo</option>
	</select>
</div> --}}
<div class="form-group">
	<label>Avatar</label>
	<input name="UsAvatar" value="{{$user->UsAvatar}}" type="file" class="form-control">
</div>
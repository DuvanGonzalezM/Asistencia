@extends('layouts.app')
@section('htmlheader_title')
Asistencia
@endsection
@section('contentheader_title')
Modificar Asistencia
@endsection
@section('main-content')
<div class="container-fluid spark-screen">
	<div class="row">
		<div class="col-md-16 col-md-offset-0">
			<!-- Default box -->
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Datos</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
						<i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
						<i class="fa fa-times"></i></button>
					</div>
				</div>
				<div class="row">
					<!-- left column -->
					<div class="col-md-12">
						<!-- general form elements -->
						<div class="box box-primary">
							<!-- /.box-header -->
							<!-- form start -->
							
						@foreach($Asistencias as $Asistencia)
							<form role="form" action="/asistencia/{{$Asistencia->ID_Asis}}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
								<div class="col-md-6">
									<label for="asistenciainputext2">Hora de Llegada</label>
                                <input type="text" class="form-control" id="asistenciainputext2" value="{{$Asistencia->AsisLlegada}}" name="llegada">
								</div>
								<div class="col-md-6">
									<label for="asistenciainputext3">Hora Salida </label>
									<input type="text" class="form-control" id="asistenciainputext3" value="{{$Asistencia->AsisSalida}}" name="salida">	</div>
								<div class="container-fluid spark-screen">
									<div class="row">			
										<div class="box-footer" style="float:right; margin-right:5%">
											<button type="submit" class="btn btn-primary">Actualizar</button>
										</div>	
									</div>
								</div>
							</form>
						@endforeach
						</div>						
					</div>
				</div>
			</div>
			<!--/.col (right) -->
		</div>
		<!-- /.box-body -->
	</div>
	<!-- /.box -->
</div>
@endsection
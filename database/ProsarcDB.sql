drop DATABASE Prosarcdb;
	create DATABASE Prosarcdb;
	use Prosarcdb;
	-- Create table Country(
	-- 	ID_Country int auto_increment unique,
	-- 	CountryName varchar(64),
	-- 	primary key(ID_Country)
	-- )
	-- 	COLLATE='utf8mb4_unicode_ci'
	-- 	ENGINE=InnoDB;

	create table Departamento(
		ID_Depart int auto_increment unique,
		DepartName varchar(64),
		DepartRegionName varchar(64),
		DepartCapitalName varchar(64),
		FK_DepartCountry int,
		primary key(ID_Depart),
		foreign key (FK_DepartCountry) references Country(ID_Country) ON UPDATE CASCADE
	)
		COLLATE='utf8mb4_unicode_ci'
		ENGINE=InnoDB;

	-- create table Ciudad(
	-- 	ID_City int auto_increment unique,
	-- 	CityName varchar(64),
	-- 	FK_CitiDepart int,
	-- 	primary key(ID_City),
	-- 	foreign key (FK_CitiDepart) references Departamento(ID_Depart) ON UPDATE CASCADE
	-- )
	-- 	COLLATE='utf8mb4_unicode_ci'
	-- 	ENGINE=InnoDB;

	create table Municipio(
		ID_Mun int auto_increment unique,
		MunName varchar(64),
		FK_MunCity int,
		primary key(ID_Mun),
		foreign key (FK_MunCity) references Departamento(ID_Depart) ON UPDATE CASCADE
	)
		COLLATE='utf8mb4_unicode_ci'
		ENGINE=InnoDB;

	/*tabla de clientes proveedores etc*/
	create table Cliente (
		ID_Cli int auto_increment unique,
		CliNit bigint, /*nit*/
		CliName varchar(255), /*razon social del cliente*/
		CliShortname varchar(32), /*nombre corto del cliente*/
		CliCode varchar(32), /*codigo del cliente ejem: "PL 1 AND"-.S" */
		CliType varchar(32),/*tipo de empresa: organico; biologico; industrial; medicamentos; otros ETC...*/
		CliCategoria varchar(32), /*cliente, generador, transportador, Proveedor etc..*/
		CliAuditable boolean, /*¿cliente auditable?*/
		created_at TIMESTAMP NULL DEFAULT NULL, /*fecha de creacion*/
		updated_at TIMESTAMP NULL DEFAULT NULL,/*fecha de actualizacion*/
		primary key (ID_Cli)
	)
		COLLATE='utf8mb4_unicode_ci'
		ENGINE=InnoDB;

	/*sedes de cada cliente*/
	create table Sede(
		ID_Sede int auto_increment unique,
		SedeName varchar(128), /*nombre de la sede*/
		SedeAddress varchar(255), /*direccion*/
		SedePhone1 varchar(32), /*telefono fijo 1*/
		SedeExt1 int(8),
		SedePhone2 varchar(32), /*telefono fijo 2*/
		SedeExt2 int(8),
		SedeEmail varchar(128),/*correo electronico*/
		SedeCelular varchar(32),/*telefono celular*/
		created_at TIMESTAMP NULL DEFAULT NULL, /*fecha de creacion*/
		updated_at TIMESTAMP NULL DEFAULT NULL,/*fecha de actualizacion*/
		FK_SedeCli int, /*foranea de la tabla cliente*/
		FK_SedeMun int, /*foranea de la tabla municipio*/
		primary key (ID_Sede),
		foreign key (FK_SedeCli) references Clientes(ID_Cli) ON UPDATE CASCADE,
		foreign key (FK_SedeMun) references Municipio(ID_Mun) ON UPDATE CASCADE
	)
		COLLATE='utf8mb4_unicode_ci'
		ENGINE=InnoDB;

	/*tabla de generadores de cada cliente*/
		create table Generador(
		ID_Gener int auto_increment unique,
		GenerName varchar(255),
		GenerShortname varchar(64),
		GenerCode varchar(32), /*codigo del generador ejem: "PL 1 AND"-.S" */
		GenerType varchar(32),/*tipo de empresa: organico; biologico; industrial; medicamentos; otros ETC...*/
		GenerNit varchar(20), /*nit*/
		GenerAuditable boolean, /*¿cliente requiere tratamientos auditables?*/
		created_at TIMESTAMP NULL DEFAULT NULL, /*fecha de creacion*/
		updated_at TIMESTAMP NULL DEFAULT NULL,/*fecha de actualizacion*/
		FK_GenerCli int, /*foranea de la tabla Sede*/
		primary key (ID_Gener),
		foreign key (FK_GenerCli) references Sede(ID_Sede) ON UPDATE CASCADE
	)
		COLLATE='utf8mb4_unicode_ci'
		ENGINE=InnoDB;

	/*sedes de generadores de residuos*/
	create table GenerSede(
		ID_GSede int auto_increment unique,
		GSedeName varchar(128),
		GSedeAddress varchar(255),
		GSedePhone varchar(32),
		GSedePhoneExt varchar(8),/*numero de extencion*/
		GSedeEmail varchar(128),	
		GSedeCelular varchar(32),
		created_at TIMESTAMP NULL DEFAULT NULL, /*fecha de creacion*/
		updated_at TIMESTAMP NULL DEFAULT NULL,/*fecha de actualizacion*/
		FK_GSedeMun int,
		FK_GSede int, /*foranea de la tabla generador*/
		primary key (ID_GSede),
		foreign key (FK_GSede) references Generador(ID_Gener) ON UPDATE CASCADE,
		foreign key (FK_GSedeMun) references Municipio(ID_Mun) ON UPDATE CASCADE
	)
		COLLATE='utf8mb4_unicode_ci'
		ENGINE=InnoDB;

	/*areas o dependencias de un departamento*/
	create table Area(
		ID_Area int auto_increment unique,
		AreaName varchar(128),
		FK_AreaSede int, /*foranea de la tabla sede*/
		primary key (ID_Area),
		foreign key (FK_AreaSede) references Sede(ID_Sede) ON UPDATE CASCADE
	)
		COLLATE='utf8mb4_unicode_ci'
		ENGINE=InnoDB;

	-- /*oficinas o dependencias de un area*/
	-- create table Oficce(
	-- 	ID_Ofi int auto_increment unique,
	-- 	OfiAddress varchar(255),
	-- 	OfiModule int, /*opcional:numero de modulos de la oficina*/
	-- 	FK_OfiArea int, /*foranea de la tabla Area*/
	-- 	primary key (ID_Ofi),
	-- 	foreign key (FK_OfiArea) references Area(ID_Area) ON UPDATE CASCADE
	-- )
	-- 	COLLATE='utf8mb4_unicode_ci'
	-- 	ENGINE=InnoDB;

	/*tabla de cargos o jerarquias*/
	create table Cargo(
		ID_Carg int auto_increment unique,
		CargName varchar(128),
		CargSalary int, /*salario actual*/
		CargGrade varchar(128), /*grado de instruccion*/
		FK_CargOfi int, /*el cargo corresponde a un area especifica*/
		primary key	(ID_Carg),
		foreign key (FK_CargOfi) references Area(ID_Area) ON UPDATE CASCADE
	)
		COLLATE='utf8mb4_unicode_ci'
		ENGINE=InnoDB;

	/*datos de empleados de prosarc*/
	create table Personal(
		ID_Pers int auto_increment unique,
		PersType boolean, /*interno o externo a Prosarc*/
		PersDocNumber int unique, /*numero de documento*/
		PersFirstName varchar(64),
		PersSecondName varchar(64),
		PersLastName varchar(64),
		PersDocType varchar(32), /*tipo de documento*/
		PersLibreta varchar(32), /*numero de libreta militar*/
		PersPase varchar(32), /*opcional: numero del pase de conduccion...*/
		PersBirthday date,
		PersPhoneNumber varchar(64),/*telefono fijo*/
		PersCellphone varchar(64),/*telefono celular*/
		PersAddress varchar(255),
		PersEPS varchar(255),
		PersARL varchar(255),
		PersBank varchar(128),
		PersBankAccaunt int,
		PersIngreso date, /*fecha de ingreso a Prosarc*/
		PersSalida date, /*fecha de egreso a Prosarc(renuncias, despido)*/
		FK_PersCargo int, /*foranea de la tabla posicion para relacionar el cargo de la persona*/
		primary key (ID_Pers),
		foreign key (FK_PersCargo) references Cargo(ID_Carg) ON UPDATE CASCADE
	)
		COLLATE='utf8mb4_unicode_ci'
		ENGINE=InnoDB;

	/*tabla de las diferentes capacitaciones del personal*/
	Create table Capacitacion(
		ID_Capa int auto_increment unique,
		CapaName varchar(64), /*nombre de la capacitacion*/
		CapaTipo boolean, /*interna o externa*//*internas: ARL EPS PROSARC Externa:Cliente*/
		primary key	(ID_Capa)
	)
		COLLATE='utf8mb4_unicode_ci'
		ENGINE=InnoDB;

	/*tabla para romper la relacion de muchos a muchos de la tabla Capacitacion*/
	Create table CapacitacionPersonal(
		ID_CapPers int auto_increment unique,
		CapaPersDate date, /*fecha de aprovacion*/
		CapaPersExpire date, /*fecha de vencimiento*/
		FK_Sede int,
		FK_Capa int,
		FK_Pers int,
		foreign key (FK_Sede) references Sede(ID_Sede) ON UPDATE CASCADE,
		foreign key (FK_Capa) references Capacitacion(ID_Capa) ON UPDATE CASCADE,
		foreign key (FK_Pers) references Personal(ID_Pers) ON UPDATE CASCADE
	)
		COLLATE='utf8mb4_unicode_ci'
		ENGINE=InnoDB

	/*tabla para registro y consulta de dias festivos (no relacionar)*/
	create table DiasFestivos(
		ID_festivo int auto_increment unique,
		FestivoDate date,
		FestivoType varchar(32),/*Tipo de festipo ejem: Bancario, Nacional, etc...*/
		primary key(ID_festivo)
	)
		COLLATE='utf8mb4_unicode_ci'
		ENGINE=InnoDB;

	/*tabla de horarios programados para cada persona*/
	create table Horario(
		ID_Horario int auto_increment unique,
		HorarioFecha date,
		Horariotipo varchar(32), /*Trabaja, Descanza, Capacitacion, Examen, otro*/
		HorariotipoOther varchar(64), /*observacion si HorarioTipo = otro*/
		HorarioFeriado boolean, /*domingos y lunes festivos marcados como si*/
		HorarioEntrada DATETIME,
		HorarioSalida DATETIME,
		HoraPermisoInicio DATETIME,
		HoraPermisoFin DATETIME,
		FK_HoraPers int, /*foranea de la tabla personas*/
		primary key (ID_Horario),
		foreign key (FK_HoraPers) references Personal(ID_Pers) ON UPDATE CASCADE
	)
		COLLATE='utf8mb4_unicode_ci'
		ENGINE=InnoDB;

		/*Tabla de usuarios con acceso al aplicativo*/
		Create table UsersAsisid INT(10) NOTAsisL AUTO_INCREMENT,
		UsType varchar(64), /*tipo de usuario: comercial, logistica, operaciones, mantenimiento, almacen, direccion, administrador, desarollador, cliente, transporte, SIG(sistema integral de gestion)[andres romero:calidad, documentacion]*/
		name VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
		email VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
		email_verified_at TIMESTAMP NULL DEFAULT NULL, /*fecha de validacion del usuario mediante el correo*/
		password VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci', /*contraseña de acceso al sistema*/
		UsAvatar varchar(255), /*ubicacion de la imagen de perfil de usuario*/
		Usrol varchar(255), /*ubicacion de la imagen de perfil de usuario*/
		UsStatus varchar(16), /*conectado, desconectado*/
		remember_token VARCHAR(100) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci', /*token de validacion para bloqueo de sesiones*/
		created_at TIMESTAMP NULL DEFAULT NULL, /*fecha de creacion*/
		updated_at TIMESTAMP NULL DEFAULT NULL,/*fecha de actualizacion*/
		FK_UsPers int, /*foranea de la tabla personal*/
		primary key (id),
		foreign key (FK_UsPers) references Personal(ID_Pers) ON UPDATE CASCADE,
		UNIQUE INDEX `users_email_unique` (email)
	)
		COLLATE='utf8mb4_unicode_ci'
		ENGINE=InnoDB;

	/*tabla para registro de llegadas y salidas del personal prosarc*/
	create table Asistencia(
		ID_Asis int auto_increment unique,
		AsisLlegada timestamp, /*fecha y hora registrada de llegada*/
		AsisSalida timestamp, /*fecha y hora registrada de salida*/
		AsisNocturnas int, /*cantidad de horas nocturnas laboradas*/
		FK_AsisPers int,
		primary key (ID_Asis),
		foreign key (FK_AsisPers) references Personal(ID_Pers) ON UPDATE CASCADE
	)
		COLLATE='utf8mb4_unicode_ci'
		ENGINE=InnoDB;

	create table Vehiculo(
		ID_Vehic int auto_increment	unique,
		VehicPlaca varchar(16) unique,
		VehicInternExtern boolean,
		VehicTipo varchar(64), /*furgon, mula, sencillo, turbo etc...*/
		VehicCapacidad varchar(64),
		VehicKmActual int, /*km actual de vehiculo*/
		FK_VehiSede int, /*foranea de la tabla sede*/
		primary key (ID_Vehic),
		foreign key (FK_VehiSede) references Sede(ID_Sede) ON UPDATE CASCADE
	)
		COLLATE='utf8mb4_unicode_ci'
		ENGINE=InnoDB;

	create table ProgVehiculo(
		ID_ProgVeh int auto_increment unique,
		ProgVehFecha date, /*fecha de la progamacion*/
		progVehKm int, /*km del vehiculo al inicio del dia*/
		ProgVehTurno boolean, /*tarde o mañana*/
		ProgVehtipo boolean, /*Trabaja o Mantenimiento*/
		ProgVehFeriado boolean, /*domingos y lunes festivos marcados como si*/
		ProgVehEntrada datetime, /*hora de llegada a planta*/
		ProgVehSalida datetime, /*hora de salida de planta*/
		HoraMantenimientoInicio datetime, /*hora de inicio del mantenimiento*/
		HoraMAntenimientoFin datetime, /*hora fin del mantenimiento*/
		FK_ProgVeh int,
		primary key (ID_ProgVeh),
		foreign key (FK_ProgVeh) references Vehiculo(ID_Vehic) ON UPDATE CASCADE
	)
		COLLATE='utf8mb4_unicode_ci'
		ENGINE=InnoDB;

	/*tabla de mantenimiento a los vehiculos de prosarc*/
	create table MantenVehic(
		ID_Mv int auto_increment unique,
		MvKm int, /*km del vehiculo al momento del mantenimiento*/
		MvAceite date, /*fecha del cambio de aceite*/
		MvTecnicoMecanica date, /*fecha de la revision tecnico mecanica*/
		Mvtanqueo date, /*fecha del tanqueo*/
		MvtanqueoCant int, /*cantidad del tanqueo*/
		FK_MvProgram int, /*foranea de la tabla progvehiculo para validar la fecha del mantenimiento*/
		primary key (ID_Mv),
		foreign key (FK_MvProgram) references ProgVehiculo(ID_ProgVeh) ON UPDATE CASCADE	
	)
		COLLATE='utf8mb4_unicode_ci'
		ENGINE=InnoDB;

	/*tabla para registro de activos de la empresa... muebles, herramientas, partes etc...*/
	create table CategoriaAct(
		ID_CatAct int auto_increment unique,
		CatName varchar(128),
		primary key (ID_CatAct)
	)
		COLLATE='utf8mb4_unicode_ci'
		ENGINE=InnoDB;

	create table SubCatAct(
		ID_SubCat int auto_increment unique,
		SubCatName varchar(128),
		FK_SubCat int,
		primary key (ID_SubCat),
		foreign key	(FK_SubCat) references CategoriaAct(ID_CatAct) ON UPDATE CASCADE
	)
		COLLATE='utf8mb4_unicode_ci'
		ENGINE=InnoDB;

	create table Activo(
		ID_Act int auto_increment unique,
		ActName varchar(128),
		ActUnid boolean, /*unidad o peso*/
		ActCant int, /*cantidad inicial registrada*/
		ActSerialProsarc varchar(128),
		ActSerialProveed varchar(128),
		ActModel varchar(64),
		ActTalla varchar(16),
		ActObserv varchar(512),/*campo para anotaciones generales de los cambios en el registro*/
		-- FK_ActPerson int,persona a la que esta asignado el activo (opcional)
		FK_SubCat int, /*forana de la tabla SubCatAct */
		primary key (ID_Act),
		foreign key (FK_ActSub) references SubCatAct(ID_SubCat) ON UPDATE CASCADE
		/*se pasa la relacion a la tabla de movimientos para asignar el activo al personal*/
		-- foreign key (FK_ActPerson) references Personal(ID_Pers) ON UPDATE CASCADE 
	)
		COLLATE='utf8mb4_unicode_ci'
		ENGINE=InnoDB;

	create table MovimientosAct(
		ID_MovAct int auto_increment unique,
		MovTipo varchar(32), /*tipo de movimiento Entrada/Salida*/
		created_at TIMESTAMP NULL DEFAULT NULL, /*fecha de creacion*/
		updated_at TIMESTAMP NULL DEFAULT NULL,/*fecha de actualizacion*/
		FK_MovInv int, /*foranea de la tabla InventarioAct*/
		FK_ActPerson int,/*persona a la que esta asignado el activo (opcional)*/
		primary key (ID_MovAct),
		foreign key (FK_ActPerson) references Personal(ID_Pers) ON UPDATE CASCADE
		foreign key (FK_MovInv) references Activo(ID_Act) ON UPDATE CASCADE
	)
		COLLATE='utf8mb4_unicode_ci'
		ENGINE=InnoDB;

	/*tabla para las ordenes de compra de articulos*/
	Create table OrdenCompra(
		ID_Orden int auto_increment unique,
		OrdenNum int, /*numero de orden*/
		OrdenStatus varchar(32), /*Pendiente, Cotizada, Autorizada, Rechazada, Eliminada*/
		created_at TIMESTAMP NULL DEFAULT NULL, /*fecha de creacion*/
		updated_at TIMESTAMP NULL DEFAULT NULL,/*fecha de actualizacion*/
		OrdenInvoice varchar(32), /*numero de factura*/
		OrdenRecibida boolean, /*si o no?*/
		OrdenPagada boolean, /* si o no?*/
		OrdenTotal int, /*costo de la orden*/
		OrdenAutor boolean, /*autorizada la compra si no puede estar aprobada pero pendiente por autorizar*/
		FK_OrdenCreateBy int, /*usuario que creo la orden de compra*/
		FK_OrdenProg int, /*fecha y vehiculo programado para la busqueda de la orden*/
		primary key	(ID_Orden),
		foreign key (FK_OrdenCreateBy) references Users(id) ON UPDATE CASCADE,
		foreign key (FK_OrdenProg) references ProgVehiculo(ID_ProgVeh) ON UPDATE CASCADE
	)
		COLLATE='utf8mb4_unicode_ci'
		ENGINE=InnoDB;

	/*tabla para registra las cotizaciones de las ordenes de compra aprobadas*/
	create table Cotizacion(
		ID_Cotiz int auto_increment unique,
		CotizNum int, /*numero de cotizacion*/
		CotizStatus varchar(32), /* Aprobada, AprobadaParcial*/
		CotizSubTotal int, /*costo de la cotizacion*/
		created_at TIMESTAMP NULL DEFAULT NULL, /*fecha de creacion*/
		updated_at TIMESTAMP NULL DEFAULT NULL,/*fecha de actualizacion*/
		FK_CotizOrden int, /*numero de orden*/
		FK_CotizSede int, /*numero de proveedor*/
		primary key	(ID_Cotiz),
		foreign key (FK_CotizSede) references Sede(ID_Sede) ON UPDATE CASCADE,
		foreign key (FK_CotizOrden) references OrdenCompra(ID_Orden) ON UPDATE CASCADE
	)
		COLLATE='utf8mb4_unicode_ci'
		ENGINE=InnoDB;

	/*tabla para registrar los articulos cotizados por cada proveedor*/
	create table ArticXprove(
		ID_ArtiProve int auto_increment unique,
		ArtiUnidad boolean, /*articulos en unidades o peso? */
		ArtiCant int, /*kg o unid por articulo*/ 
		ArtiPrecio int, /*precio del articulo ofertado por el proveedor*/
		ArtiCostoUnid int, /*precio por unidad del articulo*/
		ArtiMinimo int, /*cantidad minima de compra*/
		created_at TIMESTAMP NULL DEFAULT NULL, /*fecha de creacion*/
		updated_at TIMESTAMP NULL DEFAULT NULL,/*fecha de actualizacion*/
		FK_ArtiActiv int, /*foranea de la tabla Activos*/
		FK_ArtCotiz int, /*foranea de la tabla cotizacion*/
		FK_AutorizedBy int, /*compra de articulo autorizado por*/
		primary key (ID_ArtiProve), 
		foreign key (FK_ArtiActiv) references Activo(ID_Act) ON UPDATE CASCADE,
		foreign key (FK_ArtCotiz) references Cotizacion(ID_Cotiz) ON UPDATE CASCADE,
		foreign key (FK_AutorizedBy) references Users(id) ON UPDATE CASCADE
	)
		COLLATE='utf8mb4_unicode_ci'
		ENGINE=InnoDB;

	/*tabla para registrar los activos tenologicos de las diferentes oficinas de la empresa*/
	create table InventarioTecnologia(
		ID_Tecn int auto_increment unique,
		TecnBrand varchar(64),
		TecnModel varchar(64),
		TecnSerial varchar(64),
		TecnOs varchar(32),
		TecnRam int,
		TecnScreen varchar(32),
		TecnAccessory1 varchar(64),
		TecnAccessory2 varchar(64),
		created_Tecn TIMESTAMP NULL DEFAULT NULL, /*fecha de creacion*/
		updated_Tecn TIMESTAMP NULL DEFAULT NULL,/*fecha de actualizacion*/
		Tecnobserv varchar(512),/*campo para anotaciones generales de los cambios en el registro*/
		FK_TecnPerson int,/*persona a la que esta asignado el activo*/
		primary key (ID_Tecn),
		foreign key (FK_TecnPerson) references Personal(ID_Pers) ON UPDATE CASCADE
	)
		COLLATE='utf8mb4_unicode_ci'
		ENGINE=InnoDB;

	/*tabla para la declaracion de residuos*/
	create table Declaracion(
		ID_Declar int auto_increment unique,
		created_at TIMESTAMP NULL DEFAULT NULL, /*fecha de creacion*/
		updated_at TIMESTAMP NULL DEFAULT NULL,/*fecha de actualizacion*/
		DeclarApply varchar(16), /*aplicacion: siempre o previo aviso*/
		DeclarTipo varchar(32), /*indutrial, aguas, servicios, hospitalario, cenizas y tierras*/
		DeclarName varchar(255),
		DeclarStatus varchar(16), /*aprobada, negada, pendiente, incompleta*/
		DeclarFrecuencia int,/*cada cuantos dias se recolecta: mensual, quincenal, semanal, por solicitud, N° dias*/
		FK_DeclarSede int,/*foranea de la tabla sede opcional para los clientes que tienen sedes*/
		FK_DeclarGenerSede int, /*foranea de la tabla GenerSede*/
		FK_DeclarCreatedBy int, /*quien crea la declaracion... que al inicio puede ser usuario interno*/
		primary key (ID_Declar),
		foreign key (FK_DeclarSede) references Sede(ID_Sede) ON UPDATE CASCADE,
		foreign key (FK_DeclarGenerSede) references GenerSede(ID_GSede) ON UPDATE CASCADE,
		foreign key (FK_DeclarCreatedBy) references Users(id) ON UPDATE CASCADE
	)
		COLLATE='utf8mb4_unicode_ci'
		ENGINE=InnoDB;

	/*tabla de requermientos del cliente por residuo*/
	create table Requerimiento(
		ID_Req int auto_increment unique,
		ReqFotoCargue boolean,
		ReqFotoDescargue boolean,
		ReqFotoPesaje boolean,
		ReqFotoReempacado boolean,
		ReqFotoMezclado boolean,
		ReqFotoDestruccion boolean,
		ReqVideoCargue boolean,
		ReqVideoDescargue boolean,
		ReqVideoPesaje boolean,
		ReqVideoReempacado boolean,
		ReqVideoMezclado boolean,
		ReqVideoDestruccion boolean,
		ReqAuditoria boolean,
		ReqAuditoriaTipo varchar(16), /*"Presencial" / ""En linea"*/
		ReqDevolucion boolean,
		ReqDevolucionTipo varchar(128), /*observacion de lo que se quiere que sea devuelto al cliente*/
		ReqDatosPersonal boolean, /*datos de personal y vehiculo que van a la recogida de residuos*/
		ReqPlanillas boolean, /*Planillas de pago de seguridad social*/
		ReqAlistamiento boolean, /*Alistamiento de material*/
		ReqCapacitacion boolean, /*Capacitación de personal dada por el cliente*/
		ReqBascula boolean, /*Pesaje en báscula camionera*/
		ReqMasPerson boolean, /*Personal adicional para cargue*/
		ReqPlatform boolean, /*Vehículo con plataforma*/
		ReqCertiEspecial boolean, /*¿requiere valor especial en el certificado?*/
		primary key (ID_Req)
	)
		COLLATE='utf8mb4_unicode_ci'
		ENGINE=InnoDB;

	/*tabla de residuos peligrosos declarados*/
	Create table Respel(
		ID_Respel int auto_increment unique,
		RespelName varchar(128),
		RespelDescrip varchar(512),
		RespelClasf4741 varchar(64),/*codigo de la corriente segun legislacion*/
		RespelIgrosidad varchar(128), /*inflamable; toxico etc...*/
		RespelEstado varchar(32), /*liquido; solido; gaseoso etc...*/
		RespelHojaSeguridad varchar(128), /*ubicacion en servidor de la imagen de la hoja de seguridad*/
		RespelTarj varchar(128), /*ubicacion en servidor de la imagen de la Tarjeta de emergencia*/
		RespelStatus varchar(16), /*aprobada, negada, pendiente, incompleta*/
		FK_RespelDeclar int, /*foranea de la tabla Declaracion*/
		FK_RespelGenerSede int, /*foranea de la tabla GenerSede para especificar areas, centros de costos, etc*/
		FK_RespelReq int, /*foranea de la tabla requerimiento*/
		FK_RespelGenerSede int, /*foranea de la tabla GenerSede para especificar areas, centros de costos, etc*/
		primary key (ID_Respel),
		foreign key (FK_RespelDeclar) references Declaracion(ID_Declar) ON UPDATE CASCADE,
		foreign key (FK_RespelReq) references Requerimiento(ID_Req) ON UPDATE CASCADE,
		foreign key (FK_RespelGenerSede) references GenerSede(ID_GSede) ON UPDATE CASCADE
	)
		COLLATE='utf8mb4_unicode_ci'
		ENGINE=InnoDB;

	create table Tratamiento(
		ID_Trat int auto_increment unique,
		TratName varchar(64),
		TratTipo boolean, /*interno o externo*/
		FK_TratProv int, /*proveedor del tratamiento*/
		FK_TratRespel int, /*residuo al que aplica*/
		primary key	(ID_Trat),
		foreign key (FK_TratProv) references Clientes(ID_Cli) ON UPDATE CASCADE,
		foreign key (FK_TratRespel) references Respel(ID_Respel) ON UPDATE CASCADE
	)
		COLLATE='utf8mb4_unicode_ci'
		ENGINE=InnoDB;

	/*tabla para el recibo de materiales*/
	Create table ReciboMaterial(
		ID_Rm int auto_increment unique, /*numero de consecutivo*/
		RmStatus varchar(64), /*opciones: Pendiente; aprobado(tesoreria)
		COLLATE='utf8mb4_unicode_ci'
		ENGINE=InnoDB;
		 asignado(a vehiculo)
		COLLATE='utf8mb4_unicode_ci'
		ENGINE=InnoDB;
		 recibido; tratado; Certificado; Cancelado*/
		RmTipo varchar(32), /*exclusivo, alquilado, externo, recorrido*/
		RmAuditable boolean,
		RmSalida time, /*hora de salida de planta*/
		RmLlegada time, /*hora de llegada a planta*/
		RmCobro varchar(128), 
		FK_RmTransportador int, /*empresa que transporta los RESPEL a la planta de tratamiento*/
		FK_RmContact int, /*persona de contacto para tratar el RM*/
		FK_RmDeclar int, /*foranea de la tabla declaraciones*/
		FK_RmConductor int,/*foranea de la tabl personal para especificar los datos del conductor*/
		FK_RmProgVeh int, /*fecha y vehiculo programado para la busqueda de los residuos*/
		primary key (ID_Rm),
		foreign key (FK_RmDeclar) references Declaracion(ID_Declar) ON UPDATE CASCADE,
		foreign key (FK_RmTransportador) references Clientes(ID_Cli) ON UPDATE CASCADE,
		foreign key (FK_RmContact) references Personal(ID_Pers) ON UPDATE CASCADE,
		foreign key (FK_RmConductor) references Personal(ID_Pers) ON UPDATE CASCADE,
		foreign key (FK_RmProgVeh) references ProgVehiculo(ID_ProgVeh) ON UPDATE CASCADE
	)
		COLLATE='utf8mb4_unicode_ci'
		ENGINE=InnoDB;

	-- /*tabla de actualizaciones de un recibo de material*/
	-- create table RmHistory(
	-- 	ID_RmHistory int auto_increment unique,
	-- 	created_at TIMESTAMP NULL DEFAULT NULL, /*fecha de creacion*/
	-- 	updated_at TIMESTAMP NULL DEFAULT NULL,/*fecha de actualizacion*/
	-- 	RmStatusActual varchar(64), /*status al que es actualizado*/
	-- 	FK_UpdatedBy int, /*quien actualizo el recibo por ultima vez*/
	-- 	FK_HistoRm int, /*quien actualizo el recibo por ultima vez*/
	-- 	primary key (ID_RmHistory),
	-- 	foreign key (FK_UpdatedBy) references Users(id) ON UPDATE CASCADE,
	-- 	foreign key (FK_HistoRm) references ReciboMaterial(ID_Rm) ON UPDATE CASCADE
	-- )
	-- 	COLLATE='utf8mb4_unicode_ci'
	-- 	ENGINE=InnoDB;

	/*tabla de cantidades por cada residuo enviado*/
	create table ResEnvio(
		ID_ResEnv int auto_increment unique,
		RespelKgEnviado int, /*cantidad en Kilogramos enviado*/
		RespelKgRecibido int, /*cantidad en Kilogramos recibido*/
		RespelKgConciliado int, /*cantidad en Kilogramos Conciliado*/
		RespelKgTratado int, /*cantidad en Kilogramos Tratado*/
		created_at TIMESTAMP NULL DEFAULT NULL, /*fecha de creacion*/
		updated_at TIMESTAMP NULL DEFAULT NULL,/*fecha de actualizacion*/
		FK_RespelEnvio int, /*foranea de la tabla ReciboMaterial*/
		primary key (ID_ResEnv),
		foreign key (FK_RespelEnvio) references ReciboMaterial(ID_Rm) ON UPDATE CASCADE
	)
		COLLATE='utf8mb4_unicode_ci'
		ENGINE=InnoDB;

	/*tabla de fotos por residuo*/
	create table Foto(
		ID_Foto int auto_increment unique,
		FotoName varchar(128),
		FotoTipo varchar(32), /*cargue, descargue, pesaje, reempacado, mezclado, destruccion, otro*/
		FotoTipoOther varchar(64), /*descripcion en caso de otro tipo de foto*/
		created_at TIMESTAMP NULL DEFAULT NULL, /*fecha de creacion*/
		updated_at TIMESTAMP NULL DEFAULT NULL,/*fecha de actualizacion*/
		FotoRmSrc varchar(255), /*direcion de la carperta donde se guardan las diferentes fotos para un recibo de material*/
		FotoSrc varchar(255), /*nombre de la foto dentro de la carpeta especificada en FotoRmSrc*/
		FotoFormat varchar(32), /*jpg, gif, png, etc*/
		FK_FotoRespel int,
		primary key (ID_Foto),
		foreign key (FK_FotoRespel) references ResEnvio(ID_ResEnv) ON UPDATE CASCADE
	)
		COLLATE='utf8mb4_unicode_ci'
		ENGINE=InnoDB;

	/*tabla de videos por residuo*/
	create table Video(
		ID_Video int auto_increment unique,
		VideoName varchar(128),
		VideoTipo varchar(32), /*cargue, descargue, pesaje, reempacado, mezclado, destruccion, otro*/
		VideoTipoOther varchar(64), /*descripcion en caso de otro tipo de video*/
		created_at TIMESTAMP NULL DEFAULT NULL, /*fecha de creacion*/
		updated_at TIMESTAMP NULL DEFAULT NULL,/*fecha de actualizacion*/
		VideoSrc varchar(255), /*direccion donde esta guardada la imagen*/
		VideoFormat varchar(32), /*mp4, mpeg, avi, wmv*/
		FK_VideoRespel int,
		primary key (ID_Video),
		foreign key (FK_VideoRespel) references ResEnvio(ID_ResEnv) ON UPDATE CASCADE
	)
		COLLATE='utf8mb4_unicode_ci'
		ENGINE=InnoDB;

	/*tabla de certificado por residuo la mayoria de los atributos son opcionales para generar registro*/
	create table Certificado(
		ID_Cert int auto_increment unique,
		CertTipo varchar(64), /*Por Residuo, Generador, ReciboMaterial, AreaEspecial*/
		CertNumero int, /*numero de certificado en membrete*/
		created_at TIMESTAMP NULL DEFAULT NULL, /*fecha de creacion*/
		updated_at TIMESTAMP NULL DEFAULT NULL,/*fecha de actualizacion*/
		CertKg int, /*peso del residuo tratado *//*no exceder el total tratado!!!*/
		CertGr int, /*peso Tratado*/ /*no exceder el total tratado!!!*/
		CertiEspName varchar(64), /*nombre del atributo requerido en el certificado*/
		CertiEspValue varchar(64), /*valor del atributo requerido en el certificado*/
		CertObservacion varchar(255), /*observacion adicional para el certificado*/
		CertSrc varchar(255), /*direccion donde esta guardado el certificado */
		CertAnexo varchar(255), /*direccion donde se almacena los anexos necesarios en PDF*/
		FK_CertRm int, /*foranea de la tabla recibo de material*/
		FK_CertGener int, /*foranea de la tabla generador*/
		FK_CertRespel int, /*foranea de la tabla residuos*//*se puede repetir el numero*/
		primary key (ID_Cert),
		foreign key (FK_CertRm) references ReciboMaterial(ID_Rm) ON UPDATE CASCADE,
		foreign key (FK_CertGener) references GenerSede(ID_GSede) ON UPDATE CASCADE,
		foreign key (FK_CertRespel) references ResEnvio(ID_ResEnv) ON UPDATE CASCADE	
	)
		COLLATE='utf8mb4_unicode_ci'
		ENGINE=InnoDB;

	/*tabla de Manifiestos por residuo la mayoria de los atributos son opcionales para generar registro*/
	create table Manifiesto(
		ID_Manif int auto_increment unique,
		ManifNumero int, /*numero de manifiesto en membrete*/
		created_at TIMESTAMP NULL DEFAULT NULL, /*fecha de creacion*/
		updated_at TIMESTAMP NULL DEFAULT NULL,/*fecha de actualizacion*/
		ManifKg int, /*peso enviado a tratamiento*/ /*no exceder el total tratado!!!*/
		ManifiEspName varchar(64), /*nombre del atributo requerido en el manifiesto*/
		ManifiEspValue varchar(64), /*valor del atributo requerido en el manifiesto*/
		ManifObservacion varchar(255), /*observacion adicional par el manifiesto*/
		ManifSrc varchar(255), /*direccion donde esta guardado el manifiesto*/
		CertAnexo varchar(255), /*direccion donde se almacena los anexos necesarios en PDF*/
		FK_MAnifRespel int, /*foranea de la tabla residuos*/
		FK_MAnifRm int, /*foranea de la tabla recibo de material*/
		FK_MAnifGener int, /*foranea de la tabla generador*/
		FK_ManifProvee int, /*proveedor del tratamiento*/
		primary key (ID_Manif),
		foreign key (FK_MAnifRm) references ReciboMaterial(ID_Rm) ON UPDATE CASCADE,
		foreign key (FK_MAnifGener) references GenerSede(ID_GSede) ON UPDATE CASCADE,
		foreign key (FK_MAnifRespel) references ResEnvio(ID_ResEnv) ON UPDATE CASCADE,
		foreign key (FK_ManifProvee) references Sede(ID_Sede) ON UPDATE CASCADE
	)
		COLLATE='utf8mb4_unicode_ci'
		ENGINE=InnoDB;

	/*tabla de codigos para identificar residuos*/
	Create table QrCode(
		ID_QrCode int auto_increment unique,
		QrCodeEstiba int, /*numero de estiba de cada residuo(para los casos donde hay varias estibas por residuo)*/
		QrCodeSrc varchar(255), /*direccion donde esta guardado el codigo qr para su reimpresion*/
		created_at TIMESTAMP NULL DEFAULT NULL, /*fecha de creacion*/
		updated_at TIMESTAMP NULL DEFAULT NULL,/*fecha de actualizacion*/
		FK_QrCodeRespel int, /*atributo para ingresar informacion en el codigo QR(cantidad pesada)*/
		primary key (ID_QrCode),
		foreign key (FK_QrCodeRespel) references ResEnvio(ID_ResEnv) ON UPDATE CASCADE 
	)
		COLLATE='utf8mb4_unicode_ci'
		ENGINE=InnoDB;

	/*tabla para recurrente para definicion de terminos... para uso en la seccion de ayuda del sistema(no relacionar)*/
	create table DiccionarioDatos(
		ID_Dato int auto_increment unique,
		DatoName varchar(32),/*nombre del campo en la base de datos*/
		DatoDescrip varchar(255),/*indica lo que representa en el sistema*/
		DatoAlias varchar(128),/*si tiene varios nombres en diferentes areas*/
		DatoLongi int,/*tamaño del campo en numero de caracteres*/
		DatoTipo varchar(32),/*tipo de dato ejem:varchar, si/no(boolean), int(numero entero)
		 ect...*/
		DatoEstructura varchar(64),/*indica a que proceso o tabla pertenece el dato*/
		DatoRelacion varchar(32),/*indica el tipo de relacion sobre otros datos, segun se lista a continuacion
		Relación secuencial: define los componentes que siempre se incluyen en una estructura de datos.
		Relación de selección: (uno u otro), define las alternativas para datos o estructuras de datos incluidos en una estructura de datos.
		Relación de iteración: (repetitiva), define la repetición de un componente.
		Relación opcional: los datos pueden o no estar incluidos, o sea, una o ninguna iteración*/
		primary key (ID_Dato)
	)
		COLLATE='utf8mb4_unicode_ci'
		ENGINE=InnoDB;

	CREATE TABLE `password_resets` (
		`email` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
		`token` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
		`created_at` TIMESTAMP NULL DEFAULT NULL,
		INDEX `password_resets_email_index` (`email`)
	)
	COLLATE='utf8mb4_unicode_ci'
	ENGINE=InnoDB
	;

	CREATE TABLE `migrations` (
		`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
		`migration` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
		`batch` INT(11) NOT NULL,
		PRIMARY KEY (`id`)
	)
	COLLATE='utf8mb4_unicode_ci'
	ENGINE=InnoDB
	AUTO_INCREMENT=3
	;

<?php

	include_once('../connection/Portal.php');

	$action = $_POST['action'];
	
	if($action == 'ingreso'){
		$documento = $_POST['documento'];
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$telefono = $_POST['telefono'];
		
		//Validacion user
		if($_POST['idUser']==''){
			$insUsr = $Portal->query("INSERT INTO usuario (documento, nombre, apellido, telefono, id_rol, fecha_registro)
											VALUES('$documento', '$nombre', '$apellido', '$telefono', '2', now())");
			$usr = $Portal->query("SELECT id_usuario FROM usuario WHERE documento='$documento'");								
			$resultUsr = $usr->fetch_array(MYSQLI_BOTH);
			$idUsuario = $resultUsr[0];
		}else{
			$idUsuario = $_POST['idUser'];
			$usrUpd = $Portal->query("UPDATE usuario SET nombre='$nombre', apellido='$apellido', telefono='$telefono', fecha_upd=now() WHERE id_usuario='$idUsuario'");
		}
		
		//Asocia vehiculo-user
		$tipoVehiculo = $_POST['tipoVehiculo'];
			$veh = $Portal->query("SELECT descripcion FROM vehiculo WHERE id_vehiculo='$tipoVehiculo'");								
			$resultNum = $veh->fetch_array(MYSQLI_BOTH);
			$vehiculo = $resultNum[0];
		$placa = $_POST['placa'];
		$insVehUsr = $Portal->query("INSERT INTO usuario_vehiculo (id_usuario, id_vehiculo, placa_serial)
									VALUES('$idUsuario', '$tipoVehiculo', '$placa')");
		
		//Reserva parquadero-puesto
		if($_POST['puesto']=='0'){
			$num = $Portal->query("SELECT id_parqueadero, num_puesto FROM parqueadero WHERE id_vehiculo='$tipoVehiculo' AND estado='1' ORDER BY rand() LIMIT 1");								
			$resultNum = $num->fetch_array(MYSQLI_BOTH);
			$numPuesto = $resultNum[1];
			$puesto = $resultNum[0];
		}else{
			$puesto = $_POST['puesto'];
			$num = $Portal->query("SELECT num_puesto FROM parqueadero WHERE id_parqueadero='$puesto'");								
			$resultNum = $num->fetch_array(MYSQLI_BOTH);
			$numPuesto = $resultNum[0];
		}
		$updPrk = $Portal->query("UPDATE parqueadero SET estado='0' WHERE num_puesto='$numPuesto'");

		//Insert TRX
		$fechaIngreso = $_POST['fechaIngreso'];
			if(empty($fechaIngreso)){
				date_default_timezone_set('America/Bogota');
				$fechaParking = date("Y-m-d H:i:s");
			}else{
				$date=date_create($_POST['fechaIngreso']);
				$fechaParking = date_format($date,"Y-m-d H:i:s");
			}
		$resultIns = $Portal->query("INSERT INTO transaccion (id_usuario, documento, nombre, apellido, telefono, vehiculo, placa_serial, id_parqueadero, num_puesto, fecha_ingreso, estado)
									VALUES('$idUsuario', '$documento', '$nombre', '$apellido', '$telefono', '$vehiculo', '$placa', '$puesto', '$numPuesto', '$fechaParking', '1')");
		
		$arry_rsl = array();
		$arry_rsl['registro'] = true;
		$arry_rsl['puesto'] = $numPuesto;
		$arry_rsl['vehiculo'] = $vehiculo;
		$arry_rsl['placa'] = $placa;

		echo json_encode($arry_rsl);
	}
	
	elseif($action == 'salida'){
		$idTRX = $_POST['idTRXS'];
		$puesto = $_POST['puestoS'];
		$vehiculo = $_POST['vehiculoS'];
		
		//Cerrar TRX
		$veh = $Portal->query("SELECT id_vehiculo FROM vehiculo WHERE descripcion='$vehiculo'");								
		$resultVeh = $veh->fetch_array(MYSQLI_BOTH);
		$idVehiculo = $resultVeh[0];
		$fechaSal = $_POST['fechaSalidaS'];
			if(empty($fechaSal)){
				date_default_timezone_set('America/Bogota');
				$fechaSalida = date("Y-m-d H:i:s");
			}else{
				$date=date_create($_POST['fechaSalidaS']);
				$fechaSalida = date_format($date,"Y-m-d H:i:s");
			}
		$updTRX = "UPDATE transaccion SET fecha_salida='$fechaSalida', minutos=TIMESTAMPDIFF(MINUTE,fecha_ingreso,'$fechaSalida'), 
				total_fe=TotalFE(fecha_ingreso,'$fechaSalida','$idVehiculo'), tarifa_dto=AplicaDto(fecha_ingreso,'$fechaSalida'), estado='0' 
				WHERE id_trx='$idTRX' AND num_puesto='$puesto'";
		$resultUpd = $Portal->query($updTRX);
		
		//Libera puesto
		$puesto = $Portal->query("UPDATE parqueadero SET estado='1' WHERE num_puesto='$puesto'");
		
		//Genera Array para Factura
		$qryFE = $Portal->query("SELECT * FROM transaccion WHERE id_trx='$idTRX'");
		$resultFE = $qryFE->fetch_array(MYSQLI_BOTH);
		$arry_fe = array();
		$arry_fe['cliente'] = $resultFE['nombre'].' '.$resultFE['apellido'];
		$arry_fe['documento'] = $resultFE['documento'];
		$arry_fe['telefono'] = $resultFE['telefono'];
		$arry_fe['vehiculo'] = $resultFE['vehiculo'];
		$arry_fe['placa'] = $resultFE['placa_serial'];
		$arry_fe['puesto'] = $resultFE['num_puesto'];
		$arry_fe['fecha_ingreso'] = $resultFE['fecha_ingreso'];
		$arry_fe['fecha_salida'] = $resultFE['fecha_salida'];
		$arry_fe['total_fe'] = $resultFE['total_fe'];
		
		echo json_encode($arry_fe);
		
		//echo "Salida exitosa del Parqueadero, se genera Factura";
	}

?>
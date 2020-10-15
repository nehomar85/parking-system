<?php

	include_once('../connection/Portal.php');
	
	if(isset($_POST["documento"])){
		$documento = $_POST['documento'];
		$qry_documento = $Portal->query("SELECT * FROM usuario WHERE documento='$documento'");
		$row_documento = $qry_documento->fetch_array(MYSQLI_BOTH);
		$array_user = array();
		if($row_documento[0]){
			$array_user['id_usuario'] = $row_documento['id_usuario'];
			$array_user['nombre'] = $row_documento['nombre'];
			$array_user['apellido'] = $row_documento['apellido'];
			$array_user['telefono'] = $row_documento['telefono'];
		}else{
			$msg = false;
		}
		
		echo json_encode($array_user);
	}


	if(isset($_POST["idTipoVehiculo"])){
		$idTipoVeh = $_POST["idTipoVehiculo"];
		$categoria = '<option value="0" selected>Selección automática del puesto</option>';
		$strConsulta = "SELECT * FROM parqueadero WHERE id_vehiculo = '$idTipoVeh' AND estado = '1'";
		$result = $Portal->query($strConsulta);
		while( $fila = $result->fetch_array() )
		{
			$categoria.='<option value="'.$fila["id_parqueadero"].'">'.$fila["num_puesto"].'</option>';
		}
		echo $categoria;
	}
	
	if(isset($_POST["idPuesto"])){
		$puesto = $_POST['idPuesto'];
		$qry_trx = $Portal->query("SELECT * FROM transaccion WHERE num_puesto='$puesto' AND estado = '1' AND fecha_salida is null");
		$row_trx = $qry_trx->fetch_array(MYSQLI_BOTH);
		$array_trx = array();
		if($row_trx[0]){
			$array_trx['idTRX'] = $row_trx['id_trx'];
			$array_trx['documento'] = $row_trx['documento'];
			$array_trx['nombre'] = $row_trx['nombre'];
			$array_trx['apellido'] = $row_trx['apellido'];
			$array_trx['telefono'] = $row_trx['telefono'];
			$array_trx['vehiculo'] = $row_trx['vehiculo'];
			$array_trx['placa'] = $row_trx['placa_serial'];
			$array_trx['puesto'] = $row_trx['num_puesto'];
			$array_trx['ingreso'] = $row_trx['fecha_ingreso'];
		}else{
			$msg = false;
		}
		
		echo json_encode($array_trx);
	}

?>
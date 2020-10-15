<?php

	include_once('../connection/Portal.php');

	$informe = $_POST['informe'];
	if(isset($_POST['rangofechas']) and $_POST['rangofechas']!=""){
		$Rango = $_POST['rangofechas'];
		$startDate = substr($_POST['rangofechas'],0,10);
		$endDate = substr($_POST['rangofechas'],13,10);
		$sqlRango = "date(fecha_ingreso) BETWEEN '$startDate' AND '$endDate' ";
	}else{ 
		date_default_timezone_set('America/Bogota');
		$fechaHoy = date("Y-m-d");
		$sqlRango = "date(fecha_ingreso) BETWEEN '$fechaHoy' AND '$fechaHoy' ";
	}
		
	if($informe == '1'){
		$qry = $Portal->query("SELECT num_puesto, count(*) TRX, (select round(sum(total_fe),2)) totalFE, (select max(fecha_ingreso) ) ultimoUso
							FROM transaccion WHERE ".$sqlRango." group by 1 order by 2 desc limit 1");

				echo "<table id='informe' class='table table-sm table-bordered table-hover table-striped ' style='zoom:90%'>";
				echo "	<thead>								";
				echo "	  <tr>								";
				echo "		<th>#Puesto</th>				";
				echo "		<th>Cant. Uso</th>				";
				echo "		<th>Total Facturado</th>		";
				echo "		<th>Último Ingreso</th>			";
				echo "	  </tr>								";
				echo "	</thead>							";
				echo "	<tbody>								";
				while($registro = mysqli_fetch_assoc($qry)) {
				echo "	  <tr>								";
				echo "<td>".$registro['num_puesto']."</td>	";
				echo "<td>".$registro['TRX']."</td>			";
				echo "<td>".$registro['totalFE']."</td>		";
				echo "<td>".$registro['ultimoUso']."</td>	";
				echo "	  </tr>								";
				}
				echo "	</tbody>							";
				echo "</table>								";
	}
	
	elseif($informe == '2'){
		$qry = $Portal->query("SELECT id_trx, vehiculo, placa_serial, num_puesto, fecha_ingreso, fecha_salida FROM transaccion WHERE ".$sqlRango." order by fecha_ingreso");
		
				echo "<table id='informe' class='table table-sm table-bordered table-hover table-striped ' style='zoom:90%'>";
				echo "	<thead>								";
				echo "	  <tr>								";
				echo "		<th>Vehículo</th>				";
				echo "		<th>Placa|Serial</th>			";
				echo "		<th>#Puesto</th>				";
				echo "		<th>Fecha Ingreso</th>			";
				echo "		<th>Fecha Salida</th>			";
				echo "	  </tr>								";
				echo "	</thead>							";
				echo "	<tbody>								";
				while($registro = mysqli_fetch_assoc($qry)) {
				echo "	  <tr>								";
				echo "<td>".$registro['vehiculo']."</td>	";
				echo "<td>".$registro['placa_serial']."</td>";
				echo "<td>".$registro['num_puesto']."</td>	";
				echo "<td>".$registro['fecha_ingreso']."</td>";
				echo "<td>".$registro['fecha_salida']."</td> ";
				echo "	  </tr>								";
				}
				echo "	</tbody>							";
				echo "</table>								";
	}
	
	elseif($informe == '3'){
		$qry = $Portal->query("SELECT vehiculo, count(*) totalVeh FROM transaccion WHERE ".$sqlRango." group by 1 order by 2 desc");
		
				echo "<table id='informe' class='table table-sm table-bordered table-hover table-striped ' style='zoom:90%'>";
				echo "	<thead>								";
				echo "	  <tr>								";
				echo "		<th>Vehículo</th>				";
				echo "		<th>Cant. Ingreso</th>				";
				echo "	  </tr>								";
				echo "	</thead>							";
				echo "	<tbody>								";
				while($registro = mysqli_fetch_assoc($qry)) {
				echo "	  <tr>								";
				echo "<td>".$registro['vehiculo']."</td>	";
				echo "<td>".$registro['totalVeh']."</td>	";
				echo "	  </tr>								";
				}
				echo "	</tbody>							";
				echo "</table>								";
	}
	
	elseif($informe == '4'){
		$qry = $Portal->query("SELECT date(fecha_ingreso) fIngreso, round(sum(total_fe),2) totalFE FROM transaccion WHERE ".$sqlRango." group by 1");
		
				echo "<table id='informe' class='table table-sm table-bordered table-hover table-striped ' style='zoom:90%'>";
				echo "	<thead>								";
				echo "	  <tr>								";
				echo "		<th>Fecha Ingreso</th>			";
				echo "		<th>Total Facturado</th>		";
				echo "	  </tr>								";
				echo "	</thead>							";
				echo "	<tbody>								";
				while($registro = mysqli_fetch_assoc($qry)) {
				echo "	  <tr>								";
				echo "<td>".$registro['fIngreso']."</td>	";
				echo "<td>".$registro['totalFE']."</td>		";
				echo "	  </tr>								";
				}
				echo "	</tbody>							";
				echo "</table>								";
	}

?>
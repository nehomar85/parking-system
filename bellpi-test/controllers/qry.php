<?php

$Parking1 = $Portal->query("SELECT *,
							case estado
								when 1 then 'bg-success'
								when 0 then 'bg-danger salida'
							end bg FROM parqueadero WHERE num_puesto LIKE 'A%' LIMIT 5;");
$row_Parking1 = $Parking1->fetch_assoc();

$Parking2 = $Portal->query("SELECT *,
							case estado
								when 1 then 'bg-success'
								when 0 then 'bg-danger salida'
							end bg FROM parqueadero WHERE num_puesto LIKE 'M%' LIMIT 10;");
$row_Parking2 = $Parking2->fetch_assoc();

$Parking3 = $Portal->query("SELECT *,
							case estado
								when 1 then 'bg-success'
								when 0 then 'bg-danger salida'
							end bg FROM parqueadero WHERE num_puesto LIKE 'M%' LIMIT 10,10;");
$row_Parking3 = $Parking3->fetch_assoc();

$Parking4 = $Portal->query("SELECT *,
							case estado
								when 1 then 'bg-success'
								when 0 then 'bg-danger salida'
							end bg FROM parqueadero WHERE num_puesto LIKE 'B%' LIMIT 10;");
$row_Parking4 = $Parking4->fetch_assoc();

$Parking5 = $Portal->query("SELECT *,
							case estado
								when 1 then 'bg-success'
								when 0 then 'bg-danger salida'
							end bg FROM parqueadero WHERE num_puesto LIKE 'A%' LIMIT 5,5;");
$row_Parking5 = $Parking5->fetch_assoc();

?>
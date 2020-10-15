<?php
  
  include_once('../connection/Portal.php');

  if(isset($_POST)){
    $idPromo = $_POST['idPromoE'];
	$minutos = $_POST['minutosE'];
	$descuento = $_POST['descuentoE'];
	$resultUpd = $Portal->query("UPDATE promocion SET minutos_uso='$minutos', descuento='$descuento' WHERE id_promocion='$idPromo'");
	echo "Promoción Actualizada!";
  }
  
?>
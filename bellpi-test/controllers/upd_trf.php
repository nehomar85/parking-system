<?php
  
  include_once('../connection/Portal.php');
  
  $columna = array(
    0 => 'descripcion', 
    1 => 'tarifa_minuto'
  );
  $error = true;
  $colVal = '';
  $colIndex = $rowId = 1;
  
  $msg = array('status' => !$error, 'msg' => 'Error! ingresar sólo números en la tárifa');

  if(isset($_POST)){
    if(isset($_POST['val']) && is_numeric($_POST['val']) && $error) {
      $colVal = $_POST['val'];
      $error = false;
    } else {
      $error = true;
    }
    if(isset($_POST['index']) && $_POST['index'] >= 0 &&  $error) {
      $colIndex = $_POST['index'];
      $error = false;
    } else {
      $error = true;
    }
    if(isset($_POST['id']) && $_POST['id'] > 0 && $error) {
      $rowId = $_POST['id'];
      $error = false;
    } else {
      $error = true;
    }
  
    if(!$error) {
        $sql = "UPDATE vehiculo SET ".$columna[$colIndex]." = '".$colVal."' WHERE id_vehiculo='".$rowId."'";
        $status = $Portal->query($sql);
        $msg = array('status' => !$error, 'msg' => 'Tárifa del vehículo actualizada!');
    }
  }
  
  echo json_encode($msg);
  
?>
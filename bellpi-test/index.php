<?php
include_once('connection/Portal.php');
include_once('controllers/qry.php');

?>
<!DOCTYPE html>
<html lang="es">
  <!--head-->
  <?php include('template/head.php'); ?>
  
  <style>
   .float-container{
	  padding:0px;
	  margin:0px;
	  position:fixed;
	  right:-130px;
	  top:230px;
	  width:180px;
	  z-index: 1100;
	}
	table, th, td, tr {
	  border: 1px solid white;
	}
  </style>
  
  <?php $active='parking';?>
	
  <body>
	
	<!-- nav-bar -->
	<?php include('template/nav_bar.php'); ?>

	<div class="container-fluid">
	  <div class="row">		
		<div class="col-md-12 p-3">
		  <div class="card card-primary">
			<div class="card-body rounded shadow-sm">
			  <div class="col-md-12">
				<h6 class="border-bottom border-gray pb-2 mb-0">Parqueadero</h6>
				<p class="small lh-125">Distribución Paqueadero</p>
				<div class="row">
				  <table class="table table-sm">
					<tbody>
					  <tr>
						<?php 
						  do {
							echo "<td colspan='2' id='puesto".$row_Parking1['id_parqueadero']."'><button type='button' class='form-control text-white ".$row_Parking1['bg']."' value='".$row_Parking1['id_parqueadero']."' />".$row_Parking1['num_puesto']."</td>";
						  } while ($row_Parking1 = mysqli_fetch_assoc($Parking1));
						?>
					  </tr>
					  <tr><td colspan="10"></td></tr>
					  <tr><td colspan="10"></td></tr>
					  <tr>
						<?php 
						  do {
							echo "<td id='puesto".$row_Parking2['id_parqueadero']."'><button type='button' class='form-control text-white ".$row_Parking2['bg']."' value='".$row_Parking2['id_parqueadero']."' />".$row_Parking2['num_puesto']."</td>";
						  } while ($row_Parking2 = mysqli_fetch_assoc($Parking2));
						?>
					  </tr>
					  <tr>
						<?php 
						  do {
							echo "<td id='puesto".$row_Parking3['id_parqueadero']."'><button type='button' class='form-control text-white ".$row_Parking3['bg']."' value='".$row_Parking3['id_parqueadero']."' />".$row_Parking3['num_puesto']."</td>";
						  } while ($row_Parking3 = mysqli_fetch_assoc($Parking3));
						?>
					  </tr>
					  <tr><td colspan="10"></td></tr>
					  <tr><td colspan="10"></td></tr>
					  <tr>
						<?php 
						  do {
							echo "<td id='puesto".$row_Parking4['id_parqueadero']."'><button type='button' class='form-control text-white ".$row_Parking4['bg']."' value='".$row_Parking4['id_parqueadero']."' />".$row_Parking4['num_puesto']."</td>";
						  } while ($row_Parking4 = mysqli_fetch_assoc($Parking4));
						?>
					  </tr>
					  <tr><td colspan="10"></td></tr>
					  <tr><td colspan="10"></td></tr>
					  <tr>
						<?php 
						  do {
							echo "<td colspan='2' id='puesto".$row_Parking5['id_parqueadero']."'><button type='button' class='form-control text-white ".$row_Parking5['bg']."' value='".$row_Parking5['id_parqueadero']."' />".$row_Parking5['num_puesto']."</td>";
						  } while ($row_Parking5 = mysqli_fetch_assoc($Parking5));
						?>
					  </tr>
					</tbody>
				  </table>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	  
		<div class="float-container">
		  <button class="btn btn-lg btn-warning fa fa-car" data-toggle="modal" data-target="#registraParking"></button>
		</div>
	
	</div>

	<!-- Optional JavaScript -->
	<?php include('template/modal_parking.php'); ?>
	<?php include('template/modal_salida.php'); ?>
	<?php include('template/factura.html'); ?>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!--script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script-->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	<!-- jsPDF-->
	<script src="dist/js/jspdf.debug.js"></script>
  </body>
</html>
<script>
$.getScript("dist/js/control_index.js");
</script>
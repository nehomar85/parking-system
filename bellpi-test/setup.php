<?php
include_once('connection/Portal.php');

$qryVehiculo = $Portal->query("SELECT * FROM vehiculo");
$qryPromo = $Portal->query("SELECT * FROM promocion");

?>
<!DOCTYPE html>
<html lang="es">
  <!--head-->
  <?php include('template/head.php'); ?>
  
  <?php $active='configuracion';?>
	
  <body>
	
	<!-- nav-bar -->
	<?php include('template/nav_bar.php'); ?>

	<div class="container-fluid">
	  <div class="row">		
		<div class="col-md-6 p-3">
		  <div class="card card-primary">
			<div class="card-body rounded shadow-sm">
			  <div class="col-md-12">
				<h6 class="border-bottom border-gray pb-2 mb-0">Promociones</h6>
				<p class="small lh-125">Lista de Promociones</p>
				<table id="example" class="table table-striped table-bordered table-hover" style="zoom:90%">
				  <thead>
					<tr>
						<th style="display:none">Id</th>
						<th>Minutos</th>
						<th>Descuento (%)</th>
						<th>Upd</th>
					</tr>
				  </thead>
				  <tbody>
				  <?php foreach($qryPromo as $rowPromo) :?>
					<tr data-row-id="<?php echo $rowPromo['id_promocion'];?>">
						<td style="display:none" id="idPromo<?php echo $rowPromo['id_promocion'];?>"><?php echo $rowPromo['id_promocion'];?></td>
						<td id="minutos<?php echo $rowPromo['id_promocion'];?>"><?php echo $rowPromo['minutos_uso'];?></td>
						<td id="descuento<?php echo $rowPromo['id_promocion'];?>"><?php echo $rowPromo['descuento'];?></td>
						<td id="edit<?php echo $rowPromo['id_promocion'];?>"><button class="border-0 bg-transparent fa fa-edit editPromo text-primary" value="<?php echo $rowPromo['id_promocion'];?>" /></td>
				    </tr>
				  <?php endforeach;?>
				  </tbody>
				</table>
			  </div>
			</div>
		  </div>
		</div>
		
		<div class="col-md-6 p-3">
		  <div class="card card-primary">
			<div class="card-body rounded shadow-sm">
			  <div class="col-md-12">
				<h6 class="border-bottom border-gray pb-2 mb-0">Tárifas</h6>
				<p class="small lh-125">Tárifas Vigentes</p>
				<table id="example" class="table table-striped table-bordered table-hover" style="zoom:90%">
				  <thead>
					<tr>
						<th>Vehículo</th>
						<th>Tárifa/min.</th>
					</tr>
				  </thead>
				  <tbody>
				  <?php foreach($qryVehiculo as $rowVeh) :?>
					<tr data-row-id="<?php echo $rowVeh['id_vehiculo'];?>">
						<td class="editTarifa" contenteditable="false" col-index='0' oldVal ="<?php echo $rowVeh['descripcion'];?>"><?php echo $rowVeh['descripcion'];?></td>
						<td class="editTarifa" contenteditable="true" col-index='1' oldVal ="<?php echo $rowVeh['tarifa_minuto'];?>"><?php echo $rowVeh['tarifa_minuto'];?></td>
				    </tr>
				  <?php endforeach;?>
				  </tbody>
				</table>
			  </div>
			</div>
		  </div>
		</div>
		
		  <div class="toast" style="position:absolute;top:0;right:0;" data-delay="3000">
			<div class="toast-header">
			  <strong class="mr-auto">Tárifas</strong>
			  <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
			<div class="toast-body">
			  <div id="msg"></div>
			</div>
		  </div>

	  </div>
	</div>

	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<?php include('template/modal_promo.php'); ?>
	<script src="https://code.jquery.com/jquery-1.11.1.js"/>
    <!--script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script-->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
<script>
$.getScript("dist/js/control_conf.js");
</script>
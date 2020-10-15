<?php
include_once('connection/Portal.php');

?>
<!DOCTYPE html>
<html lang="es">
  <!--head-->
  <?php include('template/head.php'); ?>
  
  <?php $active='reporte';?>
	
  <body>
	
	<!-- nav-bar -->
	<?php include('template/nav_bar.php'); ?>

	<div class="container-fluid">
	  <div class="row">		
		<div class="col-md-12 p-3">
		  <div class="card card-primary">
			<div class="card-body rounded shadow-sm">
			  <div class="col-md-12">
				<h6 class="border-bottom border-gray pb-2 mb-0">Reportes</h6>
				<p class="small lh-125">Informes Disponibles</p>
				  <div class="row">
					<div class="col-md-5">
					  <div class="form-group">
						<label>Informe</label>
						<select class="form-control form-control-sm" id="informe" name="informe">
						  <option selected ></option>
						  <option value="1">Puesto más usado</option>
						  <option value="2">Transacciones Entrada / Salida</option>
						  <option value="3">Tipo Vevículos</option>
						  <option value="4">Facturación Recaudo</option>
						</select>
					  </div>
					</div>
					<div class="col-md-5">
					  <div class="form-group">
						<label>Rango de Fechas</label>
						<div class="input-group">
						  <div class="input-group-prepend">
						    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
						  </div>
						  <input type="text" class="form-control form-control-sm float-right" id="rangofechas" name="rangofechas"/>
						</div>
						<small id="passwordHelpBlock" class="form-text text-muted">
						Si no ingresa fecha el sistema tomará la actual
						</small>
					  </div>
					</div>
					<div class="col-md-2">
					  <div class="form-group">
						</br>
						<button type="submit" class="btn btn-primary generaInforme" >Buscar</button>
					  </div>
					</div>
				  </div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	</div>
	
	<div class="container-fluid">
	  <div class="row">		
		<div class="col-md-12 p-3">
		  <div class="card card-primary">
			<div class="card-body rounded shadow-sm">
			  <div class="col-md-12">
				<h6 class="border-bottom border-gray pb-2 mb-0">Resultado Informe</h6><br>
					<div class="row" id="result">
				</div>	
			  </div>	
			</div>
		  </div>
		</div>
	  </div>
	</div>

	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	<!-- DatePicker -->
	<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

  </body>
</html>
<script>
$.getScript("dist/js/rango_fecha.js");
</script>
<script>
$(document).ready(function(){
	$(document).on('click', '.generaInforme', function(){
		var informe = $("#informe").val();
		var rangofechas = $("#rangofechas").val();
		$.ajax({
		  type: "POST",
		  url: "controllers/data_informe.php",
		  data: {informe,rangofechas},
		  cache: false,
		  success: function(data){
			$("#result").html(data);
		  }
		});
		return false;
	});
});
</script>
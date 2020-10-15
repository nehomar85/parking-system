<?php
$qryVehiculo = $Portal->query("SELECT * FROM vehiculo ORDER BY descripcion ASC");
$Vehiculo = '<option value=""></option>';
while ($fila = $qryVehiculo->fetch_array()){
	$Vehiculo.='<option value="'.$fila["id_vehiculo"].'">'.$fila["descripcion"].'</option>';
}

?>
<!-- Modal -->
<div class="modal fade" id="registraParking" tabindex="-1" role="dialog" style="zoom:90%">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title col-11 text-center">Registro Parqueadero</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<div class="container-fluid">
		<form class="form-horizontal form-label-left box-body needs-validation" id="formRegistro" novalidate >
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="Documento">#Documento</label>
			<div class="col-sm-9">
			  <input class="form-control form-control-sm" id="documento" name="documento" required />
			  <input class="form-control form-control-sm" id="idUser" name="idUser" hidden />
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="Nombre">Nombre</label>
			<div class="col-sm-9">
			  <input class="form-control form-control-sm" id="nombre" name="nombre" required />
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="Apellido">Apellido</label>
			<div class="col-sm-9">
			  <input class="form-control form-control-sm" id="apellido" name="apellido" required />
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="Telefono">Telefono</label>
			<div class="col-sm-9">
			  <input class="form-control form-control-sm" id="telefono" name="telefono" />
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="Vehiculo">Vehículo</label>
			<div class="col-sm-9">
			  <select class="form-control form-control-sm" id="tipoVehiculo" name="tipoVehiculo" required><?php echo $Vehiculo; ?></select>
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="Puesto">Puesto</label>
			<div class="col-sm-9">
			  <select class="form-control form-control-sm" id="puesto" name="puesto" ></select>
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="PlacaVehiculo">Placa/Serial</label>
			<div class="col-sm-9">
			  <input class="form-control form-control-sm" id="placa" name="placa" required />
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="FechaIngreso">Ingreso</label>
			<div class="col-sm-9">
			  <input class="form-control form-control-sm" id="fechaIngreso" name="fechaIngreso" type="datetime-local" />
			  <small id="passwordHelpBlock" class="form-text text-muted">
			  Si no ingresa fecha|hora el sistema tomará la actual
			  </small>
			</div>
		  </div>
		</div>
      </div>
      <div class="modal-footer justify-content-between">
		<button class="btn btn-default" type="reset">Restablecer</button>
		<button class="btn btn-primary" type="submit" id="registraTRX">Registrar</button>
	  </form>
	  </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="salidaParking" tabindex="-1" role="dialog" style="zoom:90%">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title col-11 text-center">Salida Parqueadero</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<div class="container-fluid">
		<form class="form-horizontal form-label-left box-body" id="formSalida" >
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="Documento">#Documento</label>
			<div class="col-sm-9">
			  <input class="form-control form-control-sm" id="documentoS" name="documentoS" readonly />
			  <input class="form-control form-control-sm" id="idTRXS" name="idTRXS" hidden />
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="Nombre">Nombre</label>
			<div class="col-sm-9">
			  <input class="form-control form-control-sm" id="nombreS" name="nombreS" readonly />
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="Apellido">Apellido</label>
			<div class="col-sm-9">
			  <input class="form-control form-control-sm" id="apellidoS" name="apellidoS" readonly />
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="Telefono">Telefono</label>
			<div class="col-sm-9">
			  <input class="form-control form-control-sm" id="telefonoS" name="telefonoS" readonly />
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="Vehiculo">Vehículo</label>
			<div class="col-sm-9">
			  <input class="form-control form-control-sm" id="vehiculoS" name="vehiculoS" readonly />
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="PlacaVehiculo">Placa/Serial</label>
			<div class="col-sm-9">
			  <input class="form-control form-control-sm" id="placaS" name="placaS" readonly />
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="Puesto">Puesto</label>
			<div class="col-sm-9">
			  <input class="form-control form-control-sm" id="puestoS" name="puestoS" readonly />
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="FechaIngreso">Ingreso</label>
			<div class="col-sm-9">
			  <input class="form-control form-control-sm" id="fechaIngresoS" name="fechaIngresoS" readonly />
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="FechaSalida">Salida</label>
			<div class="col-sm-9">
			  <input class="form-control form-control-sm" id="fechaSalidaS" name="fechaSalidaS" type="datetime-local" />
			  <small id="passwordHelpBlock" class="form-text text-muted">
			  Si no ingresa fecha|hora el sistema tomará la actual
			  </small>
			</div>
		  </div>
		</div>
      </div>
      <div class="modal-footer justify-content-between">
		<button class="btn btn-default" data-dismiss="modal">Cancelar</button>
		<button class="btn btn-primary cierreTRX" id="cierrTRX">Facturar</button>
	  </form>
	  </div>
    </div>
  </div>
</div>
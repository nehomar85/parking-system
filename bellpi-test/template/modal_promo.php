<!-- Modal -->
<div class="modal fade" id="editarPromo" tabindex="-1" role="dialog" style="zoom:90%">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title col-11 text-center">Editar Promoción</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<div class="container-fluid">
		<form class="form-horizontal form-label-left box-body" id="formUpdPromo" >
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="Minutos">Minutos</label>
			<div class="col-sm-9">
			  <input class="form-control form-control-sm" type="number" id="idPromoE" name="idPromoE" hidden />
			  <input class="form-control form-control-sm" type="number" id="minutosE" name="minutosE" required />
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label" for="Descuento">Descuento</label>
			<div class="col-sm-9">
			  <input class="form-control form-control-sm" type="number" id="descuentoE" name="descuentoE" required />
			  <small id="passwordHelpBlock" class="form-text text-muted">
			  El descuento no debe ser mayor al 100%
			  </small>
			</div>
		  </div>
		</div>
      </div>
      <div class="modal-footer justify-content-between">
		<button class="btn btn-default" data-dismiss="modal">Cancelar</button>
		<button class="btn btn-success updPromo" type="submit" id="updPromocion">Actualizar</button>
	  </form>
	  </div>
    </div>
  </div>
</div>
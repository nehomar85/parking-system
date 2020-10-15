$(document).ready(function(){
  //Upd tarifa vehiculo
  $('td.editTarifa').on('focusout', function(){
    data = {};
    data['val'] = $(this).text();
    data['id'] = $(this).parent('tr').attr('data-row-id');
    data['index'] = $(this).attr('col-index');
      if($(this).attr('oldVal') === data['val'])
    return false;
    $.ajax({
	  type: "POST",
	  url: "controllers/upd_trf.php",
	  cache:false,
	  data: data,
	  dataType: "json",
	  success: function(response){
		if(response.status){
		  $("#msg").html(response.msg);
		  $('.toast').toast('show');
		}else{
		  $("#msg").html(response.msg);
		  $('.toast').toast('show');
		}
	  }
	});
  });
  
  //Modal promocion
  $(document).on('click', '.editPromo', function(){
	var id=$(this).val();
	var idPromo=$('#idPromo'+id).text();
	var minutos=$('#minutos'+id).text();
	var descuento=$('#descuento'+id).text();
	$('#editarPromo').modal('show');
	$('#idPromoE').val(idPromo);
	$('#minutosE').val(minutos);
	$('#descuentoE').val(descuento);
  });
  
  //Upd promocion
  $(document).on('click', '.updPromo', function(){
	var descuento=$('#descuentoE').val();
	if(descuento>100){
	  alert("El descuento no puede ser mayor al 100%");
	  return false
	}else{
	  $.ajax({
	    type: "POST",
	    url: "controllers/upd_prom.php",
	    data: $("#formUpdPromo").serialize(),
	    success: function(data){
			alert(data);
			window.location.reload(true);
	    }
	  });
	  return false
	}
  });

});
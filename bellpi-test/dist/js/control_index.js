//Get datos usuario registro previo
$("#documento").blur(function() {
	$.ajax({
		url:"controllers/control_form.php",
		type: "POST",
		data:"documento="+$("#documento").val(),
		success: function(response){
			var obj=$.parseJSON(response);
			$('#idUser').val(obj.id_usuario);
			$('#nombre').val(obj.nombre);
			$('#apellido').val(obj.apellido);
			$('#telefono').val(obj.telefono);
			
		}
	})
});

//Puesto disponibles select
$(document).ready(function(){
	$("#tipoVehiculo").change(function(){
		$.ajax({
			url:"controllers/control_form.php",
			type: "POST",
			data:"idTipoVehiculo="+$("#tipoVehiculo").val(),
			success: function(clase){
				$("#puesto").html(clase);
			}
		})
	});
});

//Registro parking TRX
(function() {
  'use strict';
  window.addEventListener('load', function() {
    var forms = document.getElementsByClassName('needs-validation');
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }else {
		  event.preventDefault();
		  var action = "ingreso";
		  $.ajax({
			type: "POST",
			url: "controllers/control_parking.php",
			data: $("#formRegistro").serialize() + "&action=" + action,
			success: function(response){
			  var obj=$.parseJSON(response);
			  if(obj.registro == true){
				alert('Bienvenido al Sistema de Parqueadero:\nPuesto asignado: '+obj.puesto+'\nVehículo/Placa: '+obj.vehiculo+' / '+obj.placa+'');
			  }else{
			 	alert('Error en el registro \n actualizando consulta..');
			  }
			  window.location.reload(true);
			}
		  });
		  return false;
		}
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();

//Inicializa tooltip
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

//Modal salida
$(document).on('click', '.salida', function(){
var id=$(this).val();
var idPuesto=$('#puesto'+id).text();
$.ajax({
	type: "POST",
	url: "controllers/control_form.php",
	data: {idPuesto:idPuesto},
	success: function(response){
		var obj=$.parseJSON(response);
		$('#salidaParking').modal('show');
		$('#documentoS').val(obj.documento);
		$('#idTRXS').val(obj.idTRX);
		$('#nombreS').val(obj.nombre);
		$('#apellidoS').val(obj.apellido);
		$('#telefonoS').val(obj.telefono);
		$('#vehiculoS').val(obj.vehiculo);
		$('#placaS').val(obj.placa);
		$('#puestoS').val(obj.puesto);
		$('#fechaIngresoS').val(obj.ingreso);
	}
});
});

//Upd cierre TRX
$(document).on('click', '.cierreTRX', function(){
	var FechaIngreso = $("#fechaIngresoS").val();
	var FechaSalida = $("#fechaSalidaS").val();
	if(Date.parse(FechaSalida)<Date.parse(FechaIngreso)){
	  alert("La Fecha/hora de salida debe ser mayor a la de ingreso");
	  return false;
	}else{
	  var action = "salida";
	  $.ajax({
		type: "POST",
		url: "controllers/control_parking.php",
		data: $("#formSalida").serialize() + "&action=" + action,
		success: function(response){
			alert("Salida exitosa del Parqueadero, se genera Factura");
			var obj=$.parseJSON(response);
			$('#FEcliente').val(obj.cliente);
			$('#FEdocumento').val(obj.documento);
			$('#FEtelefono').val(obj.telefono);
			$('#FEvehiculo').val(obj.vehiculo);
			$('#FEplaca').val(obj.placa);
			$('#FEpuesto').val(obj.puesto);
			$('#FEfecha_ingreso').val(obj.fecha_ingreso);
			$('#FEfecha_salida').val(obj.fecha_salida);
			$('#FEtotal_fe').val(obj.total_fe);	
			document.getElementById("factura").style.display = "block";
			var options = {};
			var pdf = new jsPDF('p', 'pt', 'a4');
			pdf.addHTML($("#factura"), 45, 45, options, function() {
				pdf.save('factura.pdf');
			});
			document.getElementById("factura").style.display = "none";
			setTimeout('window.location.reload(true)',2000);
			//window.location.reload(true);
		}
	  });
	  return false;
	}
});
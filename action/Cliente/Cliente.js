
$(document).ready(function(){

  try {
  $('#cbo_plan').select2();
  $('#cbo_equipo').select2();
}
catch(error) {
 
}
  		
  	 $("#pay_mes").on("submit", function(e){
	e.preventDefault();
	var formData = new FormData(document.getElementById("pay_mes"));

	$.ajax({
		url: "process.php?action=Cliente&type=paymes",
		type: "POST",
		dataType: "HTML",
		data: formData,
		cache: false,
		contentType: false,
		processData: false
	}).done(function(result){
			if (result=="defaultValue") {
				swal({
					  title: 'Registrado!',
					  text: "Correctamente!",
					  type: 'success',
					  confirmButtonColor: '#3085d6',
					  cancelButtonColor: '#d33',
					  confirmButtonText: 'Ok!'
					}).then((result) => {
						  if (result.value) {
						    location.href ="?view=Cliente";

						  }
						  else
						  {
						  	location.href ="?view=Cliente";
						  }
					})

			}
			else
			{
					swal({
						  type: 'error',
						  title: 'Oops...',
						  text: result,
						})
			}
	});
});


	 $("#cliente_new").on("submit", function(e){
	e.preventDefault();
	var formData = new FormData(document.getElementById("cliente_new"));

	$.ajax({
		url: "process.php?action=Cliente&type=insert",
		type: "POST",
		dataType: "HTML",
		data: formData,
		cache: false,
		contentType: false,
		processData: false
	}).done(function(result){
			if (result=="defaultValue") {
				swal({
					  title: 'Registrado!',
					  text: "Correctamente!",
					  type: 'success',
					  confirmButtonColor: '#3085d6',
					  cancelButtonColor: '#d33',
					  confirmButtonText: 'Ok!'
					}).then((result) => {
						  if (result.value) {
						    location.href ="?view=Cliente";

						  }
						  else
						  {
						  	location.href ="?view=Cliente";
						  }
					})

			}
			else
			{
					swal({
						  type: 'error',
						  title: 'Oops...',
						  text: result,
						})
			}
	});
});

	  $("#cliente_edit").on("submit", function(e){
	e.preventDefault();
	var formData = new FormData(document.getElementById("cliente_edit"));

	$.ajax({
		url: "process.php?action=Cliente&type=update",
		type: "POST",
		dataType: "HTML",
		data: formData,
		cache: false,
		contentType: false,
		processData: false
	}).done(function(result){
			if (result=="defaultValue") {
				swal({
					  title: 'Modificado!',
					  text: "Correctamente!",
					  type: 'success',
					  confirmButtonColor: '#3085d6',
					  cancelButtonColor: '#d33',
					  confirmButtonText: 'Ok!'
					}).then((result) => {
						  if (result.value) {
						    location.href ="?view=Cliente";

						  }
						  else
						  {
						  	location.href ="?view=Cliente";
						  }
					})

			}
			else
			{
					swal({
						  type: 'error',
						  title: 'Oops...',
						  text: result,
						})
			}
	});
});

	

})
function Delete($pk)
{		

	swal({
  title: 'Esta Seguro de Eliminar?',
  text: "¡No podrás revertir esto!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, eliminar!'
}).then((result) => {
  if (result.value) {
    
    	var pk=$pk;
		$.ajax({
			type:'POST',
			cache:  false,
			url:'process.php?action=Cliente&type=delete',
			data:{'pk':pk}
		})
		.done(function(result){
				swal(
				      'Eliminado!',
				      'Su archivo ha sido eliminado!',
				      'success'
				    )
				cargartabla()			

		})

  }
})
		
}

function cargartabla()
{
	$.ajax({
			 url: 'process.php?action=Cliente&type=select',
		   cache: false,
		})
		.done(function(result){
			$("#table_cliente").html(result);
		})
		.fail(function(result){

		})
}


$(document).ready(function(){
   
    
     try {
  $('#cbo_status').select2();
}
catch(error) {
 
}

	 $("#usuario_new").on("submit", function(e){
	e.preventDefault();
	var formData = new FormData(document.getElementById("usuario_new"));

	$.ajax({
		url: "process.php?action=Usuarios&type=insert",
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
						    location.href ="?view=Usuarios";

						  }
						  else
						  {
						  	location.href ="?view=Usuarios";
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

	  $("#usuario_edit").on("submit", function(e){
	e.preventDefault();
	var formData = new FormData(document.getElementById("usuario_edit"));

	$.ajax({
		url: "process.php?action=Usuarios&type=update",
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
						    location.href ="?view=Usuarios";

						  }
						  else
						  {
						  	location.href ="?view=Usuarios";
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
			url:'process.php?action=Usuarios&type=delete',
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
			 url: 'process.php?action=Usuarios&type=select',
		   cache: false,
		})
		.done(function(result){
			$("#table_usuario").html(result);
		})
		.fail(function(result){

		})
}

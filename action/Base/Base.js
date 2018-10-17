
$(document).ready(function(){
    
    try {
      $('#cbo_base').select2();
}
catch(error) {
  
}

	 $("#base_new").on("submit", function(e){
	e.preventDefault();
	var formData = new FormData(document.getElementById("base_new"));

	$.ajax({
		url: "process.php?action=Base&type=insert",
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
						    location.href ="?view=Base";

						  }
						  else
						  {
						  	location.href ="?view=Base";
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

	  $("#base_edit").on("submit", function(e){
	e.preventDefault();
	var formData = new FormData(document.getElementById("base_edit"));

	$.ajax({
		url: "process.php?action=Base&type=update",
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
						    location.href ="?view=Base";

						  }
						  else
						  {
						  	location.href ="?view=Base";
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
			url:'process.php?action=Base&type=delete',
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
			 url: 'process.php?action=Base&type=select',
		   cache: false,
		})
		.done(function(result){
			$("#table_base").html(result);
		})
		.fail(function(result){

		})
}

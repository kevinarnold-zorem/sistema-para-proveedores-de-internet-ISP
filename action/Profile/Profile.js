$(document).ready(function(){

	 $("#profile").on("submit", function(e){
	e.preventDefault();
	var formData = new FormData(document.getElementById("profile"));

	$.ajax({
		url: "process.php?action=Usuarios&type=update2",
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
						    location.href ="?";

						  }
						  else
						  {
						  	location.href ="?";
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


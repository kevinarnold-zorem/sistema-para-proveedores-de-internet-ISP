$(document).ready(function(){

	 $("#login").on("submit", function(e){
	e.preventDefault();
	var formData = new FormData(document.getElementById("login"));

	$.ajax({
		url: "process.php?action=login",
		type: "POST",
		dataType: "HTML",
		data: formData,
		cache: false,
		contentType: false,
		processData: false
	}).done(function(result){
			if (result=="defaultValue") {
				window.location.replace("index.php");

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


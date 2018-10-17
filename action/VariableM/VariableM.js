
$(document).ready(function(){
	SendMessage();

	//BOTONES
	 $("#pagovmes").on("submit", function(e){
	e.preventDefault();
	var formData = new FormData(document.getElementById("pagovmes"));

	$.ajax({
		url: "process.php?action=VariableM&type=paymes",
		type: "POST",
		dataType: "HTML",
		data: formData,
		cache: false,
		contentType: false,
		processData: false
	}).done(function(result){
			if (result=="defaultValue") {
				SetMessage("index.php?view=VariableM","Se Registro Correctamente","SuccessMessage");
			}
			else
			{
				SetMessage("index.php?view=VariableM",result,"WarningMessage");
			}
	});
});


	$('#insert_VariableM').on('click',function(){
		var nombre=$('#txt_nombre').val();
		var comentario=$('#txt_comentario').val();
		var fecha_pago=$('#fecha_pago_mes').val();
		var anulado=document.getElementById('is_active').checked;

		$.ajax({
			type:'POST',
			cache:  false,
			url:'process.php?action=VariableM&type=insert',
			data:{'nombre':nombre,'fecha_pago':fecha_pago,'comentario':comentario,'anulado':anulado}
		})
		.done(function(result){
			if (result=="defaultValue") {
				SetMessage("index.php?view=VariableM","Se Registro Correctamente","SuccessMessage");
			}
			else
			{
				SetMessage("index.php?view=VariableM",result,"WarningMessage");
			}

		})
		.fail(function(result){
				if (result=="defaultValue") {
				SetMessage("index.php?view=VariableM","Se Registro Correctamente","SuccessMessage");
			}
			else
			{
				SetMessage("index.php?view=VariableM",result,"WarningMessage");
			}
		})
	})

	$('#actualizar_VariableM').on('click',function(){
		var id=$('#id').val();
		var nombre=$('#txt_nombre').val();
		var comentario=$('#txt_comentario').val();
		var fecha_pago=$('#fecha_pago_mes').val();
		var anulado=document.getElementById('is_active').checked;

		$.ajax({
			type:'POST',
			cache:  false,
			url:'process.php?action=VariableM&type=update',
			data:{'nombre':nombre,'fecha_pago':fecha_pago,'comentario':comentario,'anulado':anulado,'id':id}
		})
		.done(function(result){
			if (result=="defaultValue") {
				SetMessage("index.php?view=VariableM","Se Registro Correctamente","SuccessMessage");
			}
			else
			{
				SetMessage("index.php?view=VariableM",result,"WarningMessage");
			}

		})
		.fail(function(result){
				if (result=="defaultValue") {
				SetMessage("index.php?view=VariableM","Se Registro Correctamente","SuccessMessage");
			}
			else
			{
				SetMessage("index.php?view=VariableM",result,"WarningMessage");
			}

		})
	})

	localStorage['message']='nada';
	localStorage['type']='asd';

})
function Delete($pk)
{
		var pk=$pk;

		$.ajax({
			type:'POST',
			cache:  false,
			url:'process.php?action=VariableM&type=delete',
			data:{'pk':pk}
		})
		.done(function(result){
			if (result=="defaultValue") {
				SetMessage("index.php?view=VariableM","Se Registro Correctamente","SuccessMessage");
			}
			else
			{
				SetMessage("index.php?view=VariableM",result,"WarningMessage");
			}


		})
		.fail(function(result){
				if (result=="defaultValue") {
				SetMessage("index.php?view=VariableM","Se Registro Correctamente","SuccessMessage");
			}
			else
			{
				SetMessage("index.php?view=VariableM",result,"WarningMessage");
			}
		})
}

//SEND MESSAGE
function Message($message,$type)
{
	var message=$message;
	var type=$type;
	$.ajax({
			type:'POST',
			url:'message.php',
			data:{'message':message,'type':type}
		})
		.done(function(result){
			$('#mess').html(result);

		})
		.fail(function(){

		})	
}

function SetMessage($page,$message,$type)
{
		localStorage['message']=$message;
		localStorage['type']=$type;
		window.location.replace($page);

}
function SendMessage()
{
	var message=localStorage['message'] || 'defaultValue';
	var type=localStorage['type'] || 'defaultValue';

	if (type=='SuccessMessage') 
	{
		Message(message,type);
	}
	else if (type=='WarningMessage') 
	{
		Message(message,type);
	}


}
//END SEND MESSAGE

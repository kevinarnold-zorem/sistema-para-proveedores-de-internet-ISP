<?php 
	
if (empty($_POST['nombre'])) exit('No se recibio POST');

	function update()
	{
  	  $cuenta=new VariableM(new Connexion);
		$cuenta->setnombre($_POST['nombre']);
		$cuenta->setcomentario($_POST['comentario']);
		$cuenta->setfechapago($_POST['fecha_pago']);
		$cuenta->setaudanulado($_POST['anulado']);
		$cuenta->setfkusuario($_SESSION['id']);
		$cuenta->setpkvariablem($_POST['id']);
		
		return $cuenta->update();

	}

	echo update();
 ?>
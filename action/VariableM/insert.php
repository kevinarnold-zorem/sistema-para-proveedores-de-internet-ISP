<?php 
	
if (empty($_POST['nombre'])) exit('No se recibio POST');

	function insert()
	{
  	  $cuenta=new Variablem(new Connexion);
		$cuenta->setnombre($_POST['nombre']);
		$cuenta->setcomentario($_POST['comentario']);
		$cuenta->setfechapago($_POST['fecha_pago']);
		$cuenta->setaudanulado($_POST['anulado']);
		$cuenta->setfkusuario($_SESSION['id']);

		return $cuenta->insert();

	}

	echo insert();
 ?>
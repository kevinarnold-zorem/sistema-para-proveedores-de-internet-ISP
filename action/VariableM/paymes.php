<?php 
	
if (empty($_POST['txt_monto'])) exit('No se recibio POST');

	function insert()
	{
		$monto=$_POST['txt_monto'];
		$tabla="variablem";


  		$date=strtotime($_POST['fecha_pago_mes']);
		$año=date("Y", $date);
		$mes=date("m", $date);

		$invoice=new Transaccion(new Connexion);
		$invoice->setiid($_POST['id']);
		$invoice->setfkusuario($_SESSION['id']);
		$invoice->settabla($tabla);
		$getall=$invoice->validarmensualidad($mes,$año);
		if ($getall) {
			exit('EL PAGO DEL MES ELEGIDO YA SE REALIZO');

		}
		
//imagen
		$imagenBinaria="";
		if ($_FILES['imagen']['error'] === 4) {
			# code...
		}
		else
		{
			$imagenBinaria = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
		}

	
		//transaccion
		$transaccion=new Transaccion(new Connexion);
		$transaccion->setiid($_POST['id']);
		$transaccion->settabla($tabla);
		$transaccion->setmonto($_POST['txt_monto']);
		$transaccion->setcomentario($_POST['txt_comentario']);
		$transaccion->setfechapago($_POST['fecha_pago_mes']);
		$transaccion->setfkusuario($_SESSION['id']);
		$transaccion->setimagen($imagenBinaria);
		return $transaccion->insert();


	}

	echo insert();
 ?>
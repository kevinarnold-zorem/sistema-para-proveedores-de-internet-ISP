<?php 

	$usuario=new Login(new Connexion);
	$usuario=$usuario->getAll();

	$date=strtotime(date('Y-m-d'));
                              $ano=date("Y", $date);
                              $mes=date("m", $date);
                              $dia=date("d",$date);

	while ($usuarios = mysqli_fetch_array($usuario,MYSQLI_ASSOC)) {
							 
		$mensualidad=new Mensualidad(new Connexion);
		$mensualidad->setfkusuario($usuarios['pk_usuario']);
		$mensualidad=$mensualidad->getAllByUser($dia);

		while ($mensualidades=mysqli_fetch_array($mensualidad,MYSQLI_ASSOC)) {

			echo $mensualidades['nombre'].$mensualidades['fecha_pago_mes'];
			echo "<br>";
		}

		$variablem=new Variablem(new Connexion);
		$variablem->setfkusuario($usuarios['pk_usuario']);
		$variablem=$variablem->getAllByUser($dia);
		while ($variablems=mysqli_fetch_array($variablem,MYSQLI_ASSOC)) {

				echo $variablems['nombre'].$variablems['fecha_pago'];

		}

		$variablem2=new Variablem(new Connexion);
		$variablem2->setfkusuario($usuarios['pk_usuario']);
		$variablem2=$variablem2->getAllByUser($dia+5);
		while ($variablem2s=mysqli_fetch_array($variablem2,MYSQLI_ASSOC)) {

				echo "Dentro de 5 dias tiene que pagar : ".$variablem2s['nombre'].$variablem2s['fecha_pago'];

		}

	}


 ?>
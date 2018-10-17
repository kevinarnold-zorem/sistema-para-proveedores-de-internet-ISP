<?php 
	
	if (empty($_POST['txt_nombre'])) exit('No se digito un Nombre');
	if (empty($_POST['txt_direccion'])) exit('No se digito una Direccion');

	function insertUsuario()
	{	
		$session=new Session();
		$usuario=$session->getValue('gimax2id');

		$anulado="false";
		if (isset($_POST['is_active'])) {
			if ($_POST['is_active']=="on") {
			$anulado="true";
			}
		}

		$base=new Base(new Connexion);
		$base->setnombre($_POST['txt_nombre']);
		$base->setdireccion($_POST['txt_direccion']);
		$base->setcomentario($_POST['txt_comentario']);
		$base->setfkusuario($usuario);
		$base->setaudanulado($anulado);
		$base->setfkbase($_POST['cbo_base']);
		

		return $base->insert();

	}

	echo insertUsuario();
 ?>
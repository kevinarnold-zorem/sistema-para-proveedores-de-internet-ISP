<?php 
	
	if (empty($_POST['txt_nombre'])) exit('No se digito un Nombre');
	if (empty($_POST['txt_marca'])) exit('No se digito una Marca');
	if (empty($_POST['txt_ip'])) exit('No se digito la IP del Equipo');
	if (empty($_POST['txt_usuario'])) exit('No se digito el Usuario del Equipo');
	if (empty($_POST['txt_password'])) exit('No se digito la Contraseña del Equipo');
	if ($_POST['cbo_base']=="0") exit('No se Selecciono la Base del Equipo');

	function update()
	{	
		$session=new Session();
		$usuario=$session->getValue('gimax2id');

		$anulado="false";
		if (isset($_POST['is_active'])) {
			if ($_POST['is_active']=="on") {
			$anulado="true";
			}
		}

		$base=new Equipo(new Connexion);
		$base->setpkequipo($_POST['txt_id']);
		$base->setnombre($_POST['txt_nombre']);
		$base->setmarca($_POST['txt_marca']);
		$base->setcaracteristicas($_POST['txt_caracteristicas']);
		$base->setip($_POST['txt_ip']);
		$base->setusuario($_POST['txt_usuario']);
		$base->setpasword($_POST['txt_password']);
		$base->setfkusuario($usuario);
		$base->setaudanulado($anulado);
		$base->setfkbase($_POST['cbo_base']);
		

		return $base->update();

	}

	echo update();
 ?>
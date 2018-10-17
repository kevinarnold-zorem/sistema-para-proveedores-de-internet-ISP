<?php 
	
if (empty($_POST['txt_email'])) exit('No se digito el Correo');
if (empty($_POST['txt_usuario'])) exit('No se digito el Usuario');
if (empty($_POST['txt_nombre'])) exit('No se digito el Nombre del Usuario');
if ($_POST['cbo_status']=="0") exit('No se selecciono el nivel de Usuario');


	function update()
	{	
			$anulado="false";
		if (isset($_POST['is_active'])) {
			if ($_POST['is_active']=="on") {
			$anulado="true";
			}
		}


		 $login=new Usuario(new Connexion);
		 $login->setpkusuario($_POST['txt_id']);
		$login->setnombre($_POST['txt_nombre']);
		$login->setpasword($_POST['txt_password']);
		$login->setemail($_POST['txt_email']);
		$login->setusuario($_POST['txt_usuario']);
		$login->setstatus($_POST['cbo_status']);
		$login->setaudanulado($anulado);

		return $login->update();

	}

	echo update();
 ?>
<?php 
	
if (!isset($_POST['txt_id'])) exit('No se Recibio POST');

	function update()
	{	
		$session=new Session();
		$user=$session->getValue('gimax2id');

		$anulado="false";
		if (isset($_POST['is_active'])) {
			if ($_POST['is_active']=="on") {
			$anulado="true";
			}
		}

		$base=new Base(new Connexion);
		$base->setpkbase($_POST['txt_id']);
		$base->setnombre($_POST['txt_nombre']);
		$base->setdireccion($_POST['txt_direccion']);
		$base->setcomentario($_POST['txt_comentario']);
		$base->setfkusuario($user);
		$base->setaudanulado($anulado);
		$base->setfkbase($_POST['cbo_base']);

	
		return $base->update();

		

	}

	echo update();
 ?>
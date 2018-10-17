<?php 
	if (empty($_POST['txt_id'])) exit('No se recibio el ID');
	if (empty($_POST['txt_nombre'])) exit('No se digito un Nombre del Plan');
	if (empty($_POST['txt_monto'])) exit('No se digito el Monto del Plan');

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

		$base=new Plan(new Connexion);
		$base->setpkplan($_POST['txt_id']);
		$base->setnombre($_POST['txt_nombre']);
		$base->setmonto($_POST['txt_monto']);
		$base->setfkusuario($usuario);
		$base->setaudanulado($anulado);		

		return $base->update();

	}

	echo update();
 ?>
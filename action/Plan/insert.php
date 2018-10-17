<?php 
	
	if (empty($_POST['txt_nombre'])) exit('No se digito un Nombre del Plan');
	if (empty($_POST['txt_monto'])) exit('No se digito el Monto del Plan');
	
	function insert()
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
		$base->setnombre($_POST['txt_nombre']);
		$base->setmonto($_POST['txt_monto']);
		$base->setfkusuario($usuario);
		$base->setaudanulado($anulado);		

		return $base->insert();

	}

	echo insert();
 ?>
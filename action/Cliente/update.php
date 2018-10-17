<?php 
	if (empty($_POST['txt_id'])) exit('No se digito POST');
	if (empty($_POST['txt_dni'])) exit('No se digito el Numero de DNI del Cliente');
	if (empty($_POST['txt_nombre'])) exit('No se digito el Nombre del Cliente');
	if (empty($_POST['txt_apellido'])) exit('No se digito los Apellidos del Cliente');
	if (empty($_POST['txt_direccion'])) exit('No se digito la Direccion del Cliente');
	if (empty($_POST['fecha_pago_mes'])) exit('No seas *- No hay Fecha de Instalacion');

	if (empty($_POST['txt_celular1']) && empty($_POST['txt_celular2'])) exit('Digite Al menos un Numero de Celular');

	if ($_POST['cbo_plan']=="0") exit('No se selecciono el Plan de Pagos');
	if ($_POST['cbo_equipo']=="0") exit('No se selecciono el Equipo que Alimenta al Cliente');

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

		$base=new Cliente(new Connexion);
		$base->setpkcliente($_POST['txt_id']);
		$base->setdni($_POST['txt_dni']);
		$base->setnombre($_POST['txt_nombre']);
		$base->setapellidos($_POST['txt_apellido']);
		$base->setdireccion($_POST['txt_direccion']);
		$base->setcelular1($_POST['txt_celular1']);
		$base->setcelular2($_POST['txt_celular2']);
		$base->settelefono1($_POST['txt_telefono1']);
		$base->settelefono2($_POST['txt_telefono2']);
		$base->setfkplan($_POST['cbo_plan']);
		$base->setcreatat($_POST['fecha_pago_mes']);

		$plan=new Plan(new Connexion);
		$plan->setpkplan($_POST['cbo_plan']);
		$plan=$plan->getAllById();
		$res=$plan->fetch_array(MYSQLI_ASSOC);

		$base->setmonto($res['monto']);

		$base->setfkequipo($_POST['cbo_equipo']);
		$base->setfkusuario($usuario);
		$base->setaudanulado($anulado);		

		return $base->update();

	}

	echo update();
 ?>
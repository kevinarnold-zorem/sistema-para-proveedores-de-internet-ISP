<?php 
	
if (empty($_POST['id'])) exit('No se Recibio POST');
if (empty($_POST['txt_name'])) exit('El Campo Nombre es Nulo');
if (empty($_POST['txt_email'])) exit('El Campo Correo es Nulo');
if (empty($_POST['txt_usuario'])) exit('El Campo Correo es Nulo');

	function updateUsuario()
	{	

		$login=new Usuario(new Connexion);
		$login->setpkusuario($_POST['id']);
		$login->setnombre($_POST['txt_name']);
		$login->setpasword($_POST['txt_password']);
		$login->setemail($_POST['txt_email']);
		$login->setusuario($_POST['txt_usuario']);

		return $login->update2();

		

	}

	echo updateUsuario();
 ?>
<?php 
	
		$usuario= $_POST['txt_email']??'';
        $password=$_POST['txt_password']??'';

        if (empty($usuario) && empty($password)) {
           exit("Usuario y Contraseña no Ditado");
        }

        if (empty($usuario)) {
            exit("Usuario no Digitado");
        }
        if (empty($password)) {
            exit("Contraseña no Ditada");
        }

        $login=new Login(new Connexion);
        $login->setemail($usuario);
        $login->setpasword($password);
        $row=$login->signIn();
        
        if ($row){
            $session=new Session();
            $session->addValue('gimax2id',$row['pk_usuario']);
            $session->addValue('gimax2name',$row['nombre']);
            $session->addValue('gimax2email',$row['email']);
            $session->addValue('gimax2status',$row['status']);
            exit("defaultValue");

        }
        else {
        
            exit("Usuario o Contraseña Incorrectos");
        }
	
	
 ?>
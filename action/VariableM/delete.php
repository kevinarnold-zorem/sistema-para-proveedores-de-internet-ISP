<?php 
	
if (!isset($_POST['pk'])) exit('no se recibio el POST');
	
	 $login=new Variablem(new Connexion);
    $login->setpkvariablem($_POST['pk']);
    $login->setfkusuario($_SESSION['id']);
    $res=$login->getAllById();

    if (mysqli_num_rows($res)==null) {
        exit('No existen Datos');
    }

	function deletes()
	{
		$login=new Variablem(new Connexion);
    	  $login->setpkvariablem($_POST['pk']);
   			 $login->setfkusuario($_SESSION['id']);
		
		$login->delete();
		

	}

	echo deletes();
 ?>
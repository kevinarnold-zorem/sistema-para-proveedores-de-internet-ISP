<?php 
	
if (!isset($_POST['pk'])) exit('no se recibio el POST');
	
	 $login=new Equipo(new Connexion);
    $login->setpkequipo($_POST['pk']);
    $res=$login->getAllById();

    if (mysqli_num_rows($res)==null) {
        exit('No existen Datos');
    }

	function deletes()
	{
		$login=new Equipo(new Connexion);
    	$login->setpkequipo($_POST['pk']);
		
		$login->delete();
		

	}

	echo deletes();
 ?>
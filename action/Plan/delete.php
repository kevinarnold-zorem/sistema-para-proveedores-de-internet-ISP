<?php 
	
if (!isset($_POST['pk'])) exit('no se recibio el POST');
	
	 $login=new Plan(new Connexion);
    $login->setpkplan($_POST['pk']);
    $res=$login->getAllById();

    if (mysqli_num_rows($res)==null) {
        exit('No existen Datos');
    }

	function deletes()
	{
		$login=new Plan(new Connexion);
    	$login->setpkplan($_POST['pk']);
		
		$login->delete();
		

	}

	echo deletes();
 ?>
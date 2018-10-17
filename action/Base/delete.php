<?php 
	
if (!isset($_POST['pk'])) exit('no se recibio el POST');
	
	 $login=new Base(new Connexion);
    $login->setpkbase($_POST['pk']);
    $res=$login->getAllById();

    if (mysqli_num_rows($res)==null) {
        exit('No existen Datos');
    }

	function deletes()
	{
		$login=new Base(new Connexion);
    	$login->setpkbase($_POST['pk']);
		
		$login->delete();
		

	}

	echo deletes();
 ?>
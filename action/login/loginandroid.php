<?php 
	if(isset($_GET['email']) && isset($_GET['pass']))
	{	
		 $usuario= $_GET['email']??'';
        $password=$_GET['pass']??'';
      

        $login=new Login(new Connexion);
        $login->setemail($usuario);
        $login->setpasword($password);
        $row=$login->signIn2();
       if ($row){
         
           echo json_encode($row);

        }
        else
        {
            echo json_encode($row);
        }   
         
        
	
	}

 ?>
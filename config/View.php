<?php 
	
	class View {

	public static function load($view){
		
			//$file="view/".$_GET['views'].".php"; para evitar mucho codigo pero cambiar la forma de las demas como se usa con lo de footer y header que se jala deacuerdo al view y el script

			

		if (isset($_GET['view']) && $_GET['view']!="" && isset($_GET['type']) && $_GET['type']!="") {
			$file="view/".$_GET['view']."/".$_GET['type'].".php";
			if (file_exists($file)) {
			    spl_autoload_register(function ($class){
			        include"model/$class/$class.class.php";
			    });
				include $file;
			}
			else
			{
				echo "<b>$file</b> No Existe";
			}
			
		}
		elseif (isset($_GET['view']) && $_GET['view']!="") {
			$file="view/".$_GET['view']."/".$_GET['view'].".php";
			if (file_exists($file)) {
			    spl_autoload_register(function ($class){
			        include"model/$class/$class.class.php";
			    });
				include $file;
			}
			else
			{
				echo "<b>$file</b> No Existe";
			}
		}
		else
		{	$file="view/Home/Home.php";

			if(file_exists($file)){
				 spl_autoload_register(function ($class){
			        include"model/$class/$class.class.php";
			    });
				include $file;
			}
			else
			{
				echo "<b>$file</b> No Existe";
			}
		}

	}
}

 ?>
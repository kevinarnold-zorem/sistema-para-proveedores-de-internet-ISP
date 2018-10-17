<?php 


	/**
	 * 
	 */
	class Usuario
	{	
		public static $tablename="usuario";
		public static $created_at="NOW()";

		private $con;

		public $pk_usuario;
		public $nombre;
		public $usuario;
		public $pasword;
		public $email;
		public $aud_anulado;
		public $status;

		
		function __construct(Connexion $con)
		{
			$this->con=$con;
		}
		//variables
		public function setpkusuario($name)
		{
			$this->pk_usuario=$this->con->real_escape_string($name);
		}
		public function setusuario($name)
		{
			$this->usuario=ucwords($this->con->real_escape_string($name));
		}
		public function setnombre($name)
		{
			$this->nombre=ucwords($this->con->real_escape_string($name));
		}
		public function setpasword($name)
		{
			$this->pasword=$this->con->real_escape_string($name);
		}
		public function setemail($name)
		{
			$this->email=$this->con->real_escape_string($name);
		}
		public function setaudanulado($name)
		{
			$this->aud_anulado=$this->con->real_escape_string($name);
		}
		public function setstatus($name)
		{
			$this->status=$this->con->real_escape_string($name);;
		}
		
		//selecteds

		public function getAll()
		{
			$query="SELECT * FROM ".self::$tablename."";
			$res=$this->con->query($query);

			return $res;

		}
		public function getAllById()
		{
			$query="SELECT * FROM ".self::$tablename." WHERE pk_usuario=$this->pk_usuario";
			$res=$this->con->query($query);

			return $res;

		}

		//FUNCIONES
		public function insert()
		{	
			$this->pasword=password_hash($this->pasword,PASSWORD_DEFAULT);

			$query="INSERT INTO ".self::$tablename." ( `nombre`,`usuario`, `pasword`, `email`, `aud_anulado`, `created_at`,`status`)";

			$query.=" VALUES ('$this->nombre','$this->usuario','$this->pasword','$this->email','$this->aud_anulado',".self::$created_at.",'$this->status')";

			$this->con->query($query);

			if ( mysqli_error($this->con)) {
				return mysqli_error($this->con);
			}
			else
			{
				return "defaultValue";
			}
	
		}
		public function update()
		{

		if ($this->pasword=='') {
			$query="UPDATE ".self::$tablename."  SET `usuario`='$this->usuario',`nombre`='$this->nombre',`email`='$this->email',`aud_anulado`='$this->aud_anulado',status='$this->status'";
			}
		else
			{
			$this->pasword=password_hash($this->pasword,PASSWORD_DEFAULT);

			$query="UPDATE ".self::$tablename."  SET `usuario`='$this->usuario',`nombre`='$this->nombre',`pasword`='$this->pasword',`email`='$this->email',`aud_anulado`='$this->aud_anulado',status='$this->status'";
			}

			
			$query.=" WHERE pk_usuario=$this->pk_usuario";
			$this->con->query($query);

			if ( mysqli_error($this->con)) {
				return mysqli_error($this->con);
			}
			else
			{
				return "defaultValue";
			}


		}
		public function update2()
		{

		if ($this->pasword=='') {
			$query="UPDATE ".self::$tablename."  SET `nombre`='$this->nombre',`email`='$this->email',`usuario`='$this->usuario'";
			}
		else
			{
			$this->pasword=password_hash($this->pasword,PASSWORD_DEFAULT);

			$query="UPDATE ".self::$tablename."  SET `nombre`='$this->nombre',`usuario`='$this->usuario',`pasword`='$this->pasword',`email`='$this->email'";
			}

			
			$query.=" WHERE pk_usuario=$this->pk_usuario";
			$this->con->query($query);

			if ( mysqli_error($this->con)) {
				return mysqli_error($this->con);
			}
			else
			{
				return "defaultValue";
			}


		}
		public function delete()
		{
			$query="DELETE FROM ".self::$tablename." WHERE pk_usuario=$this->pk_usuario";
			$this->con->query($query);

			if ( mysqli_error($this->con)) {
				return mysqli_error($this->con);
			}
			else
			{
				return "defaultValue";
			}

		}

	}
 ?>
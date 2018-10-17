<?php 


	/**
	 * 
	 */
	class Equipo
	{	
		public static $tablename="equipo";
		public static $created_at="NOW()";

		private $con;

		public $pk_equipo;
		public $nombre;
		public $marca;
		public $caracteristicas;
		public $ip;
		public $usuario;
		public $pasword;
		public $fk_usuario;
		public $fk_base;
		public $creat_at;
		public $aud_anulado;

		
		function __construct(Connexion $con)
		{
			$this->con=$con;
		}
		//variables
		public function setpkequipo($name)
		{
			$this->pk_equipo=$this->con->real_escape_string($name);
		}
		public function setnombre($name)
		{
			$this->nombre=ucwords($this->con->real_escape_string($name));
		}
		public function setmarca($name)
		{
			$this->marca=$this->con->real_escape_string($name);
		}
		public function setcaracteristicas($name)
		{
			$this->caracteristicas=$this->con->real_escape_string($name);
		}
		public function setip($name)
		{
			$this->ip=$this->con->real_escape_string($name);
		}
		public function setusuario($name)
		{
			$this->usuario=$this->con->real_escape_string($name);
		}
		public function setpasword($name)
		{
			$this->pasword=$this->con->real_escape_string($name);
		}
		public function setfkusuario($name)
		{
			$this->fk_usuario=$this->con->real_escape_string($name);
		}
		public function setfkbase($name)
		{
			$this->fk_base=$this->con->real_escape_string($name);
		}
		public function setcreatat($name)
		{
			$this->creat_at=$this->con->real_escape_string($name);
		}
		public function setaudanulado($name)
		{
			$this->aud_anulado=$this->con->real_escape_string($name);
		}
		
		//selecteds

		public function getAll()
		{
			$query="SELECT * FROM ".self::$tablename."";
			$res=$this->con->query($query);

			return $res;

		}

			public function getCountAll()
		{
			$query="SELECT COUNT(pk_equipo) as equipos FROM ".self::$tablename."";
			$res=$this->con->query($query);

			return $res;

		}
			public function getCountAllTrue()
		{
			$query="SELECT COUNT(pk_equipo) as equipos FROM ".self::$tablename."  where aud_anulado='true'";
			$res=$this->con->query($query);

			return $res;

		}
			public function getCountAllFalse()
		{
			$query="SELECT COUNT(pk_equipo) as equipos FROM ".self::$tablename." where aud_anulado='false'";
			$res=$this->con->query($query);

			return $res;

		}

		public function getAlltrue()
		{
			$query="SELECT * FROM ".self::$tablename." where aud_anulado='true'";
			$res=$this->con->query($query);

			return $res;

		}
		public function getAllpkBase()
		{
			$query="SELECT * FROM cliente_base where pk_base=$this->fk_base";
			$res=$this->con->query($query);

			return $res;

		}
		public function getAllByBase()
		{
			$query="SELECT * FROM ".self::$tablename." WHERE fk_base=$this->fk_base";
			$res=$this->con->query($query);

			return $res;

		}
		public function getAllById()
		{
			$query="SELECT * FROM ".self::$tablename." WHERE pk_equipo=$this->pk_equipo";
			$res=$this->con->query($query);

			return $res;

		}

		//FUNCIONES
		public function insert()
		{	
			$query="INSERT INTO ".self::$tablename." (`nombre`, `marca`, `caracteristicas`, `ip`, `usuario`, `pasword`, `fk_usuario`, `fk_base`, `creat_at`, `created_at`, `aud_anulado`)";

			$query.=" VALUES ('$this->nombre','$this->marca','$this->caracteristicas','$this->ip','$this->usuario','$this->pasword','$this->fk_usuario','$this->fk_base','".date('Y-m-d')."',".self::$created_at.",'$this->aud_anulado')";

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

			$query="UPDATE ".self::$tablename."  SET `nombre`='$this->nombre',`marca`='$this->marca',`caracteristicas`='$this->caracteristicas',`ip`='$this->ip',`usuario`='$this->usuario',`pasword`='$this->pasword',`fk_usuario`='$this->fk_usuario',`fk_base`='$this->fk_base',`aud_anulado`='$this->aud_anulado',created_at=".self::$created_at."";
			
			$query.=" WHERE pk_equipo=$this->pk_equipo";
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
			$query="DELETE FROM ".self::$tablename." WHERE pk_equipo=$this->pk_equipo";
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
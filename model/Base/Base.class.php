<?php 


	/**
	 * 
	 */
	class Base
	{	
		public static $tablename="base";
		public static $created_at="NOW()";

		private $con;

		public $pk_base;
		public $nombre;
		public $direccion;
		public $comentario;
		public $fk_usuario;
		public $fk_base;
		public $aud_anulado;

		
		function __construct(Connexion $con)
		{
			$this->con=$con;
		}
		//variables
		public function setpkbase($name)
		{
			$this->pk_base=$this->con->real_escape_string($name);
		}
		public function setnombre($name)
		{
			$this->nombre=ucwords($this->con->real_escape_string($name));
		}
		public function setdireccion($name)
		{
			$this->direccion=$this->con->real_escape_string($name);
		}
		public function setcomentario($name)
		{
			$this->comentario=$this->con->real_escape_string($name);
		}
		public function setfkusuario($name)
		{
			$this->fk_usuario=$this->con->real_escape_string($name);
		}
		public function setfkbase($name)
		{
			$this->fk_base=$this->con->real_escape_string($name);
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
			$query="SELECT COUNT(pk_base) as bases FROM ".self::$tablename."";
			$res=$this->con->query($query);

			return $res;

		}
			public function getCountAllTrue()
		{
			$query="SELECT COUNT(pk_base) as bases FROM ".self::$tablename."  where aud_anulado='true'";
			$res=$this->con->query($query);

			return $res;

		}
			public function getCountAllFalse()
		{
			$query="SELECT COUNT(pk_base) as bases FROM ".self::$tablename." where aud_anulado='false'";
			$res=$this->con->query($query);

			return $res;

		}
		public function getAlltrue()
		{
			$query="SELECT * FROM ".self::$tablename." where aud_anulado='true'";
			$res=$this->con->query($query);

			return $res;

		}
		public function getAllById()
		{
			$query="SELECT * FROM ".self::$tablename." WHERE pk_base=$this->pk_base";
			$res=$this->con->query($query);

			return $res;

		}

		//FUNCIONES
		public function insert()
		{	
			$query="INSERT INTO ".self::$tablename." ( `nombre`, `direccion`, `comentario`, `fk_usuario`, `fk_base`, `aud_anulado`, `creat_at`, `created_at`)";

			$query.=" VALUES ('$this->nombre','$this->direccion','$this->comentario','$this->fk_usuario','$this->fk_base','$this->aud_anulado','".date('Y-m-d')."',".self::$created_at.")";

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

			$query="UPDATE ".self::$tablename."  SET `nombre`='$this->nombre',`direccion`='$this->direccion',`comentario`='$this->comentario',`fk_usuario`='$this->fk_usuario',`fk_base`='$this->fk_base',`aud_anulado`='$this->aud_anulado',created_at=".self::$created_at."";
			
			$query.=" WHERE pk_base=$this->pk_base";
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
			$query="DELETE FROM ".self::$tablename." WHERE pk_base=$this->pk_base";
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
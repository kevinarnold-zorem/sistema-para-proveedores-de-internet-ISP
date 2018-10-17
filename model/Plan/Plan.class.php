<?php 


	/**
	 * 
	 */
	class Plan
	{	
		public static $tablename="plan";
		public static $created_at="NOW()";

		private $con;

		public $pk_plan;
		public $nombre;
		public $monto;
		public $fk_usuario;
		public $aud_anulado;

		
		function __construct(Connexion $con)
		{
			$this->con=$con;
		}
		//variables
		public function setpkplan($name)
		{
			$this->pk_plan=$this->con->real_escape_string($name);
		}
		public function setnombre($name)
		{
			$this->nombre=ucwords($this->con->real_escape_string($name));
		}
		public function setmonto($name)
		{
			$this->monto=$this->con->real_escape_string($name);
		}
		public function setfkusuario($name)
		{
			$this->fk_usuario=$this->con->real_escape_string($name);
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
		public function getAlltrue()
		{
			$query="SELECT * FROM ".self::$tablename." where aud_anulado='true'";
			$res=$this->con->query($query);

			return $res;

		}
		public function getAllById()
		{
			$query="SELECT * FROM ".self::$tablename." WHERE pk_plan=$this->pk_plan";
			$res=$this->con->query($query);

			return $res;

		}

		//FUNCIONES
		public function insert()
		{	
			$query="INSERT INTO ".self::$tablename." (`nombre`, `monto`, `aud_anulado`, `created_at`, `fk_usuario`)";

			$query.=" VALUES ('$this->nombre','$this->monto','$this->aud_anulado',".self::$created_at.",'$this->fk_usuario')";

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

			$query="UPDATE ".self::$tablename."  SET `nombre`='$this->nombre',`monto`='$this->monto',`aud_anulado`='$this->aud_anulado',`fk_usuario`='$this->fk_usuario',created_at=".self::$created_at."";
			
			$query.=" WHERE pk_plan=$this->pk_plan";
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
			$query="DELETE FROM ".self::$tablename." WHERE pk_plan=$this->pk_plan";
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
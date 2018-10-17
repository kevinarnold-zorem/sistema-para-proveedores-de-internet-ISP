<?php 


	/**
	 * 
	 */
	class Variablem
	{	
		public static $tablename="variablem";
		public static $created_at="NOW()";

		private $con;

		public $pk_variablem;
		public $nombre;
		public $comentario;
		public $fecha_pago;
		public $aud_anulado;
		public $fk_usuario;

		
		function __construct(Connexion $con)
		{
			$this->con=$con;
		}
		//variables
		public function setpkvariablem($name)
		{
			$this->pk_variablem=$this->con->real_escape_string($name);
		}
		public function setnombre($name)
		{
			$this->nombre=ucwords($this->con->real_escape_string($name));
		}
		public function setcomentario($name)
		{
			$this->comentario=$this->con->real_escape_string($name);
		}
		public function setfechapago($name)
		{
			$this->fecha_pago=$this->con->real_escape_string($name);
		}
		public function setaudanulado($name)
		{
			$this->aud_anulado=$this->con->real_escape_string($name);
		}
		public function setfkusuario($name)
		{
			$this->fk_usuario=$this->con->real_escape_string($name);
		}
		
		//selecteds

		public function getAll()
		{
			$query="SELECT * FROM ".self::$tablename." WHERE fk_usuario=$this->fk_usuario";
			$res=$this->con->query($query);
			$this->con->close();
			return $res;

		}
		public function getAllById()
		{
			$query="SELECT * FROM ".self::$tablename." WHERE pk_variablem=$this->pk_variablem and fk_usuario=$this->fk_usuario";
			$res=$this->con->query($query);
			$this->con->close();


			return $res;

		}
		public function getAllByUser($dia)
		{
			$query="SELECT * FROM ".self::$tablename." WHERE  fk_usuario=$this->fk_usuario and DAY(fecha_pago)=$dia and aud_anulado='true'";
			$res=$this->con->query($query);
			$this->con->close();

			return $res;

		}

		//FUNCIONES
		public function insert()
		{	

			$query="INSERT INTO ".self::$tablename." (`nombre`, `comentario`, `fecha_pago`, `created_at`, `fk_usuario`, `aud_anulado`) ";

			$query.=" VALUES ('$this->nombre','$this->comentario','$this->fecha_pago',".self::$created_at.",'$this->fk_usuario','$this->aud_anulado')";

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

			$query="UPDATE ".self::$tablename."  SET `nombre`='$this->nombre',`comentario`='$this->comentario',`fecha_pago`='$this->fecha_pago',`aud_anulado`='$this->aud_anulado' WHERE pk_variablem=$this->pk_variablem and fk_usuario=$this->fk_usuario";

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
			$query="DELETE FROM ".self::$tablename." WHERE pk_variablem=$this->pk_variablem and fk_usuario=$this->fk_usuario";
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
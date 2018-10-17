<?php 

	class Cliente
	{	
		public static $tablename="cliente";
		public static $created_at="NOW()";

		private $con;

		public $pk_cliente;
		public $dni;
		public $nombre;
		public $apellidos;
		public $celular1;
		public $celular2;
		public $telefono1;
		public $telefono2;
		public $direccion;
		public $fk_equipo;
		public $fk_usuario;
		public $fk_plan;
		public $monto;
		public $creat_at;
		public $aud_anulado;

		
		function __construct(Connexion $con)
		{
			$this->con=$con;
		}
		//variables
		public function setpkcliente($name)
		{
			$this->pk_cliente=$this->con->real_escape_string($name);
		}
		public function setdni($name)
		{
			$this->dni=$this->con->real_escape_string($name);
		}
		public function setnombre($name)
		{
			$this->nombre=ucwords($this->con->real_escape_string($name));
		}
		public function setapellidos($name)
		{
			$this->apellidos=$this->con->real_escape_string($name);
		}
		public function setcelular1($name)
		{
			$this->celular1=$this->con->real_escape_string($name);
		}
		public function setcelular2($name)
		{
			$this->celular2=$this->con->real_escape_string($name);
		}
		public function settelefono1($name)
		{
			$this->telefono1=$this->con->real_escape_string($name);
		}
		public function settelefono2($name)
		{
			$this->telefono2=$this->con->real_escape_string($name);
		}
		public function setdireccion($name)
		{
			$this->direccion=$this->con->real_escape_string($name);
		}
		public function setfkusuario($name)
		{
			$this->fk_usuario=$this->con->real_escape_string($name);;
		}
		public function setfkequipo($name)
		{
			$this->fk_equipo=$this->con->real_escape_string($name);;
		}
		public function setfkplan($name)
		{
			$this->fk_plan=$this->con->real_escape_string($name);;
		}
		public function setmonto($name)
		{
			$this->monto=$this->con->real_escape_string($name);;
		}
		public function setcreatat($name)
		{
			$this->creat_at=$this->con->real_escape_string($name);;
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
			$query="SELECT COUNT(pk_cliente) as clientes FROM ".self::$tablename."";
			$res=$this->con->query($query);

			return $res;

		}
		public function getCountAllTrue()
		{
			$query="SELECT COUNT(pk_cliente) as clientes FROM ".self::$tablename." where aud_anulado='true'";
			$res=$this->con->query($query);

			return $res;

		}
		public function getCountAllFalse()
		{
			$query="SELECT COUNT(pk_cliente) as clientes FROM ".self::$tablename." where aud_anulado='false'";
			$res=$this->con->query($query);

			return $res;

		}
		public function getAllfkEquipo()
		{
			$query="SELECT * FROM ".self::$tablename." where fk_equipo=$this->fk_equipo";
			$res=$this->con->query($query);

			return $res;

		}
		public function getAllById()
		{
			$query="SELECT * FROM ".self::$tablename." WHERE pk_cliente=$this->pk_cliente";
			$res=$this->con->query($query);

			return $res;

		}

		//FUNCIONES
		public function insert()
		{	

			$query="INSERT INTO ".self::$tablename." (`dni`, `nombre`, `apellidos`, `celular1`, `celular2`, `telefono1`, `telefono2`, `direccion`, `fk_equipo`, `fk_usuario`, `fk_plan`, `monto`, `creat_at`, `created_at`, `aud_anulado`)";

			$query.=" VALUES ('$this->dni','$this->nombre','$this->apellidos','$this->celular1','$this->celular2','$this->telefono1','$this->telefono2','$this->direccion','$this->fk_equipo','$this->fk_usuario','$this->fk_plan','$this->monto','$this->creat_at',".self::$created_at.",'$this->aud_anulado')";

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


			$query="UPDATE ".self::$tablename."  SET `dni`='$this->dni',`nombre`='$this->nombre',`apellidos`='$this->apellidos',`celular1`='$this->celular1',celular2='$this->celular2',`telefono1`='$this->telefono1',`telefono2`='$this->telefono2',`direccion`='$this->direccion',`fk_equipo`='$this->fk_equipo',fk_usuario='$this->fk_usuario',fk_plan='$this->fk_plan',monto='$this->monto',aud_anulado='$this->aud_anulado',creat_at='$this->creat_at'";
			
			$query.=" WHERE pk_cliente=$this->pk_cliente";
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
			$query="DELETE FROM ".self::$tablename." WHERE pk_cliente=$this->pk_cliente";
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
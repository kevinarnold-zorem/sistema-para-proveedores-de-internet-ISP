<?php 


	/**
	 * 24/09/2018 estoy inspirado ......
	 */
	class Transaccion
	{	
		public static $tablename="transaccion";
		public static $created_at="NOW()";

		private $con;

		public $pk_transaccion;
		public $fk_invoice;
		public $monto;
		public $comentario;

		
		function __construct(Connexion $con)
		{
			$this->con=$con;
		}
		//variables
		public function setpktransaccion($name)
		{
			$this->pk_transaccion=$this->con->real_escape_string($name);
		}
		public function setfkinvoice($name)
		{
			$this->fk_invoice=ucwords($this->con->real_escape_string($name));
		}

		public function setmonto($name)
		{
			$this->monto=$this->con->real_escape_string($name);
		}
		public function setcomentario($name)
		{
			$this->comentario=$this->con->real_escape_string($name);
		}
		
		//selecteds

		public function getAllActivate()
		{
			$query="SELECT * FROM ".self::$tablename." WHERE status='activo' and fk_usuario=$this->fk_usuario";
			$res=$this->con->query($query);

			return $res;

		}

		public function getAllCobrar()
		{
			$query="SELECT * FROM ".self::$tablename." WHERE fk_invoice='$this->fk_invoice' ORDER BY ".self::$tablename.".created_at  DESC ";
			$res=$this->con->query($query);

			return $res;

		}
		public function validarmensualidad($mes,$año)
		{
			$query="SELECT * FROM ".self::$tablename." WHERE fk_usuario=$this->fk_usuario and MONTH(fecha_pago)=".$mes." and YEAR(fecha_pago)=".$año." and iid=$this->iid and tabla='$this->tabla'";
			$res=$this->con->query($query);

            return $this->con->affected_rows;            
		}

		public function existepagomes($mes,$año)
		{
			$query="SELECT * FROM ".self::$tablename." WHERE fk_usuario=$this->fk_usuario and MONTH(fecha_pago)=".$mes." and YEAR(fecha_pago)=".$año." and iid=$this->iid and tabla='$this->tabla'";
			$res=$this->con->query($query);

            return $this->con->affected_rows;            
		}

		public function getAll()
		{
			$query="SELECT * FROM ".self::$tablename."";
			$res=$this->con->query($query);

			return $res;

		}
		public function getAllById()
		{
			$query="SELECT * FROM ".self::$tablename." WHERE pk_transaccion=$this->pk_transaccion and fk_usuario=$this->fk_usuario";
			$res=$this->con->query($query);

			return $res;

		}

		//FUNCIONES
		public function insert()
		{	

			$query="INSERT INTO ".self::$tablename." ( `fk_invoice`, `monto`, `comentario`, `created_at`)";

			$query.=" VALUES ('$this->fk_invoice','$this->monto','$this->comentario',".self::$created_at.")";

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
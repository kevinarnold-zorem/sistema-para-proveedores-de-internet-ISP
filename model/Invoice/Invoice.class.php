<?php 


	/**
	 * 
	 */
	class Invoice
	{	
		public static $tablename="invoice";
		public static $created_at="NOW()";

		private $con;

		public $pk_invoice;
		public $fk_cliente;
		public $fecha_pago_mes;
		public $total;
		public $credit;
		public $status;

		
		function __construct(Connexion $con)
		{
			$this->con=$con;
		}
		//variables
		public function setpkinvoice($name)
		{
			$this->pk_invoice=$this->con->real_escape_string($name);
		}
		public function setfkcliente($name)
		{
			$this->fk_cliente=$this->con->real_escape_string($name);
		}
		public function setcredit($name)
		{
			$this->credit=$this->con->real_escape_string($name);
		}
		public function settotal($name)
		{
			$this->total=$this->con->real_escape_string($name);
		}
		public function setfechapagomes($name)
		{
			$this->fecha_pago_mes=$this->con->real_escape_string($name);
		}
		public function setstatus($name)
		{
			$this->status=$this->con->real_escape_string($name);
		}
		
		//selecteds

		public function getAll()
		{
			$query="SELECT * FROM ".self::$tablename." where fk_cliente=$this->fk_cliente ORDER BY ".self::$tablename.".fecha_pago_mes DESC";
			$res=$this->con->query($query);

			return $res;

		}
		public function getAllClientePay($mes)
		{
			$query="SELECT COUNT(pk_invoice) AS invoices FROM ".self::$tablename." where  MONTH(fecha_pago_mes)=".$mes."";
			$res=$this->con->query($query);

			return $res;

		}
		public function getCountMes($mes)
		{
			$query="SELECT COUNT(pk_invoice) AS invoices FROM ".self::$tablename." where  MONTH(created_at)=".$mes."";
			$res=$this->con->query($query);

			return $res;

		}
		public function getMeses($fecha1,$fecha2)
		{
			$query="SELECT TIMESTAMPDIFF(MONTH, '".$fecha1."', '".$fecha2."') AS meses;";
			$res=$this->con->query($query);

			return $res;
		}

		public function getAllById()
		{
			$query="SELECT * FROM ".self::$tablename." WHERE pk_invoice=$this->pk_invoice";
			$res=$this->con->query($query);

			return $res;

		}
		public function datosmensualidad($mes,$año)
		{
			$query="SELECT MONTH(fecha_pago_mes) AS mes,YEAR(fecha_pago_mes) AS year,total,credit,status FROM ".self::$tablename." WHERE fk_usuario=$this->fk_usuario and fk_mensualidad='$this->fk_mensualidad' and MONTH(created_at)=".$mes." and YEAR(created_at)=".$año." and status='debe'";
			$res=$this->con->query($query);

           return $res;           

		}
		public function createinvoicereturn($mes,$año)
		{
			$query="SELECT * FROM ".self::$tablename." WHERE MONTH(fecha_pago_mes)=".$mes." and YEAR(fecha_pago_mes)=".$año." and fk_cliente=$this->fk_cliente";
			$res=$this->con->query($query);

            return $this->con->affected_rows;            
		}

		public function validarmensualidad($mes,$año)
		{
			$query="SELECT * FROM ".self::$tablename." WHERE  MONTH(fecha_pago_mes)=".$mes." and YEAR(fecha_pago_mes)=".$año." and fk_cliente=$this->fk_cliente and status='pagado'";
			$res=$this->con->query($query);

            return $this->con->affected_rows;            
		}
		public function validarmensualidad2($mes,$año)
		{
			$query="SELECT * FROM ".self::$tablename." WHERE  MONTH(fecha_pago_mes)=".$mes." and YEAR(fecha_pago_mes)=".$año." and fk_cliente=$this->fk_cliente and status='falta'";
			$res=$this->con->query($query);

            return $this->con->affected_rows;            
		}
		public function validarmensualidad_2($mes,$año)
		{
			$query="SELECT * FROM ".self::$tablename." WHERE  MONTH(fecha_pago_mes)=".$mes." and YEAR(fecha_pago_mes)=".$año." and fk_cliente=$this->fk_cliente and status='falta'";
			$res=$this->con->query($query);

            return $res;            
		}


		public function insertinvoice()
		{
			$query="INSERT INTO ".self::$tablename." ( `fk_cliente`, `fecha_pago_mes`, `total`, `credit`, `status`, `created_at`)";

			$query.=" VALUES ('$this->fk_cliente','$this->fecha_pago_mes','$this->total','$this->credit','$this->status',".self::$created_at.")";

			$this->con->query($query);

			return mysqli_insert_id($this->con);
	
		}

		public function updateinvoice()
		{

		
			$query="UPDATE ".self::$tablename."  SET `credit`='$this->credit',`status`='$this->status'";

			$query.=" WHERE pk_invoice=$this->pk_invoice and fk_cliente=$this->fk_cliente";
			$this->con->query($query);

			return mysqli_insert_id($this->con);



		}
		public function delete()
		{
			$query="DELETE FROM ".self::$tablename." WHERE pk_invoice=$this->pk_invoice";
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
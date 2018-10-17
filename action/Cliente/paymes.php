<?php 
if (empty($_POST['id'])) exit('Deja de Mover, Ya se quien eres .!');
if (empty($_POST['txt_monto'])) exit('El Campo del Monto esta Vacio');
if (empty($_POST['fecha_pago_mes'])) exit('El campo Fecha esta Vacio');
if (empty($_POST['txt_fecha_cliente'])) exit('Que haces, No muevas nada');
if (empty($_POST['monto_mensualidad'])) exit('Te lo dije, Mejor cierra tu Navegador - Ahi Voy');

if ($_POST['txt_monto']<1) {
        	exit('El Monto es digitado es invalido - Digite Nuevamente');
        }

	function insert()
	{	
		$invoice=new Invoice(new Connexion);
        $ress=$invoice->getMeses($_POST['txt_fecha_cliente'],$_POST['fecha_pago_mes']);
        $ress=$ress->fetch_array(MYSQLI_ASSOC);
        $ress=$ress['meses'];

        if ($ress<0) {
        	exit('El MES Selecciona es Menor que la Fecha de Pago del Cliente');
        }

		$monto=$_POST['txt_monto'];

  		$date=strtotime($_POST['fecha_pago_mes']);
		$año=date("Y", $date);
		$mes=date("m", $date);

		$invoice=new Invoice(new Connexion);
		$invoice->setfkcliente($_POST['id']);
		$getall=$invoice->validarmensualidad($mes,$año);
		if ($getall) {
			exit('EL PAGO DEL MES ELEGIDO YA SE REALIZO / VERIFIQUE SI FINALIZO');

		}

		$invoice=new Invoice(new Connexion);
		$invoice->setfkcliente($_POST['id']);
		$getall=$invoice->validarmensualidad2($mes,$año);

		if ($getall) {

			//existe entonces modificar el credit y status
			$invoice=new Invoice(new Connexion);
			$invoice->setfkcliente($_POST['id']);
			$res=$invoice->validarmensualidad_2($mes,$año);
			$res=$res->fetch_array(MYSQLI_ASSOC);
			$monto=$monto+$res['credit'];

			$balance=$_POST['monto_mensualidad']-$monto;

			if ($balance>0) {
				$status="falta";
			}
			else
			{
				$status="pagado";
				$monto=$_POST['monto_mensualidad'];
			}

			$invoice=new Invoice(new Connexion);
			$invoice->setfkcliente($_POST['id']);
			$invoice->setcredit($monto);
			$invoice->setpkinvoice($res['pk_invoice']);

			
			$invoice->setstatus($status);
			$invoice->updateinvoice();
			$id=$res['pk_invoice'];


		}
		else
		{

		//fin de la verificacion de el invoice si hay mes que ya pago cambiando el monto por el restante
			//insertar 
		$invoice=new Invoice(new Connexion);
		$invoice->setfkcliente($_POST['id']);
		$invoice->setfechapagomes($_POST['fecha_pago_mes']);
		$invoice->settotal($_POST['monto_mensualidad']);
		$invoice->setcredit($monto);

		$balance=$_POST['monto_mensualidad']-$monto;

		if ($balance>0) {
			$status="falta";
		}
		else
		{
			$status="pagado";
		}

		$invoice->setstatus($status);
		$id=$invoice->insertinvoice();

		}

		//transaccion
		$transaccion=new Transaccion(new Connexion);
		$transaccion->setfkinvoice($id);
		$transaccion->setmonto($_POST['txt_monto']);
		$transaccion->setcomentario($_POST['txt_comentario']);
		return $transaccion->insert();


	}

	echo insert();
 ?>
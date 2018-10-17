<?php 

	$usuario=new Login(new Connexion);
	$usuario=$usuario->getAll();

	while ($usuarios = mysqli_fetch_array($usuario,MYSQLI_ASSOC)) {
		
	

		$mensualidad=new Mensualidad(new Connexion);
		$mensualidad->setfkusuario($usuarios['pk_usuario']);
		$mensualidad=$mensualidad->getAllByUser();

		while ($mensualidades=mysqli_fetch_array($mensualidad,MYSQLI_ASSOC)) {

			if ($mensualidades['fecha_pago_mes']==date('Y-m-d')) {
				
					$login=new Invoice(new Connexion);
				    $login->setfkmensualidad($mensualidades['pk_mensualidad']);
				    $login->setfkusuario($usuarios['pk_usuario']);
				    $res=$login->getAll();

				        $fechamayor = date("Y-m-d");
                          $fecha = $mensualidades['fecha_pago_mes'];

                          $invoice=new Invoice(new Connexion);
                          $ress=$invoice->getMeses($fecha,$fechamayor);
                          $ress=$ress->fetch_array(MYSQLI_ASSOC);
                          $ress=$ress['meses'];
                          $i=0;
                          $num=1;

                          while ($i<=$ress) { 

                            $nuevafecha = strtotime('+ '.$i.' Month', strtotime($fecha));
                            $nuevafecha = date('Y-m-j',$nuevafecha);
                          
                            $date=strtotime($nuevafecha);
                              $año=date("Y", $date);
                              $mes=date("m", $date);

                          $invoice=new Invoice(new Connexion);
                          $invoice->setfkmensualidad($mensualidades['pk_mensualidad']);
                          $invoice->setfkusuario($_SESSION['id']);
                          $getall=$invoice->createinvoicereturn($mes,$año);
                            if ($getall) {
                             echo "algo";
                          }
                          else
                          {
                            ?>
                             <tr>   <td><?php echo $num;?></td>  
                                    <td><?php echo mes($mes);?></td>  
                                    <td><?php echo $año; ?></td> 
                                   <td><?php echo $mensualidades['monto']; ?></td>  
                                    <td><?php echo "0.00"; ?></td>
                                    <?php $status="debe";?>  
                                    <td><?php echo $status ?></td>
                                    <td>
                                    </td>
                               </tr>  
                            <?php
                          }
                          $i=$i+1;
                          $num++;

                          }

			}
		}

	}

 ?>
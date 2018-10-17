
<?php 
    
    if (isset($_GET['id'])==null) {
        header('Location: index.php?view=Base');
    }

    $login=new Base(new Connexion);
    $login->setpkbase($_GET['id']);
    $res=$login->getAllById();

    if (mysqli_num_rows($res)==null) {
        header('Location: index.php?view=Base');
    }

    $xd=$res->fetch_array(MYSQLI_ASSOC);
 ?>

<?php 
    $antena=new Equipo(new Connexion);
    $antena->setfkbase($xd['pk_base']);
    $res=$antena->getAllpkBase();

 ?>
  <div class="col-md-12">
              <div class="content-box-large">
                <div class="panel-heading">
                      <div class="panel-title"><h2>Clientes de la Base : <?php echo $xd['nombre']; ?></h2></div>

                       <a class="btn btn-primary signup">Descargar Excel</a>

                   </div>

                    <div>
                            <div >
                                <div >
                                    <ol class="breadcrumb text-left">
                                        <li>
                                              <a href="?"><i class="fa fa-dashboard"></i> Dashboard</a>
                                        </li>
                                        <li class="active">
                                              <a href="./?view=Base"><i class="fa fa-users"></i> Bases</a>
                                        </li>
                                        <li class="active">
                                              <a href=""><i class="fa fa-users"></i> Clientes</a>
                                        </li>
                                      
                                    </ol>
                                </div>
                            </div>
                        </div>


                  <div class="content-box-large">

          <div class="panel-body">
            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
            <thead>
              <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>DNI</th>
                <th>Meses Deuda</th>
                <th>Gestionar</th>
              </tr>
            </thead>
            <tbody id="table_base_equipo">
             <?php  
                    $num=1;
                          while($row = mysqli_fetch_array($res,MYSQLI_ASSOC))  
                          {   
                             $fechamayor = date("Y-m-d");
                              $fecha = $row['creat_at'];
                              $i=0;
                              $meses=0;

                               $invoice=new Invoice(new Connexion);
                          $RE=$invoice->getMeses($fecha,$fechamayor);
                          $RE=$RE->fetch_array(MYSQLI_ASSOC);
                          $RE=$RE['meses'];

                             while ($i<=$RE) 
                             { 

                                  $nuevafecha = strtotime('+ '.$i.' Month', strtotime($fecha));
                                   $nuevafecha = date('Y-m-j',$nuevafecha);
                          
                            $date=strtotime($nuevafecha);
                              $año=date("Y", $date);
                              $mes=date("m", $date);

                             $invoice=new Invoice(new Connexion);
                              $invoice->setfkcliente($row['pk_cliente']);
                              $getall=$invoice->validarmensualidad($mes,$año);
                              if ($getall) {
                                //si hay pago
                                $falta=new Invoice(new Connexion);
                                $falta->setfkcliente($row['pk_cliente']);
                                $falta=$falta->validarmensualidad2($mes,$año);
                                if ($falta) {
                                    $meses=$meses+1;
                                }
                              }
                              else
                              {//si no no se encontro el pago
                                $meses=$meses+1;
                              }
                              $i=$i+1;
                             }

                              ?>
                               <tr>  <td><?php echo $num;?></td> 
                                    <td><?php echo $row["nombre"];?></td>  
                                    <td><?php echo $row["dni"]; ?></td>  
                                     <td><?php 
                                      if ($row['aud_anulado']=="true") {
                                        echo $meses;
                                      }
                                       else
                                      {
                                        echo "<a class='btn btn-warning btn-outline btn-xs'>inactivo</a>";
                                      }

                                      ?></td>  
                                    <td> <?php 
                                      if ($row['aud_anulado']=="true") {
                                        ?>
                                         <a href="index.php?view=Cliente&type=abonar&id=<?php echo $row['pk_cliente'];?>" class="btn btn-warning btn-outline btn-xs">Gestionar</a>
                                        <?php
                                      }
                                      else
                                      {
                                       
                                      }
                                      ?>
                                     <a href="index.php?view=Cliente&type=Editar&id=<?php echo $row['pk_cliente'];?>" class="btn btn-warning btn-outline btn-xs">Editar</a>     
                                    </td>  
                               </tr>  
                               <?php
                               $num++;
                          }  
                          ?>  
            </tbody>
          </table>
          </div>
        </div>
                </div>
              </div>
<?php 

    
    if (isset($_GET['id'])==null) {
    echo "<script> location.replace('index.php?view=Cliente'); </script>";
    exit;
    }

    $cliente=new Cliente(new Connexion);
    $cliente->setpkcliente($_GET['id']);
    $cliente=$cliente->getAllById();

    if (mysqli_num_rows($cliente)==null) {
   echo "<script> location.replace('index.php?view=Cliente'); </script>";
    exit;
    }

    $cliente=$cliente->fetch_array(MYSQLI_ASSOC);
 
 ?>
  <?php 
    $invoice=new Invoice(new Connexion);
    $invoice->setfkcliente($cliente['pk_cliente']);
    $res=$invoice->getAll();

 ?>

 <div class="col-md-12">
              <div class="content-box-large">
                <div class="panel-heading">
                    <h2>Abonar Mensualidad - <?php echo $cliente['nombre']; ?><?php if(isset($_GET['fecha']) && !empty($_GET['fecha'])) {
                       $date=strtotime($_GET['fecha']);
                      $año=date("Y", $date);
                      $mes=date("m", $date);
                        echo "- ".mes($mes);

                    }  ?></h2>
                   </div>

                   <div>
                            <div >
                                <div >
                                     <ol class="breadcrumb text-left">
                                        <li>
                                              <a href="?"><i class="fa fa-dashboard"></i> Dashboard</a>
                                        </li>
                                        <li class="active">
                                              <a href="?view=Cliente"><i class="glyphicon glyphicon-align-center"></i> Cliente</a>
                                        </li>
                                        <li class="active">
                                              <a href="#"><i class="glyphicon glyphicon-cog"></i> Abonar Mensualidad</a>
                                        </li>                                        
                                    </ol>
                                </div>
                            </div>
                        </div>


                  <div class="content-box-large">

          <div class="panel-body">
                                
                <div class="panel-body">
          <form  class="form-horizontal" id="pay_mes">
                  <input type="hidden" id="id" name="id" value="<?php echo $cliente['pk_cliente']; ?>">
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Monto a Abonar</label>
                    <div class="col-sm-10">
                      <input  type="number" min="0" step="1" class="form-control" id="txt_monto" name="txt_monto"placeholder="Monto de la cliente por Cobrar o Pagar" value="<?php echo $cliente['monto'] ?>">
                      <input type="hidden" name="monto_mensualidad" value="<?php echo $cliente['monto'] ?>">
                    </div>
                  </div> 
                   <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Fecha de Pago Mensual</label>
                     <div class="col-sm-10">
                           <input value="<?php if(isset($_GET['fecha']) && !empty($_GET['fecha'])){echo $_GET['fecha'];} else {echo date("Y-m-d");}?>" type="text" class="form-control"  name="fecha_pago_mes" id="fecha_pago_mes" datepicker data-date-format="yyyy-mm-dd" data-auto-close="true" >
                           <input type="hidden" name="txt_fecha_cliente" id="txt_fecha_cliente" value="<?php echo $cliente['creat_at']; ?>">
                    </div>
                  </div>                
                  <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Comentario</label>
                     <div class="col-sm-10">
                     <textarea class="form-control" placeholder="Digite algun comentario" id="txt_comentario" name="txt_comentario"rows="3"></textarea>
                    </div>

                  </div>
                
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-primary">GUARDAR</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>  

         <div class="content-box-large">
            <div class="panel-heading">
                  <div class="panel-title">Meses Efectuados o Deudas</div>
                  </div>
          <div class="panel-body">
                                
                <div class="panel-body">
                 <form class="form-horizontal" role="form">
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
            <thead>
              <tr>
                <th>#</th>
                <th>Mes</th>
                <th>Año</th>
                <th>Total</th>
                <th>Credit</th>
                <th>Status</th>
                <th>Gestionar</th>
              </tr>
            </thead>
            <tbody>


               <?php 
                          $fechamayor = date("Y-m-d");
                          $fecha = $cliente['creat_at'];

                          $invoice=new Invoice(new Connexion);
                          $ress=$invoice->getMeses($fecha,$fechamayor);
                          $ress=$ress->fetch_array(MYSQLI_ASSOC);
                          $ress=$ress['meses'];
                          $i=0;
                          $num=0;

                          while ($i<=$ress) { 

                            $nuevafecha = strtotime('+ '.$i.' Month', strtotime($fecha));
                            $nuevafecha = date('Y-m-j',$nuevafecha);
                          
                            $date=strtotime($nuevafecha);
                              $año=date("Y", $date);
                              $mes=date("m", $date);

                          $invoice=new Invoice(new Connexion);
                          $invoice->setfkcliente($cliente['pk_cliente']);
                          $getall=$invoice->createinvoicereturn($mes,$año);
                            if ($getall) {
                             
                          }
                          else
                          {
                            ?>
                             <tr>   <td><?php echo $num;?></td>  
                                    <td><?php echo mes($mes);?></td>  
                                    <td><?php echo $año; ?></td> 
                                   <td><?php echo $cliente['monto']; ?></td>  
                                    <td><?php echo "0.00"; ?></td>
                                    <?php $status="debe";?>  
                                    <td>
                                       <a class='btn btn-danger btn-outline btn-xs'><?php echo $status; ?></a>
                                    </td>
                                    <td>
                                      <?php 
                                        if ($status=="debe") {
                                          ?>
                                           <a href="?view=Cliente&type=abonar&id=<?php echo $cliente['pk_cliente'];?>&fecha=<?php echo $nuevafecha ?>" class="btn btn-warning btn-outline btn-xs"><i class="glyphicon glyphicon-fire"></i></a>
                                          <?php
                                        }
                                       ?>
                                    </td>
                               </tr>  
                            <?php
                          }
                          $i=$i+1;
                          $num++;

                          }


                          ?>  

               <?php  
                //cargar invoices 
               $num=$num-1;
                          while($row = mysqli_fetch_array($res,MYSQLI_ASSOC))  
                          {  
                            $date=strtotime($row['fecha_pago_mes']);
                            $año=date("Y", $date);
                            $mes=date("m", $date);
                              ?>
                               <tr>  
                                    <td><?php echo $num;?></td>  
                                    <td><?php echo mes($mes); ?></td>  
                                    <td><?php echo $año; ?></td>
                                    <td><?php echo $row["total"]; ?></td>  
                                    <td><?php echo $row["credit"]; ?></td> 
                                    <td><?php $status=$row["status"];?>
                                    <?php if ($status=="falta"): ?>
                                      <a class='btn btn-warning btn-outline btn-xs'><?php echo $status; ?></a>
                                    <?php else: ?>
                                      <a class='btn btn-success btn-outline btn-xs'><?php echo $status; ?></a>
                                    <?php endif ?>
                                     </td>  
                                    <td>
                                      <a href="?view=Transaccion&id=<?php echo $row['pk_invoice'];?>" class="btn btn-warning btn-outline btn-xs"><i class="glyphicon glyphicon-list"></i> Ver Transacciones</a>
                                       <?php 
                                        if ($status=="falta") {
                                          ?>
                                           <a href="?view=Cliente&type=abonar&id=<?php echo $cliente['pk_cliente'];?>&fecha=<?php echo $row['fecha_pago_mes'] ?>" class="btn btn-warning btn-outline btn-xs"><i class="glyphicon glyphicon-fire"></i></a>
                                          <?php
                                        }
                                       ?>
                                    </td>  

                               </tr>  
                               <?php
                               $num++;
                          }  
                          ?>  
            </tbody>
          </table>
                </form>
              </div>
            </div>
          </div>
        </div>  
       
      

                </div>
              </div>

<?php 
function mes($mes)
    {
      if ($mes=="01") {
        return "ENERO";
      }
      if ($mes=="02") {
        return "FEBRERO";
      }
      if ($mes=="03") {
        return "MARZO";
      }
      if ($mes=="04") {
        return "ABRIL";
      }
      if ($mes=="05") {
        return "MAYO";
      }
      if ($mes=="06") {
        return "JUNIO";
      }
      if ($mes=="07") {
        return "JULIO";
      }
      if ($mes=="08") {
        return "AGOSTO";
      }
      if ($mes=="09") {
        return "SEPTIEMBRE";
      }
      if ($mes=="10") {
        return "OCTUBRE";
      }
      if ($mes=="11") {
        return "NOVIEMBRE";
      }
      if ($mes=="12") {
        return "DICIEMBRE";
      }


    }




 ?>



            
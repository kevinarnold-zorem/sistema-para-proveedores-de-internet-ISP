 <?php 

    
    if (isset($_GET['id'])==null) {
    echo "<script> location.replace('?view=Cliente'); </script>";
    exit;
    }

    $cuenta=new Invoice(new Connexion);
    $cuenta->setpkinvoice($_GET['id']);
    $cuenta=$cuenta->getAllById();

    if (mysqli_num_rows($cuenta)==null) {
   echo "<script> location.replace('?view=Cliente'); </script>";
    exit;
    }

    $cuenta=$cuenta->fetch_array(MYSQLI_ASSOC);
    
     $date=strtotime($cuenta['fecha_pago_mes']);
                            $año=date("Y", $date);
                            $mes=date("m", $date);

 ?>

 <?php 
    $login=new Transaccion(new Connexion);
    $login->setfkinvoice($cuenta['pk_invoice']);
    $res=$login->getAllCobrar();


    ///mensualidad obtner el nombre
    $mensualidad=new Cliente(new Connexion);
    $mensualidad->setpkcliente($cuenta['fk_cliente']);
    $mensualidad=$mensualidad->getAllById();
    $mensualidad=$mensualidad->fetch_array(MYSQLI_ASSOC);
 ?>
 <div class="col-md-12">
              <div class="content-box-large">
                <div class="panel-heading">
                      <div class="panel-title"><h2>Transacciones : <?php echo mes($mes);?>/<?php echo $año ?> - <?php echo $mensualidad['nombre']; ?></h2></div>

                       <a class="btn btn-primary signup" href="#">Descargar Excel</a>

                   </div>

                    <div>
                            <div >
                                <div >
                                    <ol class="breadcrumb text-left">
                                        <li>
                                              <a href="?"><i class="fa fa-dashboard"></i> Dashboard</a>
                                        </li>
                                        <li class="active">
                                              <a href="?view=Cliente"><i class="glyphicon glyphicon-align-center"></i> Clientes</a>
                                        </li>  
                                        <li class="active">
                                              <a href="#"><i class="glyphicon glyphicon-cog"></i> Transacciones</a>
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
                <th>Monto</th>
                <th>Comentario</th>
                <th>Fecha/Hora de Pago</th>
              </tr>
            </thead>
            <tbody>
               <?php      $num=1;
                          while($row = mysqli_fetch_array($res,MYSQLI_ASSOC))  
                          {  
                              ?>
                               <tr>  
                                    <td><?php echo $num;?></td>  
                                    <td><?php echo $row["monto"]; ?></td> 
                                    <td><?php echo $row["comentario"]; ?></td>  
                                    <td><?php echo $row["created_at"]; ?></td>
                                                                   
                               </tr>  
                               <?php
                               //crear un modal para mostrar la imagen 
                               $num++;
                          }  
                          ?>  
            </tbody>
          </table>
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
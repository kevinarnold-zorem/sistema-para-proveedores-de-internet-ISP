
 <?php 
    $login=new Cliente(new Connexion);
    $res=$login->getAll();

 ?>
 <div class="col-md-12">
              <div class="content-box-large">
                <div class="panel-heading">
                      <div class="panel-title"><h2>Clientes</h2></div>

                       <a class="btn btn-primary signup" href="?view=Cliente&type=Nuevo">Nuevo Cliente</a>

                   </div>

                    <div>
                            <div >
                                <div >
                                    <ol class="breadcrumb text-left">
                                        <li>
                                              <a href="?"><i class="fa fa-dashboard"></i> Dashboard</a>
                                        </li>
                                        <li class="active">
                                              <a href="./?view=Cliente"><i class="fa fa-users"></i> Cliente</a>
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
                <th>Status</th>
                <th>Gestionar</th>
              </tr>
            </thead>
            <tbody id="table_cliente">
               <?php      $num=1;
                          while($row = mysqli_fetch_array($res,MYSQLI_ASSOC))  
                          {  
                              ?>
                               <tr>  
                                    <td><?php echo $num;?></td>  
                                    <td><?php echo $row["nombre"]; ?></td>  
                                    <td><?php echo $row["dni"]; ?></td> 
                                     <td><?php if($row["aud_anulado"]=="true"){
                                     echo "<a class='btn btn-warning btn-outline btn-xs'>activo</a>";
                                     echo " ";
                                     echo "<a href='?view=Cliente&type=abonar&id=".$row['pk_cliente']."' class='btn btn-success btn-outline btn-xs'>Gestionar</a>";

                                      } else if($row["aud_anulado"]=="false") {
                                        echo "<a class='btn btn-danger btn-outline btn-xs'>inactivo</a>";
                                        
                                      }?></td>
                                    <td><a href="?view=Cliente&type=Editar&id=<?php echo $row['pk_cliente'];?>" class="btn btn-warning btn-outline btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                                    <a onclick="Delete(<?php echo $row['pk_cliente'];?>);" class="btn btn-danger btn-outline btn-xs"><i class="glyphicon glyphicon-trash"></i></a>

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
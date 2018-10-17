
 <?php 
    $equipo=new Equipo(new Connexion);
    $res=$equipo->getAll();

 ?>
 <div class="col-md-12">
              <div class="content-box-large">
                <div class="panel-heading">
                      <div class="panel-title"><h2>Equipos</h2></div>

                       <a class="btn btn-primary signup" href="?view=Equipo&type=Nuevo">Nueva Equipo</a>

                   </div>

                    <div>
                            <div >
                                <div >
                                    <ol class="breadcrumb text-left">
                                        <li>
                                              <a href="?"><i class="fa fa-dashboard"></i> Dashboard</a>
                                        </li>
                                        <li class="active">
                                              <a href="./?view=Equipo"><i class="fa fa-users"></i> Equipo</a>
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
                <th>Marca</th>
                <th>Status</th>
                <th>Gestionar</th>
              </tr>
            </thead>
            <tbody id="table_base">
               <?php      $num=1;
                          while($row = mysqli_fetch_array($res,MYSQLI_ASSOC))  
                          {  
                              ?>
                               <tr>  
                                    <td><?php echo $num;?></td>  
                                    <td><?php echo $row["nombre"]; ?></td>  
                                    <td><?php echo $row["marca"]; ?></td>
                                    <td><?php if($row["aud_anulado"]=="true"){
                                     echo "<a class='btn btn-warning btn-outline btn-xs'>activo</a>";
                                     echo "<a href='?view=Equipo&type=Cliente&id=". $row['pk_equipo']."' class='btn btn-warning btn-outline btn-xs'>Cliente</a>";
                                      } else if($row["aud_anulado"]=="false") {
                                        echo "<a class='btn btn-danger btn-outline btn-xs'>inactivo</a>";
                                        
                                      }?></td>

                                    <td><a href="?view=Equipo&type=Editar&id=<?php echo $row['pk_equipo'];?>" class="btn btn-warning btn-outline btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                                    <a onclick="Delete(<?php echo $row['pk_equipo'];?>);" class="btn btn-danger btn-outline btn-xs"><i class="glyphicon glyphicon-trash"></i></a>        
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
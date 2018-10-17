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


 <div class="col-md-12">
              <div class="content-box-large">
                <div class="panel-heading">
                    <h2>Modificar Cliente</h2>
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
                                        <li class="active">
                                              <a href="#"><i class="fa fa-asterisk"></i> Modificar Cliente</a>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>


                  <div class="content-box-large">

          <div class="panel-body">
                                
                <div class="panel-body">
                 <form class="form-horizontal" id="cliente_edit">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">DNI</label>
                    <div class="col-sm-10">
                      <input type="number" maxlength="8" class="form-control" id="txt_dni" name="txt_dni" placeholder="Digite el Numero de DNI del Cliente" value="<?php echo $cliente['dni'] ?>">
                      <input type="hidden" id="txt_id" name="txt_id" value="<?php echo $cliente['pk_cliente'] ?>"> 
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="txt_nombre" name="txt_nombre" placeholder="Digite el Nombre del Cliente" value="<?php echo $cliente['nombre'] ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Apellidos</label>
                     <div class="col-sm-10">
                      <input type="text" class="form-control" id="txt_apellido" name="txt_apellido" placeholder="Digite los Apellidos del Cliente" value="<?php echo $cliente['apellidos'] ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Direccion</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="txt_direccion" name="txt_direccion" placeholder="Digite la Direccion del Cliente" value="<?php echo $cliente['direccion'] ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Celulares</label>
                     <div class="col-sm-10">
                      <input type="number" class="form-control" id="txt_celular1" name="txt_celular1" placeholder="Digite el Numero de Celular 1 del Cliente" value="<?php echo $cliente['celular1'] ?>">
                       <input type="number" class="form-control" id="txt_celular2" name="txt_celular2" placeholder="Digite el Numero de Celular 2 del Cliente" value="<?php echo $cliente['celular2'] ?>">
                    </div>
                  </div>
                   <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Telefonos</label>
                     <div class="col-sm-10">
                      <input type="number" class="form-control" id="txt_telefono1" name="txt_telefono1" placeholder="Digite el Numero de Telefono 1 del Cliente" value="<?php echo $cliente['telefono1'] ?>">
                       <input type="number" class="form-control" id="txt_telefono2" name="txt_telefono2" placeholder="Digite el Numero de Telefono 2 del Cliente" value="<?php echo $cliente['telefono2'] ?>">
                    </div>
                  </div>
                 <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Plan</label>
                     <div class="col-sm-10">
                     <select class="form-control" id="cbo_plan" name="cbo_plan">
                        <?php 
                        $base=new Plan(new Connexion);
                        $res=$base->getAlltrue();
                            while ($row=mysqli_fetch_array($res,MYSQLI_ASSOC)) {
                              ?>
                                <option value="<?php echo $row['pk_plan']; ?>" <?php if($cliente['fk_plan']==$row['pk_plan']) echo "selected"; ?>><?php echo $row['nombre']." - Monto: ".$row['monto']; ?></option>
                              <?php
                            }
                         ?>
                     </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Equipo</label>
                     <div class="col-sm-10">
                     <select class="form-control" id="cbo_equipo" name="cbo_equipo">
                        <?php 
                        $base=new Base(new Connexion);
                        $res=$base->getAlltrue();

                            while ($row=mysqli_fetch_array($res,MYSQLI_ASSOC)) {
                                 ?>
                                  <optgroup label="Base : <?php echo $row['nombre']; ?>">
                                 <?php

                                     $equipo=new Equipo(new Connexion);
                                     $equipo->setfkbase($row['pk_base']);
                                    $equipo=$equipo->getAllByBase();
                                     while ($equipos=mysqli_fetch_array($equipo,MYSQLI_ASSOC)) {
                                        ?>
                                         <option value="<?php echo $equipos['pk_equipo']; ?>" <?php if($cliente['fk_equipo']==$equipos['pk_equipo']) echo "selected"; ?>><?php echo $equipos['nombre']; ?></option>
                                        <?php
                                      }
                                ?>
                                </optgroup>
                                <?php      
                            }
                         ?>
                     </select>                        
                    </div>
                  </div>
                   <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Fecha de Instalacion</label>
                     <div class="col-sm-10">
                           <input value="<?php echo $cliente['creat_at'];?>" type="text" class="form-control"  name="fecha_pago_mes" id="fecha_pago_mes" datepicker data-date-format="yyyy-mm-dd" data-auto-close="true" >
                    </div>
                  </div>

                  <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Anulado</label>
                     <div class="col-sm-10">
                                <label class="switch switch-text switch-primary switch-pill"><input id="is_active" name="is_active" type="checkbox" class="switch-input"<?php if($cliente['aud_anulado']=="true") echo "checked"; ?>> <span data-on="On" data-off="Off" class="switch-label"></span> <span class="switch-handle"></span></label>
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
                </div>
              </div>
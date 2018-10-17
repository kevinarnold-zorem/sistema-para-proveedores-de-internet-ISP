<?php 

    if (!isset($_GET['id'])) {
    echo "<script> location.href='?view=Equipo'; </script>";
    exit;
    }

    $equipo=new Equipo(new Connexion);
    $equipo->setpkequipo($_GET['id']);
    $equipo=$equipo->getAllById();

    if (mysqli_num_rows($equipo)==null) {
    echo "<script> location.href='?view=Equipo'; </script>";
    exit;
    }

    $equipo=$equipo->fetch_array(MYSQLI_ASSOC);
 
 ?>
 <div class="col-md-12">
              <div class="content-box-large">
                <div class="panel-heading">
                    <h2>Modificar Equipo</h2>
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
                                        <li class="active">
                                              <a href="#"><i class="fa fa-asterisk"></i> Modificar Equipo</a>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>


                  <div class="content-box-large">

          <div class="panel-body">
                                
                <div class="panel-body">
                 <form class="form-horizontal" id="equipo_edit">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="txt_nombre" name="txt_nombre" placeholder="Nombre del Equipo" value="<?php echo $equipo['nombre']; ?>">
                      <input type="hidden" name="txt_id" id="txt_id" value="<?php echo $equipo['pk_equipo']; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Marca</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="txt_marca" name="txt_marca" placeholder="Marca del Equipo" value="<?php echo $equipo['marca'] ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Caracteristicas</label>
                     <div class="col-sm-10">
                      <textarea  class="form-control" id="txt_caracteristicas" name="txt_caracteristicas" placeholder="Digite las caracteristicas del Equipo"><?php echo $equipo['caracteristicas'] ?></textarea>
                    </div>
                  </div>
                   <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">IP</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="txt_ip" name="txt_ip" placeholder="Digite la ip del Equipo" value="<?php echo $equipo['ip'] ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Usuario</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="txt_usuario" name="txt_usuario" placeholder="Usuario del Equipo" value="<?php echo $equipo['usuario'] ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Pasword</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="txt_password" name="txt_password" placeholder="Contraseña del Equipo" value="<?php echo $equipo['pasword'] ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Bases</label>
                     <div class="col-sm-10">
                     <select class="form-control" id="cbo_base" name="cbo_base">
                        <option value="0" selected>Seleccione la Base a la que pertenece el Equipo</option>
                        <?php 
                        $base=new Base(new Connexion);
                        $res=$base->getAlltrue();
                            while ($row=mysqli_fetch_array($res,MYSQLI_ASSOC)) {
                              ?>
                                 <option value="<?php echo $row['pk_base']; ?>" <?php if($row['pk_base']==$equipo['fk_base']) echo "selected"; ?>><?php echo $row['nombre']; ?></option>
                              <?php
                            }
                         ?>
                     </select>
                    </div>
                  </div>

                   <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Anulado</label>
                     <div class="col-sm-10">
                                <label class="switch switch-text switch-primary switch-pill"><input id="is_active" name="is_active" type="checkbox" class="switch-input" <?php if($equipo['aud_anulado']=="true") echo "checked"; ?>> <span data-on="On" data-off="Off" class="switch-label"></span> <span class="switch-handle"></span></label>
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
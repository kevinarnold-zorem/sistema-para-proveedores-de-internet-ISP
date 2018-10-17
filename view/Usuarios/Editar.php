<?php
    if(isset($_SESSION['gimax2status']) && $_SESSION['gimax2status']=="admin"){

    }
    else
    {
          echo "<script> location.replace('?'); </script>";
    }

 ?> 
<?php 

    
    if (isset($_GET['id'])==null) {
    echo "<script> location.replace('index.php?view=Cliente'); </script>";
    exit;
    }

    $cliente=new Usuario(new Connexion);
    $cliente->setpkusuario($_GET['id']);
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
                    <h2>Nuevo Usuario</h2>
                   </div>

                   <div>
                            <div >
                                <div >
                                    <ol class="breadcrumb text-left">
                                        <li>
                                              <a href="?"><i class="fa fa-dashboard"></i> Dashboard</a>
                                        </li>
                                        <li class="active">
                                              <a href="./?view=Usuarios"><i class="fa fa-users"></i> Usuarios</a>
                                        </li>
                                        <li class="active">
                                              <a href="#"><i class="fa fa-asterisk"></i> Nuevo Usuario</a>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>


                  <div class="content-box-large">

          <div class="panel-body">
                                
                <div class="panel-body">
                 <form class="form-horizontal" id="usuario_edit">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Correo</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="txt_email" name="txt_email" placeholder="Digite el Email" value="<?php echo $cliente['email']; ?>">
                      <input type="hidden" name="txt_id" id="txt_id" value="<?php echo $cliente['pk_usuario']; ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Usuario</label>
                     <div class="col-sm-10">
                      <input type="text" class="form-control" id="txt_usuario" name="txt_usuario" placeholder="Digite el Usuario" value="<?php echo $cliente['usuario']; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Contraseña</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="txt_password" name="txt_password" placeholder="Deje en Blanco si no Modificara la Contraseña">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>
                     <div class="col-sm-10">
                      <input type="text" class="form-control" id="txt_nombre" name="txt_nombre" placeholder="Digite el Nombre del Usuario" value="<?php echo $cliente['nombre']; ?>">
                    </div>
                  </div>
                   <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Status</label>
                     <div class="col-sm-10">
                       <select class="form-control" id="cbo_status" name="cbo_status">
                        <option value="admin" <?php if($cliente['status']=="admin") echo "selected";?>>Admin</option>
                        <option value="user" <?php if($cliente['status']=="user") echo "selected";?>>User</option>
                     </select>
                    </div>
                  </div>                
                  <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Anulado</label>
                     <div class="col-sm-10">
                                <label class="switch switch-text switch-primary switch-pill"><input id="is_active" name="is_active" type="checkbox" class="switch-input" <?php if($cliente['aud_anulado']=="true") echo "checked"; ?>> <span data-on="On" data-off="Off" class="switch-label"></span> <span class="switch-handle"></span></label>
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
<?php
    if(isset($_SESSION['gimax2status']) && $_SESSION['gimax2status']=="admin"){

    }
    else
    {
          echo "<script> location.replace('?'); </script>";
    }

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
                 <form class="form-horizontal" id="usuario_new">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Correo</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="txt_email" name="txt_email" placeholder="Digite el Email">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Usuario</label>
                     <div class="col-sm-10">
                      <input type="text" class="form-control" id="txt_usuario" name="txt_usuario" placeholder="Digite el Usuario">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Contraseña</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="txt_password" name="txt_password" placeholder="Digite la Contraseña">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>
                     <div class="col-sm-10">
                      <input type="text" class="form-control" id="txt_nombre" name="txt_nombre" placeholder="Digite el Nombre del Usuario">
                    </div>
                  </div>
                   <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Status</label>
                     <div class="col-sm-10">
                       <select class="form-control" id="cbo_status" name="cbo_status">
                        <option value="0" selected>Seleccione el Nivel de Usuario</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                     </select>
                    </div>
                  </div>                
                  <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Anulado</label>
                     <div class="col-sm-10">
                                <label class="switch switch-text switch-primary switch-pill"><input id="is_active" name="is_active" type="checkbox" class="switch-input" checked="true"> <span data-on="On" data-off="Off" class="switch-label"></span> <span class="switch-handle"></span></label>
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
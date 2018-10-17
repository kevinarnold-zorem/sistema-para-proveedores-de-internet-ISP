
 <div class="col-md-12">
              <div class="content-box-large">
                <div class="panel-heading">
                    <h2>Nueva Base</h2>
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
                                              <a href="#"><i class="fa fa-asterisk"></i> Nueva Base</a>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>


                  <div class="content-box-large">

          <div class="panel-body">
                                
                <div class="panel-body">
                 <form class="form-horizontal" id="base_new">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="txt_nombre" name="txt_nombre" placeholder="Nombre de la Base">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Direccion</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="txt_direccion" name="txt_direccion" placeholder="Direccion de la Base">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Comentario</label>
                     <div class="col-sm-10">
                      <textarea  class="form-control" id="txt_comentario" name="txt_comentario" placeholder="Digite algun Comentario de la Base"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Bases</label>
                     <div class="col-sm-10">
                     <select class="form-control" id="cbo_base" name="cbo_base">
                        <option value="0" selected>Seleccione la Base que Alimenta la Nueva Base</option>
                        <?php 
                        $base=new Base(new Connexion);
                        $res=$base->getAlltrue();
                            while ($row=mysqli_fetch_array($res,MYSQLI_ASSOC)) {
                              ?>
                                <option value="<?php echo $row['pk_base']; ?>"><?php echo $row['nombre']; ?></option>
                              <?php
                            }
                         ?>
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
                      <button type="submit" class="btn btn-primary" id="insert_usuario">GUARDAR</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          

          </div>
        </div>
                </div>
              </div>
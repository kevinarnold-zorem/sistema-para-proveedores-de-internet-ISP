<?php 

    if (!isset($_GET['id'])) {
    echo "<script> location.href='./?view=Plan'; </script>";
    exit;
    }

    $plan=new Plan(new Connexion);
    $plan->setpkplan($_GET['id']);
    $plan=$plan->getAllById();

    if (mysqli_num_rows($plan)==null) {
    echo "<script> location.href='./?view=Plan'; </script>";
    exit;
    }

    $plan=$plan->fetch_array(MYSQLI_ASSOC);
 
 ?>

 <div class="col-md-12">
              <div class="content-box-large">
                <div class="panel-heading">
                    <h2>Modificar Plan de Pagos</h2>
                   </div>

                   <div>
                            <div >
                                <div >
                                    <ol class="breadcrumb text-left">
                                        <li>
                                              <a href="?"><i class="fa fa-dashboard"></i> Dashboard</a>
                                        </li>
                                        <li class="active">
                                              <a href="./?view=Plan"><i class="fa fa-users"></i> Plan</a>
                                        </li>
                                        <li class="active">
                                              <a href="#"><i class="fa fa-asterisk"></i> Modificar Plan</a>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>


                  <div class="content-box-large">

          <div class="panel-body">
                                
                <div class="panel-body">
                 <form class="form-horizontal" id="plan_edit">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="txt_nombre" name="txt_nombre" placeholder="Nombre del Plan de Pagos" value="<?php echo $plan['nombre']; ?>">
                      <input type="hidden" id="txt_id" name="txt_id" value="<?php echo $plan['pk_plan']; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Monto</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="txt_monto" name="txt_monto" placeholder="Monto del Plan de Pagos" value="<?php echo $plan['monto']; ?>">
                    </div>
                  </div>
                   <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Anulado</label>
                     <div class="col-sm-10">
                                <label class="switch switch-text switch-primary switch-pill"><input id="is_active" name="is_active" type="checkbox" class="switch-input" <?php if($plan['aud_anulado']=="true") echo "checked"; ?>> <span data-on="On" data-off="Off" class="switch-label"></span> <span class="switch-handle"></span></label>
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
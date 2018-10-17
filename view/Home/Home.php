    <?php 
        $cliente=new Cliente(new Connexion);
        $clientes=$cliente->getCountAll();
        $clienteactivo=$cliente->getCountAllTrue();
        $clientefalse=$cliente->getCountAllFalse();

        $clientes=$clientes->fetch_array(MYSQLI_ASSOC);
        $clienteactivo=$clienteactivo->fetch_array(MYSQLI_ASSOC);
        $clientefalse=$clientefalse->fetch_array(MYSQLI_ASSOC);
     ?>

    <?php 
        $base=new Base(new Connexion);
        $bases=$base->getCountAll();
        $baseactivo=$base->getCountAllTrue();
        $basefalse=$base->getCountAllFalse();

        $bases=$bases->fetch_array(MYSQLI_ASSOC);
        $baseactivo=$baseactivo->fetch_array(MYSQLI_ASSOC);
        $basefalse=$basefalse->fetch_array(MYSQLI_ASSOC);
     ?>

      <?php 
        $equipo=new Equipo(new Connexion);
        $equipos=$equipo->getCountAll();
        $equipoactivo=$equipo->getCountAllTrue();
        $equipofalse=$equipo->getCountAllFalse();

        $equipos=$equipos->fetch_array(MYSQLI_ASSOC);
        $equipoactivo=$equipoactivo->fetch_array(MYSQLI_ASSOC);
        $equipofalse=$equipofalse->fetch_array(MYSQLI_ASSOC);
     ?>

     <?php 

         $date=strtotime(date('Y-m-d'));
                      $año=date("Y", $date);
                      $mes=date("m", $date);

        $invoice=new Invoice(new Connexion);
        $invoices=$invoice->getAllClientePay($mes);
        $invocemes=$invoice->getCountMes($mes);

        $invoices=$invoices->fetch_array(MYSQLI_ASSOC);
        $invocemes=$invocemes->fetch_array(MYSQLI_ASSOC);
     ?>
    <div class="content-box-large">
                <div class="panel-heading">
                    <div class="panel-title">REPORTES :</div>
                 </div>
                <div class="panel-body">

                    <div class="row">
                        <div class="col-md-3">
                            <div class="card">
    <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Clientes :</h5>
    <p class="card-text">Numero de Clientes: <?php echo $clientes['clientes'] ?></p>
     <p class="card-text">Numero de Clientes Activos: <?php echo $clienteactivo['clientes'] ?></p>
     <p class="card-text">Numero de Clientes Inactivos: <?php echo $clientefalse['clientes'] ?></p>

    <a href="?view=Cliente" class="btn btn-primary">CLIENTES</a>
  </div>
</div>
                        </div>
                       
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card">
    <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Bases :</h5>
    <p class="card-text">Numero de Bases: <?php echo $bases['bases'] ?></p>
     <p class="card-text">Numero de Bases Activos: <?php echo $baseactivo['bases'] ?></p>
     <p class="card-text">Numero de Bases Inactivos: <?php echo $basefalse['bases'] ?></p>

    <a href="?view=Base" class="btn btn-primary">BASES</a>
  </div>
</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="card">
    <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Equipos :</h5>
    <p class="card-text">Numero de Equipos: <?php echo $equipos['equipos'] ?></p>
     <p class="card-text">Numero de Equipos Activos:  <?php echo $equipoactivo['equipos'] ?></p>
     <p class="card-text">Numero de Equipos Inactivos:  <?php echo $equipofalse['equipos'] ?></p>

    <a href="?view=Equipo" class="btn btn-primary">EQUIPOS</a>
  </div>
</div>
                        </div>
                    </div>


                      <div class="row">
                        <div class="col-md-3">
                            <div class="card">
    <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Pagos del MES :</h5>
    <p class="card-text">Numero de Pagos: <?php echo $invoices['invoices'] ?></p>
     <p class="card-text">Numero Transacciones:  <?php echo $invocemes['invoices'] ?></p>
    <p class="card-text">N. de Clientes que no Pago:  <?php echo $clienteactivo['clientes']-$invoices['invoices']; ?></p>
    <a href="?view=Cliente" class="btn btn-primary">CLIENTES</a>
  </div>
</div>
                        </div>
                    </div>

                </div>
            </div>

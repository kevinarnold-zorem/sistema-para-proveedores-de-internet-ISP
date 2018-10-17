<?php session_start();
include "config/View.php";
require_once "config/config.php";
?>

<!DOCTYPE html>
<html>
  <head>
    <title>GIMAX2</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="res/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="res/css/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="res/css/sweetalert2.min.css">    

     <?php 
  //algoritmo para cargar acciones estilos segun la vista abierta cabezera
  if (isset($_GET['view']) && $_GET['view']!="")
    { $script="view/".$_GET['view']."/header.php";
      if (file_exists($script)) {
        include $script;

      }
    }

 ?>

  </head>
  <body>
      <?php 
      if(isset($_SESSION['gimax2id'])): ?>

    <div class="header">
       <div class="container">
          <div class="row">
             <div class="col-md-5">
                <!-- Logo -->
                <div class="logo">
                   <h1><a href="?">PROYECTO GIMAX-2</a></h1>
                </div>
             </div>
             <div class="col-md-5">
                <div class="row">
                  <div class="col-lg-12">
                    
                  </div>
                </div>
             </div>
             <div class="col-md-2">
                <div class="navbar navbar-inverse" role="banner">
                    <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                      <ul class="nav navbar-nav">
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['gimax2name']; ?> <b class="caret"></b></a>
                          <ul class="dropdown-menu animated fadeInUp">
                            <li><a href="?view=Profile">Profile</a></li>
                            <li><a href="process.php?action=login&type=logout">Logout</a></li>
                          </ul>
                        </li>
                      </ul>
                    </nav>
                </div>
             </div>
          </div>
       </div>
  </div>

    <div class="page-content">
      <div class="row">
      <div class="col-md-2">
        <div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li class="<?php if(isset($_GET['view']) && $_GET['view']=="Home") echo "current" ?>"><a href="?"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
                    <?php
                       if(isset($_SESSION['gimax2status']) && $_SESSION['gimax2status']=="admin"):
                     ?>
                     <li class="<?php if(isset($_GET['view']) && $_GET['view']=="Usuarios") echo "current" ?>"><a href="?view=Usuarios"><i class="glyphicon glyphicon-user"></i> Usuarios</a></li>

                          <?php endif; ?>

                    

                    <li  class="<?php if(isset($_GET['view']) && $_GET['view']=="Cliente") echo "current" ?>"><a href="?view=Cliente"><i class="glyphicon glyphicon-align-center"></i> Clientes</a></li>

                       <li  class="<?php if(isset($_GET['view']) && $_GET['view']=="Base") echo "current" ?>"><a href="?view=Base"><i class="glyphicon glyphicon-align-center"></i> Bases</a></li>

                       <li  class="<?php if(isset($_GET['view']) && $_GET['view']=="Equipo") echo "current" ?>"><a href="?view=Equipo"><i class="glyphicon glyphicon-align-center"></i> Equipos</a></li>
                      
                       <li class="submenu">
                         <a href="#">
                            <i class="glyphicon glyphicon-random"></i> Configuracion
                            <span class="caret pull-right"></span>
                         </a>
                         <!-- Sub menu -->
                         <ul>
                            <li  class="<?php if(isset($_GET['view']) && $_GET['view']=="Plan") echo "current" ?>"><a href="?view=Plan">Plan</a></li>
                            
                        </ul>
                    </li>

                </ul>
             </div>
      </div>
 <div class="col-md-10">
               <?php View::load('index'); ?>

      </div>

 <?php else: ?>

      <div class="page-content container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <div class="login-wrapper">
             <form  id="login">

              <div class="box">
                  <div class="content-wrap">
                      <h6>Sign In</h6>
                                <h2>SITE GIMAX-2</h2>
                      <input class="form-control" type="text" placeholder="E-mail address or User" name="txt_email">
                      <input class="form-control" type="password" placeholder="Password" name="txt_password">
                      <div class="action">
                      <button type="submit" class="btn btn-primary signup">Login</button>
                      </div>                
                  </div>
              </div>
        </form>
              
          </div>
      </div>
    </div>
  </div>
      <?php endif; ?>


    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="res/bootstrap/js/bootstrap.min.js"></script>
    <script src="res/js/sweetalert2.min.js"></script>
      <script src="res/js/custom.js"></script>

        <?php if(isset($_SESSION['gimax2id'])): ?>
       <?php else: ?>
             <script src="action/login/login.js"></script>
        <?php endif; ?>

  
     <?php 
  //algoritmo para cargar acciones estilos segun la vista abierta pie de pagina
  if (isset($_GET['view']) && $_GET['view']!="")
    { $script="view/".$_GET['view']."/footer.php";
      if (file_exists($script)) {
        include $script;

      }
    }

 ?>
   <?php 
  //algoritmo para cargar acciones js segun la vista abierta
  if (isset($_GET['view']) && $_GET['view']!="")
    { $script="action/".$_GET['view']."/".$_GET['view'].".js";
      if (file_exists($script)) {
        echo "<script src='$script'></script>";
      }
    }

 ?>
  </body>
</html>
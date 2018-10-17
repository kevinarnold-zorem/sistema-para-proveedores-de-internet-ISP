

	<!--<script src="res/focus/driver.min.js"></script> -->

   <?php if (isset($_GET['view']) && $_GET['view']!="" && !isset($_GET['type'])): ?>

   
   	<link href="res/vendors/datatables/dataTables.bootstrap.css" rel="stylesheet" media="screen">
    <script src="res/vendors/datatables/js/jquery.dataTables.min.js"></script>
    <script src="res/vendors/datatables/dataTables.bootstrap.js"></script>
    <script src="res/js/tables.js"></script>

    <?php elseif (isset($_GET['type']) && $_GET['type']!="" && $_GET['type']=="Equipo" || $_GET['type']=="Cliente" || $_GET['type']=="Nuevo"): ?>
	
		<link href="res/vendors/datatables/dataTables.bootstrap.css" rel="stylesheet" media="screen">
    <script src="res/vendors/datatables/js/jquery.dataTables.min.js"></script>
    <script src="res/vendors/datatables/dataTables.bootstrap.js"></script>
    <script src="res/js/tables.js"></script>
     <script src="res/select/js/select2.min.js"></script>
   	<?php endif ?>
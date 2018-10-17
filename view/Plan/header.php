
   	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

   <?php if (isset($_GET['view']) && $_GET['view']!="" && !isset($_GET['type'])): ?>

    <?php elseif (isset($_GET['type']) && $_GET['type']!=""): ?>
    	
    <link href="res/css/forms.css" rel="stylesheet">
    <link href="res/css/switch.css" rel="stylesheet">
    <link href="res/vendors/select/bootstrap-select.min.css" rel="stylesheet">

   <!--<link href="res/focus/driver.min.css" rel="stylesheet"/> -->	
       <link href="res/select/css/select2.min.css" rel="stylesheet" />
   <?php endif ?>
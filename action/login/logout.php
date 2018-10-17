<?php

$session=new Session();
if ($session->validateSession('gimax2id'))
{
    header("location: index.php?message=Debe Iniciar Session&type=WarningMessage");
}

$session->destroySession();
header('location: index.php');

 ?>
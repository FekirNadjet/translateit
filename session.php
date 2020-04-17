<?php
require_once('controleur.php');
$cf=new project_controleur();
$iduser=$cf->userauthentifier();
header('Location:routeuruserconnecte.php');
?>

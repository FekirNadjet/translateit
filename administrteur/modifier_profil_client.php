<?php
require_once('vue.php');
require_once('controleur.php');
$c=new siteTraduction();
$c->entete();
?>
<a href="routeur_client.php">table des client</a>
<?php

$c->modifform_client();

?>

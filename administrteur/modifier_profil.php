<?php
require_once('vue.php');
require_once('controleur.php');
$c=new siteTraduction();
$c->entete();
?>
<a href="routeur_traducteur.php">table des traducteur</a>
<?php
$c->modifform();

?>

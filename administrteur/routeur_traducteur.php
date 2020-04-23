<?php
require_once('vue.php');
$c=new siteTraduction();
$c->entete();
?>
 <body id="Accueil">
 <div style="margin-top:0%">

 <a href="routeurMail.php"> Accueil </a>

 <?php
 $c->table_traducteur();
 ?>
 </div >
 </body>



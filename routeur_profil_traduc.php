 <body id="Accueil">
<?php
require_once('vue.php');
$c=new siteTraduction();
$c->entete();
$c->navigationBar();
$c->menubarTraduc();
$c->diapo();
?>


 <div class="row contenu" style="padding-top:2%">
 <?php
 $c->modifform();
 ?>
 </div >

 <footer>
  <?php

  $c->menuBar();

 ?>
 </footer>
 </body>


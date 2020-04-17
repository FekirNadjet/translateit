 <body id="Accueil">
<?php
require_once('vue.php');
$c=new siteTraduction();
$c->entete();
$c->navigationBar();
$c->menuBar();
$c->diapo();
?>


 <div class="row contenu" style="margin-top:0%">
 <?php
 $c->articles();
 $c->form();
 ?>
 </div >

 <footer>
  <?php

  $c->menuBar();

 ?>
 </footer>
 </body>


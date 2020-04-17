 <body id="Accueil">
<?php
require_once('vue.php');
$c=new siteTraduction();
$c->entete();
$c->navigationBar();
$c->menuBar();
$c->diapo();
 ?>






 <?php
 $c->articles_blog();
 ?>

 <footer>
  <?php

  $c->menuBar();

 ?>

 </footer>
 </body>


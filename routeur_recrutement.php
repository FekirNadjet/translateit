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
     <div class="col-2" >  </div >
     <div class="col-8" >

        <?php

        $c->recruter();
        ?>
     </div >
   <div class="col-2" ></div >
 </div >

 <footer>
  <?php

  $c->menuBar();

 ?>
 </footer>
 </body>


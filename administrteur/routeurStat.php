<?php
require_once('vue.php');
$c=new siteTraduction();
$c->entete();
?>
 <body id="Accueil">
 <div style="margin-top:0%">
 <?php

 $c->statistique();
 if (isset($_GET['first1'])){
    echo $_GET['first1'];}
    
 ?>
 </div >
 </body>



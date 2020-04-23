<?php
require_once('vue.php');
$c=new siteTraduction();
$c->entete();
?>
 <body id="profil">
 <a href="routeurMail.php"> Accueil </a>
 <a href="routeur_traducteur.php">table des traducteur</a>
 <h3>informations personnelles </h3>
 <?php
 $c->afficher_trducteur($_GET["id"]);
 echo' <h3>historique de devis</h3>';
 $c->afficher_devis($_GET["id"]);
  echo' <h3>historique des traductions</h3>';
 $c->afficher_traduction($_GET["id"]);
?>
  </body>

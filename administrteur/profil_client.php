<?php
require_once('vue.php');
$c=new siteTraduction();
$c->entete();
?>
 <body id="profil">
  <a href="routeurMail.php"> Accueil </a>
 <a href="routeur_client.php">table des clients</a>
 <h3>informations personnelles </h3>

 <?php

 $c->afficher_client($_GET["id"]);
 echo' <h3>historique des demandes devis</h3>';
 $c->afficher_devis_client($_GET["id"]);
  echo' <h3>historique des demande traduction</h3>';

 $c->afficher_traduction_client($_GET["id"]);


?>
  </body>

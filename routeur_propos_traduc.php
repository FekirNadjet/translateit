 <body id="Accueil">
<?php
require_once('controleur.php');
require_once('vue.php');
$c=new siteTraduction();
$c->entete();
 if (isset($_GET['sub'])){
 $cf=new project_controleur();
 $td=$cf->get_name_type_controleur($_GET["traductype"]);
   foreach($td as $rowtf){
     $lg=$cf->get_name_langue_controleur($_GET["langorigine"]);
                 foreach($lg as $rowtf1){
                   $lgdes=$cf->get_name_langue_controleur($_GET["langdestin"]);
                    foreach($lgdes as $rowtf2){
                   $cf->devis_remplir_controleur($rowtf["idtype"],$rowtf1["idLangue"],$rowtf2["idLangue"],$_GET["assermen"],$_GET["comment"],$_SESSION['id']);
                   }
                   }
                   }
}
if(!isset($_SESSION['id'])){
 ?>
 <div class="row">
        <div class="col-4"></div>

     <div class="col-4" style="padding:5%;   box-shadow:5px 10px 10px 5px grey;">
        <h3>         Connectez vous, pour envoyer un devis </h3>
        <div >
          <?php
                 $c->seConnecter();
                 ?>
        </div>
        <div>
          <?php
             $c->inscrire();
             ?>
        </div>
        <div >
	    <a href="routeur.php"> <button type="button" class="btn btn-primary" style="width:100%;">retour à laccueil</button></a>
        </div>
    </div>
 <div class="col-4"></div>
</div>
<?php
}
else{


$c->navigationBar();
$c->menuBar();
$c->diapo();

?>


 <div class="row contenu" style="margin-top:5%; ">


<div class="col-4" ></div >
<div class="  col-4 " >
         <div class="row my-color">
                    <div class="align-self-center col-4" style="padding:0%" > <p style="margin:0%" > nom</p></div >
                   <div class="align-self-center col-4" style="padding:0%">  <p style="margin:0%" >prenom </p></div >
                   <div class="align-self-center col-4" style="padding:0%"> <p style="margin:0%" > asseremente</p></div >
         </div>
   <?php
         if(isset($_GET['sub']))
         {
$cf=new project_controleur();
            $qtf=$cf->recupeLangue_controleur('sub','langorigine','langdestin','traductype');
            foreach($qtf as $rowtf){
                  $qtf1=$cf->Traduc_controleur($rowtf["id_traduc"]);
                  foreach ($qtf1 as $rowtf1){
                      echo '<div class="row " style="margin-top:2%">
                      ';
                    echo  '<div class="align-self-center col-4" style="padding:0%" > <p style="margin:0%" > '.   $rowtf1["nom"]        .'</p></div > ';
                    echo  '<div class="align-self-center col-4" style="padding:0%">  <p style="margin:0%" >'.   $rowtf1["prenom"]       .'</p></div > ';
                    echo  '<div class="align-self-center col-2" style="padding:0%"> <p style="margin:0%" >'.  $rowtf1["asseremente"]    .'</p></div > ';
                    echo '
                    <form method="POST" action=""class="needs-validation md-form">
                    <button type="submit" class="btn btn-primary"  name="notif'.$rowtf["id_traduc"].'" >notifier </button>
                     </form>  ';
                     if(isset($_POST["notif".$rowtf["id_traduc"]])){
                     $qtf11=$cf->id_demande_controleur($_SESSION['id']);
                     foreach($qtf11 as $rowtf11){
                      $cf->notifier_controleur($rowtf11["id"],$rowtf["id_traduc"]);
                     }
                     }
                  echo '</div>';

                  }
                 }

         }
   ?>
</div >
<div class="col-4" ></div >
</div >
<?php
}  ?>
 </body>



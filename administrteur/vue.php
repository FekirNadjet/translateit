<?php
require_once('controleur.php');
class siteTraduction{


public function entete(){
?>
<head>


	<title> SITE DE TRADUCTION</title>
    <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>

</head>
<?php
}
public function navigationBar(){
?>
<nav style="padding: 0%;height:10%;" class="navbar navbar-dark bg-dark ">
  <div class="row " style=" padding: 0%;width:20%;height:100%;">
         <div class="col-4 align-self-center"style=" padding: 0%;">
             <a style=" padding: 0%;width:60%;height:60%;" href="" class="nav-link"><img style=" padding: 0%; width:100%;height:100%;" src="img/wath.png"  alt="" class="reseau align-middle "></a>
         </div>
         <div class="col-4 align-self-center "style=" padding: 0%;">
            <a style=" padding: 0%;width:60%;height:60%;"href="" class="nav-link"><img style=" padding: 0%; width:100%;height:100%;"  src="img/gmail.png"  alt="" class="reseau align-middle "></a>
         </div>

   </div>
</div>
</nav>
<?php
}

public function wilaya_traducteur($id){
 $cf=new administrateur_controleur();
        $qtf=$cf->wilaya_controleur($id);
        foreach($qtf as $rowtf){
        return $rowtf["nom"];
        }
}

public function commune_traducteur($id){
 $cf=new administrateur_controleur();
        $qtf=$cf->commune_controleur($id);
        foreach($qtf as $rowtf){
        return $rowtf["nom"];
        }
}

public function table_traducteur(){
?>

<table class="table" id="table_format">

 <thead class="thead-dark">
    <tr>
      <th class="option1"scope="col">Nom</th>
      <th class="option2"scope="col">prenom</th>
      <th scope="col">type de traduction</th>
      <th scope="col">langues</th>
      <th scope="col">bloquer/debloquer </th>
      <th scope="col">supprimer </th>
      <th scope="col">modifier</th>

    </tr>

 </thead>

 <tbody>
    <?php
        $cf=new administrateur_controleur();
            $qtf=$cf->info_traduc_controleur();
            foreach($qtf as $rowtf){

                  echo'<tr><td><a href="profil_traducteur.php?id='.$rowtf["id"].'">'.$rowtf["nom"].'</a></td>';
                  echo'<td><a href="profil_traducteur.php?id='.$rowtf["id"].'">'.$rowtf["prenom"].'</a></td>';
                  echo '<td>';
                                                    $types=$cf->assoctypetrad_controleur($rowtf["id"]);
                                                      foreach($types as $tp){
                                                           $typesname=$cf->typeaffich_controleur($tp["id_type"]);
                                                             foreach($typesname as $tpname){
                                                            echo '<div>'.$tpname["traductionType"].'</div>';
                                                           }
                                                      }
                  echo '</td>';
                 echo '<td>';
                                  $types=$cf->assoclanguetrad_controleur($rowtf["id"]);
                                  foreach($types as $tp){
                                  $typesname=$cf->langueaffich_controleur($tp["id_langue"]);
                                  foreach($typesname as $tpname){
                                  echo '<div>'.$tpname["langue"].'</div>';
                                  }
                                  }
                 echo '</td>';
                  echo'
                  <form method="POST" action="">
                       <td>

                             <button class="btn btn-link" name="bloqbutt'.$rowtf["id"].'"> bloquer</button>
                             <button class="btn btn-link" name="debloqbutt'.$rowtf["id"].'"> debloquer</button>
                       </td>
                  ';
                   echo'<td>
                             <button class="btn btn-link" name="supprimbutt'.$rowtf["id"].'"> supprimer</button>
                        </td>
                   </form>
                   ';
                  echo'<td><a href="modifier_profil.php?id='.$rowtf["id"].'">modifier</a></td>';
                  if(isset($_POST["bloqbutt".$rowtf["id"]])){ $cf->bloqTraduct_controleur($rowtf["id"]) ;}
                  if(isset($_POST["supprimbutt".$rowtf["id"]])){ $cf->supprimTraduct_controleur($rowtf["id"]) ;}
                  if(isset($_POST["debloqbutt".$rowtf["id"]])){ $cf->debloqTraduct_controleur($rowtf["id"]) ;}
            echo '</tr> ';
            }
    echo '  </tbody> </table>  ';
?>

<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="ddtf.js"></script>
<script>
jQuery('#table_format').ddTableFilter();
</script>


<?php


}


public function afficher_devis($id){
?>

<table class="table">

 <thead class="thead-dark">
    <tr>
      <th scope="col">reponse</th>
      <th scope="col">client</th>
      <th scope="col">langue dest</th>
      <th scope="col">langues orig</th>
      <th scope="col">type traduc</th>
      <th scope="col">commentairer</th>

    </tr>
 </thead>
 <tbody>
    <?php
        $cf=new administrateur_controleur();
            $qtf=$cf->recup_devis_traduc_controleur($id);
            foreach($qtf as $rowtf){
            echo '<tr>';
                       echo '<td>'.$rowtf["reponse"].'</td>';

               $devis=$cf->devis_controleur($rowtf["id_devis"]);
               foreach($devis as $rowtf1){
                       $typesname=$cf->useraff_controleur($rowtf1["idutilis"]);
                            foreach($typesname as $tpname){
                             echo '<td>'.$tpname["nom"].'</td>';
                             }
                       $typesname=$cf->langueaffich_controleur($rowtf1["lgdestin"]);
                            foreach($typesname as $tpname){
                            echo '<td>'.$tpname["langue"].'</td>';
                             }
                        $typesname=$cf->langueaffich_controleur($rowtf1["lgorigin"]);
                             foreach($typesname as $tpname){
                              echo '<td>'.$tpname["langue"].'</td>';
                              }
                        $typesname=$cf->typeaffich_controleur($rowtf1["typeTraduc"]);
                              foreach($typesname as $tpname){
                               echo '<td>'.$tpname["traductionType"].'</td>';
                               }
                       echo '<td>'.$rowtf1["commentaire"].'</td>';
               }
            echo '</tr> ';
            }
    echo '  </tbody> </table>  ';
}



public function afficher_traduction($id){
?>

<table class="table">

 <thead class="thead-dark">
    <tr>
      <th scope="col">client</th>
      <th scope="col">langue dest</th>
      <th scope="col">langues orig</th>
      <th scope="col">type traduc</th>
      <th scope="col">commentairer</th>

    </tr>
 </thead>
 <tbody>
    <?php
        $cf=new administrateur_controleur();
            $qtf=$cf->recup_traduction_traduc_controleur($id);
            foreach($qtf as $rowtf){
            echo '<tr>';


               $devis=$cf->traduction_controleur($rowtf["id_traduction"]);
               foreach($devis as $rowtf1){
                       $typesname=$cf->useraff_controleur($rowtf1["idutilis"]);
                            foreach($typesname as $tpname){
                             echo '<td>'.$tpname["nom"].'</td>';
                             }
                       $typesname=$cf->langueaffich_controleur($rowtf1["lgdestin"]);
                            foreach($typesname as $tpname){
                            echo '<td>'.$tpname["langue"].'</td>';
                             }
                        $typesname=$cf->langueaffich_controleur($rowtf1["lgorigin"]);
                             foreach($typesname as $tpname){
                              echo '<td>'.$tpname["langue"].'</td>';
                              }
                        $typesname=$cf->typeaffich_controleur($rowtf1["typeTraduc"]);
                              foreach($typesname as $tpname){
                               echo '<td>'.$tpname["traductionType"].'</td>';
                               }
                       echo '<td>'.$rowtf1["commentaire"].'</td>';
               }
            echo '</tr> ';
            }
    echo '  </tbody> </table>  ';
}

public function afficher_traduction_client($id){
?>

<table class="table">

 <thead class="thead-dark">
    <tr>
      <th scope="col">langue dest</th>
      <th scope="col">langues orig</th>
      <th scope="col">type traduc</th>
      <th scope="col">commentairer</th>
      <th scope="col">asseremente</th>

    </tr>
 </thead>
 <tbody>
    <?php
        $cf=new administrateur_controleur();
            $qtf=$cf->traduction_client_id_controleur($id);
            foreach($qtf as $rowtf){
            echo '<tr>';
                       $typesname=$cf->langueaffich_controleur($rowtf["lgdestin"]);
                            foreach($typesname as $tpname){
                            echo '<td>'.$tpname["langue"].'</td>';
                             }

                        $typesname=$cf->langueaffich_controleur($rowtf["lgorigin"]);
                             foreach($typesname as $tpname){
                              echo '<td>'.$tpname["langue"].'</td>';
                              }
                        $typesname=$cf->typeaffich_controleur($rowtf["typeTraduc"]);
                              foreach($typesname as $tpname){
                               echo '<td>'.$tpname["traductionType"].'</td>';
                               }
                       echo '<td>'.$rowtf["commentaire"].'</td>';
                       echo '<td>'.$rowtf["asseremente"].'</td>';

            echo '</tr> ';
            }
    echo '  </tbody> </table>  ';
}
public function afficher_devis_client($id){
?>

<table class="table">

 <thead class="thead-dark">
    <tr>
      <th scope="col">langue dest</th>
      <th scope="col">langues orig</th>
      <th scope="col">type traduc</th>
      <th scope="col">commentairer</th>
      <th scope="col">asseremente</th>

    </tr>
 </thead>
 <tbody>
    <?php
        $cf=new administrateur_controleur();
            $qtf=$cf->devis_client_id_controleur($id);
            foreach($qtf as $rowtf){
            echo '<tr>';

                       $typesname=$cf->langueaffich_controleur($rowtf["lgdestin"]);
                            foreach($typesname as $tpname){
                            echo '<td>'.$tpname["langue"].'</td>';
                             }
                        $typesname=$cf->langueaffich_controleur($rowtf["lgorigin"]);
                             foreach($typesname as $tpname){
                              echo '<td>'.$tpname["langue"].'</td>';
                              }
                        $typesname=$cf->typeaffich_controleur($rowtf["typeTraduc"]);
                              foreach($typesname as $tpname){
                               echo '<td>'.$tpname["traductionType"].'</td>';
                               }
                       echo '<td>'.$rowtf["commentaire"].'</td>';
                       echo '<td>'.$rowtf["asseremente"].'</td>';

            echo '</tr> ';
            }
    echo '  </tbody> </table>  ';
}

public function afficher_trducteur($id){
?>

<table class="table" >
 <tbody>
    <?php
    $cf=new administrateur_controleur();
        $qtf=$cf->traduc_id_controleur($id);
        foreach($qtf as $rowtf){
        echo '<tr> ';
             echo '<th scope="row">nom</>';
             echo '<td>'.$rowtf["nom"].'</td>';
         echo '</tr> ';
         echo '<tr> ';
             echo '<th scope="row">prenom</>';
             echo '<td>'.$rowtf["prenom"].'</td>';
         echo '</tr> ';
         echo '<tr> ';
             echo '<th scope="row">adresse</>';
             echo '<td>'.$rowtf["adresse"].'</td>';
         echo '</tr> ';
         echo '<tr> ';
            echo '<th scope="row">email</>';
             echo '<td>'.$rowtf["email"].'</td>';
         echo '</tr> ';
         echo '<tr> ';
            echo '<th scope="row">telephone</>';
             echo '<td>'.$rowtf["tel"].'</td>';
         echo '</tr> ';
         echo '<tr> ';
             echo '<th scope="row">fax</>';
             echo '<td>'.$rowtf["fax"].'</td>';
         echo '</tr> ';
         echo '<tr> ';

             echo '<th scope="row">wilaya</>';
             echo '<td>'.$this->wilaya_traducteur($rowtf["idWilaya"]).'</td>';
         echo '</tr> ';
         echo '<tr> ';
             echo '<th scope="row">commune</>';
             echo '<td>'.$this->commune_traducteur($rowtf["idCommune"]).'</td>';
         echo '</tr> ';
         echo '<tr> ';
            echo '<th scope="row">type traduction</>';
             echo '<td>';
                                   $types=$cf->assoctypetrad_controleur($rowtf["id"]);
                                     foreach($types as $tp){
                                          $typesname=$cf->typeaffich_controleur($tp["id_type"]);
                                            foreach($typesname as $tpname){
                                           echo '<div>'.$tpname["traductionType"].'</div>';
                                          }
                                     }
             echo '</td>';
         echo '</tr> ';
          echo '<tr> ';
                      echo '<th scope="row">asseremente</>';
                      echo '<td>'.$rowtf["asseremente"].'</td>';
           echo '</tr> ';

        }
echo '  </tbody> </table>  ';
}

public function afficher_client($id){
?>

<table class="table" >
 <tbody>
    <?php
    $cf=new administrateur_controleur();
        $qtf=$cf->client_id_controleur($id);
        foreach($qtf as $rowtf){
        echo '<tr> ';
             echo '<th scope="row">nom</>';
             echo '<td>'.$rowtf["nom"].'</td>';
         echo '</tr> ';
         echo '<tr> ';
             echo '<th scope="row">prenom</>';
             echo '<td>'.$rowtf["prenom"].'</td>';
         echo '</tr> ';
         echo '<tr> ';
             echo '<th scope="row">adresse</>';
             echo '<td>'.$rowtf["adresse"].'</td>';
         echo '</tr> ';
         echo '<tr> ';
            echo '<th scope="row">email</>';
             echo '<td>'.$rowtf["email"].'</td>';
         echo '</tr> ';
         echo '<tr> ';
            echo '<th scope="row">telephone</>';
             echo '<td>'.$rowtf["tel"].'</td>';
         echo '</tr> ';
         echo '<tr> ';
             echo '<th scope="row">fax</>';
             echo '<td>'.$rowtf["fax"].'</td>';
         echo '</tr> ';
         echo '<tr> ';

             echo '<th scope="row">wilaya</>';
             echo '<td>'.$this->wilaya_traducteur($rowtf["wilaya"]).'</td>';
         echo '</tr> ';
         echo '<tr> ';
             echo '<th scope="row">commune</>';
             echo '<td>'.$this->commune_traducteur($rowtf["commune"]).'</td>';
         echo '</tr> ';

        }
echo '  </tbody> </table>  ';
}
public function table_client(){
    ?>

    <table class="table" id="table_format2">
     <thead class="thead-dark">
        <tr>
          <th scope="col">Nom</th>
          <th scope="col">prenom</th>
          <th scope="col">bloquer/debloquer un client</th>
          <th scope="col">supprimer un client</th>
          <th scope="col">modifier</th>

        </tr>
     </thead>
     <tbody>
        <?php
            $cf=new administrateur_controleur();
                $qtf=$cf->info_client_controleur();
                foreach($qtf as $rowtf){
                      echo'<tr><td><a href="profil_client.php?id='.$rowtf["id"].'">'.$rowtf["nom"].'</a></td>';
                      echo'<td><a href="profil_client.php?id='.$rowtf["id"].'">'.$rowtf["prenom"].'</a></td>';
                      echo'
                      <form method="POST" action="">
                           <td>

                                 <button class="btn btn-link" name="bloqbuttclient'.$rowtf["id"].'"> bloquer</button>
                                 <button class="btn btn-link" name="debloqbuttclient'.$rowtf["id"].'"> debloquer</button>
                           </td>
                      ';
                       echo'<td>
                                 <button class="btn btn-link" name="supprimbutt'.$rowtf["id"].'"> supprimer</button>
                            </td>
                       </form>
                       ';
                       echo'<td><a href="modifier_profil_client.php?id='.$rowtf["id"].'">modifier</a></td>';
                      if(isset($_POST["bloqbuttclient".$rowtf["id"]])){ $cf->bloqClient_controleur($rowtf["id"]) ;}
                      if(isset($_POST["supprimbuttclient".$rowtf["id"]])){ $cf->supprimClient_controleur($rowtf["id"]) ;}
                      if(isset($_POST["debloqbuttclient".$rowtf["id"]])){ $cf->debloqClient_controleur($rowtf["id"]) ;}
                echo '</tr> ';
                }
        echo '  </tbody> </table>  ';
        ?>
        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="ddtf.js"></script>
<script>
jQuery('#table_format2').ddTableFilter();
</script>
    <?php
    }

public function statistique()
{
?>
<label> Date Debut </label>
<p id="resultat"></p>
<input type="date" name="bday1" id="first1">
<label> Date Fin</label>
<input type="date" name="bday2" id="second2">
<script>
$(document).ready(function(){
   $('#firt1').on('change',function(){
        var date = $(this).val();
        $.ajax({
        url:'routeurStat.php?date='+date,
        type:'GET',
        dataType : 'html',
        success:function(data){
            $("#resultat").html("<p>Vous avez été connecté avec succès !</p>");

        }
    })
    })};
<script>


<?php

}
public function modifform_client(){
?>
   <div class="content" >


    <div class="col-md-8 offset-md-2">
             <div class="card card-user">
               <div class="card-header">
                 <h5 class="card-title">Modifiez Votre Profile</h5>
               </div>
               <div class="card-body">
                 <form action="" method="POST">
                   <div class="row">
                     <div class="col-md-5 pr-1">
                       <div class="form-group">
                         <label>Nom</label>
                         <input type="text" name="nom1Client" class="form-control"  placeholder="Nom" value="<?php
                            $art_model=new administrateur_controleur();
                            $r=$art_model->profil_client($_GET["id"]);
                            foreach($r as $rowf)
                            {
                            $res= $rowf["nom"];
                            echo $res;
                            }
                         ?>">
                       </div>
                     </div>
                     <div class="col-md-5 px-1">
                       <div class="form-group">
                         <label>Prénom</label>
                         <input type="text" name="prenom1Client" class="form-control" placeholder="Prénom" value="<?php
                            $art_model=new administrateur_controleur();
                            $r=$art_model->profil_client($_GET["id"]);
                            foreach($r as $rowf)
                            {
                            $res= $rowf["prenom"];
                            echo $res;
                            }
                         ?>">
                       </div>
                     </div>

                   </div>
                   <div class="row">
                     <div class="col-md-5 pr-1">
                       <div class="form-group">
                           <label for="exampleInputEmail1">Email address</label>
                         <input type="email" name="mail1Client" class="form-control" placeholder="Email" value="<?php
                            $art_model=new administrateur_controleur();
                            $r=$art_model->profil_client($_GET["id"]);
                            foreach($r as $rowf)
                            {
                            $res= $rowf["email"];
                            echo $res;

                            }


                         ?>">
                       </div>
                     </div>
                     <div class="col-md-5 px-1">
                       <div class="form-group">
                         <label>Numéro De Télephone</label>
                         <input type="text" name="numtel1Client" class="form-control" placeholder="Numéro De Télephone" value="<?php
                            $art_model=new administrateur_controleur();
                            $r=$art_model->profil_client($_GET["id"]);
                            foreach($r as $rowf)
                            {
                            $res= $rowf["tel"];
                            echo $res;

                            }


                         ?>">
                       </div>
                     </div>
                   </div>
                   <div class="row">
                     <div class="col-md-10 pr-1">
                       <div class="form-group">
                         <label>Addresse</label>
                         <input type="text" name="adr1Client" class="form-control" placeholder="adresse" value="<?php
                            $art_model=new administrateur_controleur();
                            $r=$art_model->profil_client($_GET["id"]);
                            foreach($r as $rowf)
                            {
                            $res= $rowf["adresse"];
                            echo $res;

                            }


                         ?>">
                       </div>
                     </div>



                   </div>
                   <div class="row">
                     <div class="col-md-5 pr-1">
                       <div class="form-group">
                         <label>wilaya</label>
                         <input type="text" name="wil1Client" class="form-control" placeholder="wilaya" value="<?php
                            $art_model=new administrateur_controleur();
                            $r=$art_model->profil_client($_GET["id"]);
                            foreach($r as $rowf)
                            {
                            $res= $rowf["wilaya"];
                            echo $res;

                            }


                         ?>">
                       </div>
                     </div>


                     <div class="col-md-5 px-1">
                       <div class="form-group">

                         <label>commune</label>
                         <input type="text" name="com1Client" class="form-control" placeholder="commune" value="<?php

                            $art_model=new administrateur_controleur();
                            $r=$art_model->profil_client($_GET["id"]);
                            foreach($r as $rowf)
                            {
                            $res= $rowf["commune"];
                            echo $res;
                            }
                         ?>">
                       </div>
                     </div>
                   </div>

                   <div class="row">
                     <div class="update ml-auto mr-auto">

                       <button type="submit" name="btnenClient" class="btn btn-secondry btn-round" >enregistrer</button>
                     </div>
                   </div>
                 </form>
               </div>
             </div>

    </div>
   </div>



 </div>

              <?php

                  $art_model=new administrateur_controleur();
                  $r=$art_model->modifier_client('btnenClient','nom1Client','prenom1Client','mail1Client','numtel1Client','adr1Client','wil1Client','com1Client',$_GET["id"]);
}

public function modifform(){
?>
   <div class="content" >
    <div class="col-md-8 offset-md-2">
             <div class="card card-user">
               <div class="card-header">
                 <h5 class="card-title">Modifiez Votre Profile</h5>
               </div>
               <div class="card-body">
                 <form action="" method="POST">
                   <div class="row">
                     <div class="col-md-5 pr-1">
                       <div class="form-group">
                         <label>Nom</label>
                         <input type="text" name="nom1" class="form-control"  placeholder="Nom" value="<?php
                            $art_model=new administrateur_controleur();
                            $r=$art_model->profil($_GET["id"]);
                            foreach($r as $rowf)
                            {
                            $res= $rowf["nom"];
                            echo $res;
                            }
                         ?>">
                       </div>
                     </div>
                     <div class="col-md-5 px-1">
                       <div class="form-group">
                         <label>Prénom</label>
                         <input type="text" name="prenom1" class="form-control" placeholder="Prénom" value="<?php
                            $art_model=new administrateur_controleur();
                            $r=$art_model->profil($_GET["id"]);
                            foreach($r as $rowf)
                            {
                            $res= $rowf["prenom"];
                            echo $res;
                            }
                         ?>">
                       </div>
                     </div>

                   </div>
                   <div class="row">
                     <div class="col-md-5 pr-1">
                       <div class="form-group">
                           <label for="exampleInputEmail1">Email address</label>
                         <input type="email" name="mail1" class="form-control" placeholder="Email" value="<?php
                            $art_model=new administrateur_controleur();
                            $r=$art_model->profil($_GET["id"]);
                            foreach($r as $rowf)
                            {
                            $res= $rowf["email"];
                            echo $res;

                            }


                         ?>">
                       </div>
                     </div>
                     <div class="col-md-5 px-1">
                       <div class="form-group">
                         <label>Numéro De Télephone</label>
                         <input type="text" name="numtel1" class="form-control" placeholder="Numéro De Télephone" value="<?php
                            $art_model=new administrateur_controleur();
                            $r=$art_model->profil($_GET["id"]);
                            foreach($r as $rowf)
                            {
                            $res= $rowf["tel"];
                            echo $res;

                            }


                         ?>">
                       </div>
                     </div>
                   </div>
                   <div class="row">
                     <div class="col-md-10 pr-1">
                       <div class="form-group">
                         <label>Addresse</label>
                         <input type="text" name="adr1" class="form-control" placeholder="adresse" value="<?php
                            $art_model=new administrateur_controleur();
                            $r=$art_model->profil($_GET["id"]);
                            foreach($r as $rowf)
                            {
                            $res= $rowf["adresse"];
                            echo $res;

                            }


                         ?>">
                       </div>
                     </div>



                   </div>
                   <div class="row">
                     <div class="col-md-5 pr-1">
                       <div class="form-group">
                         <label>wilaya</label>
                         <input type="text" name="wil1" class="form-control" placeholder="wilaya" value="<?php
                            $art_model=new administrateur_controleur();
                            $r=$art_model->profil($_GET["id"]);
                            foreach($r as $rowf)
                            {
                            $res= $rowf["idWilaya"];
                            echo $res;

                            }


                         ?>">
                       </div>
                     </div>


                     <div class="col-md-5 px-1">
                       <div class="form-group">

                         <label>commune</label>
                         <input type="text" name="com1" class="form-control" placeholder="commune" value="<?php

                            $art_model=new administrateur_controleur();
                            $r=$art_model->profil($_GET["id"]);
                            foreach($r as $rowf)
                            {
                            $res= $rowf["idCommune"];
                            echo $res;

                            }


                         ?>">
                       </div>
                     </div>
                   </div>

                   <div class="row">
                     <div class="update ml-auto mr-auto">

                       <button type="submit" name="btnen" class="btn btn-secondry btn-round" >enregistrer</button>
                     </div>
                   </div>
                 </form>
               </div>
             </div>

    </div>
   </div>



 </div>

              <?php

                  $art_model=new administrateur_controleur();
                  $r=$art_model->modifier('btnen','nom1','prenom1','mail1','numtel1','adr1','wil1','com1',$_GET["id"]);
}

}
?>

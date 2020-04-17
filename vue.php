<?php
session_start();
require_once('controleur.php');
class siteTraduction{
public function entete(){
?>
<head>
	<title> SITE DE TRADUCTION</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
          <script  rel="text/javascript" src='jsProject.js'></script>
    <link rel="stylesheet" href="fileCss.css" >
     <script type="text/javascript"src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/js/bootstrap-multiselect.js"></script>
      <link  rel="stylesheet"src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/css/bootstrap-multiselect.css"/>
     <script  rel="text/javascript" src='jsProject.js'></script>



</head>
<?php
}
public function navigationBar(){
?>
<nav style="padding: 0%;height:10%;" class="navbar navbar-dark bg-dark ">
<div class="row" style=" padding: 0%; width:100%;height:100%;">
   <div  style=" padding: 0%;width:20%;height:100%;">
    <a style=" padding: 0%; width:100%;height:100%;" class="navbar-brand" href="#">
        <img style=" padding: 0%; width:100%;height:100%;" id="logoo" src="img/face.png"  alt="">
    </a>
  </div>
    <div class="d-flex align-items-center" style=" padding: 0%;width:60%;height:100%;">
        <h5 class="d-flex align-items-center"style="color:white;" >translate-it</h5>
    </div>
  <div class="row " style=" padding: 0%;width:20%;height:100%;">

         <div class="col-4 align-self-center"style=" padding: 0%;">
             <a style=" padding: 0%;width:60%;height:60%;" href="#" class="nav-link"><img style=" padding: 0%; width:100%;height:100%;" src="img/wath.png"  alt="" class="reseau align-middle "></a>
         </div>
         <div class="col-4 align-self-center "style=" padding: 0%;">
            <a style=" padding: 0%;width:60%;height:60%;"href="#" class="nav-link"><img style=" padding: 0%; width:100%;height:100%;"  src="img/gmail.png"  alt="" class="reseau align-middle "></a>
         </div>
         <div class="col-4 align-self-center"style=" padding: 0%;">
            <a style=" padding: 0%;width:60%;height:60%;" href="#" class="nav-link"><img style=" padding: 0%; width:100%;height:100%;" src="img/twitter.png"  alt="" class="reseau align-middle "></a>
         </div>
   </div>
</div>
</nav>
<?php
}
public function typeTraductionVue(){
 try{
        $cf=new project_controleur();
        $qtf=$cf->get_type_traduction_controleur();
        foreach($qtf as $rowtf){
        echo'<a class="dropdown-item" href="#">'.$rowtf["traductionType"].'</a>';
        }
        }
        catch(Exception $e){echo 'erreur'.$e->getMessage();}

}

public function notification($id){
 $cf=new project_controleur();
        $qtf=$cf->notification_controleur($id);
        foreach($qtf as $rowtf){

        echo'


        <form method="GET" action="routeur_proposPrix.php"class=" md-form">
              <input name="idDevis" type="hidden" value="'.$rowtf["id_devis"].'">
              <button type="submit" name="btnen" class="btn btn-link" >'.$rowtf["date"].'</button>
        </form>';
        }
}
public function notificationa($id){
 $cf=new project_controleur();
        $qtf=$cf->notification_controleura($id);
        foreach($qtf as $rowtf){
        echo'
        <form method="GET" action="routeur_proposPrix2.php"class=" md-form">
              <input name="idDevis" type="hidden" value="'.$rowtf["id_devis"].'">
              <button type="submit" name="btnen" class="btn btn-link" >'.$rowtf["date"].'</button>
        </form>';
        }
}
public function menubarTraduc(){
?>
<nav id="nnav" class="navbar navbar-expand-lg navbar-light ">
  <div class="collapse navbar-collapse" style="height:100%;width:100%;padding:0%;">
    <ul style="height:100%;width:100%;padding:0%;"class="navbar-nav menubar">
      <li class="nav-item menu text-center active">
       <?php
       if(!isset($_SESSION['id'])){
           ?>
        <a class="navLink nav-link " href="routeur.php">Accueil <span class="sr-only">(current)</span></a>
        <?php
       }
       else
       {
         ?>
       <a class="navLink nav-link " href="routeuruserconnecte.php">Accueil <span class="sr-only">(current)</span></a>
       <?php
       }
       ?>
      </li>
      <li class="nav-item dropdown menu text-center">
        <a class="navLink nav-link dropdown-toggle"  data-toggle="dropdown" id="Preview" href="#" role="button" href="#" aria-haspopup="true" aria-expanded="false">Type de traduction</a>
        <div class="dropdown-menu" aria-labelledby="Preview">
        <?php
             $this->typeTraductionVue();
        ?>


        </div>
      </li>
      <li class="nav-item dropdown menu text-center">
              <a class="navLink nav-link dropdown-toggle"  data-toggle="dropdown" id="Preview" href="#" role="button" href="#" aria-haspopup="true" aria-expanded="false">notification</a>
              <div class="dropdown-menu" aria-labelledby="Preview">
              <?php
                   $this->notification(1);
              ?>


              </div>
      </li>

         <li class="nav-item menu text-center">
              <a class="navLink nav-link" href="routeur_blog.php">Blog</a>
            </li>
      <li class="nav-item menu text-center">
                 <a class="navLink nav-link " href="liste_traducteur_routeur.php">Liste des traducteurs</a>
      </li>

      <li class="nav-item menu text-center">
          <a onclick="refadd" class="navLink nav-link" href="routeur_recrutement.php">Recrutement</a>
      </li>
      <li class="nav-item menu text-center">
          <a class="navLink nav-link" href="routeur_apropos.php">A propos</a>
       </li>



    </ul>
  </div>
</nav>




<?php
}




public function menubar(){
?>
<nav id="nnav" class="navbar navbar-expand-lg navbar-light ">
  <div class="collapse navbar-collapse" style="height:100%;width:100%;padding:0%;">
    <ul style="height:100%;width:100%;padding:0%;"class="navbar-nav menubar">
      <li class="nav-item menu text-center active">
       <?php
       if(!isset($_SESSION['id'])){
           ?>
        <a class="navLink nav-link " href="routeur.php">Accueil <span class="sr-only">(current)</span></a>
        <?php
       }
       else
       {
         ?>
       <a class="navLink nav-link " href="routeuruserconnecte.php">Accueil <span class="sr-only">(current)</span></a>
       <?php
       }
       ?>
      </li>
      <li class="nav-item dropdown menu text-center">
        <a class="navLink nav-link dropdown-toggle"  data-toggle="dropdown" id="Preview" href="#" role="button" href="#" aria-haspopup="true" aria-expanded="false">Type de traduction</a>
        <div class="dropdown-menu" aria-labelledby="Preview">
        <?php
             $this->typeTraductionVue();
        ?>


        </div>
      </li>
       <li class="nav-item dropdown menu text-center">
                    <a class="navLink nav-link dropdown-toggle"  data-toggle="dropdown" id="Preview" href="#" role="button" href="#" aria-haspopup="true" aria-expanded="false">notification</a>
                    <div class="dropdown-menu" aria-labelledby="Preview">
                    <?php
                         $this->notificationa($_SESSION['id']);
                    ?>
                    </div>
            </li>

         <li class="nav-item menu text-center">
              <a class="navLink nav-link" href="routeur_blog.php">Blog</a>
            </li>
      <li class="nav-item menu text-center">
                 <a class="navLink nav-link " href="liste_traducteur_routeur.php">Liste des traducteurs</a>
      </li>

      <li class="nav-item menu text-center">
          <a onclick="refadd" class="navLink nav-link" href="routeur_recrutement.php">Recrutement</a>
      </li>
      <li class="nav-item menu text-center">
          <a class="navLink nav-link" href="routeur_apropos.php">A propos</a>
       </li>



    </ul>
  </div>
</nav>




<?php
}
public function diapo(){
?>
 <script>

$('.carousel').carousel({
  interval: 2000
})
 </script>

<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
   <div class="carousel-inner">
      <div id="carouItem"class="carousel-item active">
        <img class="d-block slidea " src="img/trad1.jpg" alt="First slide">
      </div>
      <div id="carouItem"class="carousel-item">
        <img class="d-block slidea" src="img/trad2.jpg" alt="Second slide">
      </div>
      <div id="carouItem" class="carousel-item">
        <img class="d-block  slidea" src="img/trad3.jpg" alt="Third slide">
      </div>
    </div>

</div>
<?php
}
public function articlesTryBlog($i){
$s="Article".$i;
$ss="arc".$i;
$sss="#arc".$i;

?>
               <div class="card-header"> <h5 class="card-title">   <?php echo $s;   ?></h5></div>
               <div class="card-body suite-body">

                                     <?php

                                     ?>

                                 </p>
               </div>

<?php
}
public function articlesTry($i){
$s="Article".$i;
$ss="arc".$i;
$sss="#arc".$i;
?>
               <div class="card-header"> <h5 class="card-title">   <?php echo $s;   ?></h5></div>
               <div class="card-body suite-body">

                                     <?php
                                     try{
                                     $cf=new project_controleur();
                                     $qtf=$cf->get_presentation_controleur($i);
                                     foreach($qtf as $rowf){
                                     $presnt=substr($rowf["presentation"],0,500);
                                     echo'
                                 <p class="card-text">'.$presnt;
                                     }
                                     }
                                     catch(Exception $e){echo 'erreur'.$e->getMessage();}
                                     ?>
                                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="<?php echo $sss;   ?>"> lire la suite</button>

                                    <div class="modal-article modal fade" id="<?php echo $ss;   ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="article-dialog modal-dialog modal-dialog-scrollable"  role="document">
                                            <div class="article-content modal-content">

                                                <div class="article-header modal-header">
                                                    <h5 class="modal-title" id="Article1"><?php echo $s;   ?></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span> </button>
                                                </div>
                                                <div class="article-body modal-body">

                                                   <?php
                                                   try{
                                                    $cf=new project_controleur();
                                                    $qtf=$cf->get_presentation_controleur($i);
                                                    foreach($qtf as $rowf){
                                                                       echo'<p>'.$rowf["presentation"].'</p>';
                                                                      }
                                                    }
                                                     catch(Exception $e){echo 'erreur'.$e->getMessage();}
                                                    ?>
                                                </div>
                                                 <div class="article-footer modal-footer">
                                                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                 </div>
                                            </div>
                                        </div>
                                    </div>
                                 </p>
               </div>

<?php
}

public function articles(){
?>
    <div class="col-lg-6 parti"style="margin-top:10%;">
        <div class="mesArticles">
            <?php
            for($i=1; $i<4; $i++){
            echo'<div class="card text-white my-color  articlea" >';
            $this->articlesTry($i);
            echo'</div >';
            }
            ?>
        </div>
     </div>
<?php
}


public function articles_blog(){

/*$res=(100%4);
$wid=((100-$res)/4)-10;
*/
  ?>

        <div class="mesArticlesBlog"  >
            <?php
           try{
                                               $cf=new project_controleur();
                                               $qtf=$cf->get_presentation_all_controleur();
                                               $i=0;
                                               foreach($qtf as $rowf){
                                               $i=$i+1;
                                                echo'<div class="card text-white my-color  articleaBlog overflow-auto"  >';

                                                        $this->articlesTry($i);
                                                         echo'</div >';
                                               }
                                               }
                                               catch(Exception $e){echo 'erreur'.$e->getMessage();}


            ?>
        </div>


  <?php
  }
public function lirelasuite(){
?>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<?php
}

public function recruter(){
 $cf=new project_controleur();
?>
<form class="needs-validation md-form" style="margin-top:5%;">
                                             <div class="form-group row">
                                                        <div class="col-6">
                                                             <input required  name="prenom"type="text"  placeholder="prenom" id="lastname" class="form-control">
                                                        </div>
                                                         <div class="col-6">
                                                             <input required name="nom" type="text"  placeholder="Nom" id="name" class="form-control">
                                                          </div>
                  							</div>
                  							 <div class="form-group row">
                                                          <div class="col-6">
                                                             <?php
                                                                         $this->wilayaInput();
                                                                  ?>


                                                           </div>
                                                          <div class="col-6">
                                                                <input required name="commune" type="text"  placeholder="Commune" id="comm" class="form-control" >
                                                         </div>
                                             </div>
                                             <div class="form-group">
                                                    <input required name="adresse" type="text"  placeholder="adresse" id="adresse" class="form-control" >
                                             </div>

                                             <div class="form-group row">
                                                        <div class="col-6">
                                                               <input required name="tel"type="number"  placeholder="téléphone" id="numtel" class="form-control" >
                                                         </div>
                                                        <div class="col-6">
                                                               <input required name="fax"type="number"  placeholder="Fax" id="numfax" class="form-control" >
                                                         </div>
                                             </div>

                  							 <div name="mail" class="form-group">
                  								<input required type="email"  placeholder="email" id="mail" class="form-control" >
                  							 </div>

                  							  <div class="form-group row">
                                                    <div class="col-6">
                                                        <input required required="required" placeholder="mot de passe"type="password" class="form-control" id="password-conn">
                                                     </div>
                                                    <div class="col-6">
                                                         <input required required="required" placeholder="confirmez votre mot de passe "type="password" class="form-control" id="confirm-mdp">
                                                      </div>
                                              </div>

                                              <div class="form-group custom-file mb-3">
                                                                               <input type="file" class="custom-file-input" id="customFile" name="filename" accept="application/pdf">
                                                                                   <label class="custom-file-label" for="customFile">Votre cv </label>
                                              </div>
                                                                <label>les types de traduction maitrisées?      </label>
                                                                    <?php
                                                                    $this->typeTraducInput();
                                                                    ?>
                                                                    <br/><br/>

                                                                <label>les langues que vous maitrisez?      </label>
                                                                    <?php
                                                                    $this->languageInput();
                                                                    ?>
                                                                    <br/><br/>


                                              <div class="row">
                                                         <div class="col-6">
                                                                <label>   chargez vos références    </label>
                                                                <div class=" row">
                                                                        <div class="col-10">
                                                                            <div class="form-group custom-file mb-3">
                                                                                <input type="file" class="custom-file-input" id="customFile" name="filename">
                                                                                 <label class="custom-file-label" for="customFile">charger fichier d asserementation</label>
                                                                             </div>
                                                                        </div>
                                                                        <div class="form-group col-2">
                                                                        <button id="addref"onclick="refadd('reference');"type="button" class="btn btn-outline-primary">add</button>
                                                                        </div>
                                                                </div>

                                                               <div class=" row" id="reference" style="visibility:hidden">
                                                                     <div class="col-10">
                                                                        <div class="form-group custom-file mb-3">
                                                                            <input type="file" class="custom-file-input" id="customFile" name="filename">
                                                                            <label class="custom-file-label" for="customFile">charger fichier d asserementation</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-2">
                                                                        <button onclick="refadd('reference1');"id="addref"type="button" class="btn btn-outline-primary">add</button>
                                                                    </div>
                                                               </div>

                                                               <div class="form-group custom-file mb-3"id="reference1" style="visibility:hidden">
                                                                           <input type="file" class="custom-file-input" id="customFile" name="filename">
                                                                           <label class="custom-file-label" for="customFile">charger fichier d asserementation</label>
                                                              </div>

                                                         </div>




                                                          <div class="col-6">
                                                                <label>   êtes vous assermenté?      </label>
                                                                <div class="form-group">
                                                                    <div class="custom-control custom-radio custom-control-inline" >
                                                                          <input type="radio" onclick="traducteurChecked();" id="radioclient" name="devis1" class="custom-control-input">
                                                                          <label class="custom-control-label" for="radioclient">non</label>
                                                                    </div>
                                                                     <div class="custom-control custom-radio custom-control-inline">
                                                                          <input type="radio" onclick="traducteurChecked();" id="radioTraduc" name="devis1" class="custom-control-input">
                                                                           <label class="custom-control-label" for="radioTraduc">oui</label>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group custom-file mb-3" style="visibility:hidden;"id="cv">
                                                                        <input type="file" class="custom-file-input" id="customFile" name="filename" >
                                                                        <label class="custom-file-label" for="customFile">charger fichier d asserementation</label>
                                                                </div>

                                                         </div>
                                              </div>
                                                  <button type="submit" class="btn btn-outline-primary btn-block"> valider</button>
 </form>




<?php
}
public function inscrire(){
?>
<button id="devis_btn" type="button" class="devis_btn btn btn-primary" data-toggle="modal" data-target="#inscription" data-whatever="@getbootstrap" style="width:100%;">S inscrire</button>
 <form method="POST" action="inscript.php"class="needs-validation md-form">
   <script  rel="text/javascript" src='jsProject.js'>
   </script>


   <div class="modal fade" id="inscription" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
           <div class="modal-dialog" role="document">
             <div class="modal-content">
               <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Inscription</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>
               <div class="modal-body">

                                             <div class="form-group row">
                                                        <div class="col-6">
                                                             <input required  name="prenomClient"type="text"  placeholder="prenom" id="lastname" class="form-control">
                                                        </div>
                                                         <div class="col-6">
                                                             <input required name="nomClient" type="text"  placeholder="Nom" id="name" class="form-control">
                                                          </div>
                  							</div>
                  							 <div class="form-group row">
                  							 <div class="col-6 form-group">
                                              							  <?php
                                                                                     $this->wilayaInput();
                                                                            ?>
                                             </div>
                                                       <div class="col-6 form-group">
                                                                                              <select required name="communeClient"class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                                                                <option value="" disabled selected>Commune</option>
                                                                                              <?php
                                                                                              try{
                                                                                              $cf=new project_controleur();
                                                                                              $qtf=$cf->get_commune_controleur();

                                                                                              foreach($qtf as $rowtf){
                                                                                              echo'<option  href="#">'.$rowtf["nom"].'</option>';
                                                                                              }
                                                                                              }
                                                                                              catch(Exception $e){echo 'erreur'.$e->getMessage();}
                                                                                              ?>
                                                                                          </select>
                                                        							</div>

                                           </div>
                                                 <div class="form-group">
                                                     <input required name="adresseClient" type="text"  placeholder="adresse" id="adresse" class="form-control" >
                                                 </div>

                                                   <div class="form-group row">
                                                        <div class="col-6">
                                                               <input required name="telClient"type="number"  placeholder="téléphone" id="numtel" class="form-control" >
                                                         </div>
                                                        <div class="col-6">
                                                               <input required name="faxClient"type="number"  placeholder="Fax" id="numfax" class="form-control" >
                                                         </div>
                                                     </div>



                  							 <div  class="form-group">
                  								<input name="mailClient" required type="email"  placeholder="email" id="mail" class="form-control" >
                  							 </div>

                  							  <div class="form-group row">
                                                    <div class="col-6">
                                                        <input  name="mdpClient"required="required" placeholder="mot de passe"type="password" class="form-control" id="password-conn">
                                                     </div>
                                                    <div class="col-6">
                                                         <input  name="mdpClient1"required="required" placeholder="confirmez votre mot de passe "type="password" class="form-control" id="confirm-mdp">
                                                      </div>
                                               </div>







               </div>
               <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>
                 <button name="buttonInscrClient"type="submit" class="  btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0">S inscrire</button>
               </div>
             </div>
           </div>
         </div>
      </form>
<?php
}
public function seConnecter(){
?>

	<button id="devis_btn" type="button" class="btn btn-primary" data-toggle="modal" data-target="#connexion" data-whatever="@getbootstrap" style="width:100%;">Se connecter</button>
    <form action="session.php" method="POST" id="conn-insc" class="needs-validation" novalidate>
         <div class="modal fade" id="connexion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
           <div class="modal-dialog" role="document">
             <div class="modal-content">
               <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Connexion</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>
               <div class="modal-body">
                   <div class="form-group">
                     <input name="mailconnec"placeholder="email"type="text" class="form-control " id="email-conn" required>
                   </div>

                   <div class="form-group">
                      <input name="mdpconnec" required="required" placeholder="password"type="password" class="form-control" id="password-conn" required>
                    </div

               </div>
               <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>
                <a href="routeuruserconnecte.php"> <button type="submit" class="btn btn-primary"> se connecter</button></a>
               </div>
             </div>
           </div>
         </div>
   </form>
<?php
}

public function languageInput(){
?>
<select style="visibility:hidden;" id="langueInput" multiple="multiple" size=1>
                                      <?php
                                      try{
                                      $cf=new project_controleur();
                                      $qtf=$cf->get_language_controleur();

                                      foreach($qtf as $rowtf){
                                      echo'<option  >'.$rowtf["name"].'</option>';
                                      }
                                      }
                                      catch(Exception $e){echo 'erreur'.$e->getMessage();}
                                      ?>
</select>
<script type="text/javascript">
    $(document).ready(function() {
        $('#langueInput').multiselect();
        $('#langueInput').size=3;
    });
</script>

<?php
}
public function typeTraducInput(){
?>
<select style="visibility:hidden;" id="typeInput" multiple="multiple" size=1>
                                      <?php
                                      try{
                                      $cf=new project_controleur();
                                      $qtf=$cf->get_type_traduction_controleur();
                                      foreach($qtf as $rowtf){
                                      echo'<option  >'.$rowtf["traductionType"].'</option>';
                                      }
                                      }
                                      catch(Exception $e){echo 'erreur'.$e->getMessage();}
                                      ?>
</select>
<script type="text/javascript">
    $(document).ready(function() {
        $('#typeInput').multiselect();
        $('#typeInput').size=3;
    });
</script>
<?php
}

public function wilayaInput(){
?>
 <select name="wilayaClient" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                      <option value="" disabled selected>Wilaya</option>
                                      <?php
                                      try{
                                      $cf=new project_controleur();
                                      $qtf=$cf->get_wilaya_controleur();

                                      foreach($qtf as $rowtf){
                                      echo'<option  href="#">'.$rowtf["nom"].'</option>';
                                      }
                                      }
                                      catch(Exception $e){echo 'erreur'.$e->getMessage();}
                                      ?>
                                  </select>
<?php
}



public function remplirdevis($butt,$asser,$fich,$comm,$idutil,$iddestin,$idorigin,$type){
$cf=new project_controleur();
$qtf=$cf->get_devis_controleur($butt,$asser,$fich,$comm,$idutil,$iddestin,$idorigin,$type);
}
 public function partieDevis(){
   ?>

 <form action="routeur_propos_traduc.php" method="GET"  id="conn-insc" class="needs-validation form-container">

                             <div class="form-group">
 								<input name="nom" type="text"  placeholder="Nom" id="name" class="form-control">
 							</div>
 							<div class="form-group">
 								<input  name="prenom"type="text"  placeholder="prenom" id="lastname" class="form-control">
 							</div>
                             <div name="mail" class="form-group">
 								<input type="email"  placeholder="email" id="mail" class="form-control" >
 							</div>
                             <div class="form-group">
 								<input name="num"type="number"  placeholder="numero de telephone" id="numtel" class="form-control" >
 							</div>
                             <div class="form-group">
                             	<input name="adresse" type="text"  placeholder="adresse" id="adress" class="form-control" >
                             </div>
                             <div class="form-group">
 							  <?php
                                        $this->wilayaInput();
                               ?>
 							</div>
                             <div class="form-group">
                                       <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                         <option value="" disabled selected>Commune</option>
                                       <?php
                                       try{
                                       $cf=new project_controleur();
                                       $qtf=$cf->get_commune_controleur();

                                       foreach($qtf as $rowtf){
                                       echo'<option  href="#">'.$rowtf["nom"].'</option>';
                                       }
                                       }
                                       catch(Exception $e){echo 'erreur'.$e->getMessage();}
                                       ?>
                                   </select>
 							</div>

 							<div class="form-group">
 								   <label name="typeDevis"class="my-1 mr-2" for="inlineFormCustomSelectPref">Type de la traduction</label>
                                 							 <select name="traductype" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" required>
                                                                     <option value="" disabled selected>type Traduction</option>
                                 							  <?php
                                 							  $i=1;
                                                                      try{
                                                                      $cf=new project_controleur();
                                                                      $qtf=$cf->get_type_traduction_controleur();
                                                                      foreach($qtf as $rowtf){
                                                                      $i=$i+1;

                                                                      echo'<option>'.$rowtf["traductionType"].'</option>';
                                                                      }
                                                                      }
                                                                      catch(Exception $e){echo 'erreur'.$e->getMessage();}

                                                               ?>
                                                               </select>
 							</div>



 							<div class="form-group">
 							 <select class="custom-select my-1 mr-sm-2" name="langorigine" id="inlineFormCustomSelectPref" required>
                                                                     <option value="" disabled selected>langue origine</option>
                                                                   <?php
                                                                   try{
                                                                   $cf=new project_controleur();
                                                                   $qtf=$cf->get_langue_controleur();

                                                                   foreach($qtf as $rowtf){
                                                                   echo'<option  href="#">'.$rowtf["langue"].'</option>';
                                                                   }
                                                                   }
                                                                   catch(Exception $e){echo 'erreur'.$e->getMessage();}
                                                                   ?>
                              </select>
 							</div>
 							<div class="form-group">

 							<select class="custom-select my-1 mr-sm-2" name="langdestin" id="inlineFormCustomSelectPref" required>
                                                                                                 <option value="" disabled selected>langue destination</option>
                                                                                               <?php
                                                                                               try{
                                                                                               $cf=new project_controleur();
                                                                                               $qtf=$cf->get_langue_controleur();

                                                                                               foreach($qtf as $rowtf){
                                                                                               echo'<option  href="#">'.$rowtf["langue"].'</option>';
                                                                                               }
                                                                                               }
                                                                                               catch(Exception $e){echo 'erreur'.$e->getMessage();}
                                                                                               ?>
                             </select>
 							</div>

                             <div class="form-group">
                               <label> Traducteur assermenté ?       </label>
                              <div class="form-check">

                                                           <input class="form-check-input" type="radio" name="assermen" id="exampleRadios1" value="0" >
                                                           <label class="form-check-label" for="exampleRadios1">
                                                           non
                                                           </label>
                              </div>

                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="assermen" id="exampleRadios2" value="1">
                              <label class="form-check-label" for="exampleRadios2">
                                oui
                              </label>
                            </div>
 							</div>

     			<div class="form-group">
 								<label for="comment">Commentaires</label>
 								<textarea name="comment"class="form-control" id="comment"></textarea>
 							</div>
                             <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Document à traduire</label>
                              <div class="form-group custom-file mb-3">
                                 <input type="file" class="custom-file-input" id="customFile" name="filename">
                                     <label class="custom-file-label" for="customFile">Choose file</label>
                              </div>
                            <button type="submit" class="btn btn-primary"  name="sub" >envoyer </button>
              </form>
<?php


 }






public function modifform(){
?>
   <div class="content" >

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
                            $art_model=new project_controleur();
                            $r=$art_model->profil(1);
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
                            $art_model=new project_controleur();
                            $r=$art_model->profil(1);
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
                            $art_model=new project_controleur();
                            $r=$art_model->profil(1);
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
                            $art_model=new project_controleur();
                            $r=$art_model->profil(1);
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
                            $art_model=new project_controleur();
                            $r=$art_model->profil(1);
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
                            $art_model=new project_controleur();
                            $r=$art_model->profil(1);
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

                            $art_model=new project_controleur();
                            $r=$art_model->profil(1);
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

              <?php

                  $art_model=new project_controleur();
                  $r=$art_model->modifier('btnen','nom1','prenom1','mail1','numtel1','adr1','wil1','com1',1);
}






public function profil_user(){
$cf=new project_controleur();
$qtf=$cf->gt_user_controleur($_SESSION['id']);
?>
<div class="row"style="height:100%;width:100%; ">
  <div class="col-4"> </div>
  <div class="col-4" style="box-shadow: 10px 10px 10px 10px grey; padding:1%;">
 <?php
  foreach($qtf as $rowtf){
  ?>
  <div class="row"style="padding-top:2%;">
     <div class="col-8">
     <?php echo'<h5  href="#">'.$rowtf["nom"].'</h5>'; ?>
     </div>
     <div class="col-4"> <p>nom</p></div>
  </div>
   <div class="row"style="padding-top:2%;">
       <div class="col-8">
       <?php echo'<h5  href="#">'.$rowtf["prenom"].'</h5>'; ?>
       </div>
       <div class="col-4">  <p>prenom</p>  </div>
    </div>
     <div class="row"style="padding-top:2%;">
           <div class="col-8">
           <?php echo'<h5  href="#">'.$rowtf["wilaya"].'</h5>'; ?>
           </div>
           <div class="col-4">  <p>Wilaya</p> </div>
        </div>

     <div class="row"style="padding-top:2%;">
           <div class="col-8">
           <?php echo'<h5  href="#">'.$rowtf["commune"].'</h5>'; ?>
           </div>
           <div class="col-4">  <p>Commune</p> </div>
     </div>
       <div class="row"style="padding-top:2%;">
                <div class="col-8">
                <?php echo'<h5  href="#">'.$rowtf["adresse"].'</h5>'; ?>
                </div>
                <div class="col-4">   <p>Adresse</p>  </div>
          </div>
         <div class="row"style="padding-top:2%;">
                  <div class="col-8">
                  <?php echo'<h5  href="#">'.$rowtf["tel"].'</h5>'; ?>
                  </div>
                  <div class="col-4">   <p>mobile</p> </div>
            </div>
              <div class="row"style="padding-top:2%;">
                       <div class="col-8">
                       <?php echo'<h5  href="#">'.$rowtf["fax"].'</h5>'; ?>
                       </div>
                       <div class="col-4">   <p>fax</p>  </div>
               </div>
              <div style="width:100%;padding-top:2%;"> <button style="width:100%;" id="addref"type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#edition">edit</button></div>


 <form method="POST" action=""class="needs-validation md-form">


                                     <div class="modal-article modal fade" id="edition" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                         <div class="article-dialog modal-dialog modal-dialog-scrollable"  role="document">
                                             <div class="article-content modal-content">

                                                 <div class="article-header modal-header">
                                                     <h5 class="modal-title" id="Article1">Edition du profil</h5>
                                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                     <span aria-hidden="true">&times;</span> </button>
                                                 </div>
                                                 <div class="article-body modal-body">



                 <div class="form-group row">
                                                        <div class="col-6">
                                                             <input required  name="editprenomClient"type="text"  placeholder="prenom" id="lastname" class="form-control">
                                                        </div>
                                                         <div class="col-6">
                                                             <input required name="editnomClient" type="text"  placeholder="Nom" id="name" class="form-control">
                                                          </div>
                  							</div>
                  							 <div class="form-group row">
                  							 <div class="col-6 form-group">



                  							 <select name="editwilayaClient" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                                                   <option value="" disabled selected>Wilaya</option>
                                                                                   <?php
                                                                                   try{
                                                                                   $cf=new project_controleur();
                                                                                   $qtf=$cf->get_wilaya_controleur();

                                                                                   foreach($qtf as $rowtf){
                                                                                   echo'<option  href="#">'.$rowtf["nom"].'</option>';
                                                                                   }
                                                                                   }
                                                                                   catch(Exception $e){echo 'erreur'.$e->getMessage();}
                                                                                   ?>
                                                                               </select>

                                             </div>
                                                       <div class="col-6 form-group">
                                                                                              <select required name="editcommuneClient"class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                                                                <option value="" disabled selected>Commune</option>
                                                                                              <?php
                                                                                              try{
                                                                                              $cf=new project_controleur();
                                                                                              $qtf=$cf->get_commune_controleur();

                                                                                              foreach($qtf as $rowtf){
                                                                                              echo'<option  href="#">'.$rowtf["nom"].'</option>';
                                                                                              }
                                                                                              }
                                                                                              catch(Exception $e){echo 'erreur'.$e->getMessage();}
                                                                                              ?>
                                                                                          </select>
                                                        							</div>

                                           </div>
                                                 <div class="form-group">
                                                     <input required name="editadresseClient" type="text"  placeholder="adresse" id="adresse" class="form-control" >
                                                 </div>

                                                   <div class="form-group row">
                                                        <div class="col-6">
                                                               <input required name="edittelClient"type="number"  placeholder="téléphone" id="numtel" class="form-control" >
                                                         </div>
                                                        <div class="col-6">
                                                               <input required name="editfaxClient"type="number"  placeholder="Fax" id="numfax" class="form-control" >
                                                         </div>
                                                   </div>
                                                 </div>
                                                  <div class="article-footer modal-footer">
                                                          <button name="editbutt"type="submit" class="btn btn-secondary" data-dismiss="modal">envoyer</button>
                                                  </div>
                                             </div>
                                         </div>
                 </div>

</form>

 <?php }?>
  </div>
  <div class="col-4"> </div>
</div>
 <?php
}




public function formConnect(){
?>



 <div class="col-lg-6 parti"style="margin-top:0%;">
    <div class="row justify-content-center">

        <div class="col-4">

          	      <a href="profilUser.php"><button type="button" class="btn btn-primary" style="width:100%;">profil</button></a>


        </div>
          <div class="col-4">
                 <a href="decconect.php"   name="sub" >  <button type="button" class="btn btn-primary" style="width:100%;">deconnecter</button ></a>
           </div>
    </div>
    <?php
$this->partieDevis();
?>
    </div>




<?php
}


public function form(){

?>

 <div class="col-lg-6 parti"style="margin-top:0%;">
    <div class="row justify-content-center">
        <div class="col-4">
          <?php
                 $this->seConnecter();
                 ?>
        </div>
        <div class="col-4">
          <?php
             $this->inscrire();
             ?>
        </div>



    </div>  <?php
          $this->partieDevis();
          ?>


    </div>
<?php
}

public function traducType(){
?>
<div style="height:100%;width:100%;padding-top:5%;">
 <?php

                                      $cf=new project_controleur();
                                      $qtf=$cf->get_type_traduction_controleur();

                                      foreach($qtf as $rowtf){
                                      echo'<div> <h5>'.$rowtf["traductionType"].'<h5>';
                                     $qtf1=$cf-> assoctypetrad_controleur($rowtf["idtype"]);
                                     foreach($qtf1 as $rowtf1){
                                      $qtf2=$cf-> info_traduc_controleur($rowtf1["id_traduc"]);
                                              foreach($qtf2 as $rowtf2){
                                            echo'<div class="row">';
                                              echo'<div class="col-4" style="padding-left:10%;"> '.$rowtf2["nom"].'</div>';
                                              echo'<div class="col-4" style="padding-left:10%;"> '.$rowtf2["prenom"].'</div>';
                                              echo'<div class="col-4" style="padding-left:10%;"> '.$rowtf2["email"].'</div>';

                                            echo '</div>';
                                              }

                                     }

                                      echo '</div>';

                                      }
                                      ?>

</div>
<?php
}
public function formulaire(){
?>
 <div class="col-lg-6 parti"style="margin-top:0%;">
	<form action="" method="POST" id="conn-insc" class="needs-validation form-container">
	<div class="row justify-content-center">
        <div class="col-4">
          <?php
                 $this->seConnecter();
                 ?>
        </div>
        <div class="col-4">
          <?php

             $this->inscrire();
             ?>
        </div>
    </div>
    	     <h5> Demande de devis</h5>
							<div class="form-group">
								<input name="nom" type="text"  placeholder="Nom" id="name" class="form-control">
							</div>
							<div class="form-group">
								<input  name="prenom"type="text"  placeholder="prenom" id="lastname" class="form-control">
							</div>
							<div name="mail" class="form-group">

								<input type="email"  placeholder="email" id="mail" class="form-control" >
							</div>
                            <div class="form-group">

								<input name="num"type="number"  placeholder="numero de telephone" id="numtel" class="form-control" >
							</div>
                            <div class="form-group">

                            	<input name="adresse" type="text"  placeholder="adresse" id="adress" class="form-control" >
                            </div>
							<div class="form-group">
								<input  name="langorigine"placeholder="Langue d'origine" type="text"    class="form-control">
							</div>
							<div class="form-group">

								<input name="langdestin" placeholder="Langue souhaitee" type="text"   class="form-control">
							</div>
							<div class="form-group">
							  <?php
                                       $this->wilayaInput();
                              ?>
							</div>
                            <div class="form-group">
                                      <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                        <option value="" disabled selected>Commune</option>
                                      <?php
                                      try{
                                      $cf=new project_controleur();
                                      $qtf=$cf->get_commune_controleur();

                                      foreach($qtf as $rowtf){
                                      echo'<option  href="#">'.$rowtf["nom"].'</option>';
                                      }
                                      }
                                      catch(Exception $e){echo 'erreur'.$e->getMessage();}
                                      ?>
                                  </select>
							</div>
							<div class="form-group">

								   <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Type de la traduction</label>
                                							 <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                                    <option value="" disabled selected>type Traduction</option>
                                							  <?php
                                							  $i=1;
                                                                     try{
                                                                     $cf=new project_controleur();
                                                                     $qtf=$cf->get_type_traduction_controleur();
                                                                     foreach($qtf as $rowtf){
                                                                     $i=$i+1;
                                                                     echo'<option value="'.$i.'">'.$rowtf["traductionType"].'</option>';
                                                                     }
                                                                     }
                                                                     catch(Exception $e){echo 'erreur'.$e->getMessage();}

                                                              ?>


                                                              </select>
							</div>
                             <div class="form-group">
                              <label> Traducteur assermenté ?       </label>
                              <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline1">oui</label>
                              </div>
                              <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline2">non</label>
                              </div>
							</div>


							<div class="form-group">
								<label for="comment">Commentaires</label>
								<textarea class="form-control" id="comment"></textarea>
							</div>
							<label class="my-1 mr-2" for="inlineFormCustomSelectPref">Document à traduire</label>

                             <div class="form-group custom-file mb-3">
                                <input type="file" class="custom-file-input" id="customFile" name="filename">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                             <div class="form-group">
                                                         <div class="g-recaptcha" data-sitekey="6Lc_H84UAAAAAGllN0lzY5y0eXJDCHUcJdGEoEeO" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
                                                         <input class="form-control d-none" data-recaptcha="true" required data-error="Please complete the Captcha">
                                                         <div class="help-block with-errors"></div>
                               </div>



                               <button type="submit" class="btn btn-primary"  name="sub">envoyer </button>




	</form>

 </div>

<?php
}
}
?>






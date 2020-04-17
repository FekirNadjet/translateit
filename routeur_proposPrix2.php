 <body id="Accueil">
<?php
require_once('vue.php');
$c=new siteTraduction();
$d= new project_controleur();
$c->entete();
$c->navigationBar();
$c->menubar();
$c->diapo();
?>


 <div style="padding-top:2%">
 <?php
 $qtf=$d->devis_infos_controleura($_GET["idDevis"]);
  foreach($qtf as $rowtf){


  echo '   <table class="table" id="table_format2">
             <thead class="thead-dark">
                <tr>
                  <th scope="col">Nom</th>
                  <th scope="col">fichier</th>
                  <th scope="col"> prix</th>

                </tr>
             </thead>
             <tbody>
             <tr>';

           echo '
           <td>'.$rowtf["id_traduc"].'</td>
           <td> <a class="navLink nav-link "  href="#">fichier</a> </td>
           <td> '.  $rowtf["reponse"].' </td>

              ';
                   echo '</tr>
           </tbody> </table>  ';

   }
 ?>
 </div >

 <footer>
 </footer>
 </body>


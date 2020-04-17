 <body id="Accueil">
<?php
require_once('vue.php');
$c=new siteTraduction();
$d= new project_controleur();
$c->entete();
$c->navigationBar();
$c->menubarTraduc();
$c->diapo();
?>


 <div style="padding-top:2%">
 <?php
 $qtf=$d->devis_infos_controleur($_GET["idDevis"]);
  foreach($qtf as $rowtf){


  echo '   <table class="table" id="table_format2">
             <thead class="thead-dark">
                <tr>
                  <th scope="col">Nom</th>
                  <th scope="col">fichier</th>
                  <th scope="col">proposez un prix</th>
                  <th scope="col"></th>
                </tr>
             </thead>
             <tbody>
             <tr>';
            $qtf1=$d-> user_controleur($rowtf["idutilis"] );
           foreach($qtf1 as $rowtf1){
           echo '<td>'.$rowtf1["nom"].'</td>
           <td> <a class="navLink nav-link "  href="#">fichier</a> </td>
              <form method="POST" action=""class=" md-form">
                             <td>  <input type="text" placeholder="prix" name="prix" > </td>
                             <td>     <button type="submit" class="btn btn-primary"  name="envoieprix" >envoyer prix</button> </td>
                   </form>';
 if (isset($_POST['envoieprix'])){
 $d->prix_devis_controleur($_GET["idDevis"],$_POST["prix"]);
 };

                   echo '</tr>
           </tbody> </table>  ';}

   }
 ?>
 </div >

 <footer>
 </footer>
 </body>


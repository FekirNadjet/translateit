
<?php
require_once('vue.php');
$c=new siteTraduction();
$c->entete();
?>
 <body>

<div class="row">
  <div class="col-sm-4 offset-sm-1">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Tableau Des Traducteurs</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="routeur_traducteur.php" class="btn btn-primary">Voir</a>
      </div>
    </div>
  </div>
  <div class="col-sm-4 offset-sm-1 ">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Tableau Des Clients</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="http://127.0.0.1/webadmin/administrteur/routeur_client.php" class="btn btn-primary">Voir</a>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-4 offset-sm-1">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Tableau Des Documents</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="http://127.0.0.1/webadmin/Vuesa/docVue.php" class="btn btn-primary">Voir</a>
      </div>
    </div>
  </div>
  <div class="col-sm-4 offset-sm-1">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Statistiques</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="http://127.0.0.1/webadmin/administrteur/routeurStat.php" class="btn btn-primary">Voir</a>
      </div>
    </div>
  </div>
</div>

</body>
<style>
.card{
    margin-top:15%;
}
</style>
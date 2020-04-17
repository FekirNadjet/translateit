<?php

class project_model{
private $dbname="traductionbase";
private $host="127.0.0.1";
private $user="root";
private $password="";

private function connexion($dbname,$host,$user,$password){
$dsn="mysql:dbname=$dbname;host=$host;";
try{
$c=new PDO($dsn,$user,$password);
}
catch(PDOException $ex){
printf("erreur de la connexion a la bdd",$ex->getMessage());
exit();
}
return $c;
}

public function deconnexion(&$c){
$c=null;
}

private function requete($c,$r){
return $c->query($r);

}



public function get_type_traduction_model(){

$c=$this->connexion($this->dbname,$this->host,$this->user,$this->password);
$qtf="select * from type_traduction";
$r=$this->requete($c,$qtf);
$this->deconnexion($c);
return $r;
}
public function get_wilaya_model(){

$c=$this->connexion($this->dbname,$this->host,$this->user,$this->password);
$qtf="select * from wilayas ORDER BY nom";
$r=$this->requete($c,$qtf);
$this->deconnexion($c);
return $r;
}
public function gt_user_model($id){
$c=$this->connexion($this->dbname,$this->host,$this->user,$this->password);
$qtf="select * from user where id=$id";
$r=$this->requete($c,$qtf);
$this->deconnexion($c);
return $r;

}
public function get_language_model(){

$c=$this->connexion($this->dbname,$this->host,$this->user,$this->password);
$qtf="select * from languages ORDER BY name";
$r=$this->requete($c,$qtf);
$this->deconnexion($c);
return $r;
}
public function get_commune_model(){
$c=$this->connexion($this->dbname,$this->host,$this->user,$this->password);
$qtf="select * from communes ORDER BY nom";
$r=$this->requete($c,$qtf);
$this->deconnexion($c);
return $r;
}



public function get_presentation_model($num){
$c=$this->connexion($this->dbname,$this->host,$this->user,$this->password);
$qtf="select * from presentation_site where id=$num";
$r=$this->requete($c,$qtf);
$this->deconnexion($c);
return $r;
}




public function get_langue_model(){
$c=$this->connexion($this->dbname,$this->host,$this->user,$this->password);
$qtf="select * from langues ";
$r=$this->requete($c,$qtf);
$this->deconnexion($c);
return $r;
}


public function get_presentation_all(){
$c=$this->connexion($this->dbname,$this->host,$this->user,$this->password);
$qtf="select * from presentation_site ";
$r=$this->requete($c,$qtf);
$this->deconnexion($c);
return $r;
}

public function info_traduc_model($id){
$c=$this->connexion($this->dbname,$this->host,$this->user,$this->password);
$qtf="select * from traducteur where id=".$id;
$r=$this->requete($c,$qtf);
$this->deconnexion($c);
return $r;
}

public function assoctypetrad_model($id){
$c=$this->connexion($this->dbname,$this->host,$this->user,$this->password);
$qtf="select * from assoc_traduc_type  where id_type=".$id ;
$r=$this->requete($c,$qtf);
$this->deconnexion($c);
return $r;
}

public function proposerTraducteur_model($a,$b,$t) {
$fx=-1;
$c=$this->connexion($this->dbname,$this->host,$this->user,$this->password);
if(!empty($a)){
$lgorig="select idLangue from langues where langue='".$a."';" ;
  // idLangue=1
$lgorigine=$c->query($lgorig);
}

if(!empty($b)){
$lgdest="select idLangue from langues where langue='".$b."';" ;
     // idLangue=2
$lgdestin=$c->query($lgdest);
}

if(!empty($t)){
$tTrad="select idtype from type_traduction where traductionType='".$t."';";
$typeTrad=$c->query($tTrad);
}

foreach($typeTrad as $rowtf){
$trad="select id_traduc from assoc_traduc_type  where id_type=".$rowtf['idtype'] ;
$traduc0=$c->query($trad);
}
foreach($lgorigine as $rowtf){
$trad1="select id_traduc from assoc_traduc_langue  where id_langue=".$rowtf['idLangue'];
$traduc1=$c->query($trad1);
}

foreach($lgdestin as $rowtf){
$trad2="select id_traduc from assoc_traduc_langue  where id_langue=".$rowtf['idLangue'] ;
$traduc2=$c->query($trad2);
}
$req1=$trad1." and id_traduc IN (".$trad2 .")";
$req=$trad." and id_traduc IN (".$req1.");";
$resultat=$c->query($req);
return $resultat;
}

public function Traduc($i){
$c=$this->connexion($this->dbname,$this->host,$this->user,$this->password);
$qtf="select * from traducteur where id=".$i;
$r=$this->requete($c,$qtf);
$this->deconnexion($c);
return $r;
}



public function recupeLangue($a,$b,$c,$t){
    if(isset($_GET[$a])){
        $d=$_GET[$b];
        $e=$_GET[$c];
        $f=$_GET[$t];
        $qtf=$this->proposerTraducteur_model($d,$e,$f);
    return $qtf;
}
}

public function devis_model($d,$e,$f,$g,$h,$i,$j){
$fx=-1;
$c=$this->connexion($this->dbname,$this->host,$this->user,$this->password);
if(!empty($d)){
$lgorig="select idLangue from langues where langue='".$a."';" ;
  // idLangue=1
$lgorigine=$c->query($lgorig);
}
}


public function edit_profil(){
  $bdd = new PDO('mysql:dbname=traductionbase;host=127.0.0.1', 'root', '');

$us=$_SESSION['id'];
if(isset($_POST['editbutt'])){
 $nom= $_POST['editnomClient'];
   $prenom= $_POST['editprenomClient'];
    $wilaya= $_POST['editwilayaClient'];
   $commune= $_POST['editcommuneClient'];
   $adresse= $_POST['editadresseClient'];
   $phone= $_POST['edittelClient'];
   $fax= $_POST['editfaxClient'];
   echo $nom;
   if(isset($nom)){
  $req="update user SET nom=".$nom." WHERE id=". $us;}
   $req->query($lgorig);

    if(isset($prenom)){
   $req="update user SET prenom=".$prenom." WHERE id=" .$us;}
    if(isset($wilaya)){
   $req="update user SET wilaya=".$wilaya." WHERE id=". $us;}
    if(isset($commune)){
   $req="update user SET commune=".$commune." WHERE id=". $us;}
    if(isset($adresse)){
   $req="update user SET adresse=".$adresse." WHERE id=". $us;}
    if(isset($phone)){
   $req="update user SET tel=".$phone." WHERE id=". $us;}
    if(isset($fax)){
   $req="update user SET fax=".$fax." WHERE id=". $us;}

   }


}


public function get_devis_model($butt,$asser,$fich,$comm,$idutil,$iddestin,$idorigin,$type){
 if(isset($_POST[$butt])){
        $d=$_POST[$asser];
        $e=$_POST[$fich];
        $f=$_POST[$comm];
        $g=$_POST[$idutil];
        $h=$_POST[$iddestin];
        $i=$_POST[$idorigin];
        $j=$_POST[$type];
        $qtf=$this->devis_model($d,$e,$f,$g,$h,$i,$j);
    return $qtf;
}
}

public function verif($u,$p)
    {
  $bdd = new PDO('mysql:dbname=traductionbase;host=127.0.0.1', 'root', '');
        $connexionReq=$bdd->prepare('SELECT * FROM users WHERE username = ? AND password=? ');
        $connexionReq->execute(array($u,$p));
        $resultat=$connexionReq->fetch();
        return $resultat;
    }


public function inscrire(){
  $bdd = new PDO('mysql:dbname=traductionbase;host=127.0.0.1', 'root', '');
  if(isset($_POST['buttonInscrClient'])){
    $nom= $_POST['nomClient'];
   $prenom= $_POST['prenomClient'];
    $wilaya= $_POST['wilayaClient'];
   $commune= $_POST['communeClient'];
   $adresse= $_POST['adresseClient'];
   $phone= $_POST['telClient'];
   $fax= $_POST['faxClient'];
    $resultat=$this->verif($_POST['mailClient'],$_POST['mdpClient']);
    if($resultat['mailClient']){
        $emailExist=true;
        header('Location:routeur.php?erreur4=1');
    }
    if($_POST['mdpClient']!=$_POST['mdpClient1']){
        $passeErone=true;
        header('Location:routeur.php?erreur5=1');
    }

else{
$ajoutUserP=$bdd->prepare("INSERT INTO user (nom,prenom,wilaya,commune,adresse,email,mdp,tel,fax) VALUES (?,?,?,?,?,?,?,?,?)");
 $ajoutUserP->execute(array($nom,$prenom,$wilaya,$commune,$adresse,$_POST['mailClient'],$_POST['mdpClient'],$phone,$fax));
 header('Location:routeuruserconnecte.php');
 session_start();
     $_SESSION['id']=$resultat['id'];
     $_SESSION['pseudo']=$resultat['nom'];
     header('Location:routeur.php');
        }}
    }






public function authentifier(){

$c=$this->connexion($this->dbname,$this->host,$this->user,$this->password);
$pass_hash=sha1($_POST['mdpconnec']);
$connexionReq=$c->prepare('SELECT * FROM user WHERE email = ? AND mdp=? ');
$connexionReq->execute(array($_POST['mailconnec'],$_POST['mdpconnec']));

$resultat=$connexionReq->fetch();
if(!isset($resultat['id'])){
$connexionReq=$c->prepare('SELECT * FROM traducteur WHERE email = ? AND mdp=? ');
$connexionReq->execute(array($_POST['mailconnec'],$_POST['mdpconnec']));

$resultat=$connexionReq->fetch();
if(!isset($resultat['id'])){
    header('Location:routeur.php?erreur=1');
}
else{
    session_start();
    $_SESSION['id']=$resultat['id'];
    $_SESSION['pseudo']=$resultat['nom'];

    if ($_SESSION['pseudo']=="wess25") header('Location:profil_admin.php');
    else header('Location:routeur_profil_traduc.php');
}
}
else{
    session_start();
    $_SESSION['id']=$resultat['id'];
    $_SESSION['pseudo']=$resultat['nom'];

    if ($_SESSION['pseudo']=="wess25") header('Location:profil_admin.php');
    else header('Location:routeuruserconnecte.php');
}




}


public function getassoctraduc_model(){
$c=$this->connexion($this->dbname,$this->host,$this->user,$this->password);
$qf="select * from type_traduction where traductionType=".$v." ;";

}


public function get_traduction_model($v){
$c=$this->connexion($this->dbname,$this->host,$this->user,$this->password);
if (isset($v)){
$qf="select * from type_traduction where traductionType=".$v." ;";
}

else{

$qf="select * from type_traduction";
}
$r=$this->requete($c,$qf);
$this->deconnexion($c);
return $r;
}



public function devis_remplir_model($tdevis,$lgorig,$lgdest,$asser,$comment,$id){
$c=$this->connexion($this->dbname,$this->host,$this->user,$this->password);


$ajoutdevis=$c->prepare("insert into demande_devis (asseremente, commentaire, lgdestin, lgorigin , typeTraduc , idutilis ) values (?,?,?,?,?,?)");
 $ajoutdevis->execute(array($asser,$comment,$lgdest,$lgorig,$tdevis,$id));
$this->deconnexion($c);
}

public function get_name_type_model($t){
$c=$this->connexion($this->dbname,$this->host,$this->user,$this->password);
$tTrad="select * from type_traduction where traductionType='".$t."'";
$r=$this->requete($c,$tTrad);
$this->deconnexion($c);
return $r;
}



public function get_name_langue_model($l){
$c=$this->connexion($this->dbname,$this->host,$this->user,$this->password);
$tTrad="select * from langues where langue='".$l."'";
$r=$this->requete($c,$tTrad);
$this->deconnexion($c);
return $r;
}
public function id_demande_model($idclient){
$c=$this->connexion($this->dbname,$this->host,$this->user,$this->password);
$iddevis="select * from demande_devis where date_soumiss=CURRENT_TIMESTAMP and idutilis=".$idclient;
$r=$this->requete($c,$iddevis);
$this->deconnexion($c);
return $r;
}
public function notifier_model($id_devis,$id_traduc){
$c=$this->connexion($this->dbname,$this->host,$this->user,$this->password);



$notif=$c->prepare("insert into  assoc_devis_traduc(id_traduc, id_devis) values (?,?)");
 $notif->execute(array($id_traduc,$id_devis));
 //var_dump($notif);
$this->deconnexion($c);
}


public function prix_devis_model($id_devis,$prix){
$c=$this->connexion($this->dbname,$this->host,$this->user,$this->password);
$notif=$c->prepare("update  assoc_devis_traduc set reponse= (?) where id_devis=".$id_devis);
 $notif->execute(array($prix));
$this->deconnexion($c);
}


public function profil($id){
        $cnx=$this->connexion($this->dbname,$this->host,$this->user,$this->password);
		$req="select * from traducteur where id='".$id."'";
		$r=$this->requete($cnx,$req);
        $this->deconnexion($cnx);
        return $r;
    }

    public function modifier($btn,$nom1,$prenom,$mail,$tel,$adr,$wil,$com,$id){
        if (isset($_POST[$btn]))
        {
            $nom= $_POST[$nom1];
            $prenom=$_POST[$prenom];
            $mail=$_POST[$mail];
            $tel=$_POST[$tel];
            $adr=$_POST[$adr];
            $wilaya=$_POST[$wil];
            $commune=$_POST[$com];
            $bdd=$this->connexion($this->dbname,$this->host,$this->user,$this->password);
            $req=$bdd->query("update traducteur set nom='".$nom."' , prenom='".$prenom."',email='".$mail."',tel=".$tel.",idWilaya=".$wilaya.",idCommune=".$commune.",adresse='".$adr."' where id=".$id);
        }

    }


   public function notification_model($id){
    $cnx=$this->connexion($this->dbname,$this->host,$this->user,$this->password);
   		$req=" select * from assoc_devis_traduc WHERE id_traduc=".$id." order by date DESC";
   		$r=$this->requete($cnx,$req);
           $this->deconnexion($cnx);
           return $r;

   }

   public function notification_modela($id){
       $cnx=$this->connexion($this->dbname,$this->host,$this->user,$this->password);
       $a= " select id from demande_devis WHERE idutilis=".$id;
      		$req=" select * from assoc_devis_traduc WHERE id_traduc=".$id." and id_devis IN (".$a.") order by date DESC";
      		$r=$this->requete($cnx,$req);
              $this->deconnexion($cnx);
              return $r;

      }

public function devis_infos_model($id){
$cnx=$this->connexion($this->dbname,$this->host,$this->user,$this->password);
   		$req=" select * from demande_devis WHERE id=".$id;
   		$r=$this->requete($cnx,$req);
           $this->deconnexion($cnx);
           return $r;
}
public function devis_infos_modela($id){
$cnx=$this->connexion($this->dbname,$this->host,$this->user,$this->password);
   		$req=" select * from assoc_devis_traduc WHERE id_devis=".$id;
   		$r=$this->requete($cnx,$req);
           $this->deconnexion($cnx);
           return $r;
}

public function user_model($id){
$c=$this->connexion($this->dbname,$this->host,$this->user,$this->password);
$qtf="select nom from user where id=".$id;
$r=$this->requete($c,$qtf);
$this->deconnexion($c);
return $r;
}
public function traduc_id_model($id){
$c=$this->connexion($this->dbname,$this->host,$this->user,$this->password);
$qtf="select * from traducteur where id=".$id;
$r=$this->requete($c,$qtf);
$this->deconnexion($c);
return $r;
}
}

?>

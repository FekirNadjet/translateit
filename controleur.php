<?php
require_once('model.php');
require_once('vue.php');
class project_controleur{
public function get_type_traduction_controleur(){
$mtf= new project_model();
$r= $mtf->get_type_traduction_model();
return $r;
}

public function edit_profil_controleur(){

$mtf= new project_model();
$r= $mtf->edit_profil();
return $r;

}

public function gt_user_controleur($id){
$mtf= new project_model();
$r= $mtf->gt_user_model($id);
return $r;
}


public function assoctypetrad_controleur($id){
$mtf= new project_model();
$r= $mtf->assoctypetrad_model($id);
return $r;
}

public function info_traduc_controleur($id){
$mtf= new project_model();
$r= $mtf->info_traduc_model($id);
return $r;
}


public function get_presentation_controleur($num){
$mtf= new project_model();
$r= $mtf->get_presentation_model($num);
return $r;
}
public function get_presentation_all_controleur(){
$mtf= new project_model();
$r= $mtf->get_presentation_all();
return $r;
}

public function get_traduction_controleur($v){
$mf= new project_model();
$r=$mf->get_traduction_model();
return $r;
}
 public function userauthentifier(){
 $mf= new project_model();
 $r=$mf->authentifier();
 }
 public function userInscription(){
  $mf= new project_model();
  $mf->inscrire();
 }

public function get_devis_controleur($butt,$asser,$fich,$comm,$idutil,$iddestin,$idorigin,$type){
$mf= new project_model();
$r=$mf->get_devis_model($butt,$asser,$fich,$comm,$idutil,$iddestin,$idorigin,$type);
return $r;
}



public function get_wilaya_controleur(){
$mtf= new project_model();
$r= $mtf->get_wilaya_model();
return $r;
}

public function get_commune_controleur(){
$mtf= new project_model();
$r= $mtf->get_commune_model();
return $r;
}
public function get_langue_controleur(){
$mtf= new project_model();
$r= $mtf->get_langue_model();
return $r;
}

public function get_language_controleur(){
$mtf= new project_model();
$r= $mtf->get_language_model();
return $r;
}
public function recupeLangue_controleur($a,$b,$c,$t){
$mtf= new project_model();
$r= $mtf->recupeLangue($a,$b,$c,$t);
return $r;
}
public function Traduc_controleur($i){
$mtf= new project_model();
$r= $mtf->Traduc($i);
return $r;
}

public function afficher_site(){
$v=new siteTraduction();
$v->afficher_site();
}

public function devis_remplir_controleur($tdevis,$lgorig,$lgdest,$asser,$comment,$id){
$v=new project_model();
$v->devis_remplir_model($tdevis,$lgorig,$lgdest,$asser,$comment,$id);
}

public function get_name_type_controleur($t){
$mtf= new project_model();
$r= $mtf->get_name_type_model($t);
return $r;
}
 public function  get_name_langue_controleur($l){
 $mtf= new project_model();
 $r= $mtf->get_name_langue_model($l);
 return $r;
 }
public function id_demande_controleur($idclient){
$mtf= new project_model();
 $r= $mtf->id_demande_model($idclient);
 return $r;
}

public function notifier_controleur($id_devis,$id_traduc){
$mtf= new project_model();
 $r= $mtf->notifier_model($id_devis,$id_traduc);
}
public function profil($id){
$mtf= new project_model();
$r= $mtf->profil($id);
return $r;
}

public function modifier($btn,$nom1,$prenom,$mail,$numtel,$adr,$wil,$com,$id){
$mtf= new project_model();
$r= $mtf->modifier($btn,$nom1,$prenom,$mail,$numtel,$adr,$wil,$com,$id);
return $r;
}

public function notification_controleur($id){
$mtf= new project_model();
$r= $mtf->notification_model($id);
return $r;
}
public function notification_controleura($id){
$mtf= new project_model();
$r= $mtf->notification_modela($id);
return $r;
}

public function devis_infos_controleur($id){
$mtf= new project_model();
$r= $mtf->devis_infos_model($id);
return $r;

}
public function devis_infos_controleura($id){
$mtf= new project_model();
$r= $mtf->devis_infos_modela($id);
return $r;

}



 public function user_controleur($id){
 $mtf= new project_model();
 $r= $mtf->user_model($id);
 return $r;
 }

 public function prix_devis_controleur($id_devis,$prix){

 $mtf= new project_model();
  $r= $mtf->prix_devis_model($id_devis,$prix);
 }
 public function traduc_id_controleur($id){
 $mtf= new project_model();
 $r= $mtf->traduc_id_model($id);
 return $r;
 }

}
?>

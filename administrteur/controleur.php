<?php
require_once('model.php');
require_once('vue.php');
class administrateur_controleur{

public function info_traduc_controleur(){
$mtf= new project_model();
$r= $mtf->info_traduc_model();
return $r;
}

public function wilaya_controleur($id){
$mtf= new project_model();
$r= $mtf->wilaya_model($id);
return $r;
}

public function commune_controleur($id){
$mtf= new project_model();
$r= $mtf->commune_model($id);
return $r;
}
public function assoctypetrad_controleur($id){
$mtf= new project_model();
$r= $mtf->assoctypetrad_model($id);
return $r;
}
public function assoclanguetrad_controleur($id){
$mtf= new project_model();
$r= $mtf->assoclanguetrad_model($id);
return $r;
}

public function typeaffich_controleur($id){
$mtf= new project_model();
$r= $mtf->typeaffich_model($id);
return $r;
}

public function langueaffich_controleur($id){
$mtf= new project_model();
$r= $mtf->langueaffich_model($id);
return $r;
}


public function supprimTraduct_controleur($id){
$mtf= new project_model();
$r= $mtf->supprimTraduct_model($id);
}

public function bloqTraduct_controleur($id){
$mtf= new project_model();
$r= $mtf->bloqTraduct_model($id);
}

public function debloqTraduct_controleur($id){
$mtf= new project_model();
$r= $mtf->debloqTraduct_model($id);
}

public function traduc_id_controleur($id){
$mtf= new project_model();
$r= $mtf->traduc_id_model($id);
return $r;
}
public function client_id_controleur($id){
$mtf= new project_model();
$r= $mtf->client_id_model($id);
return $r;
}

public function allerProfil(){
$a=$_POST["idtraducteur"];
return $a;
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


public function recup_devis_traduc_controleur($id){
$mtf= new project_model();
$r= $mtf->recup_devis_traduc_model($id);
return $r;
}

public function devis_controleur($id){
$mtf= new project_model();
$r= $mtf->devis_model($id);
return $r;
}


public function useraff_controleur($id){
$mtf= new project_model();
$r= $mtf->useraff_model($id);
return $r;
}
public function info_client_controleur(){
    $mtf= new project_model();
    $r= $mtf->info_client_model();
    return $r;
    }

    public function bloqClient_controleur($id){
    $mtf= new project_model();
    $r= $mtf->bloqClient_model($id);
    }

    public function supprimClient_controleur($id){
    $mtf= new project_model();
    $r= $mtf->supprimClient_model($id);
    }
    public function debloqClient_controleur($id){
    $mtf= new project_model();
    $r= $mtf->debloqClient_model($id);
    }
    public function profil_client($id){
    $mtf= new project_model();
    $r= $mtf->profil_client($id);
    return $r;
    }

    public function modifier_client($btn,$nom1,$prenom,$mail,$numtel,$adr,$wil,$com,$id){
    $mtf= new project_model();
    $r= $mtf->modifier_client($btn,$nom1,$prenom,$mail,$numtel,$adr,$wil,$com,$id);
    return $r;
    }

    public function devis_client_id_controleur($id){
     $mtf= new project_model();
     $r= $mtf->devis_client_id_model($id);
     return $r;
    }
  public function recup_traduction_traduc_controleur($id){
  $mtf= new project_model();
  $r= $mtf->recup_traduction_traduc_model($id);
  return $r;
  }
public function traduction_controleur($id){
$mtf= new project_model();
$r= $mtf->traduction_model($id);
return $r;
}
public function devis_client_id_controleur($id){
     $mtf= new project_model();
     $r= $mtf->devis_client_id_model($id);
     return $r;
    }


}


?>

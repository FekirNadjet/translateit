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

public function info_traduc_model(){
$c=$this->connexion($this->dbname,$this->host,$this->user,$this->password);
$qtf="select * from traducteur ";
$r=$this->requete($c,$qtf);
$this->deconnexion($c);
return $r;
}

public function wilaya_model($id){
$c=$this->connexion($this->dbname,$this->host,$this->user,$this->password);
$qtf="select * from wilayas where id=".$id;
$r=$this->requete($c,$qtf);
$this->deconnexion($c);
return $r;
}

public function commune_model($id){
$c=$this->connexion($this->dbname,$this->host,$this->user,$this->password);
$qtf="select nom from communes where id=".$id;
$r=$this->requete($c,$qtf);
$this->deconnexion($c);
return $r;
}

public function assoctypetrad_model($id){
$c=$this->connexion($this->dbname,$this->host,$this->user,$this->password);
$qtf="select * from assoc_traduc_type  where id_traduc=".$id ;
$r=$this->requete($c,$qtf);
$this->deconnexion($c);
return $r;
}

public function assoclanguetrad_model($id){
$c=$this->connexion($this->dbname,$this->host,$this->user,$this->password);
$qtf="select * from assoc_traduc_langue  where id_traduc=".$id ;
$r=$this->requete($c,$qtf);
$this->deconnexion($c);
return $r;
}


public function typeaffich_model($id){
$c=$this->connexion($this->dbname,$this->host,$this->user,$this->password);
$qtf="select * from type_traduction  where idtype=".$id ;
$r=$this->requete($c,$qtf);
$this->deconnexion($c);
return $r;
}

public function langueaffich_model($id){
$c=$this->connexion($this->dbname,$this->host,$this->user,$this->password);
$qtf="select * from langues  where idlangue=".$id ;
$r=$this->requete($c,$qtf);
$this->deconnexion($c);
return $r;
}

public function supprimTraduct_model($id){
$c=$this->connexion($this->dbname,$this->host,$this->user,$this->password);
$qtf="update traducteur set supprime='1' WHERE id=".$id ;
$r=$this->requete($c,$qtf);
$this->deconnexion($c);
}

public function bloqTraduct_model($id){
$c=$this->connexion($this->dbname,$this->host,$this->user,$this->password);
$qtf="update traducteur set bloque='1' WHERE id=".$id ;
$r=$this->requete($c,$qtf);
$this->deconnexion($c);
}


public function debloqTraduct_model($id){
$c=$this->connexion($this->dbname,$this->host,$this->user,$this->password);
$qtf="update traducteur set bloque='0' WHERE id=".$id ;
$r=$this->requete($c,$qtf);
$this->deconnexion($c);
}

public function traduc_id_model($id){
$c=$this->connexion($this->dbname,$this->host,$this->user,$this->password);
$qtf="select * from traducteur where id=".$id;
$r=$this->requete($c,$qtf);
$this->deconnexion($c);
return $r;
}
public function client_id_model($id){
$c=$this->connexion($this->dbname,$this->host,$this->user,$this->password);
$qtf="select * from user where id=".$id;
$r=$this->requete($c,$qtf);
$this->deconnexion($c);
return $r;
}

public function devis_model($id){
$c=$this->connexion($this->dbname,$this->host,$this->user,$this->password);
$qtf="select * from  demande_devis where id=".$id;
$r=$this->requete($c,$qtf);
$this->deconnexion($c);
return $r;
}

public function profil($id){
        $cnx=$this->connexion($this->dbname,$this->host,$this->user,$this->password);
		$req="select * from traducteur where id='".$id."'";
		$r=$this->requete($cnx,$req);
        $this->deconnexion($cnx);
        return $r;
    }

public function recup_devis_traduc_model($id){
        $cnx=$this->connexion($this->dbname,$this->host,$this->user,$this->password);
		$req="select * from assoc_devis_traduc where id_traduc='".$id."'";
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
    public function useraff_model($id){
     $cnx=$this->connexion($this->dbname,$this->host,$this->user,$this->password);
    		$req="select * from user where id='".$id."'";
    		$r=$this->requete($cnx,$req);
            $this->deconnexion($cnx);
            return $r;

    }

    public function info_client_model(){
        $c=$this->connexion($this->dbname,$this->host,$this->user,$this->password);
        $qtf="select * from user ";
        $r=$this->requete($c,$qtf);
        $this->deconnexion($c);
        return $r;
        }

        public function bloqClient_model($id){
        $c=$this->connexion($this->dbname,$this->host,$this->user,$this->password);
        $qtf="update user set bloque='1' WHERE id=".$id ;
        $r=$this->requete($c,$qtf);
        $this->deconnexion($c);
        }

        public function supprimClient_model($id){
        $c=$this->connexion($this->dbname,$this->host,$this->user,$this->password);
        $qtf="update user set supprime='1' WHERE id=".$id ;
        $r=$this->requete($c,$qtf);
        $this->deconnexion($c);
        }

        public function debloqClient_model($id){
        $c=$this->connexion($this->dbname,$this->host,$this->user,$this->password);
        $qtf="update user set bloque='0' WHERE id=".$id ;
        $r=$this->requete($c,$qtf);
        $this->deconnexion($c);
        }
        public function profil_client($id){
                $cnx=$this->connexion($this->dbname,$this->host,$this->user,$this->password);
                $req="select * from user where id='".$id."'";
                $r=$this->requete($cnx,$req);
                $this->deconnexion($cnx);
                return $r;
            }

         public function modifier_client($btn,$nom1,$prenom,$mail,$tel,$adr,$wil,$com,$id){
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
                    $req=$bdd->query("update user set nom='".$nom."' , prenom='".$prenom."',email='".$mail."',tel=".$tel.",wilaya=".$wilaya.",commune=".$commune.",adresse='".$adr."' where id=".$id);
                }

            }

         public function devis_client_id_model($id){
         $cnx=$this->connexion($this->dbname,$this->host,$this->user,$this->password);
                         $req="select * from demande_devis where idutilis='".$id."'";
                         $r=$this->requete($cnx,$req);
                         $this->deconnexion($cnx);
                         return $r;
         }

         public function recup_traduction_traduc_model($id){
                 $cnx=$this->connexion($this->dbname,$this->host,$this->user,$this->password);
         		$req="select * from assoc_traduction_traduc where id_traduc='".$id."'";
         		$r=$this->requete($cnx,$req);
                 $this->deconnexion($cnx);
                 return $r;
         }
         public function traduction_model($id){
         $c=$this->connexion($this->dbname,$this->host,$this->user,$this->password);
         $qtf="select * from  demande_traduction where id=".$id;
         $r=$this->requete($c,$qtf);
         $this->deconnexion($c);
         return $r;
         }
          public function traduction_client_id_model($id){
                  $cnx=$this->connexion($this->dbname,$this->host,$this->user,$this->password);
                                  $req="select * from demande_traduction where idutilis='".$id."'";
                                  $r=$this->requete($cnx,$req);
                                  $this->deconnexion($cnx);
                                  return $r;
                  }


}

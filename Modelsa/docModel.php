<?php


class docModel
{
    private $docs;
   private $nomDoc;
   private $path;
   private $mysqli;
   private $date;


function getDocs(){
    $this->mysqli= new mysqli('localhost', 'root', '', 'traductionbase');
    $query1="SELECT * FROM `documentsoumis` ORDER BY date";
    $sql1= mysqli_query($this->mysqli, $query1);
    return $sql1;
}
function deleteDocs($doc){

    $this->mysqli= new mysqli('localhost', 'root', '', 'traductionbase');

    $req = "DELETE FROM `documentsoumis`  WHERE id='" . $doc. "'";
    $sql1= mysqli_query($this->mysqli, $req);


}
function  fetchBy($TriDate){
    $this->mysqli= new mysqli('localhost', 'root', '', 'traductionbase');
    $query="select * from `documentsoumis` where id>1";


    $query.=" ORDER BY date ";
    if ($TriDate =="faux") {$query.=" DESC"; }
    $sql1= mysqli_query($this->mysqli, $query);
    return $sql1;
}
}

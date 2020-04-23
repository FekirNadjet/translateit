<?php


class docController
{

    function setDoc(){

        if(isset($_POST['submit']) AND $_POST['submit'] == 'ajoutDoc'){

            $docs['doc']=$_FILES['doc'];


            try {
                include "../Modelsa/docModel.php";
                new docModel($docs);



            }
            catch (Exception $exc){
                echo $exc->getMessage();
            }

        }
}
    function getDoc(){
        include "../Modelsa/docModel.php";
        $model=new docModel();
        $documents=$model->getDocs();
        return $documents;
    }
    function deleteDoc(){
        if(isset($_POST['submit']) AND $_POST['submit'] == 'supprimer'){
            $doc=$_POST['doc'];

            include "../Modelsa/docModel.php";
            $model=new docModel();
            $model->deleteDocs($doc);
        }

    }
    function fetchBy(){
       
        $TriDate=$_POST['TriDate'];
        include "../Modelsa/docModel.php";
        $model=new docModel();
        $documents=$model->fetchBy($TriDate);
        echo(
        '<table border="1">
           <tr>
               <th> Nom du document</th>
               <th> Date de soumission</th>
               <th> Type</th>
               <th> Devis Ou Traduction</th>
               <th> Supprimer</th>
           </tr>
               <div id="listeDocuments">');
        foreach ($documents as $document ){
            if ($document['devisVsTrad']==0){
                $type='Devis';
            }
            else $type='Traduction';
         echo ('<tr id="'.$document['id'] .'">
                <td><a onclick="OuvrirPopup(\''. $document['chemin'] . '\')" href="javascript:void(0)">'.$document['nom'].'</a></td>
                <td>'.$document['date'].'</td>
                <td>'.$document['type'].'</td>
                <td>'.$type.'</td>
                <td> <a class="remove" href="" data-toggle="modal" data-target="#suppModal" id="'.$document['id'].'">
                     Supprimer
                     </a></td>
                </tr>');


        }


    }
}
$c=new docController();
if(isset($_POST['submit']) AND $_POST['submit'] == 'supprimer'){
    $c->deleteDoc();
    header('Location: '.$_SERVER['HTTP_REFERER']);
}
if( isset($_POST['TriDate'])){
    $c->fetchBy();
}
/*if(isset($_POST['submit']) AND $_POST['submit'] == 'ajoutDoc'){
    $c->setDoc();
    header('Location: '.$_SERVER['HTTP_REFERER']);
}*/
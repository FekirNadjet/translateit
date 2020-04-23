<?php

include '../Controllersa/docController.php';
class docVue
{
    var $Controller;
    public function affich(){
        $this->Controller=new docController();
        $documents=$this->Controller->getDoc();
        ?>
        <!doctype html>
        <html lang="en">
        <head>
        <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
       
            <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <title>Document</title>
        </head>
        <body>
 
       <div>
    
           <select id="tri" name="tri" onchange="get_all_filters()" >
               <option value="vrai">Plus Ancien</option>
               <option value="faux">Plus Recent</option>
           </select>
       </div>

       <article id="listeDocuments">
       
           <table id="table_format" border="1">
           <tr>
               <th> Nom du document</th>
               <th> Date de soumission</th>
               <th> Type</th>
               <th> Devis Ou Traduction</th>
               <th> Supprimer</th>
           </tr>
               <div id="listeDocuments">
<?php
        foreach ($documents as $document){


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

         ?>
               </div>

           </table>
       </article>
       <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="ddtf.js"></script>
<script>
jQuery('#table_format').ddTableFilter();
</script>

       <div class="modal fade" id="suppModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
           <div class="modal-dialog" role="document">
               <div class="modal-content">
                   <form class="form-horizontal" method="POST" action="../Controllersa/docController.php" id="supp_doc">
                       <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                       </div>
                       <div class="modal-body">
                           <h4 style="font-size: 16px;">Etes vous sur de vouloir supprimer ce document ? </h4>
                           <input type="hidden" name="doc" id="doc" value="">
                       </div>
                       <div class="modal-footer">
                           <button type="button" class="btn btn-default-outline" data-dismiss="modal">NON</button>
                           <button type="submit" name="submit" id="supp1" class="btn btn-primary" value="supprimer">OUI</button>
                       </div>
                   </form>
               </div>
           </div>
       </div>
        </body>
        <script>
            function OuvrirPopup(page) {
                window.open(page);
            }


                $(document).ready(function(){
                    $(document).on('click','.remove',function(){

                        var doc = $(this).attr("id");
                        $("#doc").val(doc);

                    });
                });


        </script>
        <script>
            function get_all_filters() {
                var type = $("#fetchval").val();
                var TradDevis = $("#devisTrad").val();
                var TriDate = $("#tri").val();

                $.ajax(
                    {
                        url:'../Controllersa/docController.php',
                        type:'POST',
                        data:{type:type,TradDevis:TradDevis,TriDate:TriDate},

                        beforeSend:function()
                        {
                            $("#listeDocuments").html("working...");

                        },
                        success:function(data)
                        {
                            $("#listeDocuments").html(data);
                        },
                    });
            }

        </script>
        </html>

        <?php
    }

}
$c=new docVue();
$c->affich();
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
<div class="container" >

<table id="table_format"><tbody><tr><th>nom</th>
<th>prenom</th>
<th>mail</th>
<th>numtel </th>

</tr>

<?php 
  try
  {
  $bdd = new PDO('mysql:host=127.0.0.1;dbname=tpweb','root', '');
  }
  catch (Exception $e)
  {
      die('Erreur : '.$e->getMessage());
  
  }
  $requser1= $bdd->prepare("SELECT * FROM recrutement");
  $requser1->execute(array());
  foreach($requser1 as $rowf)
  {?>
  <tr>
    <td> <?php echo $rowf["nom"]; ?> </td>
    <td> <?php echo $rowf["prenom"]; ?> </td>
    <td> <?php echo $rowf["mail"]; ?> </td>
    <td> <?php echo $rowf["numtel"]; ?> </td>
    </tr>
  <?php
  }
?>


</tbody></table>
</div>
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="ddtf.js"></script>
<script>
jQuery('#table_format').ddTableFilter();
</script>

</body>
</html>

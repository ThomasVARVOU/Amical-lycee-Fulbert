<?php
  //var_dump($_POST['test']);
  //echo $_POST['test'];
 // echo $_POST['modiffier'];
  include_once ('fonction.php');
  $bdd = connexionBDD();
  $test = $bdd->prepare('SELECT idrecette FROM commentaire WHERE idcommentaire = :id;');
  $test->execute(array(
            'id' => $_POST['test']));
  $trois = $test->fetch();
  $req = $bdd->prepare('UPDATE commentaire SET commentaire = :commentaire WHERE idcommentaire = :id;');
  $req->execute(array(
        ':commentaire' => $_POST['modiffier'],
        ':id' => $_POST['test']));
  $tete = 'Location: voirRecette.php?idRecette='. $trois['idrecette'];
  echo $tete;
  header($tete);
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

</body>
</html>

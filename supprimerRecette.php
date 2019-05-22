<?php
    session_start();
    include_once('fonction.php');
    $bdd = connexionBDD();
    $user = $bdd->prepare('SELECT idUtilisateur FROM recettes WHERE idrecette = :id;');
    $user->execute(array('id' => $_GET['idRecette']));
    $trois = $user->fetch();
    if($trois['idUtilisateur'] != $_SESSION['id'])
    {
      echo'erreur';
    }
    else
    {
      $req = $bdd->prepare('DELETE FROM recettes WHERE idrecette = :id;');
         $req->execute(array(
            'id' => $_GET['idRecette']));
          $tete = 'Location: index.php';
          echo $tete;
          header($tete);
    }
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

</body>
</html>

<?php
    session_start();
    include_once('fonction.php');
    $bdd = connexionBDD();
    $user = $bdd->prepare('SELECT idUtilisateur FROM recettes WHERE idrecette = :id;');
    $user->execute(array(
             'id' => $_POST['test']));
    $trois = $user->fetch();
    if($trois['idUtilisateur'] != $_SESSION['id'])
    {
      echo'erreur';
    }
    else
    {
      $req = $bdd->prepare('UPDATE recettes SET nom = :nom, ingredients = :ingredients, instruction = :instruction, temp = :temp WHERE idrecette = :id;');
         $req->execute(array(
            'nom' => $_POST['titre_recette'],
            'ingredients' => $_POST['ingredient'],
            'id' => $_POST['test'],
            'instruction' => $_POST['preparation'],
            'temp' => $_POST['temp']));
          $tete = 'Location: voirRecette.php?idRecette='. $_POST['test'];
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

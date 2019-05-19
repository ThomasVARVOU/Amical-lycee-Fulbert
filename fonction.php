<?php
  function panneau($nom, $prenom, $id)
  {
    $id = 1234;
    //echo '<a href="inscription.php">Cliquer ici</a>';
    //echo'<li class="nav-item active">';
          //echo"test";
        //echo'<a class="nav-link" href="inscription.php">SESSION <span class="sr-only">(current)</span></a>';
        //echo'</li>';
    if(!empty($id))
      {
        //echo $nom;
        $rip = $nom . ' ' . $prenom;
        $use = '<a class="nav-link" href="profil.php">'. $rip . '<span class="sr-only">(current)</span></a>';

        echo'<li class="nav-item active">';
          //echo"test";
        //echo'<a class="nav-link" href="inscription.php"> ' $use ' <span class="sr-only">(current)</span></a>';
        echo $use;
        echo'</li>';
        //echo '<a href="inscription.php">Cliquer ici</a>';
        echo'<li class="nav-item active">';
        echo'<a class="nav-link" href="Nrecette.php">nouvelle recette <span class="sr-only">(current)</span></a>';
        echo'</li>';
        echo'<li class="nav-item active">';
        echo'<a class="nav-link" href="deco.php">Deconnexion <span class="sr-only">(current)</span></a>';
        echo'</li>';
       }
    else
      {
        //echo '<a href="inscription.php">ERREUR</a>';
        echo'<li class="nav-item active">';
        echo'<a class="nav-link" href="connexion.php">Connexion <span class="sr-only">(current)</span></a>';
        echo'</li>';

      }
  }
  function connexionBDD()
  {
    try
    {
    // On se connecte à MySQL
      $base = new PDO('mysql:host=localhost;dbname=fulbert;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
    // En cas d'erreur, on affiche un message et on arrête tout
      die('Erreur : '.$e->getMessage());
    }
    //return $bdd;
    return $base;
  }
  function lienDynamique()
  {
    $bdd = connexionBDD();
    $req = $bdd->prepare('SELECT max(idRecette) FROM recettes;');
    $req->execute();
    $theo = $req->fetch();
    $compteur = $theo['max(idRecette)'];
    for($i=1;$i <= $compteur; $i++)
    {
      $req = $bdd->prepare('SELECT nom FROM recettes WHERE idrecette = :id;');
      $req->execute(array('id' => $i));
      $romain = $req->fetch();
      $nom=$romain['nom'];
      $requette = '<a href="voirRecette.php?idRecette='. $i .'">'. $nom . ' </a>';
      echo $requette;
      echo'</br>';

    }
  }
  function modifierCompte()
  {
    //session_start();
    $bdd = connexionBDD();
    $id = $bdd->prepare('SELECT nom, prenom, email FROM utilisateur WHERE idutilisateur = :id');
    $id->execute(array('id' => $_SESSION['id']));
    $romain = $id->fetch();
    echo '<center><b>email: </b><input type="text" name="email" value="'. $romain['email'] . '" /> </center>';
    //echo $speack;
    echo '<center><b>Nom: </b><input type="text" name="nom" value="' . $romain['nom'] . '" /> </center>';
    echo '<center><b>Nom: </b><input type="text" name="prenom" value="' . $romain['prenom'] . '" /> </center>';

  }
  function updateCompte($id, $nom, $prenom, $email)
  {
    $bdd = connexionBDD();
    echo $id;
    echo $nom;
    echo $prenom;
    echo $email;
    $req = $bdd->prepare('UPDATE utilisateur SET nom = :nom, prenom = :prenom, email = :email WHERE id = :id;');
    $req->execute(array(
            'nom' => $nom,
            'prenom' => $prenom,
            'id' => $id,
            'email' => $email));
    echo 'modification effectuer';

  }
  function commentaireView($id)
  {
    $bdd = connexionBDD();
    $req = $bdd->prepare('SELECT max(idcommentaire) AS idcommentaire FROM commentaire;');
    $req->execute();
    $compteur = $req->fetch();
    //echo $compteur['idcommentaire'];
    while($compteur['idcommentaire'] >= 0)
    {
        //echo 'boucle 2' . $compteur['idcommentaire'] . '';
        $test = $bdd->prepare('SELECT idrecette FROM commentaire WHERE idcommentaire = :compteur;');
        $test->execute(array(
           'compteur' => $compteur['idcommentaire']));
        $verif = $test->fetch();
        if($id == $verif['idrecette'])
        {
          $user = $bdd->prepare('SELECT nom, prenom FROM utilisateur INNER JOIN commentaire WHERE idcommentaire = :compteur;');
          $user->execute(array(
             'compteur' => $compteur['idcommentaire']));
          $trois = $user->fetch();
          //echo'boucle';
          echo'<p style="color:#FF0000";>'. $trois['nom'] . ' '. $trois['prenom'] .'text</p>';
          $com = $bdd->prepare('SELECT commentaire, idUtilisateur, idcommentaire FROM commentaire WHERE idcommentaire = :compteur;');
          $com->execute(array(
             'compteur' => $compteur['idcommentaire']));
          $coco = $com->fetch();
          //echo'<p style="color:#778899;">' . $compteur['idcommentaire'] . '</p>';
          echo '       '. $coco['commentaire'] . '';
          if($coco['idUtilisateur'] == $_SESSION['id'])
          {
            echo'</br>';
            echo'<a href="modifierCommentaire.php?idcommentaire=' . $coco['idcommentaire'] . '">Modifier</a>';
            echo'</br>';
            echo'<a href="supprimerCommentaire.php?idcommentaire=' . $coco['idcommentaire'] . '">Supprimer</a>';
            echo'</br>';
          }
        }
        $compteur['idcommentaire']--;
    }
  }
  function postCommentaire($id)
  {
    //echo '<form method="post" action="posterCommentaire.php?idRecette='. $id .'">';
    echo '<form method="post" action="posterCommentaire.php">';
  }
  function modifierCommentaire($id)
  {
    $bdd = connexionBDD();
    $user = $bdd->prepare('SELECT commentaire FROM commentaire WHERE idcommentaire = :id;');
    $user->execute(array(
             'id' => $id));
    $trois = $user->fetch();
    echo'<form name="modification" method="post" action="cibleModifierCompte.php">';
    echo'<textarea rows="8" cols="100" name=modiffier id="modifier" value="'. $trois['commentaire'] . '></textarea>';
    echo'<center><input type="submit" name="ok" value="Envoyer"/></center>';
  }
?>

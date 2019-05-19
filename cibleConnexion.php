<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Amical Lycée Fulbert</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap-4.2.1.css" rel="stylesheet">

  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
       <a class="navbar-brand" href="#">Navbar</a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
       </button>
       <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
             <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
             </li>
             <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
             </li>
             <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
                </a>
		    <li class="nav-item active">
              <a class="nav-link" href="connexion.php">Connexion <span class="sr-only">(current)</span></a>
            </li>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                   <a class="dropdown-item" href="#">Action</a>
                   <a class="dropdown-item" href="#">Another action</a>
                   <div class="dropdown-divider"></div>
                   <a class="dropdown-item" href="#">Something else here</a>
                </div>
             </li>
             <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
             </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
             <input class="form-control mr-sm-2" type="search" placeholder="Rechercher" aria-label="Search">
             <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
          </form>
       </div>
    </nav>

  <div class="jumbotron jumbotron-fluid text-center">
       <h1 class="display-4">Amical Lycée Fulbert</h1>
       <p class="lead">Le syte de partage de recette du lycée Fulbert</p>
       <hr class="my-4">
<p class="lead">&nbsp; </p>
    </div>
  <div>&nbsp;</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.3.1.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap-4.2.1.js"></script>
            <?php
            /*
            Page: connexion.php
            */
            //session_start(); // à mettre tout en haut du fichier .php, cette fonction propre à PHP servira à maintenir la $_SESSION
            if(isset($_POST['connexion'])) { // si le bouton "Connexion" est appuyé
                // on vérifie que le champ "Pseudo" n'est pas vide
                // empty vérifie à la fois si le champ est vide et si le champ existe belle et bien (is set)
                if(empty($_POST['email'])) {
                    echo "Le champ Pseudo est vide.";
                } else {
                    // on vérifie maintenant si le champ "Mot de passe" n'est pas vide"
                    if(empty($_POST['mdp'])) {
                        echo "Le champ Mot de passe est vide.";
                    } else {
                        // les champs sont bien posté et pas vide, on sécurise les données entrées par le membre:
                        $Pseudo = $_POST['email']; // le htmlentities() passera les guillemets en entités HTML, ce qui empêchera les injections SQL
                        $MotDePasse = $_POST['mdp'];
                        //on se connecte à la base de données:
                        /*try
                        {
                          // On se connecte à MySQL
                          $bdd = new PDO('mysql:host=localhost;dbname=fulbert;charset=utf8', 'root', '');
                        }
                        catch(Exception $e)
                        {
                          // En cas d'erreur, on affiche un message et on arrête tout
                                die('Erreur : '.$e->getMessage());
                        }*/
                        include ('fonction.php');
                        $bdd = connexionBDD();
                        $req = $bdd->prepare('SELECT password FROM utilisateur WHERE email = :email');
                        $req->execute(array('email' => $_POST['email']));
                        $cleCryptage = 123456;
                        $crypter = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
                        $donnees = $req->fetch();
                        //echo '<pre>';
                        //print_r($donnees);
                        //echo '</pre>';
                        //echo $donnees['password'];
                        if(password_verify($MotDePasse , $donnees['password']))
                        {
                          echo "Connexion effectuer";
                          $id = $bdd->prepare('SELECT nom, prenom, idutilisateur FROM utilisateur WHERE email = :email');
                          $id->execute(array('email' => $_POST['email']));
                          $donnees = $id->fetch();
                          /*echo '<pre>';
                          print_r($donnees);
                          echo '</pre>';
                          echo $donnees['nom'];
                          echo $donnees['prenom'];
                          echo $donnees['idutilisateur']; */
                          $_SESSION['prenom'] = $donnees['prenom'];
                          $_SESSION['nom'] = $donnees['nom'];
                          $_SESSION['id'] = $donnees['idutilisateur'];
                          header('Location: index.php');
                          exit();
                        }
                        else
                        {
                          echo "connection fail";
                        }

                        }
                    }
                }
           // }

  ?>



<p>Vos donnée ont bien était enregistrer</p>
</body>
</html>

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
    <link href="css/Nrecette.css" rel="stylesheet">

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
                <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
             </li>
             <li class="nav-item active">
                <a class="nav-link" href="recette.php">Recette <span class="sr-only">(current)</span></a>
             </li>
             <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
             </li>
             <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
                </a>
		    <!---<li class="nav-item active">
              <a class="nav-link" href="connexion.php">Connexion <span class="sr-only">(current)</span></a>
             </li>--->
			   <li class="nav-item active">
              <a class="nav-link" href="inscription.php">Inscription <span class="sr-only">(current)</span></a>
             </li>

             <?php
                include ('fonction.php');
                if(isset($_SESSION["nom"]) && isset($_SESSION["prenom"]) && isset($_SESSION["id"]))
                {
                 panneau($_SESSION["nom"], $_SESSION["prenom"], $_SESSION["id"]);
                }
                else
                {
                  echo'<li class="nav-item active">';
                  echo'<a class="nav-link" href="connexion.php">Connexion <span class="sr-only">(current)</span></a>';
                  echo'</li>';
                }

             ?>
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
      <blockquote>
        <pre class="lead text-capitalize"><strong>Nouvelle Recette</strong></pre>
		  
		  
      </blockquote>
		<?php
      if(empty($_SESSION['id']))
      {
        echo'Erreur';
      }
      else
      {
        include_once ('fonction.php');
        $bdd = connexionBDD();
      }
      $req = $bdd->prepare('INSERT INTO recettes(idUtilisateur, nom, ingredients, instruction, temp) values (:id, :nom, :ingredients, :instructions, :temp);');
      $req->execute(array(
            'id' => $_SESSION['id'],
            'nom' => $_POST['titre'],
            'ingredients' => $_POST['ingredient'],
            'instructions' => $_POST['preparation'],
            'temp' => $_POST['temp']));
      echo'Votre recette à bien était enregistrer';
    ?>
      <hr class="my-4">
<p class="lead">&nbsp; </p>
    </div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.3.1.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap-4.2.1.js"></script>
  </body>
</html>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Amical Lycée Fulbert</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap-4.2.1.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="icon.png" />

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
	<form name="inscription" method="get" action="cible2.php">
	<p>
		<center><b>email: </b><input type="email" name="email" /> </center>
		<center><b>Mots de passe: </b><input type="password" name="mdp"/></center> <br/> <br/>
		<!--<center><b>Re taper le Mots de passe: </b><input type="text" name="mdp2"/></center> -->
		<center><b>Nom: </b><input type="text" name="nom"/></center>	
		<center><b>Prenom: </b><input type="text" name="prenom"/></center>
		<center><input type="submit" name="ok" value="Envoyer"/></center>
	</p>
  </body>
</html>

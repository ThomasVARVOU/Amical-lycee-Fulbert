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
       <h1 class="display-4">Amical Lycée Fulbert</h1>
       <p class="lead">Le syte de partage de recette du lycée Fulbert</p>
       <hr class="my-4">
       <p>This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
       <p class="lead">
          <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
       </p>
    </div>
    <div class="container">
       <div class="row text-center">
          <div class="col-lg-6 offset-lg-3">Click outside the blue container to select this <strong>row</strong>. Columns are always contained within a row. <strong>Rows are indicated by a dashed grey line and rounded corners</strong>. </div>
       </div>
       <br>
       <hr>
       <br>
       <div class="row">
          <div class="col-md-4">
             <div class="card">
                <img class="card-img-top" src="images/card-img.png" alt="Card image cap">
                <div class="card-body">
                   <h4 class="card-title">Card title</h4>
                   <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                   <br><br>
                   <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
             </div>
          </div>
          <div class="col-md-4">
             <div class="card">
                <div class="card-body">
                   <h5 class="card-title">Card title</h5>
                   <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                   <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                   <a href="#" class="card-link">Card link</a>
                   <a href="#" class="card-link">Another link</a>
                </div>
             </div>
             <br>
             <br/>
             <div class="card">
                <div class="card-header">
                   Featured
                </div>
                <ul class="list-group list-group-flush">
                   <li class="list-group-item">Cras justo odio</li>
                   <li class="list-group-item">Dapibus ac facilisis in</li>
                   <li class="list-group-item">Vestibulum at eros</li>
                </ul>
             </div>
          </div>
          <div class="col-md-4">
             <div class="card">
                <img class="card-img-top" src="images/card-img.png" alt="Card image cap">
                <div class="card-body">
                   <h5 class="card-title">Card title</h5>
                   <p class="card-text">Some text to build on the card's content.</p>
                </div>
                <ul class="list-group list-group-flush">
                   <li class="list-group-item">Cras justo odio</li>
                   <li class="list-group-item">Dapibus ac facilisis in</li>
                </ul>
                <div class="card-body">
                   <a href="#" class="card-link">Card link</a>
                   <a href="#" class="card-link">Another link</a>
                </div>
             </div>
          </div>
       </div>
       <br/>
       <br/>
       <div class="row">
          <div class=" col-md-4"> Click here to select this<strong> column.</strong> Always place your content within a column. Columns are indicated by a dashed blue line. </div>
          <div class="col-md-4 "> You can <strong>resize a column</strong> using the handle on the right. Drag it to increase or reduce the number of columns.</div>
          <div class="col-md-4 "> You can <strong>offset a column</strong> using the handle on the left. Drag it to increase or reduce the offset. </div>
       </div>
       <br/>
       <br/>
       <div class="row">
          <div class="col-md-6 text-center">
             <div class="card">
                <div class="card-body">
                   <h3>Adding <strong>Buttons</strong></h3>
                   <p>Quickly add buttons to your page by using the button component in the insert panel. </p>
                   <button type="button" class="btn btn-info btn-md">Info Button</button>
                   <button type="button" class="btn btn-success btn-md">Success Button</button>
                </div>
             </div>
          </div>
          <div class="text-center col-md-6">
             <div class="card">
                <div class="card-body">
                   <h3>Adding <strong>Badges</strong></h3>
                   <p>Using the insert panel, add badge to your page by using the badge component.</p>
                   <span class="badge badge-info">Info Badge</span> <span class="badge badge-danger">Danger Badge</span>
                </div>
             </div>
          </div>
       </div>
       <br>
       <hr>
       <div class="row">
          <div class="text-center col-lg-6 offset-lg-3">
             <h4>Footer </h4>
             <p>Copyright &copy; 2015 &middot; All Rights Reserved &middot; <a href="#" >My Website</a></p>
          </div>
       </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.3.1.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap-4.2.1.js"></script>
  </body>
</html>

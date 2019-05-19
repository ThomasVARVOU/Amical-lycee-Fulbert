<?php
	session_start();
	if(empty($_SESSION['id']))
	{
		echo'erreur il faut etre connecter pour poster un commentaire';
	}
	else
	{
		include ('fonction.php');
		$bdd = connexionBDD();
	    $req = $bdd->prepare('INSERT INTO commentaire(idUtilisateur, idrecette, commentaire) values (:utilisateur, :recette, :commentaire);');
	    $req->execute(array(
	           'utilisateur' => $_SESSION['id'],
	           'recette' => $_POST['var1'],
	           'commentaire' => $_POST['posterCommentaire']));
	    echo ' commentaire:'. $_POST['posterCommentaire'] .'';
	    echo ' idRecette:'. $_POST['var1'] .'';
	    header ("Location: $_SERVER[HTTP_REFERER]" );
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
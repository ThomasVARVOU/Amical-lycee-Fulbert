<?php
	session_start();
	include ('fonction.php');
	$bdd = connexionBDD();
	$user = $bdd->prepare('DELETE FROM utilisateur WHERE idutilisateur = :id ');
	$user->execute(array(
	           'id' => $_SESSION['id']));
	$recette = $bdd->prepare('DELETE FROM recettes WHERE idUtilisateur = :id ');
	$recette->execute(array(
	           'id' => $_SESSION['id']));
	$commentaire = $bdd->prepare('DELETE FROM commentaire WHERE idUtilisateur = :id ');
	$commentaire->execute(array(
	           'id' => $_SESSION['id']));
	session_destroy();
	header('Location: index.php');
	exit();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>
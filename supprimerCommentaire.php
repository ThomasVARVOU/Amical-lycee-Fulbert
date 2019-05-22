<?php
  include ('fonction.php');
  $bdd = connexionBDD();
  $user = $bdd->prepare('DELETE FROM commentaire WHERE idcommentaire = :id ');
  $user->execute(array(
             'id' => $_GET['idcommentaire']));
  header ("Location: $_SERVER[HTTP_REFERER]" );
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

</body>
</html>

<?php
session_start();
if(!isset($_SESSION['id'])){
    header("location: connexion.php");
}
else{
    $bdd = new PDO('mysql:host=localhost;dbname=zombiecod', 'root', '');

    $username = $_SESSION['pseudo'];
    $email = $_SESSION['email'];
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	    <title>Profil</title>
	    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
	    <div align="center">
	        <h2>Profil de <?php echo $username ?></h2>
	        <br /><br />
	        Pseudo = <?php echo $username ?>
	        <br />
	        Mail = <?php echo $email ?>
	        <br />
	        <br />
	        <a href="editionprofil.php">Editer mon profil</a>
	        <a href="deconnexion.php">Se déconnecter</a>
			<a href="index.php">Revenir a l'accueil</a>
	    </div>
	</body>
</html>
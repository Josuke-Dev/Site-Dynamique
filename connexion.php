<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=zombiecod', 'root', '');

if(isset($_POST['formconnexion'])) {
    $mailconnect = htmlspecialchars($_POST['mailconnect']);
    $passwordconnect = htmlspecialchars($_POST['passwordconnect']);
    if(!empty($mailconnect) AND !empty($passwordconnect)) {
       $requser = $bdd->prepare("SELECT password FROM users WHERE email = ?");
       $requser->execute([$mailconnect]);
       $requserresult = $requser->fetch();
       $verifpaswrd = password_verify($passwordconnect, $requserresult['password']);  
       if($requserresult) {
           if($verifpaswrd){
            $userinfo = $bdd->prepare("SELECT * FROM users WHERE email = ?"); 
            $userinfo->execute([$mailconnect]);
            $userinforesult = $userinfo->fetch();
            $_SESSION['id'] = $userinforesult['id'];
            $_SESSION['pseudo'] = $userinforesult['pseudo'];
            $_SESSION['email'] = $userinforesult['email'];
            header("Location:index.php?id=".$_SESSION['id']);
        }
       } else {
          $erreur = "Mauvais mail ou mot de passe !";
       }
    } else {
       $erreur = "Tous les champs doivent être complétés !";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href=".Site dynamique\CSS\codeco.css">
        <title>COD Zombie</title>
    </head>
    <body>
        <div align="center">
            <h2>Connexion</h2>
            <br /><br />
            <form method="POST" action="">
                 <input type="email" name="mailconnect" placeholder="Email" />
                 <input type="password" name="passwordconnect" placeholder="Mot de passe" />
                 <input type="submit" name="formconnexion" value="Se connecter !" />
            </form>
            <br />
            <a href="inscription.php">Créer votre compte</a>
            <?php
            if(isset($erreur)){
                echo '<font color="red">'.$erreur."</font>";
            }
            ?>
        </div>
    </body> 
</html>
                
                
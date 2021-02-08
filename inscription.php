<?php

$bdd = new PDO('mysql:host=localhost;dbname=zombiecod', 'root', '');

if(isset($_POST['forminscription'])){
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mail = htmlspecialchars($_POST['mail']);
    $mail2 = htmlspecialchars($_POST['mail2']);
    $password = htmlspecialchars($_POST['password']);
    $password2 = htmlspecialchars($_POST['password2']);
    if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['password']) AND !empty($_POST['password2'])){
        $pseudolength = strlen($pseudo);
	      if($pseudolength <= 255) {
	         if($mail == $mail2) {
	            if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
	               $reqmail = $bdd->prepare("SELECT * FROM users WHERE email = ?");
	               $reqmail->execute(array($mail));
	               $mailexist = $reqmail->rowCount();
	               if($mailexist == 0) {
	                  if($password == $password2) {
                        $password = password_hash($password, PASSWORD_DEFAULT);
	                    $insertmbr = $bdd->prepare("INSERT INTO users(pseudo, email, password) VALUES(?, ?, ?)");
	                    $insertmbr->execute(array($pseudo, $mail, $password));
	                    $erreur = "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>";
	                  } else {
	                     $erreur = "Vos mots de passes ne correspondent pas !";
	                  }
	               } else {
	                  $erreur = "Adresse mail déjà utilisée !";
	               }
	            } else {
	               $erreur = "Votre adresse mail n'est pas valide !";
	            }
	         } else {
	            $erreur = "Vos adresses mail ne correspondent pas !";
	         }
	      } else {
	         $erreur = "Votre pseudo ne doit pas dépasser 255 caractères !";
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
            <h2>Inscription</h2>
            <br /><br /><br />
            <form method="POST" action="">
                <table>
                    <tr>
                        <td align="right">
                            <label for="pseudo">Pseudo :</label>
                        </td>
                        <td>
                            <input type="text" placeholder="Votre pseudo" id="pseudo" name="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <label for="mail">Email :</label>
                        </td>
                        <td>
                            <input type="email" placeholder="Votre mail" id="mail" name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <label for="mail2">Confirmez votre email :</label>
                        </td>
                        <td>
                            <input type="email" placeholder="Confirmez votre email" id="mail2" name="mail2" value="<?php if(isset($mail2)) { echo $mail2; } ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <label for="password">Mot de passe :</label>
                        </td>
                        <td>
                            <input type="password" placeholder="Votre Mot de passe" id="password" name="password" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <label for="password2">Confirmez votre mot de passe :</label>
                        </td>
                        <td>
                            <input type="password" placeholder="Votre Mot de passe" id="password2" name="password2" />
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td align="center">
                        <br />
                            <input type="submit" name="forminscription" value="Je m'inscris"/>
                        </td>
                    </tr>
                </table>  
            </form>
            <?php
            if(isset($erreur)){
                echo '<font color="red">'.$erreur."</font>";
            }
            ?>
        </div>
    </body> 
</html>
                
                
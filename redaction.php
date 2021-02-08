<?php
    $bdd = new PDO('mysql:host=localhost;dbname=zombiecod', 'root', '');
    if(isset($_POST['article_titre'], $_POST['article_contenu'])) {
        if(!empty($_POST['article_titre']) AND !empty($_POST['article_contenu'])) {
            $article_titre = htmlspecialchars($_POST['article_titre']);
            $article_contenu = htmlspecialchars($_POST['article_contenu']);
            $ins = $bdd->prepare('INSERT INTO articles(titre, contenu, date_time_publication) VALUES(?, ?, NOW())');
            $ins->execute(array($article_titre, $article_contenu));
            $message = '<span class="text-info">Votre article a bien été posté</span><br/>';
        } else {
            $message = '<span class="text-warning"><i class="fas fa-exclamation-triangle"></i> Veuillez remplir tous les champs</span><br/>';
        }
    }
?>
<?php if(isset($message)) { echo $message; } ?>
<a href="?page=strat" class="text-danger">&times; Annuler l'envoi</a>
<form method="POST" class="w-25 mx-auto my-2">
    <input class="form-control" type="text" name="article_titre" placeholder="Titre de la stratégie" /><br />
    <textarea  class="form-control" name="article_contenu" placeholder="Votre stratégie en détail"></textarea><br />
    <button class="form-control" type="submit">Envoyer la stratégie <i class="far fa-paper-plane"></i></button>
</form>

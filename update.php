<?php
$bdd = new PDO('mysql:host=localhost;dbname=zombiecod', 'root', '');
$mode_edition = 0;
if(isset($_GET['edit']) AND !empty($_GET['edit'])) {
    $mode_edition = 1;
    $edit_id = htmlspecialchars($_GET['edit']);
    $edit_article = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
    $edit_article->execute(array($edit_id));
    if($edit_article->rowCount() == 1) {

            $edit_article = $edit_article->fetch();

    } else {
            die('Erreur : l\'article n\'existe pas...');
    }
}
if(isset($_POST['article_titre'], $_POST['article_contenu'])) {
    if(!empty($_POST['article_titre']) AND !empty($_POST['article_contenu'])) {
        $article_titre = htmlspecialchars($_POST['article_titre']);
        $article_contenu = htmlspecialchars($_POST['article_contenu']);
        if($mode_edition == 0) {
            $ins = $bdd->prepare('INSERT INTO articles(titre, contenu, date_time_publication) VALUES(?, ?, NOW())');
            $ins->execute(array($article_titre, $article_contenu));
            $message = 'Votre article a bien été posté';
        } else {
            $update = $bdd->prepare('UPDATE articles SET titre = ?, contenu = ?, date_time_edition = NOW() WHERE id = ?');
            $update->execute(array($article_titre, $article_contenu, $edit_id));
            header('Location: article.php?id='.$edit_id);
            $message = 'Votre article a bien été mis a jour !';
        }
    } else {
        $message = 'Veuillez remplir tout les champs';
    }
}
?>
<form method="POST">
    <input class="form-control" type="text" name="article_titre" placeholder="titre" value="<?= $edit_article['titre'] ?>" /><br />
    <textarea class="form-control" name="article_contenu" placeholder="Contenue de l'article"><?= $edit_article['contenu'] ?></textarea><br />
    <input class="form-control" type="submit" value="Envoyer l'article" />
</form>
    <br />
    <a href="diemaschine.php">Revenir en arriere</a>
    <?php if(isset($message)) { echo $message; } ?>

</body>
</html>
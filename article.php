<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=zombiecod', 'root', '');

var_dump($_SESSION['pseudo']);

if(isset($_GET['id']) AND !empty($_GET['id'])) {
    $get_id = htmlspecialchars($_GET['id']);

    $article = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
    $article->execute(array($get_id));

    if($article->rowCount() == 1) {
        $article = $article->fetch();
        $titre = $article['titre'];
        $contenu = $article['contenu'];
    } else {
        die('Cet article n\'existe pas !');
    }

} else {
    die('erreur');
}

?>
<div class="card text-center">
    <div class="card-title">
        <h3>Article posté par <?php echo $_SESSION['pseudo']?></h3>
        <!-- Si il y a une erreur c'est que le cookie pseudo n'existe pas -->
    </div>
    <div class="card-body">
        <h4><?= $titre ?></h4>
        <p><?= $contenu ?></p>
    </div>
</div>
<div class="container">
    <ul class="text-center" style="list-style:none;">
        <?php while($a = $articles->fetch()) { ?>
            <div class="row my-3">
                <div class="col">
                <li >-<a class="text-white" href="article.php?id=<?= $a['id'] ?> "> <?= $a['titre'] ?><span class="text-muted"><br><i class="far fa-eye"></i>&nbsp;&nbsp;Afficher</span></a></li>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 text-right"> <li><a href="update.php?edit=<?= $a['id'] ?> " class="text-info">Modifier <i class="fas fa-edit"></i></a></li></div>
                <div class="col-lg-6 text-left"><li><a href="delete.php?id=<?= $a['id'] ?>" class="text-danger">Supprimer <i class="fas fa-trash-alt"></i></a></li></div>
            </div>
        <?php } ?>
    <ul>
    <?php
        if(isset($_GET['redaction'])) {
            if($_GET['redaction'] === 'redac') {
                require 'redaction.php';
            } elseif($_GET['redaction'] === 'noredac') {
                header("Location: diemaschine.php?page=strat");
            }
        }
    ?>
    <div class="my-5">
    <a href="?page=strat&redaction=redac" class="text-white">
        <img class="text-white"src="./Img/ico/new-idea-svgrepo-com.svg" width="32px">
         Créer une nouvelle stratégie
    </a>
    </div>
</div>


<!-- delete.php?id=<?= $a['id'] ?> -->
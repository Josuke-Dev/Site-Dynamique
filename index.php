<?php
session_start();

if($_SESSION['id'] !== null){

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="./CSS/accueil.css">
    <title>Accueil</title>
</head>
<body class="bg-black">
  <?php
    include "header.php";
  ?>
  
  <section id="showcase" class="p-5">
      <div class="container-fluid">
        <div class="row my-4">
          <div class="col-lg-4 mb-3">
            <a href="coldwarmap.php">
            <div class="card h-100">
              <div class="card-body p-0 rounded">
                <img src="./img/COD/Coldwar.jpg" width="100%">
              </div>
            </div>
            </a>  
          </div>
          <div class="col-lg-4 mb-3">
            <div class="card h-100">
              <div class="card-body p-0 rounded">
                <img src="./img/COD/BO4.jpg" width="100%">
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-3">
            <div class="card h-100">
              <div class="card-body p-0 rounded">
                <img src="./img/COD/BO3.jpg" width="100%">
              </div>
            </div>
          </div>
        </div>
        <div class="row my-4">
          <div class="col-lg-4 mb-3">
            <div class="card h-100">
              <div class="card-body p-0 rounded">
                <img src="./img/COD/447007.jpg" width="100%">
              </div>
            </div>  
          </div>
          <div class="col-lg-4 mb-3">
            <div class="card h-100">
              <div class="card-body p-0 rounded">
                <img src="./img/COD/BO1.png" width="100%">
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-3">
            <div class="card h-100">
              <div class="card-body p-0 rounded">
                <img src="./img/COD/WAWM.jpg" width="100%">
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>
</body>
</html>
<?php

}else{
  header("Location: connexion.php");
}
?>
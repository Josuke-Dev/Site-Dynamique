<?php
$bdd = new PDO('mysql:host=localhost;dbname=zombiecod', 'root', '');

$articles = $bdd->query('SELECT * FROM articles ORDER BY date_time_publication
DESC'); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="./CSS/accueil.css" />
    <title>Die Maschine</title>
  </head>
  <body class="bg-black">
    <?php
        include "header.php";
    ?>

    <section>
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
          <div class="row">
            <div class="col mx-auto">
              <a href="./index.php">
                <img src="./img/home-svgrepo-com.svg" width=" 32px" alt="" class="home hoverItem"/>
              </a>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                  <li class="nav-item hoverItem px-5">
                    <a class="nav-link" href="?page=story"
                      >Histoire</a>
                  </li>
                  <li class="nav-item hoverItem px-5">
                    <a class="nav-link" href="?page=mainquest"
                      >Quete principale</a
                    >
                  </li>
                  <li class="nav-item hoverItem px-5">
                    <a class="nav-link" href="?page=darkOps">Dark Ops</a>
                  </li>
                  <li class="nav-item hoverItem px-5">
                    <a class="nav-link" href="?page=strat">Stratégie</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </section>

    <section id="view">
      <div class="container my-5">
        <div class="row">
          <div class="col">
            <?php     
                  if(isset($_GET['page'])) {
                      if($_GET['page'] === 'story') {
                          require 'story.php';
                      } elseif($_GET['page'] === 'mainquest') {
                          require 'mainquest.php'; 
                      } elseif($_GET['page'] === 'darkOps') {
                          require 'darkOps.php';
                      } elseif($_GET['page'] === 'strat') {
                          require 'strat.php';
                      }
                  }else{
                    echo "<h2 class='text-white text-center my-5'>DIE MASCHINE</h2>";
                  }
              ?>
          </div>
        </div>
      </div>
    </section>
  <script src="https://use.fontawesome.com/caefacfd28.js"></script> 
  </body>
  
</html>

<?php

session_start();

$bdd = new pdo('mysql:host=localhost;dbname=highmediadata', 'root','',   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$NameVideo = $bdd->query("SELECT nom FROM titre ORDER BY nom   ");

if ((empty($_GET['name'])) or ($_GET['name'] == "null") ) {
    # code...

  ?>
  <!DOCTYPE html>
  <html>
  <head>
      <title>High media serveur - Video</title>
  </head>
  <body>

    <?php 

    while ($donnes = $NameVideo->fetch()) {

        echo '<form action="?name=' . $donnes['nom'] .'" method="post">' 
        . $donnes['nom'] . '<input type="submit" value="Valider"> 
        </form>'; 
    }

    

    ?>
  </body>
  </html>

<?php } else {

$EpVideo = $bdd->query('SELECT titre, Episode FROM video WHERE titre=\'' . $_GET['name'] . '\'');
        $EpVideo->execute(array($_GET['name'])); 

    ?>

<!DOCTYPE html>
  <html>
  <head>
      <title>High media serveur - Video</title>
  </head>
  <body>

    <?php 

    echo $_GET['name'] . '<br>';

    while ($donnes = $EpVideo->fetch()) {

     echo '<a href="VLecteur?Name='. $_GET['name'] .'&Ep='. $donnes['Episode'] .'">Episode ' . $donnes['Episode'] . '</a><br>' ;
    }

    ?>

    <a href=""></a>
  </body>
  </html>

<?php } ?>
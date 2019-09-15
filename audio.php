p<?php

$moveUrl = "Video.php";

include("Com/Conexion.php");

include("Com/verifiLoad.php");

$typeFavor = 1;

$img = new pdo('mysql:host=localhost;dbname=highmediadata', 'root','',   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$ImageUs = $img->query('SELECT ID, image FROM user WHERE ID=\'' . $_SESSION['ID'] . '\'');
$Rimage = $ImageUs->fetch();

$bdd = new pdo('mysql:host=localhost;dbname=highmediadata', 'root','',   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$NameVideo = $bdd->query("SELECT nom, Affiche, type FROM titre WHERE type='1' ORDER BY nom   ");

if ((empty($_GET['name'])) or ($_GET['name'] == "null") ) {
    # code...

  ?>
  <!DOCTYPE html>
  <html lang="fr-FR">
  <head>
      <title>High media serveur - Video</title>
      <meta charset="utf-8" />
      <link rel="stylesheet" href="Res/style.css" />
      <link rel="stylesheet" href="Res/styleVideo.css" />
  </head>

  <script type="text/javascript" src="Res/scriptZone.js" ></script>


<body class="BackgroundA">
    
    <nav id="menu" class="ZoneM">
          
              
                <div>
                    <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Acueil')">Accueil</button>
                    <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Video')">Video</button>
                    <button class="linkSelect" id="LinkDebutPassif">Audio</button>
                    <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Perso')">Espace personnelle</button>
                    <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Serv')">Serveur</button>
                    <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Propo')">Proposition</button>
                    <button class="linkSelect" id="LinkDown" onclick="ChangePAGE('user')">Paramètre</button>
    
                </div>
    
                <div class="separationA">
    
                    <span class="infoUser"><?php echo $typeUser; ?></span>
    
                    <div class="imageUser">
                      <?php if ($_SESSION['Securiter'] >= 1) { ?>
                            <img src="<?php echo $Rimage['image'];?>" class="image" onclick="ChangePAGE('user')" >
                      <?php } else { ?>
                            <img src="User/Default/User.png" class="image">
                      <?php } ?>
                    </div>
    
                    <span class="UserName"><?php echo $Pseudo ?></span>
                    <?php if ($_SESSION['Securiter'] != "-1") {
                        # code...
                    ?>
                    <form action="?Deco=1" method="post">
                        <input name="Deco" id="Deco" type="submit" value="Deconecter" class="bottomDisconect" />
                    </form>
                     <?php } else { ?>
                    <div>
                        <button name="Co" id="Res/popup.php#Conex" class="bottomConnect">Conexion</button>
                    </div>
    
                    <?php } ?>
    
                </div>
    
                <div class="separationB">
    
                    <?php if ($_SESSION['Securiter'] >= 1) { ?>
                      <button class="bottomMenu" id="" onclick="NonDisponible()">Dossier</button>
                      <button class="bottomMenu" id="#Favor">Favori</button>
                      <button class="bottomMenu" id="" onclick="NonDisponible()">Supprimer</button>
                      <button class="bottomMenu" id="" onclick="NonDisponible()">Télécharger</button>
                      <button class="bottomMenu" id="#Upload">Uploade</button>
                    <?php } else { ?>
                      <button class="bottomMenu" id="" onclick="NonDisponible()">Dossier</button>
                      <button class="bottomMenu" id="" onclick="Reserver()">Favori</button>
                      <button class="bottomMenu" id="" onclick="NonDisponible()">Supprimer</button>
                      <button class="bottomMenu" id="" onclick="NonDisponible()">Télécharger</button>
                      <button class="bottomMenu" id="" onclick="Reserver()">Uploade</button>
                    <?php } ?>
    
                </div>  
        
    </nav>

  
    
    <section>
      <div align="center" style="margin-left: 20vw;">
        <div class="entreVideo">

            <?php 
    
            while ($donnes = $NameVideo->fetch()) {
        
                echo '<div align="left" onclick="newZone('; echo "'"; echo $donnes['nom']; echo "'"; echo ')">
                          <table align="left" class="caseBottom">
                                    <tr><td class="class="" ><img class="caseImg" src="' . $donnes['Affiche'] .'"></td></tr>
                                    
                                      <tr align="center"><td><span class="whiteCase">'. $donnes['nom'] . '</span></td></tr>  
                                    </tr>
                          </table>
        
                      </div>'; 
            }
        
          
      
          ?>

        </div>
      </div>
    </section>
  
  <?php if ($_SESSION['Securiter'] >= 1 ) { include("Res/popUpload.php"); } ?>
    

      <script type="text/javascript">
            <?php include("Res/scriptModal.php"); ?>
      </script>
      
  </body>
  </html>

<?php } else {

$EpVideo = $bdd->query('SELECT titre, SousTitre, Saison, Episode FROM video WHERE titre=\'' . $_GET['name'] . '\'');

$epSynops = $bdd->query('SELECT  nom, Synopsis FROM titre WHERE nom=\'' . $_GET['name'] . '\'');
        

    ?>

<!DOCTYPE html>
  <html lang="fr-FR">
  <?php $typeFavor = 2; 
        $GetV = 0;  ?>
  <head>
      <title>High media serveur - Video</title>
      <meta charset="utf-8" />
      <link rel="stylesheet" href="Res/style.css" />
      <link rel="stylesheet" href="Res/styleVideo.css" />
  </head>

  <script type="text/javascript" src="Res/scriptZone.js">
  </script>


  <body class="BackgroundA">

    <nav id="menu">
          
              
              <div>
                  <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Acueil')">Accueil</button>
                  <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Video')">Vidéo</button>
                  <button class="linkSelect" id="LinkDebutPassif" onclick="ChangePAGE('Audio')">Audio</button>
                  <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Perso')">Espace personnelle</button>
                  <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Serv')">Serveur</button>
                  <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Propo')">Proposition</button>
                  <button class="linkSelect" id="LinkDown" onclick="ChangePAGE('user')">Paramètre</button>
  
              </div>
  
              <div class="separationA">
  
                  <span class="infoUser"><?php echo $typeUser; ?></span>
  
                  <div class="imageUser">
                      <?php if ($_SESSION['Securiter'] >= 1) { ?>
                          <img src="<?php echo $Rimage['image'];?>" class="image" onclick="ChangePAGE('user')" >
                      <?php } else { ?>
                          <img src="User/Default/User.png" class="image">
                      <?php } ?>
                  </div>
  
                  <span class="UserName"><?php echo $Pseudo ?></span>
                  <?php if ($_SESSION['Securiter'] != "-1") {
                      # code...
                  ?>
                  <form action="?Deco=1" method="post">
                      <input name="Deco" id="Deco" type="submit" value="Deconecter" class="bottomDisconect" />
                  </form>
                   <?php } else { ?>
                  <div>
                      <button name="Co" id="Res/popup.php#Conex" class="bottomConnect">Connexion</button>
                  </div>
  
                  <?php } ?>
  
              </div>
  
              <div class="separationB">
  
                  <?php if ($_SESSION['Securiter'] >= 1) { ?>
                    <button class="bottomMenu" id="" onclick="NonDisponible()">Dossier</button>
                    <button class="bottomMenu" id="#Favor">Favori</button>
                    <button class="bottomMenu" id="" onclick="NonDisponible()">Supprimer</button>
                    <button class="bottomMenu" id="" onclick="NonDisponible()">Télécharger</button>
                    <button class="bottomMenu" id="#Upload">Uploade</button>
                  <?php } else { ?>
                    <button class="bottomMenu" id="" onclick="NonDisponible()">Dossier</button>
                    <button class="bottomMenu" id="" onclick="Reserver()">Favori</button>
                    <button class="bottomMenu" id="" onclick="NonDisponible()">Supprimer</button>
                    <button class="bottomMenu" id="" onclick="NonDisponible()">Télécharger</button>
                    <button class="bottomMenu" id="" onclick="Reserver()">Uploade</button>
                  <?php } ?>
  
              </div>  
      
  </nav>

  
    
    <section>
        <div align="center" class="entreVideo">
          <div class="blockListeVideo">
            
            <?php
            $view = 0;
            
            echo '<div class="titleVideo">' . $_GET['name'] . '</div>';
        
            while ($donnes = $EpVideo->fetch()) {

              if ($view < $donnes['Saison']) {

                echo '<div class="saisonVideo"> <span> Saison : ' . $donnes['Saison'] . '</span> </div>';

                $view = $donnes['Saison'];
            
              }
        
             echo '<div> <a class="listeEpisode" href="VLecteur?Name='. $_GET['name'] .'&Ep='. $donnes['Episode'] .' &S='. $view .' ">Episode ' . $donnes['Episode'] . '</a> </div>' ;
            }
        
            ?>
            <div>
              
              <textarea class="textareaBase" name="Synopsis" placeholder="synopsis" disabled><?php $syn = $epSynops->fetch(); echo $syn['Synopsis'] ?></textarea>

            </div>

          </div>
        </div>
    </section>

  
  <?php if ($_SESSION['Securiter'] >= 1 ) { include("Res/popUpload.php"); } ?>

      <script type="text/javascript">
            <?php include("Res/scriptModal.php"); ?>
      </script>
      <script type="text/javascript" src="Res/scriptFavori.js"></script>

  </body>
  </html>

<?php } ?>

<!--<input style="margin-top: 5%; margin-bottom: 2%;" class="buttonBase" type="submit" value="Valider"> -->
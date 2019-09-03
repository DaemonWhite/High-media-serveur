<?php

$moveUrl = "Video.php";

include("Com/Conexion.php");

include("Com/verifiLoad.php");

$bdd = new pdo('mysql:host=localhost;dbname=highmediadata', 'root','',   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$NameVideo = $bdd->query("SELECT nom FROM titre ORDER BY nom   ");

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

  <script type="text/javascript">
    
    function ChangePAGE(Type)
    {
        if (Type === "Acueil") 
        {
            window.location = "global.php";
        }
        if (Type === "Audio") 
        {
            NonDisponible()
        } 
        if (Type === "Perso") 
        {
            NonDisponible()
        } 
        if (Type === "Serv") 
        {
            NonDisponible()
        } 
        if (Type === "Propo") 
        {
            NonDisponible()
        }

    }

    function newZone(Page){

      window.location = "?name=" + Page;

     }

</script>


<body class="BackgroundA">

  <nav id="menu">
          
              
              <div>
                  <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Acueil')">Acueil</button>
                  <button class="linkSelect" id="LinkDebutPassif">Video</button>
                  <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Audio')">Audio</button>
                  <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Perso')">Espace personnelle</button>
                  <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Serv')">Serveur</button>
                  <button class="linkSelect" id="LinkDown" onclick="ChangePAGE('Propo')">Proposition</button>
  
              </div>
  
              <div class="separationA">
  
                  <span class="infoUser"><?php echo $typeUser; ?></span>
  
                  <div class="imageUser">
                      <img src="User/Default/User.jpg" class="image">
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
  
                  <button class="bottomMenu" id="" onclick="NonDisponible()">Dossier</button>
                  <button class="bottomMenu" id="" onclick="NonDisponible()">Favori</button>
                  <button class="bottomMenu" id="" onclick="NonDisponible()">Suprimer</button>
                  <button class="bottomMenu" id="" onclick="NonDisponible()">Télècharger</button>
                  <?php if ($_SESSION['Securiter'] >= 1) { ?>
                  <button class="bottomMenu" id="#Upload">Uploade</button>
                  <?php } else { ?>
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
                                    <tr><td align="left" class="borderBottom"><img src="User/Default/User.jpg"></td>
                                    
                                      <td align="center"><span class="whiteCase">'. $donnes['nom'] . '</span></td>  
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
  <head>
      <title>High media serveur - Video</title>
      <meta charset="utf-8" />
      <link rel="stylesheet" href="Res/style.css" />
      <link rel="stylesheet" href="Res/styleVideo.css" />
  </head>

  <script type="text/javascript">
    
    function ChangePAGE(Type)
    {
        if (Type === "Acueil") 
        {
            window.location = "global.php";
        }
        if (Type === "Video") 
        {
            window.location = "video.php";
        }
        if (Type === "Audio") 
        {
            NonDisponible()
        } 
        if (Type === "Perso") 
        {
            NonDisponible()
        } 
        if (Type === "Serv") 
        {
            NonDisponible()
        } 
        if (Type === "Propo") 
        {
            NonDisponible()
        }

    }

</script>


  <body class="BackgroundA">

    <nav id="menu">
          
              
              <div>
                  <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Acueil')">Acueil</button>
                  <button class="linkSelect" id="LinkDebutPassif" onclick="ChangePAGE('Video')">Video</button>
                  <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Audio')">Audio</button>
                  <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Perso')">Espace personnelle</button>
                  <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Serv')">Serveur</button>
                  <button class="linkSelect" id="LinkDown" onclick="ChangePAGE('Propo')">Proposition</button>
  
              </div>
  
              <div class="separationA">
  
                  <span class="infoUser"><?php echo $typeUser; ?></span>
  
                  <div class="imageUser">
                      <img src="User/Default/User.jpg" class="image">
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
  
                  <button class="bottomMenu" id="Res/popup.php#">Dossier</button>
                  <button class="bottomMenu" id="Res/popup.php#">Favori</button>
                  <button class="bottomMenu" id="Res/popup.php#">Suprimer</button>
                  <button class="bottomMenu" id="Res/popup.php#">Télècharger</button>
                  <button class="bottomMenu" id="#Upload">Uploade</button>
  
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

    <a href=""></a>
  </body>
  </html>

<?php } ?>

<!--<input style="margin-top: 5%; margin-bottom: 2%;" class="buttonBase" type="submit" value="Valider"> -->
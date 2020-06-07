<?php

include("lang/FR.php");

$moveUrl = "Audio.php";

include("Com/Conexion.php");

include("Com/verifiLoad.php");

include("Com/userSetings.php"); 

$typeFavor = 1;

$ImageUs = $bdd->query('SELECT ID, image FROM user WHERE ID=\'' . $_SESSION['ID'] . '\'');
$Rimage = $ImageUs->fetch();

$NameVideo = $bdd->query("SELECT nom, Affiche, type FROM titre WHERE type='1' ORDER BY nom   ");

if (stristr($_SERVER['HTTP_USER_AGENT'], "Android")
   || strpos($_SERVER['HTTP_USER_AGENT'], "iPod")
   || strpos($_SERVER['HTTP_USER_AGENT'], "iphone"))
   {

     

   }
   else {
     // Et ici du code php classique...Pas forcement optimisé
   }

if ((empty($_GET['name'])) or ($_GET['name'] == "null") ) { 
    # code...

  ?>
  <!DOCTYPE html>
  <html lang="fr-FR">
  <head>
      <title>High media serveur - Audio</title>
      <meta charset="utf-8" />
      <link rel="stylesheet" href="Res/style.css" />
      <link rel="stylesheet" href="Res/styleAudio.css" />
  </head>

<?php

  if (strpos($_SERVER['HTTP_USER_AGENT'], "iPod") || strpos($_SERVER['HTTP_USER_AGENT'], "iPhone")) {

        echo "<script type='text/javascript'> alert('Vos appareille pue la merde du coup sa fonctionne mal sorry, mais c'a vas t'es cool ) </script> ";
       
     }

?>

  <script type="text/javascript" src="Res/scriptZone.js" ></script>


<body class="BackgroundA">

  <?php echo $Dmode; ?>

  <nav id="menu">
          
              
              <div>
                  <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Acueil')"><?php echo $_Lang_Gen_Homme; ?></button>
                  <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Video')"><?php echo $_Lang_Gen_Video; ?></button>
                  <button class="linkSelect" id="LinkDebutPassif"><?php echo $_Lang_Gen_Audio; ?></button>
                  <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Perso')"><?php echo $_Lang_Gen_Perso; ?></button>
                  <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Serv')"><?php echo $_Lang_Gen_Serve; ?></button>
                  <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Propo')"><?php echo $_Lang_Gen_Propo; ?></button>
                  <button class="linkSelect" id="LinkDown" onclick="ChangePAGE('user')"><?php echo $_Lang_Gen_Param; ?></button>
  
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
                      <input name="Deco" id="Deco" type="submit" value="<?php echo $_Lang_Gen_Deco; ?>" class="bottomDisconect" />
                  </form>
                   <?php } else { ?>
                  <div>
                      <button name="Co" id="Res/popup.php#Conex" class="bottomConnect"><?php echo $_Lang_Gen_Conex; ?></button>
                  </div>
  
                  <?php } ?>
  
              </div>
  
              <div class="separationB">
  
                  <?php if ($_SESSION['Securiter'] >= 1) { ?>
                    <button class="bottomMenu" id="" onclick="NonDisponible()"><?php echo $_Lang_Gen_Doss; ?></button>
                    <button class="bottomMenu" id="#Favor"><?php echo $_Lang_Gen_Favoris; ?></button>
                    <button class="bottomMenu" id="#Gestion"><?php echo $_Lang_Gen_Fichi; ?></button>
                    <button class="bottomMenu" id="" onclick="NonDisponible()"><?php echo $_Lang_Gen_Down; ?></button>
                    <button class="bottomMenu" id="#Upload"><?php echo $_Lang_Gen_Upload; ?></button>
                  <?php } else { ?>
                    <button class="bottomMenu" id="" onclick="NonDisponible()"><?php echo $_Lang_Gen_Doss; ?></button>
                    <button class="bottomMenu" id="" onclick="Reserver()"><?php echo $_Lang_Gen_Favoris; ?></button>
                    <button class="bottomMenu" id="" onclick="Reserver()"><?php echo $_Lang_Gen_Fichi; ?></button>
                    <button class="bottomMenu" id="" onclick="NonDisponible()"><?php echo $_Lang_Gen_Down; ?></button>
                    <button class="bottomMenu" id="" onclick="Reserver()"><?php echo $_Lang_Gen_Upload; ?></button>
                  <?php } ?>
  
              </div>  
      
  </nav>

    <section class="entreVideo">
        
            <div class="SearchVideo" align="center">

              <div class="SearchV">
                      <input type="text" id="barSearch" class="SearchRV" onkeydown="touche(event, 1)"><input type="button" name="SearchVB" class="SearchSV" value="Rechercher" onclick="GernreAnme('1')">
              </div>

              <div>

                      <select id="cat" class="selectBase" style="margin-right: 5%;" onchange="GernreAnme('1')">
                          <option value="">Genre?</option>
                          <option value="Blues">Blues</option>
                          <option value="Classic">Classic</option>
                          <option value="Jazz">Jazz</option>
                          <option value="Metal">Metal</option>
                          <option value="Pop">Pop</option>
                          <option value="Rap">Rap</option>
                          <option value="Rock">Rock</option>
                      </select>

                      <select name="Gen" class="selectBase" style="margin-right: 5%;">
                        <option value=""> <?php echo $_Lang_Cat_Gen; ?> </option>
                      </select>
                      
                      <select name="Langue" class="selectBase">
                        <option value=""> <?php echo $_Lang_Cat_Lang; ?></option>
                      </select>
              </div>

            </div>

            <div class="entreViewVideo" id="zoneVideo">
               <?php 
        
               while ($donnes = $NameVideo->fetch()) { ?>
            
                  <div class="caseBottom" onclick="newZone('<?php echo $donnes['nom'];?>')">
                    
                    <table align="center">
                     <tr style=""><img class="caseImg" src="<?php echo $donnes['Affiche'] ?>"></tr>
                     <tr class="whiteCase"><td><span style=" font-size: 150%;"><?php echo $donnes['nom']; ?></span></td> </tr>
                      
                    </table>
    
                  </div>
    
              <?php } ?>
           </div>

    </section>
  
  <?php if ($_SESSION['Securiter'] >= 1 ) { include("Res/popUpload.php"); } ?>
    

      <script type="text/javascript">
            <?php include("Res/scriptModal.php"); ?>
      </script>
      
  </body>


    <script type="text/javascript" src="Res/search.js">
    </script>


  </html>

<?php } else {

$EpVideo = $bdd->query('SELECT album, Titre, Disk, Piste FROM audio WHERE album=\'' . $_GET['name'] . '\' ORDER BY Piste ASC');

$epSynops = $bdd->query('SELECT  nom FROM titre WHERE nom=\'' . $_GET['name'] . '\'');
        
        $moveUrl = "Video.php?=" . $_GET['name'];

    ?>

<!DOCTYPE html>
  <html lang="fr-FR">
  <?php $typeFavor = 2; 
        $GetV = 0;  ?>
  <head>
      <title>High media serveur - Video</title>
      <meta charset="utf-8" />
      <link rel="stylesheet" href="Res/style.css" />
      <link rel="stylesheet" href="Res/styleAudio.css" />
  </head>

  <script type="text/javascript" src="Res/scriptZone.js">
  </script>


  <body class="BackgroundA">
    
    <nav id="menu">
          
              
              <div>
                  <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Acueil')"><?php echo $_Lang_Gen_Homme; ?> </button>
                  <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Video')"><?php echo $_Lang_Gen_Video; ?> </button>
                  <button class="linkSelect" id="LinkDebutPassif" onclick="ChangePAGE('Audio')"><?php echo $_Lang_Gen_Audio; ?> </button>
                  <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Perso')"><?php echo $_Lang_Gen_Perso; ?> </button>
                  <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Serv')"><?php echo $_Lang_Gen_Serve; ?> </button>
                  <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Propo')"><?php echo $_Lang_Gen_Propo; ?> </button>
                  <button class="linkSelect" id="LinkDown" onclick="ChangePAGE('user')"><?php echo $_Lang_Gen_Param; ?> </button>
  
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
                      <input name="Deco" id="Deco" type="submit" value="<?php echo $_Lang_Gen_Deco; ?>" class="bottomDisconect" />
                  </form>
                   <?php } else { ?>
                  <div>
                      <button name="Co" id="Res/popup.php#Conex" class="bottomConnect"><?php echo $_Lang_Gen_Conex; ?> </button>
                  </div>
  
                  <?php } ?>
  
              </div>
  
              <div class="separationB">
  
                  <?php if ($_SESSION['Securiter'] >= 1) { ?>
                    <button class="bottomMenu" id="" onclick="NonDisponible()"> <?php echo $_Lang_Gen_Doss; ?> </button>
                    <button class="bottomMenu" id="#Favor"> <?php echo $_Lang_Gen_Favoris; ?> </button>
                    <button class="bottomMenu" id="#Gestion"> <?php echo $_Lang_Gen_Fichi; ?> </button>
                    <button class="bottomMenu" id="" onclick="NonDisponible()"> <?php echo $_Lang_Gen_Down; ?> </button>
                    <button class="bottomMenu" id="#Upload"> <?php echo $_Lang_Gen_Upload; ?> </button>
                  <?php } else { ?>
                    <button class="bottomMenu" id="" onclick="NonDisponible()"> <?php echo $_Lang_Gen_Doss; ?></button>
                    <button class="bottomMenu" id="" onclick="Reserver()"> <?php echo $_Lang_Gen_Favoris; ?></button>
                    <button class="bottomMenu" id="" onclick="Reserver()"> <?php echo $_Lang_Gen_Fichi; ?></button>
                    <button class="bottomMenu" id="" onclick="NonDisponible()"> <?php echo $_Lang_Gen_Down; ?></button>
                    <button class="bottomMenu" id="" onclick="Reserver()"> <?php echo $_Lang_Gen_Upload; ?></button>
                  <?php } ?>
  
              </div>  
      
  </nav>
    
    <section class="zoneListe">
        <div  class="blockListeVideo">
          <div align="center">
            
            <?php
            $view = 0;
            
            echo '<div class="titleVideo">' . $_GET['name'] . '</div>';
        
            while ($donnes = $EpVideo->fetch()) {

              if ($view < $donnes['Disk']) {

                echo '<div class="saisonVideo"> <span> Diske : ' . $donnes['Disk'] . '</span> </div>';

                $view = $donnes['Disk'];
            
              }
            
             echo '<div class="pisteMargin" align="left"> 
                       <a class="listeEpisode" href="ALecteur.php?Name='. $_GET['name'] .'&Ep='. $donnes['Piste'] .' &S='. $view .' ">Piste ' . $donnes['Piste'] . ' : ' . $donnes['Titre'] . '</a> 
                  </div>' ;
            }
        
            ?>

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
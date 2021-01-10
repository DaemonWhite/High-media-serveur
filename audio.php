<?php

include("lang/FR.php");

$moveUrl = "audio.php";

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

  <?php include('Com/mainMenu.php') ?>

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

            <div class="entreCorp">

              <div class="entreViewAudio" id="zoneVideo">
                  <div class="entreVideoStack"> 
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
              </div>
    
              <div class="playerBase" style=" border-collapse: collapse;">
                
                  <div class="playerList">
                    <table style="height: 100%; width: 100%; border-collapse: collapse;">
                      <tr>
                        <td class="playerPListA" ></td>
                        <td class="playerPListB" ></td>
                      </tr>
                    </table>
                  </div>

                  <div class="playerListCorp">
                    <div class="musicTd">
                      <div id="iLove" style="width: 10%;"><div class="Love"></div></div>
                      <div id="playTitleMus" style="width: 30%;">Le pyro barbare</div> 
                      <div id="playTitleArt" style="width: 30%; text-align: center;">Bob lenon</div> 
                      <div id="playTitleAlb" style="width: 30%; text-align: center;">Skyrim</div> 
                    </div>
                </div>

                <div class="playListControl">

                      <div class="controleA">
                        <div class="Love" style="width: 30%"></div>
                        <div style="width: 40%; font-size: 1.5vh;">Le pyro barbare</div>
                        <div class="styleAlea" style="width: 30%"></div>
                      </div>

                      <div style="width: 35%;">
                        <div class="retMus" align="center">
                          <div class="avMus" style="transform: rotate(180deg)"></div>
                          <div class="play"><div class="bPlay"></div></div>
                          <div class="avMus"></div>
                        </div>
                      </div>

                      <div class="controleA">
                        <div class="styleBoucle"></div>
                        <div class="styleVolume"></div>
                        <div class="styleBoxSlide">
                          <input type="range" min="1" max="100" value="100" class="styleSlide" id="myRange">
                        </div>
                      </div>
                </div>

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
        
        $moveUrl = "audio.php";

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
    
    <?php include('Com/mainMenu.php') ?>
    
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
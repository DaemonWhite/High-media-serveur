<?php

include("lang/FR.php");

$moveUrl = "Video.php";

include("Com/Conexion.php");

include("Com/verifiLoad.php");

include("Com/userSetings.php"); 

$typeFavor = 1;

$ImageUs = $bdd->query('SELECT ID, image FROM user WHERE ID=\'' . $_SESSION['ID'] . '\'');
$Rimage = $ImageUs->fetch();

$NameVideo = $bdd->query("SELECT nom, Affiche, type FROM titre WHERE type='0' ORDER BY nom   ");

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
      <title>High media serveur - Video</title>
      <meta charset="utf-8" />
      <link rel="stylesheet" href="Res/style.css" />
      <link rel="stylesheet" href="Res/styleVideo.css" />
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
                  <button class="linkSelect" id="LinkDebutPassif"><?php echo $_Lang_Gen_Video; ?></button>
                  <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Audio')"><?php echo $_Lang_Gen_Audio; ?></button>
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
                      <input type="text" id="barSearch" class="SearchRV" onkeydown="touche(event)"><input type="button" name="SearchVB" class="SearchSV" value="Rechercher" onclick="GernreAnme()">
              </div>

              <div>

                      <select id="cat" class="selectBase" style="margin-right: 5%;" onchange="GernreAnme()">
                        <option value=""><?php echo $_Lang_Cat_Nop; ?></option>
                        <option value="Anime"><?php echo $_Lang_Cat_Anim; ?></option>
                        <option value="Docu"><?php echo $_Lang_Cat_Docu; ?></option>
                        <option value="Movie"><?php echo $_Lang_Cat_Film; ?></option>
                        <option value="TV"><?php echo $_Lang_Cat_Setv; ?> télé</option>
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


    <script type="text/javascript">

    function touche(e){

      var touche = event.keyCode;

      console.log(touche)
      
      if (touche == 13) {

        GernreAnme(0)

      }

    }
    
    function GernreAnme(type)
    {
      

      var sizeVideo = document.getElementById("zoneVideo");

       var oData = new FormData();
       var text = document.getElementById("barSearch").value
       var Gen = document.getElementById("cat").value

       
       oData.append("Search", text)
       oData.append("Genre", Gen)

    
      
       vef = new XMLHttpRequest();
       vef.open("POST", "upload/appVideo.php", true);
        vef.onload = function(oEvent) {
           if (vef.readyState == 4 && (vef.status == 200 || vef.status == 0)) {
             
             sizeVideo.innerHTML = vef.responseText;
             
    
           } else {
    
           }
         };
      
       vef.send(oData);

       }

  </script>


  </html>

<?php } else {

$EpVideo = $bdd->query('SELECT titre, SousTitre, Saison, Episode FROM video WHERE titre=\'' . $_GET['name'] . '\' ORDER BY Episode ASC');

$epSynops = $bdd->query('SELECT  nom, Synopsis FROM titre WHERE nom=\'' . $_GET['name'] . '\'');
        
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
      <link rel="stylesheet" href="Res/styleVideo.css" />
  </head>

  <script type="text/javascript" src="Res/scriptZone.js">
  </script>


  <body class="BackgroundA">
    
    <nav id="menu">
          
              
              <div>
                  <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Acueil')"><?php echo $_Lang_Gen_Homme; ?> </button>
                  <button class="linkSelect" id="LinkDebutPassif" onclick="ChangePAGE('Video')"><?php echo $_Lang_Gen_Video; ?> </button>
                  <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Audio')"><?php echo $_Lang_Gen_Audio; ?> </button>
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

              if ($view < $donnes['Saison']) {

                echo '<div class="saisonVideo"> <span> Saison : ' . $donnes['Saison'] . '</span> </div>';

                $view = $donnes['Saison'];
            
              }
        
             echo '<div> <a class="listeEpisode" href="VLecteur.php?Name='. $_GET['name'] .'&Ep='. $donnes['Episode'] .' &S='. $view .' ">Episode ' . $donnes['Episode'] . '</a> </div>' ;
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
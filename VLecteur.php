<?php

$moveUrl = "Video.php";

include("Com/Conexion.php");

include("Com/verifiLoad.php");

$img = new pdo('mysql:host=localhost;dbname=highmediadata', 'root','',   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$ImageUs = $img->query('SELECT ID, image FROM user WHERE ID=\'' . $_SESSION['ID'] . '\'');
$Rimage = $ImageUs->fetch();

$bdd = new pdo('mysql:host=localhost;dbname=highmediadata', 'root','',   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$EpVideo = $bdd->query('SELECT titre, Episode, Saison, Repertoire FROM video WHERE titre=\'' . $_GET['Name'] . '\' AND Episode=\'' . $_GET['Ep'] . '\' AND Saison=\'' . $_GET['S'] . '\' ');
$video = $EpVideo->fetch();

$Episo= $bdd->query('SELECT titre, Episode, Saison, Repertoire FROM video WHERE titre=\'' . $_GET['Name'] . '\' AND Saison=\'' . $_GET['S'] . '\' ');

$numEp = intval($_GET['Ep']);
$numEpDown = $numEp - 1;
$numEpHigh = $numEp + 1;



?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo 'High media serveur - ' . $_GET['Name']; ?></title>
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

    function newZone(Page){

      window.location = "?name=" + Page;

     }

 </script>

<body class="BackgroundA">

	 <nav id="menu">
          
              
              <div>
                  <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Acueil')">Acueil</button>
                  <button class="linkSelect" id="LinkDebutActif" onclick="ChangePAGE('Video')">Video</button>
                  <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Audio')">Audio</button>
                  <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Perso')">Espace personnelle</button>
                  <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Serv')">Serveur</button>
                  <button class="linkSelect" id="LinkDown" onclick="ChangePAGE('Propo')">Proposition</button>
  
              </div>
  
              <div class="separationA">
  
                  <span class="infoUser"><?php echo $typeUser; ?></span>
  
                  <div class="imageUser">
                      <?php if ($_SESSION['Securiter'] >= 1) { ?>
                        <img src="<?php echo $Rimage['image'];?>" class="image">
                      <?php } else { ?>
                        <img src="User/Default/User.jpg" class="image">
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
  
                  <button class="bottomMenu" id="Res/popup.php#">Dossier</button>
                  <button class="bottomMenu" id="Res/popup.php#">Favori</button>
                  <button class="bottomMenu" id="Res/popup.php#">Suprimer</button>
                  <button class="bottomMenu" id="Res/popup.php#">Télècharger</button>
                  <?php if ($_SESSION['Securiter'] >= 1) { ?>
                  <button class="bottomMenu" id="#Upload">Uploade</button>
                  <?php } else { ?>
                    <button class="bottomMenu" id="" onclick="Reserver()">Uploade</button>
                  <?php } ?>
  
              </div>  
      
  </nav>

  
    
    <section>
      <div align="center">
        <div class="entreVideo">
          <div class="blockListeVideo">
            
            <div class="titleVideo"><?php echo $_GET['Name'] . ' - Episode: '. $_GET['Ep'] .' - S.'. $_GET['S']; ?></div>

          	<div >
          		<video class="video" controls>
		  			<source src="<?php echo $video['Repertoire']; ?>">
				</video>
          	</div>

          	<div align="center" style="margin-top: 2%;">

          		<?php
          		$anaVideo = $bdd->query('SELECT titre, Episode, Saison, Repertoire FROM video WHERE titre=\'' . $_GET['Name'] . '\' AND Episode=\'' . $numEpDown . '\' AND Saison=\'' . $_GET['S'] . '\' ');
				$aVideo = $anaVideo->fetch();

          		if (!empty($aVideo['Episode'])) { ?>
          			<button class="buttonNew" onclick="newApelleVideo('<?php echo $aVideo['Episode']; ?>')"><</button>
          		<?php } ?>
          		
          		 <?php while ($newEp = $Episo->fetch()) { ?>

          			<button class="buttonNew" onclick="newApelleVideo('<?php echo $newEp['Episode'];  ?>')"><?php echo $newEp['Episode'];  ?></button>

          		<?php } ?>

          		<?php
          		$anaVideo = $bdd->query('SELECT titre, Episode, Saison, Repertoire FROM video WHERE titre=\'' . $_GET['Name'] . '\' AND Episode=\'' . $numEpHigh . '\' AND Saison=\'' . $_GET['S'] . '\' ');
				$aVideo = $anaVideo->fetch();

          		if (!empty($aVideo['Episode'])) { ?>
          			<button class="buttonNew" onclick="newApelleVideo('<?php echo $aVideo['Episode']; ?>')">></button>
          		<?php } ?>

          	</div>

          </div>
        </div>
      </div>
    </section>

 	<?php if ($_SESSION['Securiter'] >= 1 ) { include("Res/popUpload.php"); } ?>

 	<script type="text/javascript">
 		
 		function newApelleVideo(nZone)
 		{
 			var sa = "<?php echo $_GET['S']; ?>";
 			var nom = "<?php echo $_GET['Name']; ?>";

 			window.location = "?Name=" + nom + "&Ep=" + nZone + "&S=" + sa ;
 		}

 	</script>
    <script type="text/javascript">
          <?php include("Res/scriptModal.php"); ?>
    </script>
</body>
</html>
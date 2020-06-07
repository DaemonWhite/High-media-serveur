<?php

$moveUrl = "Audio.php";

include("Com/Conexion.php");

include("Com/verifiLoad.php");

include("Com/userSetings.php"); 

$GetV = 1;
$typeFavor = 2;

$ImageUs = $bdd->query('SELECT ID, image FROM user WHERE ID=\'' . $_SESSION['ID'] . '\'');
$Rimage = $ImageUs->fetch();




$EpVideo = $bdd->query('SELECT album, Disk, Piste, Repertoire FROM audio WHERE album=\'' . $_GET['Name'] . '\' AND Piste=\'' . $_GET['Ep'] . '\' AND Disk=\'' . $_GET['S'] . '\' ');
$video = $EpVideo->fetch();


$Episo= $bdd->query('SELECT album, Piste, Disk, Repertoire FROM audio WHERE album=\'' . $_GET['Name'] . '\' AND Disk=\'' . $_GET['S'] . '\' ');

$numEp = intval($_GET['Ep']);
$numEpDown = $numEp - 1;
$numEpHigh = $numEp + 1;


if ($video['album'] != "") {


?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo 'High media serveur - ' . $_GET['Name']; ?></title>
	<meta charset="utf-8" />
    <link rel="stylesheet" href="Res/style.css" />
    <link rel="stylesheet" href="Res/styleVideo.css" />
</head>
 <script type="text/javascript" src="Res/scriptZone.js">
 </script>

<body class="BackgroundA">

  <?php echo $Dmode;?> 

	 <nav id="menu">
          
              
              <div>
                  <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Acueil')">Acueil</button>
                  <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Video')">Video</button>
                  <button class="linkSelect" id="LinkDebutActif" onclick="ChangePAGE('Audio')">Audio</button>
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
                    <button class="bottomMenu" id="#Favor">Favoris</button>
                    <button class="bottomMenu" id="#Gestion">Gestionaire</button>
                    <button class="bottomMenu" id="" onclick="NonDisponible()">Télécharger</button>
                    <button class="bottomMenu" id="#Upload">Uploade</button>
                  <?php } else { ?>
                    <button class="bottomMenu" id="" onclick="NonDisponible()">Dossier</button>
                    <button class="bottomMenu" id="" onclick="Reserver()">Favoris</button>
                    <button class="bottomMenu" id="" onclick="Reserver()">Gestionaire</button>
                    <button class="bottomMenu" id="" onclick="NonDisponible()">Télécharger</button>
                    <button class="bottomMenu" id="" onclick="Reserver()">Uploade</button>
                  <?php } ?>
  
              </div>  
      
  </nav>

  
    
    <section class="zoneListe">
      <div class="blockListeVideo" align="center">
          <div>
            
            <div class="titleVideo"><?php echo $_GET['Name'] . ' - Episode: '. $_GET['Ep'] .' - S.'. $_GET['S']; ?></div>

          	<div >
          	<video class="video" controls>
		  			   <source src="<?php echo $video['Repertoire']; ?>">
				    </video>
          	</div>

          	<div align="center" style="margin-top: 2%;">

          		<?php
          		    $anaVideo = $bdd->query('SELECT album, Piste, Disk, Repertoire FROM audio WHERE album=\'' . $_GET['Name'] . '\' AND Piste=\'' . $numEpDown . '\' AND Disk=\'' . $_GET['S'] . '\' ');
				          $aVideo = $anaVideo->fetch();

          		if (!empty($aVideo['Piste'])) { ?>

          			<button class="buttonNew" onclick="newApelleVideo('<?php echo $aVideo['Piste']; ?>')"><</button>

          		<?php } ?>
          		
          		 <?php while ($newEp = $Episo->fetch()) { ?>

          			<button class="buttonNew" onclick="newApelleVideo('<?php echo $newEp['Piste'];  ?>')"><?php echo $newEp['Piste'];  ?></button>

          		<?php } ?>

          		<?php
          		  $anaVideo = $bdd->query('SELECT album, Piste, Disk, Repertoire FROM audio WHERE album=\'' . $_GET['Name'] . '\' AND Piste=\'' . $numEpHigh . '\' AND Disk=\'' . $_GET['S'] . '\' ');
				        $aVideo = $anaVideo->fetch();

          		if (!empty($aVideo['Piste'])) { ?>
          			<button class="buttonNew" onclick="newApelleVideo('<?php echo $aVideo['Piste']; ?>')">></button>
          		<?php } ?>

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
    <script type="text/javascript" src="Res/scriptFavori.js"></script>
</body>
</html>

<?php } else {  
  header('Location: Error/404.php?Error=video'); 
}?>
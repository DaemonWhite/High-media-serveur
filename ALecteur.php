<?php

$moveUrl = "audio.php";

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

	 <?php include('Com/mainMenu.php') ?>
  
    
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
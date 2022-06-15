<?php

$moveUrl = "/Vlecteur";

include("Com/Conexion.php");

include("Com/verifiLoad.php");

include("Com/userSetings.php"); 

$GetV = 1;
$typeFavor = 2;

$ImageUs = $bdd->query('SELECT ID, image FROM user WHERE ID=\'' . $_SESSION['ID'] . '\'');
$Rimage = $ImageUs->fetch();

$GetType = 0;
$GetGenre = 0;

$veifFav = $bdd->query('SELECT * FROM favori WHERE User=\'' . $_SESSION['ID'] . '\' AND Favori=\'' . $_GET['Name'] . '\' AND S=\'' . $_GET['S'] . '\' AND Ep=\'' . $_GET['Ep'] . '\' AND type=\'' . $GetType . '\' AND Genre=\'' . $GetGenre . '\' ' );
$nFavor = $veifFav->fetch();

$EpVideo = $bdd->query('SELECT titre, Episode, Saison, Repertoire FROM video WHERE titre=\'' . $_GET['Name'] . '\' AND Episode=\'' . $_GET['Ep'] . '\' AND Saison=\'' . $_GET['S'] . '\' ');
$video = $EpVideo->fetch();


$Episo= $bdd->query('SELECT titre, Episode, Saison, Repertoire FROM video WHERE titre=\'' . $_GET['Name'] . '\' AND Saison=\'' . $_GET['S'] . '\' ORDER BY Episode');

$anaHist = $bdd->query('SELECT User_ID, Name, Type, Episode, Saison FROM historique WHERE User_ID=\'' . $_SESSION['ID'] . '\' AND Name=\'' . $_GET['Name'] . '\' AND Type="0" AND Episode=\'' . $_GET['Ep'] . '\' AND Saison=\'' . $_GET['S'] . '\' ');
$eHist = $anaHist->fetch();

$numEp = intval($_GET['Ep']);
$numEpDown = $numEp - 1;
$numEpHigh = $numEp + 1;


if ($video['titre'] != "") {

  if ($_SESSION['ID'] >= 1) {

    if ($eHist != "") {

      $vefHist = $bdd->query('SELECT ID, User_ID, Name, Type, Episode, Saison FROM historique WHERE User_ID=\'' . $_SESSION['ID'] . '\' ORDER BY ID DESC LIMIT 0, 10');
      $veHist = $vefHist->fetch();

      if (($veHist['Name'] == $_GET['Name']) AND ($veHist['Type'] == 0) AND ($veHist['Episode'] == $_GET['Ep']) AND ($veHist['Saison'] == $_GET['S'])) {
        # code...
      } else {

      $dell = $bdd->query('DELETE FROM historique WHERE User_ID=\'' . $_SESSION['ID'] . '\' AND Name=\'' . $_GET['Name'] . '\' AND Type="0" AND Episode=\'' . $_GET['Ep'] . '\' AND Saison=\'' . $_GET['S'] . '\' ');

      $Nhist = $bdd->prepare("INSERT INTO historique(User_ID, Name, Type, Episode, Saison) VALUES  (:id, :name, :type, :epis, :saison)");
                                              $Nhist->execute(array( 
                                                'id' => $_SESSION['ID'],
                                                'name' => $_GET["Name"],
                                                'type' => $GetType,
                                                'epis' => $_GET['Ep'],
                                                'saison' => $_GET['S']));

      }

    } else {

        $Nhist = $bdd->prepare("INSERT INTO historique(User_ID, Name, Type, Episode, Saison) VALUES  (:id, :name, :type, :epis, :saison)");
                                              $Nhist->execute(array( 
                                                'id' => $_SESSION['ID'],
                                                'name' => $_GET["Name"],
                                                'type' => $GetType,
                                                'epis' => $_GET['Ep'],
                                                'saison' => $_GET['S']));

    }

  
  }


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
            
            <div class="titleVideo">
              <?php echo $titleVideo = $_GET['Name'] . ' - Episode: '. $_GET['Ep'] .' - S.'. $_GET['S']; ?>
            </div>

          	<div >

          	 <video class="video" controls>
		  			    <source src="<?php echo $rept = $video['Repertoire']; ?>">
				      </video>
              <div style="text-align: left;">
                <?php if (empty($nFavor)) {?>
                  <span id="rating" class="rating" style="display: ;" onclick="appFav(0,<?php echo "'" . $_GET['Name'] . "','". $_GET['S'] . "','" . $_GET['Ep'] . "',"; ?> 0, '1')"> &#9734 </span>
                  <span id="rating2" class="rating2" style="display: none;" onclick="appFav(0,<?php echo "'" . $_GET['Name'] . "','". $_GET['S'] . "','" . $_GET['Ep'] . "',"; ?> 1, '1')"> &#9734 </span>
              <?php } else { ?>
                  <span id="rating" class="rating" style="display: none;" onclick="appFav(0,<?php echo "'" . $_GET['Name'] . "','". $_GET['S'] . "','" . $_GET['Ep'] . "',"; ?> 0, '1')"> &#9734 </span>
                  <span id="rating2" class="rating2" style="display: ;" onclick="appFav(0,<?php echo "'" . $_GET['Name'] . "','". $_GET['S'] . "','" . $_GET['Ep'] . "',"; ?> 1, '1')"> &#9734 </span>
               <?php } ?>
              </div>
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
    </section>

 	<?php if ($_SESSION['Securiter'] >= 1 ) { include("Res/popUpload.php"); } ?>

 	<script type="text/javascript">
 		
 		function newApelleVideo(nZone)
 		{
 			var sa = "<?php echo $_GET['S']; ?>";
 			var nom = "<?php echo $_GET['Name']; ?>";

 			window.location = "?Name=" + nom + "&Ep=" + nZone + "&S=" + sa ;
 		}


  function downloadURI() 
  {
    <?php 
    $path_parts = pathinfo($rept, PATHINFO_EXTENSION);
    ?>
      var name = "<?php echo $titleVideo . "." . $path_parts; ?>";
      var uri = "<?php echo $rept;?>";
      var link = document.createElement("a");
      link.download = name;
      link.href = uri;
      link.click();
  }

 	</script>
    <script type="text/javascript">
          <?php include("Res/scriptModal.php"); ?>
    </script>
    <script type="text/javascript" src="Res/scriptZone.js" ></script>
  <script type="text/javascript" src="Res/scriptModal.js"></script>
  <script type="text/javascript" src="script/upload.js"></script>
  <script src="Res/scriptFavori.js"></script>
  <script type="text/javascript" src="script/gestionVideo.js"></script>
    
</body>
</html>
<?php } else {  header('Location: Error/404.php?Error=video'); }?>
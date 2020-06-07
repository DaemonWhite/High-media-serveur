<?php

session_start();

$UserName = $_SESSION['ID'];

var_dump($_FILES);

// Debug episode
if ($_POST['Ep13'] != 0) {$Episode[0] = $_POST['Ep13']; $Saison[0] = $_POST['Saison01'];}
if ($_POST['Ep14'] != 0) {$Episode[1] = $_POST['Ep14']; $Saison[1] = $_POST['Saison02'];}
if ($_POST['Ep15'] != 0) {$Episode[2] = $_POST['Ep15']; $Saison[2] = $_POST['Saison03'];}
if ($_POST['Ep16'] != 0) {$Episode[3] = $_POST['Ep16']; $Saison[3] = $_POST['Saison04'];}
if ($_POST['Ep17'] != 0) {$Episode[4] = $_POST['Ep17']; $Saison[4] = $_POST['Saison05'];}
if ($_POST['Ep18'] != 0) {$Episode[5] = $_POST['Ep18']; $Saison[5] = $_POST['Saison06'];}
if ($_POST['Ep19'] != 0) {$Episode[6] = $_POST['Ep19']; $Saison[6] = $_POST['Saison07'];}
if ($_POST['Ep20'] != 0) {$Episode[7] = $_POST['Ep20']; $Saison[7] = $_POST['Saison08'];}
if ($_POST['Ep21'] != 0) {$Episode[8] = $_POST['Ep21'];  $Saison[8] = $_POST['Saison09'];}
if ($_POST['Ep22'] != 0) {$Episode[9] = $_POST['Ep22'];  $Saison[9] = $_POST['Saison10'];}
if ($_POST['Ep23'] != 0) {$Episode[10] = $_POST['Ep23']; $Saison[10] = $_POST['Saison11'];}
if ($_POST['Ep24'] != 0) {$Episode[11] = $_POST['Ep24']; $Saison[11] = $_POST['Saison12'];}

if (!empty($_POST['Synopsis'])) {$Remue = $_POST['Synopsis'];} else {$Remue = null;}





$bdb = new pdo('mysql:host=localhost;dbname=highmediadata', 'HMS','Secure45RootHGMProject',   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
//(file_exists($dossier)

	if (!empty($_POST['GenreName'])) {

		$TitrePrincip = $_POST['GenreName'];

		echo "papa2";

		

			if (!empty($_FILES)) {
		
				$file_name = $_FILES['Video']['name'][0];
				$file_extension = strrchr($file_name, ".");
		
				$valide_extention = $arrayName = array('.mp4', '.MP4');
		
				//if (in_array($file_extension, $valide_extention)) {
					
					$ExisteVideo = 0;

					while (!empty($_FILES['Video']['name'][$ExisteVideo])) {

						$reqEpisode = $bdb->query('SELECT titre, Episode FROM video WHERE titre=\'' . $TitrePrincip . '\' AND Episode=\'' . $Episode[$ExisteVideo] . '\'');
						$vEp = $reqEpisode->fetch();

						if (empty($vEp)) {

							$Vdoss1 = "upload/Video/" . $TitrePrincip . "/";
							$Vdoss2 = $Vdoss1 . "S" . $Saison[$ExisteVideo] . "/";

							$nameV = $_FILES['Video']['name'][$ExisteVideo];
							$ReperV = $_FILES['Video']['tmp_name'][$ExisteVideo];
	
							if (!file_exists($Vdoss2 . $_FILES['Video']['name'][$ExisteVideo])) {
				
								if (!file_exists($Vdoss1)) {
					
									CreateRepertoire(2, $_POST['GenreName'], $Episode[$ExisteVideo], $Saison[$ExisteVideo], $nameV, $ReperV, $Remue, $bdb, $UserName);
					
								} elseif (!file_exists($Vdoss2)) {
					
									CreateRepertoire(1, $_POST['GenreName'], $Episode[$ExisteVideo], $Saison[$ExisteVideo], $nameV, $ReperV, $Remue, $bdb, $UserName);
					
								} else {CreateRepertoire(0, $_POST['GenreName'], $Episode[$ExisteVideo],$Saison[$ExisteVideo], $nameV, $ReperV, $Remue, $bdb, $UserName);} 
	
							} else {$Uerreur = "La video existe d¨¦ja";}

						} else {echo "Ep existant";}

						echo $ExisteVideo++;
						# code...
					}
					
				//} else {$Uerreur = "seule les video au extention suivante son autoris¨¦s";}
				# code...
			} else {$Uerreur = "Veulier m'etres une video";}

	} else {echo "Le titre est obligatoire";}



	function CreateRepertoire($Season, $name, $Ep, $Saison, $nameVideo, $tmpRepertori, $Synopsis, $bda, $user) {

		$GetTitle = $name ;
		$GetSubtitle = "NoValide"; //$_POST['subtitle'] 
		$GetSeson = $Saison;
		$GetEp = $Ep;
		$GetGen =  $_POST['Genre'];
		$GetTyp = "no"; //$_POST['typ']
		$Format = "0";

		$reqNombre = $bda->query('SELECT Nombre FROM titre');

		$DefaultDaus = "Video/";
		$dossier = $DefaultDaus . $_POST["GenreName"];

		if ($Season > 1) {
			mkdir($dossier);
		}
		

		$dossier = $dossier . "/S" . $GetSeson . "/";

		if ($Season > 0) {
			mkdir($dossier);
		}

		$Ressource = "upload/" . $dossier . "/" . $nameVideo;

		$Uerreur = null;

		$AddVideo = $bda->prepare("INSERT INTO video(titre, SousTitre, Saison, Episode, Repertoire, Proprietaire) VALUES  (:titre, :SousTitre, :Saison, :Episode, :Repertoire, :Proprietaire)");
                                          $AddVideo->execute(array( 
                                          	'titre' => $GetTitle,
                                          	'SousTitre' => $GetSubtitle,
                                          	'Saison' => $GetSeson,
                                          	'Episode' => $GetEp,
                                          	'Repertoire' => $Ressource,
                                          	'Proprietaire' => $user));

		move_uploaded_file($tmpRepertori, $dossier .  $nameVideo);

	}



?>


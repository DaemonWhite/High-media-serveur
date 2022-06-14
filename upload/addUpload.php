<?php

session_start();

$UserName = $_SESSION['ID'];

var_dump($_FILES);

// Debug episode
$UserName = $_SESSION['ID'];
$VerifMusic = $_POST['IsMusic'];
$repGen = -1; // Valeur d'inisiolisation d'ep
$numGen = 0; // valeur de la boucle et des nouvelle variable
$maxGen = 0;

if ($VerifMusic == "0") {

	$repGen = 13;
	$maxGen = 11;
	$defChe = "Video/";

} elseif($VerifMusic == "1") {

	$repGen = 45;
	$maxGen = 20;
	$defChe = "Audio/";

}

var_dump($_FILES);

while ($numGen <= $maxGen) {

	echo $iniEpisode = "Ep" . $repGen;
	echo $iniSaison = "Saison" . $repGen;
	echo $iniSubTitle = "subTitle" . $repGen;

	if ($_POST[$iniEpisode] != 0) {

		$Episode[$numGen] = $_POST[$iniEpisode]; 
		$Saison[$numGen] = $_POST[$iniSaison];

		if ($_POST[$iniSubTitle] != "") {
			
			$subTitle[$numGen] = $_POST[$iniSubTitle];

		} else {

			$subTitle[$numGen] = "NoValide";

		}

	}

	$numGen++;
	$repGen++;

}





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

						if ($_POST['IsMusic'] != 1) {

							$reqEpisode = $bdb->query('SELECT titre, Episode FROM video WHERE titre=\'' . $TitrePrincip . '\' AND Episode=\'' . $Episode[$ExisteVideo] . '\' AND Saison=\'' . $Episode[$ExisteVideo] . '\' ');
							
						} else {

							$reqEpisode = $bdb->query('SELECT album, Disk, Piste FROM audio WHERE album=\'' . $TitrePrincip . '\' AND Disk=\'' . $Episode[$ExisteVideo] . '\' AND Piste=\'' . $subTitle[$ExisteVideo] . '\'');

						}

						$vEp = $reqEpisode->fetch();

						if (empty($vEp)) {

							$Vdoss1 = $defChe . $TitrePrincip . "/";
							$Vdoss2 = $Vdoss1 . "S" . $Saison[$ExisteVideo] . "/";

							$preNameV = $_FILES['Video']['name'][$ExisteVideo];
							$path_parts = pathinfo($preNameV, PATHINFO_EXTENSION);

							$nameV = $_POST['GenreName'] . " S" . $Saison[$ExisteVideo] . " EP" . $Episode[$ExisteVideo] . "." . $path_parts;
							$ReperV = $_FILES['Video']['tmp_name'][$ExisteVideo];
	
							if (!file_exists($Vdoss2 . $_FILES['Video']['name'][$ExisteVideo])) {
				
								if (!file_exists($Vdoss1)) {
					
									CreateRepertoire(2, $_POST['GenreName'], $Episode[$ExisteVideo], $Saison[$ExisteVideo],  $subTitle[$ExisteVideo], $nameV, $ReperV, $bdb, $UserName);
					
								} elseif (!file_exists($Vdoss2)) {
					
									CreateRepertoire(1, $_POST['GenreName'], $Episode[$ExisteVideo], $Saison[$ExisteVideo],  $subTitle[$ExisteVideo], $nameV, $ReperV, $bdb, $UserName);
					
								} else {CreateRepertoire(0, $_POST['GenreName'], $Episode[$ExisteVideo],$Saison[$ExisteVideo],  $subTitle[$ExisteVideo], $nameV, $ReperV, $bdb, $UserName);} 
	
							} else {$Uerreur = "La video existe d¨¦ja";}

						} else {echo "Ep existant";}

						echo $ExisteVideo++;
						# code...
					}
					
				//} else {$Uerreur = "seule les video au extention suivante son autoris¨¦s";}
				# code...
			} else {$Uerreur = "Veulier m'etres une video";}

	} else {echo "Le titre est obligatoire";}



	function CreateRepertoire($Season, $name, $Ep, $Saison, $sTitle, $nameVideo, $tmpRepertori, $bda, $user) {

		$VerifMusic = $_POST['IsMusic'];

		$GetTitle = $name ;
		$GetSubtitle = $sTitle; //$_POST['subtitle'] 
		$GetSeson = $Saison;
		$GetEp = $Ep;
		$Format = $VerifMusic;
		$upError = false;
		//$GetGen =  $_POST['Genre'];

		if ($VerifMusic == 0) {
		
			//$GetTyp = $_POST['type']; //$_POST['typ']
			//$GetLang = $_POST['Lang'];
			$DefChem = "Video/";
			$Artiste = "NoValide";

		} else {

			$GetTyp = "NonValide"; //$_POST['typ']
			$GetLang = "NonValide";
			$DefChem = "Audio/";
		}

		$reqNombre = $bda->query('SELECT Nombre FROM titre');

		$DefaultDaus = $DefChem;
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

		if ($VerifMusic == 0){

			$AddVideo = $bda->prepare("INSERT INTO video(titre, SousTitre, Saison, Episode, Repertoire, Proprietaire) VALUES  (:titre, :SousTitre, :Saison, :Episode, :Repertoire, :Proprietaire)");

		} else {

		$AddVideo = $bda->prepare("INSERT INTO audio(album, Titre, Disk, Piste, Repertoire, Proprietaire) VALUES  (:titre, :SousTitre, :Saison, :Episode, :Repertoire, :Proprietaire)");

		}

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


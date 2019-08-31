<?php

session_start();

$UserName = $_SESSION['Pseudo'];


// Debug episode
if ($_POST['Ep1'] != 0) {$Episode[0] = $_POST['Ep1']; $Saison[0] = $_POST['Saison01'];}
if ($_POST['Ep2'] != 0) {$Episode[1] = $_POST['Ep2']; $Saison[1] = $_POST['Saison02'];}
if ($_POST['Ep3'] != 0) {$Episode[2] = $_POST['Ep3']; $Saison[2] = $_POST['Saison03'];}
if ($_POST['Ep4'] != 0) {$Episode[3] = $_POST['Ep4']; $Saison[3] = $_POST['Saison04'];}
if ($_POST['Ep5'] != 0) {$Episode[4] = $_POST['Ep5']; $Saison[4] = $_POST['Saison05'];}
if ($_POST['Ep6'] != 0) {$Episode[5] = $_POST['Ep6']; $Saison[5] = $_POST['Saison06'];}
if ($_POST['Ep7'] != 0) {$Episode[6] = $_POST['Ep7']; $Saison[6] = $_POST['Saison07'];}
if ($_POST['Ep8'] != 0) {$Episode[7] = $_POST['Ep8']; $Saison[7] = $_POST['Saison08'];}
if ($_POST['Ep9'] != 0) {$Episode[8] = $_POST['Ep9']; $Saison[8] = $_POST['Saison09'];}
if ($_POST['Ep10'] != 0) {$Episode[9] = $_POST['Ep10']; $Saison[9] = $_POST['Saison10'];}
if ($_POST['Ep11'] != 0) {$Episode[10] = $_POST['Ep11'];  $Saison[10] = $_POST['Saison11'];}
if ($_POST['Ep12'] != 0) {$Episode[11] = $_POST['Ep12'];  $Saison[11] = $_POST['Saison12'];}

if (!empty($_POST['Synopsis'])) {$Remue = $_POST['Synopsis'];} else {$Remue = null;}


//var_dump($_FILES);


$bdb = new pdo('mysql:host=localhost;dbname=highmediadata', 'root','',   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
//(file_exists($dossier)

	if (!empty($_POST['nameSerie'])) {

		$TitrePrincip = $_POST['nameSerie'];

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
					
									CreateRepertoire(2, $_POST['nameSerie'], $Episode[$ExisteVideo], $Saison[$ExisteVideo], $nameV, $ReperV, $Remue, $bdb, $UserName);
					
								} elseif (!file_exists($Vdoss2)) {
					
									CreateRepertoire(1, $_POST['nameSerie'], $Episode[$ExisteVideo], $Saison[$ExisteVideo], $nameV, $ReperV, $Remue, $bdb, $UserName);
					
								} else {CreateRepertoire(0, $_POST['nameSerie'], $Episode[$ExisteVideo],$Saison[$ExisteVideo], $nameV, $ReperV, $Remue, $bdb, $UserName);} 
	
							} else {$Uerreur = "La video existe déja";}

						} else {echo "Ep existant";}

						echo $ExisteVideo++;
						# code...
					}
					
				//} else {$Uerreur = "seule les video au extention suivante son autorisés";}
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

		$reqTitre = $bda->query('SELECT nom FROM titre WHERE nom=\'' . $GetTitle . '\'');
		$vTitre = $reqTitre->fetch();

		if ($vTitre['nom'] == $GetTitle) {

			while ($dNombre = $reqTitre->fetch()) {
				$num = 2;

				$addInfo = $bda->prepare("INSERT INTO titre(Nombre) VALUES  (:Nombre)");
                                          $AddTitre->execute(array( 
                                          	'Nombre' => $num));
				
				$num++;
			}

			

		} else {

			$AddTitre = $bda->prepare("INSERT INTO titre(nom, Format, Genre, Synopsis) VALUES  (:nom, :Format, :Genre, :Synopsis)");
                                          $AddTitre->execute(array( 
                                          	'nom' => $GetTitle,
                                          	'Format' => $Format,
                                          	'Genre' => $GetGen,
                                          	'Synopsis' => $Synopsis));

		}

		$DefaultDaus = "Video/";
		$dossier = $DefaultDaus . $_POST["nameSerie"];

		if ($Season > 1) {
			mkdir($dossier);
		}
		

		$dossier = $dossier . "/S" . $GetSeson . "/";

		if ($Season > 0) {
			mkdir($dossier);
		}

		$Ressource = $dossier . "/" . $nameVideo;

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


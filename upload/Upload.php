<?php

session_start();

$UserName = $_SESSION['ID'];
$VerifMusic = $_POST['IsMusic'];
$repGen = -1; // Valeur d'inisiolisation d'ep
$numGen = 0; // valeur de la boucle et des nouvelle variable
$maxGen = 0;

if ($VerifMusic == "0") {

	$repGen = 1;
	$maxGen = 11;
	$defMin = "DVideo.jpg";
	$defChe = "Video/";

} elseif($VerifMusic == 1) {

	$repGen = 25;
	$maxGen = 19;
	$defMin = "DAudio.png";
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


// Debug episode

if (($_FILES['miniature']['name']) != "" AND !empty($_FILES['miniature'])) { $min = $_FILES['miniature']['name']; } else { $min = $defMin;}


if (!empty($_POST['Synopsis'])) {$Remue = $_POST['Synopsis'];} else {$Remue = null;}





$bdb = new pdo('mysql:host=localhost;dbname=highmediadata', 'HMS','Secure45RootHGMProject',   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
//(file_exists($dossier)

	if (!empty($_POST['nameSerie'])) {

		$TitrePrincip = $_POST['nameSerie'];

		if ($min != $defMin)
		{ 
			$minia = 'upload/' . $defChe . $TitrePrincip ."/". $min;
		} else {
			$minia = 'upload/' . $defChe . $min;
		}
		echo "papa2";

		

			if (!empty($_FILES)) {
		
				$file_name = $_FILES['Video']['name'][0];
				$file_extension = strrchr($file_name, ".");
		
				$valide_extention = $arrayName = array('.mp4', '.MP4');
		
				//if (in_array($file_extension, $valide_extention)) {
					
					$ExisteVideo = 0;

					while (!empty($_FILES['Video']['name'][$ExisteVideo])) {

						if ($_POST['IsMusic'] != 1) {

							$reqEpisode = $bdb->query('SELECT titre, Episode FROM video WHERE titre=\'' . $TitrePrincip . '\' AND Episode=\'' . $Episode[$ExisteVideo] . '\' AND Saison=\'' . $Episode[$ExisteVideo] . '\'  ');
							
						} else {

							$reqEpisode = $bdb->query('SELECT album, Disk, Piste FROM audio WHERE album=\'' . $TitrePrincip . '\' AND Disk=\'' . $Episode[$ExisteVideo] . '\' AND Piste=\'' . $subTitle[$ExisteVideo] . '\'');

						}
						$vEp = $reqEpisode->fetch();

						if (empty($vEp)) {

							$Vdoss1 = $defChe . $TitrePrincip ;
							$Vdoss2 = $Vdoss1 . "/S" . $Saison[$ExisteVideo] ;

							$nameV = $_FILES['Video']['name'][$ExisteVideo];
							$ReperV = $_FILES['Video']['tmp_name'][$ExisteVideo];

							echo $Vdoss2;
	
							if (!file_exists($Vdoss2 . $_FILES['Video']['name'][$ExisteVideo])) {
				
								if (!file_exists($Vdoss1)) { // Si le repertoire video n'existe pas
					
									echo "\npremière Video\n";
									CreateRepertoire(2, $_POST['nameSerie'], $Episode[$ExisteVideo], $Saison[$ExisteVideo], $subTitle[$ExisteVideo], $nameV, $ReperV, $Remue, $minia, $bdb, $UserName);
								} elseif (!file_exists($Vdoss2)) { // Si le repertoire saison n'existe pas
									
									echo "\nstNouvelle saison\n";
									CreateRepertoire(1, $_POST['nameSerie'], $Episode[$ExisteVideo], $Saison[$ExisteVideo], $subTitle[$ExisteVideo], $nameV, $ReperV, $Remue, $minia, $bdb, $UserName);
								} else {
									echo "\n pas de modifcation\n";
									CreateRepertoire(0, $_POST['nameSerie'], $Episode[$ExisteVideo],$Saison[$ExisteVideo], $subTitle[$ExisteVideo], $nameV, $ReperV, $Remue, $minia, $bdb, $UserName);
								} 
	
							} else {$Uerreur = "La video existe déja";}

						} else {echo "Ep existant";}

						echo $ExisteVideo++;
						# code...
						sleep(0.1);
					}
					
				//} else {$Uerreur = "seule les video au extention suivante son autorisés";}
				# code...
			} else {$Uerreur = "Veulier m'etres une video";}

	} else {echo "Le titre est obligatoire";}



	function CreateRepertoire($Season, $name, $Ep, $Saison, $sTitle, $nameVideo, $tmpRepertori, $Synopsis, $miniature, $bda, $user) {

		$bda = new pdo('mysql:host=localhost;dbname=highmediadata', 'HMS','Secure45RootHGMProject',   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

		$VerifMusic = $_POST['IsMusic'];

		$GetTitle = $name ;
		$GetSubtitle = $sTitle; //$_POST['subtitle'] 
		$GetSeson = $Saison;
		$GetEp = $Ep;
		$GetMin = $miniature;
		$Format = $VerifMusic;
		$upError = false;
		$GetGen =  $_POST['Genre'];
		$GetsubGen =  $_POST['type'];
		$GetLang = ['Lang']; // Sous Genres
		if ($VerifMusic == 0) {
		
			$GetTyp = $_POST['type']; //$_POST['typ']
			$GetLang = $_POST['Lang'];
			$DefChem = "Video/";
			$Artiste = "NoValide";

		} else {

			$GetTyp = "NonValide"; //$_POST['typ']
			$GetLang = "NonValide";
			$DefChem = "Audio/";
			$Artiste = $_POST['titleName'];
		}
		echo $GetTitle;

		//$reqNombre = $bda->query('SELECT Nombre FROM titre');

		$reqTitre = $bda->query('SELECT nom, Type FROM titre WHERE nom=\'' . $GetTitle . '\' AND Type=\'' . $VerifMusic . '\'');
		$vTitre = $reqTitre->fetch();

		var_dump($vTitre);



		if ($vTitre == false) { // verifi juste si les condition son Operrationelle
			

		} elseif ($vTitre['nom'] != $GetTitle) {

			

		} else {

			$upError = true;

		}

		if ($upError == false) {

			echo "chemin A ";
			$AddTitre = $bda->prepare("INSERT INTO titre(nom, Format, Artiste, Affiche, Genre, subGenre, Type, Synopsis) VALUES  (:nom, :Format, :Artiste, :Affiche, :Genre, :subGenre, :type, :Synopsis)");
  	                                  $AddTitre->execute(array( 
  	                                  	'nom' => $GetTitle,
  	                                  	'Format' => $Format,
  	                                  	'Artiste' => $Artiste,
  	                                  	'Genre' => $GetGen,
  	                                  	'subGenre' => $GetsubGen,
  	                                  	'type' => $VerifMusic,
  	                                  	'Affiche' => $GetMin,
  	                                  	'Synopsis' => $Synopsis));

		}

		$DefaultDaus = $DefChem;
		$dossier = $DefaultDaus . $_POST["nameSerie"];
		$dossMini = $DefChem . $GetTitle. "/";

		echo "\n" . $dossier;

		if ($Season > 1) {
			mkdir($dossier);
			echo "Creation du dossier tritre" . $dossier;
		}
		

		$dossier = $dossier . "/S" . $GetSeson . "/";

		if ($Season > 0) {
			mkdir($dossier);
			echo "Creation du dossier Saison " . $dossier . " ";
		}

		$Ressource = "upload/" . $dossier . $nameVideo;

		$Uerreur = null;

		if ($VerifMusic == 0) {
			 
			$AddVideo = $bda->prepare("INSERT INTO video(titre, SousTitre, Saison, Episode, Repertoire, Proprietaire, Lang) VALUES  (:titre, :SousTitre, :Saison, :Episode, :Repertoire, :Proprietaire, :Lang)");

		} else {

			$AddVideo = $bda->prepare("INSERT INTO audio(album, Titre, Disk, Piste, Repertoire, Proprietaire, Lang) VALUES  (:titre, :SousTitre, :Saison, :Episode, :Repertoire, :Proprietaire, :Lang)");


		}

                                          $AddVideo->execute(array( 
                                          	'titre' => $GetTitle,
                                          	'SousTitre' => $GetSubtitle,
                                          	'Saison' => $GetSeson,
                                          	'Episode' => $GetEp,
                                          	'Repertoire' => $Ressource,
                                          	'Proprietaire' => $user,
                                           	'Lang' => $GetLang));

		move_uploaded_file($tmpRepertori, $dossier .  $nameVideo);


		move_uploaded_file($_FILES['miniature']['tmp_name'], $dossMini . $_FILES['miniature']['name'] );
		

	}



?>


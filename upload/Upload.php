<?php
//var_dump($_FILES);

$bdb = new pdo('mysql:host=localhost;dbname=highmediadata', 'root','',   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
//(file_exists($dossier)


	if (!empty($_POST['Title'])) {

		$Vdoss1 = "upload/Video/" . $_POST['Title'] . "/";
		$Vdoss2 = $Vdoss1 . "S" . $_POST['Seson'] . "/";

		$reqEpisode = $bdb->query('SELECT titre, Episode FROM video WHERE titre=\'' . $_POST['Title'] . '\' AND Episode=\'' . $_POST['Ep'] . '\'');
		$vEp = $reqEpisode->fetch();

		if (empty($vEp)) {

			if (!empty($_FILES)) {
		
				$file_name = $_FILES['Video']['name'];
				$file_extension = strrchr($file_name, ".");
		
				$valide_extention = $arrayName = array('.mp4', '.MP4');
		
				if (in_array($file_extension, $valide_extention)) {
		
					if (!file_exists($Vdoss2 . $_FILES['Video']['name'])) {
		
						if (!file_exists($Vdoss1)) {
			
							CreateRepertoire(2, $bdb);
			
						} elseif (!file_exists($Vdoss2)) {
			
							CreateRepertoire(1, $bdb);
			
						} else {CreateRepertoire(0, $bdb);} 
		
		
						# code...
					} else {$Uerreur = "La video existe déja";}
		
					# code...
				} else {$Uerreur = "seule les video au extention suivante son autorisés";}
				# code...
			} else {$Uerreur = "Veulier m'etres une video";}

			# code...
		} else {$Uerreur = "Episode déja existan";}

	} else {$Uerreur = "veulier metre un titre";}



	function CreateRepertoire($Season, $bda) {

		$GetTitle = $_POST['Title'] ;
		$GetSubtitle = "NoValide"; //$_POST['subtitle'] 
		$GetSeson = $_POST['Seson'];
		$GetEp = $_POST['Ep'] ;
		$GetGen =  "NoValide"; //$_POST['Gen']
		$GetTyp = "NoValide"; //$_POST['typ']
		$Format = "0";

		$reqTitre = $bda->query('SELECT nom FROM titre WHERE nom=\'' . $GetTitle . '\'');
		$vTitre = $reqTitre->fetch();

		if ($vTitre['nom'] == $GetTitle) {

			

		} else {

			$AddTitre = $bda->prepare("INSERT INTO titre(nom, Format) VALUES  (:nom, :Format)");
                                          $AddTitre->execute(array( 
                                          	'nom' => $GetTitle,
                                          	'Format' => $Format));

		}

		$DefaultDaus = "upload/Video/";
		$dossier = $DefaultDaus . "/" . $_POST['Title'];

		if ($Season > 1) {
			mkdir($dossier);
		}
		

		$dossier = $dossier . "/S" . $_POST['Seson'] . "/";

		if ($Season > 0) {
			mkdir($dossier);
		}

		$Ressource = $dossier . "/" . $_FILES['Video']['name'];

		$Uerreur = null;

		$AddVideo = $bda->prepare("INSERT INTO video(titre, SousTitre, Saison, Episode, Repertoire, Genre, type) VALUES  (:titre, :SousTitre, :Saison, :Episode, :Repertoire, :Genre, :type)");
                                          $AddVideo->execute(array( 
                                          	'titre' => $GetTitle,
                                          	'SousTitre' => $GetSubtitle,
                                          	'Saison' => $GetSeson,
                                          	'Episode' => $GetEp,
                                          	'Repertoire' => $Ressource,
                                          	'Genre' => $GetGen,
                                          	'type' => $GetTyp));

		move_uploaded_file($_FILES["Video"]["tmp_name"], $dossier . $_FILES["Video"]["name"]);

	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>High media serveur - upload</title>
	<meta charset="utf-8">
</head>
<body>

	<?php if (isset($Uerreur)) {echo $Uerreur;} ?>

	<div role="dialogue" align="center">

		<table>
			
			<tr><td>Ep</td><td>Nom de l'episode</td></tr>

		</table>
		<form method="post" enctype="multipart/form-data">
    	    <h2>Upload Fichier</h2>
    	    <input type="text" name="Title" placeholder="Nom de la série"><br><br>
    	    <label for="fileUpload">Fichier:</label>
    	    <select name="Ep">
    	    	<?php
    	    	$RP = 1000;
    	    	$n = 1;
 					while ($RP > $n) {

 						echo  '<option value="'. $n . '">' . $n . '</option>';
 					   	    		$n++;
 					   	    	}   	    	
    	    	?>
    	    </select>
    	    S<select name="Seson">
    	    	<?php
    	    	$RP = 50;
    	    	$n = 1;
 					while ($RP > $n) {

 						echo  '<option value="'. $n . '">' . $n . '</option>';
 					   	    		$n++;
 					   	    	}   	    	
    	    	?>
    	    </select>
    	    <input type="file" name="Video" id="fileUpload">
    	    <input type='hidden' id="fileUpload" name='MAX_FILE_SIZE' value='7516192768'>
    	    <input type="submit" name="submit" value="Upload">
    	    <p><strong>Note:</strong> Seuls les formats .jpg, .jpeg, .jpeg, .gif, .png sont autorisés jusqu'à une taille maximale de 5 Mo.</p>
    	</form>
    </div>

</body>
</html>

<?php
//var_dump($_FILES);


$Vdoss1 = "upload/Video/" . $_POST['Title'] . "/";
echo $Vdoss2 = $Vdoss1 . $_POST['Seson'] . "/";

//(file_exists($dossier)


	if (!empty($_FILES)) {

		echo $file_name = $_FILES['Video']['name'];
		echo $file_extension = strrchr($file_name, ".");

		$valide_extention = $arrayName = array('.mp4', '.MP4');

		if (in_array($file_extension, $valide_extention)) {

			if (!file_exists($Vdoss2 . $_FILES['Video']['name'])) {

				if (!file_exists($Vdoss1)) {
	
					CreateRepertoire(2);
	
				} elseif (!file_exists($Vdoss2)) {
	
					CreateRepertoire(1);
	
				} else {CreateRepertoire(0);} 


				# code...
			} else {$Uerreur = "La video existe déja";}

			# code...
		} else {$Uerreur = "seule les video au extention suivante son autorisés";}
		# code...
	} else {$Uerreur = "Veulier m'etres une video";}




	function CreateRepertoire($Season) {

		echo $Season;

		$DefaultDaus = "upload/Video/";
		$dossier = $DefaultDaus . "/" .$_POST['Title'];

		if ($Season > 1) {
			mkdir($dossier);
		}
		

		$dossier = $dossier . "/" . $_POST['Seson'] . "/";

		if ($Season > 0) {
			mkdir($dossier);
		}

		move_uploaded_file($_FILES["Video"]["tmp_name"], $dossier . $_FILES["Video"]["name"]);

	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>High media serveur upload</title>
	<meta charset="utf-8">
</head>
<body>

	<?php echo $Uerreur; ?>

	<div role="dialogue" align="center">

		<table>
			
			<tr><td>Ep</td><td>Nom de l'episode</td></tr>

		</table>
		<form method="post" enctype="multipart/form-data">
    	    <h2>Upload Fichier</h2>
    	    <input type="text" name="Title" placeholder="Nom de la série"><br><br>
    	    <label for="fileUpload">Fichier:</label>
    	    <select name="Seson">
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

 						echo  '<option value="S'. $n . '">' . $n . '</option>';
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
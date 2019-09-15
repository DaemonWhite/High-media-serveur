<?php
session_start();

$bdd = new pdo('mysql:host=localhost;dbname=highmediadata', 'root','',   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$user = $_SESSION['ID'];
$dRepertoire = $user . "/";

$updateImage = $bdd->query('SELECT image FROM user');
$deletOld = $updateImage->fetch();

echo $deletOld['image'] . "</br>";

echo $deletOld = strrchr($deletOld['image'], "/");

$dell = $user . $deletOld;
unlink($dell);

var_dump($_FILES);

	if (!empty($_FILES['imageUpl'])) {

		$file_name = $_FILES['imageUpl']['name'];
		$tmp_file = $_FILES['imageUpl']['tmp_name'];
		$file_extension = strrchr($file_name, ".");

		$valide_extention = $arrayName = array('.jpg', '.JPG', '.png', '.PNG');

		if (in_array($file_extension, $valide_extention)) {
			echo "Extention valide";

			if (!file_exists($dRepertoire)) {
				echo "Crer un dossier";
				mkdir($dRepertoire);
				# code...
			}

			move_uploaded_file($tmp_file ,$dRepertoire . $file_name);

				echo "Fonctione";

			echo $dRepertoire = "user/" . $user . "/" . $_FILES['imageUpl']['name'];
			$updateImage = $bdd->prepare('UPDATE user SET image = :image WHERE ID = :user');
							$updateImage->execute(array('image' => $dRepertoire, 'user' => $user));



		}
		
	} else { echo "invalide";}
?>
<?php

session_start();

include("../config.php");

$User = intval($_SESSION['ID']);

$nom = $_POST['Name'];
$Saison = $_POST['Sai'];
$Episode = $_POST['Epi'];
$type = intval($_POST['type']);
$Genre =intval($_POST['genre']);

$Supr = intval($_POST['Suprimer']);

$accept =0;

echo $Saison . $Episode;



$bdd = new pdo('mysql:host=' . $bdd_host . ';dbname=highmediadata', $bdd_user, $bdd_pass,   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

if ($Genre == 0) {
	$verifA = $bdd->query('SELECT * FROM video WHERE  titre=\'' . $nom . '\' AND Saison=\'' . $Saison . '\' AND Episode=\'' . $Episode . '\' ' );
	$verif = $verifA->fetch();
} elseif ($Genre == 2) {
	$verifA = $bdd->query('SELECT * FROM titre WHERE nom=\'' . $nom . '\' AND Format=0 ');
	$verif = $verifA->fetch();
}

if (!empty($verif)) {
	$accept=1;
}


if ($accept === 1) {

	if ($Supr == 0) {
	
		$addF = $bdd->prepare("INSERT INTO favori(User, Favori, S, Ep, type, Genre) VALUES  (:User, :Favori, :S, :Ep, :type, :Genre)");
                            	              $addF->execute(array( 
                        	                  	'User' => $User,
												'Favori' => $nom,
												'S' => $Saison,
												'Ep' => $Episode,
												'type' => $type,
												'Genre' => $Genre));	
	} else {


		$addF = $bdd->query('DELETE FROM favori WHERE User=\'' . $_SESSION['ID'] . '\' AND Favori=\'' . $nom . '\' AND type=\'' . $type . '\' AND Ep=\'' . $Episode . '\' AND S=\'' . $Saison . '\' ');

		echo "delete";

	}
}

//var_dump($_POST);

?>
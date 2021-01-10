<?php

session_start();

$User = intval($_SESSION['ID']);

$nom = $_POST['Name'];
$Saison = $_POST['Sai'];
$Episode = $_POST['Epi'];
$type = intval($_POST['type']);
$Genre =intval($_POST['genre']);

$Supr = intval($_POST['Suprimer']);



$bdd = new pdo('mysql:host=localhost;dbname=highmediadata', 'HMS','Secure45RootHGMProject',   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

if ($Supr == 0) {
	
	$addF = $bdd->prepare("INSERT INTO Favori(User, Favori, S, Ep, type, Genre) VALUES  (:User, :Favori, :S, :Ep, :type, :Genre)");
                                          $addF->execute(array( 
                                          	'User' => $User,
											'Favori' => $nom,
											'S' => $Saison,
											'Ep' => $Episode,
											'type' => $type,
											'Genre' => $Genre));	
} else {


	$addF = $bdd->query('DELETE FROM Favori WHERE User=\'' . $_SESSION['ID'] . '\' AND Favori=\'' . $nom . '\' AND type=\'' . $type . '\' AND Ep=\'' . $Episode . '\' AND S=\'' . $Saison . '\' ');

}

//var_dump($_POST);

?>
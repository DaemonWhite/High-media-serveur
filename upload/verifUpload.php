<?php //Ne sert a rien
$bdb = new pdo('mysql:host=localhost;dbname=highmediadata', 'HMS','Secure45RootHGMProject',   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$titre = $_POST['Name'];
$tipe = $_POST['type'];
$Ep = $_POST['Epi'];
$Sa = $_POST['Sai'];


if ($tipe == 2) {
	
	$verifVideo = $bdb->prepare("SELECT titre, Saison, Episode FROM video WHERE  titre=:titre AND Saison=:Saison AND Episode=:Episode");

	$verifVideo->execute(array( 
                                          	'titre' => $titre,
                                          	'Saison' => $Ep,
                                          	'Episode' => $Sa));

	$verif = $verifVideo->fetch();

	if (!empty($verif['titre'])) {
		echo "connu";
	}

}



?>
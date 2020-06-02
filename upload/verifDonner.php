<?php
$verif = new pdo('mysql:host=localhost;dbname=highmediadata', 'HMS','Secure45RootHGMProject',   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));



$reqEpisode = $verif->query('SELECT titre, Episode FROM video WHERE titre=\'' . $_POST['Name']  . '\'');

while ($name = $reqEpisode->fetch()) {

	echo $name['titre'] . " --->  Episode: " . $name['Episode'] . "
";
	# code...
}

?>
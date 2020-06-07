<?php
$verif = new pdo('mysql:host=localhost;dbname=highmediadata', 'HMS','Secure45RootHGMProject',   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$type = $_POST['Type'];
$search;

if ($type == '0') {//Configuration

	$reqEpisode = $verif->query('SELECT titre, Episode, Saison FROM video WHERE titre=\'' . $_POST['Name']  . '\'');
	$search = "video";

} else {

	$reqEpisode = $verif->query('SELECT album, titre, disk, piste FROM audio WHERE album=\'' . $_POST['Name']  . '\'');
	$search = "album";

}


while ($name = $reqEpisode->fetch()) {

	if ($type == 0) {
		
		echo $name[$search] . " ---> Saison: " . $name['Saison'] . " -->  Episode: " . $name['Episode'] . "
";

	} else {

		echo $name[$search] . " ---> Disk: " . $name['disk'] . " --> piste: " . $name['piste'] . " Titre: " . $name['titre'] . "
";

	}

	
	# code...
}

?>
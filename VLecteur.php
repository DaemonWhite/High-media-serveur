<?php

$bdd = new pdo('mysql:host=localhost;dbname=highmediadata', 'root','',   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$EpVideo = $bdd->query('SELECT titre, Episode, Repertoire FROM video WHERE titre=\'' . $_GET['Name'] . '\'');

?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo 'High media serveur - ' . $_GET['Name']; ?></title>
</head>
<body>
		<?php 
		$Num = 1;
		while ($Num <= $_GET['Ep']) {
			$video = $EpVideo->fetch();
			$Num++;
		} ?>
		

	<video width="320" height="240" controls>
		  <source src="<?php echo $video['Repertoire']; ?>">
	</video>

</body>
</html>
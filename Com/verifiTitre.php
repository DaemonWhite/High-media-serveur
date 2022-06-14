<?php
	include("../config.php");

	$bdd = new pdo('mysql:host=' . $bdd_host . ';dbname=highmediadata', $bdd_user ,  $bdd_pass,   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

	$Type = $_POST['Type']; //Type 0 = Titre; 1 = Ep;  ST = 2
	$Gere  = $_POST['Gere']; //Gere 0 = Video; 1 = Music
	$Titre  = $_POST['Titre'];

	if (!empty($_POST['Text'])) {
		$Text  = $_POST['Text'];

		if (!empty($_POST['Text2'])) {
			$Text2  = $_POST['Text2'];
		}

	}

	$Exact = false;

	$Genre = null;
	$Generate = null;
	$GenTest = null;
	if ($Gere == "0") {

		$Genre = "video";

		$Generate = "titre";
		$GenTest = "titre='" . $Titre ."'";

		if ($Type >= "1") {
			$Generate = $Generate . ",Saison ,Episode";
			$GenTest  = $GenTest . "AND Saison='". $Text2 ."' AND Episode= '" . $Text ."'";
		}

		$Exact = true;

	} elseif ($Gere == "1"){
		$Genre = "audio";

		$Generate = "album";
		$GenTest = "album='" . $Titre ."'";

		if ($Type >= "1") {
			$Generate = $Generate . ",Disk ,Piste";
			$GenTest  = $GenTest . "AND Disk='". $Text2 ."' AND Piste= '" . $Text ."'";
		}

		$Exact = true;

	} else {

		echo "error ---> Script corompue veulier rechrage la page";

	}

	$figure = 'SELECT ' . $Generate . ' FROM ' . $Genre . ' WHERE ' . $GenTest . ' ORDER BY ' . $Generate;
	//echo $figure;
	if ($Exact == true) {
	 $title = $bdd->query($figure);

	$donnes = $title->fetch();

	if (!empty($donnes[$Generate])) {
		echo $Type;	
	} else {
		echo "-1";
	}
			
	} else {echo "impossible de vérifier la valeurs";}
?>
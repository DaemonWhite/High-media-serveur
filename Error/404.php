<?php if (empty($_GET['Error'])) {
	$Error = "La page demander est inexistante";
} else {

	if ($_GET['Error'] == "video") {

		$Error = "La video demander n'existe pas";
		
	} elseif ($_GET['Error'] == "musique") {
		
		$Error = "La musique demander n'existe pas";

	}

} ?>
<!DOCTYPE html>
<html>
<head>
	<title>Error 404</title>
	<link rel="stylesheet" href="../Res/style.css" />
</head>
<body class="BackgroundA" style="justify-content: center;">

	<div>

	 	<div style="font-size: 10vh; margin-top: 2vh;" class="colorTitle"> Erreur 404 </div> <br>
		<?php echo $Error; ?>

		
	</div>

</body>
</html>

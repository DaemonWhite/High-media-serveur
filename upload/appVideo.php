<?php 
	
	$bdd = new pdo('mysql:host=localhost;dbname=highmediadata', 'HMS','Secure45RootHGMProject',   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

	$appVideo = "SELECT * FROM titre WHERE";
	$ifLang = 0;

	//$_POST['Search'];

	if ($_POST['Search'] != "" && $_POST['Search'] != " ") // search Barr info
	{
		$Q = $_POST['Search'];
		$S = explode(" ", $Q);

		$i=0;

		foreach ($S as $mot) {

			if ($i != 0) {

				$appVideo.= " AND ";

			}

			$appVideo.= " nom LIKE '%$mot%'";
			
			$i++;

		}

		$appVideo.= " AND ";

	} 

	if ( "no" !=$_POST['Genre']) {
		
		$appVideo.= " Genre= '" . $_POST['Genre'] . "'";
		$appVideo.= " AND ";

	}

	if ( "no" !=$_POST['subGen']) {
		
		$appVideo.= " subGenre= '" . $_POST['subGen'] . "'";
		$appVideo.= " AND ";

	}

	if (!empty($_POST['Lang'])) {

		$lan = "SELECT * FROM video WHERE Lang = '" . $_POST['Lang'] . "'" ;
		
		$req = $bdd->query($lan);

		while ($donnes = $req->fetch()) {
			
			$ifLang++;

		}

	} else {
		$ifLang++;
	}


	$appVideo.= " Type= '" . $_POST['Type'] . "'";

	//echo $appVideo;

	$appVideo.= "ORDER BY nom";

	$req = $bdd->query($appVideo);

	$Vef = 0 ;

	if ($ifLang > 0) {
		
		while ($donnes = $req->fetch() ) {

			$Vef++;
	
			echo '<div class="caseBottom" onclick="newZone('; echo "'"; echo $donnes['nom']; echo "'"; echo ')">
    	                      <table align="center">
    	                                <tr><img class="caseImg" src="' . $donnes['Affiche'] .'"></tr>
    	                                
    	                                  <tr align="center" class="whiteCase"><td><span style=" font-size: 150%;">'. $donnes['nom'] . '</span></td></tr>  
    	                                </tr>
    	                      </table>
    	    
    	                  </div>'; 
	
		}

	}

	if ($Vef == 0) {

		//echo "Aucune vidéo trouvèe";
	
	}
	

?>
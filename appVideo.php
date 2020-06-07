<?php 
	
	$bdd = new pdo('mysql:host=localhost;dbname=highmediadata', 'HMS','Secure45RootHGMProject',   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

	$appVideo = "SELECT * FROM titre";

	$_POST['Search'];

	if ($_POST['Search'] != "")
	{
		$Q = $_POST['Search'];
		$S = explode(" ", $Q);

		$i=0;

		foreach ($S as $mot) {

			if ($i == 0) {
				
				$appVideo.= " WHERE ";

			} else {

				$appVideo.= " AND ";

			}

			$appVideo.= " nom LIKE '%$mot%'";
			
			$i++;

		}



	} else {

		if ($_POST['Search'] != " ") {
			
			$appVideo.= " WHERE ";

		}

	}

	if (!empty($_POST['Genre'] && $_POST['Search'] != "")) {
				
				if (!$_POST['Genre'] == "") {
					
					$appVideo.= " AND ";

				}

			}

	if (!empty($_POST['Genre'])) {
		
		$appVideo.= "Genre= '" . $_POST['Genre'] . "'";

	}

	if ($_POST['Search'] != "" || !empty($_POST['Genre'])) {
		
		$appVideo.= " AND";

	}

	$appVideo.= " Type= '" . $_POST['Type'] . "'";

	echo $appVideo;

	$appVideo.= "ORDER BY nom";

	$req = $bdd->query($appVideo);

	$Vef = 0 ;

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

	if ($Vef == 0) {

		echo "Aucune vidéo trouvèe";
	
	}
	

?>
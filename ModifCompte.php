<?php

session_start();

echo $_POST['NName'];
echo $_POST['NNameV'];
echo $_POST['NPseudo'];
echo $_POST['NPseudoV'];
echo $_POST['NPassV'];
echo $_POST['NVerifPassV'];
echo $_POST['NChambr'];
echo $_POST['NChambrV'];

$bdd = new pdo('mysql:host=localhost;dbname=highmediadata', 'root','',   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$reqsearchA = $bdd->prepare("SELECT ID_user, UserName, Name_Surname FROM membre WHERE Name_Surname = ?");
$reqsearchA->execute(array($_POST['NName']));

$reqsearchB = $bdd->prepare("SELECT UserName, Name_Surname FROM membre WHERE UserName = ?");
$reqsearchB->execute(array($_POST['NPseudo']));

while ($donnees  =  $reqsearchA->fetch()) {


	$IDUser = $donnees['ID_user'];
	$CorrectNameA = $donnees['Name_Surname'];
	$CorrectPseudA = $donnees['UserName'];

	# code...
}

while ($donnees  =  $reqsearchB->fetch()) {

	$CorrectNameB = $donnees['Name_Surname'];
	$CorrectPseudB = $donnees['UserName'];

}

if (!empty($_POST['NName']) OR !empty($_POST['NPseudo']) OR !empty($_POST['NChambr'])) {

	if (($CorrectNameA == $CorrectNameB) AND ($CorrectPseudA == $CorrectPseudB)) {

		if (!empty($_POST['NName'])) {

			if (!empty($_POST['NPseudo'])) {
		
				if (!empty($_POST['NChambr'])) {
		
	  				if (!empty($_POST['NPassV'])) {
		
	  					if (!empty($_POST['NVerifPassV'])) {

	  						# code...
	  						$CriptPass = password_hash($_POST['NVerifPassV'], PASSWORD_BCRYPT);
	  						$UpdateName = $bdd->prepare('UPDATE membre SET Password = :NewPassword WHERE ID_user = :user');
							$UpdateName->execute(array(
							    'NewPassword' => $CriptPass,
							    'user' => $IDUser
							    ));
								
								$_SESSION['Erreur'] = null;
								ChngaeBase($bdd, $IDUser);

	  					} else { $ErreurChange = "Veulier confimer le mot de passe"; ErreurSes($ErreurChange);}
	  					# code...
	  				
	  				} elseif (!empty($_POST['NNameV']) OR !empty($_POST['NPseudoV']) OR !empty($_POST['NChambrV'])) {

	  					$_SESSION['Erreur'] = null;	
						ChngaeBase($bdd, $IDUser);

	  				} else {$ErreurChange = "Veulier choisir une valeur a changer"; ErreurSes($ErreurChange);}
		
				} else {$ErreurChange = "la chambre de l' utilisateur doit être donner"; ErreurSes($ErreurChange);}
				# code...
			} else {$ErreurChange = "le pseudo de l' utilisateur doit être donner"; ErreurSes($ErreurChange);}
			# code...
		} else {$ErreurChange = "le nom de l' utilisateur doit être donner"; ErreurSes($ErreurChange);}

		# code...
	}else {$ErreurChange = "Impossible d'itdentifier un utilisateur"; ErreurSes($ErreurChange);}

} else {$ErreurChange = "Tout les chmaps doive être remplie à l'exeption du mot de passe"; ErreurSes($ErreurChange);}

function ChngaeBase($bda, $ID) {

	if (!empty($_POST['NNameV'])) {


	  			$UpdateName = $bda->prepare('UPDATE membre SET Name_Surname = :NewName_Surname WHERE ID_user = :user');
				$UpdateName->execute(array(
				    'NewName_Surname' => $_POST['NNameV'],
				    'user' => $ID
				    ));

	  		}
		
	  		if (!empty($_POST['NPseudoV'])) {


	  			$UpdatePseud = $bda->prepare('UPDATE membre SET UserName = :NewUserName WHERE ID_user = :user');
				$UpdatePseud->execute(array(
				    'NewUserName' => $_POST['NPseudoV'],
				    'user' => $ID
				    ));

	  		}
		
	  		if (!empty($_POST['NChambrV'])) {

	  			$UpdateChambre = $bda->prepare('UPDATE membre SET Chambre = :NewChambre WHERE ID_user = :user');
				$UpdateChambre->execute(array(
				    'NewChambre' => $_POST['NChambrV'],
				    'user' => $ID
				    ));

	  		}
		
	  		if (!empty($_POST['Securiter'])) {
	
	  			$UpdateSecu = $bda->prepare('UPDATE membre SET Securiter = :NewSecuriter WHERE ID_user = :user');
				$UpdateSecu->execute(array(
				    'NewSecuriter' => $_POST['Securiter'],
				    'user' => $ID
				    ));

					echo $_SESSION['ValideModif'] = "T";
                   header('Location: TestNewPassWord.php?Valide=1');

	 }


}

function ErreurSes($err) {
	$_SESSION['Erreur'] = $err;

	header('Location: TestNewPassWord.php');
}

?>

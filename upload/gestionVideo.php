<?php 

session_start();

 $search = new pdo('mysql:host=localhost;dbname=highmediadata', 'HMS','Secure45RootHGMProject',   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$User = $_SESSION['ID'];
$gest = $_POST['Type'];
$tp = $_POST['Gere'];

$titre = "";

if ($tp == "0") {


		if($gest == "1") {
			
			$title = $search->query('SELECT titre, Proprietaire FROM video WHERE Proprietaire=\'' . $User . '\' ORDER BY titre');
		
			while ($donnes = $title->fetch()) {	
		
				$ex = $donnes['titre'];
		
		
				if ($titre != $ex) {
					
		
					$titre = $donnes['titre'];
		
					$titreForm = '"' . $titre . '"';
					echo "<div onclick='appMyVideo(" . $titreForm .")'> <a class='SelectionBase' style='margin: 5%; font-size: 3vh;' onclick='appMyVideo(" . $titreForm .")'>" . $titre . "</a></div> <br>";
		
					
				}
		
			}
		
		} else {
		
			$title = $search->query('SELECT titre, SousTitre, Saison, Episode, Proprietaire FROM video WHERE titre=\'' . $gest . '\' AND Proprietaire=\'' . $User . '\' ORDER BY Episode ');
			echo "<div class='colorTitle' style='font-size:3vh;'> ". $gest ." </div>";
			echo "<div> 
		
					<table style='color: white;'>
		
					<tr>
		
						<td>
		
						Modifier
		
						</td>
		
						<td>
		
						 	Episode
		
						</td>
		
						<td>
		
							Saison
		
						</td>
						<td>
		
							Sous-titre
		
						</td>
		
						<td>
		
							Fonctionaliter
		
						</td>
		
					</tr>";
		
					$numberMode = 0;
		
			while ($donnes = $title->fetch()) {
		
				$numberMode++;
		
				if ($donnes['SousTitre'] == "NoValide") {
					$ST = null;
				} else { $ST =  $donnes['SousTitre']; }
		
				$placer = '"' . $gest . '",' . $donnes['Episode'] . ',' . $donnes['Saison'] . ', "' . $donnes['SousTitre'] . '",' . $numberMode . '';
		
		
		
				echo "
		
					<tr id='idModmod". $numberMode."'>
		
						<td>
		
							<input id='mod". $numberMode."' type='button' onclick='modifScript(". $numberMode.")' class='buttonNew' value='Modifier' >
		
						</td>
		
						<td>
		
							<input type='number' value='". $donnes['Episode'] ."' readonly id='modifEp". $numberMode."' class='EpisodeSize'>
						
						</td>
		
						<td>
		
							<input type='number' value='". $donnes['Saison'] ."' readonly id='modifSa". $numberMode."' class='EpisodeSize'>
		
						</td>
		
						</td>
		
						<td>
		
		
							<input type='text' value='". $ST ."' readonly id='modifTi". $numberMode."' class='texteBase'>
		
						</td>
		
						<td>
		
							<input type='button' value='Suprimer' id='modiSupr". $numberMode."' class='buttonSupr' style='display: none;' onclick='EnvModifscript(". $placer. ", 0)'> <input type='button' id='modiValider". $numberMode."' value='Valider' class='buttonVali' style='display: none;' onclick='EnvModifscript(". $placer.", 1)'>	
		
						</td>
		
		
					</tr>";
		
					
				
			}
		
			echo "</table>
		
				 </div>";
		
		}

} elseif ($tp == '1') {
	echo "yy";

	if ($gest == "0") {
		
		echo "ss";

		$title = $search->query('SELECT titre, Episode, SousTitre, Saison, Proprietaire, Repertoire FROM video WHERE titre=\'' . $_POST["NameTi"] . '\' AND Episode=\'' . $_POST["Episode"] .  '\' AND SousTitre=\'' . $_POST["Sub"] .  '\' AND Saison=\'' .$_POST["Saison"] .  '\'  AND Proprietaire=\'' . $User . '\'');

		$donnes = $title->fetch();

		echo $Repert = "../" . $donnes['Repertoire'];


		$title = $search->query('DELETE FROM video WHERE titre=\'' . $_POST["NameTi"] . '\' AND Episode=\'' . $_POST["Episode"] .  '\' AND SousTitre=\'' . $_POST["Sub"] .  '\' AND Saison=\'' .$_POST["Saison"] .  '\'  AND Proprietaire=\'' . $User . '\'');
		$title = $search->query('DELETE FROM historique WHERE Name=\'' . $_POST["NameTi"] . '\' AND Episode=\'' . $_POST["Episode"] .  '\' AND Saison=\'' .$_POST["Saison"] .  '\' ');
		unlink($Repert);

		$title = $search->query('SELECT titre FROM video WHERE titre=\'' . $_POST["NameTi"] . '\' ');

		$donnes = $title->fetch();

		echo $donnes['titre'];

		if (empty($donnes['titre'])) {

			$title = $search->query('SELECT titre FROM video WHERE titre=\'' . $_POST["NameTi"] . '\' ');
			
			
			$title = $search->query('DELETE FROM titre WHERE nom=\'' . $_POST["NameTi"] . '\' AND Format=0');


		} 

	}

}

?>
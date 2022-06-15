<?php 

session_start();

include("../config.php");

$bdd = new pdo('mysql:host=' . $bdd_host . ';dbname=highmediadata', $bdd_user, $bdd_pass,   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$titre = $bdd->query('SELECT * FROM favori WHERE User=\'' . $_SESSION['ID'] . '\' AND Genre="2" ');
$video = $bdd->query('SELECT * FROM favori WHERE User=\'' . $_SESSION['ID'] . '\' AND Genre="0" ');

echo "<div class='cadreBaseT' >Vos video</div><table>";

while ($title = $titre->fetch()) {
	
	echo '
				<tr>
					<td>
						<a href="/video?name='. $title["Favori"] .'" class="SelectionBase"> '. $title["Favori"] .' </a>
					</td>
					<td>
						<input class="buttonSupr" type="input" name="" value="Suprimer" onclick="appFav(2,'; echo  "'" .$title["Favori"] . "'"; echo ',0, 0, 1, 0); appMyFavor(1);">
					</td>
				</tr>';
	
}
echo "</table><div class='cadreBaseT' style='margin-top: 2%;' >Vos épisode</div><table>";

while ($videal = $video->fetch()) {
	
	echo '
				<tr>
					<td>
						<a class="SelectionBase" href="/Vlecteur?Name='. $videal["Favori"] .'&Ep='. $videal["Ep"] .' &S='. $videal["S"] .'" > '. $videal["Favori"] .' Ep : '. $videal["Ep"] .' S : '. $videal["S"] .' </a>
					</td>
					<td>
						<input class="buttonSupr" type="input" name="" value="Suprimer" onclick="appFav(2,'; echo  "'" .$videal["Favori"] . "'"; echo ', '. $videal["S"] .' , '. $videal["Ep"] .' , 1, 0); appMyFavor(1);">
					</td>
				</tr>';
}

?>

 
<?php
$bdd = new pdo('mysql:host=localhost;dbname=highmediadata', 'root','',   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$requete = $bdd->query('SELECT console, nom FROM jeux_video WHERE console = "?" ORDER By prix DESC LIMIT 5');
$requete->execute(array($_get['console']));
while ($donnees = $reponse->fetch()) 
{
	echo '<p>' . $donnees['console']. ' - ' .$donnees['nom'] . '</p>';
}
$newRequete = $bdd->prepare('INSERT INTO jeux_video(nom, possesseur VALUES(?,?)');
$newRequete = $bdd->execute(array($_get['nom'], $_get['possesseur']));
?>
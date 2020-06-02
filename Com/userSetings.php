<?php

$Dmode = null;

if ($_SESSION['ID'] != "-1") {
	$deb = $bdd->prepare("SELECT * FROM user WHERE ID = ?");
            $deb->execute(array($_SESSION['ID']));
            $debInfo = $deb->fetch();

            if ($debInfo["debugMode"] != "0" ) {
            	$debugMode = true;
            } else { $debugMode = false;}

} else { $debugMode =false; }

if ($debugMode == true)
	{$Dmode = "<h3 style='position: fixed; left: 50%; top: -1%; color:#DC143C;'> debugMode </h3>";}

?>
<?php

$bdd = new pdo('mysql:host=localhost;dbname=highmediadata', 'HMS','Secure45RootHGMProject',   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


if (!empty($_POST['Pseudo']) AND !empty($_POST['Pass']) AND !empty($_POST['Name']) AND !empty($_POST['Chambr']))
{
   echo $pseudo = $_POST['Pseudo'];
    $passW = $_POST['Pass'];
    $passVerif = $_POST['VerifPass'];
    $RealName = $_POST['Name'];
    $UsChanmbre = $_POST['Chambr'];
    $UsSecuriter = "1";
    
    $reqUsname = $bdd->prepare("SELECT UserName FROM membre WHERE UserName = ?");
    $reqUsname->execute(array($pseudo));
    $UsNameExist = $reqUsname->rowCount();

        if ($UsNameExist == 0) {  
    
    
            $reqName = $bdd->prepare("SELECT Name_Surname FROM membre WHERE Name_Surname = ?");
            $reqName->execute(array($RealName));
            $UsName = $reqName->rowCount();


        
                if ($UsName == 0) {
                    


                    if (($passW == $passVerif) AND !empty($_POST['Pass']) AND !empty($_POST['VerifPass']))
                     {
                    
                         $pass_hache = password_hash($passW, PASSWORD_BCRYPT);
                          
                         $insertmbr = $bdd->prepare("INSERT INTO membre(UserName, Name_Surname, Password, Chambre, Securiter) VALUES  (?,?,?,?,?)");
                                          $insertmbr->execute(array( $pseudo, $RealName, $pass_hache, $UsChanmbre, $UsSecuriter));
             
                                          $NewPass = 1;
                                echo "Votre compte à étais créer : " . $pseudo . "Veuliez vous connecter en apuyant sur retour";
                     
                         # code...
                     } else {

                            $erreur = "Mot de passe incorecte";

                     }


                } else { $erreur = "Nom d'utilisateur déjà utiliser";}
    
    
    
        
        } else { $erreur = "Pseudo déjà utiliser";}
    


        
} else { $erreur = "veuiliez completer tous les champs"; }

?>
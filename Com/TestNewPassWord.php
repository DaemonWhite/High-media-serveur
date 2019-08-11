<!DOCTYPE html>
<html>
<head>
	<title>HighMediaServeur - Password</title>
</head>

<?php

$bdd = new pdo('mysql:host=localhost;dbname=highmediadata', 'root','',   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


$reponse = $bdd->query("SELECT Name_Surname FROM membre ORDER BY Name_Surname   ");

$reponseA = $bdd->query("SELECT UserName FROM membre ORDER BY UserName   ");
$reponseB = $bdd->query("SELECT Chambre FROM membre ORDER BY Chambre   ");



$NewPass = 0;

$pseudo = $_POST['Pseudo'];
$passW = $_POST['Pass'];
$passVerif = $_POST['VerifPass'];
$RealName = $_POST['Name'];
$UsChanmbre = $_POST['Chambr'];
$UsSecuriter = $_POST['Securiter'];

if (!empty($_POST['Pseudo']) AND !empty($_POST['Pass']) AND !empty($_POST['Securiter']) AND !empty($_POST['Name']) AND !empty($_POST['Chambr']))
{
    
    
    $reqUsname = $bdd->prepare("SELECT UserName FROM membre WHERE UserName = ?");
    $reqUsname->execute(array($pseudo));
    $UsNameExist = $reqUsname->rowCount();

        if ($UsNameExist == 0) {
            echo "bonjour c'est foireux";
    
    
            $reqName = $bdd->prepare("SELECT Name_Surname FROM membre WHERE Name_Surname = ?");
            $reqName->execute(array($RealName));
            $UsName = $reqName->rowCount();


        
                if ($UsName == 0) {
                    


                    if (($passW == $passVerif) AND !empty($_POST['Pass']) AND !empty($_POST['VerifPass']))
                     {
                     
                     
                         $pass_hache = password_hash($passW, PASSWORD_DEFAULT);
                          
                         $insertmbr = $bdd->prepare("INSERT INTO membre(UserName, Name_Surname, Password, Chambre, Securiter) VALUES          (?, ?, ?, ?, ?)");
                                          $insertmbr->execute(array($pseudo, $RealName, $pass_hache, $UsChanmbre, $UsSecuriter));
             
                                          $NewPass = 1;
             
                                     echo '<script type="text/javascript">
                     
                                   window.onload = function () { alert("Compte créer"); }
                     
                                 </script>';
                     
                     
                         # code...
                     } else {

                            $erreur = "Mot de passe incorecte";

                     }


                } else { $erreur = "Nom d'utiliser d'éja utiliser";}
    
    
    
        
        } else { $erreur = "Pseudo d'éjà utiliser";}
    


        
} else { $erreur = "veuilier completer tour les champ"; }
        
        	            ?>





<body>

         <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>

	<form action="" method="post">
        <label for="UsName"> Nom et prenom :  </label></li>   <input type="text" name="Name" id="pseudo"/><br><br>
        <a>Pseudo :         </a></li>   <input type="text" name="Pseudo" /><br><br>
        <a>mot de passe :   </a></li>   <input type="text" name="Pass" /><br><br>
        <a>Confirmer le mot de passe : </a></li>    <input type="text" name="VerifPass" /><br><br>
        <a>Chambre :        </a></li>   <input type="text" name="Chambr" /><br><br>

        <select name="Securiter">
            <option value="1">Utilisateur</option>
            <option value="2">Modérateur</option>
            <option value="3">Administrateur</option>
        </select>



    
        <input type="submit" value="Condirmer" /><br><br>
    </form>

    <form action="TestNewPassWord.php" method="post">
        <label> Nom et prenom :  </label></li>   <select name="choix">
        														<?php
        														$i = 0;

 

        														while ($donnees = $reponse->fetch()) {

        															echo "test";

        															 echo '<option value=\'' . $i . '\'>' . $donnees['Name_Surname']  . '</option>';

        															 $i= $i + 1;
        														 
        															 
        														}
   																	
   																	?>
																</select>
		 <label> Pseudo :  </label></li>   <select name="choix2">
        														<?php
        														$A = 0;

 

        														while ($donnees = $reponseA->fetch()) {

        															echo "test";

        															 echo '<option value=\'' . $A . '\'>' . $donnees['UserName']  . '</option>';

        															 $A= $A + 1;
        														 
        															 
        														}
   																	
   																	?>
																</select>

		 <label> Chambre :  </label></li>   <select name="choix3">
        														<?php
        														$B = 0;

 

        														while ($donnees = $reponseB->fetch()) {

        															echo "test";

        															 echo '<option value=\'' . $B . '\'>' . $donnees['Chambre']  . '</option>';

        															 $B= $B + 1;
        														 
        															 
        														}
   																	
   																	?>
																</select><br><br>

        <a>Pseudo :         </a></li>   <input type="text" name="NPseudo" value=choix2 /><br><br>
        <a>mot de passe :   </a></li>   <input type="text" name="NPass" /><br><br>
        <a>Confirmer le mot de passe : </a></li>    <input type="text" name="NVerifPass" /><br><br>
        <a>Chambre :        </a></li>   <input type="text" name="NChambr" /><br><br>
    
        <input type="submit" value="Condirmer" /><br><br>
    </form>


    

    <div class="form-group">
	<select class="form-control" style="width:auto" name="secteur">
		<option value="">Sélectionner votre secteur</option>
		<option value="SECTEUR_1">SECTEUR 1</option>
		<option value="SECTEUR_2">SECTEUR 2</option>
		<option value="SECTEUR_3">SECTEUR 3</option>
		<option value="SECTEUR_4">SECTEUR 4</option>
	</select>
</div>
<br />
 
<?php
        if( !empty($_POST['secteur']) )
        {
 
                        echo "Vous avez choisi <b>".$_POST['secteur']."</b>";
 
        }
?>



</body>
</html>

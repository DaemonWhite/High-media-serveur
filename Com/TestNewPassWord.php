<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<head>
	<title>HighMediaServeur - Password</title>
  <link rel="stylesheet" href="../Res/style.css" />
</head>

<?php

session_start();

$SecuG = htmlspecialchars($_SESSION['Securiter']);

if ($SecuG == 3) {
  # code...

    

if (empty($_GET['T1'])) {


    $IDChoix1 = "a";
} else {
    $IDChoix1 = $_GET['T1'];    
}

if (empty($_GET['T2'])) {

    $IDChoix2 = "a";

} else {
    $IDChoix2 = $_GET['T2'];    
}

if (empty($_GET['T3'])) {

    $IDChoix3 = "a";

} else {
    $IDChoix3 = $_GET['T3'];    
}

$idAplique = 0;


$bdd = new pdo('mysql:host=localhost;dbname=highmediadata', 'root','',   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$reqsearchA = $bdd->prepare("SELECT UserName, Name_Surname, Chambre, Securiter FROM membre WHERE Name_Surname = ?");
$reqsearchA->execute(array($IDChoix1));

$reqsearchB = $bdd->prepare("SELECT UserName, Name_Surname, Chambre, Securiter FROM membre WHERE (UserName = ?)");
$reqsearchB->execute(array($IDChoix2));

$reqsearchC = $bdd->prepare("SELECT UserName, Name_Surname, Chambre, Securiter FROM membre WHERE (Chambre = ?)");
$reqsearchC->execute(array($IDChoix3));

$reponse = $bdd->query("SELECT Name_Surname FROM membre ORDER BY Name_Surname   ");

$reponseA = $bdd->query("SELECT UserName FROM membre ORDER BY UserName   ");
$reponseB = $bdd->query("SELECT Chambre FROM membre ORDER BY Chambre   ");



if (!empty($_POST['Pseudo']) AND !empty($_POST['Pass']) AND !empty($_POST['Securiter']) AND !empty($_POST['Name']) AND !empty($_POST['Chambr']))
{
   echo $pseudo = $_POST['Pseudo'];
    $passW = $_POST['Pass'];
    $passVerif = $_POST['VerifPass'];
    $RealName = $_POST['Name'];
    $UsChanmbre = $_POST['Chambr'];
    $UsSecuriter = $_POST['Securiter'];
    
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
                     
                     echo $pseudo;
                         $pass_hache = password_hash($passW, PASSWORD_BCRYPT);
                          
                         $insertmbr = $bdd->prepare("INSERT INTO membre(UserName, Name_Surname, Password, Chambre, Securiter) VALUES  (?,?,?,?,?)");
                                          $insertmbr->execute(array( $pseudo, $RealName, $pass_hache, $UsChanmbre, $UsSecuriter));
             
                                          $NewPass = 1;
             
                                     echo '<script type="text/javascript">
                     
                                   window.onload = function () { alert("Compte créer"); }
                     
                                 </script>';
                     
                     
                         # code...
                     } else {

                            $erreur = "Mot de passe incorecte";

                     }


                } else { $erreur = "Nom d'utilisateur d'éja utiliser";}
    
    
    
        
        } else { $erreur = "Pseudo d'éjà utiliser";}
    


        
} else { $erreur = "veuilier completer tour les champ"; }


if (!empty($_POST['Pseudo']) AND !empty($_POST['Pass']) AND !empty($_POST['Securiter']) AND !empty($_POST['Name']) AND !empty($_POST['Chambr']))

        
        	            ?>


<script type="text/javascript">

    <?php $ReqChoix = $bdd->query("SELECT Name_Surname FROM membre ORDER BY Name_Surname   "); ?>
    <?php $ReqChoix2 = $bdd->query("SELECT UserName FROM membre ORDER BY UserName   "); ?>
    <?php $ReqChoix3 = $bdd->query("SELECT Chambre FROM membre ORDER BY Chambre   "); ?>
    

    var US = 0
    var PS = 0
    var CH = 0
    var choiceName = []
    ElChoixName = null
     function RegistreOnchage(){

    var testChoix = document.getElementById('choixName');

    var testChoix2 = document.getElementById('choixUsName');

    var testChoix3 = document.getElementById('ChoixCha');

    var U = "<?php if(isset($_GET['D1'])) { echo $_GET['D1']; }?>"; 

    var P = "<?php if(isset($_GET['D2'])) { echo $_GET['D2']; }?>";

    var C = "<?php if(isset($_GET['D3'])) { echo $_GET['D3']; }?>";

    var TypeUser = "<?php if(isset($_GET['sec'])) { echo $_GET['sec']; }?>";

    var InfChoix = 0


    <?php

     $AllChoix = 0;

    echo 'if (testChoix.value == "") {

                        US = '; echo $IndexChoix = $AllChoix++; echo  '

                        
                    var nUS = null

                   };';


   
    while ( $donnees  =  $ReqChoix->fetch() ) {

        echo '


                  if (testChoix.value == \''; echo $donnees["Name_Surname"]; echo '\') {

                        US = '; echo $IndexChoix = $AllChoix++; echo '

                        var nUS = "'; echo $donnees["Name_Surname"]; echo'"
                   

                   };
                   
    
             ';

    } ?>

    <?php

     $AllChoix2 = 0;

    echo 'if (testChoix2.value == "") {

                        PS = '; echo $IndexChoix = $AllChoix2++; echo '

                        
                var nSN = null

                   };';


   
    while ( $donnees  =  $ReqChoix2->fetch() ) {

        echo '


                  if (testChoix2.value == \''; echo $donnees["UserName"]; echo '\') {

                        PS = '; echo $IndexChoix = $AllChoix2++; echo '

                        var nSN = "'; echo $donnees["UserName"]; echo'";
                   

                   };
                   
    
             ';

    } ?>

    <?php

     $AllChoix3 = 0;

    echo 'if (testChoix3.value == "") {

                        CH = '; echo $IndexChoix = $AllChoix3++; echo  '

                        
                   var nCh = null

                   };';


   
    while ( $donnees  =  $ReqChoix3->fetch() ) {

        echo '


                  if (testChoix3.value == \''; echo $donnees["Chambre"]; echo '\') {

                        CH = '; echo $IndexChoix = $AllChoix3++; echo '

                        var nCh = '; echo $donnees["Chambre"]; echo'

                        
                   

                   };
                   
    
             ';

    } ?>

 window.location  = "?US=" + US + "&PS=" + PS +"&CH=" + CH + "&T1=" + nUS + "&T2=" + nSN +"&T3=" + nCh + "&D1=" + U + "&D2=" + P + "&D3=" + C + "&sec=" + TypeUser;

}
                     
</script>




<body onload="valeurToTen()" class="BackgroundA" style="color: #54C472;  flex-direction: column; ">

<div align="center">
            <?php if(isset($erreur)) {echo '<font color="red">'.$erreur."</font>";}?>
<table>
<tr>
	<form action="" method="post">
        <td><label for="UsName"> Nom et prénom :  </label> </td><td>  <input class="texteBase" type="text" name="Name" id="pseudo"/></td></tr>
        <td><a>Pseudo :         </a>  </td><td> <input class="texteBase" type="text" name="Pseudo" /></td></tr>
        <td><a>mot de passe :   </a> </td><td>  <input class="texteBase" type="text" name="Pass" /></td></tr>
        <td><a>Confirmer le mot de passe : </a>  </td><td>  <input class="texteBase" type="text" name="VerifPass" /></td></tr>
        <td><a>Chambre :        </a> </td><td>  <input class="texteBase" type="text" name="Chambr" /></td></tr><br><br>

        <tr><td>
          <select class="selectBase" name="Securiter">
            <option value="1">Utilisateur</option>
            <option value="2">Modérateur</option>
            <option value="3">Administrateur</option>
          </select>
        </td></tr>


<br><br><br><br>
    
      <tr><td align="center"><td>
        <input class="buttonBase" type="submit" value="Condirmer" />
      </td></td>
    </tr>
    </form>
  </table>
</div>


<div align="center">


    <h3>Changer les informations sur un utilisateur</h2>
    <form action="" id="Search" method="post">

        <label> Nom et prénom :  </label></li>   <select class="selectBase" name="choix" id="choixName" onchange="RegistreOnchage()">
                                                                <option value=""> Sélectionner? </option>

        														<?php
                                                                

        														while ($donnees = $reponse->fetch()) {


        															 echo '<option value=\'' . $donnees['Name_Surname'] . '\'>' . $donnees['Name_Surname']  . '</option>';

                                                                    $NumChoix1 = $NumChoix1 + 1;
        														 
        															 
        														}
   																	
   																	?>

																</select>
		 <label> Pseudo :  </label></li>   <select class="selectBase" name="choix2" id="choixUsName" onchange="RegistreOnchage()">

                                                                <option value=""> Sélectionner? </option>
        														<?php

 

        														while ($donnees = $reponseA->fetch()) {


        															 echo '<option value=\'' . $donnees['UserName'] . '\'>' . $donnees['UserName']  . '</option>';

                                                                        $NumChoix2 = $NumChoix2 + 1;
        															 
        														}
                                                                
   																	
   																	?>
																</select>

		 <label> Chambre :  </label></li>   <select  class="selectBase" name="choix3"  id="ChoixCha" onchange="RegistreOnchage()">

                                                                <option value=""> Sélectionner? </option>

        														<?php
 

        														while ($donnees = $reponseB->fetch()) {


        															 echo '<option value=\'' . $donnees['Chambre'] . '\'>' . $donnees['Chambre']  . '</option>';
        															 
        														}
   																	
   																	?>
																</select> <input class="buttonBase" type="submit" value="Rechercher" /><br><br>

          <h3>Resultat des recherche de par non et prénom : </h3>

        <?php if(isset($_SESSION['Erreur'])) {echo '<font color="red">'.$_SESSION['Erreur']."</font>";}?>  

                                                             

         </form>

         <table>
            <p><?php echo '<tr align="center">'; while ($donnes = $reqsearchA->fetch()) { $idAplique++; echo '<td>'; echo $donnes['Name_Surname']; echo '</td>'; echo '<td>'; echo $donnes['UserName']; echo '</td>'; echo '<td>'; echo $donnes['Chambre']; echo '</td> <td align="right" >'; echo '<button id="ChoiceID'; echo $idAplique; echo'" name="ChoiceID'; echo $idAplique; echo'" onclick="AutoPain(';?> '<?php echo $donnes['Name_Surname'];?>','<?php echo $donnes['UserName'];?>', <?php echo $donnes['Chambre'];?>, <?php echo $donnes['Securiter']; echo')">envoyer</button></td></tr> ';} ?>  
            
                <?php echo '<tr align="center">'; while ($donnes = $reqsearchB->fetch()) { $idAplique++; echo '<td>'; echo $donnes['Name_Surname']; echo '</td>'; echo '<td>'; echo $donnes['UserName']; echo '</td>'; echo '<td>'; echo $donnes['Chambre']; echo '</td> <td align="right" >'; echo '<button id="ChoiceID'; echo $idAplique; echo'" name="ChoiceID'; echo $idAplique; echo'" onclick="AutoPain(';?> '<?php echo $donnes['Name_Surname'];?>','<?php echo $donnes['UserName'];?>', <?php echo $donnes['Chambre'];?>, <?php echo $donnes['Securiter']; echo')">envoyer</button></td></tr> ';} ?>

                <?php echo '<tr align="center">'; while ($donnes = $reqsearchC->fetch()) { $idAplique++; echo '<td>'; echo $donnes['Name_Surname']; echo '</td>'; echo '<td>'; echo $donnes['UserName']; echo '</td>'; echo '<td>'; echo $donnes['Chambre']; echo '</td> <td align="right" >'; echo '<button id="ChoiceID'; echo $idAplique; echo'" name="ChoiceID'; echo $idAplique; echo'" onclick="AutoPain(';?> '<?php echo $donnes['Name_Surname'];?>','<?php echo $donnes['UserName'];?>', <?php echo $donnes['Chambre'];?>, <?php echo $donnes['Securiter']; echo')">envoyer</button></td></tr> ';} ?>
                                                               
            
            </p> 
        </table><br>
<table>
<form action="ModifCompte.php" method="post">
    <tr>
        <td align="right">
            Nom et prénom : 
        </td> 
        <td align="right">
                <input class="texteBase" type="text" name="NName" value="<?php if(isset($_GET['D1'])) { echo $_GET['D1']; }?>"/> 
        </td>
        <td align="right">
                <a>Changer en : </a>
        </td>
        <td align="right">
                <input class="texteBase" type="text" name="NNameV" value="<?php if(isset($_GET['D1'])) { echo $_GET['D1']; }?>"/>
        </td>
    </tr>
    <tr>
        <td align="right"><a>Pseudo : </a>
        </td>
        <td align="right">
             <input class="texteBase" type="text" name="NPseudo" value="<?php if(isset($_GET['D2'])) { echo $_GET['D2']; }?>"/> 
        </td>
        <td align="right">
             <a>Changer en : </a>
        </td>
        <td align="right">
             <input class="texteBase" type="text" name="NPseudoV" value="<?php if(isset($_GET['D2'])) { echo $_GET['D2']; }?>"/>
         </td>
    </tr>
    <tr>
        <td align="right">
            <a>mot de passe : </a>
        </td>
        <td align="right">
            <input class="texteBase" type="text" name="NPassV" />
        </td>
    </tr>
    <tr>
        <td align="right">
            <a>Confirmer le mot de passe : </a>
        </td>
        <td align="left">
            <input class="texteBase" type="text" name="NVerifPassV" />
        </td>
    </tr>
    <tr>
        <td align="right">
                <a>Chambre :        </a>
        </td>
        <td align="right">
                <input class="texteBase" type="text" name="NChambr" value="<?php if(isset($_GET['D3'])) { echo $_GET['D3']; }?>" />
        </td>
        <td align="right">
                <a>Changer en : </a>
        </td>
        <td align="right">
                <input class="texteBase" type="text" name="NChambrV" value="<?php if(isset($_GET['D3'])) { echo $_GET['D3']; }?>" />
        </td>
     </tr>

     <tr><td><td><br>
        <select class="selectBase" id="Secu" name="Securiter">
                <option value="1">Utilisateur</option>
                <option value="2">Modérateur</option>
                <option value="3">Administrateur</option>
        </select><br><br>

    </td></td></tr>

    <tr><td align="center"><td><td>
        <input class="buttonBase" type="submit" value="Condirmer" />
    </td></td></td>
    </tr>

</table>
</div>
</form>
   


<br/>
 
<?php
        if( !empty($_POST['secteur']) )
        {
 
                        echo "Vous avez choisi <b>".$_POST['secteur']."</b>";
 
        }
?>


<script type="text/javascript">


    function valeurToTen(){

        var testChoix = document.getElementById('choixName');
        var testChoix2 = document.getElementById('choixUsName');
        var testChoix3 = document.getElementById('ChoixCha');



        <?php 

            if (empty($_GET['US'])) {
           echo    'testChoix.selectedIndex="0";';
            } else {
             echo  'testChoix.selectedIndex= \''; echo $_GET['US']; echo '\';';
            }

        ?>

        <?php 

        if (empty($_GET['PS'])) {
           echo    'testChoix2.selectedIndex="0";';
            } else {
             echo  'testChoix2.selectedIndex= \''; echo $_GET['PS']; echo '\' ;';
            }

        ?>

        <?php
        if (empty($_GET['CH'])) {
           echo    'testChoix3.selectedIndex="0";';
            } else {
             echo  'testChoix3.selectedIndex= \''; echo $_GET['CH']; echo '\' ;';
            }
        ?>

        <?php
        if (empty($_GET['sec'])) {
           echo    'Secu.selectedIndex="0";';
            } else {
             echo  'Secu.selectedIndex= \''; echo $_GET['sec'] -1 ; echo '\' ;';
            }
        ?>


    }

    function AutoPain(U,P,C,TypeUser) {

        var US = "<?php if(isset($_GET['US'])) { echo $_GET['US']; }?>";
        var PS = "<?php if(isset($_GET['PS'])) { echo $_GET['PS']; }?>";
        var CH = "<?php if(isset($_GET['CH'])) { echo $_GET['CH']; }?>";
        var T1 = "<?php if(isset($_GET['T1'])) { echo $_GET['T1']; }?>";
        var T2 = "<?php if(isset($_GET['T2'])) { echo $_GET['T2']; }?>";
        var T3 = "<?php if(isset($_GET['T3'])) { echo $_GET['T3']; }?>";

        window.location  = "?US=" + US + "&PS=" + PS +"&CH=" + CH + "&T1=" + T1 + "&T2=" + T2 +"&T3=" + T3 + "&D1=" + U + "&D2=" + P + "&D3=" + C + "&sec=" + TypeUser;

    }

   
    <?php if (!empty($_SESSION['ValideModif'])) {$_SESSION['ValideModif'] = null; echo 'window.onload = function () { alert("Information modifier avec succer")}'; }?>


<?php } else {

echo "Vous n'avez pas l'autoriqtion d'aller ici votre compte sera signaler";

}?>
</script>



</body>
</html>

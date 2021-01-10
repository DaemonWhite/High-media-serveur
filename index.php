<?php 

$moveUrl = "/home";

include("Com/Conexion.php");
include("lang/FR.php"); ?>

<!DOCTYPE html>
<html lang="fr-FR">
    <head>
        <meta charset="utf-8" />
        <title>HighMediaServeur - connexion</title>
        <link rel="stylesheet" href="Res/style.css" />
    </head>

    <header>
       
    </header>


    <body class="BackgroundA" >

        <?php
        

        if   (isset($_COOKIE["Welcome"]))  // Si les cookie son présent
        {

            $Welcome =1;
             
            if (!empty($_COOKIE['Pseudo'])) {

                

                if (isset($_COOKIE['ID'])) {

                    

                    $reqip = $bdd->prepare("SELECT * FROM membre WHERE UserName = ?");
                    $reqip->execute(array($_COOKIE['Pseudo']));
                    $Userip = $reqip->fetch();

                    if (($_COOKIE['ID'] == $Userip['ID_user'])) {

                        if ($Userip['IP1'] == $_SERVER['REMOTE_ADDR']) {

                            $_SESSION['ID'] = $_COOKIE['ID'];
                            $_SESSION['Pseudo'] = $_COOKIE['Pseudo'] ;
                            $_SESSION['Securiter'] = $_COOKIE['Securiter'];
                           header("Location: " . $moveUrl);
    
                        } elseif ($Userip['IP2'] == $_SERVER['REMOTE_ADDR']) {

                            $_SESSION['ID'] = $_COOKIE['ID'];
                            $_SESSION['Pseudo'] = $_COOKIE['Pseudo'] ;
                            $_SESSION['Securiter'] = $_COOKIE['Securiter'];
    
                           header("Location: " . $moveUrl);
                                # code...
                        } else { $erreur = $_Lang_Con_ErrR;}

                    } else {$erreur = $_Lang_Con_ErrD;}
                    # code...
                } else {$erreur = $_Lang_Con_ErrI;}
                # code...
            } 

        }

       

 // On écrit un cookie



    ?>

<SECTION id="CDU" class="modal-back" style="display: none;" >
    
    <div class="modal-bloc" style=" font-size: 2.5vh; color: white;">

        <?php echo $_Lang_Con_Regl;?>
        
    </div>

</SECTION>

<SECTION id="HGMiD" class="modal-back" style="display: ;" >
    
    <div class="modal-bloc" style="font-size: 2.5vh; color: white;">

        <?php echo $_Lang_Con_Pres; ?>

        
    </div>

</SECTION>

<section id="createCompt" class="modal-back" style="display: none;">

    <div class="modal-bloc" style="font-size: 2.5vh; color: white;">

        <div style='text-align: center; align-items: center;'>

            <h2 style="margin-bottom: 10%;">Creer un compte</h2>

            <div id="erreurCreate" style="color: red;"></div>

            <table style="margin: auto; text-align: left;"><tr><td>
                <?php echo $_Lang_Cre_pren;?></td><td><input type="text" id="userCreate" name="userCreate" placeholder="<?php echo $_Lang_Cre_pren; ?>" class="texteBase"></td></tr>
                <tr><td><?php echo $_Lang_Con_Pseu; ?>: </td><td><input type="text" id="PseudCreate" name="PseudCreate" placeholder="<?php echo $_Lang_Con_Pseu ?>" class="texteBase"></td></tr>
                <tr><td><?php echo $_Lang_Con_Pass; ?>:</td><td> <input type="password" id="PassCreate" name="PassCreate" placeholder="<?php echo $_Lang_Con_Pass ?>" class="texteBase"></td></tr>
                <tr><td><?php echo $_Lang_Cre_Conf?></td><td><input type="password" id="PassConfirm" name="PassConfirm" placeholder="<?php echo $_Lang_Con_Pass ?>" class="texteBase"></td></tr>
                <tr><td><?php echo $_Lang_Cre_Cham ?>;</td><td><input type="number" name="Chambre" id="Chambre" placeholder="<?php echo $_Lang_Cre_Cham ?>;" class="texteBase"></td></tr>
                <tr style="padding-top: 10%;"><td><input type="button" name="anulConexion" value="<?php echo $_Lang_Cre_Reto;?>" class="buttonBase" onclick="viewCompte('1')"></td>
                    <td><input type="button" name="createConexion" value="<?php echo $_Lang_Cre_Envo;?>" class="buttonBase" onclick="createCompte()"></td></tr>
            </table><br>
            
        </div>

    </div>
    
</section>

<section class="nodyCont" style="background-image: url('img/LogoBack.png'); background-position: center; background-repeat: no-repeat; background-size: contain; ">
    
    <div class="Conteneur">
        <div align="center" class="CupeInfo">
             <p class="colorTitle"><?php echo $_Lang_Con_Well; ?></p>
        
             <?php if(isset($erreur)) {echo '<font color="red">'.$erreur."</font>";}?>
        
            <form action="" method="post">
            <table><tr><td>
                <?php echo $_Lang_Con_Pseu; ?>: </td><td><input type="text" name="PseudConnect" placeholder="<?php echo $_Lang_Con_Pseu ?>" class="texteBase"></td></tr>
                <tr><td><?php echo $_Lang_Con_Pass; ?>:</td><td> <input type="password" name="PassConnect" placeholder="<?php echo $_Lang_Con_Pass ?>" class="texteBase"></td></tr><tr></tr>
        
                <tr><td><input type="checkbox" id="SaveMe" name="SaveMe" checked>
                <label for="SaveMe"><?php echo $_Lang_Con_Souv; ?></label></td></tr>
                </table><br>
                <input type="button" name="demConexion" value="creer un compte" class="buttonBase" onclick="viewCompte('0')">
                <input type="submit" name="DemandeConexion" value="<?php echo $_Lang_Gen_Conex; ?>" class="buttonBase">
                
        
            </form><br>
        
            <ul>
                <li><a href="?invite=1" class="SelectionBase"><S></S>Se connecter en temps qu'invité</a></li>
            </ul>
            <!-- Le pied de page -->
            
                
        </div>
    </div>

</section>

<script type="text/javascript">

    function viewCompte(is)
    {

        var aff = document.getElementById('createCompt')
        

        if (is == 0) 
        {
            aff.style.display = "";

        } else {

            aff.style.display = "none";
        }

    }

    function createCompte()
    {

        var erreur = document.getElementById("erreurCreate");

       var oData = new FormData();
       var user = document.getElementById("userCreate").value;
       var pseud = document.getElementById("PseudCreate").value
       var passA = document.getElementById("PassCreate").value
       var passB = document.getElementById("PassConfirm").value
       var Chamb = document.getElementById("Chambre").value

       
       oData.append("Pseudo",  user)
       oData.append("Pass",  passA)
       oData.append("Name",  pseud)
       oData.append("Chambr", Chamb)
       oData.append("VerifPass",  passB)

    
       vef = new XMLHttpRequest();
      
       if (passA === passB) 
       {
        vef.open("POST", "Com/createCompte.php", true);
        vef.onload = function(oEvent) {
            if (vef.readyState == 4 && (vef.status == 200 || vef.status == 0)) {
              
              erreur.innerHTML = vef.responseText;
              
        
            } else {
        
            }
          };
       } else {

         erreur.innerHTML = "Impossible de joindre le serveur"

       }
      
       vef.send(oData);
    }
    
    function nextStape(val)
    {
        var pnext = "CDU";
        var pndis = "HGMiD"

        if (val == 1)
         {
            pnext = "HGMiD"
            pndis = "CDU"
         }

         //console.log(pnext)

         var aff = document.getElementById(pnext)
         var nff = document.getElementById(pndis)

         nff.style.display = "none"

         if (val != 2) {

            aff.style.display = ""

         } else {

            aff.style.display = "none"

         }


    }

    <?php 

    if (!empty($Welcome)) { ?>

    var aff = document.getElementById("CDU")
    var nff = document.getElementById("HGMiD")

    aff.style.display = "none"
    nff.style.display = "none"

    <?php

    }

    ?>

</script>



        
    </body>
</html>
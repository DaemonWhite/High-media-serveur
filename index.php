<?php 

$moveUrl = "global.php";

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

        echo $Dmode;
       

        

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
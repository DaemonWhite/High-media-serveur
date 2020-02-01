<?php 

$moveUrl = "global.php";

include("Com/Conexion.php");
include("lang/fr.php"); ?>

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
                        } else { $erreur = "connexion refuser, la conexion automatique n'acsepte que deux appareille simultanément";}

                    } else {$erreur = "information de la base de donner modifier";}
                    # code...
                } else {$erreur = "Impossible de trouver votre compte";}
                # code...
            } 

        }

       

 // On écrit un cookie



    ?>

<SECTION id="CDU" class="modal-back" style="display: none;" >
    
    <div class="modal-bloc" style=" font-size: 2.5vh; color: white;">

        <div style="text-align: center; align-items: center;">
        
            <h1 style="color: #54C472;">Condition d'utilisation</h1>

            <img src="img/LogoBack.png" style="width: 25%; height: 25%;">

            <div style="text-align: left; margin-left: 5%; margin-right: 5%; margin-bottom: 7%;">

                - Pas poster de porno <br>
                - Resppect des gout et de la vie des autres <br>
                - Interdit d'utiliser le compte d'un autre <br>
                - Les information pour l'inscription doive êtres vraix (en cas de falcification vous serrez pénaliser) <br>
                - Si vous-voyer un bug signaler le nous <br>
                - Si vous-vouler de novelle fonctionaliter dite le nous <br>

                - Amusez vous bien <br> <br>

                <span style="color: red;">Attention "j'accepte" ne sera pris en compte que lors de la connexion aux site si vous avez un compte!!!<br><br>
                - Nous ne garentison pas le fonctionement du serveur pour les appareilles Apple <br>
                - Les navigateur fierfox ont des léger probléme daffichange<br>
                - Les spmartphone (ou tout appareille utilisant un affichage mobile) Auront des probléme pour l'affichage de certaine page nous vous recomondont d'activer la version ordinateur et de l'utiliser au format paysage j'usqua on est fini de déveloper l'édition mobile merci de votre compréention</span>

                <div style="display: flex; justify-content: space-between; align-items: right; margin-top: 5%; padding-right: 10%; padding-left: 10%;">
                    <button class="buttonNew" onclick="nextStape('1')">Retour</button>
                    <button class="buttonNew" onclick="nextStape('2')">J'accepte</button>
                </div>
                
            </div>

        </div>
        
    </div>

</SECTION>

<SECTION id="HGMiD" class="modal-back" style="display: ;" >
    
    <div class="modal-bloc" style="font-size: 2.5vh; color: white;">

        <div style="text-align: center; align-items: center;">
        
            <h1 style="color: #54C472;">Bienvenue dans High Media Serveur</h1>

            <img src="img/LogoBack.png" style="width: 25%; height: 25%;">

            <div style="text-align: left; margin-left: 5%; margin-right: 5%; margin-bottom: 7%;">

                <h2 style="color: #54C472;">C'est quoi "High media serveur" ?</h2>

                C'est un site héberger en <span style="color: #54C472;">Local*</span> qui a pour objective de vous donnez accès à un du streaming vidéo et audio.<br> <span style="color: #54C472">(</span>Attention locale qu'il et héberger sur un ordinateur connecter au résau en Gros pas <span style="color: #54C472">"D'INTERNET")</span>

                <h2 style="color: #54C472">Il y'à quoi comme Video ou Musique ?</h2>

                Le contenu du serveur c’est à vous de l’alimenter en mettant en ligne des vidéos ou des musiques.<br>
                <span style="color: #54C472">La seule limite c’est vous!!!</span>
                
                <h2 style="color: #54C472;">Comment puis-je mettre en ligne une vidéo?</h2>
                
                Pour cela il te faut un <span style="color: #54C472;">compte</span>. Pour créer ton compte il faut que tu vienne nous voire ou remplir le dossier d’inscription (Attention le dossier d’inscription ne crée pas le compte) <span style="color: ">Non disponible</span>
                
                <h2 style="color: #54C472">il peux héberger des serveur pour les juex</h2>

                Bien sur il peut héberger des serveurs pour les jeux ou de cloud locale <span> Non disponible </span>
                
                <div style="display: flex; justify-content: flex-end; align-items: right; margin-top: 5%; padding-right: 10%;">
                    <button class="buttonNew" onclick="nextStape('0')">Suivant</button>
                </div>

            </div>

        </div>

        
    </div>

</SECTION>

<section class="nodyCont" style="background-image: url('img/LogoBack.png'); background-position: center; background-repeat: no-repeat; background-size: contain; ">
    
    <div class="Conteneur">
        <div align="center" class="CupeInfo">
             <p class="colorTitle">Bienvenue sur High Media Serveur </p>
        
             <?php if(isset($erreur)) {echo '<font color="red">'.$erreur."</font>";}?>
        
            <form action="" method="post">
            <table><tr><td>
                Pseudo: </td><td><input type="text" name="PseudConnect" placeholder="pseudo" class="texteBase"></td></tr>
                <tr><td>Mot de passe:</td><td> <input type="password" name="PassConnect" placeholder="Mot de passe" class="texteBase"></td></tr><tr></tr>
        
                <tr><td><input type="checkbox" id="SaveMe" name="SaveMe" checked>
                <label for="SaveMe">Se souvenir de moi</label></td></tr>
                </table><br>
                <input type="submit" name="DemandeConexion" value="Connexion" class="buttonBase">
                
        
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
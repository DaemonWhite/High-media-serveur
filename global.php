<?php

$moveUrl = "global.php";

include("Com/Conexion.php");

include("Com/verifiLoad.php");

?>
<!DOCTYPE html>
<html>
    <head>
        <title>HighMediaServeur</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="Res/style.css" />
    </head>

    <header>
       
    </header>

<script type="text/javascript">
    
    function ChangePAGE(Type)
    {
        if (Type === "Video") 
        {
            window.location = "Video.php";
        }
        if (Type === "Audio") 
        {

        } 
        if (Type === "Perso") 
        {

        } 
        if (Type === "Serv") 
        {

        } 
        if (Type === "Propo") 
        {

        } 
    }

</script>
    


    <body class="BackgroundA">

        <nav id="menu">
                
                    
                    <div>
                        <button class="linkSelect">Acueil</button>
                        <button class="linkSelect" onclick="ChangePAGE('Video')">Video</button>
                        <button class="linkSelect" onclick="ChangePAGE('Audio')">Audio</button>
                        <button class="linkSelect" onclick="ChangePAGE('Perso')">Espace personnelle</button>
                        <button class="linkSelect" onclick="ChangePAGE('Serv')">Serveur</button>
                        <button class="linkSelect" onclick="ChangePAGE('Propo')">Proposition</button>

                    </div>

                    <div class="separationA">

                        <span class="infoUser"><?php echo $typeUser; ?></span>

                        <div class="imageUser">
                            <img src="User/Default/User.jpg" class="image">
                        </div>

                        <span class="UserName"><?php echo $Pseudo ?></span>
                        <?php if ($_SESSION['Securiter'] != "-1") {
                            # code...
                        ?>
                        <form action="?Deco=1" method="post">
                            <input name="Deco" id="Deco" type="submit" value="Deconecter" class="bottomDisconect" />
                        </form>
                         <?php } else { ?>
                
                            <button name="Co" id="Res/popup.php#Conex" class="bottomConnect">Conexion</button>

                        <?php } ?>

                    </div>

                    <div class="separationB">

                        <button class="bottomMenu" id="Res/popup.php#">Dossier</button>
                        <button class="bottomMenu" id="Res/popup.php#">Favori</button>
                        <button class="bottomMenu" id="Res/popup.php#">Suprimer</button>
                        <button class="bottomMenu" id="Res/popup.php#">Télècharger</button>
                        <button class="bottomMenu" id="Res/popup.php#Upload">Uploade</button>

                    </div>
            
        </nav>

        <script src="Res/scriptModal.js"></script>

   <!-- ?php include("Com/main.php"); ?> -->
    
    <!-- Le pied de page -->
    
    <!-- <footer id="pied_de_page">
        <p>Copyright moi, tous droits réservés</p>
    </footer> -->
        
    </body>
</html>
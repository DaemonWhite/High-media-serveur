<?php

$moveUrl = "global.php";

include("Com/Conexion.php");

include("Com/verifiLoad.php");

$img = new pdo('mysql:host=localhost;dbname=highmediadata', 'root','',   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$ImageUs = $img->query('SELECT ID, image FROM user WHERE ID=\'' . $_SESSION['ID'] . '\'');
$Rimage = $ImageUs->fetch();

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
            NonDisponible()
        } 
        if (Type === "Perso") 
        {
            NonDisponible()
        } 
        if (Type === "Serv") 
        {
            NonDisponible()
        } 
        if (Type === "Propo") 
        {
            NonDisponible()
        }
        if (Type === "user") 
        {
            window.location = "user.php";
        } 
    }

</script>
    


    <body class="BackgroundA">

        <nav id="menu">
                
                    
                    <div>
                        <button class="linkSelect" id="LinkDebutPassif">Accueil</button>
                        <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Video')">Video</button>
                        <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Audio')">Audio</button>
                        <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Perso')">Espace personnelle</button>
                        <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Serv')">Serveur</button>
                        <button class="linkSelect" id="LinkDown" onclick="ChangePAGE('Propo')">Proposition</button>

                    </div>

                    <div class="separationA">

                        <span class="infoUser"><?php echo $typeUser; ?></span>

                        <div class="imageUser">
                            <?php if ($_SESSION['Securiter'] >= 1) { ?>
                                <img src="<?php echo $Rimage['image'];?>" class="image" onclick="ChangePAGE('user')" >
                            <?php } else { ?>
                                <img src="User/Default/User.png" class="image">
                            <?php } ?>
                        </div>

                        <span class="UserName"><?php echo $Pseudo ?></span>
                        <?php if ($_SESSION['Securiter'] != "-1") {
                            # code...
                        ?>
                        <form action="?Deco=1" method="post">
                            <input name="Deco" id="Deco" type="submit" value="Deconecter" class="bottomDisconect" />
                        </form>
                         <?php } else { ?>
                        <div>
                            <button name="Co" id="Res/popup.php#Conex" class="bottomConnect">Conexion</button>
                        </div>

                        <?php } ?>

                    </div>

                    <div class="separationB">

                        <button class="bottomMenu" id="Res/popup.php#">Dossier</button>
                        <button class="bottomMenu" id="Res/popup.php#">Favori</button>
                        <button class="bottomMenu" id="Res/popup.php#">Suprimer</button>
                        <button class="bottomMenu" id="Res/popup.php#">Télècharger</button>
                        <?php if ($_SESSION['Securiter'] >= 1) { ?>
                        <button class="bottomMenu" id="#Upload">Uploade</button>
                        <?php } else { ?>
                          <button class="bottomMenu" id="" onclick="Reserver()">Uploade</button>
                        <?php } ?>

                    </div>
            
        </nav>

        <?php if ($_SESSION['Securiter'] >= 1 ) { include("Res/popUpload.php"); } ?>

        <script type="text/javascript">
            <?php include("Res/scriptModal.php"); ?>
        </script>

   <!-- ?php include("Com/main.php"); ?> -->
    
    <!-- Le pied de page -->
    
    <!-- <footer id="pied_de_page">
        <p>Copyright moi, tous droits réservés</p>
    </footer> -->
        
    </body>
</html>
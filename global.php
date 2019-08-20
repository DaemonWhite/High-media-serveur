<?php

session_start();

if (!empty($_GET['Deco'])) {

    session_destroy();
    setcookie("ID");
    setcookie("Pseudo");
    setcookie("Securiter");
    setcookie("IP");

    echo "cookie suprimer";

    session_start();

    $_SESSION['Pseudo'] = "Anonyme";
    $_SESSION['ID'] = "-1";
    $_SESSION['Securiter'] = "-1";

    echo "Deco";

    header('Location: global.php');
}

if (empty($_SESSION['ID']) OR empty($_SESSION['Pseudo'] OR empty($_SESSION['Securiter']))) {

    echo "vide";

    if (empty($_COOKIE['ID']) OR empty($_COOKIE['Pseudo']) OR empty($_COOKIE['Securiter'])) {
        echo "vide2";
        header('Location: index.php');

    } else {
            $_SESSION['ID'] = $_COOKIE['ID'];
            $_SESSION['Pseudo'] = $_COOKIE['Pseudo'];
            $_SESSION['Securiter'] = $_COOKIE['Securiter'];
        }
    } 



    if ($_SESSION['Securiter'] == 1) {

        $typeUser = "Utilisateur";
        # code...
    } elseif ($_SESSION['Securiter'] == 2) {

        $typeUser = "Modérateur";
        # code...
    } elseif ($_SESSION['Securiter'] == 3) {

        $typeUser = "Administrateur";
        # code...
    } elseif ($_SESSION['Securiter'] === "-1") {

        $typeUser = "Inviter";
        $_SESSION['Pseudo'] = "Anonyme";

    }
    $Pseudo = $_SESSION['Pseudo'];

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
                        <button class="linkSelect">Acueille</button>
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
                        <form action="?Deco=1" method="post">
                            <input name="Deco" id="Deco" type="submit" value="Deconecter" class="bottomDisconect" />
                        </form>

                    </div>

                    <div class="separationB">

                        <button class="bottomMenu">Dossier</button>
                        <button class="bottomMenu">Favori</button>
                        <button class="bottomMenu">Suprimer</button>
                        <button class="bottomMenu">Télècharger</button>
                        <button class="bottomMenu">Upload</button>

                    </div>
                    
                    
                    
                    

            
        </nav>

    
   <!-- ?php include("Com/main.php"); ?> -->
    
    <!-- Le pied de page -->
    
    <!-- <footer id="pied_de_page">
        <p>Copyright moi, tous droits réservés</p>
    </footer> -->
        
    </body>
</html>
<?php

session_start();

if (!empty($_GET['Deco'])) {

    session_destroy();
    setcookie("ID");
    setcookie("Pseudo");
    setcookie("Securiter");
    setcookie("IP");

    echo "cookie suprimer";

}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>HighMediaServeur</title>
        <meta charset="utf-8" />
    </head>

    <header>
       
    </header>


<script type="text/javascript">
    
    document.getElementById('mon-lien').addEventListener('click', function(){
    document.getElementById('mon-layer').style.display = "block";
});

</script>
    


    <body>
<LAYER BGCOLOR="#0000ff" > 


           <nav id="menu">        
                <div class="element_menu">
                    <h3>Titre menu</h3>
                    <ul>
                        <li><a href="jeux_video.php">Jeux Video</a></li>
                        <li><a onclick="window.open('Upload.php', 'exemple', 'height=200, width=400, top=100, left=100,' 'toolbar=no, menubar=no, location=no, resizable=yes, scrollbars=no, status=no');" >Upload</a></li>
                        <li><a href="page3.html">Lien</a></li>
                        <form action="admin.php" method="post">
                            <p>
                                <input type="password" name="mot_de_pass">
                                <input type="submit" value="confirmer">

                            </p>

                            <li><?php echo $_SESSION['Pseudo']; ?></li>
                        </form>
                    </ul>
                </div>    
            </nav>

<form action="Com/TestNewPassWord.php?" method="post">
        <input type="submit" value="Créer un compte" /><br><br>
</form>
    
<form action="?Deco=1" method="post">
        <input name="Deco" id="Deco" type="submit" value="SeDeconecter" /><br><br>
</form>
    <!-- Le corps -->
    
   <?php include("Com/main.php"); ?>

   <?php
    // 1 : on ouvre le fichier
    $monfichier = fopen('base.txt', 'r+');
     
    // 2 : on lit la première ligne du fichier
    $ligne = fgets($monfichier);
     
    // 3 : quand on a fini de l'utiliser, on ferme le fichier
    fclose($monfichier);
    ?>
    
    <!-- Le pied de page -->
    
    <footer id="pied_de_page">
        <p>Copyright moi, tous droits réservés</p>
    </footer>


</LAYER>
        
    </body>
</html>
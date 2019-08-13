<!DOCTYPE html>
<html>
    <head>
        <title>HighMediaServeur</title>
        <meta charset="utf-8" />
    </head>

    <header>
       
    </header>

    


    <body>



           <nav id="menu">        
                <div class="element_menu">
                    <h3>Titre menu</h3>
                    <ul>
                        <li><a href="jeux_video.php">Jeux Video</a></li>
                        <li><a href="page2.html">Lien</a></li>
                        <li><a href="page3.html">Lien</a></li>
                        <form action="admin.php" method="post">
                            <p>
                                <input type="password" name="mot_de_pass">
                                <input type="submit" value="confirmer">

                            </p>
                        </form>
                    </ul>
                </div>    
            </nav>

    
    <!-- Le corps -->
    
   <?php include("Com/main.php"); ?>

   <?php echo $_COOKIE['Welcome']; ?>

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



        
    </body>
</html>
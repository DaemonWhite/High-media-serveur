<!DOCTYPE html>
<html>
    <head>
        <title>HighMediaServeur - connexion</title>
        <meta charset="utf-8" />
    </head>

    <header>
       
    </header>

    


    <body>

        <?php


        $ip_Visiteur = $_SERVER['REMOTE_ADDR'];

        

        if   (isset($_COOKIE["Welcome"]))  // Si le mot de passe est bon
        {
            header('Location: global.php');
        }

        else
        {
            echo '<script type="text/javascript">

              window.onload = function () { alert("Bienvenue sur high media serveur"); }

            </script>';
        }

       // setcookie('Welcome', $ip_Visiteur, time() + 365*24*3600, null, null, false, true);

 // On écrit un cookie



    ?>
    <form action="Com/TestNewPassWord.php" method="post">
        <a>Nom et prenom :  </a></li>   <input type="text" name="Name" /><br><br>
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


    <li><a href="Global.php">Connexion</a></li>

    <!-- Le pied de page -->
    
    <footer id="pied_de_page">
        <p>Copyright moi, tous droits réservés</p>
    </footer>



        
    </body>
</html>
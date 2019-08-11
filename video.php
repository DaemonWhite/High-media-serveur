<!DOCTYPE html>
<html>
    <head>
        <title>Video</title>
        <meta charset="utf-8" />
    </head>

    <header>
       
    </header>


    <body>

        <a href="index.php">Back</a>
        <p></p>

        <?php

        if (isset($_GET['prenom']) AND isset($_GET['nom'])) // On a le nom et le prénom
        {
            echo 'Bonjour ' . $_GET['prenom'] . ' ' . $_GET['nom'] . ' !';
        }
        else // Il manque des paramètres, on avertit le visiteur
        {
            echo 'Il faut renseigner un nom et un prénom !';
        }
        ?>

        <p>Bonjour !</p>

        <p>Je sais comment tu t'appelles, hé hé. Tu t'appelles <?php echo $_POST['Pseudo']; ?> !</p>
    
        <p>Si tu veux changer de prénom, <a href="index.php">clique ici</a> pour revenir à la page formulaire.php.</p>

        <footer id="pied_de_page">
            <p>Copyright moi, tous droits réservés</p>
        </footer>

        
    </body>
</html>
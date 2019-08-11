<!DOCTYPE html>
<html>
    <head>
        <title>HighMediaServeur</title>
        <meta charset="utf-8" />
    </head>

    <header>
       
    </header>


    <body>

        <a href="index.php">Back</a>

        <?php
        if (isset($_POST['mot_de_pass']) AND $_POST['mot_de_pass'] ==  "PipiPopo") // Si le mot de passe est bon
        {
        $pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);

        // Insertion
        $req = $bdd->prepare('INSERT INTO membre(UserName, Name_Surname, Password, Chambre) VALUES(:UserName, :Name_Surname,:Password, :Chambre)');
        $req->execute(array(
            'UserName' => $pseudo,
            'Password' => $pass_hache,
            'Name_Surname' => $RealName
            'Chambre' => $UsChanmbre));
        ?>

           
        <h1>Voici les codes d'accès :</h1>
        <p><strong>CRD5-GTFT-CK65-JOPM-V29N-24G1-HH28-LLFV</strong></p>   
        
        <p>
        Cette page est réservée au personnel de la NASA. N'oubliez pas de la visiter régulièrement car les codes d'accès sont changés toutes les semaines.<br />
        La NASA vous remercie de votre visite.
        
        </p>
        
        <?php
         }
         else // Sinon, on affiche un message d'erreur
         {
             echo '<p>Mot de passe incorrect</p>';
         }
         ?>


    
    <footer id="pied_de_page">
        <p>Copyright moi, tous droits réservés</p>
    </footer>



        
    </body>
</html>
<?php 
session_start();

$ip_Visiteur = $_SERVER['REMOTE_ADDR'];

$bdd = new pdo('mysql:host=localhost;dbname=highmediadata', 'root','',   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

if (isset($_POST['DemandeConexion'])) {

    $PseudConnect = htmlspecialchars($_POST['PseudConnect']);

    if (!empty($PseudConnect)) {

        if (!empty($_POST['PassConnect'])) {

            $requser = $bdd->prepare("SELECT * FROM membre WHERE UserName = ?");
            $requser->execute(array($PseudConnect));
            $UserInfo = $requser->fetch();

            echo $UserInfo['ID_user'];

            

            if (password_verify($_POST['PassConnect'], $UserInfo['Password'])) {

                

                $_SESSION['ID'] = $UserInfo['ID_user'];
                $_SESSION['Pseudo'] = $UserInfo['UserName'] ;
                $_SESSION['Securiter'] = $UserInfo['Securiter'];

                if (!empty($_POST['SaveMe'])) {

                    if (($_SERVER['REMOTE_ADDR'] = $UserInfo['IP1']) OR ($_SERVER['REMOTE_ADDR'] = $UserInfo['IP2'])) {
    
                                header("Location: Global.php");
                        # code...
                    } else {

                        if ($UserInfo['Modif_IP'] == 0) {
    
                                $mod = 1;
                                  echo  $_SERVER['REMOTE_ADDR'];
                                $UpdateIp = $bdd->prepare('UPDATE membre SET IP1 = :ip, Modif_IP = :modif WHERE ID_user = :ID ');
                                $UpdateIp->execute(array(
                                    'ip' => $ip_Visiteur,
                                    'modif' => $mod,
                                    'ID' => $_SESSION['ID']
                                    ));

                                echo "Choix C";
    
                                header("Location: Global.php");


    
                            } else { 
    
                                $mod = 0;
    
                                $UpdateIp = $bdd->prepare('UPDATE membre SET IP2 = :IP2, Modif_IP = :modif WHERE ID_user = :ID ');
                                $UpdateIp->execute(array(
                                    'IP2' => $ip_Visiteur,
                                    'modif' => $mod,
                                    'ID' => $UserInfo['ID_user']
                                    ));  header("Location: Global.php");
                                    echo "Choix D"; 
                            }

                    }

                    setcookie('IP', $_SERVER['REMOTE_ADDR'], time() + 365*24*3600, null, null, false, true);

                    setcookie('ID', $UserInfo['ID_user'], time() + 365*24*3600, null, null, false, true);
                    setcookie('Pseudo', $UserInfo['UserName'], time() + 365*24*3600, null, null, false, true);
                    setcookie('Securiter', $UserInfo['Securiter'], time() + 365*24*3600, null, null, false, true);
                }
                # code...
            } else {$erreur = "Identifiant ou mot de passe incorecte";}
            # code...
        } else {$erreur = "Veulier mettre votre mot de passe";}
        # code...
    } else {$erreur = "Veulier entrer un nom d'utilisateur";}
    # code...
}

?>

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


       

        

        if   (isset($_COOKIE["Welcome"]))  // Si le mot de passe est bon
        {
             
            if (!empty($_COOKIE['Pseudo'])) {

                

                if (isset($_COOKIE['ID'])) {

                    

                    $reqip = $bdd->prepare("SELECT * FROM membre WHERE UserName = ?");
                    $reqip->execute(array($_COOKIE['Pseudo']));
                    $Userip = $reqip->fetch();

                    if (($_COOKIE['ID'] = $Userip['ID_user'])) {

                        if ($Userip['IP1'] == $_SERVER['REMOTE_ADDR']) {

                            $_SESSION['ID'] = $_COOKIE['ID'];
                            $_SESSION['Pseudo'] = $_COOKIE['Pseudo'] ;
                            $_SESSION['Securiter'] = $_COOKIE['Securiter'];
                           header('Location: global.php');
    
                        } elseif ($Userip['IP2'] == $_SERVER['REMOTE_ADDR']) {

                            $_SESSION['ID'] = $_COOKIE['ID'];
                            $_SESSION['Pseudo'] = $_COOKIE['Pseudo'] ;
                            $_SESSION['Securiter'] = $_COOKIE['Securiter'];
    
                           header('Location: global.php');
                                # code...
                        } else { $erreur = "connexion refuser, la conexion automatique n'acsepte que deux appareille simultanément";}

                    } else {$erreur = "information de la base de donner modifier";}
                    # code...
                }
                # code...
            }

        }


        else
        {
            echo '<script type="text/javascript">

              window.onload = function () { alert("Bienvenue sur high media serveur"); }

            </script>';
        }

       setcookie('Welcome', $ip_Visiteur, time() + 365*24*3600, null, null, false, true);

 // On écrit un cookie



    ?>

     <?php if(isset($erreur)) {echo '<font color="red">'.$erreur."</font>";}?>

    <form action="" method="post">

        <input type="text" name="PseudConnect" placeholder="pseudo">
        <input type="password" name="PassConnect" placeholder="Mot de passe">
        <input type="submit" name="DemandeConexion" value="Connexion">

        <input type="checkbox" id="SaveMe" name="SaveMe" checked>
        <label for="SaveMe">Se souvenir de moi</label><br><br>

    </form>


    <li><a href="Global.php">Connexion</a></li>

    <!-- Le pied de page -->
    
    <footer id="pied_de_page">
        <p>Copyright moi, tous droits réservés</p>
    </footer>



        
    </body>
</html>
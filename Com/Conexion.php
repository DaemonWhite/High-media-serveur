<?php 

include("lang/fr.php");


session_start();

if (!empty($_GET['invite'])) {
  
    $_SESSION['ID'] = "-1";
    $_SESSION['Pseudo'] = "Anonyme";
    $_SESSION['Securiter'] = "-1";

    header("Location: " . $moveUrl);

}

$ip_Visiteur = $_SERVER['REMOTE_ADDR'];
$vertion = "0.0.20";

$bdd = new pdo('mysql:host=localhost;dbname=highmediadata', 'root','',   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

if (isset($_POST['DemandeConexion'])) {

    $PseudConnect = htmlspecialchars($_POST['PseudConnect']);

    if (!empty($PseudConnect)) {

        if (!empty($_POST['PassConnect'])) {

            $requser = $bdd->prepare("SELECT * FROM membre WHERE UserName = ?");
            $requser->execute(array($PseudConnect));
            $UserInfo = $requser->fetch();

            $UserInfo['ID_user'];

            

            if (password_verify($_POST['PassConnect'], $UserInfo['Password'])) {

                

                $_SESSION['ID'] = $UserInfo['ID_user'];
                $_SESSION['Pseudo'] = $UserInfo['UserName'] ;
                $_SESSION['Securiter'] = $UserInfo['Securiter'];

                if (!empty($_POST['SaveMe'])) {

                    if (($_SERVER['REMOTE_ADDR'] == $UserInfo['IP1']) OR ($_SERVER['REMOTE_ADDR'] == $UserInfo['IP2'])) {
    
                                header("Location: " . $moveUrl);
                        # code...
                    } else {
                        if ($UserInfo['Modif_IP'] == 0) {
    
                                $mod = 1;
                                $_SERVER['REMOTE_ADDR'];
                                $UpdateIp = $bdd->prepare('UPDATE membre SET IP1 = :ip, Modif_IP = :modif WHERE ID_user = :ID ');
                                $UpdateIp->execute(array(
                                    'ip' => $ip_Visiteur,
                                    'modif' => $mod,
                                    'ID' => $_SESSION['ID']
                                    ));
    
                                header("Location: " . $moveUrl);
    
                            } else { 
    
                                $mod = 0;
    
                                $UpdateIp = $bdd->prepare('UPDATE membre SET IP2 = :IP2, Modif_IP = :modif WHERE ID_user = :ID ');
                                $UpdateIp->execute(array(
                                    'IP2' => $ip_Visiteur,
                                    'modif' => $mod,
                                    'ID' => $UserInfo['ID_user']
                                    ));  header("Location: " . $moveUrl);
                                    echo "Choix D"; 
                            }
                    }

                    setcookie('IP', $_SERVER['REMOTE_ADDR'], time() + 365*24*3600, null, null, false, true);

                    setcookie('ID', $UserInfo['ID_user'], time() + 365*24*3600, null, null, false, true);
                    setcookie('Pseudo', $UserInfo['UserName'], time() + 365*24*3600, null, null, false, true);
                    setcookie('Securiter', $UserInfo['Securiter'], time() + 365*24*3600, null, null, false, true);

                    setcookie('Welcome', $vertion, time() + 365*24*3600, null, null, false, true);
                }
                # code...
            } else {$erreur = $_Lang_Con_ErrR;}
            # code...
        } else {$erreur = $_Lang_Con_ErrD;}
        # code...
    } else {$erreur = $_Lang_Con_ErrI;}
    # code...
}

?>
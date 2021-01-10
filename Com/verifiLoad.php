<?php
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

    header('Location: /home');
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
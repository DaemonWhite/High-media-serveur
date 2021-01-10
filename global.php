<?php

$moveUrl = "/home";

include("Com/Conexion.php"); // Programe de connexion

include("Com/verifiLoad.php"); // Verification de la conexion rapide

include("Com/userSetings.php"); //Parametre utilisateur

include("lang/FR.php");  //Fichier de lang



$typeFavor = 1; // 1 = acueille;

$ImageUs = $bdd->query('SELECT ID, image FROM user WHERE ID=\'' . $_SESSION['ID'] . '\''); //Charge les image utilisateur
$Rimage = $ImageUs->fetch();


$NameVideo = $bdd->query("SELECT ID, titre, Episode, Saison FROM video ORDER BY ID DESC LIMIT 0, 10");
$NameAudio = $bdd->query("SELECT ID, album, Titre, Piste, Disk FROM audio ORDER BY ID DESC LIMIT 0, 10");

$His = $bdd->query('SELECT User_ID, Name, type, Episode, Saison FROM historique WHERE User_ID=\'' . $_SESSION['ID'] . '\' AND type="0" ORDER BY ID DESC LIMIT 0, 10');
$Fav = $bdd->query('SELECT User, Favori, Ep, S, type FROM favori WHERE User=\'' . $_SESSION['ID'] . '\' ORDER BY ID DESC LIMIT 0, 10');

?>
<!DOCTYPE html>
<html>
    <head>
        <title>HighMediaServeur</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="Res/style.css" />
        <link rel="stylesheet" href="Res/styleBox.css" />

    </head>

    <header>
       
    </header>

<script type="text/javascript" src="Res/scriptZone.js">
</script>
    
    

    <body class="BackgroundA">

        <?php echo $Dmode; ?> 
            
            <?php include('Com/mainMenu.php') ?>

            <section class="" style="width: 200vh; height: 100vh; overflow: auto;" >
                <div class="back" align="center" style="overflow: hidden;">
                    
                    <section class="Box">
                        <div class="BoxTitle"><span> <?php echo $_Lang_ACC_Nmus;?> </span></div>
                        
                        <div align="left" class="overFlaw">
                            <table class="listenBoxA">
                                <?php while ($Naudio = $NameAudio->fetch()) {

                                $Affiche = $bdd->query('SELECT nom, Affiche FROM titre WHERE nom=\'' . $Naudio['album'] . '\'');
                                $Aff = $Affiche->fetch() ?>
                                    <tr class="ChoiceV" onclick='appVideo(<?php echo '"'.$Naudio['Titre'].'", "'. $Naudio['Piste'] .'", "'. $Naudio['Disk'] .'"'; ?> )'>

                                        <td class="borderS"><img class="Aaffiche" src="<?php echo $Aff['Affiche']; ?>"></td>
                                        <td class="borderTi"><span><?php echo $Naudio['Titre'] . " - " . $Naudio['album']; ?></span></td>
                                        <td class="borderS">
                                            <span>Diske: <?php echo $Naudio['Disk']; ?></span><br>
                                            <span>Piste: <?php echo $Naudio['Piste']; ?></span>
                                            </td>

                                    </tr>
                                <?php } ?>
                            </table>
                        </div>

                        
                    </section>

                    <section class="Box">
                        <div class="BoxTitle"><span><?php echo $_Lang_Acc_Serv; ?></span></div>
                        
                    </section>

                    <section class="Box">
                        <div class="BoxTitle"><span> <?php echo $_Lang_Acc_Nvid; ?></span></div>

                        <div align="left" class="overFlaw">
                            <table class="listenBoxV">
                                <?php while ($Nvideo = $NameVideo->fetch()) {

                                $Affiche = $bdd->query('SELECT nom, Affiche FROM titre WHERE nom=\'' . $Nvideo['titre'] . '\'');
                                $Aff = $Affiche->fetch() ?>
                                    <tr class="ChoiceV" onclick='appVideo(<?php echo '"'.$Nvideo['titre'].'", "'. $Nvideo['Episode'] .'", "'. $Nvideo['Saison'] .'"'; ?> )'>

                                        <td class="borderS"><img class="Vaffiche" src="<?php echo $Aff['Affiche']; ?>"></td>
                                        <td class="borderTi"><span><?php echo $Nvideo['titre'] ; ?></span></td>
                                        <td class="borderS"><span>Ep: <?php echo $Nvideo['Episode']; ?></span><br>
                                            <span>S: <?php echo $Nvideo['Saison']; ?></span></td>

                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                        
                    </section>


                    <section class="Box">
                        <div class="BoxTitle"><span><?php echo $_Lang_Gen_Favoris; ?></span></div>

                        <div  align="left" class="overFlaw">
                                <table class="listenBoxV">
                                    <?php while ($Favo = $Fav->fetch()) {
            
                                        $FavoVideo = $bdd->query('SELECT titre, Episode, Saison FROM video WHERE  titre=\'' . $Favo['Favori'] . '\' AND Episode=\'' . $Favo['Ep'] . '\' AND Saison=\'' . $Favo['S'] . '\' ');
                                        $Nvideo = $FavoVideo->fetch();
        
                                        $Affiche = $bdd->query('SELECT nom, Affiche FROM titre WHERE nom=\'' . $Favo['Favori'] . '\'');
                                        $Aff = $Affiche->fetch(); ?>

                                            <?php if ($Favo['type'] == 1) { ?>
                                                <tr class="ChoiceV" onclick='appVideo(<?php echo '"'.$Nvideo['titre'].'", "'. $Nvideo['Episode'] .'", "'. $Nvideo['Saison'] .'"'; ?> )'>
            
                                                    <td class="borderS"><img class="Vaffiche" src="<?php echo $Aff['Affiche']; ?>"></td>
                                                    <td class="borderTi"><span><?php echo $Nvideo['titre'] ; ?></span></td>
                                                    <td><span>Ep: <?php echo $Nvideo['Episode']; ?></span><br>
                                                        <span>S: <?php echo $Nvideo['Saison']; ?></span></td>
            
                                                </tr>
                                            <?php } else { ?>

                                                <tr class="ChoiceV" onclick='appListVideo(<?php echo '"'.$Aff['nom'].'", "'. $Nvideo['Episode'] .'", "'. $Nvideo['Saison'] .'"'; ?> )'>
            
                                                    <td class="borderS"><img class="Vaffiche" src="<?php echo $Aff['Affiche']; ?>"></td>
                                                    <td class="tdTexte"><span><?php echo $Aff['nom'] ; ?></span></td>
                                                    <td></td>
            
                                                </tr>

                                            <?php } ?>
                                    <?php } ?>
                                </table>
                            </div>
                        
                    </section>

                    <section class="Box">
                        <div class="BoxTitle"><span><?php echo $_Lang_Acc_Info; ?></span></div>

                        
                    </section>
                    
                    
                    <section class="Box">
                        <div class="BoxTitle"><span>Historique</span></div>
                            <div  align="left" class="overFlaw">
                                <table class="listenBoxV">
                                    <?php while ($Histo = $His->fetch()) {
            
                                        $HistVideo = $bdd->query('SELECT titre, Episode, Saison FROM video WHERE  titre=\'' . $Histo['Name'] . '\' AND Episode=\'' . $Histo['Episode'] . '\' AND Saison=\'' . $Histo['Saison'] . '\' ');
                                        $Nvideo = $HistVideo->fetch();
        
                                        $Affiche = $bdd->query('SELECT nom, Affiche FROM titre WHERE nom=\'' . $Nvideo['titre'] . '\'');
                                        $Aff = $Affiche->fetch() ?>
                                        
                                            <tr class="ChoiceV" onclick='appVideo(<?php echo '"'.$Nvideo['titre'].'", "'. $Nvideo['Episode'] .'", "'. $Nvideo['Saison'] .'"'; ?> )'>
        
                                                <td class="borderS"><img class="Vaffiche" src="<?php echo $Aff['Affiche']; ?>"></td>
                                                <td class="borderTi"><span><?php echo $Nvideo['titre'] ; ?></span></td>
                                                <td class="borderS"><span>Ep: <?php echo $Nvideo['Episode']; ?></span><br>
                                                    <span>S: <?php echo $Nvideo['Saison']; ?></span></td>
        
                                            </tr>
                                    <?php } ?>
                                </table>
                            </div>

                        
                    </section>  


                </div>
            </section>



        <?php if ($_SESSION['Securiter'] >= 1 ) { include("Res/popUpload.php"); } ?>

        <script type="text/javascript">
            <?php include("Res/scriptModal.php"); ?>
        </script>
        <script src="Res/scriptFavori.js">
        </script>

   <!-- ?php include("Com/main.php"); ?> -->
    
    <!-- Le pied de page -->
        
    </body>
</html>
<?php

$moveUrl = "global.php";

include("Com/Conexion.php");

include("Com/verifiLoad.php");

include("lang/FR.php"); 



$typeFavor = 1; // 1 = acueille;

$ImageUs = $bdd->query('SELECT ID, image FROM user WHERE ID=\'' . $_SESSION['ID'] . '\'');
$Rimage = $ImageUs->fetch();


$NameVideo = $bdd->query("SELECT ID, titre, Episode, Saison FROM video ORDER BY ID DESC LIMIT 0, 10");

$His = $bdd->query('SELECT User_ID, Name, type, Episode, Saison FROM Historique WHERE User_ID=\'' . $_SESSION['ID'] . '\' AND type="0" ORDER BY ID DESC LIMIT 0, 10');
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
            
            <nav id="menu">
                
                    
                        <div>
                            <button class="linkSelect" id="LinkDebutPassif"> <?php echo $_Lang_Gen_Homme; ?> </button>
                            <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Video')"> <?php echo $_Lang_Gen_Video; ?> </button>
                            <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Audio')"> <?php echo $_Lang_Gen_Audio; ?> </button>
                            <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Perso')"> <?php echo $_Lang_Gen_Perso; ?> </button>
                            <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Serv')"> <?php echo $_Lang_Gen_Serve; ?> </button>
                            <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Propo')"> <?php echo $_Lang_Gen_Propo; ?> </button>
                            <button class="linkSelect" id="LinkDown" onclick="ChangePAGE('user')"> <?php echo $_Lang_Gen_Param; ?> </button>
    
                        </div>
    
                        <div class="separationA">
    
                            <span class="infoUser"><?php echo $typeUser; ?></span>
    
                            <div class="imageUser">
                                <?php if ($_SESSION['Securiter'] >= 1) { ?>
                                    <img src="<?php echo $Rimage['image'];?>" class="image" onclick="ChangePAGE('user')" >
                                <?php } else { ?>
                                    <img src="User/Default/User.png" class="image">
                                <?php } ?>
                            </div>
    
                            <span class="UserName"><?php echo $Pseudo ?></span>
                            <?php if ($_SESSION['Securiter'] != "-1") {
                                # code...
                            ?>
                            <form action="?Deco=1" method="post">
                                <input name="Deco" id="Deco" type="submit" value="<?php echo $_Lang_Gen_Deco; ?>" class="bottomDisconect" />
                            </form>
                             <?php } else { ?>
                            <div>
                                <button name="Co" id="Res/popup.php#Conex" class="bottomConnect"><?php echo $_Lang_Gen_Conex; ?></button>
                            </div>
    
                            <?php } ?>
    
                        </div>
    
                        <div class="separationB">
    
                            <?php if ($_SESSION['Securiter'] >= 1) { ?>
                              <button class="bottomMenu" id="" onclick="NonDisponible()"><?php echo $_Lang_Gen_Doss; ?>    </button>
                              <button class="bottomMenu" id="#Favor"><?php echo $_Lang_Gen_Favoris; ?> </button>
                              <button class="bottomMenu" id="#Gestion"><?php echo $_Lang_Gen_Fichi; ?></button>
                              <button class="bottomMenu" id="" onclick="NonDisponible()"><?php echo $_Lang_Gen_Down; ?> </button>
                              <button class="bottomMenu" id="#Upload"><?php echo $_Lang_Gen_Upload; ?></button>
                            <?php } else { ?>
                              <button class="bottomMenu" id="" onclick="NonDisponible()"> <?php echo $_Lang_Gen_Doss; ?> </button>
                              <button class="bottomMenu" id="" onclick="Reserver()"> <?php echo $_Lang_Gen_Favoris; ?> </button>
                              <button class="bottomMenu" id="" onclick="Reserver()"> <?php echo $_Lang_Gen_Fichi; ?> </button>
                              <button class="bottomMenu" id="" onclick="NonDisponible()"> <?php echo $_Lang_Gen_Down; ?> </button>
                              <button class="bottomMenu" id="" onclick="Reserver()"> <?php echo $_Lang_Gen_Upload; ?> </button>
                            <?php } ?>
    
                           </div>
                
            </nav>

            <section class="" style="width: 200vh; height: 100vh; overflow: auto;" >
                <div class="back" align="center" style="overflow: hidden;">
                    
                    <section class="Box">
                        <div class="BoxTitle"><span> <?php echo $_Lang_ACC_Nmus;?> </span></div>
                        <div class="listenBoxM">
                            <table>
                                <tr>
                                    <td>Album</td>
                                    <td>Titre</td>
                                </tr>
                            </table>
                        </div>

                        <div class="listenBoxM">
                            <table>
                                <tr>
                                    <td>Album</td>
                                    <td>Titre</td>
                                </tr>
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
                                        <td class="borderS"><span>Ep: <?php echo $Nvideo['Episode']; ?></span>
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
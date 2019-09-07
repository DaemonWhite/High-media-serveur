<?php

$moveUrl = "global.php";

include("Com/Conexion.php");

include("Com/verifiLoad.php");

$img = new pdo('mysql:host=localhost;dbname=highmediadata', 'root','',   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$ImageUs = $img->query('SELECT ID, image FROM user WHERE ID=\'' . $_SESSION['ID'] . '\'');
$Rimage = $ImageUs->fetch();


$NameVideo = $bdd->query("SELECT ID, titre, Episode, Saison FROM video ORDER BY ID DESC LIMIT 0, 10");

$His = $bdd->query('SELECT User_ID, Name, type, Episode, Saison FROM Historique WHERE User_ID=\'' . $_SESSION['ID'] . '\' AND type="0" ORDER BY ID DESC LIMIT 0, 10');

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
                        <button class="linkSelect" id="LinkDebutPassif">Accueil</button>
                        <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Video')">Video</button>
                        <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Audio')">Audio</button>
                        <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Perso')">Espace personnelle</button>
                        <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Serv')">Serveur</button>
                        <button class="linkSelect" id="LinkDown" onclick="ChangePAGE('Propo')">Proposition</button>

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
                            <input name="Deco" id="Deco" type="submit" value="Deconecter" class="bottomDisconect" />
                        </form>
                         <?php } else { ?>
                        <div>
                            <button name="Co" id="Res/popup.php#Conex" class="bottomConnect">Conexion</button>
                        </div>

                        <?php } ?>

                    </div>

                    <div class="separationB">

                        <button class="bottomMenu" id="Res/popup.php#">Dossier</button>
                        <button class="bottomMenu" id="Res/popup.php#">Favori</button>
                        <button class="bottomMenu" id="Res/popup.php#">Suprimer</button>
                        <button class="bottomMenu" id="Res/popup.php#">Télècharger</button>
                        <?php if ($_SESSION['Securiter'] >= 1) { ?>
                        <button class="bottomMenu" id="#Upload">Uploade</button>
                        <?php } else { ?>
                          <button class="bottomMenu" id="" onclick="Reserver()">Uploade</button>
                        <?php } ?>

                    </div>
            
        </nav>

        <section>
            
            <div align="center" style="margin-left: 20vh;">

                <div class="back">

                    <section class="Box">
                        <div class="BoxTitle"><span>Nouvelle musique</span></div>
                        <div class="listenBoxM">
                            <table>
                                <tr>
                                    <td>Album</td>
                                    <td>Title</td>
                                </tr>
                            </table>
                        </div>

                        <div class="listenBoxM">
                            <table>
                                <tr>
                                    <td>Album</td>
                                    <td>Title</td>
                                </tr>
                            </table>
                        </div>

                        
                    </section>

                    <section class="Box">
                        <div class="BoxTitle"><span>Serveur</span></div>
                        
                    </section>

                    <section class="Box">
                        <div class="BoxTitle"><span>Nouvelle vidéo</span></div>

                        <div align="left" class="overFlaw">
                            <table class="listenBoxV">
                                <?php while ($Nvideo = $NameVideo->fetch()) {

                                $Affiche = $bdd->query('SELECT nom, Affiche FROM titre WHERE nom=\'' . $Nvideo['titre'] . '\'');
                                $Aff = $Affiche->fetch() ?>
                                    <tr class="ChoiceV" onclick='appVideo(<?php echo '"'.$Nvideo['titre'].'", "'. $Nvideo['Episode'] .'", "'. $Nvideo['Saison'] .'"'; ?> )'>

                                        <td class="borderS"><img class="Vaffiche" src="<?php echo $Aff['Affiche']; ?>"></td>
                                        <td class="borderS"><span><?php echo $Nvideo['titre'] ; ?></span></td>
                                        <td><span>Ep: <?php echo $Nvideo['Episode']; ?></span><br>
                                            <span>S: <?php echo $Nvideo['Saison']; ?></span></td>

                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                        
                    </section>

                    <section class="Box">
                        <div class="BoxTitle"><span>Favori</span></div>

                        
                    </section>

                    <section class="Box">
                        <div class="BoxTitle"><span>Information</span></div>

                        
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
                                                <td class="borderS"><span><?php echo $Nvideo['titre'] ; ?></span></td>
                                                <td><span>Ep: <?php echo $Nvideo['Episode']; ?></span><br>
                                                    <span>S: <?php echo $Nvideo['Saison']; ?></span></td>
        
                                            </tr>
                                    <?php } ?>
                                </table>
                            </div>

                        
                    </section>  
                    
                </div>
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
    
    <!-- <footer id="pied_de_page">
        <p>Copyright moi, tous droits réservés</p>
    </footer> -->
        
    </body>
</html>
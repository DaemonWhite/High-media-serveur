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
$Fav = $bdd->query('SELECT User, Favori, Ep, S, type, Genre FROM favori WHERE User=\'' . $_SESSION['ID'] . '\' ORDER BY ID DESC LIMIT 0, 10');
$info = $bdd->query('SELECT * FROM Info ORDER BY ID DESC LIMIT 0, 10');

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

    <div class="content">

        <div class="spaceBox">
            <div class="box">
                <div class="titleBox" > <?php echo $_Lang_ACC_Nmus;?></div>

                    <div class="boxSize">
                        <div class="contentBox">
                            <?php while ($Naudio = $NameAudio->fetch()) { 

                                $Affiche = $bdd->query('SELECT nom, Affiche FROM titre WHERE nom=\'' . $Nvideo['titre'] . '\'');
                                $Aff = $Affiche->fetch() ?>

                                <div class="selectBox" onclick='appVideo(<?php echo '"'.$Naudio['Titre'].'", "'. $Naudio['Piste'] .'", "'. $Naudio['Disk'] .'"'; ?> )'>
                                    <div style="background-image: url('<?php echo $Aff['Affiche']; ?>'); background-size: cover;"></div>
                                    <div> <span> <?php echo $Naudio['Titre']; ?> </span> </div>
                                    <div><span>Ep: <?php echo $Naudio['Disk']; ?><br>
                                         S: <?php echo $Naudio['Piste']; ?> </span></div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    
            </div>
        </div>
        
        <div class="spaceBox">
            <div class="box">
                <div class="titleBox" > <?php echo $_Lang_Acc_Serv; ?></div>

                    <div class="boxSize">
                        <div class="contentBox">
                            <!--serv -->
                        </div>
                    </div>
                    
            </div>
        </div>
        

        <div class="spaceBox">
            <div class="box">
                <div class="titleBox" > <?php echo $_Lang_Acc_Nvid; ?></div>

                    <div class="boxSize">
                        <div class="contentBox">
                            <?php while ($Nvideo = $NameVideo->fetch()) { 

                                $Ntitre = $Nvideo['titre']; 

                                $Affiche = $bdd->query('SELECT nom, Affiche FROM titre WHERE nom=\'' . $Nvideo['titre'] . '\'');
                                $Aff = $Affiche->fetch() ?>

                                <div class="selectBox" onclick='appVideo(<?php echo '"'.$Nvideo['titre'].'", "'. $Nvideo['Episode'] .'", "'. $Nvideo['Saison'] .'"'; ?> )'>
                                    <div style="background-image: url('<?php echo "http://hmsteste.com/" . $Aff['Affiche']; ?>'); background-size: cover;"></div>
                                    <div> <span> <?php echo $Ntitre; ?> </span> </div>
                                    <div><span>Ep: <?php echo $Nvideo['Episode']; ?><br>
                                         S: <?php echo $Nvideo['Saison']; ?> </span></div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    
            </div>
        </div>

        <div class="spaceBox">
            <div class="box">
                <div class="titleBox" > <?php echo $_Lang_Gen_Favoris; ?></div>

                    <div class="boxSize">
                        <div class="contentBox">
                            <?php while ($Favo = $Fav->fetch()) { 
                                if ($Favo['Genre'] == 0) 
                                {
                                    $FavoVideo = $bdd->query('SELECT titre, Episode, Saison FROM video WHERE  titre=\'' . $Favo['Favori'] . '\' AND Episode=\'' . $Favo['Ep'] . '\' AND Saison=\'' . $Favo['S'] . '\' ');
                                    $Nvideo = $FavoVideo->fetch();
                                }

                                $Affiche = $bdd->query('SELECT nom, Affiche FROM titre WHERE nom=\'' . $Favo['Favori'] . '\'');
                                $Aff = $Affiche->fetch() ?>

                                <?php if ($Favo['Genre'] == 0) { ?>
                                    <div class="selectBox" >
                                        <div style="background-image: url('<?php echo $Aff['Affiche']; ?>'); background-size: cover;"></div>
                                        <div> <span> <?php echo $Ntitre; ?> </span> </div>
                                        <div><span>Ep: <?php echo $Nvideo['Episode']; ?><br>
                                            S: <?php echo $Nvideo['Saison']; ?> </span></div>
                                    </div>
                                <?php } elseif ($Favo['Genre'] == 2) { ?>
                                    <div class="selectBox" style="grid-template-columns: 106px 2fr " >
                                        <div style="background-image: url('<?php echo $Aff['Affiche']; ?>'); background-size: cover;"></div>
                                        <div> <span> <?php echo $Ntitre; ?> </span> </div>
                                    </div>

                                <?php } ?>

                                

                            <?php } ?>
                        </div>
                    </div>
                    
            </div>
        </div>

        <div class="spaceBox">
            <div class="box">
                <div class="titleBox" ><?php echo $_Lang_Acc_Info; ?></div>

                    <div class="boxSize">
                        <div class="contentBox">
                            <?php while ($Ninfo = $info->fetch()) { ?>

                                <div class="selectBox" style="grid-template-columns: 1fr">
                                    <div style="height: 5vh; "> <span> <?php echo $Ninfo['Titre']; ?> </span> </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    
            </div>
        </div>

        <div class="spaceBox">
            <div class="box">
                <div class="titleBox" ><?php echo $_Lang_Acc_Hist; ?></div>

                    <div class="boxSize">
                        <div class="contentBox">
                            <?php while ($Histo = $His->fetch()) { 

                                $HistVideo = $bdd->query('SELECT titre, Episode, Saison FROM video WHERE  titre=\'' . $Histo['Name'] . '\' AND Episode=\'' . $Histo['Episode'] . '\' AND Saison=\'' . $Histo['Saison'] . '\' ');
                                $Nvideo = $HistVideo->fetch();

                                $Ntitre = $Nvideo['titre']; 

                                $Affiche = $bdd->query('SELECT nom, Affiche FROM titre WHERE nom=\'' . $Nvideo['titre'] . '\'');
                                $Aff = $Affiche->fetch() ?>

                                <div class="selectBox" onclick='appVideo(<?php echo '"'.$Nvideo['titre'].'", "'. $Nvideo['Episode'] .'", "'. $Nvideo['Saison'] .'"'; ?> )'>
                                    <div style="background-image: url('<?php echo "http://hmsteste.com/" . $Aff['Affiche']; ?>'); background-size: cover;"></div>
                                    <div> <span> <?php echo $Ntitre; ?> </span> </div>
                                    <div><span>Ep: <?php echo $Nvideo['Episode']; ?><br>
                                         S: <?php echo $Nvideo['Saison']; ?> </span></div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    
            </div>
        </div>
        
    </div>



        <?php if ($_SESSION['Securiter'] >= 1 ) { include("Res/popUpload.php"); } ?>

        <script type="text/javascript">
            <?php include("Res/scriptModal.php"); ?>
        </script>
        <script type="text/javascript" src="Res/scriptModal.js"></script>
        <script src="Res/scriptFavori.js">
        </script>

   <!-- ?php include("Com/main.php"); ?> -->
    
    <!-- Le pied de page -->
        
    </body>
</html>
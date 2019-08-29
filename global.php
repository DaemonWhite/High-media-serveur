<?php

$moveUrl = "global.php";

include("Com/Conexion.php");

include("Com/verifiLoad.php");

?>
<!DOCTYPE html>
<html>
    <head>
        <title>HighMediaServeur</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="Res/style.css" />
    </head>

    <header>
       
    </header>

<script type="text/javascript">
    
    function ChangePAGE(Type)
    {
        if (Type === "Video") 
        {
            window.location = "Video.php";
        }
        if (Type === "Audio") 
        {

        } 
        if (Type === "Perso") 
        {

        } 
        if (Type === "Serv") 
        {

        } 
        if (Type === "Propo") 
        {

        } 
    }

</script>
    


    <body class="BackgroundA">

        <nav id="menu">
                
                    
                    <div>
                        <button class="linkSelect">Acueil</button>
                        <button class="linkSelect" onclick="ChangePAGE('Video')">Video</button>
                        <button class="linkSelect" onclick="ChangePAGE('Audio')">Audio</button>
                        <button class="linkSelect" onclick="ChangePAGE('Perso')">Espace personnelle</button>
                        <button class="linkSelect" onclick="ChangePAGE('Serv')">Serveur</button>
                        <button class="linkSelect" onclick="ChangePAGE('Propo')">Proposition</button>

                    </div>

                    <div class="separationA">

                        <span class="infoUser"><?php echo $typeUser; ?></span>

                        <div class="imageUser">
                            <img src="User/Default/User.jpg" class="image">
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
                        <button class="bottomMenu" id="#Upload">Uploade</button>

                    </div>
            
        </nav>

        <section id="Upload" class="modal-back" aria-hidden="true" role="dialog" aria-modal="" style="display: none;">
        
                <div class="modal-bloc js-stope-modale">
                    
                    <button id="#SUpload"class="boutonUpload">Créer une série</button>
    
                    <form action="Upload/Upload.php?act=AddMovie" method="post">
                        <button class="boutonUpload">Ajouter un film</button>
                    </form>
                    <form action="Upload/Upload.php?act=AddEp" method="post">
                        <button class="boutonUpload">Ajouter un épisode</button>
                    </form>
                    <button class="boutonUpload js-close-modale">Fermer</button>
                
    
                </div>
    
        </section>

        <section id="SUpload" class="modal-back" aria-hidden="true" role="dialog" aria-modal="" style="display: none;">
            
            <div class="modal-bloc js-stope-modale">

                <div class="upMargin">
                    
                    
                    <div>

                        <span></span>

                        <form action="global.php" name="formUpload" method="post" enctype="multipart/form-data">
                            <table>
                                <tr><td></td>
                                    <td align="center"><span class="ecritureUp">Episode</span></td>
                                    <td align="center"><span class="ecritureUp">Saison</span></td>
                                    <td align="center"><span class="ecritureUp">Titre Secondaire</span></td>
                                    <td align="center"><span class="ecritureUp">Ajouter la video</span></td>
                                </tr>
                                <div id="output"></div>
                                <div>
                                    <input class="texteBase" id="title" type="text" name="nameSerie" placeholder="Titre">
                                </div>
                                <tr>
                                    <td><input id="bouton1" type="button" onclick="newBonus(1)" class="buttonNew" value="+" style="display: ;" ></td>
                                    <td><input id="Ep1" class="EpisodeSize" type="number" name="Ep1" min="1" max="1000" value="1"></td>
                                    <td><input id="S1" class="EpisodeSize" type="number" name="Saison" min="1" max="50" value="1"></td>
                                    <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire"></td>
                                    <td><input class="buttonBase" type="file" name="Video[]" id="fileUpload"></td>
                                    <td><input type='hidden' id="fileUpload" name='MAX_FILE_SIZE' value='7516192768'></td>
                                </tr>
                                
                                <progress id="progress1" value="0" max="100">
                                
    
                                <tr id="bonus1" style="display: none;">
                                    <td><input id="bouton2" type="button" onclick="newBonus(2)" class="buttonNew" value="+" style="display: ;" ></td>
                                    <td><input id="Ep2" class="EpisodeSize" type="number" name="Ep2" min="1" max="1000"></td>
                                    <td><input class="EpisodeSize" type="number" name="Saison" min="1" max="50" value="1"></td>
                                    <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire"></td>
                                    <td><input class="buttonBase" type="file" name="Video[]" id="fileUpload2"></td>
                                    <td><input type='hidden' id="fileUpload2" name='MAX_FILE_SIZE' value='7516192768'></td>
                                </tr>
                                
                                <progress id="progress2" value="0" max="100">
    
                                <tr id="bonus2" style="display: none;" >
                                    <td><input id="bouton3" type="button" onclick="newBonus(3)" class="buttonNew" value="+" style="display: ;" ></td>
                                    <td><input id="Ep3" class="EpisodeSize" type="number" name="Ep3" min="1" max="1000"></td>
                                    <td><input class="EpisodeSize" type="number" name="Saison" min="1" max="50" value="1"></td>
                                    <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire"></td>
                                    <td><input class="buttonBase" type="file" name="Video[]" id="fileUpload3"></td>
                                    <td><input type='hidden' id="fileUpload3" name='MAX_FILE_SIZE' value='7516192768'></td>
                                </tr>
                                
                                
                                <progress id="progress3" value="0" max="100">
    
                                <tr id="bonus3" style="display: none;" >
                                    <td><input id="bouton4" type="button" onclick="newBonus(4)" class="buttonNew" value="+" style="display: ;" ></td>
                                    <td><input id="Ep4" class="EpisodeSize" type="number" name="Ep4" min="1" max="1000"></td>
                                    <td><input class="EpisodeSize" type="number" name="Saison" min="1" max="50" value="1"></td>
                                    <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire"></td>
                                    <td><input class="buttonBase" type="file" name="Video[]" id="fileUpload"></td>
                                    <td><input type='hidden' id="fileUpload" name='MAX_FILE_SIZE' value='7516192768'></td>
                                </tr>
                        
    
                                <tr id="bonus4" style="display: none;" >
                                    <td><input id="bouton5" type="button" onclick="newBonus(5)" class="buttonNew" value="+" style="display: ;" ></td>
                                    <td><input id="Ep5" class="EpisodeSize" type="number" name="Ep5" min="1" max="1000"></td>
                                    <td><input class="EpisodeSize" type="number" name="Saison" min="1" max="50" value="1"></td>
                                    <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire"></td>
                                    <td><input class="buttonBase" type="file" name="Video[]" id="fileUpload"></td>
                                    <td><input type='hidden' id="fileUpload" name='MAX_FILE_SIZE' value='7516192768'></td>
                                </tr>
                        
    
                                <tr id="bonus5" style="display: none;" >
                                    <td><input id="bouton6" type="button" onclick="newBonus(6)" class="buttonNew" value="+" style="display: ;" ></td>
                                    <td><input id="Ep6" class="EpisodeSize" type="number" name="Ep6" min="1" max="1000"></td>
                                    <td><input class="EpisodeSize" type="number" name="Saison" min="1" max="50" value="1"></td>
                                    <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire"></td>
                                    <td><input class="buttonBase" type="file" name="Video[]" id="nullUpload"></td>
                                    <td><input type='hidden' id="nullUpload" name='MAX_FILE_SIZE' value='7516192768'></td>
                                </tr>
                        
    
                                <tr id="bonus6" style="display: none;" >
                                    <td><input id="bouton7" type="button" onclick="newBonus(7)" class="buttonNew" value="+" style="display: ;" ></td>
                                    <td><input id="Ep7" class="EpisodeSize" type="number" name="Ep7" min="1" max="1000"></td>
                                    <td><input class="EpisodeSize" type="number" name="Saison" min="1" max="50" value="1"></td>
                                    <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire"></td>
                                    <td><input class="buttonBase" type="file" name="Video[]" id="nullUpload"></td>
                                    <td><input type='hidden' id="nullUpload" name='MAX_FILE_SIZE' value='7516192768'></td>
                                </tr>
                        
    
                                <tr id="bonus7" style="display: none;" >
                                    <td><input id="bouton8" type="button" onclick="newBonus(8)" class="buttonNew" value="+" style="display: ;" ></td>
                                    <td><input id="Ep8" class="EpisodeSize" type="number" name="Ep8" min="1" max="1000"></td>
                                    <td><input class="EpisodeSize" type="number" name="Saison" min="1" max="50" value="1"></td>
                                    <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire"></td>
                                    <td><input class="buttonBase" type="file" name="Video[]" id="nullUpload"></td>
                                    <td><input type='hidden' id="nullUpload" name='MAX_FILE_SIZE' value='7516192768'></td>
                                </tr>
                        
    
                                <tr id="bonus8" style="display: none;" >
                                    <td><input id="bouton9" type="button" onclick="newBonus(9)" class="buttonNew" value="+" style="display: ;" ></td>
                                    <td><input id="Ep9" class="EpisodeSize" type="number" name="Ep9" min="1" max="1000"></td>
                                    <td><input class="EpisodeSize" type="number" name="Saison" min="1" max="50" value="1"></td>
                                    <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire"></td>
                                    <td><input class="buttonBase" type="file" name="Video[]" id="nullUpload"></td>
                                    <td><input type='hidden' id="nullUpload" name='MAX_FILE_SIZE' value='7516192768'></td>
                                </tr>
                        
    
                                <tr id="bonus9" style="display: none;" >
                                    <td><input id="bouton10" type="button" onclick="newBonus(10)" class="buttonNew" value="+" style="display: ;" ></td>
                                    <td><input id="Ep10" class="EpisodeSize" type="number" name="Ep10" min="1" max="1000"></td>
                                    <td><input class="EpisodeSize" type="number" name="Saison" min="1" max="50" value="1"></td>
                                    <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire"></td>
                                    <td><input class="buttonBase" type="file" name="Video[]" id="nullUpload"></td>
                                    <td><input type='hidden' id="nullUpload" name='MAX_FILE_SIZE' value='7516192768'></td>
                                </tr>
    
                                <tr id="bonus10" style="display: none;">
                                    <td><input id="bouton11" type="button" onclick="newBonus(11)" class="buttonNew" value="+" style="display: ;" ></td>
                                    <td><input id="Ep11" class="EpisodeSize" type="number" name="Ep11" min="1" max="1000"></td>
                                    <td><input class="EpisodeSize" type="number" name="Saison" min="1" max="50" value="1"></td>
                                    <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire"></td>
                                    <td><input class="buttonBase" type="file" name="Video[]" id="nullUpload"></td>
                                    <td><input type='hidden' id="nullUpload" name='MAX_FILE_SIZE' value='7516192768'></td>
                                </tr>
    
    
                                <tr id="bonus11" style="display: none;">
                                    <td></td>
                                    <td><input id="Ep12" class="EpisodeSize" type="number" name="Ep12" min="1" max="1000"></td>
                                    <td><input class="EpisodeSize" type="number" name="Saison" min="1" max="50" value="1"></td>
                                    <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire"></td>
                                    <td><input class="buttonBase" type="file" name="Video[]" id="nullUpload"></td>
                                    <td><input type='hidden' id="nullUpload" name='MAX_FILE_SIZE' value='7516192768'></td>
                                </tr>
                                </table>
                                <div>
    
                                    <button type="button" class="boutonUpload js-close-modale">Fermer</button></br>
                                    <input type="submit" name="" value="Upload">
    
                                </div>
                            </form>
                            
                    </div>
                



                    

                </div>

            </div>

        </section>


        <script src="Res/Framework/jquery.js"></script>
        <script src="Res/scriptModal.js"></script>

   <!-- ?php include("Com/main.php"); ?> -->
    
    <!-- Le pied de page -->
    
    <!-- <footer id="pied_de_page">
        <p>Copyright moi, tous droits réservés</p>
    </footer> -->
        
    </body>
</html>
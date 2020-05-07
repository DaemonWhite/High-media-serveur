<?php

$typeFavor = 1;

$moveUrl = "global.php";

include("Com/Conexion.php");

include("Com/verifiLoad.php");

$ImageUs = $bdd->query('SELECT ID, image FROM user WHERE ID=\'' . $_SESSION['ID'] . '\'');
$Rimage = $ImageUs->fetch();


?>
<!DOCTYPE html>
<html>
    <head>
        <title>HighMediaServeur</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="Res/style.css" />
        <style type="text/css">
            
            .bacgroundUser
            {
                background-image:  url("<?php echo $Rimage['image']; ?>");
                background-position:left center;
                background-repeat: no-repeat;
                background-size: auto 100% ;
            }

        </style>
    </head>

    <header>
       
    </header>

<script type="text/javascript" src="Res/scriptZone.js">

</script>
    


    <body class="BackgroundA">

        <div class="ZoneM">
          
          <nav id="menu">
          
              
              <div>
                  <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Acueil')">Acueil</button>
                  <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Video')">Video</button>
                  <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Audio')">Audio</button>
                  <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Perso')">Espace personnelle</button>
                  <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Serv')">Serveur</button>
                  <button class="linkSelect" id="linkCenter" onclick="ChangePAGE('Propo')">Proposition</button>
                  <button class="linkSelect" id="LinkDebutPassif" onclick="ChangePAGE('user')" style="margin-bottom: 5%;">Paramètre</button>
                  
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
  
                  <?php if ($_SESSION['Securiter'] >= 1) { ?>
                    <button class="bottomMenu" id="" onclick="NonDisponible()">Dossier</button>
                    <button class="bottomMenu" id="#Favor">Favoris</button>
                    <button class="bottomMenu" id="#Gestion">Gestionaire</button>
                    <button class="bottomMenu" id="" onclick="NonDisponible()">Télécharger</button>
                    <button class="bottomMenu" id="#Upload">Uploade</button>
                  <?php } else { ?>
                    <button class="bottomMenu" id="" onclick="NonDisponible()">Dossier</button>
                    <button class="bottomMenu" id="" onclick="Reserver()">Favoris</button>
                    <button class="bottomMenu" id="" onclick="Reserver()">Gestionaire</button>
                    <button class="bottomMenu" id="" onclick="NonDisponible()">Télécharger</button>
                    <button class="bottomMenu" id="" onclick="Reserver()">Uploade</button>
                  <?php } ?>
  
              </div>  
      
  </nav>

        </div>

        <section class="colorTitle">

                <div>
                    <div class="viewList">
                        
                        <div align="center">
                          
                          <header class="cadreBaseT">Profile</header>

                          <section>
                            
                            <div>
                              
                                <div class="imageUser bacgroundUser">

                                    <form name="newImage" method="post" enctype="multipart/form-data" >

                                     <!-- <img class="image" src="<?php echo $Rimage['image']; ?> ">--> 


                                    <input style="display: none;" type="file" id="imageUpl" name="imageUpl"  onchange="changeUseIm()" accept="image/png, image/jpeg , image/jpg" value="Choisire la nouvelle image de profile">

                                     
                                    <label for="imageUpl" class="chngeImg">

                                        <img class="chngeImg" src="User/Default/ModifImage.png">
                                        
                                    </label>
        
                                    </form>
                                 

                                </div>

                            </div>

                            <div>
                              
                              

                              <table class="colorTitle">
                                  
                                  <tr>
                                      <td>
                                          Pseudo : 
                                      </td>
                                      <td>
                                          <input type="text" class="texteBase" value="<?php echo $_SESSION['Pseudo']; ?>">  
                                      </td>

                                      <td style="padding-left: 2vh;"><input class="buttonBase" type="" name="" value="Changer le mot de passe"> </td>
                                  </tr>

                                  <tr>

                                    <td>
                                        Mot de passe
                                    </td>

                                    <td>
                                        <input type="text" class="texteBase" name="">
                                    </td>
                                      
                                  </tr>

                              </table>
                              

                            </div>

                            <input class="buttonBase" type="submit" name="" value="Confirmer">

                        
                          </section>

                          <section>
                            <div style="margin-top: 5%;">
                                
                                <div class="cadreBaseT">Thème</div>

                                <table>
                                    
                                    <tr>
                                        <td>
                                            Thème pc :
                                        </td>

                                        <td>
                                            
                                            <select class="selectBase" >
                                                <option>Defaut</option>
                                            </select>

                                        </td>

                                    </tr>

                                    <table>
                                    
                                    <tr>
                                        <td>
                                            Thème Mobile :
                                        </td>

                                        <td>
                                            
                                            <select class="selectBase" >
                                                <option>Defaut</option>
                                            </select>

                                        </td>

                                    </tr>

                                </table>

                            </div>
                          </section>

                            <?php if ($_SESSION['Securiter'] >= 2) {  ?>

                                <section>
                              
                                    <div>
                                        
                                        <div class="cadreBaseT">Modérateur</div>

                                        <div></div>

                                    </div>

                                </section>
                            <?php } ?>

                            <?php if ($_SESSION['Securiter'] >= 3) {  ?>

                                <section>
                              
                                    <div>
                                        
                                        <div class="cadreBaseT">Administrateur</div>

                                        <div>
                                            <button class="buttonBase" onclick="window.location = 'com/testNewPassword.php';">Géré les utilisateur</button>
                                        </div>

                                    </div>

                                </section>
                            <?php } ?>

                        </div>

                    </div>
                </div>

        </section>

        <?php if ($_SESSION['Securiter'] >= 1 ) { include("Res/popUpload.php"); } ?>

        <script type="text/javascript">
        		
        	function changeUseIm() {
		
	       		var form = document.forms.namedItem("newImage");
			
			      var oData = new FormData(document.forms.namedItem("newImage"));
			
			  oData.append("CustomField", "This is some extra data");
			
			  let oReq = new XMLHttpRequest();
		
			  oReq.open("POST", "user/changeImage.php", true);
			  oReq.onload = function(oEvent) {
			    if (oReq.readyState == 4 && (oReq.status == 200 || oReq.status == 0)) {
			      //window.location = "user.php"
			    } else {
			      oOutput.innerHTML = "Error " + oReq.status + " occurred uploading your file.<br \/>";
			    }
			  };
			
			  oReq.send(oData);
		}

        </script>

        <script type="text/javascript">
            <?php include("Res/scriptModal.php"); ?>
        </script>

   </body>
</html>
<?php

$moveUrl = "global.php";

include("Com/Conexion.php");

include("Com/verifiLoad.php");

$img = new pdo('mysql:host=localhost;dbname=highmediadata', 'root','',   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$ImageUs = $img->query('SELECT ID, image FROM user WHERE ID=\'' . $_SESSION['ID'] . '\'');
$Rimage = $ImageUs->fetch();


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
            NonDisponible()
        } 
        if (Type === "Perso") 
        {
            NonDisponible()
        } 
        if (Type === "Serv") 
        {
            NonDisponible()
        } 
        if (Type === "Propo") 
        {
            NonDisponible()
        } 
    }

</script>
    


    <body class="BackgroundA">

        <nav id="menu">
                
                    
                    <div>
                        <button class="linkSelect" id="LinkDebutPassif">Acueil</button>
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
                            	<img src="<?php echo $Rimage['image'];?>" class="image">
                            <?php } else { ?>
                            	<img src="User/Default/User.png" class="image">
							<?php } ?>
                        </div>

                        <span class="UserName"><?php echo $Pseudo; ?></span>

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
        	<div  style="margin-left: 20vh;">
        		<div style="display: flex;">
        			<form style="margin-top: 2%; margin-left: 20vh;" name="newImage" method="post" enctype="multipart/form-data">
        				<input class="buttonBase" type="file" id="imageUpl" name="imageUpl" onchange="changeUseIm()" accept="image/png, image/jpeg , image/jpg" value="Choisire la nouvelle image de profile">
        			</form>
                    <?php if ($_SESSION['Securiter'] >= 1) { ?>
                    <button class="buttonBase" onclick="window.location = 'com/testnewpassword.php'" >Admin</button>
                    <?php } ?>
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
			      window.location = "global.php"
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
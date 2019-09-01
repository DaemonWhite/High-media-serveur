<?php

$moveUrl = "Video.php";

include("Com/Conexion.php");

include("Com/verifiLoad.php");

$bdd = new pdo('mysql:host=localhost;dbname=highmediadata', 'root','',   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$EpVideo = $bdd->query('SELECT titre, Episode, Saison, Repertoire FROM video WHERE titre=\'' . $_GET['Name'] . '\' AND Episode=\'' . $_GET['Ep'] . '\' AND Saison=\'' . $_GET['S'] . '\' ');
$video = $EpVideo->fetch();

?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo 'High media serveur - ' . $_GET['Name']; ?></title>
	<meta charset="utf-8" />
    <link rel="stylesheet" href="Res/style.css" />
    <link rel="stylesheet" href="Res/styleVideo.css" />
</head>
 <script type="text/javascript">
    
    function ChangePAGE(Type)
    {
        if (Type === "Acueil") 
        {
            window.location = "global.php";
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

    function newZone(Page){

      window.location = "?name=" + Page;

     }

 </script>

<body class="BackgroundA">

	 <nav id="menu">
          
              
              <div>
                  <button class="linkSelect" onauxclick="ChangePAGE('Video')">Video</button>
                  <button class="linkSelect" onclick="ChangePAGE('Acueil')">Acueil</button>
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

  
    
    <section>
      <div align="center">
        <div class="entreVideo">
          <div class="blockListeVideo">
            
            <div class="titleVideo"><?php echo $_GET['Name'] . ' - Episode: '. $_GET['Ep'] .' - S.'. $_GET['S']; ?></div>

          	<div >
          		<video class="video" controls>
		  			<source src="<?php echo $video['Repertoire']; ?>">
				</video>
          	</div>


          </div>
        </div>
      </div>
    </section>

 	<?php include("Res/popUpload.php"); ?>

      <script type="text/javascript">
            <?php include("Res/scriptModal.php"); ?>
      </script>
</body>
</html>
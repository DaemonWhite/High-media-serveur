<?php 

$serPage00 = 'id="linkCenter" onclick="ChangePAGE(\'Acueil\')"';
$serPage01 = 'id="linkCenter" onclick="ChangePAGE(\'Video\')"';
$serPage02 = 'id="linkCenter" onclick="ChangePAGE(\'Audio\')"';
$serPage03 = 'id="linkCenter" onclick="ChangePAGE(\'Perso\')"';
$serPage04 = 'id="linkCenter" onclick="ChangePAGE(\'Serv\')"';
$serPage05 = 'id="linkCenter" onclick="ChangePAGE(\'Propo\')"';
$serPage06 = 'id="LinkDown" onclick="ChangePAGE(\'user\')"';

if ($moveUrl == "/home") {

    $serPage00 = "id='LinkDebutPassif'";

} elseif ($moveUrl == "/video") {

    $serPage01 = "id='LinkDebutPassif'";

} elseif ($moveUrl == "audio.php") {

    $serPage02 = "id='LinkDebutPassif'";

} elseif ($moveUrl == "perso.php") {

    $serPage03 = "id='LinkDebutPassif'";

} elseif ($moveUrl == "serv.php") {

    $serPage04 = "id='LinkDebutPassif'";

} elseif ($moveUrl == "propo.php") {

    $serPage05 = "id='LinkDebutPassif'";

} elseif ($moveUrl == "user.php") {

    $serPage06 = "id='LinkDebutPassif' style='margin-bottom: 5%;'";

} 

?>

<nav id="menu">
                    
                        <div>
                            <button class="linkSelect"  <?php echo $serPage00; ?> > <?php echo $_Lang_Gen_Homme; ?> </button>
                            
                            <button class="linkSelect"  <?php echo $serPage01; ?> > <?php echo $_Lang_Gen_Video; ?> </button>

                            <button class="linkSelect"  <?php echo $serPage02; ?> > <?php echo $_Lang_Gen_Audio; ?> </button>

                            <button class="linkSelect"  <?php echo $serPage03; ?> > <?php echo $_Lang_Gen_Perso; ?> </button>

                            <button class="linkSelect"  <?php echo $serPage04; ?> > <?php echo $_Lang_Gen_Serve; ?> </button>
 
                            <button class="linkSelect"  <?php echo $serPage05; ?> > <?php echo $_Lang_Gen_Propo; ?> </button>

                            <button class="linkSelect"  <?php echo $serPage06; ?> > <?php echo $_Lang_Gen_Param; ?> </button>

    
                        </div>
    
                        <div class="separationA">
    
                            <span class="infoUser"><?php echo $typeUser; ?></span>
    
                            <div class="imageUser">
                                <?php if ($_SESSION['Securiter'] >= 1) { ?>
                                    <img src="<?php echo $Rimage['image'];?>" class="image" onclick="ChangePAGE('user')" >
                                <?php } else { ?>
                                    <img src="user/Default/User.png" class="image">
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
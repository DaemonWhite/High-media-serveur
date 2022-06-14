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
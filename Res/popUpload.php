 <?php

 $ana = new pdo('mysql:host=localhost;dbname=highmediadata', 'root','',   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

 $reqCine = $ana->query('SELECT nom, Format FROM titre WHERE Format="0" ORDER BY nom ');


 ?> 

  <section id="Upload" class="modal-back" aria-hidden="true" role="dialog" aria-modal="" style="display: none;">
  
          <div class="modal-bloc js-stope-modale">
              
              <button id="#SUpload" class="boutonUpload">Créer une série</button>

              <button id="#addUpload" onclick="verifEpisode()" class="boutonUpload">Ajouter un épisode</button>

              <button id="#gestUpload" onclick="appMyVideo('1')" class="boutonUpload">Gérer mes vidéos</button>

              <button class="boutonUpload js-close-modale" style="margin-bottom: 7%;">Fermer</button>
          
      
          </div>
      
  </section>
  
<section id="SUpload" class="modal-back" aria-hidden="true" role="dialog" aria-modal="" style="display: none;">
      
      <div class="modal-bloc js-stope-modale">
  
          <div class="upMargin">
              
              
              <div align="center">
  
                  <div id="error"></div>
  
                  <form action="global.php" name="formUpload" method="post" enctype="multipart/form-data">
                      
                          
                          <div id="output"></div>
                          <div class="progresseBar" >
                              <div id="progress1" style="width: 0%"></div>
                          </div>
                          <div>
                              <input class="texteBase" id="title" type="text" name="nameSerie" placeholder="Titre" onblur="verif(this, 'titre', '0')">
                              <div class="classError" align="center" id="ErrorTitle"></div>
                          </div>
                          <div>
                            
                          </div>
                          <table>
                          <div align="center">
                            <tr><td></td>
                              <td><select name="Genre" class="selectBase">
                                  <option value="Anime">Animé</option>
                                  <option value="Docu">Documentaire</option>
                                  <option value="Movie">Filme</option>
                                  <option value="TV">Série télé</option>
                              </select></td>

                              <td><select name="type" class="selectBase">
                                <option value="no">Genre ?</option>
                                <option value="Kodomo">Kodomo</option>
                                <option value="Shonen">Shonene</option>
                                <option value="Shojo">Shojo</option>
                                <option value="Seinen">Seinen</option>
                                <option value="Josei">Josei</option>
                                <option value="Sejin">Sejin</option>
                              </select></td>

                              <td><select name="Lang" class="selectBase">
                                <option value="VF">VF</option>
                                <option value="Vostfr">Vostfr</option>
                              </select></td>

                            <td><input id="min" type="file" name="miniature" style="display: none;" accept="image/jpg, image/png, image/jpeg">
                            <label for="min" class="buttonNew">Miniature</label></td></tr>

                          </div>
                          </table>
                          <table>
                          <tr><td></td>
                              <td align="center"><span class="ecritureUp">Épisode</span></td>
                              <td align="center"><span class="ecritureUp">Saison</span></td>
                              <td align="center"><span class="ecritureUp">Titre Secondaire</span></td>
                              <td align="center"><span class="ecritureUp">Ajouter la vidéo</span></td>
                          </tr>

                          <?php

                          $BonusID = 0;

                          while ($BonusID <= 11) {

                            $butID = $BonusID + 1;

                          ?>

                            <tr id="<?php if ($BonusID != 0) {echo 'bonus' . $BonusID; } ?>" style="display: <?php if ($BonusID != 0) { echo "none;";} ?>">
                              <?php if ($BonusID != 11) { ?>

                                <td><input id="bouton<?php echo $butID; ?>" type="button" onclick="newBonus(<?php echo $butID; ?>, 0)" class="buttonNew" value="+" style="display: ;" ></td>

                              <?php } else {echo "<td></td>";} ?>
                                <td><input id="Ep<?php echo $butID; ?>" class="EpisodeSize" type="number" name="Ep<?php echo $butID; ?>" min="1" max="1000" onblur="verif(this,'numero','<?php echo $butID; ?>')" value="<?php echo $butID; ?>"></td>
                                <td><input id="S<?php echo $butID; ?>" class="EpisodeSize" type="number" name="Saison<?php echo $butID; ?>" min="1" max="50" value="1"></td>
                                <td><input class="texteBase" id="subTitle<?php echo $butID; ?>" type="text" name="titleName" placeholder="Titre Secondaire"></td>
                                <td><input class="buttonBase" type="file" name="Video[]" id="fileUpload<?php echo $butID; ?>" onchange="noVideo()" onchange="noVideo()" accept="video/*" ></td>
                                <td><input type='hidden' id="fileUpload1" name='MAX_FILE_SIZE' value='7516192768'></td>
                            </tr>
                          <?php

                          $BonusID++;

                          }

                          ?>

                          </table>
                          <span class="ecritureUp" style="margin-top: 2%;">Synopsis</span>
                          <div align="center">
  
                              <textarea class="textareaBase" name="Synopsis" placeholder="synopsis"></textarea>
                          </div>
                          <div>
  
                              <button type="button" onclick="newUpload(0)" class="boutonSubmit" id="Upl" style="display: ;">Upload</button>
                              <button type="button" class="boutonUpload js-close-modale" id="exit">Fermer</button></br>
      
                          </div>
                      </form>
                      
              </div>        
  
          </div>
  
      </div>

  
</section>

<section id="addUpload" class="modal-back" aria-hidden="true" role="dialog" aria-modal="" style="display: none;">
      
      <div class="modal-bloc js-stope-modale">
  
          <div class="upMargin">
              
              
              <div align="center">
  
                  <div id="error"></div>
  
                  <form action="global.php" name="formAddUpload" method="post" enctype="multipart/form-data">
                      <table>
                          <tr><td></td>
                              <td align="center"><span class="ecritureUp">Épisode</span></td>
                              <td align="center"><span class="ecritureUp">Saison</span></td>
                              <td align="center"><span class="ecritureUp">Titre Secondaire</span></td>
                              <td align="center"><span class="ecritureUp">Ajouter la video</span></td>
                          </tr>
                          <div id="output2"></div>

                          <div class="progresseBar">
                              <div id="progress2" style="width: 0%"></div>
                          </div>

                          <div>

                              <div align="center">
                                <form name="serrFomr">
                                  
                                  <select id="nameSerr" onchange="verifEpisode()" name="GenreName" class="selectModal" style="height: 2%; margin-top: 2%; margin-bottom: 2%;"><?php 

                                  while ($NameDonne = $reqCine->fetch()) {
                                    echo '<option value="' . $NameDonne['nom'] . '">'.$NameDonne['nom'] .'</option>';
                                  }
  
                                  ?>

                                  </select>

                                </form>
                              </div>
                              <span class="ecritureUp" style="margin-top: 2%;">Episode présent</span>
                              <div align="center">
                                <textarea class="textareaBase" id="Shell" name="Synopsis" placeholder="synopsis" style="margin-bottom: 2%;" disabled></textarea>
                              </div>

                              <div class="classError" align="center" id="ErrorTitle"></div>
                          </div>

                          <tr>
                              <td><input id="bouton13" type="button" onclick="newBonus(13, 1)" class="buttonNew" value="+" style="display: ;" ></td>
                              <td><input id="Ep13" class="EpisodeSize" type="number" name="Ep13" min="1" max="1000" onblur="verif(this,'numero','13')" value="1"></td>
                              <td><input id="S1" class="EpisodeSize" type="number" name="Saison01" min="1" max="50" value="1"></td>
                              <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire"></td>
                              <td><input class="buttonBase" type="file" name="Video[]" id="fileUpload13" onchange="noVideo()" accept="video/*"></td>
                              <td><input type='hidden' id="fileUpload13" name='MAX_FILE_SIZE' value='7516192768'></td>
                          </tr>
      
                          <tr id="bonus13" style="display: none;">
                              <td><input id="bouton14" type="button" onclick="newBonus(14, 1)" class="buttonNew" value="+" style="display: ;" ></td>
                              <td><input id="Ep14" class="EpisodeSize" type="number" name="Ep14" min="1" max="1000" onblur="verif(this,'numero','14')"></td>
                              <td><input class="EpisodeSize" type="number" name="Saison02" min="1" max="50" value="1"></td>
                              <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire" onchange="noVideo()" accept="video/*"></td>
                              <td><input class="buttonBase" type="file" name="Video[]" id="fileUpload14"></td>
                              <td><input type='hidden' id="fileUpload14" name='MAX_FILE_SIZE' value='7516192768'></td>
                          </tr>
      
                          <tr id="bonus14" style="display: none;" >
                              <td><input id="bouton15" type="button" onclick="newBonus(15, 1)" class="buttonNew" value="+" style="display: ;" ></td>
                              <td><input id="Ep15" class="EpisodeSize" type="number" name="Ep15" min="1" max="1000" onblur="verif(this,'numero','15')"></td>
                              <td><input class="EpisodeSize" type="number" name="Saison03" min="1" max="50" value="1"></td>
                              <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire" onchange="noVideo()" accept="video/*"></td>
                              <td><input class="buttonBase" type="file" name="Video[]" id="fileUpload15"></td>
                              <td><input type='hidden' id="fileUpload15" name='MAX_FILE_SIZE' value='7516192768'></td>
                          </tr>
                          
      
                          <tr id="bonus15" style="display: none;" >
                              <td><input id="bouton16" type="button" onclick="newBonus(16, 1)" class="buttonNew" value="+" style="display: ;" ></td>
                              <td><input id="Ep16" class="EpisodeSize" type="number" name="Ep16" min="1" max="1000" onblur="verif(this,'numero','16')"></td>
                              <td><input class="EpisodeSize" type="number" name="Saison04" min="1" max="50" value="1"></td>
                              <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire" onchange="noVideo()" accept="video/*"></td>
                              <td><input class="buttonBase" type="file" name="Video[]" id="fileUpload16"></td>
                              <td><input type='hidden' id="fileUpload16" name='MAX_FILE_SIZE' value='7516192768'></td>
                          </tr>
                  
      
                          <tr id="bonus16" style="display: none;" >
                              <td><input id="bouton17" type="button" onclick="newBonus(17, 1)" class="buttonNew" value="+" style="display: ;" ></td>
                              <td><input id="Ep17" class="EpisodeSize" type="number" name="Ep17" min="1" max="1000" onblur="verif(this,'numero','17')"></td>
                              <td><input class="EpisodeSize" type="number" name="Saison05" min="1" max="50" value="1"></td>
                              <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire" onchange="noVideo()" accept="video/*"></td>
                              <td><input class="buttonBase" type="file" name="Video[]" id="fileUpload17"></td>
                              <td><input type='hidden' id="fileUpload17" name='MAX_FILE_SIZE' value='7516192768'></td>
                          </tr>
                  
      
                          <tr id="bonus17" style="display: none;" >
                              <td><input id="bouton18" type="button" onclick="newBonus(18, 1)" class="buttonNew" value="+" style="display: ;" ></td>
                              <td><input id="Ep18" class="EpisodeSize" type="number" name="Ep18" min="1" max="1000" onblur="verif(this,'numero','18')"></td>
                              <td><input class="EpisodeSize" type="number" name="Saison06" min="1" max="50" value="1"></td>
                              <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire" onchange="noVideo()" accept="video/*"></td>
                              <td><input class="buttonBase" type="file" name="Video[]" id="fileUpload18"></td>
                              <td><input type='hidden' id="fileUpload18" name='MAX_FILE_SIZE' value='7516192768'></td>
                          </tr>
                  
      
                          <tr id="bonus18" style="display: none;" >
                              <td><input id="bouton19" type="button" onclick="newBonus(19, 1)" class="buttonNew" value="+" style="display: ;" ></td>
                              <td><input id="Ep19" class="EpisodeSize" type="number" name="Ep19" min="1" max="1000" onblur="verif(this,'numero','19')"></td>
                              <td><input class="EpisodeSize" type="number" name="Saison07" min="1" max="50" value="1"></td>
                              <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire" onchange="noVideo()" accept="video/*"></td>
                              <td><input class="buttonBase" type="file" name="Video[]" id="fileUpload19"></td>
                              <td><input type='hidden' id="fileUpload19" name='MAX_FILE_SIZE' value='7516192768'></td>
                          </tr>
                  
      
                          <tr id="bonus19" style="display: none;" >
                              <td><input id="bouton20" type="button" onclick="newBonus(20, 1)" class="buttonNew" value="+" style="display: ;" ></td>
                              <td><input id="Ep20" class="EpisodeSize" type="number" name="Ep20" min="1" max="1000" onblur="verif(this,'numero','20')"></td>
                              <td><input class="EpisodeSize" type="number" name="Saison08" min="1" max="50" value="1"></td>
                              <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire" onchange="noVideo()" accept="video/*"></td>
                              <td><input class="buttonBase" type="file" name="Video[]" id="fileUpload20"></td>
                              <td><input type='hidden' id="fileUpload20" name='MAX_FILE_SIZE' value='7516192768'></td>
                          </tr>
                  
      
                          <tr id="bonus20" style="display: none;" >
                              <td><input id="bouton21" type="button" onclick="newBonus(21, 1)" class="buttonNew" value="+" style="display: ;" ></td>
                              <td><input id="Ep21" class="EpisodeSize" type="number" name="Ep21" min="1" max="1000" onblur="verif(this,'numero','21')"></td>
                              <td><input class="EpisodeSize" type="number" name="Saison09" min="1" max="50" value="1"></td>
                              <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire" onchange="noVideo()" accept="video/*"></td>
                              <td><input class="buttonBase" type="file" name="Video[]" id="fileUpload21"></td>
                              <td><input type='hidden' id="fileUpload21" name='MAX_FILE_SIZE' value='7516192768'></td>
                          </tr>
                  
      
                          <tr id="bonus21" style="display: none;" >
                              <td><input id="bouton22" type="button" onclick="newBonus(22, 1)" class="buttonNew" value="+" style="display: ;" ></td>
                              <td><input id="Ep22" class="EpisodeSize" type="number" name="Ep22" min="1" max="1000" onblur="verif(this,'numero','22')"></td>
                              <td><input class="EpisodeSize" type="number" name="Saison10" min="1" max="50" value="1"></td>
                              <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire" onchange="noVideo()" accept="video/*"></td>
                              <td><input class="buttonBase" type="file" name="Video[]" id="fileUpload22"></td>
                              <td><input type='hidden' id="fileUpload22" name='MAX_FILE_SIZE' value='7516192768'></td>
                          </tr>
      
                          <tr id="bonus22" style="display: none;">
                              <td><input id="bouton23" type="button" onclick="newBonus(23, 1)" class="buttonNew" value="+" style="display: ;" ></td>
                              <td><input id="Ep23" class="EpisodeSize" type="number" name="Ep23" min="1" max="1000" onblur="verif(this,'numero','23')"></td>
                              <td><input class="EpisodeSize" type="number" name="Saison11" min="1" max="50" value="1"></td>
                              <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire" onchange="noVideo()" accept="video/*"></td>
                              <td><input class="buttonBase" type="file" name="Video[]" id="fileUpload23"></td>
                              <td><input type='hidden' id="fileUpload23" name='MAX_FILE_SIZE' value='7516192768'></td>
                          </tr>
      
      
                          <tr id="bonus23" style="display: none;">
                              <td></td>
                              <td><input id="Ep24" class="EpisodeSize" type="number" name="Ep24" min="1" max="1000" onblur="verif(this,'numero','24')"></td>
                              <td><input class="EpisodeSize" type="number" name="Saison12" min="1" max="50" value="1"></td>
                              <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire" onchange="noVideo()" accept="video/*"></td>
                              <td><input class="buttonBase" type="file" name="Video[]" id="fileUpload24"></td>
                              <td><input type='hidden' id="fileUpload24" name='MAX_FILE_SIZE' value='7516192768'></td>
                          </tr>
                          </table>
                          
                          <div>
  
                              <button type="button" onclick="addUpload()" class="boutonSubmit" id="Upl" style="display: ;">Upload</button>
                              <button type="button" class="boutonUpload js-close-modale" id="exit">Fermer</button></br>
      
                          </div>
                      </form>
                      
              </div>        
  
          </div>
  
      </div>
  
</section>


<section id="gestUpload" class="modal-back" aria-hidden="true" role="dialog" aria-modal="" style="display: none;">

  <div class="modal-bloc js-stope-modale">
    
    <div align="center" style="padding: 2%;">
  
      <div class="cadreBaseT">
        
        <span class="colorTitle" style="font-size: 4.6vh;">Gérer mes fichier</span>

      </div>

      <div id="gestVideo"></div>

      <button type="button" class="boutonUpload js-close-modale" id="exit">Fermer</button></br>



    </div>

  </div>

</section>





<?php if ($typeFavor != 1) {  ?>
 <section id="Favor" class="modal-back" aria-hidden="true" role="dialog" aria-modal="" style="display: none;">

          <div class="modal-bloc js-stope-modale">
              
              <?php if (!empty($_GET['name']) AND empty($_GET['Ep'])) { 

                $verif = new pdo('mysql:host=localhost;dbname=highmediadata', 'root','',   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); 

                $vefFavor = $verif->query('SELECT User, Ep, s, Favori, type, Genre FROM favori WHERE User=\'' . $_SESSION['ID'] . '\' AND Ep="0" AND S="0" AND Favori=\'' . $_GET['name'] . '\' AND type=\'' . $GetV . '\' AND Genre="0" ');
                $exiFavir = $vefFavor->fetch();

                if ($exiFavir['Favori'] == "") { ?>

                    <button id="" class="boutonUpload" onclick="appFav(<?php echo "'" . $GetV . "','" . $_GET['name'] . "'"; ?>, '0', '0' ,'0')">Ajouter au favoris</button>

                <?php } else { ?>

                    <button id="" class="boutonUpload" onclick="appFav(<?php echo "'" . $GetV . "','" . $_GET['name'] . "'"; ?>, '0', '0' ,'1')">Supprimer des favoris</button>

                <?php } ?>

                <?php } else {

                  $verif = new pdo('mysql:host=localhost;dbname=highmediadata', 'root','',   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); 

                  $vefFavor = $verif->query('SELECT User, Ep, s, Favori, type, Genre FROM favori WHERE User=\'' . $_SESSION['ID'] . '\' AND Ep=\'' . $_GET['Ep'] . '\' AND S=\'' . $_GET['S'] . '\' AND Favori=\'' . $_GET['Name'] . '\' AND type=\'' . $GetV . '\' AND Genre="1" ');
                  $exiFavir = $vefFavor->fetch();
  
                  if ($exiFavir['Favori'] == "") { ?>
    
                        <button id="" class="boutonUpload" onclick="appFav(<?php echo "'" . $GetV . "','" . $_GET['Name'] . "', '" . $_GET['S'] . "', '" . $_GET['Ep'] . "'"; ?>,'0')">Ajouter au favoris</button>
    
                    <?php } else { ?>
    
                        <button id="" class="boutonUpload" onclick="appFav(<?php echo "'" . $GetV . "','" . $_GET['Name'] . "', '" . $_GET['S'] . "','" . $_GET['Ep'] . "'"; ?>,'1')">Supprimer des favoris</button>
    
                    <?php }
                  } ?>

              <button id="#viewFavor" class="boutonUpload">Voire les favoris</button>

              <button class="boutonUpload js-close-modale"> </button>
          
      
          </div>
      
  </section>

<?php } ?>

  <section id="<?php if ($typeFavor == 1) { echo "Favor"; } else {echo "viewFavor";} ?>" class="modal-back" aria-hidden="true" role="dialog" aria-modal="" style="display: none;">
    <div class="modal-bloc js-stope-modale">

      <button id="#SUpload" class="boutonUpload">Ajouter au favoris</button>

    </div>
  </section>

  <section id="Gestion" class="modal-back" aria-hidden="true" role="dialog" aria-modal="" style="display: none;">
    
      <div class="modal-bloc js-stope-modale">

              <button id="#gestUpload" onclick="appMyVideo('1')" class="boutonUpload">Gérer mes vidéos</button>

              <button class="boutonUpload js-close-modale" style="margin-bottom: 7%;">Fermer</button>
          
          </div>

  </section>

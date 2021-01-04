 <?php

 $reqCine = $bdd->query('SELECT nom, Format FROM titre WHERE Format="0" ORDER BY nom ');


 ?> 

  <section id="Upload" class="modal-back" aria-hidden="true" role="dialog" aria-modal="" style="display: none;">
  
          <div class="modal-bloc js-stope-modale">
              
              <button id="#UploadVid" class="boutonUpload">Video</button>

              <!-- <button id="#UploadAud" class="boutonUpload">Audio</button> -->
              <<button id="" class="boutonUpload" onclick="NonDisponible()">Audio</button>

              <button class="boutonUpload js-close-modale" style="margin-bottom: 7%;">Fermer</button>
          
      
          </div>
      
  </section>

<?php 
$i = 0;
while ( $i <= 1) { ?>
  <section id="<?php if ($i == 0) { echo 'UploadVid';} else { echo 'UploadAud'; }?>" class="modal-back" aria-hidden="true" role="dialog" aria-modal="" style="display: none;">

     <div class="modal-bloc js-stope-modale">
              
              <?php if ($i == 0) { ?>

                <button id="#SUpload" class="boutonUpload">Créer une série</button>

                <button id="#addUpload" onclick="verifEpisode('0')" class="boutonUpload">Ajouter un épisode(s)</button>

                <button id="#gestUpload" onclick="appMyVideo('1')" class="boutonUpload">Gérer mes vidéos</button>
                
              <?php } else { ?>
                <button id="#SUploadA" class="boutonUpload">Créer un album</button>

                <button id="#addUploadA" onclick="verifEpisode('1')" class="boutonUpload">Ajouter une Piste(s)</button>

                <button id="#gestUpload" onclick="appMyVideo('1')" class="boutonUpload">Gérer mes Albums</button>
              <?php } ?>
              
              <button class="boutonUpload js-close-modale" style="margin-bottom: 7%;">Fermer</button>
              
      </div>

  </section>
<?php $i++; } ?>
  
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
                              <input class="texteBase" id="title" type="text" name="nameSerie" placeholder="Titre" onblur="verif(this, '0', '0')">
                              <div class="classError" align="center">
                                <div id="ErrorTitle0"></div>
                                <div id="ErrorTitle1" style="margin-top: 0%;"></div>
                                <div id="ErrorTitle4"></div>
                              </div>
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

                                <td><input id="bouton<?php echo $butID; ?>" type="button" onclick="newBonus(<?php echo $butID; ?>, 0, 0)" class="buttonNew" value="+" style="display: ;" ></td>

                              <?php } else {echo "<td></td>";} ?>
                                <td><input id="Ep<?php echo $butID; ?>" class="EpisodeSize" style="" type="number" name="Ep<?php echo $butID; ?>" min="1" max="1000" onblur="verif(this, 1,'<?php echo $butID; ?>')" value="<?php echo $butID; ?>"></td>
                                <td><input id="S<?php echo $butID; ?>" class="EpisodeSize" type="number" name="Saison<?php echo $butID; ?>" min="1" max="50" onblur="verif(this,'1','<?php echo $butID; ?>')" value="1"></td>
                                <td><input class="texteBase" id="subTitle<?php echo $butID; ?>" type="text" name="subTitle<?php echo $butID; ?>" placeholder="Titre Secondaire"></td>
                                <td><input class="buttonBase" type="file" name="Video[]" id="fileUpload<?php echo $butID; ?>" onchange="noVideo()" onchange="noVideo()" accept="video/*" ></td>
                                <td><input type='hidden' id="fileUpload1" name='MAX_FILE_SIZE' value='7516192768'></td>
                            </tr>
                          <?php

                          $BonusID++;

                          }

                          echo $BonusID;

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
                                  
                                  <select id="nameSerr" onchange="verifEpisode('0')" name="GenreName" class="selectModal" style="height: 2%; margin-top: 2%; margin-bottom: 2%;"><?php 

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

                              <div class="classError" align="center" id="ErrorTitle8"></div>
                              <div class="classError" align="center" id="ErrorTitle9"></div>
                          </div>

                          <?php

                          while ($BonusID <= 23) {

                            $butID = $BonusID + 1;
                            $realValue = $butID -12; //Permet d'afficher une valeur plus cohérante

                          ?>

                            <tr id="<?php if ($BonusID != 12) {echo 'bonus' . $BonusID; } ?>" style="display: <?php if ($BonusID != 12) { echo "none;";} ?>">
                              <?php if ($BonusID != 23) { ?>

                                <td><input id="bouton<?php echo $butID; ?>" type="button" onclick="newBonus(<?php echo $butID; ?>, 1, 0)" class="buttonNew" value="+" style="display: ;" ></td>

                              <?php } else {echo "<td></td>";} ?>
                                <td><input id="Ep<?php echo $butID; ?>" class="EpisodeSize" type="number" name="Ep<?php echo $butID; ?>" min="1" max="1000" onblur="verif(this,'numero','<?php echo $butID; ?>')" value="<?php echo $realValue; ?>"></td>
                                <td><input id="S<?php echo $butID; ?>" class="EpisodeSize" type="number" name="Saison<?php echo $butID; ?>" min="1" max="50" value="1"></td>
                                <td><input class="texteBase" id="subTitle<?php echo $butID; ?>" type="text" name="subTitle<?php echo $butID; ?>" placeholder="Titre Secondaire"></td>
                                <td><input class="buttonBase" type="file" name="Video[]" id="fileUpload<?php echo $butID; ?>" onchange="noVideo()" onchange="noVideo()" accept="video/*" ></td>
                                <td><input type='hidden' id="fileUpload1" name='MAX_FILE_SIZE' value='7516192768'></td>
                            </tr>
                          <?php

                          $BonusID++;

                          } echo $BonusID; ?>

                          </table>
                          
                          <div>
  
                              <button type="button" onclick="addUpload(0)" class="boutonSubmit" id="Upl" style="display: ;">Upload</button>
                              <button type="button" class="boutonUpload js-close-modale" id="exit">Fermer</button></br>
      
                          </div>
                      </form>
                      
              </div>        
  
          </div>
  
      </div>
  
</section>
 <?php $reqCine = $bdd->query('SELECT nom, Format FROM titre WHERE Format="1" ORDER BY nom '); ?>
<section id="SUploadA" class="modal-back" aria-hidden="true" role="dialog" aria-modal="" style="display: none;">
      
      <div class="modal-bloc js-stope-modale">
  
          <div class="upMargin">
              
              
              <div align="center">
  
                  <div id="error"></div>
  
                  <form action="global.php" name="formUploadA" method="post" enctype="multipart/form-data">
                      
                          
                          <div id="output"></div>
                          <div class="progresseBar" >
                              <div id="progress3" style="width: 0%"></div>
                          </div>
                          <div>
                              <input class="texteBase" id="titleA" type="text" name="nameSerie" placeholder="Album" onblur="verif(this, '0', '0', '1')">
                              <div class="classError" align="center">
                                <div id="ErrorTitle2"></div>
                                <div id="ErrorTitle3"></div>
                                <div id="ErrorTitle5"></div>
                                <div id="ErrorTitle6"></div>
                                <div id="ErrorTitle7"></div>
                              </div>
                          </div>
                          <div>
                            
                          </div>
                          <table>
                          <div align="center">
                            <tr><td></td>
                              <td><select name="Genre" class="selectBase">
                                  <option value="Blues">Blues</option>
                                  <option value="Classic">Classic</option>
                                  <option value="Jazz">Jazz</option>
                                  <option value="Metal">Metal</option>
                                  <option value="Pop">Pop</option>
                                  <option value="Rap">Rap</option>
                                  <option value="Rock">Rock</option>
                              </select></td><td>
                                <input class="texteBase" id="Artiste" type="text" name="titleName" placeholder="Artiste" onblur="verif(this,'3', '0', '1')">
                              </td>

                            <td><input id="min" type="file" name="miniature" style="display: none;" accept="image/jpg, image/png, image/jpeg">
                            <label for="min" class="buttonNew">Pochette</label></td></tr>

                          </div>
                          </table>
                          <table>
                          <tr><td></td>
                              <td align="center"><span class="ecritureUp">Piste</span></td>
                              <td align="center"><span class="ecritureUp">Disk</span></td>
                              <td align="center"><span class="ecritureUp">Titre</span></td>
                              <td align="center"><span class="ecritureUp">Ajouter la musique</span></td>
                          </tr>

                          <?php

                          while ($BonusID <= 43) {

                            $butID = $BonusID + 1;
                            $realValue = $butID - 24; //Permet d'afficher une valeur plus cohérante
                          ?>

                            <tr id="<?php if ($BonusID != 24) {echo 'bonus' . $BonusID; } ?>" style="display: <?php if ($BonusID != 24) { echo "none;";} ?>">
                              <?php if ($BonusID != 43) { ?>

                                <td><input id="bouton<?php echo $butID; ?>" type="button" onclick="newBonus(<?php echo $butID; ?>, 0, 1)" class="buttonNew" value="+" style="display: ;" ></td>

                              <?php } else {echo "<td></td>";} ?>
                                <td><input id="Ep<?php echo $butID; ?>" class="EpisodeSize" type="number" name="Ep<?php echo $butID; ?>" min="1" max="1000" onblur="verif(this,'1','<?php echo $butID; ?>', '1')" value="<?php echo $realValue; ?>"></td>
                                <td><input id="S<?php echo $butID; ?>" class="EpisodeSize" type="number" name="Saison<?php echo $butID; ?>" min="1" max="50" onblur="verif(this,'1','<?php echo $butID; ?>', '1')" value="1"></td>
                                <td><input class="texteBase" id="subTitle<?php echo $butID; ?>" type="text" name="subTitle<?php echo $butID; ?>" placeholder="Titre Secondaire" onblur="verif(this, '2', '<?php echo $butID; ?>', '1')"></td>
                                <td><input class="buttonBase" type="file" name="Video[]" id="fileUpload<?php echo $butID; ?>" onchange="noVideo()" accept="audio/*" ></td>
                                <td><input type='hidden' id="fileUpload1" name='MAX_FILE_SIZE' value='7516192768'></td>
                            </tr>
                          <?php

                          $BonusID++;

                          }

                          ?>

                          </table>
                          <div>
  
                              <button type="button" onclick="newUpload(1)" class="boutonSubmit" id="Upl" style="display: ;">Upload</button>
                              <button type="button" class="boutonUpload js-close-modale" id="exit">Fermer</button></br>
      
                          </div>
                      </form>
                      
              </div>        
  
          </div>
  
      </div>

  
</section>


<section id="addUploadA" class="modal-back" aria-hidden="true" role="dialog" aria-modal="" style="display: none;">
      
      <div class="modal-bloc js-stope-modale">
  
          <div class="upMargin">
              
              
              <div align="center">
  
                  <div id="error"></div>
  
                  <form action="global.php" name="formAddUploadA" method="post" enctype="multipart/form-data">
                      <table>
                          <tr><td></td>
                              <td align="center"><span class="ecritureUp">Piste</span></td>
                              <td align="center"><span class="ecritureUp">Disk</span></td>
                              <td align="center"><span class="ecritureUp">Titre</span></td>
                              <td align="center"><span class="ecritureUp">Ajouter la musique</span></td>
                          </tr>
                          <div id="output2"></div>

                          <div class="progresseBar">
                              <div id="progress4" style="width: 0%"></div>
                          </div>

                          <div>

                              <div align="center">
                                <form name="serrFomr">
                                  
                                  <select id="nameSerrA" onchange="verifEpisode('1')" name="GenreName" class="selectModal" style="height: 2%; margin-top: 2%; margin-bottom: 2%;"><?php 

                                  while ($NameDonne = $reqCine->fetch()) {
                                    echo '<option value="' . $NameDonne['nom'] . '">'.$NameDonne['nom'] .'</option>';
                                  }
  
                                  ?>

                                  </select>

                                </form>
                              </div>
                              <span class="ecritureUp" style="margin-top: 2%;">Piste présente</span>
                              <div align="center">
                                <textarea class="textareaBase" id="ShellA" name="Synopsis" placeholder="synopsis" style="margin-bottom: 2%;" disabled></textarea>
                              </div>

                              <div class="classError" align="center" id="ErrorTitle10"></div>
                              <div class="classError" align="center" id="ErrorTitle11"></div>
                              <div class="classError" align="center" id="ErrorTitle12"></div>
                          </div>

                          <?php
                          while ($BonusID <= 65) {

                            $butID = $BonusID + 1;
                            $realValue = $butID - 44;

                          ?>

                            <tr id="<?php if ($BonusID != 44) {echo 'bonus' . $BonusID; } ?>" style="display: <?php if ($BonusID != 44) { echo "none;";} ?>">
                              <?php if ($BonusID != 63) { ?>

                                <td><input id="bouton<?php echo $butID; ?>" type="button" onclick="newBonus(<?php echo $butID; ?>, 1, 1)" class="buttonNew" value="+" style="display: ;" ></td>

                              <?php } else {echo "<td></td>";} ?>
                                <td><input id="Ep<?php echo $butID; ?>" class="EpisodeSize" type="number" name="Ep<?php echo $butID; ?>" min="1" max="1000" onblur="verif(this,'numero','<?php echo $butID; ?>')" value="<?php echo $realValue; ?>"></td>
                                <td><input id="S<?php echo $butID; ?>" class="EpisodeSize" type="number" name="Saison<?php echo $butID; ?>" min="1" max="50" value="1"></td>
                                <td><input class="texteBase" id="subTitle<?php echo $butID; ?>" type="text" name="subTitle<?php echo $butID; ?>" placeholder="Titre Secondaire"></td>
                                <td><input class="buttonBase" type="file" name="Video[]" id="fileUpload<?php echo $butID; ?>" onchange="noVideo()" onchange="noVideo()" accept="audio/*" ></td>
                                <td><input type='hidden' id="fileUpload1" name='MAX_FILE_SIZE' value='7516192768'></td>
                            </tr>
                          <?php

                          $BonusID++;

                          } ?>

                          </table>
                          
                          <div>
  
                              <button type="button" onclick="addUpload(1)" class="boutonSubmit" id="Upl" style="display: ;">Upload</button>
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





<?php if ($typeFavor != 1) {  

  $verif = new pdo('mysql:host=localhost;dbname=highmediadata', 'HMS','Secure45RootHGMProject',   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

  ?>
 <section id="Favor" class="modal-back" aria-hidden="true" role="dialog" aria-modal="" style="display: none;">

          <div class="modal-bloc js-stope-modale">
              
              <?php if (!empty($_GET['name']) AND empty($_GET['Ep'])) {  

                $vefFavor = $verif->query('SELECT User, Ep, s, Favori, type, Genre FROM favori WHERE User=\'' . $_SESSION['ID'] . '\' AND Ep="0" AND S="0" AND Favori=\'' . $_GET['name'] . '\' AND type=\'' . $GetV . '\' AND Genre="0" ');
                $exiFavir = $vefFavor->fetch();

                if ($exiFavir['Favori'] == "") { ?>

                    <button id="" class="boutonUpload" onclick="appFav(<?php echo "'" . $GetV . "','" . $_GET['name'] . "'"; ?>, '0', '0' ,'0')">Ajouter au favoris</button>

                <?php } else { ?>

                    <button id="" class="boutonUpload" onclick="appFav(<?php echo "'" . $GetV . "','" . $_GET['name'] . "'"; ?>, '0', '0' ,'1')">Supprimer des favoris</button>

                <?php } ?>

                <?php } else {

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

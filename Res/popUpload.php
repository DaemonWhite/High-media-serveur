 <?php

 $ana = new pdo('mysql:host=localhost;dbname=highmediadata', 'root','',   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

 $reqCine = $ana->query('SELECT nom, Format FROM titre WHERE Format="0" ');


 ?> 

  <section id="Upload" class="modal-back" aria-hidden="true" role="dialog" aria-modal="" style="display: none;">
  
          <div class="modal-bloc js-stope-modale">
              
              <button id="#SUpload" class="boutonUpload">Créer une série</button>
      
              <form action="Upload/Upload.php?act=AddMovie" method="post">
                  <button class="boutonUpload">Ajouter un film</button>
              </form>

              <button id="#addUpload" onclick="verifEpisode()" class="boutonUpload">Ajouter un épisode</button>

              <button class="boutonUpload js-close-modale">Fermer</button>
          
      
          </div>
      
  </section>
  
<section id="SUpload" class="modal-back" aria-hidden="true" role="dialog" aria-modal="" style="display: none;">
      
      <div class="modal-bloc js-stope-modale">
  
          <div class="upMargin">
              
              
              <div align="center">
  
                  <div id="error"></div>
  
                  <form action="global.php" name="formUpload" method="post" enctype="multipart/form-data">
                      <table>
                          <tr><td></td>
                              <td align="center"><span class="ecritureUp">Episode</span></td>
                              <td align="center"><span class="ecritureUp">Saison</span></td>
                              <td align="center"><span class="ecritureUp">Titre Secondaire</span></td>
                              <td align="center"><span class="ecritureUp">Ajouter la video</span></td>
                          </tr>
                          <div id="output"></div>
                          <div class="progresseBar" >
                              <div id="progress1" style="width: 0%"></div>
                          </div>
                          <div>
                              <input class="texteBase" id="title" type="text" name="nameSerie" placeholder="Titre" onblur="verif(this, 'titre', '0')">
                              <div class="classError" align="center" id="ErrorTitle"></div>
                          </div>
                          <div>
                            <input type="file" name="miniature">
                            <img id="Vminiature">
                          </div>
                          <div align="left">
                              <select name="Genre" class="selectBase">
                                  <option value="Anime">Animé</option>
                                  <option value="Docu">Documentaire</option>
                                  <option value="Movie">Filme</option>
                                  <option value="TV">Serie télè</option>
                              </select>
                          </div>
                          <div>
                              <select name="type" class="selectBase">
                                <option value="Kodomo">Kodomo</option>
                                <option value="Shonen">Shonener</option>
                                <option value="Shojo">Shojo</option>
                                <option value="Seinen">Seinen</option>
                                <option value="Josei">Josei</option>
                                <option value="Sejin">Sejin</option>
                              </select>
                          </div>
                          <tr>
                              <td><input id="bouton1" type="button" onclick="newBonus(1, 0)" class="buttonNew" value="+" style="display: ;" ></td>
                              <td><input id="Ep1" class="EpisodeSize" type="number" name="Ep1" min="1" max="1000" onblur="verif(this,'numero','1')" value="1"></td>
                              <td><input id="S1" class="EpisodeSize" type="number" name="Saison01" min="1" max="50" value="1"></td>
                              <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire"></td>
                              <td><input class="buttonBase" type="file" name="Video[]" id="fileUpload1" onchange="noVideo()"></td>
                              <td><input type='hidden' id="fileUpload1" name='MAX_FILE_SIZE' value='7516192768'></td>
                          </tr>
      
                          <tr id="bonus1" style="display: none;">
                              <td><input id="bouton2" type="button" onclick="newBonus(2, 0)" class="buttonNew" value="+" style="display: ;" ></td>
                              <td><input id="Ep2" class="EpisodeSize" type="number" name="Ep2" min="1" max="1000" onblur="verif(this,'numero','2')"></td>
                              <td><input class="EpisodeSize" type="number" name="Saison02" min="1" max="50" value="1"></td>
                              <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire"></td>
                              <td><input class="buttonBase" type="file" name="Video[]" id="fileUpload2"></td>
                              <td><input type='hidden' id="fileUpload2" name='MAX_FILE_SIZE' value='7516192768'></td>
                          </tr>
      
                          <tr id="bonus2" style="display: none;" >
                              <td><input id="bouton3" type="button" onclick="newBonus(3, 0)" class="buttonNew" value="+" style="display: ;" ></td>
                              <td><input id="Ep3" class="EpisodeSize" type="number" name="Ep3" min="1" max="1000" onblur="verif(this,'numero','3')"></td>
                              <td><input class="EpisodeSize" type="number" name="Saison03" min="1" max="50" value="1"></td>
                              <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire"></td>
                              <td><input class="buttonBase" type="file" name="Video[]" id="fileUpload3"></td>
                              <td><input type='hidden' id="fileUpload3" name='MAX_FILE_SIZE' value='7516192768'></td>
                          </tr>
                          
      
                          <tr id="bonus3" style="display: none;" >
                              <td><input id="bouton4" type="button" onclick="newBonus(4, 0)" class="buttonNew" value="+" style="display: ;" ></td>
                              <td><input id="Ep4" class="EpisodeSize" type="number" name="Ep4" min="1" max="1000" onblur="verif(this,'numero','4')"></td>
                              <td><input class="EpisodeSize" type="number" name="Saison04" min="1" max="50" value="1"></td>
                              <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire"></td>
                              <td><input class="buttonBase" type="file" name="Video[]" id="fileUpload4"></td>
                              <td><input type='hidden' id="fileUpload" name='MAX_FILE_SIZE' value='7516192768'></td>
                          </tr>
                  
      
                          <tr id="bonus4" style="display: none;" >
                              <td><input id="bouton5" type="button" onclick="newBonus(5, 0)" class="buttonNew" value="+" style="display: ;" ></td>
                              <td><input id="Ep5" class="EpisodeSize" type="number" name="Ep5" min="1" max="1000" onblur="verif(this,'numero','5')"></td>
                              <td><input class="EpisodeSize" type="number" name="Saison05" min="1" max="50" value="1"></td>
                              <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire"></td>
                              <td><input class="buttonBase" type="file" name="Video[]" id="fileUpload5"></td>
                              <td><input type='hidden' id="fileUpload" name='MAX_FILE_SIZE' value='7516192768'></td>
                          </tr>
                  
      
                          <tr id="bonus5" style="display: none;" >
                              <td><input id="bouton6" type="button" onclick="newBonus(6, 0)" class="buttonNew" value="+" style="display: ;" ></td>
                              <td><input id="Ep6" class="EpisodeSize" type="number" name="Ep6" min="1" max="1000" onblur="verif(this,'numero','6')"></td>
                              <td><input class="EpisodeSize" type="number" name="Saison06" min="1" max="50" value="1"></td>
                              <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire"></td>
                              <td><input class="buttonBase" type="file" name="Video[]" id="fileUpload6"></td>
                              <td><input type='hidden' id="nullUpload" name='MAX_FILE_SIZE' value='7516192768'></td>
                          </tr>
                  
      
                          <tr id="bonus6" style="display: none;" >
                              <td><input id="bouton7" type="button" onclick="newBonus(7, 0)" class="buttonNew" value="+" style="display: ;" ></td>
                              <td><input id="Ep7" class="EpisodeSize" type="number" name="Ep7" min="1" max="1000" onblur="verif(this,'numero','7')"></td>
                              <td><input class="EpisodeSize" type="number" name="Saison07" min="1" max="50" value="1"></td>
                              <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire"></td>
                              <td><input class="buttonBase" type="file" name="Video[]" id="fileUpload7"></td>
                              <td><input type='hidden' id="nullUpload" name='MAX_FILE_SIZE' value='7516192768'></td>
                          </tr>
                  
      
                          <tr id="bonus7" style="display: none;" >
                              <td><input id="bouton8" type="button" onclick="newBonus(8, 0)" class="buttonNew" value="+" style="display: ;" ></td>
                              <td><input id="Ep8" class="EpisodeSize" type="number" name="Ep8" min="1" max="1000" onblur="verif(this,'numero','8')"></td>
                              <td><input class="EpisodeSize" type="number" name="Saison08" min="1" max="50" value="1"></td>
                              <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire"></td>
                              <td><input class="buttonBase" type="file" name="Video[]" id="fileUpload8"></td>
                              <td><input type='hidden' id="nullUpload" name='MAX_FILE_SIZE' value='7516192768'></td>
                          </tr>
                  
      
                          <tr id="bonus8" style="display: none;" >
                              <td><input id="bouton9" type="button" onclick="newBonus(9, 0)" class="buttonNew" value="+" style="display: ;" ></td>
                              <td><input id="Ep9" class="EpisodeSize" type="number" name="Ep9" min="1" max="1000" onblur="verif(this,'numero','9')"></td>
                              <td><input class="EpisodeSize" type="number" name="Saison09" min="1" max="50" value="1"></td>
                              <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire"></td>
                              <td><input class="buttonBase" type="file" name="Video[]" id="fileUpload9"></td>
                              <td><input type='hidden' id="nullUpload" name='MAX_FILE_SIZE' value='7516192768'></td>
                          </tr>
                  
      
                          <tr id="bonus9" style="display: none;" >
                              <td><input id="bouton10" type="button" onclick="newBonus(10, 0)" class="buttonNew" value="+" style="display: ;" ></td>
                              <td><input id="Ep10" class="EpisodeSize" type="number" name="Ep10" min="1" max="1000" onblur="verif(this,'numero','10')"></td>
                              <td><input class="EpisodeSize" type="number" name="Saison10" min="1" max="50" value="1"></td>
                              <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire"></td>
                              <td><input class="buttonBase" type="file" name="Video[]" id="fileUpload10"></td>
                              <td><input type='hidden' id="nullUpload" name='MAX_FILE_SIZE' value='7516192768'></td>
                          </tr>
      
                          <tr id="bonus10" style="display: none;">
                              <td><input id="bouton11" type="button" onclick="newBonus(11, 0)" class="buttonNew" value="+" style="display: ;" ></td>
                              <td><input id="Ep11" class="EpisodeSize" type="number" name="Ep11" min="1" max="1000" onblur="verif(this,'numero','11')"></td>
                              <td><input class="EpisodeSize" type="number" name="Saison11" min="1" max="50" value="1"></td>
                              <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire"></td>
                              <td><input class="buttonBase" type="file" name="Video[]" id="fileUpload11"></td>
                              <td><input type='hidden' id="nullUpload" name='MAX_FILE_SIZE' value='7516192768'></td>
                          </tr>
      
      
                          <tr id="bonus11" style="display: none;">
                              <td></td>
                              <td><input id="Ep12" class="EpisodeSize" type="number" name="Ep12" min="1" max="1000" onblur="verif(this,'numero','12')"></td>
                              <td><input class="EpisodeSize" type="number" name="Saison12" min="1" max="50" value="1"></td>
                              <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire"></td>
                              <td><input class="buttonBase" type="file" name="Video[]" id="fileUpload12"></td>
                              <td><input type='hidden' id="nullUpload" name='MAX_FILE_SIZE' value='7516192768'></td>
                          </tr>
                          </table>
                          <span class="ecritureUp" style="margin-top: 2%;">Synopsis</span>
                          <div align="center">
  
                              <textarea class="textareaBase" name="Synopsis" placeholder="synopsis"></textarea>
                          </div>
                          <div>
  
                              <button type="button" onclick="newUpload()" class="boutonSubmit" id="Upl" style="display: ;">Upload</button>
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
                              <td align="center"><span class="ecritureUp">Episode</span></td>
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
                              <td><input class="buttonBase" type="file" name="Video[]" id="fileUpload13" onchange="noVideo()"></td>
                              <td><input type='hidden' id="fileUpload13" name='MAX_FILE_SIZE' value='7516192768'></td>
                          </tr>
      
                          <tr id="bonus13" style="display: none;">
                              <td><input id="bouton14" type="button" onclick="newBonus(14, 1)" class="buttonNew" value="+" style="display: ;" ></td>
                              <td><input id="Ep14" class="EpisodeSize" type="number" name="Ep14" min="1" max="1000" onblur="verif(this,'numero','14')"></td>
                              <td><input class="EpisodeSize" type="number" name="Saison02" min="1" max="50" value="1"></td>
                              <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire"></td>
                              <td><input class="buttonBase" type="file" name="Video[]" id="fileUpload14"></td>
                              <td><input type='hidden' id="fileUpload14" name='MAX_FILE_SIZE' value='7516192768'></td>
                          </tr>
      
                          <tr id="bonus14" style="display: none;" >
                              <td><input id="bouton15" type="button" onclick="newBonus(15, 1)" class="buttonNew" value="+" style="display: ;" ></td>
                              <td><input id="Ep15" class="EpisodeSize" type="number" name="Ep15" min="1" max="1000" onblur="verif(this,'numero','15')"></td>
                              <td><input class="EpisodeSize" type="number" name="Saison03" min="1" max="50" value="1"></td>
                              <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire"></td>
                              <td><input class="buttonBase" type="file" name="Video[]" id="fileUpload15"></td>
                              <td><input type='hidden' id="fileUpload15" name='MAX_FILE_SIZE' value='7516192768'></td>
                          </tr>
                          
      
                          <tr id="bonus15" style="display: none;" >
                              <td><input id="bouton16" type="button" onclick="newBonus(16, 1)" class="buttonNew" value="+" style="display: ;" ></td>
                              <td><input id="Ep16" class="EpisodeSize" type="number" name="Ep16" min="1" max="1000" onblur="verif(this,'numero','16')"></td>
                              <td><input class="EpisodeSize" type="number" name="Saison04" min="1" max="50" value="1"></td>
                              <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire"></td>
                              <td><input class="buttonBase" type="file" name="Video[]" id="fileUpload16"></td>
                              <td><input type='hidden' id="fileUpload16" name='MAX_FILE_SIZE' value='7516192768'></td>
                          </tr>
                  
      
                          <tr id="bonus16" style="display: none;" >
                              <td><input id="bouton17" type="button" onclick="newBonus(17, 1)" class="buttonNew" value="+" style="display: ;" ></td>
                              <td><input id="Ep17" class="EpisodeSize" type="number" name="Ep17" min="1" max="1000" onblur="verif(this,'numero','17')"></td>
                              <td><input class="EpisodeSize" type="number" name="Saison05" min="1" max="50" value="1"></td>
                              <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire"></td>
                              <td><input class="buttonBase" type="file" name="Video[]" id="fileUpload17"></td>
                              <td><input type='hidden' id="fileUpload17" name='MAX_FILE_SIZE' value='7516192768'></td>
                          </tr>
                  
      
                          <tr id="bonus17" style="display: none;" >
                              <td><input id="bouton18" type="button" onclick="newBonus(18, 1)" class="buttonNew" value="+" style="display: ;" ></td>
                              <td><input id="Ep18" class="EpisodeSize" type="number" name="Ep18" min="1" max="1000" onblur="verif(this,'numero','18')"></td>
                              <td><input class="EpisodeSize" type="number" name="Saison06" min="1" max="50" value="1"></td>
                              <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire"></td>
                              <td><input class="buttonBase" type="file" name="Video[]" id="fileUpload18"></td>
                              <td><input type='hidden' id="fileUpload18" name='MAX_FILE_SIZE' value='7516192768'></td>
                          </tr>
                  
      
                          <tr id="bonus18" style="display: none;" >
                              <td><input id="bouton19" type="button" onclick="newBonus(19, 1)" class="buttonNew" value="+" style="display: ;" ></td>
                              <td><input id="Ep19" class="EpisodeSize" type="number" name="Ep19" min="1" max="1000" onblur="verif(this,'numero','19')"></td>
                              <td><input class="EpisodeSize" type="number" name="Saison07" min="1" max="50" value="1"></td>
                              <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire"></td>
                              <td><input class="buttonBase" type="file" name="Video[]" id="fileUpload19"></td>
                              <td><input type='hidden' id="fileUpload19" name='MAX_FILE_SIZE' value='7516192768'></td>
                          </tr>
                  
      
                          <tr id="bonus19" style="display: none;" >
                              <td><input id="bouton20" type="button" onclick="newBonus(20, 1)" class="buttonNew" value="+" style="display: ;" ></td>
                              <td><input id="Ep20" class="EpisodeSize" type="number" name="Ep20" min="1" max="1000" onblur="verif(this,'numero','20')"></td>
                              <td><input class="EpisodeSize" type="number" name="Saison08" min="1" max="50" value="1"></td>
                              <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire"></td>
                              <td><input class="buttonBase" type="file" name="Video[]" id="fileUpload20"></td>
                              <td><input type='hidden' id="fileUpload20" name='MAX_FILE_SIZE' value='7516192768'></td>
                          </tr>
                  
      
                          <tr id="bonus20" style="display: none;" >
                              <td><input id="bouton21" type="button" onclick="newBonus(21, 1)" class="buttonNew" value="+" style="display: ;" ></td>
                              <td><input id="Ep21" class="EpisodeSize" type="number" name="Ep21" min="1" max="1000" onblur="verif(this,'numero','21')"></td>
                              <td><input class="EpisodeSize" type="number" name="Saison09" min="1" max="50" value="1"></td>
                              <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire"></td>
                              <td><input class="buttonBase" type="file" name="Video[]" id="fileUpload21"></td>
                              <td><input type='hidden' id="fileUpload21" name='MAX_FILE_SIZE' value='7516192768'></td>
                          </tr>
                  
      
                          <tr id="bonus21" style="display: none;" >
                              <td><input id="bouton22" type="button" onclick="newBonus(22, 1)" class="buttonNew" value="+" style="display: ;" ></td>
                              <td><input id="Ep22" class="EpisodeSize" type="number" name="Ep22" min="1" max="1000" onblur="verif(this,'numero','22')"></td>
                              <td><input class="EpisodeSize" type="number" name="Saison10" min="1" max="50" value="1"></td>
                              <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire"></td>
                              <td><input class="buttonBase" type="file" name="Video[]" id="fileUpload22"></td>
                              <td><input type='hidden' id="fileUpload22" name='MAX_FILE_SIZE' value='7516192768'></td>
                          </tr>
      
                          <tr id="bonus22" style="display: none;">
                              <td><input id="bouton23" type="button" onclick="newBonus(23, 1)" class="buttonNew" value="+" style="display: ;" ></td>
                              <td><input id="Ep23" class="EpisodeSize" type="number" name="Ep23" min="1" max="1000" onblur="verif(this,'numero','23')"></td>
                              <td><input class="EpisodeSize" type="number" name="Saison11" min="1" max="50" value="1"></td>
                              <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire"></td>
                              <td><input class="buttonBase" type="file" name="Video[]" id="fileUpload23"></td>
                              <td><input type='hidden' id="fileUpload23" name='MAX_FILE_SIZE' value='7516192768'></td>
                          </tr>
      
      
                          <tr id="bonus23" style="display: none;">
                              <td></td>
                              <td><input id="Ep24" class="EpisodeSize" type="number" name="Ep24" min="1" max="1000" onblur="verif(this,'numero','24')"></td>
                              <td><input class="EpisodeSize" type="number" name="Saison12" min="1" max="50" value="1"></td>
                              <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire"></td>
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
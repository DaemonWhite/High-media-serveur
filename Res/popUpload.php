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
                          <div align="left">
                              <select name="Genre" class="selectBase">
                                  <option value="Anime">Animé</option>
                                  <option value="Docu">Documentaire</option>
                                  <option value="Movie">Filme</option>
                                  <option value="TV">Serie télè</option>
                              </select>
                          </div>
                          <tr>
                              <td><input id="bouton1" type="button" onclick="newBonus(1)" class="buttonNew" value="+" style="display: ;" ></td>
                              <td><input id="Ep1" class="EpisodeSize" type="number" name="Ep1" min="1" max="1000" onblur="verif(this,'numero','1')" value="1"></td>
                              <td><input id="S1" class="EpisodeSize" type="number" name="Saison01" min="1" max="50" value="1"></td>
                              <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire"></td>
                              <td><input class="buttonBase" type="file" name="Video[]" id="fileUpload1" onchange="noVideo()"></td>
                              <td><input type='hidden' id="fileUpload1" name='MAX_FILE_SIZE' value='7516192768'></td>
                          </tr>
      
                          <tr id="bonus1" style="display: none;">
                              <td><input id="bouton2" type="button" onclick="newBonus(2)" class="buttonNew" value="+" style="display: ;" ></td>
                              <td><input id="Ep2" class="EpisodeSize" type="number" name="Ep2" min="1" max="1000" onblur="verif(this,'numero','2')"></td>
                              <td><input class="EpisodeSize" type="number" name="Saison02" min="1" max="50" value="1"></td>
                              <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire"></td>
                              <td><input class="buttonBase" type="file" name="Video[]" id="fileUpload2"></td>
                              <td><input type='hidden' id="fileUpload2" name='MAX_FILE_SIZE' value='7516192768'></td>
                          </tr>
      
                          <tr id="bonus2" style="display: none;" >
                              <td><input id="bouton3" type="button" onclick="newBonus(3)" class="buttonNew" value="+" style="display: ;" ></td>
                              <td><input id="Ep3" class="EpisodeSize" type="number" name="Ep3" min="1" max="1000" onblur="verif(this,'numero','3')"></td>
                              <td><input class="EpisodeSize" type="number" name="Saison03" min="1" max="50" value="1"></td>
                              <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire"></td>
                              <td><input class="buttonBase" type="file" name="Video[]" id="fileUpload3"></td>
                              <td><input type='hidden' id="fileUpload3" name='MAX_FILE_SIZE' value='7516192768'></td>
                          </tr>
                          
      
                          <tr id="bonus3" style="display: none;" >
                              <td><input id="bouton4" type="button" onclick="newBonus(4)" class="buttonNew" value="+" style="display: ;" ></td>
                              <td><input id="Ep4" class="EpisodeSize" type="number" name="Ep4" min="1" max="1000" onblur="verif(this,'numero','4')"></td>
                              <td><input class="EpisodeSize" type="number" name="Saison04" min="1" max="50" value="1"></td>
                              <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire"></td>
                              <td><input class="buttonBase" type="file" name="Video[]" id="fileUpload4"></td>
                              <td><input type='hidden' id="fileUpload" name='MAX_FILE_SIZE' value='7516192768'></td>
                          </tr>
                  
      
                          <tr id="bonus4" style="display: none;" >
                              <td><input id="bouton5" type="button" onclick="newBonus(5)" class="buttonNew" value="+" style="display: ;" ></td>
                              <td><input id="Ep5" class="EpisodeSize" type="number" name="Ep5" min="1" max="1000" onblur="verif(this,'numero','5')"></td>
                              <td><input class="EpisodeSize" type="number" name="Saison05" min="1" max="50" value="1"></td>
                              <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire"></td>
                              <td><input class="buttonBase" type="file" name="Video[]" id="fileUpload5"></td>
                              <td><input type='hidden' id="fileUpload" name='MAX_FILE_SIZE' value='7516192768'></td>
                          </tr>
                  
      
                          <tr id="bonus5" style="display: none;" >
                              <td><input id="bouton6" type="button" onclick="newBonus(6)" class="buttonNew" value="+" style="display: ;" ></td>
                              <td><input id="Ep6" class="EpisodeSize" type="number" name="Ep6" min="1" max="1000" onblur="verif(this,'numero','6')"></td>
                              <td><input class="EpisodeSize" type="number" name="Saison06" min="1" max="50" value="1"></td>
                              <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire"></td>
                              <td><input class="buttonBase" type="file" name="Video[]" id="fileUpload6"></td>
                              <td><input type='hidden' id="nullUpload" name='MAX_FILE_SIZE' value='7516192768'></td>
                          </tr>
                  
      
                          <tr id="bonus6" style="display: none;" >
                              <td><input id="bouton7" type="button" onclick="newBonus(7)" class="buttonNew" value="+" style="display: ;" ></td>
                              <td><input id="Ep7" class="EpisodeSize" type="number" name="Ep7" min="1" max="1000" onblur="verif(this,'numero','7')"></td>
                              <td><input class="EpisodeSize" type="number" name="Saison07" min="1" max="50" value="1"></td>
                              <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire"></td>
                              <td><input class="buttonBase" type="file" name="Video[]" id="fileUpload7"></td>
                              <td><input type='hidden' id="nullUpload" name='MAX_FILE_SIZE' value='7516192768'></td>
                          </tr>
                  
      
                          <tr id="bonus7" style="display: none;" >
                              <td><input id="bouton8" type="button" onclick="newBonus(8)" class="buttonNew" value="+" style="display: ;" ></td>
                              <td><input id="Ep8" class="EpisodeSize" type="number" name="Ep8" min="1" max="1000" onblur="verif(this,'numero','8')"></td>
                              <td><input class="EpisodeSize" type="number" name="Saison08" min="1" max="50" value="1"></td>
                              <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire"></td>
                              <td><input class="buttonBase" type="file" name="Video[]" id="fileUpload8"></td>
                              <td><input type='hidden' id="nullUpload" name='MAX_FILE_SIZE' value='7516192768'></td>
                          </tr>
                  
      
                          <tr id="bonus8" style="display: none;" >
                              <td><input id="bouton9" type="button" onclick="newBonus(9)" class="buttonNew" value="+" style="display: ;" ></td>
                              <td><input id="Ep9" class="EpisodeSize" type="number" name="Ep9" min="1" max="1000" onblur="verif(this,'numero','9')"></td>
                              <td><input class="EpisodeSize" type="number" name="Saison09" min="1" max="50" value="1"></td>
                              <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire"></td>
                              <td><input class="buttonBase" type="file" name="Video[]" id="fileUpload9"></td>
                              <td><input type='hidden' id="nullUpload" name='MAX_FILE_SIZE' value='7516192768'></td>
                          </tr>
                  
      
                          <tr id="bonus9" style="display: none;" >
                              <td><input id="bouton10" type="button" onclick="newBonus(10)" class="buttonNew" value="+" style="display: ;" ></td>
                              <td><input id="Ep10" class="EpisodeSize" type="number" name="Ep10" min="1" max="1000" onblur="verif(this,'numero','10')"></td>
                              <td><input class="EpisodeSize" type="number" name="Saison10" min="1" max="50" value="1"></td>
                              <td><input class="texteBase" id="subTitle" type="text" name="titleName" placeholder="Titre Secondaire"></td>
                              <td><input class="buttonBase" type="file" name="Video[]" id="fileUpload10"></td>
                              <td><input type='hidden' id="nullUpload" name='MAX_FILE_SIZE' value='7516192768'></td>
                          </tr>
      
                          <tr id="bonus10" style="display: none;">
                              <td><input id="bouton11" type="button" onclick="newBonus(11)" class="buttonNew" value="+" style="display: ;" ></td>
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
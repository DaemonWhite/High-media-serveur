<!DOCTYPE html>
<html>
<head>
	<title>Bonjour je fonctione</title>
</head>
<body>

	<div id="Conex" class="modal-back" aria-hidden="true" role="dialog" aria-modal="" >
		
    
		    <div align="center" class="CupeInfo js-stope-modale">
		         <p class="colorTitle">Bienvenu sur high media serveur </p>
		    
		         <?php if(isset($erreur)) {echo '<font color="red">'.$erreur."</font>";}?>
		    
		        <form action="" method="post">
		        <table><tr><td>
		            Pseudo: </td><td><input type="text" name="PseudConnect" placeholder="pseudo" class="texteBase"></td></tr>
		            <tr><td>Mot de passe:</td><td> <input type="password" name="PassConnect" placeholder="Mot de passe" class="texteBase"></td></tr>		<tr></tr>
		    
		            <tr><td><input type="checkbox" id="SaveMe" name="SaveMe" checked>
		            <label for="SaveMe">Se souvenir de moi</label></td></tr>
		            </table><br>
		            <input type="submit" name="DemandeConexion" value="Connexion" class="buttonBase">
		            
		    
		        </form><br>
		    
		    
		        <li><a href="?invite=1" class="SelectionBase js-close-modale">Rester connecter en temp que invité</a></li>
		    

		    </div>
		

	</div>

	<section id="Upload" class="modal-back" aria-hidden="true" role="dialog" aria-modal="">
		
			<div class="modal-bloc js-stope-modale">
				
				<form action="Upload/Upload.php?act=Serie" method="post">
				<button class="boutonUpload">Créer une série</button>
				</form>
				<form action="Upload/Upload.php?act=AddMovie" method="post">
					<button class="boutonUpload">Ajouter un film</button>
				</form>
				<form action="Upload/Upload.php?act=AddEp" method="post">
					<button class="boutonUpload">Ajouter un épisode</button>
				</form>
				<button class="boutonUpload js-close-modale">Fermer</button>
			

			</div>



	</section>

	<section id="UploadS" class="modal-back" aria-hidden="true" role="dialog" aria-modal="">
		
			<div class="modal-bloc js-stope-modale">
				
				<button id="Res/popup.php#UploadS" class="boutonUpload js-close-modale">Créer une série</button>

			</div>

	</section>

	  <section id="NDispo" class="modal-back" aria-hidden="true" role="dialog" aria-modal="" style="display: none;">
    
 	     <div class="CupeInfo js-stope-modale">

             
             <p style="text-align: center; margin-top: 5%; font-size: 3vh; color: white;"> Cette fonctionnalité saura ajouter plus tard. </p>

              <button class="boutonUpload js-close-modale" style="margin-top: 5%; margin-bottom: 3%; margin-left: 20%">Fermer</button>
          
          </div>

  	</section>

  	<section id="YNConnecte" class="modal-back" aria-hidden="true" role="dialog" aria-modal="" style="display: none;">
    
 	     <div class="CupeInfo js-stope-modale">

             
             <p style="text-align: center; margin-top: 5%; font-size: 3vh; color: white;"> Vous devez vous connecter pour profiter de ces fonctionnalités. </p>

              <button class="boutonUpload js-close-modale" style="margin-top: 5%; margin-bottom: 3%; margin-left: 20%">Fermer</button>
          
          </div>

  	</section>

  	<section id="noDown" class="modal-back" aria-hidden="true" role="dialog" aria-modal="" style="display: none;">
    
 	     <div class="CupeInfo js-stope-modale">

             
             <p style="text-align: center; margin-top: 5%; font-size: 3vh; color: white;"> hmmm, j'ai un doute sur votre Inteligence mais il y'a rien à télècharger ici! </p>

              <button class="boutonUpload js-close-modale" style="margin-top: 5%; margin-bottom: 3%; margin-left: 20%">Fermer</button>
          
          </div>

  	</section>


	<!-- <div>			Exemple popup
            
            <aside id="conex" class="modal-back" aria-hidden="true" role="dialog" aria-modal="" style="display: none;">
                        
                <div class="modal-bloc js-stope-modale">
                            
                        <h1 >Bonjour je sui un modal</h1>
                        <button class="js-close-modale">Fermer</button>

                </div>

            </aside>
            <script src="Res/scriptModal.js"></script>

        </div> -->


</body>
</html>
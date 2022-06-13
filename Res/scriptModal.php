<?php
	
	$AnaTitle = new pdo('mysql:host=hms-servdb-1;dbname=highmediadata', 'HMS','Secure45RootHGMProject',   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	$TitleExiste = $AnaTitle->query("SELECT nom FROM titre ORDER BY nom ");

?> 



let form, progressBare;
var totalVideo = 1
var totalAudio = 1
var addTotalVideo = 1
var addTotalAudio = 1 // Pour plus tart
var Envoi = 0
var Erreur = []
var II = 1 //Generateur de variable
// Erreur type Titre
var Erreur = 0;

var RestoreModiEp = [];
var RestoreModiSa = [];
var RestoreModiSu = [];

var genreNumber = [];
genreNumber[0] = 1; // Genre nombre selectioner
genreNumber[1] = 1; // Genre nombre selectioner
genreNumber[2] = 1; // Genre nombre selectioner
genreNumber[3] = 1; // Genre nombre selectioner


const FocusSelect = "button, a, input,textarea"
let focusValide = []

var derErreur

var displayNum1 = []

	while ( II < 65) {
	displayNum1["bonus"+II] = 0;
	II++;
	}

// Erreur = 0 Titre; -1 Artiste

function erorInitilise() {

	Erreur = 0;

}

function menuUpload(Loc)
    {
        if (Loc === "serie") 
        {
            window.location = "Video.php";
        }
    }




	

function newBonus(num, type, is) {

	var num2 = num
	var num3 = num
	var addTotal = 0
    num2 - 1;
    num3 + 1;
	if (num < 100) 
	{
		var did = document.getElementById("bonus" + num)
		var visual = document.getElementById("bouton" + num)

		var Ep = document.getElementById("Ep" + num).value
		

		var visual2 = document.getElementById("bouton" + (num2 - 1))

		console.log(visual2)

		var Eisode = Ep
		Eisode++ 

		

		if (displayNum1["bonus" + num] == 0) 
		{

			visual.setAttribute('value', '-')
			
 
			if (num > 1 && num != 13 && num != 25 && num != 45) {
				visual2.style.display = "none"
			}


			did.style.display = null
			var EpV = document.getElementById("Ep" + (num3 + 1))
			console.log(EpV, num3, "test")

			displayNum1["bonus" + num] = 1
			EpV.setAttribute('value', Eisode)
			
			addTotal++;

		} else {

			if (num > 1 && num != 13 && num != 25 && num != 45) {
				visual.setAttribute('value', '+')
				visual2.style.display = null;
			} else {
				visual.setAttribute('value', '+')
			}
				
			did.style.display = "none"
			displayNum1["bonus" + num] = 0
			

			addTotal--;

		}
	}

	if (type == 0) {

		if (is == 0 ) {

			totalVideo = totalVideo + addTotal;

		} else {

			totalAudio = totalAudio + addTotal;

		}

	} else {

		if (is == 0) {

			addTotalVideo = addTotalVideo + addTotal;

		} else {

			addTotalAudio = addTotalAudio + addTotal;

		}

	}
	console.log(totalAudio, totalVideo, addTotalAudio, addTotalVideo)
}


function surligne(champ, EnvEroor)
{
	//console.log(champ, EnvEroor)

   if(EnvEroor == true){

         champ.style.border = "3px #BC240D solid";
         
     } else {
     	champ.style.border  = "";
     	
     }

}

function ErrorMessage() {

	alert("coriger les erreur")

}

function noVideo() {
	vide = 1
	numVideo = 13

	while (totalVideo > numVideo) {

		var verifVideo = document.getElementById("fileUpload" + vide)

		console.log(verifVideo.value)

		if (verifVideo.value == "") {

			surligne(verifVideo, true);
			document.getElementById("ErrorTitle" ).innerHTML = "Veulier choisire une video";
			return false;
		}


		vide++
		numVideo++;

	}

}

function ErreurVerif(TypeEr, champ , erro){
	var errorTitleTT

	if (erro == 0){ 
		Title0 = document.getElementById("title");
		var errorTitle0 = document.getElementById("ErrorTitle0")
		var errorTitle1 = document.getElementById("ErrorTitle1")
		var errorTitle2 = document.getElementById("ErrorTitle4")
		errorTitleTT = "Titre déja existan allez dans ajouter un épisode <br> ou <br> ajouter une précision Exemple ''Hunter X Hunter'' (2011) pour le diférencier de sa vertion de 1999";
	} else if (erro == 1){ 
		Title0 = document.getElementById("titleA");
		var errorTitle0 = document.getElementById("ErrorTitle2")
		var errorTitle1 = document.getElementById("ErrorTitle3")
		var errorTitle2 = document.getElementById("ErrorTitle5")
		var errorTitle3 = document.getElementById("ErrorTitle6")
		var errorTitle4 = document.getElementById("ErrorTitle7")
		 errorTitleTT ="Album déja existan allez dans ajouter un épisode <br> ou <br> ajouter une précision Entre parantése si c'est un remaster ou par un autre artiste";
	} else if (erro == 2){

		var errorTitle2 = document.getElementById("ErrorTitle8")

	} else if (erro == 3) {

		var errorTitle2 = document.getElementById("ErrorTitle11")

	}


	if (TypeEr == -1) 
	{
		surligne(champ, false);
	} else if (TypeEr == 0) 
	{
	  errorTitle0.innerHTML = errorTitleTT;
	} else if (TypeEr == 1) {
	  errorTitle2.innerHTML = "Il manque votre fichier à uploader veulier le rajouter ou suprimer la ou les lignes non nécessaire"
	} else if (TypeEr == 2) {
	  errorTitle3.innerHTML = "Le titre des pistes sont obligatoires"
	} else if (TypeEr == 3) {
			errorTitle4.innerHTML = "Nom de l'artiste obligatoire";
	}

	if (TypeEr >= 0) {surligne(champ, true);}
}

function anaEp(Ep, total, isMus , ErrorArea ,champ=false, ignore=0) { // vérifie si les episode son complétement rensegner

	console.log(ErrorArea)

	var numEp = 1
	var numEpC = numEp

	if (isMus == 1) 
	{
	 	numEpC = 25;
	} else if (isMus == 2) 
	{
		numEp = 13;
		numEpC = 13;
	}

	  var ErrorTitleTT // Diférence music et video
	  if (isMus == 0 || isMus == 2) {
	  	
	  		ErrorTitleTT = "Vous ne pouver avoir qu'un épisode a la même valeur"
	  		ErrorTitleTN = "L'episode doit étre remplie par une valleur numerique ou ne doit êtres NULL ainsi que la saison" 

	  	} else if (isMus == 1) { 
	  	
	  		ErrorTitleTT =  "Vous ne pouver avoir qu'une piste a la même valeur sur le même disque"
	  		ErrorTitleTN =  "La piste doit étre remplie par une valleur numerique ou ne doit êtres NULL de meme que le disque"
	  	
	  	}

	while (total >= numEp) {
				
				console.log(Ep)

				VerifEp = document.getElementById("Ep" + numEpC)
				VerSaison = document.getElementById("S" + numEpC).value

				VerifEp0 = document.getElementById("Ep" + Ep)
				VerSaison0 = document.getElementById("S" + Ep)

				surligne(VerifEp0, false)
				surligne(VerSaison0, false)

				if ((VerifEp0.value === VerifEp.value) && (VerifEp != VerifEp0)) {

					if (VerSaison == VerSaison0.value){

						ErrorArea.innerHTML = ErrorTitleTT;
						ignore = numEp
						return ignore;

					}


				} else {

					if (VerifEp0.value == "" || VerSaison0.value == "") {
						console.log(VerSaison0)
					ErrorArea.innerHTML = ErrorTitleTN;
					ignore = numEp
					return ignore;

					}
					
				}

				numEp++;
				numEpC++;

	}
	console.log("Tous vas bien")
	numEp =0;
	return ignore;
}


function verif(champ, Objet, ZoneEp, mus=0) {
	var Title0
	var TotalCons
	var retError = []
	console.log(champ, Objet, ZoneEp, mus)
	if (mus == 0){ 
		Title0 = document.getElementById("title");
		var errorTitle0 = document.getElementById("ErrorTitle0")
		var errorTitle1 = document.getElementById("ErrorTitle1")
		TotalCons = totalVideo
		num = 1
	} else if (mus == 1) { 
		Title0 = document.getElementById("titleA");
		var errorTitle0 = document.getElementById("ErrorTitle2")
		var errorTitle1 = document.getElementById("ErrorTitle3")
		TotalCons = totalAudio
		console.log(mus)
		num = 25
	} else if (mus == 2) {
		var errorTitle0 = document.getElementById("ErrorTitle8")
		var errorTitle1 = document.getElementById("ErrorTitle9")
		TotalCons = 13 +addTotalVideo
		num = 13

	} else if (mus == 3) {
		
		TotalCons = addTotalAudio

	}

	if (errorTitle0.innerHTML != ""){
		errorTitle1.style.marginTop = "1%";
	} else {
		errorTitle1.style.marginTop = "0%";
	}

	if (Objet == 0) {

		if(champ.value.length < 1)
		{
		   surligne(champ, true);
		   var ErrorTitleTT // Diférence music et video
		   if (mus == 0) {ErrorTitleTT = "Titre obligatoire"} else { ErrorTitleTT =  "Titre de l'Album obligatoire"}
		   errorTitle0.innerHTML = ErrorTitleTT;

			return champ;
		
		} else {
		 	errorTitle0.innerHTML = null;
		   	surligne(champ, false);
		   	
		} 

		verifiMyChest(Objet, mus, champ, champ)

	} else if (Objet == 1) { // verification des episeode ou des piste

		var ern = 0;
		var i = 0;

		while (TotalCons >= num) {
				//console.log(TotalCons, num)
				anErro = anaEp(num, TotalCons, mus, errorTitle1)

				if (anErro != 0) {

					retError.push(anErro)
					ern++;
				}

			num++;
		}

		while (ern > i) {
			Ep = document.getElementById("Ep"+retError[i])
			Sa = document.getElementById("S"+retError[i])
			console.log(Ep, retError[i], i)
			surligne(Ep, true)
			surligne(Sa, true)
			i++;
		}

		if (Ern =! 0 ) {
			return champ;
		}

		console.log(retError)

	} else if (Objet == 2) { // verification de Titre des pistes
		var num = 1
		var numSub = 25

		while (TotalCons >= num) {

				VerifSub = document.getElementById("subTitle" + numSub)

				VerifSub0 = document.getElementById("subTitle" + ZoneEp)

				if ((VerifSub0.value === VerifSub.value) && (VerifSub != champ)) {

					if (VerSaison == VerSaison0){

						errorTitle1.innerHTML = ErrorTitleTT;
						surligne(VerifSub0, true);
					} else {
						errorTitle1.innerHTML = "";
						surligne(VerifSub, false);
					}

					
					return false;

				} else {

					if (champ.value == "") {

					surligne(VerifSub0, true);
					errorTitle1.innerHTML = ErrorTitleTN;

					} else {

						console.log(VerifSub0, TotalCons)
						errorTitle1.innerHTML = null;
						surligne(champ, false);

					}
				}
				num++;

			}

	} else if (Objet == 3) {

		artiste = document.getElementById("Artiste")

		if (artiste.value == "") 
		{
			champ = true;
			ErreurVerif(3, artiste , 1)
			return champ;

		} else {

			ErreurVerif(-1, artiste , 1)
			document.getElementById('ErrorTitle7').innerHTML = ""

		}

	}

}


callback = readData;

function uploadFile(formulaire){

	var is;

	if (formulaire == "formUpload") {

		loadBar = "progress1"
		is = 0
		src = "upload/Upload.php"

	} else if (formulaire == "formUploadA") {

		loadBar = "progress3"
		is = 1
		src = "upload/Upload.php"

	} else if (formulaire == "formAddUpload") {

		loadBar = "progress2"
		is = 0
		src = "upload/addUpload.php"

	} else if (formulaire == "formAddUploadA"){

		loadBar = "progress4"
		is = 1
		src = "upload/addUpload.php"

	}

	console.log(formulaire, is)

	form = document.forms.namedItem(formulaire);
	progressBare = document.getElementById(loadBar);
	
	  var
	    oOutput = document.getElementById("ErrorTitle"),
	    oData = new FormData(document.forms.namedItem(formulaire));
	
	  oData.append("CustomField", "This is some extra data");
	  oData.append("IsMusic", is);
	
	  let oReq = new XMLHttpRequest();
	  oReq.upload.onloadstart = function (e) {
	  	progressBare.style.display = null;
	  	progressBare.style.width = "0%";
	  	progressBare.max = e.total;
	  	form.disabled = true;
	  }

	  oReq.upload.onprogress = function (e) {
	  	var charge =  ((e.loaded / e.total)*100 )
	  	progressBare.style.width = charge + "%";
	  }

	  oReq.upload.onloadend = function (e) {
	  	form.disabled = true;
	  }



	  oReq.open("POST", src, true);
	  oReq.onload = function(oEvent) {
	    if (oReq.readyState == 4 && (oReq.status == 200 || oReq.status == 0)) {
	      callback(oReq.responseText);
	    } else {
	      oOutput.innerHTML = "ErrorTitle " + oReq.status + " occurred uploading your file.<br \/>";
	    }
	  };
	
	  oReq.send(oData);
}

function genreWhile(is, iSmusSe, supp, val = null, text = null,)
{

	var dell = genreNumber[iSmusSe];
	var num = 0;
	console.log(num, dell, iSmusSe)
	if (supp == 1) 
	{
		while (num < dell)
		{
			is.remove(0);
			num++;
		}

	} else {


		while (num < dell)
		{
			
			var opt = document.createElement("option")
			opt.value = val[num],
			opt.text = text[num],
			is.add(opt, is.options[num]);

			console.log(val[num], text[num], "num =", num, dell)
			num++;
		}


	}

}

function genreSelecte(mus) // Uplaod Video = 0 Search Video = 2 
{
	var genreIdea
	var genreVisu

	if (mus == 0 || mus == 2) 
	{

		if (mus == 0) 
		{
			var theme 	= document.getElementById('genreSelect');
			var type 	= document.getElementById('typeSelect')
		} else {
			var theme 	= document.getElementById('subGen');
			var type 	= document.getElementById('cat')
		}
		
		console.log(type.value, mus)

		genreWhile(theme, mus, 1, genreNumber[mus])
		
		if (type.value == "no") 
		{
			genreIdea = ['no'];
			genreVisu = ['<?php echo $_Lang_Cat_Gen; ?>'];
			PostGenreNumber = 1

		} else if (type.value == "Anime") {
			genreIdea = ['no', 'Kodomo', 'Shonen', 'Shojo', 'Seinen', 'Josei', 'Sejin'];
			genreVisu = ['<?php echo $_Lang_Cat_Gen; ?>', '<?php echo $_Lang_Sub_Kod; ?>', '<?php echo $_Lang_Sub_Shn; ?>', '<?php echo $_Lang_Sub_Sho; ?>', '<?php echo $_Lang_Sub_Sei; ?>', '<?php echo $_Lang_Sub_Jos; ?>', '<?php echo $_Lang_Sub_Sej; ?>'];
			PostGenreNumber = 7
		} else if (type.value == "Docu")  {
			genreIdea = ['no', 'Animal', 'Hist', 'Repor', 'Scienc']
			genreVisu = ['<?php echo $_Lang_Cat_Gen; ?>', "<?php echo $_Lang_Sub_Ani; ?>", "<?php echo $_Lang_Sub_His; ?>", "<?php echo $_Lang_Sub_Rep; ?>", "<?php echo $_Lang_Sub_Sci; ?>"];
			PostGenreNumber = 5
		} else if (type.value == "Movie") {
			genreIdea = ['no', 'Fantast', 'fantasy', 'Horr', 'SF', 'Post-Apo']
			genreVisu = ['<?php echo $_Lang_Cat_Gen; ?>', '<?php echo $_Lang_Sub_Faa; ?>', '<?php echo $_Lang_Sub_Fae; ?>', '<?php echo $_Lang_Sub_Hor; ?>', '<?php echo $_Lang_Sub_Sci; ?>', '<?php echo $_Lang_Sub_Pos; ?>'];
			PostGenreNumber = 6
		} else if (type.value == "TV") 	  {
			genreIdea = ['no', 'JT','poli', 'TR', 'Zap'];
			genreVisu = ['<?php echo $_Lang_Cat_Gen; ?>', '<?php echo $_Lang_Sub_Jeu; ?>', '<?php echo $_Lang_Sub_Pol; ?>', '<?php echo $_Lang_Sub_Tel; ?>', '<?php echo $_Lang_Sub_Zap; ?>'];
			PostGenreNumber = 5
		}	
		genreNumber[mus] = PostGenreNumber
		genreWhile(theme, mus, 0, genreIdea, genreVisu)
	}

}



function newUpload(is) {
	var numVideo = 0;
	var ErrVideo = 25;
	var numMessage = 0;
	var totalIs;
	var erreur = false;

	if (is == 0) {
		aTitle = document.getElementById("title")
		vide = 1;
		totalIs = totalVideo 
	} else {
		aTitle = document.getElementById("titleA")
		aRtiste = document.getElementById("Artiste")
		vide = 25;
		totalIs = totalAudio

		if (aRtiste == "")// Verifi so artiste n'est pas vide
		{
		 	verif(aRtiste, 3 , 0, 1)
			numMessage++;
		} else {

			verif(aRtiste, 3 , 0, 1)

		}

	}

	if (aTitle.value == "") {// verifi si titre n'est pas vide

		verif(aTitle, 0 , 0, is)
		numMessage++;

	} else {

		verifiMyChest(0, is, aTitle, aTitle)

	}
		
		while (totalIs > numVideo) {

			var verifVideo = document.getElementById("fileUpload" + vide)
			var verifTitre = document.getElementById("subTitle" + vide)
	
			if (verifVideo.value == "") {// verifi si les fichier ne son vide
				
				ErreurVerif("1", verifVideo , is)
				numMessage++;
				

			} else {

				ErreurVerif("-1", verifVideo , is)

			}

			erreur = verif(null, 1, vide, is); // verifi tout les episode

			if (erreur == true) {
				numMessage++;
			}

			if (is != 0) {

				if (verifTitre.value == "") { // Verifi l'existance des Titre des piste

					ErreurVerif("2", verifTitre, is)
					console.log(verifTitre)
					numMessage++;
	
				} else {
					ErreurVerif("-1", verifTitre, is)
				}
			}
	
	
		vide++
		numVideo++;
		ErrVideo++;

		console.log(vide,numVideo,ErrVideo)

		}
	
	console.log(numMessage);

	if (numMessage === 0) 
	{
		console.log(verifVideo.value)

		if (is == 0) {

			uploadFile("formUpload")

		} else if(is == 1) {

			uploadFile("formUploadA")

		}

	} else {

		ErrorMessage()

	}
}

function addUpload(is) {
	numVideo = 0;
	vide = 13;
	ErrVideo = 37;
	var numMessage = 0;
	var is2 = is + 1; // Normalise is
		
	if (is == 0) {
		aTitle = document.getElementById("title")
		vide = 13;
		totalIs = addTotalVideo 
	} else {
		aTitle = document.getElementById("titleA")
		aRtiste = document.getElementById("Artiste")
		vide = 45;
		totalIs = addTotalAudio

	}

		
		while (totalIs > numVideo) {

			var verifVideo = document.getElementById("fileUpload" + vide)
			var verifTitre = document.getElementById("subTitle" + vide)
	
			if (verifVideo.value == "") {// verifi si les fichier ne son vide
				
				ErreurVerif("1", verifVideo , is2)
				numMessage++;
				

			} else {

				ErreurVerif("-1", verifVideo , is2)

			}

			erreur = verif(null, 1, vide, is2); // verifi tout les episode

			if (erreur == true) {
				numMessage++;
			}

			if (is != 0) {

				if (verifTitre.value == "") { // Verifi l'existance des Titre des piste

					ErreurVerif("2", verifTitre, is)
					console.log(verifTitre)
					numMessage++;
	
				} else {
					ErreurVerif("-1", verifTitre, is)
				}
			}
	
	
		vide++
		numVideo++;
		ErrVideo++;

		console.log(vide,numVideo,ErrVideo)

		}
	
	console.log(numMessage);

	if (numMessage == 0) 
	{

		if (is == 0) {

			uploadFile("formAddUpload")

		} else if(is == 1) {

			uploadFile("formAddUploadA")

		}

	} else { ErrorMessage() }
}

function readData(sData) {
	document.getElementById("ErrorTitle" ).innerHTML = sData;
	verifEpisode()
}

function verifEpisode(isMus) {
	var serr
	var text

	if (isMus === '0') {
		serr = document.getElementById('nameSerr').value
		text = document.getElementById("Shell")
		isMus = "0";
	} else {
		serr = document.getElementById('nameSerrA').value
		text = document.getElementById("ShellA")
		isMus = "1";
	}

	console.log(serr, text, isMus)

	var oData = new FormData();

	oData.append("Name", serr);
	oData.append("Type", isMus);

	vef = new XMLHttpRequest();
	vef.open("POST", "upload/verifDonner.php", true);
	 vef.onload = function(oEvent) {
	    if (vef.readyState == 4 && (vef.status == 200 || vef.status == 0)) {
	      text.innerHTML = vef.responseText;
	    } else {
	      text.innerHTML = "Error --> Impossible de recupérer les donner";
	    }
	  };

	vef.send(oData);

	console.log(serr)

}

function appTitleM()
{

	v = 0;

		genre = 1;

		var text = document.getElementById("Shell")
	
		var oData = new FormData();
	
		oData.append("Name", nom);
		oData.append("type", v);
		oData.append("genre", genre);
		oData.append("Epi", s);
		oData.append("Sai", ep);
		oData.append("Suprimer", Supr);	

	
		vef = new XMLHttpRequest();
		vef.open("POST", "Com/addFavor.php", true);
		 vef.onload = function(oEvent) {
		    if (vef.readyState == 4 && (vef.status == 200 || vef.status == 0)) {
		      window.location = "?Name=" + nom + "&Ep=" + ep + "&S=" + s ;
		    } else {
		      text.innerHTML = "Error --> Impossible de recupérer les donner";
		    }
		  };
	
		vef.send(oData);


}

function appMyVideo(type) // Ramener les vidéo pour la gestion
{

		var text = document.getElementById("gestVideo")
	
		var oData = new FormData();
	
		oData.append("Type", type);
		oData.append("Gere", "0");

	
		vef = new XMLHttpRequest();
		vef.open("POST", "upload/gestionVideo.php", true);
		 vef.onload = function(oEvent) {
		    if (vef.readyState == 4 && (vef.status == 200 || vef.status == 0)) {
		      text.innerHTML = vef.responseText;
		    } else {
		      text.innerHTML = "Error --> Impossible de recupérer les donner";
		    }
		  };
	
		vef.send(oData);




}

function appMyFavor(type)
{

	var text = document.getElementById("favorDiv")
	
		var oData = new FormData();
	
		oData.append("Type", type);
		oData.append("Gere", "0");

	
		vef = new XMLHttpRequest();
		vef.open("POST", "Com/gestionFavor.php", true);
		 vef.onload = function(oEvent) {
		    if (vef.readyState == 4 && (vef.status == 200 || vef.status == 0)) {
		      text.innerHTML = vef.responseText;
		    } else {
		      text.innerHTML = "Error --> Impossible de recupérer les donner";
		    }
		  };

		  vef.send(oData);
}

function verifiMyChest(type, gere, titre, champ, value = null, value2 = null) // Verfi si le contenu n'esxiste pas
{//Type 0 = Titre; 1 = Ep; ST = 2
 //Gere 0 = Video; 1 = Music

		var mErreur = document.getElementById("ErrorTitle")
		if (type == 0) {
			var donner = document.getElementById("ErrorTitle")
		} else if (type == 1){
		}
		var oData = new FormData();
	
		oData.append("Type", type);
		oData.append("Gere", gere);
		oData.append("Titre", titre.value);
		if (value != null) { 
		oData.append("Text", value);
			if (value2 != null) {
				oData.append("Text2", value2);
			}
		}

	
		vef = new XMLHttpRequest();
		vef.open("POST", "Com/verifiTitre.php", true);
		 vef.onload = function(oEvent) {
		    if (vef.readyState == 4 && (vef.status == 200 || vef.status == 0)) {
		      if (vef.responseText != null) {
		      ErreurVerif(vef.responseText, champ, gere)
		      console.log(vef.responseText)
		  	}
		    } else {
		      mErreur.innerHTML = "Error --> Impossible de recupérer les donner";
		    }
		  };
	
		vef.send(oData);




}

function EnvModifscript(Title, Ep, S, Sub, numMode, type) {
	
	
		var oData = new FormData();
		var text = document.getElementById("idModmod" + numMode)
		
		oData.append("NameTi", Title);
		oData.append("Episode", Ep);
		oData.append("Saison", S);
		oData.append("Sub", Sub);
		oData.append("Type", type);
		oData.append("Gere", "1");



	
		vef = new XMLHttpRequest();
		vef.open("POST", "upload/gestionVideo.php", true);
		 vef.onload = function(oEvent) {
		    if (vef.readyState == 4 && (vef.status == 200 || vef.status == 0)) {
		      
		    	text.innerHTML = "<p align='center' style='color: red;'>La video a étais suprimer</p>";

		    } else {

		    }
		  };
	
		vef.send(oData);

}

function modifScript(Modif)
{

	var modifMod = document.getElementById("mod" + Modif);

	var verifMod = modifMod.getAttribute('value')	

	var modifmodifEp = document.getElementById("modifEp" + Modif);
	var modifmodifSa = document.getElementById("modifSa" + Modif);
	var modifmodifTi = document.getElementById("modifTi" + Modif);





	if (verifMod != "Annuler") {

	 	modifMod.setAttribute('value', 'Annuler');

	 	modifmodifEp.className  = "EpisodeSizeOrange";
	 	modifmodifSa.className  = "EpisodeSizeOrange";
		modifmodifTi.className = "texteBaseOrange";


	 	modifmodifEp.removeAttribute('readonly');
		modifmodifSa.removeAttribute('readonly');
		modifmodifTi.removeAttribute('readonly');

		RestoreModiEp[Modif] = modifmodifEp.getAttribute('value');
		RestoreModiSa[Modif] = modifmodifSa.getAttribute('value');
		RestoreModiSu[Modif] = modifmodifTi.getAttribute('value');

		document.getElementById("modiValider" + Modif).style.display = null;
		document.getElementById("modiSupr" + Modif).style.display = null;

		console.log(RestoreModiEp, Modif, RestoreModiEp[Modif], RestoreModiSa[Modif], RestoreModiSu[Modif])

	} else {

		document.getElementById("modifEp" + Modif).className  = "EpisodeSize";
	 	document.getElementById("modifSa" + Modif).className  = "EpisodeSize";
		document.getElementById("modifTi" + Modif).className = "texteBase";


	 	modifmodifEp.setAttribute('readonly', '');
		modifmodifSa.setAttribute('readonly', '');
		modifmodifTi.setAttribute('readonly', '');

	 	modifMod.setAttribute('value', 'Modifier')

	 	document.getElementById("modiValider" + Modif).style.display = "none"
		document.getElementById("modiSupr" + Modif).style.display = "none";


	 	console.log(RestoreModiEp[Modif], RestoreModiSa[Modif], RestoreModiSu[Modif])

	 	modifmodifEp.value = RestoreModiEp[Modif];
		modifmodifSa.value = RestoreModiSa[Modif];
		modifmodifTi.value = RestoreModiSu[Modif];

	 }

	


}

function test2(value){

	console.log("resue:", value);

}

function viewInfo(Title, Date)
{
	var oData = new FormData();
		var text = document.getElementById("idModmod" + numMode)
		
		oData.append("NameTi", Title);
		oData.append("Episode", Ep);
		oData.append("Saison", S);
		oData.append("Sub", Sub);
		oData.append("Type", type);
		oData.append("Gere", "1");



	
		vef = new XMLHttpRequest();
		vef.open("POST", "upload/gestionVideo.php", true);
		 vef.onload = function(oEvent) {
		    if (vef.readyState == 4 && (vef.status == 200 || vef.status == 0)) {
		      
		    	text.innerHTML = "<p align='center' style='color: red;'>La video a étais suprimer</p>";

		    } else {

		    }
		  };
	
		vef.send(oData);
}


/*function test(){

	var vala = []

	vala.push(1,4)

	vala.push(7,19)

	vala.push(20,3)

	i=0

	console.log(vala)

	while (i < 6){

		item = vala[i]
		console.log("envoie", item)
  		test2(item)
		i++;
	}

}

test()*/
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


function surligne(champ, EnvEroor)
{
	//console.log(champ, EnvEroor)

   if(EnvEroor == true){

         champ.style.border = "3px #BC240D solid";
         
     } else {
     	champ.style.border  = "";
     	
     }

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

function readData(sData) {
	document.getElementById("ErrorTitle" ).innerHTML = sData;
	verifEpisode()
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

	  console.log("ok", formulaire, oData)

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


function newUpload(is) {
	let aTitle;
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
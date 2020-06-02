<?php

	$AnaTitle = new pdo('mysql:host=localhost;dbname=highmediadata', 'HMS','Secure45RootHGMProject',   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	$TitleExiste = $AnaTitle->query("SELECT nom FROM titre ORDER BY nom ");

?> 


let modal = null
let modalB = null
let form, progressBare;
var totalVideo = 1
var totalAudio = 1
var addTotalVideo = 13
var addTotalAudio = 13 // Pour plus tart
var Envoi = 0
var Erreur = []
var II = 1 //Generateur de variable
// Erreur type Titre
Erreur[0] = 0;

var RestoreModiEp = [];
var RestoreModiSa = [];
var RestoreModiSu = [];


const FocusSelect = "button, a, input,textarea"
let focusValide = []

var derErreur

var displayNum1 = []
	while ( II < 65) {
	displayNum1["bonus"+II] = 0;
	Erreur[II] = 0;
	II++;
	}

function menuUpload(Loc)
    {
        if (Loc === "serie") 
        {
            window.location = "Video.php";
        }
    }



const openModalUp = async function (e) {
	e.preventDefault()
	const target = e.target.getAttribute('id')
	if (target.startsWith('#')) {
		modalB = document.querySelector(target)
	} else {
		modalB = await loadModal2(target)
	}
	focusValide = Array.from(modalB.querySelectorAll(FocusSelect))
	modalB.style.display = null
	modalB.setAttribute('aria-hidden', 'false')
	modalB.setAttribute('aria-modal', 'true')
	modalB.addEventListener('click', closeModal)
	modalB.querySelector('.js-close-modale').addEventListener('click', closeModal)
	modalB.querySelector('.js-stope-modale').addEventListener('click', stopPropagation)
}


const openModal = async function (e) {
	e.preventDefault()
	const target = e.target.getAttribute('id')
	if (target.startsWith('#')) {
		modal = document.querySelector(target)
	} else {
		modal = await loadModal(target)
	}
	focusValide = Array.from(modal.querySelectorAll(FocusSelect))
	modal.style.display = null
	modal.setAttribute('aria-hidden', 'false')
	modal.setAttribute('aria-modal', 'true')
	modal.addEventListener('click', closeModal)
	modal.querySelector('.js-close-modale').addEventListener('click', closeModal)
	modal.querySelector('.js-stope-modale').addEventListener('click', stopPropagation)
}

const closeModal = function (e) {
	if (modal === null) return

	e.preventDefault()
	modal.style.display = "none"
	modal.setAttribute('aria-hidden', 'true')
	modal.setAttribute('aria-modal', 'false')
	modal.removeEventListener('click', closeModal)
	modal.querySelector('.js-close-modale').removeEventListener('click', closeModal)
	modal.querySelector('.js-stope-modale').removeEventListener('click', stopPropagation)

	modal = null
}

const stopPropagation = function (e) { 
	e.stopPropagation()
}

const focusInModal = function (e) {
	e.preventDefault()
	let index = focusValide.findIndex(f => f === modal.querySelector(':focus'))
	index++
	if (index >= focusValide.length) {
		index = 0
		focusValide[index].focus()
	}
}

const loadModal = async function (url) {

	const target = '#' + url.split('#')[1]
	const html = await fetch(url).then(response => response.text())
	const page = document.createRange().createContextualFragment(html).querySelector(target)
	if (page === null) {throw 'Element ${target} non trouver'}
	document.body.append(page)
	return page

}

const loadModa2 = async function (url) {

	const target = '#' + url.split('#')[1]
	const html = await fetch(url).then(response => response.text())
	const page = document.createRange().createContextualFragment(html).querySelector(target)
	if (page === null) {throw 'Element ${target} non trouver'}
	document.body.append(page)
	return page

}

document.querySelectorAll('.bottomConnect').forEach(a => {
	a.addEventListener('click', openModal)
})

document.querySelectorAll('.bottomMenu').forEach(a => {
	a.addEventListener('click', openModal)
})

document.querySelectorAll('.boutonUpload').forEach(a => {
	a.addEventListener('click', closeModal)
	a.addEventListener('click', openModal)
})

window.addEventListener('keydown', function (e) {
	if (e.key === "Escape" || e.key === "Esc")  {
		closeModal(e)
	}
	if (e.key === 'Tab'  && modal !== null) {
		focusInModal(e)	
	}

})
	

function newBonus(num, type) {

	var num2 = num
	var num3 = num
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
			
 
			if (num > 1 && num != 13 && num != 25) {
				visual2.style.display = "none"
			}


			did.style.display = null
			var EpV = document.getElementById("Ep" + (num3 + 1))
			console.log(EpV, num3)

			displayNum1["bonus" + num] = 1
			EpV.setAttribute('value', Eisode)
			if (type == 0) {

				if (num < 24 ) {
					totalVideo++ 
				} else {
					totalAudio++
				}

			}
			if (type == 1) { addTotalVideo++ }

		} else {

			if (num > 1 && num != 13 && num != 25) {
				visual.setAttribute('value', '+')
				visual2.style.display = null;
			}
				
			did.style.display = "none"
			displayNum1["bonus" + num] = 0
			if (type == 0) {

				if (num < 25 ) {
					totalVideo-- 
				} else {
					totalAudio--
				}

			}
			if (type == 1) { addTotalVideo-- }
			
		}
	}
}


function surligne(champ, EnvEroor)
{
   if(EnvEroor){
         champ.style.border = "3px #BC240D solid";
         
     } else {
     	champ.style.border  = "";
     	
     }

}

function ErrorMessage() {

	alert("coriger les erreur")

}


function aplError(Err, type) {
	console.log(Err, type)

	Erreur[Err] = type;

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
	} else { 
		Title0 = document.getElementById("titleA");
		var errorTitle0 = document.getElementById("ErrorTitle2")
		var errorTitle1 = document.getElementById("ErrorTitle3")
		var errorTitle2 = document.getElementById("ErrorTitle5")
		var errorTitle3 = document.getElementById("ErrorTitle6")
		 errorTitleTT ="Album déja existan allez dans ajouter un épisode <br> ou <br> ajouter une précision Entre parantése si c'est un remaster ou par un autre artiste";
	}


	if (TypeEr == -1) 
	{
		surligne(champ, false);
	} else if (TypeEr == 0) 
	{
	  errorTitle0.innerHTML = errorTitleTT;
	  aplError(0, 1);
	} else if (TypeEr == 1) {
	  errorTitle2.innerHTML = "Il manque votre fichier à uploader veulier le rajouter ou suprimer la ou les lignes non nécessaire"
	} else if (TypeEr == 2) {
	  errorTitle3.innerHTML = "Le titre des pistes sont obligatoires"
	}

	if (TypeEr >= 0) {surligne(champ, true);}
}

function verif(champ, Objet, ZoneEp, mus=0) {
	var Title0
	var TotalCons
	
	if (mus == 0){ 
		Title0 = document.getElementById("title");
		var errorTitle0 = document.getElementById("ErrorTitle0")
		var errorTitle1 = document.getElementById("ErrorTitle1")
		TotalCons = totalVideo
	} else { 
		Title0 = document.getElementById("titleA");
		var errorTitle0 = document.getElementById("ErrorTitle2")
		var errorTitle1 = document.getElementById("ErrorTitle3")
		TotalCons = totalAudio
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
		   return false;
		
		} else {
		 	errorTitle0.innerHTML = null;
		   	surligne(champ, false);
		   	
		} 

		verifiMyChest(Objet, mus, champ, champ)

	} else if (Objet == 1) {

		if (true) {

			var numEp = 1
			var numEpC = numEp

			if (mus != 0) 
			{
			 	numEpC = 25;
			}

		   var ErrorTitleTT // Diférence music et video
		   if (mus = 0) {ErrorTitleTT = "Vous ne pouver avoir qu'un épisode a la même valeur"} else { ErrorTitleTT =  "Vous ne pouver avoir qu'une piste a la même valeur sur le même disque"}

			while (TotalCons >= numEp) {


				VerifEp = document.getElementById("Ep" + numEpC)
				VerSaison = document.getElementById("S" + numEpC).value

				VerifEp0 = document.getElementById("Ep" + ZoneEp)
				VerSaison0 = document.getElementById("S" + ZoneEp).value

				if ((VerifEp0.value === VerifEp.value) && (VerifEp != champ)) {

					if (VerSaison == VerSaison0){

						errorTitle1.innerHTML = ErrorTitleTT;
						surligne(VerifEp0, true);
						aplError(ZoneEp, 1);
					} else {
						errorTitle1.innerHTML = "";
						surligne(VerifEp0, false);
						aplError(ZoneEp, 1);
					}

					
					return false;

				} else {

					console.log(numEpC, numEp, TotalCons)
					errorTitle1.innerHTML = null;
					surligne(champ, false);
					aplError(ZoneEp, 0);

				}
				numEp++;
				numEpC++;

			}

			numEp =0;
			return true;

		}

	}

}


callback = readData;

function newUpload(is) {
	var numVideo = 0;
	var ErrVideo = 25;
	var numMessage = 0
	var totalIs

	if (is == 0) {
		aTitle = document.getElementById("title")
		vide = 1;
		totalIs = totalVideo 
	} else {
		aTitle = document.getElementById("titleA")
		vide = 25;
		totalIs = totalAudio + 1
	}

	if (aTitle.value == "") {

		verif(aTitle, 0 , 0, is)
		aplError(0, 1);
		numMessage++;

	} else {

		aplError(0, 0);
		verifiMyChest(0, is, aTitle, aTitle)

	}

	console.log(Erreur[0]+ Erreur[1] + Erreur[2] + Erreur[3] + Erreur[4] + Erreur[5] + Erreur[6]+ Erreur[7] + Erreur[8] + Erreur[9] + Erreur[10] + Erreur[11] + Erreur[12] + Erreur[13] + Erreur[14] + Erreur[15] + Erreur[16]+ Erreur[17] + Erreur[18] + Erreur[19] + Erreur[20] + Erreur[21] + Erreur[22] + Erreur[23] + Erreur[24])
		
		while (totalIs > numVideo) {

			var verifVideo = document.getElementById("fileUpload" + vide)
			var verifTitre = document.getElementById("subTitle" + vide)
	
			if (verifVideo.value == "") {
				
				ErreurVerif("1", verifVideo , is)
				numMessage++;
				

			} else {

				ErreurVerif("1", verifVideo , is)

			}

			if (is != 0) {

				if (verifTitre.value == "") {

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

		if (numMessage >= 1) 
		{
			ErrorMessage()
			return false;
		}
	

	if ((Erreur[0] == 0 )&& (Erreur[1] == 0) && (Erreur[2] == 0) && (Erreur[3] == 0) && (Erreur[4] == 0) && (Erreur[5] == 0) && (Erreur[6] == 0 )&& (Erreur[7] == 0) && (Erreur[8] == 0) && (Erreur[9] == 0) && (Erreur[10] == 0) && (Erreur[11] == 0) && (Erreur[12] == 0) && (Erreur[25] == 0) && (Erreur[26] == 0) && (Erreur[27] == 0 )&& (Erreur[28] == 0) && (Erreur[29] == 0) && (Erreur[30] == 0) && (Erreur[31] == 0) && (Erreur[32] == 0) && (Erreur[33] == 0) && (Erreur[34] == 0) && (Erreur[35] == 0) && (Erreur[36] == 0)) 
	{
		console.log(verifVideo.value)

	form = document.forms.namedItem("formUpload");
	progressBare = document.getElementById("progress1");
	
	  var
	    oOutput = document.getElementById("ErrorTitle"),
	    oData = new FormData(document.forms.namedItem("formUpload"));
	
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



	  oReq.open("POST", "upload/Upload.php", true);
	  oReq.onload = function(oEvent) {
	    if (oReq.readyState == 4 && (oReq.status == 200 || oReq.status == 0)) {
	      callback(oReq.responseText);
	    } else {
	      oOutput.innerHTML = "ErrorTitle " + oReq.status + " occurred uploading your file.<br \/>";
	    }
	  };
	
	  oReq.send(oData);
	}
}

function addUpload() {
	numVideo = 12;
	vide = 13;
	ErrVideo = 37;

	console.log(Erreur[0]+ Erreur[1] + Erreur[2] + Erreur[3] + Erreur[4] + Erreur[5] + Erreur[6]+ Erreur[7] + Erreur[8] + Erreur[9] + Erreur[10] + Erreur[11] + Erreur[12] + Erreur[13] + Erreur[15] + Erreur[16]+ Erreur[17] + Erreur[18] + Erreur[19] + Erreur[20] + Erreur[21] + Erreur[22] + Erreur[23] + Erreur[24])
		
		while (addTotalVideo > numVideo) {

			var verifVideo = document.getElementById("fileUpload" + vide)
	
			console.log(verifVideo.value)
	
			if (verifVideo.value == "") {
	
				surligne(verifVideo, true);
				document.getElementById("ErrorTitle" ).innerHTML = "Veulier choisire une video";
				aplError(ErrVideo, 1);
				ErrorMessage()
				return false;

			} else {

				document.getElementById("ErrorTitle" ).innerHTML = null;
				surligne(verifVideo, false);
				aplError(ErrVideo, 0);

			}
	
	
		vide++
		numVideo++;
		ErrVideo++;

		}

	

	if ((Erreur[1] == 0) && (Erreur[2] == 0) && (Erreur[3] == 0) && (Erreur[4] == 0) && (Erreur[5] == 0) && (Erreur[6] == 0 )&& (Erreur[7] == 0) && (Erreur[8] == 0) && (Erreur[9] == 0) && (Erreur[10] == 0) && (Erreur[11] == 0) && (Erreur[12] == 0) && (Erreur[37] == 0) && (Erreur[38] == 0) && (Erreur[39] == 0) && (Erreur[40] == 0 )&& (Erreur[41] == 0) && (Erreur[42] == 0) && (Erreur[43] == 0) && (Erreur[44] == 0) && (Erreur[45] == 0) && (Erreur[46] == 0) && (Erreur[47] == 0) && (Erreur[48] == 0)) 
	{
		console.log(verifVideo.value)

	form = document.forms.namedItem("formAddUpload");
	progressBare = document.getElementById("progress2");
	
	  var
	    oOutput = document.getElementById("output2"),
	    oData = new FormData(document.forms.namedItem("formAddUpload"));
	
	  oData.append("CustomField", "This is some extra data");
	
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



	  oReq.open("POST", "upload/addUpload.php", true);
	  oReq.onload = function(oEvent) {
	    if (oReq.readyState == 4 && (oReq.status == 200 || oReq.status == 0)) {
	      callback(oReq.responseText);
	    } else {
	      oOutput.innerHTML = "Error " + oReq.status + " occurred uploading your file.<br \/>";
	    }
	  };
	
	  oReq.send(oData);
	} else { ErrorMessage() }
}

function readData(sData) {
	document.getElementById("ErrorTitle" ).innerHTML = sData;
	verifEpisode()
}

function verifEpisode() {

	var serr = document.getElementById('nameSerr').value
	var text = document.getElementById("Shell")

	var oData = new FormData();

	oData.append("Name", serr);

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

function NonDisponible()
{
	alert("Cette fonctionaliter saura ajouter plus tard")
}

function Reserver()
{
	alert("Il faut vous abonèe pour utiliser cette fonctionaliter")
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
		vef.open("POST", "Upload/gestionVideo.php", true);
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
		vef.open("POST", "Upload/gestionVideo.php", true);
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
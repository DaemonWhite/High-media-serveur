<?php

	$AnaTitle = new pdo('mysql:host=localhost;dbname=highmediadata', 'root','',   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	$TitleExiste = $bdd->query("SELECT nom FROM titre ORDER BY nom   ");

?> 


let modal = null
let modalB = null
let form, progressBare;
var totalVideo = 1
var addTotalVideo = 13
var Envoi = 0
var Erreur = []
// Erreur type Titre
Erreur[0] = 0;
// Erreur type Episode
Erreur[1] = 0;
Erreur[2] = 0;
Erreur[3] = 0;
Erreur[4] = 0;
Erreur[5] = 0;
Erreur[6] = 0;
Erreur[7] = 0;
Erreur[8] = 0;
Erreur[9] = 0;
Erreur[10] = 0;
Erreur[11] = 0;
Erreur[12] = 0;
// Erreur type Episode "2"
Erreur[13] = 0;
Erreur[14] = 0;
Erreur[15] = 0;
Erreur[16] = 0;
Erreur[17] = 0;
Erreur[18] = 0;
Erreur[19] = 0;
Erreur[20] = 0;
Erreur[21] = 0;
Erreur[22] = 0;
Erreur[23] = 0;
Erreur[24] = 0;
// Erreur type File eùpty
Erreur[25] = 0;
Erreur[26] = 0;
Erreur[27] = 0;
Erreur[28] = 0;
Erreur[29] = 0;
Erreur[30] = 0;
Erreur[31] = 0;
Erreur[32] = 0;
Erreur[33] = 0;
Erreur[34] = 0;
Erreur[35] = 0;
Erreur[36] = 0;
// Erreur type File eùpty 2
Erreur[37] = 0;
Erreur[38] = 0;
Erreur[39] = 0;
Erreur[40] = 0;
Erreur[41] = 0;
Erreur[42] = 0;
Erreur[43] = 0;
Erreur[44] = 0;
Erreur[45] = 0;
Erreur[46] = 0;
Erreur[47] = 0;
Erreur[48] = 0;


const FocusSelect = "button, a, input,textarea"
let focusValide = []


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
	
	var displayNum1 = []
	displayNum1["bonus1"] = 0
	displayNum1["bonus2"] = 0
	displayNum1["bonus3"] = 0
	displayNum1["bonus4"] = 0
	displayNum1["bonus5"] = 0
	displayNum1["bonus6"] = 0
	displayNum1["bonus7"] = 0
	displayNum1["bonus8"] = 0
	displayNum1["bonus9"] = 0
	displayNum1["bonus10"] = 0
	displayNum1["bonus11"] = 0

	displayNum1["bonus13"] = 0
	displayNum1["bonus14"] = 0
	displayNum1["bonus15"] = 0
	displayNum1["bonus16"] = 0
	displayNum1["bonus17"] = 0
	displayNum1["bonus18"] = 0
	displayNum1["bonus19"] = 0
	displayNum1["bonus20"] = 0
	displayNum1["bonus21"] = 0
	displayNum1["bonus22"] = 0
	displayNum1["bonus23"] = 0

function newBonus(num, type) {

	var num2 = num
	var num3 = num
    num2 - 1;
    num3 + 1;
	if (num < 26) 
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
			
 
			if (num > 1 && num != 13) {
				visual2.style.display = "none"
			}


			did.style.display = null
			var EpV = document.getElementById("Ep" + (num3 + 1))
			console.log(EpV, num3)

			displayNum1["bonus" + num] = 1
			EpV.setAttribute('value', Eisode)
			if (type == 0) { totalVideo++ }
			if (type == 1) { addTotalVideo++ }

		} else {

			if (num > 1 && num != 13) {
				visual.setAttribute('value', '+')
				visual2.style.display = null;
			}
				
			did.style.display = "none"
			displayNum1["bonus" + num] = 0
			if (type == 0) { totalVideo-- }
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

function verif(champ, Objet, ZoneEp) {

	if (Objet == "titre") {

		if(champ.value.length < 1)
		{
		   surligne(champ, true);
		   document.getElementById("ErrorTitle" ).innerHTML = "Tittre obligatoire";
		   return false;
		<?php while ($donnees = $TitleExiste->fetch()) {
			
			echo '} else if(champ.value === "' . $donnees["nom"] . '") { 
				surligne(champ, true);
		   		document.getElementById("ErrorTitle" ).innerHTML = "Titre déja existan allez dans ajouter un épisode";
		   		 ';
		}  ?>
		} else {
		 	document.getElementById("ErrorTitle" ).innerHTML = null;
		   	surligne(champ, false);
		   	return true;
		}

	} else if (Objet == "numero") {

		if (true) {

			numEp = 1;

			while (totalVideo > numEp) {


				VerifEp = document.getElementById("Ep" + numEp).value

				if ((champ.value === VerifEp) && (VerifEp != ZoneEp)) {

					document.getElementById("ErrorTitle" ).innerHTML = "Vous ne pouver avoir qu'un épisode";
					surligne(champ, true);
					aplError(ZoneEp, 1);
					return false;

				} else {

					document.getElementById("ErrorTitle" ).innerHTML = null;
					surligne(champ, false);
					aplError(ZoneEp, 0);

				}
				numEp++;

			}

			numEp =0;
			return true;

		}

	}

}


callback = readData;

function newUpload(is) {
	numVideo = 0;
	vide = 1;
	ErrVideo = 25;

	aTitle = document.getElementById("title" )
	vTitle = aTitle.value
	console.log(vTitle);

	if (vTitle == "") {

		surligne(aTitle, true);
		aplError(0, 1);

	} else {

		surligne(aTitle, false);
		aplError(0, 0);

	}

	console.log(Erreur[0]+ Erreur[1] + Erreur[2] + Erreur[3] + Erreur[4] + Erreur[5] + Erreur[6]+ Erreur[7] + Erreur[8] + Erreur[9] + Erreur[10] + Erreur[11] + Erreur[12] + Erreur[13] + Erreur[14] + Erreur[15] + Erreur[16]+ Erreur[17] + Erreur[18] + Erreur[19] + Erreur[20] + Erreur[21] + Erreur[22] + Erreur[23] + Erreur[24])
		
		while (totalVideo > numVideo) {

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



	  oReq.open("POST", "upload/upload.php", true);
	  oReq.onload = function(oEvent) {
	    if (oReq.readyState == 4 && (oReq.status == 200 || oReq.status == 0)) {
	      callback(oReq.responseText);
	    } else {
	      oOutput.innerHTML = "ErrorTitle " + oReq.status + " occurred uploading your file.<br \/>";
	    }
	  };
	
	  oReq.send(oData);
	} else { ErrorMessage() }
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
	alert("C'est fonctionaliter seront ajouter plus tard")
}

function Reserver()
{
	alert("Il faut vous abonée pour utiliser cette fonctionaliter")
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
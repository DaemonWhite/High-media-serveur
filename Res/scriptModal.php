<?php
	include("config.php");
	$AnaTitle = new pdo('mysql:host=' . $bdd_host . ';dbname=highmediadata', $bdd_user , $bdd_pass,   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
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




//var derErreur

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
	console.log("coucou")
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
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
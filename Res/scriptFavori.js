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

function appFav(type, nom, s, ep, Supr, lec){

	console.log(type, nom, s, ep, Supr, lec)

	if (lec === "1") {

		rat1 = document.getElementById("rating");
		rat2 = document.getElementById("rating2");

		if (Supr === 0) 
		{

			rat1.style.display = "none"
			rat2.style.display = ""

		}

		 else if (Supr === 1) 
		{
			rat1.style.display = ""
			rat2.style.display = "none"			
		}



	}

	console.log(type);

	if (type === 0) { 

		v = 0;

		genre = 0;

		var text = document.getElementById("Shell")
	
		var oData = new FormData();
	
		oData.append("Name", nom);
		oData.append("type", v);
		oData.append("genre", genre);
		oData.append("Epi", ep);
		oData.append("Sai", s);
		oData.append("Suprimer", Supr);


		console.log(nom);
	
		vef = new XMLHttpRequest();
		vef.open("POST", "Com/addFavor.php", true);
		 vef.onload = function(oEvent) {
		    if (vef.readyState == 4 && (vef.status == 200 || vef.status == 0)) {
		      
		    } else {
		      text.innerHTML = "Error --> Impossible de recupérer les donner";
		    }
		  };
	
		vef.send(oData);

	
	}

	 if (type === 2) {

	 	v = 0;

		genre = 2;

		var text = document.getElementById("Shell")
	
		var oData = new FormData();
	
		oData.append("Name", nom);
		oData.append("type", v);
		oData.append("genre", genre);
		oData.append("Epi", ep);
		oData.append("Sai", s);
		oData.append("Suprimer", Supr);	


		console.log(nom);
	
		vef = new XMLHttpRequest();
		vef.open("POST", "Com/addFavor.php", true);
		 vef.onload = function(oEvent) {
		    if (vef.readyState == 4 && (vef.status == 200 || vef.status == 0)) {
		      
		    } else {
		      text.innerHTML = "Error --> Impossible de recupérer les donner";
		    }
		  };
	
		vef.send(oData);


	 }

}
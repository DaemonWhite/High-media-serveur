function appFav(type, nom, s, ep, Supr){

	console.log(type);

	if (type === "0") { 

		v = 0;

		genre = 0;
		s = 0;
		ep = 0;

		var text = document.getElementById("Shell")
	
		var oData = new FormData();
	
		oData.append("Name", nom);
		oData.append("type", v);
		oData.append("genre", genre);
		oData.append("Epi", s);
		oData.append("Sai", ep);
		oData.append("Suprimer", Supr);


		console.log(nom);
	
		vef = new XMLHttpRequest();
		vef.open("POST", "Com/addFavor.php", true);
		 vef.onload = function(oEvent) {
		    if (vef.readyState == 4 && (vef.status == 200 || vef.status == 0)) {
		      window.location = "?name=" + nom;
		    } else {
		      text.innerHTML = "Error --> Impossible de recupérer les donner";
		    }
		  };
	
		vef.send(oData);

	
	}

	 if (type === "1") {

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


		console.log(nom);
	
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

}
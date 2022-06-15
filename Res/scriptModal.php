<?php
	include("config.php");
	$AnaTitle = new pdo('mysql:host=' . $bdd_host . ';dbname=highmediadata', $bdd_user , $bdd_pass,   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	$TitleExiste = $AnaTitle->query("SELECT nom FROM titre ORDER BY nom ");

?> 




var Envoi = 0

// Erreur type Titre


var RestoreModiEp = [];
var RestoreModiSa = [];
var RestoreModiSu = [];

var genreNumber = [];
genreNumber[0] = 1; // Genre nombre selectioner
genreNumber[1] = 1; // Genre nombre selectioner
genreNumber[2] = 1; // Genre nombre selectioner
genreNumber[3] = 1; // Genre nombre selectioner




//var derErreur




function menuUpload(Loc)
    {
        if (Loc === "serie") 
        {
            window.location = "Video.php";
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


function test2(value){

	console.log("resue:", value);

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

        		
function changeUseIm() {

	  var form = document.forms.namedItem("newImage");
	
	  var oData = new FormData(document.forms.namedItem("newImage"));
	
	  oData.append("CustomField", "This is some extra data");
	
	  let oReq = new XMLHttpRequest();

	  oReq.open("POST", "user/changeImage.php", true);
	  oReq.onload = function(oEvent) {
	    if (oReq.readyState == 4 && (oReq.status == 200 || oReq.status == 0)) {
	      window.location = "user.php"
	    } else {
	      oOutput.innerHTML = "Error " + oReq.status + " occurred uploading your file.<br \/>";
	    }
	  };
	
	  oReq.send(oData);
}


function touche(e){

      var touche = event.keyCode;

      console.log(touche)
      
      if (touche == 13) {

        GernreAnme(0)

      }

    }
    
    function GernreAnme(type)
    {
      

      var sizeVideo = document.getElementById("zoneVideo");

       var oData = new FormData();
       var text = document.getElementById("barSearch").value
       var Gen = document.getElementById("cat").value

       
       oData.append("Search", text)
       oData.append("Genre", Gen)
       oData.append("Type", type)

    
      
       vef = new XMLHttpRequest();
       vef.open("POST", "upload/appVideo.php", true);
        vef.onload = function(oEvent) {
           if (vef.readyState == 4 && (vef.status == 200 || vef.status == 0)) {
             
             sizeVideo.innerHTML = vef.responseText;
             
    
           } else {
    
           }
         };
      
       vef.send(oData);

       }
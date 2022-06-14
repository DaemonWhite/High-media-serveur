 function ChangePAGE(Type)
    {
        if (Type === "Acueil") 
        {
            window.location = "home";
        }
        if (Type === "Video") 
        {
            window.location = "video";
        }
        if (Type === "Audio") 
        {
        // window.location = "audio";
        } 
        if (Type === "Perso") 
        {

        } 
        if (Type === "Serv") 
        {

        } 
        if (Type === "Propo") 
        {

        }
        if (Type === "user") 
        {
            window.location = "parametre";
        }

    }

    function newZone(Page){

      window.location = "?name=" + Page;

     }

     function appVideo(name, ep, sai){

        window.location = "Vlecteur?Name=" + name + "&Ep=" + ep + "&S=" + sai;

     }

     function appListVideo(name)
     {
        window.location = "Video?name=" + name;
     }

     function favor()
     {
        
     }
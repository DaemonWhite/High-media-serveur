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
            NonDisponible() // window.location = "audio";
        } 
        if (Type === "Perso") 
        {
            NonDisponible()
        } 
        if (Type === "Serv") 
        {
            NonDisponible()
        } 
        if (Type === "Propo") 
        {
            NonDisponible()
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

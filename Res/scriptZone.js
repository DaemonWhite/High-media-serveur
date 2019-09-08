 function ChangePAGE(Type)
    {
        if (Type === "Acueil") 
        {
            window.location = "global.php";
        }
        if (Type === "Video") 
        {
            window.location = "Video.php";
        }
        if (Type === "Audio") 
        {
            NonDisponible()
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
            window.location = "User.php";
        }

    }

    function newZone(Page){

      window.location = "?name=" + Page;

     }

     function appVideo(name, ep, sai){

        window.location = "VLecteur?Name=" + name + "&Ep=" + ep + "&S=" + sai;

     }

     function appListVideo(name)
     {
        window.location = "Video?name=" + name;
     }
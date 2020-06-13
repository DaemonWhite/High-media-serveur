 function ChangePAGE(Type)
    {
        if (Type === "Acueil") 
        {
            window.location = "global.php";
        }
        if (Type === "Video") 
        {
            window.location = "video.php";
        }
        if (Type === "Audio") 
        {
            window.location = "audio.php"
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
            window.location = "user.php";
        }

    }

    function newZone(Page){

      window.location = "?name=" + Page;

     }

     function appVideo(name, ep, sai){

        window.location = "VLecteur.php?Name=" + name + "&Ep=" + ep + "&S=" + sai;

     }

     function appListVideo(name)
     {
        window.location = "Video.php?name=" + name;
     }

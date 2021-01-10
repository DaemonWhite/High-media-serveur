start(){ 
echo "############################################
#               HMS instalateur             #
#               By DaemonWhite              #
#                  v 0.0.20                 #
#############################################";
}


base="/var/www";
basehms='/var/www/HMS';
 echo $basehms;

install(){
	n=1;
	echo "";
	echo "Bienvenu dans HMS avant de procéder a l'installation verifier scrip vous avez biens installer: PHP, MariaDB et git [y/n]";
	while ((n == 1)); do            # permet une boucle infinie
	echo -n "install> "                    # qui s'arrête avec break
	read reps
	 
	case $reps in

		y | Y)
		n=0;
		startInstall;;
	  n | N )
	     echo "Au revoir!!"
	     break;;
	  * )
	    echo "Valeur incorecte [y/n]";;
	esac
	done

};

startInstall() {

	echo "Hello";

	echo "";
	echo "Copie des fichier ... ";

	mkdir $base/HMS;
	cp -R ../High-media-serveur/* $base;

	echo "";
	echo "installation du service";

	cp $basehms/apache/HMS.conf /etc/httpd/conf.d/;

	echo "";
	echo "service initialiser";
	echo "";
	echo "Securisatio en cour ... ";

	rm -r $basehms/apache;
	rm -r $basehms/HighMediaProject.sublime-workspace;
	rm -r $basehms/HighMediaProject.sublime-project;
	rm -r $basehms/highmediadata.sql;
	rm -r $basehms/info.php;
	rm -r $basehms/install.sh;
	rm -r $basehms/README.md;
	rm -r $basehms/changelog.log;

	chmod -R 750 $basehms/;
	chmod -R 730 $basehms/upload/Video/;
	chmod -R 730 $basehms/upload/Audio/;
	chmod -R 730 $basehms/user/user/;
	chown -R $basehms/apache HMS;
	chgrp -R $basehms/apache HMS;

	echo "";
	echo "Securisatio terminer";
	echo "";
	echo "Redmare le serveur ...";
	

	systemctl restart httpd.service
	systemctl reloadssh  httpd.service

	echo "serveur redemarer";

	echo "";
	echo "HMS est bientot installer il vous restes plusq qua configurer mysql";


};

main(){
	start;

	while [ 1 ]; do                                 # permet une boucle infinie
	echo -n "> "                    # qui s'arrête avec break
	read reps
	 
	case $reps in
	  help | hlp )
	     echo "À propos de TS  	  --> about"
	     echo "install 			  --> Install HMS"
	     echo "qqq|exit|quiter 	  --> permet de quiter le script";;
	  install)
		install;;
	  quit | "exit" | qqq)
	     echo "Au revoir!!"
	     break;;
	  * )
	    echo "Commande inconnue";;
	esac
	done


};

main;

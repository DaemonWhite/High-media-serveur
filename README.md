# High media serveur

# Instalation


1 - Telecharger la dernière vertions
2 - installer PHP MariaDB et Apache
3 - Lancer l'installateur en admin ./install.sh sur le serveur
4 - Créer l'utilisateur MariaDB HMS
		User : HMS
		Pass : Secure45RootHGMProject
5 - Installer la base de donner highmediadata.sql
6 - Testez et ce sera fini

# Changelog

V - 0.0.20A - 10 Janv 16h31

- Ajout nouvelle information pour l'installation 
- Ajout d'un paramêtres pour vérifier le compte
- Ajour les utilisateur pourrons créer leur compte
- Ajout d'un installateur
- Ajout Search gère les Lang et sous Genre
- Ajout Upload gère enfin les Lang
- Ajout Upload gére enfin les genres et sous-genres
- Ajoute de modal Fonctionalité invalide ou interdit
- Ajout d'un lecteur avec tout sont contenu (Non dynamique )
- Ajout Prise en charge du subTitle
- Ajout du debut d'upload Audio
- Ajout du parametre debugMode
- Ajout d'une fonctionaliter de langage Generaliser
- Ajout des condition d'utilisation
- Ajout des information sur le serveur
- Ajout d'un font a la page de connexion
- Modification le Readme ne contient que les 3 dernière vertion le restes sera dans changelog.log
- Modification Centralise du menu navigation (Com/mainMenu.php)
- Modification réactive ler refresh de la page aprées le changement de l'image utilisateur
- Modification du repertoire d'image pour s'adapter au sytéme de protection linux
- Modification PDO est un user ---> User "HMS" Password ---> "Secure45RootHGMProject"
- Amélioration du systéme de protection d'erreur pour l'upload
- Optimisation du sytéme de recherche
- Optimisation de l'affichage boite à l'accueille
- Optimisation du syteme de recherche
- Optimisation du scriptModal
- Optimisation du pdo
- Optimisation du script d'popUpload
- Optimisation du système de connexion
- Nettoyage des utilisateur SQL
- Nettoyage de la base SQL
- Correction search barre Tag
- Correction de la position Menu
- Correction de bug liée a php 7.4
- Correction Ajout d'une verification si le champ EP n'est pas remplie corectement
- Correction le serveur en prend charge l'indexion de linux
- Correction de la page 404
- Correction Corriger l'erreur quant on mes le même episode et qu'il est identique au dernier il n'étais pas vues
- Correction ci il y'a des episode de saison diférente il ne sont plus vue comme une erreur
- Correction des miniature l'ors de l'upload
- Correction de qu'elle que faute d'ortographe
- Correction de la conexion rapide


V - 0.0.19A

- Ajout de filtre de recherches
- Ajout d'unsystéme de recherche
- Amélioartion de supression de donné il suprime les video dans l'historique
- Amélioration de la supretion de vidéos
- Amélioration et correction de bug de l'interface pc

V - 0.0.18A

- Debut de l'interface mobile
- Teste d'une nouvelle génération de l'interface
- Correction De faute d'ortographe
- Correction Les titres apparaisse dans l'ordre
- Correction les episode apparaisse dans l'ordre
- Ajout de la page personnaliser pour les vidéos non existante
- Ajout de la page D'erreur 404
- Possibilité de modifier le contenu présent
- Possibilité de supprimer les vidéos
- Ajout du gestionnaire de vidéo USER
- Correction de faute
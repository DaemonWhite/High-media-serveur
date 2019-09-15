-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 10 sep. 2019 à 07:21
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `highmediadata`
--

-- --------------------------------------------------------

--
-- Structure de la table `favori`
--

DROP TABLE IF EXISTS `favori`;
CREATE TABLE IF NOT EXISTS `favori` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `User` int(11) NOT NULL,
  `Favori` text NOT NULL,
  `S` int(11) DEFAULT NULL,
  `Ep` int(11) DEFAULT NULL,
  `type` int(11) NOT NULL,
  `Genre` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `favori`
--

INSERT INTO `favori` (`ID`, `User`, `Favori`, `S`, `Ep`, `type`, `Genre`) VALUES
(5, 1, 'Date a Live', 0, 0, 0, 0),
(7, 1, 'Date a Live', 1, 1, 1, 1),
(8, 1, 'Date a Live', 8, 1, 0, 1),
(9, 1, 'Angel beats', 0, 0, 0, 0),
(10, 1, 'Angel beats', 9, 1, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `historique`
--

DROP TABLE IF EXISTS `historique`;
CREATE TABLE IF NOT EXISTS `historique` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `User_ID` int(11) NOT NULL,
  `Name` text NOT NULL,
  `type` int(11) NOT NULL,
  `Episode` varchar(255) NOT NULL,
  `Saison` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `historique`
--

INSERT INTO `historique` (`ID`, `User_ID`, `Name`, `type`, `Episode`, `Saison`) VALUES
(1, 1, 'Another', 0, '10', 1),
(2, 1, 'Another', 0, '1 ', 1),
(3, 1, 'Angel beats', 0, '1 ', 1),
(4, 1, 'Akame ga kill', 0, '7 ', 1),
(10, 1, 'Absolut Duo', 0, '1 ', 1),
(8, 1, 'Date a Live', 0, '1 ', 1),
(9, 1, 'Date a Live', 0, '8', 1),
(11, 1, 'Absolut Duo', 0, '2 ', 1),
(12, 7, 'Another', 0, '1 ', 1),
(13, 7, 'Dororo', 0, '1 ', 1),
(14, 7, 'Absolut Duo', 0, '1 ', 1),
(15, 7, 'Dororo', 0, '20 ', 1),
(16, 1, 'Dororo', 0, '1 ', 1),
(17, 1, 'Dororo', 0, '22', 1),
(18, 7, 'Titre', 0, '1 ', 1),
(19, 1, 'Angel beats', 0, '3 ', 1),
(20, 1, 'Angel beats', 0, '9', 1),
(21, 1, 'Mirai nikki', 0, '1 ', 1),
(22, 1, 'Akame ga kill', 0, '3 ', 1);

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

DROP TABLE IF EXISTS `membre`;
CREATE TABLE IF NOT EXISTS `membre` (
  `ID_user` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(50) NOT NULL,
  `Name_Surname` varchar(255) NOT NULL,
  `Password` text NOT NULL,
  `Securiter` int(11) NOT NULL,
  `Chambre` int(11) NOT NULL,
  `IP1` text,
  `IP2` text,
  `Modif_IP` int(11) DEFAULT '0',
  PRIMARY KEY (`ID_user`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`ID_user`, `UserName`, `Name_Surname`, `Password`, `Securiter`, `Chambre`, `IP1`, `IP2`, `Modif_IP`) VALUES
(1, 'DaemonWhite', 'TRAVERS matheo', '$2y$12$HmZxsGBxubTtWX5kDb2.fej9khmVEjhobuRV7yiLXrVA8KWfmA5hy', 3, 417, '::1', NULL, 1),
(2, 'JordanRoy', 'HOULBERT Jordan', '$2y$10$mcxX2wMWrNdq1GiQpQwobO5kZKs6GpN2nekLfVvnqV.43iWgvloty', 3, 414, '192.168.43.40', NULL, 1);

--
-- Déclencheurs `membre`
--
DROP TRIGGER IF EXISTS `Ajout parametre`;
DELIMITER $$
CREATE TRIGGER `Ajout parametre` AFTER INSERT ON `membre` FOR EACH ROW INSERT into user (theme, image) VALUES ("Default", "User/Default/User.jpg")
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `titre`
--

DROP TABLE IF EXISTS `titre`;
CREATE TABLE IF NOT EXISTS `titre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `Format` int(11) NOT NULL COMMENT '0 = video 1 = music',
  `Nombre` int(11) NOT NULL DEFAULT '1',
  `Saison` int(11) DEFAULT NULL,
  `Synopsis` text,
  `Affiche` varchar(255) NOT NULL DEFAULT 'upload/Video/DVideo.jpg',
  `Genre` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `theme` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `historique` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`ID`, `theme`, `image`, `historique`) VALUES
(1, 'Default', 'user/1/536497.jpg', 0),
(2, 'Default', 'User/Default/User.png', 0);

-- --------------------------------------------------------

--
-- Structure de la table `video`
--

DROP TABLE IF EXISTS `video`;
CREATE TABLE IF NOT EXISTS `video` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `titre` text NOT NULL,
  `SousTitre` text,
  `Saison` int(11) NOT NULL DEFAULT '1',
  `Episode` int(11) NOT NULL DEFAULT '1',
  `Repertoire` text NOT NULL,
  `Proprietaire` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

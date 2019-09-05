-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 05 sep. 2019 à 14:26
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
  `ID` int(11) NOT NULL,
  `User` int(11) NOT NULL,
  `Favori` text NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`ID_user`, `UserName`, `Name_Surname`, `Password`, `Securiter`, `Chambre`, `IP1`, `IP2`, `Modif_IP`) VALUES
(1, 'DaemonWhite', 'TRAVERS matheo', '$2y$12$HmZxsGBxubTtWX5kDb2.fej9khmVEjhobuRV7yiLXrVA8KWfmA5hy', 3, 417, '::1', NULL, 1),
(2, 'jeanKevine', 'RALPHE Elia', '$2y$10$pC87doBoaSBnxHyK3XWy1.dHRA9R9H932reEja8k9m/bbLrIxQU2u', 1, 123, NULL, NULL, 0),
(3, 'JordanRoy', 'HOULBERT Jordan', '$2y$10$mcxX2wMWrNdq1GiQpQwobO5kZKs6GpN2nekLfVvnqV.43iWgvloty', 3, 414, '192.168.43.40', NULL, 1),
(4, 'Raoul', 'Name test', '$2y$10$Y1OcYRLOHQ61OwamIWuDweND9uUpg6YExIIUMzZaXpqmqe7iVWuTy', 1, 123, NULL, NULL, 0),
(5, 'Fauxcap', 'TRAVERS enzo', '$2y$10$t3YnP9cf0RcL73m9FYq6ReU.Fjl3UJelWmCg8bm1ZJfgEe2wG//8m', 2, 409, '192.168.1.30', '192.168.1.38', 1),
(6, 'Jesu', 'DIEUX Jesu', '$2y$10$lgCSbsQvitM85RfytKgz.OD0FokIpdXTCzIc6yTf7K7jq//foEKTK', 2, 420, NULL, NULL, 0),
(8, 'Suceur', 'attheo Jul', '$2y$10$5hotnmbvgLlRKsLV..m98.HviSPYaRdtBTbKXOlsqNvC.veZ4JTCO', 1, 111, NULL, NULL, 0),
(7, 'Test', 'Test test', '$2y$10$zY3tGaWfQZeqJAFjr2rcAOMpv0etcqOt8E7V5dh8qs3KbK823Ecu2', 1, 452, NULL, '::1', 0);

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
  `Genre` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `titre`
--

INSERT INTO `titre` (`id`, `nom`, `Format`, `Nombre`, `Saison`, `Synopsis`, `Genre`, `Type`) VALUES
(1, 'Dog Days', 0, 1, NULL, NULL, 'Anime', 'no'),
(2, 'Dog Day', 0, 1, NULL, 'L\'histoire de chien humanoÃ¯de.', 'Anime', 'no'),
(3, 'Titre', 0, 1, NULL, NULL, 'Anime', 'no'),
(4, 'Dog Dayse', 0, 1, NULL, NULL, 'Anime', 'no'),
(5, 'Dororo', 0, 1, NULL, 'zeaeazdsddfcazce', 'Anime', 'no'),
(6, 'Mirai nikki', 0, 1, NULL, NULL, 'Anime', 'no');

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`ID`, `theme`, `image`, `historique`) VALUES
(1, 'Default', 'user/1/536497.jpg', 0),
(2, 'Default', 'User/Default/User.png', 0),
(3, 'Default', 'User/Default/User.png', 0),
(4, 'Default', 'User/Default/User.png', 0),
(5, 'Default', 'User/Default/User.png', 0),
(6, 'Default', 'User/Default/User.png', 0),
(7, 'Default', 'User/Default/User.png', 0),
(8, 'Default', 'User/Default/User.png', 0);

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
  `Proprietaire` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `video`
--

INSERT INTO `video` (`ID`, `titre`, `SousTitre`, `Saison`, `Episode`, `Repertoire`, `Proprietaire`) VALUES
(1, 'Dog Days', 'NoValide', 1, 1, 'upload/Video/Dog Days/S1//Dog_Days_01_Vostfr.mp4', 'Anonyme'),
(2, 'Dog Day', 'NoValide', 1, 1, 'upload/Video/Dog Day/S1//Dog_Days_01_Vostfr.mp4', 'Anonyme'),
(3, 'Dog Day', 'NoValide', 1, 2, 'upload/Video/Dog Day/S1//Dog_Days_02_Vostfr.mp4', 'Anonyme'),
(4, 'Dog Day', 'NoValide', 1, 3, 'upload/Video/Dog Day/S1//Dog_Days_03_Vostfr.mp4', 'Anonyme'),
(5, 'Dog Day', 'NoValide', 1, 4, 'upload/Video/Dog Day/S1//Dog_Days_04_Vostfr.mp4', 'Anonyme'),
(6, 'Dog Day', 'NoValide', 1, 5, 'upload/Video/Dog Day/S1//Dog_Days_05_Vostfr.mp4', 'Anonyme'),
(7, 'Titre', 'NoValide', 1, 1, 'upload/Video/Titre/S1//Dog_Days_01_Vostfr.mp4', 'Anonyme'),
(8, 'Dog Dayse', 'NoValide', 1, 1, 'upload/Video/Dog Dayse/S1//Dog_Days_01_Vostfr.mp4', 'Anonyme'),
(9, 'Dororo', 'NoValide', 1, 1, 'upload/Video/Dororo/S1//Dororo 01 VOSTFR.mp4', 'Anonyme'),
(10, 'Dororo', 'NoValide', 1, 2, 'upload/Video/Dororo/S1//Dororo 02 VOSTFR.mp4', 'Anonyme'),
(11, 'Dororo', 'NoValide', 1, 3, 'upload/Video/Dororo/S1//Dororo 03 VOSTFR.mp4', 'Anonyme'),
(12, 'Dororo', 'NoValide', 1, 4, 'upload/Video/Dororo/S1//Dororo 04 VOSTFR.mp4', 'Anonyme'),
(13, 'Dororo', 'NoValide', 1, 5, 'upload/Video/Dororo/S1//Dororo 05 VOSTFR.mp4', 'Anonyme'),
(14, 'Dororo', 'NoValide', 1, 6, 'upload/Video/Dororo/S1//Dororo 06 VOSTFR.mp4', 'Anonyme'),
(15, 'Dororo', 'NoValide', 1, 7, 'upload/Video/Dororo/S1//Dororo 07 VOSTFR.mp4', 'Anonyme'),
(16, 'Dororo', 'NoValide', 1, 8, 'upload/Video/Dororo/S1//Dororo 08 VOSTFR.mp4', 'Anonyme'),
(17, 'Dororo', 'NoValide', 1, 9, 'upload/Video/Dororo/S1//Dororo 09 VOSTFR.mp4', 'Anonyme'),
(18, 'Dororo', 'NoValide', 1, 10, 'upload/Video/Dororo/S1//Dororo 10 VOSTFR.mp4', 'Anonyme'),
(19, 'Dororo', 'NoValide', 1, 11, 'upload/Video/Dororo/S1//Dororo 11 VOSTFR.mp4', 'Anonyme'),
(20, 'Dororo', 'NoValide', 1, 12, 'upload/Video/Dororo/S1//Dororo 12 VOSTFR.mp4', 'Anonyme'),
(21, 'Mirai nikki', 'NoValide', 1, 1, 'upload/Video/Mirai nikki/S1//Mirai Nikki 01 Vostfr .mp4', 'Anonyme'),
(22, 'Dororo', 'NoValide', 1, 13, 'upload/Video/Dororo/S1//Dororo 13 VOSTFR.mp4', 'Anonyme'),
(23, 'Dororo', 'NoValide', 1, 14, 'upload/Video/Dororo/S1//Dororo 14 VOSTFR.mp4', 'Anonyme'),
(24, 'Dororo', 'NoValide', 1, 15, 'upload/Video/Dororo/S1//Dororo 15 VOSTFR.mp4', 'Anonyme'),
(25, 'Dororo', 'NoValide', 1, 16, 'upload/Video/Dororo/S1//Dororo 16 VOSTFR.mp4', 'Anonyme'),
(26, 'Dororo', 'NoValide', 1, 17, 'upload/Video/Dororo/S1//Dororo 17 VOSTFR.mp4', 'Anonyme'),
(27, 'Dororo', 'NoValide', 1, 18, 'upload/Video/Dororo/S1//Dororo 18 VOSTFR.mp4', 'Anonyme'),
(28, 'Dororo', 'NoValide', 1, 19, 'upload/Video/Dororo/S1//Dororo 19 VOSTFR.mp4', 'Anonyme'),
(29, 'Dororo', 'NoValide', 1, 20, 'upload/Video/Dororo/S1//Dororo 20 VOSTFR.mp4', 'Anonyme'),
(30, 'Dororo', 'NoValide', 1, 21, 'upload/Video/Dororo/S1//Dororo 21 VOSTFR.mp4', 'Anonyme'),
(31, 'Dororo', 'NoValide', 1, 22, 'upload/Video/Dororo/S1//Dororo 22 VOSTFR.mp4', 'Anonyme'),
(32, 'Dororo', 'NoValide', 1, 23, 'upload/Video/Dororo/S1//Dororo 23 VOSTFR.mp4', 'Anonyme'),
(33, 'Dororo', 'NoValide', 1, 24, 'upload/Video/Dororo/S1//Dororo 24 VOSTFR.mp4', 'Anonyme');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

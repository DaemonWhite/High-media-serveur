-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 07 mai 2020 à 14:08
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

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
-- Structure de la table `audio`
--

DROP TABLE IF EXISTS `audio`;
CREATE TABLE IF NOT EXISTS `audio` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `album` text NOT NULL,
  `Artiste` text NOT NULL,
  `Disk` int(11) NOT NULL,
  `Piste` int(11) NOT NULL,
  `Repertoire` text NOT NULL,
  `Proprietaire` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `historique`
--

INSERT INTO `historique` (`ID`, `User_ID`, `Name`, `type`, `Episode`, `Saison`) VALUES
(23, 1, 'Papi', 0, '1', 1);

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
  `IP1` text DEFAULT NULL,
  `IP2` text DEFAULT NULL,
  `Modif_IP` int(11) DEFAULT 0,
  PRIMARY KEY (`ID_user`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`ID_user`, `UserName`, `Name_Surname`, `Password`, `Securiter`, `Chambre`, `IP1`, `IP2`, `Modif_IP`) VALUES
(1, 'DaemonWhite', 'TRAVERS matheo', '$2y$12$HmZxsGBxubTtWX5kDb2.fej9khmVEjhobuRV7yiLXrVA8KWfmA5hy', 3, 406, '::1', NULL, 1),
(2, 'JordanRoy', 'HOULBERT Jordan', '$2y$10$mcxX2wMWrNdq1GiQpQwobO5kZKs6GpN2nekLfVvnqV.43iWgvloty', 3, 414, '192.168.43.40', NULL, 1),
(3, 'JordanSauvage', 'Renaudin NathanaÃ«l', '$2y$10$xP2gcKX7mrvAfs0OnIB8UuJZm4Z68vxpQC0sGFj445VpyhCRFTJgK', 2, 500, '192.168.43.91', NULL, 1),
(4, 'Bradley', 'Miguel Bradly ', '$2y$10$wrg7IZdQcRZc1nBMV22VMOFqloTB72Xk7aXGRkqS8BHhqwJe6vREa', 1, 156, '192.168.43.91', NULL, 1),
(5, 'KadoshiMiku', 'AmossÃ© AurÃ©lien', '$2y$10$uEOo4zdC9oAAYR1oHH5.F.2FOPgagI18xsvi5lve/Zwbfzb/r2Bie', 1, 409, '192.168.43.91', NULL, 1),
(6, 'Solandar', 'Prou Alexandre', '$2y$10$6XUjCquyzqNrRIRCBfwglerZ94MEpGYbUxSz88.guHWFkUMsL6br2', 1, 414, NULL, NULL, 0);

--
-- Déclencheurs `membre`
--
DROP TRIGGER IF EXISTS `Ajout parametre`;
DELIMITER $$
CREATE TRIGGER `Ajout parametre` AFTER INSERT ON `membre` FOR EACH ROW INSERT into user (theme, image) VALUES ("Default", "User/Default/User.png")
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
  `Nombre` int(11) NOT NULL DEFAULT 1,
  `Saison` int(11) DEFAULT NULL,
  `Synopsis` text DEFAULT NULL,
  `Affiche` varchar(255) NOT NULL DEFAULT 'upload/Video/DVideo.jpg',
  `Genre` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `titre`
--

INSERT INTO `titre` (`id`, `nom`, `Format`, `Nombre`, `Saison`, `Synopsis`, `Affiche`, `Genre`, `Type`) VALUES
(19, 'Papi', 0, 1, NULL, 'papa mange les enfant', 'upload/Video/DVideo.jpg', 'Anime', '0'),
(18, 'Test', 0, 1, NULL, NULL, 'upload/Video/DVideo.jpg', 'Anime', '0');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `theme` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `historique` int(11) NOT NULL DEFAULT 0,
  `debugMode` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`ID`, `theme`, `image`, `historique`, `debugMode`) VALUES
(1, 'Default', 'user/1/LogoBack.png', 0, 1),
(2, 'Default', 'user/2/avatar_9.jpg', 0, 0),
(3, 'Default', 'User/Default/User.png', 0, 0),
(4, 'Default', 'user/4/IMG_6280.JPG', 0, 0),
(5, 'Default', 'User/Default/User.png', 0, 0),
(6, 'Default', 'User/Default/User.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `video`
--

DROP TABLE IF EXISTS `video`;
CREATE TABLE IF NOT EXISTS `video` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `titre` text NOT NULL,
  `SousTitre` text DEFAULT NULL,
  `Saison` int(11) NOT NULL DEFAULT 1,
  `Episode` int(11) NOT NULL DEFAULT 1,
  `Repertoire` text NOT NULL,
  `Proprietaire` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `video`
--

INSERT INTO `video` (`ID`, `titre`, `SousTitre`, `Saison`, `Episode`, `Repertoire`, `Proprietaire`) VALUES
(90, 'Papi', 'NoValide', 1, 1, 'upload/Video/Papi/S1/[HP] Hitou Meguri Kakure Yu Mao Hen 01 Vostfr.mp4', 1),
(89, 'Test', 'NoValide', 1, 1, 'upload/Video/Test/S1/[HP] Hitou Meguri Kakure Yu Mao Hen 01 Vostfr.mp4', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

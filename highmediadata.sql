-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 17 nov. 2019 à 17:19
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
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `historique`
--

INSERT INTO `historique` (`ID`, `User_ID`, `Name`, `type`, `Episode`, `Saison`) VALUES
(6, 1, 'Dororo', 0, '1 ', 1),
(3, 4, 'Dororo', 0, '1 ', 1),
(4, 4, 'Angel beats', 0, '1 ', 1),
(7, 1, 'Fairy tail', 0, '18 ', 1),
(8, 1, 'Angel beats', 0, '1 ', 1),
(9, 1, 'Dororo', 0, '3 ', 1),
(14, 1, 'Absolute duo', 0, '1 ', 1),
(11, 4, 'Akame kill', 0, '2 ', 1),
(12, 4, 'Absolute duo', 0, '1 ', 1),
(13, 1, 'Akame kill', 0, '1 ', 1),
(15, 1, 'Mirai niki', 0, '1 ', 1),
(16, 1, 'Dororo', 0, '7 ', 1),
(17, 1, 'Dakara boku wa, H ga dekinai', 0, '5 ', 1),
(22, 1, 'Dakara boku wa, H ga dekinai', 0, '1 ', 1),
(19, 1, 'Dakara boku wa, H ga dekinai', 0, '2 ', 1),
(20, 1, 'Dakara boku wa, H ga dekinai', 0, '3 ', 1),
(21, 1, 'Dakara boku wa, H ga dekinai', 0, '4 ', 1);

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
  `Nombre` int(11) NOT NULL DEFAULT '1',
  `Saison` int(11) DEFAULT NULL,
  `Synopsis` text,
  `Affiche` varchar(255) NOT NULL DEFAULT 'upload/Video/DVideo.jpg',
  `Genre` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `titre`
--

INSERT INTO `titre` (`id`, `nom`, `Format`, `Nombre`, `Saison`, `Synopsis`, `Affiche`, `Genre`, `Type`) VALUES
(2, 'Angel beats', 0, 1, NULL, NULL, 'upload/Video/Angel beats/angel_beats_1562.jpg', 'Anime', '0'),
(3, 'Another', 0, 1, NULL, NULL, 'upload/Video/Another/Another.jpg', 'Anime', '0'),
(4, 'Dog days', 0, 1, NULL, NULL, 'upload/Video/Dog days/40e69e936b635582fcc06d2d7c511f521341873931_full.jpg', 'Anime', '0'),
(5, 'Akame kill', 0, 1, NULL, NULL, 'upload/Video/Akame kill/akame_ga_kill_3191.jpg', 'Anime', '0'),
(6, 'Fairy tail', 0, 1, NULL, NULL, 'upload/Video/Fairy tail/f4ca1a545a471a9ce6e43eef8e8d72541539734102_full.jpg', 'Anime', '0'),
(7, 'Mirai niki', 0, 1, NULL, NULL, 'upload/Video/Mirai niki/51q6CKc-i6L._SX361_BO1,204,203,200_.jpg', 'Anime', '0'),
(8, 'Gamers', 0, 1, NULL, NULL, 'upload/Video/Gamers/gamers_6194.jpg', 'Anime', '0'),
(9, 'Date a live', 0, 1, NULL, NULL, 'upload/Video/Date a live/256_636970677259884840Date_A_Live_1_Small.png', 'Anime', '0'),
(10, 'Absolute duo', 0, 1, NULL, NULL, 'upload/Video/Absolute duo/49bbd90987cc2b8d5b0f6cc87465c14e1420158261_main.jpg', 'Anime', '0'),
(14, 'Episode', 0, 1, NULL, NULL, 'upload/Video/Episode/714hGxmNeGL._AC_SL1012_.jpg', 'Anime', '0');

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`ID`, `theme`, `image`, `historique`) VALUES
(1, 'Default', 'user/1/65 - Kw5kmL7.jpg', 0),
(2, 'Default', 'user/2/avatar_9.jpg', 0),
(3, 'Default', 'User/Default/User.png', 0),
(4, 'Default', 'user/4/IMG_6280.JPG', 0),
(5, 'Default', 'User/Default/User.png', 0),
(6, 'Default', 'User/Default/User.jpg', 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `video`
--

INSERT INTO `video` (`ID`, `titre`, `SousTitre`, `Saison`, `Episode`, `Repertoire`, `Proprietaire`) VALUES
(77, 'Episode', 'NoValide', 1, 9, 'upload/Video/Episode/S1/[KnY-BD]_Dakara_Boku_wa,_H_ga_Dekinai_09_[1080p][FHD][Anime-Ultime].mp4', 1),
(78, 'Episode', 'NoValide', 1, 10, 'upload/Video/Episode/S1/[KnY-BD]_Dakara_Boku_wa,_H_ga_Dekinai_10_[1080p][FHD][Anime-Ultime].mp4', 1),
(79, 'Episode', 'NoValide', 1, 11, 'upload/Video/Episode/S1/[KnY-BD]_Dakara_Boku_wa,_H_ga_Dekinai_11_[1080p][FHD][Anime-Ultime].mp4', 1),
(80, 'Episode', 'NoValide', 1, 12, 'upload/Video/Episode/S1/[KnY-BD]_Dakara_Boku_wa,_H_ga_Dekinai_12_[1080p][FHD][Anime-Ultime].mp4', 1),
(13, 'Angel beats', 'NoValide', 1, 1, 'upload/Video/Angel beats/S1/angel-beats-1-vf-le-depart-gum-gum-streaming.mp4', 1),
(14, 'Angel beats', 'NoValide', 1, 2, 'upload/Video/Angel beats/S1/angel-beats-2-vf-la-guilde-gum-gum-streaming.mp4', 1),
(15, 'Another', 'NoValide', 1, 1, 'upload/Video/Another/S1/Another 01 - vf.mp4', 1),
(16, 'Another', 'NoValide', 1, 2, 'upload/Video/Another/S1/Another 02 - vf.mp4', 1),
(17, 'Dog days', 'NoValide', 1, 1, 'upload/Video/Dog days/S1/Dog_Days_01_Vostfr.mp4', 1),
(18, 'Dog days', 'NoValide', 1, 2, 'upload/Video/Dog days/S1/Dog_Days_02_Vostfr.mp4', 1),
(19, 'Akame kill', 'NoValide', 1, 1, 'upload/Video/Akame kill/S1/Akame ga Kill! Episode 01.mp4', 1),
(20, 'Akame kill', 'NoValide', 1, 2, 'upload/Video/Akame kill/S1/Akame Ga Kill! Episode 2 Vostfr HD !.mp4', 1),
(21, 'Fairy tail', 'NoValide', 1, 18, 'upload/Video/Fairy tail/S1/FT018VF.mp4', 1),
(22, 'Fairy tail', 'NoValide', 1, 19, 'upload/Video/Fairy tail/S1/FT019VF.mp4', 1),
(23, 'Mirai niki', 'NoValide', 1, 1, 'upload/Video/Mirai niki/S1/Mirai Nikki 01 Vostfr .mp4', 1),
(24, 'Mirai niki', 'NoValide', 1, 2, 'upload/Video/Mirai niki/S1/Mirai Nikki 02 VOSTFR.mp4', 1),
(25, 'Gamers', 'NoValide', 1, 1, 'upload/Video/Gamers/S1/Gamers Episode 1 Vostfr.mp4', 1),
(26, 'Gamers', 'NoValide', 1, 2, 'upload/Video/Gamers/S1/Gamers Episode 2 Vostfr.mp4', 1),
(27, 'Date a live', 'NoValide', 1, 1, 'upload/Video/Date a live/S1/[Kanojo X Otome] Date A Live - 01 vostfr (BD 1920x1080 x264 AAC).mp4', 1),
(28, 'Date a live', 'NoValide', 1, 2, 'upload/Video/Date a live/S1/Date A Live 2 vostfr.mp4', 1),
(29, 'Absolute duo', 'NoValide', 1, 1, 'upload/Video/Absolute duo/S1/Absolute Duo 01 VOSTFR.mp4', 1),
(69, 'Episode', 'NoValide', 1, 1, 'upload/Video/Episode/S1/[KnY-BD]_Dakara_Boku_wa,_H_ga_Dekinai_01_[1080p][FHD][Anime-Ultime].mp4', 1),
(70, 'Episode', 'NoValide', 1, 2, 'upload/Video/Episode/S1/[KnY-BD]_Dakara_Boku_wa,_H_ga_Dekinai_02_[1080p][FHD][Anime-Ultime].mp4', 1),
(71, 'Episode', 'NoValide', 1, 3, 'upload/Video/Episode/S1/[KnY-BD]_Dakara_Boku_wa,_H_ga_Dekinai_03_[1080p][FHD][Anime-Ultime].mp4', 1),
(72, 'Episode', 'NoValide', 1, 4, 'upload/Video/Episode/S1/[KnY-BD]_Dakara_Boku_wa,_H_ga_Dekinai_04_[1080p][FHD][Anime-Ultime].mp4', 1),
(73, 'Episode', 'NoValide', 1, 5, 'upload/Video/Episode/S1/[KnY-BD]_Dakara_Boku_wa,_H_ga_Dekinai_05_[1080p][FHD][Anime-Ultime].mp4', 1),
(74, 'Episode', 'NoValide', 1, 6, 'upload/Video/Episode/S1/[KnY-BD]_Dakara_Boku_wa,_H_ga_Dekinai_06_[1080p][FHD][Anime-Ultime].mp4', 1),
(75, 'Episode', 'NoValide', 1, 7, 'upload/Video/Episode/S1/[KnY-BD]_Dakara_Boku_wa,_H_ga_Dekinai_07_[1080p][FHD][Anime-Ultime].mp4', 1),
(76, 'Episode', 'NoValide', 1, 8, 'upload/Video/Episode/S1/[KnY-BD]_Dakara_Boku_wa,_H_ga_Dekinai_08_[1080p][FHD][Anime-Ultime].mp4', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

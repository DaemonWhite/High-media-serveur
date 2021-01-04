-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : Dim 07 juin 2020 à 19:14
-- Version du serveur :  10.3.22-MariaDB-1ubuntu1
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `highmediadata`
--

-- --------------------------------------------------------

--
-- Structure de la table `audio`
--

CREATE TABLE `audio` (
  `ID` int(11) NOT NULL,
  `album` text NOT NULL,
  `Titre` text NOT NULL,
  `Disk` int(11) NOT NULL,
  `Piste` int(11) NOT NULL,
  `Repertoire` text NOT NULL,
  `Proprietaire` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `favori`
--

CREATE TABLE `favori` (
  `ID` int(11) NOT NULL,
  `User` int(11) NOT NULL,
  `Favori` text NOT NULL,
  `S` int(11) DEFAULT NULL,
  `Ep` int(11) DEFAULT NULL,
  `type` int(11) NOT NULL,
  `Genre` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `historique`
--

CREATE TABLE `historique` (
  `ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Name` text NOT NULL,
  `type` int(11) NOT NULL,
  `Episode` varchar(255) NOT NULL,
  `Saison` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `ID_user` int(11) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Name_Surname` varchar(255) NOT NULL,
  `Password` text NOT NULL,
  `Securiter` int(11) NOT NULL,
  `Chambre` int(11) NOT NULL,
  `IP1` text DEFAULT NULL,
  `IP2` text DEFAULT NULL,
  `Modif_IP` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`ID_user`, `UserName`, `Name_Surname`, `Password`, `Securiter`, `Chambre`, `IP1`, `IP2`, `Modif_IP`) VALUES
(1, 'DaemonWhite', 'TRAVERS matheo', '$2y$12$HmZxsGBxubTtWX5kDb2.fej9khmVEjhobuRV7yiLXrVA8KWfmA5hy', 3, 406, '::1', '192.168.1.26', 0),
(2, 'JordanRoy', 'HOULBERT Jordan', '$2y$10$mcxX2wMWrNdq1GiQpQwobO5kZKs6GpN2nekLfVvnqV.43iWgvloty', 3, 414, '192.168.43.40', NULL, 1),
(3, 'JordanSauvage', 'Renaudin NathanaÃ«l', '$2y$10$xP2gcKX7mrvAfs0OnIB8UuJZm4Z68vxpQC0sGFj445VpyhCRFTJgK', 2, 500, '192.168.43.91', NULL, 1),
(4, 'Bradley', 'Miguel Bradly ', '$2y$10$wrg7IZdQcRZc1nBMV22VMOFqloTB72Xk7aXGRkqS8BHhqwJe6vREa', 1, 156, '192.168.43.91', NULL, 1),
(5, 'KadoshiMiku', 'AmossÃ© AurÃ©lien', '$2y$10$uEOo4zdC9oAAYR1oHH5.F.2FOPgagI18xsvi5lve/Zwbfzb/r2Bie', 1, 409, '192.168.43.91', NULL, 1),
(6, 'Solandar', 'Prou Alexandre', '$2y$10$6XUjCquyzqNrRIRCBfwglerZ94MEpGYbUxSz88.guHWFkUMsL6br2', 1, 414, NULL, NULL, 0);

--
-- Déclencheurs `membre`
--
DELIMITER $$
CREATE TRIGGER `Ajout parametre` AFTER INSERT ON `membre` FOR EACH ROW INSERT into user (theme, image) VALUES ("Default", "user/Default/User.png")
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `titre`
--

CREATE TABLE `titre` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `Format` int(11) NOT NULL COMMENT '0 = video 1 = music',
  `Nombre` int(11) NOT NULL DEFAULT 1,
  `Artiste` text DEFAULT NULL,
  `Synopsis` text DEFAULT NULL,
  `Affiche` varchar(255) NOT NULL DEFAULT 'upload/Video/DVideo.jpg',
  `Genre` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL DEFAULT 'no'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `theme` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `historique` int(11) NOT NULL DEFAULT 0,
  `debugMode` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`ID`, `theme`, `image`, `historique`, `debugMode`) VALUES
(1, 'Default', 'user/user/1/LogoBack.png', 0, 1),
(2, 'Default', 'user/Default/User.png', 0, 0),
(3, 'Default', 'user/Default/User.png', 0, 0),
(4, 'Default', 'user/Default/User.png', 0, 0),
(5, 'Default', 'user/Default/User.png', 0, 0),
(6, 'Default', 'user/Default/User.png', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `video`
--

CREATE TABLE `video` (
  `ID` int(11) NOT NULL,
  `titre` text NOT NULL,
  `SousTitre` text DEFAULT NULL,
  `Saison` int(11) NOT NULL DEFAULT 1,
  `Episode` int(11) NOT NULL DEFAULT 1,
  `Repertoire` text NOT NULL,
  `Proprietaire` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `audio`
--
ALTER TABLE `audio`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `favori`
--
ALTER TABLE `favori`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `historique`
--
ALTER TABLE `historique`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`ID_user`);

--
-- Index pour la table `titre`
--
ALTER TABLE `titre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `audio`
--
ALTER TABLE `audio`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `favori`
--
ALTER TABLE `favori`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `historique`
--
ALTER TABLE `historique`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `ID_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `titre`
--
ALTER TABLE `titre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `video`
--
ALTER TABLE `video`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

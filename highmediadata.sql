-- phpMyAdmin SQL Dump
-- version 4.9.7deb1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : Dim 10 jan. 2021 à 16:24
-- Version du serveur :  10.3.25-MariaDB-0ubuntu1
-- Version de PHP : 7.4.9

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
  `Modif_IP` int(11) DEFAULT 0,
  `conf` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`ID_user`, `UserName`, `Name_Surname`, `Password`, `Securiter`, `Chambre`, `IP1`, `IP2`, `Modif_IP`, `conf`) VALUES
(1, 'DaemonWhite', 'TRAVERS matheo', '$2y$12$HmZxsGBxubTtWX5kDb2.fej9khmVEjhobuRV7yiLXrVA8KWfmA5hy', 3, 418, '127.0.0.1', '::1', 0, 1),
(2, 'JordanRoy', 'HOULBERT Jordan', '$2y$10$mcxX2wMWrNdq1GiQpQwobO5kZKs6GpN2nekLfVvnqV.43iWgvloty', 3, 414, '192.168.43.40', NULL, 1, 0);

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
  `subGenre` varchar(255) DEFAULT NULL,
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
(1, 'Default', 'user/user/1/LogoBack.png', 0, 0),
(2, 'Default', 'user/Default/User.png', 0, 0);

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
  `Proprietaire` int(11) NOT NULL,
  `Lang` varchar(255) DEFAULT NULL
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
  MODIFY `ID_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `titre`
--
ALTER TABLE `titre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `video`
--
ALTER TABLE `video`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

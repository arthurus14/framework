-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 08 jan. 2021 à 13:05
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `creaweb`
--

-- --------------------------------------------------------

--
-- Structure de la table `apparence`
--

DROP TABLE IF EXISTS `apparence`;
CREATE TABLE IF NOT EXISTS `apparence` (
  `titreSite` varchar(255) NOT NULL,
  `bgColor` varchar(255) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `apparence`
--

INSERT INTO `apparence` (`titreSite`, `bgColor`, `id`) VALUES
('mon site internet', '#563d7c', 15);

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `texte` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `texte` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=141 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `texte`) VALUES
(76, 'upload     ', '<p>fichier modifié depuis mon espace d\'administration</p>'),
(79, 'mon article', 'mon super article');

-- --------------------------------------------------------

--
-- Structure de la table `coords`
--

DROP TABLE IF EXISTS `coords`;
CREATE TABLE IF NOT EXISTS `coords` (
  `mail` varchar(255) NOT NULL,
  `fb` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `numero` int(11) NOT NULL,
  `rue` varchar(255) NOT NULL,
  `cp` int(11) NOT NULL,
  `ville` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `coords`
--

INSERT INTO `coords` (`mail`, `fb`, `tel`, `image`, `numero`, `rue`, `cp`, `ville`) VALUES
('staubin.cdf@wanadoo.fr', 'https://www.facebook.com/cdf.saintaubin', '0231979592', '', 41, 'rue du marÃ©chal Joffre', 14750, 'Saint aubin / mer');

-- --------------------------------------------------------

--
-- Structure de la table `soon`
--

DROP TABLE IF EXISTS `soon`;
CREATE TABLE IF NOT EXISTS `soon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `texte` longtext NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `soon`
--

INSERT INTO `soon` (`id`, `titre`, `images`, `texte`, `date`) VALUES
(1, 'janvier', 'images/img1.png', 'évènement prévu en Janvier 2018.', '2019-01-01'),
(2, 'Février', 'images/img1.png', 'évènement prévu en Février', '2019-01-01'),
(3, 'Mars', 'images/img1.png', 'évènement prévu en mars.', '2019-01-01');

-- --------------------------------------------------------

--
-- Structure de la table `upload`
--

DROP TABLE IF EXISTS `upload`;
CREATE TABLE IF NOT EXISTS `upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fichier` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `upload`
--

INSERT INTO `upload` (`id`, `fichier`) VALUES
(1, 'marche.pdf'),
(2, 'paque.pdf');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `statut` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `name`, `pwd`, `statut`, `mail`) VALUES
(1, 'arthurus', '89e495e7941cf9e40e6980d14a16bf023ccd4c91', 'admin', 'clui1@msn.com'),
(7, 'camille', 'd0b7f72b359e79f3aa2267d41106ebccac67a776', 'admin', 'camille@admin.com'),
(8, 'nouveau', '89e495e7941cf9e40e6980d14a16bf023ccd4c91', 'admin', 'new@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 04 mai 2019 à 04:46
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `trotinette`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id_client` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `adresse` varchar(500) NOT NULL,
  `motDePasse` varchar(20) NOT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `nom`, `prenom`, `adresse`, `motDePasse`) VALUES
(1, 'fares', 'loubna', 'Perpignan, France', 'loubnaloubna'),
(2, 'rabou', 'rachid', 'Marrakech, Maroc', 'rachidrachid'),
(3, 'adirm', 'imane', 'Marrakech, Maroc', 'imaneimane'),
(6, 'elbahri', 'morad', 'boumerdoul', 'moradmorad'),
(7, '', '', '', ''),
(8, '', '', '', ''),
(9, '', '', '', ''),
(10, '', '', '', ''),
(11, '', '', '', ''),
(12, '', '', '', ''),
(13, '', 'hasna', 'marrakech', 'hasnahasna'),
(14, '', '', '', ''),
(15, '', 'hasna', 'marrakech', ''),
(16, '', '', '', ''),
(17, '', '', '', ''),
(18, '', 'ayoub', 'marrakech', 'ayoub'),
(19, '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

DROP TABLE IF EXISTS `employe`;
CREATE TABLE IF NOT EXISTS `employe` (
  `id_employe` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `adresse` varchar(500) NOT NULL,
  `motDePasse` varchar(20) NOT NULL,
  PRIMARY KEY (`id_employe`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `employe`
--

INSERT INTO `employe` (`id_employe`, `nom`, `prenom`, `adresse`, `motDePasse`) VALUES
(1, 'fares', 'loubna', 'Perpignan, France', 'loubnaloubna'),
(2, 'rabou', 'rachid', 'Marrakech, Maroc', 'rachidrachid'),
(12, 'elbahri', 'morad', 'boumerdoul', 'moradmorad');

-- --------------------------------------------------------

--
-- Structure de la table `station`
--

DROP TABLE IF EXISTS `station`;
CREATE TABLE IF NOT EXISTS `station` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `adresse` varchar(500) NOT NULL,
  `nombreTrotinettes` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `trotinette`
--

DROP TABLE IF EXISTS `trotinette`;
CREATE TABLE IF NOT EXISTS `trotinette` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `etat` varchar(100) NOT NULL,
  `client` int(11) NOT NULL,
  `station` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_client_numero` (`client`),
  KEY `fk_station_numero` (`station`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

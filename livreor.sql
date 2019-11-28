-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 26 nov. 2019 à 16:03
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
-- Base de données :  `livreor`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commentaire` text NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `commentaire`, `id_utilisateur`, `date`) VALUES
(46, '1 2 TEST 1 2 TEST EU>NA', 2, '2019-11-25 15:23:46'),
(47, 'Oi m8 toast toast', 6, '2019-11-25 16:01:56'),
(48, 'Aled svp je sui perdu', 6, '2019-11-26 11:16:30'),
(49, 'Aled svp', 5, '2019-11-26 11:17:17'),
(50, 'Release Guardian already pls ', 7, '2019-11-26 11:32:21'),
(51, 'qsdqsdqsd', 7, '2019-11-26 12:09:00'),
(52, 'qsddqsfqfqf', 7, '2019-11-26 12:12:37'),
(53, 'toast css', 7, '2019-11-26 12:13:56'),
(54, 'wxmnsdnffdjgdfds', 7, '2019-11-26 12:25:09'),
(55, 'Test test test Test test test Test test test Test test test ', 5, '2019-11-26 16:11:34'),
(56, 'Beau site (ou pas) !', 5, '2019-11-26 16:12:09'),
(57, 'ArrÃªtez', 5, '2019-11-26 16:12:21'),
(58, '123456789123456789', 5, '2019-11-26 16:30:39'),
(59, 'Oi m8', 5, '2019-11-26 16:30:43');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(2, 'paul', '$2y$12$obgVdMX0Rb7YugwYOOiRyOXMDjKLNFJ.V1BkStLbkg8DUpFevhDhu'),
(3, 'paulo', '$2y$12$r9/mKe7cjwSS2tKCmHbDFO63cHCw68Ryi40i9lZfZ6TYF0p.PnXfK'),
(5, 'admin', '$2y$12$JWnL9tn27K7Fj6isD7enL.6uYf/KsVTu4hkRuLbXRWr2BpALvHHFG'),
(6, 'Pauloo', '$2y$12$1drz9O6pVV1rPxc54E.eCuvsvOiS8zmy0wHU.3Sq00F.TsHIYEDia'),
(7, 'Guardianisbae', '$2y$12$aS/V/3ZGBM81JvCnd8TJAerhIb4ZIQpepZOZbh/NvGHEAgU5dNpfy');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

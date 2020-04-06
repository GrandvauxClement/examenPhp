-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 06 avr. 2020 à 13:19
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
-- Base de données :  `dauphine`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

DROP TABLE IF EXISTS `annonce`;
CREATE TABLE IF NOT EXISTS `annonce` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_link` varchar(250) DEFAULT NULL,
  `contenu` text NOT NULL,
  `titre` varchar(250) NOT NULL,
  `nom_prenom_utilisateur` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `annonce_id_uindex` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`id`, `image_link`, `contenu`, `titre`, `nom_prenom_utilisateur`) VALUES
(1, '5e8aea41b8939.png', 'Gros vaisseau de guerre, qui est pas là pour faire dans la dentelle, surveillez vos arrières ça va chauffer ! ', 'Vaisseau de guerre du turfu', 'GRANDVAUX Clément'),
(2, '5e8b1b19c42f8.jpeg', 'Vous pouvez réduire le risque de contracter l\'infection si:\r\nvous vous nettoyez fréquemment les mains avec un produit hydroalcoolique ou à l\'eau et au savon\r\nvous vous couvrez le nez et la bouche avec un mouchoir ou le creux du coude quand vous toussez ou éternuez\r\nvous évitez les contacts étroits (à moins de 1 mètre ou 3 pieds) avec toute personne ayant des symptômes de rhume banal ou d\'état grippal', 'Comment endiguer la progression du Covid-19', 'GRANDVAUX Clément'),
(3, '5e8b27941a9f3.jpeg', 'La France à créer la suprise pour ce tournoi des 6nations. Ils ont n\'ont seulement battu les Anglais (vice-champion du monde) mais également les gallois (tenant du titre des 6nations) et en y mettant la manière, ils ont démontrer leur force de caractère. Cette équipe porté par de jeune espoir du rugby français (Antoine DUPONT, Romain Ntamak) à annoncer la couleur lors de ce tournoi, et laisse espérer le retour d\'une équipe de France gagnante, ramenant des trophées à la maison .', 'RUGBY : Tournoi des 6nations 2020', 'GRANDVAUX Clément'),
(4, '5e8b28bd16325.png', 'La découverte du php est très intéressante et très utile, surtout pour ce qui est back-end. Cependant, la syntaxe est très lourde !! \r\nVivement la découverte d\'un framework PHP comme symfony !! :) ', 'Le PHP', 'Journaliste Free-lance');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(250) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `prenom` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `utilisateur_id_uindex` (`id`),
  UNIQUE KEY `utilisateur_login_uindex` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `login`, `nom`, `prenom`, `password`) VALUES
(1, 'admin', 'GRANDVAUX', 'Clément', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'dauphine1', 'Journaliste', 'Free-lance', '98bda43fa2ff3234d898e0caf5c8ec08');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 25 Mai 2020 à 23:36
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `memoire`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

CREATE TABLE IF NOT EXISTS `annonce` (
  `id_annonce` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `id_metier` int(11) NOT NULL,
  `id_ville` int(11) NOT NULL,
  `experience` varchar(30) NOT NULL,
  `competences` text CHARACTER SET utf8 NOT NULL,
  `date_creation` date NOT NULL,
  `image` varchar(300) NOT NULL,
  `valide` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_annonce`),
  KEY `id_annonce` (`id_annonce`),
  KEY `id_utilisateur` (`id_utilisateur`),
  KEY `id_metier` (`id_metier`),
  KEY `id_ville` (`id_ville`),
  KEY `id_utilisateur_2` (`id_utilisateur`),
  KEY `id_metier_2` (`id_metier`),
  KEY `id_ville_2` (`id_ville`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `annonce`
--

INSERT INTO `annonce` (`id_annonce`, `id_utilisateur`, `id_metier`, `id_ville`, `experience`, `competences`, `date_creation`, `image`, `valide`) VALUES
(1, 3, 1, 1, '20 ans', '', '2020-04-11', 'homme1.jpg', 0),
(2, 4, 1, 2, '10 ans', '', '2020-04-11', 'homme2.png', 0),
(3, 2, 1, 5, '5 ans', '', '2020-04-11', 'homme3.jpg', 0),
(4, 5, 2, 4, '10 ans', '', '2020-05-19', 'homme4.jpg', 0),
(5, 6, 3, 1, '20 ans', '', '2020-05-19', '', 0),
(6, 6, 3, 1, '20 ans', '', '2020-05-19', 'homme5.jpg', 0),
(7, 3, 3, 1, '5 ans', '', '2020-05-20', 'homme1.jpg', 0);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE IF NOT EXISTS `commentaire` (
  `id_commentaire` int(20) NOT NULL AUTO_INCREMENT,
  `id_annonce` int(20) NOT NULL,
  `id_utilisateur` int(20) NOT NULL,
  `commentaire` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id_commentaire`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`id_commentaire`, `id_annonce`, `id_utilisateur`, `commentaire`) VALUES
(1, 7, 1, 'son travail est parfait'),
(2, 7, 1, 'jojHlHlb'),
(3, 7, 1, 'jojHlHlb'),
(4, 7, 1, 'jojHlHlb'),
(5, 7, 1, 'jojHlHlb'),
(6, 7, 1, 'jojHlHlb'),
(7, 7, 1, 'jojHlHlb'),
(8, 7, 1, 'jojHlHlb'),
(9, 7, 1, 'jojHlHlb'),
(10, 7, 1, 'jojHlHlb');

-- --------------------------------------------------------

--
-- Structure de la table `etoile`
--

CREATE TABLE IF NOT EXISTS `etoile` (
  `id_note` int(20) NOT NULL AUTO_INCREMENT,
  `id_annonce` int(20) NOT NULL,
  `id_utilisateur` int(20) NOT NULL,
  `note` int(20) NOT NULL,
  PRIMARY KEY (`id_note`),
  KEY `id_annonce` (`id_annonce`),
  KEY `id_utilisateur` (`id_utilisateur`),
  KEY `id_annonce_2` (`id_annonce`),
  KEY `id_annonce_3` (`id_annonce`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Contenu de la table `etoile`
--

INSERT INTO `etoile` (`id_note`, `id_annonce`, `id_utilisateur`, `note`) VALUES
(19, 2, 1, 3),
(20, 3, 1, 4),
(21, 2, 1, 5),
(22, 3, 1, 1),
(23, 4, 1, 4),
(24, 4, 1, 3),
(25, 2, 1, 5),
(26, 3, 1, 3),
(27, 6, 1, 4),
(28, 5, 1, 2),
(29, 7, 1, 5),
(30, 7, 1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `metier`
--

CREATE TABLE IF NOT EXISTS `metier` (
  `id_metier` int(10) NOT NULL AUTO_INCREMENT,
  `nom_metier` varchar(20) NOT NULL,
  PRIMARY KEY (`id_metier`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `metier`
--

INSERT INTO `metier` (`id_metier`, `nom_metier`) VALUES
(1, 'macon'),
(2, 'manuisier'),
(3, 'peintre'),
(4, 'cordonnier');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(15) CHARACTER SET utf8 NOT NULL,
  `prenom` varchar(15) CHARACTER SET utf8 NOT NULL,
  `e_mail` varchar(50) CHARACTER SET utf8 NOT NULL,
  `mot_de_passe` varchar(30) CHARACTER SET utf8 NOT NULL,
  `age` int(5) NOT NULL,
  `n_telephone` int(15) NOT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `e_mail`, `mot_de_passe`, `age`, `n_telephone`) VALUES
(1, 'trad', 'roufaida', 'roufaidatrad5@outlook.fr', 'fiverouf', 20, 663178887),
(2, 'djouad', 'nacer', 'djouadnacer@gmail.com', 'nacerdjo', 26, 758965328),
(3, 'labaiz', 'mourad', 'labaizmourad@outlook.fr', 'lablab23', 40, 589697563),
(4, 'bouras', 'amine', 'amineamine@gmail.com', 'amine15', 35, 589876352),
(5, 'salem', 'ramzi', 'ramzisalem@gmail.com', 'ramzi23', 40, 2147483647),
(6, 'telili', 'samir', 'samirtel@yahoo.fr', 'tel456', 50, 58974124);

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

CREATE TABLE IF NOT EXISTS `ville` (
  `id_ville` int(10) NOT NULL AUTO_INCREMENT,
  `nom_ville` varchar(20) NOT NULL,
  PRIMARY KEY (`id_ville`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `ville`
--

INSERT INTO `ville` (`id_ville`, `nom_ville`) VALUES
(1, 'adrar'),
(2, 'chlef'),
(3, 'laghouat'),
(4, 'oum el bouaghi'),
(5, 'batna');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD CONSTRAINT `annon_metier` FOREIGN KEY (`id_metier`) REFERENCES `metier` (`id_metier`),
  ADD CONSTRAINT `annon_util` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`),
  ADD CONSTRAINT `anno_ville` FOREIGN KEY (`id_ville`) REFERENCES `ville` (`id_ville`);

--
-- Contraintes pour la table `etoile`
--
ALTER TABLE `etoile`
  ADD CONSTRAINT `etoile_annon` FOREIGN KEY (`id_annonce`) REFERENCES `annonce` (`id_annonce`),
  ADD CONSTRAINT `etoile_util` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 29 Juillet 2015 à 14:03
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `poste`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(100) NOT NULL AUTO_INCREMENT,
  `login` text NOT NULL,
  `pass` text NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `login`, `pass`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Structure de la table `agent`
--

CREATE TABLE IF NOT EXISTS `agent` (
  `id_agent` int(100) NOT NULL AUTO_INCREMENT,
  `type` text NOT NULL,
  `ncin` text NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `tel` text NOT NULL,
  `login` text NOT NULL,
  `pass` text NOT NULL,
  PRIMARY KEY (`id_agent`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `agent`
--

INSERT INTO `agent` (`id_agent`, `type`, `ncin`, `nom`, `prenom`, `tel`, `login`, `pass`) VALUES
(6, 'poste', '07931119', 'adib', 'aouadi', '24095508', 'poste', 'e10adc3949ba59abbe56e057f20f883e'),
(7, 'ANCE', '04827479', 'adib', 'aouadi', '24658047', 'ANCE', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Structure de la table `certificat`
--

CREATE TABLE IF NOT EXISTS `certificat` (
  `id_certificat` int(100) NOT NULL AUTO_INCREMENT,
  `etat` text NOT NULL,
  `date` date NOT NULL,
  `id_client` int(100) NOT NULL,
  PRIMARY KEY (`id_certificat`),
  KEY `id_client` (`id_client`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `certificat`
--

INSERT INTO `certificat` (`id_certificat`, `etat`, `date`, `id_client`) VALUES
(3, 'reçu', '2015-06-03', 14);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id_client` int(100) NOT NULL AUTO_INCREMENT,
  `ncin` text NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `tel` text NOT NULL,
  `email` text NOT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id_client`, `ncin`, `nom`, `prenom`, `tel`, `email`) VALUES
(14, '08996633', 'insaf', 'selmi', '22554477', 'insaf@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

CREATE TABLE IF NOT EXISTS `demande` (
  `id_demande` int(11) NOT NULL AUTO_INCREMENT,
  `type` text NOT NULL,
  `date` date NOT NULL,
  `etat` text NOT NULL,
  `resultat` text,
  `id_client` int(100) NOT NULL,
  PRIMARY KEY (`id_demande`),
  KEY `id_client` (`id_client`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `demande`
--

INSERT INTO `demande` (`id_demande`, `type`, `date`, `etat`, `resultat`, `id_client`) VALUES
(12, 'Carte électronique', '2015-05-30', 'Accepter', NULL, 14),
(13, 'Carte électronique', '2015-06-03', 'envoyer', NULL, 14);

-- --------------------------------------------------------

--
-- Structure de la table `reclamation`
--

CREATE TABLE IF NOT EXISTS `reclamation` (
  `id_reclamation` int(100) NOT NULL AUTO_INCREMENT,
  `sujet` text NOT NULL,
  `date` date NOT NULL,
  `texte` text NOT NULL,
  `id_client` int(100) NOT NULL,
  PRIMARY KEY (`id_reclamation`),
  KEY `id_client` (`id_client`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `reclamation`
--

INSERT INTO `reclamation` (`id_reclamation`, `sujet`, `date`, `texte`, `id_client`) VALUES
(7, 'vs', '2015-06-02', 'vsvs', 14);

-- --------------------------------------------------------

--
-- Structure de la table `support`
--

CREATE TABLE IF NOT EXISTS `support` (
  `id_support` int(11) NOT NULL AUTO_INCREMENT,
  `num_s` text NOT NULL,
  `marque` text NOT NULL,
  `type` text NOT NULL,
  `id_client` int(100) NOT NULL,
  PRIMARY KEY (`id_support`),
  KEY `id_client` (`id_client`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `support`
--

INSERT INTO `support` (`id_support`, `num_s`, `marque`, `type`, `id_client`) VALUES
(9, '0123', 'sony', 'Carte électronique', 14),
(10, '0123', 'samsung', 'Clé', 14),
(11, '0556', 'sony', 'Carte électronique', 14);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `certificat`
--
ALTER TABLE `certificat`
  ADD CONSTRAINT `certificat_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`);

--
-- Contraintes pour la table `demande`
--
ALTER TABLE `demande`
  ADD CONSTRAINT `demande_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`);

--
-- Contraintes pour la table `reclamation`
--
ALTER TABLE `reclamation`
  ADD CONSTRAINT `reclamation_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`);

--
-- Contraintes pour la table `support`
--
ALTER TABLE `support`
  ADD CONSTRAINT `support_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

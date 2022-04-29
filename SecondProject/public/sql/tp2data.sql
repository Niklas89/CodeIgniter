-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 29 avr. 2022 à 12:02
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tp2`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `idClient` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `address` text NOT NULL,
  `postalcode` varchar(5) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `idMaritalStatus` int(11) NOT NULL,
  PRIMARY KEY (`idClient`),
  KEY `client_maritalStatus_FK` (`idMaritalStatus`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`idClient`, `lastname`, `firstname`, `birthdate`, `address`, `postalcode`, `phone`, `idMaritalStatus`) VALUES
(1, 'Dupont', 'Benoit', '2004-04-12', '20 rue Yves Le Coz', '75016', '0635457895', 1),
(2, 'Grosse', 'Gregory', '1976-07-23', '40, avenue des Terroirs de France', '75616', '0635785912', 4),
(3, 'Lacroix', 'Jacques', '1990-10-23', '16 rue de Grenelle', '75007', '0685124598', 2),
(4, 'August', 'Bertrand', '1989-10-23', '50 avenue de Foch', '75008', '0685124598', 1);

-- --------------------------------------------------------

--
-- Structure de la table `credit`
--

DROP TABLE IF EXISTS `credit`;
CREATE TABLE IF NOT EXISTS `credit` (
  `idCredit` int(11) NOT NULL AUTO_INCREMENT,
  `organization` varchar(50) NOT NULL,
  `amount` double NOT NULL,
  `idClient` int(11) NOT NULL,
  PRIMARY KEY (`idCredit`),
  KEY `credit_client_FK` (`idClient`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `credit`
--

INSERT INTO `credit` (`idCredit`, `organization`, `amount`, `idClient`) VALUES
(1, 'LaManu', 490.99, 4),
(4, 'Coursera', 100, 1),
(5, 'Coursera', 50.9, 2),
(6, 'Coursera', 330.5, 1),
(12, 'HSBC', 978, 4),
(16, 'LaMonu', 890, 1);

-- --------------------------------------------------------

--
-- Structure de la table `maritalstatus`
--

DROP TABLE IF EXISTS `maritalstatus`;
CREATE TABLE IF NOT EXISTS `maritalstatus` (
  `idMaritalStatus` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`idMaritalStatus`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `maritalstatus`
--

INSERT INTO `maritalstatus` (`idMaritalStatus`, `status`) VALUES
(1, 'Célibataire'),
(2, 'Concubinage'),
(3, 'Divorcé'),
(4, 'Marié'),
(5, 'Veuf');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_maritalStatus_FK` FOREIGN KEY (`idMaritalStatus`) REFERENCES `maritalstatus` (`idMaritalStatus`);

--
-- Contraintes pour la table `credit`
--
ALTER TABLE `credit`
  ADD CONSTRAINT `credit_client_FK` FOREIGN KEY (`idClient`) REFERENCES `client` (`idClient`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

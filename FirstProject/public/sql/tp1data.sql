-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 27 avr. 2022 à 13:18
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
-- Base de données : `tp1`
--

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `serviceid` int(11) NOT NULL AUTO_INCREMENT,
  `serviceName` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`serviceid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`serviceid`, `serviceName`, `description`) VALUES
(1, 'Maintenance', 'Les spécialistes du Hardware'),
(2, 'Web Developer', 'Pour eux tout est code'),
(3, 'Web Designer', 'Y a que le CSS dans la vie'),
(4, 'Reférenceur', 'Regarde les Serps Google du matin au soir et du soir au matin');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `address` text NOT NULL,
  `postalcode` int(11) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `id_service` int(11) NOT NULL,
  PRIMARY KEY (`userid`),
  KEY `user_service_FK` (`id_service`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`userid`, `lastname`, `firstname`, `birthdate`, `address`, `postalcode`, `phone`, `id_service`) VALUES
(2, 'Dupont', 'Benoit', '2004-04-12', '20 rue Yves Le Coz', 75016, '0635457895', 1),
(16, 'Grosse', 'Gregory', '1976-07-23', '40, avenue des Terroirs de France', 75616, '0635785912', 1),
(17, 'Lacroix', 'Jacques', '1990-10-23', '16 rue de Grenelle', 75007, '0685124598', 2),
(18, 'August', 'Bertrand', '1990-10-23', '50 avenue de Foch', 75008, '0685124598', 3);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_service_FK` FOREIGN KEY (`id_service`) REFERENCES `service` (`serviceid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

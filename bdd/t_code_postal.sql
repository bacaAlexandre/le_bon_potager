-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 12 avr. 2018 à 07:40
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `le_bon_potager`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_code_postal`
--

DROP TABLE IF EXISTS `t_code_postal`;
CREATE TABLE IF NOT EXISTS `t_code_postal` (
  `id_code_postal` int(11) NOT NULL AUTO_INCREMENT,
  `cpLibelle` varchar(45) NOT NULL,
  `cpVille_id` int(11) NOT NULL,
  PRIMARY KEY (`id_code_postal`,`cpVille_id`),
  KEY `fk_T_CODE_POSTAL_T_VILLE1_idx` (`cpVille_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_code_postal`
--

INSERT INTO `t_code_postal` (`id_code_postal`, `cpLibelle`, `cpVille_id`) VALUES
(1, '76000', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `t_code_postal`
--
ALTER TABLE `t_code_postal`
  ADD CONSTRAINT `fk_T_CODE_POSTAL_T_VILLE1` FOREIGN KEY (`cpVille_id`) REFERENCES `t_ville` (`id_ville`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
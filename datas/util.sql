-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 08 Octobre 2015 à 16:37
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `mvcoo`
--

-- --------------------------------------------------------

--
-- Structure de la table `util`
--

CREATE TABLE IF NOT EXISTS `util` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lelogin` varchar(45) DEFAULT NULL,
  `lepass` varchar(45) DEFAULT NULL,
  `lenom` varchar(100) DEFAULT NULL,
  `ledroit` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `lelogin_UNIQUE` (`lelogin`),
  KEY `fk_util_droit_idx` (`ledroit`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `util`
--

INSERT INTO `util` (`id`, `lelogin`, `lepass`, `lenom`, `ledroit`) VALUES
(1, 'superman', 'heroes', 'Kal-El fils de Jor-El', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

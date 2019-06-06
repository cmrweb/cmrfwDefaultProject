-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 15 jan. 2019 à 21:03
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
-- Base de données :  `db_cmrfw`
--

-- --------------------------------------------------------

--
-- Structure de la table `cmr_post`
--

DROP TABLE IF EXISTS `cmr_post`;
CREATE TABLE IF NOT EXISTS `cmr_post` (
  `post_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `titre` varchar(128) NOT NULL,
  `post` text NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cmr_post`
--

INSERT INTO `cmr_post` (`post_id`, `user_id`, `titre`, `post`) VALUES
(1, 2, 'article 1', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam necessitatibus dolor sint doloribus, quas eaque, aliquam sit veritatis officiis animi assumenda facilis quaerat distinctio magnam quia neque libero eum ipsa!Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam necessitatibus dolor sint doloribus, quas eaque, aliquam sit veritatis officiis animi assumenda facilis quaerat distinctio magnam quia neque libero eum ipsa!'),
(2, 1, 'article 2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam necessitatibus dolor sint doloribus, quas eaque, aliquam sit veritatis officiis animi assumenda facilis quaerat distinctio magnam quia neque libero eum ipsa!Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam necessitatibus dolor sint doloribus, quas eaque, aliquam sit veritatis officiis animi assumenda facilis quaerat distinctio magnam quia neque libero eum ipsa!Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam necessitatibus dolor sint doloribus, quas eaque, aliquam sit veritatis officiis animi assumenda facilis quaerat distinctio magnam quia neque libero eum ipsa!Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam necessitatibus dolor sint doloribus, quas eaque, aliquam sit veritatis officiis animi assumenda facilis quaerat distinctio magnam quia neque libero eum ipsa!');

-- --------------------------------------------------------

--
-- Structure de la table `cmr_user`
--

DROP TABLE IF EXISTS `cmr_user`;
CREATE TABLE IF NOT EXISTS `cmr_user` (
  `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cmr_user`
--

INSERT INTO `cmr_user` (`user_id`, `username`, `password`) VALUES
(1, 'tykrasta', '1234'),
(2, 'cmrweb', '1234');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

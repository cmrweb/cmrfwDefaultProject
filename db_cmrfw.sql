-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 16 juin 2019 à 19:39
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
-- Structure de la table `cmr_code`
--

DROP TABLE IF EXISTS `cmr_code`;
CREATE TABLE IF NOT EXISTS `cmr_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `demo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cmr_code`
--

INSERT INTO `cmr_code` (`id`, `titre`, `code`, `demo`) VALUES
(1, 'Balise', 'code(string $tag ,string $content ,?string $class ,?string $id )', 'echo $html->code(\'section\',\'ceci est une section\',\'large dark center\');\r\necho $html->code(\'section\',$html->code(\'p\',\'paragraphe\'),\'medium primary center\');'),
(2, 'Titre', 'h(int $num ,string $content )', 'echo $html->h( 2 ,\'ceci est un titre h2\' );\r\necho  $html->h( 3 ,\'ceci est un titre h3\' );'),
(3, 'Paragraphe', 'p( string $content )', 'echo $html->p(\'ceci est un paragraphe\');'),
(4, 'lien', 'a( string $link , string $content );', 'echo $html->a(\'#\',\'ceci est un lien\');'),
(5, 'Menu', 'menu( [\'content\' => \'link\'] , ?string $class , ?string $id )', 'echo $html->menu( [\'menu 1\' => \'#\']);\r\necho $html->code(\'nav\',\r\n$html->menu( [\r\n\'menu 1\' => \'#\',\r\n\"menu 2</a>\". $html->menu( [\'sous-menu\' => \'#\']) => \'#\' ]),\'nav navrad\');'),
(6, 'Image', 'img ( string $source , ?string $alt, ?string $class ),', 'echo$html->img(ROOT_DIR.IMG_DIR.\'tykrastalion.png\',\'text alternatif\',\'small center\');');

-- --------------------------------------------------------

--
-- Structure de la table `cmr_follow`
--

DROP TABLE IF EXISTS `cmr_follow`;
CREATE TABLE IF NOT EXISTS `cmr_follow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `follow_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `cmr_hashtag`
--

DROP TABLE IF EXISTS `cmr_hashtag`;
CREATE TABLE IF NOT EXISTS `cmr_hashtag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cmr_hashtag`
--

INSERT INTO `cmr_hashtag` (`id`, `tag`) VALUES
(1, '#test'),
(2, '#beta');

-- --------------------------------------------------------

--
-- Structure de la table `cmr_post`
--

DROP TABLE IF EXISTS `cmr_post`;
CREATE TABLE IF NOT EXISTS `cmr_post` (
  `post_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `titre` varchar(128) NOT NULL,
  `post` text NOT NULL,
  `img` varchar(20) DEFAULT NULL,
  `like_count` int(11) DEFAULT '0',
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `cmr_user`
--

DROP TABLE IF EXISTS `cmr_user`;
CREATE TABLE IF NOT EXISTS `cmr_user` (
  `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin_lvl` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

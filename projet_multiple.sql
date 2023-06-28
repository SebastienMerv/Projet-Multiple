-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 28 Juin 2023 à 07:50
-- Version du serveur :  5.6.20-log
-- Version de PHP :  5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `projet_multiple`
--

-- --------------------------------------------------------

--
-- Structure de la table `infoserver`
--

CREATE TABLE IF NOT EXISTS `infoserver` (
  `Name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Description` varchar(255) CHARACTER SET utf8 NOT NULL,
  `News_title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `News_description` varchar(255) CHARACTER SET utf8 NOT NULL,
  `News_date` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `infoserver`
--

INSERT INTO `infoserver` (`Name`, `Description`, `News_title`, `News_description`, `News_date`) VALUES
('Sébastien Merveille - Projet', '$descpost', 'Merci du soutien !', 'Merci d''être là et de tester mes créations', '11 février 2023');

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
  `Text` varchar(255) NOT NULL,
`Note_id` int(11) NOT NULL,
  `User_id` int(255) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Structure de la table `ranks`
--

CREATE TABLE IF NOT EXISTS `ranks` (
`Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `ranks`
--

INSERT INTO `ranks` (`Id`, `Name`) VALUES
(2, 'Defaut'),
(3, 'Administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `task`
--

CREATE TABLE IF NOT EXISTS `task` (
  `status` varchar(10) CHARACTER SET utf8 NOT NULL,
  `name` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `Id_user` varchar(1000) CHARACTER SET utf8 NOT NULL,
`id` int(255) NOT NULL,
  `due_date` varchar(255) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `Name` varchar(25) CHARACTER SET utf8 NOT NULL,
  `Surname` varchar(25) CHARACTER SET utf8 NOT NULL,
`Id` int(11) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Password` varchar(25) CHARACTER SET utf8 NOT NULL,
  `Description` varchar(2555) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`Name`, `Surname`, `Id`, `email`, `Password`, `Description`) VALUES
('Merveille', 'Sébastien', 7, 'sebastienmerveilleriviere@gmail.com', '@Lafleche1', 'Je suis un petit développeur avec quelques petites connaissances en PHP, MySQL, HTML et CSS je suis actuellement en contrat d''apprentissage à la Ville d''Andenne en tant qu''étudiant IFAPME');

-- --------------------------------------------------------

--
-- Structure de la table `users_rank`
--

CREATE TABLE IF NOT EXISTS `users_rank` (
  `Rank_id` int(255) NOT NULL,
  `Users_id` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users_rank`
--

INSERT INTO `users_rank` (`Rank_id`, `Users_id`) VALUES
(3, 7);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `notes`
--
ALTER TABLE `notes`
 ADD PRIMARY KEY (`Note_id`);

--
-- Index pour la table `ranks`
--
ALTER TABLE `ranks`
 ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `task`
--
ALTER TABLE `task`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `notes`
--
ALTER TABLE `notes`
MODIFY `Note_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `ranks`
--
ALTER TABLE `ranks`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `task`
--
ALTER TABLE `task`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

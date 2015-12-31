-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 31 Décembre 2015 à 16:41
-- Version du serveur: 5.5.46-0ubuntu0.14.04.2
-- Version de PHP: 5.6.16-2+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données: `leave_management`
--
CREATE DATABASE IF NOT EXISTS `leave_management` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `leave_management`;

-- --------------------------------------------------------

--
-- Structure de la table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(45) CHARACTER SET latin1 NOT NULL,
  `name` varchar(45) CHARACTER SET latin1 NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `employee`
--

INSERT INTO `employee` (`id`, `login`, `name`, `status`) VALUES
(1, 'walid', 'Walid MNasri', 0),
(2, 'jean', 'Jean Pierre', 1);

-- --------------------------------------------------------

--
-- Structure de la table `leave`
--

CREATE TABLE IF NOT EXISTS `leave` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `status` tinyint(4) NOT NULL,
  `comment` text CHARACTER SET latin1,
  PRIMARY KEY (`id`),
  KEY `employee_id` (`employee_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `leave`
--

INSERT INTO `leave` (`id`, `employee_id`, `start_date`, `end_date`, `status`, `comment`) VALUES
(1, 1, '2015-12-09 00:00:00', '2015-12-17 00:00:00', 3, 'hello men '),
(2, 1, '2015-12-31 00:00:00', '2015-12-31 00:00:00', 2, ''),
(3, 1, '2015-12-31 00:00:00', '2015-12-31 00:00:00', 1, ''),
(4, 1, '2015-12-31 00:00:00', '2015-12-31 00:00:00', 1, '');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `leave`
--
ALTER TABLE `leave`
  ADD CONSTRAINT `leave_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

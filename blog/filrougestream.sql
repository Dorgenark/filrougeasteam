-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  lun. 12 mars 2018 à 10:01
-- Version du serveur :  10.1.30-MariaDB
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `filrougestream`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `auteur` varchar(100) NOT NULL,
  `article` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `auteur`, `article`) VALUES
(1, 'Article 1', 'Andrea', 'Lorem ipsum dolor sit amet consectetur adipiscing elit praesent tempus purus porttitor, porta nibh donec nascetur parturient sapien hac augue sociis habitasse, tempor dictum risus arcu consequat nostra himenaeos per vivamus venenatis. Sociis rutrum inceptos habitasse sed pretium curae conubia sagittis, platea litora nisl mollis dictumst ante a phasellus, quam porta tristique tortor auctor neque sodales. Etiam ante phasellus vulputate proin primis litora, massa nisi risus cubilia est sodales congue, sociosqu bibendum rutrum ultrices viverra.'),
(2, 'Article 2', 'Nael', 'Lorem ipsum dolor sit amet consectetur adipiscing elit praesent tempus purus porttitor, porta nibh donec nascetur parturient sapien hac augue sociis habitasse, tempor dictum risus arcu consequat nostra himenaeos per vivamus venenatis. Sociis rutrum inceptos habitasse sed pretium curae conubia sagittis, platea litora nisl mollis dictumst ante a phasellus, quam porta tristique tortor auctor neque sodales. Etiam ante phasellus vulputate proin primis litora, massa nisi risus cubilia est sodales congue, sociosqu bibendum rutrum ultrices viverra.'),
(3, 'Article 3', 'Simon', 'Lorem ipsum dolor sit amet consectetur adipiscing elit praesent tempus purus porttitor, porta nibh donec nascetur parturient sapien hac augue sociis habitasse, tempor dictum risus arcu consequat nostra himenaeos per vivamus venenatis. Sociis rutrum inceptos habitasse sed pretium curae conubia sagittis, platea litora nisl mollis dictumst ante a phasellus, quam porta tristique tortor auctor neque sodales. Etiam ante phasellus vulputate proin primis litora, massa nisi risus cubilia est sodales congue, sociosqu bibendum rutrum ultrices viverra.'),
(4, 'Article 4', 'Nael', 'Lorem ipsum dolor sit amet consectetur adipiscing elit praesent tempus purus porttitor, porta nibh donec nascetur parturient sapien hac augue sociis habitasse, tempor dictum risus arcu consequat nostra himenaeos per vivamus venenatis. Sociis rutrum inceptos habitasse sed pretium curae conubia sagittis, platea litora nisl mollis dictumst ante a phasellus, quam porta tristique tortor auctor neque sodales. Etiam ante phasellus vulputate proin primis litora, massa nisi risus cubilia est sodales congue, sociosqu bibendum rutrum ultrices viverra.'),
(5, 'Article 5', 'Andrea', 'Lorem ipsum dolor sit amet consectetur adipiscing elit praesent tempus purus porttitor, porta nibh donec nascetur parturient sapien hac augue sociis habitasse, tempor dictum risus arcu consequat nostra himenaeos per vivamus venenatis. Sociis rutrum inceptos habitasse sed pretium curae conubia sagittis, platea litora nisl mollis dictumst ante a phasellus, quam porta tristique tortor auctor neque sodales. Etiam ante phasellus vulputate proin primis litora, massa nisi risus cubilia est sodales congue, sociosqu bibendum rutrum ultrices viverra.'),
(6, 'Article 6', 'Simon', 'Lorem ipsum dolor sit amet consectetur adipiscing elit praesent tempus purus porttitor, porta nibh donec nascetur parturient sapien hac augue sociis habitasse, tempor dictum risus arcu consequat nostra himenaeos per vivamus venenatis. Sociis rutrum inceptos habitasse sed pretium curae conubia sagittis, platea litora nisl mollis dictumst ante a phasellus, quam porta tristique tortor auctor neque sodales. Etiam ante phasellus vulputate proin primis litora, massa nisi risus cubilia est sodales congue, sociosqu bibendum rutrum ultrices viverra.'),
(7, 'Article 7', 'Inconnu', 'Lorem ipsum dolor sit amet consectetur adipiscing elit praesent tempus purus porttitor, porta nibh donec nascetur parturient sapien hac augue sociis habitasse, tempor dictum risus arcu consequat nostra himenaeos per vivamus venenatis. Sociis rutrum inceptos habitasse sed pretium curae conubia sagittis, platea litora nisl mollis dictumst ante a phasellus, quam porta tristique tortor auctor neque sodales. Etiam ante phasellus vulputate proin primis litora, massa nisi risus cubilia est sodales congue, sociosqu bibendum rutrum ultrices viverra.');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categorie` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `login`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

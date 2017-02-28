-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 28 Février 2017 à 09:45
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog_thomas`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id`, `author`, `title`, `text`, `date`) VALUES
(2, 'thomas', 'message', 'mohamed est le meilleur coach #fayot', '2017-02-24 11:30:22'),
(6, 'thomas', 'bonjour', 'je suis gentilje suis gentilje suis gentilje suis gentilje suis gentilje suis gentilje suis gentilje suis gentilje suis gentilje suis gentilje suis gentilje suis gentilje suis gentilje suis gentilje suis gentilje suis gentilje suis gentilje suis gentilje suis gentilje suis gentilje suis gentilje suis gentilje suis gentilje suis gentilje suis gentilje suis gentilje suis gentilje suis gentilje suis gentilje suis gentilje suis gentilje suis gentilje suis gentilje suis gentilje suis gentilje suis gentilje suis gentilje suis gentilje suis gentilje suis gentilje suis gentilje suis gentilje suis gentilje suis gentilje suis gentilje suis gentilje suis gentilje suis gentilje suis gentilje suis gentilje suis gentilje suis gentilje suis gentilje suis gentilje suis gentilje suis gentil', '2017-02-25 17:04:09'),
(7, 'thomas', 'Bonsoir', 'je suis heureux .', '2017-02-27 10:00:14');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL,
  `id_articles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

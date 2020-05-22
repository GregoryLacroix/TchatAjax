-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 21 nov. 2018 à 20:51
-- Version du serveur :  10.1.25-MariaDB
-- Version de PHP :  7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tchat2`
--

-- --------------------------------------------------------

--
-- Structure de la table `connected`
--

CREATE TABLE `connected` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(60) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `connected`
--

INSERT INTO `connected` (`id`, `pseudo`, `ip`, `date`) VALUES
(18, 'admin', '::1', 1532264681),
(17, 'lnkllknl', '::1', 1529094878),
(16, 'toto', '127.0.0.1', 1529014572),
(15, 'zefaezfaef', '::1', 1529014576);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(60) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `pseudo`, `message`, `date`) VALUES
(158, 'admin', 'ijijijijijijiji', 1532264651),
(157, 'admin', 'kokokokokok', 1532264204),
(156, 'admin', 'kbkjkjbj', 1532264195),
(155, 'admin', 'hvbjhvjhv', 1532264138),
(154, 'admin', 'jvjygjyg\n', 1532264130),
(153, 'lnkllknl', 'gzrzrg', 1529085393),
(152, 'lnkllknl', 'gzrgzrgz', 1529085387),
(151, 'lnkllknl', 'sdvsdgvsdgv\n', 1529085247),
(150, 'zefaezfaef', 'yep!!', 1529014123),
(149, 'zefaezfaef', 'bhbhb', 1529014101),
(148, 'zefaezfaef', 'Tu vas bien ?', 1529013711),
(147, 'toto', 'salut!!\n', 1529013700),
(146, 'zefaezfaef', 'zfazef', 1529011722);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `connected`
--
ALTER TABLE `connected`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `connected`
--
ALTER TABLE `connected`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

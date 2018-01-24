-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 12 oct. 2017 à 21:19
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `news`
--

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE `news` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `auteur` varchar(30) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `contenu` text NOT NULL,
  `dateAjout` datetime NOT NULL,
  `dateModif` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`id`, `auteur`, `titre`, `contenu`, `dateAjout`, `dateModif`) VALUES
(5, 'azertyu', 'qsdfgh', 'ertyuiop', '2017-10-11 14:26:44', '2017-10-11 14:29:55'),
(6, 'QSDFGHJKL', 'ZERTYUIO', 'XQSDCFVGBHNJ?K', '2017-10-11 14:27:00', '2017-10-11 14:27:00'),
(7, '1234567', 'POIUYTREZ', 'XQSDCFVGBHNJ?K', '2017-10-11 14:27:13', '2017-10-11 14:27:13'),
(8, '1234567', 'POIUYTREZ', 'XQSDCFVGBHNJ?K', '2017-10-11 14:27:17', '2017-10-11 14:27:17'),
(9, '1234567', 'POIUYTREZ', 'XQSDCFVGBHNJ?K', '2017-10-11 14:27:19', '2017-10-11 14:27:19'),
(10, '1234567', 'POIUYTREZ', 'XQSDCFVGBHNJ?K', '2017-10-11 14:27:21', '2017-10-11 14:27:21'),
(11, '1234567', 'POIUYTREZ', 'XQSDCFVGBHNJ?K', '2017-10-11 14:27:23', '2017-10-11 14:27:23'),
(12, '1234567', 'POIUYTREZ', 'XQSDCFVGBHNJ?KXQSDCFVGBHNJ?KXQSDCFVGBHNJ?KXQSDCFVGBHNJ?KXQSDCFVGBHNJ?KXQSDCFVGBHNJ?KXQSDCFVGBHNJ?KXQSDCFVGBHNJ?KXQSDCFVGBHNJ?KXQSDCFVGBHNJ?KXQSDCFVGBHNJ?KXQSDCFVGBHNJ?KXQSDCFVGBHNJ?KXQSDCFVGBHNJ?KXQSDCFVGBHNJ?KXQSDCFVGBHNJ?KXQSDCFVGBHNJ?KXQSDCFVGBHNJ?KXQSDCFVGBHNJ?KXQSDCFVGBHNJ?KXQSDCFVGBHNJ?KXQSDCFVGBHNJ?KXQSDCFVGBHNJ?KXQSDCFVGBHNJ?KXQSDCFVGBHNJ?KXQSDCFVGBHNJ?KXQSDCFVGBHNJ?KXQSDCFVGBHNJ?KXQSDCFVGBHNJ?KXQSDCFVGBHNJ?KXQSDCFVGBHNJ?K', '2017-10-11 14:27:24', '2017-10-11 14:33:35'),
(13, 'math', 'exo 7 page 9', 'azertyuj nbvcfgtyhnhbvftgyhb', '2017-10-12 00:00:00', NULL),
(14, 'math', 'exo 7 page 9', 'azertyuj nbvcfgtyhnhbvftgyhb', '2017-10-12 00:00:00', NULL),
(15, 'math', 'exo 7 page 9', 'azertyuj nbvcfgtyhnhbvftgyhb', '2017-10-12 00:00:00', NULL),
(16, 'math', 'exo 7 page 9', 'azertyuj nbvcfgtyhnhbvftgyhb', '2017-10-12 00:00:00', NULL),
(17, 'math', 'exo 7 page 9', 'azertyuj nbvcfgtyhnhbvftgyhb', '2017-10-12 00:00:00', NULL),
(18, 'azerty                        ', 'qsdfghj', 'zertyu', '2017-10-12 18:00:28', '2017-10-12 18:00:28'),
(19, 'azerty                        ', 'qsdfghj', 'zertyu', '2017-10-12 18:08:36', '2017-10-12 18:08:36'),
(20, 'azerty                        ', 'qsdfghj', 'zertyu', '2017-10-12 18:15:59', '2017-10-12 18:15:59'),
(21, 'azerty                        ', 'qsdfghj', 'zertyu', '2017-10-12 18:16:27', '2017-10-12 18:16:27'),
(22, 'azerty                        ', 'qsdfghj', 'zertyu', '2017-10-12 18:17:08', '2017-10-12 18:17:08'),
(23, 'azerty                        ', 'qsdfghj', 'zertyu', '2017-10-12 18:22:51', '2017-10-12 18:22:51'),
(24, 'azerty                        ', 'qsdfghj', 'zertyu', '2017-10-12 18:24:53', '2017-10-12 18:24:53'),
(25, 'azerty                        ', 'qsdfghj', 'zertyu', '2017-10-12 18:25:01', '2017-10-12 18:25:01'),
(26, 'dessi', 'faire exo 3 page 6', 'faut faire sa ceci et cela', '2017-10-12 18:26:17', '2017-10-12 18:26:17'),
(27, 'Math', 'Exo 3 page 10', 'azertyui', '2017-10-12 18:38:36', '2017-10-12 18:38:36');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

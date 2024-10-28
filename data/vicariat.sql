-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 28 oct. 2024 à 12:48
-- Version du serveur : 10.6.17-MariaDB-cll-lve
-- Version de PHP : 8.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `c2331941c_nyaka`
--

-- --------------------------------------------------------

--
-- Structure de la table `vicariat`
--

CREATE TABLE `vicariat` (
  `id` int(11) NOT NULL,
  `code` int(11) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `vicariat`
--

INSERT INTO `vicariat` (`id`, `code`, `nom`, `slug`) VALUES
(1, 1, 'Mgr BERNARD CARDINAL AGRE', 'mgr-bernard-cardinal-agre'),
(2, 2, 'Mgr BERNARD CARDINAL YAGO', 'mgr-bernard-cardinal-yago'),
(3, 3, 'Mgr JEAN BAPTISTE BOIVIN', 'mgr-jean-baptiste-boivin'),
(4, 4, 'Mgr JEAN PIERRE CARDINAL KUTWA', 'mgr-jean-pierre-cardinal-kutwa'),
(5, 5, 'Mgr PAUL DACOURY TABLEY', 'mgr-paul-dacoury-tabley'),
(6, 6, 'Mgr PIERRE MARIE COTY', 'mgr-pierre-marie-coty');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `vicariat`
--
ALTER TABLE `vicariat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `vicariat`
--
ALTER TABLE `vicariat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

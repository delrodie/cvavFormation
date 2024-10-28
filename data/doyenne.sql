-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 28 oct. 2024 à 12:52
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
-- Structure de la table `doyenne`
--

CREATE TABLE `doyenne` (
  `id` int(11) NOT NULL,
  `vicariat_id` int(11) DEFAULT NULL,
  `code` int(11) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `doyenne`
--

INSERT INTO `doyenne` (`id`, `vicariat_id`, `code`, `nom`, `slug`) VALUES
(1, 1, 110, 'GABRIEL CHAUVET', 'gabriel-chauvet'),
(2, 1, 111, 'GILBERT NGUIO', 'gilbert-n-guio'),
(3, 1, 112, 'PIERRE MERAUD', 'pierre-meraud'),
(4, 2, 213, 'BERNARD GOUEL', 'bernard-gouel'),
(5, 2, 214, 'RAYMOND HALTERE', 'raymond-haltere'),
(6, 2, 215, 'NICOLAS OBO', 'nicolas-obo'),
(7, 2, 216, 'MACAIRE DANHO', 'macaire-danho'),
(8, 3, 317, 'JOSEPH AKICHI', 'joseph-akichi'),
(9, 3, 318, 'REGIS PEILLON', 'regis-peillon'),
(10, 3, 319, 'RENÉ NGUIO', 'renE-nguio'),
(11, 3, 320, 'JOSEPH BROU', 'joseph-brou'),
(12, 4, 421, 'LAURENT YAPI', 'laurent-yapi'),
(13, 4, 422, 'BLAISE ANOH', 'blaise-anoh'),
(14, 4, 423, 'JACQUES JOSEPH NOMEL', 'jacques-joseph-nomel'),
(15, 5, 524, 'RENÉ KOUASSI', 'renE-kouassi'),
(16, 5, 525, 'EUGENE NEVRY THIÉ', 'eugene-nevry-thiE'),
(17, 5, 526, 'ALBERT ABLÉ', 'albert-ablE'),
(18, 5, 527, 'MICHEL PANGO', 'michel-pango'),
(19, 5, 528, 'JEAN BAPTISTE TILO', 'jean-baptiste-tilo'),
(20, 6, 629, 'JOSEPH GARNIER', 'joseph-garnier'),
(21, 6, 630, 'PASCAL ACCAFOU GRAH', 'pascal-accafou-grah'),
(22, 5, 531, 'EUGENE ANOUMA', 'eugene-anouma');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `doyenne`
--
ALTER TABLE `doyenne`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_67E2BA5CA44EF126` (`vicariat_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `doyenne`
--
ALTER TABLE `doyenne`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `doyenne`
--
ALTER TABLE `doyenne`
  ADD CONSTRAINT `FK_67E2BA5CA44EF126` FOREIGN KEY (`vicariat_id`) REFERENCES `vicariat` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

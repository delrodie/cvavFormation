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
-- Structure de la table `section`
--

CREATE TABLE `section` (
  `id` int(11) NOT NULL,
  `doyenne_id` int(11) DEFAULT NULL,
  `code` int(11) DEFAULT NULL,
  `paroisse` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `section`
--

INSERT INTO `section` (`id`, `doyenne_id`, `code`, `paroisse`, `slug`) VALUES
(1, 1, 110631, 'ST JEAN BAPTISTE AHOUÉ', 'st-jean-baptiste-ahouE'),
(2, 1, 110631, 'STE THERESE DE L ENFANT JESUS AHOUTOUÉ', 'ste-therese-de-l-enfant-jesus-ahoutouE'),
(3, 1, 110631, 'NOTRE DAME DE LOURDES BROFODOUMÉ', 'notre-dame-de-lourdes-brofodoumE'),
(4, 1, 110631, 'ST FRANÇOIS D’ASSISE ET STE CLAIRE DE LAMÉ', 'st-franCois-d-assise-et-ste-claire-de-lamE'),
(5, 1, 110631, 'ST JOSEPH DZEUDJI', 'st-joseph-dzeudji'),
(6, 1, 110631, 'ST JEAN BOSCO ATTIEKOI', 'st-jean-bosco-attiekoi'),
(7, 1, 110631, 'ST JEAN NSSANKOI', 'st-jean-n-ssankoi'),
(8, 2, 111631, 'ST PIERRE ET ST PAUL DANGUIRA', 'st-pierre-et-st-paul-danguira'),
(9, 2, 111631, 'SACRÉ CŒUR KOSSANDJI', 'sacrE-cOEur-kossandji'),
(10, 2, 111631, 'CHAPELLE NOTRE DAME DE YAPOKOI', 'chapelle-notre-dame-de-yapokoi'),
(11, 2, 111631, 'ST JOSEPH MEMNI', 'st-joseph-memni'),
(12, 2, 111631, 'ST MICHEL ARCHANGE KODIOUSSOU', 'st-michel-archange-kodioussou'),
(13, 3, 112631, 'STE ANNE GRAND ALEPE', 'ste-anne-grand-alepe'),
(14, 3, 112631, 'IMMACULEE CONCEPTION MONTEZO', 'immaculee-conception-montezo'),
(15, 3, 112631, 'IMMACULEE CONCEPTION ANDOU M’BATTO', 'immaculee-conception-andou-m-batto'),
(16, 3, 112631, 'ST ANDRE NBOHOIN', 'st-andre-n-bohoin'),
(17, 3, 112631, 'NOTRE DAME DE L’ASSOMPTION MONGA', 'notre-dame-de-l-assomption-monga'),
(18, 3, 112631, 'ST BERNARD DOMOLON', 'st-bernard-domolon'),
(19, 3, 112631, 'CHRIST ROI ALEPE', 'christ-roi-alepe'),
(20, 3, 112631, 'ST PIERRE ET ST PAUL INGRAKON', 'st-pierre-et-st-paul-ingrakon'),
(21, 3, 112631, 'ST JOSEPH AKOURÉ', 'st-joseph-akourE'),
(22, 3, 112631, 'ST MATTHIEU DE YAKASSE COMOE', 'st-matthieu-de-yakasse-comoe'),
(23, 3, 112631, 'ST PIERRE ET ST PAUL DABRÉ', 'st-pierre-et-st-paul-dabrE'),
(24, 4, 213631, 'NOTRE DAME DE L ESPERANCE PAILLER', 'notre-dame-de-l-esperance-pailler'),
(25, 4, 213631, 'ST KIZITO WILLIAMSVILLE', 'st-kizito-williamsville'),
(26, 4, 213631, 'ST CHARLES LWANGA', 'st-charles-lwanga'),
(27, 4, 213631, 'STE GENEVIEVE AGBAN', 'ste-genevieve-agban'),
(28, 5, 214631, 'ST JOSEPH ARTISAN ATECOUBÉ', 'st-joseph-artisan-atecoubE'),
(29, 5, 214631, 'ST LUC BANABAKINTU  LGTS', 'st-luc-banabakintu-lgts'),
(30, 5, 214631, 'ST MICHEL ADJAMÉ', 'st-michel-adjamE'),
(31, 5, 214631, 'ST THOMAS AGBAN VILLAGE', 'st-thomas-agban-village'),
(32, 6, 215631, 'NOTRE DAME DU PERPETUEL SECOURS TREICHVILLE', 'notre-dame-du-perpetuel-secours-treichville'),
(33, 6, 215631, 'STE THERESE MARCORY', 'ste-therese-marcory'),
(34, 6, 215631, 'STE JEANNE D ARC DE TREICHVILLE', 'ste-jeanne-d-arc-de-treichville'),
(35, 6, 215631, 'ST ANTOINE PADOUE DU PORT', 'st-antoine-padoue-du-port'),
(36, 7, 216631, 'STE BERNADETTE MARCORY', 'ste-bernadette-marcory'),
(37, 7, 216631, 'ST PIERRE ANOUMABO', 'st-pierre-anoumabo'),
(38, 7, 216631, 'NOTRE DAME D AFRIQUE BIETRY', 'notre-dame-d-afrique-bietry'),
(39, 8, 317631, 'ST ESPRIT CONSOLATEUR', 'st-esprit-consolateur'),
(40, 8, 317631, 'CHAPELLE EMMANUEL N’DOTRÉ', 'chapelle-emmanuel-n-dotrE'),
(41, 8, 317631, 'SACRÉS STIGMATES', 'sacrEs-stigmates'),
(42, 8, 317631, 'ST MATTHIEU ANONKOUA KOUTÉ', 'st-matthieu-anonkoua-koutE'),
(43, 8, 317631, 'STE MARIE AGOUETO', 'ste-marie-agoueto'),
(44, 9, 318631, 'NOTRE DAME DE CANA', 'notre-dame-de-cana'),
(45, 9, 318631, 'ST MARC ABOBO AKEIKOI', 'st-marc-abobo-akeikoi'),
(46, 9, 318631, 'ST FRANCOIS XAVIER ABOBO', 'st-francois-xavier-abobo'),
(47, 9, 318631, 'ST JEAN BAPTISTE ABOBO AVOCATIER', 'st-jean-baptiste-abobo-avocatier'),
(48, 9, 318631, 'ST MICHEL AKEIKOI VILLAGE', 'st-michel-akeikoi-village'),
(49, 10, 319631, 'IMMACULÉ CONCEPTION ABOBO CLOUETCHA', 'immaculE-conception-abobo-clouetcha'),
(50, 10, 319631, 'STE ANNE ABOBO BAOULÉ', 'ste-anne-abobo-baoulE'),
(51, 10, 319631, 'ST JEAN BAPTISTE BIABOU', 'st-jean-baptiste-biabou'),
(52, 10, 319631, 'STE JEANNE D ARC DJIBI', 'ste-jeanne-d-arc-djibi'),
(53, 11, 320631, 'ST JOSEPH ÉPOUX ABOBO GARE', 'st-joseph-Epoux-abobo-gare'),
(54, 11, 320631, 'SACRÉ CŒUR ABOBO ANADOR', 'sacrE-cOEur-abobo-anador'),
(55, 11, 320631, 'ST AUGUSTIN ABOBOTÉ', 'st-augustin-abobotE'),
(56, 11, 320631, 'ST PHILIPPE ABOBO SAGBÉ', 'st-philippe-abobo-sagbE'),
(57, 12, 421631, 'ST JEAN DE COCODY', 'st-jean-de-cocody'),
(58, 12, 421631, 'ST PIERRE BLOCKAUSS', 'st-pierre-blockauss'),
(59, 12, 421631, 'ST ALBERT LE GRAND DE COCODY', 'st-albert-le-grand-de-cocody'),
(60, 12, 421631, 'CATHÉDRALE ST PAUL PLATEAU', 'cathEdrale-st-paul-plateau'),
(61, 13, 422631, 'ST IGNACE DE LOYOLA', 'st-ignace-de-loyola'),
(62, 13, 422631, 'NOTRE DAME DE LA NATIVITÉ', 'notre-dame-de-la-nativitE'),
(63, 13, 422631, 'ST AMBROISE JUBILÉ', 'st-ambroise-jubilE'),
(64, 13, 422631, 'ST JEAN PAUL 2', 'st-jean-paul-2'),
(65, 13, 422631, 'ST JOACHIM ANGRE EXTENSION', 'st-joachim-angre-extension'),
(66, 13, 422631, 'ST PADRÉ PIO', 'st-padrE-pio'),
(67, 13, 422631, 'STE DOROTHÉ ANGRE', 'ste-dorothE-angre'),
(68, 14, 423631, 'ST JACQUES 2 PLATEAUX', 'st-jacques-2-plateaux'),
(69, 14, 423631, 'CŒUR IMMACULÉ DE MARIE CITE FOREST', 'cOEur-immaculE-de-marie-cite-forest'),
(70, 14, 423631, 'ST AMBROISE MA VIGNE', 'st-ambroise-ma-vigne'),
(71, 14, 423631, 'STE CECILE VALLON', 'ste-cecile-vallon'),
(72, 14, 423631, 'STE JOSEPHINE BAKHITA 2 PLATEAUX', 'ste-josephine-bakhita-2-plateaux'),
(73, 14, 423631, 'STE MONIQUE PLATEAU DOKUI', 'ste-monique-plateau-dokui'),
(74, 15, 524631, 'ST PAUL DE LA MISSION GBAGBA', 'st-paul-de-la-mission-gbagba'),
(75, 15, 524631, 'ST AUGUSTIN BINGERVILLE', 'st-augustin-bingerville'),
(76, 15, 524631, 'ST MARCEL AKOUAI SANTAI', 'st-marcel-akouai-santai'),
(77, 22, 531631, 'NOTRE DAME DE LA DELIVRANCE BREGBO', 'notre-dame-de-la-delivrance-bregbo'),
(78, 22, 531631, 'STE ANNE ADJAMÉ BINGERVILLE', 'ste-anne-adjame-bingerville'),
(79, 22, 531631, 'ST JOSEPH PALMAFRIQUE', 'st-joseph-palmafrique'),
(80, 22, 531631, 'ST MATTHIEU ANAN', 'st-matthieu-anan'),
(81, 22, 531631, 'NOTRE DAME DE TOUTES GRACES ELOKA', 'notre-dame-de-toutes-graces-eloka'),
(82, 22, 531631, 'ST PIERRE M BATTO BOUAKE', 'st-pierre-m-batto-bouake'),
(83, 22, 531631, 'ST PIERRE KOFFIKRO', 'st-pierre-koffikro'),
(84, 16, 525631, 'NOTRE DAME DE LA PAIX SYNATRESOR', 'notre-dame-de-la-paix-synatresor'),
(85, 16, 525631, 'CHRIST ROI CITÉ DE L’UNIVERS DES CITÉS', 'christ-roi-citE-de-l-univers-des-citEs'),
(86, 16, 525631, 'STE BERNADETTE PROMOGIM', 'ste-bernadette-promogim'),
(87, 17, 526631, 'ST JOSEPH AKOUEDO', 'st-joseph-akouedo'),
(88, 17, 526631, 'NOTRE DAME DE LOURDES ABATTA', 'notre-dame-de-lourdes-abatta'),
(89, 17, 526631, 'ST ANDRÉ AKOUEDO CAMP', 'st-andrE-akouedo-camp'),
(90, 17, 526631, 'ST PAUL DES LAURIERS', 'st-paul-des-lauriers'),
(91, 17, 526631, 'STE MARIE DE CANA AKOUEDO EXTENSION', 'ste-marie-de-cana-akouedo-extension'),
(92, 18, 527631, 'NOTRE DAME INCARNATION', 'notre-dame-incarnation'),
(93, 18, 527631, 'NOTRE DAME ESPERANCE GENIE 2000', 'notre-dame-esperance-genie-2000'),
(94, 18, 527631, 'ST JOSEPH ARTISAN RIVIERA BONOUMIN', 'st-joseph-artisan-riviera-bonoumin'),
(95, 18, 527631, 'ST VIATEUR RIVIERA PALMERAIE', 'st-viateur-riviera-palmeraie'),
(96, 18, 527631, 'ST BERNARD ATTOBAN', 'st-bernard-attoban'),
(97, 19, 528631, 'NOTRE DAME DE LA TENDRESSE RIVIERA GOLF', 'notre-dame-de-la-tendresse-riviera-golf'),
(98, 19, 528631, 'BON PASTEUR RIVIERA 3', 'bon-pasteur-riviera-3'),
(99, 19, 528631, 'CHRIST ROI M’BADON', 'christ-roi-m-badon'),
(100, 19, 528631, 'SACRÉ CŒUR CIAD', 'sacrE-cOEur-ciad'),
(101, 19, 528631, 'ST FRANCOIS XAVIER ANONO', 'st-francois-xavier-anono'),
(102, 19, 528631, 'ST MICHEL M’POUTO', 'st-michel-m-pouto'),
(103, 19, 528631, 'STE FAMILLE RIVIERA 2', 'ste-famille-riviera-2'),
(104, 20, 629631, 'ST BERNARD M’BONOUA', 'st-bernard-m-bonoua'),
(105, 20, 629631, 'ST MICHEL ATTINGUIE', 'st-michel-attinguie'),
(106, 20, 629631, 'ST ANTOINE PADOUE AKOUPE DZEUDJI', 'st-antoine-padoue-akoupe-dzeudji'),
(107, 20, 629631, 'STE THERESE M’BRAGO 1', 'ste-therese-m-brago-1'),
(108, 20, 629631, 'ST  KIZITO M’BRAGO 2', 'st-kizito-m-brago-2'),
(109, 20, 629631, 'CHRIST ROI M’PODY', 'christ-roi-m-pody'),
(110, 20, 629631, 'ST RAPHAEL ADAROME', 'st-raphael-adarome'),
(111, 20, 629631, 'STE FAMILLE SCB', 'ste-famille-scb'),
(112, 21, 630631, 'ST PIERRE CLAVER ANYAMA ADJAME', 'st-pierre-claver-anyama-adjame'),
(113, 21, 630631, 'NOTRE DAME D’ANYAMA', 'notre-dame-d-anyama'),
(114, 21, 630631, 'ST LOUIS DON ORIONE ANYAMA', 'st-louis-don-orione-anyama'),
(115, 21, 630631, 'ST LOUIS ROI EBIMPE', 'st-louis-roi-ebimpe'),
(116, 21, 630631, 'ST JOSEPH ARTISAN ANYAMA-SUD', 'st-joseph-artisan-anyama-sud'),
(117, 21, 630631, 'ST HILAIRE AZAGUIE-BLIDA', 'st-hilaire-azaguie-blida'),
(118, 21, 630631, 'ST MICHEL ARCHANGE RESIDENTIEL', 'st-michel-archange-residentiel'),
(119, 21, 630631, 'ST BRUNO AHOUABO', 'st-bruno-ahouabo'),
(120, 21, 630631, 'ST MICHEL THOMASSET', 'st-michel-thomasset'),
(121, 21, 630631, 'ST BLAISE YAPOKOI', 'st-blaise-yapokoi'),
(122, 21, 630631, 'STE MARIE BETHANIE D ANYAMA RESIDENTIEL', 'ste-marie-bethanie-d-anyama-residentiel');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_2D737AEF53C9D7E5` (`doyenne_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `FK_2D737AEF53C9D7E5` FOREIGN KEY (`doyenne_id`) REFERENCES `doyenne` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 07 avr. 2021 à 14:25
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `site_voiture`
--

-- --------------------------------------------------------

--
-- Structure de la table `voitures`
--

DROP TABLE IF EXISTS `voitures`;
CREATE TABLE IF NOT EXISTS `voitures` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `modele` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marque` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `puissance` int(11) NOT NULL,
  `annee` year(4) NOT NULL,
  `finition` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_principale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` double(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `voitures`
--

INSERT INTO `voitures` (`id`, `created_at`, `updated_at`, `modele`, `marque`, `puissance`, `annee`, `finition`, `description`, `photo_principale`, `prix`) VALUES
(2, '2021-01-22 13:14:07', '2021-01-22 15:01:02', 'C4', 'Citroen', 67, 2016, 'sport', 'ceci est un test pour une citroen C4', '1611331262.png', 4090.00),
(3, '2021-01-22 16:20:26', '2021-01-22 16:20:26', '206', 'Peugeot', 75, 2001, 'XR Présence 1.4i', 'Lorem ipsum dolor sit amet. Et libero enim ut sequi mollitia ut dolores asperiores rem corrupti repellendus sed blanditiis fugit quo nulla nulla. Et voluptatem amet est impedit voluptatem sit explicabo atque. Eum animi nihil et vero tenetur et earum quaerat id reprehenderit asperiores qui corporis beatae.', '1611336026.jpg', 2690.00),
(4, '2021-01-22 16:32:14', '2021-01-22 16:32:14', 'Clio 4', 'Renault', 90, 2018, 'Zen', 'La finition Zen inclut la radio MP3 Bluetooth avec écran tactile, et gagne en style avec un volant cuir et un choix de jantes disponibles en option. Des ajouts intéressants qui peinent toutefois à justifier l’écart de prix avec la version Trend.', '1611336734.jpg', 17200.00),
(5, '2021-01-22 16:43:25', '2021-04-05 10:52:03', 'Fiesta', 'Ford', 80, 2017, 'Trend', 'La finition Trend dispose en plus d’un régulateur de vitesse, d’antibrouillards avant avec fonction cornering, du système Ford SYNC 3 à écran tactile 6,5 pouces incluant Apple CarPlay et Android Auto. Une roue de secours est également incluse sur ce modèle quand les autres versions se contentent d’un kit de réparation pneumatique. Elle peut être choisie avec le moteur EcoBoost 100ch en boîte manuelle à 6 rapports au en boîte automatique.', '1611337405.png', 15000.00);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

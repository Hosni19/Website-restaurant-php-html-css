-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 09 mars 2023 à 08:25
-- Version du serveur : 8.0.27
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `menu restaurant`
--

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `entrée` text NOT NULL,
  `plat` text NOT NULL,
  `dessert` text NOT NULL,
  `boisson` text NOT NULL,
  `tarif` float NOT NULL,
  `actif` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`id`, `nom`, `entrée`, `plat`, `dessert`, `boisson`, `tarif`, `actif`) VALUES
(1, 'Légumes', 'Carpaccio de betteraves marinées au soja et gingembre', 'Tourte feuilletée – céleri et truffe, jus concentré de légumes', 'Topi noisettes – topinambour poché au sirop, condiment passion , crème glacée noisette', 'Vin rouge Ventoux – Les grains marsellan 2015\r\n\r\n\r\n\r\n', 54, 1),
(2, 'Au rythme des saisons', 'Foie-gras mi-cuit au sichuan\r\n', 'Turbot rôti au ras el-hanout, chou-fleur et choux de bruxelles\r\n', 'Agrumes – crème diplomate au citron, pesto à l’estragon\r\n', 'Bourgogne Pinot noir 2017\r\n\r\n\r\n\r\n\r\n', 71, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

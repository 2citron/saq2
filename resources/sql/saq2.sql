-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  ven. 14 mai 2021 à 19:35
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `saq2`
--

-- --------------------------------------------------------

--
-- Structure de la table `alcohol`
--

CREATE TABLE `alcohol` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `type_id` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `producer` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `degree` int(11) NOT NULL,
  `format` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `alcohol`
--

INSERT INTO `alcohol` (`id`, `name`, `type_id`, `cost`, `producer`, `degree`, `format`) VALUES
(1, 'Kraken', 1, 35, 'Kraken', 47, 750),
(2, 'Bombay', 4, 37, 'Bombay', 40, 750),
(3, 'Black and Gold', 2, 26, 'Sake-san', 16, 750),
(4, 'Orange', 3, 21, 'Vino and co', 17, 750),
(5, 'Jose Cuervo', 5, 32, 'Mexican Stand-off', 40, 750),
(6, 'Smirnoff', 6, 25, 'Smirnoff', 40, 750),
(7, 'Amarula', 7, 23, 'Amarula co', 17, 750),
(8, 'Jack Daniel', 8, 29, 'Jack Daniaux', 40, 750),
(9, 'Cognac generic', 9, 60, 'This is the Cognac', 40, 750);

-- --------------------------------------------------------

--
-- Structure de la table `alcohol_type`
--

CREATE TABLE `alcohol_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `alcohol_type`
--

INSERT INTO `alcohol_type` (`id`, `name`) VALUES
(1, 'Rhum'),
(2, '\nSake'),
(3, '\nVin'),
(4, '\nGin'),
(5, '\nTequila'),
(6, '\nVodka'),
(7, '\nCream'),
(8, '\nWhisky'),
(9, '\nCognac'),
(10, 'Licor');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `alcohol`
--
ALTER TABLE `alcohol`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`);

--
-- Index pour la table `alcohol_type`
--
ALTER TABLE `alcohol_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `alcohol`
--
ALTER TABLE `alcohol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `alcohol_type`
--
ALTER TABLE `alcohol_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `alcohol`
--
ALTER TABLE `alcohol`
  ADD CONSTRAINT `alcohol_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `alcohol_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

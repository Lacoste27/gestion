-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 07 mars 2022 à 18:40
-- Version du serveur :  10.4.16-MariaDB
-- Version de PHP : 7.3.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `achat`
--

-- --------------------------------------------------------

--
-- Structure de la table `reception`
--

CREATE TABLE `reception` (
  `id` int(11) NOT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `idLivraison` int(11) DEFAULT NULL,
  `dateReception` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reception`
--

INSERT INTO `reception` (`id`, `reference`, `idLivraison`, `dateReception`) VALUES
(26, 'references', 1, '2022-03-01'),
(25, 'references', 1, '2022-03-01'),
(24, 'references', 1, '2022-03-01'),
(23, 'references', 1, '2022-03-01'),
(22, 'references', 1, '2022-03-01'),
(21, 'references', 1, '2022-03-01'),
(20, 'references', 1, '2022-03-01'),
(19, 'references', 1, '2022-03-01'),
(27, 'references', 1, '2022-03-01'),
(28, 'references', 1, '2022-03-01'),
(29, 'references', 1, '2022-03-01'),
(30, 'references', 1, '2022-03-01'),
(31, 'references', 1, '2022-03-01'),
(32, 'references', 1, '2022-03-01'),
(33, 'references', 1, '2022-03-01'),
(34, 'references', 1, '2022-03-01'),
(35, 'references', 1, '2022-03-01'),
(36, 'references', 1, '2022-03-01'),
(37, 'references', 1, '2022-03-01'),
(38, 'references', 1, '2022-03-01'),
(39, 'references', 1, '2022-03-01'),
(40, 'references', 1, '2022-03-01'),
(41, 'references', 1, '2022-03-01'),
(42, 'references', 1, '2022-03-01'),
(43, 'references', 1, '2022-03-01'),
(44, 'references', 1, '2022-03-01'),
(45, 'references', 1, '2022-03-01'),
(46, 'references', 1, '2022-03-01'),
(47, 'references', 1, '2022-03-01'),
(48, 'references', 1, '2022-03-01');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `reception`
--
ALTER TABLE `reception`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `reception`
--
ALTER TABLE `reception`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

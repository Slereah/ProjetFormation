-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 06 Septembre 2017 à 11:32
-- Version du serveur :  10.1.21-MariaDB
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `weather&wear`
--

-- --------------------------------------------------------

--
-- Structure de la table `clothes`
--

CREATE TABLE `clothes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` enum('shoes','shirts','coats','pants') NOT NULL,
  `picture` varchar(255) NOT NULL,
  `minTemperature` int(3) NOT NULL,
  `maxTemperature` int(3) NOT NULL,
  `rain` tinyint(1) NOT NULL,
  `defaultClothes` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tokens`
--

CREATE TABLE `tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `token` char(32) NOT NULL,
  `timeout` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(60) NOT NULL,
  `lastname` varchar(60) NOT NULL,
  `username` varchar(60) NOT NULL,
  `mail` varchar(60) NOT NULL,
  `password` text NOT NULL,
  `country` varchar(60) NOT NULL,
  `city` varchar(60) NOT NULL,
  `zipcode` varchar(10) NOT NULL,
  `role` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `usersclothes`
--

CREATE TABLE `usersclothes` (
  `id` int(11) UNSIGNED NOT NULL,
  `idClothes` int(11) UNSIGNED NOT NULL,
  `idUsers` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `clothes`
--
ALTER TABLE `clothes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `usersclothes`
--
ALTER TABLE `usersclothes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idClothes` (`idClothes`),
  ADD KEY `idUsers` (`idUsers`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `clothes`
--
ALTER TABLE `clothes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `usersclothes`
--
ALTER TABLE `usersclothes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `tokens`
--
ALTER TABLE `tokens`
  ADD CONSTRAINT `tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `usersclothes`
--
ALTER TABLE `usersclothes`
  ADD CONSTRAINT `usersclothes_ibfk_1` FOREIGN KEY (`idClothes`) REFERENCES `clothes` (`id`),
  ADD CONSTRAINT `usersclothes_ibfk_2` FOREIGN KEY (`idUsers`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Ven 08 Septembre 2017 à 11:12
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
  `category` enum('shoes','shirts','coats','pants','sweater','jacket','trousers','shorts') NOT NULL,
  `picture` varchar(255) NOT NULL,
  `minTemperature` int(3) NOT NULL,
  `maxTemperature` int(3) NOT NULL,
  `rain` tinyint(1) NOT NULL,
  `defaultClothes` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `clothes`
--

INSERT INTO `clothes` (`id`, `name`, `category`, `picture`, `minTemperature`, `maxTemperature`, `rain`, `defaultClothes`) VALUES
(1, 'manteau rouge test', 'coats', 'https://static.galerieslafayette.com/media/441/44103142/G_44103142_360_VPP_1.jpg', 0, 10, 0, 0),
(2, 'chaussures fermées', 'shoes', 'https://images-na.ssl-images-amazon.com/images/I/817DmsOCi1L._UL1500_.jpg', -30, 15, 10, 1),
(3, 'T-shirt', 'shirts', 'https://openclipart.org/image/2400px/svg_to_png/77599/t-shirt.png', 18, 43, 0, 1),
(4, 'Sweat', 'sweater', 'https://openclipart.org/image/2400px/svg_to_png/77683/blue-hoodie.png', 0, 15, 10, 1),
(5, 'blouson', 'jacket', 'https://openclipart.org/image/2400px/svg_to_png/192065/AlanSpeak-Jacket.png', 10, 20, 0, 1),
(6, 'jeans', 'trousers', 'https://openclipart.org/image/2400px/svg_to_png/263802/1476281241.png', -30, 22, 10, 1),
(7, 'pantalon noir', 'trousers', 'https://openclipart.org/image/2400px/svg_to_png/168770/Basic-Black-Pants.png', -30, 22, 10, 1),
(8, 'polo', 'shirts', 'https://openclipart.org/image/2400px/svg_to_png/177398/Blue-Polo-Shirt-Remix-by-Merlin2525.png', 20, 42, 0, 1),
(9, 'chemise blanche', 'shirts', 'https://openclipart.org/image/2400px/svg_to_png/219971/1433315645.png', 15, 25, 0, 1),
(10, 'pantalon bleu', 'trousers', 'https://openclipart.org/image/2400px/svg_to_png/213788/Hose.png', -30, 18, 10, 1),
(11, 'chaussures mi-saison', 'shoes', 'https://openclipart.org/image/2400px/svg_to_png/173952/shoe.png', 10, 22, 10, 1),
(12, 'chaussures saison chaude', 'shoes', 'https://openclipart.org/image/2400px/svg_to_png/191770/havaianas32.png', 22, 42, 0, 1),
(13, 'pullover', 'sweater', 'https://openclipart.org/image/2400px/svg_to_png/213608/Pullover.png', -30, 10, 0, 1),
(14, 'pull col roulé', 'sweater', 'http://diysolarpanelsv.com/images/striped-sweater-clipart-9.jpg', -30, 8, 0, 1),
(15, 'blouson', 'jacket', 'https://www.freeclipartnow.com/d/16959-1/jacket.png', 15, 22, 0, 1),
(16, 'veste', 'jacket', 'http://clipartsign.com/upload/2016/02/18/top-blue-jacket-clip-art-images-for.png', 15, 22, 0, 1),
(17, 'short beige', 'shorts', 'http://www.artvex.com/content/Clip_Art/Clothing/Pants_and_Shorts/0011403.gif', 25, 42, 0, 1),
(18, 'short vert', 'shorts', 'http://images.clipartlogo.com/files/images/47/479136/childs-shorts-1_f.jpg', 25, 42, 0, 1),
(19, 'short bleu', 'shorts', 'http://images.clipartpanda.com/shorts-clipart-Shorts_4.png', 25, 42, 0, 1),
(20, 'manteau marron', 'coats', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTdVYj75TW8Mx6APP5jWYbkYe9ePTNS0Ak_VkuOsTjxeMD2YRSe', -30, 10, 0, 1),
(21, 'manteau long', 'coats', 'https://101clipart.com/wp-content/uploads/01/Winter%20Coat%20Clipart%2008.png', -30, 10, 10, 1),
(22, 'blouson hiver', 'coats', 'http://images.clipartpanda.com/jacket-clipart-jacket-clipart-cliparts-of-jacket-free-download-wmf-emf.png', -5, 10, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `email` varchar(120) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL,
  `is read` tinyint(1) NOT NULL
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

--
-- Contenu de la table `tokens`
--

INSERT INTO `tokens` (`id`, `token`, `timeout`, `user_id`) VALUES
(1, '538bdf7a8ea31ef877496fb274b516c1', 1504798237, 4),
(2, '1f3bc7e446692858e1145fc9462e9ff5', 1504798662, 4);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(60) NOT NULL,
  `lastname` varchar(60) NOT NULL,
  `username` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` text NOT NULL,
  `country` varchar(60) NOT NULL,
  `city` varchar(60) NOT NULL,
  `zipcode` varchar(10) NOT NULL,
  `role` varchar(32) NOT NULL,
  `unit` enum('°C','°F') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `country`, `city`, `zipcode`, `role`, `unit`) VALUES
(1, '', '', '0rvn', 'toto@pourri.fr', '$2y$10$FZ.icSfx6M4Vg6SuonhG2eR7b5wu6Z9OllM6.1fbb5pS/D8U362.i', 'FR', 'Lille', '59000', '', '°C'),
(2, 'Delphine', 'Titi', 'toto', 'blabla@pourri.fr', '$2y$10$xUHt6PHjkcuVjjGNOsqy.eTXClPThQEQOPDvPdoRnluvL3v1cEZbu', 'BS', 'Lille', '59000', '', '°C'),
(3, 'Marc', 'Blabla', 'Marc1', 'tata@pourri.fr', '$2y$10$301XjjwPW81mqPbG8UDXFua6LoC0QnofabT1YfxruzTFC2QSA0B/a', 'AX', 'Lille', '59000', '', '°C'),
(4, 'Delphine', 'Martinet', '0rvn', 'd-martinet@hotmail.fr', '$2y$10$ms5NHRgvWjvLoLV.qCGo5Omn0a/34opdvug1eJRZ4vlk3iDimlBEu', 'FR', 'Lille', '59000', '', '°C');

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
-- Contenu de la table `usersclothes`
--

INSERT INTO `usersclothes` (`id`, `idClothes`, `idUsers`) VALUES
(1, 1, 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `clothes`
--
ALTER TABLE `clothes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `usersclothes`
--
ALTER TABLE `usersclothes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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

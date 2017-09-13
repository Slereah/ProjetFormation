-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 13 Septembre 2017 à 10:21
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
  `category` enum('chaussures','tops','manteaux','pulls','vestes','pantalons','shorts') NOT NULL,
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
(26, 'Chemise bleue 1', 'tops', 'https://gloimg.rowcdn.com/ROSE/pdm-product-pic/Clothing/2016/07/27/source-img/20160727111742_32397.jpg', 10, 30, 10, 1),
(27, 'Chemise bleue 2', 'tops', 'http://www.binhindioutlet.me/wp-content/uploads/2015/04/MS1001.jpg', 0, 30, 10, 1),
(28, 'Chemise rouge', 'tops', 'https://images-eu.ssl-images-amazon.com/images/I/51+temC6f0L._AC_UL260_SR200,260_.jpg', 0, 10, 0, 1),
(31, 'Manteau polaire 1', 'manteaux', 'http://media.vertbaudet.fr/Pictures/vertbaudet/10732/manteau-fille-en-drap-de-laine.jpg', -30, 10, 10, 1),
(33, 'Manteau marron 1', 'manteaux', 'https://static.galerieslafayette.com/media/400/40076982/G_40076982_750_VPP_1.jpg', 0, 15, 0, 1),
(34, 'Manteau noir 1', 'manteaux', 'https://static.galerieslafayette.com/media/360/36099392/G_36099392_125_VPP_1.jpg', 0, 15, 0, 1),
(35, 'Chaussures noires 1', 'chaussures', 'https://www.bexley.fr/Bexley/CMS/Images/Produits/bellagio/hdbellagio_noir.jpg', 0, 30, 10, 1),
(36, 'Chaussures noires 2', 'chaussures', 'http://www.jbrodde.fr/I-Grande-934-chaussure-de-dame-chaussures-a-lacets-aux-allures-sportives-et-elegantes.net.jpg', 0, 30, 10, 1),
(37, 'Veste ski homme', 'vestes', 'https://res.cloudinary.com/stylight/image/upload/t_p_res268x357sq/product-quiksilver-windlake-veste-a-capuche-zippee-pour-homme-20790038.jpg', 0, 15, 10, 1),
(38, 'Chaussures brillantes argentées homme', 'chaussures', 'https://www.vendupascher.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/c/h/chaussures-brillantes-argentes-homme.jpg', 0, 30, 10, 1),
(39, 'Chaussures marrons 1', 'chaussures', 'https://www.dafy-moto.com/images/product/medium/chaussures-tcx-hero-wp-marron.jpg', 0, 30, 10, 1),
(40, 'Chaussures bleues 1', 'chaussures', 'https://www.chaussuresarche.com/735-8729/chaussures-ceorha-arche.jpg', 0, 30, 10, 1),
(41, 'Pantalon homme gris 1', 'pantalons', 'https://www.decathlon.fr/media/835/8356065/big_8c8e2d0e1e994d74852ea11968d0fa79.jpg', 0, 25, 10, 1),
(42, 'Pantalon homme marron 1', 'pantalons', 'http://www.celio.com/medias/sys_master/productMedias/productMediasImport/h51/hb3/9144813977630/product-media-import-1042010-3-weared.jpg', 0, 30, 10, 1),
(43, 'Pantalon homme 1', 'pantalons', 'http://www.celio.com/medias/sys_master/productMedias/productMediasImport/h78/hb8/9144813781022/product-media-import-1042007-3-weared.jpg', 0, 30, 10, 1),
(44, 'Veste d\'été homme', 'vestes', 'https://i2.cdscdn.com/pdt2/9/7/2/1/700x700/mp01368972/rw/2015-mode-homme-la-veste-en-velours-cotele-cafe.jpg', 15, 30, 0, 1),
(45, 'Veste homme bordeaux', 'vestes', 'https://i2.cdscdn.com/pdt2/5/1/0/1/300x300/mp02281510/rw/awdis-veste-homme-bordeaux-gris.jpg', 15, 30, 0, 1),
(46, 'Veste Grise', 'vestes', 'https://www.dafy-moto.com/images/product/medium/veste-gotham-lt-16897-1.jpg', 10, 25, 10, 1),
(47, 'Veste ski', 'vestes', 'https://www.decathlon.fr/media/837/8371061/big_d8c7898337c64d1b8e82a873b766f350.jpg', -20, 10, 10, 1),
(48, 'blouson de travail', 'vestes', 'https://media.wuerth.com/stmedia/modyf/shop/900px/2650905.jpg', 5, 25, 0, 1),
(49, 'Bottes Polaires Baffin', 'chaussures', 'https://www.grand-froid.fr/boutique/images_produits/baffin_boots_grand_froid-z.jpg', -30, 0, 10, 1),
(50, 'Bottes Hiver Timberland', 'chaussures', 'http://www.seomakeup.fr/image/cache/data/category_10/homme-69614-marque-de-mode-timberland-hiver-bottes-en-caoutchouc-polaire-junior-bott-1577-500x416_0.jpg', -30, 0, 10, 1),
(51, 'Short bleu adidas', 'shorts', 'http://demandware.edgesuite.net/sits_pod20-adidas/dw/image/v2/aaqx_prd/on/demandware.static/-/Sites-adidas-products/en_US/dwf904c0a8/zoom/BJ9165_01_laydown.jpg', 15, 30, 0, 1),
(52, 'Shorts1', 'shorts', 'http://us.oneill.com/shop/media/catalog/product/cache/2/small_image/300x/040ec09b1e35df139433887a97daa66f/i/n/insiderhybrid_sp718a004_nvy_f_2_2.jpg', 20, 50, 0, 1),
(53, 'Pull en laine bleu', 'pulls', 'http://cdn1-elle.ladmedia.fr/var/plain_site/storage/images/mode/pulls-gilets/pull-laine-femme/pull-en-laine-bleu-carven/58403825-1-fre-FR/Pull-en-laine-bleu-Carven.jpg', -10, 5, 0, 1),
(54, 'Pull en laine vert', 'pulls', 'http://cdn2-elle.ladmedia.fr/var/plain_site/storage/images/mode/pulls-gilets/pull-laine-femme/pull-en-laine-vert-maison-kitsune/58404581-1-fre-FR/Pull-en-laine-vert-Maison-Kitsune.jpg', -10, 5, 0, 1),
(55, 'Pantalon ski', '', 'https://www.decathlon.fr/media/839/8398209/classic_ec80ab06-3abc-4ceb-8048-876c4ebee702.jpg', -30, 5, 10, 1),
(56, 'Pantalon Léo', 'pantalons', 'http://www.caroll.com/media-478/catalog/product/cache/1/image/1900x1740/9df78eab33525d08d6e5fb8d27136e95/3/l/pantalon-leo-72_admin-fb236f1cd3824f9394f0c083e3496cbb-b.jpg', 0, 20, 10, 1),
(57, 'Sandales cuir', 'chaussures', 'https://www.lesacduberger.com/shop/308-thickbox_default/sandales-igor.jpg', 20, 50, 0, 1),
(58, 'Tongs femmes rouges', 'chaussures', 'https://i2.cdscdn.com/pdt2/4/4/0/1/300x300/40000291440/rw/havaianas-tongs-femme.jpg', 20, 50, 0, 1);

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

--
-- Contenu de la table `contact`
--

INSERT INTO `contact` (`id`, `firstname`, `lastname`, `email`, `message`, `date`, `is read`) VALUES
(1, 'Delphine', 'martinet', 'd-martinet@hotmail.fr', 'Test', '0000-00-00 00:00:00', 0);

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
(2, '1f3bc7e446692858e1145fc9462e9ff5', 1504798662, 4),
(3, 'cca9b485587551bef50eb18560194592', 1504877722, 4),
(4, '18f07c673d633adef7b938cfcdf68d15', 1504949866, 4);

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
  `unit` enum('°C','°F') NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `country`, `city`, `zipcode`, `role`, `unit`, `isActive`) VALUES
(2, 'Delphine', 'Titi', 'toto', 'blabla@pourri.fr', '$2y$10$xUHt6PHjkcuVjjGNOsqy.eTXClPThQEQOPDvPdoRnluvL3v1cEZbu', 'BS', 'Lille', '59000', '', '°C', 0),
(3, 'Marc', 'Blabla', 'Marc1', 'tata@pourri.fr', '$2y$10$301XjjwPW81mqPbG8UDXFua6LoC0QnofabT1YfxruzTFC2QSA0B/a', 'AX', 'Lille', '59000', '', '°C', 0),
(4, 'Delphine', 'Martinet', '0rvn', 'd-martinet@hotmail.fr', '$2y$10$ms5NHRgvWjvLoLV.qCGo5Omn0a/34opdvug1eJRZ4vlk3iDimlBEu', 'FR', 'Lille', '59000', '', '°C', 0),
(5, 'Samuel', 'Lereah', 'slereah', 'Slereah@b.com', '$2y$10$dVBgn8W/FARbA2bN/fp/EeRCJwaQv2TZyJisIbpSfH0DCPcbmbDs6', 'FR', 'Lille', '59800', 'admin', '°C', 0),
(6, 'test', 'test', 'Test', 'test@test.com', '$2y$10$8iZvjpE8Qh/1DLHquT4Uh./spLWHPxdnqy.camQpjtllcGSWuEAPe', 'FR', 'Lille', '59800', '', '°C', 0),
(7, 'Fazef', 'Fdf', 'TestF', 'F@F.com', '$2y$10$U1cTNFaAD.qfHpdVfxHTN.yy7LTKa3xwpqPUcmwQcCAcchPeEJvE.', 'FR', 'Lille', '59800', 'user', '°F', 0);

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
(14, 31, 5),
(15, 34, 5),
(16, 36, 5),
(17, 35, 5),
(18, 39, 5),
(19, 38, 5),
(20, 40, 5),
(21, 41, 5),
(22, 26, 5),
(23, 27, 5),
(24, 28, 5),
(25, 43, 5),
(26, 42, 5),
(27, 44, 5),
(28, 46, 5),
(29, 45, 5),
(30, 47, 5),
(31, 33, 5),
(32, 37, 5),
(33, 48, 5),
(34, 50, 5),
(35, 49, 5);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `usersclothes`
--
ALTER TABLE `usersclothes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
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

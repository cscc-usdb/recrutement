-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 26 oct. 2019 à 22:17
-- Version du serveur :  10.1.26-MariaDB
-- Version de PHP :  7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `recrutement`
--

-- --------------------------------------------------------

--
-- Structure de la table `cmpt_membres`
--

CREATE TABLE `cmpt_membres` (
  `id_cmpt` int(11) NOT NULL,
  `nom_cmpt` varchar(250) NOT NULL,
  `id_cscc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `cscc_confirme`
--

CREATE TABLE `cscc_confirme` (
  `id_confirme` int(11) NOT NULL,
  `note_confirme` int(10) NOT NULL,
  `remarque_confirme` text NOT NULL,
  `id_cscc` int(10) NOT NULL,
  `recruteur_confirme` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `cscc_membres`
--

CREATE TABLE `cscc_membres` (
  `id_cscc` int(10) NOT NULL,
  `nom_cscc` varchar(250) NOT NULL,
  `prenom_cscc` varchar(250) NOT NULL,
  `date_cscc` varchar(200) NOT NULL,
  `email_cscc` varchar(150) NOT NULL,
  `facebook_cscc` varchar(150) NOT NULL,
  `tlf_cscc` varchar(60) DEFAULT NULL,
  `niveau_cscc` varchar(10) NOT NULL,
  `autre_cscc` varchar(100) DEFAULT NULL,
  `branche_cscc` varchar(150) NOT NULL,
  `creativite_cscc` int(10) NOT NULL,
  `arabe_cscc` int(10) NOT NULL,
  `francais_cscc` int(10) NOT NULL,
  `anglais_cscc` int(10) NOT NULL,
  `id_confirme` int(10) NOT NULL,
  `autre_cmpt` text NOT NULL,
  `recrute_cscc` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `disponible_membres`
--

CREATE TABLE `disponible_membres` (
  `id_dispo` int(10) NOT NULL,
  `jour_dispo` varchar(200) NOT NULL,
  `id_cscc` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `presence_cscc`
--

CREATE TABLE `presence_cscc` (
  `id_presence` int(11) NOT NULL,
  `code_cscc` varchar(200) NOT NULL,
  `nom_cscc` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `recruteur_cscc`
--

CREATE TABLE `recruteur_cscc` (
  `id_recrute` int(11) NOT NULL,
  `username_recrute` varchar(200) NOT NULL,
  `password_recrute` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `recruteur_cscc`
--

INSERT INTO `recruteur_cscc` (`id_recrute`, `username_recrute`, `password_recrute`) VALUES
(1, 'Iniesta', 'd7ac4657154fc82f79769061fd479662616df49e'),
(2, 'Fethi', 'e00219825c863b6dba902abc8e24f4a55fa869b0'),
(3, 'Besbasa', 'b3d165020ccab8f8c01061a9edbe64580943e61b');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cmpt_membres`
--
ALTER TABLE `cmpt_membres`
  ADD PRIMARY KEY (`id_cmpt`),
  ADD KEY `id_cscc` (`id_cscc`);

--
-- Index pour la table `cscc_confirme`
--
ALTER TABLE `cscc_confirme`
  ADD PRIMARY KEY (`id_confirme`),
  ADD KEY `id_cscc` (`id_cscc`);

--
-- Index pour la table `cscc_membres`
--
ALTER TABLE `cscc_membres`
  ADD PRIMARY KEY (`id_cscc`);

--
-- Index pour la table `disponible_membres`
--
ALTER TABLE `disponible_membres`
  ADD PRIMARY KEY (`id_dispo`),
  ADD KEY `id_cscc` (`id_cscc`);

--
-- Index pour la table `presence_cscc`
--
ALTER TABLE `presence_cscc`
  ADD PRIMARY KEY (`id_presence`);

--
-- Index pour la table `recruteur_cscc`
--
ALTER TABLE `recruteur_cscc`
  ADD PRIMARY KEY (`id_recrute`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cmpt_membres`
--
ALTER TABLE `cmpt_membres`
  MODIFY `id_cmpt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=334;
--
-- AUTO_INCREMENT pour la table `cscc_confirme`
--
ALTER TABLE `cscc_confirme`
  MODIFY `id_confirme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;
--
-- AUTO_INCREMENT pour la table `cscc_membres`
--
ALTER TABLE `cscc_membres`
  MODIFY `id_cscc` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;
--
-- AUTO_INCREMENT pour la table `disponible_membres`
--
ALTER TABLE `disponible_membres`
  MODIFY `id_dispo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=539;
--
-- AUTO_INCREMENT pour la table `presence_cscc`
--
ALTER TABLE `presence_cscc`
  MODIFY `id_presence` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT pour la table `recruteur_cscc`
--
ALTER TABLE `recruteur_cscc`
  MODIFY `id_recrute` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cmpt_membres`
--
ALTER TABLE `cmpt_membres`
  ADD CONSTRAINT `cmpt_membres_ibfk_1` FOREIGN KEY (`id_cscc`) REFERENCES `cscc_membres` (`id_cscc`);

--
-- Contraintes pour la table `cscc_confirme`
--
ALTER TABLE `cscc_confirme`
  ADD CONSTRAINT `cscc_confirme_ibfk_1` FOREIGN KEY (`id_cscc`) REFERENCES `cscc_membres` (`id_cscc`);

--
-- Contraintes pour la table `disponible_membres`
--
ALTER TABLE `disponible_membres`
  ADD CONSTRAINT `disponible_membres_ibfk_1` FOREIGN KEY (`id_cscc`) REFERENCES `cscc_membres` (`id_cscc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

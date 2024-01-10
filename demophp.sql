-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 04 avr. 2023 à 10:46
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `demophp`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id_article` int(11) NOT NULL,
  `nom_article` varchar(50) NOT NULL,
  `prix` decimal(15,2) DEFAULT NULL,
  `quantiter` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `id_couleur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `nom_categorie` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `couleur`
--

CREATE TABLE `couleur` (
  `id_couleur` int(11) NOT NULL,
  `nom_couleur` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `adresse` varchar(320) NOT NULL,
  `code_postal` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `adresse`, `code_postal`, `email`, `mdp`) VALUES
(1, 'Karl', '', '', '', 'karl@gmail.fr', '$argon2i$v=19$m=65536,t=4,p=1$cS83ank3OXZuRzdSaFph'),
(2, 'Karlo', '', '', '', 'karl@gmail.fr', '$argon2i$v=19$m=65536,t=4,p=1$YjRlbXFMTzFYdGxiOWph'),
(3, 'paul', '', '', '', 'paul@gmail.fr', '$argon2i$v=19$m=65536,t=4,p=1$eXIvS1pEdmMxRnVnQVdj'),
(4, 'brandon', '', '', '', 'brandon@mail.fr', '$argon2i$v=19$m=65536,t=4,p=1$SWl5U1NqNm1kQ01KTDBq'),
(5, 'pierre', '', '', '', 'pierre@pierre.fr', '$argon2i$v=19$m=65536,t=4,p=1$SU9WY0NmLnM2QnpYZVNPYw$+2apQSp42E9wyyajviBYLWv+NZUGupBet6fx5cr4zIo'),
(6, 'marc', '', '', '', 'marc@gmail.fr', '$argon2i$v=19$m=65536,t=4,p=1$NXdLWm5DS1RncVhvMnlsYw$s54BF9RWm0EYR0W3tGQdmtfte8gY56FnzEndHSltud0'),
(7, 'Dupont', 'Rose', '48 rue de la libert&eacute;', '59000', 'rose@dupont.fr', '$argon2i$v=19$m=65536,t=4,p=1$MEdONXM3UXlJUzhjb3Iyag$B41m0+odM3q1Q9+7E8xxB/S1yHy3JSzZtrwie/H7ApU'),
(8, 'Armenie', 'sarra', '12 rue de mons', '59887', 'sarra@gmail.fr', '$argon2i$v=19$m=65536,t=4,p=1$bTRjRkFENWJPQWJ2MDhDaw$RqbPnHoWD5ew/OvelyoLANGsdJf9QICuFzztAcpP850'),
(9, 'yass', 'yass', '48 rue de la libert&eacute;', '59600', 'yass@yass.fr', '$argon2i$v=19$m=65536,t=4,p=1$UlBqb1pOUG5tWUZ0S0VqaA$0bGV2SvPZtC9CrEIhbVnwxBrVheCQAAu8Me9yRUiuqY');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`),
  ADD KEY `id` (`id`),
  ADD KEY `id_categorie` (`id_categorie`),
  ADD KEY `id_couleur` (`id_couleur`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `couleur`
--
ALTER TABLE `couleur`
  ADD PRIMARY KEY (`id_couleur`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `couleur`
--
ALTER TABLE `couleur`
  MODIFY `id_couleur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`id`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`),
  ADD CONSTRAINT `article_ibfk_3` FOREIGN KEY (`id_couleur`) REFERENCES `couleur` (`id_couleur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

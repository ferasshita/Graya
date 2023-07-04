-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 02 juil. 2023 à 17:41
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `elearning`
--

-- --------------------------------------------------------

--
-- Structure de la table `chapter`
--

CREATE TABLE `chapter` (
  `chapter_id` int(11) NOT NULL,
  `chapter_name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `subject_id` int(11) NOT NULL,
  `location` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `class_id` int(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `chapter`
--

INSERT INTO `chapter` (`chapter_id`, `chapter_name`, `subject_id`, `location`, `class_id`, `date`) VALUES
(62, 'كتاب المعلم', 17, 'uploads/16280970161453385522.pdf', 22, '2021-08-04 19:10:16');

-- --------------------------------------------------------

--
-- Structure de la table `class`
--

CREATE TABLE `class` (
  `class_id` bigint(11) NOT NULL,
  `class_name` varchar(100) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `class`
--

INSERT INTO `class` (`class_id`, `class_name`) VALUES
(22, 'ثاني ثانوي');

-- --------------------------------------------------------

--
-- Structure de la table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `class_id` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_name`, `class_id`) VALUES


-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `firstname`, `lastname`) VALUES
(12, 'admin', '$2y$12$MoEdlofvcm.QldW.587V0eH1vcqDuoh/lMRyVCdCpV1F09u7t5j3i', 'admin', 'admin'),
;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`chapter_id`);

--
-- Index pour la table `class`
--
ALTER TABLE `class`
  ADD UNIQUE KEY `class_id` (`class_id`);

--
-- Index pour la table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `chapter`
--
ALTER TABLE `chapter`
  MODIFY `chapter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT pour la table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

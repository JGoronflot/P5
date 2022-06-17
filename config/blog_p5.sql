-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 17 juin 2022 à 14:52
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog_p5`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  `post_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `author`, `comment`, `comment_date`, `post_id`, `status`) VALUES
(1, 'John Doe', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo illo animi consequatur error ab eum eius exercitationem suscipit. Incidunt culpa saepe a laborum voluptatum laboriosam placeat possimus aspernatur recusandae inventore.', '2022-04-24 01:05:32', 6, 1),
(2, 'John Doe', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo illo animi consequatur error ab eum eius exercitationem suscipit. Incidunt culpa saepe a laborum voluptatum laboriosam placeat possimus aspernatur recusandae inventore.', '2022-04-24 01:05:44', 5, 1),
(3, 'John Doe', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo illo animi consequatur error ab eum eius exercitationem suscipit. Incidunt culpa saepe a laborum voluptatum laboriosam placeat possimus aspernatur recusandae inventore.', '2022-04-24 01:05:54', 4, 1),
(4, 'John Doe', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo illo animi consequatur error ab eum eius exercitationem suscipit. Incidunt culpa saepe a laborum voluptatum laboriosam placeat possimus aspernatur recusandae inventore.', '2022-04-24 01:06:20', 3, 1),
(5, 'John Doe', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo illo animi consequatur error ab eum eius exercitationem suscipit. Incidunt culpa saepe a laborum voluptatum laboriosam placeat possimus aspernatur recusandae inventore.', '2022-04-24 01:06:27', 2, 1),
(6, 'John Doe', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo illo animi consequatur error ab eum eius exercitationem suscipit. Incidunt culpa saepe a laborum voluptatum laboriosam placeat possimus aspernatur recusandae inventore.', '2022-04-24 01:06:37', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `mails`
--

CREATE TABLE `mails` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `sending_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT current_timestamp(),
  `update_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `author`, `creation_date`, `update_date`) VALUES
(1, 'Microlead', 'Retrouvez des centaines de cours et de formations sur des dizaines de technologie différentes. Évaluez votre niveau facilement et rapidement grâce à des exercices, des projets et des qcm conçus par des experts du domaine.', 'Jimmy GORONFLOT', '2022-04-06 12:23:56', '2022-04-06 12:23:56'),
(2, 'Manga++', 'Librairie en ligne, créer sur mesure pour un client libraire', 'Jimmy GORONFLOT', '2022-04-23 10:24:45', '2022-04-23 10:24:45'),
(3, 'Blog', 'Blog qui répertorie toutes mes projets créés jusqu\'là', 'Jimmy GORONFLOT', '2022-04-24 00:00:00', '2022-04-24 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `rank` int(11) NOT NULL DEFAULT 1,
  `user_creation` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `avatar`, `rank`, `user_creation`) VALUES
(1, 'admin', 'exemple@exemple.fr', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'default.jpg', 2, '2022-04-17 04:26:51');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mails`
--
ALTER TABLE `mails`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `mails`
--
ALTER TABLE `mails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 01 août 2022 à 13:06
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 7.4.29

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
(1, 'John Doe', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo illo animi consequatur error ab eum eius exercitationem suscipit. Incidunt culpa saepe a laborum voluptatum laboriosam placeat possimus aspernatur recusandae inventore.', '2022-06-10 01:13:32', 1, 1),
(2, 'John Doe', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo illo animi consequatur error ab eum eius exercitationem suscipit. Incidunt culpa saepe a laborum voluptatum laboriosam placeat possimus aspernatur recusandae inventore.', '2022-06-10 01:13:32', 2, 1),
(3, 'John Doe', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo illo animi consequatur error ab eum eius exercitationem suscipit. Incidunt culpa saepe a laborum voluptatum laboriosam placeat possimus aspernatur recusandae inventore.', '2022-06-10 01:13:32', 3, 1);

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
(1, 'En 2021, Tesla a pulvérisé ses objectifs', 'Le constructeur américain de véhicules électriques haut de gamme Tesla a annoncé dimanche 2 janvier avoir livré près d\'un million de véhicules au cours de l\'année 2021, quasiment deux fois plus qu\'en 2020, faisant mieux que prévu malgré les difficultés mondiales d\'approvisionnement. Tesla a livré plus de 936.000 voitures, tous modèles confondus, en 2021, ce qui représente une croissance de 87,4% par rapport à l\'année précédente. Le constructeur fait ainsi bien mieux que l\'objectif annoncé en janvier dernier, de faire croître ses livraisons de 50% en moyenne par an pendant plusieurs années.\r\n\r\nLe groupe, qui a choisi de déménager son siège de Palo Alto (Californie) à Austin (Texas), a vendu 911.208 exemplaires de ses modèles 3 et Y, et 24.964 véhicules de ses modèles luxe S et X (vendus respectivement 90.000 et 100.000 dollars pièce). Sur le seul quatrième trimestre, ce sont 308.600 voitures qui ont été livrées, en hausse de 0,9% par rapport au même trimestre l\'an passé. Un peu plus tôt dans l\'année, au deuxième trimestre, Tesla avait franchi, pour la première fois, le seuil des 200.000 voitures livrées (201.250).', 'Jimmy GORONFLOT', '2022-06-10 01:13:32', '2022-06-10 01:13:32'),
(2, 'Python nommé langage de l’année 2021', 'Alors que le classement TIOBE du mois de décembre 2021 laissait présager que le langage C# serait élu langage de l’année 2021, c’est finalement Python qui arrive en première place. Il est ainsi sacré langage de l’année 2021. En effet, le langage Python observe une croissance de 1,86 % entre janvier 2021 et janvier 2022, contre une hausse de 1,73 % pour C#.\r\n\r\nDéjà élu langage de l’année 2020 avec une croissance de 2,01 %, Python avait commencé l’année 2021 à la troisième place du classement avant de supplanter Java et C pour devenir numéro 1 de l’index, en octobre 2021. À noter que c’est la cinquième fois que Python s’inscrit comme le langage de l’année puisque c’était également le cas en 2018, 2010 et 2007.\r\n\r\nSelon l’index TIOBE, la popularité de Python n’est pas prête de s’essouffler : « il possède actuellement plus de 1 % d’avance sur les autres langages de programmation. Le record de tous les temps obtenu par Java avec une croissance de 26,49 % en 2001 est encore loin, mais Python a tout pour devenir le langage de programmation standard dans de nombreux domaines ».\r\n\r\nL’index TIOBE s’est attaché à observer les mouvements des langages les plus prometteurs en 2021. Parmi les changements notoires pour cette année :\r\n\r\nSwift passe de la 13ème à la 10ème place,\r\nGo passe de la 14ème à la 13ème place,\r\nRust a gardé la 26ème place du classement,\r\nJulia passe de la 23ème à la 28ème place,\r\nKotlin passe de la 40ème à la 29ème place,\r\nDart passe de la position 25 à 37,\r\nTypeScript passe de la position 42 à 49.\r\nAinsi, TIOBE note qu’à part les langages Swift et Go, le classement ne s’attend pas à voir apparaître de nouveaux langages dans le top 5, ni même dans le top 3.', 'Jimmy GORONFLOT', '2022-06-10 01:13:32', '2022-06-10 01:13:32'),
(3, 'Z Event 2021 : plus de 10 millions d’euros pour Action contre la faim', 'Record battu. Pour la sixième édition de l’événement caritatif – la cinquième sous le nom de « Z Event » –, les plus grandes stars françaises du streaming de jeux vidéo ont récolté auprès de leurs fans plus de 10 millions d’euros de dons en faveur d’Action contre la faim, a annoncé l’un des organisateurs, Adrien « ZeratoR » Nougaret, lundi 1er novembre.\r\n\r\nPlus d’une cinquantaine de personnalités, principalement utilisatrices du site de streaming Twitch, ainsi que quelques stars de YouTube, étaient rassemblées au Palais des congrès de La Grande-Motte (Hérault). Elles s’y sont relayées entre vendredi 18 heures et dimanche soir – soit pendant environ cinquante heures – pour s’affronter lors de parties multijoueur, relever des défis et échanger avec leur communauté de fans.\r\n\r\n« Le choix de l’association Action contre la faim se justifie par des valeurs communes avec notre organisation, mais aussi parce que c’est une association d’envergure, capable de gérer des montants importants. Elle est par ailleurs connue des collégiens et des lycéens, notre public », précise Alexandre Dachary, cocréateur de l’événement. Comme l’année précédente, cette édition a été saluée par Emmanuel Macron sur Twitter : « En se mobilisant tous ensemble, on peut bouger des montagnes. (…) Un grand bravo. »\r\n\r\nEn 2020, le Z Event avait signé une véritable performance en récoltant plus de 5,7 millions d’euros au profit de l’ONG Amnesty International. En 2019, Z Event avait rapporté plus de 3,5 millions à l’Institut Pasteur. Les éditions précédentes avaient permis de reverser presque 1,1 million d’euros à Médecins sans frontières (2018), 500 000 euros à la Croix-Rouge (2017) et 170 000 euros à Save the Children en 2016 (l’événement était alors baptisé « Avengers France »).', 'Jimmy GORONFLOT', '2022-06-10 01:13:32', '2022-06-10 01:13:32'),
(13, 'test', 'test', 'test', '2022-08-01 11:22:53', '2022-08-01 11:22:53');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT pour la table `mails`
--
ALTER TABLE `mails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 26 fév. 2024 à 13:44
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mvc_php`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(150) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(40) NOT NULL,
  `zip` varchar(40) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `user_id`, `firstname`, `lastname`, `address1`, `address2`, `city`, `state`, `zip`, `message`) VALUES
(16, 21, 'manoel', 'coelho', 'rua', 'NBL', 'BR', 'Hauts-de-France', '69400', 'thr'),
(17, 22, 'do', 'du', 'rua', 'mbl', 'BR', 'Pays de la Loire', '54420', 'jklj');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 21,
  `title` varchar(80) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `user_id`, `title`, `description`, `image`, `created_at`) VALUES
(1, 21, 'premier article de blog', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio vel exercitationem quasi, nemo voluptatem eligendi neque, repellendus unde iusto explicabo numquam voluptatum illum expedita ab quia, quibusdam doloribus dolorum. Nulla', 'https://cdn.pixabay.com/photo/2023/11/29/10/32/mountains-8419249_1280.jpg', '2024-02-20 11:24:42'),
(2, 21, 'deuxieme commentaire', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam fuga deleniti sunt officia autem suscipit dolor quo beatae nostrum culpa ut debitis amet, explicabo quae magnam provident mollitia aperiam eror!', 'https://cdn.pixabay.com/photo/2024/01/12/23/02/stream-8504869_1280.png', '2024-02-20 11:25:46'),
(3, 21, 'troisieme commentaire', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam fuga deleniti sunt officia autem suscipit dolor quo beatae nostrum culpa ut debitis amet, explicabo quae magnam providenor!', 'https://cdn.pixabay.com/photo/2024/01/06/08/30/lavender-8490878_1280.jpg', '2024-02-20 11:27:31'),
(4, 21, 'quatrieme commentaire', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio vel exercitationem quasi, nemo voluptatem eligendi neque, repellendus unde iusto explicabo numquam voluptatum illum expedita ab quia, quibusdam doloribus dolorum. Nulla.', 'https://cdn.pixabay.com/photo/2024/01/03/13/01/trees-8485455_1280.jpg', '2024-02-20 11:28:09'),
(5, 21, 'cinquieme commentaire', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio vel exercitationem quasi, nemo voluptatem eligendi neque, repellendus unde iusto explicabo numquam voluptatum illum expedita ab quia, quibusdam doloribus dolorum. Nulla.', 'https://cdn.pixabay.com/photo/2023/12/06/21/07/photo-8434385_1280.jpg', '2024-02-20 11:29:59'),
(6, 21, 'sixieme article de blog ouhouhou', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio vel exercitationem quasi, nemo voluptatem eligendi neque, repellendus unde iusto explicabo numquam voluptatum illum expedita ab quia, quibusdam doloribus dolorum. Nulla.', 'https://cdn.pixabay.com/photo/2017/02/01/22/02/mountain-landscape-2031539_1280.jpg', '2024-02-20 10:29:49'),
(12, 21, 'dia', '  bom', 'https://cdn.pixabay.com/photo/2023/06/03/13/44/bird-8037744_1280.jpg', '2024-02-23 16:49:47'),
(13, 21, 'hello', '  bonjour', 'https://cdn.pixabay.com/photo/2023/10/31/10/24/pond-8354797_1280.jpg', '2024-02-26 09:56:37'),
(14, 21, 'test id', 'what is the id ?', 'https://cdn.pixabay.com/photo/2023/10/31/10/24/pond-8354797_1280.jpg', '2024-02-26 11:31:44'),
(15, 22, 'new user ', 'lorem ipslum ak errorN', 'https://cdn.pixabay.com/photo/2023/10/31/10/24/pond-8354797_1280.jpg', '2024-02-26 12:17:07');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(255) NOT NULL,
  `roles` varchar(255) NOT NULL DEFAULT '{}',
  `registred_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `roles`, `registred_at`) VALUES
(21, 'manoelcoelho3003@gmail.com', '$2y$10$qsqwQlR0o4WFF4un8EZPbeeCPekxqVMOuF8CGiY91yAA5AFLtP9Su', '[\"ROLE_ADMIN\",\"ROLE_MEMBER\"]', '2024-02-22 13:52:28'),
(22, 'lucas@gmail.com', '$2y$10$Fujzw3VkERKUBSU5xxK3keaDbRMo9e2EzWuz8NrHHXNJpEBHudEta', '[\"ROLE_ADMIN\",\"ROLE_MEMBER\"]', '2024-02-22 16:37:42');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_contact` (`user_id`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_post` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `fk_user_contact` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `fk_user_post` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
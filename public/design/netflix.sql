-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 11 août 2026 à 16:10
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
-- Base de données : `netflix`
--

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `secret` text NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT current_timestamp(),
  `blocked` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `secret`, `creation_date`, `blocked`) VALUES
(4, 'constant@test.fr', '$2y$10$G.HBI8feVO6ixl8pjugGA.dUcSfM5GIxlmb3R9TqJKPOp9xWHjUIm', '178636929719656472371596152', '2026-08-10 15:41:37', 0),
(5, 'constantlescutprive2@gmail.com', '$2y$10$a.jqal8agymiVHdL49MnX.4Ffi2.Ky54FMUBA3UqT0HcOOiSkkpES', '178644705019241813431457819103', '2026-08-11 13:17:30', 0),
(6, 'constantlescutprive3@gmail.com', '$2y$10$U3x6nlYL4xPI/43J2vEzGOOH8i7XutJ0uUMOMLO6FOfXCOyCJBvZS', '1786454038539360195613422374', '2026-08-11 15:13:58', 0),
(7, 'paoline@exemple.fr', '$2y$10$ctD23P9qvfmnDCf96sSD4.D3roZczFKVyCBsSC1UQQl9sq3F67J7W', '96c6cfefbdf7f6f3594b482ffdac4a624147a281bdd3fc050b1d7e7df8e14a21', '2026-08-11 15:50:14', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

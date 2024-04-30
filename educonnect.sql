-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 30 avr. 2024 à 13:26
-- Version du serveur : 8.0.30
-- Version de PHP : 8.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `educonnect`
--

-- --------------------------------------------------------

--
-- Structure de la table `emploidutemp`
--

CREATE TABLE `emploidutemp` (
  `id` int NOT NULL,
  `groupe` varchar(5) NOT NULL,
  `jour_semaine` varchar(20) NOT NULL,
  `heure_debut` time NOT NULL,
  `heure_fin` time NOT NULL,
  `matiere` varchar(100) NOT NULL,
  `salle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `emploidutemp`
--

INSERT INTO `emploidutemp` (`id`, `groupe`, `jour_semaine`, `heure_debut`, `heure_fin`, `matiere`, `salle`) VALUES
(16, '1', 'Lundi', '08:00:00', '10:00:00', 'Atelier d\'artisanat', 'Salle d\'activités'),
(17, '1', 'Mardi', '09:00:00', '11:00:00', 'Cours de cuisine', 'Cuisine communautaire'),
(18, '1', 'Mercredi', '10:00:00', '12:00:00', 'Séance de théâtre', 'Salle polyvalente'),
(19, '1', 'Jeudi', '13:00:00', '15:00:00', 'Visite au musée', 'Musée local'),
(20, '1', 'Vendredi', '14:00:00', '16:00:00', 'Promenade en plein air', 'Parc municipal'),
(21, '2', 'Lundi', '08:30:00', '10:30:00', 'Atelier de jardinage', 'Jardin extérieur'),
(22, '2', 'Mardi', '09:30:00', '11:30:00', 'Séance de méditation', 'Espace zen'),
(23, '2', 'Mercredi', '10:30:00', '12:30:00', 'Cours de musique', 'Salle de musique'),
(24, '2', 'Jeudi', '13:30:00', '15:30:00', 'Jeux de société', 'Salle de jeux'),
(25, '2', 'Vendredi', '14:30:00', '16:30:00', 'Sortie à la bibliothèque', 'Bibliothèque municipale'),
(26, '3', 'Lundi', '08:45:00', '10:45:00', 'Séance de yoga', 'Salle de relaxation'),
(27, '3', 'Mardi', '09:45:00', '11:45:00', 'Atelier artistique', 'Atelier créatif'),
(28, '3', 'Mercredi', '10:45:00', '12:45:00', 'Projection de film', 'Salle de cinéma'),
(29, '3', 'Jeudi', '13:45:00', '15:45:00', 'Promenade dans le parc', 'Parc municipal'),
(30, '3', 'Vendredi', '14:45:00', '16:45:00', 'Activités de plein air', 'Terrain de jeux');

-- --------------------------------------------------------

--
-- Structure de la table `enfants`
--

CREATE TABLE `enfants` (
  `idEnfant` int NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `idUtilisateur` int NOT NULL,
  `dateNaissance` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `evenements`
--

CREATE TABLE `evenements` (
  `idEvenement` int NOT NULL,
  `titre` varchar(100) DEFAULT NULL,
  `description` text,
  `dateDebut` datetime DEFAULT NULL,
  `dateFin` datetime DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `evenements`
--

INSERT INTO `evenements` (`idEvenement`, `titre`, `description`, `dateDebut`, `dateFin`, `image`) VALUES
(1, 'Événement 1', 'Description de l\'événement 1', '2024-04-15 09:00:00', '2024-04-15 12:00:00', 'image1.jpg'),
(2, 'Événement 2', 'Description de l\'événement 2', '2024-04-16 10:00:00', '2024-04-16 13:00:00', 'image2.jpg'),
(3, 'Événement 3', 'Description de l\'événement 3', '2024-04-17 11:00:00', '2024-04-17 14:00:00', 'image3.jpg'),
(4, 'Événement 4', 'Description de l\'événement 4', '2024-04-18 12:00:00', '2024-04-18 15:00:00', 'image4.jpg'),
(5, 'Atelier Dessin : Explorez Votre Créativité', ' Un atelier de dessin interactif conçu pour les artistes débutants et intermédiaires qui souhaitent explorer leur créativité, améliorer leurs compétences en dessin et partager des conseils et des techniques avec d\'autres passionnés d\'art. L\'atelier offrira une ambiance détendue et accueillante où les participants pourront s\'exprimer librement à travers le dessin, expérimenter différentes techniques et styles, et recevoir des conseils personnalisés de la part d\'un artiste expérimenté.', '2024-04-19 13:00:00', '2024-04-19 16:00:00', 'image5.jpg'),
(6, 'Soirée Séries Netflix : Découverte et Discussions', 'Une soirée conviviale dédiée à la découverte et à la discussion des séries Netflix les plus populaires. Les participants auront l\'occasion de regarder ensemble des épisodes sélectionnés de différentes séries disponibles sur la plateforme Netflix, puis de partager leurs impressions, théories et réflexions sur les intrigues, les personnages et les thèmes abordés. Des animateurs passionnés seront présents pour animer les discussions, fournir des informations contextuelles sur les séries et faciliter les échanges entre les participants.', '2024-04-20 14:00:00', '2024-04-20 17:00:00', 'image6.jpg'),
(7, 'Soirée Jeux de Société Éducatifs', 'Une soirée ludique et éducative dédiée aux jeux de société qui stimulent la réflexion, la stratégie et la coopération. Les participants auront l\'occasion de découvrir une variété de jeux de société soigneusement sélectionnés pour leur aspect éducatif, tout en s\'amusant et en interagissant avec d\'autres joueurs. Des jeux allant des classiques intemporels aux dernières innovations seront disponibles, offrant une expérience de jeu enrichissante pour les joueurs de tous niveaux et de tous âges. Des animateurs seront présents pour guider les participants, expliquer les règles et encourager la participation active.', '2024-04-21 15:00:00', '2024-04-21 18:00:00', 'image7.jpg'),
(8, 'Visite éducative du Musée des beaux art', 'Une visite guidée interactive au Musée des Sciences, conçue pour offrir aux participants une expérience d\'apprentissage immersive. Les visiteurs auront l\'occasion de découvrir une variété d\'expositions interactives, d\'ateliers pratiques et de démonstrations fascinantes couvrant des sujets tels que la physique, la biologie, l\'astronomie et la technologie. Des guides expérimentés partageront des connaissances approfondies sur les sujets abordés, rendant la visite à la fois instructive et divertissante.', '2024-04-22 16:00:00', '2024-04-22 19:00:00', 'image8.jpg'),
(9, 'Tournoi éducatif de jeux vidéo', 'Promouvoir l\'apprentissage ludique et la compétition saine à travers les jeux vidéo.\nStimuler l\'intérêt des participants pour des domaines tels que les sciences, les mathématiques, l\'histoire et la technologie.\nEncourager la collaboration et la résolution de problèmes à travers des jeux multijoueurs.', '2024-04-23 17:00:00', '2024-04-23 20:00:00', 'image9.jpg'),
(10, 'Exploration écologique en forêt', 'Randonnée guidée à travers les sentiers forestiers\nObservation de la faune et la flore', '2024-04-24 18:00:00', '2024-04-24 21:00:00', 'image10.jpg'),
(11, 'kermess', 'kermess de l\'ecole', '2024-04-29 13:00:00', '2024-04-29 17:00:00', ''),
(15, NULL, 'test 3', '2024-04-26 16:15:00', '2024-04-26 17:15:00', ''),
(16, 'test 4', 'test 4', '2024-04-26 16:25:00', '2024-04-26 17:25:00', ''),
(17, 'test 5', 'test de la redirection', '2024-04-26 16:25:00', '2024-04-26 17:25:00', ''),
(18, 'test 6', 'test de la redirection', '2024-04-26 16:25:00', '2024-04-26 17:25:00', '');

-- --------------------------------------------------------

--
-- Structure de la table `journaux`
--

CREATE TABLE `journaux` (
  `idJournal` int NOT NULL,
  `date` date DEFAULT NULL,
  `contenu` text,
  `image` varchar(255) DEFAULT NULL,
  `idUtilisateur` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `journaux`
--

INSERT INTO `journaux` (`idJournal`, `date`, `contenu`, `image`, `idUtilisateur`) VALUES
(1, '2023-04-10', 'Izaac a joué au parc aujourd\'hui.', 'parc.jpg', 14),
(2, '2023-04-10', 'Izaac a fait du vélo ce matin.', 'velo.jpg', 14),
(3, '2023-04-09', 'Izaac a appris à dessiner un arbre.', 'arbre.jpg', 14),
(4, '2024-04-28', 'RAS', NULL, NULL),
(5, '2024-04-28', 'RAS', NULL, NULL),
(6, '2024-04-28', 'RAS', NULL, NULL),
(7, '2024-04-28', 'A regarder la tele\r\n ', '8f63261d39cb176a3a64011f45bab63e.jpg', NULL),
(8, '2024-04-28', 'test2', '8f63261d39cb176a3a64011f45bab63e.jpg', NULL),
(9, '2024-04-28', 'test3', NULL, NULL),
(10, '2024-04-28', 'test4', '8f63261d39cb176a3a64011f45bab63e.jpg', NULL),
(11, '2024-04-28', 'test5', '8f63261d39cb176a3a64011f45bab63e.jpg', NULL),
(12, '2024-04-28', 'test6', '8f63261d39cb176a3a64011f45bab63e.jpg', NULL),
(13, '2024-04-28', 'test7', '8f63261d39cb176a3a64011f45bab63e.jpg', NULL),
(14, '2024-04-28', 'test8', '8f63261d39cb176a3a64011f45bab63e.jpg', 14);

-- --------------------------------------------------------

--
-- Structure de la table `liaisons`
--

CREATE TABLE `liaisons` (
  `idLiaison` int NOT NULL,
  `idParent` int DEFAULT NULL,
  `idProfessionnel` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `idMessage` int NOT NULL,
  `idExpediteur` int DEFAULT NULL,
  `idDestinataire` int DEFAULT NULL,
  `contenu` text,
  `dateEnvoi` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`idMessage`, `idExpediteur`, `idDestinataire`, `contenu`, `dateEnvoi`) VALUES
(1, 14, 16, 'Bonjour, comment ça va ?', '2024-04-12 09:00:00'),
(2, 17, 14, 'Salut, ça va bien merci ! Et toi ?', '2024-04-12 09:05:00'),
(3, 14, 17, 'Ça va aussi, merci !', '2024-04-12 09:10:00'),
(4, 17, 14, 'Cool ! Qu\'as-tu prévu aujourd\'hui ?', '2024-04-12 09:15:00'),
(5, 14, 17, 'Rien de spécial, juste du travail.', '2024-04-12 09:20:00'),
(6, 17, 14, 'Ah d\'accord, bon courage alors !', '2024-04-12 09:25:00'),
(7, 14, 17, 'Merci ! :)', '2024-04-12 09:30:00');

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `type_id` int NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`type_id`, `role`) VALUES
(1, 'Educateur'),
(2, 'Famille');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `idUtilisateur` int NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `motDePasse` varchar(100) DEFAULT NULL,
  `user_validate` int NOT NULL,
  `phone` int NOT NULL,
  `type_id` int DEFAULT NULL,
  `nomEnfant` varchar(50) DEFAULT NULL,
  `prenomEnfant` varchar(50) DEFAULT NULL,
  `photoEnfant` varchar(255) DEFAULT NULL,
  `dateNaissanceEnfant` date DEFAULT NULL,
  `groupe` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`idUtilisateur`, `nom`, `prenom`, `email`, `motDePasse`, `user_validate`, `phone`, `type_id`, `nomEnfant`, `prenomEnfant`, `photoEnfant`, `dateNaissanceEnfant`, `groupe`) VALUES
(14, 'Berkaniii', 'Nassim', 'nassim@gmail.com', '$2y$10$TMveXGjDRM1nN8.D8e3q2uGZ07w4yI7J/nlmPEJxtcowERIixoK/K', 1, 683397714, 2, 'Berkani', 'isaac', '../assets/img/enfantphoto_enfant_66197383ce8ab_my-hello-kitty-madara-edits-3-v0-joep6hxtttvb1.png', '2024-04-12', '1'),
(15, 'Eikichi', 'Onizuka', 'test@test.fr', '$2y$10$5LzJcbxsO3b5ixCKnx/Vk.oZLkt8fuHZAorOBYuy9EP5XVbFoNYmK', 1, 783397715, 2, 'Eikichi', 'Onizuka', '../assets/img/enfantphoto_enfant_661d325cc0ba1_d3c0aqd-965b1603-934c-4427-9417-e6d52f4db987.png', '2024-04-15', '2'),
(16, 'Doe', 'Jhon', 'jhon@gmail.fr', '$2y$10$TRkDf/8GuFiMj2/qiEVR8.N3rUmsLiYyee5oVJBbZq6c4vcMANCeq', 1, 784397714, 2, 'Doe', 'scarlet', '../assets/img/enfantphoto_enfant_661d347f110f6_Cg_tr_reina_t8.webp', '2024-04-15', '3'),
(17, 'Test', 'test', 'test@mail.fr', '$2y$10$uKr.aa/66nzWSwKHdnXDq.0EijD2L4ZfX8sjyFXsEGIlJkLoUAXO.', 1, 783397715, 1, NULL, NULL, NULL, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `emploidutemp`
--
ALTER TABLE `emploidutemp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groupe` (`groupe`);

--
-- Index pour la table `enfants`
--
ALTER TABLE `enfants`
  ADD PRIMARY KEY (`idEnfant`),
  ADD KEY `idUtilisateur` (`idUtilisateur`);

--
-- Index pour la table `evenements`
--
ALTER TABLE `evenements`
  ADD PRIMARY KEY (`idEvenement`);

--
-- Index pour la table `journaux`
--
ALTER TABLE `journaux`
  ADD PRIMARY KEY (`idJournal`),
  ADD KEY `fk_idUtilisateur` (`idUtilisateur`);

--
-- Index pour la table `liaisons`
--
ALTER TABLE `liaisons`
  ADD PRIMARY KEY (`idLiaison`),
  ADD KEY `idParent` (`idParent`),
  ADD KEY `idProfessionnel` (`idProfessionnel`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`idMessage`),
  ADD KEY `idExpediteur` (`idExpediteur`),
  ADD KEY `idDestinataire` (`idDestinataire`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`),
  ADD KEY `idx_type_id` (`type_id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`idUtilisateur`),
  ADD KEY `fk_type_id` (`type_id`),
  ADD KEY `idx_groupe` (`groupe`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `emploidutemp`
--
ALTER TABLE `emploidutemp`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `enfants`
--
ALTER TABLE `enfants`
  MODIFY `idEnfant` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `evenements`
--
ALTER TABLE `evenements`
  MODIFY `idEvenement` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `journaux`
--
ALTER TABLE `journaux`
  MODIFY `idJournal` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `liaisons`
--
ALTER TABLE `liaisons`
  MODIFY `idLiaison` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `idMessage` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `idUtilisateur` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `emploidutemp`
--
ALTER TABLE `emploidutemp`
  ADD CONSTRAINT `emploidutemp_ibfk_1` FOREIGN KEY (`groupe`) REFERENCES `utilisateurs` (`groupe`) ON DELETE CASCADE;

--
-- Contraintes pour la table `enfants`
--
ALTER TABLE `enfants`
  ADD CONSTRAINT `enfants_ibfk_2` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateurs` (`idUtilisateur`);

--
-- Contraintes pour la table `journaux`
--
ALTER TABLE `journaux`
  ADD CONSTRAINT `fk_idUtilisateur` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateurs` (`idUtilisateur`);

--
-- Contraintes pour la table `liaisons`
--
ALTER TABLE `liaisons`
  ADD CONSTRAINT `liaisons_ibfk_1` FOREIGN KEY (`idParent`) REFERENCES `utilisateurs` (`idUtilisateur`),
  ADD CONSTRAINT `liaisons_ibfk_2` FOREIGN KEY (`idProfessionnel`) REFERENCES `utilisateurs` (`idUtilisateur`);

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`idExpediteur`) REFERENCES `utilisateurs` (`idUtilisateur`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`idDestinataire`) REFERENCES `utilisateurs` (`idUtilisateur`);

--
-- Contraintes pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD CONSTRAINT `fk_type_id` FOREIGN KEY (`type_id`) REFERENCES `type` (`type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

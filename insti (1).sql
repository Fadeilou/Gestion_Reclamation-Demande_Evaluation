-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 25 juin 2021 à 11:52
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `insti`
--

-- --------------------------------------------------------

--
-- Structure de la table `annee_academique`
--

CREATE TABLE `annee_academique` (
  `id` int(11) NOT NULL,
  `designation` varchar(25) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `calendar` text NOT NULL,
  `observation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `annee_academique`
--

INSERT INTO `annee_academique` (`id`, `designation`, `start_date`, `end_date`, `calendar`, `observation`) VALUES
(1, '2019-2020', '2019-10-13', '2020-06-30', '', ''),
(2, '2020-2021', '2020-09-07', '2021-06-30', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `demande_evaluation`
--

CREATE TABLE `demande_evaluation` (
  `id` int(11) NOT NULL,
  `id_profile` int(11) NOT NULL,
  `id_groupe_pedagogique` int(11) NOT NULL,
  `id_annee_academique` int(11) NOT NULL,
  `id_semestre_academique` int(11) NOT NULL,
  `id_type_evaluation` int(11) NOT NULL,
  `id_UE` int(11) NOT NULL,
  `motif` text NOT NULL,
  `description_motif` text NOT NULL,
  `fichier_preuve` varchar(255) NOT NULL,
  `date_demande` date NOT NULL,
  `id_filiere` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

CREATE TABLE `filiere` (
  `id` int(11) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `abreviation` varchar(5) NOT NULL,
  `profile_entree` text NOT NULL,
  `profil_sortie` text NOT NULL,
  `debouche` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `filiere`
--

INSERT INTO `filiere` (`id`, `designation`, `abreviation`, `profile_entree`, `profil_sortie`, `debouche`) VALUES
(1, 'Genie Electrique et Informatique', 'GEI', '', '', ''),
(2, 'Genie Civil', 'GC', '', '', ''),
(3, 'Maintenance Systeme', 'MS', '', '', ''),
(4, 'Genie Mecanique et Productique', 'GMP', '', '', ''),
(5, 'Genie Energetique', 'GE', '', '', ''),
(6, 'commun', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `global`
--

CREATE TABLE `global` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `type_contenu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `global`
--

INSERT INTO `global` (`id`, `nom`, `type_contenu`) VALUES
(1, 'UE', 'Type UE'),
(2, 'ECU', 'Type UE'),
(3, 'Fondementale', 'Nature UE'),
(4, 'Specialisation', 'Nature UE'),
(5, 'Decouverte', 'Nature UE'),
(6, 'Libre', 'Nature UE');

-- --------------------------------------------------------

--
-- Structure de la table `groupe_pedagogique`
--

CREATE TABLE `groupe_pedagogique` (
  `id` int(11) NOT NULL,
  `designation` varchar(25) NOT NULL,
  `id_filiere` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `groupe_pedagogique`
--

INSERT INTO `groupe_pedagogique` (`id`, `designation`, `id_filiere`) VALUES
(1, 'commun', 6),
(2, 'GEI1-A', 1),
(3, 'GEI1-B', 1),
(4, 'GEI2-A', 1),
(5, 'GEI2-B', 1),
(6, 'GEI2-IT', 1),
(7, 'GEI2-EE', 1),
(8, 'GEI3-IT', 1),
(9, 'GEI3-EE', 1),
(10, 'NULL', 1);

-- --------------------------------------------------------

--
-- Structure de la table `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL,
  `appelation` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `position`
--

INSERT INTO `position` (`id`, `appelation`, `description`) VALUES
(1, 'Chef Collaborateur', ''),
(2, 'Chef Division', ''),
(3, 'Chef Service', ''),
(4, 'Chef Service Adjoint', ''),
(5, 'Responsable de classe', ''),
(6, 'Responsable de classe adjoint', ''),
(7, 'Aucune', '');

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

CREATE TABLE `profil` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_groupe_pedagogique` int(11) NOT NULL,
  `id_position` int(11) NOT NULL,
  `com_nom` varchar(50) NOT NULL,
  `com_prenom` varchar(50) NOT NULL,
  `com_genre` varchar(50) NOT NULL,
  `com_num_telephone` varchar(50) NOT NULL,
  `com_parent_fullname` varchar(50) NOT NULL,
  `com_parent_num_telephone` varchar(50) NOT NULL,
  `com_addresse` varchar(50) NOT NULL,
  `com_matricule` int(11) NOT NULL,
  `com_birthday` date NOT NULL,
  `com_lieu_naissance` varchar(50) NOT NULL,
  `com_diplome` varchar(50) NOT NULL,
  `id_filiere_app` int(11) NOT NULL,
  `pers_grade` varchar(50) NOT NULL,
  `ens_specialite_principal` varchar(100) NOT NULL,
  `ens_specialite_complementaire` varchar(255) NOT NULL,
  `pers_datestart` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `profil`
--

INSERT INTO `profil` (`id`, `id_user`, `id_groupe_pedagogique`, `id_position`, `com_nom`, `com_prenom`, `com_genre`, `com_num_telephone`, `com_parent_fullname`, `com_parent_num_telephone`, `com_addresse`, `com_matricule`, `com_birthday`, `com_lieu_naissance`, `com_diplome`, `id_filiere_app`, `pers_grade`, `ens_specialite_principal`, `ens_specialite_complementaire`, `pers_datestart`) VALUES
(5, 1, 6, 7, 'ALASSANE', 'Fadeilou', 'Masculin', '68929853', '', '', '', 60360020, '2011-03-21', 'Cotonou', 'BAC-C', 1, '', '', '', '2021-06-09'),
(6, 2, 10, 2, 'ALASSANE', 'Abass', 'Masculin', '61699034', '', '', 'Cotonou', 6067720, '2021-06-08', 'Cotonou', 'Doctorat', 6, '', 'Mathematique', 'Physique', '2021-06-08'),
(13, 3, 10, 2, 'KONNON', 'Abel', 'Masculin', '98654363', '', '', 'Cotonou', 54543563, '2021-06-09', '', 'Doctorat', 1, '', '', '', '2021-06-02');

-- --------------------------------------------------------

--
-- Structure de la table `reclamation`
--

CREATE TABLE `reclamation` (
  `id` int(11) NOT NULL,
  `id_profile` int(11) NOT NULL,
  `id_semestre_academique` int(11) NOT NULL,
  `id_type_evaluation` int(11) NOT NULL,
  `id_UE` int(11) NOT NULL,
  `motif` text NOT NULL,
  `description_motif` text NOT NULL,
  `fichier_preuve` text NOT NULL,
  `date_reclamation` date NOT NULL,
  `id_filiere` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reclamation`
--

INSERT INTO `reclamation` (`id`, `id_profile`, `id_semestre_academique`, `id_type_evaluation`, `id_UE`, `motif`, `description_motif`, `fichier_preuve`, `date_reclamation`, `id_filiere`) VALUES
(1, 5, 1, 1, 1, 'absent', 'absent', 'reclamation/fadeiloualassane.pdf', '0000-00-00', 1),
(2, 5, 1, 1, 1, 'absent', 'absent', 'reclamation/fadeiloualassane.pdf', '2021-06-14', 1),
(3, 5, 1, 1, 1, 'absent', 'djw', 'reclamation/fadeiloualassane.pdf', '2021-06-16', 1);

-- --------------------------------------------------------

--
-- Structure de la table `semestre_academique`
--

CREATE TABLE `semestre_academique` (
  `id` int(11) NOT NULL,
  `designation` varchar(5) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `observation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `semestre_academique`
--

INSERT INTO `semestre_academique` (`id`, `designation`, `start_date`, `end_date`, `observation`) VALUES
(1, 'S1', '2021-03-15', '2021-06-02', ''),
(2, 'S2', '2021-06-13', '2021-06-25', ''),
(3, 'S3', '2021-06-01', '2021-06-24', ''),
(4, 'S4', '2021-06-06', '2021-06-30', ''),
(5, 'S5', '2021-06-06', '2021-06-22', ''),
(6, 'S6', '2021-06-18', '2021-06-21', '');

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

CREATE TABLE `statut` (
  `id` int(11) NOT NULL,
  `designation` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `statut`
--

INSERT INTO `statut` (`id`, `designation`) VALUES
(1, 'Active'),
(2, 'Non-Active'),
(3, 'Bloque');

-- --------------------------------------------------------

--
-- Structure de la table `type_evaluation`
--

CREATE TABLE `type_evaluation` (
  `id` int(11) NOT NULL,
  `appelation` varchar(25) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `type_evaluation`
--

INSERT INTO `type_evaluation` (`id`, `appelation`, `description`) VALUES
(1, 'Devoir Administration', ''),
(2, 'Devoir Professeur', ''),
(3, 'Reprise', ''),
(4, 'Rattrapage', ''),
(5, 'Moyenne', '');

-- --------------------------------------------------------

--
-- Structure de la table `UE`
--

CREATE TABLE `UE` (
  `id` int(11) NOT NULL,
  `id_global` int(11) NOT NULL,
  `appelation` varchar(50) NOT NULL,
  `abreviation` varchar(10) NOT NULL,
  `code` varchar(15) NOT NULL,
  `description` text NOT NULL,
  `id_semestre_academique` int(11) NOT NULL,
  `CT` int(11) NOT NULL,
  `TD` int(11) NOT NULL,
  `TP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `UE`
--

INSERT INTO `UE` (`id`, `id_global`, `appelation`, `abreviation`, `code`, `description`, `id_semestre_academique`, `CT`, `TD`, `TP`) VALUES
(1, 4, 'Conception et Modelisation en UML', 'UML', 'CMO2214', '', 4, 2, 0, 2),
(2, 4, 'Analyse numerique et applications', 'ANA', 'ANA2214', '', 4, 2, 1, 1),
(3, 4, 'Programmation Orientee Objet en java', 'POO', 'POO2214', '', 4, 2, 0, 2);

-- --------------------------------------------------------

--
-- Structure de la table `UE_groupe_pedagogique_semestre_map`
--

CREATE TABLE `UE_groupe_pedagogique_semestre_map` (
  `id` int(11) NOT NULL,
  `id_UE` int(11) NOT NULL,
  `id_groupe_pedagogique` int(11) NOT NULL,
  `id_semestre_academique` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `UE_groupe_pedagogique_semestre_map`
--

INSERT INTO `UE_groupe_pedagogique_semestre_map` (`id`, `id_UE`, `id_groupe_pedagogique`, `id_semestre_academique`) VALUES
(1, 1, 6, 4),
(2, 2, 6, 4),
(3, 3, 6, 4);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `mail` varchar(191) NOT NULL,
  `mdp` text NOT NULL,
  `id_statut` int(11) NOT NULL,
  `id_usergroup` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `last_connection_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `mail`, `mdp`, `id_statut`, `id_usergroup`, `created_date`, `last_connection_date`) VALUES
(1, 'afadeilou@gmail.com', 'fadel2002', 1, 4, '2021-06-12 08:36:43', '2021-06-12 08:38:43'),
(2, 'paulindegrace@gmail.com', 'fadel212002', 1, 5, '2021-06-13 19:09:14', '2021-06-13 19:09:14'),
(3, 'alassane@gmail.com', 'alassane', 1, 6, '2021-06-13 19:09:14', '2021-06-13 19:09:14');

-- --------------------------------------------------------

--
-- Structure de la table `usergroup`
--

CREATE TABLE `usergroup` (
  `id` int(11) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `usergroup`
--

INSERT INTO `usergroup` (`id`, `designation`, `description`) VALUES
(1, 'admin', 'A les droit d\'administrateur'),
(2, 'redacteur', 'A le droit de redaction'),
(3, 'super_admin', 'A les droits de super administrateur'),
(4, 'apprenant', 'A les droits d\'apprenants'),
(5, 'enseignant', 'A les droits d\'enseignant'),
(6, 'personnel', 'A les droits de professeur');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annee_academique`
--
ALTER TABLE `annee_academique`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `demande_evaluation`
--
ALTER TABLE `demande_evaluation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_demande_reclamation_annee_academique` (`id_annee_academique`),
  ADD KEY `fk_demande_reclamation_groupe_pedagogique` (`id_groupe_pedagogique`),
  ADD KEY `fk_demande_evaluation_profile` (`id_profile`),
  ADD KEY `fk_demande_evaluation_semestre_academique` (`id_semestre_academique`),
  ADD KEY `fk_demande_evaluation_type_evaluation` (`id_type_evaluation`),
  ADD KEY `fk_demande_evaluation_UE` (`id_UE`);

--
-- Index pour la table `filiere`
--
ALTER TABLE `filiere`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `global`
--
ALTER TABLE `global`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `groupe_pedagogique`
--
ALTER TABLE `groupe_pedagogique`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_groupe_pedagogique_filiere` (`id_filiere`);

--
-- Index pour la table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_profil_user` (`id_user`),
  ADD KEY `fk_profil_groupe_pedagogique` (`id_groupe_pedagogique`),
  ADD KEY `fk_profil_filiere` (`id_filiere_app`),
  ADD KEY `fk_profil_position` (`id_position`);

--
-- Index pour la table `reclamation`
--
ALTER TABLE `reclamation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_reclamation_semestre_academique` (`id_semestre_academique`),
  ADD KEY `fk_reclamation_UE` (`id_UE`),
  ADD KEY `fk_reclamation_profile` (`id_profile`),
  ADD KEY `fk_reclamation_type_evaluation` (`id_type_evaluation`);

--
-- Index pour la table `semestre_academique`
--
ALTER TABLE `semestre_academique`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `statut`
--
ALTER TABLE `statut`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_evaluation`
--
ALTER TABLE `type_evaluation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `UE`
--
ALTER TABLE `UE`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_UE_global` (`id_global`),
  ADD KEY `fk_UE_semestre_academique` (`id_semestre_academique`);

--
-- Index pour la table `UE_groupe_pedagogique_semestre_map`
--
ALTER TABLE `UE_groupe_pedagogique_semestre_map`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_UE-groupe-semestre-map_UE` (`id_UE`),
  ADD KEY `fk_UE-groupe-semestre-map_groupe-pedagogique` (`id_groupe_pedagogique`),
  ADD KEY `fk_UE-groupe-semestre-map_semestre-academique` (`id_semestre_academique`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_statut` (`id_statut`),
  ADD KEY `fk_user_usergroup` (`id_usergroup`);

--
-- Index pour la table `usergroup`
--
ALTER TABLE `usergroup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annee_academique`
--
ALTER TABLE `annee_academique`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `demande_evaluation`
--
ALTER TABLE `demande_evaluation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `filiere`
--
ALTER TABLE `filiere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `global`
--
ALTER TABLE `global`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `groupe_pedagogique`
--
ALTER TABLE `groupe_pedagogique`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `reclamation`
--
ALTER TABLE `reclamation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `semestre_academique`
--
ALTER TABLE `semestre_academique`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `statut`
--
ALTER TABLE `statut`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `type_evaluation`
--
ALTER TABLE `type_evaluation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `UE`
--
ALTER TABLE `UE`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `UE_groupe_pedagogique_semestre_map`
--
ALTER TABLE `UE_groupe_pedagogique_semestre_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `usergroup`
--
ALTER TABLE `usergroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `demande_evaluation`
--
ALTER TABLE `demande_evaluation`
  ADD CONSTRAINT `fk_demande_evaluation_UE` FOREIGN KEY (`id_UE`) REFERENCES `UE` (`id`),
  ADD CONSTRAINT `fk_demande_evaluation_profile` FOREIGN KEY (`id_profile`) REFERENCES `profil` (`id`),
  ADD CONSTRAINT `fk_demande_evaluation_semestre_academique` FOREIGN KEY (`id_semestre_academique`) REFERENCES `semestre_academique` (`id`),
  ADD CONSTRAINT `fk_demande_evaluation_type_evaluation` FOREIGN KEY (`id_type_evaluation`) REFERENCES `type_evaluation` (`id`),
  ADD CONSTRAINT `fk_demande_reclamation_annee_academique` FOREIGN KEY (`id_annee_academique`) REFERENCES `annee_academique` (`id`),
  ADD CONSTRAINT `fk_demande_reclamation_groupe_pedagogique` FOREIGN KEY (`id_groupe_pedagogique`) REFERENCES `groupe_pedagogique` (`id`);

--
-- Contraintes pour la table `groupe_pedagogique`
--
ALTER TABLE `groupe_pedagogique`
  ADD CONSTRAINT `fk_groupe_pedagogique_filiere` FOREIGN KEY (`id_filiere`) REFERENCES `filiere` (`id`);

--
-- Contraintes pour la table `profil`
--
ALTER TABLE `profil`
  ADD CONSTRAINT `fk_profil_filiere` FOREIGN KEY (`id_filiere_app`) REFERENCES `filiere` (`id`),
  ADD CONSTRAINT `fk_profil_groupe_pedagogique` FOREIGN KEY (`id_groupe_pedagogique`) REFERENCES `groupe_pedagogique` (`id`),
  ADD CONSTRAINT `fk_profil_position` FOREIGN KEY (`id_position`) REFERENCES `position` (`id`),
  ADD CONSTRAINT `fk_profil_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `reclamation`
--
ALTER TABLE `reclamation`
  ADD CONSTRAINT `fk_reclamation_UE` FOREIGN KEY (`id_UE`) REFERENCES `UE` (`id`),
  ADD CONSTRAINT `fk_reclamation_profile` FOREIGN KEY (`id_profile`) REFERENCES `profil` (`id`),
  ADD CONSTRAINT `fk_reclamation_semestre_academique` FOREIGN KEY (`id_semestre_academique`) REFERENCES `semestre_academique` (`id`),
  ADD CONSTRAINT `fk_reclamation_type_evaluation` FOREIGN KEY (`id_type_evaluation`) REFERENCES `type_evaluation` (`id`);

--
-- Contraintes pour la table `UE`
--
ALTER TABLE `UE`
  ADD CONSTRAINT `fk_UE_global` FOREIGN KEY (`id_global`) REFERENCES `global` (`id`),
  ADD CONSTRAINT `fk_UE_semestre_academique` FOREIGN KEY (`id_semestre_academique`) REFERENCES `semestre_academique` (`id`);

--
-- Contraintes pour la table `UE_groupe_pedagogique_semestre_map`
--
ALTER TABLE `UE_groupe_pedagogique_semestre_map`
  ADD CONSTRAINT `fk_UE-groupe-semestre-map_UE` FOREIGN KEY (`id_UE`) REFERENCES `UE` (`id`),
  ADD CONSTRAINT `fk_UE-groupe-semestre-map_groupe-pedagogique` FOREIGN KEY (`id_groupe_pedagogique`) REFERENCES `groupe_pedagogique` (`id`),
  ADD CONSTRAINT `fk_UE-groupe-semestre-map_semestre-academique` FOREIGN KEY (`id_semestre_academique`) REFERENCES `semestre_academique` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_statut` FOREIGN KEY (`id_statut`) REFERENCES `statut` (`id`),
  ADD CONSTRAINT `fk_user_usergroup` FOREIGN KEY (`id_usergroup`) REFERENCES `usergroup` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

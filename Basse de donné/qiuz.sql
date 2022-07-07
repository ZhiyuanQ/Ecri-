-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Lun 17 Mai 2021 à 12:55
-- Version du serveur :  10.1.48-MariaDB-0ubuntu0.18.04.1
-- Version de PHP :  7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `qiuz`
--

-- --------------------------------------------------------

--
-- Structure de la table `COMMENTAIRE`
--

CREATE TABLE `COMMENTAIRE` (
  `idComm` int(11) NOT NULL,
  `posDebut` int(11) NOT NULL,
  `posFin` int(11) NOT NULL,
  `redacteur` int(11) NOT NULL,
  `typeDys` varchar(45) NOT NULL,
  `dateSaisie` date NOT NULL,
  `dateModif` date NOT NULL,
  `analyse` text NOT NULL,
  `idExtrait` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `COMMENTAIRE`
--

INSERT INTO `COMMENTAIRE` (`idComm`, `posDebut`, `posFin`, `redacteur`, `typeDys`, `dateSaisie`, `dateModif`, `analyse`, `idExtrait`) VALUES
(1, 0, 0, 0, 'Lexique', '0000-00-00', '0000-00-00', 'œuvrent vers / œuvrent pour / s\'orientent vers', 1),
(2, 0, 0, 0, 'Orthographe', '0000-00-00', '0000-00-00', 'qu\'elle chose : quelque chose (confusion avec le pronom indéfini  mais, n\'y a-t-il pas une autre confusion sous jacente? telle chose qui ... Est-ce simplement un problème de grammaire? Un problème de syntaxe ? Cette erreur m\' interroge.)\r\n samble : semble (homophonie, pourtant verbe courant et pas de fautes dans sentiment...à cause du \"m\"?)\r\n en dévulant : (un mot pour un autre? développant serait logique)', 2),
(3, 0, 0, 0, 'Lexique', '0000-00-00', '0000-00-00', 'qu\'elle chose : quelque chose (confusion avec le pronom indéfini  mais, n\'y a-t-il pas une autre confusion sous jacente? telle chose qui ... Est-ce simplement un problème de grammaire? Un problème de syntaxe ? Cette erreur m\' interroge.)\r\n samble : semble (homophonie, pourtant verbe courant et pas de fautes dans sentiment...à cause du \"m\"?)\r\n en dévulant : (un mot pour un autre? développant serait logique)', 2),
(4, 0, 0, 0, 'Syntaxe / Construction des phrases', '0000-00-00', '0000-00-00', 'qu\'elle chose : quelque chose (confusion avec le pronom indéfini  mais, n\'y a-t-il pas une autre confusion sous jacente? telle chose qui ... Est-ce simplement un problème de grammaire? Un problème de syntaxe ? Cette erreur m\' interroge.)\r\n samble : semble (homophonie, pourtant verbe courant et pas de fautes dans sentiment...à cause du \"m\"?)\r\n en dévulant : (un mot pour un autre? développant serait logique)', 2),
(5, 0, 0, 0, 'Orthographe', '0000-00-00', '0000-00-00', 'Quelque soit => Quel que soit', 3),
(6, 0, 0, 0, 'Ponctuation', '0000-00-00', '0000-00-00', 'Goethe, lui considère => Goethe considère/ Goethe, quant à lui, considère\r\n(double problème de virgule et usage de lui emphatique)', 4),
(7, 0, 0, 0, 'Syntaxe / Construction des phrases', '0000-00-00', '0000-00-00', 'Goethe, lui considère => Goethe considère/ Goethe, quant à lui, considère\r\n(double problème de virgule et usage de lui emphatique)', 4),
(8, 0, 0, 0, 'Cohérence / cohésion / argumentation', '0000-00-00', '0000-00-00', 'Rien d\'incorrect au niveau linguistique, mais assez maladroit au niveau argumentatif (trivial). Peut-être qu\'une meilleure maîtrise stylistique rendrait le propos acceptable : on ne note pas d\'opposition nette entre les textes; ils adoptent des approches complémentaires sur la question.', 5),
(9, 0, 0, 0, 'Autres', '0000-00-00', '0000-00-00', 'Un peu lourd. Reformulation proposée : \r\nL’hypothèse est validée par les résultats chiffrés présentés.', 6),
(10, 0, 0, 0, 'Autres', '0000-00-00', '0000-00-00', 'Présence abusive de négation\r\nCitation erronée', 7),
(11, 0, 0, 0, 'Syntaxe / Construction des phrases', '0000-00-00', '0000-00-00', 'Présence abusive de négation\r\nCitation erronée', 7),
(12, 0, 0, 0, 'Discours rapporté / Citation/ Sources', '0000-00-00', '0000-00-00', 'Présence abusive de négation\r\nCitation erronée', 7);

-- --------------------------------------------------------

--
-- Structure de la table `EXTRAIT`
--

CREATE TABLE `EXTRAIT` (
  `idExtrait` int(11) NOT NULL,
  `contenu` text,
  `niveau` varchar(10) NOT NULL,
  `filiere` varchar(35) NOT NULL,
  `genre` varchar(35) NOT NULL,
  `langueMat` varchar(20) NOT NULL,
  `complement` text NOT NULL,
  `dateDepot` date NOT NULL,
  `anneeCreation` varchar(4) NOT NULL,
  `depositaire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Contient les extraits';

--
-- Contenu de la table `EXTRAIT`
--

INSERT INTO `EXTRAIT` (`idExtrait`, `contenu`, `niveau`, `filiere`, `genre`, `langueMat`, `complement`, `dateDepot`, `anneeCreation`, `depositaire`) VALUES
(1, 'Toutefois, Eddy Roulet puis Corinne Rossari œuvrent vers une représentation plus élargie de la reformulation.', 'Master', 'SDL', 'Mémoire', 'Francais', '', '2021-04-08', '', 1),
(2, 'Tout humain repousse qu\'elle chose qui lui samble inconnue et cherche à s\'en protéger en dévulant un sentiment de peur.', 'BTS', 'PME/PMI', 'Ecriture personnelle', 'Francais', '', '2021-04-01', '', 1),
(3, 'Quelque soit le contexte dans lequel il écrivait, il était toujours productif.', 'M1', 'MEEF-PE, ESPE', ' Devoir d\'analyse type CRPE', 'Francais', '', '2021-04-03', '', 2),
(4, 'Goethe, lui considère qu\'une production artistique dépendrait seulement de l\'inspiration divine.', 'M1', 'MEEF-PE, ESPE', 'Devoir d\'analyse type CRPE', 'Francais', '', '2021-05-05', '', 2),
(5, 'Les textes et les auteurs s\'opposent très peu, ils se complètent sur le sujet.', 'M1', 'MEEF-PE, ESPE', 'Devoir d\'analyse type CRPE', 'Français', '', '2021-05-11', '', 1),
(6, 'Après avoir explicité tous les chiffres et les calculs, elle montre clairement que tous ses résultats correspondent à l\'hypothèse avancée. ', 'M1', 'Didactique des langues', 'Résumé de mémoire', 'Français', '', '2021-05-11', '', 1),
(7, 'D’après l’auteur , aucune de ces perspectives n’est (pas) suffisante parce qu’elles ne prennent pas en considération la richesse et la complexité du langage', 'M2', 'SCL', '', 'Français', '', '2021-05-11', '', 1);

-- --------------------------------------------------------

--
-- Structure de la table `USER`
--

CREATE TABLE `USER` (
  `idUser` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `mdp` varchar(20) NOT NULL,
  `statut` varchar(20) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `USER`
--

INSERT INTO `USER` (`idUser`, `login`, `mdp`, `statut`, `nom`, `prenom`) VALUES
(1, 'qiuz', '5NaMepZQzu', 'admin', 'qiu', 'zhiyuan'),
(2, 'yangh', 'yangh', 'admin', 'yang', 'heng');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `COMMENTAIRE`
--
ALTER TABLE `COMMENTAIRE`
  ADD PRIMARY KEY (`idComm`);

--
-- Index pour la table `EXTRAIT`
--
ALTER TABLE `EXTRAIT`
  ADD PRIMARY KEY (`idExtrait`);

--
-- Index pour la table `USER`
--
ALTER TABLE `USER`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `COMMENTAIRE`
--
ALTER TABLE `COMMENTAIRE`
  MODIFY `idComm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `EXTRAIT`
--
ALTER TABLE `EXTRAIT`
  MODIFY `idExtrait` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `USER`
--
ALTER TABLE `USER`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

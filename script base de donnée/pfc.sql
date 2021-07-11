-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 11 juil. 2021 à 02:15
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pfc`
--
CREATE DATABASE IF NOT EXISTS `pfc` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pfc`;

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `color` varchar(7) CHARACTER SET utf8mb4 NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`id`, `title`, `color`, `start`, `end`) VALUES
(6, 'Données semi-structuré', '#FF8C00', '2021-07-04 10:00:00', '2021-07-04 10:00:00'),
(8, 'IA', '#40E0D0', '2021-06-26 00:00:00', '2021-06-27 00:00:00'),
(9, 'D.S.M', '', '2021-07-01 00:00:00', '2021-07-02 00:00:00'),
(10, 'SE', '', '2021-07-24 08:00:00', '2021-07-24 11:00:00'),
(11, 'Algorithme', '#40E0D0', '2021-07-10 00:00:00', '2021-07-11 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `mst_admin`
--

DROP TABLE IF EXISTS `mst_admin`;
CREATE TABLE IF NOT EXISTS `mst_admin` (
  `loginid` varchar(20) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `specialite` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`loginid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `mst_admin`
--

INSERT INTO `mst_admin` (`loginid`, `pass`, `nom`, `prenom`, `email`, `specialite`) VALUES
('123456789', 'yac06', 'LALLAMI', 'Yacine', 'yaclal@gmail.com', 'INFO'),
('mytry', '123', 'moi', 'encore moi', 'moi@gmail.com', 'rien'),
('1965100210', '123456789', 'moi', 'encore moi', 'moi@gmail.com', 'rien'),
('', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `mst_question`
--

DROP TABLE IF EXISTS `mst_question`;
CREATE TABLE IF NOT EXISTS `mst_question` (
  `que_id` int(5) NOT NULL AUTO_INCREMENT,
  `test_id` int(5) NOT NULL,
  `que_desc` varchar(150) DEFAULT NULL,
  `ans1` varchar(75) DEFAULT NULL,
  `ans2` varchar(75) DEFAULT NULL,
  `ans3` varchar(75) DEFAULT NULL,
  `ans4` varchar(75) DEFAULT NULL,
  `true_ans` int(1) DEFAULT NULL,
  PRIMARY KEY (`que_id`,`test_id`),
  KEY `test_id` (`test_id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `mst_question`
--

INSERT INTO `mst_question` (`que_id`, `test_id`, `que_desc`, `ans1`, `ans2`, `ans3`, `ans4`, `true_ans`) VALUES
(16, 8, 'What  Default Data Type ?', 'String', 'Variant', 'Integer', 'Boolear', 2),
(17, 8, 'What is Default Form Border Style ?', 'Fixed Single', 'None', 'Sizeable', 'Fixed Diaglog', 3),
(18, 8, 'Which is not type of Control ?', 'text', 'lable', 'checkbox', 'option button', 1),
(19, 9, 'Which of the follwing contexts are available in the add watch window?', 'Project', 'Module', 'Procedure', 'All', 4),
(20, 9, 'Which window will allow you to halt the execution of your code when a variable changes?', 'The call stack window', 'The immedite window', 'The locals window', 'The watch window', 4),
(22, 9, 'How can you print the object name associated with the last VB  error to the Immediate window?', 'Debug.Print Err.Number', 'Debug.Print Err.Source', 'Debug.Print Err.Description', 'Debug.Print Err.LastDLLError', 2),
(23, 9, 'How can you print the object name associated with the last VB  error to the Immediate window?', 'Debug.Print Err.Number', 'Debug.Print Err.Source', 'Debug.Print Err.Description', 'Debug.Print Err.LastDLLError', 2),
(24, 9, 'What function does the TabStop property on a command button perform?', 'It determines whether the button can get the focus', 'If set to False it disables the Tabindex property.', 'It determines the order in which the button will receive the focus', 'It determines if the access key swquence can be used', 1),
(25, 10, 'You application creates an instance of a form. What is the first event that will be triggered in the from?', 'Load', 'GotFocus', 'Instance', 'Initialize', 4),
(26, 10, 'Which of the following is Hungarian notation for a menu?', 'Menu', 'Men', 'mnu', 'MN', 3),
(27, 10, 'You are ready to run your program to see if it works.Which key on your keyboard will start the program?', 'F2', 'F3', 'F4', 'F5', 4),
(28, 10, 'Which of the following snippets of code will unload a form named frmFo0rm from memory?', 'Unload Form', 'Unload This', 'Unload Me', 'Unload', 3),
(29, 10, 'You want the text in text box named txtMyText to read My Text.In which property will you place this string?', 'Caption', 'Text', 'String', 'None of the above', 2),
(30, 11, 'how to use date( ) in mysql ?', 'now( )', 'today( )', 'date( )', 'time( )', 0),
(41, 13, 'BDD1		', 'u suck', 'toi', 'papi', 'ur daddy sucks', 1),
(42, 14, 'question 1', '1', '2', '3', '4', 1),
(43, 14, '2', '1', '2', '3', '4', 2),
(44, 14, '3', '1', '2', '3', '4', 3),
(45, 14, '4', '5', '4', '7', 'ur daddy sucks', 1),
(46, 14, 'd', 'qsdqsd', 'toi', 'papi', 'ur daddy sucks', 1),
(47, 12, 'hngc', 'studies', 'studies', 'studies', 'suicide', 4),
(48, 12, ', cnx,', 'sql', 'studies', 'n,', 'suicide', 2);

-- --------------------------------------------------------

--
-- Structure de la table `mst_subject`
--

DROP TABLE IF EXISTS `mst_subject`;
CREATE TABLE IF NOT EXISTS `mst_subject` (
  `sub_id` int(5) NOT NULL AUTO_INCREMENT,
  `sub_name` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `mst_subject`
--

INSERT INTO `mst_subject` (`sub_id`, `sub_name`) VALUES
(1, 'VB'),
(2, 'Oracle'),
(3, 'Java'),
(4, 'PHP'),
(5, 'hello'),
(6, 'redaction'),
(7, 'hello u'),
(8, 'hio'),
(9, 'bg'),
(10, 'cc');

-- --------------------------------------------------------

--
-- Structure de la table `mst_test`
--

DROP TABLE IF EXISTS `mst_test`;
CREATE TABLE IF NOT EXISTS `mst_test` (
  `test_id` int(5) NOT NULL AUTO_INCREMENT,
  `sub_id` int(5) NOT NULL,
  `test_name` varchar(30) DEFAULT NULL,
  `total_que` varchar(15) DEFAULT NULL,
  `loginid` varchar(20) NOT NULL,
  `lvl` varchar(20) NOT NULL,
  PRIMARY KEY (`test_id`),
  KEY `sub_id` (`sub_id`),
  KEY `loginid` (`loginid`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `mst_test`
--

INSERT INTO `mst_test` (`test_id`, `sub_id`, `test_name`, `total_que`, `loginid`, `lvl`) VALUES
(8, 1, 'VB Basic Test', '3', '987654321', 'l3'),
(9, 1, 'Essentials of VB', '5', '987654321', 'm1'),
(10, 1, 'Creating User Services', '5', '987654321', 'l3'),
(11, 5, 'exam', '2', '987654321', 'l1'),
(12, 5, 'hi', '2', '', 'L3'),
(13, 6, 's1', '2', '', 'L3'),
(14, 6, 's1', '2', '', 'L3'),
(15, 6, 's1', '2', '', 'L3'),
(16, 6, 's1', '2', '', 'L3'),
(17, 10, 's1', '2', '', 'L3'),
(18, 9, 'hi', '2', '', 'L3');

-- --------------------------------------------------------

--
-- Structure de la table `mst_user`
--

DROP TABLE IF EXISTS `mst_user`;
CREATE TABLE IF NOT EXISTS `mst_user` (
  `loginMat` varchar(20) NOT NULL,
  `pass` varchar(20) DEFAULT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `specialite` varchar(30) DEFAULT NULL,
  `niv` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`loginMat`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `mst_user`
--

INSERT INTO `mst_user` (`loginMat`, `pass`, `nom`, `prenom`, `email`, `specialite`, `niv`) VALUES
('123456789', 'bejaia06', 'sqdqsd', 'qsdqsd', 'qsdqsd@gmail.com', 'informatique', 'l3'),
('987654321', 'bejaia07', 'qsdqsd', 'YACINE', 'qsdqsd@mail.com', 'informatique', 'm1'),
('1213141516', 'nobaracutie', 'itadori', 'yuji', 'fhdsj@HLn.co', 'jujutsu', 'sor1'),
('1213141517', 'nobaracutie', 'kugisake', 'nobara', 'nobku@glm.vo', 'jujutsu', 'L1'),
('1213141518', 'nobaracutie', 'satoru', 'gojo', 'gojosa@gmail.cl', 'jujutsu', '3'),
('165686317', 'heyyou2021', 'rd', 'bvg', 'n@gj.n', 'gl', 'M1');

-- --------------------------------------------------------

--
-- Structure de la table `mst_useranswer`
--

DROP TABLE IF EXISTS `mst_useranswer`;
CREATE TABLE IF NOT EXISTS `mst_useranswer` (
  `sess_id` varchar(80) DEFAULT NULL,
  `test_id` int(11) NOT NULL,
  `que_des` varchar(200) DEFAULT NULL,
  `ans1` varchar(50) DEFAULT NULL,
  `ans2` varchar(50) DEFAULT NULL,
  `ans3` varchar(50) DEFAULT NULL,
  `ans4` varchar(50) DEFAULT NULL,
  `true_ans` int(11) DEFAULT NULL,
  `your_ans` int(11) DEFAULT NULL,
  `ansid` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`test_id`,`ansid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `mst_useranswer`
--

INSERT INTO `mst_useranswer` (`sess_id`, `test_id`, `que_des`, `ans1`, `ans2`, `ans3`, `ans4`, `true_ans`, `your_ans`, `ansid`) VALUES
('3m63babrm1hqpvbiutte7vkour', 9, 'How can you print the object name associated with the last VB  error to the Immediate window?', 'Debug.Print Err.Number', 'Debug.Print Err.Source', 'Debug.Print Err.Description', 'Debug.Print Err.LastDLLError', 2, 2, 4),
('3m63babrm1hqpvbiutte7vkour', 9, 'How can you print the object name associated with the last VB  error to the Immediate window?', 'Debug.Print Err.Number', 'Debug.Print Err.Source', 'Debug.Print Err.Description', 'Debug.Print Err.LastDLLError', 2, 2, 3),
('3m63babrm1hqpvbiutte7vkour', 9, 'Which of the follwing contexts are available in the add watch window?', 'Project', 'Module', 'Procedure', 'All', 4, 2, 1),
('3m63babrm1hqpvbiutte7vkour', 9, 'Which window will allow you to halt the execution of your code when a variable changes?', 'The call stack window', 'The immedite window', 'The locals window', 'The watch window', 4, 1, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

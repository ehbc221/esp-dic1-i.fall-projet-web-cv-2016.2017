-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2017 at 12:41 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gestioncv`
--

-- --------------------------------------------------------

--
-- Table structure for table `formation`
--

CREATE TABLE IF NOT EXISTS `formation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `intitule` varchar(255) NOT NULL,
  `ecole` varchar(255) NOT NULL,
  `annee` date NOT NULL,
  `personne` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `personne` (`personne`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `formation`
--

INSERT INTO `formation` (`id`, `intitule`, `ecole`, `annee`, `personne`) VALUES
(1, 'FORMATION 123', 'ECOLE123', '2017-08-10', 1),
(2, 'DST1', 'Ecole Superieure Polytechnique', '2016-08-10', 1),
(11, 'testFormation', 'TEST', '2017-08-11', 2),
(12, 'testFormation', 'TEST', '2017-08-11', 1),
(15, 'DUT', 'ESP', '2017-08-11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `infoperso`
--

CREATE TABLE IF NOT EXISTS `infoperso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `dateNaissance` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `infoperso`
--

INSERT INTO `infoperso` (`id`, `nom`, `prenom`, `dateNaissance`, `email`, `password`) VALUES
(1, 'Cisse', 'El Hadj Babacar', '1996-03-28', 'ehbc221@gmail.com', 'passer'),
(2, 'Diallo', 'Amadou Mouctarou', '1993-03-04', 'amadou@gmail.com', 'passer');

-- --------------------------------------------------------

--
-- Table structure for table `stage`
--

CREATE TABLE IF NOT EXISTS `stage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entreprise` varchar(255) NOT NULL,
  `debut` date NOT NULL,
  `fin` date NOT NULL,
  `personne` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `personne` (`personne`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `stage`
--

INSERT INTO `stage` (`id`, `entreprise`, `debut`, `fin`, `personne`) VALUES
(1, 'Sonatel', '2017-08-01', '2017-09-01', 1),
(2, 'Senelec', '2017-08-09', '2017-11-09', 2),
(3, 'ESP', '2017-08-10', '2017-08-12', 1),
(4, 'ESP', '2017-08-10', '2017-08-12', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `formation`
--
ALTER TABLE `formation`
  ADD CONSTRAINT `fk_infoperso_formation` FOREIGN KEY (`personne`) REFERENCES `infoperso` (`id`);

--
-- Constraints for table `stage`
--
ALTER TABLE `stage`
  ADD CONSTRAINT `fk_infoperso_stage` FOREIGN KEY (`personne`) REFERENCES `infoperso` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

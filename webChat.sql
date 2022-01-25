-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 24, 2018 at 10:15 
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webChat`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrateur`
--

CREATE TABLE `administrateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `identifiant` varchar(255) NOT NULL,
  `passAdmin` varchar(255) NOT NULL,
  `date_ajout` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrateur`
--

INSERT INTO `administrateur` (`id`, `nom`, `identifiant`, `passAdmin`, `date_ajout`) VALUES
(1, 'alban', 'bossly', '9b986adcf4805443a60af904bfb6c5a480c495b9', '2018-03-23 15:11:40'),
(2, 'ezalu', '@beach', '86eb526bf7d803d66478b610879e7020bdc67fc3', '2018-03-23 23:11:09');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `id_personne` int(11) NOT NULL,
  `commentaire` text NOT NULL,
  `date_commentaire` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `id_personne`, `commentaire`, `date_commentaire`) VALUES
(1, 1, 'je suis partant pour une partie de codage.\r\nqui me suis ?', '2018-03-17 17:13:19'),
(7, 8, 'les gars comment vous vous portez.\r\nun grand bye j ai plus de vos news', '2018-03-19 01:25:02'),
(8, 2, '&quot;''(t', '2018-03-20 00:37:01'),
(9, 10, 'blabla je suis la ', '2018-03-20 12:38:29'),
(12, 5, 'salut mes vrais', '2018-03-24 19:00:58');

-- --------------------------------------------------------

--
-- Table structure for table `personne`
--

CREATE TABLE `personne` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_inscription` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personne`
--

INSERT INTO `personne` (`id`, `pseudo`, `pass`, `email`, `date_inscription`) VALUES
(1, 'ezalu', 'a707eab96f25fb10d7fcae583e6ac22a081b7aba', 'bossly71@gmail.com', '2018-03-17 11:33:28'),
(2, 'kpanborgiss', 'df40f9f8df96eb3fb052b58c35b5dc7cf63755db', 'fake@gmail.com', '2018-03-17 12:40:32'),
(5, 'jessica', '54d7cd9d17dfc5ae525a9863ec9e7afccfba1761', 'jess21@gmail.com', '2018-03-17 18:33:37'),
(8, 'romuald', 'e2baca9350c0b80e7682977d2fda92210b48e457', 'rods@yahoo.fr', '2018-03-19 01:23:42'),
(9, 'pseudo', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'pass@pseudo.fr', '2018-03-19 01:29:42'),
(10, 'cortek', '710536247766cf3312ed80f28c93d63874d42f81', 'cortek@yahoo.fr', '2018-03-20 12:37:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `personne`
--
ALTER TABLE `personne`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

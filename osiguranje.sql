-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 03, 2019 at 04:32 PM
-- Server version: 5.7.24
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `osiguranje`
--

-- --------------------------------------------------------

--
-- Table structure for table `dodatni_osiguranici`
--

DROP TABLE IF EXISTS `dodatni_osiguranici`;
CREATE TABLE IF NOT EXISTS `dodatni_osiguranici` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime_i_prezime` varchar(200) NOT NULL,
  `datum_rodjenja` date NOT NULL,
  `broj_pasosa` varchar(50) NOT NULL,
  `id_nosioca` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dodatni_osiguranici`
--

INSERT INTO `dodatni_osiguranici` (`id`, `ime_i_prezime`, `datum_rodjenja`, `broj_pasosa`, `id_nosioca`) VALUES
(1, 'tamara', '2019-06-06', '123456', 22),
(2, 'Luka Krklješ', '2019-06-02', '123456', 23),
(3, 'Jelena Jeremić', '2019-06-07', '1234567', 23),
(4, 'Dragana Knezevic', '2019-06-06', '12345678', 24),
(5, 'Ivan Ivanovic', '2019-06-05', '12345678', 25);

-- --------------------------------------------------------

--
-- Table structure for table `nosioci_osiguranja`
--

DROP TABLE IF EXISTS `nosioci_osiguranja`;
CREATE TABLE IF NOT EXISTS `nosioci_osiguranja` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime_i_prezime` varchar(45) NOT NULL,
  `datum_rodjenja` date NOT NULL,
  `broj_pasosa` varchar(45) NOT NULL,
  `telefon` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `polazak` date NOT NULL,
  `dolazak` date NOT NULL,
  `polisa` int(11) NOT NULL,
  `datum_unosa` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nosioci_osiguranja`
--

INSERT INTO `nosioci_osiguranja` (`id`, `ime_i_prezime`, `datum_rodjenja`, `broj_pasosa`, `telefon`, `email`, `polazak`, `dolazak`, `polisa`, `datum_unosa`) VALUES
(1, 'Tamara', '2019-06-05', '524595', '9999999', 'taki@gmail.com', '2019-06-06', '2019-07-04', 0, '2019-06-02 13:57:56'),
(22, 'Anita Vasić', '2019-02-02', '1234567', '9999999', 'taki@gmail.com', '2019-06-08', '2019-07-03', 1, '2019-06-02 21:02:44'),
(23, 'Slavko Vasić', '2019-06-15', '123456', '66666666666', 'taki@gmail.com', '2019-06-07', '2019-07-03', 1, '2019-06-02 21:10:35'),
(24, 'Tamara Vasic Antic', '2019-06-12', '524595', '9999999', 'taki@gmail.com', '2019-06-05', '2019-07-04', 1, '2019-06-03 15:10:59'),
(25, 'Milos Markovic', '2019-06-06', '524595', '9999999', 'taki@gmail.com', '2019-06-06', '2019-07-05', 1, '2019-06-03 15:13:03'),
(26, 'Jelena Zivkovic', '2019-06-05', '1234567891236', '0649006527', 'ssssss', '2019-06-06', '2019-07-04', 0, '2019-06-03 17:19:08');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

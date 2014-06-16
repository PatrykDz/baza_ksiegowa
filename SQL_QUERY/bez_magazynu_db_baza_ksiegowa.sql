-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2014 at 11:11 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_baza_ksiegowa`
--

-- --------------------------------------------------------

--
-- Table structure for table `kontrachenci`
--

CREATE TABLE IF NOT EXISTS `kontrachenci` (
  `id_kontrachenta` int(11) NOT NULL AUTO_INCREMENT,
  `imie` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `nazwisko` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `nr_tel` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `adres` varchar(80) COLLATE utf8_polish_ci DEFAULT NULL,
  PRIMARY KEY (`id_kontrachenta`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `kontrachenci`
--

INSERT INTO `kontrachenci` (`id_kontrachenta`, `imie`, `nazwisko`, `email`, `nr_tel`, `adres`) VALUES
(1, 'Jan', 'Kowalski', 'kowalski@wp.pl', '123456789', 'Toruń, ul. Nowa 14'),
(2, 'Marek', 'Nowak', 'nowak@gmail.com', '123456789', 'Toruń, ul. Stara 14');

-- --------------------------------------------------------

--
-- Table structure for table `transakcje`
--

CREATE TABLE IF NOT EXISTS `transakcje` (
  `id_transakcji` int(11) NOT NULL AUTO_INCREMENT,
  `nazwa_transakcji` varchar(100) COLLATE utf8_polish_ci DEFAULT NULL,
  `opis_transakcji` varchar(300) COLLATE utf8_polish_ci DEFAULT NULL,
  `zakup_netto` decimal(10,2) DEFAULT NULL,
  `zakup_brutto` decimal(10,2) DEFAULT NULL,
  `data_zakupu` date DEFAULT NULL,
  `sprzedaz_netto` decimal(10,2) DEFAULT NULL,
  `sprzedaz_brutto` decimal(10,2) DEFAULT NULL,
  `data_sprzedazy` date DEFAULT NULL,
  `koszty_allegro` decimal(10,2) DEFAULT NULL,
  `koszty_inne` decimal(10,2) DEFAULT NULL,
  `kontrachenci_id_kontrachenta` int(11) NOT NULL,
  PRIMARY KEY (`id_transakcji`),
  KEY `fk_transakcje_kontrachenci_idx` (`kontrachenci_id_kontrachenta`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `transakcje`
--

INSERT INTO `transakcje` (`id_transakcji`, `nazwa_transakcji`, `opis_transakcji`, `zakup_netto`, `zakup_brutto`, `data_zakupu`, `sprzedaz_netto`, `sprzedaz_brutto`, `data_sprzedazy`, `koszty_allegro`, `koszty_inne`, `kontrachenci_id_kontrachenta`) VALUES
(1, 'Laptop HP ProBook 1425', 'Nowy kupiony i sprzedany', '800.00', '1000.00', '2014-06-15', '1000.00', '1200.00', '2014-06-14', '5.00', '5.00', 1),
(2, 'Laptop Dell 1422', 'OK', '1000.00', '1200.00', '2014-06-15', '800.00', '1000.00', '2014-06-17', '5.00', '1.00', 2),
(4, 'Laptop DELL Z500', 'Lekko uszkodzony', '1000.00', NULL, '2014-01-01', '1200.00', NULL, '2014-01-02', NULL, '5.00', 1),
(6, 'DELL BBB88', 'OK', '800.00', '984.00', '2014-01-01', '1200.00', '1476.00', '2014-01-02', '24.00', '10.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wydatki_inne`
--

CREATE TABLE IF NOT EXISTS `wydatki_inne` (
  `id_wydatku` int(11) NOT NULL AUTO_INCREMENT,
  `nazwa_wydatku` varchar(100) COLLATE utf8_polish_ci DEFAULT NULL,
  `data_wydatku` date DEFAULT NULL,
  `wydatek_netto` decimal(10,0) DEFAULT NULL,
  `wydatek_brutto` decimal(10,0) DEFAULT NULL,
  `wydatki_innecol` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `powod_wydatku` varchar(300) COLLATE utf8_polish_ci DEFAULT NULL,
  PRIMARY KEY (`id_wydatku`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transakcje`
--
ALTER TABLE `transakcje`
  ADD CONSTRAINT `fk_transakcje_kontrachenci` FOREIGN KEY (`kontrachenci_id_kontrachenta`) REFERENCES `kontrachenci` (`id_kontrachenta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

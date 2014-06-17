-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 17 Cze 2014, 16:04
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
-- Struktura tabeli dla tabeli `kontrachenci`
--

CREATE TABLE IF NOT EXISTS `kontrachenci` (
  `id_kontrachenta` int(11) NOT NULL AUTO_INCREMENT,
  `imie` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `nazwisko` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `nr_tel` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `adres` varchar(80) COLLATE utf8_polish_ci DEFAULT NULL,
  PRIMARY KEY (`id_kontrachenta`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=5 ;

--
-- Zrzut danych tabeli `kontrachenci`
--

INSERT INTO `kontrachenci` (`id_kontrachenta`, `imie`, `nazwisko`, `email`, `nr_tel`, `adres`) VALUES
(1, 'Jan', 'Kowalski', 'kowalski@wp.pl', '123456789', 'Toruń, ul. Nowa 14'),
(2, 'Marek', 'Nowak', 'nowak@gmail.com', '123456789', 'Toruń, ul. Stara 14'),
(3, 'Dawid', 'Dziarnecki', 'dziarnecki@gmail.com', '458757864', 'Kucborek 17'),
(4, 'Andrzej', 'Gac', 'gac@wp.pl', '457981327', 'Toruń, ul. Polna 44a');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `magazyn`
--

CREATE TABLE IF NOT EXISTS `magazyn` (
  `id_towaru` int(11) NOT NULL AUTO_INCREMENT,
  `nazwa` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `cena_netto` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`id_towaru`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Zrzut danych tabeli `magazyn`
--

INSERT INTO `magazyn` (`id_towaru`, `nazwa`, `cena_netto`) VALUES
(1, 'Acer A300', '1800'),
(2, 'Acer B800', '500'),
(3, 'Belinea ProBook', '200'),
(4, 'HP ProBook 4720s', '5000');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `transakcje`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=24 ;

--
-- Zrzut danych tabeli `transakcje`
--

INSERT INTO `transakcje` (`id_transakcji`, `nazwa_transakcji`, `opis_transakcji`, `zakup_netto`, `zakup_brutto`, `data_zakupu`, `sprzedaz_netto`, `sprzedaz_brutto`, `data_sprzedazy`, `koszty_allegro`, `koszty_inne`, `kontrachenci_id_kontrachenta`) VALUES
(7, 'HP ProBook 4720s', '', '1200.00', '1476.00', '2014-06-09', '1600.00', '1968.00', '2014-06-16', '26.94', '0.00', 1),
(9, 'Acer B800', 'OK', '500.00', '615.00', '2014-06-16', '700.00', '861.00', '2014-06-17', '21.41', '10.00', 2),
(10, 'Belinea ProBook', '', '200.00', '246.00', '2014-06-16', '300.00', '369.00', '2014-06-16', '18.95', '0.00', 1),
(11, 'Acer B800', 'Działa ok', '500.00', '615.00', '2014-06-15', '800.00', '861.00', '0000-00-00', '22.02', '0.00', 1),
(12, 'Belinea ProBook', '', '200.00', '246.00', '0000-00-00', '400.00', '492.00', '2014-06-10', '19.56', '0.00', 1),
(13, 'Acer B800', 'xxxxxxx', '500.00', '615.00', '2014-06-14', '900.00', '1107.00', '2014-06-16', '22.64', '0.00', 2),
(15, 'Acer A300', 'dccccccccccc', '1800.00', '2214.00', '0000-00-00', '800.00', '984.00', '0000-00-00', '22.02', '0.00', 3),
(20, 'Acer B800', '', '500.00', '615.00', '2014-06-16', '600.00', '738.00', '2014-06-14', '20.79', '0.00', 1),
(21, 'Acer A300', '', '1800.00', '2214.00', '0000-00-00', '1810.00', '2226.30', '0000-00-00', '28.23', '0.00', 3),
(22, 'Acer A300', '', '1800.00', '2214.00', '2014-06-16', '2000.00', '2460.00', '2014-06-17', '29.40', '10.00', 3),
(23, 'Acer B800', 'działa', '500.00', '615.00', '2014-06-09', '510.00', '627.30', '0000-00-00', '20.24', '10.00', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(2, 'admin', 'b0ae616aabf4f6986012aae4b1ec6621');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wydatki_inne`
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
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `transakcje`
--
ALTER TABLE `transakcje`
  ADD CONSTRAINT `fk_transakcje_kontrachenci` FOREIGN KEY (`kontrachenci_id_kontrachenta`) REFERENCES `kontrachenci` (`id_kontrachenta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

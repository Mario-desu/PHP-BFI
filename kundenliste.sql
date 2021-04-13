-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 04. Nov 2020 um 22:49
-- Server-Version: 10.4.14-MariaDB
-- PHP-Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `kundenliste`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kunden`
--

CREATE TABLE `kunden` (
  `kundenID` int(11) NOT NULL,
  `kundenName` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kundenEmail` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kundenPassword` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kundenRole` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `kunden`
--

INSERT INTO `kunden` (`kundenID`, `kundenName`, `kundenEmail`, `kundenPassword`, `kundenRole`) VALUES
(1, 'Manfred Müller', 'manfred.mueller@gmail.com', '12345', 1),
(2, 'Franz Mayer', 'franz.maier@yahoo.com', '54321', 2),
(3, 'Karl Berger', 'martina.huber@yahoo.com', 'abcdef', 1),
(4, 'Franziska Baumgartner', 'franziska.baumgartner@gmx.at', 'franzi1', 2),
(5, 'Martina Huber', 'martina.huber@msn.com', 'abcdef', 3),
(6, 'Maria Martinovic', 'maria.martinovic@hotmail.com', '2324112', 2),
(7, 'Bernhard Lang', 'bernhard.lang@orf.at', '234322', 1),
(8, 'Gertrud Hartl', 'gertrud.hartl@oebb.at', '39472', 3),
(9, 'Gustav Gans', 'gustav.gans@gmail.com', '56789', 1),
(10, 'Gertrud Hartl', 'gertrud.hartl@oebb.at', '39472', 3);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `kunden`
--
ALTER TABLE `kunden`
  ADD PRIMARY KEY (`kundenID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `kunden`
--
ALTER TABLE `kunden`
  MODIFY `kundenID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

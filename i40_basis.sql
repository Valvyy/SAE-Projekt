-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 08. Feb 2022 um 15:17
-- Server-Version: 10.4.22-MariaDB
-- PHP-Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `i40_basis`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bestellposition`
--

CREATE TABLE `bestellposition` (
  `auftragid` int(11) NOT NULL,
  `bestellung` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `bestellposition`
--

INSERT INTO `bestellposition` (`auftragid`, `bestellung`, `status`) VALUES
(1, 1, 2),
(2, 14, 1),
(3, 15, 1),
(4, 18, 1),
(5, 19, 1),
(8, 22, 1),
(9, 23, 1),
(10, 24, 1),
(11, 25, 1),
(12, 26, 1),
(13, 27, 1),
(14, 28, 1),
(15, 29, 1),
(16, 30, 1),
(17, 31, 1),
(18, 32, 1),
(19, 33, 1),
(20, 34, 1),
(21, 35, 1),
(22, 36, 1),
(23, 38, 1),
(24, 39, 1),
(25, 40, 1),
(26, 41, 1),
(27, 42, 1),
(28, 43, 1),
(29, 44, 1),
(30, 45, 1),
(31, 46, 1),
(32, 47, 1),
(33, 48, 1),
(34, 49, 1),
(35, 50, 1),
(36, 51, 1),
(37, 52, 1),
(38, 53, 1),
(39, 54, 1),
(40, 55, 1),
(41, 56, 1),
(42, 57, 1),
(43, 58, 2),
(44, 59, 4),
(45, 60, 1),
(46, 61, 1),
(47, 62, 1),
(48, 63, 1),
(49, 64, 1),
(50, 65, 1),
(51, 66, 1),
(52, 67, 1),
(53, 68, 1),
(54, 69, 1),
(55, 70, 1),
(56, 71, 1),
(57, 72, 1),
(58, 73, 1),
(59, 74, 1),
(60, 75, 1),
(61, 76, 1),
(62, 77, 1),
(63, 78, 1),
(64, 79, 1),
(65, 80, 1),
(66, 81, 1),
(67, 82, 1),
(68, 83, 1),
(69, 84, 1),
(70, 85, 1),
(71, 86, 1),
(72, 87, 1),
(73, 88, 1),
(74, 89, 1),
(75, 90, 1),
(76, 91, 1),
(77, 92, 1),
(78, 93, 1),
(79, 94, 1),
(80, 95, 1),
(81, 96, 1),
(82, 97, 1),
(83, 98, 1),
(84, 99, 1),
(85, 100, 1),
(86, 101, 1),
(87, 102, 1),
(88, 103, 1),
(89, 104, 4),
(90, 105, 4),
(91, 106, 3);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bestelluebersicht`
--

CREATE TABLE `bestelluebersicht` (
  `bestellungsid` int(11) NOT NULL,
  `warenkorbid` int(11) NOT NULL,
  `konto` int(11) NOT NULL,
  `produkt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `bestelluebersicht`
--

INSERT INTO `bestelluebersicht` (`bestellungsid`, `warenkorbid`, `konto`, `produkt`) VALUES
(1, 1, 1, 10),
(3, 1, 1, 4),
(4, 1, 1, 4),
(5, 1, 1, 4),
(6, 2, 1, 4),
(7, 3, 1, 10),
(10, 4, 1, 11),
(11, 5, 1, 4),
(12, 5, 1, 6),
(13, 5, 1, 11),
(14, 6, 1, 11),
(15, 7, 1, 11),
(16, 8, 1, 11),
(17, 9, 1, 11),
(18, 10, 1, 11),
(19, 11, 1, 11),
(20, 12, 1, 11),
(21, 13, 1, 11),
(22, 14, 1, 11),
(23, 15, 1, 11),
(24, 16, 1, 11),
(25, 17, 1, 11),
(26, 18, 1, 11),
(27, 19, 1, 11),
(28, 20, 1, 11),
(29, 21, 1, 11),
(30, 22, 1, 11),
(31, 23, 1, 11),
(32, 24, 1, 11),
(33, 25, 1, 11),
(34, 26, 1, 11),
(35, 27, 1, 11),
(36, 28, 1, 11),
(37, 29, 1, 11),
(38, 30, 1, 11),
(39, 31, 1, 11),
(40, 32, 1, 11),
(41, 33, 1, 9),
(42, 34, 1, 9),
(43, 35, 1, 9),
(44, 36, 1, 9),
(45, 37, 1, 9),
(46, 38, 1, 9),
(47, 39, 1, 9),
(48, 40, 1, 9),
(49, 41, 1, 9),
(50, 42, 1, 9),
(51, 43, 1, 9),
(52, 44, 1, 9),
(53, 45, 1, 9),
(54, 46, 1, 9),
(55, 47, 1, 9),
(56, 48, 1, 5),
(57, 48, 1, 10),
(58, 49, 1, 5),
(59, 49, 1, 10),
(60, 50, 1, 5),
(61, 50, 1, 10),
(62, 51, 1, 5),
(63, 51, 1, 10),
(64, 52, 1, 5),
(65, 52, 1, 10),
(66, 53, 1, 8),
(67, 53, 1, 11),
(68, 54, 1, 8),
(69, 54, 1, 11),
(70, 55, 1, 8),
(71, 55, 1, 11),
(72, 56, 1, 8),
(73, 56, 1, 11),
(74, 57, 1, 8),
(75, 57, 1, 11),
(76, 58, 1, 8),
(77, 58, 1, 11),
(78, 59, 1, 8),
(79, 59, 1, 11),
(80, 60, 1, 8),
(81, 60, 1, 11),
(82, 61, 1, 6),
(83, 62, 1, 6),
(84, 63, 1, 6),
(85, 64, 1, 8),
(86, 64, 1, 9),
(87, 65, 1, 8),
(88, 65, 1, 9),
(89, 66, 1, 8),
(90, 66, 1, 9),
(91, 67, 1, 5),
(92, 68, 1, 5),
(93, 69, 1, 5),
(94, 70, 1, 5),
(95, 71, 1, 5),
(96, 72, 1, 5),
(97, 73, 1, 5),
(98, 74, 1, 5),
(99, 75, 1, 4),
(100, 76, 1, 4),
(101, 77, 1, 4),
(102, 78, 1, 4),
(103, 79, 1, 4),
(104, 80, 14, 7),
(105, 80, 14, 8),
(106, 81, 1, 6);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kunde`
--

CREATE TABLE `kunde` (
  `kundeid` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `adresse` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `kunde`
--

INSERT INTO `kunde` (`kundeid`, `name`, `adresse`) VALUES
(1, 'Louis Kretschmer', ''),
(4, 'Artur Schwarzkopf', ''),
(5, 'Marcell Regel', ''),
(6, 'Maximilian Matysiok', ''),
(7, 'Rege', ''),
(11, 'Marcell Regel', 'Weinsberg'),
(15, 'Udo Bernion', 'Ludwigsburg'),
(16, 'Frau Kolb', 'Buxtehude'),
(17, 'Olaf Scholz', 'Shishabar 0815'),
(18, 'Matthias Walter', 'Neckarsulm'),
(19, 'Deine Mudda', 'Hafenstraße 12');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kundenkonto`
--

CREATE TABLE `kundenkonto` (
  `kontoid` int(11) NOT NULL,
  `kunde` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `passwort` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `kundenkonto`
--

INSERT INTO `kundenkonto` (`kontoid`, `kunde`, `username`, `passwort`, `email`) VALUES
(1, 5, 'regel', '1234', ''),
(2, 4, 'ewqeqe', '1234', 'mwdma@mail.com'),
(3, 5, 'hallor ', 'wdadwadwawdwada', 'jdikidi@mail.com'),
(7, 5, 'x', '1234', 'marcellregel@gmail.com'),
(11, 15, 'bernionu', '1234', 'be@css-nsu.de'),
(12, 16, 'kolbcchen', '1234', 'kolb@css-nsu.de'),
(13, 17, 'scholzi', 'olaf', 'olaf.scholz@gmbh.de'),
(14, 18, 'walter', '1234', 'mw@css-nsu.de'),
(15, 19, 'Ja', '1234', 'deine-mudda@puff.hn');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `produkt`
--

CREATE TABLE `produkt` (
  `produktid` int(11) NOT NULL,
  `bezeichnung` varchar(40) NOT NULL,
  `preis` float NOT NULL,
  `beschreibung` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `produkt`
--

INSERT INTO `produkt` (`produktid`, `bezeichnung`, `preis`, `beschreibung`) VALUES
(4, 'Flipchart', 40.99, 'Hochwertige, magnetische Flipchart, abwaschbar'),
(5, 'Bürostuhl', 134.49, 'Höhenverstellbar, Lendenstütze, verstellbare Armstützen, 3-Achsen vertsellbar'),
(6, 'Whiteboardmarker', 2.2, 'Verschiedene Farben, non-permantent, umweltfreundlich'),
(7, 'Filzstifte-Set', 8.99, '4-farbiges Set, Rot/Blau/Grün/Schwarz, non-permanent'),
(8, 'Pinnwand', 45.99, 'Sehr robust,  hochwertiger Aluminiumrahmen, vielseitig einsetzbar'),
(9, 'Beamer', 320.99, 'Intensive Farben, langlebige Markenbirne, geringer Stromverbrauch'),
(10, 'Leinwand', 22.99, 'Einrollbar, dicker und robuster Stoff, Testsieger 2021 in der Kategorie \"Büroartikel\" von Filzstift und Warentest'),
(11, 'Notizblock', 2.29, 'Recyceltes Papier, nachhaltig, sehr dich und reißfest');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `status`
--

CREATE TABLE `status` (
  `statusid` int(11) NOT NULL,
  `beschreibung` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `status`
--

INSERT INTO `status` (`statusid`, `beschreibung`) VALUES
(1, 'Wird bearbeitet'),
(2, 'Versendet'),
(3, 'In Zustellung'),
(4, 'Empfangen');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `bestellposition`
--
ALTER TABLE `bestellposition`
  ADD PRIMARY KEY (`auftragid`),
  ADD KEY `welcher_warenkorb` (`bestellung`),
  ADD KEY `welcher_status` (`status`);

--
-- Indizes für die Tabelle `bestelluebersicht`
--
ALTER TABLE `bestelluebersicht`
  ADD PRIMARY KEY (`bestellungsid`),
  ADD KEY `welches_produkt` (`produkt`),
  ADD KEY `welches_konto` (`konto`);

--
-- Indizes für die Tabelle `kunde`
--
ALTER TABLE `kunde`
  ADD PRIMARY KEY (`kundeid`);

--
-- Indizes für die Tabelle `kundenkonto`
--
ALTER TABLE `kundenkonto`
  ADD PRIMARY KEY (`kontoid`),
  ADD KEY `welcher_kunde` (`kunde`);

--
-- Indizes für die Tabelle `produkt`
--
ALTER TABLE `produkt`
  ADD PRIMARY KEY (`produktid`);

--
-- Indizes für die Tabelle `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`statusid`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `bestellposition`
--
ALTER TABLE `bestellposition`
  MODIFY `auftragid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT für Tabelle `bestelluebersicht`
--
ALTER TABLE `bestelluebersicht`
  MODIFY `bestellungsid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT für Tabelle `kunde`
--
ALTER TABLE `kunde`
  MODIFY `kundeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT für Tabelle `kundenkonto`
--
ALTER TABLE `kundenkonto`
  MODIFY `kontoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT für Tabelle `produkt`
--
ALTER TABLE `produkt`
  MODIFY `produktid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT für Tabelle `status`
--
ALTER TABLE `status`
  MODIFY `statusid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `bestellposition`
--
ALTER TABLE `bestellposition`
  ADD CONSTRAINT `welche_bestellung` FOREIGN KEY (`bestellung`) REFERENCES `bestelluebersicht` (`bestellungsid`),
  ADD CONSTRAINT `welcher_status` FOREIGN KEY (`status`) REFERENCES `status` (`statusid`);

--
-- Constraints der Tabelle `bestelluebersicht`
--
ALTER TABLE `bestelluebersicht`
  ADD CONSTRAINT `welches_konto` FOREIGN KEY (`konto`) REFERENCES `kundenkonto` (`kontoid`),
  ADD CONSTRAINT `welches_produkt` FOREIGN KEY (`produkt`) REFERENCES `produkt` (`produktid`);

--
-- Constraints der Tabelle `kundenkonto`
--
ALTER TABLE `kundenkonto`
  ADD CONSTRAINT `welcher_kunde` FOREIGN KEY (`kunde`) REFERENCES `kunde` (`kundeid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

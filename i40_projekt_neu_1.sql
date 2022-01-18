-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 18. Jan 2022 um 14:54
-- Server-Version: 10.4.20-MariaDB
-- PHP-Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `i40_projekt_neu`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bestellposition`
--

CREATE TABLE `bestellposition` (
  `auftragid` int(11) NOT NULL,
  `warenkorb` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kunde`
--

CREATE TABLE `kunde` (
  `kundeid` int(11) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `kunde`
--

INSERT INTO `kunde` (`kundeid`, `name`) VALUES
(1, 'Louis Kretschmer'),
(4, 'Artur Schwarzkopf'),
(5, 'Marcell Regel'),
(6, 'Maximilian Matysiok');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kundenkonto`
--

CREATE TABLE `kundenkonto` (
  `kontoid` int(11) NOT NULL,
  `kunde` int(11) NOT NULL,
  `benutzername` varchar(25) NOT NULL,
  `passwort` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'Flipchart', 40, 'Hochwertige, magnetische Flipchart, abwaschbar'),
(2, 'Bürostuhl', 134, 'Höhenverstellbar, Lendenstütze, verstellbare Armstützen, 3-Achsen vertsellbar'),
(3, 'Whiteboardmarker', 2, 'Verschiedene Farben, non-permantent, umweltfreundlich'),
(4, 'Flipchart', 40.99, 'Hochwertige, magnetische Flipchart, abwaschbar'),
(5, 'Bürostuhl', 134.49, 'Höhenverstellbar, Lendenstütze, verstellbare Armstützen, 3-Achsen vertsellbar'),
(6, 'Whiteboardmarker', 2.2, 'Verschiedene Farben, non-permantent, umweltfreundlich');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `status`
--

CREATE TABLE `status` (
  `statusid` int(11) NOT NULL,
  `beschreibung` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `warenkorb`
--

CREATE TABLE `warenkorb` (
  `warenkorbid` int(11) NOT NULL,
  `konto` int(11) NOT NULL,
  `produkt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `bestellposition`
--
ALTER TABLE `bestellposition`
  ADD PRIMARY KEY (`auftragid`),
  ADD KEY `welcher_warenkorb` (`warenkorb`),
  ADD KEY `welcher_status` (`status`);

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
-- Indizes für die Tabelle `warenkorb`
--
ALTER TABLE `warenkorb`
  ADD PRIMARY KEY (`warenkorbid`),
  ADD KEY `welches_produkt` (`produkt`),
  ADD KEY `welches_konto` (`konto`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `bestellposition`
--
ALTER TABLE `bestellposition`
  MODIFY `auftragid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `kunde`
--
ALTER TABLE `kunde`
  MODIFY `kundeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `kundenkonto`
--
ALTER TABLE `kundenkonto`
  MODIFY `kontoid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `produkt`
--
ALTER TABLE `produkt`
  MODIFY `produktid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `status`
--
ALTER TABLE `status`
  MODIFY `statusid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `warenkorb`
--
ALTER TABLE `warenkorb`
  MODIFY `warenkorbid` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `bestellposition`
--
ALTER TABLE `bestellposition`
  ADD CONSTRAINT `welcher_status` FOREIGN KEY (`status`) REFERENCES `status` (`statusid`),
  ADD CONSTRAINT `welcher_warenkorb` FOREIGN KEY (`warenkorb`) REFERENCES `warenkorb` (`warenkorbid`);

--
-- Constraints der Tabelle `kundenkonto`
--
ALTER TABLE `kundenkonto`
  ADD CONSTRAINT `welcher_kunde` FOREIGN KEY (`kunde`) REFERENCES `kunde` (`kundeid`);

--
-- Constraints der Tabelle `warenkorb`
--
ALTER TABLE `warenkorb`
  ADD CONSTRAINT `welches_konto` FOREIGN KEY (`konto`) REFERENCES `kundenkonto` (`kontoid`),
  ADD CONSTRAINT `welches_produkt` FOREIGN KEY (`produkt`) REFERENCES `produkt` (`produktid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

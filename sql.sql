-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 28 mrt 2018 om 21:52
-- Serverversie: 10.1.29-MariaDB
-- PHP-versie: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `infocaster`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `ervaring`
--

CREATE TABLE `ervaring` (
  `Ervaring_Id` int(11) NOT NULL,
  `Omschrijving` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `ervaring`
--

INSERT INTO `ervaring` (`Ervaring_Id`, `Omschrijving`) VALUES
(1, 'Heel erg goed'),
(2, 'Kan wel');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `expertise`
--

CREATE TABLE `expertise` (
  `Expertise_Id` int(11) NOT NULL,
  `Omschrijving` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `expertise`
--

INSERT INTO `expertise` (`Expertise_Id`, `Omschrijving`) VALUES
(2, 'Frontend'),
(3, 'Design');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `expertisegroep`
--

CREATE TABLE `expertisegroep` (
  `Expertisegroep_Id` int(11) NOT NULL,
  `Expertise_Id` int(11) NOT NULL,
  `Uren_Gewenst` int(11) NOT NULL,
  `Uren_Effectief` int(11) NOT NULL,
  `Karttrekker` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `expertisegroep`
--

INSERT INTO `expertisegroep` (`Expertisegroep_Id`, `Expertise_Id`, `Uren_Gewenst`, `Uren_Effectief`, `Karttrekker`) VALUES
(3, 3, 13, 13, 1),
(4, 2, 14, 14, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `expertisegroep_persoon`
--

CREATE TABLE `expertisegroep_persoon` (
  `Expertisegroep_Persoon_Id` int(11) NOT NULL,
  `Expertisegroep_Id` int(11) NOT NULL,
  `Pers_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `expertisegroep_persoon`
--

INSERT INTO `expertisegroep_persoon` (`Expertisegroep_Persoon_Id`, `Expertisegroep_Id`, `Pers_Id`) VALUES
(1, 3, 1),
(2, 3, 2),
(3, 4, 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `persoon`
--

CREATE TABLE `persoon` (
  `Pers_Id` int(11) NOT NULL,
  `Voornaam` varchar(255) NOT NULL,
  `Achternaam` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Wachtwoord` varchar(255) NOT NULL,
  `Salt` varchar(255) NOT NULL,
  `Adres` varchar(255) NOT NULL,
  `Postcode` varchar(10) NOT NULL,
  `Plaats` varchar(255) NOT NULL,
  `Land` varchar(255) NOT NULL,
  `Uren_per_week` int(11) NOT NULL,
  `Loon` decimal(65,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `persoon`
--

INSERT INTO `persoon` (`Pers_Id`, `Voornaam`, `Achternaam`, `Email`, `Wachtwoord`, `Salt`, `Adres`, `Postcode`, `Plaats`, `Land`, `Uren_per_week`, `Loon`) VALUES
(1, 'Stefan', 'Teunissen', 'stefanteunissen@gmail.com', 'pizza', 'pizza', 'Slinger 45', '6641DH', 'Nijmegen', 'Ierland', 40, '5000.40'),
(2, 'Thomas', 'van Minnen', 'thomasminnie@gmail.com', 'thomas', 'thomas', 'Thomas Edison 45', '8736OK', 'Apeldoorn', 'Israel', 2, '200.00'),
(3, 'Nino', 'Perez Vazquez', 'n.aino@hotmail.uk', '$2y$10$yruKZQ/9U72MwpxEUI2UwOAv1SqIGHz/2kKfMGVJa3VMtGWB5TssS', '', 'Mast 10', '6852 CG', 'Huissen', 'Spanje', 69, '420.00'),
(4, 'Thomas', 'Van Minnen', 'thomasminnie@gmail.com', '$2y$10$Tba0qw/sY2j0SVvkDdofVuvdP2N96qc8GzUw7xslfiWuliA08YScO', '', 'Negerstraat 69', '6666EE', 'Kronenburg', 'Italie', 8, '420.00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `persoon_skills_ervaring`
--

CREATE TABLE `persoon_skills_ervaring` (
  `Persoon_Skills_Ervaring_Id` int(11) NOT NULL,
  `Pers_Id` int(11) NOT NULL,
  `Skills_Id` int(11) NOT NULL,
  `Ervaring_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `persoon_skills_ervaring`
--

INSERT INTO `persoon_skills_ervaring` (`Persoon_Skills_Ervaring_Id`, `Pers_Id`, `Skills_Id`, `Ervaring_Id`) VALUES
(1, 1, 3, 1),
(2, 2, 3, 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `project`
--

CREATE TABLE `project` (
  `Project_Id` int(11) NOT NULL,
  `Naam` varchar(255) NOT NULL,
  `Owner` int(11) NOT NULL,
  `Organization` varchar(255) NOT NULL,
  `Phone` varchar(30) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Startdatum` date NOT NULL,
  `Deadline` datetime NOT NULL,
  `Prijs` decimal(65,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `project`
--

INSERT INTO `project` (`Project_Id`, `Naam`, `Owner`, `Organization`, `Phone`, `Email`, `Startdatum`, `Deadline`, `Prijs`) VALUES
(1, 'Testproject', 1, 'Environment.Exit();', '0246774867', 'environment@exit.nl', '2018-03-28', '2018-03-29 10:00:00', '500.00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `projectdetail`
--

CREATE TABLE `projectdetail` (
  `ProjectDetail_Id` int(11) NOT NULL,
  `Project_Id` int(11) NOT NULL,
  `Expertise_Id` int(11) NOT NULL,
  `Totaal_aantal_uren` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `projectdetail`
--

INSERT INTO `projectdetail` (`ProjectDetail_Id`, `Project_Id`, `Expertise_Id`, `Totaal_aantal_uren`) VALUES
(1, 1, 3, 30);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `projectdetail_skills`
--

CREATE TABLE `projectdetail_skills` (
  `ProjectDetail_Skills_Id` int(11) NOT NULL,
  `ProjectDetail_Id` int(11) NOT NULL,
  `Skill_Id` int(11) NOT NULL,
  `Aantal_uren` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `projectdetail_skills`
--

INSERT INTO `projectdetail_skills` (`ProjectDetail_Skills_Id`, `ProjectDetail_Id`, `Skill_Id`, `Aantal_uren`) VALUES
(1, 1, 3, 30);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `skill`
--

CREATE TABLE `skill` (
  `Skill_Id` int(11) NOT NULL,
  `Expertise_Id` int(11) NOT NULL,
  `Omschrijving` varchar(255) NOT NULL,
  `Prijs` decimal(65,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `skill`
--

INSERT INTO `skill` (`Skill_Id`, `Expertise_Id`, `Omschrijving`, `Prijs`) VALUES
(2, 3, 'Dreamweaver', '50.00'),
(3, 2, 'HTML/CSS', '50.00');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `ervaring`
--
ALTER TABLE `ervaring`
  ADD PRIMARY KEY (`Ervaring_Id`);

--
-- Indexen voor tabel `expertise`
--
ALTER TABLE `expertise`
  ADD PRIMARY KEY (`Expertise_Id`);

--
-- Indexen voor tabel `expertisegroep`
--
ALTER TABLE `expertisegroep`
  ADD PRIMARY KEY (`Expertisegroep_Id`),
  ADD KEY `Expertise_Id` (`Expertise_Id`);

--
-- Indexen voor tabel `expertisegroep_persoon`
--
ALTER TABLE `expertisegroep_persoon`
  ADD PRIMARY KEY (`Expertisegroep_Persoon_Id`),
  ADD KEY `Expertisegroep_Id` (`Expertisegroep_Id`),
  ADD KEY `Pers_Id` (`Pers_Id`);

--
-- Indexen voor tabel `persoon`
--
ALTER TABLE `persoon`
  ADD PRIMARY KEY (`Pers_Id`);

--
-- Indexen voor tabel `persoon_skills_ervaring`
--
ALTER TABLE `persoon_skills_ervaring`
  ADD PRIMARY KEY (`Persoon_Skills_Ervaring_Id`),
  ADD KEY `Pers_Id` (`Pers_Id`),
  ADD KEY `Skills_Id` (`Skills_Id`),
  ADD KEY `Ervaring_Id` (`Ervaring_Id`);

--
-- Indexen voor tabel `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`Project_Id`),
  ADD KEY `Owner` (`Owner`);

--
-- Indexen voor tabel `projectdetail`
--
ALTER TABLE `projectdetail`
  ADD PRIMARY KEY (`ProjectDetail_Id`),
  ADD KEY `Project` (`Project_Id`),
  ADD KEY `Expertise` (`Expertise_Id`);

--
-- Indexen voor tabel `projectdetail_skills`
--
ALTER TABLE `projectdetail_skills`
  ADD PRIMARY KEY (`ProjectDetail_Skills_Id`),
  ADD KEY `ProjectDetail` (`ProjectDetail_Id`),
  ADD KEY `Skill` (`Skill_Id`);

--
-- Indexen voor tabel `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`Skill_Id`),
  ADD KEY `Expertise_Id` (`Expertise_Id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `ervaring`
--
ALTER TABLE `ervaring`
  MODIFY `Ervaring_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `expertise`
--
ALTER TABLE `expertise`
  MODIFY `Expertise_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `expertisegroep`
--
ALTER TABLE `expertisegroep`
  MODIFY `Expertisegroep_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `expertisegroep_persoon`
--
ALTER TABLE `expertisegroep_persoon`
  MODIFY `Expertisegroep_Persoon_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `persoon`
--
ALTER TABLE `persoon`
  MODIFY `Pers_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `persoon_skills_ervaring`
--
ALTER TABLE `persoon_skills_ervaring`
  MODIFY `Persoon_Skills_Ervaring_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `project`
--
ALTER TABLE `project`
  MODIFY `Project_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `projectdetail`
--
ALTER TABLE `projectdetail`
  MODIFY `ProjectDetail_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `projectdetail_skills`
--
ALTER TABLE `projectdetail_skills`
  MODIFY `ProjectDetail_Skills_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `skill`
--
ALTER TABLE `skill`
  MODIFY `Skill_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `expertisegroep`
--
ALTER TABLE `expertisegroep`
  ADD CONSTRAINT `expertisegroep_ibfk_1` FOREIGN KEY (`Expertise_Id`) REFERENCES `expertise` (`Expertise_Id`);

--
-- Beperkingen voor tabel `expertisegroep_persoon`
--
ALTER TABLE `expertisegroep_persoon`
  ADD CONSTRAINT `expertisegroep_persoon_ibfk_1` FOREIGN KEY (`Expertisegroep_Id`) REFERENCES `expertisegroep` (`Expertisegroep_Id`),
  ADD CONSTRAINT `expertisegroep_persoon_ibfk_2` FOREIGN KEY (`Pers_Id`) REFERENCES `persoon` (`Pers_Id`);

--
-- Beperkingen voor tabel `persoon_skills_ervaring`
--
ALTER TABLE `persoon_skills_ervaring`
  ADD CONSTRAINT `persoon_skills_ervaring_ibfk_1` FOREIGN KEY (`Pers_Id`) REFERENCES `persoon` (`Pers_Id`),
  ADD CONSTRAINT `persoon_skills_ervaring_ibfk_2` FOREIGN KEY (`Skills_Id`) REFERENCES `skill` (`Skill_Id`),
  ADD CONSTRAINT `persoon_skills_ervaring_ibfk_3` FOREIGN KEY (`Ervaring_Id`) REFERENCES `ervaring` (`Ervaring_Id`);

--
-- Beperkingen voor tabel `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `Owner` FOREIGN KEY (`Owner`) REFERENCES `persoon` (`Pers_Id`);

--
-- Beperkingen voor tabel `projectdetail`
--
ALTER TABLE `projectdetail`
  ADD CONSTRAINT `Expertise` FOREIGN KEY (`Expertise_Id`) REFERENCES `expertise` (`Expertise_Id`),
  ADD CONSTRAINT `Project` FOREIGN KEY (`Project_Id`) REFERENCES `project` (`Project_Id`);

--
-- Beperkingen voor tabel `projectdetail_skills`
--
ALTER TABLE `projectdetail_skills`
  ADD CONSTRAINT `ProjectDetail` FOREIGN KEY (`ProjectDetail_Id`) REFERENCES `projectdetail` (`ProjectDetail_Id`),
  ADD CONSTRAINT `Skill` FOREIGN KEY (`Skill_Id`) REFERENCES `skill` (`Skill_Id`);

--
-- Beperkingen voor tabel `skill`
--
ALTER TABLE `skill`
  ADD CONSTRAINT `skill_ibfk_1` FOREIGN KEY (`Expertise_Id`) REFERENCES `expertise` (`Expertise_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

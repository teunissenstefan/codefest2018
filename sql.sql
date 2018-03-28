-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 29, 2018 at 01:43 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

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
-- Table structure for table `ervaring`
--

CREATE TABLE `ervaring` (
  `Ervaring_Id` int(11) NOT NULL,
  `Omschrijving` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ervaring`
--

INSERT INTO `ervaring` (`Ervaring_Id`, `Omschrijving`) VALUES
(3, 'Heel goed'),
(4, 'Beetje');

-- --------------------------------------------------------

--
-- Table structure for table `expertise`
--

CREATE TABLE `expertise` (
  `Expertise_Id` int(11) NOT NULL,
  `Omschrijving` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expertise`
--

INSERT INTO `expertise` (`Expertise_Id`, `Omschrijving`) VALUES
(4, 'Frontend'),
(5, 'Backend'),
(6, 'Design');

-- --------------------------------------------------------

--
-- Table structure for table `expertisegroep`
--

CREATE TABLE `expertisegroep` (
  `Expertisegroep_Id` int(11) NOT NULL,
  `Expertise_Id` int(11) NOT NULL,
  `Uren_Gewenst` int(11) NOT NULL,
  `Uren_Effectief` int(11) NOT NULL,
  `Karttrekker` tinyint(1) NOT NULL,
  `Omschrijving` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expertisegroep`
--

INSERT INTO `expertisegroep` (`Expertisegroep_Id`, `Expertise_Id`, `Uren_Gewenst`, `Uren_Effectief`, `Karttrekker`, `Omschrijving`) VALUES
(15, 4, 40, 40, 1, 'test'),
(16, 5, 12, 23, 0, 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `expertisegroep_persoon`
--

CREATE TABLE `expertisegroep_persoon` (
  `Expertisegroep_Persoon_Id` int(11) NOT NULL,
  `Expertisegroep_Id` int(11) NOT NULL,
  `Pers_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expertisegroep_persoon`
--

INSERT INTO `expertisegroep_persoon` (`Expertisegroep_Persoon_Id`, `Expertisegroep_Id`, `Pers_Id`) VALUES
(12, 16, 6),
(13, 15, 7),
(14, 15, 6);

-- --------------------------------------------------------

--
-- Table structure for table `persoon`
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
  `Loon` decimal(65,2) NOT NULL,
  `Rol_Id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persoon`
--

INSERT INTO `persoon` (`Pers_Id`, `Voornaam`, `Achternaam`, `Email`, `Wachtwoord`, `Salt`, `Adres`, `Postcode`, `Plaats`, `Land`, `Uren_per_week`, `Loon`, `Rol_Id`) VALUES
(6, 'stefan', 'teunissen', 'stefan@teunissen.nl', '$2y$10$lWAoIY9eoU0THov.S3cUUuIId7EUWsCjFEt1G8rztGRLSIlp/sHpC', '', 'slinger 45', '6641HD', 'nederland', 'beuningen', 40, '40.00', 1),
(7, 'admin', 'admin', 'admin@admin.admin', '$2y$10$UW6S1PtRf187xHCBfDXZxeFWXrwNI3trb6H.38/tqyW9/TC/q8v1i', '', 'admin', 'admin', 'admin', 'admin', 40, '40.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `persoon_rol`
--

CREATE TABLE `persoon_rol` (
  `Rol_Id` int(11) NOT NULL,
  `Rol` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persoon_rol`
--

INSERT INTO `persoon_rol` (`Rol_Id`, `Rol`) VALUES
(1, 'User'),
(2, 'Admin'),
(3, 'Kartrekker');

-- --------------------------------------------------------

--
-- Table structure for table `persoon_skills_ervaring`
--

CREATE TABLE `persoon_skills_ervaring` (
  `Persoon_Skills_Ervaring_Id` int(11) NOT NULL,
  `Pers_Id` int(11) NOT NULL,
  `Skills_Id` int(11) NOT NULL,
  `Ervaring_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persoon_skills_ervaring`
--

INSERT INTO `persoon_skills_ervaring` (`Persoon_Skills_Ervaring_Id`, `Pers_Id`, `Skills_Id`, `Ervaring_Id`) VALUES
(3, 6, 8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `project`
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
-- Dumping data for table `project`
--

INSERT INTO `project` (`Project_Id`, `Naam`, `Owner`, `Organization`, `Phone`, `Email`, `Startdatum`, `Deadline`, `Prijs`) VALUES
(2, 'Environment.Exit();', 6, 'Environment.Exit();', '0246579843', 'environmen@exit.nl', '2018-03-29', '2018-03-29 10:00:00', '5000.00');

-- --------------------------------------------------------

--
-- Table structure for table `projectdetail`
--

CREATE TABLE `projectdetail` (
  `ProjectDetail_Id` int(11) NOT NULL,
  `Project_Id` int(11) NOT NULL,
  `Expertise_Id` int(11) NOT NULL,
  `Totaal_aantal_uren` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projectdetail`
--

INSERT INTO `projectdetail` (`ProjectDetail_Id`, `Project_Id`, `Expertise_Id`, `Totaal_aantal_uren`) VALUES
(2, 2, 6, 30);

-- --------------------------------------------------------

--
-- Table structure for table `projectdetail_skills`
--

CREATE TABLE `projectdetail_skills` (
  `ProjectDetail_Skills_Id` int(11) NOT NULL,
  `ProjectDetail_Id` int(11) NOT NULL,
  `Skill_Id` int(11) NOT NULL,
  `Aantal_uren` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projectdetail_skills`
--

INSERT INTO `projectdetail_skills` (`ProjectDetail_Skills_Id`, `ProjectDetail_Id`, `Skill_Id`, `Aantal_uren`) VALUES
(2, 2, 4, 20);

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE `skill` (
  `Skill_Id` int(11) NOT NULL,
  `Expertise_Id` int(11) NOT NULL,
  `Omschrijving` varchar(255) NOT NULL,
  `Prijs` decimal(65,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skill`
--

INSERT INTO `skill` (`Skill_Id`, `Expertise_Id`, `Omschrijving`, `Prijs`) VALUES
(4, 6, 'Dreamweaver', '50.00'),
(7, 4, 'HTML/CSS', '50.00'),
(8, 5, 'PHP', '60.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ervaring`
--
ALTER TABLE `ervaring`
  ADD PRIMARY KEY (`Ervaring_Id`);

--
-- Indexes for table `expertise`
--
ALTER TABLE `expertise`
  ADD PRIMARY KEY (`Expertise_Id`);

--
-- Indexes for table `expertisegroep`
--
ALTER TABLE `expertisegroep`
  ADD PRIMARY KEY (`Expertisegroep_Id`),
  ADD KEY `Expertise_Id` (`Expertise_Id`);

--
-- Indexes for table `expertisegroep_persoon`
--
ALTER TABLE `expertisegroep_persoon`
  ADD PRIMARY KEY (`Expertisegroep_Persoon_Id`),
  ADD KEY `Expertisegroep_Id` (`Expertisegroep_Id`),
  ADD KEY `Pers_Id` (`Pers_Id`);

--
-- Indexes for table `persoon`
--
ALTER TABLE `persoon`
  ADD PRIMARY KEY (`Pers_Id`),
  ADD KEY `Rol_Id` (`Rol_Id`);

--
-- Indexes for table `persoon_rol`
--
ALTER TABLE `persoon_rol`
  ADD PRIMARY KEY (`Rol_Id`);

--
-- Indexes for table `persoon_skills_ervaring`
--
ALTER TABLE `persoon_skills_ervaring`
  ADD PRIMARY KEY (`Persoon_Skills_Ervaring_Id`),
  ADD KEY `Pers_Id` (`Pers_Id`),
  ADD KEY `Skills_Id` (`Skills_Id`),
  ADD KEY `Ervaring_Id` (`Ervaring_Id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`Project_Id`),
  ADD KEY `Owner` (`Owner`);

--
-- Indexes for table `projectdetail`
--
ALTER TABLE `projectdetail`
  ADD PRIMARY KEY (`ProjectDetail_Id`),
  ADD KEY `Project` (`Project_Id`),
  ADD KEY `Expertise` (`Expertise_Id`);

--
-- Indexes for table `projectdetail_skills`
--
ALTER TABLE `projectdetail_skills`
  ADD PRIMARY KEY (`ProjectDetail_Skills_Id`),
  ADD KEY `ProjectDetail` (`ProjectDetail_Id`),
  ADD KEY `Skill` (`Skill_Id`);

--
-- Indexes for table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`Skill_Id`),
  ADD KEY `Expertise_Id` (`Expertise_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ervaring`
--
ALTER TABLE `ervaring`
  MODIFY `Ervaring_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `expertise`
--
ALTER TABLE `expertise`
  MODIFY `Expertise_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `expertisegroep`
--
ALTER TABLE `expertisegroep`
  MODIFY `Expertisegroep_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `expertisegroep_persoon`
--
ALTER TABLE `expertisegroep_persoon`
  MODIFY `Expertisegroep_Persoon_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `persoon`
--
ALTER TABLE `persoon`
  MODIFY `Pers_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `persoon_rol`
--
ALTER TABLE `persoon_rol`
  MODIFY `Rol_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `persoon_skills_ervaring`
--
ALTER TABLE `persoon_skills_ervaring`
  MODIFY `Persoon_Skills_Ervaring_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `Project_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `projectdetail`
--
ALTER TABLE `projectdetail`
  MODIFY `ProjectDetail_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `projectdetail_skills`
--
ALTER TABLE `projectdetail_skills`
  MODIFY `ProjectDetail_Skills_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `skill`
--
ALTER TABLE `skill`
  MODIFY `Skill_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `expertisegroep`
--
ALTER TABLE `expertisegroep`
  ADD CONSTRAINT `expertisegroep_ibfk_1` FOREIGN KEY (`Expertise_Id`) REFERENCES `expertise` (`Expertise_Id`);

--
-- Constraints for table `expertisegroep_persoon`
--
ALTER TABLE `expertisegroep_persoon`
  ADD CONSTRAINT `expertisegroep_persoon_ibfk_1` FOREIGN KEY (`Expertisegroep_Id`) REFERENCES `expertisegroep` (`Expertisegroep_Id`),
  ADD CONSTRAINT `expertisegroep_persoon_ibfk_2` FOREIGN KEY (`Pers_Id`) REFERENCES `persoon` (`Pers_Id`);

--
-- Constraints for table `persoon`
--
ALTER TABLE `persoon`
  ADD CONSTRAINT `persoon_ibfk_1` FOREIGN KEY (`Rol_Id`) REFERENCES `persoon_rol` (`Rol_Id`);

--
-- Constraints for table `persoon_skills_ervaring`
--
ALTER TABLE `persoon_skills_ervaring`
  ADD CONSTRAINT `persoon_skills_ervaring_ibfk_1` FOREIGN KEY (`Pers_Id`) REFERENCES `persoon` (`Pers_Id`),
  ADD CONSTRAINT `persoon_skills_ervaring_ibfk_2` FOREIGN KEY (`Skills_Id`) REFERENCES `skill` (`Skill_Id`),
  ADD CONSTRAINT `persoon_skills_ervaring_ibfk_3` FOREIGN KEY (`Ervaring_Id`) REFERENCES `ervaring` (`Ervaring_Id`);

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `Owner` FOREIGN KEY (`Owner`) REFERENCES `persoon` (`Pers_Id`);

--
-- Constraints for table `projectdetail`
--
ALTER TABLE `projectdetail`
  ADD CONSTRAINT `Expertise` FOREIGN KEY (`Expertise_Id`) REFERENCES `expertise` (`Expertise_Id`),
  ADD CONSTRAINT `Project` FOREIGN KEY (`Project_Id`) REFERENCES `project` (`Project_Id`);

--
-- Constraints for table `projectdetail_skills`
--
ALTER TABLE `projectdetail_skills`
  ADD CONSTRAINT `ProjectDetail` FOREIGN KEY (`ProjectDetail_Id`) REFERENCES `projectdetail` (`ProjectDetail_Id`),
  ADD CONSTRAINT `Skill` FOREIGN KEY (`Skill_Id`) REFERENCES `skill` (`Skill_Id`);

--
-- Constraints for table `skill`
--
ALTER TABLE `skill`
  ADD CONSTRAINT `skill_ibfk_1` FOREIGN KEY (`Expertise_Id`) REFERENCES `expertise` (`Expertise_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

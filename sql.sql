-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 28, 2018 at 11:09 AM
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
-- Table structure for table `Ervaring`
--

CREATE TABLE `Ervaring` (
  `Ervaring_Id` int(11) NOT NULL,
  `Omschrijving` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Expertise`
--

CREATE TABLE `Expertise` (
  `Expertise_Id` int(11) NOT NULL,
  `Omschrijving` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Expertisegroep`
--

CREATE TABLE `Expertisegroep` (
  `Expertisegroep_Id` int(11) NOT NULL,
  `Expertise_Id` int(11) NOT NULL,
  `Pers_Id` int(11) NOT NULL,
  `Uren_Gewenst` int(11) NOT NULL,
  `Uren_Effectief` int(11) NOT NULL,
  `Karttrekker` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Persoon`
--

CREATE TABLE `Persoon` (
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

-- --------------------------------------------------------

--
-- Table structure for table `Persoon_Skills_Ervaring`
--

CREATE TABLE `Persoon_Skills_Ervaring` (
  `Persoon_Skills_Ervaring_Id` int(11) NOT NULL,
  `Pers_Id` int(11) NOT NULL,
  `Skills_Id` int(11) NOT NULL,
  `Ervaring_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Project`
--

CREATE TABLE `Project` (
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

-- --------------------------------------------------------

--
-- Table structure for table `ProjectDetail`
--

CREATE TABLE `ProjectDetail` (
  `ProjectDetail_Id` int(11) NOT NULL,
  `Project_Id` int(11) NOT NULL,
  `Expertise_Id` int(11) NOT NULL,
  `Totaal_aantal_uren` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ProjectDetail_Skills`
--

CREATE TABLE `ProjectDetail_Skills` (
  `ProjectDetail_Skills_Id` int(11) NOT NULL,
  `ProjectDetail_Id` int(11) NOT NULL,
  `Skill_Id` int(11) NOT NULL,
  `Aantal_uren` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Skill`
--

CREATE TABLE `Skill` (
  `Skill_Id` int(11) NOT NULL,
  `Expertise_Id` int(11) NOT NULL,
  `Omschrijving` varchar(255) NOT NULL,
  `Prijs` decimal(65,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Ervaring`
--
ALTER TABLE `Ervaring`
  ADD PRIMARY KEY (`Ervaring_Id`);

--
-- Indexes for table `Expertise`
--
ALTER TABLE `Expertise`
  ADD PRIMARY KEY (`Expertise_Id`);

--
-- Indexes for table `Expertisegroep`
--
ALTER TABLE `Expertisegroep`
  ADD PRIMARY KEY (`Expertisegroep_Id`),
  ADD KEY `Persoon` (`Pers_Id`),
  ADD KEY `Expertise_Id` (`Expertise_Id`);

--
-- Indexes for table `Persoon`
--
ALTER TABLE `Persoon`
  ADD PRIMARY KEY (`Pers_Id`);

--
-- Indexes for table `Persoon_Skills_Ervaring`
--
ALTER TABLE `Persoon_Skills_Ervaring`
  ADD PRIMARY KEY (`Persoon_Skills_Ervaring_Id`),
  ADD KEY `Pers_Id` (`Pers_Id`),
  ADD KEY `Skills_Id` (`Skills_Id`),
  ADD KEY `Ervaring_Id` (`Ervaring_Id`);

--
-- Indexes for table `Project`
--
ALTER TABLE `Project`
  ADD PRIMARY KEY (`Project_Id`),
  ADD KEY `Owner` (`Owner`);

--
-- Indexes for table `ProjectDetail`
--
ALTER TABLE `ProjectDetail`
  ADD PRIMARY KEY (`ProjectDetail_Id`),
  ADD KEY `Project` (`Project_Id`),
  ADD KEY `Expertise` (`Expertise_Id`);

--
-- Indexes for table `ProjectDetail_Skills`
--
ALTER TABLE `ProjectDetail_Skills`
  ADD PRIMARY KEY (`ProjectDetail_Skills_Id`),
  ADD KEY `ProjectDetail` (`ProjectDetail_Id`),
  ADD KEY `Skill` (`Skill_Id`);

--
-- Indexes for table `Skill`
--
ALTER TABLE `Skill`
  ADD PRIMARY KEY (`Skill_Id`),
  ADD KEY `Expertise_Id` (`Expertise_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Ervaring`
--
ALTER TABLE `Ervaring`
  MODIFY `Ervaring_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Expertise`
--
ALTER TABLE `Expertise`
  MODIFY `Expertise_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Expertisegroep`
--
ALTER TABLE `Expertisegroep`
  MODIFY `Expertisegroep_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Persoon`
--
ALTER TABLE `Persoon`
  MODIFY `Pers_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Persoon_Skills_Ervaring`
--
ALTER TABLE `Persoon_Skills_Ervaring`
  MODIFY `Persoon_Skills_Ervaring_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Project`
--
ALTER TABLE `Project`
  MODIFY `Project_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ProjectDetail`
--
ALTER TABLE `ProjectDetail`
  MODIFY `ProjectDetail_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ProjectDetail_Skills`
--
ALTER TABLE `ProjectDetail_Skills`
  MODIFY `ProjectDetail_Skills_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Skill`
--
ALTER TABLE `Skill`
  MODIFY `Skill_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Expertisegroep`
--
ALTER TABLE `Expertisegroep`
  ADD CONSTRAINT `Expertisegroep_ibfk_1` FOREIGN KEY (`Expertise_Id`) REFERENCES `Expertise` (`Expertise_Id`),
  ADD CONSTRAINT `Persoon` FOREIGN KEY (`Pers_Id`) REFERENCES `Persoon` (`Pers_Id`);

--
-- Constraints for table `Persoon_Skills_Ervaring`
--
ALTER TABLE `Persoon_Skills_Ervaring`
  ADD CONSTRAINT `Persoon_Skills_Ervaring_ibfk_1` FOREIGN KEY (`Pers_Id`) REFERENCES `Persoon` (`Pers_Id`),
  ADD CONSTRAINT `Persoon_Skills_Ervaring_ibfk_2` FOREIGN KEY (`Skills_Id`) REFERENCES `Skill` (`Skill_Id`),
  ADD CONSTRAINT `Persoon_Skills_Ervaring_ibfk_3` FOREIGN KEY (`Ervaring_Id`) REFERENCES `Ervaring` (`Ervaring_Id`);

--
-- Constraints for table `Project`
--
ALTER TABLE `Project`
  ADD CONSTRAINT `Owner` FOREIGN KEY (`Owner`) REFERENCES `Persoon` (`Pers_Id`);

--
-- Constraints for table `ProjectDetail`
--
ALTER TABLE `ProjectDetail`
  ADD CONSTRAINT `Expertise` FOREIGN KEY (`Expertise_Id`) REFERENCES `Expertise` (`Expertise_Id`),
  ADD CONSTRAINT `Project` FOREIGN KEY (`Project_Id`) REFERENCES `Project` (`Project_Id`);

--
-- Constraints for table `ProjectDetail_Skills`
--
ALTER TABLE `ProjectDetail_Skills`
  ADD CONSTRAINT `ProjectDetail` FOREIGN KEY (`ProjectDetail_Id`) REFERENCES `ProjectDetail` (`ProjectDetail_Id`),
  ADD CONSTRAINT `Skill` FOREIGN KEY (`Skill_Id`) REFERENCES `Skill` (`Skill_Id`);

--
-- Constraints for table `Skill`
--
ALTER TABLE `Skill`
  ADD CONSTRAINT `Skill_ibfk_1` FOREIGN KEY (`Expertise_Id`) REFERENCES `Expertise` (`Expertise_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

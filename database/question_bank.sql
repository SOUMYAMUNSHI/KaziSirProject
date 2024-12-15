-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2024 at 10:51 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `question_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `chapter`
--

CREATE TABLE `chapter` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `ChCode` varchar(15) NOT NULL,
  `SubCode` varchar(10) NOT NULL,
  `ChName` varchar(25) NOT NULL,
  `ChDes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `Login_ID` varchar(255) NOT NULL,
  `Password` char(255) NOT NULL,
  `In_Time` varchar(20) DEFAULT NULL,
  `Out_Time` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `Login_ID`, `Password`, `In_Time`, `Out_Time`) VALUES
(1, '$2y$10$r.AdAFUE3P6GtL8f7v8oOupr/lq3yRuh6CF2lavPcSA8GIVa9SEO.', '$2y$10$6Fv9OFBgFJBs/BLXcIiML.jJEG50WddJyy62ON4BKi4WpX7XvHXiy', '2024-12-14 22:07:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `qa_laq`
--

CREATE TABLE `qa_laq` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `QuestionCode` varchar(30) NOT NULL,
  `TopicCode` varchar(20) NOT NULL,
  `Question` text NOT NULL,
  `ImageLink` varchar(255) DEFAULT NULL,
  `Answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `qa_mcq`
--

CREATE TABLE `qa_mcq` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `QuestionCode` varchar(30) NOT NULL,
  `TopicCode` varchar(20) NOT NULL,
  `Question` text NOT NULL,
  `ImageLink` varchar(255) DEFAULT NULL,
  `Op1` varchar(75) NOT NULL,
  `Op2` varchar(75) NOT NULL,
  `Op3` varchar(75) NOT NULL,
  `Op4` varchar(75) NOT NULL,
  `Answer` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `qa_saq`
--

CREATE TABLE `qa_saq` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `QuestionCode` varchar(30) NOT NULL,
  `TopicCode` varchar(20) NOT NULL,
  `Question` text NOT NULL,
  `ImageLink` varchar(255) DEFAULT NULL,
  `Answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `SubCode` varchar(10) NOT NULL,
  `SubName` varchar(40) NOT NULL,
  `SubDes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `TopicCode` varchar(20) NOT NULL,
  `ChCode` varchar(15) NOT NULL,
  `TopicName` varchar(30) NOT NULL,
  `TopicDes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`ChCode`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD KEY `SubCode` (`SubCode`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Login_ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `qa_laq`
--
ALTER TABLE `qa_laq`
  ADD PRIMARY KEY (`QuestionCode`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD KEY `TopicCode` (`TopicCode`);

--
-- Indexes for table `qa_mcq`
--
ALTER TABLE `qa_mcq`
  ADD PRIMARY KEY (`QuestionCode`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD KEY `TopicCode` (`TopicCode`);

--
-- Indexes for table `qa_saq`
--
ALTER TABLE `qa_saq`
  ADD PRIMARY KEY (`QuestionCode`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD KEY `TopicCode` (`TopicCode`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`SubCode`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`TopicCode`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD KEY `ChCode` (`ChCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chapter`
--
ALTER TABLE `chapter`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `qa_laq`
--
ALTER TABLE `qa_laq`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qa_mcq`
--
ALTER TABLE `qa_mcq`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qa_saq`
--
ALTER TABLE `qa_saq`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chapter`
--
ALTER TABLE `chapter`
  ADD CONSTRAINT `chapter_ibfk_1` FOREIGN KEY (`SubCode`) REFERENCES `subject` (`SubCode`);

--
-- Constraints for table `qa_laq`
--
ALTER TABLE `qa_laq`
  ADD CONSTRAINT `qa_laq_ibfk_1` FOREIGN KEY (`TopicCode`) REFERENCES `topic` (`TopicCode`);

--
-- Constraints for table `qa_mcq`
--
ALTER TABLE `qa_mcq`
  ADD CONSTRAINT `qa_mcq_ibfk_1` FOREIGN KEY (`TopicCode`) REFERENCES `topic` (`TopicCode`);

--
-- Constraints for table `qa_saq`
--
ALTER TABLE `qa_saq`
  ADD CONSTRAINT `qa_saq_ibfk_1` FOREIGN KEY (`TopicCode`) REFERENCES `topic` (`TopicCode`);

--
-- Constraints for table `topic`
--
ALTER TABLE `topic`
  ADD CONSTRAINT `topic_ibfk_1` FOREIGN KEY (`ChCode`) REFERENCES `chapter` (`ChCode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

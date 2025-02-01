-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2025 at 05:05 PM
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

--
-- Dumping data for table `chapter`
--

INSERT INTO `chapter` (`ID`, `ChCode`, `SubCode`, `ChName`, `ChDes`) VALUES
(1, 'DSTree', 'DS1', 'Tree', NULL),
(3, 'HEMC 1', 'DS 2', 'Business', NULL),
(2, 'NFA 2', 'DS 2', 'NFA', NULL),
(4, 'ORG 1', 'TOC 3', 'Memory', NULL);

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
(1, '$2y$10$r.AdAFUE3P6GtL8f7v8oOupr/lq3yRuh6CF2lavPcSA8GIVa9SEO.', '$2y$10$6Fv9OFBgFJBs/BLXcIiML.jJEG50WddJyy62ON4BKi4WpX7XvHXiy', '2025-02-01 21:23:45', NULL);

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

--
-- Dumping data for table `qa_laq`
--

INSERT INTO `qa_laq` (`ID`, `QuestionCode`, `TopicCode`, `Question`, `ImageLink`, `Answer`) VALUES
(3, 'LAQ0', 'T2', 'aa', 'NULL', 'n'),
(4, 'SAQ4', 'T2', 'Hello', 'NULL', '<p><strong>H</strong></p>'),
(5, 'SAQ5', 'T2', 'What is Virtual Memory?', 'NULL', '<h1><strong>Virtual memory is a memory management technique that allows a computer to use a portion of the hard drive (or SSD) as temporary RAM. It helps run large applications smoothly by swapping data between RAM and disk storage when physical RAM is full. This prevents system crashes and improves multitasking.</strong></h1><p><br></p><p><strong><em> Virtual memory is a memory management technique that allows a computer to use a portion of the hard drive (or SSD) as temporary RAM. It helps run large applications smoothly by swapping data between RAM and disk storage when physical RAM is full. This prevents system crashes and improves multitasking.</em></strong></p>'),
(6, 'SAQ6', 'T2', 'What is Virtual Memory?', 'NULL', '<p><strong>&lt;?php</strong></p><p><strong>// Database Connection</strong></p><p><strong>$pdo_conn = new PDO(\"mysql:host=localhost;dbname=your_database\", \"username\", \"password\");</strong></p><p><strong>$pdo_conn-&gt;setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);</strong></p><p><br></p><p><strong>// Table &amp; Subject Values</strong></p><p><strong>$allowed_tables = [\'qa_mcq\', \'qa_short\', \'qa_truefalse\']; // Allowed table names</strong></p><p><strong>$question_type = \'qa_mcq\'; // Example table name</strong></p><p><strong>$subject = \'SUB123\'; // Example SubCode</strong></p><p><br></p><p><strong>// Validate Table Name</strong></p><p><strong>if (!in_array($question_type, $allowed_tables)) {</strong></p><p><strong>&nbsp;&nbsp;die(\"Invalid table name!\"); // Prevent SQL Injection</strong></p><p><strong>}</strong></p><p><br></p><p><strong>// Prepare SQL Query (without binding table name)</strong></p><p><strong>$sql = \"SELECT * FROM `$question_type`&nbsp;</strong></p><p><strong>&nbsp;&nbsp;&nbsp;&nbsp;WHERE `TopicCode` IN (</strong></p><p><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SELECT `TopicCode` FROM `topic`&nbsp;</strong></p><p><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;WHERE `ChCode` IN (</strong></p><p><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SELECT `ChCode` FROM `chapter`&nbsp;</strong></p><p><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;WHERE `SubCode` = :subCode</strong></p><p><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</strong></p><p><strong>&nbsp;&nbsp;&nbsp;&nbsp;)\";</strong></p><p><br></p><p><strong>$stmt = $pdo_conn-&gt;prepare($sql);</strong></p><p><strong>$stmt-&gt;bindParam(\':subCode\', $subject, PDO::PARAM_STR);</strong></p><p><strong>$stmt-&gt;execute();</strong></p><p><br></p><p><strong>// Fetch Data</strong></p><p><strong>$data = $stmt-&gt;fetchAll(PDO::FETCH_ASSOC);</strong></p><p><br></p><p><strong>// Display Data</strong></p><p><strong>if (!empty($data)) {</strong></p><p><strong>&nbsp;&nbsp;foreach ($data as $row) {</strong></p><p><strong>&nbsp;&nbsp;&nbsp;&nbsp;echo \"Question ID: \" . $row[\'ID\'] . \" | Question: \" . $row[\'Question\'] . \"&lt;br&gt;\";</strong></p><p><strong>&nbsp;&nbsp;}</strong></p><p><strong>} else {</strong></p><p><strong>&nbsp;&nbsp;echo \"No data found!\";</strong></p><p><strong>}</strong></p><p><strong>?&gt;</strong></p><p><br></p>'),
(7, 'SAQ7', 'T2', 'What is Virtual Memory?', 'NULL', '<h1><span style=\"background-color: rgb(255, 255, 255); color: rgb(33, 32, 28);\">CDN builds expose&nbsp;</span><code style=\"background-color: rgb(241, 241, 241); color: rgb(33, 32, 28);\">Quill</code><span style=\"background-color: rgb(255, 255, 255); color: rgb(33, 32, 28);\">&nbsp;to the global&nbsp;</span><code style=\"background-color: rgb(241, 241, 241); color: rgb(33, 32, 28);\">window</code><span style=\"background-color: rgb(255, 255, 255); color: rgb(33, 32, 28);\">&nbsp;object.&nbsp;</span><code style=\"background-color: rgb(241, 241, 241); color: rgb(33, 32, 28);\">Quill</code><span style=\"background-color: rgb(255, 255, 255); color: rgb(33, 32, 28);\">&nbsp;provides an&nbsp;</span><code style=\"background-color: rgb(241, 241, 241); color: var(--accent-a11);\"><a href=\"https://quilljs.com/docs/api#import\" target=\"_blank\">import()</a></code><span style=\"background-color: rgb(255, 255, 255); color: rgb(33, 32, 28);\">&nbsp;method for </span><em style=\"background-color: rgb(255, 255, 255); color: rgb(33, 32, 28);\">accessing components of the Quill library, including its formats, modules, or themes.</em></h1><ol><li><span style=\"background-color: rgb(255, 255, 255); color: rgb(33, 32, 28);\">If your project uses bundlers such as&nbsp;</span><a href=\"https://webpack.js.org/\" target=\"_blank\" style=\"background-color: rgb(255, 255, 255); color: var(--accent-a11);\">Webpack</a><span style=\"background-color: rgb(255, 255, 255); color: rgb(33, 32, 28);\">&nbsp;or&nbsp;</span><a href=\"https://vitejs.dev/\" target=\"_blank\" style=\"background-color: rgb(255, 255, 255); color: var(--accent-a11);\">Vite</a><span style=\"background-color: rgb(255, 255, 255); color: rgb(33, 32, 28);\">, it\'s recommended to install Quill via&nbsp;</span><a href=\"https://www.npmjs.com/\" target=\"_blank\" style=\"background-color: rgb(255, 255, 255); color: var(--accent-a11);\">npm</a><span style=\"background-color: rgb(255, 255, 255); color: rgb(33, 32, 28);\">.</span></li><li><span style=\"background-color: rgb(255, 255, 255); color: rgb(33, 32, 28);\">If your project uses bundlers such as&nbsp;</span><a href=\"https://webpack.js.org/\" target=\"_blank\" style=\"background-color: rgb(255, 255, 255); color: var(--accent-a11);\">Webpack</a><span style=\"background-color: rgb(255, 255, 255); color: rgb(33, 32, 28);\">&nbsp;or&nbsp;</span><a href=\"https://vitejs.dev/\" target=\"_blank\" style=\"background-color: rgb(255, 255, 255); color: var(--accent-a11);\">Vite</a><span style=\"background-color: rgb(255, 255, 255); color: rgb(33, 32, 28);\">, it\'s </span><a href=\"https://github.com/\" target=\"_blank\" style=\"background-color: rgb(255, 255, 255); color: rgb(33, 32, 28);\">recommended </a><span style=\"background-color: rgb(255, 255, 255); color: rgb(33, 32, 28);\">to install Quill via&nbsp;</span><a href=\"https://www.npmjs.com/\" target=\"_blank\" style=\"background-color: rgb(255, 255, 255); color: var(--accent-a11);\">npm</a><span style=\"background-color: rgb(255, 255, 255); color: rgb(33, 32, 28);\">.</span></li></ol><p><a href=\"https://github.com/\" target=\"_blank\" style=\"background-color: rgb(255, 255, 255); color: rgb(33, 32, 28);\"><u>If your project uses bundlers such as&nbsp;</u></a><a href=\"https://github.com/\" target=\"_blank\" style=\"background-color: rgb(255, 255, 255); color: var(--accent-a11);\"><u>Webpack</u></a><a href=\"https://github.com/\" target=\"_blank\" style=\"background-color: rgb(255, 255, 255); color: rgb(33, 32, 28);\"><u>&nbsp;or&nbsp;</u></a><a href=\"https://github.com/\" target=\"_blank\" style=\"background-color: rgb(255, 255, 255); color: var(--accent-a11);\"><u>Vite</u></a><a href=\"https://github.com/\" target=\"_blank\" style=\"background-color: rgb(255, 255, 255); color: rgb(33, 32, 28);\"><u>, it\'s recommended to install Quill via&nbsp;</u></a><a href=\"https://github.com/\" target=\"_blank\" style=\"background-color: rgb(255, 255, 255); color: var(--accent-a11);\"><u>npm</u></a><a href=\"https://github.com/\" target=\"_blank\" style=\"background-color: rgb(255, 255, 255); color: rgb(33, 32, 28);\"><u>.</u></a></p><p><br></p><ul><li>https://github.com/</li></ul>'),
(8, 'SAQ8', 'T2', 'What is Virtual Memory?', 'NULL', '<h1><strong><u>Virtual memory</u></strong></h1><p><strong>is</strong>&nbsp;<u>a</u> <em>memory</em> management technique </p><ol><li>that uses a computer\'s hard disk to </li><li>extend the amount of physical memory.</li></ol><ul><li>&nbsp;It\'s a built-in feature of most modern computers</li></ul>');

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

--
-- Dumping data for table `qa_mcq`
--

INSERT INTO `qa_mcq` (`ID`, `QuestionCode`, `TopicCode`, `Question`, `ImageLink`, `Op1`, `Op2`, `Op3`, `Op4`, `Answer`) VALUES
(28, 'MCQ0', 'T2', 'Hello', 'NULL', 'Option 1', 'Option 2', 'Option 3', 'Option 4', 'Option 1'),
(29, 'MCQ29', 'T2', 'Hello', 'NULL', 'Option 1', 'Option 2', 'Option 3', 'Option 4', 'Option 1'),
(30, 'MCQ30', 'T1', 'Hello', 'NULL', 'Option 1', 'Option 2', 'Option 3', 'Option 4', 'Option 1'),
(31, 'MCQ31', 'T2', 'What is Virtual Memory?', 'NULL', 'Option 1', 'Option 2', 'Option 3', 'Option 4', 'Option 1');

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

--
-- Dumping data for table `qa_saq`
--

INSERT INTO `qa_saq` (`ID`, `QuestionCode`, `TopicCode`, `Question`, `ImageLink`, `Answer`) VALUES
(5, 'SAQ0', 'T1', 'Hello', 'NULL', 'h'),
(6, 'SAQ6', 'T1', 'Hello', 'NULL', 'n'),
(7, 'SAQ7', 'T2', 'What is Virtual Memory?', 'NULL', '<p>Virtual memory is a memory management technique that allows a computer to use a portion of the hard drive (or SSD) as temporary RAM. It helps run large applications smoothly by swapping data between RAM and disk storage when physical RAM is full. This prevents system crashes and improves multitasking.</p>');

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

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`ID`, `SubCode`, `SubName`, `SubDes`) VALUES
(4, 'DS 2', 'Entrepreneurship', NULL),
(1, 'DS1', 'Data Structure', NULL),
(3, 'TOC 3', 'Computer Organization', NULL),
(2, 'TOC2', 'Theory Of Computation', NULL),
(5, 'TOC3', 'Theory Of Computation2', NULL);

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
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`ID`, `TopicCode`, `ChCode`, `TopicName`, `TopicDes`) VALUES
(4, 'M1', 'ORG 1', 'M2', NULL),
(1, 'T1', 'DSTree', 'Binary Tee', NULL),
(2, 'T2', 'HEMC 1', 'Business', NULL);

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
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `qa_laq`
--
ALTER TABLE `qa_laq`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `qa_mcq`
--
ALTER TABLE `qa_mcq`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `qa_saq`
--
ALTER TABLE `qa_saq`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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

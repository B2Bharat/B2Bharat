-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 23, 2017 at 10:04 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `b2bharat_b2bharatdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

DROP TABLE IF EXISTS `language`;
CREATE TABLE IF NOT EXISTS `language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `active_status` int(3) NOT NULL DEFAULT '0',
  `usercre` varchar(255) DEFAULT '',
  `userchng` varchar(255) DEFAULT NULL,
  `crcdt` int(14) NOT NULL DEFAULT '0',
  `chngdt` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=104 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `name`, `active_status`, `usercre`, `userchng`, `crcdt`, `chngdt`) VALUES
(1, 'Hindi', 1, 'admin', NULL, 1474036163, 0),
(2, 'English', 1, 'admin', NULL, 1474036182, 0),
(3, 'Urdu', 1, 'admin', NULL, 1474036194, 0),
(4, 'Panjabi', 1, 'admin', NULL, 1474036216, 0),
(5, 'Bengali', 1, 'admin', NULL, 1474036230, 0),
(6, 'Gujarati', 1, 'admin', NULL, 1474036249, 0),
(7, 'Marathi', 1, 'admin', NULL, 1474036262, 0),
(8, 'Kannad', 1, 'admin', NULL, 1474036276, 0),
(9, 'Telugu', 1, 'admin', NULL, 1474036293, 0),
(10, 'Tamil', 1, 'admin', NULL, 1474036318, 0),
(11, 'Malayalam', 1, 'admin', NULL, 1474036331, 0),
(12, 'german', 1, 'admin', NULL, 1474036343, 0),
(13, 'Russian', 1, 'admin', NULL, 1474036360, 0),
(14, 'Spanish', 1, 'admin', NULL, 1474036393, 0),
(15, 'French', 1, 'admin', NULL, 1474036421, 0),
(16, 'Chinese', 1, 'admin', NULL, 1474036433, 0),
(17, 'Japenese', 1, 'admin', NULL, 1474036468, 0),
(18, 'Korean', 1, 'admin', NULL, 1474036486, 0),
(19, 'Portuaguese', 1, 'admin', NULL, 1474036508, 0),
(20, 'Arabic', 1, 'admin', NULL, 1474036523, 0),
(21, 'Dutch', 1, 'admin', NULL, 1474036531, 0),
(22, 'Italian', 1, 'admin', NULL, 1474036554, 0),
(23, 'Polish', 1, 'admin', NULL, 1474036571, 0),
(24, 'parsian', 1, 'admin', NULL, 1474036584, 0),
(25, 'Thai', 1, 'admin', NULL, 1474036630, 0),
(26, 'Finnish', 1, 'admin', NULL, 1474036647, 0),
(27, 'French', 1, 'admin', NULL, 1474036663, 0),
(28, 'Galician', 1, 'admin', NULL, 1474036681, 0),
(29, 'Georgian', 1, 'admin', NULL, 1474036708, 0),
(30, 'German', 1, 'admin', NULL, 1474036725, 0),
(31, 'Greek', 1, 'admin', NULL, 1474036734, 0),
(32, 'Gujarati', 1, 'admin', NULL, 1474036751, 0),
(33, 'Haitian Creole', 1, 'admin', NULL, 1474036776, 0),
(34, 'Hausa', 1, 'admin', NULL, 1474036794, 0),
(35, 'Hawaiian', 1, 'admin', NULL, 1474036810, 0),
(36, 'Hebrew', 1, 'admin', NULL, 1474036825, 0),
(37, 'Hindi', 1, 'admin', NULL, 1474036838, 0),
(38, 'Hmong', 1, 'admin', NULL, 1474036849, 0),
(39, 'Hungarian', 1, 'admin', NULL, 1474036862, 0),
(40, 'Icelandic', 1, 'admin', NULL, 1474036894, 0),
(41, 'Igbo', 1, 'admin', NULL, 1474036914, 0),
(42, 'Indonesian', 1, 'admin', 'admin', 1474036946, 1474036965),
(43, 'Irish', 1, 'admin', NULL, 1474036976, 0),
(44, 'Italian', 1, 'admin', NULL, 1474036988, 0),
(45, 'Japanese', 1, 'admin', NULL, 1474037001, 0),
(46, 'Javanese', 1, 'admin', NULL, 1474037012, 0),
(47, 'Kannada', 1, 'admin', NULL, 1474037026, 0),
(48, 'Kazakh', 1, 'admin', NULL, 1474037041, 0),
(49, 'Khmer', 1, 'admin', NULL, 1474037054, 0),
(50, 'Korean', 1, 'admin', NULL, 1474037072, 0),
(51, 'Kurdish', 1, 'admin', NULL, 1474037089, 0),
(52, 'Kyrgyz', 1, 'admin', NULL, 1474037107, 0),
(53, 'Lao', 1, 'admin', NULL, 1474037119, 0),
(54, 'Latin', 1, 'admin', NULL, 1474037143, 0),
(55, 'Latvian', 1, 'admin', NULL, 1474037155, 0),
(56, 'Lithuanian', 1, 'admin', NULL, 1474037188, 0),
(57, 'Luxembourgish', 1, 'admin', NULL, 1474037212, 0),
(58, 'Macedonian', 1, 'admin', 'admin', 1474037230, 1474037247),
(59, 'Malagasy', 1, 'admin', NULL, 1474037268, 0),
(60, 'Malay', 1, 'admin', NULL, 1474037280, 0),
(61, 'Malayalam', 1, 'admin', NULL, 1474037296, 0),
(62, 'Maltese', 1, 'admin', NULL, 1474037314, 0),
(63, 'Maori', 1, 'admin', NULL, 1474037336, 0),
(64, 'Marathi', 1, 'admin', NULL, 1474037347, 0),
(65, 'Mangolian', 1, 'admin', NULL, 1474037362, 0),
(66, 'Nepali', 1, 'admin', NULL, 1474037379, 0),
(67, 'Norwegian', 1, 'admin', NULL, 1474037411, 0),
(68, 'Nianja', 1, 'admin', NULL, 1474037423, 0),
(69, 'Pashto', 1, 'admin', NULL, 1474037439, 0),
(70, 'Persian', 1, 'admin', NULL, 1474037457, 0),
(71, 'polish', 1, 'admin', NULL, 1474037468, 0),
(72, 'Portuguese', 1, 'admin', NULL, 1474037487, 0),
(73, 'Punjabi', 1, 'admin', NULL, 1474037502, 0),
(74, 'Romanian', 1, 'admin', NULL, 1474037516, 0),
(75, 'Russian', 1, 'admin', NULL, 1474037540, 0),
(76, 'samoan', 1, 'admin', NULL, 1474037558, 0),
(77, 'Scottish Gaelic', 1, 'admin', NULL, 1474037590, 0),
(78, 'Serbian', 1, 'admin', NULL, 1474037609, 0),
(79, 'Shona', 1, 'admin', NULL, 1474037621, 0),
(80, 'Sindhi', 1, 'admin', NULL, 1474037633, 0),
(81, 'Sinhala', 1, 'admin', NULL, 1474037648, 0),
(82, 'Slovak', 1, 'admin', NULL, 1474037662, 0),
(83, 'Slovenian', 1, 'admin', NULL, 1474037677, 0),
(84, 'Somali', 1, 'admin', NULL, 1474037690, 0),
(85, 'Spanish', 1, 'admin', NULL, 1474037700, 0),
(86, 'Sundanese', 1, 'admin', NULL, 1474037725, 0),
(87, 'Swahili', 1, 'admin', NULL, 1474037741, 0),
(88, 'Swedish', 1, 'admin', NULL, 1474037752, 0),
(89, 'Tajik', 1, 'admin', NULL, 1474037765, 0),
(90, 'Tamil', 1, 'admin', NULL, 1474037776, 0),
(91, 'Telugu', 1, 'admin', NULL, 1474037789, 0),
(92, 'Thai', 1, 'admin', NULL, 1474037806, 0),
(93, 'Turkish', 1, 'admin', NULL, 1474037821, 0),
(94, 'Ukrenian', 1, 'admin', NULL, 1474037835, 0),
(95, 'Urdu', 1, 'admin', NULL, 1474037847, 0),
(96, 'Uzbek', 1, 'admin', NULL, 1474037857, 0),
(97, 'Vietnamese', 1, 'admin', NULL, 1474037869, 0),
(98, 'Welsh', 1, 'admin', NULL, 1474037880, 0),
(99, 'Western Frisian', 1, 'admin', NULL, 1474037900, 0),
(100, 'Xhosa', 1, 'admin', NULL, 1474037916, 0),
(101, 'Yiddish', 1, 'admin', NULL, 1474037937, 0),
(102, 'Yoruba', 1, 'admin', NULL, 1474037948, 0),
(103, 'Zulu', 1, 'admin', NULL, 1474037961, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

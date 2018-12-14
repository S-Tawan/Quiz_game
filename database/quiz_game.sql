-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2018 at 07:58 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz_game`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `answers_id` varchar(9) NOT NULL,
  `answers_name` text NOT NULL,
  `answer_correct` int(1) NOT NULL,
  `answers_show` text NOT NULL,
  `answers_order` int(1) NOT NULL,
  `question_id` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`answers_id`, `answers_name`, `answer_correct`, `answers_show`, `answers_order`, `question_id`) VALUES
('as_0N6NJM', '3', 0, 'on', 3, 'qs_EI645Q'),
('as_0POMM5', '1', 1, 'on', 1, 'qs_ZYQE2M'),
('as_3AABWH', '', 0, 'off', 4, 'qs_ZYQE2M'),
('as_3Q9RUO', '2', 0, 'on', 2, 'qs_7DSAAJ'),
('as_3UFOL0', '3', 0, 'off', 3, 'qs_LP6HVT'),
('as_3VKJJJ', '4', 0, 'off', 4, 'qs_7DSAAJ'),
('as_3WT02K', '5', 0, 'on', 5, 'qs_LP6HVT'),
('as_3XP80Z', '', 0, 'off', 5, 'qs_A04MWZ'),
('as_4FE4IT', '4', 0, 'off', 4, 'qs_E0P86N'),
('as_53U5NA', '79', 1, 'on', 1, 'qs_QVJITY'),
('as_5V9YL6', 'e', 1, 'on', 1, 'qs_D2DG8A'),
('as_6620B9', '1', 1, 'on', 1, 'qs_FIG5XZ'),
('as_6NKNPY', 'ฟหด', 0, 'on', 2, 'qs_GR2NQ2'),
('as_6PUGTK', '1', 1, 'on', 1, 'qs_LP6HVT'),
('as_76UQBP', 'asd', 0, 'on', 2, 'qs_GT07PD'),
('as_7XNO6U', 'e', 0, 'on', 2, 'qs_D2DG8A'),
('as_8E29L6', '', 0, 'off', 3, 'qs_GR2NQ2'),
('as_8SMG3W', '', 0, 'off', 3, 'qs_0G0HBR'),
('as_9BX7AK', '2', 0, 'on', 2, 'qs_FIG5XZ'),
('as_9Y2PSP', 'e', 0, 'off', 3, 'qs_D2DG8A'),
('as_AVCR9F', 'เดก', 0, 'on', 2, 'qs_0G0HBR'),
('as_BFT8YM', '2', 0, 'on', 2, 'qs_EI645Q'),
('as_BPH4J8', '4', 0, 'off', 4, 'qs_LNK2XO'),
('as_DIWBSL', '79', 0, 'on', 2, 'qs_QVJITY'),
('as_ET7UB7', '', 0, 'off', 5, 'qs_GR2NQ2'),
('as_EXCBE7', '5', 0, 'on', 5, 'qs_E0P86N'),
('as_EYOSYS', '4', 0, 'on', 4, 'qs_WVXINT'),
('as_FKATGS', 'ฟหด', 1, 'on', 1, 'qs_GR2NQ2'),
('as_FT141U', '3', 0, 'off', 3, 'qs_FIG5XZ'),
('as_FTDIAZ', '', 0, 'off', 3, 'qs_GT07PD'),
('as_FZOXNB', '79', 0, 'off', 4, 'qs_QVJITY'),
('as_HCKOJ6', '', 0, 'off', 3, 'qs_A04MWZ'),
('as_HJMADO', '2', 0, 'on', 2, 'qs_WVXINT'),
('as_HY2TU4', '3', 0, 'off', 3, 'qs_LNK2XO'),
('as_I3NF2Y', '3', 0, 'on', 3, 'qs_7DSAAJ'),
('as_JJWDHC', '', 0, 'off', 5, 'qs_EI645Q'),
('as_K0HT00', '', 0, 'off', 4, 'qs_GR2NQ2'),
('as_KL4SAA', '34', 0, 'off', 3, 'qs_E0P86N'),
('as_L030QL', '', 0, 'on', 2, 'qs_ZYQE2M'),
('as_L3WXET', '1', 1, 'on', 1, 'qs_7DSAAJ'),
('as_LCYXLO', '4', 0, 'on', 4, 'qs_FIG5XZ'),
('as_LIFBME', '2', 0, 'on', 2, 'qs_LNK2XO'),
('as_M4XWOP', 'e', 0, 'off', 5, 'qs_D2DG8A'),
('as_MLH3TA', '2', 0, 'on', 2, 'qs_LP6HVT'),
('as_MZ38H0', '5', 0, 'off', 5, 'qs_WVXINT'),
('as_N132NI', '', 0, 'off', 3, 'qs_ZYQE2M'),
('as_N9SDPY', 'asd', 1, 'on', 1, 'qs_GT07PD'),
('as_NN3YL1', '1', 1, 'on', 1, 'qs_E0P86N'),
('as_NT80RK', '555', 0, 'on', 2, 'qs_A04MWZ'),
('as_OMDCR9', '5', 0, 'on', 5, 'qs_LNK2XO'),
('as_PBJGC5', '้เดก', 1, 'on', 1, 'qs_0G0HBR'),
('as_QGSB9D', '', 0, 'off', 4, 'qs_EI645Q'),
('as_QHWDSR', '5', 0, 'off', 5, 'qs_7DSAAJ'),
('as_RETK8S', '', 0, 'off', 5, 'qs_ZYQE2M'),
('as_RN339K', '', 0, 'off', 4, 'qs_A04MWZ'),
('as_SQDC5J', '2', 0, 'on', 2, 'qs_E0P86N'),
('as_SS4K0N', 'ำำ', 1, 'on', 1, 'qs_A04MWZ'),
('as_TJUAX7', '79', 0, 'off', 3, 'qs_QVJITY'),
('as_TNOMAO', '1', 1, 'on', 1, 'qs_WVXINT'),
('as_TS08L6', '', 0, 'off', 4, 'qs_GT07PD'),
('as_UKJUQV', '1', 1, 'on', 1, 'qs_EI645Q'),
('as_UOFSO9', '1', 1, 'on', 1, 'qs_LNK2XO'),
('as_VJD0MB', '', 0, 'off', 5, 'qs_0G0HBR'),
('as_XDHJXE', '', 0, 'off', 5, 'qs_GT07PD'),
('as_YK921L', '3', 0, 'off', 3, 'qs_WVXINT'),
('as_YYJZKG', '4', 0, 'on', 4, 'qs_LP6HVT'),
('as_Z62E1F', '', 0, 'off', 4, 'qs_0G0HBR'),
('as_ZGFS8G', '5', 0, 'on', 5, 'qs_FIG5XZ'),
('as_ZLIKX1', 'e', 0, 'off', 4, 'qs_D2DG8A'),
('as_ZZ3NC5', '79', 0, 'off', 5, 'qs_QVJITY');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_id` varchar(9) NOT NULL,
  `question_name` text NOT NULL,
  `question_img` text NOT NULL,
  `question_time` int(3) NOT NULL,
  `quiz_id` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `question_name`, `question_img`, `question_time`, `quiz_id`) VALUES
('qs_7DSAAJ', 'ข้อ 1 ทดสอบ เปิด 1 2 3 ไม่รูป', '', 60, 'qz_2FIOK2'),
('qs_A04MWZ', 'มาใหม่ ๆ ๆ', 'Question_image_5c1131105e317.png', 15, 'qz_ZKS1UZ'),
('qs_D2DG8A', 'we', 'Question_image_5c10f01b3c12c.png', 15, 'qz_ZKS1UZ'),
('qs_E0P86N', '1', '', 45, 'qz_LSIXNO'),
('qs_EI645Q', ' 2 รูป 123', 'Question_image_5c10b9317b93c.jpg', 20, 'qz_ZKS1UZ'),
('qs_FIG5XZ', '1 มีรูป เปิดช้อย 1,2,4,5', 'Question_image_5c10b6803e703.png', 20, 'qz_EPK00W'),
('qs_GT07PD', 'asd', '', 20, 'qz_EPK00W'),
('qs_LNK2XO', 'ข้อ 1 เกตอยากดู 1 2 5', '', 15, 'qz_ZKS1UZ'),
('qs_LP6HVT', 'ข้อ 2 รูป 12 4 5', 'Question_image_5c11ce20342bd.jpg', 60, 'qz_2FIOK2'),
('qs_ZYQE2M', ',าใหม่  ๆ', '', 60, 'qz_ZKS1UZ');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `quiz_id` varchar(9) NOT NULL,
  `quiz_name` text NOT NULL,
  `quiz_img` text NOT NULL,
  `count_play` int(10) NOT NULL,
  `quiz_rate` int(2) NOT NULL,
  `quiz_detail` text NOT NULL,
  `quiz_creator` text NOT NULL,
  `quiz_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`quiz_id`, `quiz_name`, `quiz_img`, `count_play`, `quiz_rate`, `quiz_detail`, `quiz_creator`, `quiz_status`) VALUES
('qz_2FIOK2', 'ทดสอบพรีเซ้น', 'Quiz_image_5c11cd910a2db.jpg', 0, 0, 'ทดสอบให้ดู', 'test', 1),
('qz_EPK00W', 'สำเร็จครั้งที่1', 'Quiz_image_5c1001d685606.png', 0, 0, 'asd', 'I am Guest Mother Fucker', 1),
('qz_GYVDZ4', '555quiz', 'Quiz_image_5c10d2d49b1ed.png', 0, 0, 'asd', '555', 0),
('qz_J9FL6T', 'สำเร็จครั้งที่1www', 'Quiz_image_5c1001e01c5fc.png', 0, 0, 'asdgg', 'I am Guest Mother Fucker', 0),
('qz_LSIXNO', 'อะไรเอ่ย', 'Quiz_image_5c113ac029b87.jpg', 0, 0, 'อะไรเอ่ย...กวนๆ', 'singha', 1),
('qz_TN4LB8', 'hjkjhytf', 'Quiz_image_5c1115a43ab6e.jpg', 0, 0, '', '11', 0),
('qz_ZKS1UZ', 'ทดสอบให้เกตดู', 'Quiz_image_5c10b8f983a43.png', 0, 0, 'ทดสอบ ๆ', 'I am Guest Mother Fucker', 0);

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `score_id` varchar(9) NOT NULL,
  `score_point` int(10) NOT NULL,
  `user_name` text NOT NULL,
  `quiz_id` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`score_id`, `score_point`, `user_name`, `quiz_id`) VALUES
('sc_2128DF', 2100, 'I am Guest Mother Fucker', 'qz_ZKS1UZ'),
('sc_7U57IO', 0, 'singha', 'qz_LSIXNO'),
('sc_8FRJC1', 0, 'singha', 'qz_LSIXNO'),
('sc_8UEJF6', 3100, 'I am Guest Mother Fucker', 'qz_EPK00W'),
('sc_90KUZV', 4300, 'singha', 'qz_LSIXNO'),
('sc_9S26CN', 0, 'singha', 'qz_LSIXNO'),
('sc_AAL97G', 4400, 'singha', 'qz_LSIXNO'),
('sc_AHCF1F', 0, 'singha', 'qz_LSIXNO'),
('sc_B4TFVI', 4400, 'singha', 'qz_LSIXNO'),
('sc_CM8VJU', 900, 'I am Guest Mother Fucker', 'qz_ZKS1UZ'),
('sc_DBUFDN', 1400, 'Singha', 'qz_QA6V2L'),
('sc_EOVGUK', 3600, '', ''),
('sc_EUUCG6', 5700, 'พีพี', 'qz_2FIOK2'),
('sc_F45GXI', 1000, 'singha', 'qz_LSIXNO'),
('sc_I6VQG5', 4400, 'singha', 'qz_LSIXNO'),
('sc_IPM3YW', 11700, 'พีพี', 'qz_2FIOK2'),
('sc_KVIFEV', 1400, 'I am Guest Mother Fucker', 'qz_ZKS1UZ'),
('sc_QCUPZU', 4400, 'singha', 'qz_LSIXNO'),
('sc_RQ4D4W', 0, 'singha', 'qz_LSIXNO'),
('sc_S8UDS8', 3400, 'singha', 'qz_LSIXNO'),
('sc_SH45GF', 0, 'singha', 'qz_LSIXNO'),
('sc_UH1XSU', 0, 'singha', 'qz_LSIXNO'),
('sc_V5NLH3', 4200, 'I am Guest Mother Fucker', 'qz_ZKS1UZ'),
('sc_W3X7V8', 1900, 'Singha', 'qz_QA6V2L'),
('sc_XJEYDW', 4600, 'สิงห์', 'qz_ZKS1UZ'),
('sc_Y5R3DV', 0, 'สิงห์', 'qz_2FIOK2'),
('sc_YB5P1X', 0, 'singha', 'qz_LSIXNO'),
('sc_Z12KXB', 11600, 'สิงห์', 'qz_2FIOK2'),
('sc_ZAA5AT', 10000, 'สิงห์', 'qz_2FIOK2'),
('sc_ZR8Y03', 4000, 'singha', 'qz_LSIXNO'),
('sc_ZSENJ2', 4600, 'สิงห์', 'qz_2FIOK2');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `password`, `name`) VALUES
('11', '11', ''),
('22', '22', ''),
('44', '44', ''),
('88', '88', ''),
('asd', 'asd', ''),
('ii', 'i', ''),
('jj', 'jj', ''),
('mm', 'mm', ''),
('singha', '123456', ''),
('test', '1234', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_answers`
--

CREATE TABLE `user_answers` (
  `user_answers_id` varchar(9) NOT NULL,
  `answers_id` varchar(9) NOT NULL,
  `question_id` varchar(9) NOT NULL,
  `quiz_id` varchar(9) NOT NULL,
  `user_id` varchar(9) NOT NULL,
  `countdown` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`answers_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`quiz_id`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`score_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_answers`
--
ALTER TABLE `user_answers`
  ADD PRIMARY KEY (`user_answers_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

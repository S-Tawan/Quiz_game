-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2018 at 08:10 AM
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
('as_6NKNPY', 'ฟหด', 0, 'on', 2, 'qs_GR2NQ2'),
('as_76UQBP', 'asd', 0, 'on', 2, 'qs_GT07PD'),
('as_8E29L6', '', 0, 'off', 3, 'qs_GR2NQ2'),
('as_8SMG3W', '', 0, 'off', 3, 'qs_0G0HBR'),
('as_AVCR9F', 'เดก', 0, 'on', 2, 'qs_0G0HBR'),
('as_ET7UB7', '', 0, 'off', 5, 'qs_GR2NQ2'),
('as_EYOSYS', '4', 0, 'on', 4, 'qs_WVXINT'),
('as_FKATGS', 'ฟหด', 1, 'on', 1, 'qs_GR2NQ2'),
('as_FTDIAZ', '', 0, 'off', 3, 'qs_GT07PD'),
('as_HJMADO', '2', 0, 'on', 2, 'qs_WVXINT'),
('as_K0HT00', '', 0, 'off', 4, 'qs_GR2NQ2'),
('as_MZ38H0', '5', 0, 'off', 5, 'qs_WVXINT'),
('as_N9SDPY', 'asd', 1, 'on', 1, 'qs_GT07PD'),
('as_PBJGC5', '้เดก', 1, 'on', 1, 'qs_0G0HBR'),
('as_TNOMAO', '1', 1, 'on', 1, 'qs_WVXINT'),
('as_TS08L6', '', 0, 'off', 4, 'qs_GT07PD'),
('as_VJD0MB', '', 0, 'off', 5, 'qs_0G0HBR'),
('as_XDHJXE', '', 0, 'off', 5, 'qs_GT07PD'),
('as_YK921L', '3', 0, 'off', 3, 'qs_WVXINT'),
('as_Z62E1F', '', 0, 'off', 4, 'qs_0G0HBR');

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
('qs_0G0HBR', 'ฟหด', '', 15, 'qz_6N8DIP'),
('qs_GR2NQ2', 'ฟหด', '', 20, 'qz_6N8DIP'),
('qs_GT07PD', 'asd', '', 20, 'qz_EPK00W');

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
('qz_6N8DIP', 'สำเร็จครั้งที่1', 'Quiz_image_5c0e7b9dcdf8a.png', 0, 0, '523.', 'Singha', 0),
('qz_79H6JZ', 'สำเร็จครั้งที่1', 'Quiz_image_5c0fffb6929e2.jpg', 0, 0, 'sss', 'Singsha', 0),
('qz_EMPATD', 'สำเร็จครั้งที่10000', 'Quiz_image_5c0ff34b7e225.png', 0, 0, 'eieieiei', 'Singha', 0),
('qz_EPK00W', 'สำเร็จครั้งที่1', 'Quiz_image_5c1001d685606.png', 0, 0, 'asd', 'I am Guest Mother Fucker', 1),
('qz_J9FL6T', 'สำเร็จครั้งที่1www', 'Quiz_image_5c1001e01c5fc.png', 0, 0, 'asdgg', 'I am Guest Mother Fucker', 1),
('Singha', 'EIEIZA', 'Quiz_image_5c0e7b9dcdf8a.png', 10, 1, 'ฉันสบายดีเลยอยากลองดูสักที', 'Singha', 1);

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
('sc_0YL4MU', 3800, 'Singha_K9URSE', 'Singha'),
('sc_2HEMGG', 3500, 'Singha', 'Singha'),
('sc_4DCEMF', 6700, 'Singha', 'Singha'),
('sc_588KQD', 3800, 'Singha_XY0WJ4', 'Singha'),
('sc_8ROT8R', 3800, 'Singha_4PTF9J', 'Singha'),
('sc_A3Y1QG', 6700, 'Singha', 'Singha'),
('sc_B83XXK', 800, 'Singha_X2A3PT', 'Singha'),
('sc_DBUFDN', 1400, 'Singha', 'qz_QA6V2L'),
('sc_E73I4G', 3800, 'Singha_DWJ0DV', 'Singha'),
('sc_EOVGUK', 3600, '', ''),
('sc_FQ80M4', 12200, 'Singha', 'Singha'),
('sc_GUNA6Z', 4000, 'Singha', 'Singha'),
('sc_HS737T', 3100, 'Singha_QQQT6U', 'Singha'),
('sc_J6AAXL', 100, 'Singha_0BHYAT', 'Singha'),
('sc_JTQZNF', 2600, 'Singha_5A5JES', 'Singha'),
('sc_K3CAEP', 800, 'Singha_6V04LW', 'Singha'),
('sc_MVRUGS', 800, 'Singha_IFP3XF', 'Singha'),
('sc_NMWCBJ', 6600, 'Singha', 'Singha'),
('sc_OKSNYX', 6400, 'Singha', 'Singha'),
('sc_Q3G5FT', 2800, 'Singha_YYOQK7', 'Singha'),
('sc_SU03W2', 1000, 'Singha_DLL93N', 'Singha'),
('sc_V72M6Y', 3800, 'Singha', 'Singha'),
('sc_W3X7V8', 1900, 'Singha', 'qz_QA6V2L'),
('sc_WKWOJA', 3800, 'Singha_DWK1C8', 'Singha'),
('sc_X7YU27', 3700, 'Singha_XY1CHQ', 'Singha'),
('sc_XGDP0U', 3700, 'Singha_name', 'Singha'),
('sc_XXN9AJ', 3200, 'Singha_GXEV55', 'Singha'),
('sc_YE3GZX', 2700, 'Singha_76L3DZ', 'Singha'),
('sc_ZYCYKX', 2500, 'Singha_X8RZLQ', 'Singha');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

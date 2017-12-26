-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 20, 2017 at 03:58 PM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kalotsavam`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `type`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'judge1', 'judge1', 'judge'),
(3, 'judge2', 'judge2', 'judge');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'on stage'),
(2, 'off stage');

-- --------------------------------------------------------

--
-- Table structure for table `competition`
--

CREATE TABLE `competition` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `max_mark` int(3) NOT NULL,
  `time` int(11) NOT NULL,
  `weightage` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `competition`
--

INSERT INTO `competition` (`id`, `cat_id`, `name`, `max_mark`, `time`, `weightage`) VALUES
(1, 1, 'Poem writing', 100, 30, 10),
(2, 1, 'Story writing', 100, 30, 20),
(3, 2, 'Bharatanatyam', 100, 20, 50),
(4, 2, 'kuchupudi', 100, 30, 60);

-- --------------------------------------------------------

--
-- Table structure for table `judges`
--

CREATE TABLE `judges` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `judges`
--

INSERT INTO `judges` (`id`, `name`, `phone`) VALUES
(1, 'judge1', '12334'),
(2, 'judge2', '123343'),
(3, 'judge3', '123343'),
(4, 'judge4', '123343'),
(5, 'judge5', '123343');

-- --------------------------------------------------------

--
-- Table structure for table `judge_competition`
--

CREATE TABLE `judge_competition` (
  `id` int(11) NOT NULL,
  `judge_id` int(11) NOT NULL,
  `comp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `judge_competition`
--

INSERT INTO `judge_competition` (`id`, `judge_id`, `comp_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 2, 1),
(6, 2, 2),
(7, 2, 3),
(8, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `judge_score`
--

CREATE TABLE `judge_score` (
  `id` int(11) NOT NULL,
  `chess_no` int(11) NOT NULL,
  `comp_id` int(11) NOT NULL,
  `judge_id` int(11) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `judge_score`
--

INSERT INTO `judge_score` (`id`, `chess_no`, `comp_id`, `judge_id`, `score`) VALUES
(1, 10, 1, 1, 10),
(2, 10, 1, 2, 20),
(3, 11, 2, 1, 15),
(4, 11, 2, 2, 45),
(5, 13, 4, 1, 45),
(6, 13, 4, 2, 35),
(7, 12, 2, 1, 23),
(8, 12, 2, 2, 34),
(9, 14, 3, 1, 23),
(10, 14, 3, 2, 23),
(11, 12, 1, 1, 67),
(12, 11, 1, 1, 56),
(13, 14, 4, 1, 89);

-- --------------------------------------------------------

--
-- Table structure for table `participant`
--

CREATE TABLE `participant` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `approved` int(1) NOT NULL DEFAULT '0',
  `total_score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `participant`
--

INSERT INTO `participant` (`id`, `name`, `email`, `approved`, `total_score`) VALUES
(1, 'test', 'test@test', 1, 0),
(2, 'test1', 'test@test', 0, 0),
(3, 'user1', 'user1', 1, 0),
(4, 'user2', 'user2', 1, 0),
(5, 'user3', 'user3', 1, 0),
(6, 'user4', 'user4', 1, 0),
(7, 'user5', 'user5', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `participant_competition`
--

CREATE TABLE `participant_competition` (
  `id` int(11) NOT NULL,
  `part_id` int(11) NOT NULL,
  `comp_id` int(11) NOT NULL,
  `chess_no` int(11) NOT NULL,
  `approved` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `participant_competition`
--

INSERT INTO `participant_competition` (`id`, `part_id`, `comp_id`, `chess_no`, `approved`) VALUES
(1, 3, 1, 10, 1),
(2, 4, 2, 11, 1),
(3, 5, 2, 12, 1),
(4, 6, 4, 13, 1),
(5, 7, 3, 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `participant_score`
--

CREATE TABLE `participant_score` (
  `id` int(11) NOT NULL,
  `part_id` int(11) NOT NULL,
  `comp_id` int(11) NOT NULL,
  `score` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `participant_score`
--

INSERT INTO `participant_score` (`id`, `part_id`, `comp_id`, `score`) VALUES
(36, 3, 1, 15),
(37, 4, 2, 30),
(38, 5, 2, 29),
(39, 6, 4, 40),
(40, 7, 3, 23),
(41, 3, 3, 35);

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `id` int(11) NOT NULL,
  `chess_no` int(11) NOT NULL,
  `comp_id` int(11) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `totals`
--

CREATE TABLE `totals` (
  `id` int(11) NOT NULL,
  `total_cateory` int(11) NOT NULL,
  `total_competition` int(11) NOT NULL,
  `total_participants` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `total_competition_per_category`
--

CREATE TABLE `total_competition_per_category` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `total_comp` int(11) NOT NULL,
  `total_part` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Total_participant_per_competition`
--

CREATE TABLE `Total_participant_per_competition` (
  `id` int(11) NOT NULL,
  `comp_id` int(11) NOT NULL,
  `total_participants` int(11) NOT NULL,
  `flag` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `competition`
--
ALTER TABLE `competition`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `judges`
--
ALTER TABLE `judges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `judge_competition`
--
ALTER TABLE `judge_competition`
  ADD PRIMARY KEY (`id`),
  ADD KEY `judge_id` (`judge_id`),
  ADD KEY `comp_id` (`comp_id`);

--
-- Indexes for table `judge_score`
--
ALTER TABLE `judge_score`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comp_id` (`comp_id`),
  ADD KEY `judge_id` (`judge_id`);

--
-- Indexes for table `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `participant_competition`
--
ALTER TABLE `participant_competition`
  ADD PRIMARY KEY (`id`),
  ADD KEY `part_id` (`part_id`),
  ADD KEY `comp_id` (`comp_id`);

--
-- Indexes for table `participant_score`
--
ALTER TABLE `participant_score`
  ADD PRIMARY KEY (`id`),
  ADD KEY `part_id` (`part_id`),
  ADD KEY `comp_id` (`comp_id`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comp_id` (`comp_id`);

--
-- Indexes for table `totals`
--
ALTER TABLE `totals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `total_competition_per_category`
--
ALTER TABLE `total_competition_per_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `Total_participant_per_competition`
--
ALTER TABLE `Total_participant_per_competition`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comp_id` (`comp_id`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `competition`
--
ALTER TABLE `competition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `judges`
--
ALTER TABLE `judges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `judge_competition`
--
ALTER TABLE `judge_competition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `judge_score`
--
ALTER TABLE `judge_score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `participant`
--
ALTER TABLE `participant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `participant_competition`
--
ALTER TABLE `participant_competition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `participant_score`
--
ALTER TABLE `participant_score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `totals`
--
ALTER TABLE `totals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `total_competition_per_category`
--
ALTER TABLE `total_competition_per_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Total_participant_per_competition`
--
ALTER TABLE `Total_participant_per_competition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `competition`
--
ALTER TABLE `competition`
  ADD CONSTRAINT `competition_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `judge_competition`
--
ALTER TABLE `judge_competition`
  ADD CONSTRAINT `judge_competition_ibfk_1` FOREIGN KEY (`judge_id`) REFERENCES `judges` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `judge_competition_ibfk_2` FOREIGN KEY (`comp_id`) REFERENCES `competition` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `judge_score`
--
ALTER TABLE `judge_score`
  ADD CONSTRAINT `judge_score_ibfk_1` FOREIGN KEY (`comp_id`) REFERENCES `competition` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `judge_score_ibfk_2` FOREIGN KEY (`judge_id`) REFERENCES `judges` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `participant_competition`
--
ALTER TABLE `participant_competition`
  ADD CONSTRAINT `participant_competition_ibfk_1` FOREIGN KEY (`part_id`) REFERENCES `participant` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `participant_competition_ibfk_2` FOREIGN KEY (`comp_id`) REFERENCES `competition` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `participant_score`
--
ALTER TABLE `participant_score`
  ADD CONSTRAINT `participant_score_ibfk_1` FOREIGN KEY (`part_id`) REFERENCES `participant` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `participant_score_ibfk_2` FOREIGN KEY (`comp_id`) REFERENCES `competition` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `scores_ibfk_1` FOREIGN KEY (`comp_id`) REFERENCES `competition` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `total_competition_per_category`
--
ALTER TABLE `total_competition_per_category`
  ADD CONSTRAINT `total_competition_per_category_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Total_participant_per_competition`
--
ALTER TABLE `Total_participant_per_competition`
  ADD CONSTRAINT `Total_participant_per_competition_ibfk_1` FOREIGN KEY (`comp_id`) REFERENCES `competition` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

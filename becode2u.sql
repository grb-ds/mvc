-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2021 at 01:22 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `becode2u`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `id` int(11) NOT NULL,
  `first_name` int(11) NOT NULL,
  `last_name` int(11) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `campus`
--

CREATE TABLE `campus` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `challenge`
--

CREATE TABLE `challenge` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date_open` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_due` timestamp NOT NULL DEFAULT current_timestamp(),
  `url` mediumtext NOT NULL,
  `type` varchar(30) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `challenge_student`
--

CREATE TABLE `challenge_student` (
  `challenge_team_id` int(11) NOT NULL,
  `students_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `challenge_team`
--

CREATE TABLE `challenge_team` (
  `id` int(11) NOT NULL,
  `challenge_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `training_id` int(11) NOT NULL,
  `coacher_id` int(11) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `class_students`
--

CREATE TABLE `class_students` (
  `class_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `coachers`
--

CREATE TABLE `coachers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `dni` varchar(255) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `repository`
--

CREATE TABLE `repository` (
  `id` int(11) NOT NULL,
  `students_id` int(11) NOT NULL,
  `challenge_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` mediumtext NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `description`) VALUES
(1, 'coach', 'Becode coach, the person that can really change your life'),
(2, 'student', 'curious minded beeings...'),
(3, 'admin', 'da boss');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `dni` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  `watch_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `dni`, `gender`, `create_time`, `user_id`, `watch_order`) VALUES
(1, 'Wing', 'stuff', '1800', 'Female', '2021-02-02 09:32:24', 4, 1),
(2, 'stud1', 'ln', '19009', 'male', '2021-02-02 09:46:19', 6, 2),
(9, 'giomayra', 'ln', '8028028', 'mmmm', '2021-02-04 09:54:16', 3, 3),
(11, 'basile', 'ln', '1898190', 'M', '2021-02-02 09:57:36', 5, 4),
(14, 'stud2', 'lnnn', '7897897897', 'ma', '2021-02-02 10:02:41', 7, 6),
(15, 'stud3', 'lnnn', '678798', 'femalle', '2021-02-02 10:05:27', 8, 7),
(17, 'student4', 'lastname', '7678888789', 'FFF', '2021-02-02 10:06:36', 12, 8);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date_open` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_due` timestamp NOT NULL DEFAULT current_timestamp(),
  `campus_id` int(11) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(25) NOT NULL DEFAULT 'active',
  `last_login` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `role_id`, `create_time`, `status`, `last_login`) VALUES
(1, 'bert', 'bert@becode.org', 'bert', 1, '2021-01-31 13:06:54', 'active', '2021-01-31 12:56:25'),
(2, 'tim', 'tim@becode.org', 'tim', 1, '2021-01-31 13:07:04', 'active', '2021-01-31 12:56:25'),
(3, 'Giomayra', 'giomayra@becode.org', 'student', 2, '2021-01-31 13:07:14', 'active', '2021-01-31 12:56:25'),
(4, 'Wing', 'wing@becode.org', 'student', 2, '2021-01-31 13:07:25', 'active', '2021-01-31 12:56:25'),
(5, 'Basile', 'basile@becode.org', 'student', 2, '2021-01-31 13:07:40', 'active', '2021-01-31 12:56:25'),
(6, 'stud1', 'stud1@becode.org', 'student', 2, '2021-01-31 13:07:52', 'active', '2021-01-31 12:56:25'),
(7, 'stud2', 'stud2@becode.org', 'student', 2, '2021-01-31 13:07:56', 'active', '2021-01-31 12:56:25'),
(8, 'stud3', 'stud3@becode.org', 'student', 2, '2021-01-31 13:08:05', 'active', '2021-01-31 12:56:25'),
(9, 'test2', 'test2@becode.org', '$2y$10$BhGibTxnfjcVlpMlO/Cp2eAQ9s0gvMgRdhURi.L4QLFom6ETo7z7y', 1, '2021-02-01 14:11:14', 'active', '2021-02-01 14:11:14'),
(10, 'test1', 'test@becode.org', '$2y$10$7Ne9xtd1ZW8Q.fAOTv.Fye8hHOTGGCH6beF692w5SlBu3bhobnmH6', 2, '2021-02-01 14:16:44', 'active', '2021-02-01 14:16:44'),
(11, 'test3', 'test3@becode.org', '$2y$10$k2F2MVNujdJF4t/FV.c2DOfGOEYv/3/dyHtGDbyLDFOuXHqTL9Wai', 2, '2021-02-01 14:26:08', 'active', '2021-02-01 14:26:08'),
(12, 'test4', 'test4@becode.org', '$2y$10$.C9V3Y9zkSQZtQHRnorDQuD6vZeqtW1HMbQqSpHq..JDi0c4fUAu6', 2, '2021-02-01 14:28:53', 'active', '2021-02-01 14:28:53'),
(13, 'test5', 'test5@becode.org', '$2y$10$cRUZuETSPiyCFXulPgrWjuqg.z2syheRyspL5ML6//FfhflXHxcAG', 2, '2021-02-01 14:31:41', 'active', '2021-02-01 14:31:41'),
(14, 'test6', 'test6@becode.org', '$2y$10$wg9CJbjjEDRs.n8Xcn9YB.SnZWFY8abacxGAl/jTNcT2GxAz20k4u', 2, '2021-02-01 14:32:38', 'active', '2021-02-01 14:32:38'),
(15, 'test7', 'test7@becode.org', '$2y$10$HvsM7YB0Ku/J4eemQ4/K1OEunlg9O3joBH.22zLUSMcXS8xcgt/WK', 2, '2021-02-01 14:36:48', 'active', '2021-02-01 14:36:48'),
(16, 'user', 'user@becode.org', '$2y$10$mV0qmrn/ZlJKXInmJQiMZOT2rhhMUZ2hP26vAVyhqiPS7OpCdYOaC', 2, '2021-02-01 14:40:01', 'active', '2021-02-01 14:40:01'),
(17, 'test8', 'test8@becode.org', '$2y$10$UovNQVeBs6fXaQsvLoQwEOFrPFS.BaURNGhRSRdGMrqVofBn3uMMW', 2, '2021-02-01 14:40:42', 'active', '2021-02-01 14:40:42'),
(18, 'test9', 'test9@becode.org', '$2y$10$lNEdxPmfU4T1BMEUsDm6mOE9LkMPhWz8e75D0T61KS6yLQzg5Ic6O', 2, '2021-02-01 15:31:37', 'active', '2021-02-01 15:31:37'),
(19, 'test10', 'test10@becode.org', '$2y$10$ki1SUMZrOvOj3cIcO9duie4fONxYNzaJkth97obCxJd3gCqvbZiDu', 2, '2021-02-01 15:34:09', 'active', '2021-02-01 15:34:09'),
(20, 'test11', 'test11@becode.org', '$2y$10$bOr3y6JJYQQZWRKMAr1B7O31Qhcwpq.AWXR3/g0iBZDXOr2T3IYKi', 2, '2021-02-01 15:45:05', 'active', '2021-02-01 15:45:05'),
(21, 'test13', 'test13@becode.org', '$2y$10$Cq8x9qeDrB/qUJdFvrCcNu7crVvaKMtZjKbxjzOUnoildnZ7O1Z1S', 2, '2021-02-01 15:50:06', 'active', '2021-02-01 15:50:06');

-- --------------------------------------------------------

--
-- Table structure for table `watch`
--

CREATE TABLE `watch` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `round` int(11) NOT NULL,
  `url` mediumtext DEFAULT NULL,
  `student_id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `watch`
--

INSERT INTO `watch` (`id`, `name`, `round`, `url`, `student_id`, `date`) VALUES
(1, 'react.js', 1, 'abx.com', 1, '2021-02-02'),
(2, 'googleAPI', 1, 'hhh.com', 2, '2021-02-04'),
(4, '3D.js', 1, 'aaa.com', 11, '2021-02-08'),
(5, 'postman', 1, 'aaa.com', 15, '2021-02-09'),
(6, 'hackathon', 1, 'hhh.com', 9, '2021-02-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `campus`
--
ALTER TABLE `campus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `challenge`
--
ALTER TABLE `challenge`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `challenge_student`
--
ALTER TABLE `challenge_student`
  ADD PRIMARY KEY (`challenge_team_id`,`students_id`);

--
-- Indexes for table `challenge_team`
--
ALTER TABLE `challenge_team`
  ADD PRIMARY KEY (`id`),
  ADD KEY `challenge_id` (`challenge_id`),
  ADD KEY `team_id` (`team_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `training_id` (`training_id`),
  ADD KEY `coacher_id` (`coacher_id`);

--
-- Indexes for table `class_students`
--
ALTER TABLE `class_students`
  ADD PRIMARY KEY (`class_id`,`student_id`);

--
-- Indexes for table `coachers`
--
ALTER TABLE `coachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dni` (`dni`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `repository`
--
ALTER TABLE `repository`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_id` (`students_id`),
  ADD KEY `challenge_id` (`challenge_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`gender`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`id`),
  ADD KEY `campus_id` (`campus_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `status` (`status`),
  ADD KEY `user_email` (`email`);

--
-- Indexes for table `watch`
--
ALTER TABLE `watch`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `campus`
--
ALTER TABLE `campus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `challenge`
--
ALTER TABLE `challenge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `challenge_team`
--
ALTER TABLE `challenge_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `repository`
--
ALTER TABLE `repository`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `watch`
--
ALTER TABLE `watch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administrator`
--
ALTER TABLE `administrator`
  ADD CONSTRAINT `administrator_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `administrator_ibfk_2` FOREIGN KEY (`email`) REFERENCES `user` (`email`);

--
-- Constraints for table `challenge`
--
ALTER TABLE `challenge`
  ADD CONSTRAINT `challenge_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `challenge_team`
--
ALTER TABLE `challenge_team`
  ADD CONSTRAINT `challenge_team_ibfk_1` FOREIGN KEY (`challenge_id`) REFERENCES `challenge` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `challenge_team_ibfk_2` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_ibfk_1` FOREIGN KEY (`training_id`) REFERENCES `training` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `classes_ibfk_2` FOREIGN KEY (`coacher_id`) REFERENCES `training` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `coachers`
--
ALTER TABLE `coachers`
  ADD CONSTRAINT `coachers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `repository`
--
ALTER TABLE `repository`
  ADD CONSTRAINT `repository_ibfk_1` FOREIGN KEY (`students_id`) REFERENCES `students` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `repository_ibfk_2` FOREIGN KEY (`challenge_id`) REFERENCES `challenge` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `training`
--
ALTER TABLE `training`
  ADD CONSTRAINT `training_ibfk_1` FOREIGN KEY (`campus_id`) REFERENCES `campus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `watch`
--
ALTER TABLE `watch`
  ADD CONSTRAINT `watch_fksomething_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
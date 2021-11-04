-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2021 at 04:52 AM
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
-- Database: `acdclearance`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `owner_id` int(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `user_id`, `owner_id`, `position`, `created_at`, `updated_at`) VALUES
(13, 34, 30063, 'adviser', '2021-10-03 04:29:53.000000', '2021-10-03 04:29:53.000000'),
(14, 35, 30064, 'adviser', '2021-10-03 04:30:07.000000', '2021-10-03 04:30:07.000000'),
(15, 36, 4, 'signatory', '2021-10-03 04:30:58.000000', '2021-10-03 04:30:58.000000'),
(16, 37, 5, 'signatory', '2021-10-03 04:31:33.000000', '2021-10-03 04:31:33.000000'),
(17, 38, 6, 'signatory', '2021-10-03 04:31:45.000000', '2021-10-03 04:31:45.000000'),
(18, 39, 10008083, 'student', '2021-10-03 04:32:11.000000', '2021-10-03 04:32:11.000000'),
(19, 40, 10008084, 'student', '2021-10-03 04:32:27.000000', '2021-10-03 04:32:27.000000'),
(20, 41, 30065, 'adviser', '2021-10-04 03:26:59.000000', '2021-10-04 03:26:59.000000'),
(21, 42, 30066, 'adviser', '2021-10-04 03:27:26.000000', '2021-10-04 03:27:26.000000'),
(22, 43, 30067, 'adviser', '2021-10-04 03:28:23.000000', '2021-10-04 03:28:23.000000'),
(23, 44, 30068, 'adviser', '2021-10-04 03:28:34.000000', '2021-10-04 03:28:34.000000');

-- --------------------------------------------------------

--
-- Table structure for table `advisers`
--

CREATE TABLE `advisers` (
  `id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `advisers`
--

INSERT INTO `advisers` (`id`, `fname`, `lname`, `created_at`, `updated_at`) VALUES
(30063, 'ryan', 'rzen', '2021-10-03 04:29:53.000000', '2021-10-03 04:29:53.000000'),
(30064, 'kay', 'domael', '2021-10-03 04:30:07.000000', '2021-10-03 04:30:07.000000'),
(30065, 'carlos', 'carlos', '2021-10-04 03:26:59.000000', '2021-10-04 03:26:59.000000'),
(30066, 'genelyn', 'cata', '2021-10-04 03:27:25.000000', '2021-10-04 03:27:25.000000'),
(30067, 'jean', 'jati', '2021-10-04 03:28:22.000000', '2021-10-04 03:28:22.000000'),
(30068, 'bacs', 'peter', '2021-10-04 03:28:34.000000', '2021-10-04 03:28:34.000000');

-- --------------------------------------------------------

--
-- Table structure for table `assignatories`
--

CREATE TABLE `assignatories` (
  `id` int(255) NOT NULL,
  `clearance_id` int(255) NOT NULL,
  `signatory_id` int(255) NOT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignatories`
--

INSERT INTO `assignatories` (`id`, `clearance_id`, `signatory_id`, `remark`, `created_at`, `updated_at`) VALUES
(1, 8, 5, '', '2021-10-03 04:36:44.000000', '2021-10-03 04:36:44.000000'),
(2, 8, 4, '', '2021-10-03 04:36:44.000000', '2021-10-03 04:36:44.000000'),
(3, 8, 6, '', '2021-10-03 04:36:44.000000', '2021-10-03 04:36:44.000000'),
(4, 9, 5, '', '2021-10-04 00:33:18.000000', '2021-10-04 00:33:18.000000'),
(5, 9, 4, '', '2021-10-04 00:33:18.000000', '2021-10-04 00:33:18.000000'),
(6, 10, 6, '', '2021-10-04 00:58:37.000000', '2021-10-04 00:58:37.000000');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gradelevel` int(255) NOT NULL,
  `adviser_id` int(255) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `name`, `gradelevel`, `adviser_id`, `created_at`, `updated_at`) VALUES
(3, 'rizal', 7, 30063, '2021-10-03 04:30:34.000000', '2021-10-03 04:30:34.000000'),
(4, 'bloodstone', 12, 30064, '2021-10-03 04:30:41.000000', '2021-10-03 04:30:41.000000');

-- --------------------------------------------------------

--
-- Table structure for table `clearances`
--

CREATE TABLE `clearances` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `schoolyear_id` int(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clearances`
--

INSERT INTO `clearances` (`id`, `name`, `schoolyear_id`, `level`, `status`, `created_at`, `updated_at`) VALUES
(8, 'JHSclearance-(2019-2020)', 2, 'jhs', 1, '2021-10-04 09:31:52.717694', '2021-10-04 01:31:52.000000'),
(9, 'JHSclearance-(2018-2019)', 1, 'jhs', 0, '2021-10-04 09:31:52.678873', '2021-10-04 01:31:52.000000'),
(10, 'SHSclearance-(2018-2019/1st-sem)', 1, 'shs', 1, '2021-10-04 09:01:36.943490', '2021-10-04 01:01:36.000000');

-- --------------------------------------------------------

--
-- Table structure for table `incharges`
--

CREATE TABLE `incharges` (
  `id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `incharges`
--

INSERT INTO `incharges` (`id`, `fname`, `lname`, `created_at`, `updated_at`) VALUES
(4, 'rey', 'reyes', '2021-10-03 04:28:47.000000', '2021-10-03 04:28:47.000000'),
(5, 'ava', 'cabillan', '2021-10-03 04:28:53.000000', '2021-10-03 04:28:53.000000'),
(6, 'rhiel', 'john', '2021-10-03 04:28:59.000000', '2021-10-03 04:28:59.000000'),
(7, 'mario', 'castillo', '2021-10-03 21:57:43.000000', '2021-10-03 21:57:43.000000');

-- --------------------------------------------------------

--
-- Table structure for table `schoolyears`
--

CREATE TABLE `schoolyears` (
  `id` int(255) NOT NULL,
  `schoolyear` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schoolyears`
--

INSERT INTO `schoolyears` (`id`, `schoolyear`, `status`, `created_at`, `updated_at`) VALUES
(1, '2018-2019', 0, '2021-10-05 03:36:04.622639', '2021-10-04 19:36:04.000000'),
(2, '2019-2020', 1, '2021-10-05 03:36:04.661652', '2021-10-04 19:36:04.000000');

-- --------------------------------------------------------

--
-- Table structure for table `signatories`
--

CREATE TABLE `signatories` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `incharge_id` int(255) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signatories`
--

INSERT INTO `signatories` (`id`, `name`, `incharge_id`, `created_at`, `updated_at`) VALUES
(4, 'coblab', 4, '2021-10-03 04:30:58.000000', '2021-10-03 04:30:58.000000'),
(5, 'cashier', 6, '2021-10-03 04:31:33.000000', '2021-10-03 04:31:33.000000'),
(6, 'library', 5, '2021-10-03 04:31:44.000000', '2021-10-03 04:31:44.000000');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `grade` int(255) NOT NULL,
  `class_id` int(255) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `fname`, `lname`, `grade`, `class_id`, `created_at`, `updated_at`) VALUES
(10008083, 'rob', 'miguelles', 7, 3, '2021-10-03 04:32:11.000000', '2021-10-03 04:32:11.000000'),
(10008084, 'allein', 'fodulin', 12, 4, '2021-10-03 04:32:27.000000', '2021-10-03 04:32:27.000000');

-- --------------------------------------------------------

--
-- Table structure for table `student_stats`
--

CREATE TABLE `student_stats` (
  `id` int(255) NOT NULL,
  `student_id` int(255) NOT NULL,
  `assignatory_id` int(255) NOT NULL,
  `signatory_id` int(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_stats`
--

INSERT INTO `student_stats` (`id`, `student_id`, `assignatory_id`, `signatory_id`, `status`, `remark`, `created_at`, `updated_at`) VALUES
(1, 10008083, 1, 5, 0, '', '2021-10-03 04:36:44.000000', '2021-10-03 04:36:44.000000'),
(2, 10008083, 2, 4, 0, '', '2021-10-03 04:36:44.000000', '2021-10-03 04:36:44.000000'),
(3, 10008083, 3, 6, 0, '', '2021-10-05 04:27:02.454559', '2021-10-04 20:27:02.000000'),
(4, 10008083, 4, 5, 0, '', '2021-10-04 00:33:18.000000', '2021-10-04 00:33:18.000000'),
(5, 10008083, 5, 4, 0, '', '2021-10-04 00:33:18.000000', '2021-10-04 00:33:18.000000'),
(6, 10008084, 6, 6, 0, '', '2021-10-04 00:58:37.000000', '2021-10-04 00:58:37.000000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rank` int(11) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `rank`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$nolutRFn7vwiSOJXTRslfeVRD9kOOgD0FzfojpTaMjHwUVN6I.qmW', 1, '2021-10-02 09:44:55.631136', '0000-00-00 00:00:00.000000'),
(34, 'ryan1', '$2y$10$hY2jsYP4EG9YuzeWqcxUiOKnbKFd1tPFyAQSDdZaaGJA5zJkZqoSW', 2, '2021-10-04 05:04:49.698065', '2021-10-03 21:04:49.000000'),
(35, 'kay1', '$2y$10$NAk5PhQVlfjdyn9E948ZpuXzJ2vPueSWhE4v5sZhSpOmJOvHwpq/K', 2, '2021-10-03 04:30:07.000000', '2021-10-03 04:30:07.000000'),
(36, 'rey1', '$2y$10$d7/md9JE3YglYZhrMiReJ.qxGp53vAn6DIGM99IQZhfWokwnibH.a', 2, '2021-10-04 11:14:42.400723', '2021-10-04 03:14:42.000000'),
(37, 'john1', '$2y$10$9bGeFlepr24/dNBb6O0wB.iZEe0xEt3KwnZQLXzw04QTls3rsYWHi', 2, '2021-10-03 04:31:33.000000', '2021-10-03 04:31:33.000000'),
(38, 'ava1', '$2y$10$t0MAnI/K8Rq.ScpmAC8aKeJnEe1hzcZfDwWbCdDbSkDQ8CaUuNAPq', 2, '2021-10-04 11:14:49.090452', '2021-10-04 03:14:49.000000'),
(39, '10008083', '$2y$10$EfxGXgl1Ev63lSacPBVf6e7ybNiBkvyvtnZ4OscOY2kSCdI4CO/Gu', 3, '2021-10-03 04:32:11.000000', '2021-10-03 04:32:11.000000'),
(40, '10008084', '$2y$10$AserCsAjaxVRKG8eZhEUQ.9X9VRAp5X42yax1irIJTICrUL9y0m46', 3, '2021-10-03 04:32:27.000000', '2021-10-03 04:32:27.000000'),
(41, 'carlos1', '$2y$10$o56078tVvvXuLVfgvMAlA.oN3T/JluHFYYwaWxaBq0odDEU29TOcm', 2, '2021-10-04 03:26:59.000000', '2021-10-04 03:26:59.000000'),
(42, 'gen1', '$2y$10$WkjUVHp1LKQEDap7455HduxMvWEqNJuYNRB2IzWjHuM0F.H1eiKmu', 2, '2021-10-04 03:27:26.000000', '2021-10-04 03:27:26.000000'),
(43, 'jean1', '$2y$10$KQNprAmiSiwWXAHeFgwhfunAg6LmKPtL4Fj/YvFVfLu/XspvTCnoy', 2, '2021-10-04 03:28:23.000000', '2021-10-04 03:28:23.000000'),
(44, 'bacs1', '$2y$10$F6/3iQvE3zqrYkK1MRtFgudNBePeuYAxcCm17nB1x3yE93X3ToeKK', 2, '2021-10-04 03:28:34.000000', '2021-10-04 03:28:34.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advisers`
--
ALTER TABLE `advisers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignatories`
--
ALTER TABLE `assignatories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clearances`
--
ALTER TABLE `clearances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incharges`
--
ALTER TABLE `incharges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schoolyears`
--
ALTER TABLE `schoolyears`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signatories`
--
ALTER TABLE `signatories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_stats`
--
ALTER TABLE `student_stats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `advisers`
--
ALTER TABLE `advisers`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30069;

--
-- AUTO_INCREMENT for table `assignatories`
--
ALTER TABLE `assignatories`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clearances`
--
ALTER TABLE `clearances`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `incharges`
--
ALTER TABLE `incharges`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `schoolyears`
--
ALTER TABLE `schoolyears`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `signatories`
--
ALTER TABLE `signatories`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10008085;

--
-- AUTO_INCREMENT for table `student_stats`
--
ALTER TABLE `student_stats`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

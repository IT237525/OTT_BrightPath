-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2024 at 05:42 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_teacher_trainer`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `announcement_id` int(11) NOT NULL,
  `announcement_text` text NOT NULL,
  `announcement_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`announcement_id`, `announcement_text`, `announcement_date`) VALUES
(13, '“Join Our Free Webinar Series for Educators!”\r\nDon’t miss out on our exclusive webinar series designed to empower teachers with the latest educational tools and techniques. Register today and transform your classroom experience!', '2024-10-07 11:52:20'),
(14, '“Special Discount on All Teacher Training Programs!”\r\nFor a limited time, enjoy a special discount on all our teacher training courses. Invest in your professional growth and save big. Sign up now!', '2024-10-07 11:52:40'),
(15, '“Become a Certified Online Teacher with Our Expert-Led Courses!”\r\nGain certification and recognition with our expert-led training programs. Learn at your own pace and become a certified online teacher. Start your journey today!\r\n', '2024-10-07 11:52:59'),
(16, '“New Interactive Workshops for Teachers – Enroll Now!”\r\nEngage in hands-on, interactive workshops that provide practical skills and knowledge. Enhance your teaching methods and connect with fellow educators. Enroll now and make a difference in your teaching career!', '2024-10-07 11:53:25');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `first_name`, `last_name`, `phone_number`, `email_address`, `message`, `created_at`) VALUES
(3, 'kajan', 'kk', '55555555556', 'kajan5217@gmail.com', 'Good moring', '2024-10-07 15:19:44'),
(4, 'kajan', 'kk', '55555555556', 'kajan5217@gmail.com', 'Good moring', '2024-10-07 15:19:50'),
(5, 'kajan', 'kajapirathap', '6464644641', 'kajan@gmail.com', 'hi', '2024-10-07 15:20:31');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `feedback` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `user_id`, `feedback`, `created_at`) VALUES
(21, 'USER0005', 'good\r\n', '2024-10-07 15:18:54'),
(22, 'USER0005', 'perfect', '2024-10-07 15:18:59'),
(23, 'USER0005', 'awsome', '2024-10-07 15:19:09');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_caption` varchar(255) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_caption`, `product_description`, `product_image`) VALUES
(9, 'Phython', 'Learn Python from scratch and master the language behind AI.', '', 'uploads/python.png'),
(10, 'Bash', 'Gain control of your system with Bash scripting.', '', 'uploads/code.png'),
(11, 'Node.js', 'Build lightning-fast, scalable applications with Node.js.', '', 'uploads/3d.png'),
(12, 'PHP', 'Dive into PHP and learn how to create dynamic, data-driven websites.', '', 'uploads/php.png'),
(13, 'TypeScript', 'TypeScript takes JavaScript to the next level with type safety and powerful features.', '', 'uploads/typescript.png'),
(14, 'MySQL', 'Understand the power of databases with MySQL.', '', 'uploads/mysql.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `dob` date NOT NULL,
  `age` int(11) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `user_name`, `user_id`, `email`, `mobile`, `dob`, `age`, `gender`, `password`, `created_at`) VALUES
(1, 'admin', 'admin', 'admin', 'USER0004', 'admin', '0836377155', '2002-04-05', 22, 'Male', '$2y$10$2b1a8XemDeikOFc/lzfAoO6fM8Ndmt6GtHj1wkE0eQgI7XUg4ri6G', '2024-10-06 14:49:23'),
(2, 'kajan', 'kk', 'Kajan29', 'USER0005', 'kajan5217@gmail.com', '55555555556', '2013-01-07', 11, 'Male', '$2y$10$NzZecqV6/NId4075izn9n.Gfll9LrUjko8viZ5nYSOI5fZmBzdyMq', '2024-10-07 00:59:17');

-- --------------------------------------------------------

--
-- Table structure for table `user_questions`
--

CREATE TABLE `user_questions` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_questions`
--

INSERT INTO `user_questions` (`id`, `question`, `created_at`) VALUES
(8, 'How enroll Course\r\n', '2024-10-07 15:17:59'),
(9, 'How To Login without email', '2024-10-07 15:18:18'),
(10, 'Trainer moblie number', '2024-10-07 15:18:38')
 (11,'The login have some error how it fix','2025-09-08') ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`announcement_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_questions`
--
ALTER TABLE `user_questions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `announcement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_questions`
--
ALTER TABLE `user_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

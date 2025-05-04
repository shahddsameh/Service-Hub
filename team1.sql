-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2025 at 12:58 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `team1`
--

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `comment_id` int(11) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `rate` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `priceper` varchar(255) NOT NULL,
  `service_type` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `image` varchar(1000) NOT NULL,
  `type_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_name`, `description`, `price`, `currency`, `priceper`, `service_type`, `location`, `image`, `type_id`, `user_id`) VALUES
(94, 'Business analyst ', 'Analyzes business data', 40, '$', '/project', 'on', NULL, 'business.jpg', 4, 25),
(95, 'Logo Design', 'Professional logo design tailored to your brand identity.', 50, 'USD', 'per project', 'Graphic Design', 'Cairo, Egypt', 'graphic-designer.jpg', 6, 1),
(96, 'Brand Identity Kit', 'Full branding package including logo, colors, fonts.', 150, 'USD', 'per package', 'Graphic Design', 'Remote', 'graphic-designer.jpg', 6, 1),
(97, 'Website Development', 'Responsive website using React and Node.js.', 300, 'USD', 'per website', 'Web Development', 'Cairo, Egypt', 'web-development.jpg', 11, 2),
(98, 'Fix Website Bugs', 'Debug and fix any issue in your website.', 30, 'USD', 'per hour', 'Web Development', 'Remote', 'web-development.jpg', 11, 2),
(99, 'Social Media Audit', 'Evaluate and improve your social media presence.', 40, 'USD', 'per profile', 'Social Media Specialist', 'Remote', 'social-media.jpg', 8, 3),
(100, 'Content Calendar Creation', 'Plan one month of engaging content.', 60, 'USD', 'per month', 'Social Media Specialist', 'Remote', 'social-media.jpg', 8, 3),
(101, 'Mobile App UI Design', 'Intuitive UI designs for Android/iOS apps.', 200, 'USD', 'per app', 'Web Design', 'Remote', 'web-design.jpg', 10, 4),
(102, 'Website Redesign', 'Modernize and improve your current website UI.', 120, 'USD', 'per project', 'Web Design', 'Giza, Egypt', 'web-design.jpg', 10, 4),
(103, 'English to Arabic Translation', 'Fast and accurate translation service.', 10, 'USD', 'per page', 'Translating', 'Remote', 'translating.jpg', 9, 5),
(104, 'Subtitle Translation', 'Translate and sync subtitles for videos.', 20, 'USD', 'per video', 'Translating', 'Remote', 'translating.jpg', 9, 5);

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`type_id`, `type_name`) VALUES
(2, 'Accounting'),
(4, 'Business'),
(6, 'Graphic design'),
(7, 'Photography'),
(8, 'Social media specialist'),
(9, 'translating'),
(10, 'web design'),
(11, 'web development');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `image` varchar(1000) DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `url1` varchar(255) DEFAULT NULL,
  `url2` varchar(255) DEFAULT NULL,
  `url3` varchar(255) DEFAULT NULL,
  `about me` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `firstname`, `lastname`, `user_email`, `gender`, `dob`, `user_password`, `image`, `job_title`, `phone_number`, `url1`, `url2`, `url3`, `about me`) VALUES
(1, 'Lina', 'Hassan', 'lina.hassan@email.com', 'Female', '1995-04-12', 'hashedpass1', '2.jpg', 'Graphic Designer', '+201234567891', 'https://behance.net/lina', NULL, NULL, 'Creative graphic designer with a love for branding.'),
(2, 'Omar', 'El Sayed', 'omar.sayed@email.com', 'Male', '1992-09-30', 'hashedpass2', 'portfolio.jpg', 'Full Stack Developer', '+201234567892', 'https://github.com/omar', 'https://linkedin.com/in/omar', NULL, 'Passionate about clean code and great UX.'),
(3, 'Sara', 'Ali', 'sara.ali@email.com', 'Female', '1998-06-15', 'hashedpass3', 'portfolio.jpg', 'Social Media Specialist', '+201234567893', 'https://instagram.com/sarawrites', NULL, NULL, 'I help brands speak to their audience online.'),
(4, 'Mohamed', 'Nabil', 'mohamed.nabil@email.com', 'Male', '1990-01-22', 'hashedpass4', 'portfolio.jpg', 'Web Designer', '+201234567894', 'https://dribbble.com/mnabil', NULL, NULL, 'Modern and responsive design enthusiast.'),
(5, 'Dina', 'Fouad', 'dina.fouad@email.com', 'Female', '1996-08-18', 'hashedpass5', '2.jpg', 'Translator', '+201234567895', NULL, NULL, NULL, 'Translator fluent in English, Arabic, and French.'),
(25, 'Shahd', 'Sameh', 'khara@gmail.com', 'female', '2025-05-28', '$2y$10$4tebVKBukudXT2i09dytJ.w2y20e6DIle1IfexjwrwqUmMzOPY/RK', '2.jpg', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rates`
--
ALTER TABLE `rates`
  ADD CONSTRAINT `rates_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rates_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `services` (`service_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `types` (`type_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `services_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

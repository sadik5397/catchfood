-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2018 at 01:26 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catchfood`
--

-- --------------------------------------------------------

--
-- Table structure for table `api_keys`
--

CREATE TABLE `api_keys` (
  `user_id` int(50) NOT NULL,
  `api_key` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `api_keys`
--

INSERT INTO `api_keys` (`user_id`, `api_key`) VALUES
(1, 'abcdefghijklm');

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `area_id` int(11) NOT NULL,
  `area_name` varchar(200) NOT NULL,
  `area_gps` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `contact_id` int(11) NOT NULL,
  `contact_type` varchar(50) NOT NULL,
  `contact_info` varchar(350) NOT NULL,
  `restaurant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dashboard_updates`
--

CREATE TABLE `dashboard_updates` (
  `data_id` int(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `msg_body` mediumtext NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `data_type` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dashboard_updates`
--

INSERT INTO `dashboard_updates` (`data_id`, `user_id`, `subject`, `msg_body`, `time`, `status`, `data_type`) VALUES
(4, 11, 'This is a subject', '<p>This is a message</p>', '2018-03-01 22:18:20', 0, 1),
(5, 11, 'test offer update', '<p>Message body</p>', '2018-03-01 23:11:59', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `dashboard_updates_attchments`
--

CREATE TABLE `dashboard_updates_attchments` (
  `attachment_id` int(11) NOT NULL,
  `file_name` varchar(300) NOT NULL,
  `user_id` int(11) NOT NULL,
  `data_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dashboard_updates_attchments`
--

INSERT INTO `dashboard_updates_attchments` (`attachment_id`, `file_name`, `user_id`, `data_id`) VALUES
(4, '15199427000123.png', 11, 4),
(5, '1519942700123.txt', 11, 4),
(6, '151994270001234.png', 11, 4),
(7, '1519945919thai2.png', 11, 5),
(8, '1519945919thai3.png', 11, 5);

-- --------------------------------------------------------

--
-- Table structure for table `extras`
--

CREATE TABLE `extras` (
  `extra_id` int(11) NOT NULL,
  `extra_file` varchar(200) NOT NULL,
  `restaurant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `feature_id` int(11) NOT NULL,
  `feature_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(200) NOT NULL,
  `item_price` float NOT NULL,
  `item_type_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item_types`
--

CREATE TABLE `item_types` (
  `item_type_id` int(11) NOT NULL,
  `item_type_name` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `msg_to_editor`
--

CREATE TABLE `msg_to_editor` (
  `msg_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `msg` mediumtext NOT NULL,
  `send_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msg_to_editor`
--

INSERT INTO `msg_to_editor` (`msg_id`, `user_id`, `msg`, `send_time`) VALUES
(1, 11, 'hellow', '2018-03-01 05:30:59');

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `restaurant_id` int(11) NOT NULL,
  `restaurant_name` varchar(120) NOT NULL,
  `author` varchar(120) NOT NULL,
  `restaurant_address` text NOT NULL,
  `restaurant_gps` varchar(50) NOT NULL,
  `restaurant_best` varchar(300) NOT NULL,
  `restaurant_logo` varchar(200) NOT NULL,
  `restaurant_image` varchar(200) NOT NULL,
  `restaurant_details` mediumtext NOT NULL,
  `sat` varchar(50) NOT NULL,
  `sun` varchar(50) NOT NULL,
  `mon` varchar(50) NOT NULL,
  `tue` varchar(50) NOT NULL,
  `wed` varchar(50) NOT NULL,
  `thu` varchar(50) NOT NULL,
  `fri` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_types`
--

CREATE TABLE `restaurant_types` (
  `restaurant_type_id` int(11) NOT NULL,
  `restaurant_type_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `security_tokens`
--

CREATE TABLE `security_tokens` (
  `token_id` int(20) UNSIGNED NOT NULL,
  `content` varchar(50) NOT NULL,
  `user_id` int(20) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `used` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `security_tokens`
--

INSERT INTO `security_tokens` (`token_id`, `content`, `user_id`, `time`, `used`) VALUES
(1, '429a31154fc19c2a', 1, '2018-02-28 19:21:36', 0),
(2, '3cc9fc41abee665f', 1, '2018-02-28 19:25:35', 0),
(3, '2d7dbbe603343250', 1, '2018-02-28 19:30:44', 0),
(4, '4a182502572c424b', 11, '2018-02-28 21:01:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurants_areas`
--

CREATE TABLE `tbl_restaurants_areas` (
  `restaurant_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurants_features`
--

CREATE TABLE `tbl_restaurants_features` (
  `restaurant_id` int(11) NOT NULL,
  `feature_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurants_restaurant_types`
--

CREATE TABLE `tbl_restaurants_restaurant_types` (
  `restaurant_id` int(11) NOT NULL,
  `restaurant_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(70) NOT NULL,
  `lname` varchar(80) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `profile_img` varchar(200) NOT NULL DEFAULT 'user_avatar_default.jpg',
  `cover_img` varchar(200) NOT NULL DEFAULT 'user_cover_default.jpg',
  `role` tinyint(1) NOT NULL DEFAULT '3',
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `join_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `address` mediumtext NOT NULL,
  `facebook_id` bigint(255) DEFAULT NULL,
  `short_desc` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `gender` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `password`, `fname`, `lname`, `email`, `username`, `profile_img`, `cover_img`, `role`, `verified`, `join_date`, `address`, `facebook_id`, `short_desc`, `phone`, `gender`) VALUES
(1, '$2y$10$X/DGKnmENyBWXDskkyEDcOFOODL7XsUbSOisu.rkH/rdkP3hf1u6i', 'John', 'Doe', 'safayatjamil27@gmail.com', 'safjammed', '1519868706IMG_20161209_211836_processed.jpg', '1519868756thai-palauisland.png', 0, 1, '2017-08-28 17:56:29', '<b>flat:</b>25<br><b>Rue:</b>30<br><b>Vill:</b>10<br><b>Complement:</b>Complement<br><b>Postal Code:</b>92400<br>', 1756117574438512, '<p>An artist of considerable range, Chet Faker  the name taken by Melbourne-raised, Brooklyn-based Nick Murphy writes, performs and records all of his own music, giving it a warm, intimate feel with a solid groove structure.</p>', '', ''),
(5, '$2y$10$Z8GiaF/REpAglLXcVzlWlO96UrX6vyNxYVTIjNsSAGXXBVeZxiW02', 'John', 'Doe', 'safayat21@yahoo.com', '1146242935512791', '1519868706IMG_20161209_211836_processed.jpg', '1519868756thai-palauisland.png', 3, 1, '2018-02-10 00:21:41', '', 1146242935512791, '', '', ''),
(11, '$2y$10$dPGhm1JNnDW/ryIHF0jN7OqyttR.NQJaRFqdOIKGN7DSedyG1d2Am', 'John', 'Doe', '1000963@daffodil.ac', 'johndoe', '1519942859IMG_20161209_203511_processed.jpg', '1519942975DSC_6118.JPG', 2, 1, '2018-02-28 20:58:54', '', NULL, '<p>no desc added</p>', '01969741278', 'male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api_keys`
--
ALTER TABLE `api_keys`
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `api_key` (`api_key`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`area_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contact_id`),
  ADD KEY `restaurant_id` (`restaurant_id`);

--
-- Indexes for table `dashboard_updates`
--
ALTER TABLE `dashboard_updates`
  ADD PRIMARY KEY (`data_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `dashboard_updates_attchments`
--
ALTER TABLE `dashboard_updates_attchments`
  ADD PRIMARY KEY (`attachment_id`),
  ADD KEY `file_name` (`file_name`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `data_id` (`data_id`);

--
-- Indexes for table `extras`
--
ALTER TABLE `extras`
  ADD PRIMARY KEY (`extra_id`),
  ADD KEY `restaurant_id` (`restaurant_id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`feature_id`),
  ADD UNIQUE KEY `feature_name` (`feature_name`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `item_type_id` (`item_type_id`),
  ADD KEY `restaurant_id` (`restaurant_id`);

--
-- Indexes for table `item_types`
--
ALTER TABLE `item_types`
  ADD PRIMARY KEY (`item_type_id`);

--
-- Indexes for table `msg_to_editor`
--
ALTER TABLE `msg_to_editor`
  ADD PRIMARY KEY (`msg_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`restaurant_id`);

--
-- Indexes for table `restaurant_types`
--
ALTER TABLE `restaurant_types`
  ADD PRIMARY KEY (`restaurant_type_id`),
  ADD UNIQUE KEY `restaurant_type_name` (`restaurant_type_name`);

--
-- Indexes for table `security_tokens`
--
ALTER TABLE `security_tokens`
  ADD PRIMARY KEY (`token_id`);

--
-- Indexes for table `tbl_restaurants_areas`
--
ALTER TABLE `tbl_restaurants_areas`
  ADD KEY `restaurant_id` (`restaurant_id`),
  ADD KEY `area_id` (`area_id`);

--
-- Indexes for table `tbl_restaurants_features`
--
ALTER TABLE `tbl_restaurants_features`
  ADD KEY `restaurant_id` (`restaurant_id`),
  ADD KEY `feature_id` (`feature_id`);

--
-- Indexes for table `tbl_restaurants_restaurant_types`
--
ALTER TABLE `tbl_restaurants_restaurant_types`
  ADD KEY `restaurant_id` (`restaurant_id`,`restaurant_type_id`),
  ADD KEY `restaurant_type_id` (`restaurant_type_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `facebook_id` (`facebook_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `area_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dashboard_updates`
--
ALTER TABLE `dashboard_updates`
  MODIFY `data_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `dashboard_updates_attchments`
--
ALTER TABLE `dashboard_updates_attchments`
  MODIFY `attachment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `extras`
--
ALTER TABLE `extras`
  MODIFY `extra_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `feature_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `item_types`
--
ALTER TABLE `item_types`
  MODIFY `item_type_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `msg_to_editor`
--
ALTER TABLE `msg_to_editor`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `restaurant_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `restaurant_types`
--
ALTER TABLE `restaurant_types`
  MODIFY `restaurant_type_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `security_tokens`
--
ALTER TABLE `security_tokens`
  MODIFY `token_id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`restaurant_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `extras`
--
ALTER TABLE `extras`
  ADD CONSTRAINT `extras_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`restaurant_id`);

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`item_type_id`) REFERENCES `item_types` (`item_type_id`),
  ADD CONSTRAINT `items_ibfk_2` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`restaurant_id`);

--
-- Constraints for table `tbl_restaurants_areas`
--
ALTER TABLE `tbl_restaurants_areas`
  ADD CONSTRAINT `tbl_restaurants_areas_ibfk_1` FOREIGN KEY (`area_id`) REFERENCES `areas` (`area_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_restaurants_areas_ibfk_2` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`restaurant_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_restaurants_features`
--
ALTER TABLE `tbl_restaurants_features`
  ADD CONSTRAINT `tbl_restaurants_features_ibfk_1` FOREIGN KEY (`feature_id`) REFERENCES `features` (`feature_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_restaurants_features_ibfk_2` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`restaurant_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_restaurants_restaurant_types`
--
ALTER TABLE `tbl_restaurants_restaurant_types`
  ADD CONSTRAINT `tbl_restaurants_restaurant_types_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`restaurant_id`),
  ADD CONSTRAINT `tbl_restaurants_restaurant_types_ibfk_2` FOREIGN KEY (`restaurant_type_id`) REFERENCES `restaurant_types` (`restaurant_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

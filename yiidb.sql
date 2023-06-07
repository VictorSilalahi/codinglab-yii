-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2023 at 12:11 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yiidb`
--

-- --------------------------------------------------------

--
-- Table structure for table `ttodo`
--

CREATE TABLE `ttodo` (
  `todoid` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(2048) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `is_done` tinyint(1) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ttodo`
--

INSERT INTO `ttodo` (`todoid`, `title`, `description`, `created_at`, `updated_at`, `is_done`, `userid`) VALUES
(1, 'iwciwh cuiowhiouch  ciuhwuhc  cuwhchuwu', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2023-06-01', '2023-06-06', 1, 2),
(3, 'cije cioej  iocenocoieu', 'Lorem ipsum dolor sit amet, Aenean bibendum elit ac magna mollis, et interdum metus consequat. Curabitur sit amet mauris quis orci mattis ornare. Donec sed pretium turpis. Praesent id justo arcu. Vestibulum sed aliquam lorem. Pellentesque ac lorem neque. Nullam eu mattis libero, sed porttitor dolor. Etiam rhoncus tellus metus, in blandit tortor pellentesque eget. Nullam sit amet odio at arcu sollicitudin pretium sed quis mi. Praesent semper, odio vel dignissim porta, lectus est elementum eros, non mollis urna lectus nec massa.', '2023-06-06', '2023-06-07', 0, 2),
(4, 'xxxx hbtrhrt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed elit lorem, pretium eu quam quis, semper pellentesque ligula. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam sem odio, feugiat vel vestibulum vel, efficitur viverra justo. Aenean quis porttitor arcu. Quisque consequat consectetur tempor. Phasellus eleifend, arcu vel accumsan interdum, est metus ultrices nibh, viverra dapibus ante felis eu ipsum. Aenean imperdiet suscipit elementum. Donec dolor erat, dapibus eget tempus et, tempus sit amet libero. Vivamus nibh eros, commodo et eleifend eget, tristique in neque.  Donec dui dolor, varius vitae cursus nec, ornare ut augue. Maecenas vulputate nunc eget ipsum laoreet, quis commodo sem porttitor. Donec nec porta justo. Sed eget aliquet metus, vitae commodo arcu. Ut semper eros nisl, et mollis nibh pharetra consequat. Nam in magna facilisis, rutrum est non, hendrerit ex. Morbi malesuada sollicitudin tellus in euismod. Duis magna lacus, rutrum non scelerisque ut, dictum quis dui. Vestibulum vitae nunc hendrerit velit fermentum faucibus id nec tortor. Vivamus pulvinar aliquam enim quis vulputate. Fusce nec ipsum eros. Etiam finibus mauris sed massa hendrerit, commodo dignissim lectus fermentum. Sed tincidunt tristique maximus. Maecenas eu commodo tortor. Donec quis mi luctus, lobortis nunc nec, tempus urna. Cras venenatis velit et dictum facilisis.', '2023-06-06', '2023-06-07', 0, 2),
(5, '1235454564', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed elit lorem, pretium eu quam quis, semper pellentesque ligula. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam sem odio, feugiat vel vestibulum vel, efficitur viverra justo. Aenean quis porttitor arcu. Quisque consequat consectetur tempor. Phasellus eleifend, arcu vel accumsan interdum, est metus ultrices nibh, viverra dapibus ante felis eu ipsum. Aenean imperdiet suscipit elementum. Donec dolor erat, dapibus eget tempus et, tempus sit amet libero. Vivamus nibh eros, commodo et eleifend eget, tristique in neque.  Donec dui dolor, varius vitae cursus nec, ornare ut augue. Maecenas vulputate nunc eget ipsum laoreet, quis commodo sem porttitor. Donec nec porta justo. Sed eget aliquet metus, vitae commodo arcu. Ut semper eros nisl, et mollis nibh pharetra consequat. Nam in magna facilisis, rutrum est non, hendrerit ex. Morbi malesuada sollicitudin tellus in euismod. Duis magna lacus, rutrum non scelerisque ut, dictum quis dui. Vestibulum vitae nunc hendrerit velit fermentum faucibus id nec tortor. Vivamus pulvinar aliquam enim quis vulputate. Fusce nec ipsum eros. Etiam finibus mauris sed massa hendrerit, commodo dignissim lectus fermentum. Sed tincidunt tristique maximus. Maecenas eu commodo tortor. Donec quis mi luctus, lobortis nunc nec, tempus urna. Cras venenatis velit et dictum facilisis.', '2023-06-06', '2023-06-06', 1, 2),
(6, 'cecece cece brtbt', 'This widget size is huge, any possible to shrink it?  as title.  You know, I have to customize your grid widget export session to ignore mpdf since I not install this widget due to size issue.', '2023-06-07', '2023-06-07', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tuser`
--

CREATE TABLE `tuser` (
  `userid` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwd` varchar(200) NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'reguler',
  `created_at` date NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tuser`
--

INSERT INTO `tuser` (`userid`, `nama`, `email`, `pwd`, `type`, `created_at`, `is_deleted`) VALUES
(2, 'tony', 'tony@gmail.com', '$2y$13$QJn1Kxo9axKO84wSh7SgIe26eQ2MKzFUd.K3GjpC8KztnXin7D9T6', 'reguler', '2023-06-06', 0),
(3, 'ludwig', 'ludwig@gmail.com', '$2y$13$mKGw1oFqU4K8eNttdUngKePwmjrp5doSa3QkTTwLF3YPuJ.eDuoea', 'reguler', '2023-06-06', 0),
(4, 'irwan', 'irwan@gmail.com', '$2y$13$86cK/O7PirPGZD9vgIkbk.HLMsRhvjf8QHef7U74zHyX7.GeS5Gw.', 'reguler', '2023-06-06', 0),
(6, 'jacky', 'jacky@gmail.com', '$2y$13$btQvwfDd8dFIML1AMLoXKO3x9HWrw26t.nm1WwB5cJzwMixcJgLU6', 'reguler', '2023-06-06', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ttodo`
--
ALTER TABLE `ttodo`
  ADD UNIQUE KEY `todoid` (`todoid`);

--
-- Indexes for table `tuser`
--
ALTER TABLE `tuser`
  ADD UNIQUE KEY `userid` (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ttodo`
--
ALTER TABLE `ttodo`
  MODIFY `todoid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tuser`
--
ALTER TABLE `tuser`
  MODIFY `userid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

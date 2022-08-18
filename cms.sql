-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2022 at 04:17 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'gerges'),
(2, 'boba'),
(5, 'EGTMA3 '),
(15, 'JAVA '),
(19, 'knisa'),
(20, 'lol');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(11) NOT NULL,
  `comment_author` varchar(150) NOT NULL,
  `comment_email` varchar(150) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(150) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(1, 2, 'jojo', 'jojo@msk.com', 'this is jojojojojojojo', 'approved', '2022-01-13'),
(7, 1, 'jojo', 'joojo@hjsdjh.com', 'ihjfiousdhfguiodshiofhdsioh idshjikdh fijoojojoj', 'approved', '2022-01-28'),
(8, 1, 'sdfdsfds', 'sdfdsfdsf', 'sdfdsfds', 'unapproved', '2022-01-28'),
(9, 1, 'sdfdsf', 'sdfsdf', 'sdfsdf', 'unapproved', '2022-01-28'),
(10, 1, 'zxzXz', 'ZXZX', 'ZXZZXZ', 'unapproved', '2022-01-28'),
(11, 1, 'sd', 'asd', 'ad', 'approved', '2022-01-28'),
(12, 1, 'sdf', 'dsfsd', 'cvbb', 'approved', '2022-01-28'),
(13, 1, 'jojo', 'jojojoj@masd.cok', 'eeeeh el 7aalawaa diih', 'approved', '2022-01-29');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(150) NOT NULL,
  `post_author` varchar(150) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(150) NOT NULL,
  `post_comments_count` int(4) NOT NULL DEFAULT 0,
  `post_status` varchar(150) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comments_count`, `post_status`) VALUES
(7, 19, 'sadsdad', 'sadsad', '2022-01-28', 'Capture.PNG', 'fsadfsa', 'dsadsad', 0, 'published'),
(8, 5, 'ay 7aga', 'joseph', '0000-00-00', 'Capture3.PNG', 'awjeru9dywsu8y9 gu9isadhfip hsdjuiog sayuu 9fip[q', 'jojo, koko, oa', 0, 'published'),
(9, 1, 'ay 7aga1', 'joseph', '0000-00-00', 'Vi and Caitlen.jpg', 'sdfdsfdfdsfsd', 'jojo, koko, oa', 0, 'draft'),
(11, 2, 'fdgh', 'dfgfd', '2022-03-09', 'Vi and Caitlen.jpg', '<p><font color=\"#000000\" style=\"background-color: rgb(255, 255, 0);\">dsfsdfsdgdgdsgsdg</font></p>', 'sdds', 0, 'published');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `user_username` varchar(50) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_firstname` varchar(50) NOT NULL,
  `user_lastname` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(50) NOT NULL,
  `user_randsalt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `user_randsalt`) VALUES
(1, 'jojo', '312', 'john', 'mohamad', 'jooj@ms.com', 'this_is_fine.jpeg', 'subscriber', ''),
(3, 'ahmed', 'mohamad', 'joseph', 'mohamad', 'jooj@ms.com', 'Jinx Icon.jpg', 'subscriber', 'any salt'),
(4, 'mimi', 'salah', 'mariam', 'salah', 'mmi@mmi.com', 'Vi Icon.png', 'subscriber', 'any salt'),
(5, 'ahmed', 'HAMADA', 'MOHA', 'HAMADA', 'asdhu8syudg@gm.com', 'Vi and Caitlen.jpg', 'admin', 'any salt'),
(6, 'ahmed', 'HAMADA', 'MOHA', 'HAMADA', 'asdhu8syudg@gm.com', 'Vi and Caitlen.jpg', 'admin', 'any salt');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

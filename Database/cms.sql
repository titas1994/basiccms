-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2020 at 07:13 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(13, 'Java'),
(14, 'Angular Js'),
(16, 'HTML5'),
(17, 'Javascript'),
(18, 'Node Js'),
(19, 'React Js'),
(21, 'PHP and MYSQL'),
(24, 'React Native');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` varchar(255) NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(6, 12, 'Himesh', 'himesh@gmail.com', 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in fauci', 'approve', '2020-02-09'),
(7, 12, 'Titas Ganguly', 'titas@titas.com', 'when an unknown printer took a galley of type and scrambled', 'approve', '2020-02-09'),
(9, 18, 'Titas Ganguly', 'titas@gmail.com', 'This is a nice course ', 'approve', '2020-02-09'),
(10, 8, 'Titas Ganguly', 'titas@gmail.com', 'This is a nice course', 'approve', '2020-02-16'),
(12, 8, 'Titas Ganguly', 'titas@gmail.com', 'Lorem Ipsum is simply dummy text', 'approve', '2020-02-16');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft',
  `class` int(30) NOT NULL,
  `section` varchar(11) NOT NULL,
  `branch` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `class`, `section`, `branch`) VALUES
(8, 21, 'PHP & MongoDB', 'Titas Ganguly', '2020-02-16', 'dashboard.jpg', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'PHP and Mysql', 7, 'Draft', 0, '', ''),
(12, 16, 'This is a HTML5 Course', 'Titas Ganguly', '2020-02-16', 'Img-01.jpg', '<p>when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'html5,html', 5, 'Published', 0, '', ''),
(13, 13, 'Java Basic', 'Titas Ganguly', '2020-02-16', 'Img-06.jpg', '<p>when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. 2020</p>', 'java', 4, 'Published', 0, '', ''),
(14, 19, 'React Js', 'Titas Ganguly', '2020-02-16', 'blog_list3.jpg', '<h2>React Js</h2><p><strong>It is a long established fact that a reader</strong> will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to <strong>using \\\'Content here</strong>, content here\\\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \\\'lorem ipsum\\\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 'React', 4, 'Published', 0, '', ''),
(18, 14, 'Advanced Angular JS', 'Titas Ganguly', '2020-02-09', '39036886_1892760540746423_6895746430984519680_n.png', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.s QS AD AWD AWA AWDAWD ADAW ADA DADAW DAWDA AWDAWDAWDADW.\'Content here, content here\'', 'Angular Js', 1, 'Published', 0, '', ''),
(20, 13, 'Advanced React', 'Titas Ganguly', '2020-02-13', 'startup_banner_img.png', '<p><strong>Contrary</strong> to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \\\\\\\"de Finibus Bonorum et Malorum\\\\\\\" (The Extremes of Good and Evil) by <strong>Cicero, written</strong> in <strong>45 BC</strong>. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \\\\\\\"Lorem ipsum dolor sit amet..\\\\\\\", comes from a line in section 1.10.32.</p>', 'React Js', 0, 'Draft', 0, '', ''),
(22, 13, 'Basic Java', 'Titas Ganguly', '2020-02-16', 'featured_img_one.jpg', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'Java', 0, 'Draft', 0, '', ''),
(28, 18, 'Advanced Node JS', 'TitasGanguly', '2020-02-13', 'dashboard.png', '<p><strong>Writer Aaron Mahnke</strong> launched his podcast \\\"Lore\\\" in 2015 and it has gained critical acclaim in the time since, including earning Best of 2015 honors from iTunes. The audio program is now becoming a <a href=\"http://localhost/\">TV series as an anthology that</a>, like the podcast, uncovers real-life events that spawned people\\\'s darkest nightmares. Taking advantage of its ability to showcase visuals, the series blends animation in with the storytelling and narration. \\\"Lore\\\" has a strong horror pedigree, with some of its executive producers coming from other horror fare, including \\\"The Walking Dead.\\\"</p>', 'Node Js', 0, 'Draft', 0, '', ''),
(29, 17, 'Advanced JavaScript', 'Titas Ganguly', '2020-02-16', 'Img-03.jpg', '<p>when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'Javascript', 0, 'Draft', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randsalt` varchar(255) NOT NULL DEFAULT '$2y$10$iusersomecrazystring22'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randsalt`) VALUES
(25, 'titas', '$2y$10$iusersomecrazystring2ucJMysz74Xq7BymG5a9yvmut78umsJSO', 'Titas', 'Ganguly', 'titas@gmail.com', 'author_img.png', 'Admin', '$2y$10$iusersomecrazystring22'),
(28, 'himesh', '$2y$10$iusersomecrazystring2u9fATTRZyPpTCT50xbCXpLy1BH1r4HXm', 'Himesh', 'Biswass', 'himesh@gmail.com', 'comment2.png', 'Admin', '$2y$10$iusersomecrazystring22'),
(31, 'demo', '$2y$10$iusersomecrazystring2ucJMysz74Xq7BymG5a9yvmut78umsJSO', '', '', 'demo@gmail.com', '', 'Admin', '$2y$10$iusersomecrazystring22'),
(32, 'wadwa', '$2y$10$iusersomecrazystring2u7qu3OeIkpOfQg3dn6rxZ/ZQsy8R0Cb2', 'wadw', 'dwadaw', 'wad@gmail.ccom', 'comment1.png', 'Subcriber', '$2y$10$iusersomecrazystring22');

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
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

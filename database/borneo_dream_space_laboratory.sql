-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2018 at 09:16 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `borneo_dream_space_laboratory`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `admin_picture` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL,
  `updated_date` date NOT NULL,
  `updated_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `admin_picture`, `email`, `username`, `password`, `created_date`, `created_time`, `updated_date`, `updated_time`) VALUES
(1, 'Atallabela Yosua', 'http://localhost/borneo-dream-space-laboratory/media/pictures/web-components/admin-pictures/1.png', 'dayakarcher@hotmail.com', 'root', 'admin123', '2018-11-05', '22:00:00', '2018-11-05', '22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `preview` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `keywords` varchar(100) NOT NULL,
  `id_author` tinyint(3) UNSIGNED DEFAULT NULL,
  `readers` smallint(5) UNSIGNED NOT NULL,
  `likes` smallint(5) UNSIGNED NOT NULL,
  `dislikes` smallint(5) UNSIGNED NOT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL,
  `updated_date` date NOT NULL,
  `updated_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `preview`, `content`, `keywords`, `id_author`, `readers`, `likes`, `dislikes`, `created_date`, `created_time`, `updated_date`, `updated_time`) VALUES
(1, 'Mengapa ada orang miskin dan orang kaya', 'http://localhost/borneo-dream-space-laboratory/media/pictures/web-components/previews/1.png', '<b>Hello World!</b>', '', 1, 26, 2, 3, '2018-11-06', '16:00:00', '2018-11-06', '16:00:00'),
(2, 'Mengapa Bumi itu Bulat!', 'http://localhost/borneo-dream-space-laboratory/media/pictures/web-components/previews/1.png', 'Kenapa?', '', 1, 26, 2, 1, '2018-11-06', '17:00:00', '2018-11-06', '17:00:00'),
(3, '9 Jenis Kopi yang Harus Kamu Ketahui, Mulai Espresso hingga Latte Macchiato', 'http://localhost/borneo-dream-space-laboratory/media/pictures/web-components/previews/2.jpg', '<p>Buat kalian yang masih sangat awam dengan minuman kopi, mungkin ada yang bingung ketika harus memesan di sebuah cafe.\r\n</p>\r\n<p>\r\nRupanya ada banyak varian olahan kopi yang dicampur berbagai bahan.\r\n</p>\r\n<p>\r\nKami menyusunkan untuk kalian agar tak keliru dalam memilih kopi saat nongkrong cantik.\r\n</p>\r\n<ol>\r\n<h3><li>Espresso</li></h3>\r\n</p>\r\nBerasal dari bahasa Italia yang artinya cepat, kopi ini dihasilkan dari mengekstraksi biji kopi yang sudah digiling dengan menyemburkan air panas di bawah tekanan tinggi.\r\n</p>\r\n<p>\r\nEspresso volumenya hanya sekitar 30-45 ml.\r\n</p>\r\n<h3><li>Americano</li></h3>\r\n<p>\r\nBuat kalian para pecinta drama korea pasti enggak asing dengan menu kopi satu ini, karena paling sering dipesan para pemain saat berkunjung ke cafe.\r\n</p>\r\n<p>\r\nAmericano sendiri punya cita rasa yang kece gengs, dia adalah espresso yang dicampur air.\r\n</p>\r\n<p>\r\nKopi ini diidolakan orang-orang yang tak begitu cocok dengan sensasi strong espresso.\r\n</p>\r\n<p>\r\nSehingga konon katanya, nama Americano berasal dari ejekan untuk orang-orang Amerika yang minta kopi espresso mereka dibuat lebih encer.\r\n</p>\r\n<p>\r\nTapi so far, kopi ini pas banget buat nyemil dan ngobrol sama temen.\r\n</p>\r\n<h3><li>Macchiato</li></h3>\r\n<p>\r\nArti kata Macchiato adalah ditandai dengan bercak, maka kopi ini adalah campuran antara espresso dengan susu.\r\n</p>\r\n<p>\r\nJadi rasanya unik gengs, kalian tinggal minta saja pada barista, banyakin susunya apa espresso.\r\n</p>\r\n<p>\r\nKalau banyak susunya namanya jadi Espresso Latte.\r\n</p>\r\n<h3><li>\r\nCappucino</li>\r\n</h3>\r\n<p>\r\nTak jauh beda dengan macchiato, ini adalah kopi dengan susu.\r\n</p>\r\n<p>\r\nTakarannya dan cara penyajiannya yang berbeda, cappucino punya 1/3 susu yang harus dikocok hingga berbusa.\r\n</p>\r\n<h3><li>Flat White</li></h3>\r\n<p>\r\nJenis minuman ini sedikit sama dengan latte, karena lagi-lagi ada kandungan susunya.\r\n</p>\r\n<p>\r\nAkan tetapi flat white memiliki kandungan susu yang harus di steam dulu.\r\n</p>\r\n<p>\r\n\r\nBisa dikatakan, flat white kandungan susunya jauh lebih sedikit dari cappucino.\r\n</p>\r\n<p>\r\n\r\nKonon bagi pecinta jenis kopi ini, orang akan tetap merasakan espresso-nya hanya saja ada sensasi rasa steam milk.\r\n</p>\r\n<h3><li>Mocha</li></h3>\r\n<p>\r\nNah kalau sudah mocha tak cuma susu saja yang ikut campur, harus ada coklatnya.\r\n</p>\r\n<p>\r\nKarena ini adalah espresso dengan coklat dan susu.\r\n</p>\r\n<h3><li>Affogato</li></h3>\r\n<p>Sudah tak cukup susu dan coklat saja, kali ini ada es krim yang dapat dipadukan dengan kopi.\r\n</p>\r\n<p>\r\nJadilah menu affogato.\r\n</p>\r\n<h3><li>Latte</li></h3>\r\n<p>Latte adalah espresso yang memiliki busa tipis di bagian atas.\r\n</p>\r\n<p>\r\nPerbandingannya hanya 2:1 saja.\r\n</p>\r\n<h3><li>Latte Macchiato</li></h3>\r\n</p>\r\nVarian kopi satu ini punya komposisi espresso banding susu 1:4.\r\n</p>\r\n<p>\r\nSedang macchiato hanya 1:1 saja.\r\n</p>\r\n</ol>', '', 1, 26, 1, 1, '2018-11-13', '19:00:00', '2018-11-13', '18:00:00'),
(6, 'Mengapa dunia ini begitu memuakkan', '', 'Saya juga bertanya, mengapa?', '', 1, 26, 1, 1, '2018-11-22', '15:06:33', '2018-11-22', '15:06:33');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `author_picture` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL,
  `updated_date` date NOT NULL,
  `updated_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `author_picture`, `email`, `bio`, `username`, `password`, `created_date`, `created_time`, `updated_date`, `updated_time`) VALUES
(1, 'Atallabela Yosua', 'http://localhost/borneo-dream-space-laboratory/media/pictures/web-components/author-pictures/1.png', 'dayakarcher@hotmail.com', 'Yosua hanya seorang manusia biasa.', 'dayak-archer', 'admin123', '2018-11-01', '12:00:00', '2018-11-01', '12:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `author_picture` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `likes` smallint(5) UNSIGNED NOT NULL,
  `dislikes` smallint(5) UNSIGNED NOT NULL,
  `article_id` smallint(5) UNSIGNED DEFAULT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `author_picture`, `email`, `comment`, `likes`, `dislikes`, `article_id`, `created_date`, `created_time`) VALUES
(1, '', '', '', '', 0, 0, NULL, '2018-11-22', '08:07:42'),
(2, 'Atallabela Yosua', 'http://localhost/borneo-dream-space-laboratory/media/pictures/web-components/commentator-pictures/1.png', 'dayakarcher@hotmail.com', 'Hello, world!', 0, 0, 1, '2018-11-22', '08:14:00'),
(3, 'Dwi Romadoni', 'http://localhost/borneo-dream-space-laboratory/media/pictures/web-components/commentator-pictures/1.png', 'ad@kaw.dwd', 'GG', 1, 1, 1, '2018-11-22', '08:14:17'),
(4, 'askjksa', 'http://localhost/borneo-dream-space-laboratory/media/pictures/web-components/commentator-pictures/1.png', 'skasjka@kkds.sdjs', 'jsjdskd', 0, 0, 2, '2018-11-22', '12:42:33'),
(5, 'sds', 'http://localhost/borneo-dream-space-laboratory/media/pictures/web-components/commentator-pictures/1.png', 'ajska@kak.sds', 'slsdsd', 0, 0, 2, '2018-11-22', '12:46:10'),
(6, 'Atallabela Yosua', 'http://localhost/borneo-dream-space-laboratory/media/pictures/web-components/commentator-pictures/1.png', 'dayakarcher@hotmail.com', 'dskdskjdks', 0, 0, 3, '2018-11-22', '13:37:10');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `id_admin` tinyint(3) UNSIGNED DEFAULT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL,
  `updated_date` date NOT NULL,
  `updated_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_author` (`id_author`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`article_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_admin` (`id_admin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`id_author`) REFERENCES `authors` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`);

--
-- Constraints for table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `pages_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admins` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

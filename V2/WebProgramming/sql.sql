-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Oct 16, 2015 at 12:11 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `WP31`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `file` varchar(100) NOT NULL,
  `type` varchar(45) NOT NULL,
  `size` double NOT NULL,
  `tgl` date NOT NULL,
  `country` varchar(225) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `file`, `type`, `size`, `tgl`, `country`) VALUES
(62, '2010-11-09 13.02.11.jpg', 'image/jpeg', 1608276, '2015-10-11', 'England'),
(63, '2010-11-09 13.02.20.jpg', 'image/jpeg', 1664281, '2015-10-11', 'England'),
(64, '2010-11-09 13.02.31.jpg', 'image/jpeg', 1416007, '2015-10-11', 'England'),
(65, '2010-11-29 15.53.24.jpg', 'image/jpeg', 1670112, '2015-10-11', 'England'),
(66, '2010-11-30 17.46.18.jpg', 'image/jpeg', 1537834, '2015-10-11', 'England'),
(67, '2010-11-30 17.46.35.jpg', 'image/jpeg', 1615987, '2015-10-11', 'England'),
(68, '2010-11-30 17.47.04.jpg', 'image/jpeg', 1581986, '2015-10-11', 'England'),
(69, '2010-11-30 17.47.10.jpg', 'image/jpeg', 1564423, '2015-10-11', 'England'),
(70, '2010-11-30 17.47.29.jpg', 'image/jpeg', 1623269, '2015-10-11', 'England'),
(71, '2010-11-30 17.47.38.jpg', 'image/jpeg', 1592658, '2015-10-11', 'England'),
(72, '2010-11-30 17.48.16.jpg', 'image/jpeg', 1412485, '2015-10-11', 'England'),
(73, '2010-11-30 17.48.27.jpg', 'image/jpeg', 1569192, '2015-10-11', 'England'),
(74, '2010-11-30 17.49.28.jpg', 'image/jpeg', 1539854, '2015-10-11', 'England'),
(75, '2010-11-30 17.52.11.jpg', 'image/jpeg', 1662530, '2015-10-11', 'England'),
(76, '2010-11-30 17.46.18.jpg', 'image/jpeg', 1537834, '2015-10-12', 'nederland'),
(77, '2010-11-30 17.46.35.jpg', 'image/jpeg', 1615987, '2015-10-12', 'nederland'),
(78, '2010-11-30 17.47.04.jpg', 'image/jpeg', 1581986, '2015-10-12', 'nederland'),
(79, '2010-11-30 17.47.10.jpg', 'image/jpeg', 1564423, '2015-10-12', 'nederland'),
(80, '2010-11-30 17.47.29.jpg', 'image/jpeg', 1623269, '2015-10-12', 'nederland'),
(81, '2010-11-30 17.47.38.jpg', 'image/jpeg', 1592658, '2015-10-12', 'nederland'),
(82, '2010-11-30 17.48.16.jpg', 'image/jpeg', 1412485, '2015-10-12', 'nederland'),
(83, '2010-11-30 17.48.27.jpg', 'image/jpeg', 1569192, '2015-10-12', 'nederland'),
(84, '2010-11-30 17.49.28.jpg', 'image/jpeg', 1539854, '2015-10-12', 'nederland'),
(85, '2010-11-30 17.52.11.jpg', 'image/jpeg', 1662530, '2015-10-12', 'nederland'),
(86, 'DSC_0048.JPG', 'image/jpeg', 2682095, '2015-10-12', 'Etten Leur, Centrum, 4872 Etten-Leur, Netherlands'),
(87, '2010-11-09 13.02.11.jpg', 'image/jpeg', 1608276, '2015-10-16', 'Etten Leur, Centrum, 4872 Etten-Leur, Netherlands'),
(88, '2010-11-09 13.02.20.jpg', 'image/jpeg', 1664281, '2015-10-16', 'Etten Leur, Centrum, 4872 Etten-Leur, Netherlands'),
(89, '2010-11-09 13.02.31.jpg', 'image/jpeg', 1416007, '2015-10-16', 'Etten Leur, Centrum, 4872 Etten-Leur, Netherlands'),
(90, '2010-11-29 15.53.24.jpg', 'image/jpeg', 1670112, '2015-10-16', 'Etten Leur, Centrum, 4872 Etten-Leur, Netherlands'),
(91, '2010-11-30 17.46.18.jpg', 'image/jpeg', 1537834, '2015-10-16', 'Etten Leur, Centrum, 4872 Etten-Leur, Netherlands'),
(92, '2010-11-30 17.46.35.jpg', 'image/jpeg', 1615987, '2015-10-16', 'Etten Leur, Centrum, 4872 Etten-Leur, Netherlands'),
(93, '2010-11-30 17.47.04.jpg', 'image/jpeg', 1581986, '2015-10-16', 'Etten Leur, Centrum, 4872 Etten-Leur, Netherlands'),
(94, '2010-11-30 17.47.10.jpg', 'image/jpeg', 1564423, '2015-10-16', 'Etten Leur, Centrum, 4872 Etten-Leur, Netherlands'),
(95, '2010-11-30 17.47.29.jpg', 'image/jpeg', 1623269, '2015-10-16', 'Etten Leur, Centrum, 4872 Etten-Leur, Netherlands'),
(96, '2010-11-30 17.47.38.jpg', 'image/jpeg', 1592658, '2015-10-16', 'Etten Leur, Centrum, 4872 Etten-Leur, Netherlands'),
(97, '2010-11-30 17.48.16.jpg', 'image/jpeg', 1412485, '2015-10-16', 'Etten Leur, Centrum, 4872 Etten-Leur, Netherlands'),
(98, '2010-11-30 17.48.27.jpg', 'image/jpeg', 1569192, '2015-10-16', 'Etten Leur, Centrum, 4872 Etten-Leur, Netherlands'),
(99, '2010-11-30 17.49.28.jpg', 'image/jpeg', 1539854, '2015-10-16', 'Etten Leur, Centrum, 4872 Etten-Leur, Netherlands'),
(100, '2010-11-30 17.52.11.jpg', 'image/jpeg', 1662530, '2015-10-16', 'Etten Leur, Centrum, 4872 Etten-Leur, Netherlands'),
(101, 'DSC_0048.JPG', 'image/jpeg', 2682095, '2015-10-16', 'Etten Leur, Centrum, 4872 Etten-Leur, Netherlands'),
(102, '2010-11-09 13.02.11.jpg', 'image/jpeg', 1608276, '2015-10-16', 'Etten Leur, Centrum, 4872 Etten-Leur, Netherlands'),
(103, '2010-11-09 13.02.20.jpg', 'image/jpeg', 1664281, '2015-10-16', 'Etten Leur, Centrum, 4872 Etten-Leur, Netherlands'),
(104, '2010-11-09 13.02.31.jpg', 'image/jpeg', 1416007, '2015-10-16', 'Etten Leur, Centrum, 4872 Etten-Leur, Netherlands'),
(105, '2010-11-29 15.53.24.jpg', 'image/jpeg', 1670112, '2015-10-16', 'Etten Leur, Centrum, 4872 Etten-Leur, Netherlands'),
(106, '2010-11-30 17.46.18.jpg', 'image/jpeg', 1537834, '2015-10-16', 'Etten Leur, Centrum, 4872 Etten-Leur, Netherlands'),
(107, '2010-11-30 17.46.35.jpg', 'image/jpeg', 1615987, '2015-10-16', 'Etten Leur, Centrum, 4872 Etten-Leur, Netherlands'),
(108, '2010-11-30 17.47.04.jpg', 'image/jpeg', 1581986, '2015-10-16', 'Etten Leur, Centrum, 4872 Etten-Leur, Netherlands'),
(109, '2010-11-30 17.47.10.jpg', 'image/jpeg', 1564423, '2015-10-16', 'Etten Leur, Centrum, 4872 Etten-Leur, Netherlands'),
(110, '2010-11-30 17.47.29.jpg', 'image/jpeg', 1623269, '2015-10-16', 'Etten Leur, Centrum, 4872 Etten-Leur, Netherlands'),
(111, '2010-11-30 17.47.38.jpg', 'image/jpeg', 1592658, '2015-10-16', 'Etten Leur, Centrum, 4872 Etten-Leur, Netherlands'),
(112, '2010-11-30 17.48.16.jpg', 'image/jpeg', 1412485, '2015-10-16', 'Etten Leur, Centrum, 4872 Etten-Leur, Netherlands'),
(113, '2010-11-30 17.48.27.jpg', 'image/jpeg', 1569192, '2015-10-16', 'Etten Leur, Centrum, 4872 Etten-Leur, Netherlands'),
(114, '2010-11-30 17.49.28.jpg', 'image/jpeg', 1539854, '2015-10-16', 'Etten Leur, Centrum, 4872 Etten-Leur, Netherlands'),
(115, '2010-11-30 17.52.11.jpg', 'image/jpeg', 1662530, '2015-10-16', 'Etten Leur, Centrum, 4872 Etten-Leur, Netherlands'),
(116, 'DSC_0048.JPG', 'image/jpeg', 2682095, '2015-10-16', 'Etten Leur, Centrum, 4872 Etten-Leur, Netherlands');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `lat` varchar(120) NOT NULL,
  `lng` varchar(200) NOT NULL,
  `geo` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `lat`, `lng`, `geo`) VALUES
(37, '51.5694417', '4.6391138', 'Etten Leur, Centrum, 4872 Etten-Leur, Netherlands'),
(105, '37,51.5694414', '4.6391136', 'Etten Leur, Centrum, 4872 Etten-Leur, Netherlands');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(35) NOT NULL,
  `firstname` varchar(35) NOT NULL,
  `lastname` varchar(70) NOT NULL,
  `email` varchar(89) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL,
  `thumb` varchar(100) NOT NULL,
  `fullsize` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `firstname`, `lastname`, `email`, `password`, `role`, `thumb`, `fullsize`) VALUES
(1, 'Kevin', 'Kevin', 'Borghmans', 'kevinborghmans.kb@gmail.com', '$2y$12$sm0o7tKLAtjhmd9LGxVxQe2/iRfYp9Dd/SqHaJOBuK/9g8SyQwJC6', 'user', '/images/thumbs/sex_female_256.png_thumb.png', '/images/fullsized/sex_female_256.png_thumb.png'),
(2, 'frank', 'haha', 'haha', 'kevinborghmans.kb@gmail.com', '$2y$12$6oW890lD3PYbRJhntyENJeemyr3Zdif.Q88Teaqra6n.DUyvGayN6', 'admin', 'images/thumbs/pixels-movie.jpg_thumb.png', 'images/fullsized/pixels-movie.jpg_thumb.png'),
(4, 'frank1', 'lel', 'lel', 'kevinborghmans.kb@gmail.com', '$2y$12$REEcOFF/NQ1Yy50MhK1Or.R3s2XnK78T3To7oNB7OVMPKKhv4cWlW', 'user', 'images/thumbs/pixels-movie.jpg_thumb.png', 'images/fullsized/pixels-movie.jpg_thumb.png'),
(5, 'Shade', 'Frans', 'leip', 'henk@live.com', '$2y$12$9GhpuZ7GYI0SFVcOehOshO1r1EzXb9cmeuoST08y003sVoCT33Hrq', 'admin', 'images/thumbs/stormtrooper_star_wars-2880x1800.jpg_thumb.png', 'images/fullsized/stormtrooper_star_wars-2880x1800.jpg_thumb.png'),
(6, 'a', 's', 'd', 'd', '$2y$12$o6pTj.d0VD16czXUuDlLb.6MxorfLO83cFrmZTzaR.gRqWv4NBXHe', 'user', '', ''),
(7, 'KevinHenk', 'lel', 'asdkjk', 'a@hotmail.com', '$2y$12$uBXcGRvF983dIxuW3pakN.46skK26EAUUhbn/hOq/p1V2V6vDEpDe', 'user', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lat` (`lat`),
  ADD UNIQUE KEY `lng` (`lng`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=117;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=107;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;